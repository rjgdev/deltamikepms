<?php
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
		$lastday 		= date("d",strtotime($item->dateto));
		$colspan	    = ($dayto- $dayfrom) + 9;
		$payperiod 		= $item->payperiod;
		$tkstatus		= $item->timekeepingstatus;

		$currentMonth = date('m',strtotime($item->datefrom));
		$currentYear  = date('Y',strtotime($item->datefrom));

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
		$lastapprover 	 = $item->lastapprover;
		$currentapprover = $item->employeeID;
		$approvername 	 = $item->firstname.' '.$item->lastname;
	}

	function checkRDLV($timekeepingID,$dataRest,$dataLeave,$employeeID,$currentYear,$currentMonth,$day) {
		if(count($dataRest)!=0){
			$current_day = date_format(date_create($currentYear."-".$currentMonth."-".$day),"N");
			$isRest = 0;
			$restDay = 0;

			foreach ($dataRest as $rest) { 
				if($rest->employeeID==$employeeID && 
				   $rest->restday==$current_day){ 
			  	  		echo "<td class='tsdata' style='color:#1c78d1;'><div tkid='".$timekeepingID."' value='RD|0|0|0|0'></div>RD</td>";
			  	  		$restDay++;
				  $isRest = 1;
				}
			}

			if($isRest==0){
				if(count($dataLeave)!=0){
					$current_date = date_format(date_create($currentYear."-".$currentMonth."-".$day),"Y-m-d");
					$isLeave = 0;

					foreach ($dataLeave as $leave) {
						if($leave->employeeID==$employeeID && 
						  ($leave->leavefrom<=$current_date && $leave->leaveto>=$current_date)){
					  	  		echo "<td class='tsdata' style='color:#d1221c;'><div tkid='".$timekeepingID."' value='RD|0|0|0|0'></div>LV</td>";
						  $isLeave = 1;
						}
					}

					if($isLeave==0){
						echo "<td><div tkid='".$timekeepingID."' value=''></div></td>";
					}
				}else{
					echo "<td><div tkid='".$timekeepingID."' value=''></div></td>";
				}
			}
		}else{
			if(count($dataLeave)!=0){
				$current_date = date_format(date_create($currentYear."-".$currentMonth."-".$day),"Y-m-d");
				$isLeave = 0;

				foreach ($dataLeave as $leave)  {
					if($leave->employeeID==$employeeID && 
					  ($leave->leavefrom<=$current_date && $leave->leaveto>=$current_date)){
				  	  		echo "<td class='tsdata' value='LV|0|0|0|0' style='color:#d1221c;'><div tkid='".$timekeepingID."' value='".$timekeepingID."'></div></td>";
					  $isLeave = 1;
					}
				}

				if($isLeave==0){
					echo "<td><div tkid='".$timekeepingID."' value='".$timekeepingID."'></div></td>";
				}
			}else{
				echo "<td><div tkid='".$timekeepingID."' value='".$timekeepingID."'></div></td>";
			}
		}

		return $restDay;
	}
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
	
					<h3 class="page-title">Timekeeping <span class="text-info">(Staff)</span></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Timekeeping (Staff)</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- /Page Header -->

		<div class="row filter-row" style="margin-bottom: 20px;">
			<div class="faq-card col-lg-12 col-md-12"  style="margin-left:auto; ">
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

			<div class="col-lg-2 col-md-2 mb-1">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Timekeeping Number</h5>
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
			<div class="col-lg-2 col-md-2 mb-1">
				<div class="dash-info-list">
					<div class="dash-card">
						<h5 class="dash-title">
								<i class="la la-dashboard"></i>
							Timekeeping Status</h5>
						<div class="dash-card-container">
							
							<div class="dash-card-content dash-card-header">
								<p style="color:#e04d45;margin-right: 10px;" id="show_status">
									<?php 
										if($timekeepingstatus=="DENIED"){
											echo "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='".$timekeepingID."'>".$timekeepingstatus."</a>";
										}else{
											echo $timekeepingstatus;
										} 
									?>
							    </p>
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
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
								<p style="color:#e04d45;margin-right: 10px;" id="show_datesubmitted"><?php echo $datesubmitted; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
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
								<p style="color:#e04d45;margin-right: 10px;" id="show_approver"><?php echo $approvername; ?>
							    </p>
							    
							   <!--  <button type="button" class="btn btn-success approve">Approved</button>	 -->
							</div>
						</div>
					</div>
				</div>
			</div>	

			<div class="col-lg-2 col-md-2 mb-1 mt-1" id="show_button">
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
								<th colspan="<?=$colspan;?>" style="text-align:center; color:white;background-color: #df4c44; text-transform: uppercase;">
									<?php echo "Period: ".$datefrom.' - '.$dateto; ?>
								</th>
							</tr>
							<tr>
								<th style="display: none;">Employee ID </th>
								<th class="tsheader tsemployeeheader" style="color:#e04d45; text-align: left !important;">Employee Name </th>
								
								<?php 

									$dayWord = ["", "Mon", "Tue","Wed", "Thu", "Fri", "Sat","Sun"];

									for($i=$dayfrom;$i<=$dayto;$i++){
								?>
									<th class="tsheader tsdataheader" style="color:#e04d45;font-weight: 500;">
										<?php echo $i."<br>".$dayWord[date_format(date_create($currentYear."-".$currentMonth."-".$i),"N")]; ?>
									</th>
								<?php } ?>

								<th class="tsheader tslastheader" style="color:#e04d45;">Total<br>Hours</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Basic<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">OT<br>(Hour)</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">Rest<br>Day</th>
								<th class="tsheader tslastheader" style="color:#e04d45;">No. of<br>Days</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($data['employee'] as $emp){
									$init 			= $dayfrom;
									$total_accumHours 	= 0;
									$total_accumMinutes = 0;
									$totalHours 		= 0;

									$basic_accumHours 	= 0;
									$basic_accumMinutes = 0;
									$totalBasic 		= 0;

									$overtime_accumHours 	= 0;
									$overtime_accumMinutes 	= 0;
									$totalOvertime 			= 0;

									$retRD			= 0;
									$restDay		= 0;
									$totalDays		= 0;
									$imgName		= 0;
									$exist 			= 0;
									$color  		= "";
									$timeStatus     = 0;

									if($emp->photo=="") $imgName = "profileimg.png";
									else $imgName = $emp->photo;

									echo '<tr>
											<td style="display:none;"><div tkid="'.$timekeepingID.'" value="'.$emp->employeeID.'"></div>'.$emp->employeeID.'</td>
											<td>
												<h2 class="table-avatar">
													<div class="avatar">
														<img alt="" src="uploads/'.$imgName.'">
													</div>
													<div style="font-size: 12px;">'.$emp->fullname.'
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
													if($item->tkType!="Exist"){
														$color = "#ff5200c7"; 
														$timeStatus = 2;
													}else if($item->validateuser!="" || $item->validateuser!=NULL){
														$color = "#ff5200c7";
														$timeStatus = 2;
													}else{
														$color = "#179414";
														$timeStatus = 1;
													} 

													if($item->tkType=="Exist"){
														/********* TOTAL HOURS **********/
															$total_hours = explode(":",$item->actualhours)[0];
															$total_minutes = explode(":",$item->actualhours)[1];

															$total_accumHours += $total_hours;
															$total_accumMinutes += $total_minutes;

														/********* TOTAL BASIC **********/
															$basic_hours = explode(":",$item->actual_regular_hours)[0];
															$basic_minutes = explode(":",$item->actual_regular_hours)[1];

															$basic_accumHours += $basic_hours;
															$basic_accumMinutes += $basic_minutes;

														/********* TOTAL OT **********/
															$overtime_hours = explode(":",$item->actual_ot_hours)[0];
															$overtime_minutes = explode(":",$item->actual_ot_hours)[1];

															$overtime_accumHours += $overtime_hours;
															$overtime_accumMinutes += $overtime_minutes;

														$actualhours = explode(":",$item->actualhours)[0].":".explode(":",$item->actualhours)[1];
														$actualreg   = explode(":",$item->actual_regular_hours)[0].":".explode(":",$item->actual_regular_hours)[1];
														$actualot    = explode(":",$item->actual_ot_hours)[0].":".explode(":",$item->actual_ot_hours)[1];
														$totalDays++;

														echo "<td class='tsdata' style='font-weight: 500; color:".$color.";'>
																<a href='javascript:void(0);' data-toggle='modal' class='attendance_info' data-target='#attendance_info' tkid='".$item->timekeepingID."' value='".$actualhours."|".$actualreg."|".$actualot."|".$item->timesheetID."|".$timeStatus."' id='".$item->timesheetID."'>".$actualhours."</a></td>";
														break;
													}else{

														if($item->timein==null || $item->timeout==null){
															echo "<td class='tsdata' style='font-weight: 500; color:".$color.";'>
																<a href='javascript:void(0);' data-toggle='modal' class='biotime_info' data-target='#biotime_info' tkid='".$item->timekeepingID."' value='notexist|0|0|".$item->timesheetID."|0' timeshtid='".$item->timesheetID."'><i style='color:#49ca46;' class='fas fa-user-clock fa-lg'></i></a></td>";
														}else{
															echo "<td class='tsdata' style='font-weight: 500; color:".$color.";'>
																<a href='javascript:void(0);' data-toggle='modal' class='schedule_info' data-target='#schedule_info' tkid='".$item->timekeepingID."' value='notexist|0|0|".$item->timesheetID."|0' timeshtid='".$item->timesheetID."'><i class='fa fa-calendar-times fa-2x'></i></a></td>";
														}
														
														break;
													}
												}else{
													$retRD = checkRDLV($item->timekeepingID,$data['restday'],$data['leave'],$emp->employeeID,$currentYear,$currentMonth,$i);
													$restDay+=$retRD;
												}
											}
										}

										if($exist==1){
											for($x=$i+1;$x<=$lastday;$x++){
												$retRD = checkRDLV($item->timekeepingID,$data['restday'],$data['leave'],$emp->employeeID,$currentYear,$currentMonth,$x);
												$restDay+=$retRD;
											}
										}
									}

									if($exist==0){
										for($y=$init;$y<=$lastday;$y++){
											$init++;
											$retRD = checkRDLV($item->timekeepingID,$data['restday'],$data['leave'],$emp->employeeID,$currentYear,$currentMonth,$y);
											$restDay+=$retRD;
										}
									}

									/********* TOTAL HOURS **********/
										$total_totalMinutes = $total_accumMinutes % 60;
										$total_addedHours   = intval($total_accumMinutes / 60);

										$totalHours = ($total_accumHours + $total_addedHours).":".str_pad($total_totalMinutes, 2, "0", STR_PAD_LEFT);

									/********* TOTAL BASIC **********/
									
										$basic_totalMinutes = $basic_accumMinutes % 60;
										$basic_addedHours   = intval($basic_accumMinutes / 60);

										$totalBasic = ($basic_accumHours + $basic_addedHours).":".str_pad($basic_totalMinutes, 2, "0", STR_PAD_LEFT);

									/********* TOTAL OT **********/

										$overtime_totalMinutes = $overtime_accumMinutes % 60;
										$overtime_addedHours   = intval($overtime_accumMinutes / 60);

										$totalOvertime = ($overtime_accumHours + $overtime_addedHours).":".str_pad($overtime_totalMinutes, 2, "0", STR_PAD_LEFT);

									echo  "<td class='tsdata' style='font-weight: 500;'><div tkid='".$timekeepingID."' value='".($totalHours==0 ? "" : $totalHours)."'></div>".($totalHours==0 ? "" : $totalHours)."</td>".
										  "<td class='tsdata' style='font-weight: 500;'><div tkid='".$timekeepingID."' value='".($totalBasic==0 ? "" : $totalBasic)."'></div>".($totalBasic==0 ? "" : $totalBasic)."</td>".
										  "<td class='tsdata' style='font-weight: 500;'><div tkid='".$timekeepingID."' value='".($totalOvertime==0 ? "" : $totalOvertime)."'></div>".($totalOvertime==0 ? "" : $totalOvertime)."</td>".
										  "<td class='tsdata' style='font-weight: 500;'><div tkid='".$timekeepingID."' value='".($restDay==0 ? "" : $restDay)."'></div>".($restDay==0 ? "" : $restDay)."</td>".
										  "<td class='tsdata' style='font-weight: 500;'><div tkid='".$timekeepingID."' value='".($totalDays==0 ? "" : $totalDays)."'></div>".($totalDays==0 ? "" : $totalDays)."</td>".
										"</tr>";
									}
								?>
						</tbody>
					</table>
				</div>
        </div>
    </div>
	<!-- /Page Content -->
