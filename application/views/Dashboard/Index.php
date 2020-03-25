
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="loader"></div>
	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Welcome <?php echo $this->session->userdata('firstname'); ?>!</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item active">Dashboard</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-dashboard"></i></span>
				</a>
				<p>Timekeeping (Staff)</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="<?php echo base_url(); ?>Dashboard" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-dashboard"></i></span>
				  	<?php foreach ($data['timekeepingguard'] as $item) { ?>
						<?php if($item->timekeepingstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
				</a>
				<p style="font-size: 11px;">Timekeeping (Security Guard)</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fa fa-money"></i></span>
				  <span class="badge">1</span>
				</a>
				<p>Payroll Process</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fa fa-money"></i></span>
				  <span class="badge">1</span>
				</a>
				<p>Payroll Adjustment</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-money"></i></span>
				  <span class="badge">1</span>
				</a>
				<p>13th Month Process</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-external-link-square"></i></span>
				  <span class="badge">1</span>
				</a>
				<p>Retirement Process</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-bank"></i></span>
				  <span class="badge">1</span>
				</a>
				<p>Billing Statement</p>
			</div>
		</div>

		<!-- <div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['employee'] as $item) { ?><?php echo $item->noofemployee; ?><?php } ?></h3>
							<span>Employee</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['actemployee'] as $item) { ?><?php echo $item->actemployee; ?><?php } ?></h3>
							<span>Active Employee</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['inactemployee'] as $item) { ?><?php echo $item->inactemployee; ?><?php } ?></h3>
							<span>Inactive Employee</span>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	
		<!-- <div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><img class="mb-2" src="<?=base_url(); ?>pages/assets/fonts/user-tie-solid.svg" style="height: 28px; width: 38px; color: #e04d45;"></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['client'] as $item) { ?><?php echo $item->noofclient; ?><?php } ?></h3>
							<span>Client</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><img class="mb-2" src="<?=base_url(); ?>pages/assets/fonts/user-tie-solid.svg" style="height: 28px; width: 38px; color: #e04d45;"></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['actclient'] as $item) { ?><?php echo $item->actclient; ?><?php } ?></h3>
							<span>Active Client</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
				<div class="card dash-widget">
					<div class="card-body">
						<span class="dash-widget-icon"><img class="mb-2" src="<?=base_url(); ?>pages/assets/fonts/user-tie-solid.svg" style="height: 28px; width: 38px; color: #e04d45;"></span>
						<div class="dash-widget-info">
							<h3><?php foreach ($data['inactclient'] as $item) { ?><?php echo $item->inactclient; ?><?php } ?></h3>
							<span>Inactive Client</span>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<!-- <div class="row">
			<div class="col-md-12 d-flex">
				<div class="card card-table flex-fill">
					<div class="card-header">
						<h3 class="card-title mb-0">Active Detachment Post</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table custom-table mb-0">
								<thead>
									<tr>
										<th>Post Name</th>
										<th>Location</th>
										<th>Client Name</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($data['detachment'] as $item) { ?>    
										<tr>
											<td><?php echo $item->postname; ?></td>
											<td><?php echo $item->detachcity; ?></td>
											<td><?php echo $item->clientname; ?></td>
										</tr>
									<?php } ?>
									
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="<?php echo base_url(); ?>detachments" style="color: #e04d45;">View all detachment</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- /Page Content -->

</div>
<!-- /Page Wrapper -->

<script type="text/javascript">
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});
</script>