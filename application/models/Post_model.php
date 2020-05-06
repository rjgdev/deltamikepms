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
			CONCAT(post.postID) as pstID, 
			CONCAT(post.city) as detachcity, 
			CONCAT(post.housenumber) as detachhousenumber, 
			CONCAT(post.streetname) as detachstreetname, 
			CONCAT(post.barangay) as detachbarangay, 
			CONCAT(client.clientID) as clntID
			FROM dm_post as post
			LEFT JOIN dm_client as client
			ON post.clientID=client.clientID
			LEFT JOIN dm_employee as emp
			ON post.commander=emp.employeeID
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

  	function save_detachment($data, $postname, $clientID)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){
			$this->db->insert('dm_post', $data);
			$last_id =	$this->db->insert_id();
			$record  = array();
			$dataschedule = array();

			return 'true|'.$postname.' successfully created!';
		}
		else 
		{
			return 'false|Post already exist!';
		}   
  	}

  	function update_detachment($id, $data, $postname, $clientID)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postID!='.$id.' AND postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){

			$this->db->where("postID", $id);  
            $this->db->update("dm_post", $data);
            $record  = array();
			$dataschedule = array();

			return 'true|'.$postname.' successfully updated!';
		}
		else 
		{
			return 'false|Post already exist!';
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
          		return 'false|Post is currently in used!'; 
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

