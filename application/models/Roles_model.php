<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_roles()
	{
		$this->db->select('*');
    	$this->db->from('rolemstr');
    	$query = $this->db->get();

	    return $query->result();
  	}

  	function get_modules($id)
	{
    	$query = $this->db->query('SELECT * FROM rolemodule INNER JOIN modulemstr ON modulemstr.moduleID=rolemodule.moduleID WHERE rolemodule.roleID='.$id);
	    return $query->result();
  	}

  	function change_status_role($id,$description,$status)
	{
		$data = array('modulestatus' => $status);

        $this->db->where("ID", $id);  
      	$this->db->update("rolemodule", $data);  

  		if($status=="1") return 'true|'.$description.' has been enabled!|enabled';
  		else return 'true|'.$description.' has been disabled!|disabled';
  	}

  	function delete_role($id,$description)
	{
		$query = $this->db->query('SELECT * FROM employee WHERE roleID='.$id.' AND employeestatus="Active"');

		if($query->num_rows() == 0){
    		$this->db->where("roleID", $id);  
	      	$this->db->delete("rolemstr");  

	  		return 'true|'.$description.' successfully deleted!';
        }else{
      		return 'false|This role is currently in use and cannot be deleted.'; 
        }
  	}

  	function save_role($description)
	{
		$query = $this->db->query('SELECT roleDescription FROM rolemstr WHERE roleDescription = "'.$description.'"');

		if($query->num_rows() == 0){

			$data = array('roleDescription' => $description);
			$this->db->insert('rolemstr', $data);

			$last_id = $this->db->insert_id();

			$record =array();
			for($i=1; $i<=25; $i++) {
				$record[$i] = array('roleID' => $last_id,
						  			'moduleID' => $i);
			}

			$this->db->insert_batch('rolemodule', $record);

			return 'true|'.$description.' successfully created!';
		}
		else 
		{
			return 'false|Role name already exist!';
		}   
  	}

  	function update_role($id,$description)
	{
		$query = $this->db->query('SELECT roleDescription FROM rolemstr WHERE roleID!='.$id.' AND roleDescription = "'.$description.'"');

		if($query->num_rows() == 0){

			$data = array(
				'roleDescription' => $description
			 );

			$this->db->where("roleID", $id);  
            $this->db->update("rolemstr", $data);  

			return 'true|'.$description.' successfully updated!';
		}
		else 
		{
			return 'false|Role name already exist!';
		}   
  	}

}
?>

