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

		if(isAllowed(3)) $this->load->view("Employees/Index",$data);
					else $this->load->view("Denied/Index");

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
		$restdayresult 		=		$this->input->post('restdayresult');

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
		'postID'			=>		$this->input->post('detachmentID'),
		'employeestatus'	=>		$this->input->post('employeestatus'),
		'username'			=>		$this->input->post('username'),
		'password'			=>		$this->input->post('password'),
		'basicsalary'		=>		$this->input->post('basicsalary'),
		'dailyrate'			=>		$this->input->post('dailyrate'),
		'allowance'			=>		$this->input->post('allowance'),
		'tinnumber'			=>		$this->input->post('tinnumber'),
		'retfund'			=>		$this->input->post('retfund'),
		'incentive'			=>		$this->input->post('incentive'),
		/*'uniformallowance'	=>		$this->input->post('uniformallowance'),*/
		'sssnumber'			=>		$this->input->post('sssnumber'),
		'philhealthnumber'	=>		$this->input->post('philhealthnumber'),
		'pagibignumber'		=>		$this->input->post('pagibignumber'),
		'employeetypeID'    =>		$this->input->post('employeetypeid'),
		'backaccountname'   =>		$this->input->post('backaccountname'),
		'backaccountnumber' =>		$this->input->post('backaccountnumber'),
		'bankname' =>		$this->input->post('bankname'));
		
   		$data   			= 		$this->employee->save_employee($data,$firstname,$middlename,$lastname,$username,$leavetypeID,$totalleave ,$restdayresult/*, $sunschedulefrom,$sunscheduleto,$sunrestday,$monchedulefrom, $monscheduleto, $monrestday, $tueschedulefrom, $tuescheduleto, $tuerestday,$wedschedulefrom, $wedscheduleto, $wedrestday, $thschedulefrom, $thscheduleto, $threstday, $frischedulefrom, $frischeduleto, $frirestday, $satschedulefrom, $satscheduleto, $satrestday*/);
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
		$leavetype 			= 	$this->input->post('leave');
		$employee 			=	$this->input->post('employee');
		$totalleave 		=	$this->input->post('totalleave');
		$id 				=	$this->input->post('id');
		$restdayresult 		=	$this->input->post('restdayresult');
		
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
			'postID'			=> 		$this->input->post('detachmentID'),
			'employeestatus' 	=> 		$this->input->post('employeestatus'),
			'username' 			=> 		$this->input->post('username'),
			'password' 			=> 		$this->input->post('password'),
			'basicsalary' 		=> 		$this->input->post('basicsalary'),
			'dailyrate' 		=> 		$this->input->post('dailyrate'),
			'allowance' 		=> 		$this->input->post('allowance'),
			'retfund' 			=> 		$this->input->post('retfund'),
			'incentive' 		=> 		$this->input->post('incentive'),
			/*'uniformallowance' 	=> 		$this->input->post('uniformallowance'),*/
			'tinnumber' 		=> 		$this->input->post('tinnumber'),
			'sssnumber' 		=> 		$this->input->post('sssnumber'),
			'philhealthnumber'	=> 		$this->input->post('philhealthnumber'),
			'pagibignumber' 	=> 		$this->input->post('pagibignumber'),
			'clientID' 			=> 		$this->input->post('clientID'),
			'employeetypeID' 	=> 		$this->input->post('employeetypeid'),
			'bankname' 			=> 		$this->input->post('bankname'),
			'backaccountname' 	=> 		$this->input->post('backaccountname'),
			'backaccountnumber' => 		$this->input->post('backaccountnumber'));
	$data = $this->employee->update_employee($data,$id,$firstname,$middlename,$lastname,$username,$creditleaveID,$leavetype, $totalleave,$employee,$restdayresult);
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
	public function leaverecord()
	{
		$employeeID = $this->input->post('idleave');
		$data = $this->employee->search_leaverecord($employeeID);
		echo json_encode($data); 
		
	}
	public function get_client()
	{
			$clientID = $this->input->post('id');
			$data = $this->employee->search_detachment($clientID);
			echo json_encode($data);

	}
	public function get_bank()
	{

			$bankID = $this->input->post('id');
			$data = $this->employee->search_bank($bankID);
			
			echo json_encode($data);

	}

	}    
	?>
