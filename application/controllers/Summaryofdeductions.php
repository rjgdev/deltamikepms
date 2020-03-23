<?php 
   class Summaryofdeductions extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Summaryofdeduction_model');  
	  		$this->deduction = new Summaryofdeduction_model;     
		}

		public function index() 
		{
	  		$data = array('title' => 'Summary of Deductions');

	  		$data['data']=$this->deduction->get_all();

	  		if(isset($_POST['id']) || isset($_POST['type']) || isset($_POST['client'])){
				$id = $this->input->post('id');
				$type = $this->input->post('type');
				$client = $this->input->post('client');

       			$data=$this->deduction->search_payperiod($id, $type, $client);
       			echo json_encode($data);

			}else{

       		$data['data']=$this->deduction->get_all();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(26)) $this->load->view("Summaryofdeduction/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}
		}

		public function preview() 
		{ 

			$data = array('title' => 'Report');
			$id = $this->input->get('id');
			$payrolldetailsID = $this->input->get('payrolldetailsID');
			$data['data']=$this->deduction->get_details($id, $payrolldetailsID);
			$this->load->view("Summaryofdeduction/Report", $data);
		}

		public function save() 
		{ 
			$payslipstatus = $this->input->post('payslipstatus');
			$payrolldetailsID = $this->input->post('payrolldetailsID');
			$employeeID = $this->input->post('employeeID');

       		$data=$this->deduction->save_status($payslipstatus, $payrolldetailsID, $employeeID); 
	    	echo json_encode($data);  
		}  

		public function get_client()
		{
			$client	= $this->input->post('id');
			$data = $this->deduction->get_clientdata($client);
			echo json_encode($data);  
		}
	}     
?>
