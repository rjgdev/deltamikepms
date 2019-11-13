<?php 
   class Uploadphoto extends CI_Controller {

	   	function __construct(){
	        parent::__construct();
	    }

        public function fetch_single_user()  
        {  
           $output = array();  
           $this->load->model("Employee_model");  
           $data = $this->Employee_model->fetch_single_user($_POST["employeeID"]);  
           foreach($data as $r)  
           { 
                $output['photo'] = $r->photo;
           }  
           echo json_encode($output);  
        }


    	public function do_upload()
        {
            $config['upload_path']   = "./uploads/";
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite']     = True;
            $config['max_size']      = 2048000;
            $config['max_width']     = 100000;
            $config['max_height']    = 100000;
            $config['file_name'] = $this->input->post('empID');


            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             $this->input->post('photo');

            if ( ! $this->upload->do_upload('photo'))
            {   
                var_dump($this->input->post('photo'));

                $this->session->set_flashdata('img', 'error');
                redirect("Employees"); 
            }
            else
            {
                $data = array(

                    'photo' => $this->input->post('empID').'.'.pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION)
                );  
                var_dump($data);
                $this->load->model('Employee_model');  
                $this->Employee_model->update_employeepicture($this->input->post('empID'), $data); 
                $this->session->set_flashdata('photo', 'upload'); 
                redirect("Employees"); 
                }
            }
	}
?>