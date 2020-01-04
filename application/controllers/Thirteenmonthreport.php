<?php 
   class Thirteenmonthreport extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Thirteenmonthreport_model');  
  		$this->Thirteenmonthreport = new Thirteenmonthreport_model;     
		}
		public function index() 
		{ 
	  		$data = array('title' => 'Thirteen month report');
	  		$data['data']=$this->Thirteenmonthreport->get_all_Thirteenmonthreport();
			$this->load->view('Template/Header',$data);
			$this->load->view("Thirteenmonthreport/Index",$data);
			$this->load->view('Template/Footer',$data);
		}
		public function get_client()
		{
			$client				= 		$this->input->post('id');
			$data   			= 		$this->Thirteenmonthreport->get_clientdata($client);


			echo json_encode($data);  

		}
		public function recorddata()
		{

			$data = array('title' => 'Thirteen month report Record');
				$auth = $this->input->get('auth');
				$id = $this->input->get('id');
				$data['data']=$this->Thirteenmonthreport->get_recorddata($id);
				$this->load->view('Template/Printstyle',$data);
				$this->load->view('Thirteenmonthreport/recorddata',$data);
				$this->load->view('Template/Footer',$data);
			
	}

	}	