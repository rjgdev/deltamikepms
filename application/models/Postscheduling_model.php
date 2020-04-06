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
	   /* $queryEmployee = $this->db->query('SELECT * FROM dm_employee WHERE employeestatus="Active" and employeetypeID=1 and clientID='.$clientID);*/
	    $queryPostschedule = $this->db->query('SELECT * FROM dm_postschedule
    							 	   		   WHERE clientID  ='.$clientID.' AND 
    							 	   			     postID    ='.$postID.' AND 
    							 	   			     weekstart ="'.$weekstart.'" AND
    							 	   			     weekend   ="'.$weekend.'" order by timein');

    	return array("postschedule" => $queryPostschedule->result());
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

