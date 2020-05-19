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

	$cntGuard = 0;
	$cntStaff = 0;

	foreach ($data['activeguards'] as $item)  {
		$cntGuard		= $item->totalGuard;
	}

	foreach ($data['activestaff'] as $item)  {
		$cntStaff		= $item->totalStaff;
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
								<div class="welcome-img" style="display: flex; justify-content: center; align-items: center;">
									<?php if($this->session->userdata('photo')==""){
					                      echo '<img src="'.base_url().'uploads/profileimg.png" alt=""/>';
					                    }else{
					                      echo '<img src="'.base_url().'uploads/'.$this->session->userdata('photo').'" alt=""/>';
					                    }
						            ?>
									
								</div>
								<div class="welcome-det" style="padding: 8px 0px; display: flex; justify-content: center; align-items: center;">
									<h4 class="mb-1">Welcome, <?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?> <br> <p style="font-weight: 100;"><?php echo date("l, d F Y"); ?></p></h4>
									
								</div>
								
										<div class="card-body" style="padding: 8px 0px;">
											<div class="time-list mb-0" style="float: right;">
												<div class="dash-stats-list">
													<h4><?php echo $cntGuard; ?></h4>
													<p class="mb-0" style="font-size: 11px;">Active Guards</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $cntStaff; ?></h4>
													<p class="mb-0" style="font-size: 11px;">Active Staff</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $tmdate; ?></h4>
													<p class="mb-0" style="font-size: 11px;">Next Timekeeping</p>
												</div>
												<div class="dash-stats-list">
													<h4><?php echo $prdate; ?></h4>
													<p class="mb-0" style="font-size: 11px;">Next Payroll</p>
												</div>
											</div>
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
				<a href="#" class="notification">
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
				  	<?php foreach ($data['payrollguard'] as $item) { ?>
						<?php if($item->payrollstatus=="1") 
							echo '<span class="badge">1</span>';
					    ?>
					<?php } ?>
					<p>Payroll Process<br>(SECURITY GUARD)</p>
				</a>
			</div>
			<div class="col-md-2 d-flex mb-3">
				<a href="<?php echo base_url(); ?>Thirteenmonthprocess" class="notification">
				  <span class="dash-widget-icon" style="margin-right: 0px !important;"><i class="la la-money"></i></span>
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

		<div class="row mt-3">
			<div class="col-md-6 d-flex mb-3">
				<div class="card-table flex-fill" style="width: 100%;">
					<div class="table-responsive">
						<table class="table custom-table mb-0" id="dtemployees">
							<h3 class="dash-title mb-2" style="font-size:15px !important;">RECENT EMPLOYEES</h3>
							<thead>
								<tr>
									<th style="min-width:200px;">Employee Name</th>
									<th style="min-width:70px;">Hired Date</th>
									<th style="min-width:90px;">Employee Type</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['employee'] as $item) { ?>
								<tr>
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

			<div class="col-md-6 d-flex mb-3">
				<div class="card-table flex-fill" style="width: 100%;">
					<div class="table-responsive" style="height: 100%">
						<table class="table custom-table mb-0" id="dtleaves">
							<h3 class="card-title mb-2" style="font-size:15px !important;">UPCOMING LEAVES</h3>
							<thead>
								<tr>
									<th style="min-width: 240px;">Employee Name</th>
									<th style="min-width: 100px;">Duration</th>
									<th style="min-width: 100px;">Description</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(count($data['leave'])==0) { ?>
										<tr>
											<td colspan="3" id="norecord">
												<img class="isometric confirmationisometric" style="height:150px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">
												<h5>No upcoming leave!</h5>
											</td>
											<td style="display: none;">
											<td style="display: none;">
										</tr>
							    <?php } ?>

								<?php foreach ($data['leave'] as $item) { ?>
								<tr>
									<td>
										<div class="dash-card-content">
											<a class="avatar" style="margin: 0 0px 0 0;">
												<?php if($item->photo=="") 
													echo '<img alt="" src="uploads/profileimg.png">';
												else echo '<img alt="" src="uploads/'.$item->photo.'" >';
											    ?>
											</a>
											<p style="margin-left: 10px; color: black;"><?php echo $item->lastname ?>, <?php echo $item->firstname ?>
											<span style="color:#888;display: block; font-size: 11px;"><?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);  ?> | <?php echo $item->designationdescription;   ?></span>
											</p>
										</div>
									</td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo date("F d, Y",strtotime($item->leavefrom)) ?> - <?php echo date("F d, Y",strtotime($item->leaveto)); ?> <span style="color:#888;display: block; font-size: 11px;"> <?php echo $item->leavetypename; ?> </span>
											</p> 	
										</div>
									</td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;font-size: 0.7rem;">  <?php echo $item->reason; ?>
											</p> 	
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<div style="text-align: center; margin-top: 15px;">
							<a href="<?php echo base_url(); ?>Leaves" style="color: rgb(224, 77, 69); font-weight: 500;">VIEW ALL LEAVES</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 d-flex mb-3">
				<div class="card-table flex-fill" style="width: 100%;">
					<div class="table-responsive">
						<table class="table custom-table mb-0" id="dtclients">
							<h3 class="card-title mb-2" style="font-size:15px !important;">RECENT CLIENTS</h3>
							<thead>
								<tr>
									<th style="">Client Name</th>
									<th style="">Contact Person</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['client'] as $item) { ?>
								<tr>
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

			<div class="col-md-6 d-flex mb-3">
				<div class="card-table flex-fill" style="width: 100%;">
					<div class="table-responsive">
						<table class="table custom-table mb-0" id="dtposts">
							<h3 class="card-title mb-2" style="font-size:15px !important;">RECENT POSTS</h3>
							<thead>
								<tr>
									<th style="">Post Name</th>
									<th style="">Client Name</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($data['post'] as $item) { ?>
								<tr>
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

#norecord{
	height:180px;
	text-align: center;
}

div#dtemployees_wrapper .row:nth-child(2){
    overflow-y: hidden;
}

