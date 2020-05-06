<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Adjustment Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Adjustment Report</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-xl-12">
				<div class="form-group row mb-0">			
					<div class="col-lg-2 col-md-2">
						<div class="form-group form-focus select-focus">
							<div class="daterange"><input type="text" class="form-control" id="datefrom"></div>
							<label class="focus-label">Date From</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="form-group form-focus select-focus">
							<div class="daterange"><input type="text" class="form-control" id="dateto"></div>
							<label class="focus-label">Date To</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="form-group form-focus select-focus">
							<select class="form-control select2" id="employeetype">
							<option value="All">All</option>
							<option value="1">Security Guard</option>
							<option value="2">Staff</option>
							</select>
							<label class="focus-label">Employee Type</label>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="form-group form-focus select-focus">
							<select class="form-control select2" id="employee">
							<option value="All">All</option>
							<!-- <?php
							foreach($data['client'] as $client)
							{
							echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
							}
							?> -->
							</select>
							<label class="focus-label">Employee</label>
						</div>
					</div>
					<div class="col-lg-2 col-md-2">
						<div class="form-group form-focus select-focus">
							<button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%; height: 45px;"><i class="fas fa-search"></i> SEARCH</button>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="row">
            <div class="col-lg-12">
						<div class="table-responsive">
						<table class="table table-bordered custom-table" id="datatable" style="width: 100%;">
								<thead id="show_header">
									<!-- <tr>
										<th class="tsHeader">Payroll Period</th>				
										<th class="tsHeader">Payroll Item</th>				
										<th class="tsHeader">Amount</th>				
										<th style="color: #e04d45; text-align: center; min-width: 200px;">Notes</th>				
									</tr> -->
								</thead>	
								<tbody id="show_data">
									<tr>
										<td colspan="4" id="norecord">
											<img class="isometric confirmationisometric" style="height: 220px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/report.svg">
											<h4>Payroll Adjustment Report</h4>
											<p>Click <b><u>Search</u></b> to generate report.</p>
										</td>			
									</tr> 
		           				</tbody>
						</table>
					</div>
		</div>	
    </div>
	<!-- /Page Content -->
</div>
<!-- /Page Wrapper -->

<style>
.tsHeader{
	color: white;
    background-color: #df4c44;
	text-align: center;
	min-width: 200px;
}

#norecord{
	height: 55vh;
	text-align: center;
}
</style>