</div>

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

								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Schedule Info</h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td style="color:#e04d45;" colspan="2">
												<div class="row">
													<div class="col-6">
														<label>Time In <span class="text-danger">*</span></label>
														<input class="form-control" type="time" value="07:00" id="addTimein">
														<div class="invalid-feedback" id="addTimein-invalid"></div>
													</div>
													<div class="col-6">
														<label>Time Out <span class="text-danger">*</span></label>
														<input class="form-control" type="time" value="19:00" id="addTimeout">
														<div class="invalid-feedback" id="addTimeout-invalid"></div>
													</div>
												</div>
											</td>
											<!-- <td id="schedule_shift">
												
											</td> -->
										</tr>
										<tr>
											<td style="color:#e04d45;" colspan="2">
												<div class="row">
													<div class="col-12">
														<label>Remarks <span class="text-danger">*</span></label>
														<textarea class="form-control" style="width:100%;" id="addRemarks" rows=3 placeholder="Enter your remarks here"></textarea>
														<div class="invalid-feedback" id="addRemarks-invalid"></div>
													</div>
												</div>
											</td>
											<!-- <td id="schedule_shift"></td> -->
										</tr>
									</tbody>
								</table>
							</div>

							 <button type="button" class="btn btn-success validate"><i class="fa fa-check"></i> Validate Attendance</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Schedule Modal -->

