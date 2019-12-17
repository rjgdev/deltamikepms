<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_employee()
	{
		 $dataemployee = $this->db->query('SELECT * FROM dm_employee as emp
				LEFT JOIN dm_designation as p on emp.designationID = p.designationID
				LEFT JOIN dm_department as d on emp.departmentid = d.departmentid 
				ORDER BY employeeid DESC');
		 $datadepartment = $this->db->query("SELECT * FROM dm_department");
  		 $datarole = $this->db->query("SELECT * FROM dm_rolemstr");
  		 $datadetachment = $this->db->query("SELECT * FROM dm_detachment");

	     $queryemployee = $dataemployee->result();
	     $querydepartment = $datadepartment->result();
	     $queryroleaccess = $datarole->result();
	     $querydetachment = $datadetachment->result();
	     return array('employee' => $queryemployee, 'department' => $querydepartment, 'roleaccess' => $queryroleaccess, 'detachment' => $querydetachment);

	}

	function save_employee($data,$firstname,$middlename,$lastname,$username)
	{	
		$query = $this->db->query('SELECT firstname, middlename,lastname FROM dm_employee WHERE firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');

		if($query->num_rows() == 0){
			$queryUsername = $this->db->query('SELECT username FROM dm_employee WHERE username="'.$username.'"');

			if($queryUsername->num_rows() == 0){
				$this->db->insert('dm_employee', $data);
				return 'true|  '.$firstname.' '.$middlename.' '.$lastname.' successfully created!';
			}else{
				return 'false|This username is already taken!';
			}
	 	}
		else 
		{
			return 'false|Employee name already exist!';
		}   
  	}
  	function update_employee($data,$id,$firstname,$middlename,$lastname,$username)
  	{
 		 $query = $this->db->query('SELECT firstname, middlename,lastname FROM dm_employee WHERE employeeid!='.$id.' AND firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');

		if($query->num_rows() == 0){
			$queryUsername = $this->db->query('SELECT username FROM dm_employee WHERE employeeid!='.$id.' AND username="'.$username.'"');

			if($queryUsername->num_rows() == 0){
				$this->db->where("employeeID", $id);  
	            $this->db->update("dm_employee", $data);  
				return 'true|00000'.$id.' - '.$firstname.' '.$middlename.' '.$lastname.' successfully updated!';
			}else{
				return 'false|This username is already taken!';
			}
	 	}
		else 
		{
			return 'false|Employee name already exist!';
		}  
  	}
  	 public function get_designation($departmentID)
    {
        $query = $this->db->get_where('dm_designation', array('departmentID' => $departmentID));
        return $query;
    }

   function update_employeepicture($employeeID, $data)
   {
   	   $this->db->where("employeeID", $employeeID);  
       $this->db->update("dm_employee", $data); 

   }
   function change_status_employee($id,$data)
   {
   	 	$this->db->where("employeeID", $id);  
       $this->db->update("dm_employee", $data); 
   }

}	