div#dtleaves_wrapper .row:nth-child(2){
    overflow-y: hidden;
}

div#dtclients_wrapper .row:nth-child(2){
    overflow-y: hidden;
}

div#dtposts_wrapper .row:nth-child(2){
    overflow-y: hidden;
}

@media only screen and (max-width: 575px){
	.welcome-box{margin: -30px -15px 0px -15px;}
}

@media only screen and (max-width: 756px){
	.table-responsive{ zoom:70%; }

	.content {
	    padding-top: 30px !important;
	}

	.card-body{
		display: none;
	}	

	.welcome-det{
		width:100%;
		justify-content: inherit !important;
	}

	.welcome-det h4{
		font-size: 1rem;
	}

	.col-md-2 {
	    -ms-flex: 0 0 16.666667%;
	    flex: 1 0 0.666667%;
	    max-width: 50.666667%;
    }

    .col-md-2 p{
	    font-size:10px !important;
    }
}

@media only screen and (max-width: 1024px){
	.time-list{
		width: 400px;
	}

	.welcome-det{
		width:100%;
		justify-content: inherit !important;
	}

	.welcome-det h4{
		font-size: 14px;
	}

	.welcome-det p{
		font-size: 11px;
	}

	.dash-stats-list{
		padding-right: 10px !important;
		padding-left: 10px !important;
	}

	.dash-stats-list h4{
		font-size: 12px !important;
	}

	.dash-stats-list p{
		font-size: 9px !important;
	}
}

@media only screen and (min-width: 757px) and (max-width: 1024px) {
	.col-md-2 {
	    -ms-flex: 0 0 16.666667%;
	    flex: 1 0 0.666667%;
	    max-width: 16.666667%;
    }

    .col-md-2 p{
	    font-size: 10px;
    }

    .dash-widget-icon{
    	font-size:30px !important;
    	width: 40px !important;
    }

    .notification{
    	padding: 15px 10px 0px !important;
    }
}
</style>

<script>
$(document).ready(function() {
	$('#dtemployees').DataTable( {"searching": false, "info": false, "paging": false });
	$('#dtleaves').DataTable( {"searching": false, "info": false, "paging": false });
	$('#dtclients').DataTable( {"searching": false, "info": false, "paging": false });
	$('#dtposts').DataTable( {"searching": false, "info": false, "paging": false });
});
</script>