
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Retirement Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Retirement Report</li>
					</ul>
				</div>
			</div>
		</div>
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-body">
		<form action="#" id="seachform">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-lg-10 col-md-2">
				<label class="focus-label">Employee Name</label>
				<select class="form-control select2" id="searchemployee" name="searchemployee"  multiple="multiple" style="width: 100%;" >
				<?php
				foreach($data as $employee)
				{
				echo '<option value="'.$employee->employeeID.'">'.$employee->employeename.'</option>';
				}
				?>
				</select>
				<div class="invalid-feedback" id="fullname"></div>
				</div>
			<div class="col-lg-2 ">
				<div class="form-group">
					<label class="focus-label">&nbsp;&nbsp;</label>
				<label class="focus-label">&nbsp;&nbsp;</label>
			<div class="dash-card-container">
				  <button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%;">Search </button>
			</div>
			</div>
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
</div>
<br>
	
<div class="ajax_loading"><p></p></div>
	<div class="col-lg-12" id="showtable">
		<div id="customers-list"></div>
			<div class="card">
			<div class="card-header">
				<div class="row align-items-center">
				<div class="col">
				<h4 class="card-title mb-0">Records</h4>
				</div>	
				<div class="col-auto float-right ml-auto">
				<!-- <a class="btn btn-sm btn-primary"id="recorddetails"  >Generate Report</a> -->
				</div>	
				</div>		
			</div>
				<div class="card-body">
					<div id="tabledata">
						<div class="row">
						<div class="col-md-12">
					<div class="table-responsive" id="show_data">
						<table class="table table-striped custom-table datatable" id = "retirementreport">
							<thead>	
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 230px;"><center>Employee Name</center></th>
									<th style="width: 90px ! important;"><center>Department</center></th>
									<th style="width: 90px ! important;"><center>Designation</center></th>
									<th style="width: 100px ! important;"><center>Employee Type</center></th>
									<th style="width: 90px ! important;"><center>Retirement Fund</center></th>
									<th style="width: 200px;">Last Payroll Cut off</th>
									<th style="width: 80px ! important;">Hired Date</th>
									<th style="width: 90px ! important;">Year</th>
									<th style="width: 200px ! important;">Number of Years of Work</th>
									
								</tr>
							</thead>
							
               				</tbody>
               				<tfoot>

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
	</div>	
	

<script  type="text/javascript">  
	$(document).ready(function() {
		$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
		});

$("#seachform").submit(function(event) {

});
	$('#submit').click(function(){

			var arrayemployee = $("#searchemployee").val();
			if(arrayemployee ==0){
				showErrorToast("Please input employee name!");
				document.getElementById("fullname").innerHTML = "Please input employee name!";
			$("#searchemployee").addClass('is-invalid');
				event.preventDefault();
			}else{
			document.getElementById("fullname").innerHTML = "";
        	$('#searchemployee').removeClass('is-invalid');
        	$('#searchemployee').addClass('is-valid'); 
			}
			//alert( searchdate +  + searchemployeetype + );
			$.ajax({
				url : "<?php echo site_url('Retirementreport/search_Retirementreport');?>",
				method : "POST",
				data : {arrayemployee: 		arrayemployee},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					  $("body").addClass("loading");
					},
				success: function(response){
					 for(i=0; i<response["employee"].length; i++){
					var recorddetails1 = response["employee"][i].employeeid;
					console.log(recorddetails1);
					}
					
				var htmlfooter = '';
				  var html = '';
                    var i;
                    var totalrefund = 0;
                    	html = '<div id="customers-list"></div>' +
							'<div class="card">' +
							'<div class="card-header">' +
								'<div class="row align-items-center">' +
								'<div class="col">' +
								'<h4 class="card-title mb-0">Records</h4>' +
								'</div>	' +
								'<div class="col-auto float-right ml-auto">' +
								'<a class="btn btn-sm btn-primary" href="Retirementreport/summaryemployeerecord?employee='+ recorddetails1 + '"target="_blank" >Generate Report</a>' +
								'</div>' +	
								'</div>' +		
							'</div>' +
							'<div class="card-body">' +
							'<div id="tabledata">' +
							'<div class="row">' +
							'<div class="col-md-12">' +
							'<div class="table-responsive" id="show_data">' +
                    		'<table class="table table-striped custom-table datatable" id = "retirementreport">' +
							'<thead>' +	
								'<tr>' +
									'<th style="width: 100px ! important;">Employee ID</th>' +
									'<th style="width: 230px;">Employee Name</th>' +
									'<th style="width: 90px ! important;">Department</th>' +
									'<th style="width: 90px ! important;">Designation</th>' +
									'<th style="width: 100px ! important;">Employee Type</th>' +
									'<th style="width: 90px ! important;">Retirement Fund</th>' +
									'<th style="width: 200px;">Last Payroll Cut off</th>' +
									'<th style="width: 80px ! important;">Hired Date</th>' +
									'<th style="width: 90px ! important;">Year</th>' +
									'<th style="width: 200px ! important;">Number of Years of Work</th>' +
									'<th class="text-right" style="width: 90px;">Action</th>' +						
								'</tr>' +
							'</thead>' +
							'<tbody>';
                    for(i=0; i<response["result"].length; i++){
                    	if(parseInt(response["result"][i].retfund))
                    	 	 totalrefund += parseInt(response["result"][i].retfund);


                		html += '<tr>'+
							'<td>'+response["result"][i].employeeID.padStart(6,'0')+'</td>'+
							'<td>'+response["result"][i].employeename+'</td>'+
							'<td>'+response["result"][i].department+'</td>'+
							'<td>'+response["result"][i].designation+'</td>'+
							'<td>'+response["result"][i].employeetype+'</td>'+
							'<td class="text-right">'+accounting.formatMoney(response["result"][i].retfund)+'</td>'+
							'<td>'+response["result"][i].lastcutoff+'</td>'+
							'<td>'+response["result"][i].hireddate+'</td>'+
							'<td>'+response["result"][i].yearofhired+'</td>'+
							'<td>'+response["result"][i].yearofwork+'</td>'+
							 '<td><a class="btn btn-sm btn-primary" href="Retirementreport/employeerecorddata?employee='+ response["result"][i].employeeID + '"target="_blank" >Generate Report</a></td>'+
							'</tr>';
                              	
                    }
                  	html += '</tbody>'; 
                   				'<tfoot>'; 
                   					'<tr>'+
										'<th>'+ 'Total' +'</th>'+
										'<td colspan="4">'+' ' +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalrefund)  +'</td>'+
										'<td colspan="4">'+' ' +'</td>'+
									'</tr>';
							  '</tfoot></table>';
					if ($.fn.DataTable.isDataTable('#retirementreport')){
					$('#retirementreport').DataTable().destroy();
			        };	
                    $('#showtable').html(html);
                     $('#retirementreport').DataTable({
				        scrollX: false,
			        	scrollCollapse: false,
				        fixedColumns:   {
						    /*leftColumns: 2,
						    rightColumns: 1*/
						}
				    });

                    $("body").removeClass("loading");  
		}	

		});
			return false;
		});

		/*$("#recorddetails").click(function(){
			var employee = "";
			var employee = $("#searchemployee").val();
			if(employee ==0){
				employeeID = '0';
			}else{
				employeeID = employee;
			}	
			window.open('Retirementreport/summaryemployeerecord?employee='+ employeeID +'');
		});	*/		

});
</script>		