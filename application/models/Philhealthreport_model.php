<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Philhealthreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{
		$philhealthreport = $this->db->query('
			SELECT *,
			MONTH(pr.dateto) as month,
			YEAR(pr.dateto) as year
			FROM dm_payroll as pr
			WHERE pr.payperiod = 2 AND pr.payrollstatus = 2
			ORDER BY pr.dateto DESC');

	    $result1 = $philhealthreport->result();
	          return array(
	          	'philhealthreport' => $result1
	          );
  	}

  	function get_details($month, $year)
	{
		$company = $this->db->query("
	    	SELECT *
	    	FROM dm_company"
		);

		$report = $this->db->query("
	    	SELECT *,
	    	SUM(phic_ee) as ps,
	    	SUM(phic_er) as es
	    	FROM dm_payrolldetails as pd
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID = emp.employeeID
	    	LEFT JOIN dm_payroll as pr
	    	ON pd.payrollID = pr.payrollID
	    	WHERE MONTH(pr.dateto) = $month AND YEAR(pr.dateto) = $year
	    	GROUP BY pd.employeeID"
		);

		$sum = $this->db->query("
	    	SELECT *,
	    	SUM(phic_ee) as totalps,
	    	SUM(phic_er) as totales,
	    	SUM(phic_ee + phic_er) as total
	    	FROM dm_payrolldetails as pd
	    	LEFT JOIN dm_employee as emp
	    	ON pd.employeeID = emp.employeeID
	    	LEFT JOIN dm_payroll as pr
	    	ON pd.payrollID = pr.payrollID
	    	WHERE MONTH(pr.dateto) = $month AND YEAR(pr.dateto) = $year"
		);

	    $result1 = $company->result();
	    $result2 = $report->result();
	    $result3 = $sum->result();
	          return array(
	          	'company' => $result1,
	          	'report' => $result2,
	          	'sum' => $result3
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
    	$this->db->join('dm_detachment as dt', 'emp.clientID  = dt.clientID', 'left');

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

  	function get_post($post)
	{
		$query = $this->db->query('SELECT * FROM dm_detachment');
		return $query->result();
	}
}
?>