<?php 
   class SSSreport extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('SSSreport_model');  
	  		$this->sssreport = new SSSreport_model;     
		}

		public function index() 
		{
	  		$data = array('title' => 'SSS Premium Payment');
       		$data['data']=$this->sssreport->get_all();

			$this->load->view('Template/Header',$data);
			if(isAllowed(24) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("SSSreport/Index",$data);
						 else $this->load->view("Denied/Index");
			$this->load->view('Template/Footer',$data);
		}

		public function preview() 
		{ 

			$data = array('title' => 'Report');
			$id = $this->input->get('id');
			$prdateto = $this->input->get('prdateto');
			$data['data']=$this->sssreport->get_details($id, $prdateto);
			$this->load->view("SSSreport/Report", $data);
		}
	}     
?>
