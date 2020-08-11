<?php 
   class Designations extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Designation_model');  
	  		$this->designation = new Designation_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Designations');

       		$data['data']=$this->designation->get_all_designation();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(28) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Designation/Index",$data);
					  	 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$designationdescription = $this->input->post('designationdescription');
			$departmentID = $this->input->post('departmentID');

       		$data=$this->designation->save_designation($designationdescription, $departmentID);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Designation already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function update() 
		{ 
			$id = $this->input->post('id');
			$designationdescription = $this->input->post('designationdescription');
			$departmentID = $this->input->post('departmentID');

       		$data=$this->designation->update_designation($id, $designationdescription, $departmentID);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Designation already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}

		public function changestatus() 
		{ 
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			$designationdescription = $this->input->post('designationdescription');

       		$data=$this->designation->change_status_designation($id, $status,$designationdescription);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Designation already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
