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

		$datefrom = date('j',strtotime($queryHeader->row()->datefrom));
		$dateto	  = date('j', strtotime($queryHeader->row()->dateto));
		$sql = "";

		for($x=$datefrom;$x<=$dateto;$x++){
			$sql.='(SELECT d'.$x.' FROM dm_timekeepingreport WHERE tkreportID=tr.tkreportID AND SPLIT_STR(d'.$x.', "|", 6)='.$clientID.' AND SPLIT_STR(d'.$x.', "|", 7)='.$postID.') as "d'.$x.'",';
		}

	    $queryDetails = $this->db->query('SELECT '.$sql.'totalhours,basichours,othours,restday,totaldays,dm_employee.photo,dm_employee.lastname,tr.employeeID,
	    								  CONCAT(lastname,", ",firstname) AS "fullname" FROM dm_timekeepingreport as tr
	    								  INNER JOIN dm_employee ON dm_employee.employeeID=tr.employeeID
	    								  WHERE tr.timekeepingID='.$timekeepingID.'
    								  	  ORDER BY dm_employee.lastname,tr.employeeID');
    	return array("header" => $queryHeader->result(), "details" => $queryDetails->result());
  	}
}
?>