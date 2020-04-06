<?php 
   class Leaves extends CI_Controller {  

	public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Leave_model');  
		$this->leave = new Leave_model;     
	}

	public function index() 
	{ 
		$data = array('title' => 'Leaves');
		$data['data']=$this->leave->get_all_leave();
		$this->load->view('Template/Header',$data);

		if(isAllowed(4)) $this->load->view("Leaves/Index",$data);
					else $this->load->view("Denied/Index");

		$this->load->view('Template/Footer',$data);
	}
	public function searchtotalleave()
	{
		$id = $this->input->post('id');
		$leave = $this->input->post('leave');
		$data = $this->leave->search_totalleave($id, $leave);
		echo json_encode($data); 
	} 
	public function save()
	{
		$leavestatusdata = "For review";
		$numberofdays = $this->input->post('numberofdays');
		$leavetypeID = $this->input->post('leaveID');
		$employeeID = $this->input->post('employeeID');
		$remainingleave = $this->input->post('remainingleave');
		$addfrom = $this->input->post('startdate');
		$addto = $this->input->post('enddate');
		$data = array(
		'leavetypeID' => $this->input->post('leaveID'),
		'employeeID' => $this->input->post('employeeID'),
		'leavefrom' => $this->input->post('startdate'),
		'leaveto' => $this->input->post('enddate'),
		'numberofdays' => $this->input->post('numberofdays'),
		'remainingleave' => $this->input->post('remainingleave'),
		'reason' => $this->input->post('reason'),
		'leavestatus' => $leavestatusdata);
		$data = $this->leave->save_leave($data,$numberofdays,$leavetypeID,$employeeID, $remainingleave,$addfrom,$addto);
		$retval = explode("|",$data);
       		
            if($retval[0] == "false"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}
	public function update()
	{
		$numberofdays = $this->input->post('numberofdays');
		$leavetypeID = $this->input->post('leaveID');
		$employeeID = $this->input->post('employeeID');
		$remainingleave = $this->input->post('remainingleave');
		$addfrom = $this->input->post('startdate');
		$addto = $this->input->post('enddate');
		$id = $this->input->post('id');
		$lessLeave = $this->input->post('lessLeave');
		$data = array(
		'leavetypeID' => $this->input->post('leaveID'),
		'employeeID' => $this->input->post('employeeID'),
		'leavefrom' => $this->input->post('startdate'),
		'leaveto' => $this->input->post('enddate'),
		'numberofdays' => $this->input->post('numberofdays'),
		'reason' => $this->input->post('reason'));
		$data = $this->leave->update_leave($data, $numberofdays, $leavetypeID,$employeeID, $remainingleave, $addfrom, $addto, $id, $lessLeave);
		$retval = explode("|",$data);
            if($retval[0] == "false"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		

	}
	public function get_employeeleave()
	{
		$employeeID = $this->input->post('id');
		$data = $this->leave->get_employeeleave($employeeID);
		echo json_encode($data);
	}	


	public function updatenoted()
	{

		$id = $this->input->post('id');
		$noted = $this->input->post('noted');
		$data = $this->leave->get_noted($id,$noted);
		$this->session->set_flashdata('success', $data); 
		echo json_encode($data);
	} 
		}    
?>
