<!DOCTYPE html>
<html lang="en">
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					<div class="loader"></div>
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">PHIC Premium Payment</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">PHIC Premium Payment</li>
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
											<th style="width: 150px ! important;">Monthly Report</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data['philhealthreport'] as $item) { ?>
										<tr>
											<td><?php echo date("F Y",strtotime($item->dateto)) ?></td>							
											<td><a class="btn btn-sm btn-primary float-right generate" href="<?php echo base_url(); ?>Philhealthreport/preview?month=<?php echo $item->month; ?>&year=<?php echo $item->year; ?>" target="_blank">Generate Report</a></td>
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
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
    </body>
</html>