<?php
	$currentMonth = date('F');
	$currentYear = date('Y');
	/*$lastday = date('t');*/

	$timekeepingID 	= ""; 
	$timekeepingNo 	= ""; 
	$datesubmitted 	= "-----"; 
	$datefrom 		= ""; 
	$dateto 		= "";
	$dayfrom		= "";
	$dayto			= "";
	$colspan 		= "";
	$payperiod 		= "";
	$lastday 		= "";
	$tkstatus 		= "";
	$timekeepingstatus = "-----";
	$userapproved	= "";
	$usersubmitted 	= "";

	foreach ($data['timekeeping'] as $item)  {
		$timekeepingID  = $item->timekeepingID;
		$timekeepingNo 	= "TK-".str_pad($item->timekeepingID, 6, "0", STR_PAD_LEFT);
		$datesubmitted 	= (is_null($item->datesubmitted) ? "-----" : $item->datesubmitted);
		$datefrom 		= date("F d, Y",strtotime($item->datefrom)); 
		$dateto 		= date("F d, Y",strtotime($item->dateto));
		$dayfrom 		= date("j",strtotime($item->datefrom));
		$dayto 			= date("j",strtotime($item->dateto));
		$colspan	    = ($dayto- $dayfrom) + 9;
		$payperiod 		= $item->payperiod;
		$lastday 		= date("d",strtotime($item->dateto));
		$tkstatus		= $item->timekeepingstatus;

		if($item->timekeepingstatus==0) $timekeepingstatus = "DRAFT";
		else if($item->timekeepingstatus==1) $timekeepingstatus = "PENDING";
		else if($item->timekeepingstatus==2) $timekeepingstatus = "APPROVED";
		else if($item->timekeepingstatus==3) $timekeepingstatus = "DENIED";

		$userapproved = $item->userapproved;
		$usersubmitted = $item->usersubmitted;
	}

	$lastapprover 		= "";
	$currentapprover 	= "";
	$approvername    	= "-----";

	foreach ($data['approver'] as $item)  {
		$lastapprover = $item->lastapprover;
		$currentapprover = $item->employeeID;
		$approvername = $item->firstname.' '.$item->lastname;
	}
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
	
					<h3 class="page-title">Timekeeping</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Timekeeping</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="faq-card"  style="margin-left:auto; ">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">Upload Timesheet</a>
					</h4>
				</div>
				<div id="collapseOne" class="card-collapse collapse" style="">
					<div class="card-body">
						<form id="upload_csv" method="post" enctype="multipart/form-data">
							<div class="input-group mb-3" style="margin-bottom: 0 !important;">
	  							<div class="custom-file">
									<input type="file" class="custom-file-input" name="file" id="file" 
									<?php      if(($tkstatus==1||$tkstatus==2)) echo "disabled";
										  else if($this->session->userdata('employeeID')!=$usersubmitted && $tkstatus!=0) echo "disabled"; ?> />  
									<label class="custom-file-label" for="validatedCustomFile">Choose csv file...</label>
								</div>
							  <div class="input-group-append">
							    <span class="input-group-button ml-2" id=""><button type="submit" name="upload" id="upload" class="btn btn-success" style=" text-transform:none;width:300px; height: 95%;" 
							    		 <?php 
							    			   if(($tkstatus==1||$tkstatus==2)) echo "disabled";
										  else if($this->session->userdata('employeeID')!=$usersubmitted && $tkstatus!=0) echo "disabled"; ?> /><i class='fa fa-upload'></i> Upload Timekeeping</button></span>
							  </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row filter-row" style="margin-bottom: 20px;">
			<div class="col-lg-2 col-md-2">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Timekeeping No.</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" 
								   id="cutoff" 
								   timekeepingid="<?php echo $timekeepingID; ?>" 
								   datefrom="<?php echo $datefrom; ?>" 
								   dateto="<?php echo $dateto; ?>"
								   lastapprover="<?php echo $lastapprover; ?>"
								   payperiod="<?php echo $payperiod; ?>"><?php echo $timekeepingNo; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-lg-2 col-md-2">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Timekeeping Status</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_status"><?php echo $timekeepingstatus; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-lg-3 col-md-3">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Date Submitted</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_datesubmitted"><?php echo $datesubmitted; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-lg-3 col-md-3">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Approver</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_approver"><?php echo $approvername; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="col-lg-2 col-md-2" id="show_button">
				<?php 
					if($tkstatus==0){ 
			    		echo '<button type="button" class="btn btn-info submit" id="submittimekeeping" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit timekeeping</button>';	
		    	 	}else if($tkstatus==1){ 
		    	 		if($currentapprover!=$this->session->userdata('employeeID')) {
			    	 		if(($userapproved=="" || $userapproved==NULL) && $this->session->userdata('employeeID')==$usersubmitted){
			    	 			echo '<button type="button" class="btn btn-danger cancel" id="canceltimekeeping" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';
			    	 		}else{
			    	 			$retVal = explode("|", $userapproved);
			    	 			$isApprover = 0;

			    	 			for($i=0;$i<count($retVal);$i++){
			    	 				if($this->session->userdata('employeeID')==$retVal[$i]){
	    	 							$isApprover = 1;
		    	 						break;
			    	 				}			    	 			
			    	 			}

			    	 			if($isApprover==1){

			    	 				echo '<button type="button" class="btn btn-success approved" style="width: 100%; height: 95%;" disabled><i class="fa fa-check"></i> Approved</button>';
			    	 			}else{
			    	 				echo '<button type="button" class="btn btn-warning pending" style="width: 100%; height: 95%;" disabled><i class="fa fa-clock-o"></i> Pending</button>';
			    	 			}
			    	 		}
		    	 		}else if($currentapprover==$this->session->userdata('employeeID')) {
    						echo '<button type="button" class="btn btn-danger deny pull-right" style="width: 48%; height: 95%;"><i class="fa fa-ban"></i> <br>Deny</button>
    							  <button type="button" class="btn btn-success approve pull-right mr-1" style="width: 48%; height: 95%;"><i class="fa fa-check"></i> <br>Approve</button>';    							  
	    			 	}		
    			    }else if($tkstatus=3){ 
    			    	if($this->session->userdata('employeeID')==$usersubmitted){
    			    		echo '<button type="button" class="btn btn-info submit" id="submittimekeeping" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit timekeeping</button>';
    			    	}else{
			    			echo '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';
    			    	}
			    	}
			  	?>
			</div>	
		</div>

        <div class="row">
            <div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped custom-table table-nowrap mb-0" id="datatable" style="width:100%;">
						<thead>
							<tr>
								<th colspan="<?=$colspan;?>" style="text-align:center; color:#e04d45; text-transform: uppercase;">
									<?php echo $datefrom.' - '.$dateto; ?>
								</th>
							</tr>
							<tr>
								<th class="tsheader" style="color:#e04d45; text-align: left !important;">Employee Name</th>
								
								<?php 
									for($i=$dayfrom;$i<=$dayto;$i++){
								?>
									<th class="tsheader tsdataheader" style="color:#e04d45;font-weight: 500;"><?=$i;?></th>
								<?php } ?>

								<th class="tsheader tslastheader" style="color:#e04d45;">Total<br>Hours</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Basic<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">OT<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Night<br>Shift</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Day<br>Shift</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Rest<br>Day</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">No. of<br>Days</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($data['employee'] as $emp){
									$init 		= $dayfrom;
									$totalHours = 0;
									$basicHours = 0;
									$otHours 	= 0;
									$nightShift = 0;
									$dayShift	= 0;
									$restDay	= 0;
									$totalDays	= 0;
									$imgName	= 0;
									$exist 		= 0;

									if($emp->photo=="") $imgName = "profileimg.png";
									else $imgName = $emp->photo;

									echo '<tr>
											<td>
												<h2 class="table-avatar">
													<div class="avatar">
														<img alt="" src="uploads/'.$imgName.'">
													</div>
													<div style="font-size: 12px;">'.$emp->firstname.' '.$emp->lastname.'
														<span style="font-size: 11px;">'.str_pad($emp->employeeID, 6, "0", STR_PAD_LEFT).'</span>
													</div>
												</h2>
											</td>';

									if(count($data['timekeepingdetails'])!=0){
										foreach ($data['timekeepingdetails'] as $item){
											if($item->employeeID!=$emp->employeeID) continue;

											$exist = 1;

											for($i=$init;$i<=$lastday;$i++){
												$init++;
												if(date('d', strtotime($item->datesched))==$i){
													if($item->totalHours==0){
														echo "<td class='tsdata' style='color:#d1221c;'>LV</td>";
													}else{
														$totalHours += $item->totalHours;
														$basicHours += $item->basicHours;
														$otHours += $item->otHours;
														$totalDays++;
														echo "<td class='tsdata' style='color:#21d11c;'>".floatval($item->totalHours)."</td>";
													}
													break;
												}else{
													$restDay++;
													echo "<td class='tsdata' style='color:#1c78d1;'>RD</td>";
												}
											}
										} 
									}

									if($exist==0){
										for($i=$init;$i<=$lastday;$i++){
											$init++;
											echo "<td></td>";
										}
									}

									echo  "<td class='tsdata' >".($totalHours==0 ? "" : $totalHours)."</td>".
										  "<td class='tsdata' >".($basicHours==0 ? "" : $basicHours)."</td>".
										  "<td class='tsdata' >".($otHours==0 ? "" : $otHours)."</td>".
										  "<td class='tsdata' >".($nightShift==0 ? "" : $nightShift)."</td>".
										  "<td class='tsdata' >".($dayShift==0 ? "" : $dayShift)."</td>".
										  "<td class='tsdata' >".($restDay==0 ? "" : $restDay)."</td>".
										  "<td class='tsdata' >".($totalDays==0 ? "" : $totalDays)."</td>".
										"</tr>";
									}
								?>
						</tbody>
					</table>
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
									<h5 class="card-title">Timekeeping <small class="text-muted">11 Mar 2019</small></h5>
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

