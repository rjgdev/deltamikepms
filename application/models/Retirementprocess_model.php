
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retirementprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Retirementprocess($rtmID)
	{
		$retirementID = $rtmID;

		$queryheader = $this->db->query("SELECT retirementID,	employeeID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												retirementstatus,date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM   dm_retirement   WHERE retirementstatus !=2");
		
	
		if($queryheader->num_rows()===0){
			$data = array('retirementidstatus'   => 0,
						  'employeeID' 			 => 0
					     );

			$this->db->insert('dm_retirement', $data);

			$retirementID = $this->db->insert_id();
		    
		    $queryheader = $this->db->query("SELECT retirementID,	employeeID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												retirementstatus,date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM   dm_retirement   WHERE retirementstatus !=2");
		}else{
			//$queryheader2 = $this->db->query("SELECT * FROM dm_retirement WHERE retirementstatus !=2");
			$retirementID = $queryheader->row()->retirementID;
			//$employee   =  $queryheader2->row()->employeeID;
			/*if($employee ==null){
			$employeeID = "0";
			}else{
			$employeeID = $employee;
			}*/
		}

   		if($queryheader->row()->level==0){
			$level = " AND approvalLevel= 0 ";
		}else{
			$level = "AND approvalLevel=".$queryheader->row()->level."";
		}
   	
  	$queryidretirement = $this->db->query("SELECT * FROM dm_retirement ORDER BY retirementID DESC LIMIT 1");
   	if($queryidretirement->row()->employeeID ==0){
   				$employeerecord =" WHERE e.employeeID = 0" ;
   			}else{
   				$employeeID = $queryheader->row()->employeeID;
   				$employeerecord = "WHERE e.employeeID =".$employeeID."";
   			}

   //	$queryretirementemployee = $this->db->query("SELECT employeeID, GROUP_CONCAT(lastname,', ',firstname,' ',middlename) AS fullname FROM dm_employee WHERE employeeID IN(".$employeerecord.")"); 
   	//$employee = $queryretirementemployee->row()->employeeID;
   			//$employeeID   =  $queryretirementemployee->row()->employeeID;
   			

   	$querydata = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
									, clientname, detachment, retfund, basicsalary, netpay
									, lastcutoff, hireddate, lastcutoff, yearofwork  
									FROM
									(
										SELECT 
										e.employeeID,
										concat(lastname,', ',firstname,' ',middlename) as employeename
										,d.description AS department,ds.designationdescription as designation,
										CASE
										WHEN e.employeetypeID = 1 THEN 'Security Guard'
										WHEN e.employeetypeID = 2 THEN 'Staff'
										ELSE employeetypeID
										END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
										SUM(pd.retfund) AS retfund,e.basicsalary,SUM(netpay) AS netpay,
										cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
										concat(date_format(max(pd.datefrom),'%M% %d'),' - ',  date_format(max(pd.dateto),'%d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
										FROM dm_payrolldetails AS pd
										LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
										LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
										LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
										LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
										LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
										LEFT JOIN dm_client AS c ON e.clientID = c.clientID
										".$employeerecord."
										GROUP BY year(pd.datefrom),e.employeeID
										ORDER BY employeeID,yearofwork DESC
									)a 
									WHERE yearofwork >= 5
									GROUP BY employeeID
									ORDER BY employeeID,yearofwork DESC ");
   

   	$querystatus = $this->db->query("SELECT group_concat(employeeID) AS employeeID FROM dm_retirement WHERE retirementstatus = 2");
   		if($querystatus->row()->employeeID ==null){
   				$employeerecord ="" ;
   			}else{
   				$employeeID = $querystatus->row()->employeeID;
   				$employeerecord = "WHERE e.employeeID NOT IN(".$employeeID.")";
   			}

   		$queryEmployee = $this->db->query("SELECT 
											employeeID,firstname,lastname,
											employeename,
											yearofwork,age  
											FROM
											(
												SELECT 
												e.employeeID,
											    e.firstname,
											    e.lastname,
												concat('00000','',e.employeeID, ' - ',e.lastname,', ',e.firstname, ' ', e.middlename) as employeename,
												 DATE_FORMAT(FROM_DAYS(DATEDIFF(max(pd.datefrom),e.hireddate)), '%Y')+0 AS yearofwork,
												 DATE_FORMAT(FROM_DAYS(DATEDIFF(max(pd.datefrom),e.birthdate)), '%Y')+0 AS age,
												date_format(e.hireddate,'%M% %d%, %Y') hireddate
												FROM dm_employee  as e
												LEFT JOIN dm_payrolldetails as pd ON e.employeeID = pd.employeeID
												".$employeerecord."
												GROUP BY e.employeeID
											
											)a 
											WHERE yearofwork >= 5 and age >= 60 
											GROUP BY employeeID
											ORDER BY employeeID ASC");
   		
   		$queryApprover = $this->db->query("SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID 
   										   WHERE dm_approvaldet.approvalID=7 $level ");
   		return array('retirement' => $queryheader->result(),'employee' => $queryEmployee->result(),'approver' => $queryApprover->result(), 'recorddata' => $querydata->result()/*, 'employeedisabled'=> $queryretirementemployee->result()*/);
   		/*print_r($this->db->last_query());  
     	  exit;*/
			
	}
	function get_detachment($detachment)
	{
		$query = $this->db->query(' SELECT * FROM dm_post WHERE clientID ='.$detachment.'');
		 return $query->result();
	}
	function get_all_Retirementemployee($id,$employee)
	{
     $queryUpdatethrdetails = $this->db->query('SELECT * FROM dm_retirement	 WHERE retirementID = ".$id."'); 
    

     if($queryUpdatethrdetails->num_rows()===0){

     	$itemrecord = implode(",",$employee);
		$item = array('employeeID' => $itemrecord);

     	$this->db->where("retirementID", $id);  
        $this->db->update("dm_retirement", $item); 
		}else{
		
		$itemrecord = implode(",",$employee);
		$item = array('employeeID' => $itemrecord);

     	$this->db->where("retirementID", $id);  
        $this->db->update("dm_retirement", $item);
    	

     }	
	}
	function submit_Retirementprocess($retirementID, $datesubmitted)
	{
		$querySubmit = $this->db->query('SELECT * FROM dm_retirement WHERE retirementID='.$retirementID.' LIMIT 1');	 
		
		if($querySubmit->row()->employeeID ==0){
			if($querySubmit->row()->retirementstatus ==3){	
			$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  '	retirementstatus' => 1);

		$this->db->where("retirementID", $retirementID);  
        $this->db->update("dm_retirement", $data); 

		$querydata = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
									, clientname, detachment, retfund, basicsalary, netpay
									, lastcutoff, hireddate, lastcutoff, yearofwork  
									FROM
									(
										SELECT 
										e.employeeID,
										concat(lastname,', ',firstname,' ',middlename) as employeename
										,d.description AS department,ds.designationdescription as designation,
										CASE
										WHEN e.employeetypeID = 1 THEN 'Security Guard'
										WHEN e.employeetypeID = 2 THEN 'Staff'
										ELSE employeetypeID
										END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
										SUM(pd.retfund) AS retfund,e.basicsalary,SUM(netpay) AS netpay,
										cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
										concat(date_format(max(pd.datefrom),'%M% %d'),' - ',  date_format(max(pd.dateto),'%d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
										FROM dm_payrolldetails AS pd
										LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
										LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
										LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
										LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
										LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
										LEFT JOIN dm_client AS c ON e.clientID = c.clientID
										WHERE e.employeeID IN(".$querySubmit->row()->employeeID.") 
										GROUP BY year(pd.datefrom),e.employeeID
										ORDER BY employeeID,yearofwork DESC
									)a 
									WHERE yearofwork >= 5
									GROUP BY employeeID
									ORDER BY employeeID,yearofwork DESC ");         

        $queryheader = $this->db->query("SELECT retirementID,	employeeID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												retirementstatus,
												CASE
													WHEN retirementstatus = 0 THEN 'DRAFT'
													WHEN retirementstatus = 1 THEN 'PENDING'
													WHEN retirementstatus = 2 THEN 'APPROVED'
													ELSE retirementstatus
												END AS retirementstatus1, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
											FROM   dm_retirement WHERE retirementID=".$retirementID);


        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=7 AND approvalLevel='.$queryheader->row()->level);

        return array('retirement' => $queryheader->result(), 'approver' => $queryApprover->result(), 'recorddata' => $querydata->result());  	

			}



			return array('retirement' => 0, 'error' => 'Cannot process retirement!');
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  '	retirementstatus' => 1);

		$this->db->where("retirementID", $retirementID);  
        $this->db->update("dm_retirement", $data); 

		$querydata = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
									, clientname, detachment, retfund, basicsalary, netpay
									, lastcutoff, hireddate, lastcutoff, yearofwork  
									FROM
									(
										SELECT 
										e.employeeID,
										concat(lastname,', ',firstname,' ',middlename) as employeename
										,d.description AS department,ds.designationdescription as designation,
										CASE
										WHEN e.employeetypeID = 1 THEN 'Security Guard'
										WHEN e.employeetypeID = 2 THEN 'Staff'
										ELSE employeetypeID
										END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
										SUM(pd.retfund) AS retfund,e.basicsalary,SUM(netpay) AS netpay,
										cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
										concat(date_format(max(pd.datefrom),'%M% %d'),' - ',  date_format(max(pd.dateto),'%d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
										FROM dm_payrolldetails AS pd
										LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
										LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
										LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
										LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
										LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
										LEFT JOIN dm_client AS c ON e.clientID = c.clientID
										WHERE e.employeeID IN(".$querySubmit->row()->employeeID.") 
										GROUP BY year(pd.datefrom),e.employeeID
										ORDER BY employeeID,yearofwork DESC
									)a 
									WHERE yearofwork >= 5
									GROUP BY employeeID
									ORDER BY employeeID,yearofwork DESC ");         

        $queryheader = $this->db->query("SELECT retirementID,	employeeID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												retirementstatus,
												CASE
													WHEN retirementstatus = 0 THEN 'DRAFT'
													WHEN retirementstatus = 1 THEN 'PENDING'
													WHEN retirementstatus = 2 THEN 'APPROVED'
													ELSE retirementstatus
												END AS retirementstatus1, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
												FROM   dm_retirement WHERE retirementID=".$retirementID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=7 AND approvalLevel='.$queryheader->row()->level);

        return array('retirement' => $queryheader->result(), 'approver' => $queryApprover->result(), 'recorddata' => $querydata->result());  
	}
	function cancel_Retirement($retirementID)
		{
		 	$data = array('datesubmitted' => NULL,
		 				  'usersubmitted' => NULL,
		 				  'level' => 0,
		 				  'retirementstatus' => 0);

			$this->db->where("retirementID", $retirementID);  
	        $this->db->update("dm_retirement", $data);   

	        	   	
		} 
	function deny_Retirementprocess($retirementID,$reason)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'level' => 0,
	 				  'userapproved' => NULL,
	 				  'retirementidstatus' => 0,
	 				  'userdenied'		=> $this->session->userdata('employeeID'),
	 				  'datedenied' 		=> date("Y-m-d H:i:s"),
	 				  'retirementstatus' => 3,
	 				  'reason' => $reason);

		$this->db->where("retirementID", $retirementID);  
        $this->db->update("dm_retirement", $data);   	   	
	}
	function approve_Retirementprocess($retirementID, $dateapproved, $lastapprover)
	{
		if($lastapprover==1){
			$queryUpdateTK = $this->db->query('UPDATE dm_retirement 
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,retirementstatus=2 WHERE retirementID='.$retirementID);

	    }else{
			$queryUpdateTK = $this->db->query('UPDATE dm_retirement 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE retirementID='.$retirementID);
		}
		$queryheader = $this->db->query("SELECT retirementID,	employeeID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												retirementstatus,
												CASE
													WHEN retirementstatus = 0 THEN 'DRAFT'
													WHEN retirementstatus = 1 THEN 'PENDING'
													WHEN retirementstatus = 2 THEN 'APPROVED'
													ELSE retirementstatus
												END AS retirementstatus1, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
												FROM   dm_retirement WHERE retirementID=".$retirementID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=7 AND approvalLevel='.$queryheader->row()->level);
		
        return array('retirement' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function get_denied($retirementID)
	{
		$query = $this->db->query('SELECT CONCAT(dm_employee.firstname," ",dm_employee.lastname) AS "fullname", DATE_FORMAT(datedenied, "%W, %M %e, %Y %r") AS datedenied, reason 
								   FROM dm_retirement AS r
								   INNER JOIN dm_employee ON dm_employee.employeeID = r.userdenied 
								   WHERE r.retirementID = '.$retirementID); 
/*print_r($this->db->last_query());  
     	  exit;*/
		return $query->result();
	}
				

}	