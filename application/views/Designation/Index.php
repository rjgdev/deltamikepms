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
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Designations</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation" id="adddesignation"><i class="fa fa-plus"></i> Add Designation</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-id">
					<label class="focus-label">Designation ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-description">
					<label class="focus-label">Designation Name</label>
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
								<th>Designation Name</th>
								<th>Department</th>
								<th>Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data['designation'] as $item) { ?>    
								<tr>
									<td><?php echo $item->designationID; ?></td>
									<td><?php echo $item->designationdescription; ?></td>
									<td><?php echo $item->description; ?></td>
									<td>
										<div class="dropdown action-label">
											<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
												<?php if($item->designationstatus=="Active") 
														   echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
													  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
											    ?>
											</a>
											<div class="dropdown-menu">
												<?php if($item->designationstatus=='Active'){ ?>
													<a class="dropdown-item inactive" href="#" data-toggle="modal" data-target="#status_designation" data-id="<?php echo $item->designationID; ?>" data-status="Inactive" data-designationdescription="<?php echo $item->designationdescription; ?>"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												<?php }else{ ?>
													<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_designation" data-id="<?php echo $item->designationID; ?>" data-status="Active" data-designationdescription="<?php echo $item->designationdescription; ?>"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
												<?php } ?>
											</div>
										</div>
									</td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->designationID; ?>" class="btn btn-info btn-sm editdesignation"
												data-toggle="modal"
												data-target="#edit_designation" 
												data-id="<?php echo $item->designationID; ?>"
												data-designationdescription="<?php echo $item->designationdescription; ?>"
												data-department="<?php echo $item->departmentID; ?>"
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
							<input class="form-control" type="text" id="designationdescription">
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
							<input class="form-control" type="text" id="editdesignationdescription">
							<div class="invalid-feedback" id="edit-designationdescription"></div>
						</div>
						<div class="form-group">
							<label>Department <span class="text-danger">*</span></label>
							<select class="form-control select2" name="departmentID" id="editdepartmentID" style="width: 100%;">
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
		$('.editdesignation').unbind('click').bind('click', function(){
			$(".modal-body #editdesignationdescription").val( $(this).data('designationdescription') );
			$(".modal-body #editdepartmentID").find( $(this).data('department') ).text();
            $(".modal-body #editdepartmentID").val( $(this).data('department') );
			$('.update').attr('id', $(this).data('id'));
		});

	    /* ACTIVATE */
		$('.activate').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('designationdescription', $(this).data('designationdescription'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='green'>activate</font> this record?";
		});

	    /* INACTIVE */
		$('.inactive').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('designationdescription', $(this).data('designationdescription'));
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
			        	$("#designationdescription").focus();
			        	$('#departmentID').addClass('is-invalid');
			        	$("#departmentID").focus(); 
        			}else{
    					window.location.replace('<?php echo base_url(); ?>designations');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
        	return false;
	        

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
				        	$("#editdesignationdescription").focus(); 
				        	$('#editdepartmentID').addClass('is-invalid');
				        	$("#editdepartmentID").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>designations');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        
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
    					window.location.replace('<?php echo base_url(); ?>designations');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });
       
	});
</script>