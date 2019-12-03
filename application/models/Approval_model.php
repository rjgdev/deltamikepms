<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approval_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_modules()
	{
		$this->db->select('*');
    	$this->db->from('approvalmodule');
    	$query = $this->db->get();

    	$query = $this->db->query('SELECT * FROM approvalmodule INNER JOIN modulemstr ON modulemstr.moduleID=approvalmodule.moduleID');
	    return $query->result();
  	}

  	function get_approval($id)
	{
    	$query = $this->db->query('SELECT * FROM approval 
    							   INNER JOIN employeetype ON employeetype.employeetypeID=approval.employeetypeID 
    							   WHERE approval.moduleID='.$id);
	    return $query->result();
  	}

  	function get_employee()
	{
    	$query = $this->db->query('SELECT employeeID,firstname,lastname FROM employee 
       							   WHERE employee.employeestatus="Active"');
	    return $query->result();
  	}

  	function get_employeetype()
	{
    	$query = $this->db->query('SELECT employeetypeID,employeeTypeDescription FROM employeetype');
	    return $query->result();
  	}

  	function get_approver($id)
	{
    	$query = $this->db->query('SELECT * FROM approvaldet 
    							   INNER JOIN employee 
    							   ON employee.employeeID=approvaldet.employeeID
    							   INNER JOIN designation
    							   ON designation.designationID=employee.designationID
    							   INNER JOIN department
    							   ON department.departmentID=employee.departmentID
    							   WHERE approvaldet.approvalID='.$id);
	    return $query->result();
  	}

  	function save_approval($employeeID)
	{	
		$record=array();
		$level=1;

		for($i=0; $i<count($employeeID); $i++) {
			$record[$i] = array('approvalID'   	=> 13,
					  			'employeeID' 	=> $employeeID[$i],
					  			'approvalLevel' => $level++);
		}

		$this->db->insert_batch('approvaldet', $record);

		return 'true|successfully created!';
  	}

  	function delete_approval($id,$description)
	{
		$query = $this->db->query('SELECT * FROM employee WHERE approvalID='.$id.' AND employeestatus="Active"');

		if($query->num_rows() == 0){
    		$this->db->where("approvalID", $id);  
	      	$this->db->delete("approval");  

      		$this->db->where("approvalID", $id);  
	      	$this->db->delete("approvaldet"); 

	  		return 'true|'.$description.' successfully deleted!';
        }else{
      		return 'false|This approval is currently in use and cannot be deleted.'; 
        }
  	}
}
?>

