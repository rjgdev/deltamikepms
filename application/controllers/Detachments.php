<?php 
   class Detachments extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Detachment_model');  
	  		$this->detachment = new Detachment_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Detachment Posts');

       		$data['data']=$this->detachment->get_all_detachment();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(27) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Detachment/Index",$data);
						else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$postname = $this->input->post('postname');
			$clientID = $this->input->post('clientID');

       		$data=$this->detachment->save_detachment($postname, $clientID);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Detachment post already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function update() 
		{ 
			$id = $this->input->post('id');
			$postname = $this->input->post('postname');
			$clientID = $this->input->post('clientID');

       		$data=$this->detachment->update_detachment($id, $postname, $clientID);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Detachment name already exist!"){
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
			$postname = $this->input->post('postname');

       		$data=$this->detachment->change_status_detachment($id, $status,$postname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Detachment name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
