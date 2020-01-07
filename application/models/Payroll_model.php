<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function getWTAX($monthlysalary){
		/* For staff only get the basic salary */
	}

	function getSSS($monthlysalary){
		
	}

	function getPHIC($monthlysalary){
		
	}

	function getHDMF($monthlysalary){
		/*
			if($monthlysalary>=5000) hdmf = 100;
			else ($monthlysalary<1000) hdmf = 0;
			elseif ($monthlysalary>=1000 and $monthlysalary<=1500) hdmf = $monthlysalary * .01;
			elseif ($monthlysalary>1500 and $monthlysalary<5000) hdmf = $monthlysalary * .02;
		*/
	}

	function processpayroll($fromcutoff,$tocutoff)
	{
		$data = array('datefrom' => $fromcutoff,
					  'dateto'	 => $tocutoff
					 );

		$this->db->insert('dm_payroll', $data);
		$last_id = $this->db->insert_id();

		$query = $this->db->query("SELECT COUNT(datesched) AS 'daysofwork',
										  SUM(regularhours) AS 'regularhours',
									      SUM(othours) AS 'overtimehours',
									      dailyrate,
									      (dailyrate / 8) AS 'hourlyrate',
									      SUM(regularhours) * (dailyrate / 8) 			AS 'basicpay',
									      (SUM(othours) * 1.25) * (dailyrate / 8) 		AS 'ordinaryot',
									      (SUM(restot) * 1.69) * (dailyrate / 8)		AS 'restot',
									      (SUM(specialot) * 1.69) * (dailyrate / 8) 	AS 'specialot',
									      (SUM(specialrestot) * 1.95) * (dailyrate / 8) AS 'specialrestot',
									      (SUM(regularot) * 2.6) * (dailyrate / 8) 		AS 'regularot',
									      (SUM(regularrestot) * 3.38) * (dailyrate / 8) AS 'regularrestot',
									      (SUM(doubleot) * 3.9) * (dailyrate / 8) 		AS 'doubleot',
									      (SUM(doublerestot) * 5.07) * (dailyrate / 8) 	AS 'doublerestot'
								   FROM dm_timesheet
								   INNER JOIN dm_employee ON dm_employee.employeeID=dm_timesheet.employeeID
								   WHERE (datesched >= '".$fromcutoff."' AND 
								   	      datesched <= '".$tocutoff."') AND
										  dm_timesheet.employeeID = 1");
	
		$data = array('payrollID'		=> $last_id,
					  'datefrom'		=> $fromcutoff,
					  'dateto'			=> $tocutoff,
					  'employeeID'		=> 1,
					  'daysofwork' 		=> $query->row()->daysofwork,
					  'regularhours' 	=> $query->row()->regularhours,
					  'overtimehours' 	=> $query->row()->overtimehours,
					  'dailyrate' 		=> $query->row()->dailyrate,
					  'hourlyrate' 		=> $query->row()->hourlyrate,
					  'basicpay' 		=> $query->row()->basicpay,
					  'ordinaryot' 		=> $query->row()->ordinaryot
					 );

		$this->db->insert('dm_payrolldetails', $data);
		/*return 'true|'.$description.' successfully created!';*/

    	return $query->result();

  	}
}
?>

