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

		$payslip = $this->db->query("
	    	SELECT *, 
	    	pd.allowance as allwnce,
	    	pd.incentive as inctv,
	    	sssloan,
	    	hdmfloan,
    		salaryloan, 
    		emergencyloan, 
    		trainingloan,
    		otherloan,
	    	SUM(spc  + spcrst +  
	    		rgl + rglrst +  
	    		dbl + dblrst) as holidaypay,

	    	SUM(ordnight + rstnight + 
	    		spcnight + spcrstnight + 
	    		rglnight + rglrstnight + 
	    		dblnight + dblrstnight) as nightdiff,

	    	SUM(ordot + rstot + spcot +
	    		spcrstot + rglot + rglrstot +
	    		dblot + dblrstot) as overtime,

	    	SUM(otadjustment + 
	    		nightdiffadjustment + 
	    		lateadjustment + 
	    		leaveadjustment) as adjustment,	

	    	SUM(ordlate + rstlate + spclate + 
	    		spcrstlate + rgllate + rglrstlate +
	    		dbllate + dblrstlate) as lt,	

	    	SUM(basicpay + pd.incentive + pd.allowance +
	    		ordnight + rstnight + spcnight + 
	    		spcrstnight + rglnight + rglrstnight + 
	    		dblnight + dblrstnight + spcot + 
	    		spcrstot + rglot + rglrstot + 
	    		dblot + dblrstot + ordot + 
	    		rstot + otadjustment + nightdiffadjustment + 
	    		lateadjustment + leaveadjustment)  as earnings,

	    	SUM(absent + ordlate + rstlate + 
	    		spclate + spcrstlate + rgllate + 
	    		rglrstlate + dbllate + dblrstlate + 
	    		wtax + sss_ee + phic_ee + 
	    		hdmf_ee + sssloan + hdmfloan + 
	    		salaryloan + emergencyloan + trainingloan +
	    		otherloan)  as deductions,

	    	SUM(netpay - ordlate - rstlate -
	    		spcrstlate - rgllate - rglrstlate -
	    		spclate - dbllate - dblrstlate) as ntpay,

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