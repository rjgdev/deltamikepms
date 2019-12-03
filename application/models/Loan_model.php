<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loan_model extends CI_Model
{
	function __construct() 
	{ 
	 parent::__construct(); 
	}
	function get_all_loan()
	{
		$query = $this->db->query("SELECT employeeID, CONCAT(firstname,' ',middlename, ' ', lastname) AS fullname FROM  employee");
		$loandata = $this->db->query("
             SELECT 
            loanid,employeeID,fullname,loantypeid as loantype,loantypeid1,termofpaymentID,dategranted,amount,deduction,balance,enddate,termofpaymentID2
            FROM
            (
                SELECT
                srln.loanid,
                CONCAT(usrs.firstname,' ', usrs.middlename,' ', usrs.lastname) as fullname,srln.employeeID,
                case
                WHEN srln.loantypeid = 1 THEN 'Social Security System(SSS)'
                WHEN srln.loantypeid = 2 THEN 'Pag-IBIG'
                WHEN srln.loantypeid = 3 THEN 'Salary'
                WHEN srln.loantypeid = 4 THEN 'Emergency'
                ELSE NULL
                END AS loantypeid, deduction,loantypeid as loantypeid1,
                case
                WHEN srln.termofpaymentID = 1 THEN 'Monthly'
                WHEN srln.termofpaymentID = 2 THEN 'Payday'
                WHEN srln.termofpaymentID = 3 THEN 'Yearly'
                ELSE NULL
                END AS termofpaymentID,termofpaymentID as termofpaymentID2,
                srln.dategranted as dategranted,
                amount,enddate,
                srln.balance
                FROM  loan as srln 
                LEFT JOIN employee as usrs on srln.employeeID = usrs.employeeID
                ORDER BY loanid DESC
            )a
        ");
		 $dropdownemp = $query->result();	 
	     $dataloan = $loandata->result();
	     return array('dropdownemp' => $dropdownemp, 'loanrecord' => $dataloan);

	}
	function save_loan($data,$employeeID,$loantypeID,$dategranted)
	{
	$query = $this->db->query('SELECT * FROM loan WHERE employeeID ='.$employeeID.' AND loantypeID ='.$loantypeID.' AND dategranted ="'.$dategranted.'"');

	if($query->num_rows() == 0){

		$data1 = array(
		'employeeID' => $employeeID,
		'loantypeID' => $loantypeID,
		'dategranted' => $dategranted);
		$this->db->insert('loan', $data);
		return 'true|  Loan successfully created!';
	 	}
		else 
		{
			return 'false|data already exist!';
		}   
  	}
    function update_loan($data,$id,$employeeID,$dategranted)

    {
        $query = $this->db->query('SELECT * FROM loan WHERE loanID != '.$id.' AND  employeeID !='.$employeeID.' AND dategranted ="'.$dategranted.'"');
        if($query->num_rows() == 0){

        $data1 = array(
            'employeeID' => $employeeID,
            'dategranted' => $dategranted);
            $this->db->where("loanid", $id);  
            $this->db->update("loan", $data);  
            return 'true|Employee name and dategranted successfully updated!';
        }
        else 
        {
            return 'false|Employee name and dategranted date already exist!';
        }        
    }	
}	