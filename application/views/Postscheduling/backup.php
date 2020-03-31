
<?php
	$optionEmployee = "";
	$optionClient   = "";

/*	foreach($data['employee'] as $employee)
	{
		$optionEmployee.='<option value="'.$employee->employeeID.'">'.$employee->firstname.' '.$employee->lastname.'</option>';
	}*/

	foreach($data['client'] as $client)
	{
		$optionClient.='<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
	}
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
					<select class="form-control select2" id="searchclient"> 
						<?=$optionClient;?>
					</select>
					<label class="focus-label">Client</label>
				</div>
			</div>

			  <div class="col-md-12 mb-2">
				<table class="table custom-table" style="border: 1px solid #b7b7b7;">
					<thead>
						<tr>
							<th class="text-center postHeader">Shifting</th>
							<th class="text-center postHeader">Sunday</th>
							<th class="text-center postHeader">Monday</th>
							<th class="text-center postHeader">Tuesday</th>
							<th class="text-center postHeader">Wednesday</th>
							<th class="text-center postHeader">Thursday</th>
							<th class="text-center postHeader">Friday</th>
							<th class="text-center postHeader">Saturday</th>
						</tr>
					</thead>
					<tbody id="data_show">
						
					</tbody>
				</table>
			</div>
			
		</div>
	<!-- /Page Content -->
	</div>
</div>
<!-- /Page Wrapper -->

<!-- Confirmation Modal -->
<div class="modal custom-modal fade" id="modal_confirmation" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<img class="isometric confirmationisometric">
					<h3 id="modal_title"></h3>
					<p id="modal_message"></p>
				</div>
				<div class="modal-btn confirmation-action">
					<div class="row">
						<div class="col-6">
							<button class="btn btn-primary submit-btn"></a>
						</div>
						<div class="col-6">
							<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn"></a>
						</div>
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

.postName{
	font-size: 15px;
	color:#fff;
	padding-top: 7px !important;
	padding-bottom: 5px !important;
	background-color: #505050;
}

.postGuard{
	vertical-align: initial !important;
	width:13% !important;
	font-size: 11px;
}

.file-author a{
	font-size: 11px !important;
}

.deleteGuard{
	right: -9px !important; 
	top: auto !important;
}

.select2-hidden-accessible{
	position: initial !important;
}

.select2-selection__choice{
	float: none !important;
    margin-right: 2px !important;
    margin-left: 0px !important;
    padding: 2px !important;
    padding-left: 7px !important;
}

.select2-container{
	width: 100% !important;
}

input[type="search"] {
  width: 13% !important;
}
/*
.select2-selection__rendered{
	padding:5px !important;
}*/
</style>

