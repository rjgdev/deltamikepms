<?php 
	function isAllowed($module)
	{
		$CI=&get_instance();

		$CI->db->select('*');
		$CI->db->from('rolemodule');
		$CI->db->where("roleID", $CI->session->userdata('roleID'));  
		$CI->db->where("moduleID", $module);  
		$result = $CI->db->get()->result();

	    foreach($result as $single)
		{
		   if($single->modulestatus==1) return true;
		   						   else return false;
		}
	}
?>