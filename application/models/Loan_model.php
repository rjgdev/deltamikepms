<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_loan()
	{

		$query = $this->db->query("SELECT employeeID, CONCAT('00000','',employeeID, ' - ',lastname,', ',firstname, ' ', middlename) AS fullname FROM  dm_employee WHERE employeestatus = 'Active'");
		$loandata = $this->db->query("
             SELECT 
            loanid,employeeID,photo,fullname,department,designationdescription,loantypeid as loantype,loantypeid1,termofpaymentID,dategranted,amount,deduction,balance,enddate,termofpaymentID2,paid,lnothers
            FROM
            (
                SELECT
                srln.loanid,usrs.photo,d.description as department,dsg.designationdescription,
                CONCAT(usrs.lastname,', ', usrs.firstname,' ', usrs.middlename) as fullname,srln.employeeID,
                case
                WHEN srln.loantypeid = 1 THEN 'Social Security System(SSS)'
                WHEN srln.loantypeid = 2 THEN 'Pag-IBIG'
                WHEN srln.loantypeid = 3 THEN 'Salary'
                WHEN srln.loantypeid = 4 THEN 'Emergency'
                WHEN srln.loantypeid = 5 THEN 'Trainings'
                WHEN srln.loantypeid = 6 THEN 'Others'
                ELSE NULL
                END AS loantypeid, deduction,loantypeid as loantypeid1,
                case
                WHEN srln.termofpaymentID = 1 THEN 'Monthly'
                WHEN srln.termofpaymentID = 2 THEN 'Payday'
                ELSE NULL
                END AS termofpaymentID,termofpaymentID as termofpaymentID2,
                srln.dategranted as dategranted,
                amount,enddate,paid,lnothers,
                srln.balance
                FROM dm_loan as srln 
                LEFT JOIN dm_employee as usrs ON srln.employeeID = usrs.employeeID
                LEFT JOIN dm_department as d ON usrs.departmentID = d.departmentID
                LEFT JOIN dm_designation as dsg ON usrs.designationID = dsg.designationID
                ORDER BY loanid DESC
            )a;
        ");
         
		 $dropdownemp = $query->result();	 
	     $dataloan = $loandata->result();
	     return array('dropdownemp' => $dropdownemp, 'loanrecord' => $dataloan);

	}
	function save_loan($data,$employeeID,$loantypeID,$dategranted)
	{
	$query = $this->db->query('SELECT * FROM dm_loan WHERE employeeID ='.$employeeID.' AND loantypeID ='.$loantypeID.' AND dategranted ="'.$dategranted.'"');

	if($query->num_rows() == 0){

		$data1 = array(
		'employeeID' => $employeeID,
		'loantypeID' => $loantypeID,
		'dategranted' => $dategranted);
		$this->db->insert('dm_loan', $data);
		return 'true|  Loan successfully created!';
	 	}
		else 
		{
			return 'false|data already exist!';
		}   
  	}
    function update_loan($data,$id,$employeeID,$dategranted)

    {
        $query = $this->db->query('SELECT * FROM dm_loan WHERE loanID != '.$id.'');
        if($query->num_rows() == 0){
         return 'false|Employee name and dategranted date already exist!';
        }
        else 
        {
            $data1 = array(
            'employeeID' => $employeeID,
            'dategranted' => $dategranted);
            $this->db->where("loanid", $id);  
            $this->db->update("dm_loan", $data);  
            return 'true|Employee name and dategranted successfully updated!';
           
        }        
    }
    function get_loan_data_model($id)
    {
    $query = $this->db->query("SELECT ld.loandeductionID, ld.loanID,
                             concat(emp.firstname,' ',emp.middlename,' ',emp.lastname) as fullname,
                                    date_format(ld.datedection,'%M% %d%,%Y') AS datedection, amount,loantypeID
                             FROM  dm_loandeduction AS ld
                             LEFT JOIN dm_employee as emp ON ld.employeeID = emp.employeeID WHERE loanID = ".$id." GROUP BY loanID ORDER BY loanID");
    return $query->result();
    //print_r($query->result());
    //exit;
    

    }

}	