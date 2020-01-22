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

    function get_approval($id)
    {
    	$query = $this->db->query('SELECT * FROM dm_approval WHERE dm_approval.moduleID='.$id.' order by approvalDescription');
      return $query->result();
    }

    function get_employee()
    {
    	$query = $this->db->query('SELECT employeeID,firstname,lastname FROM dm_employee 
       							   WHERE dm_employee.employeestatus="Active"');
      return $query->result();
    }

    function get_approver($id)
    {
      $queryApproval = $this->db->query('SELECT * FROM dm_approval WHERE moduleID='.$id);

      $queryApprovalDet = $this->db->query('SELECT * FROM dm_approvaldet 
          						   INNER JOIN dm_employee 
          						   ON dm_employee.employeeID=dm_approvaldet.employeeID
          						   INNER JOIN dm_designation
          						   ON dm_designation.designationID=dm_employee.designationID
          						   INNER JOIN dm_department
          						   ON dm_department.departmentID=dm_employee.departmentID
          						   WHERE dm_approvaldet.approvalID='.$queryApproval->row()->approvalID.' order by approvalLevel');

      return $queryApprovalDet->result();
    }

    function get_updateapprover($id)
    {
      $queryApproval = $this->db->query('SELECT * FROM dm_approval WHERE moduleID='.$id);

      $queryApprovalDet = $this->db->query('SELECT * FROM dm_approvaldet 
                         INNER JOIN dm_employee 
                         ON dm_employee.employeeID=dm_approvaldet.employeeID
                         INNER JOIN dm_designation
                         ON dm_designation.designationID=dm_employee.designationID
                         INNER JOIN dm_department
                         ON dm_department.departmentID=dm_employee.departmentID
                         WHERE dm_approvaldet.approvalID='.$queryApproval->row()->approvalID.' order by approvalLevel');

      $queryEmployee = $this->db->query('SELECT employeeID,firstname,lastname FROM dm_employee 
                                         WHERE dm_employee.employeestatus="Active"');

      return array("approvaldet" => $queryApprovalDet->result(), "employee" => $queryEmployee->result());
    }

    function save_approval($moduleID, $employeeID)
    {	
      $record=array();
      $level=1;

      $queryApproval = $this->db->query('SELECT * FROM dm_approval WHERE moduleID='.$moduleID);

      $this->db->where("approvalID", $queryApproval->row()->approvalID);  
      $this->db->delete("dm_approvaldet"); 

      for($i=0; $i<count($employeeID); $i++) {
        $lastapprover = ($i==count($employeeID)-1) ? 1 : 0 ;

      	$record[$i] = array('approvalID'    => $queryApproval->row()->approvalID,
              			  			'employeeID' 	  => $employeeID[$i],
              			  			'approvalLevel' => $level++,
                            'lastapprover'  => $lastapprover);
      }

      $this->db->insert_batch('dm_approvaldet', $record);

      return $moduleID;
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

