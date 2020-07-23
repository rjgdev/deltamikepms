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
									concat('PR-',LPAD(payrollID, 6, 0), ' (',datepayroll,')') as dateformat,payrollID,datefrom
									FROM 
									(
										SELECT 
										payrollID,Payrolltype,concat(date_format(datefrom,'%M% %d%,%Y'),' - ',date_format(dateto,'%M% %d%,%Y')) as datepayroll,datefrom,dateto,
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
	function search($searchpayperiod,$searchemployeetype,$searchclient)
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

    	$query = $this->db->query("
    							SELECT 
    							* 
    							FROM 
									( SELECT pd.employeeID, concat(LPAD(pd.employeeID, 5, 0), ' - ',lastname,', ',e.firstname,' ',e.middlename) as fullname,
									 pd.basicpay,((pd.ordot + rstot + spcot + spcrstot + rglot + rglrstot + dblot + dblrstot) + (pd.otadjustment)) AS totalovertime,otadjustment,
									 ((pd.ordnight + rstnight + spcnight + spcrstnight + rglnight + rglrstnight + dblnight + dblrstnight) + (pd.nightdiffadjustment))AS totalnightdiff,nightdiffadjustment,
									 pd.allowance,pd.incentive,((pd.ordlate + rstlate + spclate + spcrstlate + rgllate + rglrstlate + dbllate + dblrstlate + late) + (pd.lateadjustment)) as totallate,lateadjustment,leaveadjustment,(spc + spcrst + 	rgl + rglrst + 	dbl + dblrst) as holiday,
									 ((pd.absent) + (leaveadjustment)) AS totalleave,
									 pd.otheradjustment,  grosspay,pd.wtax,(pd.sss_ee + pd.phic_ee + pd.hdmf_ee) AS government,
									 pd.sss_ee,pd.phic_ee,pd.hdmf_ee, (pd.sssloan + pd.hdmfloan + pd.salaryloan + pd.trainingloan + pd.otherloan) as otherdeductionsloan,
									 pd.netpay FROM dm_payrolldetails as pd 
									 LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID 
									 LEFT JOIN dm_client AS c ON e.clientID = c.clientID 
									 LEFT JOIN dm_post AS p ON e.postID = p.postID 
									    WHERE pd.payrollID = '$searchpayperiod' $cond   $client 
									    GROUP BY datefrom,e.employeeID
									)a
								");
    	return $query->result();
    	/*print_r($this->db->last_query()); 
    	 exit;*/
    }
    function searchpayperiod($searchpayperiod){
    	$query = $this->db->query("SELECT	
									concat('PR-',LPAD(payrollID, 6, 0), ' (',datepayroll,')') as dateformat,payrollID,datefrom
									FROM 
									(                               
									SELECT 
									pr.payrollID,Payrolltype,concat(date_format(pr.datefrom,'%M% %d%,%Y'),' - ',date_format(pr.dateto,'%M% %d%,%Y')) as datepayroll,pr.datefrom,pr.dateto,
									CASE payperiod
									WHEN  1 THEN '1st Cutoff'
									WHEN 2 THEN	'2nd Cutoff'
									ELSE pr.payrollID 
									END payperiod
									FROM dm_payroll AS pr 
									LEFT JOIN dm_payrolldetails AS prd ON pr.payrollID= prd.payrollID
									LEFT JOIN dm_employee AS e ON prd.employeeID =e.employeeID 
									WHERE payrollstatus = 2 AND e.employeetypeID =$searchpayperiod
									GROUP BY pr.payrollID
									ORDER BY pr.datefrom
									)a 
									GROUP BY payrollID

    	");	
    	return $query->result();
    	//print_r($this->db->last_query()); 

    }
}	