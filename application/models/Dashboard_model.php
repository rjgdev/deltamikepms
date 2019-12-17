<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all()
	{
		$client = $this->db->query('SELECT COUNT(clientID) AS noofclient FROM dm_client');
		$actclient = $this->db->query('SELECT COUNT(clientID) AS actclient FROM dm_client WHERE clientstatus="Active"');
		$inactclient = $this->db->query('SELECT COUNT(clientID) AS inactclient FROM dm_client WHERE clientstatus="Inactive"');

		$employee = $this->db->query('SELECT COUNT(employeeID) AS noofemployee FROM dm_employee');
		$actemployee = $this->db->query('SELECT COUNT(employeeID) AS actemployee FROM dm_employee WHERE employeestatus="Active"');
		$inactemployee = $this->db->query('SELECT COUNT(employeeID) AS inactemployee FROM dm_employee WHERE employeestatus="Inactive"');

		$detachment = $this->db->query('
			SELECT *, CONCAT(detach.city) as detachcity, CONCAT(detach.housenumber) as detachhousenumber, CONCAT(detach.streetname) as detachstreetname, CONCAT(detach.barangay) as detachbarangay
			FROM dm_detachment as detach
			LEFT JOIN dm_client
			ON detach.clientID=dm_client.clientID
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

