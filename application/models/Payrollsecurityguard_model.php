<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payrollsecurityguard_model extends CI_Model
{
	function __construct() 
	{ 
		parent::__construct(); 
	}

	function get_payroll(){
		$datefrom 	= "";
		$dateto 	= "";
		$payrollID 	= 0;
		$level 		= 0;

		$query = $this->db->query("SELECT * FROM dm_timekeeping WHERE payrollstatus=0 AND timekeepingType=1 LIMIT 1");

		if($query->num_rows()!=0){
			 $datefrom 	= $query->row()->datefrom;
			 $dateto   	= $query->row()->dateto;
			 $payperiod = $query->row()->payperiod;
		}

		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE payrollType=1 AND datefrom='".$datefrom."' AND dateto='".$dateto."'");	

		if($queryPayroll->num_rows()!=0){
			$payrollID = $queryPayroll->row()->payrollID;
			$level     = $queryPayroll->row()->level;
		}else{
			if($datefrom!=""){
				$data = array('datefrom' 	=> $datefrom,
							  'dateto'	 	=> $dateto,
							  'payperiod'	=> $payperiod,
							  'payrollType'	=> 1
							 );

				$this->db->insert('dm_payroll', $data);
				$payrollID = $this->db->insert_id();

				$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE payrollType=1 AND datefrom='".$datefrom."' AND dateto='".$dateto."'");	
			}
		}

		$queryPayrolldetails = $this->db->query("SELECT *,dm_payrolldetails.incentive,dm_payrolldetails.allowance,
													(sssloan + hdmfloan + salaryloan + emergencyloan + trainingloan + otherloan) AS 'totalLoan',
													(ordot + rstot + spcot + spcrstot + rglot + rglrstot + dblot + dblrstot) AS 'totalOT',
													(ordnight + rstnight + spcnight + spcrstnight + rglnight + rglrstnight + dblnight + dblrstnight) AS 'totalNight',
													(ordlate + rstlate + spclate + spcrstlate + rgllate + rglrstlate + dbllate + dblrstlate) AS 'totalLate',
													(spc + spcrst + rgl + rglrst + dbl + dblrst + (spclate + spcrstlate + rgllate + rglrstlate + dbllate + dblrstlate)) as 'holiday',
													(ord + rst + (ordlate + rstlate)) as 'varBasicpay' FROM dm_payrolldetails 
												 INNER JOIN dm_employee ON dm_employee.employeeID = dm_payrolldetails.employeeID
												 WHERE payrollID=".$payrollID);

		$queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=3 AND approvalLevel='.$level);
		
		return array('timekeeping' 		=> $query->result(),
					 'payroll' 			=> $queryPayroll->result(),
					 'payrolldetails' 	=> $queryPayrolldetails->result(),
					 'approver' 		=> $queryApprover->result());
	}

	function processpayroll($timekeepingID,$fromcutoff,$tocutoff,$payperiod)
	{
		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE payrollType=1 AND datefrom='".$fromcutoff."' AND dateto='".$tocutoff."'");

		if($queryPayroll->num_rows()==0){
			$data = array('datefrom' 	=> $fromcutoff,
						  'dateto'	 	=> $tocutoff,
						  'payperiod'	=> $payperiod,
						  'payrollType'	=> 1
						 );

			$this->db->insert('dm_payroll', $data);
			$last_id = $this->db->insert_id();
		}else{
			$last_id = $queryPayroll->row()->payrollID;
			$queryDeletePayroll = $this->db->query("DELETE FROM dm_payrolldetails WHERE payrollID=".$last_id);
		}

			$query = $this->db->query("SELECT dm_employee.employeeID,
											  dm_employee.firstname,
											  dm_employee.lastname,
											  dm_employee.basicsalary,
											  dm_employee.employeetypeID,
											  dm_employee.dailyrate,
											  (dm_employee.dailyrate / 8) AS 'hourlyrate',
											  dm_employee.retfund 		  AS 'retfund',
										      dm_employee.allowance 	  AS 'allowance',
										      dm_employee.incentive 	  AS 'incentive',
										      count(datesched)  AS 'daysofwork',
										  	  SUM(ord) 			AS 'ordhours',
											  SUM(rst) 			AS 'rsthours',
											  SUM(spc)			AS 'spchours',
											  SUM(spcrst)		AS 'spcrsthours',
											  SUM(rgl)			AS 'rglhours',
											  SUM(rglrst)		AS 'rglrsthours',
											  SUM(dbl)			AS 'dblhours',
											  SUM(dblrst)		AS 'dblrsthours',
											  SUM(ordot)		AS 'ordothours',
											  SUM(rstot)		AS 'rstothours',
											  SUM(spcot)		AS 'spcothours',
											  SUM(spcrstot)		AS 'spcrstothours',
											  SUM(rglot)		AS 'rglothours',
											  SUM(rglrstot)		AS 'rglrstothours',
											  SUM(dblot)		AS 'dblothours',
											  SUM(dblrstot)		AS 'dblrstothours',
											  SUM(ordnight)		AS 'ordnighthours',
											  SUM(rstnight)		AS 'rstnighthours',
											  SUM(spcnight)		AS 'spcnighthours',
											  SUM(spcrstnight)	AS 'spcrstnighthours',
											  SUM(rglnight)		AS 'rglnighthours',
											  SUM(rglrstnight)	AS 'rglrstnighthours',
											  SUM(dblnight)		AS 'dblnighthours',
											  SUM(dblrstnight)  AS 'dblrstnighthours',
											  SUM(ordlate) 		AS 'ordlatehours',
											  SUM(rstlate) 		AS 'rstlatehours',
											  SUM(spclate)		AS 'spclatehours',
											  SUM(spcrstlate)	AS 'spcrstlatehours',
											  SUM(rgllate)		AS 'rgllatehours',
											  SUM(rglrstlate)	AS 'rglrstlatehours',
											  SUM(dbllate)		AS 'dbllatehours',
											  SUM(dblrstlate)	AS 'dblrstlatehours'
									   FROM dm_timekeepingdetails
									   INNER JOIN dm_employee ON dm_employee.employeeID=dm_timekeepingdetails.employeeID
									   INNER JOIN dm_timekeeping ON dm_timekeeping.timekeepingID=dm_timekeepingdetails.timekeepingID
									   WHERE tkType='Exist' AND timekeepingType=1 AND (datesched >= '".$fromcutoff."' AND 
									   	      datesched <= '".$tocutoff."') GROUP BY dm_timekeepingdetails.employeeID");
			
			if ($query->num_rows() > 0)
			{
			   foreach ($query->result() as $row)
			   {
					$wtax 			= 0;
					$grosspay 		= 0;
					$sss_ee 		= 0;
					$sss_er 		= 0;
					$sss_ec 		= 0;
					$hdmf 			= 0;
					$phic 			= 0;
					$sssloan  		= 0;
					$hdmfloan 		= 0;
					$salaryloan 	= 0;
					$emergencyloan 	= 0;
					$trainingloan 	= 0;
					$otherloan 		= 0;

/*1st cutoff - NET
  2ND cutoff - GROSS */
			      	/*$basicsalary = ($row->employeetypeID==1 ? $row->daysofwork * $row->dailyrate : $row->basicsalary);
*/
			      	/************************  DECLARATION  *************************/
			      	$absent = 0;

			      	/* Regular */
			      	$ord 		= ($row->hourlyrate * 1) 	* $row->ordhours;
			      	$rst 		= ($row->hourlyrate * 1.3) 	* $row->rsthours;
			      	$spc 		= ($row->hourlyrate * 1.3) 	* $row->spchours;
			      	$spcrst 	= ($row->hourlyrate * 1.5) 	* $row->spcrsthours;
			      	$rgl 		= ($row->hourlyrate * 2) 	* $row->rglhours;
			      	$rglrst 	= ($row->hourlyrate * 2.6) 	* $row->rglrsthours;
			      	$dbl 		= ($row->hourlyrate * 3) 	* $row->dblhours;
			      	$dblrst 	= ($row->hourlyrate * 3.9) 	* $row->dblrsthours;

			      	/* Overtime */
			      	$ordot 		= ($row->hourlyrate * 1.25) * $row->ordothours;
			      	$rstot		= ($row->hourlyrate * 1.69) * $row->rstothours;
			      	$spcot 		= ($row->hourlyrate * 1.69) * $row->spcothours;
			      	$spcrstot 	= ($row->hourlyrate * 1.95) * $row->spcrstothours;
			      	$rglot 		= ($row->hourlyrate * 2.6) 	* $row->rglothours;
			      	$rglrstot 	= ($row->hourlyrate * 3.38) * $row->rglrstothours;
			      	$dblot 		= ($row->hourlyrate * 3.9) 	* $row->dblothours;
			      	$dblrstot 	= ($row->hourlyrate * 5.07) * $row->dblrstothours;

			      	/* Night Differential */
			      	$ordnight 		= ($row->hourlyrate * 0.10)	* $row->ordnighthours;
			      	$rstnight 		= ($row->hourlyrate * 0.10) * $row->rstnighthours;
			      	$spcnight 		= ($row->hourlyrate * 0.10) * $row->spcnighthours;
			      	$spcrstnight 	= ($row->hourlyrate * 0.10) * $row->spcrstnighthours;
			      	$rglnight 		= ($row->hourlyrate * 0.10)	* $row->rglnighthours;
			      	$rglrstnight 	= ($row->hourlyrate * 0.10) * $row->rglrstnighthours;
			      	$dblnight 		= ($row->hourlyrate * 0.10)	* $row->dblnighthours;
			      	$dblrstnight 	= ($row->hourlyrate * 0.10) * $row->dblrstnighthours;

			      	/* Late */
			      	$ordlate 		= ($row->hourlyrate * 1)   * $row->ordlatehours;
			      	$rstlate 		= ($row->hourlyrate * 1.3) * $row->rstlatehours;
			      	$spclate 		= ($row->hourlyrate * 1.3) * $row->spclatehours;
			      	$spcrstlate 	= ($row->hourlyrate * 1.5) * $row->spcrstlatehours;
			      	$rgllate 		= ($row->hourlyrate * 2)   * $row->rgllatehours;
			      	$rglrstlate 	= ($row->hourlyrate * 2.6) * $row->rglrstlatehours;
			      	$dbllate 		= ($row->hourlyrate * 3)   * $row->dbllatehours;
			      	$dblrstlate 	= ($row->hourlyrate * 3.9) * $row->dblrstlatehours;

			      	/* TOTAL */
			     	$totalRegularpay = $ord + $rst + $spc + $spcrst + 
								  	   $rgl + $rglrst + $dbl + $dblrst;

					$totalOTpay = $ordot + $rstot + $spcot + $spcrstot + 
								  $rglot + $rglrstot + $dblot + $dblrstot;

					$totalNightpay = $ordnight + $rstnight + $spcnight + $spcrstnight + 
					  			  	 $rglnight + $rglrstnight + $dblnight + $dblrstnight;

  			  	    $totalLate = $ordlate + $rstlate + $spclate + $spcrstlate + 
					  			 $rgllate + $rglrstlate + $dbllate + $dblrstlate;

		  			$basicsalary = $totalRegularpay + $totalLate;

				    $thirteenmonth 	  = ($basicsalary - ($totalLate + $absent)) / 6;
				    /*$incentive 		  = ($row->incentive>0 ? $row->incentive/2 : 0);*/
				    $incentive 		  = (($row->dailyrate * 5 /365)/8) * ($row->ordhours + $row->rsthours + $row->spchours + $row->spcrsthours + $row->rglhours);

				  /*  echo $row->dailyrate.'<br>';
				    echo $row->ordhours.'<br>';
				    exit;*/
				    $allowance   	  = ($row->allowance>0 ? $row->allowance/2 : 0);

				    $grosspay = ($basicsalary + $totalOTpay + $totalNightpay + $allowance + $incentive) - ($totalLate + $absent);

					/************************  DEDUCTION *************************/
					/*echo  $row->daysofwork;
					exit;*/
					$hdmf = $this->getHDMF($basicsalary);
				/*	echo $basicsalary.'<br>';
					echo $basicsalary.'<br>';*/

					/*echo $rgl;
					exit;*/

					$phic = $this->getPHIC($basicsalary, $row->daysofwork);

					if($payperiod=="2"){
						$returnSSS = explode("|", $this->getSSS($grosspay, $fromcutoff, $row->employeeID));

						$sss_ee = $returnSSS[0];
						$sss_er = $returnSSS[1];
						$sss_ec = $returnSSS[2];
					}

					$retSSS       = explode("|",$this->getLoan($tocutoff, $row->employeeID, 1));
					$retHdmf      = explode("|",$this->getLoan($tocutoff, $row->employeeID, 2));
					$retSalary    = explode("|",$this->getLoan($tocutoff, $row->employeeID, 3));
					$retEmergency = explode("|",$this->getLoan($tocutoff, $row->employeeID, 4));
					$retTraining  = explode("|",$this->getLoan($tocutoff, $row->employeeID, 5));
					$retOther     = explode("|",$this->getLoan($tocutoff, $row->employeeID, 6));

					$sssDesc 		= $retSSS[1];
					$hdmfDesc 		= $retHdmf[1];
					$salaryDesc 	= $retSalary[1];
					$emergencyDesc 	= $retEmergency[1];
					$trainingDesc 	= $retTraining[1];
					$otherDesc 		= $retOther[1];
					$otherLoanDesc  = $retOther[2];

					$sssloan 	   = $retSSS[0];
					$hdmfloan 	   = $retHdmf[0];
					$salaryloan    = $retSalary[0];
					$emergencyloan = $retEmergency[0];
					$trainingloan  = $retTraining[0];
					$otherloan 	   = $retOther[0];

					$taxDeduction   = $totalLate + $absent + $hdmf + $phic + $sss_ee;
				    $TOTALDEDUCTION = $taxDeduction + $sssloan + $hdmfloan + $salaryloan + $emergencyloan + $trainingloan + $otherloan;

					/************************   INCOME  *************************/
				    $taxEarnings  	= $basicsalary + $totalOTpay + $totalNightpay;
				    $TOTALINCOME    = $taxEarnings + $incentive + $allowance;

					/************************  TOTAL  *************************/
					$taxableIncome = $taxEarnings - $taxDeduction;

					if($payperiod=="2" && $row->employeetypeID==2){ // FOR STAFF ONLY
						$wtax = $this->getWTAX($fromcutoff, $row->employeeID, $taxableIncome);
					}

				    $netpay   = $TOTALINCOME - $TOTALDEDUCTION - $wtax;

					$data = array('payrollID'		 => $last_id,
								  'datefrom'		 => $fromcutoff,
								  'dateto'			 => $tocutoff,
								  'employeeID'		 => $row->employeeID,
								  'daysofwork' 		 => $row->daysofwork,								  
							  	  'ordhours' 		 => $row->ordhours, 			
								  'rsthours' 		 => $row->rsthours, 
								  'spchours' 		 => $row->spchours, 
								  'spcrsthours' 	 => $row->spcrsthours, 
								  'rglhours' 		 => $row->rglhours, 
								  'rglrsthours' 	 => $row->rglrsthours,
								  'dblhours' 		 => $row->dblhours, 
								  'dblrsthours' 	 => $row->dblrsthours, 
								  'ordothours' 		 => $row->ordothours, 
								  'rstothours' 		 => $row->rstothours, 
								  'spcothours' 		 => $row->spcothours, 
								  'spcrstothours' 	 => $row->spcrstothours, 
								  'rglothours'		 => $row->rglothours, 
								  'rglrstothours' 	 => $row->rglrstothours, 
								  'dblothours' 	     => $row->dblothours, 
								  'dblrstothours' 	 => $row->dblrstothours, 
								  'ordnighthours' 	 => $row->ordnighthours,
								  'rstnighthours'	 => $row->rstnighthours, 
								  'spcnighthours' 	 => $row->spcnighthours,
								  'spcrstnighthours' => $row->spcrstnighthours, 
								  'rglnighthours' 	 => $row->rglnighthours, 
								  'rglrstnighthours' => $row->rglrstnighthours,
								  'dblnighthours' 	 => $row->dblnighthours,
								  'dblrstnighthours' => $row->dblrstnighthours,
								  'ordlatehours' 	 => $row->ordlatehours,
								  'rstlatehours' 	 => $row->rstlatehours,
								  'spclatehours' 	 => $row->spclatehours,
								  'spcrstlatehours'  => $row->spcrstlatehours,
								  'rgllatehours '	 => $row->rgllatehours,
								  'rglrstlatehours'  => $row->rglrstlatehours,
								  'dbllatehours' 	 => $row->dbllatehours,
								  'dblrstlatehours'  => $row->dblrstlatehours,

								  'ord' 		 => $ord, 			
								  'rst' 		 => $rst, 
								  'spc' 		 => $spc, 
								  'spcrst' 		 => $spcrst, 
								  'rgl' 		 => $rgl, 
								  'rglrst' 	 	 => $rglrst,
								  'dbl' 		 => $dbl, 
								  'dblrst' 	 	 => $dblrst, 
								  'ordot' 		 => $ordot, 
								  'rstot' 		 => $rstot, 
								  'spcot' 		 => $spcot, 
								  'spcrstot' 	 => $spcrstot, 
								  'rglot'		 => $rglot, 
								  'rglrstot' 	 => $rglrstot, 
								  'dblot' 	     => $dblot, 
								  'dblrstot' 	 => $dblrstot, 
								  'ordnight' 	 => $ordnight,
								  'rstnight'	 => $rstnight, 
								  'spcnight' 	 => $spcnight,
								  'spcrstnight'  => $spcrstnight, 
								  'rglnight' 	 => $rglnight, 
								  'rglrstnight'  => $rglrstnight,
								  'dblnight' 	 => $dblnight,
								  'dblrstnight'  => $dblrstnight,
								  'ordlate' 	 => $ordlate,
								  'rstlate' 	 => $rstlate,
								  'spclate' 	 => $spclate,
								  'spcrstlate'   => $spcrstlate,
								  'rgllate '	 => $rgllate,
								  'rglrstlate'   => $rglrstlate,
								  'dbllate' 	 => $dbllate,
								  'dblrstlate'   => $dblrstlate,

								  'dailyrate' 		 => $row->dailyrate,
								  'hourlyrate' 		 => $row->hourlyrate,
								  'basicpay' 		 => $basicsalary,
								  'allowance'   	 => $allowance,
								  'incentive' 		 => $incentive,

								  'grosspay' 		 => $grosspay,
								  'hdmf_ee' 		 => $hdmf,
								  'hdmf_er' 		 => $hdmf,
								  'phic_ee' 		 => $phic,
								  'phic_er' 		 => $phic,
								  'sss_ee'			 => $sss_ee,
								  'sss_er'			 => $sss_er,
								  'sss_ec'			 => $sss_ec,
								  'sssloan'			 => $sssloan,
								  'sssDesc'			 => $sssDesc,
								  'hdmfloan'	     => $hdmfloan,
								  'hdmfDesc'	     => $hdmfDesc,
								  'salaryloan'		 => $salaryloan,
								  'salaryDesc'		 => $salaryDesc,
								  'emergencyloan'	 => $emergencyloan,
								  'emergencyDesc'	 => $emergencyDesc,
								  'trainingloan'	 => $trainingloan,
								  'trainingDesc'	 => $trainingDesc,
								  'otherloan'	     => $otherloan,
								  'otherLoanDesc'	 => $otherLoanDesc,
								  'otherDesc'	     => $otherDesc,
								  'wtax'			 => $wtax,
								  'netpay'			 => $netpay,
								  'thrmonth'		 => $thirteenmonth,
								  'retfund' 		 => $row->retfund
								 );

					$this->db->insert('dm_payrolldetails', $data);
			   }
			}

		$queryPayroll = $this->db->query("SELECT * FROM dm_payroll WHERE payrollID=".$last_id);

		$queryPayrolldetails = $this->db->query("SELECT *,dm_payrolldetails.incentive,dm_payrolldetails.allowance,
													(sssloan + hdmfloan + salaryloan + emergencyloan + trainingloan + otherloan) AS 'totalLoan',
													(ordot + rstot + spcot + spcrstot + rglot + rglrstot + dblot + dblrstot) AS 'totalOT',
													(ordnight + rstnight + spcnight + spcrstnight + rglnight + rglrstnight + dblnight + dblrstnight) AS 'totalNight',
													(ordlate + rstlate + spclate + spcrstlate + rgllate + rglrstlate + dbllate + dblrstlate) AS 'totalLate',
													(spc + spcrst + rgl + rglrst + dbl + dblrst + (spclate + spcrstlate + rgllate + rglrstlate + dbllate + dblrstlate)) as 'holiday',
													(ord + rst + (ordlate + rstlate)) as 'varBasicpay'
												 FROM dm_payrolldetails 
												 INNER JOIN dm_employee ON dm_employee.employeeID = dm_payrolldetails.employeeID
												 INNER JOIN dm_payroll  ON dm_payroll.payrollID = dm_payrolldetails.payrollID
												 WHERE payrollType=1 AND dm_payrolldetails.datefrom='".$fromcutoff."' AND dm_payrolldetails.dateto='".$tocutoff."' AND employeetypeID=1");

    	return array("payroll" => $queryPayroll->result(), "payrolldetails" => $queryPayrolldetails->result());
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

		/************************   INCOME  *************************/
	    $taxEarnings  	= $basicsalary + $totalOTpay + $totalNightpay;
	    $TOTALINCOME    = $taxEarnings + $incentive + $allowance;

		/************************  TOTAL  *************************/
		$taxableIncome = $taxEarnings - $taxDeduction;

		/* Late */
	  	$ordlate 	= $query->row()->ordlate;
	  	$rstlate 	= $query->row()->rstlate;
	  	$spclate 	= $query->row()->spclate;
	  	$spcrstlate = $query->row()->spcrstlate;
	  	$rgllate 	= $query->row()->rgllate;
	  	$rglrstlate = $query->row()->rglrstlate;
	  	$dbllate 	= $query->row()->dbllate;
	  	$dblrstlate = $query->row()->dblrstlate;

	    $totalLate = $ordlate + $rstlate + $spclate + $spcrstlate + 
					 $rgllate + $rglrstlate + $dbllate + $dblrstlate;

		$taxDeduction = $totalLate + $query->row()->absent + $query->row()->hdmf_ee + $query->row()->phic_ee + $query->row()->sss_ee;

	  	/* Overtime */
      	$ordot 		= $query->row()->ordot;
      	$rstot		= $query->row()->rstot;
      	$spcot 		= $query->row()->spcot;
      	$spcrstot 	= $query->row()->spcrstot;
      	$rglot 		= $query->row()->rglot;
      	$rglrstot 	= $$query->row()->rglrstot;
      	$dblot 		= $query->row()->dblot;
      	$dblrstot 	= $query->row()->dblrstot;

      	$totalOTpay = $ordot + $rstot + $spcot + $spcrstot + 
					  $rglot + $rglrstot + $dblot + $dblrstot;

	    /* Night Differential */
      	$ordnight 		= $query->row()->ordnight;
      	$rstnight 		= $query->row()->rstnight;
      	$spcnight 		= $query->row()->spcnight;
      	$spcrstnight 	= $query->row()->spcrstnight;
      	$rglnight 		= $query->row()->rglnight;
      	$rglrstnight 	= $query->row()->rglrstnight;
      	$dblnight 		= $query->row()->dblnight;
      	$dblrstnight 	= $query->row()->dblrstnight;

      	$totalNightpay = $ordnight + $rstnight + $spcnight + $spcrstnight + 
		  			  	 $rglnight + $rglrstnight + $dblnight + $dblrstnight;


	    $taxEarnings  	= $query->row()->basicpay + $totalOTpay + $totalNightpay + 
	    				 ($query->row()->nightdiffadjustment + 
	    				  $query->row()->leaveadjustment 	 +								
	    				  $query->row()->lateadjustment 	 + 
	    				  $query->row()->otadjustment);

		$taxableIncome 	= $taxEarnings - $taxDeduction;

		$firstNetpay  = $taxableIncome;
	    $secondNetpay = $netpay;

	    $totalNetpay = $firstNetpay + $secondNetpay;

		$queryWTAX = $this->db->query("SELECT * FROM dm_taxtable WHERE belowrange<=".$totalNetpay." AND aboverange>=".$totalNetpay." LIMIT 1");

		if($queryWTAX->num_rows()!=0){
			$wtax = ($totalNetpay - $queryWTAX->row()->belowrange) * ($queryWTAX->row()->percent/100) + $queryWTAX->row()->additionaltax;
		}

		return $wtax;
	}

	/* SSS = (MBS + OT + ALLOWANCE) - (LATE + ABSENT) + ADJUSTMENT */
	function getSSS($salary,$fromcutoff,$employeeID){
		$basicsalary = 0;

		$month = date("m",strtotime($fromcutoff));
		$year  = date("y",strtotime($fromcutoff));

		$firstFromCutoff = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
		$firstToCutoff 	 = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");

		$ordot=0; $rstot=0; $spcot=0; $spcrstot=0; $rglot=0; $rglrstot=0; $dblot=0; $dblrstot=0;
		$ordlate=0; $rstlate=0; $spclate=0; $spcrstlate=0; $rgllate=0; $rglrstlate=0; $dbllate=0; $dblrstlate=0;
		$nightdiffadjustment=0; $leaveadjustment=0; $lateadjustment=0; $otadjustment=0; $otheradjustment=0;
		$allowance=0; $incentive=0; $basicpay=0; $absent=0; 

		$query = $this->db->query("SELECT * FROM dm_payrolldetails WHERE datefrom>='".$firstFromCutoff."' AND dateto<='".$firstToCutoff."' AND employeeID=".$employeeID);

		if($query->num_rows()!=0){
			/* Overtime */
	      	$ordot 		= $query->row()->ordot;
	      	$rstot		= $query->row()->rstot;
	      	$spcot 		= $query->row()->spcot;
	      	$spcrstot 	= $query->row()->spcrstot;
	      	$rglot 		= $query->row()->rglot;
	      	$rglrstot 	= $query->row()->rglrstot;
	      	$dblot 		= $query->row()->dblot;
	      	$dblrstot 	= $query->row()->dblrstot;

	      	/* NightDiff */
	      	$ordnight 		= $query->row()->ordnight;
	      	$rstnight		= $query->row()->rstnight;
	      	$spcnight 		= $query->row()->spcnight;
	      	$spcrstnight 	= $query->row()->spcrstnight;
	      	$rglnight 		= $query->row()->rglnight;
	      	$rglrstnight 	= $query->row()->rglrstnight;
	      	$dblnight 		= $query->row()->dblnight;
	      	$dblrstnight 	= $query->row()->dblrstnight;

	      	/* Late */
		  	$ordlate 	= $query->row()->ordlate;
		  	$rstlate 	= $query->row()->rstlate;
		  	$spclate 	= $query->row()->spclate;
		  	$spcrstlate = $query->row()->spcrstlate;
		  	$rgllate 	= $query->row()->rgllate;
		  	$rglrstlate = $query->row()->rglrstlate;
		  	$dbllate 	= $query->row()->dbllate;
		  	$dblrstlate = $query->row()->dblrstlate;

		  	/* Adjustment */
		  	$nightdiffadjustment = $query->row()->nightdiffadjustment;
		    $leaveadjustment 	 = $query->row()->leaveadjustment;								
		    $lateadjustment 	 = $query->row()->lateadjustment;
		    $otadjustment 		 = $query->row()->otadjustment;
		    $otheradjustment 	 = $query->row()->otheradjustment;

		    /* Allowance */
		    $allowance = $query->row()->allowance;
		    $incentive = $query->row()->incentive;

		    $basicpay = $query->row()->basicpay;
		    $absent   = $query->row()->absent;

		    $netpay = $query->row()->netpay;
    	}

      	$totalOTpay = $ordot + $rstot + $spcot + $spcrstot + 
					  $rglot + $rglrstnight + $dblot + $dblrstot;

	  	$totalNightpay = $ordnight + $rstnight + $spcnight + $spcrstnight + 
					  	 $rglnight + $rglrstnight + $dblnight + $dblrstnight;

	    $totalLate = $ordlate + $rstlate + $spclate + $spcrstlate + 
					 $rgllate + $rglrstlate + $dbllate + $dblrstlate;

		$totalAdjustment = ($nightdiffadjustment + $leaveadjustment + $lateadjustment + $otadjustment + $otheradjustment);

      	$totalAllowance = $allowance + 
						  $incentive;

		 $basicsalary = $salary + $netpay;
		/*$basicsalary = (($salary + $basicpay + $totalNightpay + $totalOTpay + $totalAllowance) + $totalAdjustment) - 
						($totalLate + $absent);*/
		
		$querySSS = $this->db->query("SELECT * FROM dm_ssstable WHERE belowrange<=".$basicsalary." AND aboverange>=".$basicsalary." LIMIT 1");

		return $querySSS->row()->employee."|".$querySSS->row()->employer."|".$querySSS->row()->ec;
	}

	/* MONTHLY BASIC SALARY */
	function getPHIC($salary,$daysofwork){
		$phic = 0;

		$query = $this->db->query("SELECT * FROM dm_philhealthtable WHERE belowrange<=".$salary." AND aboverange>=".$salary." LIMIT 1");

		$phic = ($salary * ($query->row()->percent / 100)) / 2;
			/*if($query->row()->philhealthID==1) $phic = ($query->row()->aboverange * ($query->row()->percent / 100)) / 2;
		elseif($query->row()->philhealthID==2) $phic = ($salary * ($query->row()->percent / 100)) / 2;
		elseif($query->row()->philhealthID==3) $phic = ($query->row()->belowrange * ($query->row()->percent / 100)) / 2;*/

		return $phic;
	}

	/* MONTHLY BASIC SALARY */
	function getHDMF($salary){
		$hdmf = 50;

			/*if($salary>=5000) $hdmf = 100;
		elseif($salary>1500 && $salary<5000) $hdmf = $salary * .02;
		elseif($salary>=1000 && $salary<=1500) $hdmf = $salary * .01;
		else $hdmf = 0;
*/
		return $hdmf;
	}

	function getLoan($dateto, $employeeID, $loantypeID){
		$query = $this->db->query("SELECT * FROM dm_loan WHERE 
								  dategranted <= '$dateto' AND
								  employeeID = $employeeID AND
								  loantypeID = $loantypeID AND 
								  paid = 0");
		if($query->num_rows()!=0){
			$loanID = $query->row()->loanID;

			$queryDeduction = $this->db->query("SELECT * FROM dm_loandeduction WHERE 
												loanID = $loanID AND datededuction = '$dateto'");
			
			if($queryDeduction->num_rows()!=0){
				$this->db->query("UPDATE dm_loan set isProcess=1 WHERE 
								  loanID=".$query->row()->loanID);

				$remaining = $this->getRemainingLoan($loanID);

				if($loantypeID==6){
					return $queryDeduction->row()->amount."|".$remaining."|".$query->row()->lnothers;
				}else{
					return $queryDeduction->row()->amount."|".$remaining;
				}
			}else{
				return "0||";
			}
		}
		return "0||";
	}

	function getRemainingLoan($loanID){
		$query = $this->db->query("SELECT (SELECT COUNT(loanstatus) + 1 FROM dm_loandeduction WHERE loanID=$loanID AND loanstatus=1) as 'from' ,
								   COUNT(loanID) as 'to' FROM dm_loandeduction WHERE loanID=$loanID GROUP BY loanID");

		if($query->num_rows()!=0){
			return "(".$query->row()->from."/".$query->row()->to.")";
		}else{
			return "";
		}

	}

  	function submit_payroll($payrollID, $datesubmitted)
	{
		$querySubmit = $this->db->query('SELECT * FROM dm_payrolldetails WHERE payrollID='.$payrollID.' LIMIT 1');	 
		
		if($querySubmit->num_rows()===0){
			return array('payroll' => 0, 'error' => "Cannot submit, there's no existing time record!");
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 3,
	 				  'payrollstatus' => 1);

		$this->db->where("payrollID", $payrollID);  
        $this->db->update("dm_payroll", $data);   

        $queryheader = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=3 AND approvalLevel='.$queryheader->row()->level);

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

	function approve_payroll($payrollID, $timekeepingID, $dateapproved, $lastapprover, $dateto)
	{
		if($lastapprover==1){
			$this->db->query('UPDATE dm_payroll 
						      SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,payrollstatus=2 WHERE payrollID='.$payrollID);

			$this->db->query('UPDATE dm_timekeeping SET payrollstatus=2 WHERE timekeepingID='.$timekeepingID);
			$this->db->query('UPDATE dm_loandeduction SET loanstatus=1 WHERE datededuction="'.$dateto.'"');

			$queryLoan = $this->db->query('SELECT loanID FROM dm_loan WHERE paid=0 AND enddate>="'. $dateto.'"');

			if($queryLoan->num_rows()!=0){
				foreach ($queryLoan->result() as $row){
					$queryLoanDeduction = $this->db->query('SELECT loanID FROM dm_loandeduction WHERE loanID='.$row->loanID.' AND loanstatus=0');
					
					if($queryLoanDeduction->num_rows()===0){
						$this->db->query('UPDATE dm_loan SET paid=1 WHERE loanID='.$row->loanID);
					}
				}
			}

	        $query = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);
		}else{
			$queryUpdatePayroll = $this->db->query('UPDATE dm_payroll 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE payrollID='.$payrollID);
		}

		$queryheader = $this->db->query('SELECT * FROM dm_payroll WHERE payrollID='.$payrollID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=3 AND approvalLevel='.$queryheader->row()->level);
		
        return array('payroll' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function deny_payroll($payrollID, $reason)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'reason' 			=> $reason,
	 				  'userdenied'		=> $this->session->userdata('employeeID'),
	 				  'datedenied' 		=> date("Y-m-d H:i:s"),
	 				  'level' => 0,
	 				  'payrollstatus' => 3);

		$this->db->where("payrollID", $payrollID);  
        $this->db->update("dm_payroll", $data);   	   	
	}

	function save_adjustment($payperiod,$fromcutoff,$payrolldetailsID,$employeeID,$employeetype,$otadjustment,$nightdiffadjustment,$lateadjustment,$leaveadjustment,$otnotes,$nightnotes,$latenotes,$leavenotes,$othernotes,$otheradjustment,$totalGrosspay,$phic,$hdmf,$basicpay,$holiday,$overtime,$nightdiff,$late,$absent,$loan,$daysofwork)
	{
		$sss_ee   		 = 0;
		$sss_er   		 = 0;
		$sss_ec   		 = 0;
		$wtax 	  		 = 0;
		$totalHolidaypay = 0;
		$sssloan  		 = 0;
		$hdmfloan 		 = 0;
		$salaryloan  	 = 0;
		$emergencyloan	 = 0;
		$trainingloan  	 = 0;
		$otherloan 		 = 0;

		if($payperiod=="2"){
			$returnSSS = explode("|", $this->getSSS($totalGrosspay, $fromcutoff, $employeeID));

			$sss_ee = $returnSSS[0];
			$sss_er = $returnSSS[1];
			$sss_ec = $returnSSS[2];
		}

		/************************   INCOME  *************************/
	    $taxEarnings   = $basicpay + $holiday + $overtime + $totalHolidaypay + $nightdiff + ($otadjustment + $nightdiffadjustment + $lateadjustment + $leaveadjustment);
		/************************   DEDUCTION  *************************/

		$taxDeduction  = $late + $absent + $hdmf + $phic + $sss_ee;
		/************************  TOTAL  *************************/
		$taxableIncome = $taxEarnings - $taxDeduction;

		if($payperiod=="2" && $employeetype==2){ // FOR STAFF ONLY
			$wtax = $this->getWTAX($fromcutoff, $employeeID, $taxableIncome);
		}

		$phic = $this->getPHIC($basicpay + $holiday, $daysofwork);

	    $netpay = ($totalGrosspay) - ($hdmf + $phic + $sss_ee + $wtax + $loan) + $otheradjustment;

	 	$data = array('otadjustment' 		=> $otadjustment,
	 				  'nightdiffadjustment' => $nightdiffadjustment,
	 				  'lateadjustment' 		=> $lateadjustment,
	 				  'leaveadjustment' 	=> $leaveadjustment,
	 				  'otnotes' 			=> $otnotes,
	 				  'nightnotes' 			=> $nightnotes,
	 				  'latenotes' 			=> $latenotes,
	 				  'leavenotes' 			=> $leavenotes,
	 				  'othernotes' 			=> $othernotes,
	 				  'otheradjustment' 	=> $otheradjustment,
	 				  'sss_ee'			 	=> $sss_ee,
					  'sss_er'			 	=> $sss_er,
					  'sss_ec'			 	=> $sss_ec,
	 				  'wtax'				=> $wtax,
	 				  'grosspay'			=> $totalGrosspay,
	 				  'netpay'				=> $netpay);
	 				  /*'thrmonth'			=> $thirteenmonth);*/

		$this->db->where("payrolldetailsID", $payrolldetailsID);  
        $this->db->update("dm_payrolldetails", $data);   	

        return array("wtax" => $wtax, "netpay" => $netpay, "sss" => $sss_ee, "phic" => $phic);   	
	}

	function get_denied($payrollID)
	{
		$query = $this->db->query('SELECT CONCAT(dm_employee.firstname," ",dm_employee.lastname) AS "fullname",datedenied, reason 
								   FROM dm_payroll
								   INNER JOIN dm_employee ON dm_employee.employeeID = dm_payroll.userdenied 
								   WHERE dm_payroll.payrollID='.$payrollID); 

		return $query->result();
	}
}
?>