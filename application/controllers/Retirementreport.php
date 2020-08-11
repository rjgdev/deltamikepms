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

			if(isAllowed(19) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Retirementreport/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);

		}
		public function search_Retirementreport()

		{
			$employee = $this->input->post('arrayemployee');
			$data=$this->Retirementreport->get_all_Retirement($employee);
			echo json_encode($data);

		}
		public function employeerecorddata()
		{
				$data = array('title' => 'Individual Retirement Report');
				$employee = $this->input->get('employee');
				$data['data'] = $this->Retirementreport->searchemployeerecord($employee);
				$this->load->view('Template/Printstyle',$data);
				$this->load->view('Retirementreport/employeerecorddata',$data);
				$this->load->view('Template/Footer',$data);
		}
		public function summaryemployeerecord()
		{
			$data = array('title' => 'Summarized Retirement Report');
			$employee = $this->input->get('employee');
			$data['data'] = $this->Retirementreport->searchemployeefullrecord($employee);
			$this->load->view("Template/Printstyle", $data);
			$this->load->view('Retirementreport/summaryemployeerecord', $data);
			$this->load->view('Template/Footer', $data);

		}
	}	 