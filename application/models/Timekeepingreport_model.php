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
								   WHERE timekeepingstatus=2 ORDER BY timekeepingID DESC');

		return array("timekeeping" => $query->result());
  	}

  	function get_client()
	{
	    $queryClient   = $this->db->query('SELECT * FROM dm_client WHERE clientstatus="Active"');
    	return array("client"   => $queryClient->result());
  	}

  	function get_post($clientID)
	{
	    $queryPost   = $this->db->query('SELECT * FROM dm_post WHERE clientID='.$clientID.' AND poststatus="Active"');
    	return array("post"   => $queryPost->result());
  	}

  	function view_report($timekeepingID,$clientID,$postID)
	{

		$queryHeader = $this->db->query('SELECT datefrom,dateto FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);

	    $queryDetails = $this->db->query('SELECT *,td.employeeID,CONCAT(lastname,", ",firstname) AS "fullname" FROM dm_timekeepingdetails as td
	    								 INNER JOIN dm_employee ON dm_employee.employeeID=td.employeeID
	    								 WHERE td.clientID='.$clientID.' AND 
	    								 td.postID='.$postID.' AND
	    								 td.timekeepingID='.$timekeepingID.' ORDER BY td.employeeID,td.datesched');
    	return array("header" => $queryHeader->result(), "details" => $queryDetails->result());
  	}
}
?>