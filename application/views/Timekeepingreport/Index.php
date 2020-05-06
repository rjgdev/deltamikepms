<?php
	$optionClient   = "";

	foreach($client['client'] as $item)
	{
		$optionClient.='<option value="'.$item->clientID.'">'.$item->clientname.'</option>';
	}
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    	<div class="loader"></div>
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
			<div class="col-xl-12">
				<div class="form-group row mb-0">		
					<div class="col-sm-2">
						<div class="form-group form-focus select-focus">
							<select class="form-control select2" style="width: 100%;" id="employeetype">
							<option value="All">All</option>
							<option value="1">Security Guard</option>
							<option value="2">Staff</option>
							</select>
							<label class="focus-label">Employee Type</label>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group form-focus select-focus">
							<label class="focus-label">Timekeeping Period</label>
							<select class="form-control select2" style="width: 100%;" id="timekeepingID">
								<option value="0">Select Timekeeping Period</option>
								<?php foreach ($data['timekeeping'] as $item) { ?>
									<option value="<?=$item->timekeepingID;?>"><?php echo "TK-".str_pad($item->timekeepingID, 6, "0", STR_PAD_LEFT).' ('.date("F d, Y",strtotime($item->datefrom))." - ".date("F d, Y",strtotime($item->dateto)).')'; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group form-focus select-focus">
							<label class="focus-label">Client</label>
							<select class="form-control select2" style="width: 100%;" id="searchclient">
								<option value="0">Select Client</option>
								<?=$optionClient;?>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group form-focus select-focus">
							<label class="focus-label">Post</label>
							<select class="form-control select2" style="width: 100%;" id="searchpost">
								<option value="0">Select Post</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group form-focus select-focus">
							<button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%; height: 45px;"><i class="fas fa-search"></i> SEARCH</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		 <div class="row">
            <div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped custom-table table-nowrap mb-0" id="datatable" style="width:100%;">
						<thead>
							<tr>
								<th colspan="21" style="text-align:center; color:white;background-color: #df4c44; text-transform: uppercase;">
									<?php echo "Period: MAY 01, 2020 - MAY 15, 2020" ?>
								</th>
							</tr>
							<tr>
								<th class="tsheader tsemployeeheader" style="color:#e04d45; text-align: left !important;">Employee Name </th>
								
								<?php 

									$dayWord = ["", "Mon", "Tue","Wed", "Thu", "Fri", "Sat","Sun"];
									$dayfrom = 1;
									$dayto = 15;
									$currentYear = 2020;
									$currentMonth = 04;

									for($i=$dayfrom;$i<=$dayto;$i++){
								?>
									<th class="tsheader tsdataheader" style="color:#e04d45;font-weight: 500;">
										<?php echo $i."<br>".$dayWord[date_format(date_create($currentYear."-".$currentMonth."-".$i),"N")]; ?>
									</th>
								<?php } ?>

								<th class="tsheader tslastheader" style="color:#e04d45;">Total<br>Hours</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Basic<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">OT<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Rest<br>Day</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">No. of<br>Days</th>
							</tr>
						</thead>
						<tbody id="show_data">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<!-- /Page Content -->
</div>
<!-- Page Wrapper -->

<style>
.tsHeader{
	color: white;
    background-color: #df4c44;
	text-align: center;
	min-width: 200px;
}

#norecord{
	height: 55vh;
	text-align: center;
}
</style>

