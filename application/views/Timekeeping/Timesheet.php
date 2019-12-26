<?php
	$currentMonth = date('F');
	$currentYear = date('Y');
	$lastday = date('t');
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Timesheet</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Timesheet</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table table-nowrap mb-0">
						<thead>
							<tr>
								<th colspan="<?=$lastday+1;?>" style="text-align:center;">
									<?=$currentMonth.' '.$currentYear;?>
								</th>
							</tr>
							<tr>
								<th class="tsheader">Employee</th>
								<?php 
									for($i=1;$i<=$lastday;$i++){
								?>
									<th class="tsheader"><?=$i;?></th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<h2 class="table-avatar">
										<a class="avatar" href="profile.html">
											<img alt="" src="<?php echo base_url();?>pages\assets\img\profiles\avatar-09.jpg">
										</a>
										<a style="font-size: 12px;" href="profile.html">Robinjamin Gelilio
											<span style="font-size: 11px;">Web Developer</span>
										</a>
									</h2>
								</td>
								<!-- <?php 
									for($i=1;$i<$lastday;$i++){
								?>
									<td class="tsrow">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#attendance_info">
													<span class="tshours"><?=$i;?>.45</span>
												</a>
									</td>
								<?php } ?>
								<td><i class="fa fa-close text-danger"></i></td> -->

								<?php 
									$colDay = 1;

									foreach ($data as $item){
										$month = date("F",strtotime($item->checktime));
										$day = date("d",strtotime($item->checktime));
										$year = date("Y",strtotime($item->checktime));
										$day = date("G",strtotime($item->checktime));
										$minute = date("i",strtotime($item->checktime));
										$second = date("s",strtotime($item->checktime));

										echo '<td>';

										if($colDay==$day){
											echo $day.':'.$minute;
										}else{
											echo $colDay.'|'.$day;
										}

										echo '</td>';

										$colDay++;
									} ?>
							</tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
	<!-- /Page Content -->
	
	<!-- Attendance Modal -->
	<div class="modal custom-modal fade" id="attendance_info" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Attendance Info</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="card punch-status">
								<div class="card-body">
									<h5 class="card-title">Timesheet <small class="text-muted">11 Mar 2019</small></h5>
									<div class="punch-det">
										<h6>Punch In at</h6>
										<p>Wed, 11th Mar 2019 10.00 AM</p>
									</div>
									<div class="punch-info">
										<div class="punch-hours">
											<span>3.45 hrs</span>
										</div>
									</div>
									<div class="punch-det">
										<h6>Punch Out at</h6>
										<p>Wed, 20th Feb 2019 9.00 PM</p>
									</div>
									<div class="statistics">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<div class="stats-box">
													<p>Break</p>
													<h6>1.21 hrs</h6>
												</div>
											</div>
											<div class="col-md-6 col-6 text-center">
												<div class="stats-box">
													<p>Overtime</p>
													<h6>3 hrs</h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card recent-activity">
								<div class="card-body">
									<h5 class="card-title">Activity</h5>
									<ul class="res-activity-list">
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												10.00 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												11.00 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												11.15 AM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												1.30 PM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch In at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												2.00 PM.
											</p>
										</li>
										<li>
											<p class="mb-0">Punch Out at</p>
											<p class="res-activity-time">
												<i class="fa fa-clock-o"></i>
												7.30 PM.
											</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Attendance Modal -->
	
</div>
<!-- Page Wrapper -->