<?php 
   class Payroll extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payroll_model');  
	  		$this->payroll = new Payroll_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Payroll Process');

	  		$data['data']=$this->payroll->get_payroll();

			$this->load->view('Template/Header',$data);
			$this->load->view("Payroll/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function process() 
		{ 
			$timekeepingID   = $this->input->post('timekeepingID');
			$fromcutoff = date_format(date_create($this->input->post('fromcutoff')),"Y-m-d");
			$tocutoff   = date_format(date_create($this->input->post('tocutoff')),"Y-m-d");
			$payperiod  = $this->input->post('payperiod');

       		$data=$this->payroll->processpayroll($timekeepingID,$fromcutoff,$tocutoff,$payperiod);
       		/*$retval = explode("|",$data);*/

            /*if($retval[0] == "false" && $retval[1] == "Department name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   */
	    	echo json_encode($data);  
		} 

		public function payslip() 
		{ 
			$data = array('title' => 'Payslip');

			$this->load->view('Template/Header',$data);
			$this->load->view("Payroll/Payslip",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function approve() 
		{ 
			$payrollID = $this->input->post('payrollID');
			$timekeepingID = $this->input->post('timekeepingID');
			$lastapprover = $this->input->post('lastapprover');
			
        	$result = $this->payroll->approve_payroll($payrollID, $timekeepingID, date("Y-m-d"),$lastapprover);
        	
        	
        	echo json_encode($result);
		}

		public function deny() 
		{ 
			$payrollID = $this->input->post('payrollID');
        	$this->payroll->deny_payroll($payrollID);
		}

		public function submit() 
		{ 
			$payrollID = $this->input->post('payrollID');
        	$result = $this->payroll->submit_payroll($payrollID, date("Y-m-d H:i:s"));

        	echo json_encode($result);
		}

		public function cancel() 
		{ 
			$payrollID = $this->input->post('payrollID');
        	$this->payroll->cancel_payroll($payrollID);
		}

		public function report() 
		{ 

		} 

		public function adjustmentreport() 
		{ 

		} 
	}     
?>