<script>
$(document).ready(function() {
	$(document).on("change", "#timekeepingID", function(){
    	var timekeepingID = $(this).val();

		$("[aria-labelledby='select2-timekeepingID-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-timekeepingID-container']").removeClass('is-invalid');

    	if(timekeepingID==0){
    		$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-invalid');
		}else{
    		$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-valid');
		}
 	});

	$(document).on("change", "#searchclient", function(){
    	var clientID = $(this).val();
    	var htmlPost = "";
    	var optionEmployee = "";

		$("[aria-labelledby='select2-searchclient-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-searchclient-container']").removeClass('is-invalid');

		$("[aria-labelledby='select2-searchpost-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-searchpost-container']").removeClass('is-invalid');

    	if(clientID==0){
    		$("[aria-labelledby='select2-searchclient-container']").addClass('is-invalid');
		}else{
    		$("[aria-labelledby='select2-searchclient-container']").addClass('is-valid');
		}

    	$("#searchpost").prop("disabled", true);

    	$.ajax({
		      url : "<?php echo site_url('Timekeepingreport/loadpost');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {clientID:clientID},
		      success: function(data){	

	      		htmlPost+='<option value="0">Select Post</option>';

		      	for(i=0;i<data["post"].length;i++){
		      		htmlPost+='<option value="' + data["post"][i].postID + '">' + data["post"][i].postname + '</option>';
		      	}

		      	$("#searchpost").prop("disabled", false);
		      	$("#searchpost").html(htmlPost);
		      	if(data["post"].length!=0) $("#searchpost").focus();
	      	  },
		      error: function(request, textStatus, error) {

		      }
 	 	});
	});

	$(document).on("change", "#searchpost", function(){
    	var postID = $(this).val();

    	$("[aria-labelledby='select2-searchpost-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-searchpost-container']").removeClass('is-invalid');

    	if(postID==0){
    		$("[aria-labelledby='select2-searchpost-container']").addClass('is-invalid');
		}else{
    		$("[aria-labelledby='select2-searchpost-container']").addClass('is-valid');
		}
 	});

 	$(document).on("click", "#submit", function(){
    	var timekeepingID	= $("#timekeepingID").val();
		var clientID		= $("#searchclient").val();
		var postID			= $("#searchpost").val();
		var error = 0;

		$("[aria-labelledby='select2-timekeepingID-container']").removeClass('is-invalid');
		$("[aria-labelledby='select2-searchclient-container']").removeClass('is-invalid');
		$("[aria-labelledby='select2-searchpost-container']").removeClass('is-invalid');

		$("[aria-labelledby='select2-timekeepingID-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-searchclient-container']").removeClass('is-valid');
		$("[aria-labelledby='select2-searchpost-container']").removeClass('is-valid');

		if(timekeepingID==0){
			$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-invalid');
			$("#timekeepingID").focus();
			error=1;
		}else{
			$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-valid');
		}

		if(clientID==0){
			$("[aria-labelledby='select2-searchclient-container']").addClass('is-invalid');
			if(error==0){
				$("#searchclient").focus();
				error=1;
			}
		}else{
			$("[aria-labelledby='select2-searchclient-container']").addClass('is-valid');
		}

		if(postID==0){
			$("[aria-labelledby='select2-searchpost-container']").addClass('is-invalid');
			if(error==0){
				$("#searchpost").focus();
				error=1;
			}
		}else{
			$("[aria-labelledby='select2-searchpost-container']").addClass('is-valid');
		}

		if(error==0){
			$.ajax({
			      url : "<?php echo site_url('Timekeepingreport/viewreport');?>",
			      method : "POST",
			      async : true,
			      dataType : 'json',
			      data: {timekeepingID:timekeepingID,
			      		 clientID:clientID,
			      		 postID:postID},
			      success: function(data){	
			      	var htmlDisplay = "";

			      	for(i=0;i<data["report"].length;i++){
			      		htmlDisplay+='<tr>' + 
			      					'<td>' + data["report"][i].employeeID + '</td>' + 
			      				  '</tr>';
			      	}

			      	console.table(data["report"]);

			      	var index = data["report"].map(function(o) { return o.datesched; }).indexOf("2020-04-06");

			      	console.log(index);

			      	$("#show_data").html(htmlDisplay);
		      	  },
			      error: function(request, textStatus, error) {

			      }
	 	 	});
		}
	});	
});
</script>