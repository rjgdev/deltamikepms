<?php 
   class Timekeepingstaff extends CI_Controller {  
     
     	public function __construct() {
			parent::__construct(); 
			$this->load->model('Timekeepingstaff_model');  
	  		$this->timekeeping = new Timekeepingstaff_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timekeeping (Staff)');

	  		$data['data']=$this->timekeeping->get_timekeeping("");

			$this->load->view('Template/Header',$data);

			if(isAllowed(8) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Timekeepingstaff/Index",$data);
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
		        	    if($column[0]==NULL) continue;

		        	    	if(trim(strtolower($column[2]))=="reset") {
	        	    			$column3 = "";
	        	    		}else{
	        	    			$column3 = $column[3];
	        	    		}
		        	    	$this->timekeeping->computeTime("Upload",
		        	    									$timekeepingID,
		        	    									$column[0],
	        	    										$column[1],
	        	    										$column[2],
	        	    										$column3);
			        }
			    }
				
				$this->session->set_flashdata('uploaded', $file_name); 
				echo json_encode($this->timekeeping->get_timekeeping($timekeepingID));
			}
		}

		public function approve() 
		{ 
			$timekeepingID 	= $this->input->post('timekeepingID');
			$lastapprover 	= $this->input->post('lastapprover');
			$attendance 	= $this->input->post('attendance');
			$dayfrom 		= $this->input->post('dayfrom');
			$dayto 			= $this->input->post('dayto');
			$record  		= array();
			$ctr = 0;

			if($lastapprover==1){
				for($i=0;$i<count($attendance);$i++){
					$array_d = array();
					$ctr = 0;

					for($x=0;$x<=30;$x++){
						$array_d[$x] = '';
					}

					for($day=$dayfrom;$day<=$dayto;$day++){
						$ctr++;
						$array_d[$day-1] = $attendance[$i][$ctr + 1];
					}

					$record[$i] = array ('employeeID'    =>	$attendance[$i][0], 
										 'timekeepingID' =>	$attendance[$i][1], 
										 'd1'  => $array_d[0] ,  'd2'  => $array_d[1],  'd3'  => $array_d[2] ,  'd4'  => $array_d[3],  'd5'  => $array_d[4],
										 'd6'  => $array_d[5] ,  'd7'  => $array_d[6],  'd8'  => $array_d[7] ,  'd9'  => $array_d[8],  'd10' => $array_d[9],
										 'd11' => $array_d[10] , 'd12' => $array_d[11], 'd13' => $array_d[12] , 'd14' => $array_d[13], 'd15' => $array_d[14],
										 'd16' => $array_d[15] , 'd17' => $array_d[16], 'd18' => $array_d[17] , 'd19' => $array_d[18], 'd20' => $array_d[19],
										 'd21' => $array_d[20] , 'd22' => $array_d[21], 'd23' => $array_d[22] , 'd24' => $array_d[23], 'd25' => $array_d[24],
										 'd26' => $array_d[25] , 'd27' => $array_d[26], 'd28' => $array_d[27] , 'd29' => $array_d[28], 'd30' => $array_d[29],
										 'd31' => $array_d[30] , 'totalhours' => $attendance[$i][count($attendance[$i])-5]   , 'basichours' =>  $attendance[$i][count($attendance[$i])-4], 'othours' =>  $attendance[$i][count($attendance[$i])-3], 'restday' =>  $attendance[$i][count($attendance[$i])-2],  'totaldays' =>  $attendance[$i][count($attendance[$i])-1]);
				}
			}
			
			
        	$result = $this->timekeeping->approve_timekeeping($timekeepingID, date("Y-m-d"),$lastapprover,$record);	
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

   		public function validateattendance() 
		{ 
			$timesheetID = $this->input->post('timesheetID');
			$postTimein  = $this->input->post('postTimein');
			$postTimeout = $this->input->post('postTimeout');
			$remarks   	 = $this->input->post('remarks');

       		$data=$this->timekeeping->validate_attendance($timesheetID,$postTimein,$postTimeout,$remarks);

       		$this->session->set_flashdata('validated', 'success'); 
       		echo json_encode($data);
   		}

   		public function savetimein() 
		{ 
			$timesheetID = $this->input->post('timesheetID');
			$newtimein  = $this->input->post('newtimein');

       		$data=$this->timekeeping->save_timein($timesheetID,$newtimein);
       		
       		echo json_encode($data);
   		}
	}     
?>
