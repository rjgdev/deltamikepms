<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taxtable_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_tax()
	{
	    $query = $this->db->query('SELECT * FROM dm_taxtable');
	    return $query->result();
  	}

  	function save_tax($belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM dm_taxtable WHERE belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'additionaltax' => $this->input->post('additionaltax'),
				'percent' => $this->input->post('percent')
			 );

			$this->db->insert('dm_taxtable', $data);
			return 'true|'.$belowrange.'-'.$aboverange.' successfully created!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}

  	function update_tax($id, $belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM dm_taxtable WHERE taxid!='.$id.' AND belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'additionaltax' => $this->input->post('additionaltax'),
				'percent' => $this->input->post('percent')
			 );

			$this->db->where("taxid", $id);  
            $this->db->update("dm_taxtable", $data);    

			return 'true|'.$belowrange.'-'.$aboverange.' successfully updated!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}
}
?>

