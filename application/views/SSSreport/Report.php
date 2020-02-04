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
											<?php foreach ($data['company'] as $item) { ?>
											<img style="width: 100px; height: 70px;" src="<?=base_url(); ?>pages/assets/img/sss_logo.png" >
										</div>
										<div style="width: 99%">
											<h5 style="text-align: center;">Republic of the Philippines</h5>
											<h4 style="text-align: center;" ><strong>SOCIAL SECURITY SYSTEM</strong></h4>
											<h3 style="text-align: center;" ><strong>ELECTRONIC CONTRIBUTION</strong></h3>
											<h3 style="text-align: center;" ><strong>COLLECTION LIST</strong></31>
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
												<table class="table table-bordered mb-0">
													<thead>
														<tr>
															<th style="width: 5%; text-align: center;"></th>
															<th style="width: 40%; text-align: center;">Name of Employee</th>
															<th style="width: 19%; text-align: center;">SS Number</th>
															<th style="width: 10%; text-align: center;">SS</th>
															<th style="width: 10%; text-align: center;">EC</th>
															<th style="width: 16%; text-align: center;">Total Contributions</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($data['report'] as $item) { ?>
														<tr>
															<td><?php echo $item->payrolldetailsID; ?></td>
															<td><?php echo $item->lastname; ?>, <?php echo $item->firstname; ?></td>
															<td style="text-align: center;"><?php echo $item->sssnumber; ?></td>
															<td style="text-align: right;"><?php echo $item->ss; ?></td>
															<td style="text-align: right;"><?php echo $item->sss_ec; ?></td>
															<td style="text-align: right;"><?php echo $item->totalcontri; ?></td>
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
												<table class="table table-bordered">
													<?php foreach ($data['sum'] as $item) { ?>
														<tr>
															<th style="width: 57%;">Sub-total</th>
															<th style="width: 9%; text-align: right;"><?php echo $item->totalss; ?></th>
															<th style="width: 9%; text-align: right;"><?php echo $item->ec; ?></th>
															<th style="width: 14%; text-align: right;"><?php echo $item->total; ?></th>
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
<script>
</script>
<style type="text/css">

	@page {
	  size: auto;
	  margin: 0;
	}
</style>

		 