<?php
	$timekeepingNo 		= "-----"; 
	$timekeepingID 		= ""; 
	$datefrom 			= "-----"; 
	$dateto 			= "";
	$payperiod 			= "";
	$payperiodrange		= "-----";
	$timekeepingstatus  = "-----";
	$dateapproved		= "-----";
	$tkstatus 			= "";

	foreach ($data['timekeeping'] as $item) {
		$timekeepingID 		= $item->timekeepingID;
		$timekeepingNo 		= "TK-".str_pad($item->timekeepingID, 6, "0", STR_PAD_LEFT);
		$datefrom 			= date("F d, Y",strtotime($item->datefrom)); 
		$dateto 			= date("F d, Y",strtotime($item->dateto));
		$payperiod 			= $item->payperiod;
		$payperiodrange		= date("F d, Y",strtotime($item->datefrom)).' - '.date("F d, Y",strtotime($item->dateto)).' ('.$payperiod.')';
		$retVal 			= array_filter(explode("|",$item->dateapproved));

		if(count($retVal)!=0)	$dateapproved = date("F d, Y H:i:s",strtotime($retVal[count($retVal)-1]));

		$tkstatus 			= $item->timekeepingstatus;
		if($item->timekeepingstatus==1) $timekeepingstatus = "PENDING";
		else if($item->timekeepingstatus==2) $timekeepingstatus = "APPROVED";
		else if($item->timekeepingstatus==3) $timekeepingstatus = "DENIED";
		else $timekeepingstatus = "DRAFT";
	}

	$payrollNo 				= "-----"; 
	$payrollID 				= ""; 
	$payroll_datesubmitted 	= "-----"; 
	$payroll_datefrom 		= "-----"; 
	$payroll_dateto 		= "";
	$payroll_payperiod 		= "";
	$payroll_payperiodrange	= "-----";
	$payrollstatus  		= "-----";
	$payroll_dateapproved	= "-----";
	$prstatus 				= "";
	$userapproved 			= "";
	$usersubmitted 			= "";

	foreach ($data['payroll'] as $item) {
		$payrollID 				= $item->payrollID;
		$payrollNo 				= "PR-".str_pad($item->payrollID, 6, "0", STR_PAD_LEFT);
		$payroll_datesubmitted	= (is_null($item->datesubmitted) ? "-----" : $item->datesubmitted);
		$payroll_datefrom 		= date("F d, Y",strtotime($item->datefrom)); 
		$payroll_dateto 		= date("F d, Y",strtotime($item->dateto));
		$payroll_payperiod 		= $item->payperiod;
		$payroll_payperiodrange	= date("F d, Y",strtotime($item->datefrom)).' - '.date("F d, Y",strtotime($item->dateto)).' ('.$payperiod.')';
		$payroll_retVal 		= array_filter(explode("|",$item->dateapproved));

		if(count($payroll_retVal)!=0)	$payroll_dateapproved = $payroll_retVal[count($payroll_retVal)-1];

		$prstatus 				= $item->payrollstatus;
		if($item->payrollstatus==1) $payrollstatus = "PENDING";
		else if($item->payrollstatus==2) $payrollstatus = "APPROVED";
		else if($item->payrollstatus==3) $payrollstatus = "DENIED";
		else  $payrollstatus = "DRAFT";
		$userapproved 		= $item->userapproved;
		$usersubmitted 		= $item->usersubmitted;
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
			<div class="row filter-row" style="margin-bottom: 20px;">
				<div class="col-lg-2 col-md-2">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; border-color: #aaa8a8;">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Timekeeping No.</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;" 
									   id="cutoff" 
								   	   timekeepingID="<?php echo $timekeepingID; ?>"
								       status="<?php echo $tkstatus; ?>" 
								       datefrom="<?php echo $datefrom; ?>" dateto="<?php echo $dateto; ?>" payperiod="<?php echo $payperiod; ?>"><?php echo $timekeepingNo; ?>
							        </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-2">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; border-color: #aaa8a8;">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Timekeeping Status</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"><?php echo $timekeepingstatus; ?> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; border-color: #aaa8a8;">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Date Approved</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"><?php echo $dateapproved; ?> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; border-color: #aaa8a8;">
							<h5 class="dash-title">
									<i class="la la-calendar"></i> Payroll Period
							</h5>
							<div class="dash-card-container">
								
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"><?php echo $payperiodrange; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-2">
					<?php 
						if($prstatus==0 || $prstatus==3){ 
							echo '<button class="btn btn-primary processpayroll" style="border-radius: 5px; width:100%; height: 95%;"><i class="fa fa-forward"></i> Process Payroll </button>';
						}else{
							echo '<button class="btn btn-primary processpayroll" style="border-radius: 5px; width:100%; height: 95%;" disabled><i class="fa fa-forward"></i> Process Payroll </button>';
						}
					?>
				</div>
			</div>
			
			<div class="row filter-row" style="margin-bottom: 20px;">
				<div class="col-lg-2 col-md-2">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Payroll No.</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"
									   id="payrollno" 
								   	   payrollID="<?php echo $payrollID; ?>"
								       status="<?php echo $prstatus; ?>" 
								       lastapprover="<?php echo $lastapprover; ?>"
								       datefrom="<?php echo $payroll_datefrom; ?>" dateto="<?php echo $payroll_dateto; ?>" payperiod="<?php echo $payroll_payperiod; ?>"><?php echo $payrollNo; ?>
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
								Payroll Status</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;" id="show_payroll_status"><?php echo $payrollstatus; ?> </p>
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
									<p style="color:#e04d45;" id="show_payroll_datesubmitted"><?php echo $payroll_datesubmitted; ?> </p>
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
									<p style="color:#e04d45;" id="show_payroll_approver"><?php echo$approvername; ?> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-2" id="show_payroll_button">
					<?php 
						if($prstatus==0){ 
							if($payrollstatus=="-----"){
				    			echo '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;" disabled><i class="fa fa-send"></i> Submit Payroll</button>';	
							}else{
				    			echo '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Payroll</button>';	
							}
			    	 	}else if($prstatus==1){ 
			    	 		if($currentapprover!=$this->session->userdata('employeeID')) {
				    	 		if(($userapproved=="" || $userapproved==NULL) && $this->session->userdata('employeeID')==$usersubmitted){
				    	 			echo '<button type="button" class="btn btn-danger cancel" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';
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
	    			    }else if($prstatus==3){ 
	    			    	if($this->session->userdata('employeeID')==$usersubmitted){
	    			    		echo '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Payroll</button>';
	    			    	}else{
				    			echo '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';
	    			    	}
				    	}
				  	?>
				</div>
			</div>
			<!-- /PROCESS -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive"  id="show_data">
					<table class="table table-striped custom-table" id="datatable1">
						<thead>
							<tr>
								<th style="width: 90px ! important;">Employee No.</th>
								<th style="width: 240px;">Employee Name</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Basic</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Overtime</th>
								<th class="text-right" style="width: 90px; font-size:11px;">LATE</th>
								<th class="text-right" style="width: 90px; font-size:11px;">LWOP</th>
								<th class="text-right" style="width: 90px; font-size:11px;">W/holding Tax</th>
								<th class="text-right" style="width: 90px; font-size:11px;">SSS</th>
								<th class="text-right" style="width: 90px; font-size:11px;">PHIC</th>
								<th class="text-right" style="width: 90px; font-size:11px;">HDMF</th>
								<th class="text-right" style="width: 90px; font-size:11px;">NET PAY</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['payrolldetails'] as $item) { ?>
									<tr>
	    								<td><?=str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);?></td>
	    								<td><?=$item->firstname.' '.$item->lastname;?></td>
	    								<td class="text-right" style="color:#0ebe0e;"><?=number_format($item->basicpay,4,".",",")?></td>
	    								<td class="text-right" style="color:#0ebe0e;"><?=number_format($item->ordinaryot,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->late,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->absent,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->wtax,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->sss,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->phic,4,".",",")?></td>
	    								<td class="text-right" style="color:#be0e0e;"><?=number_format($item->hdmf,4,".",",")?></td>
	    								<td class="text-right" style="color:#0ebe0e; font-weight: 500;"><?=number_format($item->netpay,4,".",",")?></td>
									</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
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

<script  type="text/javascript">  
$(document).ready(function() {

	var table = $('#datatable1').DataTable( {
        scrollX: true,
        scrollCollapse: true,
        fixedColumns:   {
		    leftColumns: 2,
		    rightColumns: 1
		}
    } );

    $(document).on("click", ".processpayroll", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/process.svg");
		$('#modal_title').html("Process Payroll");
    	$('#modal_message').html("Are you sure you want to process the payroll?");
    	$('.submit-btn').html("Process payroll");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_processpayroll");
        $('#modal_confirmation').modal('show');
		return false;
	});

    $(document).on("click", "#modal_processpayroll", function(){
		if($('#cutoff').attr('status')=="2"){
			var timekeepingID = $('#cutoff').attr('timekeepingID');
			var fromcutoff = $('#cutoff').attr('datefrom');
			var tocutoff = $('#cutoff').attr('dateto');
			var payperiod = $('#cutoff').attr('payperiod');

			var html ="";

			$.ajax({
	            url : "<?php echo site_url('payroll/process');?>",
	            method : "POST",
	            data : {timekeepingID:timekeepingID,
            			fromcutoff: fromcutoff,
	            		tocutoff: tocutoff,
	            		payperiod: payperiod},
	            async : true,
	            dataType : 'json',
	            success: function(data){
	            	html =  '<table class="table table-striped custom-table" id="datatable1">' + 
	            			'<thead>' +
							'<tr>' + 
								'<th style="width: 90px ! important;">Employee No.</th>' +
								'<th style="width: 240px;">Employee Name</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">Basic</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">Overtime</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">LATE</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">LWOP</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">W/holding Tax</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">SSS</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">PHIC</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">HDMF</th>' +
								'<th class="text-right" style="width: 90px; font-size:11px;">NET PAY</th>' +
							'</tr>' +
						'</thead>' +
						'<tbody>';

	            	for(var i=0; i<data["payrolldetails"].length; i++){
    					html += '<tr>' +
    								'<td>' + data["payrolldetails"][i].employeeID.padStart(6,'0') 													+ '</td>' +
    								'<td>' + data["payrolldetails"][i].firstname + ' ' + data["payrolldetails"][i].lastname 						+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e;">' + accounting.formatMoney(data["payrolldetails"][i].basicpay)		+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e;">' + accounting.formatMoney(data["payrolldetails"][i].ordinaryot) 	+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].late) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].absent) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].wtax) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].sss) 			+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].phic) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data["payrolldetails"][i].hdmf) 		+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e; font-weight: 500;">' + accounting.formatMoney(data["payrolldetails"][i].netpay) + '</td>';
								'</tr>';
            		}

            		html += '</tbody></table>';

			        if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };

		      		var htmlStatus 			= "DRAFT";
		      		var htmlPayrollNo 		= "PR-" + data["payroll"][0].payrollID.padStart(6,'0') 	;
			      	var htmlButton 			= '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Payroll</button>';	

		      		$("#show_payroll_status").html(htmlStatus);
		      		$("#payrollno").html(htmlPayrollNo);
		      		$("#payrollno").attr("payrollid",data["payroll"][0].payrollID);
		      		$("#show_payroll_button").html(htmlButton);

            		$("#show_data").html(html);
			        $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
				        fixedColumns:   {
						    leftColumns: 2,
						    rightColumns: 1
						}
				    });
		        	$('#modal_confirmation').modal('hide');
		      		showSuccessToast("Timekeeping is successfully <b>processed!</b> Kindly review the payroll before submitting.");
	        	},
	            error: function(request, textStatus, error) {

	        	}
	        });
	        return false;
    	}else{
    		if($('#cutoff').attr('status')=="1")
				showErrorToast("Cannot process, timekeeping is still <b>pending!</b>");
    		else if($('#cutoff').attr('status')=="3") 
    			showErrorToast("Cannot process, timekeeping is <b>denied!</b>");
			else showErrorToast("Cannot process, timekeeping is still <b>draft!</b>");
    	}
	});

	$(document).on("click", ".submit", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_title').html("Submit Payroll");
    	$('#modal_message').html("Are you sure you want to submit the payroll?");
    	$('.submit-btn').html("Submit payroll");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submitpayroll");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_submitpayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');

    	$.ajax({
		      url : "<?php echo site_url('payroll/submit');?>",
		      method : "POST",
		      data : {payrollID:payrollID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	if(data["payroll"]!=0){
		      		for(var i=0; i<data["payroll"].length; i++){
			      		var status = "-----";

			      		if(data["payroll"][i].payrollstatus==0) {
			      			status = "DRAFT";
			      		}else if(data["payroll"][i].payrollstatus==1) {
			      			status = "PENDING";
			      		}else if(data["payroll"][i].payrollstatus==2) {
			      			status = "APPROVED";
		      			}

			      		htmlStatus 			= status;
			      		htmlDatesubmitted 	= data["payroll"][i].datesubmitted;
			      		htmlApprover 		= data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
		      		}

		      		if(htmlDatesubmitted != "-----"){
						htmlButton = '<button type="button" class="btn btn-danger cancel" style="width: 100%; height: 95%;"><i class="fa fa-ban"></i> Cancel Request</button>';	
						$(".processpayroll").prop("disabled", true);
		      		}

		      		$("#show_payroll_status").html(htmlStatus);
		      		$("#show_payroll_datesubmitted").html(htmlDatesubmitted);
		      		$("#show_payroll_approver").html(htmlApprover);
		      		$("#show_payroll_button").html(htmlButton);
		      		$('#modal_confirmation').modal('hide');
		      		showSuccessToast("Payroll is successfully <b>submitted!</b>");
		      	}else{
		      		showErrorToast(data['error']); ;
		      	}
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".cancel", function(){
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_title').html("Cancel Request");
    	$('#modal_message').html("Are you sure you want to cancel the payroll request?");
    	$('.submit-btn').html("Cancel payroll");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_cancelpayroll");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_cancelpayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');

    	$.ajax({
		      url : "<?php echo site_url('payroll/cancel');?>",
		      method : "POST",
		      data : {payrollID:payrollID},
		      async : true,
		      success: function(data){
				var htmlStatus = "DRAFT";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Payroll</button>';

				$(".processpayroll").prop("disabled", false);
	      		$("#show_payroll_status").html(htmlStatus);
	      		$("#show_payroll_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_payroll_approver").html(htmlApprover);
	      		$("#show_payroll_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
		  	  	showSuccessToast("Payroll is successfully <b>cancelled!</b>");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".approve", function(){
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve Payroll");
    	$('#modal_message').html("Are you sure you want to approve the payroll?");
    	$('.submit-btn').html("Approve payroll");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_approvepayroll");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_approvepayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');
    	var timekeepingID = $('#cutoff').attr('timekeepingid');
    	var lastapprover = $('#payrollno').attr('lastapprover');

    	$.ajax({
		      url : "<?php echo site_url('payroll/approve');?>",
		      method : "POST",
		      data : {payrollID:payrollID,
		      		  timekeepingID: timekeepingID,
		      		  lastapprover:lastapprover},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var htmlStatus = "-----";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

		      	for(var i=0; i<data["payroll"].length; i++){
		      		var status = "-----";

		      		if(data["payroll"][i].payrollstatus==0) {
		      			status = "DRAFT";
		      		}else if(data["payroll"][i].payrollstatus==1) {
		      			status = "PENDING";
		      		}else if(data["payroll"][i].payrollstatus==2) {
		      			status = "APPROVED";
	      			}

		      		htmlStatus 			= status;
	      		}

	      		for(var i=0; i<data["approver"].length; i++){
	      			htmlApprover = data["approver"][i].firstname + ' ' + data["approver"][i].lastname;
	      		}

				htmlButton = '<button type="button" class="btn btn-success approved" style="width: 100%; height: 95%;" disabled><i class="fa fa-check"></i> Approved</button>';	
	      		
	      		$("#show_payroll_status").html(htmlStatus);
	      		$("#show_payroll_approver").html(htmlApprover);
	      		$("#show_payroll_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
	  	  		showSuccessToast("Payroll is successfully approved!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".deny", function(){
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title').html("Deny Payroll");
    	$('#modal_message').html("Are you sure you want to deny the payroll?");
    	$('.submit-btn').html("Deny payroll");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_denypayroll");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_denypayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');

    	$.ajax({
		      url : "<?php echo site_url('payroll/deny');?>",
		      method : "POST",
		      data : {payrollID:payrollID},
		      async : true,
		      success: function(data){
		      	var htmlStatus = "DENIED";
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";

				htmlButton = '<button type="button" class="btn btn-danger denied" style="width: 100%; height: 95%;" disabled><i class="fa fa-ban"></i> Denied</button>';	
	      		
	      		$("#show_payroll_status").html(htmlStatus);
	      		$("#show_payroll_datesubmitted").html(htmlDatesubmitted);
	      		$("#show_payroll_approver").html(htmlApprover);
	      		$("#show_payroll_button").html(htmlButton);
	      		$('#modal_confirmation').modal('hide');
	  	  		showSuccessToast("Payroll is successfully <b>denied!</b>");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});
}); 		 
</script>