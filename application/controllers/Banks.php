<?php 
   class Banks extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Bank_model');  
	  		$this->bank = new Bank_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Banks');

       		$data['data']=$this->bank->get_all_bank();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(32)) $this->load->view("Bank/Index",$data);
						else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$bankname = $this->input->post('bankname');

       		$data=$this->bank->save_bank($bankname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Bank name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}  

		public function update() 
		{ 
			$id = $this->input->post('id');
			$bankname = $this->input->post('bankname');

       		$data=$this->bank->update_bank($id, $bankname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Bank name already exist!"){
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
			$bankname = $this->input->post('bankname');

       		$data=$this->bank->change_status_bank($id, $status,$bankname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Bank name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
