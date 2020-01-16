<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">13th Month Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">13th Month Report</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">13th Month Report</h4>
	</div>
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="date">Date</label>
				<select class="form-control select2" id="searchdate" name="seachdate" style="width: 100%;" description="Client">
				<option value="">All</option>
				<?php
				foreach($data['cutoff'] as $datecutoff)
				{
				echo '<option value="'.$datecutoff->formatdateid.'">'.$datecutoff->formatdate.'</option>';
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
	<div id="tabledata">

	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title mb-0">13th Month Report</h4>
				</div>
				<div class="card-body">
					<div id='result_table'>
					<div class="table-responsive">
						<table class="table table-bordered mb-0" id="employee_table">
								<tr>
									<th colspan="12"><center>DELTAMIKE SECURITY, INC.</center></th>
								</tr>	
								<tr>
									<th ><center>Employee ID</center></th>
									<th ><center>Employee Name</center></th>
									<th ><center>Department</center></th>
									<th ><center>Designation</center></th>
									<th ><center>Employee Type</center></th>
									<th ><center>Client</center></th>
									<th ><center>Detachment</center></th>
									<th ><center>Month</center></th>
									<th ><center>Lates</center></th>
									<th ><center>Absences</center></th>
									<th ><center>Netpay</center></th>
									<th>Genarated</th>
									
								</tr>
						
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
		$('#searchclient').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthreport/get_client');?>",
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
		$(".generateddata").click(function(){
   			var id = $(this).val();
   			$.ajax({
				url : "<?php echo site_url('Thirteenmonthreport/record');?>",
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
   			var zero = 0;
			var searchdate =   $("#searchdate").val().trim();
			var datefrom = searchdate.substr(0, 4);
			var dateto = searchdate.substr(5, 2);
			var todatefrom = searchdate.substr(10, 4);
			var todateto = searchdate.substr(15, 2);
			var fromdate = datefrom+ + zero+ + dateto;
			var todate = todatefrom+ + zero+ +todateto;
			//console.log(fromdate + + todate);
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
			//alert( searchdate +  + searchemployeetype + );
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthreport/search_Thirteenmonthreport');?>",
				method : "POST",
				data : {fromdate: 			fromdate, 			todate: 		todate,	
						searchemployeetype: searchemployeetype,	searchclient: 	searchclient,
						searchdetachment: 	searchdetachment},
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
                          '<td>'+response[i].thrthmonthdate+'</td>'+
                          '<td tyle ="text-align: right;">'+response[i].late+'</td>'+
                           '<td tyle ="text-align: right;">'+response[i].absent+'</td>'+
                         '<td tyle ="text-align: right;">'+response[i].thrmonth+'</td>'+
                         '<td><a class="btn btn-sm btn-primary" href="Thirteenmonthreport/recorddata?from='+response[i].seachdatefrom + '&to='+response[i].seachdateto +'&id='+response[i].employeeID +' "target="_blank" >Generate Report</a></td>'+
                         '</tr>';         
               		
                    }


                    $('#show_data').html(html); 

		}	
		});
			return false;
		});	
	});	
</script>	


		