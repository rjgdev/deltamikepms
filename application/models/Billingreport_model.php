
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billingreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_billingreport()
	{

		$querydate = $this->db->query("SELECT payrolldateID,p.datefrom, p.dateto, concat(date_format(p.datefrom,'%M% %d%,%Y'),' - ',date_format(p.dateto,'%M% %d%,%Y')) as datebilling
		FROM dm_billing AS b 
		LEFT JOIN dm_payroll AS p ON b.payrolldateID = p.payrollID
		WHERE  b.billingstatus = 2 GROUP BY b.payrolldateID");
		return $querydate->result();

	}
	function get_clientdata($client)
	{
		if($client ==0){
			$thdatefrom = '1880-01-01';
			$clientID = "WHERE p.datefrom ='".$thdatefrom."'";
		}else{
			$clientID = "WHERE p.datefrom = '".$client."'";
		}
		$query = $this->db->query(" SELECT c.clientID, c.clientname FROM dm_client AS c
									LEFT JOIN dm_billing AS b on c.clientID = b.clientID
									LEFT JOIN dm_payroll as p ON b.payrolldateID = p.payrollID
								 	$clientID");	
		 return $query->result();

	}

	function get_detachmenttdata($detachment)
	{

		if($detachment ==0){
			$clientID = "WHERE clientID = 0";
		}else{
			$clientID = "WHERE clientID = $detachment";
		}
		$query = $this->db->query(" SELECT postID, postname FROM dm_post $clientID");

		 return $query->result();
	}
	function get_billingreport($billingperiod, $clientID, $detachmentID)
	{

	if($detachmentID==0){
		$detachment = "";
	}else{
		$detachment = "AND dth.postID = $detachmentID";
	}
	$querydata = $this->db->query("SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate
							FROM
							(
								SELECT clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
								basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,
								( basicsalarySO + basicsalarySG + totalsss + totalhdmf + totalretfund) AS subtotal,
								((marginSO * numberemployeeS0) + (marginSG * numberemployeeSG)) as totalmargin,rangedate
								FROM
								(
									SELECT clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
									basicsalarySO,basicsalarySG,(sum(sss_eeS0) + sum(sss_eeSG)) AS totalsss,(sum(phic_eeS0) + sum(phic_eeSG)) AS totalphic,
									(sum(hdmf_eeSO) + sum(hdmf_eeSG)) AS totalhdmf,(sum(retfundSO) + sum(retfundSG)) as totalretfund,
									(basicsalarySO + sum(sss_eeS0) + sum(phic_eeS0) + sum(hdmf_eeSO) + sum(retfundSO)) as marginSO,
									(basicsalarySG + sum(sss_eeSG) + sum(phic_eeSG) + sum(hdmf_eeSG) + sum(retfundSG)) as marginSG,rangedate

									FROM
									(
										SELECT clientID,postID, payrollID, clientname, detachment,
										numberemployeeS0,numberemployeeSG,(basicsalarySO / 2) AS basicsalarySO, (basicsalarySG / 2) AS basicsalarySG, 
										(sum(sss_eeS0) * numberemployeeS0) AS sss_eeS0,(sum(sss_eeSG) * numberemployeeSG) AS sss_eeSG,
										(sum(phic_eeS0) * numberemployeeS0)  AS phic_eeS0, (sum(phic_eeSG) * numberemployeeSG) AS phic_eeSG,
										(sum(hdmf_eeSO) * numberemployeeS0) AS hdmf_eeSO, (sum(hdmf_eeSG) * numberemployeeSG) AS hdmf_eeSG,
										(sum(retfundSO) * numberemployeeS0) AS retfundSO, (sum(retfundSG) * numberemployeeSG) AS retfundSG, rangedate
										FROM(
										SELECT '' AS SO, 'SG' AS SG,IFNULL(dth.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom ='".$billingperiod."'  AND dth.clientID = ".$clientID." AND  emp.employeetypeID =1 $detachment  GROUP BY clnt.clientID,dth.postID
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(dth.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom ='".$billingperiod."'  AND dth.clientID = ".$clientID." AND  emp.employeetypeID =1  $detachment  GROUP BY clnt.clientID,dth.postID
										)a
										GROUP BY clientID,postID
									)b
									GROUP BY clientID,postID
								)c
							    GROUP BY clientID,postID
							)d
							GROUP BY clientID,postID");
					/*print_r($this->db->last_query());  
					exit;*/
					 return $querydata->result();


	}	
	function Billingclientrecord($payrollID, $client, $post)
	{
		$query = $this->db->query("SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate
							FROM
							(
								SELECT clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
								basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,
								( basicsalarySO + basicsalarySG + totalsss + totalhdmf + totalretfund) AS subtotal,
								((marginSO * numberemployeeS0) + (marginSG * numberemployeeSG)) as totalmargin,rangedate
								FROM
								(
									SELECT clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
									basicsalarySO,basicsalarySG,(sum(sss_eeS0) + sum(sss_eeSG)) AS totalsss,(sum(phic_eeS0) + sum(phic_eeSG)) AS totalphic,
									(sum(hdmf_eeSO) + sum(hdmf_eeSG)) AS totalhdmf,(sum(retfundSO) + sum(retfundSG)) as totalretfund,
									(basicsalarySO + sum(sss_eeS0) + sum(phic_eeS0) + sum(hdmf_eeSO) + sum(retfundSO)) as marginSO,
									(basicsalarySG + sum(sss_eeSG) + sum(phic_eeSG) + sum(hdmf_eeSG) + sum(retfundSG)) as marginSG,rangedate

									FROM
									(
										SELECT clientID,postID, payrollID, clientname, detachment,
										numberemployeeS0,numberemployeeSG,(basicsalarySO / 2) AS basicsalarySO, (basicsalarySG / 2) AS basicsalarySG, 
										(sum(sss_eeS0) * numberemployeeS0) AS sss_eeS0,(sum(sss_eeSG) * numberemployeeSG) AS sss_eeSG,
										(sum(phic_eeS0) * numberemployeeS0)  AS phic_eeS0, (sum(phic_eeSG) * numberemployeeSG) AS phic_eeSG,
										(sum(hdmf_eeSO) * numberemployeeS0) AS hdmf_eeSO, (sum(hdmf_eeSG) * numberemployeeSG) AS hdmf_eeSG,
										(sum(retfundSO) * numberemployeeS0) AS retfundSO, (sum(retfundSG) * numberemployeeSG) AS retfundSG, rangedate
										FROM(
										SELECT '' AS SO, 'SG' AS SG,IFNULL(dth.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.payrollID  =".$payrollID."  AND dth.clientID = ".$client." AND  emp.employeetypeID =1 AND dth.postID = ".$post."  GROUP BY clnt.clientID,dth.postID
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(dth.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.payrollID = ".$payrollID."  AND dth.clientID = ".$client." AND  emp.employeetypeID =1 AND dth.postID = ".$post." GROUP BY clnt.clientID,dth.postID
										)a
										GROUP BY clientID,postID
									)b
									GROUP BY clientID,postID
								)c
							    GROUP BY clientID,postID
							)d
							GROUP BY clientID,postID");

	/*print_r($this->db->last_query());  
					exit;*/
			$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address FROM dm_company");	
				$queryclient = $this->db->query("SELECT clientname,concat(housenumber,' ',streetname,' ',barangay,', ',city) as address FROM dm_client WHERE clientID = '".$client."'");	
				$datadata = $query->result();
				$dataclient = $queryclient->result();
				$datacompany = $querycompany->result();
	     		return array('record' => $datadata, 'company' => $datacompany, 'client' => $dataclient);
	}

}		