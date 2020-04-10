<?php
		$thrmonthID 	= ""; 
		$thrmonthNo 	= ""; 
		$datesubmitted 	= "-----"; 
		$datefrom 		= ""; 
		$dateto 		= "";
		$dayfrom		= "";
		$dayto			= "";
		$colspan 		= "";
		$payperiod 		= "";
		$lastday 		= "";
		$tkstatus 		= "";
		$thrmonthstatus = "-----";
		$userapproved	= "";
		$usersubmitted 	= "";
		$employeerecord = "";


foreach ($data['thrmonth'] as $thnonthdata)  {
		$thrmonthID  = $thnonthdata->thrmonthID;
		$employeerecord = $thnonthdata->employeerecord;
		$thrmonthNo 	= "THR-".str_pad($thnonthdata->thrmonthID, 6, "0", STR_PAD_LEFT);
		$datesubmitted 	= (is_null($thnonthdata->formatdate) ? "-----" : $thnonthdata->formatdate);
		$datefrom 		= date("F d, Y",strtotime($thnonthdata->datefrom)); 
		$dateto 		= date("F d, Y",strtotime($thnonthdata->dateto));
		$dayfrom 		= date("j",strtotime($thnonthdata->datefrom));
		$dayto 			= date("j",strtotime($thnonthdata->dateto));
		$colspan	    = ($dayto- $dayfrom) + 9;
		$lastday 		= date("d",strtotime($thnonthdata->dateto));
		$tkstatus		= $thnonthdata->thrmonthstatus;

		if($thnonthdata->thrmonthstatus==0) $thrmonthstatus = "DRAFT";
		else if($thnonthdata->thrmonthstatus==1) $thrmonthstatus = "PENDING";
		else if($thnonthdata->thrmonthstatus==2) $thrmonthstatus = "APPROVED";
		else if($thnonthdata->thrmonthstatus==3) $thrmonthstatus = "DENIED";

		$userapproved = $thnonthdata->userapproved;
		$usersubmitted = $thnonthdata->usersubmitted;

}
	$lastapprover 		= "";
	$currentapprover 	= "";



	$approvername    	= "-----";


