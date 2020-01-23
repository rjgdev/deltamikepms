
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
											FROM dm_payroll GROUP BY dateto,datefrom");
		$queryclient =  $this->db->query("SELECT * FROM dm_client WHERE clientstatus ='active'");
		$datadatecutoff = $querydatecutoff->result();
		$dataclient = $queryclient->result();
	return array('client' => $dataclient,  'cutoff' => $datadatecutoff);	 
	}
	function get_detachment($detachment)
	{
		$query = $this->db->query(' SELECT * FROM dm_detachment WHERE clientID ='.$detachment.'');
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
			    	$detachment =  "AND emp.detachmentID IN (".$searchdetachment.")";
			    }
					$query = $this->db->query("
							SELECT 
							clientID,		detachmentID,					clientname,	 		detachment, rangedate
							,SO, 			SG,								totalsss,	 		totalphic,	 totalhdmf
							,totalretfund,	subtotalwithmargin,	 			taxable
							taxdue,					totalmargin
								
							FROM
							(
								SELECT
								clientID,		detachmentID,	clientname,	detachment,	rangedate
								,SO,			SG,				totalsss,	totalphic,	totalhdmf
								,totalretfund, (subtotal + totalmargin) as subtotalwithmargin, 	totalmargin as taxable, (totalmargin *.12) as taxdue,
								totalmargin
								FROM
								(
									SELECT 
										clientID, detachmentID, clientname, detachment, rangedate
										,SO,	   SG,	 		totalsss,	totalphic,  totalhdmf
										,totalretfund 
										,(SO + SG + totalsss + totalphic + totalhdmf + totalretfund) as subtotal,((marginSO * numberemployeeso) + (marginSG * numberemployeesg)) as totalmargin
									FROM
									(
										SELECT
											clientID,	detachmentID,	clientname, detachment,	rangedate
											,SO,		SG,				(totalsosss + totalsgsss) AS totalsss
											,(totalsophic + totalsgphic) as totalphic, (totalsohdmf + totalsghdmf) as totalhdmf
											,(totalsoretfund + totalsgretfund) as totalretfund,(SO + totalsosss + totalsophic + totalsohdmf + totalsoretfund) AS marginSO
											,(SG + totalsgsss + totalsgphic + totalsghdmf + totalsgretfund) AS marginSG,numberemployeesg,numberemployeeso
										FROM
										(
											SELECT a.clientID, a.detachmentID, a.clientname, a.detachment,a.rangedate,a.numberemployee as numberemployeesg,b.numberemployee as numberemployeeso
										   ,(a.basicsalary / 2) AS SG,(b.basicsalary / 2) AS SO, (a.sss * a.numberemployee) as totalsosss, (b.sss * b.numberemployee) as totalsgsss
										   ,(a.phic * a.numberemployee) as totalsophic, (b.phic * b.numberemployee) as totalsgphic,(a.hdmf * a.numberemployee) as totalsohdmf
										   ,(b.hdmf * b.numberemployee) as totalsghdmf,(a.retfund * a.numberemployee) as totalsoretfund, (b.retfund * b.numberemployee) as totalsgretfund

											FROM
											(
												/*  Security Guard  */
												SELECT emp.clientID,emp.detachmentID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												pd.sss,pd.phic,pd.hdmf,(retfund /2) as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_detachment AS dth ON emp.detachmentID = dth.detachmentID  
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander != pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												$sdate $client $detachment
												GROUP BY emp.clientID,emp.detachmentID 
											)a
											LEFT JOIN
											(	
												/*  Security Officer  */
												SELECT emp.clientID,emp.detachmentID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												pd.sss AS sss,pd.phic,pd.hdmf,(retfund /2) as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_detachment AS dth ON emp.detachmentID = dth.detachmentID AND dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON emp.employeeID = pd.employeeID AND dth.commander = pd.employeeID
												LEFT JOIN dm_client AS clnt ON emp.clientID = clnt.ClientID 
												LEFT JOIN dm_detachment AS dt ON emp.detachmentID = dt.detachmentID 
												$sdate $client $detachment
												GROUP BY emp.clientID,emp.detachmentID 
											)b ON a.clientID = b.clientID AND a.detachmentID = b.detachmentID
											GROUP BY clientID,detachmentID
										)c
										GROUP BY clientID,detachmentID
									)d
									GROUP BY clientID,detachmentID
								)e
							    GROUP BY clientID,detachmentID
							)f
							GROUP BY clientID,detachmentID
						");

					return $query->result();
					//print_r($this->db->last_query());  
					//exit;
	}

}	
