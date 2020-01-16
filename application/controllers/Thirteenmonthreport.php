<?php 
   class Thirteenmonthreport extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Thirteenmonthreport_model');  
  		$this->Thirteenmonthreport = new Thirteenmonthreport_model;     
		}
		public function index() 
		{ 
	  		$data = array('title' => '13th month report');
	  		$data['data']=$this->Thirteenmonthreport->get_all_Thirteenmonthreport();
			$this->load->view('Template/Header',$data);
			$this->load->view("Thirteenmonthreport/Index",$data);
			$this->load->view('Template/Footer',$data);
		}
		public function get_client()
		{
			$client				= 		$this->input->post('id');
			$data   			= 		$this->Thirteenmonthreport->get_clientdata($client);


			echo json_encode($data);  

		}
		public function recorddata()
		{

			$data = array('title' => 'Thirteen month report Record');
				$id = $this->input->get('id');
				$from = $this->input->get('from');
				$to = $this->input->get('to');
				$data['data']=$this->Thirteenmonthreport->get_recorddatamonth($id,$from,$to);
				$this->load->view('Template/Printstyle',$data);
				$this->load->view('Thirteenmonthreport/recorddata',$data);
				$this->load->view('Template/Footer',$data);
				//echo json_encode($data);
			
			}
	public function search_Thirteenmonthreport()
	{


		$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');
		$searchemployeetype = $this->input->post('searchemployeetype');
		$searchclient = $this->input->post('searchclient');
		$searchdetachment = $this->input->post('searchdetachment');

		$data = $this->Thirteenmonthreport->searchrecord($fromdate, $todate, $searchemployeetype,$searchclient,$searchdetachment);
		echo json_encode($data);

	}

	}	