<?php 
   class Clients extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Client_model');  
	  		$this->client = new Client_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Clients');

       		$data['data']=$this->client->get_all_client();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(26)) $this->load->view("Client/Index",$data);
						else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$clientname = $this->input->post('clientname');

       		$data=$this->client->save_client($clientname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Client name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}  

		public function update() 
		{ 
			$id = $this->input->post('id');
			$clientname = $this->input->post('clientname');

       		$data=$this->client->update_client($id, $clientname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Client name already exist!"){
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
			$clientname = $this->input->post('clientname');

       		$data=$this->client->change_status_client($id, $status,$clientname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Client name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
