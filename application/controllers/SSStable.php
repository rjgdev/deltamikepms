<?php 
   class SSStable extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('SSStable_model');  
	  		$this->sss = new SSStable_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'SSS Table');

       		$data['data']=$this->sss->get_all_sss();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(31)) $this->load->view("SSStable/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$belowrange = $this->input->post('belowrange');
			$aboverange = $this->input->post('aboverange');

       		$data=$this->sss->save_sss($belowrange, $aboverange);
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

       		$data=$this->sss->update_sss($id, $belowrange, $aboverange);
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