<script type="text/javascript">
	
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
	      { "width": "20px", "targets": 'tsdataheader'},
	      { "width": "40px", "targets": 'tslastheader'}
	    ]
    } );

	$('#file').change(function(){
      var name = document.getElementById('file'); 
      $(".custom-file-label").text(name.files.item(0).name);
    });

    $(document).on("click", ".approve", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve Timekeeping");
    	$('#modal_message').html("Are you sure you want to approve the timekeeping?");
    	$('.submit-btn').html("Approve timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_approvetimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});

    $(document).on("click", "#modal_approvetimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');
    	var lastapprover  = $('#cutoff').attr('lastapprover');

    	$.ajax({
		      url : "<?php echo site_url('timekeeping/approve');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID,
		      		  lastapprover:lastapprover},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	for(var i=0; i<data["timekeeping"].length; i++){
		      		var status = "-----";

		      		if(data["timekeeping"][i].timekeepingstatus==0) {
		      			status = "DRAFT";
		      		}else if(data["timekeeping"][i].timekeepingstatus==1) {
		      			status = "PENDING";
		      		}else if(data["timekeeping"][i].timekeepingstatus==2) {
		      			status = "APPROVED";
	      			}

		      		htmlStatus 			= status;
	      		}

	      		for(var i=0; i<data["approver"].length; i++){
		      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
	      		}

				htmlButton = '<button type="button" class="btn btn-success approved" style="width: 100%; height: 95%;" disabled><i class="fa fa-check"></i> Approved</button>';	
	      		
	      		$("#show_status").html(htmlStatus);
	      		$("#show_approver").html(htmlApprover);
	      		$("#show_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
	  	  		showSuccessToast("Timekeeping is successfully approved!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".deny", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title').html("Deny Timekeeping");
    	$('#modal_message').html("Are you sure you want to deny the timekeeping?");
    	$('.submit-btn').html("Deny timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_denytimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_denytimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');

    	$.ajax({
		      url : "<?php echo site_url('timekeeping/deny');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID},
		      async : true,
		      success: function(data){
		      	var htmlStatus = "DENIED";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

				htmlButton = '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';	
	      		
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		$("#show_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
	  	  		showSuccessToast("Timekeeping is successfully <b>denied!</b>");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", "#submittimekeeping", function(){

        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Submit Timekeeping");
    	$('#modal_message').html("Are you sure you want to submit the timekeeping?");
    	$('.submit-btn').html("Submit timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submittimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_submittimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');

    	$.ajax({
		      url : "<?php echo site_url('timekeeping/submit');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	if(data["timekeeping"]!=0){
		      		for(var i=0; i<data["timekeeping"].length; i++){
			      		var status = "-----";

			      		if(data["timekeeping"][i].timekeepingstatus==0) {
			      			status = "DRAFT";
			      		}else if(data["timekeeping"][i].timekeepingstatus==1) {
			      			status = "PENDING";
			      		}else if(data["timekeeping"][i].timekeepingstatus==2) {
			      			status = "APPROVED";
		      			}

			      		htmlStatus 			= status;
			      		htmlDatesubmitted 	= data["timekeeping"][i].datesubmitted;
			      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
		      		}

		      		if(htmlDatesubmitted != "-----"){
						htmlButton = '<button type="button" class="btn btn-danger cancel" id="canceltimekeeping" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';	
		      		}

		      		$("#file").prop("disabled", true);
		      		$("#upload").prop("disabled", true);
		      		$("#show_status").html(htmlStatus);
		      		$("#show_datesubmitted").html(htmlDatesubmitted);
		      		$("#show_approver").html(htmlApprover);
		      		$("#show_button").html(htmlButton);
		      		$('#modal_confirmation').modal('hide');
		      		showSuccessToast("Timekeeping is successfully <b>submitted!</b>");
		      	}else{
		      		showErrorToast(data['error']); ;
		      	}
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", "#canceltimekeeping", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Cancel Request");
    	$('#modal_message').html("Are you sure you want to cancel the timekeeping request?");
    	$('.submit-btn').html("Cancel timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_canceltimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_canceltimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');

    	$.ajax({
		      url : "<?php echo site_url('timekeeping/cancel');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID},
		      async : true,
		      success: function(data){
				var htmlStatus = "DRAFT";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = '<button type="button" class="btn btn-info submit" id="submittimekeeping" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit timekeeping</button>';

		      	$("#file").prop("disabled", false);
	      		$("#upload").prop("disabled", false);
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		$("#show_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
		  	  	showSuccessToast("Timekeeping is successfully <b>cancelled!</b>");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", "#upload", function(){
		var fileType = ".csv";
    	
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	showUploadTimekeepingError("Please select a <b>CSV</b> file.");
            return false;
        }

        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Upload Timekeeping");
    	$('#modal_message').html("Are you sure you want to upload the timekeeping?");
    	$('.submit-btn').html("Upload timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_uploadtimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_uploadtimekeeping", function(){
		$("#upload_csv").submit();
	});

	$('#upload_csv').on("submit", function(e){ 
        var fileType = ".csv";
    	
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	showUploadTimekeepingError("Please select a <b>CSV</b> file.");
            return false;
        }

        var timekeepingID = $('#cutoff').attr('timekeepingid');

		var formData = new FormData();

		formData.append('file', $("#file").get(0).files[0]);
		formData.append('timekeepingID', timekeepingID);

        e.preventDefault(); //form will not submitted  

        $.ajax({  
             url:"<?php echo site_url('timekeeping/uploadTimekeeping');?>",   
             method:"POST",  
             data:formData,  
             contentType:false,          // The content type used when sending data to the server.  
             cache:false,                // To unable request pages to be cached  
             processData:false,          // To send DOMDocument or non processed data file it is set to false  
             dataType : 'json',
             success: function(data){  
             	window.location.replace('<?php echo base_url(); ?>timekeeping');
             },
             error: function(request, textStatus, error) {

        	 } 
        });
        return false;  
   });  
});
</script>
<!-- Page Wrapper -->