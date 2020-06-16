<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_model extends CI_Model
{
	function __construct() 
	{ 
	parent::__construct(); 
	}

	function get_all_leave()
	{
		$dataemployee = $this->db->query("SELECT employeeID, CONCAT(LPAD(employeeID, 5, 0), ' - ',lastname,', ',firstname, ' ', middlename) AS fullname FROM  dm_employee WHERE employeestatus = 'Active'");
		$dataleave = $this->db->query('SELECT * FROM dm_leavetype WHERE leavetypestatus = "Active"');
		$employeerecord = $this->db->query("
							SELECT 
							*
							FROM
							(
							SELECT  el.leavetypeID,el.employeeID,photo, totalleave as remainingleave,  el.employeeleaveID, lt.leavetypename, concat(e.lastname, ', ', e.firstname,' ',middlename) as fullname,
							el.leavefrom, el.leaveto,numberofdays,reason,d.description as department,dsg.designationdescription, el.notedleave AS noted,leavestatus
							FROM dm_employeeleave AS el
							LEFT JOIN dm_leavetype AS lt ON el.leavetypeID = lt.leavetypeID
							LEFT JOIN dm_employee as e ON el.employeeID = e.employeeID
							LEFT JOIN dm_department as d ON e.departmentID = d.departmentID
							LEFT JOIN dm_designation as dsg ON e.designationID = dsg.designationID
							LEFT JOIN dm_employeecreditleave AS ec ON el.leavetypeID = ec.leavetypeID AND el.employeeID = ec.employeeID
							GROUP  BY el.employeeID,el.leavetypeID,leavefrom
							)a
							order by employeeID;
							");
		$employeerecord = $employeerecord->result();
		$queryemployee = $dataemployee->result();
		$dataleave = $dataleave->result();
		return array('employee' => $queryemployee, 'leave' => $dataleave, 'record' => $employeerecord);
	}	
	function search_totalleave($id, $leave)
	{
		if($id==""){
			$employeeID ="WHERE employeeID = 0";
		}else{
			$employeeID ="WHERE employeeID = $id";
		}
		if($leave==""){
			$leaveID = "AND leavetypeID = 0";
		}else{
			$leaveID =" AND leavetypeID = $leave";
		}
		$leave = $this->db->query("
			SELECT employeeID, leavetypeID, (totalleave) AS remainingleave FROM dm_employeecreditleave $employeeID $leaveID
		");
		$schedule = $this->db->query("SELECT CASE WHEN COUNT(1) > 0 THEN 1 ELSE 0 END AS ass2,IFNULL(restday,99) as restday ,IFNULL(employeeID,99)
		FROM dm_schedule $employeeID GROUP BY scheduleID");

		/*print_r($this->db->last_query());  
     	  exit;*/
		//return $leave->result();
     	  return array('leave' => $leave->result(),'schedule' => $schedule->result());
	}
	function save_leave($data,$numberofdays,$leavetypeID,$employeeID, $remainingleave,$addfrom, $addto)
	{

		$updatedtotalledave = ($remainingleave - $numberofdays);
		$checkleave = $this->db->query('
					SELECT * FROM dm_employeeleave WHERE leavetypeID = '.$leavetypeID.' AND employeeID ='.$employeeID.' AND  leavefrom = "'.$addfrom.'"');
		if($checkleave->num_rows() == 0){
			$updatedemployeecredit = array(
				'employeeID' => $employeeID,
				'leavetypeID' => $leavetypeID);
			$updatedtotal = array(
				'totalleave' => $updatedtotalledave);
			$this->db->where($updatedemployeecredit);  
            $this->db->update("dm_employeecreditleave", $updatedtotal);  
			$this->db->insert('dm_employeeleave', $data);
			return 'true|Filing of leave successfully created!';
	}else{	
		return 'false|The employee has an existing leave on this day';	
	}
	}
	function update_leave($data,$numberofdays,$leavetypeID,$employeeID, $remainingleave,$addfrom, $addto, $id, $lessLeave)
	{
		$checkleave = $this->db->query('
		SELECT * FROM dm_employeeleave WHERE employeeleaveID != '.$id.' AND leavetypeID = '.$leavetypeID.' AND employeeID ='.$employeeID.' AND  leavefrom ="'.$addfrom.'" AND leaveto ="'.$addto.'"');
		if($checkleave->num_rows() == 0){
		$updatedtotalledave = ($remainingleave - $numberofdays);
		$updatedemployeecredit = array(
					'employeeID' => $employeeID,
					'leavetypeID' => $leavetypeID);		
		$updatedtotal = array(
					'totalleave' => $lessLeave);
				$this->db->where($updatedemployeecredit);  
	            $this->db->update("dm_employeecreditleave", $updatedtotal);
	            $this->db->where('employeeleaveID',$id);  
	            $this->db->update("dm_employeeleave", $data);    
			return 'true|Filing of leave successfully updated!';
		}else{	
			return 'false|The employee has an existing leave on this day';
			
		}
	}
	function get_employeeleave($employeeID)
	{
		if($employeeID==""){
			$employee ="WHERE ecl.employeeID = 0";
		}else{
			$employee ="WHERE ecl.employeeID = $employeeID";
		}

		$query = $this->db->query("
		SELECT * FROM
		(
		SELECT ecl.leavetypeID,l.leavetypename,ecl.totalleave FROM dm_employeecreditleave AS ecl
		LEFT JOIN dm_employee AS e ON ecl.employeeID = e.employeeID
		LEFT JOIN dm_leavetype AS l ON ecl.leavetypeID = l.leavetypeID
		$employee
		)a");
		return $query->result();
	}
	function get_noted($id,$noted)
	{
		$leavestatus = "Reviewed";
		$data = array(
			'leavestatus' => $leavestatus,
				'employeeleaveID' => $id,
				'notedleave' => $noted
			 );
			$this->db->where("employeeleaveID", $id);  
            $this->db->update("dm_employeeleave", $data);  
            return 'leave note successfully created!';  

	}
}