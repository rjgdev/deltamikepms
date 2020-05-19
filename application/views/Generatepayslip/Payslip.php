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
        <link rel="stylesheet" href="<?php echo base_url();?>pages\assets\css\all.min.css">
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
    <body style="background-color: #fff;">
        	<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<!-- Page Wrapper -->
            <div class="mt-2">
            	<!-- <button class="btn btn-white float-right" id="printPageButton" onClick="window.print();" disabled="disabled"><i class="fa fa-print fa-lg"></i> Print</button> -->
			
				<!-- Page Content -->
                <div class="content container-fluid">
                	<div class="loader"></div>
					<div class="row">
						<div class="col-md-12">
							<div >
								<div class="card-body">
									<div class="row ml-2 mr-2 mt-2">
										<div style="width: 1%">
											<?php foreach ($data['payslip'] as $item) { ?>
											
										</div>
										<div style="width: 99%;text-align:center;">
											<img src="<?=base_url(); ?>pages/assets/img/logo2.png" class="mb-2">
											<h5 class="mb-0" style="text-align: center;"><strong>DELTAMIKE SECURITY, INC.</strong></h5>
											<h5 class="mb-0" style="text-align: center;">PAYSLIP</h5>
											<h5 class="mb-0" style="text-align: center;" ><strong><?php echo $item->clientname; ?></strong></h5>
										</div>
									</div>
									<div class="row mt-4">
										<div class="col-sm-6 pr-0">
											<table class="table">
												<tbody>
													<tr>
														<td style="width: 90px;"><strong>Employee:</strong></td>
														<td><?php echo $item->lastname; ?>, <?php echo $item->firstname; ?></td>
													</tr>
													<tr>
														<td style="width: 90px;">
															<strong>Pay Period:</strong>
														</td>
														<td><?php echo date("F d, Y",strtotime($item->datefrom)); ?> - <?php echo date("F d, Y",strtotime($item->dateto)); ?>
															
														</td>
													</tr>
												</tbody>
											</table>

											<table class="table mb-1">
												<tbody>
													<tr>
														<td style="border-bottom: 1px solid black; background-color: #e8e8e8;"><strong class="text-danger">EARNINGS</strong></td>
													</tr>
													<tr>
														<td><strong>Basic/Regular Rate</strong> <span class="float-right">₱ <?=number_format($item->basicpay,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Allowance</strong> <span class="float-right">₱ <?=number_format($item->allwnce,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>5 Days Incentive</strong> <span class="float-right">₱ <?=number_format($item->inctv,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Night Differential</strong> <span class="float-right">₱ <?=number_format($item->nightdiff,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Overtime</strong> <span class="float-right">₱ <?=number_format($item->overtime,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Adjustment</strong> <span class="float-right">₱ <?=number_format($item->adjustment,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>OIC Allowance</strong> <span class="float-right">₱ 0.0000</span></td>
													</tr>

													<tr><td style="padding-top: .99rem;">&nbsp;</td></tr>
													<tr><td>&nbsp;</td></tr>
													<tr><td>&nbsp;</td></tr>
													<tr><td>&nbsp;</td></tr>
													<tr><td>&nbsp;</td></tr>
													<tr><td>&nbsp;</td></tr>
													<tr>
														<td style="border-top:1px solid black; background-color: #e8e8e8;"><strong class="text-danger">TOTAL EARNINGS</strong> <span class="float-right"><strong>₱ <?=number_format($item->earnings,4,".",",")?></strong></span></td>	
													</tr>												
												</tbody>
											</table>
										</div>
										<div class="col-sm-6 pl-0">
											<table class="table">
												<tbody>
													<tr>
														<td style="width: 100px;"><strong>Days of work:</strong></td>
														<td><?php echo $item->daysofwork; ?></td>
													</tr>
													<tr>
														<td style="width: 100px;">
															<strong>Daily Rate:</strong>
														</td>
														<td>
															₱ <?=number_format($item->drate,4,".",",")?>
														</td>
													</tr>
												</tbody>
											</table>

											<table class="table mb-1">
												<tbody>
													<tr>
														<td style="border-bottom: 1px solid black; background-color: #e8e8e8;"><strong class="text-danger">DEDUCTIONS</strong></td>
													</tr>
													<tr>
														<td><strong>Leave without Pay</strong> <span class="float-right">₱ <?=number_format($item->absent,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Late</strong> <span class="float-right">₱ <?=number_format($item->lt,4,".",",")?></span></td>
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
														<td class="text-danger" style="text-align: center; padding-top: 15px;"><hr style="margin:0;">
															<strong style="top:-10px; position:relative; background-color: white; padding: 0 10px;">LOAN DETAILS</strong>
														</td>
													</tr>
													<tr>
														<td><strong>Social Security System (SSS) Loan</strong> <b class="text-danger"><?=$item->sssDesc;?></b> <span class="float-right">₱ <?=number_format($item->sssloan,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Pag-IBIG Loan</strong> <b class="text-danger"><?=$item->hdmfDesc;?></b> <span class="float-right">₱ <?=number_format($item->hdmfloan,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Salary Loan</strong> <b class="text-danger"><?=$item->salaryDesc;?></b> <span class="float-right">₱ <?=number_format($item->salaryloan,4,".",",")?></span></td>
													</tr>

													<tr>
														<td><strong>Emergency Loan</strong> <b class="text-danger"><?=$item->emergencyDesc;?></b> <span class="float-right">₱ <?=number_format($item->emergencyloan,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Training Loan</strong> <b class="text-danger"><?=$item->trainingDesc;?></b> <span class="float-right">₱ <?=number_format($item->trainingloan,4,".",",")?></span></td>
													</tr>
													<tr>
														<td><strong>Other Loan: <?=$item->otherLoanDesc;?></strong> <b class="text-danger"><?=$item->otherDesc;?></b> <span class="float-right">₱ <?=number_format($item->otherloan,4,".",",")?></span></td>
													</tr>
													<tr>
														<td style="border-top:1px solid black; background-color: #e8e8e8;"><strong class="text-danger">TOTAL DEDUCTIONS</strong> <span class="float-right"><strong>₱ <?=number_format($item->deductions,4,".",",")?></strong></span></td>	
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									
									<div class="row">
										<?php 
											if($item->payslipstatus!="1") {
												echo '<div class="col-sm-5">';
											}else{
												echo '<div class="col-sm-6">';
											}

										?>
												<div class="form-group form-check">
													<?php 
													    if($item->payslipstatus=="1"){
													    	echo '<input class="form-check-input" type="checkbox" value="1" id="check" checked disabled="disabled">';
													    }else{
													    	echo '<input class="form-check-input" type="checkbox" value="1" id="check">';
													    }

													    echo '<label class="form-check-label mt-1" for="invalidCheck">
																	I acknowledge to have received from DELTAMIKE SECURITY INC the amount stated in the net pay and have no futher claims for services rendered.
																</label>';
													?> 
													<input class="form-control restrictspecchar" type="hidden" id="payrolldetailsID" value="<?php echo $item->pdID; ?>">
													<input class="form-control restrictspecchar" type="hidden" id="employeeID" value="<?php echo $item->empID; ?>">

												</div>
											</div>

										<?php 
											if($item->payslipstatus!="1") {
										?>
											<div class="col-sm-1">
												<?php 
													echo '<button class="btn btn-primary float-right submit" disabled="disabled" id="accept" name="accept" type="submit">Submit form</button>';
												?> 
											</div>
										<?php } ?>
										<div class="col-sm-6 pl-0">
											<table class="table">
												<tbody>
													<tr>
														<td style="font-size: 15px;
																   background-color: #ceffd3 !important;">
														   <strong>NET PAY</strong> <span class="float-right"><strong>₱ <?=number_format($item->netpay,4,".",",")?></strong></span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

<style>
.loader{
  position: absolute;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100vh;
  z-index: 1001;
  background: url('<?php echo base_url();?>pages/assets/img/Loading.svg') 
              50% 50% no-repeat rgb(249,249,249);
}

.table td{
	border-top: none;
    padding: .1rem .5rem;
}

.table{
	 border: solid 1px black;
	 border-radius: 20px !important;
}

</style>

<script>
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});

	$(document).ready(function() {
		$('.submit').unbind('click').bind('click', function(){
			var payslipstatus = $('#check').val();
			var payrolldetailsID = $('#payrolldetailsID').val();
			var employeeID = $('#employeeID').val();

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

	    .main-wrapper{
		    -webkit-print-color-adjust: exact;		
		}
	}

	@page {
	  size: auto;
	  margin: 0;
	}
</style>

		 