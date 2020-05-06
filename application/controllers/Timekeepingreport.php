<?php 
   class Timekeepingreport extends CI_Controller {  
     
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Timekeepingreport_model');  
	  		$this->timekeepingreport = new Timekeepingreport_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timekeeping Report');

	  		$data["client"]=$this->timekeepingreport->get_client();

	  		$data['data']=$this->timekeepingreport->get_timekeeping();

			$this->load->view('Template/Header',$data);

			if(isAllowed(9)) $this->load->view("Timekeepingreport/Index",$data);
				        else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function loadpost() 
		{ 
			$clientID = $this->input->post('clientID');

       		$data=$this->timekeepingreport->get_post($clientID);

			echo json_encode($data);
		}

		public function viewreport() 
		{ 
			$timekeepingID = $this->input->post('timekeepingID');
			$clientID = $this->input->post('clientID');
			$postID = $this->input->post('postID');

       		$data=$this->timekeepingreport->view_report($timekeepingID,$clientID,$postID);

			echo json_encode($data);
		}
	}     
?>
