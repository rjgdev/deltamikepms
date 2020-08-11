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
	  		$data = array('title' => '13th Month Report');
	  		$data['data']=$this->Thirteenmonthreport->get_all_Thirteenmonthreport();
			$this->load->view('Template/Header',$data);

			if(isAllowed(17) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Thirteenmonthreport/Index",$data);
				         else $this->load->view("Denied/Index");

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

			$data = array('title' => 'Individual 13th Month Report');
				$id = $this->input->get('id');
				$from = $this->input->get('from');
				$to = $this->input->get('to');
				$data['data']=$this->Thirteenmonthreport->get_recorddatamonth($id,$from,$to);
				
			
				$this->load->view("Template/Printstyle", $data);
				$this->load->view("Thirteenmonthreport/recorddata", $data);
				$this->load->view('Template/Footer',$data);
				//echo json_encode($data);
			
			}
	public function search_Thirteenmonthreport()
	{


		/*$fromdate = $this->input->post('fromdate');
		$todate = $this->input->post('todate');*/
		$thrmonthID = $this->input->post('thrmonthID');
		$searchemployeetype = $this->input->post('searchemployeetype');
		$searchclient = $this->input->post('searchclient');
		$searchdetachment = $this->input->post('searchdetachment');
		$data = $this->Thirteenmonthreport->searchrecord($thrmonthID, $searchemployeetype,$searchclient,$searchdetachment);
		echo json_encode($data);

	}
	public function summaryrecord()
	{
	   $data = array('title' => 'Summarized 13th Month Report');
		$monthID = $this->input->get('monthID');
		$employeetype = $this->input->get('employeetype');
		$client = $this->input->get('client');
		$post = $this->input->get('post');
		$data['data'] = $this->Thirteenmonthreport->searchsummaryrecord($monthID, $employeetype, $client, $post);
		
		$this->load->view("Template/Printstyle", $data);
		$this->load->view("Thirteenmonthreport/summaryrecord", $data);
		$this->load->view('Template/Footer',$data);
	;
	}

	}	