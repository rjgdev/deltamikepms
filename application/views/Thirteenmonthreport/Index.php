<!-- Page Wrapper -->
<div class="page-wrapper">
	<br>
<!-- Search Filter -->
<div class="col-lg-12">
<div class="card">
	<div class="row">
	<div class="col-md-12">
	<div class="card mb-0">
	<div class="card-header">
		<h4 class="card-title mb-0">Thirteen Month Report</h4>
	</div>
	<div class="card-body">
		<form action="#">
		<div class="row">
			<div class="col-xl-12">
			<div class="form-group row">
			<div class="col-sm-2">
				<div class="form-group">
				<label>Start Date</label>
				<input id="searchstartdate"  name="searchstartdate" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label>End Date</label>
				<input id="searchsenddate"  name="searchsenddate" class="form-control datetimepicker" placeholder="dd/mm/yyyy">
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Employee Type</label>
				<select class="form-control" name="searchemployeetype" id="searchemployeetype" >
				<option value="">No Selected</option>
				<option value="1">Security Guard</option>
				<option value="2">Staff</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">	
				<label for="adddetachment">Client <span class="text-danger">*</span></label>
				<select class="form-control" id="searchclient" name="searchclient" style="width: 100%;" description="Client" required>
				<option value="">No Selected</option>
				<?php
				foreach($data['client'] as $client)
				{
				echo '<option value="'.$client->clientID.'">'.$client->description.'</option>';
				}
				?>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Detachment</label>
				<input type="hidden" id="searchhiddendetachment" name="searchhiddendetachment">
				<select class="form-control" id="searchdetachment" name="searchdetachment" style="width: 100%;" description="detachment" required>
				<option value="">No Selected</option>
				</select>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="form-group">
				<label for="gender">Search</label>
				<br>
				<button type="submit" class="btn btn-primary">Submit</button>
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
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Thirteen Month Report</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap mb-0">
											<thead>
												<tr>
													<th>Employee ID</th>
													<th>Employee Name</th>
													<th>Employee Type</th>
													<th>Client</th>
													<th>Detachment</th>
													<th>Date Hired</th>
													<th>Genarated</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($data['employee'] as $record) : ?>
												<tr>
													
													<td><?php echo $record->employeeID ?></td>
													<td><?php echo $record->fullname ?></td>
													<td><?php echo $record->employeetype ?></td>
													<td><?php echo $record->description ?></td>
													<td><?php echo $record->postname ?></td>
													<td><?php echo $record->hireddate ?></td>
													<td><a class="btn btn-sm btn-primary" href="recorddata?id=<?php echo $record->employeeID ?>&auth='<?php echo $record->encryptID ?>'"target="_blank" >Generate Report</a><td>
												</tr>	
												<?php endforeach; ?>
											</tbody>
										</table>
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
   			alert(id);
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

	});
</script>	


		