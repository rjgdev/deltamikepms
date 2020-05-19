<?php 

   class Payrollpaymentsystemreport extends CI_Controller {  
     	public function __construct() {
			//load database in autoload libraries 
			parent::__construct(); 
			$this->load->model('Payrollpaymentsystemreport_model');  
	  		$this->payrollpayment = new Payrollpaymentsystemreport_model; 
	  		$this->load->library('Excel');    
		}
	public function index() 
		{ 
	  		$data = array('title' => 'Payroll Payment System Report');

	  		$data['data']=$this->payrollpayment->get_payrollpayment();

			$this->load->view('Template/Header',$data);

			if(isAllowed(22)) $this->load->view("Payrollpaymentsystemreport/Index",$data);
						 else $this->load->view("Denied/Index");

			$this->load->view('Template/Footer',$data);
		} 

		public function search_payrollpayment()
		{
				
			$searchpayperiod = $this->input->post('searchpayperiod');
			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');
			/*$searchdetachment = $this->input->post('searchdetachment');*/
			$data = $this->payrollpayment->search($searchpayperiod,$searchemployeetype,$searchclient);
			

			//$download	= $this->employee_download($data);
			echo json_encode($data); 
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format

      
		}
		public function employee_download($download)

  {
  		print_r($download);

  	// create file name
        $fileName = 'data-'.time().'.xls';  
		// load excel library
        $this->load->library('excel');
       
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Employee Code');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Employee Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Branch Code');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Payroll Acct. No.');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Amount');       
        // set Row
        
        $rowCount = 2;
        	/*$searchpayperiod = $this->input->post('searchpayperiod');

			$searchemployeetype = $this->input->post('searchemployeetype');
			$searchclient = $this->input->post('searchclient');*/
			/*$searchdetachment = $this->input->post('searchdetachment');*/
			//$data = $this->payrollpayment->search($searchpayperiod,$searchemployeetype,$searchclient);
			echo "<pre>";
		    print_r($data);
		    echo "</pre>";
        foreach ($download as $list) {

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->employeeID);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->employeename);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->branchcode);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->backaccountnumber);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->netpay);
            $rowCount++;
        }
       	header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/octet-stream");
	  	header('Content-Disposition: attachment;filename="Employee Data.xls"');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
		$objWriter->save('php://output'); 
		exit;

    }
  		/*$this->load->library("excel");
	 	 $object = new PHPExcel();

	  $object->setActiveSheetIndex(0);

	  $table_columns = array("Name", "Address", "Gender", "Designation", "Age");

	  $column = 0;

	  foreach($table_columns as $field)
	  {
	   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	   $column++;
  	}
  	$excel_row = 2;

  	$object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="Employee Data.xls"');
  $object_writer->save('php://output');*/
 

	}			