<!-- Biotime Modal -->
<div class="modal custom-modal fade" id="biotime_info" role="dialog">
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
								<h4 class="card-title" style="font-size: 17px !important; margin-bottom: 5px;">Timekeeping <small class="text-muted" style="font-size: 70% !important;" id="biotime_date"></small></h4>
								<table class="table table-striped table-border">
									<tbody>
										<tr>
											<td class="text-center" colspan="2" style="color: #ffffff; background-color: #e04d45; font-weight: 500;" id="biotime_day">NO SCHEDULE</td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time In:</td>
											<td class="text-right" id="biotime_timein"></td>
										</tr>
										<tr>
											<td style="color:#e04d45;">Time Out:</td>
											<td class="text-right" id="biotime_timeout"></td>
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
<!-- /Biotime Modal -->

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
								<button class="btn btn-primary submit-btn"></button>
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
	div#datatable_wrapper .row:nth-child(2){
	    overflow-y: hidden;
	}

	.table td{
		padding: .5rem;
	}

	.edit-time{
		margin-left:5px; 
		color:#df4c44;
	}
</style>

<script type="text/javascript">

	$(window).on("load", function() {
		<?php if($this->session->flashdata('uploaded')!=""){ $message = $this->session->flashdata('uploaded'); ?>
			showSuccessToast("<?php echo $message; ?>" + " is successfully uploaded!");
		<?php } ?>
		<?php if($this->session->flashdata('validated')!=""){ ?>
			showSuccessToast("Record successfully validated!");
		<?php } ?>
	});

	$(document).ready(function() {
		table = $('#datatable').DataTable( {
						"pageLength": 50,
				        "ordering": false,
				        "info":     false,
				        "autoWidth": false,
					    "fixedHeader": {
					        "header": false,
					        "footer": false
					    },
					    "columnDefs": [
					      { "width": "300px", "targets": 'tsemployeeheader'},
					      { "width": "20px", "targets": 'tsdataheader'},
					      { "width": "40px", "targets": 'tslastheader'}
					    ]
			    });

	$('#file').change(function(){
      var name = document.getElementById('file'); 
      $(".custom-file-label").text(name.files.item(0).name);
    });

    $('#schedule_info').on('shown.bs.modal', function(){
		$('#addTimein').focus(); 
    });

    $(document).on("click", ".approve", function(){
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/approve.svg");
		$('#modal_title').html("Approve Timekeeping");
    	$('#modal_message').html("Are you sure you want to approve the timekeeping?");
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Approve timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_approvetimekeeping");
    	$('.deny_item').html("");
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

    $(document).on("click", "#modal_approvetimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');
    	var lastapprover  = $('#cutoff').attr('lastapprover');

    	$('.submit-btn').attr("disabled","disabled");
		$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

		var attendance = [];
		
		if(lastapprover==1){
		    var i = 0;

		 	table.rows().eq(0).each( function ( index ) {
			    var row = table.row( index );
			 
			    var data = row.data();
			    var array_attendance = [];

			    for(i=0;i<data.length;i++){
			    	if(i==0){
		    			array_attendance[i] = $(data[0]).attr("value");
		    			continue;
			    	} 

			    	if(i==1){
	    				array_attendance[i] = $(data[0]).attr("tkid");
	    				continue;
			    	} 

			    	array_attendance[i] = $(data[i]).attr("value");
			    }

			    if(array_attendance[array_attendance.length-1]!="" ||  
			       array_attendance[array_attendance.length-2]!="" ||
			       array_attendance[array_attendance.length-3]!="" ||
			       array_attendance[array_attendance.length-4]!="" ||
			       array_attendance[array_attendance.length-5]!=""){
		       		attendance.push(array_attendance);
			    }
			});
		}

    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/approve');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID,
		      		  lastapprover:lastapprover,
		      		  attendance:attendance,
			      	  dayfrom:<?=$dayfrom;?>,
			      	  dayto:<?=$dayto;?>},
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

	      		if(lastapprover==1){
	  	  			showSuccessToast("Timekeeping is successfully approved! You may continue the process by going to the <b><u>payroll process.</u></b>");
  	  			}else{
	  	  			showSuccessToast("Timekeeping is successfully approved and now available for the next approver.");
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
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/deny.svg");
		$('#modal_title').html("Deny Timekeeping");
    	$('#modal_message').html("Are you sure you want to deny the timekeeping?");
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Deny timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_denytimekeeping");
    	$('.deny_item').html('<br>' + 
							 '<p class="text-left text-danger" style="font-size: 1.1em;">Please enter a reason:</p>' + 
							 '<p><textarea class="form-control restrictspecchar" rows="4" id="reason"></textarea></p>');
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", "#modal_denytimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');
    	var reason = $('#reason').val();

    	if(reason.trim()==""){
    		$('#reason').focus();
    		return;
    	}

    	$('.submit-btn').attr("disabled","disabled");
		$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');

    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/deny');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID,
		      		  reason:reason},
		      async : true,
		      success: function(data){
		      	
		      	var htmlStatus = "<a href='javascript:void(0);' data-toggle='modal' class='denied_info' data-target='#denied_info' id='" + timekeepingID + "'>DENIED</a>";
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
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Submit timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_submittimekeeping");
    	$('.deny_item').html("");
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", "#modal_submittimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');

    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/submit');?>",
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
		      		$('.submit-btn').attr("disabled","disabled");
					$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
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
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Cancel timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_canceltimekeeping");
    	$('.deny_item').html("");
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", "#modal_canceltimekeeping", function(){
    	var timekeepingID = $('#cutoff').attr('timekeepingid');

    	$('.submit-btn').attr("disabled","disabled");
		$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...');
		      		
    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/cancel');?>",
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

        var regex = new RegExp("([a-zA-Z0-9\s_\\.\\-\(\):])+(.csv)$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	showUploadTimekeepingError("Please select a <b>CSV</b> file.");
            return false;
        }
        
        $('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Upload Timekeeping");
    	$('#modal_message').html("Are you sure you want to upload the timekeeping?");
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Upload timekeeping");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_uploadtimekeeping");
    	$('.deny_item').html("");
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", "#modal_uploadtimekeeping", function(){
		$('.submit-btn').attr("disabled","disabled");
		$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...');
		$("#upload_csv").submit();
	});

	$('#upload_csv').on("submit", function(e){ 
        var fileType = ".csv";

        var regex = new RegExp("([a-zA-Z0-9\s_\\.\\-\(\):])+(.csv)$");
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
             url:"<?php echo site_url('Timekeepingstaff/uploadTimekeeping');?>",   
             method:"POST",  
             data:formData,  
             contentType:false,          // The content type used when sending data to the server.  
             cache:false,                // To unable request pages to be cached  
             processData:false,          // To send DOMDocument or non processed data file it is set to false  
             dataType : 'json',
             success: function(data){  
             	window.location.replace('<?php echo base_url(); ?>Timekeepingstaff');
             },
             error: function(request, textStatus, error) {


        	 } 
        });
        return false;  
   	});  


	$(document).on("click", ".attendance_info", function(){
		var timesheetID = $(this).attr('id');
		
    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/getattendance');?>",
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
             					
 					datetimein += "<a href='#' id='edit_timein' indate='"+day[timein.getDay()] + ", " + months[timein.getMonth()] + " " + 
             					timein.getDate().toString().padStart(2,"0") + ", " + 
             					timein.getFullYear()+"' intime='"+timein.getHours().toString().padStart(2,"0") + ":" +
             					timein.getMinutes().toString().padStart(2,"0") + ":" +
             					timein.getSeconds().toString().padStart(2,"0")+"'><i class='fa fa-edit edit-time'></i></a>";
				var timeout = new Date(data[0]["t_timeout"]);
             	var datetimeout = day[timein.getDay()] + ", " + months[timeout.getMonth()] + " " + 
             					timeout.getDate().toString().padStart(2,"0") + ", " + 
             					timeout.getFullYear() + " <b>" +
             					timeout.getHours().toString().padStart(2,"0") + ":" +
             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
             					timeout.getSeconds().toString().padStart(2,"0") + "</b>";

 					datetimeout += "<a href='#' id='edit_timeout' outdate='"+day[timeout.getDay()] + ", " + months[timeout.getMonth()] + " " + 
             					timeout.getDate().toString().padStart(2,"0") + ", " + 
             					timeout.getFullYear()+"' outtime='"+timeout.getHours().toString().padStart(2,"0") + ":" +
             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
             					timeout.getSeconds().toString().padStart(2,"0")+"'><i class='fa fa-edit edit-time'></i></a>";

				/******************** REGULAR HOURS ***************************/
				var strHrs = "";
				var strMin = "";

				var actual_regular_hours = data[0]["actual_regular_hours"].split(':');

					 if(actual_regular_hours[0]>1) strHrs = parseInt(actual_regular_hours[0]) + " hours";
				else if(actual_regular_hours[0]==1) strHrs = parseInt(actual_regular_hours[0]) + " hour";

				if(actual_regular_hours[1]>0){
					if(strHrs==""){
						 strMin = parseInt(actual_regular_hours[1]) + " minutes";
					}else{
							if(actual_regular_hours[1]>1) strMin = " and " + parseInt(actual_regular_hours[1]) + " minutes";
						else if(actual_regular_hours[1]==1) strMin = " and " + parseInt(actual_regular_hours[1]) + " minute";
					} 
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
		      url : "<?php echo site_url('Timekeepingstaff/getattendance');?>",
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

				if(data[0]["t_timein"]==null){
					var datetimein = "-";
				}else{
					var timein = new Date(data[0]["t_timein"]);
	             	var datetimein = day[timein.getDay()] + ", " + months[timein.getMonth()] + " " + 
	             					timein.getDate().toString().padStart(2,"0") + ", " + 
	             					timein.getFullYear() + " <b>" +
	             					timein.getHours().toString().padStart(2,"0") + ":" +
	             					timein.getMinutes().toString().padStart(2,"0") + ":" +
	             					timein.getSeconds().toString().padStart(2,"0") + "</b>";
				}

				if(data[0]["t_timeout"]==null){
					var datetimeout = "-";
				}else{
					var timeout = new Date(data[0]["t_timeout"]);
	             	var datetimeout = day[timeout.getDay()] + ", " + months[timeout.getMonth()] + " " + 
	             					timeout.getDate().toString().padStart(2,"0") + ", " + 
	             					timeout.getFullYear() + " <b>" +
	             					timeout.getHours().toString().padStart(2,"0") + ":" +
	             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
	             					timeout.getSeconds().toString().padStart(2,"0") + "</b>";
				}

				$("#schedule_date").html(datesched);
				$("#schedule_timein").html(datetimein);
				$("#schedule_timeout").html(datetimeout);
             },
             error: function(request, textStatus, error) {

        	 } 
        });
        return false; 
	}); 

	$(document).on("click", ".biotime_info", function(){
		var timesheetID = $(this).attr('timeshtid');

    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/getattendance');?>",
		      method : "POST",
		      data : {timesheetID:timesheetID},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		      	console.table(data);

             	const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
             	const day = ["Sun", "Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

             	var sched 	= new Date(data[0]["datesched"]);

             	var datesched = day[sched.getDay()] + ", " + months[sched.getMonth()] + " " + 
             					sched.getDate().toString().padStart(2,"0") + ", " + 
             					sched.getFullYear();

				if(data[0]["t_timein"]==null){
					var datetimein = "-";
				}else{
					var timein = new Date(data[0]["t_timein"]);
	             	var datetimein = day[timein.getDay()] + ", " + months[timein.getMonth()] + " " + 
	             					timein.getDate().toString().padStart(2,"0") + ", " + 
	             					timein.getFullYear() + " <b>" +
	             					timein.getHours().toString().padStart(2,"0") + ":" +
	             					timein.getMinutes().toString().padStart(2,"0") + ":" +
	             					timein.getSeconds().toString().padStart(2,"0") + "</b>";
				}

				if(data[0]["t_timeout"]==null){
					var datetimeout = "-";
				}else{
					var timeout = new Date(data[0]["t_timeout"]);
	             	var datetimeout = day[timeout.getDay()] + ", " + months[timeout.getMonth()] + " " + 
	             					timeout.getDate().toString().padStart(2,"0") + ", " + 
	             					timeout.getFullYear() + " <b>" +
	             					timeout.getHours().toString().padStart(2,"0") + ":" +
	             					timeout.getMinutes().toString().padStart(2,"0") + ":" +
	             					timeout.getSeconds().toString().padStart(2,"0") + "</b>";
				}
				
				$("#biotime_date").html(datesched);
				$("#biotime_timein").html(datetimein);
				$("#biotime_timeout").html(datetimeout);
             },
             error: function(request, textStatus, error) {

        	 } 
        });
        return false; 
	}); 


	$(document).on("click", ".denied_info", function(){
		const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
     	const day = ["Sun", "Mon", "Tue","Wed", "Thu", "Fri", "Sat"];

		var timekeepingID = $(this).attr('id');
		
    	$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/getdenied');?>",
		      method : "POST",
		      data : {timekeepingID:timekeepingID},
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

	$(document).on("click", ".validate", function(){
		var postTimein  = $("#addTimein").val();
		var postTimeout = $("#addTimeout").val();
		var remarks 	= $("#addRemarks").val();
		var object 		= "";
		var error 		= "";

		if(postTimein==""){
			document.getElementById("addTimein-invalid").innerHTML = "Please enter a valid time in.";
        	$('#addTimein').removeClass('is-valid');
        	$('#addTimein').addClass('is-invalid');
        	object = "#addTimein";
        	error  = "true";
		}else{
       		document.getElementById("addTimein-invalid").innerHTML = "";
        	$('#addTimein').removeClass('is-invalid');
        	$('#addTimein').addClass('is-valid');
        }

        if(postTimeout==""){
			document.getElementById("addTimeout-invalid").innerHTML = "Please enter a valid time out.";
        	$('#addTimeout').removeClass('is-valid');
        	$('#addTimeout').addClass('is-invalid');
        	if(object=="") object = "#addTimeout";
        	error = "true";
		}else{
       		document.getElementById("addTimeout-invalid").innerHTML = "";
        	$('#addTimeout').removeClass('is-invalid');
        	$('#addTimeout').addClass('is-valid');
        }

        if(remarks==""){
			document.getElementById("addRemarks-invalid").innerHTML = "Please enter a remarks.";
        	$('#addRemarks').removeClass('is-valid');
        	$('#addRemarks').addClass('is-invalid');
        	if(object=="") object = "#addRemarks";
        	error = "true";
		}else{
       		document.getElementById("addRemarks-invalid").innerHTML = "";
        	$('#addRemarks').removeClass('is-invalid');
        	$('#addRemarks').addClass('is-valid');
        }

        if(error!=""){
        	$(object).focus();
        	return false;
    	}

		$('#schedule_info').hide();
		$('.confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/upload.svg");
		$('#modal_title').html("Validate Attendance");
    	$('#modal_message').html("Are you sure you want to validate this attendance?");
    	$('.submit-btn').attr("disabled",false);
    	$('.submit-btn').html("Validate");
    	$(".cancel-btn").attr("id","cancelValidate");
    	$('.cancel-btn').html("Cancel");
    	$('.submit-btn').attr("id","modal_validate");
    	$('.deny_item').html("");
        $('#modal_confirmation').modal({backdrop: 'static', keyboard: false},'show');
		return false;
	});

	$(document).on("click", '#cancelValidate', function () {
		$('#modal_confirmation').modal('hide');
		$('#schedule_info').show();
	});

	$(document).on("click", "#modal_validate", function(){
		var postTimein  = $("#addTimein").val();
		var postTimeout = $("#addTimeout").val();
		var remarks 	= $("#addRemarks").val();
		var timesheetID = $(".validate").attr("timeshtid");

		$('.submit-btn').attr("disabled","disabled");
		$('.submit-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validating...');

		$.ajax({
		      url : "<?php echo site_url('Timekeepingstaff/validateattendance');?>",
		      method : "POST",
		      data : {timesheetID:timesheetID,
		      		  postTimein:postTimein,
		      		  postTimeout:postTimeout,
		      		  remarks:remarks},
		      async : true,
		      dataType : 'json',
		      success: function(data){
		  			window.location.replace('<?php echo base_url(); ?>Timekeepingstaff');
         	  },
              error: function(request, textStatus, error) {

        	  } 
        });
	});

	$(document).on("click", "#edit_timein", function(){
		var intime = $(this).attr('intime');
		var indate = $(this).attr('indate');

		var htmlTimein = "<a href='#' class='pull-right cancel-timein' canceltimein='"+intime+"' canceldatein='"+indate+"' style='padding: 5px 3px;'>" + 
						 	"<i class='fa fa-ban' style='color:red;font-size:1rem;'></i>" + 
					 	 "</a>" + 
					 	 "<a href='#' class='pull-right' style='padding: 5px 3px;'>" + 
					 	 	"<i class='fa fa-check' style='color:green;font-size:1rem;'></i>" + 
					 	 "</a>" + 
					 	 "<input class='form-control pull-right newtimein' style='height:25px;width: 110px; text-align: center;' type='time' value='"+intime+"'>";
		$("#attendance_timein").html(htmlTimein);
		$(".newtimein").focus();
	});

	$(document).on("click", ".cancel-timein", function(){
		var indate = $(this).attr('canceldatein');
		var intime = $(this).attr('canceltimein');
		var htmlTimein = "";

		htmlTimein += indate+" <b>"+intime+"</b><a href='#' id='edit_timein' indate='"+indate+"' intime='"+intime+"'><i class='fa fa-edit edit-time'></i></a>"


		$("#attendance_timein").html(htmlTimein);
	});

	$(document).on("click", "#edit_timeout", function(){
		var outtime = $(this).attr('outtime');
		var outdate = $(this).attr('outdate');

		var htmlTimeout = "<a href='#' class='pull-right cancel-timeout' canceltimeout='"+outtime+"' canceldateout='"+outdate+"' style='padding: 5px 3px;'>" + 
						 	"<i class='fa fa-ban' style='color:red;font-size:1rem;'></i>" + 
					 	 "</a>" + 
					 	 "<a href='#' class='pull-right' style='padding: 5px 3px;'>" + 
					 	 	"<i class='fa fa-check' style='color:green;font-size:1rem;'></i>" + 
					 	 "</a>" + 
					 	 "<input class='form-control pull-right newtimeout' style='height:25px;width: 110px; text-align: center;' type='time' value='"+outtime+"'>";
		$("#attendance_timeout").html(htmlTimeout);
		$(".newtimeout").focus();
	});

	$(document).on("click", ".cancel-timeout", function(){
		var outdate = $(this).attr('canceldateout');
		var outtime = $(this).attr('canceltimeout');
		var htmlTimeout = "";

		htmlTimeout += outdate+" <b>"+outtime+"</b><a href='#' id='edit_timeout' outdate='"+outdate+"' outtime='"+outtime+"'><i class='fa fa-edit edit-time'></i></a>"


		$("#attendance_timeout").html(htmlTimeout);
	});
});
</script>
<!-- Page Wrapper -->