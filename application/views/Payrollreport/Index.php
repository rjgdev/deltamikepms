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
				<label for="gender">Search</label>
				<br>
				<button type="submit" class="btn btn-primary"id="submit">Search</button>
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
<a href="javascript:void(0);" id="export_excel" class="fa fa-download" ></a>
<div id="tabledata">

	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Payroll Report</h4>
				</div>
				<div class="card-body">
					<div id='result_table'>
					<div class="table-responsive">
						<table class="table table-bordered mb-0" id="employee_table">
								<tr>
									<th colspan="18"><center>DELTAMIKE SECURITY, INC.</center></th>
								</tr>	
								<tr>
									<th rowspan="2"><center>Employee ID</center></th>
									<th rowspan="2"><center>Employee Name</center></th>
									<th rowspan="2"><center>Department</center></th>
									<th rowspan="2"><center>Designation</center></th>
									<th rowspan="2"><center>Employee Type</center></th>
									<th rowspan="2"><center>Client</center></th>
									<th rowspan="2"><center>Detachment</center></th>
									<th rowspan="1" colspan="7"><center>Earnings</center></th>
									<th rowspan="1" colspan="3"><center>Deductions </center></th>
									<th rowspan="2"><center>Netpay</center></th>
									
								</tr>
							
							<tr>
								<!-- <th></th>	
								<th></th>
								<th></th> -->
								<!-- <th></th>
								<th></th> -->
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
								<!-- <th></th>
								<th></th> -->
								
							</tr>	
							<tbody id="show_data">
                     
               				 </tbody>
               				 <tfoot id="tfooter">
						      
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
				success: function(response){
				  var html = '';
                    var i;
                    for(i=0; i<response.length; i++){
                        html += '<tr>'+
                        '<td>'+response[i].employeeID+'</td>'+
                        '<td>'+response[i].employeename+'</td>'+
                        '<td>'+response[i].department+'</td>'+
                        '<td>'+response[i].designation+'</td>'+
                        '<td>'+response[i].employeetype+'</td>'+
                         '<td>'+response[i].clientname+'</td>'+
                         '<td>'+response[i].detachment+'</td>'+

						'<td>'+response[i].incentives+'</td>'+
						'<td>'+response[i].nightdiff+'</td>'+
						'<td>'+response[i].Uniform+'</td>'+
						'<td>'+response[i].ordinaryot+'</td>'+
						'<td>'+response[i].regholiday+'</td>'+
						'<td>'+response[i].speholiday+'</td>'+
						'<td>'+response[i].regularot+'</td>'+

                         '<td class="text-right">'+response[i].sss+'</td>'+
                         '<td class="text-right">'+response[i].phic+'</td>'+
                          '<td class="text-right">'+response[i].hdmf+'</td>'+
                          '<td class="text-right">'+response[i].netpay+'</td>'+
                         '</tr>';
                        
               
                    }


                    $('#show_data').html(html); 

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
