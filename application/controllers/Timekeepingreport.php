<?php 
   class Timekeepingreport extends CI_Controller {  
     
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Timekeepingreport_model');  
	  		$this->timekeepingreport = new Timekeepingreport_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Timekeeping Report');

	  		$data['data']=$this->timekeepingreport->get_timekeeping();

			$this->load->view('Template/Header',$data);
			$this->load->view("Timekeepingreport/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
