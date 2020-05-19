<style type="text/css">
td[rowspan]:not([rowspan="2"]) {
    text-align: center;
}

</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Report</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
					<select class="form-control select2" id="searchpayperiod" name="searchpayperiod" style="width: 100%;" description="Client" required>
					 	<option value="0">Select Pay Period</option>
					 	<?php
							foreach($data['payrolldate'] as $payroll)
							{
								echo '<option value="'.$payroll->payrollID.'">'.$payroll->dateformat.'</option>';
							}
						?> 
					</select>
					<label class="focus-label">Pay Period</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
					<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
						<option value="0">All</option>
						<option value="1">Security Guard</option>
						<option value="2">Staff</option>
					</select>
					<label class="focus-label">Employee Type</label>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
					<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
						<option value="0">All</option>
							<?php
								foreach($data['client'] as $client)
								{
									echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
								}
							?> 
					</select>
					<label class="focus-label">Client</label>
				</div>
			</div>
			<!--  -->
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
					<button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%; height: 45px;"><i class="fas fa-search"></i> Search</button>
				</div>
			</div>
		</div>
		<!-- /Search Filter -->


	
		<div class="row">
			<div class="col-md-12">
					<div class="card mb-0">
						<div class="card-body">
							<div class="col-auto float-right ml-auto mb-3 pr-0">
								<button class="btn btn-primary" id="export_excel" disabled="true">
									<i class="fas fa-file-excel"></i> Export to Excel
								</button>
							</div>
				<div class="table-responsive" id="show_data">
					<table class="table table-striped custom-table">
							<thead>

								<tr>
									<th style="width: 100px;"><center>Employee ID</center></th>
									<th style="width: 120px;"><center>Employee Name</center></th>
									<th style="width: 80px;"><center>Basic Pay</center></th>
									<th style="width: 70px;"><center>Overtime</center></th>
									<th style="width: 120px;"><center>Night Differential</center></th>
									<th style="width: 150px;"><center>Night Diff. Adjustment</center></th>
									<th style="width: 80px ! important;"><center>Allowance</center></th>
									<th style="width: 80px ! important;"><center>Incentive</center></th>
									<th style="width: 80px ! important;"><center>Late</center></th>
									<th style="width: 140px ! important;"><center>Late Adjustment</center></th>
									<th style="width: 80px ! important;"><center>LWOP</center></th>
									<th style="width: 120px ! important;"><center>Leave Adjustment</center></th>
									<th style="width: 120px ! important;"><center>Other Adjustment</center></th>
									<th style="width: 80px ! important;"><center>GROSS PAY</center></th>
									<th style="width: 100px ! important;"><center>Withholding Tax</center></th>
									<th style="width: 80px ! important;"><center>SSS</center></th>
									<th style="width: 80px ! important;"><center>PHIC</center></th>
									<th style="width: 80px ! important;"><center>HDMF</center></th>
									<th style="width: 80px ! important;"><center>Loan</center></th>
									<th style="width: 80px ! important;"><center>NET PAY</center></th>					
								</tr>
							</thead>	
							<tbody>

	           				</tbody>
	           				<tfoot>
           						<tr>
									<th colspan="2" style="text-align: right;">TOTAL:</tH>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
									<th class="text-right" style="color:#be0e0e;">0.0000</th>
								</tr>
	           				</tfoot> 
					</table>
				</div>
				</div></div>
			</div>
		</div>	
	</div>
