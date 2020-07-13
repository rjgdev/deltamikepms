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
								<option value="0">All</option>
								<?=$optionClient;?>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group form-focus select-focus">
							<label class="focus-label">Post</label>
							<select class="form-control select2" style="width: 100%;" id="searchpost">
								<option value="0">All</option>
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
						<thead id="show_header">
							
						</thead>
						<tbody id="show_details">
							<tr>
								<td id="norecord" style="height: 55vh;">
									<img class="isometric confirmationisometric" style="height:120px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notimekeeping.svg">
									<h4>Timekeeping Report</h4> 
									<p>Click <b><u>Search</u></b> to generate report.</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<!-- /Page Content -->
</div>
<!-- Page Wrapper -->

<!-- Attendance Modal -->
<div class="modal custom-modal fade" id="attendance_info" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Attendance Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card" style="border-style: none !important;  margin-bottom:0px;">
							<div class="card-body" style="padding: .25rem !important;">
								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Timekeeping <small class="text-muted" style="font-size: 70% !important;" id="attendance_date"></small></h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td class="text-center" colspan="2" style="color: #ffffff; background-color: #e04d45; font-weight: 500;" id="attendance_day"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time In:</td>
											<td class="text-right" id="attendance_timein"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time Out:</td>
											<td class="text-right" id="attendance_timeout"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Regular Hours:</td>
											<td class="text-right" id="attendance_hours"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Overtime:</td>
											<td class="text-right" id="attendance_overtime"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Night Differential:</td>
											<td class="text-right" id="attendance_night"></td>
										</tr>
									</tbody>
								</table>

								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Client details</h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td style="color:#e04d45;">Client Name:</td>
											<td class="text-right" id="attendance_client"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Post Name:</td>
											<td class="text-right" id="attendance_post"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Shift:</td>
											<td class="text-right" id="attendance_shift"></td>
										</tr>
									</tbody>
								</table>

								<div class="validate_details" style="display:none;">
									<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px; color:#ff5200c7;">Validation details</h4>
									<table class="table table-striped table-border">
										<tbody>
											<tr>
												<td style="color:#e04d45;">Validated by:</td>
												<td class="text-right" id="validateuser"></td>
											</tr>
											<tr>
												<td style="color:#e04d45;">Validated date:</td>
												<td class="text-right" id="validatedate"></td>
											</tr>
											<tr>
												<td style="color:#e04d45;">Remarks</td>
												<td class="text-right" id="validateremarks"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Attendance Modal -->

<!-- Schedule Modal -->
<div class="modal custom-modal fade" id="schedule_info" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Attendance Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card" style="border-style: none !important;  margin-bottom:0px;">
							<div class="card-body" style="padding: .25rem !important;">
								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Timekeeping <small class="text-muted" style="font-size: 70% !important;" id="schedule_date"></small></h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td class="text-center" colspan="2" style="color: #ffffff; background-color: #e04d45; font-weight: 500;" id="schedule_day">NO SCHEDULE</td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time In:</td>
											<td class="text-right" id="schedule_timein"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time Out:</td>
											<td class="text-right" id="schedule_timeout"></td>
										</tr>
									</tbody>
								</table>

								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Client details</h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td style="color:#e04d45;">Client Name:</td>
											<td class="text-right" id="schedule_client"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Post Name:</td>
											<td class="text-right" id="schedule_post"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Schedule Modal -->

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

.tsemployeeheader{
	width:100px;
}

.tsdataheader{
	
}

.tslastheader{
	width:40px;
}
</style>

