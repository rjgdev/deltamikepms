<?php 
   class Thirteenmonthprocess extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Thirteenmonthprocess_model');  
  		$this->Thirteenmonthprocess = new Thirteenmonthprocess_model;     
	}
 
	public function index() 
	{ 
  		$data = array('title' => '13th Month Process');
  		$data['data']=$this->Thirteenmonthprocess->get_all_thirteenmonthprocess();
		$this->load->view('Template/Header',$data);
		$this->load->view("Thirteenmonthprocess/Index",$data);
		$this->load->view('Template/Footer',$data);
	}
		public function get_client()
		{
			$client				= 		$this->input->post('id');
			$data   			= 		$this->Thirteenmonthprocess->get_clientdata($client);


			echo json_encode($data);  

		}

		public function search_Thirteenmonthprocess()
		{
			$sddlmonth = $this->input->post('sddlmonth');
			$sddlyear = $this->input->post('sddlyear');
			$eddlmonth = $this->input->post('eddlmonth');
			$eddlyear = $this->input->post('eddlyear');
			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');
			$searchdetachment = $this->input->post('searchdetachment');
			$data = $this->Thirteenmonthprocess->search($sddlmonth,$sddlyear,$eddlmonth,$eddlyear,$searchemployeetype,$searchclient,$searchdetachment);
			echo json_encode($data);

		}	


}	