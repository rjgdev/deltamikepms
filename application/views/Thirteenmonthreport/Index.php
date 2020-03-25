<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
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
	
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
				<select class="form-control select2" id="searchdate" name="seachdate" style="width: 100%;" description="Client">
				<?php
				foreach($data['cutoff'] as $datecutoff)
				{
				echo '<option value="'.$datecutoff->thrmonthID.'">'.$datecutoff->formatdate.'</option>';
				}
				?>
				</select>
				<label class="focus-label">13th Month Pay</label>
				 <div class="invalid-feedback" id="add-searchdate"></div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group form-focus select-focus">
				<select class="form-control select2" name="searchemployeetype" id="searchemployeetype" >
				<option value="">All</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
					<label class="focus-label">Employee Type</label>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group form-focus select-focus">
				<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client">
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
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" >
				<option value="">All</option>
				</select>
				<label class="focus-label">Post</label>
				</div>
			</div>
			<div class="col-sm-2">
			 <div class="form-group form-focus select-focus">
					<button class="btn btn-success" id="submit" style="border-radius: 5px; width:100%; height: 45px;">Search</button>
				
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
	<div id="tabledatarecord">
	 <div class="col-lg-12"  id="showtable">
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
					<div class="table-responsive" id="show_data">
						<table class="table table-striped custom-table datatable" id ="datatable1">
						<thead>		
								<tr>
									<th style="width: 100px ! important;"><center>Employee ID</center></th>
									<th style="width: 180px;"><center>Employee Name</center></th>
									<th class="text-left" style="width: 90px;"><center>Department</center></th>
									<th class="text-left" style="width: 90px;"><center>Designation</center></th>
									<th class="text-left" style="width: 100px;"><center>Employee Type</center></th>
									<th class="text-left" style="width: 150px;"><center>Month</center></th>
									<th class="text-left" style="width: 50px;"><center>Lates</center></th>
									<th class="text-left" style="width: 50px;"><center>Absences</center></th>
									<th class="text-right" style="width: 120px;"><center>Total 13th Month</center></th>
									<th class="text-right" style="width: 90px;">Action</th>
								</tr>
								</thead>
								<tbody>

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
		$(window).on("load", function() {
			$(".loader").fadeOut();
		});

		/*$("#export_excel").click(function() {
			window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
		});*/
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
		// $("#recorddetails").click(function(){
		// 	var employee = "";
		// 	var client = "";
		// 	var post = "";
		// 	var thrmonthID = $("#searchdate").val();
		// 	var searchemployeetype = $("#searchemployeetype").val();
		// 	var searchclient = $("#searchclient").val();
		// 	var searchdetachment = $("#searchdetachment").val();
		// 	if(searchemployeetype ==0){
		// 		employee = '0';
		// 	}else{
		// 		employee = searchemployeetype;
		// 	}
		// 	if(searchclient ==0){
		// 		client = '0';
		// 	}else{
		// 		client = searchclient;
		// 	}
		// 	if(searchdetachment ==0){
		// 		post = '0';
		// 	}else{
		// 		post = searchdetachment;
		// 	}			
		// 	window.open('Thirteenmonthreport/summaryrecord?monthID='+ thrmonthID +'&employeetype='+ employee + '&client='+ client +'&post='+ post +'');
		// });	
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
   			/*var zero = 0;
			var searchdate =   $("#searchdate").val().trim();
			var datefrom = searchdate.substr(0, 4);
			var dateto = searchdate.substr(5, 2);
			var todatefrom = searchdate.substr(10, 4);
			var todateto = searchdate.subst


			r(15, 2);
			var fromdate = datefrom+ + zero+ + dateto;
			var todate = todatefrom+ + zero+ +todateto;*/


			var thrmonthID = $("#searchdate").val();
			var searchemployeetype = $("#searchemployeetype").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
				if(thrmonthID==""){
       		showErrorToast("Please select 13th month date range! ");
	        }
	        else{
        	document.getElementById("add-searchdate").innerHTML = "";
        	$('#searchdate').removeClass('is-invalid');
        	$('#searchdate').addClass('is-valid'); 
        	}
			$.ajax({
				url : "<?php echo site_url('Thirteenmonthreport/search_Thirteenmonthreport');?>",
				method : "POST",
				data : {thrmonthID: 			thrmonthID,	
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
                   	var arraytotallate = [];
                   	var totalresultabsent = [];
                   	var totalabasent = 0;
                   	var totallate = 0;
                   	var totalthrmonth = 0;
                    var htmlfooter = '';
					html ='<div id="customers-list"></div>' +
					'<div class="card">' +
					'<div class="card-header">' +
					'<div class="row align-items-center">' +	
					'<div class="col">' +
					'<h4 class="card-title mb-0">Records</h4>' +
					'</div>	' +
					'<div class="col-auto float-right ml-auto">' +
					'<div class="col-auto float-right ml-auto">' +
							'<a class="btn btn-sm btn-primary" href="Thirteenmonthreport/summaryrecord?monthID='+ thrmonthID +'&employeetype='+ searchemployeetype + '&client='+ searchclient +'&post='+ searchdetachment +'"target="_blank" >Generate Report</a>' +
					'</div>' +	
					'</div>	' +	
					'</div>' +
					'<div class="card-body">' +
					'<div id="tabledata">' +
					'<div class="table-responsive" id="show_data">' +
                     '<table class="table table-striped custom-table datatable" id ="datatable1">' +
					'<thead>' +	
					'<tr>' +
						'<th style="width: 100px ! important;"><center>Employee ID</center></th>' +
						'<th style="width: 180px;"><center>Employee Name</center></th>' +
						'<th class="text-left" style="width: 90px;"><center>Department</center></th>' +
						'<th class="text-left" style="width: 90px;"><center>Designation</center></th>' +
						'<th class="text-left" style="width: 100px;"><center>Employee Type</center></th>' +
						'<th class="text-left" style="width: 150px;"><center>Month</center></th>' +
						'<th class="text-left" style="width: 50px;"><center>Lates</center></th>' +
						'<th class="text-left" style="width: 50px;"><center>Absences</center></th>' +
						'<th class="text-right" style="width: 120px;"><center>Total 13th Month</center></th>' +
						'<th class="text-right" style="width: 90px;">Action</th>' +
					'</tr>' +
					'</thead>'+
					'<tbody>';
                    for(i=0; i<response.length; i++){
                    	 if(parseInt(response[i].absent))
                    	 	 totalabasent += parseInt(response[i].absent);
                    	 if(parseInt(response[i].late))
                    	 	 totallate += parseInt(response[i].late);
                    	 if(parseInt(response[i].thrmonth))
                    	 	 totalthrmonth += parseInt(response[i].thrmonth);	
                    	 	 var datefrom = response[i].employeeID;
                   
                     html += '<tr>'+
	                        '<td>'+response[i].employeeID.padStart(6,'0')+'</td>'+
	                        '<td>'+response[i].employeename+'</td>'+
	                        '<td>'+response[i].department+'</td>'+
	                        '<td>'+response[i].designation+'</td>'+
	                        '<td>'+response[i].employeetype+'</td>'+
	                         '<td>'+response[i].thrthmonthdate+'</td>'+
	                         '<td class="text-right">'+accounting.formatMoney(response[i].late)+'</td>'+
	                         '<td class="text-right">'+accounting.formatMoney(response[i].absent)+'</td>'+
	                         '<td class="text-right">'+accounting.formatMoney(response[i].thrmonth)+'</td>'+
	                         '<td><a class="btn btn-sm btn-primary" href="Thirteenmonthreport/recorddata?from='+response[i].datefrom + '&to='+response[i].dateto +'&id='+response[i].employeeID +' "target="_blank" >Generate Report</a></td>'+
                        	'</tr>';   
                    }
                     html += '</tbody>'; 
                     			'<tfoot>';
                     				'<tr>'+
										'<th>'+ 'Total' +'</th>'+
										'<td colspan="5">'+' ' +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totallate)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+accounting.formatMoney(totalabasent) +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalthrmonth) +'</td>'+
									'</tr>';
							  '</tfoot></table>';
					if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };		  
                    $('#show_data').html(html);
                    $('#datatable1').DataTable({
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
	});	
</script>	


		