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
								<div class="card-body">
									<div class="row mr-2 mt-2">
										<div style="width: 1%">
											<img style="width: 80px; height: 70px;" src="<?=base_url(); ?>pages/assets/img/phic.png" >
										</div>
										<div style="width: 99%">
											<p style="text-align: center; margin-bottom: 0;"><i>Republic of the Philippines</i></p>
											<h4 style="text-align: center; margin-bottom: 0;" ><strong>PHILIPPINE HEALTH INSURANCE CORPORATION</strong></h4>
											<h5 style="text-align: center;"><i>www.philhealth.gov.ph</i></h5>
										</div>
									</div>
									<div class="row mt-5">
										<div class="col">
											<div>												
												<h4 style="text-align: center; margin-bottom: 0;" ><strong>EMPLOYER'S REMITTANCE REPORT</strong></h4>

												<?php foreach ($data['company'] as $item) { ?>
												<h5 style="margin-bottom: 0;">PhilHealth Number : <strong class="mr-2" > <?php echo $item->phic; ?></strong></h5>	
												<h5 style="margin-bottom: 0;">Employer Name : <strong class="mr-2"> <?php echo $item->company; ?></strong></h5>
												<h5 style="margin-bottom: 0;">Employer Address : <strong class="mr-2"> <?php echo $item->unitno; ?> <?php echo $item->bldgname; ?> <?php echo $item->streetname; ?> <?php echo $item->subdivisionname; ?> <?php echo $item->barangay; ?> <?php echo $item->municipality; ?> <?php echo $item->province; ?></strong></h5>
												<h5 style="margin-bottom: 0;">Employer TIN : <strong class="mr-2"> <?php echo $item->tinno; ?></strong></h5>
												<h5>Employer Type : <strong class="mr-2"> Private</strong></h5>
												<?php } ?>

												<table class="table mb-0">
													<thead>
														<tr style=" ">
															<th class="philhealthreportheader" style="width: 6% ! important;"><i>No.</i></th>
															<th class="philhealthreportheader" style="width: 12% ! important;"><i>Philhealth No.</i></th>
															<th class="philhealthreportheader" style="width: 16% ! important;"><i>Surname</i></th>
															<th class="philhealthreportheader" style="width: 16% ! important;"><i>Given Name</i></th>
															<th class="philhealthreportheader" style="width: 16% ! important;"><i>Middle Name</i></th>
															<th class="philhealthreportheader" style="width: 10% ! important;"><i>PS</i></th>
															<th class="philhealthreportheader" style="width: 10% ! important;"><i>ES</i></th>
															<th class="philhealthreportheader" style="width: 20% ! important;"><i>Status/Remarks</i></th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$counter = 1;
														foreach ($data['report'] as $item) { ?>
														<tr>
															<td class="philhealthreport" style="text-align: center;"><?php echo $counter++; ?></td>
															<td class="philhealthreport" style="text-align: center;"><?php echo $item->philhealthnumber; ?></td>
															<td class="philhealthreport"><?php echo strtoupper($item->lastname); ?></td>
															<td class="philhealthreport"><?php echo strtoupper($item->firstname); ?></td>
															<td class="philhealthreport"><?php echo strtoupper($item->middlename); ?></td>
															<td class="philhealthreport" style="text-align: right;"><?=number_format($item->ps,2,".",",")?></td>
															<td class="philhealthreport" style="text-align: right;"><?=number_format($item->es,2,".",",")?></td>
															<td class="philhealthreport" style="text-align: center;">
																<?php if($item->employeestatus=="Active") 
																		   echo 'A';
																	  else echo 'I';
															    ?></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
												<div class="row mt-2">
													<div class="col">
														<div>
															<?php foreach ($data['sum'] as $item) { ?>
															<table class="table" style="margin-bottom: 0rem;">
																<tbody>
																	<tr>
																		<td class="philhealthtotal" style="width: 61%;"><strong class="float-right">Subtotal</strong></span></td>
																		<td class="philhealthtotal" style="width: 9%; text-align: right;"><?=number_format($item->totalps,2,".",",")?></td>
																		<td class="philhealthtotal" style="width: 9%; text-align: right;"><?=number_format($item->totales,2,".",",")?></td>
																		<td class="philhealthtotal" style="width: 13%; text-align: right;"></td>
																	</tr>
																</tbody>
															</table>

															<table class="table" style="margin-bottom: 0rem;">
																<tbody>
																	<tr>
																		<td class="philhealthtotal" style="width: 61%; border-top: none !important;"><strong class="float-right">GRAND TOTAL</strong></span></td>
																		<td class="philhealthtotal" style="width: 18%; border-top: none !important;"><strong class="float-right"><?=number_format($item->total,2,".",",")?></strong></td>
																		<td class="philhealthtotal" style="width: 13%; border-top: none !important;"></td>
																	</tr>
																</tbody>
															</table>
															<?php } ?>
														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
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
<script>
	$(window).on("load", function() {
		$(".loader").fadeOut();
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
	  size: landscape;
	  margin: 0;
	}
</style>

		 