<?php 
   class Company extends CI_Controller {  
     	
	   	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Company_model');  
			$this->company = new Company_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Company Profile');
	  		$data['data']=$this->company->get_all_company();
			$this->load->view('Template/Header',$data);

			if(isAllowed(36)) $this->load->view("Company/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		}

		public function save()
		{
			$company 		=		$this->input->post('company');
			$data 			= 		array(
			'company' 		=> 		$this->input->post('company'),
			'contactperson' => 		$this->input->post('contactperson'),
			'address' 		=> 		$this->input->post('address'),
			'city' 			=> 		$this->input->post('city'),
			'province' 		=> 		$this->input->post('province'),
			'postalcode' 	=> 		$this->input->post('postalcode'),
			'email' 		=> 		$this->input->post('email'),
			'mobilenumber' 	=> 		$this->input->post('mobilenumber'),
			'Fax' 			=> 		$this->input->post('fax'),
			'website' 		=> 		$this->input->post('website'));
			$data 			= 		$this->company->save_company($data,$company);
			$retval 		= 		explode("|",$data);
       		
            if($retval[0] == "false"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}
		public function update()
		{	

			$id 				=		$this->input->post('id');
			$company 			=		$this->input->post('editcompany');
			$data 				= 		array(
			'company' 			=> 		$this->input->post('editcompany'),
			'contactperson'		=> 		$this->input->post('editcontactperson'),
			'unitno' 			=> 		$this->input->post('unitno'),
			'bldgname' 			=> 		$this->input->post('bldgname'),
			'streetname' 		=> 		$this->input->post('streetname'),
			'subdivisionname' 	=> 		$this->input->post('subdivisionname'),
			'barangay' 			=> 		$this->input->post('barangay'),
			'municipality' 		=> 		$this->input->post('municipality'),
			'province' 			=> 		$this->input->post('province'),
			'zipcode' 			=> 		$this->input->post('zipcode'),
			'tinno' 			=> 		$this->input->post('tinno'),
			'sssno' 			=> 		$this->input->post('sssno'),
			'phic' 				=> 		$this->input->post('phic'),
			'pagibig' 			=> 		$this->input->post('pagibig'),
			'email' 			=> 		$this->input->post('email'),
			'phonenumber' 		=> 		$this->input->post('phonenumber'),
			'mobilenumber' 		=> 		$this->input->post('mobilenumber'),
			'Fax' 				=> 		$this->input->post('Fax'),
			'website' 			=> 		$this->input->post('website'));
			$data 				= 		$this->company->update_company($id, $data, $company);
			$retval 			= 		explode("|",$data);
       		
            if($retval[0] == "false"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
			}

	}     
?>
