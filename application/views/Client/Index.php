<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Clients</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Clients</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_client" id="addclient" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Client</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Clients</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="min-width: 10px; width:10px;">#</th>
								<th style="min-width: 220px ! important;">Client Name</th>
								<th style="min-width: 220px ! important;">Contact Person</th>
								<th style="min-width: 130px ! important;">Contact Number</th>
								<th style="min-width: 130px ! important;">Email</th>
								<th style="min-width: 50px; width:100px;">Status</th>
								<th style="min-width: 50px; width:100px;" class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->clientID; ?></td>
									<td>
										<div class="dash-card-content">  
											<p style="margin-left: 10px; color: black;"> <?php echo $item->clientname; ?> <span style="color:#888;display: block; font-size: 11px;"> Number of post: <?php echo $item->noofpost; ?> </span></p> 	
										</div>
									</td>
									<td><?php echo $item->contactperson; ?></td>
									<td><?php echo $item->contactno; ?></td>
									<td><?php echo $item->email; ?></td>
									<td >
										<div class="action-label">
												<?php if($item->clientstatus=="Active") 
														   echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> Active</span>';
													  else if($item->clientstatus=="Terminated")
													  	   echo '<span class="badge bg-inverse-purple custom-status"><i class="fa fa-dot-circle-o text-purple"></i> Terminated</span>';
													  else if($item->clientstatus=="End of Contract")
													  	   echo '<span class="badge bg-inverse-info custom-status"><i class="fa fa-dot-circle-o text-info"></i> End of Contract</span>';
											    ?>
										</div>
									</td>

									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item editclient" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->clientID; ?>" 
													data-toggle="modal" 
													data-target="#edit_client" 
													data-clientname="<?php echo $item->clientname; ?>"
													data-housenumber="<?php echo $item->housenumber; ?>"
													data-streetname="<?php echo $item->streetname; ?>"
													data-barangay="<?php echo $item->barangay; ?>"
													data-city="<?php echo $item->city; ?>"
													data-description="<?php echo $item->description; ?>"
													data-contactperson="<?php echo $item->contactperson; ?>"
													data-contactno="<?php echo $item->contactno; ?>"
													data-email="<?php echo $item->email; ?>"
													data-noofpost="<?php echo $item->noofpost; ?>">
												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_client" 
													data-id="<?php echo $item->clientID; ?>" 
													data-status="<?php echo ($item->clientstatus=='Active') ? 'Inactive' : 'Active' ?>" 
													data-clientname="<?php echo $item->clientname; ?>">
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
	<div id="add_client" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="row">
							<div class="form-group col-sm-6">
								<label>Client Name <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="clientname">
								<div class="invalid-feedback" id="add-clientname"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Description </label>
								<input class="form-control letterswithdotandcomma" type="text" id="description">
								<div class="invalid-feedback" id="add-description"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Unit Number </label>
								<input class="form-control specchar" type="text" id="housenumber">
								<div class="invalid-feedback" id="add-housenumber"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Street Name <span class="text-danger">*</span></label>
								<input class="form-control specchar" type="text" id="streetname">
								<div class="invalid-feedback" id="add-streetname"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Barangay <span class="text-danger">*</span></label>
								<input class="form-control specchar" type="text" id="barangay">
								<div class="invalid-feedback" id="add-barangay"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>City <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="city">
								<div class="invalid-feedback" id="add-city"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Contact Person <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="contactperson">
								<div class="invalid-feedback" id="add-contactperson"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Contact Number <span class="text-danger">*</span></label>
								<input class="form-control contactinfo" type="text" id="contactno">
								<div class="invalid-feedback" id="add-contactno"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Email<span class="text-danger">*</span></label>
								<input class="form-control" type="text" id="email">
								<div class="invalid-feedback" id="add-email"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Number of Post <span class="text-danger">*</span></label>
								<input class="form-control numbersonly" type="text" id="activedetachmentpost">
								<div class="invalid-feedback" id="add-activedetachmentpost"></div>
							</div>
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
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Client</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="row">
							<div class="form-group col-sm-6">
								<label>Client Name <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="editclientname">
								<div class="invalid-feedback" id="edit-clientname"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Description </label>
								<input class="form-control letterswithdotandcomma" type="text" id="editdescription">
								<div class="invalid-feedback" id="edit-description"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Unit Number </label>
								<input class="form-control specchar" type="text" id="edithousenumber">
								<div class="invalid-feedback" id="edit-housenumber"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Street Name <span class="text-danger">*</span></label>
								<input class="form-control specchar" type="text" id="editstreetname">
								<div class="invalid-feedback" id="edit-streetname"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Barangay <span class="text-danger">*</span></label>
								<input class="form-control specchar" type="text" id="editbarangay">
								<div class="invalid-feedback" id="edit-barangay"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>City <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="editcity">
								<div class="invalid-feedback" id="edit-city"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Contact Person <span class="text-danger">*</span></label>
								<input class="form-control restrictspecchar" type="text" id="editcontactperson">
								<div class="invalid-feedback" id="edit-contactperson"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Contact Number <span class="text-danger">*</span></label>
								<input class="form-control contactinfo" type="text" id="editcontactno">
								<div class="invalid-feedback" id="edit-contactno"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Email <span class="text-danger">*</span></label>
								<input class="form-control" type="text" id="editemail">
								<div class="invalid-feedback" id="edit-email"></div>
							</div>
							<div class="form-group col-sm-6">
								<label>Number of Post <span class="text-danger">*</span></label>
								<input class="form-control numbersonly" type="text" id="editactivedetachmentpost">
								<div class="invalid-feedback" id="edit-activedetachmentpost"></div>
							</div>
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
          <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/change.svg">
          <h3>Change Status</h3>
          <div class="col-sm-12">
                <div class="dropdown">
              <p>Are you sure you want to
                  <select class="selectstatus" name="changestatus" id="changestatus" description="status">
                      <option value="Active"> Activate</option>
                      <option value="Terminated"> Terminate</option>
                      <option value="End of Contract"> End the Contract</option>
                  </select>
                this record?</p>
              </div>
                </p>
            </div>    
          <div class="invalid-feedback" id="status-invalid"></div>

          <br> 
          <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter an authorized password: <span class="badge bg-inverse-warning" style="font-size: 10px;font-weight: 500;"> Passwords are case sensitive</span></p> 
          <input type="password" class="form-control input alphanumeric" id="statusPassword" autocomplete="off" description="password" required>
          <div class="invalid-feedback" id="status-password" style="text-align: left;"></div>
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
							<h3>Add Client</h3>
							<p>Are you sure you want to add this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>

							<br> 
							 <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter authorize password: <span class="badge bg-inverse-warning" style="font-size: 10px;font-weight: 500;"> Passwords are case sensitive</span></p> 
							 <input type="password" class="form-control input alphanumeric" id="addPassword" autocomplete="off" description="password" required>
						 	 <div class="invalid-feedback" id="add-password" style="text-align: left;"></div>
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
							<h3>Update Client</h3>
							<p>Are you sure you want to update this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>

							<br> 
							 <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter authorize password: <span class="badge bg-inverse-warning" style="font-size: 10px;font-weight: 500;"> Passwords are case sensitive</span></p> 
							 <input type="password" class="form-control input alphanumeric" id="editPassword" autocomplete="off" description="password" required>
						 	 <div class="invalid-feedback" id="edit-password" style="text-align: left;"></div>
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
<span><?php if($this->session->flashdata('clientstatus')=="clientsuccess") echo '<script type="text/javascript"> showClientStatusSuccessToast() </script>';?></span>

