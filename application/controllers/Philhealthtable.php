<?php 
   class Philhealthtable extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Philhealthtable_model');  
	  		$this->philhealth = new Philhealthtable_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'PhilHealth Table');

       		$data['data']=$this->philhealth->get_all_philhealth();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(32) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Philhealthtable/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$belowrange = $this->input->post('belowrange');
			$aboverange = $this->input->post('aboverange');

       		$data=$this->philhealth->save_philhealth($belowrange, $aboverange);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Range already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}  

		public function update() 
		{ 
			$id = $this->input->post('id');
			$belowrange = $this->input->post('belowrange');
			$aboverange = $this->input->post('aboverange');

       		$data=$this->philhealth->update_philhealth($id, $belowrange, $aboverange);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Range already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}
	}     
?>
