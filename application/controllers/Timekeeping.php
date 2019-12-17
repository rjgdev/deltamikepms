<?php 
   class Timekeeping extends CI_Controller {  
     
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Timesheet_model');  
	  		$this->timesheet = new Timesheet_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timesheet');

	  		$data['data']=$this->timesheet->get_timesheet();

			$this->load->view('Template/Header',$data);
			$this->load->view("Timekeeping/Timesheet",$data);
			$this->load->view('Template/Footer',$data);
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
