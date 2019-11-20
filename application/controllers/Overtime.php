<?php 
   class Overtime extends CI_Controller {  

   	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Overtime_model');  
	  		$this->overtime = new Overtime_model;     
		}
     
     
		public function index() 
		{ 
	  		$data = array('title' => 'Overtime');
	  		$data['data']=$this->overtime->get_all_employeeovertime();
			$this->load->view('Template/Header',$data);
			$this->load->view("Overtime/Index",$data);
			$this->load->view('Template/Footer',$data);
		}
	 public function save()
	 {
	 	$data = array (
			'employeeID' => $this->input->post('employeeID'),
			'overtimedate' => $this->input->post('overtimedate'),
			'starttime' => $this->input->post('starttime'),
			'endtime' => $this->input->post('endtime'),
			'totalhour' => $this->input->post('totalhour'),
			'description' => $this->input->post('description'));
	 		$employeeID = $this->input->post('employeeID');
			$overtimedate = $this->input->post('overtimedate');

	 		$data = $this->overtime->save_overtime($data, $employeeID,$overtimedate);
	 		$retval = explode("|",$data);
       		
            if($retval[0] == "false" && $retval[1] == "data  already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}

	 public function update()
	 {		
	 	$id = $this->input->post('id');
	 	$data = array (
			'employeeID' => $this->input->post('employeeID'),
			'overtimedate' => $this->input->post('overtimedate'),
			'starttime' => $this->input->post('starttime'),
			'endtime' => $this->input->post('endtime'),
			'totalhour' => $this->input->post('totalhour'),
			'description' => $this->input->post('description'));
	 		$employeeID = $this->input->post('employeeID');
	 		$description = $this->input->post('description');
			$overtimedate = $this->input->post('overtimedate');
			 $data = $this->overtime->update_overtime($data,$id,$employeeID,$overtimedate,$description);
			$retval = explode("|",$data);
			//var_dump($retval);
            if($retval[0] == "false" && $retval[1] == "employee name and overtime date already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
	}
}     
?>
