<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overtime_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_employeeovertime()
	{

			$query = $this->db->query("SELECT employeeID, CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname FROM  dm_employee WHERE employeestatus = 'Active'");
			$result = $this->db->query("SELECT 
										* 
										FROM
										(
											SELECT o.overtimeid, o.employeeID, CONCAT(d.description,' / ',p.designationdescription) as positionDescription,
											  CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname,photo,
											  o.description, o.overtimedate, TIME_FORMAT(o.starttime,'%h:%i %p'	) as starttime,
											  TIME_FORMAT(o.endtime,'%h:%i %p') as endtime, totalhour,starttime as updatedstarttime,endtime as updatedendtime
											FROM dm_overtime as o
											LEFT JOIN dm_employee as emp ON o.employeeID = emp.employeeID 
											LEFT JOIN dm_department as d ON emp.departmentID = d.departmentID
											LEFT JOIN dm_designation as p ON d.departmentID = p.departmentID
											group by overtimeid,o.employeeid,o.overtimedate
										)a");
			$query = $query->result();	 
			$queryovertime = $result->result();
			return array('dropdownemp' => $query, 'record' => $queryovertime);

	}	
	function save_overtime($data,$employeeID,$overtimedate)
		{
			 $query = $this->db->query('SELECT * FROM dm_overtime WHERE employeeid = '.$employeeID.' AND overtimedate like "'.$overtimedate.'"');
			 
			 if($query->num_rows() == 0){

			 $data1 = array(
					
					'employeeID' => $employeeID,
					'overtimedate' => $overtimedate);
			 	$this->db->insert('dm_overtime', $data);
				return 'true|  Overtime  successfully created!';
			 	}
				else 
				{
					return 'false|Employee name and overttime date already exist!';
				}   
	  	}
  	function update_overtime($data,$id,$employeeID,$overtimedate,$description)
  	{
		$query = $this->db->query('SELECT * FROM dm_overtime WHERE overtimeID != '.$id.' AND employeeID = '.$employeeID.' AND overtimedate like "'.$overtimedate.'" AND description like "'.$description.'"');
		 
		 if($query->num_rows() == 0){

				 $data1 = array(
				
				'employeeID' => $id,
				'overtimedate' => $overtimedate);

				$this->db->where("overtimeid", $id);  
	            $this->db->update("dm_overtime", $data);  
				return 'true|Employee name and overtime date successfully updated!';
		 	}
			else 
			{
				return 'false|Employee name and overtime date already exist!';
			}  		 
  	}
}