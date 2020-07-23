<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timekeepingstaff_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_timekeeping($tkID)
	{
		$timekeepingID = $tkID;
		$datefrom = "";
		$dateto = "";

		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus!=2 AND timekeepingType=2');

   		if($queryheader->num_rows()===0){
   			$month = date('m');
			$year = date('y');

			$datefrom = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
			$dateto   = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");
			$payperiod = 1;

   			$data = array('timekeepingType'		=> 2,
   						  'datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
			$timekeepingID = $this->db->insert_id();

			$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus=0 AND timekeepingType=2');
   		}else{
   			$timekeepingID = $queryheader->row()->timekeepingID;
   			$datefrom = $queryheader->row()->datefrom;
			$dateto = $queryheader->row()->dateto;
   		}

   		/**************************   GET BIOMETRICS TIME IN    *********************************/
   		$queryCheckIn = $this->db->query('SELECT checkinout.id as "checkinoutID", pin,checktime FROM checkinout 
											 WHERE checktype="0" AND location IS NULL AND checkinout.checktime BETWEEN "'.$datefrom.' 00:00:00" AND "'.$dateto.' 23:59:00" 
											 GROUP BY pin');

   		foreach ($queryCheckIn->result() as $row){
	   		$bio_in_datesched    = date('Y-m-d', strtotime($row->checktime));
	   		$bio_in_employeeID   = $row->pin;
	   		$bio_in_timein 	 	 = $row->checktime;
	   		$bio_in_checkinoutID = $row->checkinoutID;

	   		$queryCheckTimeIn = $this->db->query('SELECT * FROM dm_timekeepingdetails WHERE employeeID='.$bio_in_employeeID.' AND datesched="'.$bio_in_datesched.'"');

	   		if($queryCheckTimeIn->num_rows()===0){
	   			 $weekday = date('N',strtotime($bio_in_datesched));

 	   			 $data = array('timekeepingID'		=> $timekeepingID,
		        			   'employeeID' 		=> $bio_in_employeeID,
		        			   'tkType'				=> '',
							   'datesched' 			=> $bio_in_datesched,
							   'timein' 			=> $bio_in_timein,
							   'post_timein' 		=> '08:00',
							   'post_timeout' 		=> '17:00'
						  );

					$this->db->insert('dm_timekeepingdetails', $data);

					$this->db->query('UPDATE checkinout SET location="sync" WHERE id='.$bio_in_checkinoutID);
					//echo 'success';
			}else{
				$this->db->query('UPDATE dm_timekeepingdetails SET timein="'.$bio_in_timein.'" WHERE timesheetID='.$queryCheckTimeIn->row()->timesheetID);
				$this->db->query('UPDATE checkinout SET location="sync" WHERE id='.$bio_in_checkinoutID);
			}
   		}

   		/**************************   GET BIOMETRICS TIME OUT   *********************************/
   		$queryCheckOut = $this->db->query('SELECT checkinout.id as "checkinoutID", pin,checktime FROM checkinout 
										   WHERE checktype="1" AND location IS NULL AND checkinout.checktime BETWEEN "'.$datefrom.' 00:00:00" AND "'.$dateto.' 23:59:00" 
										   GROUP BY pin ORDER BY `checktime` DESC');

   		foreach ($queryCheckOut->result() as $row){
	   		$bio_out_datesched    = date('Y-m-d', strtotime($row->checktime));
	   		$bio_out_employeeID   = $row->pin;
	   		$bio_out_timeout 	  = $row->checktime;
	   		$bio_out_checkinoutID = $row->checkinoutID;

	   		$queryCheckTimeOut = $this->db->query('SELECT * FROM dm_timekeepingdetails WHERE employeeID='.$bio_out_employeeID.' AND datesched="'.$bio_out_datesched.'"');

	   		if($queryCheckTimeOut->num_rows()===0){

	   			 $bio_out_datesched = date("Y-m-d",strtotime($bio_out_timeout));

	   			 $queryCheckTimeOut2nd = $this->db->query('SELECT * FROM dm_timekeepingdetails WHERE employeeID='.$bio_out_employeeID.' AND datesched="'.$bio_out_datesched.'"');

	   			if($queryCheckTimeOut2nd->num_rows()===0){
		   			 $data = array('timekeepingID'		=> $timekeepingID,
			        			   'employeeID' 		=> $bio_out_employeeID,
			        			   'tkType'				=> '',
								   'datesched' 			=> $bio_out_datesched,
								   'timeout' 			=> $bio_out_timeout
							  );

						$this->db->insert('dm_timekeepingdetails', $data);

						$this->db->query('UPDATE checkinout SET location="sync" WHERE id='.$bio_out_checkinoutID);
				}else{
					$this->db->query('UPDATE dm_timekeepingdetails SET timeout="'.$bio_out_timeout.'" WHERE timesheetID='.$queryCheckTimeOut2nd->row()->timesheetID);
					$this->db->query('UPDATE checkinout SET location="sync" WHERE id='.$bio_out_checkinoutID);
				}
			}else{
				$this->db->query('UPDATE dm_timekeepingdetails SET timeout="'.$bio_out_timeout.'" WHERE timesheetID='.$queryCheckTimeOut->row()->timesheetID);
				$this->db->query('UPDATE checkinout SET location="sync" WHERE id='.$bio_out_checkinoutID);
			}
   		}

   		$this->check_schedule($timekeepingID);

   		$queryDetails = $this->db->query('SELECT *  FROM dm_timekeepingdetails
   										  INNER JOIN dm_employee ON dm_employee.employeeID = dm_timekeepingdetails.employeeID 
									  	  WHERE dm_employee.employeetypeID=2 AND dm_timekeepingdetails.timekeepingID='.$timekeepingID.
									   	 ' AND dm_timekeepingdetails.datesched>="'.$datefrom.'"'.
									   	 ' AND dm_timekeepingdetails.datesched<="'.$dateto.'" ORDER BY datesched,dm_employee.employeeID');

   		$queryEmployee = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) AS fullname FROM dm_employee 
   										   WHERE employeestatus="Active" AND 
   										   		 employeetypeID=2 order by fullname');

   		$queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=2 AND approvalLevel='.$queryheader->row()->level);

   		$queryLeave 	= $this->db->query('SELECT * FROM dm_employeeleave
											INNER JOIN dm_employee ON dm_employee.employeeID = dm_employeeleave.employeeID 
									  	    WHERE dm_employee.employeetypeID=2 AND leavefrom>="'.$datefrom.'" AND leaveto<="'.$dateto.'"');
   		
   		$queryRestday 	= $this->db->query('SELECT * FROM dm_schedule');

    	return array('timekeepingdetails' => $queryDetails->result(),
    				 'timekeeping' 		  => $queryheader->result(),
    				 'employee'		 	  => $queryEmployee->result(),
    				 'approver' 		  => $queryApprover->result(),
    				 'leave' 			  => $queryLeave->result(),
    				 'restday' 			  => $queryRestday->result());
  	}

  	function upload_timekeeping($data)
	{
		$queryUpdateTKdetails = $this->db->query('SELECT timesheetID,timekeepingID FROM dm_timekeepingdetails WHERE 
												    timekeepingID ='.$data["timekeepingID"].'
												AND employeeID	  ='.$data["employeeID"].' 
												AND datesched	  ="'.$data["datesched"].'"'); 

		if($queryUpdateTKdetails->num_rows()===0){
   	   		$this->db->insert("dm_timekeepingdetails", $data); 
		}else{
			$this->db->where("timesheetID",$queryUpdateTKdetails->row()->timesheetID);  
        	$this->db->update("dm_timekeepingdetails", $data);  
		}
	}

	function remove_timekeeping($employeeID,$datesched)
	{
		$this->db->where("employeeID", $employeeID);  
		$this->db->where("datesched", $datesched);  
      	$this->db->delete("dm_timekeepingdetails"); 
	}

	function approve_timekeeping($timekeepingID, $dateapproved, $lastapprover, $record)
	{
		if($lastapprover==1){
			$this->db->query('UPDATE dm_timekeeping 
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,timekeepingstatus=2 WHERE timekeepingID='.$timekeepingID);
			
			$this->db->insert_batch('dm_timekeepingreport',$record);

	        $query = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);

	        if($query->row()->payperiod==1){
	        	$month = date('m',strtotime($query->row()->datefrom));
				$year = date('y',strtotime($query->row()->datefrom));
	        	$lastday = date('t',strtotime($query->row()->datefrom));

	    		$datefrom 	= date_format(date_create($year."-".$month."-"."16"),"Y-m-d");
				$dateto   	= date_format(date_create($year."-".$month."-".$lastday),"Y-m-d");
				$payperiod 	= 2;
	        }else{
	        	$date = date('Y-m-d', strtotime('+1 month', strtotime($query->row()->datefrom)));

	        	$month = date('m',strtotime($date));
				$year = date('y',strtotime($date));

				$datefrom = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
				$dateto   = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");
				$payperiod = 1;
	        }

	        $data = array('timekeepingType'		=> 2,
	        			  'datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
		}else{
			$this->db->query('UPDATE dm_timekeeping 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE timekeepingID='.$timekeepingID);
		}

		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=2 AND approvalLevel='.$queryheader->row()->level);
		
        return array('timekeeping' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function submit_timekeeping($timekeepingID, $datesubmitted)
	{
		$querySubmit = $this->db->query('SELECT * FROM dm_timekeepingdetails WHERE timekeepingID='.$timekeepingID.' LIMIT 1');	 
		
		if($querySubmit->num_rows()===0){
			return array('timekeeping' => 0, 'error' => "Cannot submit, there's no existing time record!");
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 2,
	 				  'timekeepingstatus' => 1);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   

        $queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=2 AND approvalLevel='.$queryheader->row()->level);

        return array('timekeeping' => $queryheader->result(), 'approver' => $queryApprover->result());  
	}

	function cancel_timekeeping($timekeepingID)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'usersubmitted' => NULL,
	 				  'level' => 0,
	 				  'timekeepingstatus' => 0);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   	   	
	}

	function deny_timekeeping($timekeepingID,$reason)
	{
	 	$data = array('datesubmitted' 	=> NULL,
	 				  'reason' 			=> $reason,
	 				  'userdenied'		=> $this->session->userdata('employeeID'),
	 				  'datedenied' 		=> date("Y-m-d H:i:s"),
	 				  'level' 			=> 0,
	 				  'timekeepingstatus' => 3);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   	   	
	}

	function get_attendance($timesheetID)
	{
		$query = $this->db->query('SELECT *,t.timein AS "t_timein",
										    t.timeout AS "t_timeout",
										    r.rateDescription,
										    CONCAT(e.firstname," ",e.lastname) AS "validateusername"
										    FROM dm_timekeepingdetails AS t
								   LEFT JOIN dm_rate    AS r ON r.rateCode = t.rateCode 
								   LEFT JOIN dm_employee AS e ON e.employeeID = t.validateuser
								   WHERE t.timesheetID='.$timesheetID); 

		return $query->result();
	}

	function validate_attendance($timesheetID,$postTimein,$postTimeout,$remarks){
		$queryDetails = $this->db->query('SELECT * FROM dm_timekeepingdetails
										  WHERE timesheetID='.$timesheetID);

		$querySchedule = $this->db->query('SELECT postscheduleID,timein,timeout FROM dm_postschedule
										   WHERE clientID='.$queryDetails->row()->clientID.
										  ' AND  postID='.$queryDetails->row()->postID.
										  ' AND  timein="'.$postTimein.'"'.
										  ' AND  timeout="'.$postTimeout.'"'.
										  ' AND (weekstart<="'.$queryDetails->row()->datesched.'" AND weekend>="'.$queryDetails->row()->datesched.'")'); 
		
		if($querySchedule->num_rows()===0){

			if(date("w",strtotime($queryDetails->row()->datesched))==0){
				$weekstart = date("Y-m-d", strtotime('sunday this week', strtotime($queryDetails->row()->datesched))); 
			}else{
				$weekstart = date("Y-m-d", strtotime('sunday last week', strtotime($queryDetails->row()->datesched))); 

			}

			$weekend   = date("Y-m-d", strtotime('+6 day', strtotime($weekstart)));

			$data = array('clientID'	=> $queryDetails->row()->clientID,
						  'postID' 		=> $queryDetails->row()->postID,
						  'timein'	 	=> $postTimein,
						  'timeout'	 	=> $postTimeout,
						  'weekstart'	=> $weekstart,
						  'weekend'	 	=> $weekend
						 );

			$this->db->insert('dm_postschedule', $data);
			$postscheduleID = $this->db->insert_id();

		}else{
			$postscheduleID = $querySchedule->row()->postscheduleID;
		}

		$weekday = date('N',strtotime($queryDetails->row()->datesched));

		$data = array('postscheduleID'		=> $postscheduleID,
					  'employeeID' 			=> $queryDetails->row()->employeeID,
					  'weekday'	 			=> $weekday
					 );

		$this->db->insert('dm_postschedule_guard', $data);

		$data = array('validateuser'		=> $this->session->userdata('employeeID'),
					  'validatedate' 		=> date("Y-m-d H:i:s"),
					  'remarks'	 			=> $remarks
					 );

		$this->db->where("timesheetID",$timesheetID);  
    	$this->db->update("dm_timekeepingdetails", $data);  
	}

	function get_denied($timekeepingID)
	{
		$query = $this->db->query('SELECT CONCAT(dm_employee.firstname," ",dm_employee.lastname) AS "fullname",datedenied, reason 
								   FROM dm_timekeeping
								   INNER JOIN dm_employee ON dm_employee.employeeID = dm_timekeeping.userdenied 
								   WHERE dm_timekeeping.timekeepingID='.$timekeepingID); 

		return $query->result();
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

	function check_if_restday($employeeID,$day)
	{
		$query = $this->db->query('SELECT * FROM dm_schedule WHERE employeeID='.$employeeID.' AND restday='.$day); 

		return $query->num_rows();
	}

	function check_if_holiday($date)
	{
		$query = $this->db->query('SELECT * FROM dm_holiday WHERE holidaydate="'.$date.'"'); 

		if($query->num_rows()===0){
			return "";
		}else{
			return $query->row()->holidaytype;
		}
	}

	function check_schedule($timekeepingID)
	{
		$queryDetails = $this->db->query('SELECT * FROM dm_timekeepingdetails
										  WHERE dm_timekeepingdetails.timekeepingID='.$timekeepingID)->result();

		foreach ($queryDetails as $item){
			$weekday = date('N',strtotime($item->datesched));

			if($item->timeout!=NULL && $item->timein!=NULL){
				/*if($item->employeeID==17){*/
					$this->computeTime("checkschedule",$item->timekeepingID,$item->employeeID,$item->datesched,$item->timein,$item->timeout);
				/*}*/
			}
		}
	}

	function save_timein($timesheetID,$newtimein)
	{
		
	}

	function computeTime($transaction,$timekeepingID,$employeeID,$datesched,$timein,$timeout){
		$formatDate = date('Y',strtotime($datesched)).'-'.
					  date('m',strtotime($datesched)).'-'.
					  date('d',strtotime($datesched));

		if($transaction=="Upload"){
			if(trim(strtolower($timein))=="reset") {					
				$this->timekeeping->remove_timekeeping($employeeID,$formatDate);
				return;
			}
		}
	
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
		$column_datesched = strtotime($datesched);							
		$datesched = date('d',$column_datesched).'-'.
					 date('m',$column_datesched).'-'.
					 date('Y',$column_datesched);

		$column_timein  = strtotime($timein);
		$datetimein = date('d',$column_timein)	.'-'.
					  date('m',$column_timein)	.'-'.
					  date('Y',$column_timein)	.' '.
					  date('H',$column_timein)	.":".
					  date('i',$column_timein)	.":".
					  date('s',$column_timein);

		$column_timeout  = strtotime($timeout);
		$datetimeout = date('d',$column_timeout)	.'-'.
					   date('m',$column_timeout)	.'-'.
					   date('Y',$column_timeout)	.' '.
					   date('H',$column_timeout)	.":".
					   date('i',$column_timeout)	.":".
					   date('s',$column_timeout);
	/*********************** END *****************************/

	/************************** STAFF TIME IN*****************************/
		$weekday = date('N',strtotime($datesched));

		$tkType = 'Exist';

		if($tkType!="Exist"){
			$data = array(
		                'timekeepingID' 		=> $timekeepingID,
		                'employeeID' 			=> $employeeID,
		                'tkType'				=> $tkType,
		                'validateuser'			=> NULL,
		                'validatedate'			=> NULL,
		                'remarks'				=> NULL,
		                'datesched' 			=> date('Y-m-d', strtotime($datesched)),
		                'timein' 				=> date('Y-m-d H:i:s', strtotime($datetimein)),
		                'timeout' 				=> date('Y-m-d H:i:s', strtotime($datetimeout))
		    ); 

		    $result = $this->upload_timekeeping($data);
			return;
		}

		$staffTimeIn = date('m',$column_timein)	."/".
					   date('d',$column_timein)	."/".
					   date('Y',$column_timein)	." ".
					   date('H',$column_timein)	.":".
					   date('i',$column_timein)	.":".
					   date('s',$column_timein);


		$postTimeIn  = date('m',$column_timein)."/".
					   date('d',$column_timein)."/".
					   date('Y',$column_timein)." 08:00";
	/******************************** STAFF TIME OUT********************************/
		$staffTimeOut = date('m',$column_timeout)	."/".
					    date('d',$column_timeout)	."/".
					    date('Y',$column_timeout)	." ".
					    date('H',$column_timeout)	.":".
					    date('i',$column_timeout)	.":".
					    date('s',$column_timeout);


		$postTimeOut = date('m',$column_timeout)."/".
					   date('d',$column_timeout)."/".
					   date('Y',$column_timeout)." 17:00";

	/**************************COMPUTE REGULAR TIME*************************/
		$regularTime = date("m/d/Y H:i",strtotime($postTimeIn));
		$regularHour = date('H',strtotime($regularTime));
		$regularMin  = date('i',strtotime($regularTime));

	/******************************COMPUTE STAFF LATE*****************************/
		if($staffTimeIn>$postTimeIn){
			$diff_late = date_diff(date_create($postTimeIn),date_create($staffTimeIn));
			$late = $diff_late->h  + sprintf("%.2f", $diff_late->i / 60);

			$actualTimeIn = $staffTimeIn;
		}else{
			$actualTimeIn = $postTimeIn;
		}

		if($staffTimeOut>$postTimeOut){
			$actualTimeOut = $postTimeOut;
		}else{
			$actualTimeOut = $staffTimeOut;
		}

	/*********************COMPUTE STAFF REGULAR********************/
		$diff_rendered = 0;
		$actual_ot_hours = 0;
		$render_overtime_hours  = 0;

		$time_in 	= new DateTime(date("H:i:s",strtotime($actualTimeIn)));
	    $time_out 	= new DateTime(date("H:i:s",strtotime($actualTimeOut)));

	    $breakin 	= new DateTime('12:00 PM');
	    $breakout 	= new DateTime('1:00 PM');
	    $breakhours = 0;

        if ($time_in>=$breakin && $time_in<$breakout) {
            $interval = $time_in->diff($breakout);
            $breakhours += round($interval->s / 3600 + $interval->i / 60 + $interval->h,2);
        }
        else if ($time_out>$breakin && $time_out<=$breakout) {
            $interval = $time_out->diff($breakin);
            $breakhours += round($interval->s / 3600 + $interval->i / 60 + $interval->h,2);
        }
        else if ($time_in<=$breakin && $time_out>=$breakout) {
            $interval = $breakin->diff($breakout);
            $breakhours += round($interval->s / 3600 + $interval->i / 60 + $interval->h,2);
        }

        $interval = $time_in->diff($time_out);
        $stayhours = round($interval->s / 3600 + $interval->i / 60 + $interval->h,2);

        $render_regular_hours = $stayhours - $breakhours;

        if($breakhours==1){
        	$actual_regular_hours = sprintf("%02d",$interval->h-$breakhours).":". str_pad($interval->i, 2, "0", STR_PAD_LEFT);
        }else{
        	$actual_regular_hours = sprintf("%02d",$interval->h).":". str_pad(round($interval->i/60,2)-$breakhours, 2, "0", STR_PAD_LEFT);
        }

       /* echo $stayhours.'<br>';
        echo $render_regular_hours.'<br>';
        echo $breakhours.'<br>';
        
        echo $interval->i.'<br>';
        echo round($interval->i/60,2)-$breakhours.'<br>';

        exit;*/

		/*$diff_rendered = date_diff(date_create($actualTimeIn),date_create($actualTimeOut));

		if($diff_rendered->h>8){
			if($actualTimeOut>=$postTimeOut){
				$diff_rendered = date_diff(date_create($actualTimeIn),date_create($postTimeOut));
			}

			if($diff_rendered->h>8){
				$render_regular_hours = sprintf("%02d",8);
				$actual_regular_hours = '08:00';

				$actual_ot_hours = ($diff_rendered->h-8).":". str_pad($diff_rendered->i, 2, "0", STR_PAD_LEFT);
				$render_overtime_hours  = sprintf("%02d",($diff_rendered->h-8)) + sprintf("%.2f",$diff_rendered->i / 60);
			}else{
				$render_regular_hours = sprintf("%02d",$diff_rendered->h) + sprintf("%.2f",$diff_rendered->i / 60);
				$actual_regular_hours = sprintf("%02d",$diff_rendered->h).":". str_pad($diff_rendered->i, 2, "0", STR_PAD_LEFT);
			}
		}else{
			$render_regular_hours = sprintf("%02d",$diff_rendered->h) + sprintf("%.2f",$diff_rendered->i / 60);
			$actual_regular_hours = sprintf("%02d",$diff_rendered->h).":". str_pad($diff_rendered->i, 2, "0", STR_PAD_LEFT);
		}*/

	/************************COMPUTE TOTAL HOURS**********************/
		/*$diff_total_hours = date_diff(date_create($actualTimeIn),date_create($actualTimeOut));
		$render_total_hours = $diff_total_hours->h.":". str_pad($diff_total_hours->i, 2, "0", STR_PAD_LEFT);*/

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
		$return_holiday=$this->check_if_holiday(date('Y-m-d', strtotime($datetimein)));

			 if($return_holiday=="Regular Holiday") $dayType = "rgl";
		else if($return_holiday=="Special Holiday") $dayType = "spc";
		else if($return_holiday=="Double Holiday")  $dayType = "dbl";

	/************************ CHECK IF RESTDAY **********************/
		$return_restday=$this->check_if_restday($employeeID,date('N', strtotime($datetimein)));

		/*if($return_restday) $dayType .="rst";*/ /* COMMENTED DUE TO: NO RESTDAY PAY FOR STAFF */

	/************************ OUTPUT **********************/
		if($dayType=="") $dayType = "ord";

		$lateType 	= $dayType.'late';
		$OTType 	= $dayType.'ot';
		$NightType  = $dayType.'night';

		/*
		            'validatedate' => NULL,
		            'remarks'	   => NULL,*/
    	$data = array(
                'timekeepingID' 		=> $timekeepingID,
                'employeeID' 			=> $employeeID,
                'rateCode'				=> $dayType,
                'tkType'				=> $tkType,
                'datesched' 			=> date('Y-m-d', strtotime($datesched)),
                'timein' 				=> date('Y-m-d H:i:s', strtotime($datetimein)),
                'timeout' 				=> date('Y-m-d H:i:s', strtotime($datetimeout)),
                'post_timein' 			=> date('H:i:s', strtotime($postTimeIn)),
                'post_timeout' 			=> date('H:i:s', strtotime($postTimeOut)),
                'actualhours' 			=> $actual_regular_hours,
                $lateType 				=> $late,

                'actual_regular_hours' 	=> $actual_regular_hours,
                $dayType				=> $render_regular_hours,

                'actual_ot_hours'		=> $actual_ot_hours,
                $OTType					=> $render_overtime_hours,

                'actual_nightdiff_hours' => $actual_nightdiff_hours,
                $NightType				 => $render_night_hours
    	); 

    	if($transaction=="Upload"){
	    	$data+=['validateuser' => NULL];
	    	$data+=['validatedate' => NULL];
	    	$data+=['remarks' => NULL];
    	}

   		$result = $this->upload_timekeeping($data);
	}
}
?>