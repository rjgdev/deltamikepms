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

			if(isAllowed(12) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Postscheduling/Index",$data);
						 else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 

		public function loadguard() 
		{ 
			$clientID 	 	= $this->input->post('clientID');
			$postID 	 	= $this->input->post('postID');
			$weekstart 	 	= $this->input->post('weekstart');
			$weekend 		= $this->input->post('weekend');

       		$data=$this->schedule->load_guard($clientID,$postID,$weekstart,$weekend);

			echo json_encode($data);
		}

		public function saveguard() 
		{ 
			$postscheduleID = $this->input->post('postscheduleID');
			$weekday 	 	= $this->input->post('weekday');
			$employeeID 	= $this->input->post('employeeID');

       		$data=$this->schedule->save_guard($postscheduleID, $weekday, $employeeID);

       		echo json_encode($data);
		}

		public function removeguard() 
		{ 
			$postscheduleID = $this->input->post('postscheduleID');
			$weekday 	 	= $this->input->post('weekday');
			$employeeID 	= $this->input->post('employeeID');

       		$data=$this->schedule->remove_guard($postscheduleID, $weekday, $employeeID);

       		echo json_encode($data);
		}

		public function searchschedule() 
		{ 
			$clientID 	= $this->input->post('clientID');
			$postID 	= $this->input->post('postID');
			$weekstart 	= $this->input->post('weekstart');
			$weekend 	= $this->input->post('weekend');

       		$data=$this->schedule->get_schedule($clientID,$postID,$weekstart,$weekend);

			echo json_encode($data);
		}

		public function loadpost() 
		{ 
			$clientID = $this->input->post('clientID');

       		$data=$this->schedule->get_post($clientID);

			echo json_encode($data);
		}

		public function savesched() 
		{ 
			$clientID 	= $this->input->post('clientID');
			$postID 	= $this->input->post('postID');
			$weekstart 	= $this->input->post('weekstart');
			$weekend 	= $this->input->post('weekend');
			$timein 	= $this->input->post('timein');
			$timeout 	= $this->input->post('timeout');

       		$data=$this->schedule->save_sched($clientID, $postID, $weekstart, $weekend, $timein, $timeout);

       		echo json_encode($data);
		}

		public function removesched() 
		{ 
			$postscheduleID = $this->input->post('postscheduleID');

       		$data=$this->schedule->remove_sched($postscheduleID);

       		echo json_encode($data);
		}
	}     
?>