<script>
$(document).ready(function() {
	$(document).on("click", ".attendance_info", function(){
		var timesheetID = $(this).attr('id');
		
    	$.ajax({
		      url : "<?php echo site_url('timekeepingsecurityguard/getattendance');?>",
		      method : "POST",
		      data : {timesheetID:timesheetID},
		      async : true,
		      dataType : 'json',
		      success: function(data){

             	const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
             	const day = ["Sun", "Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

             	var validate_user = data[0]["validateusername"];
             	var validate_remarks = data[0]["remarks"];

             	var validatedate = new Date(data[0]["validatedate"]);
             	var validate_date = day[validatedate.getDay()] + ", " + months[validatedate.getMonth()] + " " + 
	             					validatedate.getDate().toString().padStart(2,"0") + ", " + 
	             					validatedate.getFullYear() + " <b>" +
	             					validatedate.getHours().toString().padStart(2,"0") + ":" +
	             					validatedate.getMinutes().toString().padStart(2,"0") + ":" +
	             					validatedate.getSeconds().toString().padStart(2,"0") + "</b>";

             	var sched 	= new Date(data[0]["datesched"]);
             	var daytype = data[0]["rateDescription"];
             	var datesched = day[sched.getDay()] + ", " + months[sched.getMonth()] + " " + 
             					sched.getDate().toString().padStart(2,"0") + ", " + 
             					sched.getFullYear();

				var timein = new Date(data[0]["t_timein"]);
             	var datetimein = day[timein.getDay()] + ", " + months[timein.getMonth()] + " " + 
             					timein.getDate().toString().padStart(2,"0") + ", " + 
             					timein.getFullYear() + " <b>" +
             					timein.getHours().toString().padStart(2,"0") + ":" +
             					timein.getMinutes().toString().padStart(2,"0") + ":" +
             					timein.getSeconds().toString().padStart(2,"0") + "</b>";

				var timeout = new Date(data[0]["t_timeout"]);
             	var datetimeout = day[timein.getDay()] + ", " + months[timeout.getMonth()] + " " + 
             					timeout.getDate().toString().padStart(2,"0") + ", " + 
             					timeout.getFullYear() + " <b>" +
             					timeout.getHours().toString().padStart(2,"0") + ":" +
             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
             					timeout.getSeconds().toString().padStart(2,"0") + "</b>";

				/******************** REGULAR HOURS ***************************/
				var strHrs = "";
				var strMin = "";

				var actual_regular_hours = data[0]["actual_regular_hours"].split(':');

					 if(actual_regular_hours[0]>1) strHrs = parseInt(actual_regular_hours[0]) + " hours";
				else if(actual_regular_hours[0]==1) strHrs = parseInt(actual_regular_hours[0]) + " hour";

				if(actual_regular_hours[1]>0){
						 if(actual_regular_hours[1]>1) strMin = " and " + parseInt(actual_regular_hours[1]) + " minutes";
					else if(actual_regular_hours[1]==1) strMin = " and " + parseInt(actual_regular_hours[1]) + " minute";
				}
				
				var regularHours = "---";
				if(strHrs+strMin!="") regularHours = strHrs + strMin;
				
				/******************** OVERTIME HOURS ***************************/
				var strHrs_ot = "";
				var strMin_ot = "";

				var actual_ot_hours = data[0]["actual_ot_hours"].split(':');

					 if(actual_ot_hours[0]>1)  strHrs_ot = parseInt(actual_ot_hours[0]) + " hours";
				else if(actual_ot_hours[0]==1) strHrs_ot = parseInt(actual_ot_hours[0]) + " hour";

				if(actual_ot_hours[1]>0){
					if(actual_ot_hours[1]>1) strMin_ot = " and " + parseInt(actual_ot_hours[1]) + " minutes";
					else if(actual_ot_hours[1]==1) strMin_ot = " and " + parseInt(actual_ot_hours[1]) + " minute";
				}

				var overtimeHours = "---";
				if(strHrs_ot+strMin_ot!="") overtimeHours = strHrs_ot + strMin_ot;

				/******************** NIGHT DIFFERENTIAL HOURS ***************************/
				var strHrs_night = "";
				var strMin_night = "";

				var actual_night_hours = data[0]["actual_nightdiff_hours"].split(':');

					 if(actual_night_hours[0]>1)  strHrs_night = parseInt(actual_night_hours[0]) + " hours";
				else if(actual_night_hours[0]==1) strHrs_night = parseInt(actual_night_hours[0]) + " hour";

				if(actual_night_hours[1]>0){
					if(actual_night_hours[1]>1) strMin_night = " and " + parseInt(actual_night_hours[1]) + " minutes";
					else if(actual_night_hours[1]==1) strMin_night = " and " + parseInt(actual_night_hours[1]) + " minute";
				}

				var nightDiffirential = "---";
				if(strHrs_night+strMin_night!="") nightDiffirential = strHrs_night + strMin_night;
				
				$("#attendance_client").html(data[0]["clientname"]);
				$("#attendance_post").html(data[0]["postname"]);
				$("#attendance_shift").html(data[0]["post_timein"] + " - " + data[0]["post_timeout"]);

				$("#attendance_date").html(datesched);
				$("#attendance_day").html(daytype);
				$("#attendance_timein").html(datetimein);
				$("#attendance_timeout").html(datetimeout);
				$("#attendance_hours").html(regularHours);
				$("#attendance_overtime").html(overtimeHours);
				$("#attendance_night").html(nightDiffirential);

				if(validate_user!="" && validate_user!=null){
					$(".validate_details").css('display','block');
					$("#validateuser").html(validate_user);
					$("#validatedate").html(validate_date);
					$("#validateremarks").html(validate_remarks);
				}else{
					$(".validate_details").css('display','none');
					$("#validateuser").html("");
					$("#validatedate").html("");
					$("#validateremarks").html("");
				}

/*
				$("#attendance_hours").html(months[m] + " " + d + ", " + y);
				$("#attendance_overtime").html(months[m] + " " + d + ", " + y);
				$("#attendance_client").html(months[m] + " " + d + ", " + y);
				$("#attendance_post").html(months[m] + " " + d + ", " + y);*/
             },
             error: function(request, textStatus, error) {

        	 } 
        });
        return false; 
	}); 

	$(document).on("click", ".schedule_info", function(){
		var timesheetID = $(this).attr('timeshtid');
		$(".validate").attr("timeshtid",timesheetID);

    	$.ajax({
		      url : "<?php echo site_url('timekeepingsecurityguard/getattendance');?>",
		      method : "POST",
		      data : {timesheetID:timesheetID},
		      async : true,
		      dataType : 'json',
		      success: function(data){

             	const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
             	const day = ["Sun", "Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

             	var sched 	= new Date(data[0]["datesched"]);

             	var datesched = day[sched.getDay()] + ", " + months[sched.getMonth()] + " " + 
             					sched.getDate().toString().padStart(2,"0") + ", " + 
             					sched.getFullYear();

				var timein = new Date(data[0]["t_timein"]);
             	var datetimein = day[timein.getDay()] + ", " + months[timein.getMonth()] + " " + 
             					timein.getDate().toString().padStart(2,"0") + ", " + 
             					timein.getFullYear() + " <b>" +
             					timein.getHours().toString().padStart(2,"0") + ":" +
             					timein.getMinutes().toString().padStart(2,"0") + ":" +
             					timein.getSeconds().toString().padStart(2,"0") + "</b>";

				var timeout = new Date(data[0]["t_timeout"]);
             	var datetimeout = day[timein.getDay()] + ", " + months[timeout.getMonth()] + " " + 
             					timeout.getDate().toString().padStart(2,"0") + ", " + 
             					timeout.getFullYear() + " <b>" +
             					timeout.getHours().toString().padStart(2,"0") + ":" +
             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
             					timeout.getSeconds().toString().padStart(2,"0") + "</b>";

				$("#schedule_client").html(data[0]["clientname"]);
				$("#schedule_post").html(data[0]["postname"]);

				$("#schedule_date").html(datesched);
				$("#schedule_timein").html(datetimein);
				$("#schedule_timeout").html(datetimeout);
/*
				$("#attendance_hours").html(months[m] + " " + d + ", " + y);
				$("#attendance_overtime").html(months[m] + " " + d + ", " + y);
				$("#attendance_client").html(months[m] + " " + d + ", " + y);
				$("#attendance_post").html(months[m] + " " + d + ", " + y);*/
             },
             error: function(request, textStatus, error) {

        	 } 
        });
        return false; 
	}); 

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

	      		htmlPost+='<option value="0">All</option>';

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

		$("[aria-labelledby='select2-employeetype-container']").addClass('is-valid');

		if(timekeepingID==0){
			$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-invalid');
			$("#timekeepingID").focus();
			error=1;
		}else{
			$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-valid');

			$("[aria-labelledby='select2-timekeepingID-container']").addClass('is-valid');

		}

		/*if(clientID==0){
			$("[aria-labelledby='select2-searchclient-container']").addClass('is-invalid');
			if(error==0){
				$("#searchclient").focus();
				error=1;
			}
		}else{

		}

		if(postID==0){
			$("[aria-labelledby='select2-searchpost-container']").addClass('is-invalid');
			if(error==0){
				$("#searchpost").focus();
				error=1;
			}
		}else{

		}*/

		$("[aria-labelledby='select2-searchclient-container']").addClass('is-valid');
		$("[aria-labelledby='select2-searchpost-container']").addClass('is-valid');


		/*var timekeepingID	= 1;
		var clientID		= 1;
		var postID			= 1;
		var error			= 0;*/

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
			      	var htmlHeader 	= "";
			      	var htmlDetails = "";
			      	var employeeID 	= "";
			      	var removeArray = [];
			      	var isExists 	= 0;
			      	var columnCount = 0;

			      	if(data["header"].length!=0){
			      		var datefromDay 	= new Date(data["header"][0].datefrom).getDate();
						var datefromMonth 	= new Date(data["header"][0].datefrom).getMonth() + 1;
						var datefromYear 	= new Date(data["header"][0].datefrom).getFullYear();

						var datetoDay 	= new Date(data["header"][0].dateto).getDate();
						var datetoMonth = new Date(data["header"][0].dateto).getMonth() + 1;
						var datetoYear 	= new Date(data["header"][0].dateto).getFullYear();

						const months = ["","January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
						const dayWord = ["Sun","Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

						var colspan = (datetoDay - datefromDay) + 7;

			      		htmlHeader +='<tr>' + 
										'<th colspan="' + colspan + '"  style="text-align:center; color:white;background-color: #df4c44; text-transform: uppercase;">' + 
											'Period: ' + months[datefromMonth] + ' ' + datefromDay.toString().padStart(2,"0") + ', ' + datefromYear + ' - ' +
														 months[datetoMonth] + ' ' + datetoDay.toString().padStart(2,"0") + ', ' + datetoYear +
										'</th>';

						htmlHeader += '</tr><tr>' +
										'<th class="tsheader tsemployeeheader" style="color:#e04d45; width:300px !important; text-align: left !important;">Employee Name </th>';

						

						for(i=datefromDay;i<=datetoDay;i++){
							var day = new Date(datefromYear + '-' + datefromMonth + '-' + i).getDay();
							
							htmlHeader += '<th class="tsheader tsdataheader" style="color:#e04d45;font-weight: 500; width:20px !important;">' + i + '<br>' + dayWord[day] + '</th>';

							columnCount++;
						}

						htmlHeader += '<th class="tsheader tslastheader" style="color:#e04d45;">Total<br>Hours</th>' +
									  '<th class="tsheader tslastheader" style="color:#e04d45;">Basic<br>(Hour)</th>' +
									  '<th class="tsheader tslastheader" style="color:#e04d45;">OT<br>(Hour)</th>' +
									  '<th class="tsheader tslastheader" style="color:#e04d45;">Rest<br style="mso-data-placement:same-cell;">Day</th>' +
									  '<th class="tsheader tslastheader" style="color:#e04d45;">No. of<br>Days</th>';
						htmlHeader += '</tr>';

						var imgName  = "";
							isExists = 0;

						for(i=0;i<data["details"].length;i++){
							if(data["details"][i].photo=="") imgName = "profileimg.png";
							else imgName = data["details"][i].photo;

							htmlDetails += '<tr id="' + data["details"][i].employeeID + '">' + 
			      								'<td>' + 
			      									'<h2 class="table-avatar">' + 
				      									'<div class="avatar">' +
																'<img alt="" src="uploads/' + imgName + '">' + 
														'</div>' +
														'<div style="font-size: 12px;">' + data["details"][i].fullname + 
															'<span style="font-size: 11px;">' + data["details"][i].employeeID.padStart(6,'0') + '</span>' + 
														'</div>' + 
													'</h2>' + 
												'</td>';

							var timesheetID = "";
							var value = "";
							var time  = "";
							var color = "";
							var regular  = 0;
							var overtime = 0;
							var counter  = 0;

							var total_hours 		= 0;
							var total_minutes 		= 0;
							var total_accumHours 	= 0;
							var total_accumMinutes 	= 0;

							var basic_hours 		= 0;
							var basic_minutes 		= 0;
							var basic_accumHours 	= 0;
							var basic_accumMinutes 	= 0;

							var overtime_hours 			= 0;
							var overtime_minutes 		= 0;
							var overtime_accumHours 	= 0;
							var overtime_accumMinutes 	= 0;

							var total_totalMinutes 	= 0;
							var total_addedHours 	= 0;

							var basic_totalMinutes 	= 0;
							var basic_addedHours 	= 0;

							var overtime_totalMinutes 	= 0;
							var overtime_addedHours 	= 0;

							var totalHours 		= 0;
							var totalBasic 		= 0;
							var totalOvertime 	= 0;
							var totalRD 		= 0;
							var totalDays 		= 0;

							var countLV = 0;

							/* 
								value.split('|')[0] = time
								value.split('|')[1] = regular
								value.split('|')[2] = overtime
								value.split('|')[3] = timesheetID
								value.split('|')[4] = status
								value.split('|')[5] = clientID
								value.split('|')[6] = postID
							 */

							for(var x=datefromDay;x<=datetoDay;x++){
								value = Object.values(data["details"][i])[counter];
								time = "";

								if(value==null) value="";

								if(value.split('|')[0]!="" && value.split('|')[0]!="RD" && value.split('|')[0]!="LV"){
									time 		= value.split('|')[0];
									regular 	= value.split('|')[1];
									overtime	= value.split('|')[2];
									timesheetID = value.split('|')[3];

									if(value.split('|')[4]=="1"){
										color = "#179414";
										totalDays++;
										htmlDetails += '<td class="tsdata" style="font-weight: 500; color:' + color + ';">' + 
													"<a href='javascript:void(0);' data-toggle='modal' class='attendance_info' data-target='#attendance_info' id='" + timesheetID + "'>" + time + "</a></td>";

										/********* TOTAL HOURS **********/
											total_hours   = time.split(":")[0];
											total_minutes = time.split(":")[1];

											total_accumHours   += parseFloat(total_hours);
											total_accumMinutes += parseFloat(total_minutes);

										/********* TOTAL BASIC **********/
											basic_hours 	= regular.split(":")[0];
											basic_minutes 	= regular.split(":")[1];

											basic_accumHours   += parseFloat(basic_hours);
											basic_accumMinutes += parseFloat(basic_minutes);

										/********* TOTAL OT **********/
											overtime_hours 	 = overtime.split(":")[0];
											overtime_minutes = overtime.split(":")[1];

											overtime_accumHours   += parseFloat(overtime_hours);
											overtime_accumMinutes += parseFloat(overtime_minutes);
									}else{
										color = "#ff5200c7";
										if(time=='notexist'){
											htmlDetails += '<td class="tsdata" style="font-weight: 500; color:' + color + ';">' + 
													"<a href='javascript:void(0);' data-toggle='modal' class='schedule_info' data-target='#schedule_info' timeshtid='" + timesheetID + "'><i class='fa fa-calendar-times fa-2x'></i></a></td>";
										}else{
											totalDays++;
											htmlDetails += '<td class="tsdata" style="font-weight: 500; color:' + color + ';">' + 
													"<a href='javascript:void(0);' data-toggle='modal' class='attendance_info' data-target='#attendance_info' id='" + timesheetID + "'>" + time + "</a></td>";

											/********* TOTAL HOURS **********/
												total_hours   = time.split(":")[0];
												total_minutes = time.split(":")[1];

												total_accumHours   = parseFloat(total_accumHours) + parseFloat(total_hours);
												total_accumMinutes = parseFloat(total_accumMinutes) + parseFloat(total_minutes);

											/********* TOTAL BASIC **********/
												basic_hours 	= regular.split(":")[0];
												basic_minutes 	= regular.split(":")[1];

												basic_accumHours   = parseFloat(basic_accumHours) + parseFloat(basic_hours);
												basic_accumMinutes = parseFloat(basic_accumMinutes) + parseFloat(basic_minutes);

											/********* TOTAL OT **********/
												overtime_hours 	 = overtime.split(":")[0];
												overtime_minutes = overtime.split(":")[1];

												overtime_accumHours   = parseFloat(overtime_accumHours) + parseFloat(overtime_hours);
												overtime_accumMinutes = parseFloat(overtime_accumMinutes) + parseFloat(overtime_minutes);
										}
									}
								}else{
									time = value.split('|')[0];

									if(time=="RD"){
										totalRD++;
										color = "#1c78d1";
									}else{
										color = "#d1221c";
									}

									htmlDetails += '<td class="tsdata" style="font-weight: 500; color:' + color + ';">' + time + '</td>';
								}

								counter++;
							}
								/********* TOTAL HOURS **********/
									total_totalMinutes = parseFloat(total_accumMinutes % 60);
									total_addedHours   = parseInt(total_accumMinutes / 60);

									totalHours = parseFloat(total_accumHours + total_addedHours) + ":" + total_totalMinutes.toString().padStart(2,'0');

								/********* TOTAL BASIC **********/
								
									basic_totalMinutes = parseFloat(basic_accumMinutes % 60);
									basic_addedHours   = parseInt(basic_accumMinutes / 60);

									totalBasic = parseFloat(basic_accumHours + basic_addedHours) + ":" + basic_totalMinutes.toString().padStart(2,'0');

								/********* TOTAL OT **********/

									overtime_totalMinutes = parseFloat(overtime_accumMinutes % 60);
									overtime_addedHours   = parseInt(overtime_accumMinutes / 60);

									totalOvertime = parseFloat(overtime_accumHours + overtime_addedHours) + ":" + overtime_totalMinutes.toString().padStart(2,'0');

								/*if(parseFloat(total_accumHours + total_addedHours)==0 || ){

								}*/

								if((parseFloat(total_accumHours + total_addedHours)==0 && total_totalMinutes==0) && totalRD==0){
									removeArray.push(data["details"][i].employeeID);
								}

								htmlDetails += "<td class='tsdata' style='font-weight: 500;'>" + totalHours 	+ "</td>";
								htmlDetails += "<td class='tsdata' style='font-weight: 500;'>" + totalBasic 	+ "</td>";
								htmlDetails += "<td class='tsdata' style='font-weight: 500;'>" + totalOvertime  + "</td>";
								htmlDetails += "<td class='tsdata' style='font-weight: 500;'>" + totalRD	    + "</td>";
								htmlDetails += "<td class='tsdata' style='font-weight: 500;'>" + totalDays  	+ "</td>";

							htmlDetails += '</tr>';
						}
			      	}

			      	 $("#show_header").html(htmlHeader);
			      	 $("#show_details").html(htmlDetails);



			      	 for(var i=0;i<removeArray.length;i++){
			      	 	$('table#datatable tr#' + removeArray[i]).remove();
			      	 }

		      	 	if ($.fn.DataTable.isDataTable('#datatable')){
			           $('#datatable').DataTable().destroy();
			        };	

			      	 $('#datatable').DataTable( {
			      	 	"pageLength": 50,
				        "ordering": false,
				        "info":     false,
						dom: 'Bfrtip',
				        buttons: [
					        {
					        	extend: 'excel',
					        	className: 'btn btn-success',
					        	filename: 'Timekeeping ' + $("#timekeepingID option:selected").html(),
            					text:      '<i class="fa fa-file-excel-o"> </i> Export to excel',
                				titleAttr: 'Excel'
					        }
				        ]
					});


			      	/* if($('#datatable tr').length==2){
			      	 	htmlDetails = "";
						htmlDetails += '<tr><td colspan="' + (columnCount+6) + '" id="norecord" style="height: 45vh;">' + 
											'<img class="isometric confirmationisometric" style="height:100px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
											'<h4>No Timekeeping record found!</h4>'  + 
											'<p><b>Client:</b> ' + $("#searchclient option:selected").html() + ' <b>Post:</b>' + $("#searchpost option:selected").html() + '</p>' + 
										'</td></tr>';

						$("#show_details").html(htmlDetails);
					}*/



		      	  },
			      error: function(request, textStatus, error) {

			      }
	 	 	});
		}
	});	
});
</script>