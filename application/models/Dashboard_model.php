<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{
		$client = $this->db->query('SELECT COUNT(clientID) AS noofclient FROM client');
		$actclient = $this->db->query('SELECT COUNT(clientID) AS actclient FROM client WHERE clientstatus="Active"');
		$inactclient = $this->db->query('SELECT COUNT(clientID) AS inactclient FROM client WHERE clientstatus="Inactive"');

		$employee = $this->db->query('SELECT COUNT(employeeID) AS noofemployee FROM employee');
		$actemployee = $this->db->query('SELECT COUNT(employeeID) AS actemployee FROM employee WHERE employeestatus="Active"');
		$inactemployee = $this->db->query('SELECT COUNT(employeeID) AS inactemployee FROM employee WHERE employeestatus="Inactive"');

		$detachment = $this->db->query('
			SELECT *, CONCAT(detach.city) as detachcity, CONCAT(detach.housenumber) as detachhousenumber, CONCAT(detach.streetname) as detachstreetname, CONCAT(detach.barangay) as detachbarangay
			FROM detachment as detach
			LEFT JOIN client as client
			ON detach.clientID=client.clientID
			WHERE detachmentstatus="Active"');

	    $result1 = $client->result();
	    $result2 = $actclient->result();
	    $result3 = $inactclient->result();
	    $result4 = $employee->result();
	    $result5 = $actemployee->result();
	    $result6 = $inactemployee->result();
	    $result7 = $detachment->result();
	          return array(
	          	'client' => $result1,
	          	'actclient' => $result2,
	          	'inactclient' => $result3,
	          	'employee' => $result4,
	          	'actemployee' => $result5,
	          	'inactemployee' => $result6,
	          	'detachment' => $result7
	          );
  	}
}
?>

