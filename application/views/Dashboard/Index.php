
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
				<a href="<?php echo base_url(); ?>Timekeepingsecurityguard" class="notification">
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
				<a href="<?php echo base_url(); ?>Payrollprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fa fa-money"></i></span>
				  	<?php foreach ($data['payroll'] as $item) { ?>
						<?php if($item->payrollstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
				</a>
				<p>Payroll & Adjustment</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="<?php echo base_url(); ?>Thirteenmonthprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-money"></i></span>
				  	<?php foreach ($data['thirteenthmonth'] as $item) { ?>
						<?php if($item->thrmonthstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
				</a>
				<p>13th Month Process</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="<?php echo base_url(); ?>Retirementprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-external-link-square"></i></span>
				  	<?php foreach ($data['retirement'] as $item) { ?>
						<?php if($item->retirementstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
				</a>
				<p>Retirement Process</p>
			</div>
			<div class="col" style="text-align: center;">
				<a href="<?php echo base_url(); ?>Billingprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-bank"></i></span>
				  	<?php foreach ($data['billing'] as $item) { ?>
						<?php if($item->billingstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
				</a>
				<p>Billing Statement</p>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-7 d-flex">
				<div class="card-table flex-fill">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2">Recent Employees</h3>
							<thead>
								<tr>
									<th style="width: 140px ! important; color: rgb(224, 77, 69)">Employee Number</th>
									<th style="color: rgb(224, 77, 69)">Employee Name</th>
									<th style="color: rgb(224, 77, 69)">Employee Type</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['employee'] as $item) { ?>
								<tr>
									<td><?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);  ?></td>
									<td>
										<div class="dash-card-content">
											<a class="avatar" style="margin: 0 0px 0 0;">
												<?php if($item->photo=="") 
													echo '<img alt="" src="uploads/profileimg.png">';
												else echo '<img alt="" src="uploads/'.$item->photo.'" >';
											    ?>
											</a>
											<p style="margin-left: 10px; color: black;"><?php echo $item->lastname ?>, <?php echo $item->firstname ?>
											<span style="color:#888;display: block; font-size: 11px;"><?php echo $item->description ?> | <?php echo $item->designationdescription ?></span>
											</p>
										</div>
									</td>
									<td><?php echo $item->employeeTypeDescription ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Employees">View all employees</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5 d-flex">
				<div class="card-table flex-fill">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2">Upcoming Leaves</h3>
							<tbody>
								<?php foreach ($data['leave'] as $item) { ?>
								<tr style="margin: 20px;">
									<div class="leave-info-box">
										<div class="media align-items-center">
											<a class="avatar" style="margin: 0 0px 0 0;">
												<?php if($item->photo=="") 
													echo '<img alt="" src="uploads/profileimg.png">';
												else echo '<img alt="" src="uploads/'.$item->photo.'" >';
											    ?>
											</a>
											<div class="media-body">
												<div class="text-sm my-0 ml-2"><?php echo $item->lastname ?>, <?php echo $item->firstname ?></div>
											</div>
										</div>
										<div class="row align-items-center mt-3">
											<div class="col-6">
												<h6 class="mb-0"><?php echo date("F d, Y",strtotime($item->leavefrom)) ?> - <?php echo date("F d, Y",strtotime($item->leaveto)) ?></h6>
												<span class="text-sm text-muted"><?php echo $item->leavetypename ?></span>
											</div>
										</div>
									</div>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div class="load-more text-center" style="text-align: center; margin-top: 25px; margin-bottom: 25px;">
							<a class="text-dark" href="<?php echo base_url(); ?>Employees">Load More</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-5 d-flex">
				<div class="card-table flex-fill">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2">Recent Clients</h3>
							<thead>
								<tr>
									<th style="color: rgb(224, 77, 69)">ID No.</th>
									<th style="color: rgb(224, 77, 69)">Client Name</th>
									<th style="color: rgb(224, 77, 69)">Contact Person</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['client'] as $item) { ?>
								<tr>
									<td><?php echo $item->clientID; ?></td>
									<td>
										<div class="dash-card-content">  
											<p style="margin-left: 10px; color: black;"> <?php echo $item->clientname; ?> <span style="color:#888;display: block; font-size: 11px;"> Number of post: <?php echo $item->noofpost; ?> </span></p> 	
										</div>
									</td>
									<td><?php echo $item->contactperson; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Clients">View all clients</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7 d-flex">
				<div class="card-table flex-fill">
					<div class="table-responsive">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2">Recent Post</h3>
							<thead>
								<tr>
									<th style="color: rgb(224, 77, 69)">ID No.</th>
									<th style="color: rgb(224, 77, 69)">Post Name</th>
									<th style="color: rgb(224, 77, 69)">Location</th>
									<th style="color: rgb(224, 77, 69)">Client Name</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['post'] as $item) { ?>
								<tr>
									<td><?php echo $item->postID; ?></td>
									<td>
										<div class="dash-card-content">  
											<p style="margin-left: 10px; color: black;"> <?php echo $item->postname; ?> <span style="color:#888;display: block; font-size: 11px;"> Guards Assigned: <?php echo $item->noofguard; ?> </span></p> 	
										</div>
									</td>
									<td><?php echo $item->city; ?></td>
									<td><?php echo $item->clientname; ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Posts">View all posts</a>
						</div>
					</div>
				</div>
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