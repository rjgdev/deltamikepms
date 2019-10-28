<?php 
   class Leavetype extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Leave Type');

			$this->load->view('Template/Header',$data);
			$this->load->view("Leavetype/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
