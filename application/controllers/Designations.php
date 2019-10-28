<?php 
   class Designations extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Designations');

			$this->load->view('Template/Header',$data);
			$this->load->view("Designation/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
