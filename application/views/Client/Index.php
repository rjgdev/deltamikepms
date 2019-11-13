<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Clients</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Clients</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client" id="addclient"><i class="fa fa-plus"></i> Add Client</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-id">
					<label class="focus-label">Client ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-description">
					<label class="focus-label">Client Name</label>
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
								<th>Client Name</th>
								<th>Contact Person</th>
								<th>Contact No.</th>
								<th style="width: 200px ! important;">Email</th>
								<th style="width: 250px ! important;">No. of active detachment post</th>
								<th style="width: 100px ! important;">Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->clientID; ?></td>
									<td><?php echo $item->clientname; ?></td>
									<td><?php echo $item->contactperson; ?></td>
									<td><?php echo $item->contactno; ?></td>
									<td><?php echo $item->email; ?></td>
									<td><?php echo $item->activedetachmentpost; ?></td>
									<td>
										<div class="dropdown action-label">
											<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
												<?php if($item->clientstatus=="Active") 
														   echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
													  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
											    ?>
											</a>
											<div class="dropdown-menu">
												<?php if($item->clientstatus=='Active'){ ?>
													<a class="dropdown-item inactive" href="#" data-toggle="modal" data-target="#status_client" data-id="<?php echo $item->clientID; ?>" data-status="Inactive" data-clientname="<?php echo $item->clientname; ?>"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												<?php }else{ ?>
													<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_client" data-id="<?php echo $item->clientID; ?>" data-status="Active" data-clientname="<?php echo $item->clientname; ?>"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
												<?php } ?>
											</div>
										</div>
									</td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->clientID; ?>" class="btn btn-info btn-sm editclient"
												data-toggle="modal"
												data-target="#edit_client" 
												data-id="<?php echo $item->clientID; ?>"
												data-clientname="<?php echo $item->clientname; ?>"
												data-location="<?php echo $item->location; ?>"
												data-description="<?php echo $item->description; ?>"
												data-contactperson="<?php echo $item->contactperson; ?>"
												data-contactno="<?php echo $item->contactno; ?>"
												data-email="<?php echo $item->email; ?>"
												data-activedetachmentpost="<?php echo $item->activedetachmentpost; ?>"
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
	<div id="add_client" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Client Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="clientname">
							<div class="invalid-feedback" id="add-clientname"></div>
						</div>
						<div class="form-group">
							<label>Description </label>
							<input class="form-control" type="text" id="description">
							<div class="invalid-feedback" id="add-description"></div>
						</div>
						<div class="form-group">
							<label>Location </label>
							<input class="form-control" type="text" id="location">
							<div class="invalid-feedback" id="add-location"></div>
						</div>
						<div class="form-group">
							<label>Contact Person <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="contactperson">
							<div class="invalid-feedback" id="add-contactperson"></div>
						</div>
						<div class="form-group">
							<label>Contact No. <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="contactno">
							<div class="invalid-feedback" id="add-contactno"></div>
						</div>
						<div class="form-group">
							<label>Email<span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="email">
							<div class="invalid-feedback" id="add-email"></div>
						</div>
						<div class="form-group">
							<label>No. of active detachment post </label>
							<input class="form-control" type="text" id="activedetachmentpost">
							<div class="invalid-feedback" id="add-activedetachmentpost"></div>
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
	<div id="edit_client" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Client Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editclientname">
							<div class="invalid-feedback" id="edit-clientname"></div>
						</div>
						<div class="form-group">
							<label>Description </label>
							<input class="form-control" type="text" id="editdescription">
							<div class="invalid-feedback" id="edit-description"></div>
						</div>
						<div class="form-group">
							<label>Location </label>
							<input class="form-control" type="text" id="editlocation">
							<div class="invalid-feedback" id="edit-location"></div>
						</div>
						<div class="form-group">
							<label>Contact Person <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editcontactperson">
							<div class="invalid-feedback" id="edit-contactperson"></div>
						</div>
						<div class="form-group">
							<label>Contact No. <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editcontactno">
							<div class="invalid-feedback" id="edit-contactno"></div>
						</div>
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editemail">
							<div class="invalid-feedback" id="edit-email"></div>
						</div>
						<div class="form-group">
							<label>No. of active detachment post </label>
							<input class="form-control" type="text" id="editactivedetachmentpost">
							<div class="invalid-feedback" id="edit-activedetachmentpost"></div>
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
	<div class="modal custom-modal fade" id="status_client" role="dialog">
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
		$('.select2').select2();

  		$('[data-tog="tooltip"]').tooltip();

		/* FOCUS ON DESCRIPTION */
		$('#add_client').on('shown.bs.modal', function(){
	   		$("#clientname").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_client').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-clientname").innerHTML = "";
        	$('#clientname').removeClass('is-invalid');
        	$('#clientname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-description").innerHTML = "";
        	$('#description').removeClass('is-invalid');
        	$('#description').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-location").innerHTML = "";
        	$('#location').removeClass('is-invalid');
        	$('#location').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-contactperson").innerHTML = "";
        	$('#contactperson').removeClass('is-invalid');
        	$('#contactperson').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-contactno").innerHTML = "";
        	$('#contactno').removeClass('is-invalid');
        	$('#contactno').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-email").innerHTML = "";
        	$('#email').removeClass('is-invalid');
        	$('#email').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-activedetachmentpost").innerHTML = "";
        	$('#activedetachmentpost').removeClass('is-invalid');
        	$('#activedetachmentpost').removeClass('is-valid');
		});

		$('#edit_client').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-clientname").innerHTML = "";
        	$('#editclientname').removeClass('is-invalid');
        	$('#editclientname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-description").innerHTML = "";
        	$('#editdescription').removeClass('is-invalid');
        	$('#editdescription').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-location").innerHTML = "";
        	$('#editlocation').removeClass('is-invalid');
        	$('#editlocation').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-contactperson").innerHTML = "";
        	$('#editcontactperson').removeClass('is-invalid');
        	$('#editcontactperson').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-contactno").innerHTML = "";
        	$('#editcontactno').removeClass('is-invalid');
        	$('#editcontactno').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-email").innerHTML = "";
        	$('#editemail').removeClass('is-invalid');
        	$('#editemail').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-activedetachmentpost").innerHTML = "";
        	$('#editactivedetachmentpost').removeClass('is-invalid');
        	$('#editactivedetachmentpost').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_client').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editclient').unbind('click').bind('click', function(){
			$(".modal-body #editclientname").val( $(this).data('clientname') );
			$(".modal-body #editdescription").val( $(this).data('description') );
			$(".modal-body #editlocation").val( $(this).data('location') );
			$(".modal-body #editcontactperson").val( $(this).data('contactperson') );
			$(".modal-body #editcontactno").val( $(this).data('contactno') );
			$(".modal-body #editemail").val( $(this).data('email') );
			$(".modal-body #editactivedetachmentpost").val( $(this).data('activedetachmentpost') );
			$('.update').attr('id', $(this).data('id'));
		});

	    /* ACTIVATE */
		$('.activate').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('clientname', $(this).data('clientname'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='green'>activate</font> this record?";
		});

	    /* INACTIVE */
		$('.inactive').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('clientname', $(this).data('clientname'));
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
	        var clientname = $('#clientname').val().trim();
	        var description = $('#description').val().trim();
	        var location = $('#location').val().trim();
	        var contactperson = $('#contactperson').val().trim();
	        var contactno = $('#contactno').val().trim();
	        var email = $('#email').val().trim();
	        var activedetachmentpost = $('#activedetachmentpost').val().trim();

	        if(clientname==""){
	        	document.getElementById("add-clientname").innerHTML = "Please provide a client name.";
	        	$('#clientname').addClass('is-invalid');
	        	$("#clientname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-clientname").innerHTML = "";
	        	$('#clientname').removeClass('is-invalid');
	        	$('#clientname').addClass('is-valid');
	        	$("#clientname").focus();
	        }

	        if(contactperson==""){
	        	document.getElementById("add-contactperson").innerHTML = "Please provide a contact person.";
	        	$('#contactperson').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-contactperson").innerHTML = "";
	        	$('#contactperson').removeClass('is-invalid');
	        	$('#contactperson').addClass('is-valid');
	        	$("#contactperson").focus();
	        }

	        if(contactno==""){
	        	document.getElementById("add-contactno").innerHTML = "Please provide a contact number.";
	        	$('#contactno').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-contactno").innerHTML = "";
	        	$('#contactno').removeClass('is-invalid');
	        	$('#contactno').addClass('is-valid');
	        	$("#contactno").focus();
	        }

	        if(email==""){
	        	document.getElementById("add-email").innerHTML = "Please provide an email.";
	        	$('#email').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-email").innerHTML = "";
	        	$('#email').removeClass('is-invalid');
	        	$('#email').addClass('is-valid');
	        	$("#email").focus();
	        }

	        if(clientname=="" || contactperson=="" || contactno=="" || email=="") return false;

	        	$.ajax({
	                url : "<?php echo site_url('clients/save');?>",
	                method : "POST",
	                data : {clientname:clientname,
	                		description:description,
	                		location:location,
	                		contactperson:contactperson,
	                		contactno:contactno,
	                		email:email,
	                		activedetachmentpost:activedetachmentpost
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-clientname").innerHTML = result[1];
				        	$('#clientname').addClass('is-invalid');
				        	$("#clientname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>clients');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var clientname = $('#editclientname').val().trim();
	        var description = $('#editdescription').val().trim();
	        var location = $('#editlocation').val().trim();
	        var contactperson = $('#editcontactperson').val().trim();
	        var contactno = $('#editcontactno').val().trim();
	        var email = $('#editemail').val().trim();
	        var activedetachmentpost = $('#editactivedetachmentpost').val().trim();

	        if(clientname==""){
	        	document.getElementById("edit-clientname").innerHTML = "Please provide a client name.";
	        	$('#editclientname').addClass('is-invalid');
	        	$("#editclientname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-clientname").innerHTML = "";
	        	$('#editclientname').removeClass('is-invalid');
	        	$('#editclientname').addClass('is-valid');
	        	$("#editclientname").focus();
	        }

	        if(contactperson==""){
	        	document.getElementById("edit-contactperson").innerHTML = "Please provide a contact person.";
	        	$('#editcontactperson').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-contactperson").innerHTML = "";
	        	$('#editcontactperson').removeClass('is-invalid');
	        	$('#editcontactperson').addClass('is-valid');
	        }

	        if(contactno==""){
	        	document.getElementById("edit-contactno").innerHTML = "Please provide a contact number.";
	        	$('#editcontactno').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-contactno").innerHTML = "";
	        	$('#editcontactno').removeClass('is-invalid');
	        	$('#editcontactno').addClass('is-valid');
	        }

	        if(email==""){
	        	document.getElementById("edit-email").innerHTML = "Please provide an email.";
	        	$('#editemail').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-contactperson").innerHTML = "";
	        	$('#editemail').removeClass('is-invalid');
	        	$('#editemail').addClass('is-valid');
	        }

	        if(clientname=="" || contactperson=="" || contactno=="" || email=="") return false;

	        	$.ajax({
	                url : "<?php echo site_url('clients/update');?>",
	                method : "POST",
	                data : {id:id,
	                		clientname:clientname,
	                		description:description,
	                		location:location,
	                		contactperson:contactperson,
	                		contactno:contactno,
	                		email:email,
	                		activedetachmentpost:activedetachmentpost},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-clientname").innerHTML = result[1];
				        	$('#editclientname').addClass('is-invalid');
				        	$("#editclientname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>clients');
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
	        var clientname = $(this).attr('clientname');

        	$.ajax({
                url : "<?php echo site_url('clients/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		clientname:clientname},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>clients');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });
       
	});
</script>