<?php 
   class Leaves extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Leaves');

			$this->load->view('Template/Header',$data);
			$this->load->view("Leaves/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