foreach ($data['approver'] as $approvaldata)  {
		$lastapprover = $approvaldata->lastapprover;
		$currentapprover = $approvaldata->employeeID;
		$approvername = $approvaldata->firstname.' '.$approvaldata->lastname;
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
					<h3 class="page-title">13th Month Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">13th Month Process</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<form id="upload_date" method="post">
			<div class="form-group row" style="margin-bottom: 0px!important">
				<div class="col-sm-3">
					<div class="form-group form-focus select-focus">
						<select id="sddlmonth" name="sddlmonth" class="form-control select2" style="width: 100%;" required="required"/>
								<option value="01"/>January</option>
								<option value="02"/>February</option>
								<option value="03"/>March</option>
								<option value="04"/>April</option>
								<option value="05"/>May</option>
								<option value="06"/>June</option>
								<option value="07"/>July</option>
								<option value="08"/>August</option>
								<option value="09"/>September</option>
								<option value="10"/>October</option>
								<option value="11"/>November</option>
								<option value="12"/>December</option>
						</select>
						<label class="focus-label">Start Month</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group form-focus select-focus">
						<select id="sddlyear" name="sddlyear" class="form-control select2" style="width: 100%;" required="required">
							<option value="">Select Year</option>
							<?php for($y = date('Y'); $y >= 2009; $y--){ ?>
							<option value="<?php echo $y; ?>" <?php if($y == date('Y')) { echo 'selected'; }else{ echo '0'; } ?>><?php echo $y; ?></option>
							<?php } ?>		
						</select>
						<label class="focus-label">Start Year</label>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group form-focus select-focus">
						<select id="eddlmonth" name="eddlmonth" class="form-control select2" style="width: 100%;" required="required"/>
								<option value="01" <?php if(date("m") == "01") echo "selected"; ?> />January</option>
								<option value="02" <?php if(date("m") == "02") echo "selected"; ?> />February</option>
								<option value="03" <?php if(date("m") == "03") echo "selected"; ?> />March</option>
								<option value="04" <?php if(date("m") == "04") echo "selected"; ?> />April</option>
								<option value="05" <?php if(date("m") == "05") echo "selected"; ?> />May</option>
								<option value="06" <?php if(date("m") == "06") echo "selected"; ?> />June</option>
								<option value="07" <?php if(date("m") == "07") echo "selected"; ?> />July</option>
								<option value="08" <?php if(date("m") == "08") echo "selected"; ?> />August</option>
								<option value="09" <?php if(date("m") == "09") echo "selected"; ?> />September</option>
								<option value="10" <?php if(date("m") == "10") echo "selected"; ?> />October</option>
								<option value="11" <?php if(date("m") == "11") echo "selected"; ?> />November</option>
								<option value="12" <?php if(date("m") == "12") echo "selected"; ?> />December</option>
						</select>
						<label class="focus-label">End Month</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-group form-focus select-focus">
						<select id="eddlyear" name="eddlyear" class="form-control select2" style="width: 100%;" required="required">
							<option value="">Select Year</option>
							<?php for($y = date('Y'); $y >= 2009; $y--){ ?>
							<option value="<?php echo $y; ?>" <?php if($y == date('Y')) { echo 'selected'; }else{ echo '0'; } ?>><?php echo $y; ?></option>
							<?php } ?>		
						</select>
						<label class="focus-label">End Year</label>
					</div>
				</div>
				<div class="col-lg-2 col-md-2">
					 <div class="form-group form-focus select-focus">
					    	<button type="submit" name="uploaddate" id="uploaddate" class="btn btn-primary" style="border-radius: 5px; width:100%; height: 95%;" 	 
					    		 <?php 
					    		if(($tkstatus==1||$tkstatus==2)) echo "disabled";
								else if($this->session->userdata('employeeID')!=$usersubmitted && $tkstatus!=0) echo "disabled"; ?> /> <i class="fa fa-forward"></i> PROCESS 13TH MONTH </button>
 					</div>
				</div>
			</div>
		</form>

<div class="row filter-row" style="margin-bottom: 20px;">
			<div class="col-lg-2 col-md-2">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							13th Month Number</h5>
						<div class="dash-card-container">
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" 
								   id="cutoff" 
								   thrmonthid="<?php echo $thrmonthID; ?>" 
								   employeerecord="<?php echo $employeerecord; ?>" 
								   datefrom="<?php echo $datefrom; ?>" 
								   dateto="<?php echo $dateto; ?>"
								   lastapprover="<?php echo $lastapprover; ?>"
								   payperiod="<?php echo $thrmonthNo; ?>"><?php echo $thrmonthNo; ?>
							    </p>
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
							13th Month Status</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_status">
									<?php 
										if($thrmonthstatus=="DENIED"){
											echo "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='".$thrmonthID."'>".$thrmonthstatus."</a>";
										}else{
											echo $thrmonthstatus;
										} 
									?>
							    </p>
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
			    		echo '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit 13th Month</button>';	
		    	 	}else if($tkstatus==1){ 
		    	 		if($currentapprover!=$this->session->userdata('employeeID')) {
			    	 		if(($userapproved=="" || $userapproved==NULL) && $this->session->userdata('employeeID')==$usersubmitted){
			    	 			echo '<button type="button" class="btn btn-danger cancel" id="cancel13thmonth" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';
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
    			    		echo '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit 13th Month</button>';
    			    	}else{
			    			echo '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';
    			    	}
			    	}
			  	?>
			</div>						
</div>

	<div class="row filter-row">
		<div class="col-lg-12">
			<div class="table-responsive" id="show_data">
				<table class="table table-striped custom-table datatable" id="datatable1">
					<thead>		
						<tr>
							<th style="width: 100px ! important;"><center>Employee ID</center></th>
							<th style="width: 180px;"><center>Employee Name</center></th>
							<th class="text-right" style="width: 100px; font-size:11px;"><center>Employee Type</center></th>
							<th style="width: 150px;"><center>Month</center></th>
							<th class="text-right" style="width: 120px; font-size:11px;"><center>Lates</center></th>
							<th class="text-right" style="width: 120px; font-size:11px;"><center>Absences</center></th>
							<th class="text-right" style="width: 120px; font-size:11px;"><center>Total 13th Month</center></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($data['recorddata'] as $data) : ?>	
						 <tr>
             				<td><?php echo str_pad($data->employeeID, 6, "0", STR_PAD_LEFT); ?></td>
             				<td><?php echo $data->employeename; ?><span style="color:#888;display: block; font-size: 11px;"><?php echo $data->department; ?> | <?php echo $data->designation; ?></span></td>
             				<td><?php echo $data->employeetype; ?></td>
             				<td><?php echo $data->datepayrol; ?></td>
             				<td  class="text-right"><?php echo number_format($data->late, 4, '.', ','); ?></td>
             				<td  class="text-right"><?php echo number_format($data->absent, 2, '.', ',');?></td>
             				<td  class="text-right"><?php echo number_format($data->thrmonth, 2, '.', ','); ?></td>
       				 	</tr>
       				 	 <?php endforeach; ?>	
       				</tbody>
				</table>
			</div>	
		</div>	
	</div>
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

	<div class="modal custom-modal fade" id="modal_confirmationdeny" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric">
						<h3 id="modal_title1"></h3>
						<p id="modal_message1"></p>
						 <div class="form-group" style = "text-align: left;"> 
						<label class="text-danger">Please enter a reason:</label>
						<textarea rows="4" id="reason" type="text" name="reason" class="form-control input alphanumericwithspace"placeholder="Please enter a reason" autocomplete="off" description="city/municipality"></textarea>
						<div class="invalid-feedback" id="thmonth-reason"></div>
						</div>
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

	<!-- Denied Modal -->
<div class="modal custom-modal fade" id="denied_info" role="dialog">
	<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Denied Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="card" style="border-style: none !important;  margin-bottom:0px;">
							<div class="card-body" style="padding: .25rem !important;">
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td style="color:#e04d45; width:100px;">Denied date:</td>
											<td class="text-left" id="deny_date"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Denied by:</td>
											<td class="text-left" id="deny_approver"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Reason:</td>
											<td class="text-left" id="deny_reason"></td>
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

<!-- /Confirmation Modal -->
<span><?php if($this->session->flashdata('empstatus')=="empsuccess") echo '<script type="text/javascript"> showdataSuccess13thToast() </script>';?></span>

<script  type="text/javascript">  
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});

	$(document).ready(function() {
		$("#export_excel").click(function() {
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
		});
	$(document).on("click", ".approve", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve 13th Month Process");
    	$('#modal_message').html("Are you sure you want to approve the 13th Month ?");
    	$('.submit-btn').html("Approve 13th Month");
    	$('.cancel-btn').html("Cancel 13th Month");
    	$('.submit-btn').attr("id","modal_approve13thmonth");
        $('#modal_confirmation').modal('show');
		return false;
	});
	    $(document).on("click", "#modal_approve13thmonth", function(){
    	var thrmonthid = $('#cutoff').attr('thrmonthid');
    	var lastapprover  = $('#cutoff').attr('lastapprover');


    	$.ajax({
		      url : "<?php echo site_url('Thirteenmonthprocess/approve');?>",
		      method : "POST",
		      data : {thrmonthid:thrmonthid,
		      		  lastapprover:lastapprover},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	for(var i=0; i<data["thrmonth"].length; i++){
		      		var status = "-----";
		      		status 	= data["thrmonth"][i].thrmonthstatus;
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
	  	  		showSuccessToast("13th month is successfully approved!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;

    });
	$(document).on("click", "#uploaddate", function(){
				var sddlmonth =   $("#sddlmonth").val();
				var sddlyear = $("#sddlyear").val();
				var eddlmonth = $("#eddlmonth").val();
				var eddlyear = $("#eddlyear").val();
				var checkerrorfrom = (sddlyear+ +sddlmonth);
				var checkerrorto =  (eddlyear+ +eddlmonth);
				
		if(checkerrorfrom > checkerrorto){
			showErrorToast("Invalid date selected!");
			event.preventDefault();
			return false;
		}else{
 		event.preventDefault();			
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Process 13th Month");
    	$('#modal_message').html("Are you sure you want to process the 13th month?");
    	$('.submit-btn').html("Process 13th month");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_uploaddate");
        $('#modal_confirmation').modal('show');
        return false;
		}
	});
	$(document).on("click", "#modal_uploaddate", function(){
		$("#upload_date").submit();
	});

	$('#upload_date').on("submit", function(e){ 
				var id  = $('#cutoff').attr('thrmonthid');
				var sddlmonth =   $("#sddlmonth").val();
				var sddlyear = $("#sddlyear").val();
				var eddlmonth = $("#eddlmonth").val();
				var eddlyear = $("#eddlyear").val();
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthprocess/search_Thirteenmonthprocess');?>",
				method : "POST",
				data : {id: 				id,
						sddlmonth: 		 	sddlmonth, 			sddlyear: 			sddlyear,	 
						eddlmonth: 	 	 	eddlmonth, 			eddlyear: 			eddlyear},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					
				},
				success: function(response){
					window.location.replace('<?php echo base_url(); ?>Thirteenmonthprocess');
					$('#modal_confirmation').modal('hide');
					//showSuccessToast("The 13th month has been successfully processed.");
				
					
			},
		 error: function(request, textStatus, error) {
	     }	
		});
			return false;
		});				
			
		$(document).on("click", "#submitthrmonth", function(){

        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Submit 13th Month");
    	$('#modal_message').html("Are you sure you want to submit the 13th month?");
    	$('.submit-btn').html("Submit 13th month");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submitthrmonth");
        $('#modal_confirmation').modal('show');
		return false;
	});
		$(document).on("click", "#modal_submitthrmonth", function(){
    	var thrmonthID = $('#cutoff').attr('thrmonthid');
    	var employeerecord = $('#cutoff').attr('employeerecord');
    	var html = "";
    	if(employeerecord==0){
			showErrorToast("There is no data to be processed, please select again.");
			$('#modal_confirmation').modal('hide');
			 event.preventDefault();
            return false;
       			
			}else{
				 event.preventDefault();
			}

		
    		
    		$.ajax({
		      url : "<?php echo site_url('Thirteenmonthprocess/submit');?>",
		      method : "POST",
		      data : {thrmonthID:thrmonthID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";
		      	html ='<table class="table table-striped custom-table datatable" id="datatable1">' +
							'<thead>' +		
								'<tr>' +
									'<th style="width: 100px ! important;"><center>Employee ID</center></th>' +
									'<th style="width: 180px;"><center>Employee Name</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Employee Type</center></th>' +
									'<th style="width: 150px;"><center>Month</center></th>' +
									'<th class="text-right" style="width: 120px; font-size:11px;"><center>Lates</center></th>' +
									'<th class="text-right" style="width: 120px; font-size:11px;"><center>Absences</center></th>' +
									'<th class="text-right" style="width: 120px; font-size:11px;"><center>Total 13th Month</center></th>' +
								'</tr>' +
							'</thead>';
		      	if(data["thrmonth"]!=0){
		      		for(var i=0; i<data["thrmonth"].length; i++){
			      		var status = "-----";
			      		status 	= data["thrmonth"][i].thrmonthstatus;
			      		htmlStatus 			= status;
			      		htmlDatesubmitted 	= data["thrmonth"][i].formatdate;
			      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
		      		}

		      		if(htmlDatesubmitted != "-----"){
						htmlButton = '<button type="button" class="btn btn-danger cancel" id="cancel13thmonth" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';	
		      		}
		      			html += '<tbody>';
		      		for(var i=0; i<data["recorddata"].length; i++){
						html += '<tr>' +
    								'<td>' + data["recorddata"][i].employeeID.padStart(6,'0') + '</td>' +
    								'<td>' + data["recorddata"][i].employeename + 
    								'<span style="color:#888;display: block; font-size: 11px;">'+ data["recorddata"][i].department +' | '+ data["recorddata"][i].designation +'</span>'+
    								'</td>' +
    								'<td>' + data["recorddata"][i].employeetype + '</td>' +
    								'<td>' + data["recorddata"][i].datepayrol + '</td>' +
    								'<td>' +  accounting.formatMoney(data["recorddata"][i].late) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["recorddata"][i].absent) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["recorddata"][i].thrmonth) + '</td>' +
    							'</tr>';			
					}	
					html += '</tbody></table>';
			    	if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };

		      		/*$("#collapseOne").prop("hide", true);*/
		      		$("#uploaddate").prop("disabled", true);
		      		$("#show_status").html(htmlStatus);
		      		$("#show_data").html(html);
		      		$("#show_datesubmitted").html(htmlDatesubmitted);
		      		$("#show_approver").html(htmlApprover);
		      		$("#show_button").html(htmlButton);
		      	
		      		$('#datatable1').DataTable({
				        scrollX: false,
			        	scrollCollapse: false,
				        fixedColumns:   {
						   /* leftColumns: 2,
						    rightColumns: 1*/
						}
				    });

		      		$('#modal_confirmation').modal('hide');
		      		showSuccessToast("The 13th month process has been submitted successfully.");
		      	}else{
		      		$('#modal_confirmation').modal('hide');
		      		showErrorToast(data['error']); ;
		      	}
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;

    });
	$(document).on("click", "#cancel13thmonth", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Cancel Request");
    	$('#modal_message').html("Are you sure you want to cancel the 13th month request?");
    	$('.submit-btn').html("Cancel 13th month ");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_canceltimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});	
	$(document).on("click", "#modal_canceltimekeeping", function(){
    	var thrmonthid = $('#cutoff').attr('thrmonthid');
    	var html ="";
    	$.ajax({
		      url : "<?php echo site_url('Thirteenmonthprocess/cancel');?>",
		      method : "POST",
		      data : {thrmonthid:thrmonthid},
		      async : true,
		      success: function(data){
		      		/*tml ='<table class="table table-striped custom-table datatable" id="datatable1">' +
							'<thead>' +		
								'<tr>' +
									'<th style="width: 100px ! important;"><center>Employee ID</center></th>' +
									'<th style="width: 180px;"><center>Employee Name</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Department</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Designation</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Employee Type</center></th>' +
									'<th style="width: 150px;"><center>13th Month</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Lates</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Absences</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Total 13th Month</center></th>' +
								'</tr>' +
							'</thead>' +
							'<tbody>';

					html +='</tbody></table>';	*/
				var htmlStatus = "DRAFT";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit 13th month </button>';

		      	/*$("#collapseOne").prop("disabled", false);*/
	      		$("#uploaddate").prop("disabled", false);
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		/*$("#show_data").html(html);*/
	      		$("#show_button").html(htmlButton);
	      		if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };
			    $('#datatable1').DataTable({
				        scrollX: false,
			        	scrollCollapse: false,
				        fixedColumns:   {
						    /*leftColumns: 2,
						    rightColumns: 1*/
						}
				});   
	      		$('#modal_confirmation').modal('hide');
		  	  	showSuccessToast("13th month  is successfully <b>cancelled!</b>");
		      },
		      error: function(request, textStatus, error) {
		      }
     	 });
         return false;

	});
		//DENY 
	$(document).on("click", ".deny", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title1').html("Deny 13th month");
    	$('#modal_message1').html("Are you sure you want to deny the 13th month?");
    	$('.submit-btn').html("Deny 13th month");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_deny13thmonth");
        $('#modal_confirmationdeny').modal('show');
		return false;
	});
	$(document).on("click", "#modal_deny13thmonth", function(){
    	var thrmonthID = $('#cutoff').attr('thrmonthid');
    	var reason         =   $("#reason").val();
    	
     if(reason==""){
	        	document.getElementById("thmonth-reason").innerHTML = "Please enter a reason!";
	        	$('#reason').addClass('is-invalid');
	        	$("#reason").focus(); 
                event.preventDefault();
                return false;
	        }else{
	       		document.getElementById("thmonth-reason").innerHTML = "";
	        	$('#reason').removeClass('is-invalid');
	        	$('#reason').addClass('is-valid');
	        	$("#reason").focus();
	        }
    	$.ajax({
		      url : "<?php echo site_url('Thirteenmonthprocess/deny');?>",
		      method : "POST",
		      data : {thrmonthID:thrmonthID, reason: reason},
		      async : true,
		      success: function(data){
		      	 var htmlStatus = "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='" + thrmonthID + "'>DENIED</a>";
		      	/*var htmlStatus = "DENIED";*/
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

				htmlButton = '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';	
	      		
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		$("#show_button").html(htmlButton);
	      		$('#modal_confirmationdeny').modal('hide');
	  	  		showSuccessToast("13th Month is successfully <b>denied!</b>");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});
	$(document).on("click", ".denied_info", function(){
		
		var thrmonthID = $('#cutoff').attr('thrmonthid');
		
    	$.ajax({
		      url : "<?php echo site_url('Thirteenmonthprocess/getdenied');?>",
		      method : "POST",
		      data : {thrmonthID:thrmonthID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var datedenied 	= data[0]["datedenied"];

		      	$("#deny_date").html(datedenied);
		      	$("#deny_approver").html(data[0]["fullname"]);
		      	$("#deny_reason").html(data[0]["reason"]);
         	  },
              error: function(request, textStatus, error) {

        	  } 
        });
        return false; 
	}); 

   });	
</script>		