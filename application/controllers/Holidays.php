<?php 
   class Holidays extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Holiday_model');  
	  		$this->holiday = new Holiday_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Holidays');

       		$data['data']=$this->holiday->get_all_holiday();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(34) || $this->session->userdata('accountype')=="bcgiadmin") $this->load->view("Holiday/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$holidayname = $this->input->post('holidayname');

       		$data=$this->holiday->save_holiday($holidayname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Holiday name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}  

		public function update() 
		{ 
			$id = $this->input->post('id');
			$holidayname = $this->input->post('holidayname');

       		$data=$this->holiday->update_holiday($id, $holidayname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Holiday name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}
	}     
?>
