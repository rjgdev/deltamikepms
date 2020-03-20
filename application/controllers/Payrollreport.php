<?php 
   class Payrollreport extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payrollreport_model');  
	  		$this->payrollreport = new Payrollreport_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Payroll Peport');
	  		$data['data']=$this->payrollreport->get_all_payroll();
			$this->load->view('Template/Header',$data);

			if(isAllowed(14)) $this->load->view("Payrollreport/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function get_client()
		{
			$client				= 		$this->input->post('id');
			$data   			= 		$this->payrollreport->get_clientdata($client);

			echo json_encode($data);  
		}

		public function search_payroll()
		{
			$searchpayperiod = $this->input->post('searchpayperiod');
			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');
			$searchdetachment = $this->input->post('searchdetachment');
			$data = $this->payrollreport->search($searchpayperiod,$searchemployeetype,$searchclient,$searchdetachment);
/*			$this->load->view('Template/Header',$data);
			$this->load->view("Payrollreport/Index",$data);
			$this->load->view('Template/Footer',$data);*/
			echo json_encode($data);

		}
	}	