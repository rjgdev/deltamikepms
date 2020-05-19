<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payrollpaymentsystemreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_payrollpayment()
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
									( 
									SELECT e.employeeID, concat(e.lastname,', ',e.firstname,' ',e.middlename) as employeename, '068' as branchcode,	e.backaccountnumber,pd.netpay FROM dm_employee as e
										LEFT JOIN dm_payrolldetails as pd ON e.employeeID = pd.employeeID
									    WHERE pd.payrollID = '$searchpayperiod' $cond   $client AND e.backaccountnumber !=0
									    GROUP BY e.employeeID
									)a
								");
    	return $query->result();
    	/*print_r($this->db->last_query()); 
    	 exit;*/
    }

   
}	