
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retirementreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Retirementreport()

	{
		$query = $this->db->query("SELECT 
									r.employeeID
									, concat(firstname,' ',middlename,' ',lastname) as employeename 
									FROM dm_retirement as r
									LEFT JOIN dm_employee as e ON r.employeeID = e.employeeID");
		  return $query->result();

	}
	function get_all_Retirement($employee)
	{
	if($employee == 0){
		$employeerecord[] = " ";

	}else{
		$searchemployee = implode(",", $employee);
		$employeerecord[] = "WHERE e.employeeID IN (".$searchemployee.")";
	}
	$query = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
							, clientname, detachment, retfund, basicsalary, FORMAT(netpay,4) as netpay
							, lastcutoff, hireddate, lastcutoff,yearofhired, yearofwork  
							FROM
							(
								SELECT 
								e.employeeID,
								concat(firstname,' ',middlename,' ',lastname) as employeename
								,d.description AS department,ds.designationdescription as designation,
								CASE
								WHEN e.employeetypeID = 1 THEN 'Security Guard'
								WHEN e.employeetypeID = 2 THEN 'Staff'
								ELSE employeetypeID
								END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
								FORMAT(retfund,4)as retfund,FORMAT(e.basicsalary,4) as basicsalary,format(late,4) as late,format(absent,4) as absent,format(SUM(netpay),4) AS netpay,
								year(pd.datefrom) as yearofhired,
								cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
								concat(date_format(pd.datefrom,'%M% %d%, %Y'),' - ',  date_format(pd.dateto,'%M% %d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
								FROM dm_payrolldetails AS pd
								LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
								LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
								LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
								LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
								LEFT JOIN dm_detachment AS dtc ON e.detachmentID = dtc.detachmentID
								LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								".$employeerecord[0]."  
								GROUP BY year(pd.datefrom),e.employeeID
								ORDER BY employeeID,yearofwork ASC
							)a 
							WHERE yearofwork >= 5
							ORDER BY employeeID,yearofwork ASC");
			//print_r($this->db->last_query());  
			//exit;
			return $query->result();

	}
}	