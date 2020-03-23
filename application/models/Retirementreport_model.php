
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retirementreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Retirementreport()

	{
		$queryretirement = $this->db->query("SELECT *,group_concat(employeeid) AS employee from dm_retirement WHERE retirementstatus = 2");
		$employee = $queryretirement->row()->employee;
		if($queryretirement->row()->employee ==0){
			$employeeID = " 0 ";
			
			}else{
			$employeeID = $queryretirement->row()->employee;
			
			}
		$query = $this->db->query("SELECT 
									employeeID
									, concat('00000','',employeeID, ' - ',lastname,', ',firstname, ' ', middlename) as employeename 
									FROM dm_employee WHERE employeeID IN(".$employeeID.")");
		  return $query->result();

	}
	function get_all_Retirement($employee)
	{
	if($employee == 0){
		$employeerecord[] = "WHERE e.employeeID = 0 ";

	}else{
		$searchemployee = implode(",", $employee);
		$employeerecord[] = "WHERE e.employeeID IN (".$searchemployee.")";
	}
	$query = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
							, clientname, detachment, retfund, basicsalary, netpay
							, lastcutoff, hireddate, lastcutoff,yearofhired, yearofwork  
							FROM
							(
								SELECT 
								e.employeeID,
								concat(lastname,', ',firstname,' ',middlename) as employeename
								,d.description AS department,ds.designationdescription as designation,
								CASE
								WHEN e.employeetypeID = 1 THEN 'Security Guard'
								WHEN e.employeetypeID = 2 THEN 'Staff'
								ELSE employeetypeID
								END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
								sum(pd.retfund) as retfund, e.basicsalary, late, absent, SUM(netpay) AS netpay,
								year(pd.datefrom) as yearofhired,
								cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
								concat(date_format(MAX(pd.datefrom),'%M% %d'),' - ',  date_format(MAX(pd.dateto),'%d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
								FROM dm_payrolldetails AS pd
								LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
								LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
								LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
								LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
								LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
								LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								".$employeerecord[0]."  
								GROUP BY e.employeeID
								ORDER BY employeeID,yearofwork ASC
							)a 
							WHERE yearofwork >= 5
							ORDER BY employeeID,yearofwork ASC");
			//print_r($this->db->last_query());  
			//exit;
		$queryemployee = $this->db->query("SELECT group_concat(e.employeeID) as employeeid FROM dm_employee as e ".$employeerecord[0]."");
			
			return array('employee' => $queryemployee->result(),'result' => $query->result());

	}
	function searchemployeerecord($employee)
	{
		/*if($employee==0){
			$emp = "0";
			$emp= "WHERE e.employeeID =(".$emp.")";
		}else{
			
			$emp = "WHERE e.employeeID =(".$searchemployee.")";
		}*/
		$query = $this->db->query("SELECT 
								employeeID, employeename, employeetype, department, designation , 
								 retfund, basicsalary, netpay , hireddate, yearofhired, yearofwork
								 FROM 
								 ( 
								 SELECT e.employeeID, concat(lastname,', ',firstname,' ',middlename) as employeename ,d.description AS department,
								 ds.designationdescription as designation, 
								 CASE WHEN e.employeetypeID = 1 THEN 'Security Guard' WHEN e.employeetypeID = 2 THEN 'Staff' ELSE employeetypeID END AS employeetype ,
								 sum(pd.retfund) as retfund, e.basicsalary, late, absent, 
								 SUM(netpay) AS netpay, year(pd.datefrom) as yearofhired, cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
								 date_format(e.hireddate,'%M% %d%, %Y') hireddate
								 FROM dm_payrolldetails AS pd LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
								 LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID 
								 LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID 
								 LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID 
								 LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								 WHERE e.employeeID = ".$employee."  
								GROUP BY year(pd.datefrom),e.employeeID
								ORDER BY employeeID,yearofwork ASC
							)a 
							WHERE yearofwork >= 5
							ORDER BY employeeID,yearofwork ASC");
						//print_r($this->db->last_query());  
			$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address FROM dm_company");
			$datarecord = $query->result();
			$datacompany = $querycompany->result();
	        return array('record' => $datarecord, 'company' => $datacompany);

	}
	function searchemployeefullrecord($employee){

	if($employee == 0){
		$employeerecord[] = " ";

	}else{
		/*$searchemployee = implode(",", $employee);*/
		$employeerecord[] = "WHERE e.employeeID IN (".$employee.")";
	}
	$query = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
							, clientname, detachment, retfund, basicsalary, netpay
							, lastcutoff, hireddate, lastcutoff,yearofhired as year1, yearofwork  
							FROM
							(
								SELECT 
								e.employeeID,
								concat(lastname,', ',firstname,' ',middlename) as employeename
								,d.description AS department,ds.designationdescription as designation,
								CASE
								WHEN e.employeetypeID = 1 THEN 'Security Guard'
								WHEN e.employeetypeID = 2 THEN 'Staff'
								ELSE employeetypeID
								END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
								SUM(pd.retfund) AS retfund, e.basicsalary, late, absent, SUM(netpay) AS netpay,
								year(pd.datefrom) as yearofhired,
								cast(DATEDIFF(MAX(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
								concat(date_format(MAX(pd.datefrom),'%M% %d'),' - ',  date_format(MAX(pd.dateto),'%d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
								FROM dm_payrolldetails AS pd
								LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
								LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
								LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
								LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
								LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
								LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								".$employeerecord[0]."  
								GROUP BY e.employeeID
								ORDER BY employeeID,yearofwork ASC
							)a 
							WHERE yearofwork >= 5
							ORDER BY employeeID,yearofwork ASC");
			$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address FROM dm_company");
			$datarecord = $query->result();
			$datacompany = $querycompany->result();
	        return array('record' => $datarecord, 'company' => $datacompany);
			//print_r($this->db->last_query());  
			//exit;
			//return $query->result();

	}

}	