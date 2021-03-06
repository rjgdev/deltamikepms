<?php 
   class Billingprocess extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Billingprocess_model');  
  		$this->Billingprocess = new Billingprocess_model;     
	}
 
	public function index() 
	{ 
  		$data = array('title' => 'Billing Statement Process');
  		$data['data']=$this->Billingprocess->get_all_billingprocess("");
		$this->load->view('Template/Header',$data);
		 if(isAllowed(20) || $this->session->userdata('accountype')=="bcgiadmin")$this->load->view("Billingprocess/Index",$data);
		   else $this->load->view("Denied/Index");

		  $this->load->view('Template/Footer',$data);

	}
	public function search_Billingprocess()
	{
			$billingID = $this->input->post('id');
			$clientID = $this->input->post('clientID');
			$payrolldateID = $this->input->post('payrolldateID');
			$data = $this->Billingprocess->search($billingID, $clientID,$payrolldateID);
			$this->session->set_flashdata('billing', 'success'); 
			echo json_encode($data);

		}

	public function submit() 
		{ 
			$billingID = $this->input->post('billingID');
        	$data = $this->Billingprocess->submit_Billingstatement($billingID, date("Y-m-d H:i:s"));
        	
        	echo json_encode($data);

		}	
		public function cancel()
		{

			$billingID = $this->input->post('billingid');
        	$this->Billingprocess->cancel_Billingprocess($billingID);
		}

		public function approve() 
		{ 
			$billingID = $this->input->post('billingid');
			$lastapprover = $this->input->post('lastapprover');
			
        	$data = $this->Billingprocess->approve_Billingstatement($billingID, date("Y-m-d"),$lastapprover);
        	
        	echo json_encode($data);
		}
		public function deny()
		{
			$billingID = $this->input->post('billingID');
			$reason = $this->input->post('reason');
        	$response = $this->Billingprocess->deny_Billingstatementprocess($billingID,$reason);
			echo json_encode($response);

        	/*echo json_encode($data);*/

		}
		public function getdenied() 
		{ 
			$billingID   = $this->input->post('billingID');

       		$data=$this->Billingprocess->get_denied($billingID);

       		echo json_encode($data);
   		}

	}	