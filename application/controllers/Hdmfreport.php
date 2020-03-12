<?php 
   class Hdmfreport extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Hdmfreport_model');  
	  		$this->hdmfreport = new Hdmfreport_model;     
		}

		public function index() 
		{
	  		$data = array('title' => 'HDMF Premium Payment');
       		$data['data']=$this->hdmfreport->get_all();
	  		
			$this->load->view('Template/Header',$data);
			if(isAllowed(22)) $this->load->view("Hdmfreport/Index",$data);
						else $this->load->view("Denied/Index");
			$this->load->view('Template/Footer',$data);
		}

		public function preview() 
		{ 

			$data = array('title' => 'Report');
			$month = $this->input->get('month');
			$year = $this->input->get('year');
			$data['data']=$this->hdmfreport->get_details($month, $year);
			$this->load->view("Hdmfreport/Report", $data);
		}
	}     
?>
