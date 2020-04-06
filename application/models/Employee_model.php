<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_all_employee()
	{
		$dataemployee = $this->db->query('SELECT emp.*,d.description as "deptdesc",
										c.housenumber 	as "clienthouse",
										c.streetname 	as "clientstreetname",
										c.barangay 	as "clientbarangay",
										c.city 		as "clientcity",
										 CASE employeetypeID
   										 WHEN "1" THEN "Security Guard"
   										 WHEN "2" THEN "Staff"  ELSE employeetypeID
                                         END employeetypeDesc,c.clientname,de.postname,p.designationdescription 
                                        FROM dm_employee as emp
										LEFT JOIN dm_designation as p 	on emp.designationID = p.designationID
										LEFT JOIN dm_department as d 	on emp.departmentid = d.departmentid 
										LEFT JOIN dm_client 	as c 	on c.clientID = emp.clientID 
										LEFT JOIN dm_post as de 	on de.postID = emp.postID 
										ORDER BY employeeid DESC');
				$datadepartment = $this->db->query('SELECT * FROM dm_department WHERE departmentstatus ="Active"');
				$querybank = $this->db->query('SELECT * FROM dm_bank WHERE bankstatus ="Active"');
  		 		$datarole = $this->db->query("SELECT * FROM dm_rolemstr");
  		 		$dataclient = $this->db->query('SELECT * FROM dm_client WHERE clientstatus ="Active"');
	  			$datadetachment = $this->db->query('SELECT * FROM dm_post WHERE poststatus ="Active"');
	  			$dataleave = $this->db->query('SELECT * FROM dm_leavetype  WHERE leavetypestatus ="Active"');
	  			$creaditleave =  $this->db->query("SELECT ecl.employeeleavecreditID, ecl.leavetypeiD, ecl.totalleave FROM dm_employeecreditleave AS ecl
				LEFT JOIN dm_employee as e ON ecl.employeeID = e.employeeID");

    			$queryleave = $dataleave->result();
    			$databank = $querybank->result();
    			$queryemployee = $dataemployee->result();
     			$querydepartment = $datadepartment->result();
     			$queryroleaccess = $datarole->result();
     			$querydetachment = $datadetachment->result();
     			$queryclient = $dataclient->result();
	     return array('employee' => $queryemployee, 'department' => $querydepartment, 'roleaccess' => $queryroleaccess, 'detachment' => $querydetachment, 'leave' => $queryleave , 'client' => $queryclient, 'bank' => $databank);

	}

	function save_employee($data, $firstname, $middlename, $lastname, $username, $leavetypeID, $totalleave, $restdayresult /*$sunschedulefrom,$sunscheduleto,$sunrestday,$monchedulefrom, $monscheduleto, $monrestday, $tueschedulefrom, $tuescheduleto, $tuerestday,$wedschedulefrom, $wedscheduleto, $wedrestday, $thschedulefrom, $thscheduleto, $threstday, $frischedulefrom, $frischeduleto, $frirestday, $satschedulefrom, $satscheduleto, $satrestday*/)
	{	
		$query = $this->db->query('SELECT firstname, middlename,lastname FROM dm_employee WHERE firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');

		if($query->num_rows() == 0){

			$this->db->insert('dm_employee', $data);
			$last_id				=	$this->db->insert_id();
			$record  = array();
			$dataschedule = array();

			if(count($totalleave)!=0){
				for($count = 0; $count<count($totalleave); $count++)
				{
	 				$record[$count] = array ('employeeID'   =>	$last_id,
											 'leavetypeID'	=>	$leavetypeID[$count],
											 'totalleave'	=>	$totalleave[$count]);				
				}	
				$this->db->insert_batch('dm_employeecreditleave',$record);
			}	

			if(count($restdayresult)!=0){
				for($count = 0; $count<count($restdayresult); $count++)
				{
					$dataschedule[$count]  = array(
					'employeeID'		=>	$last_id,
					'restday'			=>	$restdayresult[$count]);
				}	
				$this->db->insert_batch('dm_schedule', $dataschedule);
			}

			return 'true|'.str_pad($last_id, 6, "0", STR_PAD_LEFT).' - '.$firstname.' '.$middlename.' '.$lastname.' successfully created!';
	 	}
		else 
		{
			return 'false|Employee name already exist!';
		}   
  	}
  	function update_employee($data,$id,$firstname,$middlename,$lastname,$username,$creditleaveID,$leavetype, $totalleave,$employeecredit,$restdayresult)
  	{
 		 $query = $this->db->query('SELECT firstname, middlename, lastname FROM dm_employee WHERE employeeid!='.$id.' AND firstname LIKE "'.$firstname.'" AND lastname LIKE "'.$lastname.'"');
		if($query->num_rows() == 0){
			$this->db->where("employeeID", $id);  
            $this->db->update("dm_employee", $data); 
            $datacredit  = array();
            $creditID  = array();
          	$dataschedule = array();
            $record  = array(); 
            $id = $this->input->post('id');
           
            $querycreditleave = $this->db->query('DELETE FROM dm_employeecreditleave WHERE employeeID='.$id);
            if($employeecredit!=0){
        		for($count = 0; $count<count($employeecredit); $count++)
 				{
	 				$record[$count] 	= array (/*'employeeleavecreditID' =>  $employeecredit[$count],*/
								 				 'employeeID'		=>	$id,
								 				 'leavetypeID'	=>	$leavetype[$count],
												 'totalleave'	=>	$totalleave[$count]);				
				}
				//$this->db->update_batch('dm_employeecreditleave', $record, 'employeeleavecreditID');
				$this->db->insert_batch('dm_employeecreditleave', $record);
            }
            $query = $this->db->query('DELETE FROM dm_schedule WHERE employeeID='.$id);

            if($restdayresult!=null){
				for($count = 0; $count<count($restdayresult); $count++)
 				{
	 				$dataschedule[$count]  = array('employeeID'		=>	$id,
											       'restday'		=>	$restdayresult[$count]);
 				}	
	          	$this->db->insert_batch('dm_schedule', $dataschedule);
            }
			return 'true|'.str_pad($id, 6, "0", STR_PAD_LEFT).' - '.$firstname.' '.$middlename.' '.$lastname.' successfully updated!';
	 	}
		else 
		{
			return 'false|Employee name already exist!';
		}  
  	}
  	 public function get_designation($departmentID)
    {
    	$query = $this->db->query('SELECT * FROM dm_designation WHERE departmentID ='.$departmentID.' AND designationstatus = "Active"');
    	return $query->result();
    		/*print_r($this->db->last_query());  
					exit;*/
    }

   function update_employeepicture($employeeID, $data)
   {
   	   $this->db->where("employeeID", $employeeID);  
       $this->db->update("dm_employee", $data); 

   }
   function change_status_employee($id,$data)
   {
   	 	$this->db->where("employeeID", $id);  
       $this->db->update("dm_employee", $data); 
   }
    function search_creditleave($employeeID)
   {
   		$querycreditleave = $this->db->query('SELECT * FROM dm_employeecreditleave  as  ecl 
   							LEFT JOIN dm_leavetype as  l ON ecl.leavetypeID = l.leavetypeID
   							WHERE employeeID ="'.$employeeID.'"');
   		return $querycreditleave->result();
   }
   function search_schedule($employeeID)
   {
   	$query = $this->db->query('SELECT * FROM dm_schedule WHERE employeeID ='.$employeeID.'');
   	return $query->result();

   }
    function search_leaverecord($employeeID)
   {
   		$query = $this->db->query('SELECT * FROM dm_employeecreditleave WHERE employeeID ='.$employeeID.'');
   		return $query->result();

   }
   function search_detachment($clientID)
   {

   		$query = $this->db->query('SELECT d.postID,d.postname,d.clientID FROM dm_post AS d
								 LEFT JOIN dm_client AS c ON d.clientID = c.clientID
								 WHERE  d.poststatus = "Active" AND c.clientID ='.$clientID);
   								 return $query->result();
   			/*					 print_r($this->db->last_query());  
			exit;
*/
   }
   function search_bank($bankID)
   {
   	if($bankID==0){
   			$searchbank = " ";
	}else{
    	$searchbank =  "AND bankID = $bankID";
    }
   	$query = $this->db->query('SELECT bankID,acctnoformat , LENGTH(acctnoformat) as acctnumberformat FROM dm_bank WHERE bankstatus ="Active"
								'.$searchbank.'');
   								 return $query->result();

   }

}	
