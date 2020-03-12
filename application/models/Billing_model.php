
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_billing()
	{
		$querydatecutoff = $this->db->query("SELECT  
											payrollID,datefrom, dateto,
											concat(date_format(MIN(datefrom),'%Y%-%m'),' , ',date_format(MAX(dateto),'%Y%-%m')) AS formatdateid,
											concat(date_format(MIN(datefrom),'%M% %d%, %Y'),' - ',date_format(MAX(dateto),'%M% %d%, %Y')) AS formatdate
											FROM dm_payroll WHERE payrollstatus = 2 GROUP BY dateto,datefrom");
		$queryclient =  $this->db->query("SELECT * FROM dm_client WHERE clientstatus ='active'");
		$datadatecutoff = $querydatecutoff->result();
		$dataclient = $queryclient->result();
	return array('client' => $dataclient,  'cutoff' => $datadatecutoff);	 
	}
	function get_detachment($detachment)
	{
		if($detachment ==0){
			$clientID = "";
		}else{
			$clientID = "WHERE clientID = $detachment";
		}
		$query = $this->db->query(" SELECT * FROM dm_post $clientID");

		 return $query->result();
	}

	function get_records($searchdate, $searchclient, $searchdetachment)

	{
				if($searchdate == 0) {
					$sdate = " ";
				}else{
			    	$sdate =  "WHERE pd.payrollID = $searchdate";
			    }
			    if($searchclient == 0) {
					$client = " ";
				}else{
			    	$client =  "AND emp.clientID = $searchclient";
			    }
			     if($searchdetachment == 0) {
					$detachment = " ";
				}else{
					$searchdetachment = implode(",", $searchdetachment);
			    	$detachment =  "AND emp.postID IN (".$searchdetachment.")";
			    }
					$query = $this->db->query("
							SELECT 
							payrollID,		clientID,		postID,							clientname,	 		detachment, rangedate
							,SO, 			SG,								totalsss,	 		totalphic,	 totalhdmf
							,totalretfund,	subtotalwithmargin,	 			taxable
							taxdue,					totalmargin
								
							FROM
							(
								SELECT
								clientID,		postID,payrollID,	clientname,	detachment,	rangedate
								,SO,			SG,				totalsss,	totalphic,	totalhdmf
								,totalretfund, (subtotal + totalmargin) as subtotalwithmargin, 	totalmargin as taxable, (totalmargin *.12) as taxdue,
								totalmargin
								FROM
								(
									SELECT 
										clientID, postID,payrollID, clientname, detachment, rangedate
										,SO,	   SG,	 		totalsss,	totalphic,  totalhdmf
										,totalretfund 
										,(SO + SG + totalsss + totalphic + totalhdmf + totalretfund) as subtotal,((marginSO * numberemployeeso) + (marginSG * numberemployeesg)) as totalmargin
									FROM
									(
										SELECT
											clientID,	postID,payrollID,	clientname, detachment,	rangedate
											,SO,		SG,				(totalsosss + totalsgsss) AS totalsss
											,(totalsophic + totalsgphic) as totalphic, (totalsohdmf + totalsghdmf) as totalhdmf
											,(totalsoretfund + totalsgretfund) as totalretfund,(SO + totalsosss + totalsophic + totalsohdmf + totalsoretfund) AS marginSO
											,(SG + totalsgsss + totalsgphic + totalsghdmf + totalsgretfund) AS marginSG,numberemployeesg,numberemployeeso
										FROM
										(
											SELECT a.clientID, a.postID,a.payrollID, a.clientname, a.detachment,a.rangedate,COALESCE(a.numberemployee,'') as numberemployeesg,COALESCE(b.numberemployee,'') as numberemployeeso
										   ,COALESCE((a.basicsalary / 2),'') AS SG,COALESCE((b.basicsalary / 2),'') AS SO, COALESCE((a.sss_ee * a.numberemployee),'') as totalsosss, COALESCE((b.sss * b.numberemployee),'') as totalsgsss
										   ,COALESCE((a.phic_ee * a.numberemployee),'') as totalsophic, COALESCE((b.phic_ee * b.numberemployee),'') as totalsgphic,COALESCE((a.hdmf_ee * a.numberemployee),'') as totalsohdmf
										   ,COALESCE((b.hdmf_ee * b.numberemployee),'') as totalsghdmf,COALESCE((a.retfund * a.numberemployee),'') as totalsoretfund, COALESCE((b.retfund * b.numberemployee),'') as totalsgretfund

											FROM
											(
												/*  Security Guard  */
												SELECT emp.clientID,emp.postID,pd.payrollID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												COALESCE(pd.sss_ee,'') AS sss_ee ,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee,'') AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON emp.postID = dth.postID  
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander != pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												$sdate $client $detachment and emp.employeetypeID = 1
												GROUP BY emp.clientID,emp.postID 
											)a
											LEFT JOIN
											(	
												/*  Security Officer  */
												SELECT emp.clientID,emp.postID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												COALESCE(pd.sss_ee,'') AS sss,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee) AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON emp.postID = dth.postID AND dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander = pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												LEFT JOIN dm_POST AS dt ON emp.postID = dt.postID 
												$sdate $client $detachment and emp.employeetypeID = 1
												GROUP BY emp.clientID,emp.postID 
											)b ON a.clientID = b.clientID AND a.postID = b.postID
											GROUP BY clientID,postID
										)c
										GROUP BY clientID,postID
									)d
									GROUP BY clientID,postID
								)e
							    GROUP BY clientID,postID
							)f
							GROUP BY clientID,postID
						");

					return $query->result();
					//print_r($this->db->last_query());  
					//exit;
	}
	function Billingclientrecord($payrollID, $client, $post)
	{
		$query = $this->db->query("
							SELECT 
							 payrollID as encryted1, payrollID,		clientID,		postID,							clientname,	 		detachment, rangedate
							,FORMAT(SO, 4) as SO, 			FORMAT(SG,4) AS SG,								FORMAT(totalsss,4) AS totalsss,	 		FORMAT(totalphic,4) AS totalphic,	 FORMAT(totalhdmf,4) AS totalhdmf
							,FORMAT(totalretfund,4) AS totalretfund,	FORMAT(subtotalwithmargin,4) subtotalwithmargin,	 			FORMAT(taxable,4) AS taxable	
							,FORMAT(taxdue,4) as taxdue,					FORMAT(totalmargin,4) as totalmargin,format((subtotalwithmargin + totalmargin),4) AS administrativemargin
							FROM
							(
								SELECT
								clientID,		postID,payrollID,	clientname,	detachment,	rangedate
								,SO,			SG,				totalsss,	totalphic,	totalhdmf
								,totalretfund, (subtotal + totalmargin) as subtotalwithmargin, 	totalmargin as taxable, (totalmargin *.12) as taxdue,
								totalmargin
								FROM
								(
									SELECT 
										clientID, postID,payrollID, clientname, detachment, rangedate
										,SO,	   SG,	 		totalsss,	totalphic,  totalhdmf
										,totalretfund 
										,(SO + SG + totalsss + totalphic + totalhdmf + totalretfund) as subtotal,((marginSO * numberemployeeso) + (marginSG * numberemployeesg)) as totalmargin
									FROM
									(
										SELECT
											clientID,	postID,payrollID,	clientname, detachment,	rangedate
											,SO,		SG,				(totalsosss + totalsgsss) AS totalsss
											,(totalsophic + totalsgphic) as totalphic, (totalsohdmf + totalsghdmf) as totalhdmf
											,(totalsoretfund + totalsgretfund) as totalretfund,(SO + totalsosss + totalsophic + totalsohdmf + totalsoretfund) AS marginSO
											,(SG + totalsgsss + totalsgphic + totalsghdmf + totalsgretfund) AS marginSG,numberemployeesg,numberemployeeso
										FROM
										(
											SELECT a.clientID, a.postID,a.payrollID, a.clientname, a.detachment,a.rangedate,COALESCE(a.numberemployee,'') as numberemployeesg,COALESCE(b.numberemployee,'') as numberemployeeso
										   ,COALESCE((a.basicsalary / 2),'') AS SG,COALESCE((b.basicsalary / 2),'') AS SO, COALESCE((a.sss_ee * a.numberemployee),'') as totalsosss, COALESCE((b.sss * b.numberemployee),'') as totalsgsss
										   ,COALESCE((a.phic_ee * a.numberemployee),'') as totalsophic, COALESCE((b.phic_ee * b.numberemployee),'') as totalsgphic,COALESCE((a.hdmf_ee * a.numberemployee),'') as totalsohdmf
										   ,COALESCE((b.hdmf_ee * b.numberemployee),'') as totalsghdmf,COALESCE((a.retfund * a.numberemployee),'') as totalsoretfund, COALESCE((b.retfund * b.numberemployee),'') as totalsgretfund

											FROM
												(
												/*  Security Guard  */
												SELECT emp.clientID,emp.postID,pd.payrollID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												COALESCE(pd.sss_ee,'') AS sss_ee ,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee,'') AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON emp.postID = dth.postID  
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander != pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												WHERE pd.payrollID = '".$payrollID."'  AND clnt.clientID = '".$client."' AND dth.postID ='".$post."' AND emp.employeetypeID = 1
												GROUP BY emp.clientID,emp.postID 
											)a
											LEFT JOIN
											(	
											
												SELECT emp.clientID,emp.postID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												COALESCE(pd.sss_ee,'') AS sss,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee) AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON emp.postID = dth.postID AND dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander = pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												LEFT JOIN dm_POST AS dt ON emp.postID = dt.postID 
												WHERE pd.payrollID = '".$payrollID."'  AND clnt.clientID = '".$client."' AND dth.postID ='".$post."' AND emp.employeetypeID = 1
												GROUP BY emp.clientID,emp.postID 
											)b ON a.clientID = b.clientID AND a.postID = b.postID
											GROUP BY clientID,postID
										)c
										GROUP BY clientID,postID
									)d
									GROUP BY clientID,postID
								)e
							    GROUP BY clientID,postID
							)f
							GROUP BY clientID,postID
						");
				$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address FROM dm_company");	
				$queryclient = $this->db->query("SELECT clientname,concat(housenumber,' ',streetname,' ',barangay,', ',city) as address FROM dm_client WHERE clientID = '".$client."'");	
				$datadata = $query->result();
				$dataclient = $queryclient->result();
				$datacompany = $querycompany->result();
	     		return array('record' => $datadata, 'company' => $datacompany, 'client' => $dataclient);			
	}

}	
