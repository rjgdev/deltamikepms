<?php 
   class Posts extends CI_Controller {  
		public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Post_model');  
	  		$this->detachment = new Post_model;     
		}

		public function index() 
		{ 
	  		$data = array('title' => 'Posts');

       		$data['data']=$this->detachment->get_all_detachment();
	  		
			$this->load->view('Template/Header',$data);

			if(isAllowed(27)) $this->load->view("Post/Index",$data);
						else $this->load->view("Denied/Index");
			
			$this->load->view('Template/Footer',$data);
		} 

		public function save() 
		{ 
			$postname = $this->input->post('postname');
			$clientID = $this->input->post('clientID');
			$timein   =	$this->input->post('timein');
			$timeout  =	$this->input->post('timeout');

			$data = array(
				'postname' => $postname,
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'clientID' => $this->input->post('clientID'),
				'commander' => $this->input->post('commander'),
				'startdate' => $this->input->post('startdate'),
				'enddate' => $this->input->post('enddate'),
				'noofguard' => $this->input->post('noofguard'),
				'poststatus' => 'Active'
			 );


       		$data=$this->detachment->save_detachment($data, $postname, $clientID, $timein, $timeout);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Post already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 

		public function update() 
		{ 
			$id = $this->input->post('id');
			$postname = $this->input->post('postname');
			$clientID = $this->input->post('clientID');
			$timein   =	$this->input->post('timein');
			$timeout  =	$this->input->post('timeout');

			$data = array(
				'postname' => $postname,
				'housenumber' => $this->input->post('housenumber'),
				'streetname' => $this->input->post('streetname'),
				'barangay' => $this->input->post('barangay'),
				'city' => $this->input->post('city'),
				'clientID' => $this->input->post('clientID'),
				'commander' => $this->input->post('commander'),
				'startdate' => $this->input->post('startdate'),
				'enddate' => $this->input->post('enddate'),
				'noofguard' => $this->input->post('noofguard')
			 );

       		$data=$this->detachment->update_detachment($id, $data, $postname, $clientID, $timein, $timeout);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Post name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		}

		public function changestatus() 
		{ 
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			$postname = $this->input->post('postname');

       		$data=$this->detachment->change_status_detachment($id, $status,$postname);
       		$retval = explode("|",$data);

            if($retval[0] == "false" && $retval[1] == "Post name already exist!"){
    			$this->session->set_flashdata('error', $retval[1]); 
            }else{
                $this->session->set_flashdata('success', $retval[1]); 
            }   
	    	echo json_encode($data);  
		} 
	}     
?>
