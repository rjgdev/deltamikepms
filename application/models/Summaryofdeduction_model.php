<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summaryofdeduction_model extends CI_Model
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
			WHERE payrollstatus = 2
			ORDER BY dateto DESC');

		$employeetype = $this->db->query('
			SELECT *
			FROM dm_employeetype');

		$client = $this->db->query('
			SELECT *
			FROM dm_client
			WHERE clientstatus = "Active"');

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

		$report = $this->db->query("
	    	SELECT *,
	    	SUM(sss_ee + phic_ee + hdmf_ee + sssloan + hdmfloan + salaryloan + emergencyloan + trainingloan + otherloan) as total,
	    	pd.dailyrate as drate,
	    	pd.payrolldetailsID as pdID,
	    	pd.employeeID as empID,
	    	dep.description as des
	    	FROM dm_payrolldetails as pd 
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID=emp.employeeID 
	    	LEFT JOIN dm_client as client
	    	ON emp.clientID=client.clientID
	    	LEFT JOIN dm_post as post
	    	ON emp.postID=post.postID
	    	LEFT JOIN dm_payslipstatus as ps
	    	ON pd.payrolldetailsID=ps.payrolldetailsID
	    	LEFT JOIN dm_department as dep
	    	ON emp.departmentID=dep.departmentID
	    	LEFT JOIN dm_designation as des
	    	ON emp.designationID=des.designationID
	    	WHERE pd.employeeID=$id AND pd.payrolldetailsID =$payrolldetailsID"
		);

		$company = $this->db->query("
	    	SELECT * 
	    	FROM dm_company"
		);

	    $result1 = $report->result();
	    $result2 = $company->result();
	          return array(
	          	'report' => $result1,
	          	'company' => $result2
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
		$query = $this->db->query(' SELECT * FROM dm_post WHERE clientID ='.$client.'');
		return $query->result();
	}
}
?>