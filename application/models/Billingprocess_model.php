
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billingprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_billingprocess($thrID)
	{
		
		$queryheader = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,b.reason,	b.usersubmitted,	b.datesubmitted 
										,b.userapproved,	b.level, b.approvalID,	b.billingstatus, b.bstatus,
										date_format(b.datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing  as b
										LEFT JOIN dm_payroll as p ON payrolldateID = p.payrollID
										WHERE billingstatus!=2");

		if($queryheader->num_rows()===0){
		   				
		   				$data = array('billingstatus'   => 0,
		   							  'payrolldateID'	  =>'999999999999999',
		   							   'clientID'	  =>'88888888888',
		   				);
		   			$this->db->insert('dm_billing', $data);
					$billingID = $this->db->insert_id();
					$queryheader = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,b.reason,	b.usersubmitted,	b.datesubmitted 
										,b.userapproved,	b.level, b.approvalID,	b.billingstatus, b.bstatus,
										date_format(b.datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing  as b
										LEFT JOIN dm_payroll as p ON payrolldateID = p.payrollID
										WHERE billingstatus!=2");
		}else{
			if($queryheader->row()->datefrom==0){
					$thdatefrom = '1880-01-01';
					$datefrom = "WHERE pd.datefrom ='".$thdatefrom."'";
			}else{
				$datefrom = "WHERE pd.datefrom ='".$queryheader->row()->datefrom."'";
			}
			if($queryheader->row()->dateto==0){
					$thdateto = '1880-01-01';
				$dateto = "AND pd.dateto = '".$thdateto."'"; 
			}else{
				$dateto = "AND pd.dateto = '".$queryheader->row()->dateto."'";
			}
			if($queryheader->row()->clientID==0){
				$client = "";
			}else{
				$client = "AND dth.clientID =".$queryheader->row()->clientID."";
			}

   		}
   		if($queryheader->row()->level==0){
			$level = " AND approvalLevel= 0 ";
		}else{
			$level = "AND approvalLevel=".$queryheader->row()->level."";
		}
		if($queryheader->row()->reason==null){
			$reason = " ";
		}else{
			$reason = $queryheader->row()->reason;
		}
			
			$querydata = $this->db->query("
							SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate, '".$reason."' AS reason
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
										SELECT '' AS SO, 'SG' AS SG,IFNULL(emp.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										$datefrom  $dateto AND emp.employeetypeID = 1 $client GROUP BY dth.clientID  
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(emp.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										$datefrom  $dateto AND emp.employeetypeID = 1 $client GROUP BY dth.clientID  
										)a
										GROUP BY clientID
									)b
									GROUP BY clientID
								)c
							    GROUP BY clientID
							)d
							GROUP BY clientID");
	/*print_r($this->db->last_query());  
					exit;*/
				


		$queryclient = $this->db->query('SELECT * FROM dm_client');

					$payrolldate = $this->db->query("SELECT	
									datepayroll as dateformat,payrollID,datefrom
									FROM 
									(
										SELECT 
										payrollID,concat(date_format(datefrom,'%M% %d%,%Y'),' - ',date_format(dateto,'%M% %d%,%Y')) as datepayroll,datefrom,dateto
										FROM dm_payroll
										WHERE payrollstatus = 2
										GROUP BY datefrom,dateto
										ORDER BY datefrom
									)a
									GROUP BY payrollID ORDER BY payrollID DESC");


			$queryApprover = $this->db->query("SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID 
   										   WHERE dm_approvaldet.approvalID=8  $level ");

	/*print_r($this->db->last_query());  
			exit;*/
   		return array('billingstatement' => $queryheader->result(), 'dropdowndate' => $payrolldate->result(), 'client' => $queryclient->result(), 'recorddata' => $querydata->result(), 'approver' => $queryApprover->result());

	}
	function search($billingID, $clientID,$payrolldateID)
    {	

    	$data  = array(
    		'payrolldateID' 	=>	$payrolldateID,
 			'clientID'   		=>	$clientID);
    	$queryUpdatebillingdetails = $this->db->query('SELECT * FROM dm_billing	 WHERE 
												billingID = ".$billingID."'); 

		if($queryUpdatebillingdetails->num_rows()===0){

			$this->db->where("billingID", $billingID);  
            $this->db->update("dm_billing", $data);  
   	   		
		}else{

        	$this->db->where("billingID", $billingID);  
            $this->db->update("dm_billing", $data);  
           // return 'true|'.$description.' successfully updated!';
		}
	}
	function submit_Billingstatement($billingID,  $datesubmitted)
	{

		$querySubmit = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto,b.reason, b.clientID,	b.usersubmitted,	b.datesubmitted 
										,b.userapproved,	b.level, b.approvalID,	b.billingstatus, b.bstatus,
										date_format(b.datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing  as b
										LEFT JOIN dm_payroll as p ON payrolldateID = p.payrollID
										WHERE billingID=".$billingID." LIMIT 1");
		if($querySubmit->row()->billingstatus ==0){
		if($querySubmit->row()->reason==null){
			$reason = " ";
		}else{
			$reason = $querySubmit->row()->reason;
		}
			if($querySubmit->row()->billingstatus ==3 || 2){	
				$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  'billingstatus' => 1,
	 				 'reason' => NULL);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data); 
       

        	$querydata = $this->db->query(" 
        					SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate,'' AS reason
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
										SELECT '' AS SO, 'SG' AS SG,IFNULL(emp.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID  
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(emp.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID  
										)a
										GROUP BY clientID
									)b
									GROUP BY clientID
								)c
							    GROUP BY clientID
							)d
							GROUP BY clientID
							");
			/*	print_r($this->db->last_query());  
					exit;*/

         $queryheader = $this->db->query("SELECT billingID,	payrolldateID, clientID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												billingstatus,
												CASE
													WHEN billingstatus = 0 THEN 'DRAFT'
													WHEN billingstatus = 1 THEN 'PENDING'
													WHEN billingstatus = 2 THEN 'APPROVED'
													ELSE billingstatus
												END AS retirementstatus1, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
											FROM   dm_billing WHERE billingID=".$billingID);

          $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=8 AND approvalLevel='.$queryheader->row()->level);
        
           return array('billing' => $queryheader->result(), 'approver' => $queryApprover->result(),'datarecord' => $querydata->result()); 

        	}	
			return array('billing' => 0, 'error' => 'Cannot process billing statement!');
		}
		$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  'billingstatus' => 1,
	 				  'reason' => NULL);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data);


        $querydata = $this->db->query("
							SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate,'' AS reason
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
										SELECT '' AS SO, 'SG' AS SG,IFNULL(emp.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID  
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(emp.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID  
										)a
										GROUP BY clientID
									)b
									GROUP BY clientID
								)c
							    GROUP BY clientID
							)d
							GROUP BY clientID");

	/*	print_r($this->db->last_query());  
					exit;*/
         $queryheader = $this->db->query("SELECT billingID,	payrolldateID, clientID,		usersubmitted,		datesubmitted,
												userapproved,	dateapproved,	level,				approvalID,
												billingstatus,
												CASE
													WHEN billingstatus = 0 THEN 'DRAFT'
													WHEN billingstatus = 1 THEN 'PENDING'
													WHEN billingstatus = 2 THEN 'APPROVED'
													ELSE billingstatus
												END AS retirementstatus1, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
											FROM   dm_billing WHERE billingID=".$billingID);

          $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=8 AND approvalLevel='.$queryheader->row()->level);
        
           return array('billing' => $queryheader->result(), 'approver' => $queryApprover->result(),'datarecord' => $querydata->result()); 
									 


	}
	function cancel_Billingprocess($billingID)
	{
		$data = array('datesubmitted' => NULL,
		 				  'usersubmitted' => NULL,
		 				  'level' => 0,
		 				  'billingstatus' => 0);

			$this->db->where("billingID", $billingID);  
	        $this->db->update("dm_billing", $data);   
	}

	function approve_Billingstatement($billingID, $dateapproved, $lastapprover)
	{	
		if($lastapprover==1){
		
			$queryUpdateTK = $this->db->query('UPDATE dm_billing
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,reason="",billingstatus=2 WHERE billingID='.$billingID);

	    }else{
			$queryUpdateTK = $this->db->query('UPDATE dm_billing 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,reason="", WHERE billingID='.$billingID);
		}
		$queryheader = $this->db->query("SELECT billingID,	usersubmitted,	datesubmitted
										,userapproved,	level,		approvalID,	
											CASE
											WHEN billingstatus = 0 THEN 'DRAFT'
											WHEN billingstatus = 1 THEN 'PENDING'
											WHEN billingstatus = 2 THEN 'APPROVED'
											ELSE billingstatus
											END AS billingstatus
										,	bstatus
										, date_format(datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing WHERE billingID=".$billingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=6 AND approvalLevel='.$queryheader->row()->level);
		
        return array('billing' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function deny_Billingstatementprocess($billingID,$reason)
	{
			/*$queryheader = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,b.reason,	b.usersubmitted,	b.datesubmitted 
										,b.userapproved,	b.level, b.approvalID,	b.billingstatus, b.bstatus,
										date_format(b.datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing  as b
										LEFT JOIN dm_payroll as p ON payrolldateID = p.payrollID
										WHERE billingstatus=3"); 

        if($queryheader->num_rows()===0){*/

        	$data = array('datesubmitted' => NULL,
	 				  'level' => 0,
	 				  'userapproved' => NULL,
	 				  'billingstatus' => 3,
	 				  'reason' => $reason);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data);
/*
		}else{
			if($queryheader->row()->datefrom==0){
					$thdatefrom = '1880-01-01';
					$datefrom = "WHERE pd.datefrom ='".$thdatefrom."'";
			}else{
				$datefrom = "WHERE pd.datefrom ='".$queryheader->row()->datefrom."'";
			}
			if($queryheader->row()->dateto==0){
					$thdateto = '1880-01-01';
				$dateto = "AND pd.dateto = '".$thdateto."'"; 
			}else{
				$dateto = "AND pd.dateto = '".$queryheader->row()->dateto."'";
			}
			if($queryheader->row()->clientID==0){
				$client = "";
			}else{
				$client = "AND dth.clientID =".$queryheader->row()->clientID."";
			}

   		}
		if($queryheader->row()->reason==null){
			$reason = " ";
		}else{
			$reason = $queryheader->row()->reason;
		}


		$querydata = $this->db->query("SELECT  clientID, postID, payrollID, clientname, detachment,numberemployeeS0, numberemployeeSG,
							basicsalarySO,basicsalarySG,totalsss,totalphic, totalhdmf, totalretfund,(subtotal + totalmargin) AS subtotalwithmargin,
							 totalmargin as taxable, (totalmargin *.12) as taxdue, totalmargin,rangedate, '".$reason."' AS reason
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
										SELECT '' AS SO, 'SG' AS SG,IFNULL(emp.clientID,0) AS clientID,IFNULL(emp.postID,0) AS postID,IFNULL(pd.payrollID,0) AS payrollID,clnt.clientname,dth.postname as detachment,
										'0' AS numberemployeeS0,IFNULL(count(pd.employeeID),0) AS numberemployeeSG,'0' AS basicsalarySO,emp.basicsalary AS basicsalarySG,
										'0' AS sss_eeS0, SUM(IFNULL(pd.sss_ee,0)) AS sss_eeSG ,'0' AS phic_eeS0,SUM(IFNULL(pd.phic_ee,0)) AS phic_eeSG,'0' AS hdmf_eeSO,SUM(IFNULL(pd.hdmf_ee,0)) AS hdmf_eeSG,'0' AS retfundSO, SUM(IFNULL((emp.retfund /2),0)) as retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  emp.employeeID = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										$datefrom  $dateto AND emp.employeetypeID = 1 $client GROUP BY dth.clientID
										UNION ALL
										SELECT 'SG' AS SO, ' ' AS SG, emp.clientID,IFNULL(emp.postID,0) AS postID,pd.payrollID,clnt.clientname,dth.postname as detachment,
										IFNULL(count(pd.employeeID),0) AS numberemployeeSO, '0' AS numberemployeeSG,emp.basicsalary AS basicsalarySO,'0' AS basicsalarySG,
										IFNULL(pd.sss_ee,0) AS sss_eeS0,'0' AS sss_eeSG,IFNULL(pd.phic_ee,0) AS phic_eeSO,'0' AS phic_eeSG,IFNULL(pd.hdmf_ee,0) AS hdmf_eeSO,'0' AS hdmf_eeSG,SUM(IFNULL((emp.retfund /2),0)) as retfundSO,'0' AS retfundSG,
										concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate
										FROM dm_employee AS emp
										LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID AND emp.clientID = dth.clientID
										LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
										LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
										$datefrom  $dateto AND emp.employeetypeID = 1 $client GROUP BY dth.clientID  
										)a
										GROUP BY clientID
									)b
									GROUP BY clientID
								)c
							    GROUP BY clientID
							)d
							GROUP BY clientID");
					
					return $querydata->result();
						//return array('billingdeny' => $querydata->result());
						
			*/			
	}

}		