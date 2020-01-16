<?php 
   class Timekeeping extends CI_Controller {  
     
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Timekeeping_model');  
	  		$this->timekeeping = new Timekeeping_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timekeeping');

	  		$data['data']=$this->timekeeping->get_timekeeping("");

			$this->load->view('Template/Header',$data);
			$this->load->view("Timekeeping/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function uploadTimekeeping(){
			$timekeepingID = $this->input->post('timekeepingID');
			$message = "";
			$type  = "";

			if ($_FILES["file"]["tmp_name"]!="") {
			    $fileName = $_FILES["file"]["tmp_name"];

			    if ($_FILES["file"]["size"] > 0) {
			        
			        $file = fopen($fileName, "r");

			        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			        	$var = $column[1];
						$date = str_replace('/', '-', $var);

			            $data = array(
				                    'timekeepingID' 	=> $timekeepingID,
				                    'employeeID' 		=> $column[0],
				                    'datesched' 		=> date('Y-m-d', strtotime($date)),
				                    'regularhours' 		=> $column[2],
				                    'regholidayhours' 	=> $column[3],
				                    'speholidayhours' 	=> $column[4],
				                    'latehours' 		=> $column[5],
				                    'absent' 			=> $column[6],
				                    'othours' 			=> $column[7],
				                    'restot' 			=> $column[8],
				                    'specialot' 		=> $column[9],
				                    'specialrestot' 	=> $column[10],
				                    'regularot' 		=> $column[11],
				                    'regularrestot' 	=> $column[12],
				                    'doubleot' 			=> $column[13],
				                    'doublerestot' 		=> $column[14],
				                    'nightdiff' 		=> $column[15]
		                ); 

			            $result = $this->timekeeping->upload_timekeeping($data);
			        }
			    }
				
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
	}     
?>
