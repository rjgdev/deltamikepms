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
            <div class="mt-5">
            	<!-- <button class="btn btn-white float-right" id="printPageButton" onClick="window.print();" disabled="disabled"><i class="fa fa-print fa-lg"></i> Print</button> -->
			
				<!-- Page Content -->
                <div class="content container-fluid">
                	<div class="loader"></div>
					<div class="row">
						<div class="col-md-12">
							<div>
								<div class="card-body">
									<div class="row ml-2 mr-2 mt-2">
										<div style="width: 99%">
											<?php foreach ($data['company'] as $item) { ?>
											<img class="mx-auto d-block mb-1" style="float: center; width: 100px; height: 100px;" src="<?=base_url(); ?>pages/assets/img/logo2.png" >
											<h2 style="text-align: center; margin-bottom: 0px"><?php echo $item->company; ?></h2>
											<h6 style="text-align: center;"><?php echo $item->unitno; ?> <?php echo $item->bldgname; ?> <?php echo $item->streetname; ?> <?php echo $item->subdivisionname; ?> <?php echo $item->barangay; ?> <?php echo $item->municipality; ?> <?php echo $item->province; ?></h6>
											<h6 style="text-align: center;" ><?php echo $item->website; ?></h6>
											<h6 style="text-align: center;" ><i class="la la-phone" style="font-size: 20px;"></i> <?php echo $item->phonenumber; ?> | <i class="la la-fax" style="font-size: 20px;"></i> <?php echo $item->Fax; ?> | <i class="la la-mobile" style="font-size: 20px;"></i> <?php echo $item->mobilenumber; ?></h6>
											<?php } ?>
										</div>
									</div>
									<h4 style="text-align: center;" class="mt-5">SUMMARY OF DEDUCTIONS</h4>
									<div class="mt-5">
										<?php foreach ($data['report'] as $item) { ?>
										<h3 style="text-align: left; margin-bottom: 0"><?php echo $item->lastname; ?>, <?php echo $item->firstname; ?></h3>
										<h5 style="text-align: left; color:#888;display: block; margin-bottom: 0"><?php echo $item->description; ?> | <?php echo $item->designationdescription; ?></h5>
									</div>
									<div class="row mt-3">
										<div class="col">
											<div>
												<table class="table table-bordered table-sss custom-table mb-0  ">
													<thead class="thead-light">
														<tr>	
															<th style="text-align: center;">Pay Period</th>
															<th style="text-align: center;">SSS Contribution</th>
															<th style="text-align: center;">PhilHealth Contribution</th>
															<th style="text-align: center;">HDMF Contribution</th>
															<th style="text-align: center;">SSS Loan</th>
															<th style="text-align: center;">PAG-IBIG Loan</th>
															<th style="text-align: center;">Salary Loan</th>
															<th style="text-align: center;">Emergency Loan</th>
															<th style="text-align: center;">Training Loan</th>
															<th style="text-align: center;">Other Loan</th>
														</tr>
													</thead>	
															
													<tbody>
														<td><?php echo date("F d, Y",strtotime($item->datefrom)) ?> - <?php echo date("F d, Y",strtotime($item->dateto)) ?></td> 
														<td style="text-align: right;"><?php echo $item->sss_ee; ?></td> 
														<td style="text-align: right;"><?php echo $item->phic_ee; ?></td> 
														<td style="text-align: right;"><?php echo $item->hdmf_ee; ?></td> 
														<td style="text-align: right;"><?php echo $item->sssloan; ?></td> 
														<td style="text-align: right;"><?php echo $item->hdmfloan; ?></td> 
														<td style="text-align: right;"><?php echo $item->salaryloan; ?></td> 
														<td style="text-align: right;"><?php echo $item->emergencyloan; ?></td> 
														<td style="text-align: right;"><?php echo $item->trainingloan; ?></td> 
														<td style="text-align: right;"><?php echo $item->otherloan; ?></td> 
													</tbody>
													<tfoot>
 														<th style="color:#FF0000;" colspan="9">Total Deduction</th>
 														<th style="text-align: right; color:#FF0000;"><?php echo $item->total; ?></th>
													</tfoot>
												</table>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
				
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
	</div>
</body>
<script>
	$(document).ready(function() {
		$(window).on("load", function() {
			$(".loader").fadeOut();
		});
	});
</script>
<style type="text/css">
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

	@page {
	  size: portrait;
	  margin: 0;

}

</style>

		 