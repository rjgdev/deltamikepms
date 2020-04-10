<?php
		$retirementID 	= ""; 
		$retirementNo 	= ""; 
		$datesubmitted 	= "-----"; 
		$lastday 		= "";
		$tkstatus 		= "";
		$retirementstatus = "-----";
		$userapproved	= "";
		$usersubmitted 	= "";


foreach ($data['retirement'] as $retirementdata)  {
		$retirementID  = $retirementdata->retirementID;
		$retirementNo 	= "RT-".str_pad($retirementdata->retirementID, 6, "0", STR_PAD_LEFT);
		$datesubmitted 	= (is_null($retirementdata->formatdate) ? "-----" : $retirementdata->formatdate);
		$tkstatus		= $retirementdata->retirementstatus;
		//$datesubmitted 	= date("F d, Y",strtotime($retirementdata->datesubmitted)); 

		if($retirementdata->retirementstatus==0) $retirementstatus = "DRAFT";
		else if($retirementdata->retirementstatus==1) $retirementstatus = "PENDING";
		else if($retirementdata->retirementstatus==2) $retirementstatus = "APPROVED";
		else if($retirementdata->retirementstatus==3) $retirementstatus = "DENIED";

		$userapproved = $retirementdata->userapproved;
		$usersubmitted = $retirementdata->usersubmitted;

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
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Retirement Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Retirement Process</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<form id="upload_date" method="post">
			<div class="form-group row">
				<div class="col-sm-10">
					<div class="form-group">
						<label for="adddetachment">Employee Name</label>
						<select class="form-control select2" id="employee" name="employee"  multiple="multiple" description ="Employee" style="width: 100%;" description="Client">
							<?php
							foreach($data['employee'] as $employee)
							{
							echo '<option value="'.$employee->employeeID.'">'.$employee->employeename.'</option>';
							}
							?>
						</select>
						<div class="invalid-feedback" id="search-employee"></div>
					</div>	
				</div>

				<div class="col-lg-2 col-md-2">
					<div class="form-group">
						<label for="gender">&emsp;</label>
						<div class="input-group-append"><button type="submit" name="uploaddate" id="uploaddate" class="btn btn-primary" style="border-radius: 5px; width:100%;" 
						<?php 
						if(($tkstatus==1||$tkstatus==2)) echo "disabled";
						else if($this->session->userdata('employeeID')!=$usersubmitted && $tkstatus!=0) echo "disabled"; ?>><i class="fa fa-forward"></i> PROCESS RETIREMENT</button>
						</div>
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
							Retirement No.</h5>
						<div class="dash-card-container">
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" 
								   id="cutoff" 
								   retirementID="<?php echo $retirementID; ?>" 
								   lastapprover="<?php echo $lastapprover; ?>"
								   payperiod="<?php echo $retirementNo; ?>"><?php echo $retirementNo; ?>
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
							Retirement Status</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_status">
									<?php 
										if($retirementstatus=="DENIED"){
											echo "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='".$retirementID."'>".$retirementstatus."</a>";
										}else{
											echo $retirementstatus;
										} 
									?>
							    </p>
								<!-- <p style="color:#e04d45;margin-right: 10px;" id="show_status"><?php echo $retirementstatus; ?>
							    </p>
							     -->
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
			    		echo '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit retirement</button>';	
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

			    	 				echo '<button onclick="location.reload();" type="button" class="btn btn-success approved" style="width: 100%; height: 95%;" disabled><i class="fa fa-check"></i> Approved</button>';
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
    			    		echo '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Retirement</button>';
    			    	}else{
			    			echo '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';
    			    	}
			    	}
			  	?>
			</div>						
		</div>	
	
	 <div class="row filter-row" style="margin-bottom: 40px;">
		<div class="col-lg-12">
			<div id="tabledata">
				<div class="table-responsive" id="show_data">
					<table class="table table-striped custom-table datatable" id="datatable1">
						<thead>	
							<tr>
								<th style="width: 100px ! important;"><center>Employee ID</center></th>
								<th style="width: 250px;"><center>Employee Name</center></th>
								<th class="text-left" style="width: 100px; "><center>Employee Type</center></th>
								<th class="text-left" style="width: 100px; "><center>Retirement Fund</center></th>
								<th style="width: 200px;">Last Payroll Cutoff</th>
								<th class="text-left" style="width: 80px;">Hired Date</th>
								<th style="width: 200px ! important;">Years of Service</th>
							</tr>
						</thead>
						<?php foreach ($data['recorddata'] as $record)  { ?>	
						<tbody>
                 				<td><?php echo str_pad($record->employeeID, 6, "0", STR_PAD_LEFT); ?></td>
                 				<td><?php echo $record->employeename ?><span style="color:#888;display: block; font-size: 11px;"><?php echo $record->department; ?> | <?php echo $record->designation; ?></span></td>
                 				<td><?php echo $record->employeetype ?></td>
                 				<td class="text-right"><?php echo $record->retfund ?></td>
                 				<td><?php echo $record->lastcutoff ?></td>
                 				<td><?php echo $record->hireddate ?></td>
                 				<td><?php echo $record->yearofwork ?></td>
           				 </tbody>
           				<?php } ?>
					</table>
				</div>
			</div>	
		
			
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
								<button class="btn btn-primary submit-btn" style="text-transform: capitalize;"></a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" style="text-transform: capitalize;"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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
						<div class="invalid-feedback" id="billing-reason"></div>
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


