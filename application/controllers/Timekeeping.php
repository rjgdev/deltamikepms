<?php 
   class Timekeeping extends CI_Controller {  
     
		public function timesheet() 
		{ 
	  		$data = array('title' => 'Timesheet');

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
