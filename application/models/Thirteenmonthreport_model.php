<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thirteenmonthreport_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_Thirteenmonthreport()

	{
		$querydatecutoff = $this->db->query("SELECT  thrmonthID,
												date_format(datefrom,'%Y%-%m') as datefrom, date_format(dateto,'%Y%-%m') as dateto,
												concat(date_format(MIN(datefrom),'%Y%-%m'),' , ',date_format(MAX(dateto),'%Y%-%m')) AS formatdateid,
											concat(date_format(MIN(datefrom),'%M%, %Y'),' - ',date_format(MAX(dateto),'%M%, %Y')) AS formatdate
											FROM dm_thrmonth  WHERE thrmonthstatus = 2 GROUP BY dateto");
		$queryclient = $this->db->query('SELECT * FROM dm_client');
		$queryemployee = $this->db->query("SELECT e.employeeID, md5(e.employeeID)as encryptID, concat(lastname,', ',firstname,' ',middlename) as fullname
										  ,CASE
										  WHEN e.employeetypeID = 1 THEN 'Security Guard'
										  WHEN e.employeetypeID = 2 THEN 'Staff'
								          ELSE employeeID
									      END AS employeetype, c.description, d.postname, date_format(e.hireddate,'%M% %d%, %Y') as hireddate
										FROM dm_employee as e 
										LEFT JOIN dm_client as c ON e.clientID = c.clientID
										LEFT JOIN dm_post as d ON e.postid = d.postid");
		$dataclient = $queryclient->result();
		$datacutoff = $querydatecutoff->result();
		$dateemployee = $queryemployee->result();
	     return array('client' => $dataclient, 'employee' => $dateemployee, 'cutoff' => $datacutoff);
		 //return $query->result();
	}
	function get_clientdata($client)
	{
		if($client ==0){
			$clientID = "";
		}else{
			$clientID = "WHERE clientID = $client";
		}
		$query = $this->db->query(" SELECT * FROM dm_post $clientID");
		 return $query->result();
	}
	function get_recorddata($id)
	{
		$query = $this->db->query("SELECT e.employeeID, md5(e.employeeID)as encryptID, concat(lastname,', ',firstname,' ',middlename) as fullname
										  ,CASE
										  WHEN e.employeetypeID = 1 THEN 'Security Guard'
										  WHEN e.employeetypeID = 2 THEN 'Staff'
								          ELSE employeeID
									      END AS employeetype, c.description, d.postname, date_format(e.hireddate,'%M% %d%, %Y') as hireddate
										FROM dm_employee as e 
										LEFT JOIN dm_client as c ON e.clientID = c.clientID
										LEFT JOIN dm_post as d ON e.postID = d.postID WHERE e.employeeID ='$id'");
		$querycompany = $this->db->query("SELECT *,SUBSTRING(address,1,43) as firstletter,
											SUBSTRING(address,44,86) as firstletter1
											 FROM dm_company");
		$queryemployeename = $this->db->query("SELECT employeeID, concat(e.firstname,' ',e.middlename, ' ',e.lastname) AS employeename,
										d.designationdescription,hireddate FROM dm_employee as e 
										LEFT JOIN dm_post as d ON e.postID = d.postID
										WHERE e.employeeID = $id");
		$datarecord = $query->result();
		$datacompany = $querycompany->result();
		$dataemployee = $queryemployeename->result();
				 return array('datarecord' => $querycompany, 'company' => $datacompany,'employee' => $dataemployee);
	}

	function searchrecord($thrmonthID, $searchemployeetype,$searchclient,$searchdetachment)

	{
	if($searchemployeetype == 0) {
		$cond = " ";
	}else{
    	$cond =  "AND e.employeetypeID = $searchemployeetype";
    }
     if($searchclient == 0) {
		$client = " ";
	}else{
    	$client = "AND e.cLientID = $searchclient";
    }
    if($searchdetachment == 0) {
		$detachment = " ";
	}else{
    	$detachment = "AND e.postID =  $searchdetachment";
    }

  	$querythrmonth = $this->db->query("SELECT  thrmonthID,
									date_format(datefrom,'%Y%-%m') as datefrom, date_format(dateto,'%Y%-%m') as dateto,
									concat(date_format(MIN(datefrom),'%Y%-%m'),' , ',date_format(MAX(dateto),'%Y%-%m')) AS formatdateid,
									concat(date_format(MIN(datefrom),'%M%, %Y'),' - ',date_format(MAX(dateto),'%M%, %Y')) AS formatdate
									FROM dm_thrmonth WHERE thrmonthID ='$thrmonthID'");
  	$query = $this->db->query("				
			SELECT
			*,'".$querythrmonth->row()->datefrom."' AS datefrom, '".$querythrmonth->row()->dateto."' AS dateto
			FROM
			(
				SELECT 
				e.employeeID,
				concat(lastname,', ',firstname,' ',middlename) as employeename
				,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,date_format(min(pd.datefrom),'%Y%m') as seachdatefrom,
                date_format(max(pd.datefrom),'%Y%m') as seachdateto,
				CASE
				WHEN e.employeetypeID = 1 THEN 'Security Guard'
				WHEN e.employeetypeID = 2 THEN 'Staff'
				ELSE employeetypeID
				END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
				concat(date_format(min(pd.datefrom),'%M% %d%,%Y'),' - ',date_format(max(pd.dateto),'%M% %d%,%Y')) as thrthmonthdate,sum(late) as late, sum(absent) as absent,
				SUM(thrmonth)  AS thrmonth
				FROM dm_payrolldetails AS pd
				LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
				LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
				LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
				LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
				LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
				LEFT JOIN dm_client AS c ON e.clientID = c.clientID
			    WHERE date_format(pd.datefrom,'%Y%-%m') >= '".$querythrmonth->row()->datefrom."' AND date_format(pd.dateto,'%Y%-%m') <= '".$querythrmonth->row()->dateto."'  $cond   $client  $detachment
			    GROUP BY e.employeeID
			)a");
		return $query->result();
	}
	function get_recorddatamonth($id,$from,$to)
	{
		

		$queryresult = $this->db->query("				
			SELECT 
				e.employeeID,month(pd.datefrom) as datemonth,date_format(e.hireddate,'%M% %d,%Y') AS hireddate,pd.daysofabsent,
				concat(lastname,', ',firstname,' ',middlename) as employeename,date_format(min(pd.datefrom),'%Y%m') as seachdatefrom,
                date_format(max(pd.datefrom),'%Y%m') as seachdateto
				,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,
				CASE
				WHEN e.employeetypeID = 1 THEN 'Security Guard'
				WHEN e.employeetypeID = 2 THEN 'Staff'
				ELSE employeetypeID
				END AS employeetype,c.clientname,dtc.postname AS detachment,
				concat(date_format(min(pd.datefrom),'%M% %d%, %Y'),' - ',date_format(max(pd.dateto),'%M% %d%, %Y')) as datepayrol,sum(late) as late, sum(absent) as absent,
				SUM(thrmonth) AS thrmonth
				FROM dm_payrolldetails AS pd
				LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
				LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
				LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
				LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
				LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
				LEFT JOIN dm_client AS c ON e.clientID = c.clientID
                WHERE date_format(pd.datefrom,'%Y%-%m') >= '$from' AND date_format(pd.dateto,'%Y%-%m') <= '$to' and e.employeeid ='$id'
                group by e.employeeid,datemonth 
			");
		//print_r($this->db->last_query());  
	//exit;

		$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address,'$from' as datefrom, '$to' dateto FROM dm_company");
		/*$querythrmonth = $this->db->query("SELECT concat(date_format(datefrom,'%M%, %Y'),' - ',date_format(dateto,'%M%, %Y')) as thrmonthrangr FROM dm_thrmonth WHERE ");*/
		$dataresult = $queryresult->result();
		$datacompany = $querycompany->result();
	     return array('record' => $dataresult, 'company' => $datacompany);
			//return $query->result();
	}
	function searchsummaryrecord($monthID, $employeetype, $client, $post)
	{
	if($employeetype == 0) {
		$cond = " ";
	}else{
    	$cond =  "AND e.employeetypeID = $employeetype";
    }
     if($client == 0) {
		$clientdata = " ";
	}else{
    	$clientdata = "AND e.cLientID = $searchclient";
    }
    if($post == 0) {
		$detachment = " ";
	}else{
    	$detachment = "AND e.postID =  $searchdetachment";
    }

  	$querythrmonth = $this->db->query("SELECT  thrmonthID,
									date_format(datefrom,'%Y%-%m') as datefrom, date_format(dateto,'%Y%-%m') as dateto,
									concat(date_format(MIN(datefrom),'%Y%-%m'),' , ',date_format(MAX(dateto),'%Y%-%m')) AS formatdateid,
									concat(date_format(MIN(datefrom),'%M%, %Y'),' - ',date_format(MAX(dateto),'%M%, %Y')) AS formatdate
									FROM dm_thrmonth WHERE thrmonthID ='$monthID'");
  	$query = $this->db->query("				
			SELECT
			*,'".$querythrmonth->row()->datefrom."' AS datefrom, '".$querythrmonth->row()->dateto."' AS dateto
			FROM
			(
				SELECT 
				e.employeeID,
				concat(lastname,', ',firstname,' ',middlename) as employeename
				,d.description AS department,ds.designationdescription as designation,date_format(pd.datefrom,'%m% - %Y') AS date1,date_format(min(pd.datefrom),'%Y%m') as seachdatefrom,
                date_format(max(pd.datefrom),'%Y%m') as seachdateto,
				CASE
				WHEN e.employeetypeID = 1 THEN 'Security Guard'
				WHEN e.employeetypeID = 2 THEN 'Staff'
				ELSE employeetypeID
				END AS employeetype,COALESCE(c.clientname,'') as clientname,COALESCE(dtc.postname,'') AS detachment,
				concat(date_format(min(pd.datefrom),'%M% %d%,%Y'),' - ',date_format(max(pd.dateto),'%M% %d%,%Y')) as thrthmonthdate,sum(late) as late, sum(absent) as absent,
				SUM(thrmonth)  AS thrmonth
				FROM dm_payrolldetails AS pd
				LEFT JOIN dm_payroll AS p ON pd.payrollID = p.payrollID
				LEFT JOIN dm_employee AS e ON pd.employeeID = e.employeeID
				LEFT JOIN dm_department AS d ON e.departmentID = d.departmentID
				LEFT JOIN dm_designation AS ds ON e.designationID = ds.designationID
				LEFT JOIN dm_post AS dtc ON e.postID = dtc.postID
				LEFT JOIN dm_client AS c ON e.clientID = c.clientID
			    WHERE date_format(pd.datefrom,'%Y%-%m') >= '".$querythrmonth->row()->datefrom."' AND date_format(pd.dateto,'%Y%-%m') <= '".$querythrmonth->row()->dateto."'  $cond   $clientdata  $detachment
			    GROUP BY e.employeeID
			)a");
  			$querycompany = $this->db->query("SELECT *,concat(unitno,' ',bldgname,' ',streetname,' ',subdivisionname,' ',barangay,', ',municipality,' ',province) AS address FROM dm_company");
		$datarecord = $query->result();
		$datacompany = $querycompany->result();
	     return array('record' => $datarecord, 'company' => $datacompany);
	}
}	
