<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
  
	function can_login($username, $password, $status)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('employeestatus', $status);
		$query = $this->db->get('employee');

		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function validate($username,$password)
	{
	    $query = $this->db->query('
	    	SELECT *, CONCAT(e.city) as ecity, CONCAT(e.housenumber) as ehousenumber, CONCAT(e.streetname) as estreetname, CONCAT(e.barangay) as ebarangay 
	    	FROM employee as e
	    	LEFT JOIN designation as des
	    	ON des.designationID=e.designationID 
	    	LEFT JOIN department as dept
	    	ON dept.departmentID=e.departmentID 
	    	LEFT JOIN detachment as detach
	    	ON detach.detachmentID=e.detachmentID 
	    	WHERE username="'.$username.'" AND password="'.$password.'"');
	    return $query;
  }
}
?>

