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
			SELECT *, CONCAT(detach.city) as detachcity, CONCAT(detach.housenumber) as detachhousenumber, CONCAT(detach.streetname) as detachstreetname, CONCAT(detach.barangay) as detachbarangay
			FROM dm_post as detach
			LEFT JOIN dm_client as client
			ON detach.clientID=client.clientID
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

  	function save_detachment($postname, $clientID)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){

			$data = array(
				'postname' => $postname,
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'clientID' => $this->input->post('clientID'),
				'commander' => $this->input->post('commander'),
				'startdate' => $this->input->post('startdate'),
				'enddate' => $this->input->post('enddate'),
				'noofguard' => $this->input->post('noofguard'),
				'timein' => $this->input->post('timein'),
				'timeout' => $this->input->post('timeout'),
				'poststatus' => 'Active'
			 );

			$this->db->insert('dm_post', $data);
			return 'true|'.$postname.' successfully created!';
		}
		else 
		{
			return 'false|Detachment post already exist!';
		}   
  	}

  	function update_detachment($id,$postname, $clientID)
	{
		$query = $this->db->query('SELECT postname FROM dm_post WHERE postID!='.$id.' AND postname = "'.$postname.'" AND clientID = "'.$clientID.'"' );

		if($query->num_rows() == 0){

			$data = array(
				'postname' => $postname,
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'clientID' => $this->input->post('clientID'),
				'commander' => $this->input->post('commander'),
				'startdate' => $this->input->post('startdate'),
				'enddate' => $this->input->post('enddate'),
				'noofguard' => $this->input->post('noofguard'),
				'timein' => $this->input->post('timein'),
				'timeout' => $this->input->post('timeout'),
			 );

			$this->db->where("postID", $id);  
            $this->db->update("dm_post", $data);    

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

