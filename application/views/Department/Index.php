Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Departments</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Departments</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department" id="adddepartment"><i class="fa fa-plus"></i> Add Department</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-id">
					<label class="focus-label">Department ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-description">
					<label class="focus-label">Department Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3"> 
				<div class="form-group form-focus select-focus">
					<select class="select floating" id="search-status"> 
						<option>Select Status</option>
						<option>Active</option>
						<option>Inactive</option>
					</select>
					<label class="focus-label">Status</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<a href="#" class="btn btn-success btn-block search"> Search </a>  
			</div>     
        </div>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th>Department Name</th>
								<th>Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->departmentID; ?></td>
									<td><?php echo $item->description; ?></td>
									<td>
										<div class="dropdown action-label">
											<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
												<?php if($item->departmentstatus=="Active") 
														   echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
													  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
											    ?>
											</a>
											<div class="dropdown-menu">
												<?php if($item->departmentstatus=='Active'){ ?>
													<a class="dropdown-item inactive" href="#" data-toggle="modal" data-target="#status_department" data-id="<?php echo $item->departmentID; ?>" data-status="Inactive" data-description="<?php echo $item->description; ?>"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												<?php }else{ ?>
													<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_department" data-id="<?php echo $item->departmentID; ?>" data-status="Active" data-description="<?php echo $item->description; ?>"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
												<?php } ?>
											</div>
										</div>
									</td>
									<td class="text-right">
	                                <!-- <div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
	                                    <div class="dropdown-menu dropdown-menu-right">
	                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_department"><i class="fa fa-pencil m-r-5"></i> Edit</a>
	                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
	                                    </div>
										</div> -->
										<button type="button" id="<?php echo $item->departmentID; ?>" class="btn btn-info btn-sm editdepartment"
												data-toggle="modal"
												data-target="#edit_department" 
												data-id="<?php echo $item->departmentID; ?>"
												data-description="<?php echo $item->description; ?>"
												data-tog="tooltip"
												data-placement="top"
												title="Edit"> <i class="fa fa-pencil"></i> </button>
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
							<input class="form-control" type="text" id="adddescription">
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
							<input class="form-control" type="text" id="editdescription">
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
		});

		/* CLEAR MODAL */
		$('#status_department').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editdepartment').unbind('click').bind('click', function(){
			$(".modal-body #editdescription").val( $(this).data('description') );
			$('.update').attr('id', $(this).data('id'));
		});

	    /* ACTIVATE */
		$('.activate').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('description', $(this).data('description'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='green'>activate</font> this record?";
		});

	    /* INACTIVE */
		$('.inactive').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('description', $(this).data('description'));
		    document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='#e04d45'>inactive</font> this record?";
		});

		 /* SEACRH */
		$('.search').unbind('click').bind('click', function(){
			
			var id = $("#search-id").val();
			var description =$("#search-description").val();
			var status = $("#search-status").val();

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

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var description = $('#adddescription').val().trim();

	        if(description==""){
	        	document.getElementById("add-invalid").innerHTML = "Please provide a department name.";
	        	$('#adddescription').addClass('is-invalid');
	        	$("#adddescription").focus(); 
                event.preventDefault();
	        }else{
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
				        	$("#adddescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>departments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        }
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
				        	$("#editdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>departments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        }
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
       
	});
</script>