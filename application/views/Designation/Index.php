<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Designations</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Designations</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation" id="adddesignation" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Designation</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Designations</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 50px;">ID No.</th>
								<th>Designation Name</th>
								<th>Department</th>
								<th style="width: 100px;">Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data['designation'] as $item) { ?>    
								<tr>
									<td><?php echo $item->designationID; ?></td>
									<td><?php echo $item->designationdescription; ?></td>
									<td><?php echo $item->description; ?></td>
									<td >
										<div class="action-label">
												<?php if($item->designationstatus=="Active") 
														   echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> Active</span>';
													  else echo '<span class="badge bg-inverse-danger custom-status"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</span>';
											    ?>
										</div>
									</td>

									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item editdesignation" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->designationID; ?>" 
													data-toggle="modal" 
													data-target="#edit_designation" 
													data-designationdescription="<?php echo $item->designationdescription; ?>"
													data-department="<?php echo $item->departmentID; ?>">
												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_designation" 
													data-id="<?php echo $item->designationID; ?>" 
													data-status="<?php echo ($item->designationstatus=='Active') ? 'Inactive' : 'Active' ?>" 
													data-designationdescription="<?php echo $item->designationdescription; ?>">
												<i class="fa fa-toggle-on m-r-5"></i> Change Status</a>

											</div>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
			</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Department Modal -->
	<div id="add_designation" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Designation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Designation Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="designationdescription">
							<div class="invalid-feedback" id="add-designationdescription"></div>
						</div>
						<div class="form-group">
							<label>Department <span class="text-danger">*</span></label>
							<select class="form-control" name="departmentID" id="departmentID" style="width: 100%;">
								<option value="">Select Department</option>
								<?php
								foreach($data['department'] as $department)
								{
								echo '<option value="'.$department->departmentID.'">'.$department->description.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="add-departmentID"></div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn save" >Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Department Modal -->
	
	<!-- Edit Department Modal -->
	<div id="edit_designation" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Designation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Designation Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editdesignationdescription">
							<div class="invalid-feedback" id="edit-designationdescription"></div>
						</div>
						<div class="form-group">
							<label>Department <span class="text-danger">*</span></label>
							<select class="form-control" name="departmentID" id="editdepartmentID" style="width: 100%;">
								<option value="">Select Department</option>
								<?php
								foreach($data['department'] as $department)
								{
								echo '<option value="'.$department->departmentID.'">'.$department->description.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="edit-departmentID"></div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Department Modal -->

	<!-- Status Modal -->
	<div class="modal custom-modal fade" id="status_designation" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/change.svg">
						<h3>Change Status</h3>
						<p id="statusmessage"></p>
						<div class="invalid-feedback" id="status-invalid"></div>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary continue-btn change">Change</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Department Modal -->

	<!-- Confirmation Modal -->
	<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
							<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to add this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary continue-btn add" >Add</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-add">Cancel</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Confirmation Modal -->
	<div id="confirmation_edit" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
							<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to update this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary continue-btn edit" >Update</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-edit">Cancel</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
<!-- /Page Wrapper -->

<script>
	$(document).ready(function() {

  		$('[data-tog="tooltip"]').tooltip();

		/* FOCUS ON DESCRIPTION */
		$('#add_designation').on('shown.bs.modal', function(){
	   		$("#designationdescription").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_designation').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-designationdescription").innerHTML = "";
        	$('#designationdescription').removeClass('is-invalid');
        	$('#designationdescription').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-departmentID").innerHTML = "";
        	$('#departmentID').removeClass('is-invalid');
        	$('#departmentID').removeClass('is-valid');
		});
		$('#edit_designation').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-designationdescription").innerHTML = "";
        	$('#editdesignationdescription').removeClass('is-invalid');
        	$('#editdesignationdescription').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-departmentID").innerHTML = "";
        	$('#editdepartmentID').removeClass('is-invalid');
        	$('#editdepartmentID').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_designation').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

		/* EDIT BUTTON - PASS DATA TO MODAL */
		$(document).on("click", ".editdesignation", function(){
			$(".modal-body #editdesignationdescription").val( $(this).data('designationdescription') );
			$(".modal-body #editdepartmentID").val( $(this).data('department') );
			$('.edit').attr('id', $(this).attr('id'));
		});

	   /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('designationdescription', $(this).data('designationdescription'));
			var displayText = "";

			if($(this).data('status')=="Active"){
				displayText = "<font color='green'>activate</font>";
			}else if($(this).data('status')=="Inactive"){
				displayText = "<font color='#e04d45'>inactive</font>";
			}

			document.getElementById("statusmessage").innerHTML = "Are you sure you want to " + displayText + " this record?";
		});
		
		/* SAVE DESCIPTION */
		$('.save').unbind('click').bind('click', function(){
	        var designationdescription = $('#designationdescription').val().trim();
	        var departmentID = $('#departmentID').val().trim();

	        if(designationdescription==""){
	        	document.getElementById("add-designationdescription").innerHTML = "Please provide a designation name.";
	        	$('#designationdescription').addClass('is-invalid');
	        	$("#designationdescription").focus();
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-designationdescription").innerHTML = "";
	        	$('#designationdescription').removeClass('is-invalid');
	        	$('#designationdescription').addClass('is-valid');
	        	$("#designationdescription").focus();
	        }if(departmentID==""){
	        	document.getElementById("add-departmentID").innerHTML = "Please provide a department.";
	        	$('#departmentID').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("add-departmentID").innerHTML = "";
	        	$('#departmentID').removeClass('is-invalid');
	        	$('#departmentID').addClass('is-valid');
	        }


	        if(designationdescription=="" || departmentID=="") return false;

	        $('#add_designation').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_designation').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var designationdescription = $('#editdesignationdescription').val().trim();
	        var departmentID = $('#editdepartmentID').val().trim();

	        if(designationdescription==""){
	        	document.getElementById("edit-designationdescription").innerHTML = "Please provide a designation name.";
	        	$('#editdesignationdescription').addClass('is-invalid');
	        	$("#editdesignationdescription").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-designationdescription").innerHTML = "";
	        	$('#editdesignationdescription').removeClass('is-invalid');
	        	$('#editdesignationdescription').addClass('is-valid');
	        }

	        if(departmentID==""){
	        	document.getElementById("edit-departmentID").innerHTML = "Please provide a department.";
	        	$('#editdepartmentID').addClass('is-invalid');
                event.preventDefault();
	        }

	        else{
	        	document.getElementById("edit-departmentID").innerHTML = "";
	        	$('#editdepartmentID').removeClass('is-invalid');
	        	$('#editdepartmentID').addClass('is-valid');
	        }

	        	if(designationdescription=="" || departmentID=="") return false;

	        	$('#edit_designation').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_designation').show();

		});

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var designationdescription = $(this).attr('designationdescription');

        	$.ajax({
                url : "<?php echo site_url('designations/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		designationdescription:designationdescription},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>Designations');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

        $('.add').unbind('click').bind('click', function(){
			var designationdescription = $('#designationdescription').val().trim();
	        var departmentID = $('#departmentID').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('designations/save');?>",
	                method : "POST",
	                data : {designationdescription:designationdescription,
	                	departmentID:departmentID
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
	        			if(result[0]=="false"){
							document.getElementById("add-designationdescription").innerHTML = result[1];
				        	$('#designationdescription').addClass('is-invalid');
				        	$('#departmentID').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_designation').show();
				        	$("#designationdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Designations');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var designationdescription = $('#editdesignationdescription').val().trim();
	        var departmentID = $('#editdepartmentID').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('designations/update');?>",
	                method : "POST",
	                data : {id:id,
	                		designationdescription:designationdescription,
	                		departmentID:departmentID
	                	},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-designationdescription").innerHTML = result[1];
				        	$('#editdesignationdescription').addClass('is-invalid');
				        	$('#editdepartmentID').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_designation').show();
				        	$("#editdesignationdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Designations');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });
       
	});
</script>