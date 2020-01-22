<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Departments</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Departments</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department" id="adddepartment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Department</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">

				<div class="table-responsive">
              <h4 class="mb-3 text-primary">List of Departments</h4>
					<table class="table table-striped custom-table mb-0 datatable">

						<thead>
							<tr>
								<th style="width: 50px;">ID No.</th>
								<th>Department Name</th>
								<th style="width: 100px;">Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody id="show_data">
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->departmentID; ?></td>
									<td><?php echo $item->description; ?></td>
									<td >
										<div class="action-label">
												<?php if($item->departmentstatus=="Active") 
														   echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> Active</span>';
													  else echo '<span class="badge bg-inverse-danger custom-status"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</span>';
											    ?>
										</div>
									</td>

									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item editdepartment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" id="<?php echo $item->departmentID; ?>" data-toggle="modal" data-target="#edit_department" data-description="<?php echo $item->description; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" data-toggle="modal" data-target="#status_department" data-id="<?php echo $item->departmentID; ?>" data-status="<?php echo ($item->departmentstatus=='Active') ? 'Inactive' : 'Active' ?>" data-description="<?php echo $item->description; ?>"><i class="fa fa-toggle-on m-r-5"></i> Change Status</a>
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
	<div id="add_department" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Department</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Department Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="adddescription">
							<div class="invalid-feedback" id="add-invalid"></div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Department Modal -->
	
	<!-- Edit Department Modal -->
	<div id="edit_department" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Department</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Department Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editdescription">
							<div class="invalid-feedback" id="edit-invalid"></div>
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
	<div class="modal custom-modal fade" id="status_department" role="dialog">
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
		$('#add_department').on('shown.bs.modal', function(){
	   		$("#adddescription").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_department').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-invalid").innerHTML = "";
        	$('#adddescription').removeClass('is-invalid');
        	$('#adddescription').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#edit_department').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-invalid").innerHTML = "";
        	$('#editdescription').removeClass('is-invalid');
        	$('#editdescription').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_department').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$(document).on("click", ".editdepartment", function(){
			$(".modal-body #editdescription").val( $(this).data('description'));
			$('.edit').attr('id', $(this).attr('id'));
		});

	    /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('description', $(this).data('description'));
			var displayText = "";

			if($(this).data('status')=="Active"){
				displayText = "<font color='green'>activate</font>";
			}else if($(this).data('status')=="Inactive"){
				displayText = "<font color='#e04d45'>inactive</font>";
			}

			document.getElementById("statusmessage").innerHTML = "Are you sure you want to " + displayText + " this record?";
		});

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var description = $('#adddescription').val().trim();

	        if(description==""){
	        	document.getElementById("add-invalid").innerHTML = "Please provide a department name.";
	        	$('#adddescription').addClass('is-invalid');
	        	$("#adddescription").focus(); 
                event.preventDefault();
	        }else{
	       		document.getElementById("add-invalid").innerHTML = "";
	        	$('#adddescription').removeClass('is-invalid');
	        	$('#adddescription').addClass('is-valid');
	        	$("#adddescription").focus();
	        }

	        if(description=="" ) return false;

	        	$('#add_department').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

        $("#cncl-add").unbind('click').bind('click', function(){

			$('#confirmation_add').modal('hide');
			$('#add_department').show();
		});

        /* UPDATE DESCIPTION */
		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var description = $('#editdescription').val().trim();

	        if(description==""){
	        	document.getElementById("edit-invalid").innerHTML = "Please provide a department name.";
	        	$('#editdescription').addClass('is-invalid');
	        	$("#editdescription").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-invalid").innerHTML = "";
	        	$('#editdescription').removeClass('is-invalid');
	        	$('#editdescription').addClass('is-valid');
	        	$("#editdescription").focus();
	        }
	       
	        if(description=="" ) return false;

	        $('#edit_department').hide();
			$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

    		event.preventDefault(); 
    		return false;
        });

        $("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_department').show();

    	});

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var description = $(this).attr('description');

        	$.ajax({
                url : "<?php echo site_url('departments/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		description:description},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>departments');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

		$('.add').unbind('click').bind('click', function(){
			var description = $('#adddescription').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('departments/save');?>",
	                method : "POST",
	                data : {description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-invalid").innerHTML = result[1];
				        	$('#adddescription').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_department').show();
				        	$("#adddescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>departments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var description = $('#editdescription').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('departments/update');?>",
	                method : "POST",
	                data : {id:id,
	                		description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-invalid").innerHTML = result[1];
				        	$('#editdescription').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_department').show();
				        	$("#editdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>departments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });
       
	});
</script>