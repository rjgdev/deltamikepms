<?php 
   class Roles extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Roles & Permissions');

			$this->load->view('Template/Header',$data);
			$this->load->view("Roles/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
