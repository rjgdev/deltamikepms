<?php 
   class Leavetype extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Leavetype_model');  
	  		$this->leavetype = new Leavetype_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Leave Type');

       		$data['data']=$this->leavetype->get_all_leavetype();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(35) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Leavetype/Index",$data);
						 else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$leavetypename = $this->input->post('leavetypename');

       		$data=$this->leavetype->save_leavetype($leavetypename);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Leave type already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}  

		public function update() 
		{ 
			$id = $this->input->post('id');
			$leavetypename = $this->input->post('leavetypename');

       		$data=$this->leavetype->update_leavetype($id, $leavetypename);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Leave type already exist!"){
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
			$leavetypename = $this->input->post('leavetypename');

       		$data=$this->leavetype->change_status_leavetype($id, $status,$leavetypename);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Leave type already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
