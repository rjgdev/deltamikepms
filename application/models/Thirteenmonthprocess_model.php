
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thirteenmonthprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_thirteenmonthprocess()
	{
		$queryclient = $this->db->query('SELECT * FROM dm_client');
		 return $queryclient->result();
		 	//$datepayroll = $payrolldate->result();
		 	//$dataclient = $queryclient->result();
	     //return array('payrolldate' => $datepayroll, 'client' => $dataclient);

	}
	function get_clientdata($client)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$client.'');
		 return $query->result();
	}

	function search($sddlmonth,$sddlyear,$eddlmonth,$eddlyear,$searchemployeetype,$searchclient,$searchdetachment)
    {		
    	$sday = "1";
    	$eday = "28";
    	$datefrom = $sddlyear."-".$sddlmonth."-".$sday;
    	$dateto = $eddlyear."-".$eddlmonth."-".$eday;
    	
 		$query1 = $this->db->query('SELECT * FROM dm_thrmonth WHERE datefrom = "'.$sddlmonth."-".$sddlyear.'" AND dateto = "'.$eddlmonth."-".$eddlyear.'"');
 		if($query1->num_rows() == 0){
 			$query1 = $this->db->query('DELETE FROM dm_thrmonth WHERE datefrom = "'.$sddlmonth."-".$sddlyear.'" AND dateto = "'.$eddlmonth."-".$eddlyear.'"');
    		$data  = array(
    		'datefrom' =>	$datefrom,
 			'dateto'   =>	$dateto);
 			$this->db->insert('dm_thrmonth', $data);
 			$last_id = $this->db->insert_id();
 		}else{
			$query1 = $this->db->query('DELETE FROM dm_thrmonth WHERE datefrom  = "'.$sddlmonth."-".$sddlyear.'" AND dateto = "'.$eddlmonth."-".$eddlyear.'"');	
    		$data  = array(
    		'datefrom' =>	$datefrom,
 			'dateto'   =>	$dateto);
 			$this->db->insert('dm_thrmonth', $data);
 			$last_id = $this->db->insert_id();

 		}	

    if($searchemployeetype == 0) {
		$cond = " ";
	}else{
    	$cond =  "AND e.employeetypeID = $searchemployeetype";
    }
     if($searchclient == 0) {
		$client = " ";
	}else{
    	$client = "AND e.cLientID = $searchclient";
    }
    if($searchdetachment == 0) {
		$detachment = " ";
	}else{
    	$detachment = "AND e.detachmentID =  $searchdetachment";
    }

    	$query = $this->db->query("
    							SELECT
								*
								FROM
								(
									SELECT 
									e.employeeID,
									concat(firstname,' ',middlename,' ',lastname) as employeename
									,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
									concat(date_format(pd.datefrom,'%M% %d%,%Y'),' - ',date_format(pd.dateto,'%M% %d%,%Y')) as datepayrol,FORMAT(late,4) as late,FORMAT(absent,4) AS absent,
									 FORMAT(SUM(thrmonth),4) AS thrmonth
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_detachment AS dtc ON e.detachmentID = dtc.detachmentID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE (month(pd.datefrom) >= '$sddlmonth' AND year(pd.datefrom)>='$sddlyear') 
										AND 
									(month(pd.dateto) <= '$eddlmonth' AND year(pd.dateto)<='$eddlyear')  $cond   $client  $detachment
								    GROUP BY e.employeeID
								)a");
    	//$query2 = $this->db->query('DELETE FROM dm_thrmonthdetails WHERE datefrom = "'.$datefrom.'" AND dateto = "'.$dateto.'"');

/*    	$query2 = $this->db->query('SELECT * FROM dm_thrmonthdetails WHERE datefrom = "'.$datefrom.'" AND dateto = "'.$dateto.'"');
    			if($query2->num_rows() == 0){
    				data = array(
					'postname' => $postname,
					'housenumber' => $this->input->post('housenumber'),
    				$querydetails = $this->db->query("
    							
								");	

    			}else{



							$querydetails = $this->db->query("
    							INSERT INTO dm_thrmonthdetails (thrmonthID,datefrom,dateto,employeeID,monthnumber,yeardate,employeename,department,designation,employeetype,clientname,detachment,datepayrol,thrmonth)
									SELECT '$last_id' as thrmonthID,'$datefrom' as datefrom,'$dateto' as dateto,
									e.employeeID,month(pd.datefrom) as monthnumber,year(pd.datefrom) as yeardate,
									concat(firstname,' ',middlename,' ',lastname) as employeename
									,d.description AS department,ds.designationdescription as designation,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,c.clientname,dtc.postname AS detachment,
									concat(date_format(pd.datefrom,'%M% %d%,%Y'),' - ',date_format(pd.dateto,'%M% %d%,%Y')) as datepayrol, thrmonth
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_detachment AS dtc ON e.detachmentID = dtc.detachmentID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE (month(pd.datefrom) >= '$sddlmonth' AND year(pd.datefrom)>='$sddlyear') 
										AND 
									(month(pd.dateto) <= '$eddlmonth' AND year(pd.dateto)<='$eddlyear')  $cond   $client  $detachment
								    GROUP BY e.employeeID,pd.datefrom,yeardate
								");

    			}*/

 							

 	

/*
 	$query1 = $this->db->query('DELETE FROM dm_thrmonthdetails WHERE datefrom = "'.$sddlmonth."-".$sddlyear.'" AND dateto = "'.$eddlmonth."-".$eddlyear.'"');
 			$record  = array();
 			for($count = 0; $count<count($querydetails->row()->monthnumber); $count++)
 				{
		$record[$count] = array('thrmonthID'		=> $last_id,
								'datefrom'			=>$sddlmonth."-".$sddlyear,
								'dateto'			=>$eddlmonth."-".$eddlyear,
								'employeeID'		=>$querydetails->row()->employeeID[$count],
								'monthnumber'		=>$querydetails->row()->monthnumber[$count],
								'yeardate'			=>$querydetails->row()->yeardate[$count],
								'employeename'		=>$querydetails->row()->employeename[$count],
								'department'		=>$querydetails->row()->department[$count],
								'designation'		=>$querydetails->row()->designation[$count],
								'employeetype'		=>$querydetails->row()->employeetype[$count],
								'clientname'		=>$querydetails->row()->clientname[$count],
								'detachment'		=>$querydetails->row()->detachment[$count],
								'datepayrol'		=>$querydetails->row()->datepayrol[$count],
								'thrmonth'			=>$querydetails->row()->thrmonth[$count]
		);
	}
		$this->db->insert_batch(' dm_thrmonthdetails', $record);*/
//print_r($this->db->last_query());  
	//exit;
 			return $query->result();
 		
 		
 			

 }

}	