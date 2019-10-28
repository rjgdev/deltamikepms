<?php 
   class Login extends CI_Controller {  
     
		public function index() 
		{ 
			if($this->session->has_userdata('uname')){
				redirect(base_url() .'dashboard');
			}

			$this->load->view("Login/Index");
		}
		
		public function login_validation()
		{

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('Login_model');
			
			$validate = $this->Login_model->validate($username, $password);

			if($validate->num_rows()==0){
				$this->session->set_flashdata('username', $username);
				$this->session->set_flashdata('password', $password);
				$this->session->set_flashdata('error', 'The username or password is invalid.');
				redirect(base_url());
			}else{
				$userdata = array('uname'  => $username);

				$this->session->set_userdata($userdata);
				redirect(base_url() .'dashboard');
			}

			/*if($validate->num_rows() > 0){
				$data                = $validate->row_array();
				$employeeID          = $data['employeeID'];
				$name                = $data['username'];
				$email               = $data['email'];
				$role_id             = $data['role_id'];
				$firstname           = $data['firstname'];
				$lastname            = $data['lastname'];
				$status              = $data['status'];
				$gender              = $data['gender'];
				$departmentID        = $data['departmentID'];
				$departmentDesc      = $data['description'];
				$positionID          = $data['positionID'];
				$positionDesc        = $data['positiondescription'];
				$housenumber         = $data['housenumber'];
				$streetname          = $data['streetname'];
				$barangay            = $data['barangay'];
				$city                = $data['city'];
				$contactinfo         = $data['contactinfo'];
				$birthdate           = $data['birthdate'];
				$civilstatus         = $data['civilstatus'];
				$citizenship         = $data['citizenship'];
				$hireddate           = $data['hireddate'];
				$basicsalary         = $data['basicsalary'];
				$dailyrate           = $data['dailyrate'];
				$allowance           = $data['allowance'];
				$tinnumber           = $data['tinnumber'];
				$sssnumber           = $data['sssnumber'];
				$philhealthnumber    = $data['philhealthnumber'];
				$pagibignumber       = $data['pagibignumber'];
				$photo      	     = $data['photo'];

				if($status!="Active"){
					$this->session->set_flashdata('error', 'Account is no longer active.');
					redirect(base_url());
				}

				$session_data        = array(
				'employeeID'         => $employeeID, 
				'username'           => $username,
				'password'           => $password,
				'role_id'            => $role_id,
				'firstname'          => $firstname,
				'lastname'           => $lastname,
				'gender'             => $gender,
				'fullname'           => $firstname.' '.$lastname,
				'status'             => $status,
				'departmentID'       => $departmentID,
				'departmentDesc'     => $departmentDesc,
				'positionID'         => $positionID,
				'positionDesc'       => $positionDesc,
				'address'            => $housenumber.' '.$streetname.' '.$barangay.' '.$city,
				'contactinfo'        => $contactinfo,
				'birthdate'		     => $birthdate,
				'civilstatus'	     => $civilstatus,
				'citizenship'	     => $citizenship,
				'hireddate'		     => $hireddate,
				'basicsalary'		 => $basicsalary,
				'dailyrate'		     => $dailyrate,
				'allowance'		     => $allowance,
				'tinnumber'		     => $tinnumber,
				'sssnumber'		     => $sssnumber,
				'philhealthnumber'	 => $philhealthnumber,
				'pagibignumber'		 => $pagibignumber,
				'photo'		 		 => $photo,
				'logged_in'          => TRUE
				);
				$this->session->set_userdata('userdata',$session_data);
				$this->session->set_flashdata('dashboard', 'success'); 
				redirect(base_url() .'dashboard');
			}
			else
			{
				$this->session->set_flashdata('error', 'Invalid Username or password');
				redirect(base_url());
			}*/
		}
	     
		public function logout()
		{
		    $this->session->unset_userdata('uname');
		    redirect(base_url());
		}
	}     
?>
