<?php 
   class Employees extends CI_Controller {  

		public function __construct() {
		//load database in autoload libraries 
		parent::__construct(); 
		$this->load->model('Employee_model');  
  		$this->employee = new Employee_model;     
	}
 
	public function index() 
	{ 
  		$data = array('title' => 'All Employees');
  		$data['data']=$this->employee->get_all_employee();
		$this->load->view('Template/Header',$data);
		$this->load->view("Employees/Index",$data);
		$this->load->view('Template/Footer',$data);
	}

	public function save() 
	{	
		$leavetypeID		= 		$this->input->post('leave');
		$totalleave			= 		$this->input->post('totalleave');
		$firstname 			= 		$this->input->post('firstname');
		$middlename			= 		$this->input->post('middlename');
		$lastname			= 		$this->input->post('lastname');
		$username			= 		$this->input->post('username');
		//schedule
		$sunschedulefrom	=	$this->input->post('suntimefrom');
		$sunscheduleto		=	$this->input->post('suntimeto');
		$sunrestday			= 	$this->input->post('sunrestdays');
		$monchedulefrom		=	$this->input->post('montimefrom');
		$monscheduleto		=	$this->input->post('montimeto');
		$monrestday			=	$this->input->post('monrestday');
		$tueschedulefrom	=	$this->input->post('tuetimefrom');
		$tuescheduleto		=	$this->input->post('tuetimeto');
		$tuerestday			=	$this->input->post('tuerestday');
		$wedschedulefrom	=	$this->input->post('wedtimefrom');
		$wedscheduleto		=	$this->input->post('wedtimeto');
		$wedrestday			=	$this->input->post('wedrestday');
		$thschedulefrom		=	$this->input->post('thutimefrom');
		$thscheduleto		=	$this->input->post('thutimeto');
		$threstday			= 	$this->input->post('thuresday');
		$frischedulefrom	=	$this->input->post('fritimefrom');
		$frischeduleto		=	$this->input->post('fritimeto');
		$frirestday			=	$this->input->post('frirestday');
		$satschedulefrom	=	$this->input->post('sattimefrom');
		$satscheduleto		=	$this->input->post('sattimeto');
		$satrestday			=	$this->input->post('satrestday');
		//end of schedule
		$data = array (
		'roleID'			=>		$this->input->post('roleDescription'),
		'firstname'			=>		$this->input->post('firstname'),
		'middlename'		=>		$this->input->post('middlename'),
		'lastname'			=>		$this->input->post('lastname'),
		'gender'			=>		$this->input->post('gender'),
		'housenumber'		=>		$this->input->post('housenumber'),
		'streetname'		=>		$this->input->post('streetname'),
		'barangay'			=>		$this->input->post('barangay'),
		'city'				=>		$this->input->post('city'),
		'birthdate'			=>		$this->input->post('birthdate'),
		'contactinfo'		=>		$this->input->post('contactinfo'),
		'civilstatus'		=>		$this->input->post('civilstatus'),
		'citizenship'		=>		$this->input->post('citizenship'),
		'hireddate'			=>		$this->input->post('hireddate'),
		'departmentID'		=>		$this->input->post('departmentID'),
		'designationID' 	=>		$this->input->post('designationID'),
		'clientID'			=>		$this->input->post('clientID'),
		'detachmentID'		=>		$this->input->post('detachmentID'),
		'employeestatus'	=>		$this->input->post('employeestatus'),
		'username'			=>		$this->input->post('username'),
		'password'			=>		$this->input->post('password'),
		'basicsalary'		=>		$this->input->post('basicsalary'),
		'dailyrate'			=>		$this->input->post('dailyrate'),
		'allowance'			=>		$this->input->post('allowance'),
		'tinnumber'			=>		$this->input->post('tinnumber'),
		'sssnumber'			=>		$this->input->post('sssnumber'),
		'philhealthnumber'	=>		$this->input->post('philhealthnumber'),
		'pagibignumber'		=>		$this->input->post('pagibignumber'),
		'employeetypeID'    =>		$this->input->post('employeetypeid'),
		'backaccountname'   =>		$this->input->post('backaccountname'),
		'backaccountnumber' =>		$this->input->post('backaccountnumber'));
		
   		$data   			= 		$this->employee->save_employee($data,$firstname,$middlename,$lastname,$username,$leavetypeID,$totalleave, $sunschedulefrom,$sunscheduleto,$sunrestday,$monchedulefrom, $monscheduleto, $monrestday, $tueschedulefrom, $tuescheduleto, $tuerestday,$wedschedulefrom, $wedscheduleto, $wedrestday, $thschedulefrom, $thscheduleto, $threstday, $frischedulefrom, $frischeduleto, $frirestday, $satschedulefrom, $satscheduleto, $satrestday);
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
		$firstname 			= 	$this->input->post('firstname');
		$middlename			= 	$this->input->post('middlename');
		$lastname 			= 	$this->input->post('lastname');
		$username 			= 	$this->input->post('username');
		$creditleaveID 		= 	$this->input->post('creditleaveID');
		$leavetypeID 		= 	$this->input->post('editleave');
		$totalleave 		=	$this->input->post('edittotalleave');
		$id 				=	$this->input->post('id');
		$dataschedule = array(
			'sunschedulefrom'	=>		$this->input->post('suntimefrom'),
			'sunscheduleto'		=>  	$this->input->post('suntimeto'),
			'sunrestday'		=> 		$this->input->post('sunrestdays'),
			'monchedulefrom'	=>		$this->input->post('montimefrom'),
			'monscheduleto'		=>		$this->input->post('montimeto'),
			'monrestday'		=>		$this->input->post('monrestday'),
			'tueschedulefrom'	=>		$this->input->post('tuetimefrom'),
			'tuescheduleto'		=>		$this->input->post('tuetimeto'),
			'tuerestday'		=>		$this->input->post('tuerestday'),
			'wedschedulefrom'	=>		$this->input->post('wedtimefrom'),
			'wedscheduleto'		=>		$this->input->post('wedtimeto'),
			'wedrestday'		=>		$this->input->post('wedrestday'),
			'thschedulefrom'	=>		$this->input->post('thutimefrom'),
			'thscheduleto'		=>		$this->input->post('thutimeto'),
			'threstday'			=> 		$this->input->post('thuresday'),
			'frischedulefrom'	=>		$this->input->post('fritimefrom'),
			'frischeduleto'		=>		$this->input->post('fritimeto'),
			'frirestday'		=>		$this->input->post('frirestday'),
			'satschedulefrom'	=>		$this->input->post('sattimefrom'),
			'satscheduleto'		=>		$this->input->post('sattimeto'),
			'satrestday'		=>		$this->input->post('satrestday'));
		$data = array (
			'firstname' 		=> 		$this->input->post('firstname'),
			'middlename'		=>		$this->input->post('middlename'),
			'lastname' 			=> 		$this->input->post('lastname'),
			'roleID' 			=> 		$this->input->post('roleDescription'),
			'gender'			=> 		$this->input->post('gender'),
			'housenumber' 		=>		$this->input->post('housenumber'),
			'streetname'		=> 		$this->input->post('streetname'),
			'barangay' 			=> 		$this->input->post('barangay'),
			'city' 				=> 		$this->input->post('city'),
			'birthdate' 		=> 		$this->input->post('birthdate'),
			'contactinfo' 		=> 		$this->input->post('contactinfo'),
			'civilstatus' 		=> 		$this->input->post('civilstatus'),
			'citizenship' 		=>		$this->input->post('citizenship'),
			'hireddate' 		=> 		$this->input->post('hireddate'),
			'departmentID'		=> 		$this->input->post('departmentID'),
			'designationID'		=> 		$this->input->post('designationID'),
			'detachmentID'		=> 		$this->input->post('detachmentID'),
			'employeestatus' 	=> 		$this->input->post('employeestatus'),
			'username' 			=> 		$this->input->post('username'),
			'password' 			=> 		$this->input->post('password'),
			'basicsalary' 		=> 		$this->input->post('basicsalary'),
			'dailyrate' 		=> 		$this->input->post('dailyrate'),
			'allowance' 		=> 		$this->input->post('allowance'),
			'tinnumber' 		=> 		$this->input->post('tinnumber'),
			'sssnumber' 		=> 		$this->input->post('sssnumber'),
			'philhealthnumber'	=> 		$this->input->post('philhealthnumber'),
			'pagibignumber' 	=> 		$this->input->post('pagibignumber'),
			'clientID' 			=> 		$this->input->post('clientID'),
			'employeetypeID' 	=> 		$this->input->post('employeetypeid'),
			'backaccountname' 	=> 		$this->input->post('backaccountname'),
			'backaccountnumber' => 		$this->input->post('backaccountnumber'));
	$data = $this->employee->update_employee($data,$id,$firstname,$middlename,$lastname,$username,$creditleaveID,$leavetypeID, $totalleave,$dataschedule);
	$retval = explode("|",$data);

	if($retval[0]=="false"){
		$this->session->set_flashdata('error', $retval[1]); 
	}else{
		$this->session->set_flashdata('success', $retval[1]); 
	}   
	echo json_encode($data);  
	} 
	public function get_designation()
	{
		$departmentID = $this->input->post('id',TRUE);
		$data = $this->employee->get_designation($departmentID)->result();
		echo json_encode($data);
	}

	public function changestatus() 
	{ 
		$id = $this->input->post('id');
		$data = array (
		'employeestatus' 	=>	 $this->input->post('changestatus'));


		$data=$this->employee->change_status_employee($id,$data);
		$this->session->set_flashdata('empstatus', 'empsuccess'); 
		echo json_encode($data);  
	}
	public function searchcreaditleave()
	{

		$employeeID = $this->input->post('employee');
		$data = $this->employee->search_creditleave($employeeID);
		echo json_encode($data); 
	}

		public function Schedule()
	{
		$employeeID = $this->input->post('id');
		$data = $this->employee->search_schedule($employeeID);
		echo json_encode($data); 

	}

	}    
	?>
