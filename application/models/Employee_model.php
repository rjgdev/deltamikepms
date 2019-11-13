<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_employee()
	{
		 $dataemployee = $this->db->query('SELECT * FROM employee as emp
				LEFT JOIN designation as p on emp.designationID = p.designationID
				LEFT JOIN department as d on emp.departmentid = d.departmentid 
				ORDER BY employeeid DESC');
		 $datadepartment = $this->db->query("SELECT * FROM department");
  		 $datarole = $this->db->query("SELECT * FROM rolemstr");
  		 $datadetachment = $this->db->query("SELECT * FROM detachment");

	     $queryemployee = $dataemployee->result();
	     $querydepartment = $datadepartment->result();
	     $queryroleaccess = $datarole->result();
	     $querydetachment = $datadetachment->result();
	     return array('employee' => $queryemployee, 'department' => $querydepartment, 'roleaccess' => $queryroleaccess, 'detachment' => $querydetachment);

	}

	function save_employee($data,$firstname,$middlename,$lastname,$username)
	{	
		$query = $this->db->query('SELECT firstname, middlename,lastname FROM employee WHERE firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');

		if($query->num_rows() == 0){
			$queryUsername = $this->db->query('SELECT username FROM employee WHERE username="'.$username.'"');

			if($queryUsername->num_rows() == 0){
				$this->db->insert('employee', $data);
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
 		 $query = $this->db->query('SELECT firstname, middlename,lastname FROM employee WHERE employeeid!='.$id.' AND firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');

		if($query->num_rows() == 0){
			$queryUsername = $this->db->query('SELECT username FROM employee WHERE employeeid!='.$id.' AND username="'.$username.'"');

			if($queryUsername->num_rows() == 0){
				$this->db->where("employeeID", $id);  
	            $this->db->update("employee", $data);  
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
        $query = $this->db->get_where('designation', array('departmentID' => $departmentID));
        return $query;
    }

   function update_employeepicture($employeeID, $data)
   {
   	   $this->db->where("employeeID", $employeeID);  
       $this->db->update("employee", $data); 

   }
   function change_status_employee($id,$data)
   {
   	 	$this->db->where("employeeID", $id);  
       $this->db->update("employee", $data); 
   }

}	
