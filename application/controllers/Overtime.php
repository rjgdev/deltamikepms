<?php 
   class Overtime extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Overtime');

			$this->load->view('Template/Header',$data);
			$this->load->view("Overtime/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
