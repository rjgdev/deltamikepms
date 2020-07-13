<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_client()
	{
	    $query = $this->db->query('SELECT * FROM dm_client');
	    return $query->result();
  	}

  	function save_client($clientname)
	{
		$query = $this->db->query('SELECT clientname FROM dm_client WHERE clientname = "'.$clientname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'clientname' => $clientname,
				'description' => $this->input->post('description'),
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'contactperson' => $this->input->post('contactperson'),
				'contactno' => $this->input->post('contactno'),
				'email' => $this->input->post('email'),
				'noofpost' => $this->input->post('activedetachmentpost'),
				'clientstatus' => 'Active'
			 );

			$this->db->insert('dm_client', $data);
			return 'true|'.$clientname.' successfully created!';
		}
		else 
		{
			return 'false|Client name already exist!';
		}   
  	}

  	function update_client($id,$clientname)
	{
		$query = $this->db->query('SELECT clientname FROM dm_client WHERE clientid!='.$id.' AND clientname = "'.$clientname.'"');

		if($query->num_rows() == 0){

			$data = array(
				'clientname' => $clientname,
				'description' => $this->input->post('description'),
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'contactperson' => $this->input->post('contactperson'),
				'contactno' => $this->input->post('contactno'),
				'email' => $this->input->post('email'),
				'noofpost' => $this->input->post('activedetachmentpost')
			 );

			$this->db->where("clientID", $id);  
            $this->db->update("dm_client", $data);    

			return 'true|'.$clientname.' successfully updated!';
		}
		else 
		{
			return 'false|Client name already exist!';
		}   
  	}

  	function change_status_client($id,$data)
   	{
   	 	$this->db->where("clientID", $id);  
        $this->db->update("dm_client", $data); 
    }
}
?>

