	<?php 
   class Retirementprocess extends CI_Controller {  

		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Retirementprocess_model');  
	  		$this->Retirementprocess = new Retirementprocess_model;     
		}
		public function index()
			
		{ 
	  		$data = array('title' => 'Retirement Process');
	  		$data['data']=$this->Retirementprocess->get_all_Retirementprocess("");
			$this->load->view('Template/Header',$data);

			if(isAllowed(18) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Retirementprocess/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}
		public function search_Retirement()
		{
			$id = $this->input->post('id');
			$employee = $this->input->post('employee');
			$data=$this->Retirementprocess->get_all_Retirementemployee($id,$employee);
			echo json_encode($data);

		}
		public function submit() 
		{ 
			$retirementID = $this->input->post('retirementID');
        	$result = $this->Retirementprocess->submit_Retirementprocess($retirementID, date("Y-m-d H:i:s"));
        	echo json_encode($result);

		}
		public function cancel() 
		{ 
			$retirementID = $this->input->post('retirementID');
        	$this->Retirementprocess->cancel_Retirement($retirementID);
		}
		public function deny() 
		{ 
			$retirementID = $this->input->post('retirementID');
			$reason = $this->input->post('reason');
        	$this->Retirementprocess->deny_Retirementprocess($retirementID,$reason);
		}
		public function approve() 
		{ 
			$retirementID = $this->input->post('retirementID');
			$lastapprover = $this->input->post('lastapprover');
			
        	$result = $this->Retirementprocess->approve_Retirementprocess($retirementID, date("Y-m-d"),$lastapprover);
        	     	
        	echo json_encode($result);
		}

		public function getdenied() 
		{ 
			$retirementID   = $this->input->post('retirementID');
       		$data=$this->Retirementprocess->get_denied($retirementID);
       	
       		echo json_encode($data);
   		}





	}	