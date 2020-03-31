<?php 
   class Checkpassword extends CI_Controller {

	   	function __construct(){
	        parent::__construct();
	    }

        public function validate()  
        {  
            $confirmPassword = $this->input->post('confirmPassword');

            $query = $this->db->query('SELECT * FROM dm_security WHERE BINARY dm_security.confirmPassword="'.$confirmPassword.'"');
            
            if($query->num_rows() == 0){
                echo json_encode('false');  
            }else{
                echo json_encode('true');  
            }
        }
	}
?>