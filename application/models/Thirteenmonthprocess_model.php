
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thirteenmonthprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_thirteenmonthprocess($thrID)
	{

		$thrmonthID = $thrID;
		$thdatefrom = '1880-01-01';
		$thdateto = '1880-01-01';
		$queryheader = $this->db->query("SELECT thrmonthID,		datefrom,	dateto,		usersubmitted,	datesubmitted 
											,userapproved,	level,		approvalID,	thrmonthstatus,	monthstatus
											,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
											, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_thrmonth  WHERE thrmonthstatus!=2");
   		if($queryheader->num_rows()===0){
   				
   				$data = array('monthstatus'   => 0,
   							  'datefrom'	  =>'1888-01-01',
   							  'dateto'	      =>'1888-01-01'
   				);
   			$this->db->insert('dm_thrmonth', $data);
			$thrmonthID = $this->db->insert_id();
			$queryheader = $this->db->query("SELECT thrmonthID,		datefrom,	dateto,		usersubmitted,	datesubmitted
											,userapproved,	level,		approvalID,	thrmonthstatus,	monthstatus
											,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
											, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_thrmonth  WHERE thrmonthstatus!=2");
		}else{
   			$thrmonthID = $queryheader->row()->thrmonthID;
   			$thdatefrom = $queryheader->row()->date1;
   			$thdateto = $queryheader->row()->date2;
   			$thdate = $queryheader->row()->formatdate;
   			

   		}
   		if($queryheader->row()->level==0){
			$level = " AND approvalLevel= 0 ";
		}else{
			$level = "AND approvalLevel=".$queryheader->row()->level."";
		}
  		$querydata = $this->db->query("
    							SELECT
								*
								FROM
								(
									SELECT 
									e.employeeID,
									concat(lastname,', ',firstname,' ',middlename) as employeename 
									,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
									concat(date_format(min(pd.datefrom),'%M% %d%,%Y'),' - ',date_format(max(pd.dateto),'%M% %d%,%Y')) as datepayrol, COALESCE(sum(late) + sum(ordlatehours) + sum(rstlatehours) + sum(spclatehours) + sum(spcrstlatehours) + sum(rgllatehours) + sum(rglrstlatehours) + sum(dbllatehours) + sum(dblrstlatehours),0) as late, sum(absent) as absent,
									 SUM(thrmonth) AS thrmonth
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE (date_format(pd.datefrom,'%Y%-%m') >= '".$thdatefrom."') 
										AND 
									(date_format(pd.dateto,'%Y%-%m') <='".$thdateto."')
								    GROUP BY e.employeeID
								)a");
  	/*	if($queryheader->row()->level ==0){
        	$approvalLevelresult = "0";
        }else{
        	$approvalLevel =$queryheader->row()->level;
        	$approvalLevelresult = "AND approvalLevel = $approvalLevel";
        }
  	*/
   		$queryEmployee = $this->db->query('SELECT * FROM dm_employee WHERE employeestatus="Active" order by firstname');
   		$queryApprover = $this->db->query("SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID 
   										   WHERE dm_approvaldet.approvalID=6 $level ");
   		return array('thrmonth' => $queryheader->result(), 'employee' => $queryEmployee->result(), 'approver' => $queryApprover->result(), 'recorddata' => $querydata->result());								   			

	}
	function get_clientdata($client)
	{
		$query = $this->db->query(' SELECT * FROM dm_post WHERE clientID ='.$client.'');
		 return $query->result();
	}

	function search($thrmonthID,$sddlmonth,$sddlyear,$eddlmonth,$eddlyear)
    {		

    	$sday = "1";
    	$eday = "28";
    	$datefrom = $sddlyear."-".$sddlmonth."-".$sday;
    	$dateto = $eddlyear."-".$eddlmonth."-".$sday;
    	$data  = array(
    		'datefrom' 		=>	$datefrom,
 			'dateto'   		=>	$dateto,
 			'monthstatus'	=>	1);
    		$queryUpdatethrdetails = $this->db->query('SELECT * FROM dm_thrmonth	 WHERE 
												thrmonthID = ".$thrmonthID."'); 

		if($queryUpdatethrdetails->num_rows()===0){

			$this->db->where("thrmonthID", $thrmonthID);  
            $this->db->update("dm_thrmonth", $data);  
   	   		
		}else{

        	$this->db->where("thrmonthID", $thrmonthID);  
            $this->db->update("dm_thrmonth", $data);  
           // return 'true|'.$description.' successfully updated!';
		}
	}

	function submit_Thirteenmonth($thrmonthID, $datesubmitted)
	{
		$querySubmit = $this->db->query("SELECT thrmonthID, 	datefrom,	dateto,		usersubmitted,		datesubmitted,
											   userapproved,	dateapproved,level,		approvalID, 		thrmonthstatus,		monthstatus
										       ,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
										FROM   dm_thrmonth WHERE  thrmonthID=".$thrmonthID." LIMIT 1");	 
		
		if($querySubmit->row()->monthstatus ==0){
			if($querySubmit->row()->thrmonthstatus ==3 || 2){	
				$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  '	thrmonthstatus' => 1);

		$this->db->where("thrmonthID", $thrmonthID);  
        $this->db->update("dm_thrmonth", $data); 

        $querydata = $this->db->query("
    							SELECT
								*
								FROM
								(
									SELECT 
									e.employeeID,
									concat(lastname,', ',firstname,' ',middlename) as employeename
									,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
									concat(date_format(min(pd.datefrom),'%M% %d%,%Y'),' - ',date_format(max(pd.dateto),'%M% %d%,%Y')) as datepayrol, COALESCE(sum(late) + sum(ordlatehours) + sum(rstlatehours) + sum(spclatehours) + sum(spcrstlatehours) + sum(rgllatehours) + sum(rglrstlatehours) + sum(dbllatehours) + sum(dblrstlatehours),0) as late, sum(absent) as absent,
									 SUM(thrmonth) AS thrmonth
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE (date_format(pd.datefrom,'%Y%-%m') >= '".$querySubmit->row()->date1."') 
										AND 
									(date_format(pd.dateto,'%Y%-%m') <='".$querySubmit->row()->date2."')
								    GROUP BY e.employeeID
								)a");

        $queryheader = $this->db->query("SELECT thrmonthID,		datefrom,	dateto,		usersubmitted,	datesubmitted
										,userapproved,	level,		approvalID,	
											CASE
											WHEN thrmonthstatus = 0 THEN 'DRAFT'
											WHEN thrmonthstatus = 1 THEN 'PENDING'
											WHEN thrmonthstatus = 2 THEN 'APPROVED'
											ELSE thrmonthstatus
											END AS thrmonthstatus
										,	monthstatus
										,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
										, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_thrmonth WHERE thrmonthID=".$thrmonthID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=6 AND approvalLevel='.$queryheader->row()->level);

        return array('thrmonth' => $queryheader->result(), 'approver' => $queryApprover->result(),'recorddata' => $querydata->result());  

			}	
			return array('thrmonth' => 0, 'error' => 'Cannot process 13th month!');
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  '	thrmonthstatus' => 1);

		$this->db->where("thrmonthID", $thrmonthID);  
        $this->db->update("dm_thrmonth", $data); 

        $querydata = $this->db->query("
    							SELECT
								*
								FROM
								(
									SELECT 
									e.employeeID,
									concat(lastname,', ',firstname,' ',middlename) as employeename
									,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
									concat(date_format(min(pd.datefrom),'%M% %d%,%Y'),' - ',date_format(max(pd.dateto),'%M% %d%,%Y')) as datepayrol, COALESCE(sum(late) + sum(ordlatehours) + sum(rstlatehours) + sum(spclatehours) + sum(spcrstlatehours) + sum(rgllatehours) + sum(rglrstlatehours) + sum(dbllatehours) + sum(dblrstlatehours),0) as late, sum(absent) as absent,
									 SUM(thrmonth) AS thrmonth
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE (date_format(pd.datefrom,'%Y%-%m') >= '".$querySubmit->row()->date1."') 
										AND 
									(date_format(pd.dateto,'%Y%-%m') <='".$querySubmit->row()->date2."')
								    GROUP BY e.employeeID
								)a");

        $queryheader = $this->db->query("SELECT thrmonthID,		datefrom,	dateto,		usersubmitted,	datesubmitted
										,userapproved,	level,		approvalID,	
											CASE
											WHEN thrmonthstatus = 0 THEN 'DRAFT'
											WHEN thrmonthstatus = 1 THEN 'PENDING'
											WHEN thrmonthstatus = 2 THEN 'APPROVED'
											ELSE thrmonthstatus
											END AS thrmonthstatus
										,	monthstatus
										,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
										, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_thrmonth WHERE thrmonthID=".$thrmonthID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=6 AND approvalLevel='.$queryheader->row()->level);

        return array('thrmonth' => $queryheader->result(), 'approver' => $queryApprover->result(),'recorddata' => $querydata->result());  
	}
	function cancel_Thirteenmonth($thrmonthID)
		{
			$thdatefrom = '1880-01-01';
			$thdateto = '1880-01-01';
		 	$data = array('datesubmitted' => NULL,
		 				  'usersubmitted' => NULL,
		 				  'level' 		  => 0,
		 				  'monthstatus'   => 0,
		 				  'approvalID'   => 0,
		 				  'thrmonthstatus' => 0);

			$this->db->where("thrmonthID", $thrmonthID);  
	        $this->db->update("dm_thrmonth", $data);  
	         	   	
		} 
	function approve_Thirteenmonth($thrmonthID, $dateapproved, $lastapprover)
	{	
		if($lastapprover==1){
		
			$queryUpdateTK = $this->db->query('UPDATE dm_thrmonth 
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,thrmonthstatus=2 WHERE thrmonthID='.$thrmonthID);

	    }else{
			$queryUpdateTK = $this->db->query('UPDATE dm_thrmonth 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE thrmonthID='.$thrmonthID);
		}
		$queryheader = $this->db->query("SELECT thrmonthID,		datefrom,	dateto,		usersubmitted,	datesubmitted
										,userapproved,	level,		approvalID,	
											CASE
											WHEN thrmonthstatus = 0 THEN 'DRAFT'
											WHEN thrmonthstatus = 1 THEN 'PENDING'
											WHEN thrmonthstatus = 2 THEN 'APPROVED'
											ELSE thrmonthstatus
											END AS thrmonthstatus
										,	monthstatus
										,date_format(datefrom,'%Y%-%m') as date1, date_format(dateto,'%Y%-%m') as date2
										, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_thrmonth WHERE thrmonthID=".$thrmonthID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=6 AND approvalLevel='.$queryheader->row()->level);
		
        return array('thrmonth' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function deny_Thirteenmonthprocess($thrmonthID)
	{
	 	$data = array('datesubmitted' 	=> NULL,
	 		 		  'userapproved' 	=> NULL,
	 				  'level' 			=> 0,
	 				   'monthstatus'   	=> 0,
	 				  'thrmonthstatus' 	=> 3);

		$this->db->where("thrmonthID", $thrmonthID);  
        $this->db->update("dm_thrmonth", $data);   	   	
	}				

}	