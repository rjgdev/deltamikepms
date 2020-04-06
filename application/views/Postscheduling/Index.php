
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
					<button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%; height: 45px;"><i class="fas fa-search"></i> View Schedule</button>
				</div>
			</div>

			  <div class="col-md-12 mb-2">
				<table class="table custom-table"  id="datatable" style="border: 1px solid #b7b7b7;" >
					<thead id="data_header">
						<tr> 
							<th class="text-center postHeader shift">Shifting</th>
							<th class="text-center postHeader sun">Sunday</th>
							<th class="text-center postHeader mon">Monday</th>
							<th class="text-center postHeader tue">Tuesday</th>
							<th class="text-center postHeader wed">Wednesday</th>
							<th class="text-center postHeader thu">Thursday</th>
							<th class="text-center postHeader fri">Friday</th>
							<th class="text-center postHeader sat">Saturday</th>
						</tr>
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

						
							<!-- <td colspan="8" id="norecord">
								<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/schedule.svg">
								<h4>Post Scheduling</h4>
								<p>Click <b><u>View Schedule</u></b> to generate schedule.</p>
							</td> -->

							<tr>
								<td style="text-align:center;">07:00:00 <br> to <br> 19:00:00</td>
								<td style="vertical-align: initial !important;">
									<button class="btn btn-info mb-2" id="addGuard" style="width:100%; font-size:.6rem !important; border-radius: 5px;" 
										data-toggle="modal" data-target="#add_guard"
										data-backdrop="static" data-keyboard="false">
										<i class="fas fa-search-plus"></i> Add Security Guard
									</button>
									<div class="dash-info-list mb-1">
										<div class="dash-card text-danger" style="box-shadow:none; padding: 2px !important;">
											<div class="dash-card-container">
												<div class="dash-card-content">
													<p style="margin-left: 10px; color: black; font-size: 10px;">Gelilio, John Michael
													</p>
												</div>
												<div class="dash-card-avatars" style="padding: 0 5px !important;">
													<a href="javascript:void(0);" class="removeGuard"><i class="fas fa-minus-circle"></i></a>
												</div>
											</div>
										</div>
									</div>
								</td>
								<td>
									
								</td>
								<td >

								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
								</td>
								<td>
									
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

<!-- Add Schedule Modal -->
<div id="add_schedule" class="modal custom-modal fade" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Schedule</h5>
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
						<button class="btn btn-primary submit-btn" id="save">Submit</button>
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
						<button class="btn btn-primary submit-btn" id="saveGuard">Submit</button>
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
							<a href="#" class="btn btn-primary continue-btn add" >Add</a>
						</div>
						<div class="col-6">
							<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-add">Cancel</a>
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
}


@media (max-height: 640px)
{
	#norecord{height: 30vh !important;}
}

#norecord{
	height: 60vh;
	text-align: center;
}

</style>

<script>
$(document).ready(function() {
	$('#datatable').DataTable( {
	         "ordering": false,
	        "info":     false,
	        "autoWidth": false,
		    "fixedHeader": {
		        "header": false,
		        "footer": false
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


	$(window).on("load", function() {
		$("#searchclient").trigger("change");
    });

    $('#add_schedule').on('hidden.bs.modal', function(){
   		$("#addTimein").val("07:00");
   		$("#addTimeout").val("19:00");
   		$("#addTimein").focus(); 
	});

	$('#save').unbind('click').bind('click', function(){
        var timein  = $('#addTimein').val().trim();
        var timeout = $('#addTimeout').val().trim();

    	$('#add_schedule').hide();
		$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
    });

    $("#cncl-add").unbind('click').bind('click', function(){
		$('#confirmation_add').modal('hide');
		$('#add_schedule').show();
	});

	$("#addGuard").unbind('click').bind('click', function(){
		$.ajax({
		      url : "<?php echo site_url('Scheduling/getemployees');?>",
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
		      				htmlOutput += '<tr>' +
		      									'<td style="text-align:center;">' + data["postschedule"][y].timein + '<br> to <br>' + data["postschedule"][y].timeout + '</td>' + 
		      							  '</tr>';
		      				
			      		}
		      		}
	      			else{
	      				htmlOutput = '<tr>' + 
										'<td colspan="8" id="norecord">' + 
											'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
											'<h4>No schedule found</h4>' + 
											'<p>Click <b>Add a new schedue</b> to add.</p>' + 
										'</td>' + 
									'</tr>';
	      			}
	      			
		      		$("#data_show").html(htmlOutput);
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});
	});

	$(".removeGuard").unbind('click').bind('click', function(){
		$(".dash-info-list").css("display","none");
	});

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

        	htmlHeader = '<tr>' +
							'<td colspan="8" align="right">' + 
								'<button class="btn btn-primary" id="addSchedule" style="border-radius: 5px;" data-toggle="modal" data-target="#add_schedule" data-backdrop="static" data-keyboard="false">' + 
										'<i class="fas fa-plus"></i> Add a new schedule' +
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
			      				htmlOutput += '<tr>' +
			      									'<td style="text-align:center;">' + data["postschedule"][y].timein + '<br> to <br>' + data["postschedule"][y].timeout + '</td>' + 
			      							  '</tr>';
			      				
				      		}
			      		}
		      			else{
		      				htmlOutput = '<tr>' + 
											'<td colspan="8" id="norecord">' + 
												'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
												'<h4>No schedule found</h4>' + 
												'<p>Click <b>Add a new schedue</b> to add.</p>' + 
											'</td>' + 
										'</tr>';
		      			}
		      			
			      		$("#data_show").html(htmlOutput);
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

























	$(document).on("click", ".editGuard", function(){
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
	});

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
	});

	$(document).on("click", "#modal_saverecord", function(){
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
	});

	function loadData(postID,scheduleDay,postscheduleID){
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
	}

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