<?php 
   class Timekeepingsecurityguard extends CI_Controller {  
     
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Timekeepingsecurityguard_model');  
	  		$this->timekeeping = new Timekeepingsecurityguard_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timekeeping');

	  		$data['data']=$this->timekeeping->get_timekeeping("");

			$this->load->view('Template/Header',$data);

			if(isAllowed(7)) $this->load->view("Timekeepingsecurityguard/Index",$data);
				        else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function uploadTimekeeping(){
			$timekeepingID = $this->input->post('timekeepingID');
			$message 	= "";
			$type  		= "";

			if ($_FILES["file"]["tmp_name"]!="") {
			    $fileName = $_FILES["file"]["tmp_name"];
			    $file_name = $_FILES["file"]["name"];

			    if ($_FILES["file"]["size"] > 0) {
			        
			        $file = fopen($fileName, "r");
			        $firstline = true;
			        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
		        	    if($firstline) { $firstline = false; continue; }

		        	    	$late = 0;
		        	    	$actual_regular_hours 	= 0;
		                    $ordinaryday			= 0;
		                    $restday 				= 0;
		                    $specialholiday 		= 0;
		                    $specialrestday			= 0;
		                    $regularyholiday 		= 0;
		                    $regularrestdat			= 0;
		                    $doubleholiday			= 0;
		                    $doublerestday			= 0;

		                    $actual_ot_hours 		= 0;
		                    $ordinaryot 			= 0;
		                    $restot 				= 0;
		                    $specialot 				= 0;
		                    $specialrestot 			= 0;
		                    $regularot 				= 0;
		                    $regularrestot 			= 0;
		                    $doubleot 				= 0;
		                    $doublerestot 			= 0;

		                    $actual_nightdiff_hours = 0;
		                    $ordinarynight 			= 0;
		                    $restnight 				= 0;
		                    $specialnight 			= 0;
		                    $specialrestnight 		= 0;
		                    $regularnight 			= 0;
		                    $regularrestnight 		= 0;
		                    $doublenight 			= 0;
		                    $doublerestnight 		= 0;

		                    $actual_nightot_hours 	= 0;
		                    $ordinarynightot 		= 0;
		                    $restnightot 			= 0;
		                    $specialnightot 		= 0;
		                    $specialrestnightot 	= 0;
		                    $regularnightot 		= 0;
		                    $regularrestnightot 	= 0;
		                    $doublenightot 			= 0;
		                    $doublerestnightot 		= 0;

		        	    /*********************** CONVERT TO DATE TO CORRECT FORMAT *****************************/
							$column_datesched = strtotime($column[1]);							
							$datesched = date('d',$column_datesched).'-'.
										 date('m',$column_datesched).'-'.
										 date('Y',$column_datesched);

							$column_timein  = strtotime($column[4]);
							$datetimein = date('d',$column_timein)	.'-'.
										  date('m',$column_timein)	.'-'.
										  date('Y',$column_timein)	.' '.
										  date('H',$column_timein)	.":".
										  date('i',$column_timein)	.":".
										  date('s',$column_timein);

							$column_timeout  = strtotime($column[5]);
							$datetimeout = date('d',$column_timeout)	.'-'.
										   date('m',$column_timeout)	.'-'.
										   date('Y',$column_timeout)	.' '.
										   date('H',$column_timeout)	.":".
										   date('i',$column_timeout)	.":".
										   date('s',$column_timeout);
						/*********************** END *****************************/

						/************************** GUARD TIME IN*****************************/
							$retVal_postTime  = explode("|",$this->timekeeping->get_post_schedule($column[3]));

							$guardTimeIn = date('m',$column_timein)	."/".
										   date('d',$column_timein)	."/".
										   date('Y',$column_timein)	." ".
										   date('H',$column_timein)	.":".
										   date('i',$column_timein)	.":".
										   date('s',$column_timein);


							$postTimeIn  = date('m',$column_timein)."/".
										   date('d',$column_timein)."/".
										   date('Y',$column_timein)." ".$retVal_postTime[0];

						/******************************** GUARD TIME OUT********************************/
							$guardTimeOut = date('m',$column_timeout)	."/".
										    date('d',$column_timeout)	."/".
										    date('Y',$column_timeout)	." ".
										    date('H',$column_timeout)	.":".
										    date('i',$column_timeout)	.":".
										    date('s',$column_timeout);


							$postTimeOut = date('m',$column_timeout)."/".
										   date('d',$column_timeout)."/".
										   date('Y',$column_timeout)." ".$retVal_postTime[1];

						/**************************COMPUTE REGULAR TIME*************************/
							$regularTime = date("m/d/Y H:i",strtotime("+8 hours",strtotime($postTimeIn)));
							$regularHour = date('H',strtotime($regularTime));
							$regularMin  = date('i',strtotime($regularTime));

						/***************************COMPUTE OVERTIME****************************/
							$diff_overtimehours = date_diff(date_create($regularTime),date_create($postTimeOut));
							$overtime = $diff_overtimehours->h.":". str_pad($diff_overtimehours->i, 2, "0", STR_PAD_LEFT);

						/******************************COMPUTE GUARD LATE*****************************/
							if($guardTimeIn>$postTimeIn){
								$diff_late = date_diff(date_create($postTimeIn),date_create($guardTimeIn));
								$late = $diff_late->h  + sprintf("%.2f", $diff_late->i / 60);

								$actualTimeIn = $guardTimeIn;
							}else{
								$actualTimeIn = $postTimeIn;
							}

							if($guardTimeOut>$postTimeOut){
								$actualTimeOut = $postTimeOut;
							}else{
								$actualTimeOut = $guardTimeOut;
							}

						/*********************COMPUTE GUARD REGULAR********************/
							$diff_rendered = 0;

							if($actualTimeOut<$regularTime){
								$diff_rendered = date_diff(date_create($actualTimeIn),date_create($actualTimeOut));
							}else if($actualTimeOut>=$regularTime){
								$diff_rendered = date_diff(date_create($actualTimeIn),date_create($regularTime));
							}

							$actual_regular_hours = $diff_rendered->h.":". str_pad($diff_rendered->i, 2, "0", STR_PAD_LEFT);
							$render_regular_hours  = sprintf("%02d",$diff_rendered->h) + sprintf("%.2f",$diff_rendered->i / 60);

						/************************COMPUTE GUARD OT HOURS**********************/
							$actual_ot_hours = 0;
							$render_overtime_hours  = 0;

							if($actualTimeOut>=$regularTime){
								if($actualTimeOut>=$postTimeOut){
									$diff_overtime = date_diff(date_create($postTimeOut),date_create($regularTime));
								}else{
									$diff_overtime = date_diff(date_create($actualTimeOut),date_create($regularTime));
								}

								$actual_ot_hours = $diff_overtime->h.":". str_pad($diff_overtime->i, 2, "0", STR_PAD_LEFT);
								$render_overtime_hours  = sprintf("%02d",$diff_overtime->h) + sprintf("%.2f",$diff_overtime->i / 60);
							}

						/************************COMPUTE TOTAL HOURS**********************/
							$diff_total_hours = date_diff(date_create($actualTimeIn),date_create($actualTimeOut));
							$render_total_hours = $diff_total_hours->h.":". str_pad($diff_total_hours->i, 2, "0", STR_PAD_LEFT);

							$retVal = explode("|",$this->getNightDifference(strtotime($actualTimeIn), strtotime($actualTimeOut)));

							$actual_nightdiff_hours = $retVal[0];
							$render_night_hours  = $retVal[1];

						/************************ IDENTIFY WHAT TYPE OF DAY **********************/
							$return_holiday = "";
							$return_restday = 0;
							$lateType 		= "";
							$dayType 		= "";
							$OTType  		= "";
							$NightType 		= "";

						/************************ CHECK IF HOLIDAY **********************/
							$return_holiday=$this->timekeeping->check_if_holiday(date('Y-m-d', strtotime($datetimein)));

								 if($return_holiday=="Regular Holiday") $dayType = "rgl";
							else if($return_holiday=="Special Holiday") $dayType = "spc";
							else if($return_holiday=="Double Holiday")  $dayType = "dbl";

						/************************ CHECK IF RESTDAY **********************/

							$return_restday=$this->timekeeping->check_if_restday($column[0],date('N', strtotime($datetimein)));

							if($return_restday) $dayType .="rst";

						/************************ OUTPUT **********************/
							if($dayType=="") $dayType = "ord";

							$lateType 	= $dayType.'late';
							$OTType 	= $dayType.'ot';
							$NightType  = $dayType.'night';

			            	$data = array(
				                    'timekeepingID' 		=> $timekeepingID,
				                    'employeeID' 			=> $column[0],
				                    'rateCode'				=> $dayType,
				                    'datesched' 			=> date('Y-m-d', strtotime($datesched)),
				                    'clientID' 				=> $column[2],
				                    'postID' 				=> $column[3],
				                    'timein' 				=> date('Y-m-d H:i:s', strtotime($datetimein)),
				                    'timeout' 				=> date('Y-m-d H:i:s', strtotime($datetimeout)),
				                    'post_timein' 			=> date('H:i:s', strtotime($postTimeIn)),
				                    'post_timeout' 			=> date('H:i:s', strtotime($postTimeOut)),
				                    'actualhours' 			=> $render_total_hours,
				                    $lateType 				=> $late,

				                    'actual_regular_hours' 	=> $actual_regular_hours,
				                    $dayType				=> $render_regular_hours,

				                    'actual_ot_hours'		=> $actual_ot_hours,
				                    $OTType					=> $render_overtime_hours,

				                    'actual_nightdiff_hours' => $actual_nightdiff_hours,
				                    $NightType				 => $render_night_hours
		                ); 

			            $result = $this->timekeeping->upload_timekeeping($data);
			        }
			    }
				
				$this->session->set_flashdata('uploaded', $file_name); 
				echo json_encode($this->timekeeping->get_timekeeping($timekeepingID));
			}
		}

		public function getNightDifference($start_work,$end_work){
			$START_NIGHT_HOUR 	= '22';
			$START_NIGHT_MINUTE = '00';
			$START_NIGHT_SECOND = '00';
			$END_NIGHT_HOUR 	= '06';
			$END_NIGHT_MINUTE 	= '00';
			$END_NIGHT_SECOND 	= '00';

			$start_night = mktime($START_NIGHT_HOUR,$START_NIGHT_MINUTE,$START_NIGHT_SECOND,date('m',$start_work),date('d',$start_work),date('Y',$start_work));
    		$end_night   = mktime($END_NIGHT_HOUR,$END_NIGHT_MINUTE,$END_NIGHT_SECOND,date('m',$start_work),date('d',$start_work) + 1,date('Y',$start_work));

			if($start_work >= $start_night && $start_work <= $end_night)
		    {
		        if($end_work >= $end_night)
		        {
		        	$diff_night = date_diff(date_create(date("m/d/Y H:i:s",$start_work)),date_create(date("m/d/Y H:i:s",$end_night)));
					$actual_regular_hours = $diff_night->h.":". str_pad($diff_night->i, 2, "0", STR_PAD_LEFT);

		        	return $actual_regular_hours."|".sprintf("%.2f",($end_night - $start_work) / 3600);
		        }
		        else
		        {
		        	$diff_night = date_diff(date_create(date("m/d/Y H:i:s",$start_work)),date_create(date("m/d/Y H:i:s",$end_work)));
					$actual_regular_hours = $diff_night->h.":". str_pad($diff_night->i, 2, "0", STR_PAD_LEFT);

		        	return $actual_regular_hours."|".sprintf("%.2f",($end_work - $start_work) / 3600);
		        }
		    }
		    elseif($end_work >= $start_night && $end_work <= $end_night)
		    {
		        if($start_work <= $start_night)
		        {
		        	$diff_night = date_diff(date_create(date("m/d/Y H:i:s",$start_night)),date_create(date("m/d/Y H:i:s",$end_work)));
					$actual_regular_hours = $diff_night->h.":". str_pad($diff_night->i, 2, "0", STR_PAD_LEFT);
	
		        	return $actual_regular_hours."|".sprintf("%.2f",($end_work - $start_night) / 3600);
		        }
		        else
		        {
		        	$diff_night = date_diff(date_create(date("m/d/Y H:i:s",$start_work)),date_create(date("m/d/Y H:i:s",$end_work)));
					$actual_regular_hours = $diff_night->h.":". str_pad($diff_night->i, 2, "0", STR_PAD_LEFT);
	
		        	return $actual_regular_hours."|".sprintf("%.2f",($end_work - $start_work) / 3600);
		        }
		    }
		    else
		    {
		        if($start_work < $start_night && $end_work > $end_night)
		        {
		        	$diff_night = date_diff(date_create(date("m/d/Y H:i:s",$start_night)),date_create(date("m/d/Y H:i:s",$end_night)));
					$actual_regular_hours = $diff_night->h.":". str_pad($diff_night->i, 2, "0", STR_PAD_LEFT);
	
		        	return $actual_regular_hours."|".sprintf("%.2f",($end_night - $start_night) / 3600);
		        }
		        return "0:0|0";
		    }
		}

		public function approve() 
		{ 
			$timekeepingID = $this->input->post('timekeepingID');
			$lastapprover = $this->input->post('lastapprover');
			
        	$result = $this->timekeeping->approve_timekeeping($timekeepingID, date("Y-m-d"),$lastapprover);
        	
        	
        	echo json_encode($result);
		}

		public function deny() 
		{ 
			$timekeepingID = $this->input->post('timekeepingID');
			$reason = $this->input->post('reason');

        	$this->timekeeping->deny_timekeeping($timekeepingID,$reason);
		}
		public function submit() 
		{ 
			$timekeepingID = $this->input->post('timekeepingID');
        	$result = $this->timekeeping->submit_timekeeping($timekeepingID, date("Y-m-d H:i:s"));

        	echo json_encode($result);
		}

		public function cancel() 
		{ 
			$timekeepingID = $this->input->post('timekeepingID');
        	$this->timekeeping->cancel_timekeeping($timekeepingID);
		}

		public function report() 
		{ 
	  		$data = array('title' => 'Timekeeping Report');

			$this->load->view('Template/Header',$data);
			$this->load->view("Timekeeping/Report",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function getattendance() 
		{ 
			$timesheetID   = $this->input->post('timesheetID');

       		$data=$this->timekeeping->get_attendance($timesheetID);

       		echo json_encode($data);
   		}

   		public function getdenied() 
		{ 
			$timekeepingID   = $this->input->post('timekeepingID');

       		$data=$this->timekeeping->get_denied($timekeepingID);

       		echo json_encode($data);
   		}
	}     
?>
