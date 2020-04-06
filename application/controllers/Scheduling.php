<?php 
   class Scheduling extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Postscheduling_model');  
	  		$this->schedule = new Postscheduling_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Post Scheduling');

       		$data["data"]=$this->schedule->get_client();

			$this->load->view('Template/Header',$data);

			if(isAllowed(12)) $this->load->view("Postscheduling/Index",$data);
						 else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 

		public function loadguard() 
		{ 
			$postID 	 	= $this->input->post('postID');
			$postType 	 	= $this->input->post('postType');
			$postType 		= $this->input->post('postType');
			$scheduleDay 	= $this->input->post('scheduleDay');
			$postscheduleID = $this->input->post('postscheduleID');

       		$data=$this->schedule->load_guard($postID,$postType,$scheduleDay,$postscheduleID);

			echo json_encode($data);
		}

		public function saveguard() 
		{ 
			$postID 	 	= $this->input->post('postID');
			$postType 	 	= $this->input->post('postType');
			$scheduleDay 	= $this->input->post('scheduleDay');
			$employeeID  	= $this->input->post('employeeID');
			$postscheduleID = $this->input->post('postscheduleID');

       		$data=$this->schedule->save_guard($postID, $postType, $scheduleDay, $employeeID,$postscheduleID);
		}

		public function searchschedule() 
		{ 
			$clientID = $this->input->post('clientID');
			$postID = $this->input->post('postID');
			$weekstart = $this->input->post('weekstart');
			$weekend = $this->input->post('weekend');

       		$data=$this->schedule->get_schedule($clientID,$postID,$weekstart,$weekend);

			echo json_encode($data);
		}

		public function loadpost() 
		{ 
			$clientID = $this->input->post('clientID');

       		$data=$this->schedule->get_post($clientID);

			echo json_encode($data);
		}
	}     
?>
