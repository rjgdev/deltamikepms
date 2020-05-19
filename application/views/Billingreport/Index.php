<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Billing Statement Report</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Billing Statement Report</li>
					</ul>
				</div>
			</div>
		</div>
<!-- Search Filter -->
		<form action="#"id="frmbilling"name="frmbilling">
			<div class="row">
				<div class="col-xl-12">
					<div class="form-group row" style="margin-bottom: 0px!important">

						<div class="col-lg-5 col-md-5">
							<div class="form-group form-focus select-focus">
								<select class="form-control select2" id="searchbillingperiod" name="searchbillingperiod" style="width: 100%;" description="Client" required>
									<option value="0">Select Billing Period</option>
								 		<?php foreach($data as  $payroll)
											{
											echo '<option value="'.$payroll->datefrom.'">'.$payroll->datebilling.'</option>';
											}
										?> 
								</select>
								<label class="focus-label">Billing Date</label>
								<div class="invalid-feedback" id="search-searchbillingperiod"></div>
							</div>
						</div>

						<div class="col-sm-3">
							<div class="form-group form-focus select-focus">
								<input type="hidden" id="searchhiddenclient" name="searchhiddenclient">
								<select class="form-control select2" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
									<option value="0">Select Client</option>
								</select>
								<div class="invalid-feedback" id="search-searchclient"></div>
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

						<div class="col-lg-2 col-md-2">
					 		<div class="form-group">
								  <div class="input-group-append">
								    	<button type="submit" name="searcgbtn" id="searcgbtn" class="btn btn-success" style="width: 105%; height: 49px; text-align:center"><i class="fas fa-search"></i> SEARCH</button>
								  </div>
						 	</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	
		<div class="table-responsive" id="show_data">
			<table class="table table-striped custom-table datatable" id="datatable1">
				<thead>	
					<tr>
						<th style="width: 90px ! important;">Client Name</th>
						<th style="width: 90px ! important;">Detachment</th>
						<th style="width: 180px ! important;">Billing Date</th>
						<th style="width: 120px ! important;">Security Officer</th>
						<th style="width: 120px ! important;">Security Guards</th>
						<th style="width: 110px ! important;">SSS</th>
						<th style="width: 90px ! important;">PHIC</th>
						<th style="width: 80px ! important;">HDMF</th>
						<th style="width: 130px ! important;">Insurance Fund</th>
						<th style="width: 130px ! important;">Overhead Margin</th>
						<th style="width: 60px ! important;">Subtotal</th>
						<th style="width: 60px ! important;">Taxable</th>
						<th style="width: 60px ! important;">Tax Due</th>
						<th style="width: 60px ! important;">Action</th>									
					</tr>
				</thead>	
				<tbody id="show_data">
         
   				</tbody>
   				<tfoot id = total_data>
   				
   				</tfoot>
			</table>
		</div>
	</div>

