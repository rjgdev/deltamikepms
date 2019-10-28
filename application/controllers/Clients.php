<?php 
   class Clients extends CI_Controller {  
     
		public function index() 
		{ 
	  		$data = array('title' => 'Clients');

			$this->load->view('Template/Header',$data);
			$this->load->view("Client/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
