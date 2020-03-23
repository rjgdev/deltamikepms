<?php 
   class Departments extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Department_model');  
	  		$this->department = new Department_model;     
		}

		public function index() 
		{ 
			$data = array('title' => 'Departments');

			$data['data']=$this->department->get_all_department();

			$this->load->view('Template/Header',$data);

			if(isAllowed(27)) $this->load->view("Department/Index",$data);
					     else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data); 
		}

		public function save() 
		{ 
			$description = $this->input->post('description');

       		$data=$this->department->save_department($description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Department name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function update() 
		{ 
			$id = $this->input->post('id');
			$description = $this->input->post('description');

       		$data=$this->department->update_department($id, $description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Department name already exist!"){
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
			$description = $this->input->post('description');

       		$data=$this->department->change_status_department($id, $status,$description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Department name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
