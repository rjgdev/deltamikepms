<style type="text/css">
td[rowspan]:not([rowspan="2"]) {
    text-align: center;
}


</style>
<head>
	  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	  

  </head>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Payroll Payment System Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Payroll Payment System Report</li>
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
					<div class="invalid-feedback" id="search-searchpayperiod"></div>
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
								<button class="btn btn-primary" id="export_excel"name ="export_excel" disabled="true" >
									<i class="fas fa-file-excel"></i> Export to Excel
								</button>
							</div>
				<div class="table-responsive" id="show_data">
					<div id="recordexcel">
					<table class="table table-striped table-bordered mb-0" border="1">
							<thead>
								<tr>
									<th style="width: 250px;"><center>Employee Code</center></th>
									<th style="width: 270px;"><center>Employee Name</center></th>
									<th style="width: 160px;"><center>Branch Code</center></th>
									<th style="width: 200px;"><center>Payroll Account Number</center></th>
									<th style="width: 250px;"><center>Amount</center></th>				
								</tr>
							</thead>	
							<tbody>
	           				</tbody>
					</table>
				</div>
				</div>
				</div></div>
			</div>
		</div>	
	</div>
</div>
<script  type="text/javascript"> 

	$(document).ready(function() {

		$('.table').DataTable({
	        scrollX: false,
	    	scrollCollapse: false
	    });

	    $(".select2-selection--single").each(function(){
            $(this).removeClass("is-invalid");
            $(this).removeClass("is-valid");   
     	 });

		/*$("#export_excel").hide();*/
	
		$("#export_excel").click(function() {


				window.open('data:application/vnd.ms-excel,'  + encodeURIComponent($('.dataTables_scroll').html()));
				//filename: "Your_File_Name.xls" 
				//preventDefault();
				

		});

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

			$(".select2-selection--single").each(function(){
            $(this).removeClass("is-invalid");
            $(this).removeClass("is-valid");   
     	 });
			if(searchpayperiod ==0){
				showErrorToast("Please select a pay period! ");
			document.getElementById("search-searchpayperiod").innerHTML = "Please select a pay period!";
			$("[aria-labelledby='select2-searchpayperiod-container']").addClass('is-invalid');
			$('#searchpayperiod').addClass('is-invalid');
			return false;
			event.preventDefault();
			}else{
			document.getElementById("search-searchpayperiod").innerHTML = "";
			$('#searchpayperiod').removeClass('is-invalid');
			$("[aria-labelledby='select2-searchpayperiod-container']").addClass('is-valid');
	        $('#searchpayperiod').addClass('is-valid');
	        event.preventDefault();
			}
			var tot = "Total";
			var total = tot.bold();
			var department = " ";
			var designation = " ";
			var employeetype = " ";
			var clientname = " ";
			/*var detachment = " ";*/

			$.ajax({
				url : "<?php echo site_url('Payrollpaymentsystemreport/search_payrollpayment');?>",
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
                   html +='<div id="recordexcel">' +
                   '<table class="table table-striped table-bordered mb-0" border="1" id="datatable1"" >' +
							'<thead >' +
							'<tr>' +
								'<th style="width: 250px;"><center>Employee Code</center></th>' +
								'<th style="width: 310px;"><center>Employee Name</center></th>' +
								'<th style="width: 270px;"><center>Branch Code</center></th>' +
								'<th style="width: 253px;"><center>Payroll Account Number</center></th>' +
								'<th style="width: 250px;"><center>Amount</center></th>' +				
							'</tr>' +
							'</thead>' +	
							'<tbody>';
					 for(i=0; i<response.length; i++){
					  html += '<tr>'+
					 	'<td class="text-left">'+response[i].employeeID+'</td>'+
					 	'<td class="text-left">'+response[i].employeename+'</td>'+
					 	'<td class="text-right">'+response[i].branchcode+'</td>'+
					 	'<td class="text-right">'+response[i].backaccountnumber+'</td>'+
					 	'<td class="text-right">'+accounting.formatMoney(response[i].netpay)+'</td>'+
					   '</tr>' ;	

					 }	
						
                      html +=  '</tbody></table></div>';
					if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };	
			        $("#export_excel").attr("disabled",false);	  				
                    $('#show_data').html(html);

                    $('#datatable1').DataTable({
				        scrollX: true,
			        	scrollCollapse: true
			        	

			        	
				    });
				   
				   

                    $("body").removeClass("loading"); 
		}	
		});
			return false;
		});	

		
		
		});
</script>	
