<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Philhealthtable_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_philhealth()
	{
	    $query = $this->db->query('SELECT * FROM philhealthtable');
	    return $query->result();
  	}

  	function save_philhealth($belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM philhealthtable WHERE belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'percent' => $this->input->post('percent'),
				'employer' => $this->input->post('employer'),
				'employee' => $this->input->post('employee'),
				'total' => $this->input->post('total')
			 );

			$this->db->insert('philhealthtable', $data);
			return 'true|'.$belowrange.'-'.$aboverange.' successfully created!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}

  	function update_philhealth($id,$belowrange, $aboverange)
	{
		$query = $this->db->query('SELECT belowrange FROM philhealthtable WHERE philhealthid!='.$id.' AND belowrange = "'.$belowrange.'"');

		if($query->num_rows() == 0){

			$data = array(
				'belowrange' => $belowrange,
				'aboverange' => $aboverange,
				'percent' => $this->input->post('percent'),
				'employer' => $this->input->post('employer'),
				'employee' => $this->input->post('employee'),
				'total' => $this->input->post('total')
			 );

			$this->db->where("philhealthID", $id);  
            $this->db->update("philhealthtable", $data);    

			return 'true|'.$belowrange.'-'.$aboverange.' successfully updated!';
		}
		else 
		{
			return 'false|Range already exist!';
		}   
  	}
}
?>

