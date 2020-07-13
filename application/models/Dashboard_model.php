<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{ 
		$timekeepingguard = $this->db->query('SELECT * FROM `dm_timekeeping` WHERE timekeepingType="1" ORDER BY timekeepingID DESC LIMIT 1');
		$payrollguard = $this->db->query('SELECT * FROM `dm_payroll` WHERE payrollType="1" ORDER BY payrollID DESC LIMIT 1');
		$timekeepingstaff = $this->db->query('SELECT * FROM `dm_timekeeping` WHERE timekeepingType="2" ORDER BY timekeepingID DESC LIMIT 1');
		$payrollstaff = $this->db->query('SELECT * FROM `dm_payroll` WHERE payrollType="2" ORDER BY payrollID DESC LIMIT 1');
		$thirteenthmonth = $this->db->query('SELECT * FROM `dm_thrmonth` ORDER BY thrmonthID DESC LIMIT 1');
		$retirement = $this->db->query('SELECT * FROM `dm_retirement` ORDER BY retirementID DESC LIMIT 1');
		$billing = $this->db->query('SELECT * FROM `dm_billing` ORDER BY billingID DESC LIMIT 1');

		$employee = $this->db->query('
			SELECT * 
			FROM dm_employee as emp
			LEFT JOIN dm_department as dept
			ON emp.departmentID = dept.departmentID
			LEFT JOIN dm_designation as des
			ON emp.designationID = des.designationID
			LEFT JOIN dm_employeetype as emptype
			ON emp.employeetypeID = emptype.employeetypeID
			ORDER BY employeeID DESC LIMIT 5');

		$client = $this->db->query('
			SELECT * 
			FROM dm_client as clnt
			ORDER BY clientID DESC LIMIT 5');

		$leave = $this->db->query('
			SELECT empleave.*, emp.firstname, emp.lastname, emp.photo, type.leavetypename,des.designationdescription
			FROM dm_employeeleave as empleave
			LEFT JOIN dm_employee as emp
			ON empleave.employeeID = emp.employeeID
			LEFT JOIN dm_designation as des
			ON emp.designationID = des.designationID
			LEFT JOIN dm_leavetype as type
			ON empleave.leavetypeID = type.leavetypeID
			WHERE DATE(leavefrom) >= CURDATE()
			ORDER BY leavefrom
			LIMIT 2');

		$post = $this->db->query('
			SELECT post.*, clnt.clientname 
			FROM dm_post as post
			LEFT JOIN dm_client as clnt
			ON post.clientID = clnt.clientID
			ORDER BY postID DESC LIMIT 5');

		$timekeeping = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus!=2 AND timekeepingType=1');

		$payroll = $this->db->query("SELECT * FROM dm_timekeeping WHERE payrollstatus=0 LIMIT 1");

		$activeguards = $this->db->query("SELECT COUNT(employeeID) AS 'totalGuard' FROM dm_employee WHERE employeetypeID=1 AND employeestatus='Active'");

		$activestaff = $this->db->query("SELECT COUNT(employeeID) AS 'totalStaff' FROM dm_employee WHERE employeetypeID=2 AND employeestatus='Active'");

	    $result1 	= 	$timekeepingguard->result();
	    $result2 	= 	$payrollguard->result();
	    $result3 	= 	$thirteenthmonth->result();
	    $result4 	= 	$retirement->result();
	    $result5 	= 	$billing->result();
	    $result6 	= 	$employee->result();
	    $result7 	= 	$client->result();
	    $result8 	= 	$leave->result();
	    $result9 	= 	$post->result();
	    $result10 	= 	$timekeeping->result();
	    $result11 	= 	$payroll->result();
	    $result12 	= 	$activeguards->result();
	    $result13 	= 	$activestaff->result();
	    $result14 	= 	$timekeepingstaff->result();
	    $result15 	= 	$payrollstaff->result();

	          return array(
	          	'timekeepingguard' 	=> $result1,
	          	'payrollguard'		=> $result2,
	          	'thirteenthmonth' 	=> $result3,
	          	'retirement' 	=> $result4,
	          	'billing' 		=> $result5,
	          	'employee' 		=> $result6,
	          	'client' 		=> $result7,
	          	'leave' 		=> $result8,
	          	'post' 			=> $result9,
	          	'timekeeping' 	=> $result10,
	          	'payroll' 		=> $result11,
	          	'activeguards'  => $result12,
	          	'activestaff'   => $result13,
	          	'timekeepingstaff' => $result14,
	          	'payrollstaff'     => $result15
	          );
  	}
}
?>

