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

			if(isAllowed(15) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Payrolladjustmentreport/Index",$data);
				         else $this->load->view("Denied/Index");

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
			$employeetype 	= $this->input->post('employeetype');

       		$data=$this->payrolladjustmentreport->view_report($datefrom,$dateto,$employee,$employeetype);

			echo json_encode($data);
		} 

		public function preview() 
		{ 
			$printArray = $this->input->post('printArray');
			$datefrom 	= $this->input->post('datefrom');
			$dateto 	= $this->input->post('dateto');

			$data['data'] = array('record' => $printArray,'datefrom' => $datefrom, 'dateto' => $dateto);

			return $this->load->view("Payrolladjustmentreport/Print_specific",$data);
		}
	}     
?>
