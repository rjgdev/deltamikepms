<?php 
   class Billing extends CI_Controller {  

		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Billing_model');  
	  		$this->billing = new Billing_model;     
		}
		public function index() 
		{ 
	  		$data = array('title' => 'Billing Statement');
	  		$data['data']=$this->billing->get_all_billing();
			$this->load->view('Template/Header',$data);
			$this->load->view("Billing/Index",$data);
			$this->load->view('Template/Footer',$data);
		}
		public function get_detachment()
		{

			$detachment				= 		$this->input->post('id');
			$data   				= 		$this->billing->get_detachment($detachment);


			echo json_encode($data); 

		}
		public function billingreport()
		{
			$searchdate				= 		$this->input->post('searchdate');
			$searchclient			= 		$this->input->post('searchclient');
			$searchdetachment		= 		$this->input->post('searchdetachment');
			$data   				= 		$this->billing->get_records($searchdate, $searchclient, $searchdetachment);

			echo json_encode($data); 

		}
	}	