<script>
$(document).ready(function() {
	$(window).on("load", function() {
		$("#searchclient").trigger("change");
    });

	$(document).on("click", ".editGuard", function(){
		$("#searchemployee" + $(this).attr("name")).removeAttr('disabled');
		$("#editGuard" + $(this).attr("name")).css("display","none");
		$("#saveGuard" + $(this).attr("name")).css("display","block");
		$("#cancelGuard" + $(this).attr("name")).css("display","block");
	});

	$(document).on("click", ".editAugment", function(){
		$("#searchaugment" + $(this).attr("name")).removeAttr('disabled');
		$("#editAugment" + $(this).attr("name")).css("display","none");
		$("#saveAugment" + $(this).attr("name")).css("display","block");
		$("#cancelAugment" + $(this).attr("name")).css("display","block");
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

	$(document).on("click", ".cancelAugment", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Confirmation Message");
    	$('#modal_message').html("Are you sure you want to cancel?");
    	$('.submit-btn').html("Confirm");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_cancelediting_augment");
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

	$(document).on("click", "#modal_cancelediting_augment", function(){
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
		      	     postType:"augment",
		      	     postscheduleID:postscheduleID,
		      		 scheduleDay:scheduleDay},
		      success: function(data){	
		     										      			
      			for(i=0; i<data.length; i++){
      				arrVal[i] = data[i].employeeID;
  				}
  				$("#searchaugment" + postscheduleID + postID + scheduleDay).val(arrVal);
				$("#searchaugment" + postscheduleID + postID + scheduleDay).trigger("change");
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});

		$("#searchaugment" + postscheduleID + postID + scheduleDay).attr('disabled', 'disabled');
		$("#editAugment" + postscheduleID + postID + scheduleDay).css("display","block");
		$("#saveAugment" + postscheduleID + postID + scheduleDay).css("display","none");
		$("#cancelAugment" + postscheduleID + postID + scheduleDay).css("display","none");
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

	$(document).on("click", ".saveAugment", function(){
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Confirmation Message");
    	$('#modal_message').html("Are you sure you want to save these changes?");
    	$('.submit-btn').html("Submit");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_saverecord_augment");
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

	$(document).on("click", "#modal_saverecord_augment", function(){
		var postID = $(this).attr("postID");
		var scheduleDay = $(this).attr("scheduleDay");
		var postscheduleID = $(this).attr("postscheduleID");
		var employeeID =$("#searchaugment" + postscheduleID + postID + scheduleDay).val();

		$.ajax({
			url 	 : "<?php echo site_url('Scheduling/saveguard');?>",
			method : "POST",
			async  : true,
			dataType : 'json',
			data: {postID:postID,
					 postType:"augment",
					 postscheduleID:postscheduleID,
					 scheduleDay:scheduleDay,
					 employeeID:employeeID},
			success: function(data){	

			},
			error: function(request, textStatus, error) {

			}
		});


		$("#searchaugment" + postscheduleID + postID + scheduleDay).attr('disabled', 'disabled');
		$("#editAugment" + postscheduleID + postID + scheduleDay).css("display","block");
		$("#saveAugment" + postscheduleID + postID + scheduleDay).css("display","none");
		$("#cancelAugment" + postscheduleID + postID + scheduleDay).css("display","none");
		$('#modal_confirmation').modal('hide');
	});

    $(document).on("change", "#searchclient", function(){
    	var clientID = $(this).val();
    	var html = "";
    	var optionEmployee = "";

    	$.ajax({
		      url : "<?php echo site_url('Scheduling/searchbyclient');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {clientID:clientID},
		      success: function(data){		
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

							      html+='<label style="margin-bottom:0;">Augmentation</label>' +
											  '<select class="form-control select2" id="searchaugment' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" multiple="multiple" disabled>' +
												optionEmployee +
											  '</select>';

											loadData_augment(data["post"][i].postID,x,data["post"][i].postscheduleID); 

											html+='<br/>' + 
												  '<span class="file-author float-right" id="editAugment' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: block;">' + 
												   		'<a href="#" class="editAugment" name="' + data["post"][i].postscheduleID + data["post"][i].postID + x + '">Edit Assigned Guard</a>' +
												  '</span>' + 
												  '<span class="file-author float-left" id="saveAugment' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: none;">' +
														'<a href="#" class="saveAugment" postID="' + data["post"][i].postID + '" scheduleDay="' + x + '" postscheduleID="' + data["post"][i].postscheduleID + '">Save</a>' +
												  '</span>' + 
												  '<span class="file-author float-right" id="cancelAugment' + data["post"][i].postscheduleID + data["post"][i].postID + x + '" style="display: none;">' +
														'<a href="#" class="cancelAugment" postID="' + data["post"][i].postID + '" scheduleDay="' + x + '" postscheduleID="' + data["post"][i].postscheduleID + '">Cancel</a>' +
												  '</span>'+
									      '</td>';
							    }
						html+='</tr>';
  				}     	
  				$("#data_show").html(html);
  				$('.select2').select2();	
  				$(".loader").fadeOut();
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});
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

	function loadData_augment(postID,scheduleDay,postscheduleID){

		var arrVal = [];

		$.ajax({
		      url : "<?php echo site_url('Scheduling/loadguard');?>",
		      method : "POST",
		      async : true,
		      dataType : 'json',
		      data: {postID:postID,
		      	     postType:"augment",
		      	     postscheduleID:postscheduleID,
		      		 scheduleDay:scheduleDay},
		      success: function(data){	

	  			for(i=0; i<data.length; i++){
	  				arrVal[i] = data[i].employeeID;

				}
				$("#searchaugment" + postscheduleID + postID + scheduleDay).val(arrVal);
				$("#searchaugment" + postscheduleID + postID + scheduleDay).trigger("change");
		      },
		      error: function(request, textStatus, error) {

		      }
	 	});
	}
});
</script>