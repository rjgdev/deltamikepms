<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Billing Statement</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Billing Statement</li>
					</ul>
				</div>
			</div>
		</div>
<!-- Search Filter -->
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">Billing Statement</h4>
	</div>
	<div class="card-body">
		<form action="#"id="frmbilling"name="frmbilling">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-3">
				<div class="form-group">	
				<label for="adddetachment">Date</label>
				<select class="form-control select2" id="searchdate" name="searchdate"  style="width: 100%;" description="Client">
				<?php
				foreach($data['cutoff'] as $catoff)
				{
				echo '<option value="'.$catoff->payrollID.'">'.$catoff->formatdate.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">	
				<label for="adddetachment">Client </label>
				<select class="form-control select2" id="searchclient" name="searchclient"  style="width: 100%;" description="Client">
				<option value="0">All</option>
				<?php
				foreach($data['client'] as $client)
				{
				echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
				<label for="gender">Post</label>
				<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
				<select class="form-control select2" id="searchdetachment" name="searchdetachment" multiple="multiple" style="width: 100%;" description="detachment" >
				<option value="0">All</option>
				</select>
				</div>
			</div>
				<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">&emsp;</label>
			<div class="dash-card-container">
				<button class="btn add-btn" id="submit" style="border-radius: 5px; width:150%;">Search</button>
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

	
	<div class="col-lg-12">
		<div id="customers-list"></div>
			<div class="card">
			<div class="card-header">
					<div class="row align-items-center">
					<div class="col">
						<h4 class="card-title mb-0">Records</h4>
				</div>	
			<!-- 	<div class="col-auto float-right ml-auto">
					<a href="javascript:void(0);" class="btn add-btn" id="export_excel" style="border-radius: 5px; width:150%;">Export Excel</a>
				</div>	 -->
				</div>		
				</div>
				<div id="tabledata">
				<div class="card-body">
					<div id='result_table'>
						<table class="table table-striped custom-table datatable">
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
									<th style="width: 130px ! important;">OverHead Margin</th>
									<th style="width: 60px ! important;">Subtotal</th>
									<th style="width: 60px ! important;">Taxable</th>
									<th style="width: 60px ! important;">Tax Due</th>
									<th style="width: 60px ! important;">Generated</th>									
								</tr>
							</thead>	
						
							<tbody id="show_data">
                     
               				 </tbody>
               				<tfoot id = total_data>
               				
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
			$("#export_excel").click(function() {
		window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('#tabledata').html()));
	});
			

			$('#searchclient').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo site_url('Billing/get_detachment');?>",
				method : "POST",
				data : {id: id},
				async : true,
				dataType : 'json',
				success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					
					$("#searchclient").val($(this).data('clientid'));
		   		    $("#searchclient").trigger("change");
	
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
   			
   			var searchdate = $("#searchdate").val();
			var searchclient = $("#searchclient").val();
			var searchdetachment = $("#searchdetachment").val();
			//alert( searchdate +  + searchemployeetype + );
			$.ajax({
				url : "<?php echo site_url('Billing/billingreport');?>",
				method : "POST",
				data : {searchdate: 				searchdate, 			searchclient: 		searchclient,	
						searchdetachment: 			searchdetachment},
				async : true,
				dataType : 'json',
				beforeSend:function(){
					  $("body").addClass("loading");
				},
				success: function(response){


				  var htmlfooter = '';	
				  var html = '';
                    var i;
                    var totalso = 0;
                    var totalsg = 0;
                    var ssstotal = 0;
                    var phictotal = 0;
                    var hdmftotal = 0;
                    var retfundtotal = 0;
                    var margintotal = 0;
                    var marginsubtotal = 0;
                    var taxabletotal = 0;
                    var taxduetotal = 0;
                    for(i=0; i<response.length; i++){
                    	if(parseInt(response[i].SO))
                    	 	 totalso += parseFloat(response[i].SO);
                    	if(parseInt(response[i].SG))
                    	 	 totalsg += parseFloat(response[i].SG);
                    	if(parseInt(response[i].totalsss))
                    	 	 ssstotal += parseFloat(response[i].totalsss);
                    	if(parseInt(response[i].totalphic))
                    	 	 phictotal += parseFloat(response[i].totalphic);
                    	if(parseInt(response[i].totalhdmf))
                    	 	 hdmftotal += parseFloat(response[i].totalhdmf); 
                    	if(parseInt(response[i].totalretfund))
                    	 	 retfundtotal += parseFloat(response[i].totalretfund);
                    	if(parseInt(response[i].totalmargin))
                    	 	 margintotal += parseFloat(response[i].totalmargin); 
                    	if(parseInt(response[i].subtotalwithmargin))
                    	 	 marginsubtotal += parseFloat(response[i].subtotalwithmargin); 
                    	if(parseInt(response[i].taxable))
                    	 	 taxabletotal += parseFloat(response[i].taxable); 
                    	if(parseInt(response[i].taxdue))
                    	 	 taxduetotal += parseFloat(response[i].taxdue);  	 	 	  	 	 	  	 	
                     html += '<tr>'+
                        		'<td>'+response[i].clientname+'</td>'+
		                        '<td>'+response[i].detachment+'</td>'+
		                        '<td>'+response[i].rangedate+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].SO)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].SG)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].totalsss)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].totalphic)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].totalhdmf)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].totalretfund)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].totalmargin)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].subtotalwithmargin)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].taxable)+'</td>'+
								'<td class="text-right">'+accounting.formatMoney(response[i].taxdue)+'</td>'+
								'<td><a class="btn btn-sm btn-primary" href="Billing/Billingclient?payrollID='+ response[i].payrollID + '&client='+ response[i].clientID +' &post='+ response[i].postID +'&post1='+ response[i].encryted +' "target="_blank" >Generate Report</a></td>'+	
                         	'</tr>';         
               		
                    }
                     htmlfooter += '<tr>'+
										'<th>'+ 'Total' +'</th>'+
										'<td colspan="2">'+' ' +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalso)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(totalsg)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(ssstotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(phictotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(hdmftotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(retfundtotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(margintotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(marginsubtotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(taxabletotal)  +'</td>'+
										'<td class="text-right" style="color:#be0e0e;">'+ accounting.formatMoney(taxduetotal)  +'</td>'+
										'<td>'+ '' +'</td>'+
									'</tr>';


                    $('#show_data').html(html);
                    $('#total_data').html(htmlfooter); 
                    $("body").removeClass("loading"); 

		}	
		});
			return false;
		});			



	});	
</script>	