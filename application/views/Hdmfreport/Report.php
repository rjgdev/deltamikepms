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
							<div class="row">
								<div>
									<img style="width: 100px; height: 70px;  padding-left: 20px !important" src="<?=base_url(); ?>pages/assets/img/hdmf.jpg" >
								</div>
								<div>
									<h5 style="text-align: center; margin-bottom: 0; padding: 25px; margin-right: 30px;" ><strong>MEMBERSHIP SAVINGS REMITTANCE FORM (MSRF)</strong></h5>
								</div>
								<div class="float-right ml-auto mr-3" style="width: 350px; ">
									<table class="table mb-0">
										<thead>
											<tr>
												<th style="width: 6% ! important; border-width: 2px; border-color: #000; padding: 0rem !important; border-left: 2px solid; border-right: 2px solid; border-top: 2px solid !important; border-bottom: 2px solid !important; background-color: #e0e5e9">Pag-IBIG EMPLOYER'S ID NUMBER</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($data['company'] as $item) { ?>
											<tr>
												<td style="text-align: center; border-left: 2px solid; border-right: 2px solid; border-top: 2px solid !important; border-bottom: 2px solid !important;"><b><?php echo $item->pagibig; ?></b></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

								<div class="row mt-2">
									<div class="col">
										<div>
											<table class="table" style="margin-bottom: 0rem;">
												<thead>
													<tr>
														<th class="hdmfreportheader" style="border-bottom: 0px !important" colspan="10">EMPLOYER/BUSINESS NAME</th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-top: 0px !important" colspan="10"><b><?php echo strtoupper($item->company); ?></b></th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-bottom: 0px !important" colspan="10">EMPLOYER/BUSINESS ADDRESS</th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-top: 0px !important;border-right: 0px !important">Unit/Room No. Floor</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2">Building Name</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="5">Lot. No., Block No., House No.</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-top: 0px !important;border-left: 0px !important" colspan="2">Street Name</th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important"><b><?php echo strtoupper($item->unitno); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2"><b><?php echo strtoupper($item->bldgname); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="5"><b></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-left: 0px !important" colspan="2"><b><?php echo strtoupper($item->streetname); ?></b></th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-right: 0px !important">Subdivision</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2">Barangay</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2">Municipality</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="4">Province/State/Country(if abroad)</th>
														<th class="hdmfreportheader" style="border-bottom: 0px !important;border-left: 0px !important">Zip Code</th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important"><b><?php echo strtoupper($item->subdivisionname); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2"><b><?php echo strtoupper($item->barangay); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="2"><b><?php echo strtoupper($item->municipality); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;border-right: 0px !important;border-left: 0px !important" colspan="4"><b><?php echo strtoupper($item->province); ?></b></th>
														<th class="hdmfreportheader" style="border-top: 0px !important;;border-left: 0px !important"><b><?php echo strtoupper($item->zipcode); ?></b></th>
													</tr>
												<?php } ?>
													<tr>
														<th class="hdmfreportheader" rowspan="2" style="text-align: center; vertical-align: inherit; width: 15%;">PAG-IBIG MID No./<br>RTN</th>
														<th class="hdmfreportheader" colspan="3" style="text-align: center; vertical-align: inherit;">NAME OF MEMBERS</th>
														<th class="hdmfreportheader" rowspan="2" style="text-align: center; vertical-align: inherit; width: 5%;">PERIOD<br>COVERED</th>
														<th class="hdmfreportheader" rowspan="2" style="text-align: center; vertical-align: inherit; width: 5%;">MONTHLY<br>COMPENSATION</th>
														<th class="hdmfreportheader" colspan="3" style="text-align: center; vertical-align: inherit;">CONTRIBUTION</th>
														<th class="hdmfreportheader" rowspan="2" style="text-align: center; vertical-align: inherit;">REMARKS</th>
													</tr>
													<tr>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">Last Name</th>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">First Name</th>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">Middle Name</th>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">EMPLOYEE<br>SHARE</th>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">EMPLOYER<br>SHARE</th>
														<th class="hdmfreportheader" style="text-align: center; vertical-align: inherit;">TOTAL</th>
													</tr>
													<tr>
													<?php foreach ($data['report'] as $item) { ?>
														<th class="hdmfreport" style="border-left: 2px solid !important;"><?php echo $item->pagibignumber; ?></th>
														<th class="hdmfreport"><?php echo $item->lastname; ?></th>
														<th class="hdmfreport"><?php echo $item->firstname; ?></th>
														<th class="hdmfreport"><?php echo $item->middlename; ?></th>
														<th class="hdmfreport" style="text-align: center"><?php echo date("M-t",strtotime($item->dateto)) ?></th>
														<th class="hdmfreport"></th>
														<th class="hdmfreport" style="text-align: right;"><?=number_format($item->ee,2,".",",")?></th>
														<th class="hdmfreport" style="text-align: right;"><?=number_format($item->er,2,".",",")?></th>
														<th class="hdmfreport" style="text-align: right;"><?=number_format($item->total,2,".",",")?></th>
														<th class="hdmfreport" style="border-right: 2px solid !important;"></th>
													</tr>
													<?php } ?>
													<tr>
													<?php foreach ($data['sum'] as $item) { ?>
														<th class="hdmfreportheader" colspan="6">GRAND TOTAL</th>
														<th class="hdmfreportheader" style="text-align: right;"><?=number_format($item->totalee,2,".",",")?></th>
														<th class="hdmfreportheader" style="text-align: right;"><?=number_format($item->totaler,2,".",",")?></th>
														<th class="hdmfreportheader" style="text-align: right;"><?=number_format($item->totalhdmf,2,".",",")?></th>
														<th class="hdmfreportheader" style="text-align: right;"></th>
													</tr>
													<?php } ?>
												</thead>
											</table>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
            </div>
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
	  margin: 0;
	}

</style>