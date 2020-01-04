<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function processpayroll()
	{
		$query = $this->db->query("SELECT COUNT(datesched) AS 'daysofwork',
										  SUM(regularhours) AS 'regularhours',
									      SUM(othours) AS 'overtimehours',
									      dailyrate,
									      (dailyrate / 8) AS 'hourlyrate',
									      SUM(regularhours) * (dailyrate / 8) AS 'basicpay',
									      (SUM(othours) * 1.25) * (dailyrate / 8) AS 'ordinaryot',
									      '0' AS 'restot',
									      '0' AS 'specialot',
									      '0' AS 'specialrestot',
									      '0' AS 'regularot',
									      '0' AS 'regularrestot',
									      '0' AS 'doubleot',
									      '0' AS 'doublerestot'
								   FROM dm_timesheet
								   INNER JOIN dm_employee ON dm_employee.employeeID=dm_timesheet.employeeID
								   WHERE (datesched >= '2019-12-16' AND 
								   	      datesched <= '2019-12-31') AND
										  dm_timesheet.employeeID = 1");
    	return $query->result();
  	}
}
?>

