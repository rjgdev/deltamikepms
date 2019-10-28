<?php 
   class Company extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Company Profile');

			$this->load->view('Template/Header',$data);
			$this->load->view("Company/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
