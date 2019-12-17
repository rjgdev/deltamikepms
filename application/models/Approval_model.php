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
    	$this->db->from('dm_approvalmodule');
    	$query = $this->db->get();

    	$query = $this->db->query('SELECT * FROM dm_approvalmodule INNER JOIN dm_modulemstr ON dm_modulemstr.moduleID=dm_approvalmodule.moduleID');
	    return $query->result();
  	}

    function get_approval($id,$type)
    {
      $employeeType = ($type=="0") ? "" : " AND dm_approval.employeetypeID=".$type;

    	$query = $this->db->query('SELECT * FROM dm_approval 
    							   INNER JOIN dm_employeetype ON dm_employeetype.employeetypeID=dm_approval.employeetypeID 
    							   WHERE dm_approval.moduleID='.$id.$employeeType.' order by approvalDescription');
      return $query->result();
    }

    function get_employee()
    {
    	$query = $this->db->query('SELECT employeeID,firstname,lastname FROM dm_employee 
       							   WHERE dm_employee.employeestatus="Active"');
      return $query->result();
    }

    function get_employeetype()
    {
    	$query = $this->db->query('SELECT employeetypeID,employeeTypeDescription FROM dm_employeetype');
      return $query->result();
    }

    function get_approver($id)
    {
      $query = $this->db->query('SELECT * FROM dm_approvaldet 
      						   INNER JOIN dm_employee 
      						   ON dm_employee.employeeID=dm_approvaldet.employeeID
      						   INNER JOIN dm_designation
      						   ON dm_designation.designationID=dm_employee.designationID
      						   INNER JOIN dm_department
      						   ON dm_department.departmentID=dm_employee.departmentID
      						   WHERE dm_approvaldet.approvalID='.$id.' order by  approvalLevel');
      return $query->result();
    }

    function save_approval($moduleID, $description, $type, $employeeID)
    {	
      $record=array();
      $level=1;

      $data = array(
        'approvalDescription' => $description,
        'moduleID' => $moduleID,
        'employeetypeID' => $type
       );

      $this->db->insert('dm_approval', $data);

      $last_id = $this->db->insert_id();

      for($i=0; $i<count($employeeID); $i++) {
      	$record[$i] = array('approvalID'    => $last_id,
              			  			'employeeID' 	  => $employeeID[$i],
              			  			'approvalLevel' => $level++);
      }

      $this->db->insert_batch('dm_approvaldet', $record);

      return 'true|successfully created!';
    }

    function delete_approval($id,$description)
    {
      $query = $this->db->query('SELECT * FROM dm_employee WHERE approvalID='.$id.' AND employeestatus="Active"');

      if($query->num_rows() == 0){
  		  $this->db->where("approvalID", $id);  
      	$this->db->delete("dm_approval");  

    		$this->db->where("approvalID", $id);  
      	$this->db->delete("dm_approvaldet"); 

  		return 'true|'.$description.' successfully deleted!';
      }else{
    		return 'false|This approval is currently in use and cannot be deleted.'; 
      }
    }
}
?>

