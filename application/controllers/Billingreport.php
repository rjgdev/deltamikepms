<?php 
   class Billingreport extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Billingreport_model');  
  		$this->Billingreport = new Billingreport_model;     
	}
	public function index() 
	{ 
  		$data = array('title' => 'Biling Statement Report');
  		$data['data']=$this->Billingreport->get_all_billingreport("");
		$this->load->view('Template/Header',$data);
		 if(isAllowed(21))$this->load->view("Billingreport/Index",$data);
		   else $this->load->view("Denied/Index");

		  $this->load->view('Template/Footer',$data);

	}
	public function get_client()
	{
		$client				= 		$this->input->post('id');
		$data   			= 		$this->Billingreport->get_clientdata($client);

		echo json_encode($data);  
	}
	public function get_detachment()
	{

		$detachment			= 		$this->input->post('id');
		$data   			= 		$this->Billingreport->get_detachmenttdata($detachment);

		echo json_encode($data); 

	}
	public function search_Billingreport()
	{
		$billingperiod				= 		$this->input->post('billingperiod');
		$clientID					= 		$this->input->post('clientID');
		$detachmentID				= 		$this->input->post('detachmentID');
		$data   					= 		$this->Billingreport->get_billingreport($billingperiod, $clientID, $detachmentID);

		echo json_encode($data);  

	}
	public function Billingclient()
		{
			$data = array('title' => 'Individual Billing Statement');
			$payrollID 				= $this->input->get('payrollID');
			$client 				= $this->input->get('client');
			$post 					= $this->input->get('post');
			$data['data']			= $this->Billingreport->Billingclientrecord($payrollID, $client, $post);
			$this->load->view("Template/Printstyle", $data);
			$this->load->view("Billingreport/Clientrecord",$data);
			$this->load->view('Template/Footer', $data);
		}

}	