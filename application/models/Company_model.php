<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_company()
	{

		$query = $this->db->query('SELECT * FROM dm_company');
	    return $query->result();


	}
	function save_company($data,$company)
	{
		$query = $this->db->query("SELECT * FROM dm_company WHERE company = '.$company.'");
		if($query->num_rows() == 0){

			$this->db->insert('dm_company', $data);
			return 'true|'.$company.' successfully created!';	

		}else{

			return 'false|Company name already exist!';
		}	

	}
	function update_company($id, $data, $company)
	{

		$query = $this->db->query("SELECT * FROM dm_company WHERE companyID != '.$id.' AND company like '.$company.'");
	
		if($query->num_rows() == 0){

			$this->db->where("companyID", $id); 
			$this->db->update('dm_company', $data);
			return 'true|Company profile successfully updated!';	
		}else{

			return 'false|Company name already exist!';
		}	


	}	
}	