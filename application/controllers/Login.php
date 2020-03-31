<?php 
   class Login extends CI_Controller {  
     
		public function index() 
		{ 
			if($this->session->has_userdata('username')){
				redirect(base_url() .'Dashboard');
			}

			$this->load->view("Login/Index");
			$this->load->view('Template/Footer');
		}
		
		public function login_validation()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('Login_model');
			
			$data = $this->Login_model->validate($username, $password);

			if($data->num_rows()==0){
				$this->session->set_flashdata('uname', $username);
				$this->session->set_flashdata('pword', $password);
				$this->session->set_flashdata('error', 'The username or password is invalid.');
				redirect(base_url());
			}else{
				$row = $data->row_array();

				if($row['employeestatus']=="Active"){
					$this->session->set_userdata($data->row_array());
					redirect(base_url() .'Dashboard');
				}else{
					$this->session->set_flashdata('uname', $username);
					$this->session->set_flashdata('pword', $password);
					$this->session->set_flashdata('error', 'Account is no longer active.');
					redirect(base_url());
				}
			}
		}
	     
		public function logout()
		{
		    $this->session->unset_userdata('username');
		    redirect(base_url());
		}
	}     
?>
