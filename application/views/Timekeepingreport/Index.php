<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    	<!-- <div class="loading" style="background-color: #f7f7f7; height: 100%; width: 100%; overflow: hidden; position: absolute; z-index: 1001; left: 10px !important;">
			<div class="centered">
				<div id="divSpinner" class="spinner loading" style="display: block;">
					<div class="loading-text" style="display:none;">Loading ...</div>
				</div>
			</div>
		</div> -->
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
	
					<h3 class="page-title">Timekeeping Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Timekeeping Report</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th style="width:120px; min-width:120px;">Timekeeping No.</th>
								<th style="min-width:200px;">Period</th>
								<th style="min-width:200px;">Submitted by</th>
								<th style="min-width:200px;">Approved by</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['timekeeping'] as $item) { ?>
							<tr>
								<td><?php echo "TK-".str_pad($item->timekeepingID, 6, "0", STR_PAD_LEFT); ?></td>
								<td><?php echo date("F d, Y",strtotime($item->datefrom))." - ".date("F d, Y",strtotime($item->dateto)); ?></td>
								<td>
									<div style="font-size: 12px;"><?php echo $item->employeesubmit; ?></div>
									<small class="block text-ellipsis">
										<span class="text-muted">March 16, 2020 10:36:00</span>
									</small>
								</td>
								<td>
									<div style="font-size: 12px;">Robinjamin Gelilio Dela Cruz</div>
									<small class="block text-ellipsis">
										<span class="text-muted">March 16, 2020 10:36:00</span>
									</small>
								</td>
								<td>
									<a class="btn btn-sm btn-primary generate" href="<?php echo base_url(); ?>Timekeepingreport/preview?id=<?php echo $item->timekeepingID; ?>" target="_blank">Generate Report</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
</div>
<!-- Page Wrapper -->