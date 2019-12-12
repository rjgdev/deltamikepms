<?php 
   class Approval extends CI_Controller {  
     
   		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Approval_model');  
	  		$this->approval = new Approval_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Approval Setup');

	  		$data['module']=$this->approval->get_all_modules();
	  		$data['approval']=$this->approval->get_approval(7, "0");

			$this->load->view('Template/Header',$data);
			$this->load->view("Approval/Index",$data);
			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{	
			$moduleID = $this->input->post('moduleID');
			$description = $this->input->post('description');
			$type = $this->input->post('type');
			$employeeID = $this->input->post('employeeID');

       		$data = $this->approval->save_approval($moduleID, $description, $type, $employeeID);
       	       		
	    	echo json_encode($data);  
		}

		public function loadapproval() 
		{ 
			$id = $this->input->post('id');
			$type = $this->input->post('type');

       		$data['approval']=$this->approval->get_approval($id,$type);
       		$data['employeetype']=$this->approval->get_employeetype();
	    	echo json_encode($data);  
		} 

		public function loadapprover() 
		{ 
			$id = $this->input->post('id');

       		$data['approver']=$this->approval->get_approver($id);
	    	echo json_encode($data['approver']);  
		} 

		public function loademployee() 
		{ 
       		$data['employee']=$this->approval->get_employee();
	    	echo json_encode($data['employee']);  
		} 

		public function loademployeetype() 
		{ 
   			$data['employeetype']=$this->approval->get_employeetype();
	    	echo json_encode($data['employeetype']);  
		} 

		public function delete() 
		{ 
			$id = $this->input->post('id');
			$description = $this->input->post('description');

       		$data=$this->approval->delete_approval($id,$description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "This approval is currently in use and cannot be deleted."){
    			$this->session->set_flashdata('errorapproval', $retval[1]); 
            }else{
                $this->session->set_flashdata('successapproval', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
