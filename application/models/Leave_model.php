<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leave_model extends CI_Model
{
	function __construct() 
	{ 
	parent::__construct(); 
	}

	function get_all_leave()
	{
		$dataemployee = $this->db->query("SELECT employeeID, CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname FROM  dm_employee");
		$dataleave = $this->db->query('SELECT * FROM dm_leavetype');
		$employeerecord = $this->db->query("
							SELECT 
							*
							FROM
							(
							SELECT  el.leavetypeID,el.employeeID,photo, totalleave as remainingleave,  el.employeeleaveID, lt.leavetypename, concat(e.firstname, ' ', e.middlename,' ',lastname) as fullname,
							el.leavefrom,el.leaveto,numberofdays,reason
							FROM dm_employeeleave AS el
							LEFT JOIN dm_leavetype AS lt ON el.leavetypeID = lt.leavetypeID
							LEFT JOIN dm_employee as e ON el.employeeID = el.employeeID
							LEFT JOIN dm_employeecreditleave AS ec ON el.leavetypeID = ec.leavetypeID AND el.employeeID = ec.employeeID
							GROUP  BY el.employeeID,el.leavetypeID,leavefrom
							)a
							order by employeeID
							");
		$employeerecord = $employeerecord->result();
		$queryemployee = $dataemployee->result();
		$dataleave = $dataleave->result();
		return array('employee' => $queryemployee, 'leave' => $dataleave, 'record' => $employeerecord);
	}	
	function search_totalleave($id, $leave)
	{
		$leave = $this->db->query('
			SELECT employeeID, leavetypeID, (totalleave) AS remainingleave FROM dm_employeecreditleave WHERE leavetypeID ='.$leave.' AND employeeID = '.$id.'
		');
		return $leave->result();
	}
	function save_leave($data,$numberofdays,$leavetypeID,$employeeID, $remainingleave,$addfrom, $addto)
	{

		$updatedtotalledave = ($remainingleave - $numberofdays);
		$checkleave = $this->db->query('
					SELECT * FROM dm_employeeleave WHERE leavetypeID = '.$leavetypeID.' AND employeeID ='.$employeeID.' AND  leavefrom >= "'.$addfrom.'"');
		if($checkleave->num_rows() == 0){
			$updatedemployeecredit = array(
				'employeeID' => $employeeID,
				'leavetypeID' => $leavetypeID);
			$updatedtotal = array(
				'totalleave' => $updatedtotalledave);
			$this->db->where($updatedemployeecredit);  
            $this->db->update("dm_employeecreditleave", $updatedtotal);  
			$this->db->insert('dm_employeeleave', $data);
			return 'true|  leave successfully created!';
	}else{	
		return 'false|The employee has an existing leave on this day';	
	}
	}
	function update_leave($data,$numberofdays,$leavetypeID,$employeeID, $remainingleave,$addfrom, $addto, $id, $lessLeave)
	{
		$checkleave = $this->db->query('
		SELECT * FROM dm_employeeleave WHERE employeeleaveID != '.$id.' AND leavetypeID = '.$leavetypeID.' AND employeeID ='.$employeeID.' AND  leavefrom ="'.$addfrom.'"');
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
			return 'true|  leave successfully created!';
		}else{	
			return 'false|The employee has an existing leave on this day';
			
		}
	}
}