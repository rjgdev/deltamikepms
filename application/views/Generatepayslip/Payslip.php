<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Deltamike - Payroll Management System">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="BlackCoders Group Inc.">
        <meta name="robots" content="noindex, nofollow">
        <title><?php echo $title; ?> | Deltamike PMS</title>
		
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>pages\assets\img\favicon.png">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\line-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\select2.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\jquery.toast.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\bootstrap-tagsinput\bootstrap-tagsinput.css">
		<link rel="stylesheet" href="<?php echo base_url();?>pages\assets\plugins\morris\morris.css">
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\style.css">

        <script src="<?php echo base_url();?>pages\assets\js\jquery-3.2.1.min.js"></script>	
        <script src="<?php echo base_url(); ?>pages\assets\js\jquery.toast.min.js"></script>
  		<script src="<?php echo base_url(); ?>pages\assets\js\toast.js"></script>	
    </head>
    <body>
        	<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<!-- Page Wrapper -->
            <div class="mt-5">
            	<!-- <button class="btn btn-white float-right" id="printPageButton" onClick="window.print();" disabled="disabled"><i class="fa fa-print fa-lg"></i> Print</button> -->
			
				<!-- Page Content -->
                <div class="content container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row ml-2 mr-2 mt-2">
										<div style="width: 1%">
											<?php foreach ($data['payslip'] as $item) { ?>
											<img src="<?=base_url(); ?>pages/assets/img/logo2.png" >
										</div>
										<div style="width: 99%">
											<h5 style="text-align: center;"><strong>DELTAMIKE SECURITY, INC.</strong></h5>
											<h5 style="text-align: center;">PAYSLIP</h5>
											<h5 style="text-align: center;" ><strong><?php echo $item->clientname; ?></strong></h5>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col-sm-6">
											
											<div>
												<h5 class="m-b-10"><strong class="mr-2">Employee:</strong><?php echo $item->firstname; ?> <?php echo $item->lastname; ?></h5>
												<h5 class="m-b-10"><strong class="mr-2">Pay Period:</strong><?php echo date("F d, Y",strtotime($item->datefrom)); ?> - <?php echo date("F d, Y",strtotime($item->dateto)); ?></h5>
												<h5 class="m-b-10"><strong class="text-danger">Earnings</strong></h5>
												<table class="table table-bordered">
													<tbody>
														
														<tr>
															<td><strong>Basic/Regular Rate</strong> <span class="float-right">₱ <?=number_format($item->basicpay,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Allowance</strong> <span class="float-right">₱ 0</span></td>
														</tr>
														<tr>
															<td><strong>5 Days Incentive</strong> <span class="float-right">₱ <?=number_format($item->incentive,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Night Differential</strong> <span class="float-right">₱ <?=number_format($item->nightdiff,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Holiday Pay</strong> <span class="float-right">₱ <?=number_format($item->holidaypay,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Regular Overtime</strong> <span class="float-right">₱ <?=number_format($item->ordinaryot,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>OIC Allowance</strong> <span class="float-right">₱ 0</span></td>
														</tr>
																												
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-sm-6">
												<div>
												<h5 class="m-b-10"><strong class="mr-2">Days of work:</strong><span><?php echo $item->daysofwork; ?></span></h5>
												<h5 class="m-b-10"><strong class="mr-2">Daily Rate:</strong>₱ <?=number_format($item->drate,4,".",",")?></h5>
											<h5 class="m-b-10 float-left" style="text-align: right;"><strong class="text-danger">Deductions</strong></h5>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong>Leave without Pay</strong> <span class="float-right">₱ <?=number_format($item->absent,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Late</strong> <span class="float-right">₱ <?=number_format($item->late,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Withholding Tax</strong> <span class="float-right">₱ <?=number_format($item->wtax,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Social Security System (SSS)</strong> <span class="float-right">₱ <?=number_format($item->sss_ee,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>PhilHealth (PHIC)</strong> <span class="float-right">₱ <?=number_format($item->phic_ee,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Pag-IBIG (HDMF)</strong> <span class="float-right">₱ <?=number_format($item->hdmf_ee,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Social Security System (SSS) Loan</strong> <span class="float-right">₱ <?=number_format($item->loan,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Pag-IBIG Loan</strong> <span class="float-right">₱ <?=number_format($item->loan,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Salary Loan</strong> <span class="float-right">₱ <?=number_format($item->loan,4,".",",")?></span></td>
														</tr>
														<tr>
															<td><strong>Emergency Loan</strong> <span class="float-right">₱ <?=number_format($item->loan,4,".",",")?></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-sm-4">
											<div>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong class="text-danger">Total Earnings</strong> <span class="float-right"><strong>₱ <?=number_format($item->earnings,4,".",",")?></strong></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-sm-4">
											<div>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong class="text-danger">Total Deductions</strong> <span class="float-right"><strong>₱ <?=number_format($item->deductions,4,".",",")?></strong></span></td>
														</tr>												
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-sm-4">
											<div>
												<table class="table table-bordered">
													<tbody>
														<tr>
															<td><strong class="text-danger">Net Pay</strong> <span class="float-right"><strong>₱ <?=number_format($item->netpay,4,".",",")?></strong></span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-sm-12 mt-3 ml-3">
											<?php 
											    if($item->payslipstatus=="1"){
											    	echo '<input class="form-check-input" type="checkbox" value="1" id="check" checked>';
											    }else if($item->employeetypeID=="2"){
											    	echo '';
												}else{
											   		echo '<input class="form-check-input" type="checkbox" value="1" id="check">';
											} ?> 
											<?php
												if($item->employeetypeID=="1"){
													echo '<label class="form-check-label mt-1" for="invalidCheck">
															I acknowledge to have received from DELTAMIKE SECURITY INC the amount stated in the net pay and have no futher claims for services rendered.
														</label>';
												}else{
													echo "";
											} ?> 
											<input class="form-control restrictspecchar" type="hidden" id="payrolldetailsID" value="<?php echo $item->pdID; ?>">
											<input class="form-control restrictspecchar" type="hidden" id="employeeID" value="<?php echo $item->empID; ?>">
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php 
								if($item->employeetypeID=="1") {
									echo '<button class="btn btn-primary float-right submit" disabled="disabled" id="accept" name="accept" type="submit">Submit form</button>';
							} ?> 
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
<script>
	

	$(document).ready(function() {

		$('.submit').unbind('click').bind('click', function(){
			var payslipstatus = $('#check').val().trim();
			var payrolldetailsID = $('#payrolldetailsID').val().trim();
			var employeeID = $('#employeeID').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('generatepayslip/save');?>",
	                method : "POST",
	                data : {payslipstatus:payslipstatus,
	                		payrolldetailsID:payrolldetailsID,
	                		employeeID:employeeID
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
        					window.location.replace('<?php echo base_url(); ?>generatepayslip');
            			},
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

     var checker = document.getElementById('check');
	 var sendbtn = document.getElementById('accept');
	 var printbtn = document.getElementById('printPageButton');
	 // when unchecked or checked, run the function
	 
	checker.onchange = function(){
	if(this.checked){
	    sendbtn.disabled = false;
	} else {
	    sendbtn.disabled = true;
	} 
	}
});
	
</script>
<style type="text/css">
	@media print {
	    #printPageButton, #accept {
	        display :  none;
	    }
	}

	@page {
	  size: auto;
	  margin: 0;
	}
</style>

		 