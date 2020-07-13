<?php 
   class Generatepayslip extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Generatepayslip_model');  
	  		$this->generatepayslip = new Generatepayslip_model;     
		}

		public function index() 
		{
	  		$data = array('title' => 'Generate Payslip');

	  		$data['data']=$this->generatepayslip->get_all();

	  		if(isset($_POST['id']) || isset($_POST['type']) || isset($_POST['client'])){
				$id = $this->input->post('id');
				$type = $this->input->post('type');
				$client = $this->input->post('client');

       			$data=$this->generatepayslip->search_payperiod($id, $type, $client);
       			echo json_encode($data);

			}else{

       		$data['data']=$this->generatepayslip->get_all();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(13)) $this->load->view("Generatepayslip/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}
		}

		public function preview() 
		{ 

			$data = array('title' => 'Payslip');
			$id = $this->input->get('id');
			$payrolldetailsID = $this->input->get('payrolldetailsID');
			$payrollID = $this->input->get('payrollID');
			$data['data']=$this->generatepayslip->get_details($id, $payrolldetailsID, $payrollID);
			$this->load->view("Generatepayslip/Payslip", $data);
		}

		public function printAll() 
		{ 

			$data = array('title' => 'Payslip');
			$payrollID = $this->input->get('payrollID');
			$data['data']=$this->generatepayslip->get_all_details( $payrollID);
			$this->load->view("Generatepayslip/PrintAll", $data);
		}

		public function save() 
		{ 
			$payslipstatus = $this->input->post('payslipstatus');
			$payrolldetailsID = $this->input->post('payrolldetailsID');
			$employeeID = $this->input->post('employeeID');

       		$data=$this->generatepayslip->save_status($payslipstatus, $payrolldetailsID, $employeeID); 
	    	echo json_encode($data);  
		}  

		public function get_client()
		{
			$client	= $this->input->post('id');
			$data = $this->generatepayslip->get_clientdata($client);
			echo json_encode($data);  
		}
	}     
?>
