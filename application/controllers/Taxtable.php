<?php 
   class Taxtable extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Taxtable_model');  
	  		$this->taxtable = new Taxtable_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Tax Table');

       		$data['data']=$this->taxtable->get_all_tax();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(33)) $this->load->view("Taxtable/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$belowrange = $this->input->post('belowrange');
			$aboverange = $this->input->post('aboverange');

       		$data=$this->taxtable->save_tax($belowrange, $aboverange);
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

       		$data=$this->taxtable->update_tax($id, $belowrange, $aboverange);
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
