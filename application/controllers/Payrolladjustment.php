<?php 
   class Payrolladjustment extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payrolladjustment_model');  
	  		$this->payrolladjustment = new Payrolladjustment_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Payroll Adjustment');

	  		$data['data']=$this->payrolladjustment->get_payrolladjustment();

			$this->load->view('Template/Header',$data);
			$this->load->view("Payrolladjustment/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
