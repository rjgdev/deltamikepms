
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billingprocess_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_thirteenmonthprocess($thrID)
	{
		
		$queryheader = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,	b.usersubmitted,	b.datesubmitted 
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
					$queryheader = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,	b.usersubmitted,	b.datesubmitted 
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

   		}
   		if($queryheader->row()->level==0){
			$level = " AND approvalLevel= 0 ";
		}else{
			$level = "AND approvalLevel=".$queryheader->row()->level."";
		}
			$querydata = $this->db->query("SELECT 
							payrollID,		clientID,		postID,							clientname,	 		detachment, rangedate
							,COALESCE(SO,0) AS SO, 			SG,								totalsss,	 		totalphic,	 totalhdmf
							,totalretfund,	subtotalwithmargin,	 			taxable,
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
										   ,(a.basicsalary / 2) AS SG,(b.basicsalary / 2) AS SO, COALESCE((a.sss_ee * a.numberemployee),'') as totalsosss, COALESCE((b.sss * b.numberemployee),'') as totalsgsss
										   ,COALESCE((a.phic_ee * a.numberemployee),'') as totalsophic, COALESCE((b.phic_ee * b.numberemployee),'') as totalsgphic,COALESCE((a.hdmf_ee * a.numberemployee),'') as totalsohdmf
										   ,COALESCE((b.hdmf_ee * b.numberemployee),'') as totalsghdmf,COALESCE((a.retfund * a.numberemployee),'') as totalsoretfund, COALESCE((b.retfund * b.numberemployee),'') as totalsgretfund

											FROM
											(
												/*  Security Guard  */
												SELECT emp.clientID,emp.postID,pd.payrollID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												COALESCE(pd.sss_ee,'') AS sss_ee ,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee,'') AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander != pd.employeeID
												LEFT JOIN dm_client AS clnt ON dth.clientID = clnt.ClientID 
												$datefrom $dateto AND emp.employeetypeID = 1 and clnt.clientID = ".$queryheader->row()->clientID." GROUP BY dth.clientID 
											)a
											LEFT JOIN
											(	
												/*  Security Officer  */
												SELECT emp.clientID,emp.postID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												COALESCE(pd.sss_ee,'') AS sss,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee) AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
												LEFT JOIN dm_client AS clnt ON dth.clientID = clnt.ClientID 
												$datefrom $dateto  AND emp.employeetypeID = 1 and clnt.clientID = ".$queryheader->row()->clientID." GROUP BY dth.clientID
											)b ON a.clientID = b.clientID 
											GROUP BY clientID
										)c
										GROUP BY clientID
									)d
									GROUP BY clientID
								)e
							    GROUP BY clientID
							)f
							GROUP BY clientID");
					/*print_r($this->db->last_query());  
					exit;*/

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
		$queryclient = $this->db->query('SELECT * FROM dm_client');

			$queryApprover = $this->db->query("SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID 
   										   WHERE dm_approvaldet.approvalID=8  $level ");

	/*print_r($this->db->last_query());  
			exit;*/
   		return array('billingstatement' => $queryheader->result(), 'dropdowndate' => $payrolldate->result(), 'client' => $queryclient->result(), 'approver' => $queryApprover->result(), 'recorddata' =>$querydata->result());

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

		$querySubmit = $this->db->query("SELECT b.billingID, b.payrolldateID,p.datefrom,p.dateto, b.clientID,	b.usersubmitted,	b.datesubmitted 
										,b.userapproved,	b.level, b.approvalID,	b.billingstatus, b.bstatus,
										date_format(b.datesubmitted,'%M% %d%, %Y %H:%i:%s %p') AS formatdate
										FROM dm_billing  as b
										LEFT JOIN dm_payroll as p ON payrolldateID = p.payrollID
										WHERE billingID=".$billingID." LIMIT 1");
		if($querySubmit->row()->billingstatus ==0){
			if($querySubmit->row()->billingstatus ==3 || 2){	
				$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  'billingstatus' => 1);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data); 

        	$querydata = $this->db->query("SELECT 
							payrollID,		clientID,		postID,							clientname,	 		detachment, rangedate
							,COALESCE(SO,0) AS SO, 			SG,								totalsss,	 		totalphic,	 totalhdmf
							,totalretfund,	subtotalwithmargin,	 			taxable,
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
										   ,(a.basicsalary / 2) AS SG,(b.basicsalary / 2) AS SO, COALESCE((a.sss_ee * a.numberemployee),'') as totalsosss, COALESCE((b.sss * b.numberemployee),'') as totalsgsss
										   ,COALESCE((a.phic_ee * a.numberemployee),'') as totalsophic, COALESCE((b.phic_ee * b.numberemployee),'') as totalsgphic,COALESCE((a.hdmf_ee * a.numberemployee),'') as totalsohdmf
										   ,COALESCE((b.hdmf_ee * b.numberemployee),'') as totalsghdmf,COALESCE((a.retfund * a.numberemployee),'') as totalsoretfund, COALESCE((b.retfund * b.numberemployee),'') as totalsgretfund

											FROM
											(
												/*  Security Guard  */
												SELECT emp.clientID,emp.postID,pd.payrollID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												COALESCE(pd.sss_ee,'') AS sss_ee ,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee,'') AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander != pd.employeeID
												LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
												WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID 
											)a
											LEFT JOIN
											(	
												/*  Security Officer  */
												SELECT emp.clientID,emp.postID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												COALESCE(pd.sss_ee,'') AS sss,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee) AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
												LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
												WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."'  AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID 
											)b ON a.clientID = b.clientID
											GROUP BY clientID
										)c
										GROUP BY clientID
									)d
									GROUP BY clientID
								)e
							    GROUP BY clientID
							)f
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
			return array('billing' => 0, 'error' => 'Cannot process billing statement!');
		}
		$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'userapproved' 	=> NULL,
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  'billingstatus' => 1);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data);

        $querydata = $this->db->query("SELECT 
							payrollID,		clientID,		postID,							clientname,	 		detachment, rangedate
							,COALESCE(SO,0) AS SO, 			SG,								totalsss,	 		totalphic,	 totalhdmf
							,totalretfund,	subtotalwithmargin,	 			taxable,
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
										   ,(a.basicsalary / 2) AS SG,(b.basicsalary / 2) AS SO, COALESCE((a.sss_ee * a.numberemployee),'') as totalsosss, COALESCE((b.sss * b.numberemployee),'') as totalsgsss
										   ,COALESCE((a.phic_ee * a.numberemployee),'') as totalsophic, COALESCE((b.phic_ee * b.numberemployee),'') as totalsgphic,COALESCE((a.hdmf_ee * a.numberemployee),'') as totalsohdmf
										   ,COALESCE((b.hdmf_ee * b.numberemployee),'') as totalsghdmf,COALESCE((a.retfund * a.numberemployee),'') as totalsoretfund, COALESCE((b.retfund * b.numberemployee),'') as totalsgretfund

											FROM
											(
												/*  Security Guard  */
												SELECT emp.clientID,emp.postID,pd.payrollID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,concat(date_format(datefrom,'%M %d'),' - ', date_format(dateto,'%d%, %Y')) as rangedate,
												COALESCE(pd.sss_ee,'') AS sss_ee ,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee,'') AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund,clnt.clientname,dth.postname as detachment
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander != emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander != pd.employeeID
												LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
												WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."' AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID 
											)a
											LEFT JOIN
											(	
												/*  Security Officer  */
												SELECT emp.clientID,emp.postID,
												count(pd.employeeID) AS numberemployee,emp.basicsalary,
												COALESCE(pd.sss_ee,'') AS sss,COALESCE(pd.phic_ee,'') AS phic_ee,COALESCE(pd.hdmf_ee) AS hdmf_ee,COALESCE((emp.retfund /2),'') as retfund
												FROM dm_employee AS emp
												LEFT JOIN dm_post AS dth ON  dth.commander = emp.employeeID
												LEFT JOIN  dm_payrolldetails AS pd ON  dth.commander = pd.employeeID
												LEFT JOIN dm_client as clnt ON dth.clientID = clnt.clientID
												WHERE pd.datefrom = '".$querySubmit->row()->datefrom."'  AND pd.dateto = '".$querySubmit->row()->dateto."'  AND emp.employeetypeID = 1 and dth.clientID = ".$querySubmit->row()->clientID." GROUP BY dth.clientID 
											)b ON a.clientID = b.clientID
											GROUP BY clientID
										)c
										GROUP BY clientID
									)d
									GROUP BY clientID
								)e
							    GROUP BY clientID
							)f
							GROUP BY clientID");
/*
		print_r($this->db->last_query());  
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
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,billingstatus=2 WHERE billingID='.$billingID);

	    }else{
			$queryUpdateTK = $this->db->query('UPDATE dm_billing 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE billingID='.$billingID);
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

	function deny_Billingstatementprocess($billingID)
	{

			 	$data = array('datesubmitted' => NULL,
	 				  'level' => 0,
	 				  'userapproved' => NULL,
	 				  'billingstatus' => 3);

		$this->db->where("billingID", $billingID);  
        $this->db->update("dm_billing", $data);
	}

}		