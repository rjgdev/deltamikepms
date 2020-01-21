
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
	<div class="card-header">
		<h4 class="card-title mb-0">Retirement Report</h4>
	</div>
	<div class="card-body">
		<form action="#" id="seachform">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-10">
				<div class="form-group">	
				<label for="adddetachment">Employee Name</label>
				<select class="form-control select2" id="searchemployee" name="searchemployee"  multiple="multiple" style="width: 100%;" >

				<?php
				foreach($data as $employee)
				{
				echo '<option value="'.$employee->employeeID.'">'.$employee->employeename.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">&emsp;</label>
			<div class="dash-card-container">
									<button class="btn add-btn" id="submit" style="border-radius: 5px; width:100%;">Search </button>
			</div>
			</div>
			</div>
			<!-- <div class="col-sm-2">
				<div class="form-group">
				<label for="gender">&emsp;</label>
				<br>
				<button type="submit" class="btn btn-primary"id="submit">Search</button>
				</div>
			</div> -->
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
					<div id="tabledata">
						<div class="row">
						<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
							<thead>	
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 230px;"><center>Employee Name</center></th>
									<th style="width: 90px ! important;"><center>Department</center></th>
									<th style="width: 90px ! important;"><center>Designation</center></th>
									<th style="width: 100px ! important;"><center>Employee Type</center></th>
									<th style="width: 90px ! important;"><center>Client</center></th>
									<th style="width: 90px ! important;"><center>Detachment</center></th>
									<th style="width: 150px ! important;"><center>Retirement Fund</center></th>
									<th style="width: 200px;">Last Payroll Cut off</th>
									<th style="width: 80px ! important;">Hired Date</th>
									<th style="width: 90px ! important;">Year</th>
									<th style="width: 200px ! important;">Number of Years of Work</th>
									
								</tr>
							</thead>
							<tbody id="show_data">
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
	

<script  type="text/javascript">  
	$(document).ready(function() {
		$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
		});

$("#seachform").submit(function(event) {

});
	$('#submit').click(function(){

			var arrayemployee = $("#searchemployee").val();
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
                          '<td class="text-right">'+response[i].retfund+'</td>'+
                          '<td>'+response[i].lastcutoff+'</td>'+
                          '<td>'+response[i].hireddate+'</td>'+
                           '<td>'+response[i].yearofhired+'</td>'+
                           '<td>'+response[i].yearofwork+'</td>'+
                         '</tr>';
                              
               		
                    }
                    $('#show_data').html(html); 
                      $("body").removeClass("loading");  
		}	

		});
			return false;
		});		

});
</script>		