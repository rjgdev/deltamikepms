<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timekeepingreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_timekeeping()
	{ 
		$query = $this->db->query('SELECT *,
										  (SELECT CONCAT(firstname," ",lastname) FROM dm_employee WHERE dm_employee.employeeID=dm_timekeeping.usersubmitted) AS "employeesubmit",
										  (SELECT CONCAT(firstname," ",lastname) FROM dm_employee WHERE dm_employee.employeeID=dm_timekeeping.usersubmitted) AS "employeesubmit"
								   FROM dm_timekeeping 
								   WHERE timekeepingstatus=2');

		return array("timekeeping" => $query->result());
  	}
}
?>