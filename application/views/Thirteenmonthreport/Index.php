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
			
			<div class="col-sm-3">
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
			<div class="col-sm-3">
				<div class="form-group">
				<label for="gender">Employee Type</label>
				<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
				<option value="">All</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
				</div>
			</div>
			<div class="col-sm-3">
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
			<div class="col-sm-1">
			 <div class="form-group">
				<label for="searchbutton">&emsp;</label>
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
</div>
<br>
<div class="ajax_loading"><p></p></div>
	<div id="tabledata">
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
					<div class="table-responsive">
						<table class="table table-striped custom-table datatable">
						<thead>		
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 250px;"><center>Employee Name</center></th>
									<th class="text-left" style="width: 90px;"><center>Department</center></th>
									<th class="text-left" style="width: 90px;"><center>Designation</center></th>
									<th class="text-left" style="width: 100px;"><center>Employee Type</center></th>
									<th class="text-left" style="width: 70px;"><center>Client</center></th>
									<th class="text-left" style="width: 70px;"><center>Detachment</center></th>
									<th class="text-left" style="width: 150px;"><center>Month</center></th>
									<th class="text-left" style="width: 50px;"><center>Lates</center></th>
									<th class="text-left" style="width: 50px;"><center>Absences</center></th>
									<th class="text-right" style="width: 50px;"><center>Netpay</center></th>
									<th class="text-right" style="width: 90px;">Genarated</th>
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
                         '<td>'+response[i].thrthmonthdate+'</td>'+
                         '<td class="text-right">'+response[i].late+'</td>'+
                         '<td class="text-right">'+response[i].absent+'</td>'+
                         '<td class="text-right">'+response[i].thrmonth+'</td>'+
                         '<td><a class="btn btn-sm btn-primary" href="Thirteenmonthreport/recorddata?from='+response[i].seachdatefrom + '&to='+response[i].seachdateto +'&id='+response[i].employeeID +' "target="_blank" >Generate Report</a></td>'+
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


		