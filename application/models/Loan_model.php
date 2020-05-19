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
            loanid,employeeID,photo,fullname,department,designationdescription,loantypeid as loantype,loantypeid1,termofpaymentID,dategranted,amount,deduction,balance,enddate,termofpaymentID2,paid,lnothers,concat(loantypeid,' - ',termofpaymentID) as loanday,isProcess
            FROM
            (
                SELECT
                srln.loanid,usrs.photo,d.description as department,dsg.designationdescription,
                CONCAT(usrs.lastname,', ', usrs.firstname,' ', usrs.middlename) as fullname,srln.employeeID,
                case
                WHEN srln.loantypeid = 1 THEN 'Social Security System Loan'
                WHEN srln.loantypeid = 2 THEN 'PAG-IBIG Loan'
                WHEN srln.loantypeid = 3 THEN 'Salary Loan'
                WHEN srln.loantypeid = 4 THEN 'Emergency Loan'
                WHEN srln.loantypeid = 5 THEN 'Trainings'
                WHEN srln.loantypeid = 6 THEN 'Others'
                ELSE NULL
                END AS loantypeid, deduction,loantypeid as loantypeid1,
                case
                WHEN srln.termofpaymentID = 1 THEN 'Payday'
                WHEN srln.termofpaymentID = 2 THEN 'Monthly'
                ELSE NULL
                END AS termofpaymentID,termofpaymentID as termofpaymentID2,
                srln.dategranted as dategranted,
                amount,enddate,paid,lnothers,
                srln.balance,
                srln.isProcess
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
	function save_loan($data,$employeeID,$loantypeID,$dategranted,$enddate,$deduction,$termofpaymentID)
	{
        $query = $this->db->query('SELECT * FROM dm_loan WHERE employeeID ='.$employeeID.' AND loantypeID ='.$loantypeID.' AND paid=0');

        if($query->num_rows() == 0){
            $this->db->insert('dm_loan', $data);
            $last_id = $this->db->insert_id();

            $start = date_create_from_format("Y-m-d",date("Y-m-d",strtotime($dategranted)));
            $end   = date_create_from_format("Y-m-d",date("Y-m-d",strtotime($enddate)));

            $months = '';
            $years  = '';
            $count  = 0;

            while ($start <= $end) {
                $month = $start->format("m");
                $year  = $start->format("Y");

                 if($termofpaymentID==1){
                    if($start->format("d")<=15){
                        $day = 15;
                        $addDay = $start->format("t") - 15;
                    }else{
                        $day = $start->format("t");

                        if($start->format("d")==$start->format("t")){
                            $addDay = 15;
                        }else{
                            $addDay = 16;
                        }
                    }
                    
                    $timespan = date_interval_create_from_date_string($addDay." day");
                }else{
                    if($start->format("d")<=15){
                        $day = 15;
                    }else{
                        $day = $start->format("t");
                    }
                    
                    $tempStart = date("Y-m-d", strtotime("+1 month", strtotime($start->format('Y-m-d'))));

                    if($tempStart>$end->format('Y-m-d')){
                        $addDay = $start->format("t") - 15;
                        $timespan = date_interval_create_from_date_string($addDay." day");
                    }else{
                        $timespan = date_interval_create_from_date_string("1 month");
                    }
                }

                $record[$count] = array ('loanID'        =>  $last_id,
                                         'datededuction' =>  $year.'-'.$month.'-'.$day,
                                         'amount'        =>  floatval(str_replace(',', '',($deduction))));    

                $start = $start->add($timespan);
                $count++;
            }

            $this->db->insert_batch('dm_loandeduction',$record);
            return 'true|Loan successfully created!';
        	}
        else 
        {
        	return 'false|data already exist!';
        }   
  	}
    function update_loan($data,$loanID,$employeeID,$dategranted,$loantypeID,$enddate,$deduction,$termofpaymentID)

    {
        $query = $this->db->query('SELECT * FROM dm_loan WHERE employeeID ='.$employeeID.' AND loantypeID ='.$loantypeID.' AND paid=0 AND loanID != '.$loanID);

        if($query->num_rows() != 0){
            return 'false|Loan already exist.';
        }
        else 
        {
            $this->db->where("loanid", $loanID);  
            $this->db->update("dm_loan", $data);  

            $this->db->query("DELETE FROM dm_loandeduction WHERE loanID=".$loanID);

            $start = date_create_from_format("Y-m-d",date("Y-m-d",strtotime($dategranted)));
            $end   = date_create_from_format("Y-m-d",date("Y-m-d",strtotime($enddate)));

            $months = '';
            $years  = '';
            $count  = 0;

            while ($start <= $end) {
                $month = $start->format("m");
                $year  = $start->format("Y");

                 if($termofpaymentID==1){
                    if($start->format("d")<=15){
                        $day = 15;
                        $addDay = $start->format("t") - 15;
                    }else{
                        $day = $start->format("t");
                        
                        if($start->format("d")==$start->format("t")){
                            $addDay = 15;
                        }else{
                            $addDay = 16;
                        }
                    }
                    
                    $timespan = date_interval_create_from_date_string($addDay." day");
                }else{
                    if($start->format("d")<=15){
                        $day = 15;
                    }else{
                        $day = $start->format("t");
                    }
                    
                    $tempStart = date("Y-m-d", strtotime("+1 month", strtotime($start->format('Y-m-d'))));

                    if($tempStart>$end->format('Y-m-d')){
                        $addDay = $start->format("t") - 15;
                        $timespan = date_interval_create_from_date_string($addDay." day");
                    }else{
                        $timespan = date_interval_create_from_date_string("1 month");
                    }
                }

                $record[$count] = array ('loanID'        =>  $loanID,
                                         'datededuction' =>  $year.'-'.$month.'-'.$day,
                                         'amount'        =>  floatval(str_replace(',', '',($deduction))));    

                $start = $start->add($timespan);
                $count++;
            }

            $this->db->insert_batch('dm_loandeduction',$record);
            return 'true|<b>LN-'.str_pad($loanID, 6, '0', STR_PAD_LEFT).'</b> successfully updated.';
        }        
    }

    function get_amortization($loanID)
    {
        $query = $this->db->query("SELECT date_format(datededuction,'%b% %d%, %Y') AS datededuction, FORMAT(amount,4) AS loanamount, loanstatus FROM dm_loandeduction
                                   WHERE loanID=$loanID");

        return $query->result();
    }

    function delete_loan($loanID)
    {
        $this->db->query("DELETE FROM dm_loan WHERE loanID=".$loanID);
        $this->db->query("DELETE FROM dm_loandeduction WHERE loanID=".$loanID);
    }

}	