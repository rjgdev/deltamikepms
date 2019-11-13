<?php 
   class Profile extends CI_Controller {  
     
		public function index() 
		{ 
			$data = array('title' => 'Profile');

			$this->load->view('Template/Header',$data);

			if(isAllowed(2)) $this->load->view("Profile/Index",$data);
						else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
