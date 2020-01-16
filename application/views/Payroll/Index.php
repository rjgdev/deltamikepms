<?php
	$timekeepingNo 		= "-----"; 
	$datefrom 			= "-----"; 
	$dateto 			= "";
	$payperiod 			= "";
	$payperiodrange		= "-----";
	$timekeepingstatus  = "-----";
	$tkstatus 			= "";

	foreach ($data['cutoff'] as $item) {
		$timekeepingNo 		= "TK-".str_pad($item->timekeepingID, 6, "0", STR_PAD_LEFT);
		$datefrom 			= date("F d, Y",strtotime($item->datefrom)); 
		$dateto 			= date("F d, Y",strtotime($item->dateto));
		$payperiod 			= $item->payperiod;
		$payperiodrange		= date("F d, Y",strtotime($item->datefrom)).' - '.date("F d, Y",strtotime($item->dateto)).' ('.$payperiod.')';
		$tkstatus 			= $item->timekeepingstatus;
		if($item->timekeepingstatus==1) $timekeepingstatus = "PENDING";
		else if($item->timekeepingstatus==2) $timekeepingstatus = "APPROVED";
		else if($item->timekeepingstatus==3) $timekeepingstatus = "DENIED";
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
				<!-- <div class="col-auto float-right ml-auto align-items-center">
					<button class="btn add-btn processpayroll" style="border-radius: 5px; padding: .68rem;"><i class="fa fa-forward"></i> Process Payroll </button>

					<div class="view-icons" style="width:280px;">
						<select class="form-control select2" id="cutoff" description="employee type" required>
							    <option value="">Please select pay period</option>
							    <?php foreach ($cutoff as $item) { 
	                                echo '<option value="'.$item->cutoffID.'" datefrom="'.$item->datefrom.'" dateto="'.$item->dateto.'" payperiod="'.$item->payperiod.'">'.date("F d, Y",strtotime($item->datefrom)).' - '.date("F d, Y",strtotime($item->dateto)).' ('.$item->payperiod.')'.'</option>';
	                            } ?>  
					    </select>
					    <p style="font-size: 90%; color: #dc3545; margin: 5px;">Please select a pay period!</p>
					</div>
				</div> -->

				<!-- <div class="col-auto float-right ml-auto">
			   		   	<div class="col-sm-6 col-md-3 col-lg-3 col-xl-7 col-12">  
							<select class="form-control select2" id="cutoff" description="employee type" required>
							    <option value="">Please select cutoff</option>
							    <option value="1">Security Guard</option>
							    <option value="2">Staff</option>
						    </select>
						</div>   

						<div class="col-sm-6 col-md-3 col-lg-3 col-xl-5 col-12">  
							<button type="button" class="btn btn-info btn-block processpayroll"> Process Payroll </button>
						</div> 
				</div> -->
			</div>

		</div>

		<!-- /Page Header -->
		
		<!-- PROCESS -->
			<div class="row filter-row" style="margin-bottom: 20px;">
				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-dashboard"></i>
								Timekeeping No.</h5>
							<div class="dash-card-container">
								
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"><?php echo $timekeepingNo; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-calendar"></i>
								Timekeeping Status</h5>
							<div class="dash-card-container">
								<div class="dash-card-content dash-card-header" >
									<p id="status" status="<?php echo $tkstatus; ?>" style="color:#e04d45;"><?php echo $timekeepingstatus; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card">
							<h5 class="dash-title">
									<i class="la la-calendar"></i>
								Pay Period</h5>
							<div class="dash-card-container">
								
								<div class="dash-card-content dash-card-header">
									<p style="color:#e04d45;"
									   id="cutoff" 
									   timekeepingID="<?php echo $timekeepingNo; ?>" 
									   datefrom="<?php echo $datefrom; ?>" dateto="<?php echo $dateto; ?>" payperiod="<?php echo $payperiod; ?>">
									<?php echo $payperiodrange; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3">
					<div class="dash-info-list">
						<div class="dash-card">
							<div class="dash-card-container">
									<button class="btn add-btn processpayroll" style="border-radius: 5px; width:100%;"><i class="fa fa-forward"></i> Process Payroll </button>
							</div>
						</div>
					</div>
				</div>
	        </div>
		<!-- /PROCESS -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive"  id="show_data">
					<table class="table table-striped custom-table" id="datatable1">
						<thead>
							<tr>
								<th style="width: 100px ! important;">Employee No.</th>
								<th style="width: 250px;">Employee Name</th>
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

	$('.processpayroll').unbind('click').bind('click', function(){
		if($('#status').attr('status')=="2"){
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
								'<th style="width: 100px ! important;">Employee No.</th>' +
								'<th style="width: 250px;">Employee Name</th>' +
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

	            	for(var i=0; i<data.length; i++){
    					html += '<tr>' +
    								'<td>' + data[i].employeeID.padStart(6,'0') 													+ '</td>' +
    								'<td>' + data[i].firstname + ' ' + data[i].lastname 											+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e;">' + accounting.formatMoney(data[i].basicpay)		+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e;">' + accounting.formatMoney(data[i].ordinaryot) 	+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].late) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].absent) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].wtax) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].sss) 			+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].phic) 		+ '</td>' +
    								'<td class="text-right" style="color:#be0e0e;">' + accounting.formatMoney(data[i].hdmf) 		+ '</td>' +
    								'<td class="text-right" style="color:#0ebe0e; font-weight: 500;">' + accounting.formatMoney(data[i].netpay) + '</td>';
								'</tr>';
            		}

            		html += '</tbody></table>';

			        if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };

            		$("#show_data").html(html);
			        $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
				        fixedColumns:   {
						    leftColumns: 2,
						    rightColumns: 1
						}
				    });
	        	},
	            error: function(request, textStatus, error) {

	        	}
	        });
	        return false;
    	}else{
    		if($('#status').attr('status')=="1")
				showErrorToast("Cannot process, timekeeping is still pending!");
    		else if($('#status').attr('status')=="3") 
    			showErrorToast("Cannot process, timekeeping is denied!");
			else showErrorToast("No available payroll to process!");
    	}
	});
}); 		 
</script>