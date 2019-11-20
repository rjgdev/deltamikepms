<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leavetype_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_leavetype()
	{
	    $query = $this->db->query('SELECT * FROM leavetype');
	    return $query->result();
  	}

  	function save_leavetype($leavetypename)
	{
		$query = $this->db->query('SELECT leavetypename FROM leavetype WHERE leavetypename = "'.$leavetypename.'"');

		if($query->num_rows() == 0){

			$data = array(
				'leavetypename' => $leavetypename,
				'noofdays' => $this->input->post('noofdays'),
				'accumulation' => $this->input->post('accumulation'),
				'leavetypestatus' => 'Active'
			 );

			$this->db->insert('leavetype', $data);
			return 'true|'.$leavetypename.' successfully created!';
		}
		else 
		{
			return 'false|Leave type already exist!';
		}   
  	}

  	function update_leavetype($id,$leavetypename)
	{
		$query = $this->db->query('SELECT leavetypename FROM leavetype WHERE leavetypeid!='.$id.' AND leavetypename = "'.$leavetypename.'"');

		if($query->num_rows() == 0){

			$data = array(
				'leavetypename' => $leavetypename,
				'noofdays' => $this->input->post('noofdays'),
				'accumulation' => $this->input->post('accumulation')
			 );

			$this->db->where("leavetypeID", $id);  
            $this->db->update("leavetype", $data);    

			return 'true|'.$leavetypename.' successfully updated!';
		}
		else 
		{
			return 'false|Leave type already exist!';
		}   
  	}

  	function change_status_leavetype($id,$status,$leavetypename)
	{
		if($status=="Inactive"){
			$query = $this->db->query('SELECT * FROM detachment WHERE leavetypeid='.$id.' AND detachmentstatus="Active"');

			if($query->num_rows() == 0){
            	$data = array('leavetypestatus' => $status);

	            $this->db->where("leavetypeID", $id);  
	          	$this->db->update("leavetype", $data);  
	          	return 'true|'.$leavetypename.' successfully changed the status!';
            }else{
          		return 'false|Leave type is currently in used!'; 
            }
		}else{
			$data = array('leavetypestatus' => $status);

			$this->db->where("leavetypeID", $id);  
          	$this->db->update("leavetype", $data);    
			return 'true|'.$leavetypename.' successfully changed the status!';
		}
  	}
}
?>

