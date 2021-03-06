<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overtime_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_employeeovertime()
	{
			 $querysecurity = $this->db->query("SELECT employeeID, employeetypeID FROM dm_employee WHERE employeeID = ".$this->session->userdata('employeeID')."");
			$query = $this->db->query("SELECT employeeID, CONCAT('00000','',employeeID, ' - ',lastname,', ',firstname, ' ', middlename) AS fullname  FROM  dm_employee WHERE employeestatus = 'Active'");
				$result = $this->db->query("SELECT 
											* 
											FROM
											(
												SELECT o.overtimeid, o.employeeID, CONCAT(d.description,' / ',p.designationdescription) as positionDescription,p.designationdescription,d.description AS department,
												  CONCAT(lastname,', ',firstname, ' ', middlename) AS fullname,photo,
												  o.description, o.overtimedate, TIME_FORMAT(o.starttime,'%h:%i %p'	) as starttime,
												  TIME_FORMAT(o.endtime,'%h:%i %p') as endtime, totalhour,starttime as updatedstarttime,endtime as updatedendtime,noted,overtimestatus
												FROM dm_overtime as o
												LEFT JOIN dm_employee as emp ON o.employeeID = emp.employeeID 
												LEFT JOIN dm_department as d ON emp.departmentID = d.departmentID
												LEFT JOIN dm_designation as p ON d.departmentID = p.departmentID
												group by overtimeid,o.employeeid,o.overtimedate
											)a");
			$accesslevel = $querysecurity->result();	
			$query = $query->result();	 
			$queryovertime = $result->result();
			return array('dropdownemp' => $query, 'record' => $queryovertime, 'accesslevel' => $accesslevel);

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
				return 'true|Employee overtime successfully update.';
		 	}
			else 
			{
				return 'false|Employee overtime date already exist!';
			}  		 
  	}
  	function get_noted($id,$noted)
	{
		$overtimestatus = "Reviewed";
		$data = array(
				'overtimeID' => $id,
				'noted' => $noted,
				'overtimestatus' =>$overtimestatus
			 );
			$this->db->where("overtimeID", $id);  
            $this->db->update("dm_overtime", $data);  
            return 'Overtime noted successfully created!';  

	}
}