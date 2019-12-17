<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SSStable_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_sss()
	{
	    $query = $this->db->query('SELECT * FROM dm_ssstable');
	    return $query->result();
  	}

  	function save_sss($belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM dm_ssstable WHERE belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'employer' => $this->input->post('employer'),
				'employee' => $this->input->post('employee'),
				'total' => $this->input->post('total')
			 );

			$this->db->insert('dm_ssstable', $data);
			return 'true|'.$belowrange.'-'.$aboverange.' successfully created!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}

  	function update_sss($id,$belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM dm_ssstable WHERE sssid!='.$id.' AND belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'employer' => $this->input->post('employer'),
				'employee' => $this->input->post('employee'),
				'total' => $this->input->post('total')
			 );

			$this->db->where("sssID", $id);  
            $this->db->update("dm_ssstable", $data);    

			return 'true|'.$belowrange.'-'.$aboverange.' successfully updated!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}
}
?>

