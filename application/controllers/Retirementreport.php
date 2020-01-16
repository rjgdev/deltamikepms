<?php 
   class Retirementreport extends CI_Controller {  

		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Retirementreport_model');  
	  		$this->Retirementreport = new Retirementreport_model;     
		}
		public function index()
			
		{
			$data = array('title' => 'Retirement Report');
	  		$data['data']=$this->Retirementreport->get_all_Retirementreport();
			$this->load->view('Template/Header',$data);
			$this->load->view("Retirementreport/Index",$data);
			$this->load->view('Template/Footer',$data);

		}
		public function search_Retirementreport()

		{
			$employee = $this->input->post('arrayemployee');
			$data=$this->Retirementreport->get_all_Retirement($employee);
			echo json_encode($data);

		}
	}	 