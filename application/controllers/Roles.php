<?php 
   class Roles extends CI_Controller {  
     
   		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Roles_model');  
	  		$this->roles = new Roles_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Roles & Permissions');

	  		$data['role']=$this->roles->get_all_roles();
	  		$data['module']=$this->roles->get_modules(1);

			$this->load->view('Template/Header',$data);

			if(isAllowed(38)) $this->load->view("Roles/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function changestatus() 
		{ 
			$id = $this->input->post('id');
			$description = $this->input->post('description');
			$status = $this->input->post('status');

       		$data=$this->roles->change_status_role($id,$description,$status);
       		$retval = explode("|",$data);

            $this->session->set_flashdata('success', $retval[1]); 

	    	echo json_encode($data);  
		} 

		public function loadmodules() 
		{ 
			$id = $this->input->post('id');

       		$data['module']=$this->roles->get_modules($id);
	    	echo json_encode($data['module']);  
		} 

		public function save() 
		{ 
			$description = $this->input->post('description');

       		$data=$this->roles->save_role($description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Role name already exist!"){
    			$this->session->set_flashdata('errorroles', $retval[1]); 
            }else{
                $this->session->set_flashdata('successroles', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function update() 
		{ 
			$id = $this->input->post('id');
			$description = $this->input->post('description');

       		$data=$this->roles->update_role($id, $description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Role name already exist!"){
    			$this->session->set_flashdata('errorroles', $retval[1]); 
            }else{
                $this->session->set_flashdata('successroles', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function delete() 
		{ 
			$id = $this->input->post('id');
			$description = $this->input->post('description');

       		$data=$this->roles->delete_role($id,$description);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "This role is currently in use and cannot be deleted."){
    			$this->session->set_flashdata('errorroles', $retval[1]); 
            }else{
                $this->session->set_flashdata('successroles', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
