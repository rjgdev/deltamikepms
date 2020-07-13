<?php
	$timekeepingNo 		= "-----"; 
	$timekeepingID 		= ""; 
	$datefrom 			= "-----"; 
	$fromcutoff			= ""; 
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
		$fromcutoff			= $item->datefrom;
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
	$payroll_loandate		= "";
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
		$payroll_loandate		= $item->dateto;
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
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Process <span class="text-info">(Security Guard)</span></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Process (Security Guard)</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- /Page Header -->
		
		<!-- PROCESS -->
			<div class="row filter-row" style="margin-bottom: 20px;">
				<div class="col-lg-2 col-md-2 mb-1">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; ">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Timekeeping Number</h5>
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

				<div class="col-lg-2 col-md-2 mb-1">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; ">
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

				<div class="col-lg-3 col-md-3 mb-1">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef; ">
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

				<div class="col-lg-3 col-md-3 mb-1">
					<div class="dash-info-list">
						<div class="dash-card" style="background-color: #efefef;">
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

				<div class="col-lg-2 col-md-2 mt-1">
					<?php 
						if($prstatus==0 || $prstatus==3 && ($this->session->userdata('employeeID')==$usersubmitted)){ 
							echo '<button class="btn btn-primary processpayroll" style="border-radius: 5px; width:100%; height: 95%;"><i class="fa fa-forward"></i> Process Payroll </button>';
						}else{
							echo '<button class="btn btn-primary processpayroll" style="border-radius: 5px; width:100%; height: 95%;" disabled><i class="fa fa-forward"></i> Process Payroll </button>';
						}
					?>
				</div>
			</div>
			
			<div class="row filter-row" style="margin-bottom: 20px;">
				<div class="col-lg-2 col-md-2 mb-1">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Payroll Number</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"
									   id="payrollno" 
								   	   payrollID="<?php echo $payrollID; ?>"
								       status="<?php echo $prstatus; ?>" 
								       lastapprover="<?php echo $lastapprover; ?>"
								       datefrom="<?php echo $payroll_datefrom; ?>" 
								       dateto="<?php echo $payroll_dateto; ?>" 
								       payperiod="<?php echo $payroll_payperiod; ?>"
								       loandate="<?php echo $payroll_loandate; ?>"><?php echo $payrollNo; ?>
							        </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-md-2 mb-1">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Payroll Status</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;" id="show_payroll_status">
										<?php 
											if($payrollstatus=="DENIED"){
												echo "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' denied_id='".$payrollID."'>".$payrollstatus."</a>";
											}else{
												echo $payrollstatus;
											} 
										?>	
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 mb-1">
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

				<div class="col-lg-3 col-md-3 mb-1">
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

				<div class="col-lg-2 col-md-2 mt-1" id="show_payroll_button">
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
								<th style="width: 120px;">Employee Number</th>
								<th style="width: 240px;">Employee Name</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Basic Pay</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Holiday Pay</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Overtime</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Overtime Adjustment</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Night Differential</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Night Diff. Adjustment</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Allowance</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Incentive</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Late</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Late Adjustment</th>
								<th class="text-right" style="width: 90px; font-size:11px;">LWOP</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Leave Adjustment</th>
								<th class="text-right" style="width: 90px; font-size:11px;">GROSS PAY</th>
								<th class="text-right" style="width: 100px; font-size:11px;">Withholding Tax</th>
								<th class="text-right" style="width: 90px; font-size:11px;">SSS</th>
								<th class="text-right" style="width: 90px; font-size:11px;">PHIC</th>
								<th class="text-right" style="width: 90px; font-size:11px;">HDMF</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Loan</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Other Adjustment</th>
								<th class="text-right" style="width: 90px; font-size:11px;">NET PAY</th>
								<th class="text-right" style="width: 90px; font-size:11px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['payrolldetails'] as $item) {
								$ot_adj 	= number_format($item->otadjustment,4,".",",");
								$night_adj 	= number_format($item->nightdiffadjustment,4,".",",");
								$late_adj 	= number_format($item->lateadjustment,4,".",",");
								$leave_adj 	= number_format($item->leaveadjustment,4,".",",");
								$other_adj 	= number_format($item->otheradjustment,4,".",",");

				        		if($item->otadjustment!=0){
				        			$ot_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" 
								        			notes="'.$item->otnotes.'" 
								        			type="Overtime Adjustment Details" 
								        			amount="'.number_format($item->otadjustment,4,".",",").'" 
								        			id="otnotes'.$item->payrolldetailsID.'">'.number_format($item->otadjustment,4,".",",").
								        		  '</a>';
				        		}

				        		if($item->nightdiffadjustment!=0){
				        			$night_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" 
								        			notes="'.$item->nightnotes.'" 
								        			type="Night Differential Adjustment Details" 
								        			amount="'.number_format($item->nightdiffadjustment,4,".",",").'" 
								        			id="nightnotes'.$item->payrolldetailsID.'">'.number_format($item->nightdiffadjustment,4,".",",").
								        		  '</a>';
				        		}

				        		if($item->lateadjustment!=0){
				        			$late_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" 
								        			notes="'.$item->latenotes.'" 
								        			type="Late Adjustment Details" 
								        			amount="'.number_format($item->lateadjustment,4,".",",").'" 
								        			id="latenotes'.$item->payrolldetailsID.'">'.number_format($item->lateadjustment,4,".",",").
								        		  '</a>';
				        		}

				        		if($item->leaveadjustment!=0){
				        			$leave_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" 
								        			notes="'.$item->leavenotes.'" 
								        			type="Leave Adjustment Details" 
								        			amount="'.number_format($item->leaveadjustment,4,".",",").'" 
								        			id="leavenotes'.$item->payrolldetailsID.'">'.number_format($item->leaveadjustment,4,".",",").
								        		  '</a>';
				        		}

				        		if($item->otheradjustment!=0){
				        			$other_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" 
								        			notes="'.$item->othernotes.'" 
								        			type="Other Adjustment Details" 
								        			amount="'.number_format($item->otheradjustment,4,".",",").'" 
								        			id="othernotes'.$item->payrolldetailsID.'">'.number_format($item->otheradjustment,4,".",",").
								        		  '</a>';
				        		}
							 ?>

									<tr id="<?php echo $item->payrolldetailsID; ?>">
	    								<td><?=str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);?></td>
	    								<td><?=$item->firstname.' '.$item->lastname;?></td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->basicpay,4,".",",")?></td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->holiday,4,".",",")?></td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->totalOT,4,".",",")?></td>
	    								<td class="text-right" style="color:<?php if($item->otadjustment>=0) echo '#059a05'; else echo '#9a0505'; ?>">
	    									<?=$ot_adj; ?>
    									</td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->totalNight,4,".",",")?></td>
	    								<td class="text-right" style="color:<?php if($item->nightdiffadjustment>=0) echo '#059a05'; else echo '#9a0505'; ?>;">
	    									<?=$night_adj; ?>
	    								</td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->allowance,4,".",",")?></td>
	    								<td class="text-right" style="color:#059a05;"><?=number_format($item->incentive,4,".",",")?></td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->totalLate,4,".",",")?></td>
	    								<td class="text-right" style="color:<?php if($item->lateadjustment>=0) echo '#059a05'; else echo '#9a0505'; ?>">	
	    									<?=$late_adj; ?>
	    								</td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->absent,4,".",",")?></td>
	    								<td class="text-right" style="color:<?php if($item->leaveadjustment>=0) echo '#059a05'; else echo '#9a0505'; ?>">	
	    									<?=$leave_adj; ?>
	    								</td>
	    								<td class="text-right" style="color:<?php if($item->grosspay>=0) echo '#059a05'; else echo '#9a0505'; ?>">
	    									<?=number_format($item->grosspay,4,".",",")?>
    									</td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->wtax,4,".",",")?></td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->sss_ee,4,".",",")?></td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->phic_ee,4,".",",")?></td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->hdmf_ee,4,".",",")?></td>
	    								<td class="text-right" style="color:#9a0505;"><?=number_format($item->totalLoan,4,".",",")?></td>
	    								<td class="text-right" style="color:<?php if($item->otheradjustment>=0) echo '#059a05'; else echo '#9a0505'; ?>">
	    									<?=$other_adj; ?>
    									</td>
	    								<td class="text-right" style="color:<?php if($item->netpay>=0) echo '#059a05'; else echo '#9a0505'; ?>; font-weight: 500;">
	    									<?=number_format($item->netpay,4,".",",")?>
    									</td>
	    								<td class="text-right"><a href="javascript:void(0);" class="btn btn-sm btn-primary adjustment" data-toggle="modal" data-target="#modal_adjustment" payrolldetailsid="<?=$item->payrolldetailsID?>" daysofwork="<?=$item->daysofwork; ?>" id="adjustment<?=$item->payrolldetailsID?>" 
	    									otnotes="<?=$item->otnotes;?>" 
	    									nightnotes="<?=$item->nightnotes;?>"
	    									latenotes="<?=$item->latenotes;?>"
	    									leavenotes="<?=$item->leavenotes;?>"
	    									othernotes="<?=$item->othernotes;?>"
	    									employeetype="<?=$item->employeetypeID?>" data-backdrop="static" data-keyboard="false" style="font-size:.68rem !important;">Adjust Payroll</a></td>
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
						<div class="deny_item">
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
<!-- /Confirmation Modal -->

