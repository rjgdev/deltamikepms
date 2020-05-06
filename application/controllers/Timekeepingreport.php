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

			if(isAllowed(9)) $this->load->view("Timekeepingreport/Index",$data);
				        else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 
	}     
?>
