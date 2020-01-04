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

			$this->load->view('Template/Header',$data);
			$this->load->view("Payroll/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function process() 
		{ 
			/*$description = $this->input->post('description');*/

       		$data=$this->payroll->processpayroll();
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

		public function report() 
		{ 

		} 

		public function adjustmentreport() 
		{ 

		} 
	}     
?>
