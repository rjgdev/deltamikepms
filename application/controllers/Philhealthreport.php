<?php 
   class Philhealthreport extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Philhealthreport_model');  
	  		$this->philhealthreport = new Philhealthreport_model;     
		}

		public function index() 
		{
	  		$data = array('title' => 'PHIC Premium Payment');
       		$data['data']=$this->philhealthreport->get_all();
	  		
			$this->load->view('Template/Header',$data);
			
			if(isAllowed(23)) $this->load->view("Philhealthreport/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}

		public function preview() 
		{ 

			$data = array('title' => 'Report');
			$id = $this->input->get('month');
			$payrolldetailsID = $this->input->get('year');
			$data['data']=$this->philhealthreport->get_details($id, $payrolldetailsID);
			$this->load->view("Philhealthreport/Report", $data);
		}
	}     
?>
