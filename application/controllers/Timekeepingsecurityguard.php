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
		        	    if($column[0]==NULL) continue;

		        	    	if(trim(strtolower($column[2]))=="reset") {
	        	    			$column3 = "";
	        	    			$column4 = "";
	        	    			$column5 = "";
	        	    		}else{
	        	    			$column3 = $column[3];
	        	    			$column4 = $column[4];
	        	    			$column5 = $column[5];
	        	    		}
		        	    	$this->timekeeping->computeTime("Upload",
		        	    									$timekeepingID,
		        	    									$column[0],
	        	    										$column[1],
	        	    										$column[2],
	        	    										$column3,
	        	    										$column4,
	        	    										$column5);
			        }
			    }
				
				$this->session->set_flashdata('uploaded', $file_name); 
				echo json_encode($this->timekeeping->get_timekeeping($timekeepingID));
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
	}     
?>
