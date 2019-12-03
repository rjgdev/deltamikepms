<?php 
   class Dashboard extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Dashboard_model');  
	  		$this->dashboard = new Dashboard_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Dashboard');

       		$data['data']=$this->dashboard->get_all();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(1)) $this->load->view("Dashboard/Index",$data);
						else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}
	}     
?>
