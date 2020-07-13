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
    <div style="overflow-y: auto; height: calc(100vh - 0px); ">
    <body style="background-color: #fff; margin-top: 10px">
    	<h5 style="float: right; color: red; margin-right: 10px;"><i>*for internal use only</i></h5>
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
										<div style="width: 1%">
											<?php foreach ($data['company'] as $item) { ?>
											<img style="width: 100px; height: 70px;" src="<?=base_url(); ?>pages/assets/img/sss_logo.png" >
										</div>
										<div style="width: 99%">
											<h5 style="text-align: center;">Republic of the Philippines</h5>
											<h4 style="text-align: center;" ><strong>SOCIAL SECURITY SYSTEM</strong></h4>
											<h3 style="text-align: center;" ><strong>ELECTRONIC CONTRIBUTION</strong></h3>
											<h3 style="text-align: center;" ><strong>COLLECTION LIST</strong></h3>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col">
											<div>
												<h5 ><strong class="mr-2"><?php echo $item->sssno; ?></strong></h5>
												<h5 ><strong class="mr-2"><?php echo $item->company; ?></strong></h5>
												<?php foreach ($data['date'] as $item) { ?>
												<h5 class="mb-4"><strong class="mr-2"><?php echo date("F Y",strtotime($item->dateto)) ?></strong></h5>
												<?php } ?>
												<table class="table table-bordered table-sss custom-table mb-0">
													<thead>
														<tr style="background-color: #0c6c9f; color: #fff;">
															<th class="total" style="width: 5%; text-align: center;"></th>
															<th class="total" style="width: 28%; text-align: center;">Name of Employee</th>
															<th class="total" style="width: 11%; text-align: center;">SS Number</th>
															<th class="total" style="width: 13%; text-align: center;">SS</th>
															<th class="total" style="width: 13%; text-align: center;">EC</th>
															<th class="total" style="width: 16%; text-align: center;">Total Contributions</th>
														</tr>
													</thead>
													<tbody>
														<?php 
															$counter = 1;

															foreach ($data['report'] as $item) { 
														?>
														<tr>
															<td><?php echo $counter++; ?></td>
															<td><?php echo $item->lastname; ?>, <?php echo $item->firstname; ?> <?php echo $item->middleinitial; ?></td>
															<td style="text-align: center;"><?php echo $item->sssnumber; ?></td>
															<td style="text-align: right;"><?=number_format($item->ss,2,".",",")?></td>
															<td style="text-align: right;"><?=number_format($item->sss_ec,2,".",",")?></td>
															<td style="text-align: right;"><?=number_format($item->totalcontri,2,".",",")?></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-sm-12">
											<div>
												<table class="table table-bordered custom-table" style="margin-bottom: 0rem;">
													<?php foreach ($data['sum'] as $item) { ?>
														<tr>
															<th style="width: 44%;">Sub-total</th>
															<th style="width: 13%; text-align: right;">Php <?=number_format($item->totalss,2,".",",")?></th>
															<th style="width: 13%; text-align: right;">Php <?=number_format($item->ec,2,".",",")?></th>
															<th style="width: 16%; text-align: right;">Php <?=number_format($item->total,2,".",",")?></th>
														</tr>
													<?php } ?>
												</table>
												<table class="table table-bordered custom-table">
													<?php foreach ($data['sum'] as $item) { ?>
														<tr class="total" style="background-color: #0c6c9f; color: #fff;">
															<td class="total"><strong>Total Amount Due<span class="float-right">Php <?=number_format($item->total,2,".",",")?></span></strong></td>
														</tr>
													<?php } ?>
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
	</div>
</body>
</div>
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


	@media print{

		tr:nth-child(even) td {
		background-color: green !important;
		-webkit-print-color-adjust: exact;
		}

		.table th.total{
			background-color: #0c6c9f !important;
		}

		.table td.total{
			background-color: #0c6c9f !important;
		}


</style>

		 