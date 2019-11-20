<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designation_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_designation()
	{
	    $designation = $this->db->query('

			SELECT *
			FROM designation
			LEFT JOIN department
			ON designation.departmentID=department.departmentID
			');

	    $department = $this->db->query('
			SELECT * FROM department 
			');

	    $result1 = $designation->result();
	    $result2 = $department->result();
	          return array(
	          	'designation' => $result1,
	            'department' => $result2
	          );
  	}

  	function save_designation($designationdescription, $departmentID)
	{
		$query = $this->db->query('SELECT designationdescription FROM designation WHERE designationdescription = "'.$designationdescription.'" AND departmentID = "'.$departmentID.'"' );

		if($query->num_rows() == 0){

			$data = array(
				'designationdescription' => $designationdescription,
				'departmentID' => $this->input->post('departmentID'),
				'designationstatus' => 'Active'
			 );

			$this->db->insert('designation', $data);
			return 'true|'.$designationdescription.' successfully created!';
		}
		else 
		{
			return 'false|Designation already exist!';
		}   
  	}

  	function update_designation($id,$designationdescription, $departmentID)
	{
		$query = $this->db->query('SELECT designationdescription FROM designation WHERE designationid!='.$id.' AND designationdescription = "'.$designationdescription.'" AND departmentID = "'.$departmentID.'"' );

		if($query->num_rows() == 0){

			$data = array(
				'designationdescription' => $designationdescription,
				'departmentID' => $this->input->post('departmentID')
			 );

			$this->db->where("designationID", $id);  
            $this->db->update("designation", $data);    

			return 'true|'.$designationdescription.' successfully updated!';
		}
		else 
		{
			return 'false|Designation already exist!';
		}   
  	}

  	function change_status_designation($id,$status,$designationdescription)
	{
		if($status=="Inactive"){
			$query = $this->db->query('SELECT * FROM employee WHERE designationid='.$id.' AND employeestatus="Active"');

			if($query->num_rows() == 0){
            	$data = array('designationstatus' => $status);

	            $this->db->where("designationID", $id);  
	          	$this->db->update("designation", $data);  
	          	return 'true|'.$designationdescription.' successfully changed the status!';
            }else{
          		return 'false|Designation is currently in used!'; 
            }
		}else{
			$data = array('designationstatus' => $status);

			$this->db->where("designationID", $id);  
          	$this->db->update("designation", $data);    
			return 'true|'.$designationdescription.' successfully changed the status!';
		}
  	}
}
?>

