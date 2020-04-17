<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timekeepingsecurityguard_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_timekeeping($tkID)
	{ 
		$timekeepingID = $tkID;
		$datefrom = "";
		$dateto = "";

		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus!=2 AND timekeepingType=1');

   		if($queryheader->num_rows()===0){
   			$month = date('m');
			$year = date('y');

			$datefrom = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
			$dateto   = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");
			$payperiod = 1;

   			$data = array('timekeepingType'		=> 1,
   						  'datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
			$timekeepingID = $this->db->insert_id();

			$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus=0 AND timekeepingType=1');
   		}else{
   			$timekeepingID = $queryheader->row()->timekeepingID;
   			$datefrom = $queryheader->row()->datefrom;
			$dateto = $queryheader->row()->dateto;
   		}

   		$queryDetails = $this->db->query('SELECT * FROM dm_timekeepingdetails
   										  INNER JOIN dm_employee ON dm_employee.employeeID = dm_timekeepingdetails.employeeID 
									  	  WHERE dm_employee.employeetypeID=1 AND dm_timekeepingdetails.timekeepingID='.$timekeepingID.
									   	 ' AND dm_timekeepingdetails.datesched>="'.$datefrom.'"'.
									   	 ' AND dm_timekeepingdetails.datesched<="'.$dateto.'" ORDER BY datesched,dm_employee.employeeID');

   		$queryEmployee = $this->db->query('SELECT *,CONCAT(lastname,", ",firstname) AS fullname FROM dm_employee 
   										   WHERE employeestatus="Active" AND 
   										   		 employeetypeID=1 order by fullname');

   		$queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=1 AND approvalLevel='.$queryheader->row()->level);

   		$queryLeave 	= $this->db->query('SELECT * FROM dm_employeeleave
											INNER JOIN dm_employee ON dm_employee.employeeID = dm_employeeleave.employeeID 
									  	    WHERE dm_employee.employeetypeID=1 AND leavefrom>="'.$datefrom.'" AND leaveto<="'.$dateto.'"');
   		
   		$queryRestday 	= $this->db->query('SELECT * FROM dm_schedule');

    	return array('timekeepingdetails' => $queryDetails->result(),
    				 'timekeeping' 		  => $queryheader->result(),
    				 'employee'		 	  => $queryEmployee->result(),
    				 'approver' 		  => $queryApprover->result(),
    				 'leave' 			  => $queryLeave->result(),
    				 'restday' 			  => $queryRestday->result());
  	}

  	function upload_timekeeping($data)
	{
		$queryUpdateTKdetails = $this->db->query('SELECT timesheetID,timekeepingID FROM dm_timekeepingdetails WHERE 
												    timekeepingID ='.$data["timekeepingID"].'
												AND employeeID	  ='.$data["employeeID"].' 
												AND datesched	  ="'.$data["datesched"].'"'); 

		if($queryUpdateTKdetails->num_rows()===0){
   	   		$this->db->insert("dm_timekeepingdetails", $data); 
		}else{
			$this->db->where("timesheetID",$queryUpdateTKdetails->row()->timesheetID);  
        	$this->db->update("dm_timekeepingdetails", $data);  
		}
	}

	function approve_timekeeping($timekeepingID, $dateapproved, $lastapprover)
	{
		if($lastapprover==1){
			$queryUpdateTK = $this->db->query('UPDATE dm_timekeeping 
									   		   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),dateapproved=IFNULL (CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,timekeepingstatus=2 WHERE timekeepingID='.$timekeepingID);

	        $query = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);

	        if($query->row()->payperiod==1){
	        	$month = date('m',strtotime($query->row()->datefrom));
				$year = date('y',strtotime($query->row()->datefrom));
	        	$lastday = date('t',strtotime($query->row()->datefrom));

	    		$datefrom 	= date_format(date_create($year."-".$month."-"."16"),"Y-m-d");
				$dateto   	= date_format(date_create($year."-".$month."-".$lastday),"Y-m-d");
				$payperiod 	= 2;
	        }else{
	        	$date = date('Y-m-d', strtotime('+1 month', strtotime($query->row()->datefrom)));

	        	$month = date('m',strtotime($date));
				$year = date('y',strtotime($date));

				$datefrom = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
				$dateto   = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");
				$payperiod = 1;
	        }

	        $data = array('timekeepingType'		=> 1,
	        			  'datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
		}else{
			$queryUpdateTK = $this->db->query('UPDATE dm_timekeeping 
									   SET userapproved=IFNULL(CONCAT(userapproved, "|'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL(CONCAT(dateapproved, "|'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE timekeepingID='.$timekeepingID);
		}

		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=1 AND approvalLevel='.$queryheader->row()->level);
		
        return array('timekeeping' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function submit_timekeeping($timekeepingID, $datesubmitted)
	{
		$querySubmit = $this->db->query('SELECT * FROM dm_timekeepingdetails WHERE timekeepingID='.$timekeepingID.' LIMIT 1');	 
		
		if($querySubmit->num_rows()===0){
			return array('timekeeping' => 0, 'error' => "Cannot submit, there's no existing time record!");
		}

	 	$data = array('datesubmitted' => $datesubmitted,
	 				  'usersubmitted' => $this->session->userdata('employeeID'),
	 				  'level' => 1,
	 				  'approvalID' => 1,
	 				  'timekeepingstatus' => 1);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   

        $queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=1 AND approvalLevel='.$queryheader->row()->level);

        return array('timekeeping' => $queryheader->result(), 'approver' => $queryApprover->result());  
	}

	function cancel_timekeeping($timekeepingID)
	{
	 	$data = array('datesubmitted' => NULL,
	 				  'usersubmitted' => NULL,
	 				  'level' => 0,
	 				  'timekeepingstatus' => 0);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   	   	
	}

	function deny_timekeeping($timekeepingID,$reason)
	{
	 	$data = array('datesubmitted' 	=> NULL,
	 				  'reason' 			=> $reason,
	 				  'userdenied'		=> $this->session->userdata('employeeID'),
	 				  'datedenied' 		=> date("Y-m-d H:i:s"),
	 				  'level' 			=> 0,
	 				  'timekeepingstatus' => 3);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   	   	
	}

	function get_attendance($timesheetID)
	{
		$query = $this->db->query('SELECT *,t.timein AS "t_timein",
										    t.timeout AS "t_timeout",
										    r.rateDescription FROM dm_timekeepingdetails AS t
								   INNER JOIN dm_client ON dm_client.clientID = t.clientID 
								   INNER JOIN dm_post   AS p ON p.postID = t.postID 
								   INNER JOIN dm_rate   AS r ON r.rateCode = t.rateCode 
								   WHERE t.timesheetID='.$timesheetID); 

		return $query->result();
	}

	function get_denied($timekeepingID)
	{
		$query = $this->db->query('SELECT CONCAT(dm_employee.firstname," ",dm_employee.lastname) AS "fullname",datedenied, reason 
								   FROM dm_timekeeping
								   INNER JOIN dm_employee ON dm_employee.employeeID = dm_timekeeping.userdenied 
								   WHERE dm_timekeeping.timekeepingID='.$timekeepingID); 

		return $query->result();
	}

	function get_post_schedule($postID)
	{
		$query = $this->db->query('SELECT * FROM dm_post WHERE postID='.$postID); 

		return $query->row()->timein."|".$query->row()->timeout;
	}

	function check_if_restday($employeeID,$day)
	{
		$query = $this->db->query('SELECT * FROM dm_schedule WHERE employeeID='.$employeeID.' AND restday='.$day); 

		return $query->num_rows();
	}

	function check_if_holiday($date)
	{
		$query = $this->db->query('SELECT * FROM dm_holiday WHERE holidaydate="'.$date.'"'); 

		if($query->num_rows()===0){
			return "";
		}else{
			return $query->row()->holidaytype;
		}
	}
}
?>