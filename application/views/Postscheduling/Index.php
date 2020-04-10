
<?php
	$optionEmployee = "";
	$optionClient   = "";
	$optionPost     = "";

/*	foreach($data['employee'] as $employee)
	{
		$optionEmployee.='<option value="'.$employee->employeeID.'">'.$employee->firstname.' '.$employee->lastname.'</option>';
	}*/

	foreach($data['client'] as $client)
	{
		$optionClient.='<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
	}

	/*foreach($data['post'] as $post)
	{
		$optionPost.='<option value="'.$client->postID.'">'.$post->postName.'</option>';
	}*/
?>
<!-- Page Wrapper -->

<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					
					<h3 class="page-title">Post Scheduling</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Post Scheduling</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
		  	<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12"> 
			  	<div class="form-group form-focus select-focus">
			  		<label class="focus-label">Client</label>
					<select class="form-control is-invalid select2" id="searchclient"> 
						<option value="0">Select Client</option>
						<?=$optionClient;?>
					</select>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12"> 
			  	<div class="form-group form-focus select-focus">
			  		<label class="focus-label">Post</label>
					<select class="form-control is-invalid select2" id="searchpost"> 
						<option value="0">Select Post</option>
					</select>
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12"> 
			  	<div class="form-group form-focus select-focus">
					<label class="focus-label">Choose week</label>
 					<input id="scheddate"  name="scheddate" 
 						   class="form-control datetimepicker">
				</div>
			</div>

			<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12"> 
			  	<div class="form-group form-focus select-focus">
					<button class="btn btn-success viewsched" id="submit"  clientid="1" postid="1" weekstart="2020-04-05" weekend="2020-04-11" style="border-radius: 5px; width:100%; height: 45px;"><i class="fas fa-search"></i> VIEW SCHEDULE</button>
				</div>
			</div>

			  <div class="col-md-12 mb-2">
				<table class="table custom-table"  id="datatable" style="border: 1px solid #b7b7b7;" >
					<thead id="data_header">
						<!-- <tr> 
							<th class="text-center postHeader shift">Shifting</th>
							<th class="text-center postHeader sun">Sunday</th>
							<th class="text-center postHeader mon">Monday</th>
							<th class="text-center postHeader tue">Tuesday</th>
							<th class="text-center postHeader wed">Wednesday</th>
							<th class="text-center postHeader thu">Thursday</th>
							<th class="text-center postHeader fri">Friday</th>
							<th class="text-center postHeader sat">Saturday</th>
						</tr> -->
					</thead>
					<tbody id="data_show">
						<!-- <tr>
							<td colspan="8" align="right">
								<button class="btn btn-primary" id="addSchedule" style="border-radius: 5px;" 
										data-toggle="modal" data-target="#add_schedule"
										data-backdrop="static" data-keyboard="false">
										<i class="fas fa-plus"></i> Add a new schedule
								</button>
							</td>
						</tr> -->
						<tr>
							<td colspan="8" id="norecord">
								<img class="isometric confirmationisometric" style="height: 220px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/schedule.svg">
								<h4>Post Scheduling</h4>
								<p>Click <b><u>View Schedule</u></b> to generate schedule.</p>
							</td>
						</tr> 
					</tbody>
				</table>
			</div>
		</div>
	<!-- /Page Content -->
	</div>
</div>
<!-- /Page Wrapper -->

<!-- Add Shift Modal -->
<div id="add_schedule" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Shift</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label>Time In <span class="text-danger">*</span></label>
						<input class="form-control" type="time" value="07:00" id="addTimein">
						<div class="invalid-feedback" id="add-timein"></div>
						
					</div>
					<div class="form-group">
						<label>Time Out <span class="text-danger">*</span></label>
						<input class="form-control" type="time" value="19:00" id="addTimeout">
						<div class="invalid-feedback" id="add-timeout"></div>
					</div>
					
					<div class="submit-section">
						<button class="btn btn-primary submit-btn" id="submitSched">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Schedule Modal -->

<!-- Add Security Guard -->
<div id="add_guard" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Security Guard</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<select class="form-control select2" id="selectGuard" multiple="multiple" style="width:100%;">

						</select>
					</div>

					<div class="submit-section">
						<button class="btn btn-primary submit-btn" id="submitGuard">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Add Security Guard -->