</div>
<script  type="text/javascript">  
	$(document).ready(function() {

		$('.table').DataTable({
	        scrollX: true,
	    	scrollCollapse: true
	    });

		/*$("#export_excel").hide();*/
	
		$("#export_excel").click(function() {

			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.dataTables_scroll').html()));
		});

	/*	$("#searchclient").change(function(){
			var id=$(this).val();
			
			$.ajax({
				url : "<?php echo site_url('Payrollreport/get_client');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					if($("#searchhiddendetachment").val()==data[i].detachmentID){
					html += '<option value='+data[i].detachmentID+' selected>'+data[i].postname+'</option>';
					}else{
					html += '<option value='+data[i].detachmentID+'>'+data[i].postname+'</option>';
					}
				}
				$('#searchdetachment').html(html);
				}
			});
			return false;

		});*/

		$('#searchemployeetype').change(function(){
			var employeetype =$(this).val();
			if(employeetype==1){
			$("#searchclient").prop("disabled", false);
			/*$("#searchdetachment").prop("disabled", false);*/

		}else{
			$("#searchclient").prop("disabled", true);
			/*$("#searchdetachment").prop("disabled", true);*/
			$("#searchclient").val('');
			/*$("#searchdetachment").val('');*/
		}

		});
		$('#submit').click(function(){
			var searchpayperiod =   $("#searchpayperiod").val();
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			/*var searchdetachment = $("#searchdetachment").val();*/
			var tot = "Total";
			var total = tot.bold();
			var department = " ";
			var designation = " ";
			var employeetype = " ";
			var clientname = " ";
			/*var detachment = " ";*/

			$.ajax({
				url : "<?php echo site_url('Payrollreport/search_payroll');?>",
				method : "POST",
				data : {searchpayperiod: searchpayperiod, 	searchemployeetype: searchemployeetype, 
						searchclient: 	 searchclient},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					  $("body").addClass("loading");
				},
				success: function(response){
					var htmlfooter = '';
				  	var html = '';
                    var i;
                    var basic = 0;
                    var overtime = 0;
                    var nightdiff = 0;
                    var nightdiffadjustment = 0;
                    var allowance =0;
                    var incentive = 0;
                    var totallate = 0;
                    var lateadjustment = 0;
                    var totalleave = 0;
                    var leaveadjustment = 0;
                    var otheradjustment = 0;
                    var grosspay = 0;
                    var wtax = 0;
                    var government = 0;
                    var otherdeductions = 0;
                    var netpay = 0;
                    var totalsss = 0;
                    var totalhdmf = 0;
                    var otherdeductionsloan = 0; 
                    var totalphic = 0;
                   html +='<table class="table table-striped custom-table datatable" id="datatable1">' +
                   			'<div id="recordexcel">' +
							'<thead >' +
							'<tr>' +
								'<th style="width: 100px;"><center>Employee ID</center></th>' +
								'<th style="width: 120px;"><center>Employee Name</center></th>' +
								'<th style="width: 80px;"><center>Basic Pay</center></th>' +
								'<th style="width: 70px;"><center>Overtime</center></th>' +
								'<th style="width: 120px;"><center>Night Differential</center></th>' +
								'<th style="width: 170px;"><center>Night Diff. Adjustment</center></th>' +
								'<th style="width: 80px ! important;"><center>Allowance</center></th>' +
								'<th style="width: 80px ! important;"><center>Incentive</center></th>' +
								'<th style="width: 80px ! important;"><center>Late</center></th>' +
								'<th style="width: 120px ! important;"><center>Late Adjustment</center>' +
								'<th style="width: 80px ! important;"><center>LWOP</center></th>' +
								'<th style="width: 120px ! important;"><center>Leave Adjustment</center>' +
								'<th style="width: 120px ! important;"><center>Other Adjustment</center></th>' +
								'<th style="width: 80px ! important;"><center>GROSS PAY</center></th>' +
								'<th style="width: 100px ! important;"><center>Withholding Tax</center></th>' +
								'<th style="width: 80px ! important;"><center>SSS</center></th>' +
								'<th style="width: 80px ! important;"><center>PHIC</center></th>' +
								'<th style="width: 80px ! important;"><center>HDMF</center></th>' +
								'<th style="width: 80px ! important;"><center>Loan</center></th>' + 
								'<th style="width: 80px ! important;"><center>NET PAY</center></th>' +					
							'</tr>' +
							'</thead>' +	
							'<tbody>';
							console.log(response);
                    for(i=0; i<response.length; i++){
                    	if(parseInt(response[i].basicpay))
                    	 	 basic += parseFloat(response[i].basicpay);
                    	 if(parseInt(response[i].totalovertime))
                    	 	 overtime += parseFloat(response[i].totalovertime);
                    	if(parseInt(response[i].totalnightdiff))
                    	 	 nightdiff += parseFloat(response[i].totalnightdiff); 
                    	if(parseInt(response[i].nightdiffadjustment))
                    	 	 nightdiffadjustment += parseFloat(response[i].nightdiffadjustment); 
                    	if(parseInt(response[i].allowance))
                    	 	 allowance += parseFloat(response[i].allowance); 
                    	 if(parseInt(response[i].incentive))
                    	 	 incentive += parseFloat(response[i].incentive);
                    	if(parseInt(response[i].totallate))
                    	 	 totallate += parseFloat(response[i].totallate); 
                    	 if(parseInt(response[i].lateadjustment))
                    	 	 lateadjustment += parseFloat(response[i].lateadjustment); 
                    	if(parseInt(response[i].totalleave))
                    	 	 totalleave += parseFloat(response[i].totalleave);
                    	if(parseInt(response[i].leaveadjustment))
                    	 	 leaveadjustment += parseFloat(response[i].leaveadjustment);
                    	if(parseInt(response[i].otheradjustment))
                    	 	 otheradjustment += parseFloat(response[i].otheradjustment); 
                    	if(parseInt(response[i].grosspay))
                    	 	 grosspay += parseFloat(response[i].grosspay); 
                    	if(parseInt(response[i].wtax))
                    	 	 wtax += parseFloat(response[i].wtax);
                    	if(parseInt(response[i].government))
                    	 	 government += parseFloat(response[i].government); 
                    	if(parseInt(response[i].otherdeductions))
                    	 	 otherdeductions += parseFloat(response[i].otherdeductions);  
                   			if(parseInt(response[i].netpay))
                    	 	 netpay += parseFloat(response[i].netpay);  

                    	 if(parseInt(response[i].sss_ee))
                    	 	 totalsss += parseFloat(response[i].sss_ee); 
                    	  if(parseInt(response[i].hdmf_ee))
                    	 	 totalhdmf += parseFloat(response[i].hdmf_ee); 	 	
                    	 if(parseInt(response[i].phic_ee))
                    	 	 totalphic += parseFloat(response[i].phic_ee);
                    	  if(parseInt(response[i].otherdeductionsloan))
                    	 	 otherdeductionsloan += parseFloat(response[i].otherdeductionsloan); 	  
                        html += '<tr>'+
									'<td>'+response[i].employeeID.padStart(6,'0')+'</td>'+
									'<td >'+response[i].fullname+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].basicpay)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalovertime)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalnightdiff)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].nightdiffadjustment)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].allowance)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].incentive)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totallate)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].lateadjustment)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalleave)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].leaveadjustment)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].otheradjustment)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].grosspay)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].wtax)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].sss_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].phic_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].hdmf_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].otherdeductionsloan)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].netpay)+'</td>'+
                        		 '</tr>';
                    }	
                      html +=  '</tbody>' +
                     			'<tfoot>' +
                     				'<tr>'+
										'<th colspan="2" style="text-align: right;">TOTAL:</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(basic)  	 +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(overtime)   +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(nightdiff)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(nightdiffadjustment)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(allowance)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(incentive)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totallate)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(lateadjustment)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalleave) +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(leaveadjustment) +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(otheradjustment) +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(grosspay)   +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(wtax)  	 +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalsss)   +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalphic)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalhdmf)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(otherdeductionsloan)  +'</th>'+
										'<th class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(netpay)  	 +'</th>'+
									'</tr>' +
							  '</tfoot></div></table>';
					if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };	
			        $("#export_excel").attr("disabled",false);	  				
                    $('#show_data').html(html);

                    $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
				    });
				   

                    $("body").removeClass("loading"); 
		}	
		});
			return false;
		});	

		$("#datatable1").DataTable({
				       
			        	searching: false,
			        	paging: false
				      
				    });

	});
</script>	
