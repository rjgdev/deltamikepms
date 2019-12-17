<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_timesheet()
	{ 
		$query = $this->db->query('SELECT firstname,lastname,checktime FROM dm_employee LEFT JOIN checkinout ON checkinout.pin = dm_employee.employeeID');

	    return $query->result();
  	}
}
?>

