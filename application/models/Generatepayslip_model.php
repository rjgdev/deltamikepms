<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generatepayslip_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{
		$payroll = $this->db->query('
			SELECT *
			FROM dm_payroll 
			ORDER BY dateto DESC');

		$employeetype = $this->db->query('
			SELECT *
			FROM dm_employeetype');

		$client = $this->db->query('
			SELECT *
			FROM dm_post
			LEFT JOIN dm_client
			ON dm_post.clientID = dm_client.clientID');

	    $result1 = $payroll->result();
	    $result2 = $employeetype->result();
	    $result3 = $client->result();
	          return array(
	          	'payroll' => $result1,
	          	'employeetype' => $result2,
	          	'client' => $result3
	          );
  	}

  	function get_details($id, $payrolldetailsID)
	{

		$payslip = $this->db->query("
	    	SELECT *, 
	    	SUM(sssloan + hdmfloan) as loan,
	    	SUM(specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot + regholiday + speholiday) as holidaypay,
	    	SUM(basicpay + pd.incentive + nightdiff + pd.uniformallowance + ordinaryot + regholiday + speholiday + specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot)  as earnings,
	    	SUM(absent + late + wtax + sss_ee + phic_ee + hdmf_ee + sssloan + hdmfloan)  as deductions,
	    	pd.dailyrate as drate,
	    	pd.payrolldetailsID as pdID,
	    	pd.employeeID as empID
	    	FROM dm_payrolldetails as pd 
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID=emp.employeeID 
	    	LEFT JOIN dm_client as client
	    	ON emp.clientID=client.clientID
	    	LEFT JOIN dm_payslipstatus as ps
	    	ON pd.payrolldetailsID=ps.payrolldetailsID 
	    	WHERE pd.employeeID=$id AND pd.payrolldetailsID =$payrolldetailsID"
		);

	    $result1 = $payslip->result();
	          return array(
	          	'payslip' => $result1
	          );
  	}

  	function search_payperiod($id, $type, $client)
	{
	    $this->db->select('*, emp.employeeID as empID, pd.payrolldetailsID as pdID');
    	$this->db->from('dm_payrolldetails as pd');
    	$this->db->join('dm_employee as emp', 'pd.employeeID = emp.employeeID', 'left');
    	$this->db->join('dm_designation as p', 'p.designationID = emp.designationID', 'left');
    	$this->db->join('dm_department as d', 'd.departmentid = emp.departmentid', 'left');
    	$this->db->join('dm_employeetype as et', 'et.employeetypeID = emp.employeetypeID', 'left');
    	$this->db->join('dm_payslipstatus as ps', 'pd.payrolldetailsID  = ps.payrolldetailsID ', 'left');
    	$this->db->join('dm_post as dt', 'emp.clientID  = dt.clientID', 'left');

	    if($id!="") $this->db->like('payrollID', $id);
	    if($type!="") $this->db->like('emp.employeetypeID', $type);
	    if($client!="") $this->db->like('emp.clientID', $client);

	    $query = $this->db->get();

	    return $query->result();
  	}

  	function save_status($payslipstatus, $payrolldetailsID, $employeeID)
	{
			$data = array(
				'payslipstatus' => $payslipstatus,
				'payrolldetailsID' => $payrolldetailsID,
				'employeeID' => $employeeID
				
			 );

			$this->db->insert('dm_payslipstatus', $data);
  	}

  	function get_clientdata($client)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$client.'');
		return $query->result();
	}
}
?>