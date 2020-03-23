<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_leave()
	{
	    $sick = $this->db->query("
			SELECT *
			FROM dm_employee as emp
			LEFT JOIN dm_employeecreditleave as empcredit
			ON emp.employeeID = empcredit.employeeID
			WHERE empcredit.leavetypeID = 1 AND emp.employeeID = ".$this->session->userdata('employeeID')."
			");

	    $vacation = $this->db->query("
			SELECT *
			FROM dm_employee as emp
			LEFT JOIN dm_employeecreditleave as empcredit
			ON emp.employeeID = empcredit.employeeID
			WHERE empcredit.leavetypeID = 2 AND empcredit.employeeID = ".$this->session->userdata('employeeID')."
			");

	    $result1 = $sick->result();
	    $result2 = $vacation->result();
	          return array(
	          	'sick' => $result1,
	          	'vacation' => $result2
	          );
  	}
}
?>

