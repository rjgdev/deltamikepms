<?php 
   class Payrolladjustmentreport extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payrolladjustmentreport_model');  
	  		$this->payrolladjustmentreport = new Payrolladjustmentreport_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Payroll Adjustment Report');

	  		/*$data['data']=$this->payrolladjustmentreport->get_payrolladjustment();*/

			$this->load->view('Template/Header',$data);
			$this->load->view("Payrolladjustmentreport/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function loademployee() 
		{ 
			$employeetype 	 	= $this->input->post('employeetype');

       		$data=$this->payrolladjustmentreport->load_employee($employeetype);

			echo json_encode($data);
		} 

		public function viewreport() 
		{ 
			$datefrom 	 	= $this->input->post('datefrom');
			$dateto 	 	= $this->input->post('dateto');
			$employee 	 	= $this->input->post('employee');

       		$data=$this->payrolladjustmentreport->view_report($datefrom,$dateto,$employee);

			echo json_encode($data);
		} 
	}     
?>
