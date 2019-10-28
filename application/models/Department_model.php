<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_department()
	{
	    $query = $this->db->query('SELECT * FROM department');
	    return $query->result();
  	}

  	function save_department($description)
	{
		$query = $this->db->query('SELECT description FROM department WHERE description = "'.$description.'"');

		if($query->num_rows() == 0){

			$data = array(
				'description' => $description,
				'departmentstatus' => 'Active'
			 );

			$this->db->insert('department', $data);
			return 'true|'.$description.' successfully created!';
		}
		else 
		{
			return 'false|Department name already exist!';
		}   
  	}

  	function update_department($id,$description)
	{
		$query = $this->db->query('SELECT description FROM department WHERE departmentid!='.$id.' AND description = "'.$description.'"');

		if($query->num_rows() == 0){

			$data = array(
				'description' => $description
			 );

			$this->db->where("departmentID", $id);  
            $this->db->update("department", $data);  

			return 'true|'.$description.' successfully updated!';
		}
		else 
		{
			return 'false|Department name already exist!';
		}   
  	}

  	function change_status_department($id,$status,$description)
	{
		if($status=="Inactive"){
			$query = $this->db->query('SELECT * FROM employee WHERE departmentid='.$id.' AND status="Active"');

			if($query->num_rows() == 0){
            	$data = array('departmentstatus' => $status);

	            $this->db->where("departmentID", $id);  
	          	$this->db->update("department", $data);  
	          	return 'true|'.$description.' successfully changed the status!';
            }else{
          		return 'false|Department is currently in used!'; 
            }
		}else{
			$data = array('departmentstatus' => $status);

			$this->db->where("departmentID", $id);  
          	$this->db->update("department", $data);    
			return 'true|'.$description.' successfully changed the status!';
		}
  	}
}
?>

