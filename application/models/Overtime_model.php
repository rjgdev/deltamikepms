<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overtime_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_employeeovertime()
	{

			$query = $this->db->query("SELECT employeeID, CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname FROM  employee");
			$result = $this->db->query("SELECT o.overtimeid, o.employeeID, CONCAT(d.description,' / ',p.designationdescription) as positionDescription,  CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname,photo, o.description, o.overtimedate, TIME_FORMAT(o.starttime,'%h:%i %p'	) as starttime, TIME_FORMAT(o.endtime,'%h:%i %p') as endtime, totalhour
			FROM overtime as o
			LEFT JOIN employee as emp ON o.employeeID = emp.employeeID 
			LEFT JOIN department as d ON emp.departmentID = d.departmentID
			LEFT JOIN designation as p ON d.departmentID = p.departmentID");
			$query = $query->result();	 
			$queryovertime = $result->result();
			return array('dropdownemp' => $query, 'record' => $queryovertime);

	}	
	function save_overtime($data,$employeeID,$overtimedate)
		{
			 $query = $this->db->query('SELECT * FROM overtime WHERE employeeid = '.$employeeID.' AND overtimedate like "'.$overtimedate.'"');
			 
			 if($query->num_rows() == 0){

			 $data1 = array(
					
					'employeeID' => $employeeID,
					'overtimedate' => $overtimedate);
			 	$this->db->insert('overtime', $data);
				return 'true|  Overtime  successfully created!';
			 	}
				else 
				{
					return 'false|Employee name and overttime date already exist!';
				}   
	  	}
  	function update_overtime($data,$id,$employeeID,$overtimedate,$description)
  	{
		$query = $this->db->query('SELECT * FROM overtime WHERE overtimeID != '.$id.' AND employeeID = '.$employeeID.' AND overtimedate like "'.$overtimedate.'" AND description like "'.$description.'"');
		 
		 if($query->num_rows() == 0){

				 $data1 = array(
				
				'employeeID' => $id,
				'overtimedate' => $overtimedate);

				$this->db->where("overtimeid", $id);  
	            $this->db->update("overtime", $data);  
				return 'true|Employee name and overtime date successfully updated!';
		 	}
			else 
			{
				return 'false|Employee name and overtime date already exist!';
			}  		 
  	}
}