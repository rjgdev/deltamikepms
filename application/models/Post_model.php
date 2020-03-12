<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_detachment()
	{
	    $detachment = $this->db->query('
			SELECT *, 
			CONCAT(detach.city) as detachcity, 
			CONCAT(detach.housenumber) as detachhousenumber, 
			CONCAT(detach.streetname) as detachstreetname, 
			CONCAT(detach.barangay) as detachbarangay, 
			CONCAT(client.clientID) as clntID
			FROM dm_post as detach
			LEFT JOIN dm_client as client
			ON detach.clientID=client.clientID
			LEFT JOIN dm_employee as emp
			ON detach.commander=emp.employeeID
			');

	    $client = $this->db->query('
			SELECT * FROM dm_client WHERE clientstatus="Active"
			');

	    $employee = $this->db->query('
			SELECT * FROM dm_employee WHERE employeestatus="Active"
			');

	    $result1 = $detachment->result();
	    $result2 = $client->result();
	    $result3 = $employee->result();
	          return array(
	          	'detachment' => $result1,
	            'client' => $result2,
	            'employee' => $result3
	          );
  	}

  	function save_detachment($data, $postname, $clientID, $timein, $timeout)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){
			$this->db->insert('dm_post', $data);
			$last_id =	$this->db->insert_id();
			$record  = array();
			$dataschedule = array();

			if(count($timein)!=0){
				for($count = 0; $count<count($timein); $count++)
				{
					$dataschedule[$count]  = array(
					'postID'			=>	$last_id,
					'timein'			=>	$timein[$count],
					'timeout'			=>	$timeout[$count]);
				}	
				$this->db->insert_batch('dm_postschedule', $dataschedule);
			}
			return 'true|'.$postname.' successfully created!';
		}
		else 
		{
			return 'false|Detachment post already exist!';
		}   
  	}

  	function update_detachment($id, $data, $postname, $clientID, $timein, $timeout)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postID!='.$id.' AND postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){

			$this->db->where("postID", $id);  
            $this->db->update("dm_post", $data);
            $record  = array();
			$dataschedule = array();

			if(count($timein)!=0){
				for($count = 0; $count<count($timein); $count++)
				{
					$dataschedule[$count]  = array(
					'postID'			=>	$last_id,
					'timein'			=>	$timein[$count],
					'timeout'			=>	$timeout[$count]);
				}	
				$this->db->update_batch('dm_postschedule', $dataschedule);
			}    

			return 'true|'.$postname.' successfully updated!';
		}
		else 
		{
			return 'false|Detachment post already exist!';
		}   
  	}

  	function change_status_detachment($id,$status,$postname)
	{
		if($status=="Inactive"){
			$query = $this->db->query('SELECT * FROM dm_employee WHERE postID='.$id.' AND employeestatus="Active"');

			if($query->num_rows() == 0){
            	$data = array('poststatus' => $status);

	            $this->db->where("postID", $id);  
	          	$this->db->update("dm_post", $data);  
	          	return 'true|'.$postname.' successfully changed the status!';
            }else{
          		return 'false|Detachment post is currently in used!'; 
            }
		}else{
			$data = array('poststatus' => $status);

			$this->db->where("postID", $id);  
          	$this->db->update("dm_post", $data);    
			return 'true|'.$postname.' successfully changed the status!';
		}
  	}
}
?>

