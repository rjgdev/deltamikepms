	<?php 
   class Retirementprocess extends CI_Controller {  

		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Retirementprocess_model');  
	  		$this->Retirementprocess = new Retirementprocess_model;     
		}
		public function index()
			
		{ 
	  		$data = array('title' => 'Retirement Process');
	  		$data['data']=$this->Retirementprocess->get_all_Retirementprocess();
			$this->load->view('Template/Header',$data);
			$this->load->view("Retirementprocess/Index",$data);
			$this->load->view('Template/Footer',$data);
		}
		public function get_detachment()
		{

			$detachment				= 		$this->input->post('id');
			$data   				= 		$this->Retirementprocess->get_detachment($detachment);


			echo json_encode($data); 

		}
		public function search_Retirementprocess()
		{
			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');
			$searchdetachment = $this->input->post('searchdetachment');
			$searchemployee = $this->input->post('arrayemployee');
			$data=$this->Retirementprocess->get_all_Retirementemployee($searchemployee,$searchemployeetype,$searchclient,$searchdetachment);
			echo json_encode($data);

		}

	}	