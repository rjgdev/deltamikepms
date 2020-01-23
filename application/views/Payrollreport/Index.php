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
				<div class="form-group">
				<label>Date</label>
				<select class="form-control" id="searchpayperiod" name="searchpayperiod" style="width: 100%;" description="Client" required>
			 <?php
				foreach($data['payrolldate'] as $payroll)
				{
				echo '<option value="'.$payroll->datefrom.'">'.$payroll->dateformat.'</option>';
				}
				?> 
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Employee Type</label>
				<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
				<option value="">All</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="adddetachment">Client</label>
				<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
				<option value="">All</option>
				<?php
				foreach($data['client'] as $client)
				{
				echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
				}
				?> 
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Detachment</label>
				<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" required>
				<option value="">All</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">&emsp;</label>
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
					<div class="table-responsive">
						<div id="tabledata">
						<table class="table table-striped custom-table datatable">
							<thead
							<tr>
								<th ><center>Employee ID</center></th>
								<th ><center>Employee Name</center></th>
								<th ><center>Department</center></th>
								<th ><center>Designation</center></th>
								<th ><center>Employee Type</center></th>
								<th ><center>Client</center></th>
								<th ><center>Detachment</center></th>
								<th style="width: 80px ! important;"><center>5 Days Incentives</center></th>
								<th style="width: 80px ! important;"><center>Night Differential</center></th>
								<th style="width: 80px ! important;"><center>Uniform Allowances</center></th>
								<th style="width: 80px ! important;"><center>Regular Overtime</center></th>
								<th style="width: 80px ! important;"><center>Regular Holiday</center></th>
								<th style="width: 80px ! important;"><center>Special Holiday</center></th>
								<th style="width: 80px ! important;"><center>Holiday Overtime</center></th>
								<th style="width: 80px ! important;"><center>PhilHealth</center></th>
								<th style="width: 80px ! important;"><center>SSS</center></th>
								<th style="width: 80px ! important;"><center>HDMF</center></th>
								<th ><center>Netpay</center></th>						
							</tr>
							</thead>	
							<tbody id="show_data">
               				 </tbody>
               				<tfoot id="total_data">
               				</tfoot> 
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
	$(document).ready(function() {
	
	$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
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
                    var totalincentives = 0;
                    var totalnightdiff = 0;
                    var totaluniform = 0;
                    var totalordinaryot =0;
                    var totalregholiday = 0;
                    var totalspeholiday = 0;
                    var totalregularot = 0;
                    var totalsss = 0;
                    var totalphic = 0;
                    var totalhdmf = 0;
                    var totalnetpay = 0;
                    for(i=0; i<response.length; i++){
                    	if(parseInt(response[i].incentives))
                    	 	 totalincentives += parseInt(response[i].incentives);
                    	 if(parseInt(response[i].nightdiff))
                    	 	 totalnightdiff += parseInt(response[i].nightdiff);
                    	if(parseInt(response[i].Uniform))
                    	 	 totaluniform += parseInt(response[i].Uniform); 
                    	if(parseInt(response[i].ordinaryot))
                    	 	 totalordinaryot += parseInt(response[i].ordinaryot); 
                    	 if(parseInt(response[i].regholiday))
                    	 	 totalregholiday += parseInt(response[i].regholiday);
                    	if(parseInt(response[i].speholiday))
                    	 	 totalspeholiday += parseInt(response[i].speholiday); 
                    	if(parseInt(response[i].regularot))
                    	 	 totalregularot += parseInt(response[i].regularot);
                    	if(parseInt(response[i].sss))
                    	 	 totalsss += parseInt(response[i].sss); 
                    	if(parseInt(response[i].phic))
                    	 	 totalphic += parseInt(response[i].phic); 
                    	if(parseInt(response[i].hdmf))
                    	 	 totalhdmf += parseInt(response[i].hdmf);
                    	if(parseInt(response[i].netpay))
                    	 	 totalnetpay += parseInt(response[i].netpay); 	   	  	 	   	 	 	  	 	
                        html += '<tr>'+
									'<td>'+response[i].employeeID+'</td>'+
									'<td>'+response[i].employeename+'</td>'+
									'<td>'+response[i].department+'</td>'+
									'<td>'+response[i].designation+'</td>'+
									'<td>'+response[i].employeetype+'</td>'+
									'<td>'+response[i].clientname+'</td>'+
									'<td>'+response[i].detachment+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].incentives)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].nightdiff)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].Uniform)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].ordinaryot)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].regholiday)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].speholiday)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].regularot)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].sss)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].phic)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].hdmf)+'</td>'+
									'<td class="text-right">'+accounting.formatMoney(response[i].netpay)+'</td>'+
                        		 '</tr>';
                    }
                      htmlfooter += '<tr>'+
										'<th>'+ 'Total' +'</th>'+
										'<td colspan="6">'+' ' +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalincentives)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalnightdiff)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totaluniform)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalordinaryot)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalregholiday)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalspeholiday)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalregularot)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalsss)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalphic)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalhdmf)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalnetpay)  +'</td>'+
									'</tr>';



                    $('#show_data').html(html);
                    $('#total_data').html(htmlfooter); 
                    $("body").removeClass("loading"); 

		}	
		});
			return false;
		});	
		$('#searchclient').change(function(){
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

		});
		/*$('#submit').click(function(){
			alert("Wilson");
		});	*/

	});
</script>	
