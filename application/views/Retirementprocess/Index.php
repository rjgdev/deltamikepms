<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Retirement Process</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Retirement Process</li>
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
		<h4 class="card-title mb-0">Retirement Process</h4>
	</div>
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="adddetachment">Employee Name</label>
				<select class="form-control select2" id="searchemployee" name="searchemployee"  multiple="multiple" style="width: 100%;" description="Client">
				<?php
				foreach($data['employee'] as $employee)
				{
				echo '<option value="'.$employee->employeeID.'">'.$employee->employeename.'</option>';
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
				<label for="adddetachment">Client </label>
				<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client">
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
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" >
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
</div>
<br>

	<div class="ajax_loading"><p></p></div>
	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">Records</h4>
				</div>
				<div class="card-body">
					<div id='result_table'>
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
							<thead>	
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 250px;"><center>Employee Name</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Department</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Designation</center></th>
									<th class="text-right" style="width: 100px; font-size:11px;"><center>Employee Type</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Client</center></th>
									<th class="text-right" style="width: 90px; font-size:11px;"><center>Detachment</center></th>
									<th class="text-right" style="width: 100px; font-size:11px;"><center>Retirement Fund</center></th>
									<th style="width: 200px;">Last Payroll Cut off</th>
									<th class="text-right" style="width: 80px; font-size:11px;">Hired Date</th>
									<th style="width: 200px ! important;">Number of Years of Work</th>
								</tr>
							</thead>	
							<tbody id="show_data">
                     
               				 </tbody>
               				<tfoot id = show_foot>
               				
               				</tfoot>

               				 
						</table>
					</div>
				</div>	
				</div>
			</div>
		</div>
	</div>	

<script  type="text/javascript">  
	$(document).ready(function() {
		$('#searchclient').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo site_url('Retirementprocess/get_detachment');?>",
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
		

		$('#submit').click(function(){
			  
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
			var arrayemployee = $("#searchemployee").val();
			//alert( searchdate +  + searchemployeetype + );
			$.ajax({
				url : "<?php echo site_url('Retirementprocess/search_Retirementprocess');?>",
				method : "POST",
				data : {arrayemployee: 		arrayemployee,	 	searchemployeetype: searchemployeetype,	
						searchclient: 		searchclient,		 searchdetachment: 	 searchdetachment},
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
                          '<td tyle ="text-align: right;">'+response[i].retfund+'</td>'+
                          '<td>'+response[i].lastcutoff+'</td>'+
                           '<td>'+response[i].hireddate+'</td>'+
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