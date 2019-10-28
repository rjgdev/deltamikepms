<?php 
   class Payroll extends CI_Controller {  
     
		public function process() 
		{ 
	  		$data = array('title' => 'Payroll Process');

			$this->load->view('Template/Header',$data);
			$this->load->view("Payroll/Process",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function adjustment() 
		{ 

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
