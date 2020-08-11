<?php 
   class Profile extends CI_Controller { 
   		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Profile_model');  
	  		$this->profile = new Profile_model;     
		} 
     
		public function index() 
		{ 
			$data = array('title' => 'Profile');

			$data['data']=$this->profile->get_leave();

			$this->load->view('Template/Header',$data);

			if(isAllowed(2) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Profile/Index",$data);
						else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