<script>
$(document).ready(function() {
	
	$('#datefrom').datepicker({
	    format: "MM, yyyy",
	    minViewMode: 1,
	    autoclose: true
	});

	$('#dateto').datepicker({
	    format: "MM, yyyy",
	    minViewMode: 1,
	    autoclose: true
	});

	$('#datefrom').datepicker('setDate', new Date());
	$('#dateto').datepicker('setDate', new Date());

    loadEmployee("All");

    $(document).on("change", "#employeetype", function(){
		loadEmployee($(this).val());
	});

	function loadEmployee(employeetype){

    	$("#employee").prop("disabled", true);

		$.ajax({
		      url : "<?php echo site_url('Payrolladjustmentreport/loademployee');?>",
		      method : "POST",
		      dataType : 'json',
		      data: {employeetype:employeetype},
		      success: function(data){
		     
		      	var htmlOutput = "";
		      		htmlOutput += '<option value="All">All</option>';
		      		for(i=0; i<data.length; i++){
						htmlOutput += '<option value="'+ data[i].employeeID +'">' + data[i].employeeID.padStart(6,'0') + " - " + data[i].fullname + '</option>';
					}
	      			
		      		$("#employee").html(htmlOutput);	
					$("#employee").prop("disabled", false);
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});
	}

	$(document).on("click", "#submit", function(){
		var datefrom  = $("#datefrom").datepicker('getDate').getFullYear() + "-" + ($("#datefrom").datepicker('getDate').getMonth()+1).toString().padStart(2,"0");
		var dateto    = $("#dateto").datepicker('getDate').getFullYear() + "-" + ($("#dateto").datepicker('getDate').getMonth()+1).toString().padStart(2,"0");
		var employee  = $("#employee").val();
		var tableHtml = "";
		var htmlHeader  = "";
		var htmlOutput  = "";

		htmlHeader += '<tr>' +
							'<th class="tsHeader">Payroll Period</th>' + 				
							'<th class="tsHeader">Payroll Item</th>' + 				
							'<th class="tsHeader">Amount</th>' + 				
							'<th style="color: #e04d45; text-align: center; min-width: 200px;color: white; background-color: #df4c44;">Notes</th>' + 				
					  '</tr>';

	    $("#show_header").html(htmlHeader);

		htmlOutput = '<tr>' + 
						'<td colspan="4" id="norecord" style="height: 45vh !important;">' + 
							'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/loading.svg">' + 
							'<h4>Please wait...</h4>' + 
							'<p>Generating payroll adjustment report.</p>' + 
						'</td>' + 
					'</tr>';

		$("#show_data").html(htmlOutput);

		$.ajax({
		      url : "<?php echo site_url('Payrolladjustmentreport/viewreport');?>",
		      method : "POST",
		      dataType : 'json',
		      data: {datefrom:datefrom,
		      		 dateto:dateto,
		      		 employee:employee},
		      success: function(data){	
			      	var firstRecord = 0;
			      	var payperiod   = "";
			      	var boolPeriod  = false;
			      	htmlOutput = "";

			      	if(data.length==0){
			      		htmlOutput += '<tr>' + 
										'<td colspan="4" id="norecord" style="height: 45vh !important;">' + 
											'<img class="isometric confirmationisometric" style="height: 220px !important;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
											'<h4>No payroll adjustment found!</h4>' + 
											'<p>Please adjust your search criteria and try again.</p>' + 
										'</td>' + 
										'<td style="display: none;"></td>' + 
										'<td style="display: none;"></td>' + 
										'<td style="display: none;"></td>' + 			
									'</tr>'; 
			      	}else{
			      		for(i=0; i<data.length; i++){
			      			var payperiod   = "";
				      		var boolPeriod  = false;
				      		var otadjt 		= parseFloat(data[i].otadjustment).toFixed(4);
	  						var nightadjt 	= parseFloat(data[i].nightdiffadjustment).toFixed(4);
	  						var lateadjt 	= parseFloat(data[i].lateadjustment).toFixed(4);
	  						var leaveadjt 	= parseFloat(data[i].leaveadjustment).toFixed(4);
	  						var otheradjt 	= parseFloat(data[i].otheradjustment).toFixed(4);

	      					if(firstRecord!=data[i].employeeID){
	      						if(otadjt!=0 || nightadjt!=0 || lateadjt!=0 || leaveadjt!=0 || otheradjt!=0){
										firstRecord = data[i].employeeID;

										htmlOutput += '<tr>' +
															'<td colspan=3 style="background-color: #e7e7e7; font-weight: 500;">'
															  + data[i].employeeID.padStart(6,'0') + " - " + data[i].fullname +
															'</td>' + 
															'<td style="background-color: #e7e7e7; text-align: right;">' + 
																'<button class="btn btn-primary btn-sm" id="print' + data[i].employeeID + '">' + 
																	'<i class="fas fa-print"></i> Print' + 
																'</button>' + 
															'</td>' + 
															'<td style="display: none;"></td>' + 
															'<td style="display: none;"></td>' + 
													  '</tr>';
							  	}
	  						}

							if (otadjt != 0.0000){
								payperiod = data[i].payperiod;
								boolPeriod = true;

							  	htmlOutput += '<tr>' + 
							  				   		'<td>' + payperiod + '</td>' + 
							  				   		'<td>Overtime</td>' + 
							  				   		'<td style="text-align: right;">' + accounting.formatMoney(data[i].otadjustment) + '</td>' + 
							  				   		'<td></td>' + 
									   			  '</tr>';
							} 

							if (nightadjt != 0.0000){
								if(boolPeriod==false){
									boolPeriod=true;
									payperiod = data[i].payperiod;
								}else payperiod="";

							  	htmlOutput += '<tr>' + 
							  				   		'<td>' + payperiod + '</td>' + 
							  				   		'<td>Night Differential</td>' + 
							  				   		'<td style="text-align: right;">' + accounting.formatMoney(data[i].nightdiffadjustment) + '</td>' + 
							  				   		'<td></td>' + 
									   			  '</tr>';
							} 

							if (lateadjt != 0.0000){
								if(boolPeriod==false){
									boolPeriod=true;
									payperiod = data[i].payperiod;
								}else payperiod="";

							  	htmlOutput += '<tr>' + 
							  				   		'<td>' + payperiod + '</td>' + 
							  				   		'<td>Late</td>' + 
							  				   		'<td style="text-align: right;">' + accounting.formatMoney(data[i].lateadjustment) + '</td>' + 
							  				   		'<td></td>' + 
									   			  '</tr>';
							} 

							if (leaveadjt != 0.0000){
								if(boolPeriod==false){
									boolPeriod=true;
									payperiod = data[i].payperiod;
								}else payperiod="";

							  	htmlOutput += '<tr>' + 
							  				   		'<td>' + payperiod + '</td>' + 
							  				   		'<td>Leave</td>' + 
							  				   		'<td style="text-align: right;">' + accounting.formatMoney(data[i].leaveadjustment) + '</td>' + 
							  				   		'<td></td>' + 
									   			  '</tr>';
							} 

							if (otheradjt != 0.0000){
								if(boolPeriod==false){
									boolPeriod=true;
									payperiod = data[i].payperiod;
								}else payperiod="";

							  	htmlOutput += '<tr>' + 
							  				   		'<td>' + payperiod + '</td>' + 
							  				   		'<td>Other</td>' + 
							  				   		'<td style="text-align: right;">' + accounting.formatMoney(data[i].otheradjustment) + '</td>' + 
							  				   		'<td></td>' + 
									   			  '</tr>';
							} 
	  					}
  					}

  					if ($.fn.DataTable.isDataTable('#datatable')){
			           $('#datatable').DataTable().destroy();
			        };

  					$("#show_data").html(htmlOutput);

  					$('#datatable').DataTable( {
					        "ordering": false,
					        "info":     false,
					        "autoWidth": false,
					        "searching": false,
					        "paging":false,
					        "dom": '<"toolbar">frtip',
					        "fixedHeader": {
						        "header": false,
						        "footer": false
						    },
						    "columnDefs": [
						      { "width": "200px", "targets": 'tsHeader'}
						    ]
				    });

				    if(employee=="All"){
						    tableHtml = '<div class="col-auto float-right ml-auto mb-3 pr-0">' + 
											'<button class="btn btn-primary" id="printall">' + 
												'<i class="fas fa-print"></i> Print all' + 
											'</button>' +
										'</div>';
					}

					$("div.toolbar").html(tableHtml);
		      },
		      error: function(request, textStatus, error) {

		      }
 	 	});
	});
});
</script>