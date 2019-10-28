<?php 
   class Employees extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'All Employees');

			$this->load->view('Template/Header',$data);
			$this->load->view("Employees/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
