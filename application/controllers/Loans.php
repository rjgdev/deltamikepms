<?php 
   class Loans extends CI_Controller {  

   	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Loan_model');  
	  		$this->loan = new loan_model;     
		}
     
		public function index() 
		{ 
	  		$data = array('title' => 'Loans');
	  		$data['data']=$this->loan->get_all_loan();
			$this->load->view('Template/Header',$data);

			if(isAllowed(6) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Loan/Index",$data);
						else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 
	   public function save()
	   {

	   	$data = array (
			'employeeID' => $this->input->post('employeeID'),
			'loantypeID' => $this->input->post('loantypeID'),
			'dategranted' => $this->input->post('dategranted'),
			'enddate' => $this->input->post('enddate'),
			'amount' => $this->input->post('amount'),
			'deduction' => $this->input->post('deduction'),
			'termofpaymentID' => $this->input->post('termofpaymentID'),
			'paid' => $this->input->post('paid'),
			'lnothers'  => $this->input->post('lnothers'));
	   		$employeeID = $this->input->post('employeeID');
			$loantypeID = $this->input->post('loantypeID');
			$dategranted = $this->input->post('dategranted');
			$enddate 	 = $this->input->post('enddate');
			$deduction 	 = $this->input->post('deduction');
			$termofpaymentID = $this->input->post('termofpaymentID');

			$data = $this->loan->save_loan($data, $employeeID,$loantypeID,$dategranted,$enddate,$deduction,$termofpaymentID);

			$retval = explode("|",$data);
       		
            if($retval[0] == "false" && $retval[1] == "data already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}
		public function update()
		{
			$id = $this->input->post('id');
			$employeeID = $this->input->post('employeeID');
			$dategranted = $this->input->post('dategranted');
			$loantypeID = $this->input->post('loantypeID');
			$enddate 	 = $this->input->post('enddate');
			$deduction 	 = $this->input->post('deduction');
			$termofpaymentID = $this->input->post('termofpaymentID');

			$data = array (
			'employeeID' => $this->input->post('employeeID'),
			'loantypeID' => $this->input->post('loantypeID'),
			'dategranted' => $this->input->post('dategranted'),
			'enddate' => $this->input->post('enddate'),
			'amount' => $this->input->post('amount'),
			'deduction' => $this->input->post('deduction'),
			'termofpaymentID' => $this->input->post('termofpaymentID'),
			'lnothers' => $this->input->post('lnothers'));
			$data = $this->loan->update_loan($data,$id,$employeeID,$dategranted,$loantypeID,$enddate,$deduction,$termofpaymentID);
			$retval = explode("|",$data);
			//var_dump($retval);
            if($retval[0] == "false" && $retval[1] == "data already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  

			
		}
		public function getamortization()
		{
			$loanID = $this->input->post('loanID');

			$data = $this->loan->get_amortization($loanID);

	    	echo json_encode($data);  
		}

		public function delete()
		{
			$loanID = $this->input->post('loanID');

			$data = $this->loan->delete_loan($loanID);
            $this->session->set_flashdata('success', "<b>LN-".str_pad($loanID, 6, "0", STR_PAD_LEFT).'</b> successfully deleted.'); 
		}
		
	}     
?>