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

  	function get_schedule($clientID)
	{
	    $queryEmployee = $this->db->query('SELECT * FROM dm_employee WHERE employeestatus="Active" and employeetypeID=1 and clientID='.$clientID);
	    $queryPost     = $this->db->query('SELECT dm_postschedule.timein,dm_postschedule.timeout,dm_post.postID,dm_post.postname,dm_postschedule.postscheduleID FROM dm_post
	    								   INNER JOIN dm_postschedule ON dm_postschedule.postID=dm_post.postID
	    							 	   WHERE clientID='.$clientID);

    	return array("employee" => $queryEmployee->result(),
    				 "post"     => $queryPost->result());
  	}

  	function load_guard($postID,$postType,$scheduleDay,$postscheduleID)
	{
		$querySchedule = $this->db->query('SELECT * FROM dm_scheduleguard WHERE postID='.$postID.' AND postscheduleID='.$postscheduleID.' AND scheduleDay='.$scheduleDay.' AND postType="'.$postType.'"');

		return $querySchedule->result();
	}

	function save_guard($postID,$postType,$scheduleDay,$employeeID,$postscheduleID)
	{
		$this->db->query('DELETE FROM dm_scheduleguard WHERE postID='.$postID.' AND postscheduleID='.$postscheduleID.' AND scheduleDay='.$scheduleDay.' AND postType="'.$postType.'"');
		for($count = 0; $count<count($employeeID); $count++)
		{
			$record[$count] = array ('postID'	   		=> $postID,
									 'postscheduleID'	=> $postscheduleID,
									 'postType'    => $postType,
									 'scheduleDay' => $scheduleDay,
									 'employeeID'  => $employeeID[$count]);				
		}

		$this->db->insert_batch('dm_scheduleguard',$record);
	}
}
?>

