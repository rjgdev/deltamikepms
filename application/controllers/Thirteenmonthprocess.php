<?php 
   class Thirteenmonthprocess extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Thirteenmonthprocess_model');  
  		$this->Thirteenmonthprocess = new Thirteenmonthprocess_model;     
	}
 
	public function index() 
	{ 
  		$data = array('title' => '13th Month Process');
  		$data['data']=$this->Thirteenmonthprocess->get_all_thirteenmonthprocess("");
		$this->load->view('Template/Header',$data);

		if(isAllowed(16)) $this->load->view("Thirteenmonthprocess/Index",$data);
				     else $this->load->view("Denied/Index");

		$this->load->view('Template/Footer',$data);
	}
		public function get_client()
		{
			$client				= 		$this->input->post('id');
			$data   			= 		$this->Thirteenmonthprocess->get_clientdata($client);


			echo json_encode($data);  

		}

		public function search_Thirteenmonthprocess()
		{
			$thrmonthID = $this->input->post('id');
			$sddlmonth = $this->input->post('sddlmonth');
			$sddlyear = $this->input->post('sddlyear');
			$eddlmonth = $this->input->post('eddlmonth');
			$eddlyear = $this->input->post('eddlyear');
			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');
			$searchdetachment = $this->input->post('searchdetachment');
			$data = $this->Thirteenmonthprocess->search($thrmonthID, $sddlmonth,$sddlyear,$eddlmonth,$eddlyear);
			$this->session->set_flashdata('empstatus', 'empsuccess'); 
			echo json_encode($data);

		}

		public function submit() 
		{ 
			$thrmonthID = $this->input->post('thrmonthID');
        	$result = $this->Thirteenmonthprocess->submit_Thirteenmonth($thrmonthID, date("Y-m-d H:i:s"));
        	echo json_encode($result);

		}
		public function cancel() 
		{ 
			$thrmonthID = $this->input->post('thrmonthid');
        	$this->Thirteenmonthprocess->cancel_Thirteenmonth($thrmonthID);
		}
		public function approve() 
		{ 
			$thrmonthID = $this->input->post('thrmonthid');
			$lastapprover = $this->input->post('lastapprover');
			
        	$result = $this->Thirteenmonthprocess->approve_Thirteenmonth($thrmonthID, date("Y-m-d"),$lastapprover);
        	
        	
        	echo json_encode($result);
		}
		public function deny() 
		{ 
			$thrmonthID = $this->input->post('thrmonthID');
			$reason = $this->input->post('reason');
        	$this->Thirteenmonthprocess->deny_Thirteenmonthprocess($thrmonthID,$reason);
		}

		public function getdenied() 
		{ 
			$thrmonthID   = $this->input->post('thrmonthID');

       		$data=$this->Thirteenmonthprocess->get_denied($thrmonthID);

       		echo json_encode($data);
   		}


}	