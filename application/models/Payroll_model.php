<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_payroll(){
		$query = $this->db->query("SELECT * FROM dm_timekeeping WHERE payrollstatus=0 LIMIT 1");

		$datefrom 	= "";
		$dateto 	= "";
		$payrollID 	= 0;
		$level 		= 0;

		if($query->num_rows()!=0){
			 $datefrom = $query->row()->datefrom;
			 $dateto = $query->row()->dateto;
		}


		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE datefrom='".$datefrom."' AND dateto='".$dateto."'");	

		if($queryPayroll->num_rows()!=0){
			$payrollID = $queryPayroll->row()->payrollID;
			$level     = $queryPayroll->row()->level;
		}

		$queryPayrolldetails = $this->db->query("SELECT * FROM dm_payrolldetails 
													 INNER JOIN dm_employee ON dm_employee.employeeID = dm_payrolldetails.employeeID
													 WHERE payrollID=".$payrollID);

		$queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=31 AND approvalLevel='.$level);
		
		return array('timekeeping' => $query->result(),'payroll' => $queryPayroll->result(),'payrolldetails' => $queryPayrolldetails->result(),'approver' => $queryApprover->result());
	}

	function getWTAX($fromcutoff,$employeeID,$netpay){ //FOR STAFF ONLY

		/*$netpay = Monthly Basic Pay + Overtime Pay + Holiday Pay + Night Differential 
						   - 
						   Tardiness - Absences - SSS/Philhealth/PagIbig deductions
	    */
		$wtax = 0;

		$month = date("m",strtotime($fromcutoff));
		$year  = date("y",strtotime($fromcutoff));

		$firstFromCutoff = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
		$firstToCutoff 	 = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");

		$query = $this->db->query("SELECT * FROM dm_payrolldetails WHERE datefrom>='".$firstFromCutoff."' AND dateto<='".$firstToCutoff."' AND employeeID=".$employeeID);

		$firstNetpay  = $query->row()->netpay;
	    $secondNetpay = $netpay;

	    $totalNetpay = $firstNetpay + $secondNetpay;

		$queryWTAX = $this->db->query("SELECT * FROM dm_taxtable WHERE belowrange<=".$totalNetpay." AND aboverange>=".$totalNetpay." LIMIT 1");

		$wtax = ($totalNetpay - $queryWTAX->row()->belowrange) * ($queryWTAX->row()->percent/100) + $queryWTAX->row()->additionaltax;

		return $wtax;
	}

	function getSSS($salary,$fromcutoff,$employeeID){
		$sss = 0;
		$basicsalary = 0;

		$month = date("m",strtotime($fromcutoff));
		$year  = date("y",strtotime($fromcutoff));

		$firstFromCutoff = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
		$firstToCutoff 	 = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");

		$query = $this->db->query("SELECT * FROM dm_payrolldetails WHERE datefrom>='".$firstFromCutoff."' AND dateto<='".$firstToCutoff."' AND employeeID=".$employeeID);

		$basicsalary = $salary + $query->row()->basicpay;
		
		$querySSS = $this->db->query("SELECT * FROM dm_ssstable WHERE belowrange<=".$basicsalary." AND aboverange>=".$basicsalary." LIMIT 1");

		return $querySSS->row()->employee;
	}

	function getPHIC($salary){
		$phic = 0;

		$query = $this->db->query("SELECT * FROM dm_philhealthtable WHERE belowrange<=".$salary." AND aboverange>=".$salary." LIMIT 1");

			if($query->row()->philhealthID==1) $phic = ($query->row()->aboverange * ($query->row()->percent / 100)) / 2;
		elseif($query->row()->philhealthID==2) $phic = ($salary * ($query->row()->percent / 100)) / 2;
		elseif($query->row()->philhealthID==3) $phic = ($query->row()->belowrange * ($query->row()->percent / 100)) / 2;

		return $phic / 2;
	}

	function getHDMF($salary){
		$hdmf = 50;

			/*if($salary>=5000) $hdmf = 100;
		elseif($salary>1500 && $salary<5000) $hdmf = $salary * .02;
		elseif($salary>=1000 && $salary<=1500) $hdmf = $salary * .01;
		else $hdmf = 0;
*/
		return $hdmf;
	}

	function processpayroll($timekeepingID,$fromcutoff,$tocutoff,$payperiod)
	{

		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE datefrom='".$fromcutoff."' AND dateto='".$tocutoff."'");

		if($queryPayroll->num_rows()==0){
			$data = array('datefrom' 	=> $fromcutoff,
						  'dateto'	 	=> $tocutoff,
						  'payperiod'	=> $payperiod
						 );

			$this->db->insert('dm_payroll', $data);
			$last_id = $this->db->insert_id();                                                                                            
		}else{
			$last_id = $queryPayroll->row()->payrollID;
			$queryDeletePayroll = $this->db->query("DELETE FROM dm_payrolldetails WHERE payrollID=".$last_id);
		}

			$hdmf = 0;
			$phic = 0;
			$wtax = 0;
			$sss  = 0;
			
			$query = $this->db->query("SELECT dm_employee.employeeID,
											  dm_employee.firstname,
											  dm_employee.lastname,
											  basicsalary,
											  restot,
											  specialot,
											  specialrestot,
											  regularot,
											  regularrestot,
											  doubleot,
											  doublerestot,
										  	  nightdiff,
											  employeetypeID,
											  COUNT(datesched) - SUM(absent)  AS 'daysofwork',
										      SUM(absent) 		AS 'daysofabsent',
											  SUM(regularhours) AS 'regularhours',
										      SUM(latehours)  	AS 'latehours',
										      SUM(latehours) * (dailyrate / 8)  AS 'late',
										      SUM(absent) * (dailyrate) 		AS 'absent',
										      SUM(othours) 		AS 'overtimehours',
										      dailyrate,
										      (dailyrate / 8) AS 'hourlyrate',
									      	  (CASE employeetypeID
								      	  		WHEN 1 THEN SUM(regularhours) * (dailyrate / 8) 
								      	  		WHEN 2 THEN basicsalary / 2
								      	  	  END) AS 'basicpay',
										      (SUM(othours) * 1.25) * (dailyrate / 8) 		AS 'ordinaryot',
										      (SUM(restot) * 1.30) * (dailyrate / 8)		AS 'restot',
										      (SUM(specialot) * 1.30) * (dailyrate / 8) 	AS 'specialot',
										      (SUM(specialrestot) * 1.95) * (dailyrate / 8) AS 'specialrestot',
										      (SUM(regularot) * 2.6) * (dailyrate / 8) 		AS 'regularot',
										      (SUM(regularrestot) * 3.38) * (dailyrate / 8) AS 'regularrestot',
										      (SUM(doubleot) * 3.9) * (dailyrate / 8) 		AS 'doubleot',
										      (SUM(doublerestot) * 5.07) * (dailyrate / 8) 	AS 'doublerestot',
										      0 AS 'regholiday',
										      0 AS 'speholiday',
										      0 AS 'cola',
										      0 AS 'incentives',
										      0 AS 'uniformallowance'
									   FROM dm_timekeepingdetails
									   INNER JOIN dm_employee ON dm_employee.employeeID=dm_timekeepingdetails.employeeID
									   WHERE (datesched >= '".$fromcutoff."' AND 
									   	      datesched <= '".$tocutoff."') GROUP BY dm_timekeepingdetails.employeeID");

			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
			      	$basicsalary = ($row->employeetypeID==1 ? $row->basicpay : $row->basicsalary);

					/************************  DEDUCTION *************************/
					$hdmf = $this->getHDMF($basicsalary);
					$phic = $this->getPHIC($basicsalary);

					if($payperiod=="2"){
						$sss  = $this->getSSS($row->basicpay, $fromcutoff, $row->employeeID);
					}

					$late	  = $row->late;
					$absent   = $row->absent;
					$sssloan  = 0;
					$hdmfloan = 0;

					$taxDeduction   = $late + $absent + $hdmf + $phic + $sss;
				    $TOTALDEDUCTION = $taxDeduction + $sssloan + $hdmfloan ;

					/************************   INCOME  *************************/
					$totalOTpay = $row->ordinaryot 	+ 
								  $row->restot 		+ 
								  $row->specialot 		+ 
								  $row->specialrestot 	+ 
								  $row->regularot 		+ 
								  $row->regularrestot 	+ 
							      $row->doubleot 		+ 
							      $row->doublerestot;

				    $totalHolidaypay = $row->regholiday + 
									   $row->speholiday;

				    $thirteenmonth 	= ($row->basicpay - ($late + $absent)) / 12;
				    $cola 			= 0;
				    $incentive 		= 0;
				    $allowances 	= 0;
				    $nightdiff 		= $row->nightdiff;

				    $taxEarnings  	= $row->basicpay + $totalOTpay + $totalHolidaypay + $nightdiff;
				    $TOTALINCOME    = $taxEarnings + $cola + $incentive + $allowances;

					/************************  TOTAL  *************************/
					$taxableIncome = $taxEarnings - $taxDeduction;

					if($payperiod=="2" && $row->employeetypeID==2){ // FOR STAFF ONLY
						$wtax = $this->getWTAX($fromcutoff, $row->employeeID, $taxableIncome);
					}

				    $netpay = $TOTALINCOME - $TOTALDEDUCTION - $wtax;

					$data = array('payrollID'		=> $last_id,
								  'datefrom'		=> $fromcutoff,
								  'dateto'			=> $tocutoff,
								  'employeeID'		=> $row->employeeID,
								  'daysofwork' 		=> $row->daysofwork,
								  'daysofabsent' 	=> $row->daysofabsent,
								  'regularhours' 	=> $row->regularhours,
								  'latehours' 		=> $row->latehours,
								  'overtimehours' 	=> $row->overtimehours,
								  'dailyrate' 		=> $row->dailyrate,
								  'hourlyrate' 		=> $row->hourlyrate,
								  'basicpay' 		=> $row->basicpay,
								  'late' 			=> $row->late,
								  'absent' 			=> $row->absent,
								  'ordinaryot' 		=> $row->ordinaryot,
								  'hdmf' 			=> $hdmf,
								  'phic' 			=> $phic,
								  'sss'				=> $sss,
								  'wtax'			=> $wtax,
								  'netpay'			=> $netpay,
								  'thrmonth'		=> $thirteenmonth
								 );

					$this->db->insert('dm_payrolldetails', $data);
			   }
			}

		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE payrollID=".$last_id);

		$queryPayrolldetails = $this->db->query("SELECT * FROM dm_payrolldetails 
												 INNER JOIN dm_employee ON dm_employee.employeeID = dm_payrolldetails.employeeID
												 WHERE datefrom='".$fromcutoff."' AND dateto='".$tocutoff."'");

    	return array("payroll" => $queryPayroll->result(), "payrolldetails" => $queryPayrolldetails->result());
  	}

  	function submit_payroll($payrollID, $datesubmitted)
	{
		$querySubmit = $this->db->query('SELECT * FROM dm_payrolldetails WHERE payrollID='.$payrollID.' LIMIT 1');	 
		
		if($querySubmit->num_rows()===0){
			return array('payroll' => 0, 'error' => 'Cannot submit no time record exist!');
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 31,
	 				  'payrollstatus' => 1);

		$this->db->where("payrollID", $payrollID);  
        $this->db->update("dm_payroll", $data);   

        $queryheader = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=31 AND approvalLevel='.$queryheader->row()->level);

        return array('payroll' => $queryheader->result(), 'approver' => $queryApprover->result());  
	}

	function cancel_payroll($payrollID)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'usersubmitted' => NULL,
	 				  'level' => 0,
	 				  'payrollstatus' => 0);

		$this->db->where("payrollID", $payrollID);  
        $this->db->update("dm_payroll", $data);   	   	
	}

	function approve_payroll($payrollID, $timekeepingID, $dateapproved, $lastapprover)
	{
		if($lastapprover==1){
			$queryUpdatePayroll = $this->db->query('UPDATE dm_payroll 
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,payrollstatus=2 WHERE payrollID='.$payrollID);

			$queryUpdateTK = $this->db->query('UPDATE dm_timekeeping SET payrollstatus=2 WHERE timekeepingID='.$timekeepingID);

	        $query = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);
		}else{
			$queryUpdatePayroll = $this->db->query('UPDATE dm_payroll 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE payrollID='.$payrollID);
		}

		$queryheader = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=31 AND approvalLevel='.$queryheader->row()->level);
		
        return array('payroll' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function deny_payroll($payrollID)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'level' => 0,
	 				  'payrollstatus' => 3);

		$this->db->where("payrollID", $payrollID);  
        $this->db->update("dm_payroll", $data);   	   	
	}
}
?>