<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
<!-- /Page Wrapper -->

<style>
	div#DataTables_Table_0_wrapper .row:nth-child(2){
	    overflow-y: hidden;
	}
</style>

<script>	
	$(document).ready(function() {
		$('.contactinfo').mask('0000-000-0000');

		$('.select2').select2();

  		$('[data-tog="tooltip"]').tooltip();

  		/*********************** FOCUS AND CLEAR CONFIRMPASSWORD ***********************/
			$('#confirmation_add').on('shown.bs.modal', function(){
		   		$("#addPassword").focus(); 
			});

			$('#confirmation_add').on('hide.bs.modal', function(){
		   		document.getElementById("add-password").innerHTML = "";
		   		$("#addPassword").val("");
	    		$('#addPassword').removeClass('is-invalid');
			});

			$('#confirmation_edit').on('shown.bs.modal', function(){
		   		$("#editPassword").focus(); 
			});

			$('#confirmation_edit').on('hide.bs.modal', function(){
		   		document.getElementById("add-password").innerHTML = "";
		   		$("#editPassword").val("");
	    		$('#editPassword').removeClass('is-invalid');
			});

			$('#status_client').on('shown.bs.modal', function(){
		   		$("#statusPassword").focus(); 
			});

			$('#status_client').on('hide.bs.modal', function(){
		   		document.getElementById("status-password").innerHTML = "";
		   		$("#statusPassword").val("");
	    		$('#statusPassword').removeClass('is-invalid');
			});
		/*********************** END FOCUS AND CLEAR CONFIRMPASSWORD ***********************/

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
		    document.getElementById("add-housenumber").innerHTML = "";
        	$('#housenumber').removeClass('is-invalid');
        	$('#housenumber').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-streetname").innerHTML = "";
        	$('#streetname').removeClass('is-invalid');
        	$('#streetname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-barangay").innerHTML = "";
        	$('#barangay').removeClass('is-invalid');
        	$('#barangay').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-city").innerHTML = "";
        	$('#city').removeClass('is-invalid');
        	$('#city').removeClass('is-valid');
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
		    document.getElementById("edit-housenumber").innerHTML = "";
        	$('#edithousenumber').removeClass('is-invalid');
        	$('#edithousenumber').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-streetname").innerHTML = "";
        	$('#editstreetname').removeClass('is-invalid');
        	$('#editstreetname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-barangay").innerHTML = "";
        	$('#editbarangay').removeClass('is-invalid');
        	$('#editbarangay').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-city").innerHTML = "";
        	$('#editcity').removeClass('is-invalid');
        	$('#editcity').removeClass('is-valid');
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
		$(document).on("click", ".editclient", function(){
			$(".modal-body #editclientname").val( $(this).data('clientname') );
			$(".modal-body #editdescription").val( $(this).data('description') );
			$(".modal-body #edithousenumber").val( $(this).data('housenumber') );
			$(".modal-body #editstreetname").val( $(this).data('streetname') );
			$(".modal-body #editbarangay").val( $(this).data('barangay') );
			$(".modal-body #editcity").val( $(this).data('city') );
			$(".modal-body #editcontactperson").val( $(this).data('contactperson') );
			$(".modal-body #editcontactno").val( $(this).data('contactno') );
			$(".modal-body #editemail").val( $(this).data('email') );
			$(".modal-body #editactivedetachmentpost").val( $(this).data('noofpost') );
			$('.edit').attr('id', $(this).attr('id'));
		});

	    /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
          $('.change').attr('id', $(this).data('id'));
          $('.change').attr('status', $(this).data('status'));
          $('.change').attr('clientstatus', $(this).data('clientstatus')); 
        
        });

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var clientname = $('#clientname').val().trim();
	        var description = $('#description').val().trim();
	        var housenumber = $('#housenumber').val().trim();
	        var streetname = $('#streetname').val().trim();
	        var barangay = $('#barangay').val().trim();
	        var city = $('#city').val().trim();
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
	        }

	        if(streetname==""){
	        	document.getElementById("add-streetname").innerHTML = "Please provide a streetname.";
	        	$('#streetname').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-streetname").innerHTML = "";
	        	$('#streetname').removeClass('is-invalid');
	        	$('#streetname').addClass('is-valid');
	        }

	        if(barangay==""){
	        	document.getElementById("add-barangay").innerHTML = "Please provide a barangay.";
	        	$('#barangay').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-barangay").innerHTML = "";
	        	$('#barangay').removeClass('is-invalid');
	        	$('#barangay').addClass('is-valid');
	        }

	        if(city==""){
	        	document.getElementById("add-city").innerHTML = "Please provide a city.";
	        	$('#city').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-city").innerHTML = "";
	        	$('#city').removeClass('is-invalid');
	        	$('#city').addClass('is-valid');
	        }

	        if(contactperson==""){
	        	document.getElementById("add-contactperson").innerHTML = "Please provide a contact person.";
	        	$('#contactperson').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-contactperson").innerHTML = "";
	        	$('#contactperson').removeClass('is-invalid');
	        	$('#contactperson').addClass('is-valid');
	        }

	        if(contactno==""){
	        	document.getElementById("add-contactno").innerHTML = "Please provide a contact number.";
	        	$('#contactno').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-contactno").innerHTML = "";
	        	$('#contactno').removeClass('is-invalid');
	        	$('#contactno').addClass('is-valid');
	        }

	        if(activedetachmentpost==""){
	        	document.getElementById("add-activedetachmentpost").innerHTML = "Please provide a number of post.";
	        	$('#activedetachmentpost').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-activedetachmentpost").innerHTML = "";
	        	$('#activedetachmentpost').removeClass('is-invalid');
	        	$('#activedetachmentpost').addClass('is-valid');
	        }

	        if(email==""){
	        	document.getElementById("add-email").innerHTML = "Please provide an email.";
	        	$('#email').addClass('is-invalid');
	        	event.preventDefault();
	        }else if(!validateEmail(email)){
        		document.getElementById("add-email").innerHTML = "Enter a valid email address.";
	        	$('#email').addClass('is-invalid');
	        	event.preventDefault();
	        	return false;
        	}else{
	        	document.getElementById("add-email").innerHTML = "";
	        	$('#email').removeClass('is-invalid');
	        	$('#email').addClass('is-valid');
	        }

	        if(clientname=="" || streetname=="" || barangay=="" || city=="" || contactperson=="" || contactno=="" || email=="" || activedetachmentpost=="") return false;

	        if($('#contactno').val().length<13){
              document.getElementById("add-contactno").innerHTML = "Mobile number must be 11 digit.";
              $('#contactno').addClass('is-invalid');
              event.preventDefault();
              return false;
            }else{
              document.getElementById("add-contactno").innerHTML = "";
              $('#contactno').removeClass('is-invalid');
              $('#contactno').addClass('is-valid');
            }

	        $('#add_client').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_client').show();

		});

 		$('.update').unbind('click').bind('click', function(){
 			var IDArray 	= ['#editcontactno'];
			var ErrorIDArray = ['edit-contactno'];
			var firstRequired = "";
			var id = $(this).attr('id');
	        var clientname = $('#editclientname').val().trim();
	        var description = $('#editdescription').val().trim();
	        var housenumber = $('#edithousenumber').val().trim();
	        var streetname = $('#editstreetname').val().trim();
	        var barangay = $('#editbarangay').val().trim();
	        var city = $('#editcity').val().trim();
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
	        }

	        if(streetname==""){
	        	document.getElementById("edit-streetname").innerHTML = "Please provide a streetname.";
	        	$('#editstreetname').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-streetname").innerHTML = "";
	        	$('#editstreetname').removeClass('is-invalid');
	        	$('#editstreetname').addClass('is-valid');
	        }

	        if(barangay==""){
	        	document.getElementById("edit-barangay").innerHTML = "Please provide a barangay.";
	        	$('#editbarangay').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-barangay").innerHTML = "";
	        	$('#editbarangay').removeClass('is-invalid');
	        	$('#editbarangay').addClass('is-valid');
	        }

	        if(city==""){
	        	document.getElementById("edit-city").innerHTML = "Please provide a city.";
	        	$('#editcity').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-city").innerHTML = "";
	        	$('#editcity').removeClass('is-invalid');
	        	$('#editcity').addClass('is-valid');
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

	        if(activedetachmentpost==""){
	        	document.getElementById("edit-activedetachmentpost").innerHTML = "Please provide a number of post.";
	        	$('#editactivedetachmentpost').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-activedetachmentpost").innerHTML = "";
	        	$('#editactivedetachmentpost').removeClass('is-invalid');
	        	$('#editactivedetachmentpost').addClass('is-valid');
	        }

	        if(email==""){
	        	document.getElementById("edit-email").innerHTML = "Please provide an email.";
	        	$('#editemail').addClass('is-invalid');
                event.preventDefault();
	        }else if(!validateEmail(email)){
        		document.getElementById("edit-email").innerHTML = "Enter a valid email address.";
	        	$('#editemail').addClass('is-invalid');
	        	event.preventDefault();
	        	return false;
        	}else{
	        	document.getElementById("edit-email").innerHTML = "";
	        	$('#editemail').removeClass('is-invalid');
	        	$('#editemail').addClass('is-valid');
	        }

	        if(clientname=="" || streetname=="" || barangay=="" || city=="" || contactperson=="" || contactno=="" || email=="" || activedetachmentpost=="") return false;

	        if($('#editcontactno').val().length<13){
              document.getElementById("edit-contactno").innerHTML = "Mobile number must be 11 digit.";
              $('#editcontactno').addClass('is-invalid');
              event.preventDefault();
              return false;
            }else{
              document.getElementById("edit-contactno").innerHTML = "";
              $('#editcontactno').removeClass('is-invalid');
              $('#editcontactno').addClass('is-valid');
            }

	        $('#edit_client').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_client').show();

		});

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
            var changestatus = $("#changestatus").val();
            var id = $(this).attr('id');
            var confirmPassword = $('#statusPassword').val().trim();

            if(confirmPassword==""){
              $('#statusPassword').focus();
              return false;
            }else{
              $.ajax({
                        url : "<?php echo site_url('Checkpassword/validate');?>",
                        method : "POST",
                        data : {confirmPassword:confirmPassword},
                        dataType : 'json',
                        success: function(data){
                          if(data=="true"){
                              $.ajax({
                                    url : "<?php echo site_url('Clients/changestatus');?>",
                                    method : "POST",
                                    data : {id:id,
                                        changestatus:changestatus},
                                    async : true,
                                    dataType : 'json',
                                    success: function(data){

                                      window.location.replace('<?php echo base_url(); ?>Clients');
                                    },
                                    error: function(request, textStatus, error) {

                                  }
                                });
                                return false;
                          }else{
                      document.getElementById("status-password").innerHTML = "Incorrect Password.";
                      $('#statusPassword').addClass('is-invalid');
                      $('#statusPassword').focus();
                    }
                  },
                  error: function(request, textStatus, error) {
                    return false;
                }
              });
              return false
            }
        });

        $('.add').unbind('click').bind('click', function(){
			var clientname = $('#clientname').val().trim();
	        var description = $('#description').val().trim();
	        var housenumber = $('#housenumber').val().trim();
	        var streetname = $('#streetname').val().trim();
	        var barangay = $('#barangay').val().trim();
	        var city = $('#city').val().trim();
	        var contactperson = $('#contactperson').val().trim();
	        var contactno = $('#contactno').val().trim();
	        var email = $('#email').val().trim();
	        var activedetachmentpost = $('#activedetachmentpost').val().trim();
	        var confirmPassword = $('#addPassword').val().trim();

	        if(confirmPassword==""){
				$('#addPassword').focus();
				return false;
			}else{
				$.ajax({
	                url : "<?php echo site_url('Checkpassword/validate');?>",
	                method : "POST",
	                data : {confirmPassword:confirmPassword},
	                dataType : 'json',
	                success: function(data){
	                	if(data=="true"){
				        	$.ajax({
					                url : "<?php echo site_url('clients/save');?>",
					                method : "POST",
					                data : {clientname:clientname,
					                		description:description,
					                		housenumber:housenumber,
					                		streetname:streetname,
					                		barangay:barangay,
					                		city:city,
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
											$('#confirmation_add').modal('hide');
								        	$('#add_client').show();
								        	$("#clientname").focus(); 
				            			}else{
				        					window.location.replace('<?php echo base_url(); ?>Clients');
				            			}
					                },
					                error: function(request, textStatus, error) {

					            	}
					            });
					            return false;
					        }else{
	                		document.getElementById("add-password").innerHTML = "Incorrect Password.";
	                		$('#addPassword').addClass('is-invalid');
	                		$('#addPassword').focus();
	                	}
	                },
	                error: function(request, textStatus, error) {
	                	return false;
	            	}
	            });
	            return false
			}
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var clientname = $('#editclientname').val().trim();
	        var description = $('#editdescription').val().trim();
	        var housenumber = $('#edithousenumber').val().trim();
	        var streetname = $('#editstreetname').val().trim();
	        var barangay = $('#editbarangay').val().trim();
	        var city = $('#editcity').val().trim();
	        var contactperson = $('#editcontactperson').val().trim();
	        var contactno = $('#editcontactno').val().trim();
	        var email = $('#editemail').val().trim();
	        var activedetachmentpost = $('#editactivedetachmentpost').val().trim();
	        var confirmPassword = $('#editPassword').val().trim();

	        if(confirmPassword==""){
				$('#editPassword').focus();
				return false;
			}else{
				$.ajax({
	                url : "<?php echo site_url('Checkpassword/validate');?>",
	                method : "POST",
	                data : {confirmPassword:confirmPassword},
	                dataType : 'json',
	                success: function(data){
	                	if(data=="true"){
				        	$.ajax({
					                url : "<?php echo site_url('clients/update');?>",
					                method : "POST",
					                data : {id:id,
					                		clientname:clientname,
					                		description:description,
					                		housenumber:housenumber,
					                		streetname:streetname,
					                		barangay:barangay,
					                		city:city,
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
											$('#confirmation_edit').modal('hide');
								        	$('#edit_client').show();
								        	$("#editclientname").focus(); 
				            			}else{
				        					window.location.replace('<?php echo base_url(); ?>Clients');
				            			}
					                },
					                error: function(request, textStatus, error) {

					            	}
					            });
					            return false;
					        }else{
	                		document.getElementById("edit-password").innerHTML = "Incorrect Password.";
	                		$('#editPassword').addClass('is-invalid');
	                		$('#editPassword').focus();
	                	}
	                },
	                error: function(request, textStatus, error) {
	                	return false;
	            	}
	            });
	            return false
            }
        });


	    function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}
	});
</script>