<style type="text/css">
td[rowspan]:not([rowspan="2"]) {
    text-align: center;
}

</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<br>
<!-- Search Filter -->
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">Report</h4>
	</div>
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-4">
				<div class="form-group form-focus select-focus">
				<select class="form-control select2" id="searchpayperiod" name="searchpayperiod" style="width: 100%;" description="Client" required>
			 <?php
				foreach($data['payrolldate'] as $payroll)
				{
				echo '<option value="'.$payroll->payrollID.'">'.$payroll->dateformat.'</option>';
				}
				?> 
				</select>
				<label class="focus-label">Cut Pay</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group form-focus select-focus">
				<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
				<option value="0">All</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
				<label class="focus-label">Employee Type</label>
				</div>
			</div>
			<div class="col-sm-2">
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
			<div class="col-sm-2">
				<div class="form-group form-focus select-focus">
				<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" required>
				<option value="0">Select Post</option>
				</select>
				<label class="focus-label">Post</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group form-focus select-focus">
				<button class="btn add-btn" id="submit" style="border-radius: 5px; width:100%; height: 45px;">Search</button>
				</div>
			</div>
			</div>
			</div>
		</div>
	</form>
	</div>

	</div>
	</div>
	</div>
</div>
		<!-- <a href="javascript:void(0);" id="export_excel">Export to Excel</a>
 --></div>
<br>

	<div class="ajax_loading"><p></p></div>
	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
				<div class="row align-items-center">
					<div class="col">
						<h4 class="card-title mb-0">Records</h4>
				</div>
				<div class="col-auto float-right ml-auto">
				<a href="javascript:void(0);" class="btn add-btn" id="export_excel" style="border-radius: 5px; width:150%;">Excel</a>
				</div>		
				</div>		
				</div>
				<div class="card-body">
					<div class="table-responsive" id="show_data">
						<table class="table table-striped custom-table " id="datatable1">
							<div id="recordexcel">
							<thead>
							<tr>
								<th style="width: 100px;"><center>Employee ID</center></th>
								<th style="width: 120px;"><center>Employee Name</center></th>
								<th style="width: 80px;"><center>Basic Pay</center></th>
								<th style="width: 70px;"><center>Overtime</center></th>
								<th style="width: 120px;"><center>Night Differential</center></th>
								<th style="width: 80px ! important;"><center>Allowance</center></th>
								<th style="width: 80px ! important;"><center>Incentive</center></th>
								<th style="width: 80px ! important;"><center>Late</center></th>
								<th style="width: 80px ! important;"><center>LWOP</center></th>
								<th style="width: 80px ! important;"><center>SSS</center></th>
								<th style="width: 80px ! important;"><center>HDMF</center></th>
								<th style="width: 80px ! important;"><center>PhilHealth</center></th>
								<th style="width: 80px ! important;"><center>GROSS PAY</center></th>
								<th style="width: 100px ! important;"><center>Withholding Tax</center></th>
								<th style="width: 80px ! important;"><center>NET PAY</center></th>						
							</tr>
							</thead>	
							<tbody>

               				 </tbody>
               				<tfoot>

               				</tfoot> 
               			</div>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
</div>
<script  type="text/javascript">  
	$(document).ready(function() {
	
	$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#show_data').html()));
	});

	$("#searchclient").change(function(){
			var id=$(this).val();
			alert(id);
			console.log(id);
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

		});

		$('#searchemployeetype').change(function(){
			var employeetype =$(this).val();
			if(employeetype==1){
			$("#searchclient").prop("disabled", false);
			$("#searchdetachment").prop("disabled", false);

		}else{
			$("#searchclient").prop("disabled", true);
			$("#searchdetachment").prop("disabled", true);
			$("#searchclient").val('');
			$("#searchdetachment").val('');
		}

		});
		$('#submit').click(function(){
			var searchpayperiod =   $("#searchpayperiod").val();
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
			var tot = "Total";
			var total = tot.bold();
			var department = " ";
			var designation = " ";
			var employeetype = " ";
			var clientname = " ";
			var detachment = " ";
			$.ajax({
				url : "<?php echo site_url('Payrollreport/search_payroll');?>",
				method : "POST",
				data : {searchpayperiod: searchpayperiod, 	searchemployeetype: searchemployeetype, 
						searchclient: 	 searchclient, 		searchdetachment: 	searchdetachment},
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
                    var allowance =0;
                    var incentive = 0;
                    var totallate = 0;
                    var totalleave = 0;
                    var otheradjustment = 0;
                    var grosspay = 0;
                    var wtax = 0;
                    var government = 0;
                    var otherdeductions = 0;
                    var netpay = 0;
                    var totalsss = 0;
                    var totalhdmf = 0;
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
								'<th style="width: 80px ! important;"><center>Allowance</center></th>' +
								'<th style="width: 80px ! important;"><center>Incentive</center></th>' +
								'<th style="width: 80px ! important;"><center>Late</center></th>' +
								'<th style="width: 80px ! important;"><center>LWOP</center></th>' +
								'<th style="width: 80px ! important;"><center>SSS</center></th>' +
								'<th style="width: 80px ! important;"><center>HDMF</center></th>' +
								'<th style="width: 80px ! important;"><center>PhilHealth</center></th>' +
								'<th style="width: 80px ! important;"><center>GROSS PAY</center></th>' +
								'<th style="width: 100px ! important;"><center>Withholding Tax</center></th>' +
								'<th style="width: 80px ! important;"><center>NET PAY</center></th>' +					
							'</tr>' +
							'</thead>' +	
							'<tbody>';
                    for(i=0; i<response.length; i++){
                    	if(parseInt(response[i].basicpay))
                    	 	 basic += parseFloat(response[i].basicpay);
                    	 	console.log(response[i].basicpay);
                    	 if(parseInt(response[i].totalovertime))
                    	 	 overtime += parseFloat(response[i].totalovertime);
                    	if(parseInt(response[i].totalnightdiff))
                    	 	 nightdiff += parseFloat(response[i].totalnightdiff); 
                    	if(parseInt(response[i].allowance))
                    	 	 allowance += parseFloat(response[i].allowance); 
                    	 if(parseInt(response[i].incentive))
                    	 	 incentive += parseFloat(response[i].incentive);
                    	if(parseInt(response[i].totallate))
                    	 	 totallate += parseFloat(response[i].totallate); 
                    	if(parseInt(response[i].totalleave))
                    	 	 totalleave += parseFloat(response[i].totalleave);
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
                        html += '<tr>'+
									'<td>'+response[i].employeeID.padStart(6,'0')+'</td>'+
									'<td >'+response[i].fullname+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].basicpay)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalovertime)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalnightdiff)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].allowance)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].incentive)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totallate)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].totalleave)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].sss_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].hdmf_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].phic_ee)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].grosspay)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].wtax)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].netpay)+'</td>'+
                        		 '</tr>';
                    }	
                      html +=  '</tbody>' +
                     			'<tfoot>' +
                     				'<tr>'+
										'<th colspan="2">'+ 'Total' +'</th>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(basic)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(overtime)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(nightdiff)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(allowance)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(incentive)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totallate)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalleave)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalsss)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalhdmf)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalphic)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(grosspay)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(wtax)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(netpay)  +'</td>'+
									'</tr>' +
							  '</tfoot></div></table>';
					if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };		  				
                    $('#show_data').html(html);

                    $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true,
			        	searching: false,
			        	paging: false,
				       /* fixedColumns:   {
						    leftColumns: 2,
						    rightColumns: 1
						}*/
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
