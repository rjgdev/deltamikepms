<?php 
   class Payrollstaff extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payrollstaff_model');  
	  		$this->payroll = new Payrollstaff_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Payroll Process (Staff)');

	  		$data['data']=$this->payroll->get_payroll();

			$this->load->view('Template/Header',$data);

			if(isAllowed(10)) $this->load->view("Payrollstaff/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}

		public function process() 
		{ 
			$timekeepingID  = $this->input->post('timekeepingID');
			$fromcutoff 	= date_format(date_create($this->input->post('fromcutoff')),"Y-m-d");
			$tocutoff   	= date_format(date_create($this->input->post('tocutoff')),"Y-m-d");
			$payperiod  	= $this->input->post('payperiod');

       		$data=$this->payroll->processpayroll($timekeepingID,$fromcutoff,$tocutoff,$payperiod);

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
			$dateto = $this->input->post('dateto');

        	$result = $this->payroll->approve_payroll($payrollID, $timekeepingID, date("Y-m-d"),$lastapprover, $dateto);
        	
        	
        	echo json_encode($result);
		}

		public function deny() 
		{ 
			$payrollID = $this->input->post('payrollID');
			$reason    = $this->input->post('reason');

        	$this->payroll->deny_payroll($payrollID,$reason);
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

		public function adjustment() 
		{ 
			$payperiod 				= $this->input->post('payperiod');
			$fromcutoff				= $this->input->post('fromcutoff');
			$payrolldetailsID		= $this->input->post('payrolldetailsID');
			$employeeID				= $this->input->post('employeeID');
			$employeetype			= $this->input->post('employeetype');
			$otadjustment			= $this->input->post('otadjustment');
			$nightdiffadjustment	= $this->input->post('nightdiffadjustment');
			$lateadjustment			= $this->input->post('lateadjustment');
			$leaveadjustment		= $this->input->post('leaveadjustment');
			$otnotes		        = $this->input->post('otnotes');
			$nightnotes		        = $this->input->post('nightnotes');
			$latenotes		        = $this->input->post('latenotes');
			$leavenotes		        = $this->input->post('leavenotes');
			$othernotes		        = $this->input->post('othernotes');
      		$otheradjustment		= $this->input->post('otheradjustment');
      		$totalGrosspay			= $this->input->post('totalGrosspay');
      		$sss					= $this->input->post('sss');
      		$phic					= $this->input->post('phic');
      		$hdmf					= $this->input->post('hdmf');
      		$basicpay				= $this->input->post('basicpay');
      		$holiday				= $this->input->post('holiday');
      		$overtime				= $this->input->post('overtime');
      		$nightdiff				= $this->input->post('nightdiff');
      		$late					= $this->input->post('late');
      		$absent					= $this->input->post('absent');
      		$loan					= $this->input->post('loan');
      		$daysofwork					= $this->input->post('daysofwork');

			$result = $this->payroll->save_adjustment($payperiod,$fromcutoff,$payrolldetailsID,$employeeID,$employeetype,$otadjustment,$nightdiffadjustment,$lateadjustment,$leaveadjustment,$otnotes,$nightnotes,$latenotes,$leavenotes,$othernotes,$otheradjustment,$totalGrosspay,$phic,$hdmf,$basicpay,$holiday,$overtime,$nightdiff,$late,$absent,$loan,$daysofwork);

			echo json_encode($result);
		} 

		public function getdenied() 
		{ 
			$payrollID = $this->input->post('payrollID');

       		$data=$this->payroll->get_denied($payrollID);

       		echo json_encode($data);
   		}
	}     
?>
