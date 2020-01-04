<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thirteenmonthreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Thirteenmonthreport()
	{
		$queryclient = $this->db->query('SELECT * FROM dm_client');
		$queryemployee = $this->db->query("SELECT e.employeeID, md5(e.employeeID)as encryptID, concat(firstname,' ',middlename,' ',lastname) as fullname
										  ,CASE
										  WHEN e.employeetypeID = 1 THEN 'Security Guard'
										  WHEN e.employeetypeID = 2 THEN 'Staff'
								          ELSE employeeID
									      END AS employeetype, c.description, d.postname, date_format(e.hireddate,'%M% %d%, %Y') as hireddate
										FROM dm_employee as e 
										LEFT JOIN dm_client as c ON e.clientID = c.clientID
										LEFT JOIN dm_detachment as d ON e.detachmentID = d.detachmentID");
		$dateclient = $queryclient->result();
		$dateemployee = $queryemployee->result();
	     return array('client' => $dateclient, 'employee' => $dateemployee);
		 //return $query->result();
	}
	function get_clientdata($client)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$client.'');
		 return $query->result();
	}
	function get_recorddata($id)
	{
		$query = $this->db->query("SELECT e.employeeID, md5(e.employeeID)as encryptID, concat(firstname,' ',middlename,' ',lastname) as fullname
										  ,CASE
										  WHEN e.employeetypeID = 1 THEN 'Security Guard'
										  WHEN e.employeetypeID = 2 THEN 'Staff'
								          ELSE employeeID
									      END AS employeetype, c.description, d.postname, date_format(e.hireddate,'%M% %d%, %Y') as hireddate
										FROM dm_employee as e 
										LEFT JOIN dm_client as c ON e.clientID = c.clientID
										LEFT JOIN dm_detachment as d ON e.detachmentID = d.detachmentID WHERE e.employeeID ='$id'");
		$querycompany = $this->db->query("SELECT *,SUBSTRING(address,1,43) as firstletter,
											SUBSTRING(address,44,86) as firstletter1
											 FROM dm_company");
		$queryemployeename = $this->db->query("SELECT employeeID, concat(e.firstname,' ',e.middlename, ' ',e.lastname) AS employeename,
										d.designationdescription,hireddate FROM dm_employee as e 
										LEFT JOIN dm_designation as d ON e.designationID = d.designationID
										WHERE e.employeeID = $id");
		$datarecord = $query->result();
		$datacompany = $querycompany->result();
		$dataemployee = $queryemployeename->result();
				 return array('datarecord' => $querycompany, 'company' => $datacompany,'employee' => $dataemployee);
	}
}	
