<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Postscheduling_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
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

  	function get_schedule($clientID,$postID,$weekstart,$weekend)
	{
	    $queryPostschedule = $this->db->query('SELECT * FROM dm_postschedule
    							 	   		   WHERE clientID  ='.$clientID.' AND 
    							 	   			     postID    ='.$postID.' AND 
    							 	   			     weekstart ="'.$weekstart.'" AND
    							 	   			     weekend   ="'.$weekend.'" order by timein, timeout');

	    if($queryPostschedule->num_rows()!=0){
    		$queryPostscheduleGuard = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) AS "fullname" FROM dm_postschedule_guard
    													INNER JOIN dm_employee ON dm_employee.employeeID=dm_postschedule_guard.employeeID
		    							 	   		    order by weekday, lastname');

    		return array("postschedule" => $queryPostschedule->result(), "postscheduleguard" => $queryPostscheduleGuard->result());
	    }else{
	    	return array("postschedule" => $queryPostschedule->result());
	    }
  	}

	function load_guard($clientID,$postID,$weekstart,$weekend)
	{
		$queryGuard = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) as "fullname" FROM dm_employee WHERE employeetypeID=1 AND employeestatus="Active" ORDER BY employeeID');

		return $queryGuard->result();
	}

	function save_guard($postscheduleID, $weekday, $employeeID)
	{
		$this->db->query('DELETE FROM dm_postschedule_guard WHERE postscheduleID='.$postscheduleID.' AND weekday='.$weekday);
		for($count = 0; $count<count($employeeID); $count++)
		{
			$record[$count] = array ('postscheduleID'	=> $postscheduleID,
									 'weekday'    		=> $weekday,
									 'employeeID'  		=> $employeeID[$count]);				
		}

		$this->db->insert_batch('dm_postschedule_guard',$record);

		$queryGuard = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) as "fullname" FROM dm_postschedule_guard
										INNER JOIN dm_employee ON dm_employee.employeeID=dm_postschedule_guard.employeeID
								 		WHERE postscheduleID='.$postscheduleID.' AND weekday='.$weekday.' ORDER BY lastname');

		$queryPostschedule = $this->db->query('SELECT * FROM dm_postschedule WHERE postscheduleID='.$postscheduleID);


		return array("schedule" => $queryPostschedule->result(), "guard" => $queryGuard->result());
	}

	function remove_guard($postscheduleID, $weekday, $employeeID)
	{
		$this->db->query('DELETE FROM dm_postschedule_guard WHERE postscheduleID='.$postscheduleID.' AND weekday='.$weekday.' AND employeeID='.$employeeID);

		$queryGuard = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) as "fullname" FROM dm_postschedule_guard
										INNER JOIN dm_employee ON dm_employee.employeeID=dm_postschedule_guard.employeeID
								 		WHERE postscheduleID='.$postscheduleID.' AND weekday='.$weekday.' ORDER BY lastname');


		return $queryGuard->result();
	}

	function save_sched($clientID, $postID, $weekstart, $weekend, $timein, $timeout)
	{
		$query = $this->db->query('SELECT postscheduleID FROM dm_postschedule 
								   WHERE  clientID='.$clientID.' AND '.
								   	     'postID='.$postID.' AND '.
								   	     'weekstart="'.$weekstart.'" AND '.
								   	     'weekend="'.$weekend.'" AND '.
								   	     'timein="'.$timein.'" AND '.
								   	     'timeout="'.$timeout.'"');

		if($query->num_rows()==0){

			$data = array('clientID'  => $clientID,
						  'postID'    => $postID,
						  'weekstart' => $weekstart,
						  'weekend'   => $weekend,
						  'timein'    => $timein,
						  'timeout'   => $timeout);

			$this->db->insert('dm_postschedule', $data);

			return "true|success";
		}
		else 
		{
			return "false|error";
		}   
	}

	function remove_sched($postscheduleID)
	{
		$this->db->query('DELETE FROM dm_postschedule_guard WHERE postscheduleID='.$postscheduleID);
		$this->db->query('DELETE FROM dm_postschedule WHERE postscheduleID='.$postscheduleID);

		return "success";
	}
}
?>

