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
		$query = $this->db->get('dm_employee');

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
		$sql = 'SELECT *, CONCAT(e.city) as ecity, CONCAT(e.housenumber) as ehousenumber, CONCAT(e.streetname) as estreetname, CONCAT(e.barangay) as ebarangay,bank.bankname as "bank_name"
	    	FROM dm_employee as e
	    	LEFT JOIN dm_designation as des
	    	ON des.designationID=e.designationID 
	    	LEFT JOIN dm_department as dept
	    	ON dept.departmentID=e.departmentID 
	    	LEFT JOIN dm_post as post
	    	ON post.postID=e.postID 
	    	LEFT JOIN dm_bank as bank
	    	ON bank.bankID=e.bankName 
	    	WHERE BINARY username= ? AND BINARY password= ?';

	    $query = $this->db->query($sql,array($username,$password));

	    return $query;
  	}

	function validateBCGI($username,$password)
	{
		$sql = 'SELECT * FROM dm_bcgiaccount WHERE BINARY username= ? AND BINARY password= ?';

	    $query = $this->db->query($sql,array($username,$password));

		return $query;
	}
}
?>