<!-- Confirmation Modal -->
<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
						<h3>Confirmation Message</h3>
						<p>Are you sure you want to add this schedule?</p>
						<div class="invalid-feedback" id="status-invalid"></div>
				</div>
			
					<div class="row">
						<div class="col-6">
							<a href="#" class="btn btn-primary continue-btn">Add</a>
						</div>
						<div class="col-6">
							<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- /Confirmation Modal -->

<!-- Confirmation Modal -->
<div id="confirmation_delete" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/delete.svg">
						<h3>Confirmation Message</h3>
						<p id="confirm_message"></p>
						<div class="invalid-feedback" id="status-invalid"></div>
				</div>
			
					<div class="row">
						<div class="col-6">
							<a href="#" class="btn btn-primary continue-btn">Delete</a>
						</div>
						<div class="col-6">
							<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<!-- /Confirmation Modal -->

<style>
.task-follower-list{
	margin: 0px;
}

.postHeader{
	background-color: #e04d45;
	color:#fff;
	border-left: #a9a8a8 1px solid;
}

@media (max-height: 640px)
{
	#norecord{height: 30vh !important;}
}

#norecord{
	height: 60vh;
	text-align: center;
}

.td-sched{
	text-align:center;
	background-color: #e04d45;
	color: white;
	font-weight: 500;
	position: relative;
}

.td-guard{
	border-left: #a9a8a8 1px solid;
	vertical-align: initial !important;
}

.showGuard{
	width:100%;
    font-size:.6rem !important;
    border-radius: 5px;
}

.dash-card{
	box-shadow:none;
	padding: 2px !important;
}

.p-guard{
	margin-left: 10px !important;
	color: black; 
	font-size: 10px !important;
}

.dash-card-avatars{
	padding: 0 5px !important;
}

