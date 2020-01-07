<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Process</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- PROCESS -->
		<div class="row filter-row">
   		   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-5 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" id="fromcutoff" type="text">
					</div>
					<label class="focus-label">From</label>
				</div>
			</div>
		   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-5 col-12">  
				<div class="form-group form-focus">
					<div class="cal-icon">
						<input class="form-control floating datetimepicker" id="tocutoff" type="text">
					</div>
					<label class="focus-label">To</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
				<button type="button" class="btn btn-info btn-block processpayroll"> Process Payroll </button>
			</div>     
        </div>
		<!-- /PROCESS -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th style="width: 110px ! important;">Employee No.</th>
								<th>Employee Name</th>
								<th>Regular Hours</th>
								<th>Overtime Hours</th>
								<th>Basic Pay</th>
							</tr>
						</thead>
						<tbody>
							<!-- <tr>
								<td>
									<h2 class="table-avatar">
										<a href="profile.html" class="avatar"><img alt="" src="<?php echo base_url();?>pages\assets\img\profiles\avatar-02.jpg"></a>
										<a href="profile.html">John Doe <span>Web Designer</span></a>
									</h2>
								</td>
								<td>FT-0001</td>
								<td><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e68c898e88828983a6839e878b968a83c885898b">[email&#160;protected]</a></td>
								<td>1 Jan 2013</td>
								<td>
									<div class="dropdown">
										<a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Web Designer </a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#">Software Engineer</a>
											<a class="dropdown-item" href="#">Software Tester</a>
											<a class="dropdown-item" href="#">Frontend Developer</a>
											<a class="dropdown-item" href="#">UI/UX Developer</a>
										</div>
									</div>
								</td>
								<td>$59698</td>
								<td><a class="btn btn-sm btn-primary" href="salary-view.html">Generate Slip</a></td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<script  type="text/javascript">  
$(document).ready(function() {
	$('.processpayroll').unbind('click').bind('click', function(){
		var fromcutoff = $("#fromcutoff").val();
		var tocutoff = $("#tocutoff").val();

		$.ajax({
            url : "<?php echo site_url('payroll/process');?>",
            method : "POST",
            data : {fromcutoff: fromcutoff,
            		tocutoff: tocutoff},
            async : true,
            dataType : 'json',
            success: function(data){
            	console.log(data);
        	},
            error: function(request, textStatus, error) {

        	}
        });
        return false;
	});
}); 		 
</script>