<!-- Adjustment Modal -->
	<div id="modal_adjustment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Payroll Adjustment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row"> 
							<div class="col-sm-12"> 
								<div class="form-group">
									<label for="otadjustment">Overtime Adjustment</label>
									<div class="input-group mr-sm-2 mb-sm-0">
								        <div class="input-group-prepend">
								        	<span class="input-group-text">₱</span>
								        </div>
								        <input id="otadjustment" name="otadjustment" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" im-insert="true" style="text-align: right;">

								        <input id="otnotes" name="otnotes" class="form-control otherfield input ml-2"  autocomplete="off" im-insert="true" placeholder="Enter note here">
							        </div>
								</div>
								<div class="form-group">
									<label>Night Differential Adjustment</label>
									<div class="input-group mr-sm-2 mb-sm-0">
								        <div class="input-group-prepend">
								        	<span class="input-group-text">₱</span>
								        </div>
								        <input id="nightdiffadjustment" name="nightdiffadjustment" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" im-insert="true" style="text-align: right;">

								        <input id="nightnotes" name="nightnotes" class="form-control otherfield input ml-2"  autocomplete="off" im-insert="true" placeholder="Enter note here">
							        </div>
								</div>
								<div class="form-group">
									<label>Late Adjustment</label>
									<div class="input-group mr-sm-2 mb-sm-0">
								        <div class="input-group-prepend">
								        	<span class="input-group-text">₱</span>
								        </div>
								        <input id="lateadjustment" name="lateadjustment" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" im-insert="true" style="text-align: right;">

								        <input id="latenotes" name="latenotes" class="form-control otherfield input ml-2"  autocomplete="off" im-insert="true" placeholder="Enter note here">
							        </div>
								</div>
								<div class="form-group">
									<label>Leave Adjustment</label>
									<div class="input-group mr-sm-2 mb-sm-0">
								        <div class="input-group-prepend">
								        	<span class="input-group-text">₱</span>
								        </div>
								        <input id="leaveadjustment" name="leaveadjustment" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" im-insert="true" style="text-align: right;">

								        <input id="leavenotes" name="leavenotes" class="form-control otherfield input ml-2"  autocomplete="off" im-insert="true" placeholder="Enter note here">
							        </div>
								</div>
								<div class="form-group">
									<label>Other Adjustment</label>
									<div class="input-group mr-sm-2 mb-sm-0">
								        <div class="input-group-prepend">
								        	<span class="input-group-text">₱</span>
								        </div>
								        <input id="otheradjustment" name="otheradjustment" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" im-insert="true" style="text-align: right;">

								        <input id="othernotes" name="othernotes" class="form-control otherfield input ml-2"  autocomplete="off" im-insert="true" placeholder="Enter note here">
							        </div>		
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn save_adjustment">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Adjustment Modal -->

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
	<!-- /Denied Modal -->

	<!-- View Notes Modal -->
	<div class="modal custom-modal fade" id="modal_notes" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"></h5>
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
												<td style="color:#e04d45; width:100px;">Amount:</td>
												<td class="text-left" id="view_amount"></td>
											</tr>
											<tr>
												<td style="color:#e04d45; width:100px;">Notes:</td>
												<td class="text-left" id="view_notes"></td>
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
	<!-- /View Notes Modal -->

