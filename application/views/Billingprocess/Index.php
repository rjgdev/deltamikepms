	<?php
		$billingID 	= ""; 
		$billingNo 	= ""; 
		$datesubmitted 	= "-----"; 
		$payperiod 		= "";
		$tkstatus 		= "";
		$thrmonthstatus = "-----";
		$userapproved	= "";
		$usersubmitted 	= "";
		$clientrecord   = "";


foreach ($data['billingstatement'] as $billingdata)  {
		$billingID  = $billingdata->billingID;
		$clientrecord  = $billingdata->clientrecord;
		$billingNo 	= "BS-".str_pad($billingdata->billingID, 6, "0", STR_PAD_LEFT);
		$datesubmitted 	= (is_null($billingdata->formatdate) ? "-----" : $billingdata->formatdate);
		$tkstatus		= $billingdata->billingstatus;

		if($billingdata->billingstatus==0) $billingstatus = "DRAFT";
		else if($billingdata->billingstatus==1) $billingstatus = "PENDING";
		else if($billingdata->billingstatus==2) $billingstatus = "APPROVED";
		else if($billingdata->billingstatus==3) $billingstatus = "DENIED";

		$userapproved = $billingdata->userapproved;
		$usersubmitted = $billingdata->usersubmitted;

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
					<h3 class="page-title">Billing Statement Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Billing Statement Process</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<form id="upload_date" method="post">
			<div class="form-group row" style="margin-bottom: 0px!important">
				<div class="col-lg-5 col-md-5">
					<div class="form-group form-focus select-focus">
						<select class="form-control select2" id="searchpayperiod" name="searchpayperiod" style="width: 100%;" description="Client" required>
							<option value="0">Select billing period</option>
							<?php foreach($data['dropdowndate'] as $payroll)
								{
								echo '<option value="'.$payroll->payrollID.'">'.$payroll->dateformat.'</option>';
								}
							?> 
						</select>
						<div class="invalid-feedback" id="search-searchpayperiod"></div>
						<label class="focus-label">Billing Date</label>
					</div>
				</div>
				<div class="ol-lg-5 col-md-5">
					<div class="form-group form-focus select-focus">
						<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
							<option value="0">Select a client</option>
							<?php foreach($data['client'] as $client)
								{
								echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
								}
							?> 
						</select>
						<div class="invalid-feedback" id="search-searchclient"></div>
						<label class="focus-label">Client</label>
					</div>
				</div>
				<div class="col-lg-2 col-md-2">
						<div class="form-group">
		  				<div class="input-group-append">
					    	<button type="submit" name="uploaddate" id="uploaddate" class="btn btn-primary" style="border-radius: 5px; width: 100%; height: 90%; font-size: 10px; text-align:center" 	 
					    		 <?php 
					    		if(($tkstatus==1||$tkstatus==2)) echo "disabled";
								else if($this->session->userdata('employeeID')!=$usersubmitted && $tkstatus!=0) echo "disabled"; ?> /><i class="fa fa-forward"></i> PROCESS BILLING STATEMENT </button>
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
							Billing Statement Number</h5>
						<div class="dash-card-container">
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" 
								   id="cutoff" 
								   billingid="<?php echo $billingID; ?>" 
								   clientrecord="<?php echo $clientrecord; ?>" 
								   lastapprover="<?php echo $lastapprover; ?>"
								   payperiod="<?php echo $billingNo; ?>"><?php echo $billingNo; ?>
							    </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title"><i class="la la-dashboard"></i> Billing Statement Status</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_status">
									<?php 
										if($billingstatus=="DENIED"){
											echo "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='".$billingID."'>".$billingstatus."</a>";
										}else{
											echo $billingstatus;
										} 
									?>
							    </p>
								<!-- <p style="color:#e04d45;margin-right: 10px;" id="show_status"><?php echo $billingstatus; ?>
							    </p> -->
							    
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
			    		echo '<button type="button" class="btn btn-info submit" id="submitbilling" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Billing Statement</button>';	
		    	 	}else if($tkstatus==1){ 
		    	 		if($currentapprover!=$this->session->userdata('employeeID')) {
			    	 		if(($userapproved=="" || $userapproved==NULL) && $this->session->userdata('employeeID')==$usersubmitted){
			    	 			echo '<button type="button" class="btn btn-danger cancel" id="cancelbilling" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';
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
    			    		echo '<button type="button" class="btn btn-info submit" id="submitbilling" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Billing Statement</button>';
    			    	}else{
			    			echo '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';
    			    	}
			    	}
			  	?>
			</div>						
		</div>

		<div class="row filter-row" style="margin-bottom: 40px;">
			<div class="col-lg-12">
				<div class="table-responsive" id="show_data">
					<table class="table table-striped custom-table datatable" id="datatable1">
						<thead>		
							<tr>
								<th style="width: 100px ! important;"><center>Client Name</center></th>
								<th style="width: 180px;"><center>Detachment</center></th>
								<th class="text-right" style="width: 90px; font-size:11px;"><center>Billing Date</center></th>
								<th class="text-right" style="width: 90px; font-size:11px;"><center>Security Officer</center></th>
								<th class="text-right" style="width: 100px; font-size:11px;"><center>Security Guards</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>SSS</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>PHIC</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>HDMF</center></th>
								<th class="text-right" style="width: 100px; font-size:11px;"><center>Insurance/ECC</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>Overhead Margin</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>Subtotal</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>Taxable</center></th>
								<th class="text-right" style="width: 60px; font-size:11px;"><center>Tax Due</center></th>
								<!-- <th style="width: 180px;"><center>Reason</center></th> -->
							</tr>
						</thead>
						<tbody>
							<?php foreach($data['recorddata'] as $record) : ?>	
							 <tr>
                 				<td><?php echo $record->clientname; ?></td>
                 				<td><?php echo $record->detachment; ?></td>
                 				<td><?php echo $record->rangedate; ?></td>
                 				<td><?php echo number_format($record->basicsalarySO, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->basicsalarySG, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->totalsss, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->totalphic, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->totalhdmf, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->totalretfund, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->totalmargin, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->subtotalwithmargin, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->taxable, 4, '.', ','); ?></td>
                 				<td><?php echo number_format($record->taxdue, 4, '.', ','); ?></td>
                 				<!-- <td><?php echo $record->reason; ?></td> -->
           				 	</tr>
           				 	 <?php endforeach; ?>
           				 </tbody>
					</table>
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
<span><?php if($this->session->flashdata('billing')=="success") echo '<script type="text/javascript"> showdataSuccessbillingthToast() </script>';?></span>

<script  type="text/javascript">  
	$(document).ready(function() {
		$(document).on("click", "#uploaddate", function(){
				var payrolldateID =   $("#searchpayperiod").val();
				var clientID =   $("#searchclient").val();

				if(payrolldateID==0){
	        	document.getElementById("search-searchpayperiod").innerHTML = "Please provide a billing period.";
	        	$('#searchpayperiod').addClass('is-invalid');
	        	showErrorToast("Please provide a billing period!");
                event.preventDefault();
	        }
	        else{
	        	document.getElementById("search-searchpayperiod").innerHTML = "";
	        	$('#searchpayperiod').removeClass('is-invalid');
	        	$('#searchpayperiod').addClass('is-valid'); 
	        }	
	        if(clientID ==0){
	        	document.getElementById("search-searchclient").innerHTML = "Please provide a Client.";
	        	$('#searchclient').addClass('is-invalid');
	        	showErrorToast("Please provide a client!");
                event.preventDefault();

	        }else{
	        	document.getElementById("search-searchclient").innerHTML = "";
	        	$('#searchclient').removeClass('is-invalid');
	        	$('#searchclient').addClass('is-valid'); 

	        }
	        if(payrolldateID==0 || clientID==0) return false;

				/*var sddlyear = $("#sddlyear").val();
				var eddlmonth = $("#eddlmonth").val();
				var eddlyear = $("#eddlyear").val();
				var checkerrorfrom = sddlyear+ +sddlmonth
				var checkerrorto =  eddlyear+ +eddlmonth;*/
		/*if(clientID==0){
			showErrorToast("Invalid date selected!");
			 event.preventDefault();
		}else{*/
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Process Billing Statement");
    	$('#modal_message').html("Are you sure you want to process the billing statement?");
    	$('.submit-btn').html("Process Billing Statement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_uploaddate");
        $('#modal_confirmation').modal('show');
        return false;
     /*  } */
		
	});
	$(document).on("click", "#modal_uploaddate", function(){
		$("#upload_date").submit();
	});
	


	$('#upload_date').on("submit", function(e){ 
				var id  = $('#cutoff').attr('billingid');
				var payrolldateID =   $("#searchpayperiod").val();
				var clientID =   $("#searchclient").val();
				
			$.ajax({
				url : "<?php echo site_url('Billingprocess/search_Billingprocess');?>",
				method : "POST",
				data : {id: 				id,
						payrolldateID: 		payrolldateID, 			clientID: 			clientID},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					 
				},
				success: function(response){
					window.location.replace('<?php echo base_url(); ?>Billingprocess');
					$('#modal_confirmation').modal('hide');
					//showSuccessToast("The billing statement has been successfully processed.");
				
					
			},
		 error: function(request, textStatus, error) {
	     }	
		});
			return false;
		});	

	$(document).on("click", "#submitbilling", function(){

        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Submit Billing Statement");
    	$('#modal_message').html("Are you sure you want to submit the billing statement?");
    	$('.submit-btn').html("Submit Billing Statement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submitbilling");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_submitbilling", function(){
    	var billingID = $('#cutoff').attr('billingid');
    	var clientrecord = $('#cutoff').attr('clientrecord');
    		var html = "";
    		if(clientrecord==0){
			showErrorToast("There is no data to be processed, please select again.");
			$('#modal_confirmation').modal('hide');
			 event.preventDefault();
            return false;
			}else{
				 event.preventDefault();
			}
    		$.ajax({
		      url : "<?php echo site_url('Billingprocess/submit');?>",
		      method : "POST",
		      data : {billingID:billingID},
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
									'<th style="width: 100px ! important;"><center>Client Name</center></th>' +
									'<th style="width: 180px;"><center>Detachment</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Billing Date</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Security Officer</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Security Guards</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>SSS</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>PHIC</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>HDMF</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Insurance/ECC</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Overhead Margin</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Subtotal</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Taxable</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Tax Due</center></th>' +
								'</tr> ' +

						'</thead>';

		      	if(data["billing"]!=0){
		      	for(var i=0; i<data["billing"].length; i++){
			      		var status = "-----";
			      		status 	= data["billing"][i].retirementstatus1;
			      		htmlStatus 			= status;
			      		htmlDatesubmitted 	= data["billing"][i].formatdate;
			      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
		      		}

		      		if(htmlDatesubmitted != "-----"){
						htmlButton = '<button type="button" class="btn btn-danger cancel" id="cancelbilling" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';	
		      		}
		      		html += '<tbody>';
		      		for(var i=0; i<data["datarecord"].length; i++){
						html += '<tr>' +
    								'<td>' + data["datarecord"][i].clientname  + '</td>' +
    								'<td>' + data["datarecord"][i].detachment + '</td>' +
    								'<td>' + data["datarecord"][i].rangedate + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].basicsalarySO) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].basicsalarySG) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].totalsss) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].totalphic) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].totalhdmf) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].totalretfund) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].totalmargin) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].subtotalwithmargin) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].taxable) + '</td>' +
    								'<td>' +  accounting.formatMoney(data["datarecord"][i].taxdue) + '</td>' +
    							'</tr>';
    					}			
    					html += '</tbody></table>';					

		      		if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable').DataTable().destroy();
			        };

		      		$("#collapseOne").prop("hide", true);
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
		      		showSuccessToast("The billing statement process has been submitted successfully.");
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

		$(document).on("click", "#cancelbilling", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Cancel Request");
    	$('#modal_message').html("Are you sure you want to cancel the billing statement request?");
    	$('.submit-btn').html("Cancel Billing Statement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_cancelbilling");
        $('#modal_confirmation').modal('show');
		return false;
	});	
	$(document).on("click", "#modal_cancelbilling", function(){
    	var billingid = $('#cutoff').attr('billingid');
    	var html ="";
    	$.ajax({
		      url : "<?php echo site_url('Billingprocess/cancel');?>",
		      method : "POST",
		      data : {billingid:billingid},
		      async : true,
		      success: function(data){
				var htmlStatus = "DRAFT";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = '<button type="button" class="btn btn-info submit" id="submitbilling" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Billing Statement </button>';

		      	$("#collapseOne").prop("disabled", false);
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
						    
						}
				});   
	      		$('#modal_confirmation').modal('hide');
		  	  	showSuccessToast("billing statement  is successfully <b>cancelled!</b>");
		      },
		      error: function(request, textStatus, error) {
		      }
     	 });
         return false;

	});

	$(document).on("click", ".approve", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve Billing Statement");
    	$('#modal_message').html("Are you sure you want to approve the Billing Statement ?");
    	$('.submit-btn').html("Approve Billing Statement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_approvebilling");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_approvebilling", function(){
    	var billingid = $('#cutoff').attr('billingid');
    	var lastapprover  = $('#cutoff').attr('lastapprover');

    	$.ajax({
		      url : "<?php echo site_url('Billingprocess/approve');?>",
		      method : "POST",
		      data : {billingid:billingid,
		      		  lastapprover:lastapprover},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	for(var i=0; i<data["billing"].length; i++){
		      		var status = "-----";
		      		status 	= data["billing"][i].thrmonthstatus;
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
	  	  		showSuccessToast("Billing statement is successfully approved!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;

    });
    	//DENY 
	$(document).on("click", ".deny", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title1').html("Deny billing statement");
    	$('#modal_message1').html("Are you sure you want to deny the billing statement?");
    	$('.submit-btn').html("Deny billing statement");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_denybilling");
        $('#modal_confirmationdeny').modal('show');
		return false;
	});
	$(document).on("click", "#modal_denybilling", function(){
    	var billingID = $('#cutoff').attr('billingid');
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
		      url : "<?php echo site_url('Billingprocess/deny');?>",
		      method : "POST",
		      data : {billingID: billingID, reason: reason},
		      async : true,
		      success: function(data){
		      var html = "";
		      var htmlStatus = "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='" + billingID + "'>DENIED</a>";
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

	  	  		showSuccessToast("The Billing Statement Process is successfully  <b>denied!</b>");
	  	  		//setTimeout(location.reload.bind(location), 5000)

		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".denied_info", function(){
		
		var billingID = $('#cutoff').attr('billingid');
		
    	$.ajax({
		      url : "<?php echo site_url('Billingprocess/getdenied');?>",
		      method : "POST",
		      data : {billingID:billingID},
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
