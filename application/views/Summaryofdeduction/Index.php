<!DOCTYPE html>
<html lang="en">
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
					<div class="loader"></div>
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Summary of Deductions</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
									<li class="breadcrumb-item active">Summary of Deductions</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Search Filter -->
					<div class="row filter-row">
					    <div class="col-sm-3">
							<div class="form-group form-focus select-focus">
								<select class="form-control select2" id="search-id" style="width: 100%;">
									<option value="0">Select Pay Period</option>
									<?php
									foreach($data['payroll'] as $item)
									{
									echo '<option value="'.$item->payrollID.'">' .date("F d, Y",strtotime($item->datefrom)). '-' .date("F d, Y",strtotime($item->dateto)). '</option>';
									}
									?>  
								</select>
								<label class="focus-label">Pay Period</label>
							</div>
						</div>
						<div class="col-sm-2">  
							<div class="form-group form-focus select-focus">
								<select class="form-control select2" id="search-employeetype" style="width: 100%;">
									<option value="">All</option>
									<?php
									foreach($data['employeetype'] as $item)
									{
									echo '<option value="'.$item->employeetypeID.'">'.$item->employeeTypeDescription. '</option>';
									}
									?>  
								</select>
								<label class="focus-label">Employee Type</label>
							</div>
						</div>
						<div class="col-sm-3">  
							<div class="form-group form-focus select-focus">
								<select class="form-control select2" id="search-client" style="width: 100%;">
									<option value="">All</option>
									<?php
									foreach($data['client'] as $item)
									{
									echo '<option value="'.$item->clientID.'">'.$item->clientname. '</option>';
									}
									?>  
								</select>
								<label class="focus-label">Client</label>
							</div>
						</div>
						<div class="col-sm-2">  
							<div class="form-group form-focus select-focus">
								<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
								<select class="form-control select2" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" required>
									<option value="">All</option> 
								</select>
								<label class="focus-label">Post</label>
							</div>
						</div>
						<div class="col-sm-2">  
							<a href="#" class="btn btn-success btn-block search"><i class="fas fa-search"></i> Search </a>  
						</div>  
                    </div>
					<!-- /Search Filter -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th style="width: 80px ! important;">Employee ID</th>
											<th style="width: 350px ! important;">Employee</th>
											<th style="width: 200px ! important;">Employee Type</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
				<!-- /Page Content -->
            </div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->
    </body>
</html>
<script>
	$(document).ready(function() {
		$('.search').unbind('click').bind('click', function(){
				var id = $("#search-id").val();
				var type = $("#search-employeetype").val();
				var client = $("#search-client").val();

				if(id=="Select Pay Period") id = "";

				$.ajax({
	                url : "<?php echo site_url('summaryofdeductions');?>",
	                method : "POST",
	                data : {id : id,
	                		type : type,
	                		client : client},
	                async : true,
	                dataType : 'json',
	                success: function(data){
						var html ="";

						var table = $(".datatable").dataTable();
			            oSettings = table.fnSettings();
			            table.fnClearTable(this);

			            var varStatus = "";
			            var varStatusIcon = "";
			            var varPhoto = "";

			            for (var i=0; i < data.length; i++)
			            {

			    			if(data[i].photo==""){
			        			varPhoto = '<img alt="" src="uploads/profileimg.png"></a>';
			    			}else{
			        			varPhoto = '<img alt="" src="uploads/'+data[i].photo+'" ></a>';
			    			}

			                table.oApi._fnAddData(oSettings, [
			                		data[i].empID.padStart(6,'0'),
			                		'<div class="dash-card-content">' +
			                			'<a class="avatar" style="margin: 0 0px 0 0;">'
				                		+ varPhoto + 
				                		'<p style="margin-left: 10px; color: black;">' + data[i].lastname + ', ' + data[i].firstname + ' <span style="color:#888;display: block; font-size: 11px;">'+ data[i].description +' | '+ data[i].designationdescription +'</span></p>' +
									'</div>',
			                		data[i].employeeTypeDescription,
			                		'<td><a class="btn btn-sm btn-primary float-right generate" href="<?php echo base_url(); ?>summaryofdeductions/preview?id='+data[i].empID+'&payrolldetailsID='+data[i].pdID+'" target="_blank">Generate Report</a></td>'
			                		]);
			            }
			 
			            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
			            table.fnDraw();
	                },
	                error: function(request, textStatus, error) {
	                		/*alert(request + ":" + textStatus + ":" + error);*/
	            	}
	            });
			});

		$('#search-client').change(function(){
				var id=$(this).val();
				$.ajax({
					url : "<?php echo site_url('summaryofdeductions/get_client');?>",
					method : "POST",
					data : {id: id},
					async : true,
					dataType : 'json',
					success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						if($("#searchhiddendetachment").val()==data[i].postID){
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

		$('#search-employeetype').change(function(){
				var employeetype =$(this).val();
				if(employeetype==1){
				$("#search-client").prop("disabled", false);
				$("#searchdetachment").prop("disabled", false);


			}else{
				$("#search-client").prop("disabled", true);
				$("#searchdetachment").prop("disabled", true);
				$("#search-client").val('');
				$("#searchdetachment").val('');
			}

			});
});	
</script>