<script  type="text/javascript">  
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});
	
	$(document).ready(function() {
		$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
		});

		$(document).on("click", "#uploaddate", function(){
			var employee =   $("#employee").val();	
       	if(employee==""){
	        	document.getElementById("search-employee").innerHTML = "Please provide an employee.";
	        	$('#employee').addClass('is-invalid');
                event.preventDefault();
	        }
	        else{
	        	document.getElementById("search-employee").innerHTML = "";
	        	$('#employee').removeClass('is-invalid');
	        	$('#employee').addClass('is-valid'); 
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Process Retirement");
    	$('#modal_message').html("Are you sure you want to process the retirement?");
    	$('.submit-btn').html("Process Retirement");
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
       	var id  = $('#cutoff').attr('retirementID');	
       	var employee =   $("#employee").val();

     
       		$.ajax({
				url : "<?php echo site_url('Retirementprocess/search_Retirement');?>",
				method : "POST",
				data : {id: 				id,
						employee: 			employee},
				async : true,
				dataType : 'json',
				beforeSend:function(){

				},
				success: function(response){
					$('#modal_confirmation').modal('hide');
					showSuccessToast("The retirement is successfully processed!");				
			},
		 error: function(request, textStatus, error) {
	     }	
		});
			return false;
		});				

	$(document).on("click", "#submitthrmonth", function(){

        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Submit Retirement");
    	$('#modal_message').html("Are you sure you want to submit the retirement?");
    	$('.submit-btn').html("Submit Retirement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submitthrmonth");
        $('#modal_confirmation').modal('show');
		return false;
	});
		$(document).on("click", "#modal_submitthrmonth", function(){
    	var retirementID = $('#cutoff').attr('retirementID');
    		var html ="";
    		$.ajax({
		      url : "<?php echo site_url('Retirementprocess/submit');?>",
		      method : "POST",
		      data : {retirementID:retirementID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";
		      	html =  '<table class="table table-striped custom-table datatable" id="datatable1">' +
							'<thead>' +	
								'<tr>' +
									'<th style="width: 100px ! important;"><center>Employee ID</center></th>' +
									'<th style="width: 250px;"><center>Employee Name</center></th>' +
									'<th class="text-left" style="width: 100px; "><center>Employee Type</center></th>' +
									'<th class="text-left" style="width: 100px; "><center>Retirement Fund</center></th>' +
									'<th style="width: 200px;">Last Payroll Cutoff</th>' +
									'<th class="text-left" style="width: 80px;">Hired Date</th>' +
									'<th style="width: 200px ! important;">Years of Service</th>' +
								'</tr>' +
							'</thead>' +
							'<tbody>';
		      	if(data["retirement"]!=0){
		      		for(var i=0; i<data["retirement"].length; i++){
			      		var status = "-----";
			      		status 				= 	data["retirement"][i].retirementstatus1;
			      		htmlStatus 			= status;
			      		htmlDatesubmitted 	= data["retirement"][i].formatdate;
			      		/*htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;*/
		      		}
		      		for(var i=0; i<data["approver"].length; i++){
		      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;

	      		}

		      		if(htmlDatesubmitted != "-----"){
						htmlButton = '<button type="button" class="btn btn-danger cancel" id="cancel13thmonth" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';	
		      		}
		      		for(var i=0; i<data["recorddata"].length; i++){
						html += '<tr>' +
    								'<td>' + data["recorddata"][i].employeeID.padStart(6,'0') + '</td>' +
    								'<td>' + data["recorddata"][i].employeename + 
    								'<span style="color:#888;display: block; font-size: 11px;">'+ data["recorddata"][i].department +' | '+ data["recorddata"][i].designation +'</span>'+
    								'</td>' +
    								'<td>' + data["recorddata"][i].employeetype + '</td>' +
    								'<td>' +  accounting.formatMoney(data["recorddata"][i].retfund) + '</td>' +
    								'<td>' + data["recorddata"][i].lastcutoff + '</td>' +
    								'<td>' + data["recorddata"][i].hireddate + '</td>' +
    								'<td>' + data["recorddata"][i].yearofwork + '</td>' +
    							'</tr>';			
				}	
					html += '</tbody></table>';
			        if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };
			       
		      		$("#uploaddate").prop("disabled", true);
		      		$("#show_status").html(htmlStatus);
		      		$("#show_datesubmitted").html(htmlDatesubmitted);
		      		$("#show_data").html(html);
		      		$("#show_approver").html(htmlApprover);
		      		$("#show_button").html(htmlButton);
		      		 $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
				        fixedColumns:   {
						   /* leftColumns: 2,
						    rightColumns: 1*/
						}
				    });
		      		
		      		$('#modal_confirmation').modal('hide');
		      		showSuccessToast("Retirement is successfully <b>submitted!</b>");

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
    	$('#modal_message').html("Are you sure you want to cancel the retirement request?");
    	$('.submit-btn').html("Cancel Retirement ");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_canceltimekeeping");
        $('#modal_confirmation').modal('show');
		return false;
	});	
	$(document).on("click", "#modal_canceltimekeeping", function(){
    	var retirementID = $('#cutoff').attr('retirementID');
    	var html ="";
    	$.ajax({
		      url : "<?php echo site_url('Retirementprocess/cancel');?>",
		      method : "POST",
		      data : {retirementID:retirementID},
		      async : true,

		      success: function(data){
		      	html =  '<table class="table table-striped custom-table datatable" id="datatable1">' +
							'<thead>' +	
								'<tr>' +
									'<th style="width: 100px ! important;"><center>Employee ID</center></th>' +
									'<th style="width: 250px;"><center>Employee Name</center></th>' +
									'<th class="text-left" style="width: 90px;"><center>Department</center></th>' +
									'<th class="text-left" style="width: 90px;"><center>Designation</center></th>' +
									'<th class="text-left" style="width: 100px; "><center>Employee Type</center></th>' +
									'<th class="text-left" style="width: 100px; "><center>Retirement Fund</center></th>' +
									'<th style="width: 200px;">Last Payroll Cutoff</th>' +
									'<th class="text-left" style="width: 80px;">Hired Date</th>' +
									'<th style="width: 200px ! important;">Years of Service</th>' +
								'</tr>' +
							'</thead>';
							html += '<tbody></tbody></table>';	
				var htmlStatus = "DRAFT";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = '<button type="button" class="btn btn-info submit" id="submitthrmonth" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Retirement </button>';

		      	/*$("#collapseOne").prop("disabled", false);*/
	      		$("#uploaddate").prop("disabled", false);
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		$("#show_data").html(html);
	      		$("#show_button").html(htmlButton);
	      		 if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };
			    $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
				        fixedColumns:   {
						    leftColumns: 2,
						    rightColumns: 1
						}
				    });    

	      		$('#modal_confirmation').modal('hide');
		  	  	showSuccessToast("Retirement  is successfully <b>cancelled!</b>");
		      },
		      error: function(request, textStatus, error) {
		      }
     	 });
         return false;

	});
		//DENY 
	$(document).on("click", ".deny", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title1').html("Deny retirement");
    	$('#modal_message1').html("Are you sure you want to deny the Retirement?");
    	$('.submit-btn').html("Deny Retirement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_deny13thmonth");
        $('#modal_confirmationdeny').modal('show');
		return false;
	});
	$(document).on("click", "#modal_deny13thmonth", function(){
    	var retirementID = $('#cutoff').attr('retirementID');
    	 var reason         =   $("#reason").val();
    	
     if(reason==""){
	        	document.getElementById("billing-reason").innerHTML = "Please enter a reason!";
	        	$('#reason').addClass('is-invalid');
	        	$("#reason").focus(); 
                event.preventDefault();
                return false;
	        }else{
	       		document.getElementById("billing-reason").innerHTML = "";
	        	$('#reason').removeClass('is-invalid');
	        	$('#reason').addClass('is-valid');
	        	$("#reason").focus();
	        }
    	$.ajax({
		      url : "<?php echo site_url('Retirementprocess/deny');?>",
		      method : "POST",
		      data : {retirementID:retirementID, reason: reason},
		      async : true,
		      success: function(data){
		      	var htmlStatus = "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='" + retirementID + "'>DENIED</a>";
		      	/*var htmlStatus = "DENIED";*/
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

				htmlButton = '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';	
	      		
	      		$("#show_status").html(htmlStatus);
	      		$("#show_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_approver").html(htmlApprover);
	      		// $("#show_data").html(html);
	      		$("#show_button").html(htmlButton);
	      		$('#modal_confirmationdeny').modal('hide');
	  	  		showSuccessToast("Retirement is successfully <b>denied!</b>");
		      },
		      error: function(request, textStatus, error) {
		      }
     	 });
         return false;
	});	
	$(document).on("click", ".approve", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve Retirement Process");
    	$('#modal_message').html("Are you sure you want to approve the Retirement ?");
    	$('.submit-btn').html("Approve Retirement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_approve13thmonth");
        $('#modal_confirmation').modal('show');
		return false;
	});
	 $(document).on("click", "#modal_approve13thmonth", function(){
    	var retirementID = $('#cutoff').attr('retirementID');
    	var lastapprover  = $('#cutoff').attr('lastapprover');

    	$.ajax({
		      url : "<?php echo site_url('Retirementprocess/approve');?>",
		      method : "POST",
		      data : {retirementID:retirementID,
		      		  lastapprover:lastapprover},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	for(var i=0; i<data["retirement"].length; i++){
		      		var status = "-----";

		      		status = data["retirement"][i].retirementstatus1; 
/*
		      		if(data["retirement"][i].timekeepingstatus==0) {
		      			status = "DRAFT";
		      		}else if(data["retirement"][i].timekeepingstatus==1) {
		      			status = "PENDING";
		      		}else if(data["retirement"][i].timekeepingstatus==2) {
		      			status = "APPROVED";
	      			}*/

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
	  	  		showSuccessToast("Retirement is successfully approved!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;

    });
	 $(document).on("click", ".denied_info", function(){
		var retirementID = $('#cutoff').attr('retirementID');
		
    	$.ajax({
		      url : "<?php echo site_url('Retirementprocess/getdenied');?>",
		      method : "POST",
		      data : {retirementID:retirementID},
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