@media only screen and (max-width: 640px) {
	.confirmationisometric{
		height: 120px;
}

</style>

<script>
$(document).ready(function() {
	$(window).on("load", function() {
		$("#searchclient").trigger("change");
    });

	/*************************************  ADD SCHEDULE  *********************************************/
		    $('#add_schedule').on('hidden.bs.modal', function(){
		   		$("#addTimein").val("07:00");
		   		$("#addTimeout").val("19:00");
		   		$("#addTimein").focus(); 
			});

		    $(document).on("click", '#submitSched', function () {
		        var timein  = $('#addTimein').val().trim();
		        var timeout = $('#addTimeout').val().trim();

		    	$('#add_schedule').hide();

		   		$(".continue-btn").attr("id","saveSched");
		   		$(".cancel-btn").attr("id","cancelSched");
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
				event.preventDefault(); 
				return false;
		    });


		    $(document).on("click", '#saveSched', function () {
		        var clientID  = $(".viewsched").attr("clientid");
		        var postID    = $(".viewsched").attr("postid");
		        var weekstart = $(".viewsched").attr("weekstart");
		        var weekend   = $(".viewsched").attr("weekend");
		        var timein    = $("#addTimein").val();
		        var timeout   = $("#addTimeout").val();

				$.ajax({
				      url : "<?php echo site_url('Scheduling/savesched');?>",
				      method : "POST",
				      dataType : 'json',
				      data: {clientID:clientID,
				      		 postID:postID,
				      		 weekstart:weekstart,
				      		 weekend:weekend,
			      			 timein:timein,
			      			 timeout:timeout},
				      success: function(data){	
				      		var result = data.split('|');

				      		if(result[0]=="true"){
				      			var htmlOutput = "";

					      		$('.viewsched').trigger('click');

	      		  				$('#confirmation_add').modal('hide');
	      		  				$('#add_schedule').modal('hide');
	      		  				$( '.modal-backdrop' ).remove();
								$( 'body' ).removeClass( "modal-open" );

								showSuccessToast("Shift successfully created! <br>" + 
												 "<b>Time in:</b> "  + timein  + " <br> " +
												 "<b>Time out:</b> " + timeout);
				      		}else{
				      			$('#confirmation_add').modal('hide');
								$('#add_schedule').show();
								$("#addTimein").addClass("is-invalid");
								$("#addTimeout").addClass("is-invalid");
								$("#addTimein").focus();
				      			showErrorToast("Shift already exist!");
				      		}
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});

				event.preventDefault(); 
				return false;
		    });

		    $(document).on("click", '#cancelSched', function () {
				$('#confirmation_add').modal('hide');
				$('#add_schedule').show();
			});

			$('#add_schedule').on('hidden.bs.modal', function(){
			    $(".form-control").each(function(){
	                $(this).removeClass("is-invalid");
	                $(this).removeClass("is-valid");
	         	 });
			});

			$(document).on("click", '.removeSched', function () {
				$("#confirmation_delete .continue-btn").attr("id","deleteSched");
				$("#confirmation_delete .continue-btn").attr("sched",$(this).attr("sched"));
		   		$("#confirmation_delete .cancel-btn").attr("id","cancelDeleteSched");
		   		$("#confirmation_delete #confirm_message").html("Are you sure you want to delete this <b>schedule</b>? <p style='font-size: .71rem; color: #e04d45; font-weight:500;'>All assigned guards in this shift will be remove also.</p>");
				$('#confirmation_delete').modal({backdrop: 'static', keyboard: false},'show');
				event.preventDefault(); 
				return false;
			});

			$(document).on("click", '#deleteSched', function () {
				var postscheduleID  = $(this).attr("sched");

				$.ajax({
				      url : "<?php echo site_url('Scheduling/removesched');?>",
				      method : "POST",
				      dataType : 'json',
				      data: {postscheduleID:postscheduleID},
				      success: function(data){	
      		  				$('#confirmation_delete').modal('hide');
      		  				$('table#datatable tr#' + postscheduleID).fadeOut('slow');

  		  					setTimeout(function(){
					            $('table#datatable tr#' + postscheduleID).remove();

		  						if($("#datatable tbody").children().length==0){
		  							var htmlOutput = '<tr>' + 
														'<td colspan="8" id="norecord">' + 
															'<img class="isometric confirmationisometric" style="height:220px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
															'<h4>No schedule found</h4>' + 
															'<p>Click <b>Add a new shift</b> to add.</p>' + 
														'</td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' + 
														'<td style="display: none;"></td>' +													
													'</tr>';

									$("#data_show").html(htmlOutput);
		  						}

		  						showErrorToast("Shift successfully removed!");
					        },500);
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});
	 	 	});

	/*************************************  END ADD SCHEDULE  *********************************************/



	/*************************************  SHOW GUARD  *********************************************/
			$(document).on("click", '.showGuard', function () {
				var clientID 		= $(".viewsched").attr("clientid");
				var postID 			= $(".viewsched").attr("postid");
				var weekstart 		= $(".viewsched").attr("weekstart");
				var weekend			= $(".viewsched").attr("weekend");
				var postscheduleID  = $(this).attr("postscheduleid");
				var weekday		    = $(this).attr("weekday");
				var arrVal 			= [];
				var i = 0;

				$("#submitGuard").attr("postscheduleID",postscheduleID);
				$("#submitGuard").attr("weekday",weekday);

				$(".sched" + postscheduleID + "week" + weekday).each(function(){
                	arrVal[i] = $(this).attr("employeeid");
                	i++;
	            });

				$.ajax({
				      url : "<?php echo site_url('Scheduling/loadguard');?>",
				      method : "POST",
				      dataType : 'json',
				      data: {clientID:clientID,
				      		 postID:postID,
				      		 weekstart:weekstart,
				      		 weekend: weekend},
				      success: function(data){	
				      	var htmlOutput = "";
				      		for(i=0; i<data.length; i++){
								htmlOutput += '<option value="'+ data[i].employeeID +'">' + data[i].employeeID.padStart(6,'0') + " - " + data[i].fullname + '</option>';
							}
			      			
				      		$("#selectGuard").html(htmlOutput);							
							$("#selectGuard").val(arrVal);
							$("#selectGuard").trigger("change");
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});
			});

			$(document).on("click", '#submitGuard', function () {
		    	$('#add_guard').hide();
		    	$("#confirmation_add .continue-btn").attr("id","saveGuard");
		   		$("#confirmation_add .cancel-btn").attr("id","cancelGuard");
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
				event.preventDefault(); 
				return false;
		    });

		    $(document).on("click", '#cancelGuard', function () {
				$('#confirmation_add').modal('hide');
				$('#add_guard').show();
			});

			$(document).on("click", '#saveGuard', function () {
				var postscheduleID  = $("#submitGuard").attr("postscheduleid");
				var weekday		    = $("#submitGuard").attr("weekday");
				var employeeID  	= $("#selectGuard").val();

				const day = ["Sunday", "Monday", "Tueday","Wednesday", "Thursday", "Friday", "Saturday"];

				$.ajax({
				      url : "<?php echo site_url('Scheduling/saveguard');?>",
				      method : "POST",
				      dataType : 'json',
				      data: {postscheduleID:postscheduleID,
				      		 weekday:weekday,
				      		 employeeID:employeeID},
				      success: function(data){	
				      	var htmlOutput = "";

      		  				for(i=0;i<data["guard"].length;i++){
      		  					htmlOutput += '<div class="dash-info-list mb-1">' + 
									'<div class="dash-card text-danger">' + 
										'<div class="dash-card-container">' + 
											'<div class="dash-card-content">' + 
												'<p class="p-guard sched' + postscheduleID + "week" + weekday + '" id="sched' + postscheduleID + "week" + weekday + "emp" + data["guard"][i].employeeID + '" employeeid="' + data["guard"][i].employeeID + '">' + data["guard"][i].fullname + '</p>' + 
											'</div>' + 
											'<div class="dash-card-avatars">' + 
												'<a href="javascript:void(0);" sched="' + postscheduleID + '" week="' + weekday + '" employeeid="' + data["guard"][i].employeeID + '" class="removeGuard"><i class="fas fa-minus-circle"></i></a>' + 
											'</div>' + 
										'</div>' + 
									'</div>' + 
								'</div>';
      		  				}

      		  				$("#sched" + postscheduleID + "week" + weekday).html(htmlOutput);
      		  				$('#confirmation_add').modal('hide');
      		  				$('#add_guard').modal('hide');
      		  				$( '.modal-backdrop' ).remove();
							$( 'body' ).removeClass( "modal-open" );

							var date = moment(data["schedule"][0].weekstart, 'YYYY-MM-DD').day(weekday).format('MMMM DD, YYYY');

							showSuccessToast("Guard(s) successfully assigned! <br>" +
											 "<b>Day:</b> " + date + " (" + day[weekday] + ") <br>" +
											 "<b>Shift:</b> " + data["schedule"][0].timein + " - " + data["schedule"][0].timeout);
							/**/
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});

				event.preventDefault(); 
				return false;
		    });


			$(document).on("click", '.removeGuard', function () {
				$("#confirmation_delete .continue-btn").attr("id","deleteGuard");
				$("#confirmation_delete .continue-btn").attr("sched",$(this).attr("sched"));
				$("#confirmation_delete .continue-btn").attr("week",$(this).attr("week"));
				$("#confirmation_delete .continue-btn").attr("employeeid",$(this).attr("employeeid"));
		   		$("#confirmation_delete .cancel-btn").attr("id","cancelDeleteGuard");
		   		$("#confirmation_delete #confirm_message").html("Are you sure you want to delete this <b>guard</b>?");
				$('#confirmation_delete').modal({backdrop: 'static', keyboard: false},'show');
				event.preventDefault(); 
				return false;
			});


			$(document).on("click", '#deleteGuard', function () {
				var postscheduleID  = $(this).attr("sched");
				var weekday		    = $(this).attr("week");
				var employeeID		= $(this).attr("employeeid");

				$.ajax({
				      url : "<?php echo site_url('Scheduling/removeguard');?>",
				      method : "POST",
				      dataType : 'json',
				      data: {postscheduleID:postscheduleID,
				      		 weekday:weekday,
				      		 employeeID:employeeID},
				      success: function(data){	
				      	var htmlOutput = "";

      		  				for(i=0;i<data.length;i++){
      		  					htmlOutput += '<div class="dash-info-list mb-1">' + 
									'<div class="dash-card text-danger">' + 
										'<div class="dash-card-container">' + 
											'<div class="dash-card-content">' + 
												'<p class="p-guard sched' + postscheduleID + "week" + weekday + '" id="sched' + postscheduleID + "week" + weekday + "emp" + data[i].employeeID + '" employeeid="' + data[i].employeeID + '">' + data[i].fullname + '</p>' + 
											'</div>' + 
											'<div class="dash-card-avatars">' + 
												'<a href="javascript:void(0);" sched="' + postscheduleID + '" week="' + weekday + '" employeeid="' + data[i].employeeID + '" class="removeGuard"><i class="fas fa-minus-circle"></i></a>' + 
											'</div>' + 
										'</div>' + 
									'</div>' + 
								'</div>';
      		  				}

      		  				$("#sched" + postscheduleID + "week" + weekday).html(htmlOutput);
      		  				$('#confirmation_delete').modal('hide');

      		  				showErrorToast("Guard successully removed!");
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});
	 	 	});

	/************************************* END SHOW GUARD  *********************************************/



	/*************************************  VIEW  SCHEDULE  *********************************************/
		    $(document).on("click", "#submit", function(){
		 		var clientID=$("#searchclient").val();
		 		var postID=$("#searchpost").val();
		 		var schedDate=$("#scheddate").val();
		 		var error = 0;

				$("[aria-labelledby='select2-searchclient-container']").removeClass('is-invalid');
				$("[aria-labelledby='select2-searchpost-container']").removeClass('is-invalid');
				$("#scheddate").removeClass('is-invalid');

		 		if(clientID==0){
					$("[aria-labelledby='select2-searchclient-container']").addClass('is-invalid');
					$("#searchclient").focus();
					error=1;
		 		}

		 		if(postID==0){
					$("[aria-labelledby='select2-searchpost-container']").addClass('is-invalid');
					if(error==0){
						$("#searchpost").focus();
						error=1;
					}
		 		}

		 		if(schedDate==""){
					$("#scheddate").addClass('is-invalid');
					if(error==0){
						error=1;
						$("#scheddate").focus();
						
					}
		 		}

		 		if(error==0){
		 			var htmlData = "";

		        	htmlData = '<tr>' + 
									'<td colspan="8" id="norecord">' + 
										'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/loading.svg">' + 
										'<h4>Please wait...</h4>' + 
										'<p>Genarating schedule of <b>' + $("#searchclient option:selected").text() + ' - ' + $("#searchpost option:selected").text() + '<b>.</p>' + 
									'</td>' + 
								'</tr>';

					$("#data_show").html(htmlData);

		 			sun = moment(schedDate, 'YYYY-MM-DD').day(0).format('MMM DD, YYYY');
		 			mon = moment(schedDate, 'YYYY-MM-DD').day(1).format('MMM DD, YYYY');
		 			tue = moment(schedDate, 'YYYY-MM-DD').day(2).format('MMM DD, YYYY');
		 			wed = moment(schedDate, 'YYYY-MM-DD').day(3).format('MMM DD, YYYY');
		 			thu = moment(schedDate, 'YYYY-MM-DD').day(4).format('MMM DD, YYYY');
		 			fri = moment(schedDate, 'YYYY-MM-DD').day(5).format('MMM DD, YYYY');
		 			sat = moment(schedDate, 'YYYY-MM-DD').day(6).format('MMM DD, YYYY');

		 			var weekstart = moment(schedDate, 'YYYY-MM-DD').day(0).format('YYYY-MM-DD');
		 			var weekend   = moment(schedDate, 'YYYY-MM-DD').day(6).format('YYYY-MM-DD');
		        	var htmlHeader = "";

		        	$(this).attr("clientid", clientID);
		 			$(this).attr("postid", postID);
		 			$(this).attr("weekstart", weekstart);
		 			$(this).attr("weekend", weekend);

		        	htmlHeader = '<tr>' +
									'<td colspan="8" align="right">' + 
										'<button class="btn btn-primary" id="addSchedule" style="border-radius: 5px;" data-toggle="modal" data-target="#add_schedule" data-backdrop="static" data-keyboard="false">' + 
												'<i class="fas fa-plus"></i> Add a new shift' +
										'</button>' +
									'</td>' +
		        				 '</tr>' +

		        				'<tr>' + 
									'<th class="text-center postHeader shift">Shifting</th>' +
									'<th class="text-center postHeader sun">Sunday<br>'+ sun +'</th>' 	 +
									'<th class="text-center postHeader mon">Monday<br>'+ mon +'</th>' 	 +
									'<th class="text-center postHeader tue">Tuesday<br>'+ tue +'</th>' 	 +
									'<th class="text-center postHeader wed">Wednesday<br>'+ wed +'</th>'  +
									'<th class="text-center postHeader thu">Thursday<br>'+ thu +'</th>' 	 +
									'<th class="text-center postHeader fri">Friday<br>'+ fri +'</th>' 	 +
									'<th class="text-center postHeader sat">Saturday<br>'+ sat +'</th>'   +
								'</tr>';

					$("#data_header").html(htmlHeader);

					$.ajax({
					      url : "<?php echo site_url('Scheduling/searchschedule');?>",
					      method : "POST",
					      async : true,
					      dataType : 'json',
					      data: {clientID:clientID,
					      		 postID:postID,
					      		 weekstart:weekstart,
					      		 weekend: weekend},
					      success: function(data){	
					      		var htmlOutput = "";

					      		if(data["postschedule"].length!=0){
				      				for(y=0; y<data["postschedule"].length; y++){
					      				htmlOutput += '<tr id="' + data["postschedule"][y].postscheduleID + '">' +
					      									'<td class="td-sched"><br>' + data["postschedule"][y].timein + '<br> to <br>' + data["postschedule"][y].timeout + ' <br> <a href="javascript:void(0);" sched="' +  data["postschedule"][y].postscheduleID + '" class="removeSched"><i class="fas fa-times-circle" style="position: absolute;top: 5px;right: 3px;"></i></a><br></td>';

					      									for(weekday=0;weekday<=6;weekday++){
					      										htmlOutput += '<td class="td-guard">' + 
																					'<button class="btn btn-info mb-2 showGuard"' + 
																							'data-toggle="modal" data-target="#add_guard"' +
																							'postscheduleID="' + data["postschedule"][y].postscheduleID + '"' +  
																							'weekday="' + weekday + '"' +  
																							'data-backdrop="static" data-keyboard="false">' + 
																							'<i class="fas fa-search-plus"></i> Add Security Guard' + 
																					'</button>';

																				htmlOutput += '<div class="employeeList" id="sched' + data["postschedule"][y].postscheduleID + 'week'+ weekday +'">';

								      											for(i=0; i<data["postscheduleguard"].length; i++){
						      														if(data["postscheduleguard"][i].weekday==weekday && data["postscheduleguard"][i].postscheduleID==data["postschedule"][y].postscheduleID){

						  																htmlOutput += '<div class="dash-info-list mb-1">' + 
																											'<div class="dash-card text-danger">' + 
																												'<div class="dash-card-container">' + 
																													'<div class="dash-card-content">' + 
																														'<p class="p-guard sched' + data["postschedule"][y].postscheduleID + "week" + weekday + '"  id="sched' + data["postschedule"][y].postscheduleID + "week" + weekday + "emp" + data["postscheduleguard"][i].employeeID + '" employeeid="' + data["postscheduleguard"][i].employeeID + '">' + data["postscheduleguard"][i].fullname + '</p>' + 
																													'</div>' + 
																													'<div class="dash-card-avatars">' + 
																														'<a href="javascript:void(0);" sched="' +  data["postschedule"][y].postscheduleID + '" week="' + weekday + '" employeeid="' + data["postscheduleguard"][i].employeeID + '" class="removeGuard"><i class="fas fa-user-times"></i></a>' + 
																													'</div>' + 
																												'</div>' + 
																											'</div>' + 
																										'</div>';
		      																		}
			      																}
		      																	htmlOutput += "</div>";
																htmlOutput += '</td>';
					      									}
					      							  htmlOutput += '</tr>';
						      		}
					      		}
				      			else{
				      				htmlOutput = '<tr>' + 
													'<td colspan="8" id="norecord">' + 
														'<img class="isometric confirmationisometric" style="height:220px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
														'<h4>No schedule found</h4>' + 
														'<p>Click <b>Add a new shift</b> to add.</p>' + 
													'</td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' + 
													'<td style="display: none;"></td>' +													
												'</tr>';
				      			}

				      			if ($.fn.DataTable.isDataTable('#datatable')){
						           $('#datatable').DataTable().destroy();
						        };
				      			
					      		$("#data_show").html(htmlOutput);

					      		$('#datatable').DataTable( {
									        "ordering": false,
									        "info":     false,
									        "autoWidth": false,
									        "lengthChange": false,
									        "searching": false,
									        "paging":false,
										    "fixedHeader": {
										        "header": true
										    },
										    "columnDefs": [
										      { "width": "60px", "targets": 'shift'},
										      { "width": "170px", "targets": 'sun'},
										      { "width": "170px", "targets": 'mon'},
										      { "width": "170px", "targets": 'tue'},
										      { "width": "170px", "targets": 'wed'},
										      { "width": "170px", "targets": 'thu'},
										      { "width": "170px", "targets": 'fri'},
										      { "width": "170px", "targets": 'sat'}
										    ]
								    });
					      },
					      error: function(request, textStatus, error) {

					      }
			 	 	});

		 			/*$.ajax({
				      url : "<?php echo site_url('Scheduling/searchschedule');?>",
				      method : "POST",
				      async : true,
				      dataType : 'json',
				      data: {clientID:clientID,
				      		 postID:postID},
				      success: function(data){		
				      	console.log(data);
				      	var postName = "";

				      	for(y=0; y<data["employee"].length; y++){
							optionEmployee+='<option value="' + data["employee"][y].employeeID + '">' + data["employee"][y].firstname + ' ' + data["employee"][y].lastname + '</option>';
			      		}

				      	for(i=0; i<data["post"].length; i++){
		      				if(postName!=data["post"][i].postname){
		      					html+='<tr>' +
									  	'<td class="text-center postName" colspan="8">' + data["post"][i].postname + '</td>' +
								      '</tr>';
		      				}

		      				postName = data["post"][i].postname;
		      				
							html+='<tr>' +
								  '<td class="text-center" style="width: 200px !important; font-size:11px;"><b style="color:#e04d45">' + data["post"][i].timein + '<br/> to <br/>' + data["post"][i].timeout + '</b></td>';
											
										for(x=0; x<7; x++){
											html+='<td class="postGuard">' + 
													  '<label style="margin-bottom:0;">Regular</label>' +
													  '<select class="form-control select2" id="searchemployee' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" multiple="multiple" disabled>' +
														optionEmployee +
													  '</select>';

													loadData(data["post"][i].postID,x,data["post"][i].postscheduleID); 

													html+='<br/>' + 
														  '<span class="file-author float-right" id="editGuard' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: block;">' + 
														   		'<a href="#" class="editGuard" name="' + data["post"][i].postscheduleID + data["post"][i].postID + x + '">Edit Assigned Guard</a>' +
														  '</span>' + 
														  '<span class="file-author float-left" id="saveGuard' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: none;">' +
																'<a href="#" class="saveGuard" postID="' + data["post"][i].postID + '" scheduleDay="' + x + '" postscheduleID="' + data["post"][i].postscheduleID + '">Save</a>' +
														  '</span>' + 
														  '<span class="file-author float-right" id="cancelGuard' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: none;">' +
																'<a href="#" class="cancelGuard" postID="' + data["post"][i].postID + '" scheduleDay="' + x + '" postscheduleID="' + data["post"][i].postscheduleID + '">Cancel</a>' +
														  '</span><br><br>';
									    }
								html+='</tr>';
		  				}     	
		  				$("#data_show").html(html);
		  				$('.select2').select2();	
		  				$(".loader").fadeOut();
				      },
				      error: function(request, textStatus, error) {

				      }
		 	 	});*/
		 		}
		 	});
		/*************************************  END VIEW SCHEDULE  *********************************************/
























	/*$(document).on("click", ".editGuard", function(){
		$("#searchemployee" + $(this).attr("name")).removeAttr('disabled');
		$("#editGuard" + $(this).attr("name")).css("display","none");
		$("#saveGuard" + $(this).attr("name")).css("display","block");
		$("#cancelGuard" + $(this).attr("name")).css("display","block");
	});

	$(document).on("click", ".cancelGuard", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Confirmation Message");
    	$('#modal_message').html("Are you sure you want to cancel?");
    	$('.submit-btn').html("Confirm");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_cancelediting");
    	$('.submit-btn').attr("postID",$(this).attr("postID"));
    	$('.submit-btn').attr("scheduleDay",$(this).attr("scheduleDay"));
    	$('.submit-btn').attr("postscheduleID",$(this).attr("postscheduleID"));
        $('#modal_confirmation').modal('show');
		return false;
	});

    $(document).on("click", "#modal_cancelediting", function(){
    	var postID = $(this).attr("postID");
		var scheduleDay = $(this).attr("scheduleDay");
		var postscheduleID = $(this).attr("postscheduleID");

		var arrVal = [];

		$.ajax({
		      url : "<?php echo site_url('Scheduling/loadguard');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {postID:postID,
		      		 postType:"regular",
		      		 postscheduleID:postscheduleID,
		      		 scheduleDay:scheduleDay},
		      success: function(data){	
		     										      			
      			for(i=0; i<data.length; i++){
      				arrVal[i] = data[i].employeeID;
  				}
  				$("#searchemployee" + postscheduleID + postID + scheduleDay).val(arrVal);
				$("#searchemployee" + postscheduleID + postID + scheduleDay).trigger("change");
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});

		$("#searchemployee" + postscheduleID + postID + scheduleDay).attr('disabled', 'disabled');
		$("#editGuard" + postscheduleID + postID + scheduleDay).css("display","block");
		$("#saveGuard" + postscheduleID + postID + scheduleDay).css("display","none");
		$("#cancelGuard" + postscheduleID + postID + scheduleDay).css("display","none");
		$('#modal_confirmation').modal('hide');
	});*/
/*
	$(document).on("click", ".saveGuard", function(){
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Confirmation Message");
    	$('#modal_message').html("Are you sure you want to save these changes?");
    	$('.submit-btn').html("Submit");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_saverecord");
    	$('.submit-btn').attr("postID",$(this).attr("postID"));
    	$('.submit-btn').attr("scheduleDay",$(this).attr("scheduleDay"));
    	$('.submit-btn').attr("postscheduleID",$(this).attr("postscheduleID"));
        $('#modal_confirmation').modal('show');
		return false;
	});*/

	/*$(document).on("click", "#modal_saverecord", function(){
		var postID = $(this).attr("postID");
		var scheduleDay = $(this).attr("scheduleDay");
		var postscheduleID = $(this).attr("postscheduleID");
		var employeeID =$("#searchemployee" + postscheduleID + postID + scheduleDay).val();

		$.ajax({
			url 	 : "<?php echo site_url('Scheduling/saveguard');?>",
			method : "POST",
			async  : true,
			data: {postID:postID,
					 postType:"regular",
					 postscheduleID:postscheduleID,
					 scheduleDay:scheduleDay,
					 employeeID:employeeID},
			success: function(data){	

			},
			error: function(request, textStatus, error) {

			}
		});

		$("#searchemployee" + postscheduleID + postID + scheduleDay).attr('disabled', 'disabled');
		$("#editGuard" + postscheduleID + postID + scheduleDay).css("display","block");
		$("#saveGuard" + postscheduleID + postID + scheduleDay).css("display","none");
		$("#cancelGuard" + postscheduleID + postID + scheduleDay).css("display","none");
		$('#modal_confirmation').modal('hide');
	});*/

	/*function loadData(postID,scheduleDay,postscheduleID){
		var arrVal = [];

		$.ajax({
		      url : "<?php echo site_url('Scheduling/loadguard');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {postID:postID,
		      		 postType:"regular",
		      		 postscheduleID:postscheduleID,
		      		 scheduleDay:scheduleDay},
		      success: function(data){			
	  			for(i=0; i<data.length; i++){
	  				arrVal[i] = data[i].employeeID;
				}
				
				$("#searchemployee" + postscheduleID + postID + scheduleDay).val(arrVal);
				$("#searchemployee" + postscheduleID + postID + scheduleDay).trigger("change");
		      },
		      error: function(request, textStatus, error) {

		      }
	 	});
	}*/

    $(document).on("change", "#searchclient", function(){
    	var clientID = $(this).val();
    	var htmlPost = "";
    	var optionEmployee = "";

    	$("[aria-labelledby='select2-searchclient-container']").removeClass('is-invalid');

    	$.ajax({
		      url : "<?php echo site_url('Scheduling/loadpost');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {clientID:clientID},
		      success: function(data){	
	      		
	      		htmlPost+='<option value="0">Select Post</option>';

		      	for(i=0;i<data["post"].length;i++){
		      		htmlPost+='<option value="' + data["post"][i].postID + '">' + data["post"][i].postname + '</option>';
		      	}
		      	
		      	$("#searchpost").html(htmlPost);
		      	if(data["post"].length!=0) $("#searchpost").focus();
		      	$(".loader").fadeOut();
	      	  },
		      error: function(request, textStatus, error) {

		      }
 	 	});
	});

	$(document).on("change", "#searchpost", function(){
    	var postID = $(this).val();
    	$("[aria-labelledby='select2-searchpost-container']").removeClass('is-invalid');
 	});

 	$(document).on("click", "#scheddate", function(){
    	$("#scheddate").removeClass('is-invalid');
 	});
});
</script>