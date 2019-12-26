<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_bank()
	{
	    $query = $this->db->query('SELECT * FROM dm_bank');
	    return $query->result();
  	}

  	function save_bank($bankname)
	{
		$query = $this->db->query('SELECT bankname FROM dm_bank WHERE bankname = "'.$bankname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'bankname' => $bankname,
				'acctnoformat' => $this->input->post('acctnoformat'),
				'bankstatus' => 'Active'
			 );

			$this->db->insert('dm_bank', $data);
			return 'true|'.$bankname.' successfully created!';
		}
		else 
		{
			return 'false|Bank name already exist!';
		}   
  	}

  	function update_bank($id,$bankname)
	{
		$query = $this->db->query('SELECT bankname FROM dm_bank WHERE bankid!='.$id.' AND bankname = "'.$bankname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'bankname' => $bankname,
				'acctnoformat' => $this->input->post('acctnoformat')
			 );

			$this->db->where("bankID", $id);  
            $this->db->update("dm_bank", $data);    

			return 'true|'.$bankname.' successfully updated!';
		}
		else 
		{
			return 'false|Bank name already exist!';
		}   
  	}

  	function change_status_bank($id,$status,$bankname)
	{
		if($status=="Inactive"){
			$query = $this->db->query('SELECT * FROM dm_detachment WHERE bankid='.$id.' AND detachmentstatus="Active"');

			if($query->num_rows() == 0){
            	$data = array('bankstatus' => $status);

	            $this->db->where("bankID", $id);  
	          	$this->db->update("dm_bank", $data);  
	          	return 'true|'.$bankname.' successfully changed the status!';
            }else{
          		return 'false|Bank is currently in used!'; 
            }
		}else{
			$data = array('bankstatus' => $status);

			$this->db->where("bankID", $id);  
          	$this->db->update("dm_bank", $data);    
			return 'true|'.$bankname.' successfully changed the status!';
		}
  	}
}
?>