<script  type="text/javascript">      
	$(document).ready(function() {

		$("#searchbillingperiod").change(function(){
			var id=$(this).val();
			/*$("#searchclient").trigger("change");*/
			
			$.ajax({
				url : "<?php echo site_url('Billingreport/get_client');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){
				  var html = '';
           		var i;
           		 html += '<option value="">Client Selected</option>';
				for(i=0; i<data.length; i++){
					console.log(data[i].clientID);
					if($("#searchhiddenclient").val()==data[i].clientID){
					html += '<option value='+data[i].clientID+' selected>'+data[i].clientname+'</option>';
					}else{
					html += '<option value='+data[i].clientID+'>'+data[i].clientname+'</option>';
					}
				}
				$('#searchclient').html(html);
				}
			});
			return false;

		});


		$("#searchclient").change(function(){
			var id=$(this).val();

			
			$.ajax({
				url : "<?php echo site_url('Billingreport/get_detachment');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){
				var html = '';
				var i;

				html += '<option value="">All</option>';
				for(i=0; i<data.length; i++){
					if($("#searchhiddendetachment").val()==data[i].detachmentID){
					html += '<option value='+data[i].postID+' selected>'+data[i].postname+'</option>';
					}else{
					html += '<option value='+data[i].postID+'>'+data[i].postname+'</option>';
					}
				}

				$('#searchdetachment').html(html);
				}
			});
			return false;

		});
		
		$("#searcgbtn").click(function(){
		var billingperiod = $("#searchbillingperiod").val();
		var clientID = $("#searchclient").val();
		var detachmentID = $("#searchdetachment").val();
			if(billingperiod ==0){
				showErrorToast("Please select a billing period!");
				document.getElementById("search-searchbillingperiod").innerHTML = "Please provide a billing period.";
				$("#searchbillingperiod").addClass('is-invalid');
				event.preventDefault();
				
			}else{
				document.getElementById("search-searchbillingperiod").innerHTML = "";
	        	$('#searchbillingperiod').removeClass('is-invalid');
	        	$('#searchbillingperiod').addClass('is-valid'); 
			}
			if(clientID==0){
				showErrorToast("Please select a client!");
				document.getElementById("search-searchclient").innerHTML = "Please provide a client.";
				$("#searchclient").addClass('is-invalid');
				event.preventDefault();
			
			}else{
				document.getElementById("search-searchclient").innerHTML = "";
	        	$('#searchclient').removeClass('is-invalid');
	        	$('#searchclient').addClass('is-valid'); 

			}
			if(billingperiod=="" || clientID=="") return false;
			$.ajax({
				url : "<?php echo site_url('Billingreport/search_Billingreport');?>",
				method : "POST",
				data : {billingperiod: 				billingperiod,
						clientID: 					clientID, 			detachmentID: 			detachmentID},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					$("body").addClass("loading"); 
				},
				success: function(data){
					var html = '';
                    var i;
                    html ='<table class="table table-striped custom-table datatable" id="datatable1">' +
						'<thead>' +		
								'<tr>' +
									'<th style="width: 100px ! important;"><center>Client Name</center></th>' +
									'<th style="width: 180px;"><center>Detachment</center></th>' +
									'<th style="width: 180px;"><center>Billing Date</center></th>' +
									'<th class="text-right" style="width: 90px; font-size:11px;"><center>Security Officer</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Security Guards</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>SSS</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>PHIC</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>HDMF</center></th>' +
									'<th class="text-right" style="width: 100px; font-size:11px;"><center>Insurance Fund</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Overhead Margin</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Subtotal</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Taxable</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Tax Due</center></th>' +
									'<th class="text-right" style="width: 60px; font-size:11px;"><center>Action</center></th>' +
								'</tr> ' +
						'</thead>';
					html += '<tbody>';
		      		for(var i=0; i<data.length; i++){
						html += '<tr>' +
    								'<td>' + data[i].clientname  + '</td>' +
    								'<td>' + data[i].detachment + '</td>' +
    								'<td>' + data[i].rangedate + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].basicsalarySO) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].basicsalarySG) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].totalsss) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].totalphic) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].totalhdmf) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].totalretfund) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].totalmargin) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].subtotalwithmargin) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].taxable) + '</td>' +
    								'<td>' +  accounting.formatMoney(data[i].taxdue) + '</td>' +
    								'<td><a class="btn btn-sm btn-primary" href="Billingreport/Billingclient?payrollID='+ data[i].payrollID + '&client='+ data[i].clientID +' &post='+ data[i].postID +'"target="_blank" >Action</a></td>'+	
    							'</tr>';
    					}			
    					html += '</tbody></table>';					
		      		if ($.fn.DataTable.isDataTable('#datatable1')){
			           $('#datatable1').DataTable().destroy();
			        };	

			        $("#show_data").html(html);

		      		$('#datatable1').DataTable({
				        scrollX: false,
			        	scrollCollapse: false,
				        fixedColumns:   {
						   /* leftColumns: 2,
						    rightColumns: 1*/
						}

				    });
		      		  $("body").removeClass("loading"); 

					//$('#modal_confirmation').modal('hide');
					//showSuccessToast("The billing statement has been successfully processed.");
				
					
			},
		 error: function(request, textStatus, error) {
	     }	
		});
			return false;
		});	


		});		

	</script>