<?php 
   class Holidays extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Holidays');

			$this->load->view('Template/Header',$data);
			$this->load->view("Holiday/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
