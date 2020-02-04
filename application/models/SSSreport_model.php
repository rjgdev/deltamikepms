<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SSSreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{
		$sssreport = $this->db->query('
			SELECT *
			FROM dm_payroll as pr
			WHERE pr.payperiod = 2
			ORDER BY pr.dateto DESC');

	    $result1 = $sssreport->result();	          
	    return array(
	          	'sssreport' => $result1
	          );
  	}

  	function get_details($id)
	{
		$company = $this->db->query("
	    	SELECT *
	    	FROM dm_company");

		$report = $this->db->query("
	    	SELECT *, 
	    	pr.dateto as prdateto,
	    	(pd.sss_ee + pd.sss_er) as ss,
	    	(pd.sss_ee + pd.sss_er + pd.sss_ec) as totalcontri
	    	FROM dm_payroll as pr
	    	LEFT JOIN dm_payrolldetails as pd
	    	ON pr.payrollID = pd.payrollID
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID = emp.employeeID
	    	WHERE pr.payrollID = $id"
		);

		$date = $this->db->query("
	    	SELECT *
	    	FROM dm_payroll as pr
	    	WHERE pr.payrollID = $id"
		);

		$sum = $this->db->query("
	    	SELECT *,
	    	SUM(sss_ec) as ec,
	    	SUM(sss_ee + sss_er) as totalss,
	    	SUM(sss_ee + sss_er + sss_ec) as total
	    	FROM dm_payrolldetails as pd
	    	LEFT JOIN dm_payroll as pr
	    	ON pd.payrollID = pr.payrollID
	    	WHERE pr.payrollID = $id"
		);

		/*$payslip = $this->db->query("
	    	SELECT *, 
	    	SUM(sssloan + hdmfloan) as loan,
	    	SUM(specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot + regholiday + speholiday) as holidaypay,
	    	SUM(basicpay  + nightdiff + pd.uniformallowance + ordinaryot + regholiday + speholiday + specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot)  as earnings,
	    	SUM(absent + late + wtax + sss + phic + hdmf + sssloan + hdmfloan)  as deductions,
	    	pd.dailyrate as drate,
	    	pd.payrolldetailsID as pdID,
	    	pd.employeeID as empID
	    	FROM dm_payrolldetails as pd 
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID=emp.employeeID 
	    	LEFT JOIN dm_client as client
	    	ON emp.clientID=client.clientID
	    	LEFT JOIN dm_payslipstatus as ps
	    	ON pd.payrolldetailsID=ps.payrolldetailsID "
		);*/

	    $result1 = $company->result();
	    $result2 = $report->result();
	    $result3 = $date->result();
	    $result4 = $sum->result();
	          return array(
	          	'company' => $result1,
	          	'report' => $result2,
	          	'date' => $result3,
	          	'sum' => $result4
	          );
  	}
}
?>