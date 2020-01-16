<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timekeeping_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}

	function get_timekeeping($tkID)
	{ 
		$timekeepingID = $tkID;
		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus!=2');

   		if($queryheader->num_rows()===0){
   			$month = date('m');
			$year = date('y');

			$datefrom = date_format(date_create($year."-".$month."-"."01"),"Y-m-d");
			$dateto   = date_format(date_create($year."-".$month."-"."15"),"Y-m-d");
			$payperiod = 1;

   			$data = array('datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
			$timekeepingID = $this->db->insert_id();

			$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingstatus=0');
   		}else{
   			$timekeepingID = $queryheader->row()->timekeepingID;
   		}

   		$querydetails = $this->db->query('SELECT *,
   								   (regularhours + regholidayhours + speholidayhours) AS "basicHours",
   								   (othours + restot + specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot) AS "otHours",
								   (regularhours + regholidayhours + speholidayhours + othours + restot + specialot + specialrestot + regularot + regularrestot + doubleot + doublerestot) AS "totalHours"
								   FROM dm_timekeepingdetails INNER JOIN dm_employee ON dm_employee.employeeID = dm_timekeepingdetails.employeeID 
								   WHERE dm_timekeepingdetails.timekeepingID='.$timekeepingID);

   		$queryEmployee = $this->db->query('SELECT * FROM dm_employee WHERE employeestatus="Active" order by firstname');

   		$queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=1 AND approvalLevel='.$queryheader->row()->level);

    	return array('timekeepingdetails' => $querydetails->result(),'timekeeping' => $queryheader->result(),'employee' => $queryEmployee->result(),'approver' => $queryApprover->result());
  	}

  	function upload_timekeeping($data)
	{
   	   	$this->db->insert("dm_timekeepingdetails", $data); 
	}

	function approve_timekeeping($timekeepingID, $dateapproved, $lastapprover)
	{
		if($lastapprover==1){
			$queryUpdateTK = $this->db->query('UPDATE dm_timekeeping 
									   SET userapproved=IFNULL (CONCAT(userapproved, "'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL (CONCAT(dateapproved, "'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1,timekeepingstatus=2 WHERE timekeepingID='.$timekeepingID);

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

	        $data = array('datefrom' 			=> $datefrom,
						  'dateto'	 			=> $dateto,
						  'payperiod'			=> $payperiod,
						  'timekeepingstatus'   => 0
						 );

			$this->db->insert('dm_timekeeping', $data);
		}else{
			$queryUpdateTK = $this->db->query('UPDATE dm_timekeeping 
									   SET userapproved=IFNULL (CONCAT(userapproved, "'.$this->session->userdata('employeeID').'" ), "'.$this->session->userdata('employeeID').'"),
									   	   dateapproved=IFNULL (CONCAT(dateapproved, "'.date("Y-m-d H:i:s").'" ), "'.date("Y-m-d H:i:s").'"),level=level+1 WHERE timekeepingID='.$timekeepingID);
		}

		$queryheader = $this->db->query('SELECT * FROM dm_timekeeping WHERE timekeepingID='.$timekeepingID);	 

        $queryApprover = $this->db->query('SELECT dm_approvaldet.*,dm_employee.firstname,dm_employee.lastname FROM dm_approvaldet 
   										   INNER JOIN dm_employee ON dm_employee.employeeID=dm_approvaldet.employeeID
   										   WHERE dm_approvaldet.approvalID=1 AND approvalLevel='.$queryheader->row()->level);
		
        return array('timekeeping' => $queryheader->result(), 'approver' => $queryApprover->result());
	}

	function submit_timekeeping($timekeepingID, $datesubmitted)
	{
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
	 				  'usersubmitted' => 0,
	 				  'level' => 0,
	 				  'approvalID' => 0,
	 				  'timekeepingstatus' => 0);

		$this->db->where("timekeepingID", $timekeepingID);  
        $this->db->update("dm_timekeeping", $data);   	   	
	}
}
?>