<script  type="text/javascript">  
	$(document).ready(function() {

		var table = $('#datatable1').DataTable( {
	        scrollX: true,
	        scrollCollapse: true,
	        fixedColumns:   {
			    leftColumns: 2,
			    rightColumns: 2
			}
    } );

    $(document).on("click", ".processpayroll", function(){
    	if($('#cutoff').attr('status')=="1")
			showErrorToast("Cannot process, timekeeping is still <b>pending!</b>");
		else if($('#cutoff').attr('status')=="3") 
			showErrorToast("Cannot process, timekeeping is <b>denied!</b>");
		else if($('#cutoff').attr('status')=="0") 
			showErrorToast("Cannot process, timekeeping is still <b>draft!</b>");
		else if($('#cutoff').attr('status')=="")
			showErrorToast("No timekeeping to process!");
		else{
			$('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/process.svg");
			$('#modal_confirmation #modal_title').html("Process Payroll");
	    	$('#modal_confirmation #modal_message').html("Are you sure you want to process the payroll? <p style='font-size: .71rem; color: #e04d45; font-weight:500;'>All adjustments made will be completely removed! </p>");
	    	$('#modal_confirmation .submit-btn').attr("disabled",false);
	    	$('#modal_confirmation .submit-btn').html("Process payroll");
	    	$('#modal_confirmation .cancel-btn').html("Cancel");
	    	$('#modal_confirmation .submit-btn').attr("id","modal_processpayroll");
	    	$('#modal_confirmation .deny_item').html("");
	        $('#modal_confirmation').modal('show');
		}
		return false;
	});

    $(document).on("click", "#modal_processpayroll", function(){
		if($('#cutoff').attr('status')=="2"){
			$(this).attr("disabled","disabled");
			$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
			var timekeepingID = $('#cutoff').attr('timekeepingID');
			var fromcutoff = $('#cutoff').attr('datefrom');
			var tocutoff = $('#cutoff').attr('dateto');
			var payperiod = $('#cutoff').attr('payperiod');

			var html ="";

			$.ajax({
	            url : "<?php echo site_url('Payrollsecurityguard/process');?>",
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
								 '<th style="width: 120px;">Employee Number</th>' +
								 '<th style="width: 240px;">Employee Name</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Basic Pay</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Holiday Pay</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Overtime</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Overtime Adjustment</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Night Differential</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Night Diff. Adjustment</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Allowance</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Incentive</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Late</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Late Adjustment</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">LWOP</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Leave Adjustment</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">GROSS PAY</th>' +
								 '<th class="text-right" style="width: 100px; font-size:11px;">Withholding Tax</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">SSS</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">PHIC</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">HDMF</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Loan</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Other Adjustment</th>' + 
								 '<th class="text-right" style="width: 90px; font-size:11px;">NET PAY</th>' +
								 '<th class="text-right" style="width: 90px; font-size:11px;">Action</th>' +
							'</tr>' +
						'</thead>' +
						'<tbody>';

	            	for(var i=0; i<data["payrolldetails"].length; i++){
    					html += '<tr id="' + data["payrolldetails"][i].payrolldetailsID + '">' +
    								'<td>' + 
										data["payrolldetails"][i].employeeID.padStart(6,'0') +
									'</td>' +
									'<td>' + data["payrolldetails"][i].firstname + ' ' + data["payrolldetails"][i].lastname + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].basicpay)		+ '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].holiday)		+ '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].totalOT) 	    + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].otadjustment)   + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].totalNight) 		 + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].nightdiffadjustment) + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].allowance) 		 + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].incentive) 		 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].totalLate) 		 + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].lateadjustment)  + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].absent) 		 + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].leaveadjustment) + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].grosspay) 		 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].wtax) 			 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].sss_ee) 		 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].phic_ee) 		 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].hdmf_ee) 		 + '</td>' +
    								'<td class="text-right" style="color:#9a0505;">' + accounting.formatMoney(data["payrolldetails"][i].totalLoan)    	 + '</td>' +
    								'<td class="text-right" style="color:#059a05;">' + accounting.formatMoney(data["payrolldetails"][i].otheradjustment) + '</td>' +
    								'<td class="text-right" style="color:#059a05; font-weight: 500;">' + accounting.formatMoney(data["payrolldetails"][i].netpay) + '</td>' +
    								'<td class="text-right"><a href="javascript:void(0);" class="btn btn-sm btn-primary adjustment" data-toggle="modal" data-target="#modal_adjustment" payrolldetailsid="' + data["payrolldetails"][i].payrolldetailsID + '" daysofwork="' + data["payrolldetails"][i].daysofwork + '" id="adjustment' + data["payrolldetails"][i].payrolldetailsID + 
    								'" otnotes="'+ data["payrolldetails"][i].otnotes + 
    								'" nightnotes="'+ data["payrolldetails"][i].nightnotes + 
    								'" latenotes="'+ data["payrolldetails"][i].latenotes + 
    								'" leavenotes="'+ data["payrolldetails"][i].leavenotes + 
    								'" othernotes="'+ data["payrolldetails"][i].othernotes + 
    								'" employeetype="' + data["payrolldetails"][i].employeetypeID + '" data-backdrop="static" data-keyboard="false" style="font-size:.68rem !important;">Adjust Payroll</a></td>' +
								'</tr>';
            		}

            		html += '</tbody></table>';

			        if ($.fn.DataTable.isDataTable('#datatable1')){
			           table.destroy();
			        };

		      		var htmlStatus 			= "DRAFT";
		      		var htmlPayrollNo 		= "PR-" + data["payroll"][0].payrollID.padStart(6,'0') 	;
			      	var htmlButton 			= '<button type="button" class="btn btn-info submit" style="width: 100%; height: 95%;"><i class="fa fa-send"></i> Submit Payroll</button>';	

		      		$("#show_payroll_status").html(htmlStatus);
		      		$("#payrollno").html(htmlPayrollNo);
		      		$("#payrollno").attr("payrollid",data["payroll"][0].payrollID);
		      		$("#show_payroll_button").html(htmlButton);

            		$("#show_data").html(html);
			        table = $('#datatable1').DataTable({
						        scrollX: true,
					        	scrollCollapse: true,
						        fixedColumns:   {
								    leftColumns: 2,
								    rightColumns: 2
								}
						    });

		        	$('#modal_confirmation').modal('hide');
		      		showSuccessToast("Timekeeping is successfully <b>processed!</b> Kindly review the payroll before to submit.");
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
        $('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/submit.svg");
		$('#modal_confirmation #modal_title').html("Submit Payroll");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to submit the payroll?");
    	$('#modal_confirmation .submit-btn').attr("disabled",false);
    	$('#modal_confirmation .submit-btn').html("Submit payroll");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
    	$('#modal_confirmation .submit-btn').attr("id","modal_submitpayroll");
		$('#modal_confirmation .deny_item').html("");    	
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_submitpayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');

    	$(this).attr("disabled","disabled");
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/submit');?>",
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
		      		showErrorToast(data['error']);
		      		$('#modal_confirmation .submit-btn').attr("disabled",false);
    				$('#modal_confirmation .submit-btn').html("Submit payroll");
		      	}
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$(document).on("click", ".cancel", function(){
		$('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/cancel.svg");
		$('#modal_confirmation #modal_title').html("Cancel Request");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to cancel the payroll request?");
    	$('#modal_confirmation .submit-btn').attr("disabled",false);
    	$('#modal_confirmation .submit-btn').html("Cancel payroll");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
    	$('#modal_confirmation .submit-btn').attr("id","modal_cancelpayroll");
    	$('#modal_confirmation .deny_item').html("");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_cancelpayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');

    	$(this).attr("disabled","disabled");
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/cancel');?>",
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
		$('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_confirmation #modal_title').html("Approve Payroll");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to approve the payroll?");
    	$('#modal_confirmation .submit-btn').attr("disabled",false);
    	$('#modal_confirmation .submit-btn').html("Approve payroll");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
    	$('#modal_confirmation .submit-btn').attr("id","modal_approvepayroll");
    	$('#modal_confirmation .deny_item').html("");
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", "#modal_approvepayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');
    	var timekeepingID = $('#cutoff').attr('timekeepingid');
    	var lastapprover = $('#payrollno').attr('lastapprover');
    	var dateto = $('#payrollno').attr('loandate');

    	$(this).attr("disabled","disabled");
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/approve');?>",
		      method : "POST",
		      data : {payrollID:payrollID,
		      		  timekeepingID: timekeepingID,
		      		  lastapprover:lastapprover,
		      		  dateto:dateto},
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

	      		if(lastapprover==1){
	  	  			showSuccessToast("Payroll is successfully approved! You may continue the process by going to the <b><u>payslip generation</u></b>");
	      		}else{
	      			showSuccessToast("Payroll is successfully approved and now available for the next approver.");
	      		}
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});

	$('#modal_confirmation').on('shown.bs.modal', function(){
		$('#reason').focus(); 
    });

	$(document).on("click", ".deny", function(){
		$('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_confirmation #modal_title').html("Deny Payroll");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to deny the payroll?");
    	$('#modal_confirmation .submit-btn').attr("disabled",false);
    	$('#modal_confirmation .submit-btn').html("Deny payroll");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
    	$('#modal_confirmation .submit-btn').attr("id","modal_denypayroll");
        $('#modal_confirmation .deny_item').html('<br>' + 
							 '<p class="text-left text-danger" style="font-size: 1.1em;">Please enter a reason:</p>' + 
							 '<p><textarea class="form-control restrictspecchar" rows="4" id="reason"></textarea></p>');
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", "#modal_denypayroll", function(){
    	var payrollID = $('#payrollno').attr('payrollid');
    	var reason = $('#reason').val();

    	if(reason.trim()==""){
    		$('#reason').focus();
    		return;
    	}

    	$(this).attr("disabled","disabled");
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/deny');?>",
		      method : "POST",
		      data : {payrollID:payrollID,
		      		  reason:reason},
		      async : true,
		      success: function(data){
		      	var htmlDatesubmitted = "-----";
		      	var htmlApprover = "-----";
		      	var htmlButton	 = "-----";
	      		var htmlStatus = "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' denied_id='" + payrollID + "'>DENIED</a>";

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

	$(document).on("click", ".adjustment", function(){
		$('.save_adjustment').attr({'payrolldetailsid'		: $(this).attr('payrolldetailsid'), 
									'daysofwork'			: $(this).attr('daysofwork'),
									'employeeID'			: table.row(this).data()[0],
									'employeetype'			: $(this).attr('employeetype'), 
									'basicpay'				: table.row(this).data()[2],
									'holiday'				: table.row(this).data()[3],
									'overtime'				: table.row(this).data()[4],
									'otadjusment'			: table.row(this).data()[5],
									'nightdiff'				: table.row(this).data()[6],
									'nightdiffadjustment'	: table.row(this).data()[7],
									'allowance'				: table.row(this).data()[8],
									'incentive'				: table.row(this).data()[9],
									'late'					: table.row(this).data()[10],
									'lateadjustment'		: table.row(this).data()[11],
									'LWOP'					: table.row(this).data()[12],
									'leaveadjustment' 		: table.row(this).data()[13],
									'otnotes' 		    	: $(this).attr('othernotes'),
									'nightnotes' 		    : $(this).attr('nightnotes'),
									'latenotes' 		    : $(this).attr('latenotes'),
									'leavenotes' 		    : $(this).attr('leavenotes'),
									'othernotes' 		    : $(this).attr('othernotes'),
									'grosspay' 				: table.row(this).data()[14],
									'wtax' 					: table.row(this).data()[15],
									'sss' 					: table.row(this).data()[16],
									'phic' 					: table.row(this).data()[17],
									'hdmf'					: table.row(this).data()[18],
									'loan'					: table.row(this).data()[19],
									'otheradjustment' 		: table.row(this).data()[20],
									'netpay'				: table.row(this).data()[21]
									});
		$('#modal_adjustment .submit-btn').html("Submit");
		$('#otadjustment').val(table.row(this).data()[5]);
		$('#nightdiffadjustment').val(table.row(this).data()[7]);
		$('#lateadjustment').val(table.row(this).data()[11]);
		$('#leaveadjustment').val(table.row(this).data()[13]);
		$('#otheradjustment').val(table.row(this).data()[20]);


		$('#otnotes').val($(this).attr('otnotes'));
		$('#nightnotes').val($(this).attr('nightnotes'));
		$('#latenotes').val($(this).attr('latenotes'));
		$('#leavenotes').val($(this).attr('leavenotes'));
		$('#othernotes').val($(this).attr('othernotes'));
		
        return false;
	});	

	$(document).on("click", ".save_adjustment", function(){
        $('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg");
		$('#modal_confirmation #modal_title').html("Confirmation Message");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to save this payroll adjustment?");
    	$('#modal_confirmation .submit-btn').attr("disabled",false);
    	$('#modal_confirmation .submit-btn').html("Save adjustment");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
    	$('#modal_confirmation .submit-btn').attr("id","modal_saveadjustment");
    	$('#modal_adjustment').hide();
		$('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", ".cancel-btn", function(){
		$('#modal_confirmation').modal('hide');
		if($('#modal_confirmation .submit-btn').text()=="Save adjustment") $('#modal_adjustment').show();
	});

	$(document).on("click", "#modal_saveadjustment", function(){
		$(this).attr("disabled","disabled");
		$(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
				
		var otadjustment		= $("#otadjustment").val().trim().replace(",","").replace(" ","");
		var nightdiffadjustment = $("#nightdiffadjustment").val().trim().replace(",","").replace(" ","");
		var lateadjustment 		= $("#lateadjustment").val().trim().replace(",","").replace(" ","");
		var leaveadjustment 	= $("#leaveadjustment").val().trim().replace(",","").replace(" ","");
		var otheradjustment 	= $("#otheradjustment").val().trim().replace(",","").replace(" ","");

		var otnotes 			= $("#otnotes").val();
		var nightnotes 			= $("#nightnotes").val();
		var latenotes 			= $("#latenotes").val();
		var leavenotes 			= $("#leavenotes").val();
		var othernotes 			= $("#othernotes").val();

		var payperiod	  	 	= "<?php echo $payperiod; ?>";
		var fromcutoff			= "<?php echo $fromcutoff; ?>";
		var payrolldetailsID 	= $(".save_adjustment").attr('payrolldetailsid');
		var daysofwork 			= $(".save_adjustment").attr('daysofwork');
		var employeeID	  	 	= $(".save_adjustment").attr('employeeID');
		var employeetype 	 	= $(".save_adjustment").attr('employeetype');
		var basicpay	  	 	= $(".save_adjustment").attr('basicpay').trim().replace(",","").replace(" ","");
		var holiday	  	 		= $(".save_adjustment").attr('holiday').trim().replace(",","").replace(" ","");
		var overtime	  	 	= $(".save_adjustment").attr('overtime').trim().replace(",","").replace(" ","");
		var nightdiff	  	 	= $(".save_adjustment").attr('nightdiff').trim().replace(",","").replace(" ","");
		var allowance	  	 	= $(".save_adjustment").attr('allowance').trim().replace(",","").replace(" ","");
		var incentive	  	 	= $(".save_adjustment").attr('incentive').trim().replace(",","").replace(" ","");
		var late	  	 		= $(".save_adjustment").attr('late').trim().replace(",","").replace(" ","");
		var LWOP	  	 		= $(".save_adjustment").attr('LWOP').trim().replace(",","").replace(" ","");		
		var grosspay	  	 	= $(".save_adjustment").attr('grosspay').trim().replace(",","").replace(" ","");		
		var wtax	  	 		= $(".save_adjustment").attr('wtax').trim().replace(",","").replace(" ","");		
		var sss	  	 			= $(".save_adjustment").attr('sss').trim().replace(",","").replace(" ","");		
		var phic	  	 		= $(".save_adjustment").attr('phic').trim().replace(",","").replace(" ","");		
		var hdmf	  	 		= $(".save_adjustment").attr('hdmf').trim().replace(",","").replace(" ","");		
		var loan	  	 		= $(".save_adjustment").attr('loan').trim().replace(",","").replace(" ","");			
		var netpay	  	 		= $(".save_adjustment").attr('netpay').trim().replace(",","").replace(" ","");		
		var totalAdjustment		= 0;
		var totalGrosspay 		= 0;
		var totalNetpay 		= 0;

		totalAdjustment = parseFloat(otadjustment) + parseFloat(nightdiffadjustment) + parseFloat(lateadjustment) + parseFloat(leaveadjustment);

  		totalGrosspay = (parseFloat(basicpay) + parseFloat(holiday) +  parseFloat(overtime) +  parseFloat(nightdiff) +  parseFloat(allowance) +  parseFloat(incentive)) 
  						 + parseFloat(totalAdjustment) 
  						 - (parseFloat(late) + parseFloat(LWOP));

    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/adjustment');?>",
		      method : "POST",
		      data : {payperiod:payperiod,
		      		  fromcutoff:fromcutoff,
		      		  payrolldetailsID: payrolldetailsID,
		      		  daysofwork: daysofwork,
		      		  employeeID:employeeID,
		      		  employeetype:employeetype,
		      		  basicpay:basicpay,
		      		  holiday:holiday,
		      		  overtime:overtime,
		      		  nightdiff:nightdiff,
		      		  late:late,
	      		  	  absent:LWOP,
		      		  otadjustment: otadjustment,
		      		  nightdiffadjustment: nightdiffadjustment,
		      		  lateadjustment: lateadjustment,
		      		  leaveadjustment: leaveadjustment,
		      		  otheradjustment: otheradjustment,
		      		  otnotes: otnotes,
		      		  nightnotes: nightnotes,
		      		  latenotes: latenotes,
		      		  leavenotes: leavenotes,
		      		  othernotes: othernotes,
		      		  totalGrosspay:totalGrosspay,
		      		  sss:sss,
		      		  phic:phic,
		      		  hdmf:hdmf,
		      		  loan:loan
		      		  },
		      async : true,
		      dataType : 'json',
		      success: function(data){
	      		$('#modal_adjustment').modal('hide');
	      		$('#modal_confirmation').modal('hide');
	      		var table = $('#datatable1').DataTable();

	      		var ot_adj 		= accounting.formatMoney(otadjustment);
	      		var night_adj 	= accounting.formatMoney(nightdiffadjustment);
	      		var late_adj 	= accounting.formatMoney(lateadjustment);
	      		var leave_adj 	= accounting.formatMoney(leaveadjustment);
	      		var other_adj 	= accounting.formatMoney(otheradjustment);

        		if(parseFloat(otadjustment)!=0){
        			ot_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" notes="' 
        						+ otnotes + 
        						'" type="Overtime Adjustment Details" amount="' 
        						+ accounting.formatMoney(otadjustment) + 
        						'" id="otnotes' + payrolldetailsID + '">' + accounting.formatMoney(otadjustment) + 
        						'</a>';
        		}

        		if(parseFloat(nightdiffadjustment)!=0){
        			night_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" notes="' 
        						+ nightnotes + 
        						'" type="Night Differential Adjustment Details" amount="' 
        						+ accounting.formatMoney(nightdiffadjustment) + 
        						'" id="nightnotes' + payrolldetailsID + '">' + accounting.formatMoney(nightdiffadjustment) + 
        						'</a>';
        		}

        		if(parseFloat(lateadjustment)!=0){
        			late_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" notes="' 
        						+ latenotes + 
        						'" type="Late Adjustment Details" amount="' 
        						+ accounting.formatMoney(lateadjustment) + 
        						'" id="latenotes' + payrolldetailsID + '">' + accounting.formatMoney(lateadjustment) + 
        						'</a>';
        		}

        		if(parseFloat(leaveadjustment)!=0){
        			leave_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" notes="' 
        						+ leavenotes + 
        						'" type="Leave Adjustment Details" amount="' 
        						+ accounting.formatMoney(leaveadjustment) + 
        						'" id="leavenotes' + payrolldetailsID + '">' + accounting.formatMoney(leaveadjustment) + 
        						'</a>';
        		}

        		if(parseFloat(otheradjustment)!=0){
        			other_adj = '<a href="#" class="view-notes" data-toggle="modal" data-target="#modal_notes" style="text-decoration: underline;" notes="' 
        						+ othernotes + 
        						'" type="Other Adjustment Details" amount="' 
        						+ accounting.formatMoney(otheradjustment) + 
        						'" id="othernotes' + payrolldetailsID + '">' + accounting.formatMoney(otheradjustment) + 
        						'</a>';
        		}

        		$("#adjustment"+payrolldetailsID).attr("otnotes",otnotes);
        		$("#adjustment"+payrolldetailsID).attr("nightnotes",nightnotes);
        		$("#adjustment"+payrolldetailsID).attr("latenotes",latenotes);
        		$("#adjustment"+payrolldetailsID).attr("leavenotes",leavenotes);
        		$("#adjustment"+payrolldetailsID).attr("othernotes",othernotes);
	      		table.cell('#' + payrolldetailsID + ' td:eq(5)').data(ot_adj).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(7)').data(night_adj).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(11)').data(late_adj).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(13)').data(leave_adj).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(14)').data(accounting.formatMoney(totalGrosspay)).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(15)').data(accounting.formatMoney(data["wtax"])).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(16)').data(accounting.formatMoney(data["sss"])).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(17)').data(accounting.formatMoney(data["phic"])).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(20)').data(other_adj).draw();
	      		table.cell('#' + payrolldetailsID + ' td:eq(21)').data(accounting.formatMoney(data["netpay"])).draw();

	      		$('#' + payrolldetailsID + ' td:eq(5)').css("color", (otadjustment<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(7)').css("color", (nightdiffadjustment<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(11)').css("color", (lateadjustment<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(13)').css("color", (leaveadjustment<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(14)').css("color", (totalGrosspay<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(20)').css("color", (otheradjustment<0) ? "#9a0505" : '#059a05');
	      		$('#' + payrolldetailsID + ' td:eq(21)').css("color", (parseFloat(data["netpay"])<0) ? "#9a0505" : '#059a05');

	  	  		showSuccessToast("Payroll adjustment successfully applied!");
		      },
		      error: function(request, textStatus, error) {

		      }
     	 });
         return false;
	});	

	$(document).on("click", ".denied_info", function(){
		const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
     	const day = ["Sun", "Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

		var payrollID = $(this).attr('denied_id');
		
    	$.ajax({
		      url : "<?php echo site_url('Payrollsecurityguard/getdenied');?>",
		      method : "POST",
		      data : {payrollID:payrollID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	var datedenied 	= new Date(data[0]["datedenied"]);
		     	var fullDate = day[datedenied.getDay()] + ", " + months[datedenied.getMonth()] + " " + 
		     					datedenied.getDate().toString().padStart(2,"0") + ", " + 
		     					datedenied.getFullYear() + " " +
		     					datedenied.getHours().toString().padStart(2,"0")    + ":" +
		     					datedenied.getMinutes().toString().padStart(2,"0")  + ":" +
		     					datedenied.getSeconds().toString().padStart(2,"0") ;

		      	$("#deny_date").html(fullDate);
		      	$("#deny_approver").html(data[0]["fullname"]);
		      	$("#deny_reason").html(data[0]["reason"]);
         	  },
              error: function(request, textStatus, error) {

        	  } 
        });
        return false; 
	}); 

	$(document).on("click", ".view-notes", function(){
		$("#modal_notes .modal-title").html($(this).attr("type"));
		$("#view_amount").html($(this).attr("amount"));
		$("#view_notes").html($(this).attr("notes"));

        return false; 
	}); 
}); 		 
</script>