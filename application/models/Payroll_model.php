<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
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

		return $phic;
	}

	function getHDMF($salary){
		$hdmf = 0;

			if($salary>=5000) $hdmf = 100;
		elseif($salary>1500 && $salary<5000) $hdmf = $salary * .02;
		elseif($salary>=1000 && $salary<=1500) $hdmf = $salary * .01;
		else $hdmf = 0;

		return $hdmf;
	}

	function processpayroll($fromcutoff,$tocutoff)
	{
		$payperiod = 1;
		$hdmf = 0;
		$phic = 0;
		$wtax = 0;
		$sss = 0;

		$data = array('datefrom' => $fromcutoff,
					  'dateto'	 => $tocutoff
					 );

		$this->db->insert('dm_payroll', $data);
		$last_id = $this->db->insert_id();

		$query = $this->db->query("SELECT dm_employee.employeeID,
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
									      (SUM(restot) * 1.69) * (dailyrate / 8)		AS 'restot',
									      (SUM(specialot) * 1.69) * (dailyrate / 8) 	AS 'specialot',
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
								   FROM dm_timesheet
								   INNER JOIN dm_employee ON dm_employee.employeeID=dm_timesheet.employeeID
								   WHERE (datesched >= '".$fromcutoff."' AND 
								   	      datesched <= '".$tocutoff."') AND
										  dm_timesheet.employeeID = 1");

		$basicsalary = ($query->row()->employeetypeID==1 ? $query->row()->basicpay : $query->row()->basicsalary);

		/************************   INCOME  *************************/
		$totalOTpay = $query->row()->ordinaryot 	+ 
					  $query->row()->restot 		+ 
					  $query->row()->specialot 		+ 
					  $query->row()->specialrestot 	+ 
					  $query->row()->regularot 		+ 
					  $query->row()->regularrestot 	+ 
				      $query->row()->doubleot 		+ 
				      $query->row()->doublerestot;

	    $totalHolidaypay = $query->row()->regholiday + 
						   $query->row()->speholiday;

	    $thirteenmonth 	= 0;
	    $cola 			= 0;
	    $incentive 		= 0;
	    $allowances 	= 0;
	    $nightdiff 		= $query->row()->nightdiff;

	    $taxEarnings  	= $query->row()->basicpay + $totalOTpay + $totalHolidaypay + $nightdiff;
	    $TOTALINCOME    = $taxEarnings + $thirteenmonth + $cola + $incentive + $allowances;

	    /************************  DEDUCTION *************************/
		if($payperiod==1){
			$hdmf = $this->getHDMF($basicsalary);
			$phic = $this->getPHIC($basicsalary);
		}else if($payperiod==2){
			$sss  = $this->getSSS($query->row()->basicpay, $fromcutoff, $query->row()->employeeID);
		}

		$late	  = $query->row()->late;
		$absent   = $query->row()->absent;
		$sssloan  = 0;
		$hdmfloan = 0;

		$taxDeduction   = $late + $absent + $hdmf + $phic + $sss;
	    $TOTALDEDUCTION = $taxDeduction + $sssloan + $hdmfloan ;

		/************************  TOTAL  *************************/
		$taxableIncome = $taxEarnings - $taxDeduction;

		if($payperiod==2 && $query->row()->employeetypeID==2){ // FOR STAFF ONLY
			$wtax = $this->getWTAX($fromcutoff, $query->row()->employeeID, $taxableIncome);
		}

	    $netpay = $TOTALINCOME - $TOTALDEDUCTION - $wtax;

		$data = array('payrollID'		=> $last_id,
					  'datefrom'		=> $fromcutoff,
					  'dateto'			=> $tocutoff,
					  'employeeID'		=> 1,
					  'daysofwork' 		=> $query->row()->daysofwork,
					  'daysofabsent' 	=> $query->row()->daysofabsent,
					  'regularhours' 	=> $query->row()->regularhours,
					  'latehours' 		=> $query->row()->latehours,
					  'overtimehours' 	=> $query->row()->overtimehours,
					  'dailyrate' 		=> $query->row()->dailyrate,
					  'hourlyrate' 		=> $query->row()->hourlyrate,
					  'basicpay' 		=> $query->row()->basicpay,
					  'late' 			=> $query->row()->late,
					  'absent' 			=> $query->row()->absent,
					  'ordinaryot' 		=> $query->row()->ordinaryot,
					  'hdmf' 			=> $hdmf,
					  'phic' 			=> $phic,
					  'sss'				=> $sss,
					  'wtax'			=> $wtax,
					  'netpay'			=> $netpay
					 );

		$this->db->insert('dm_payrolldetails', $data);

    	return $query->result();
  	}
}
?>

