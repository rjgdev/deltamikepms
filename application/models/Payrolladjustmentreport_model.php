<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payrolladjustmentreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function load_employee($employeetype){
		$filter = "";

		if($employeetype!="All"){
			$filter="employeetypeID=".$employeetype.' AND';
		}

		$query   = $this->db->query('SELECT employeeID,CONCAT(lastname,", ",firstname) AS "fullname" FROM dm_employee WHERE '.$filter.' employeestatus="Active"');
    	return $query->result();
	}

	function view_report($datefrom,$dateto,$employee){
		$filter="";

		if($employee!="All"){
			$filter=" AND dm_payrolldetails.employeeID=".$employee;
		}

		$query   = $this->db->query('SELECT dm_payrolldetails.employeeID,CONCAT(lastname,", ",firstname) AS "fullname",
									concat(date_format(dm_payroll.datefrom,"%M% %d%,%Y")," - ",date_format(dm_payroll.dateto,"%M% %d%,%Y")) as "payperiod",otadjustment,nightdiffadjustment,lateadjustment,leaveadjustment,otheradjustment FROM dm_payroll
									 INNER JOIN dm_payrolldetails ON dm_payrolldetails.payrollID = dm_payroll.payrollID
									 INNER JOIN dm_employee ON dm_employee.employeeID = dm_payrolldetails.employeeID
								     WHERE payrollstatus=2 AND (
									 date_format(dm_payroll.datefrom,"%Y%-%m") >= "'.$datefrom.'" AND date_format(dm_payroll.datefrom,"%Y%-%m") <= "'.$dateto.'")
									 '.$filter.' ORDER BY dm_payrolldetails.employeeID, dm_payroll.datefrom');
    	return $query->result();	
	}
}
?>

