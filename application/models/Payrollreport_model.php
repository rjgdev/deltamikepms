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
										WHERE payrollstatus = 2
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
		if($client ==0){
			$clientID = "";
		}else{
			$clientID = "WHERE clientID = $client";
		}
		$query = $this->db->query(" SELECT * FROM dm_post $clientID");

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
    	$detachment = "AND e.postID =  $searchdetachment";
    }

    	$query = $this->db->query("
    							SELECT
								*
								FROM
								(
									SELECT pd.employeeID, concat(e.lastname,', ',e.firstname,' ',e.middlename) as fullname,
									pd.basicpay,((pd.ordinaryot) + (pd.otadjustment)) AS totalovertime,((pd.nightdiff) + (pd.nightdiffadjustment))AS totalnightdiff,
									pd.allowance,pd.incentive,((pd.late) + (pd.lateadjustment)) as totallate,((pd.absent) + (leaveadjustment)) AS totalleave,
									pd.otheradjustment,	otherdescription, grosspay,pd.wtax,(pd.sss_ee + pd.phic_ee + pd.hdmf_ee) AS government,pd.sss_ee,pd.phic_ee,pd.hdmf_ee, (pd.sssloan + pd.hdmfloan + pd.salaryloan + pd.trainingloan + pd.otherloan) as otherdeductions,
									pd.netpay 
									FROM dm_payrolldetails as pd
									LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
									LEFT JOIN dm_client AS c ON e.clientID = c.clientID
									LEFT JOIN dm_post AS p ON e.postID = p.postID
								    WHERE pd.payrollID = '$searchpayperiod' $cond   $client  $detachment
								    GROUP BY datefrom,e.employeeID
								)a");
    	return $query->result();
    	//print_r($this->db->last_query()); 
		//exit;
    }
}	