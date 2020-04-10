<?php
	$tmdatefrom 	= ""; 
	$tmdateto 		= "";
	$tmdate 		= "";

	foreach ($data['timekeeping'] as $item)  {
		$tmdatefrom		= date("F d, Y",strtotime($item->datefrom));
		$tmdateto		= date("F d, Y",strtotime($item->dateto));
		$tmdate			= date("F d",strtotime($item->dateto . ' +1 day'));
	}

	$prdatefrom 	= ""; 
	$prdateto 		= "";
	$prdate 		= "";

	foreach ($data['payroll'] as $item)  {
		$prdatefrom		= date("F d, Y",strtotime($item->datefrom));
		$prdateto		= date("F d, Y",strtotime($item->dateto));
		$prdate			= date("F d",strtotime($item->dateto . ' +1 day'));
	}

?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="loader"></div>
	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
						<div class="col-md-12">
							<div class="welcome-box">
								<div class="welcome-img">
									<?php if($this->session->userdata('photo')==""){
					                      echo '<img src="'.base_url().'uploads/profileimg.png" alt=""/>';
					                    }else{
					                      echo '<img src="'.base_url().'uploads/'.$this->session->userdata('photo').'" alt=""/>';
					                    }
						            ?>
									
								</div>
								<div class="welcome-det" style="padding: 8px 0px;">
									<h4 class="mb-1">Welcome, <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?></h4>
									<p>May 20, 2019 (Monday)</p>
								</div>
							</div>
						</div>
					</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-2 d-flex mb-3">
				<a href="#" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-calendar"></i></span>
				  <p style="margin-bottom: 0px;">Timekeeping<br>(STAFF)</p>
				</a>
			</div>

			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Payrollprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-coins"></i></span>
				  	<?php foreach ($data['payroll'] as $item) { ?>
						<?php if($item->payrollstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p>Payroll Process<br>(STAFF)</p>
				</a>
			</div>

			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Timekeepingsecurityguard" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-calendar-alt"></i></span>
				  	<?php foreach ($data['timekeepingguard'] as $item) { ?>
						<?php if($item->timekeepingstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p style="margin-bottom: 0px;">Timekeeping<br>(SECURITY GUARD)</p>
				</a>
			</div>
			
			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Payrollprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-coins"></i></span>
				  	<?php foreach ($data['payroll'] as $item) { ?>
						<?php if($item->payrollstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p>Payroll Process<br>(SECURITY GUARD)</p>
				</a>
			</div>
			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Thirteenmonthprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-money-bill-alt"></i></span>
				  	<?php foreach ($data['thirteenthmonth'] as $item) { ?>
						<?php if($item->thrmonthstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p>Thirteenth Month<br>Process</p>
				</a>
			</div>
			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Billingprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="fas fa-file-invoice-dollar"></i></span>
				  	<?php foreach ($data['billing'] as $item) { ?>
						<?php if($item->billingstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p>Billing Statement<br>Process</p>
				</a>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
				<div class="card dash-widget">
					<div class="card-body">
						<div>
							<h4>Next timekeeping schedule</h4>
						</div>
						<!-- <div>
							<span class="text-success"><?php echo "Period: ".$datefrom.' - '.$dateto; ?></span>
						</div> -->
						<h3 class="mb-1 mt-1"><?php echo $tmdate; ?></h3>
						<p class="mb-0">Period : <?php echo $tmdatefrom.' - '.$tmdateto; ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
				<div class="card dash-widget">
					<div class="card-body">
						<div>
							<h4>Next payroll generation schedule<h4>
						</div>
						<!-- <div>
							<span class="text-success"><?php echo "Period: ".$datefrom.' - '.$dateto; ?></span>
						</div> -->
						<h3 class="mb-1 mt-1"><?php echo $prdate; ?></h3>
						<p class="mb-0">Period : <?php echo $prdatefrom.' - '.$prdateto; ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 d-flex" style="padding-bottom: 15px;">
				<div class="card-table flex-fill">
					<div class="table-responsive" style="height: 100%;">
						<table class="table custom-table mb-0">
							<h3 class="dash-title mb-2" style="font-size:15px !important;">RECENT EMPLOYEES</h3>
							<thead>
								<tr>
									<!-- <th style="width: 140px ! important; color: rgb(224, 77, 69)">Employee Number</th> -->
									<th style="color: rgb(224, 77, 69)">Employee Name</th>
									<th style="color: rgb(224, 77, 69); width:120px;">Hired Date</th>
									<th style="color: rgb(224, 77, 69); width:120px;">Employee Type</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['employee'] as $item) { ?>
								<tr>
									<!-- <td><?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);  ?></td> -->
									<td>
										<div class="dash-card-content">
											<a class="avatar" style="margin: 0 0px 0 0;">
												<?php if($item->photo=="") 
													echo '<img alt="" src="uploads/profileimg.png">';
												else echo '<img alt="" src="uploads/'.$item->photo.'" >';
											    ?>
											</a>
											<p style="margin-left: 10px; color: black;"><?php echo $item->lastname ?>, <?php echo $item->firstname ?>

											<span style="color:#888;display: block; font-size: 11px;">
												<?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT); ?> | <?php echo $item->designationdescription ?>
											</span>
											</p>
										</div>
									</td>
									<td><?php echo $item->hireddate ?></td>
									<td><span class="badge custom-status"><?php echo $item->employeeTypeDescription ?></span></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Employees" style="color: rgb(224, 77, 69); font-weight: 500;">VIEW ALL EMPLOYEES</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 d-flex" style="padding-bottom: 15px;">
				<div class="card-table flex-fill">
					<div class="table-responsive" style="height: 100%;">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2" style="font-size:15px !important;">UPCOMING LEAVES</h3>
							<thead>
								<tr>
									<th style="width: 140px ! important; color: rgb(224, 77, 69)">Employee Number</th>
									<th style="color: rgb(224, 77, 69)">Employee Name</th>
									<th style="color: rgb(224, 77, 69); width:220px;">Leave Details</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['leave'] as $item) { ?>
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
											<span style="color:#888;display: block; font-size: 11px;"><!-- <?php echo $item->description ?> | <?php echo $item->designationdescription ?> --></span>
											</p>
										</div>
									</td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo date("F d, Y",strtotime($item->leavefrom)) ?> - <?php echo date("F d, Y",strtotime($item->leaveto)); ?> <span style="color:#888;display: block; font-size: 11px;"> <?php echo $item->leavetypename; ?> </span>
											<span style="color:#888;display: block; font-size: 11px;"> <?php echo $item->leavetypename; ?> </span></p> 	
										</div>
										</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Employees" style="color: rgb(224, 77, 69); font-weight: 500;">VIEW ALL LEAVES</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-6 d-flex" style="padding-bottom: 15px;">
				<div class="card-table flex-fill">
					<div class="table-responsive" style="height: 100%;">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2" style="font-size:15px !important;">RECENT CLIENTS</h3>
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
											<p style="color: black;"> <?php echo $item->clientname; ?> <span style="color:#888;display: block; font-size: 11px;"> Number of post: <?php echo $item->noofpost; ?> </span></p> 	
										</div>
									</td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo $item->contactperson; ?> <span style="color:#888;display: block; font-size: 11px;"> <?php echo $item->contactno; ?> </span></p> 	
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Clients" style="color: rgb(224, 77, 69); font-weight: 500;">VIEW ALL CLIENTS</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 d-flex" style="padding-bottom: 15px;">
				<div class="card-table flex-fill">
					<div class="table-responsive" style="height: 100%;">
						<table class="table custom-table mb-0">
							<h3 class="card-title mb-2" style="font-size:15px !important;">RECENT POSTS</h3>
							<thead>
								<tr>
									<th style="color: rgb(224, 77, 69)">ID No.</th>
									<th style="color: rgb(224, 77, 69)">Post Name</th>
									<th style="color: rgb(224, 77, 69)">Client Name</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['post'] as $item) { ?>
								<tr>
									<td><?php echo $item->postID; ?></td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo $item->postname; ?> <span style="color:#888;display: block; font-size: 11px;"> Guards Assigned: <?php echo $item->noofguard; ?> </span></p> 	
										</div>
									</td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo $item->clientname; ?> <span style="color:#888;display: block; font-size: 11px;"> Location: <?php echo $item->city; ?> </span></p> 	
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Posts" style="color: rgb(224, 77, 69); font-weight: 500;">VIEW ALL POSTS</a>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>
<!-- /Page Wrapper -->

<style>
.notification{
	color:#e04d45;
	text-align: center;
	background-color: white;
    border-radius: 15px;
    border: 1px solid #e1e1e1;
    box-shadow: 0px 0px 3px 0 rgba(0,0,0,.16), 0px 0px 12px 0 rgba(0,0,0,.12);
    width:100% !important;
}

.table-responsive{
    border: 1px solid #ededed;
	box-shadow: 0px 0px 2px 0px rgba(0,0,0,.16), 0px 0px 0px 0 rgba(0,0,0,.12) !important;
}

@media only screen and (max-width: 575.98px){
	.content {
	    padding-top: 30px !important;
	}
}
</style>

<script type="text/javascript">
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});
</script>