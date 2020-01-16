
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retirementprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Retirementprocess()
	{
		$queryclient = $this->db->query('SELECT * FROM dm_client');
		$queryemployee = $this->db->query("SELECT employeeID, concat(firstname,' ',middlename,' ',lastname) as employeename FROM dm_employee WHERE employeestatus like 'ACTIVE'");
		$dataclient = $queryclient->result();
		$dataemployee = $queryemployee->result();
	     return array('client' => $dataclient, 'employee' => $dataemployee);
		 	//$datepayroll = $payrolldate->result();
		 	//$dataclient = $queryclient->result();
	     //return array('payrolldate' => $datepayroll, 'client' => $dataclient);

	}
	function get_detachment($detachment)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$detachment.'');
		 return $query->result();
	}
	function get_all_Retirementemployee($searchemployee, $searchemployeetype, $searchclient, $searchdetachment)
	{
	 if($searchemployee == 0){
    	$employee[] = " ";

   }else{
    	$searchid = implode(",", $searchemployee);
		$employee[] = "WHERE e.employeeID IN (".$searchid.")";
    }
  

	if($searchemployeetype == 0) {
		$employeetype = " ";
	}else{
    	$employeetype =  "AND e.employeetypeID = $searchemployeetype";
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
   
	$query = $this->db->query("SELECT  employeeID, employeename, employeetype, department, designation 
					, clientname, detachment, retfund, basicsalary, FORMAT(netpay,4) as netpay
					, lastcutoff, hireddate, lastcutoff, yearofwork  
					FROM
					(
					SELECT 
					e.employeeID,
					concat(firstname,' ',middlename,' ',lastname) as employeename
					,d.description AS department,ds.designationdescription as designation,
					CASE
					WHEN e.employeetypeID = 1 THEN 'Security Guard'
					WHEN e.employeetypeID = 2 THEN 'Staff'
					ELSE employeetypeID
					END AS employeetype ,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
					FORMAT(retfund,4)as retfund,FORMAT(e.basicsalary,4) as basicsalary,SUM(netpay) AS netpay,
					cast(DATEDIFF(max(pd.datefrom),e.hireddate) / 365.25 AS UNSIGNED) AS yearofwork,
					concat(date_format(pd.datefrom,'%M% %d%, %Y'),' - ',  date_format(pd.dateto,'%M% %d%, %Y')) as lastcutoff, date_format(e.hireddate,'%M% %d%, %Y') hireddate
					FROM dm_payrolldetails AS pd
					LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
					LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
					LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
					LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
					LEFT JOIN dm_detachment AS dtc ON e.detachmentID = dtc.detachmentID
					LEFT JOIN dm_client AS c ON e.clientID = c.clientID
					".$employee[0]." $employeetype   $client  $detachment 
					GROUP BY year(pd.datefrom),e.employeeID
					ORDER BY employeeID,yearofwork DESC
					)a 
					WHERE yearofwork >= 5
					GROUP BY employeeID
					ORDER BY employeeID,yearofwork DESC");
			if($query->num_rows() == 0){
			
			}else{
				//$record = array();
				 for($count = 0; $count<count($searchemployee); $count++)
	 				{
				$record[$count] = array(
					'employeeID' => $searchemployee[$count]
				 );
				
			}
			if($searchemployee == 0){
			$deleteemployee[] = " ";

			}else{
			$searchiddelete = implode(",", $searchemployee);
			$deleteemployee[] = "WHERE employeeID IN (".$searchiddelete.")";
			}
			$querydelete = $this->db->query("DELETE FROM dm_retirement $deleteemployee[0]");
			$this->db->insert_batch('dm_retirement', $record);
			}  
	    							
					 
			//print_r($this->db->last_query());  
			//exit;
			return $query->result();
	}
}	