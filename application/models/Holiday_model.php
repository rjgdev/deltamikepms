<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_holiday()
	{
	    $query = $this->db->query('SELECT * FROM dm_holiday');
	    return $query->result();
  	}

  	function save_holiday($holidayname)
	{
		$query = $this->db->query('SELECT holidayname FROM dm_holiday WHERE holidayname = "'.$holidayname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'holidayname' => $holidayname,
				'holidaydate' => $this->input->post('holidaydate'),
				'holidaytype' => $this->input->post('holidaytype')
			 );

			$this->db->insert('dm_holiday', $data);
			return 'true|'.$holidayname.' successfully created!';
		}
		else 
		{
			return 'false|Holiday name already exist!';
		}   
  	}

  	function update_holiday($id,$holidayname)
	{
		$query = $this->db->query('SELECT holidayname FROM dm_holiday WHERE holidayid!='.$id.' AND holidayname = "'.$holidayname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'holidayname' => $holidayname,
				'holidaydate' => $this->input->post('holidaydate')/*,
				'holidaytype' => $this->input->post('holidaytype')*/
			 );

			$this->db->where("holidayID", $id);  
            $this->db->update("dm_holiday", $data);    

			return 'true|'.$holidayname.' successfully updated!';
		}
		else 
		{
			return 'false|Holiday name already exist!';
		}   
  	}
}
?>

