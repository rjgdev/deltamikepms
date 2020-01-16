<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payrollreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_payroll()
	{
		$payrolldate = $this->db->query("SELECT	
									concat(datepayroll,' (',payperiod,') ') as dateformat,payrollID,datefrom
									FROM 
									(
										SELECT 
										payrollID,concat(date_format(datefrom,'%M% %d%,%Y'),' - ',date_format(dateto,'%M% %d%,%Y')) as datepayroll,datefrom,dateto,
										CASE payperiod
										WHEN  1 THEN '1st Cutoff'
										WHEN 2 THEN	'2nd Cutoff'
										ELSE payrollID 
										END payperiod
										FROM dm_payroll
										GROUP BY datefrom,dateto
										ORDER BY datefrom
									)a
									GROUP BY payrollID");
			$queryclient = $this->db->query('SELECT * FROM dm_client');
		 	$datepayroll = $payrolldate->result();
		 	$dataclient = $queryclient->result();
	     return array('payrolldate' => $datepayroll, 'client' => $dataclient);

	}
	function get_clientdata($client)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$client.'');
		 return $query->result();
	}
	function search($searchpayperiod,$searchemployeetype,$searchclient,$searchdetachment)
    {	
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
									,d.description AS department,ds.designationdescription as designation,
									CASE
									WHEN e.employeetypeID = 1 THEN 'Security Guard'
									WHEN e.employeetypeID = 2 THEN 'Staff'
									ELSE employeetypeID
									END AS employeetype,c.clientname,dtc.postname AS detachment,
									pd.sss,pd.phic,pd.hdmf,pd.netpay,incentives,nightdiff,'0.0000' as Uniform,ordinaryot,regholiday,speholiday,regularot,
									concat(date_format(pd.datefrom,'%M% %d%,%Y'),' - ',date_format(pd.dateto,'%M% %d%,%Y')) as datepayroll
									,pd.datefrom
									FROM dm_payrolldetails AS pd
									LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
									LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
									LEFT JOIN dm_detachment AS dtc ON e.detachmentID = dtc.detachmentID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
								    WHERE pd.datefrom = '$searchpayperiod' $cond   $client  $detachment
								    GROUP BY datefrom,e.employeeID
								)a");
    	return $query->result();
    	//print_r($this->db->last_query()); 
    	 //exit;
    }
}	