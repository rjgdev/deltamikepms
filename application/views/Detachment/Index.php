<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Detachment Posts</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Detachment Posts</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_detachment" id="adddetachment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Detachment Post</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 30px;">#</th>
								<th style="width: 200px ! important;">Post Name</th>
								<th style="width: 200px ! important;">Location</th>
								<th style="width: 200px ! important;">Client Name</th>
								<th style="width: 200px ! important;">Detachment Commander</th>
								<th style="width: 100px ! important;">Start Date</th>
								<th style="width: 100px ! important;">End Date</th>
								<th style="width: 50px ! important;">No. of Guards Assigned</th>
								<th style="width: 50px ! important;">Status</th>
								<th style="width: 50px ! important;" class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data['detachment'] as $item) { ?>    
								<tr>
									<td><?php echo $item->detachmentID; ?></td>
									<td><?php echo $item->postname; ?></td>
									<td><?php echo $item->detachcity; ?></td>
									<td><?php echo $item->clientname; ?></td>
									<td><?php echo $item->commander; ?></td>
									<td><?php echo date("F d, Y",strtotime($item->startdate)) ?></td>
									<td><?php echo date("F d, Y",strtotime($item->enddate)) ?></td>
									<td><?php echo $item->noofguard; ?></td>
									<td >
										<div class="action-label">
											<a class="btn btn-white btn-sm btn-rounded action-status" href="#">
												<?php if($item->detachmentstatus=="Active") 
														   echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
													  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
											    ?>
											</a>
										</div>
									</td>

									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item editdetachment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->detachmentID; ?>" 
													data-toggle="modal" 
													data-target="#edit_detachment" 
													data-postname="<?php echo $item->postname; ?>"
													data-housenumber="<?php echo $item->detachhousenumber; ?>"
													data-streetname="<?php echo $item->detachstreetname; ?>"
													data-barangay="<?php echo $item->detachbarangay; ?>"
													data-city="<?php echo $item->detachcity; ?>"
													data-client="<?php echo $item->clientID; ?>"
													data-commander="<?php echo $item->commander; ?>"
													data-startdate="<?php echo $item->startdate; ?>"
													data-enddate="<?php echo $item->enddate; ?>"
													data-noofguard="<?php echo $item->noofguard; ?>">
												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_detachment" 
													data-id="<?php echo $item->detachmentID; ?>" 
													data-status="<?php echo ($item->detachmentstatus=='Active') ? 'Inactive' : 'Active' ?>" 
													data-postname="<?php echo $item->postname; ?>">
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
	<div id="add_detachment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Detachment Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Post Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="postname">
							<div class="invalid-feedback" id="add-postname"></div>
						</div>
						<div class="form-group">
							<label>House No. </label>
							<input class="form-control specchar" type="text" id="housenumber">
							<div class="invalid-feedback" id="add-housenumber"></div>
						</div>
						<div class="form-group">
							<label>Street Name <span class="text-danger">*</span></label>
							<input class="form-control specchar" type="text" id="streetname">
							<div class="invalid-feedback" id="add-streetname"></div>
						</div>
						<div class="form-group">
							<label>Barangay <span class="text-danger">*</span></label>
							<input class="form-control specchar" type="text" id="barangay">
							<div class="invalid-feedback" id="add-barangay"></div>
						</div>
						<div class="form-group">
							<label>City <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="city">
							<div class="invalid-feedback" id="add-city"></div>
						</div>
						<div class="form-group">
							<label>Client <span class="text-danger">*</span></label>
							<select class="custom-select" name="clientID" id="clientID" required="">
								<option value="">Select Client</option>
								<?php
								foreach($data['client'] as $detachment)
								{
								echo '<option value="'.$detachment->clientID.'">'.$detachment->clientname.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="add-clientID"></div>
						</div>
						<div class="form-group">
							<label>Detachment Commander <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="commander">
							<div class="invalid-feedback" id="add-commander"></div>
						</div>
						<div class="form-group">
							<label>Start Date <span class="text-danger">*</span></label>
							<input class="form-control" id="startdate" type="date" min="0000-01-01" max="9999-12-31">
							<div class="invalid-feedback" id="add-startdate"></div>
						</div>
						<div class="form-group">
							<label>End Date <span class="text-danger">*</span></label>
							<input class="form-control" id="enddate" type="date" min="0000-01-01" max="9999-12-31">
							<div class="invalid-feedback" id="add-enddate"></div>
						</div>
						<div class="form-group">
							<label>No. of Guards Assigned <span class="text-danger">*</span></label>
							<input class="form-control number" type="text" id="noofguard">
							<div class="invalid-feedback" id="add-noofguard"></div>
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
	<div id="edit_detachment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Detachment Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Post Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editpostname">
							<div class="invalid-feedback" id="edit-postname"></div>
						</div>
						<div class="form-group">
							<label>House No. </label>
							<input class="form-control specchar" type="text" id="edithousenumber">
							<div class="invalid-feedback" id="edit-housenumber"></div>
						</div>
						<div class="form-group">
							<label>Street Name <span class="text-danger">*</span></label>
							<input class="form-control specchar" type="text" id="editstreetname">
							<div class="invalid-feedback" id="edit-streetname"></div>
						</div>
						<div class="form-group">
							<label>Barangay <span class="text-danger">*</span></label>
							<input class="form-control specchar" type="text" id="editbarangay">
							<div class="invalid-feedback" id="edit-barangay"></div>
						</div>
						<div class="form-group">
							<label>City <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editcity">
							<div class="invalid-feedback" id="edit-city"></div>
						</div>
						<div class="form-group">
							<label>Client <span class="text-danger">*</span></label>
							<select class="custom-select" name="clientID" id="editclientID" required="">
								<option value="">Select Client</option>
								<?php
								foreach($data['client'] as $client)
								{
								echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="edit-clientID"></div>
						</div>
						<div class="form-group">
							<label>Detachment Commander <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editcommander">
							<div class="invalid-feedback" id="edit-commander"></div>
						</div>
						<div class="form-group">
							<label>Start Date <span class="text-danger">*</span></label>
							<input class="form-control" type="date" id="editstartdate" min="0000-01-01" max="9999-12-31">
							<div class="invalid-feedback" id="edit-startdate"></div>
						</div>
						<div class="form-group">
							<label>End Date <span class="text-danger">*</span></label>
							<input class="form-control" type="date" id="editenddate" min="0000-01-01" max="9999-12-31">
							<div class="invalid-feedback" id="edit-enddate"></div>
						</div>
						<div class="form-group">
							<label>No. of Guards Assigned <span class="text-danger">*</span></label>
							<input class="form-control number" type="text" id="editnoofguard">
							<div class="invalid-feedback" id="edit-noofguard"></div>
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
	<div class="modal custom-modal fade" id="status_detachment" role="dialog">
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

	<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to add this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn add" >Add</a>
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
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to update this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn edit" >Update</a>
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
		$('.select2').select2();

  		$('[data-tog="tooltip"]').tooltip();

		/* FOCUS ON DESCRIPTION */
		$('#add_detachment').on('shown.bs.modal', function(){
	   		$("#postname").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_detachment').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-postname").innerHTML = "";
        	$('#postname').removeClass('is-invalid');
        	$('#postname').removeClass('is-valid');
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
		    document.getElementById("add-clientID").innerHTML = "";
        	$('#clientID').removeClass('is-invalid');
        	$('#clientID').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-commander").innerHTML = "";
        	$('#commander').removeClass('is-invalid');
        	$('#commander').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-startdate").innerHTML = "";
        	$('#startdate').removeClass('is-invalid');
        	$('#startdate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-enddate").innerHTML = "";
        	$('#enddate').removeClass('is-invalid');
        	$('#enddate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-noofguard").innerHTML = "";
        	$('#noofguard').removeClass('is-invalid');
        	$('#noofguard').removeClass('is-valid');
		});

		$('#edit_detachment').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-postname").innerHTML = "";
        	$('#editpostname').removeClass('is-invalid');
        	$('#editpostname').removeClass('is-valid');
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
		    document.getElementById("edit-clientID").innerHTML = "";
        	$('#editclientID').removeClass('is-invalid');
        	$('#editclientID').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-commander").innerHTML = "";
        	$('#editcommander').removeClass('is-invalid');
        	$('#editcommander').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-startdate").innerHTML = "";
        	$('#editstartdate').removeClass('is-invalid');
        	$('#editstartdate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-enddate").innerHTML = "";
        	$('#editenddate').removeClass('is-invalid');
        	$('#editenddate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-noofguard").innerHTML = "";
        	$('#editnoofguard').removeClass('is-invalid');
        	$('#editnoofguard').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_detachment').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

		/* EDIT BUTTON - PASS DATA TO MODAL */

		$(document).on("click", ".editdetachment", function(){
			$(".modal-body #editpostname").val( $(this).data('postname') );
			$(".modal-body #edithousenumber").val( $(this).data('housenumber') );
			$(".modal-body #editstreetname").val( $(this).data('streetname') );
			$(".modal-body #editbarangay").val( $(this).data('barangay') );
			$(".modal-body #editcity").val( $(this).data('city') );
			$(".modal-body #editclientID").val( $(this).data('client') );
			$(".modal-body #editcommander").val( $(this).data('commander') );
			$(".modal-body #editstartdate").val( $(this).data('startdate') );
			$(".modal-body #editenddate").val( $(this).data('enddate') );
			$(".modal-body #editnoofguard").val( $(this).data('noofguard') );
			$('.edit').attr('id', $(this).attr('id'));
		});

	    /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('postname', $(this).data('postname'));
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
	        var postname = $('#postname').val().trim();
	        var housenumber = $('#housenumber').val().trim();
	        var streetname = $('#streetname').val().trim();
	        var barangay = $('#barangay').val().trim();
	        var city = $('#city').val().trim();
	        var clientID = $('#clientID').val().trim();
	        var commander = $('#commander').val().trim();
	        var startdate = $('#startdate').val().trim();
	        var enddate = $('#enddate').val().trim();
	        var noofguard = $('#noofguard').val().trim();

	        if(postname==""){
	        	document.getElementById("add-postname").innerHTML = "Please provide a post name.";
	        	$('#postname').addClass('is-invalid');
	        	$("#postname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-postname").innerHTML = "";
	        	$('#postname').removeClass('is-invalid');
	        	$('#postname').addClass('is-valid');
	        	$("#postname").focus();
	        }

	        if(streetname==""){
	        	document.getElementById("add-streetname").innerHTML = "Please provide a streetname.";
	        	$('#streetname').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-streetname").innerHTML = "";
	        	$('#streetname').removeClass('is-invalid');
	        	$('#streetname').addClass('is-valid');
	        	$("#streetname").focus();
	        }

	        if(barangay==""){
	        	document.getElementById("add-barangay").innerHTML = "Please provide a barangay.";
	        	$('#barangay').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-barangay").innerHTML = "";
	        	$('#barangay').removeClass('is-invalid');
	        	$('#barangay').addClass('is-valid');
	        	$("#barangay").focus();
	        }

	        if(city==""){
	        	document.getElementById("add-city").innerHTML = "Please provide a city.";
	        	$('#city').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-city").innerHTML = "";
	        	$('#city').removeClass('is-invalid');
	        	$('#city').addClass('is-valid');
	        	$("#city").focus();
	        }

	        if(clientID==""){
	        	document.getElementById("add-clientID").innerHTML = "Please provide a client name.";
	        	$('#clientID').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-clientID").innerHTML = "";
	        	$('#clientID').removeClass('is-invalid');
	        	$('#clientID').addClass('is-valid');
	        }

	        if(commander==""){
	        	document.getElementById("add-commander").innerHTML = "Please provide a detachment commander.";
	        	$('#commander').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-commander").innerHTML = "";
	        	$('#commander').removeClass('is-invalid');
	        	$('#commander').addClass('is-valid');
	        }

	        if(startdate==""){
	        	document.getElementById("add-startdate").innerHTML = "Please provide a start date.";
	        	$('#startdate').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-startdate").innerHTML = "";
	        	$('#startdate').removeClass('is-invalid');
	        	$('#startdate').addClass('is-valid');
	        }

	        if(enddate==""){
	        	document.getElementById("add-enddate").innerHTML = "Please provide an end date.";
	        	$('#enddate').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-enddate").innerHTML = "";
	        	$('#enddate').removeClass('is-invalid');
	        	$('#enddate').addClass('is-valid');
	        }

	        if(noofguard==""){
	        	document.getElementById("add-noofguard").innerHTML = "Please provide a number of guards assigned.";
	        	$('#noofguard').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-noofguard").innerHTML = "";
	        	$('#noofguard').removeClass('is-invalid');
	        	$('#noofguard').addClass('is-valid');
	        }

	        if(postname=="" || streetname=="" || barangay=="" || city=="" || clientID=="" || commander=="" || startdate=="" || enddate=="" || noofguard=="") return false;

	        $('#add_detachment').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_detachment').show();

		});

	        	/*$.ajax({
	                url : "<?php echo site_url('detachments/save');?>",
	                method : "POST",
	                data : {postname:postname,
	                		housenumber:housenumber,
	                		streetname:streetname,
	                		barangay:barangay,
	                		city:city,
	                		clientID:clientID,
	                		commander:commander,
	                		startdate:startdate,
	                		enddate:enddate,
	                		noofguard:noofguard
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-postname").innerHTML = result[1];
				        	$('#postname').addClass('is-invalid');
				        	$("#postname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>detachments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });*/

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var postname = $('#editpostname').val().trim();
	        var housenumber = $('#edithousenumber').val().trim();
	        var streetname = $('#editstreetname').val().trim();
	        var barangay = $('#editbarangay').val().trim();
	        var city = $('#editcity').val().trim();
	        var clientID = $('#editclientID').val().trim();
	        var commander = $('#editcommander').val().trim();
	        var startdate = $('#editstartdate').val().trim();
	        var enddate = $('#editenddate').val().trim();
	        var noofguard = $('#editnoofguard').val().trim();

	        if(postname==""){
	        	document.getElementById("edit-postname").innerHTML = "Please provide a designation name.";
	        	$('#editpostname').addClass('is-invalid');
	        	$("#editpostname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-postname").innerHTML = "";
	        	$('#editpostname').removeClass('is-invalid');
	        	$('#editpostname').addClass('is-valid');
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

	        if(clientID==""){
	        	document.getElementById("edit-clientID").innerHTML = "Please provide a department.";
	        	$('#editclientID').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-clientID").innerHTML = "";
	        	$('#editclientID').removeClass('is-invalid');
	        	$('#editclientID').addClass('is-valid');
	        }

	        if(commander==""){
	        	document.getElementById("edit-commander").innerHTML = "Please provide a department.";
	        	$('#editcommander').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-commander").innerHTML = "";
	        	$('#editcommander').removeClass('is-invalid');
	        	$('#editcommander').addClass('is-valid');
	        }

	        if(startdate==""){
	        	document.getElementById("edit-startdate").innerHTML = "Please provide a department.";
	        	$('#editstartdate').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-startdate").innerHTML = "";
	        	$('#editstartdate').removeClass('is-invalid');
	        	$('#editstartdate').addClass('is-valid');
	        }

	        if(enddate==""){
	        	document.getElementById("edit-enddate").innerHTML = "Please provide a department.";
	        	$('#editenddate').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-enddate").innerHTML = "";
	        	$('#editenddate').removeClass('is-invalid');
	        	$('#editenddate').addClass('is-valid');
	        }
	        if(noofguard==""){
	        	document.getElementById("edit-noofguard").innerHTML = "Please provide a department.";
	        	$('#editnoofguard').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-noofguard").innerHTML = "";
	        	$('#editnoofguard').removeClass('is-invalid');
	        	$('#editnoofguard').addClass('is-valid');
	        }

	        	if(postname=="" || streetname=="" || barangay=="" || city=="" || clientID=="" || commander=="" || startdate=="" || enddate=="" || noofguard=="") return false;

	        	$('#edit_detachment').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_detachment').show();

		});

	        	/*$.ajax({
	                url : "<?php echo site_url('detachments/update');?>",
	                method : "POST",
	                data : {id:id,
	                		postname:postname,
	                		housenumber:housenumber,
	                		streetname:streetname,
	                		barangay:barangay,
	                		city:city,
	                		clientID:clientID,
	                		commander:commander,
	                		startdate:startdate,
	                		enddate:enddate,
	                		noofguard:noofguard
	                	},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-postname").innerHTML = result[1];
				        	$('#editpostname').addClass('is-invalid');
				        	$("#editpostname").focus(); 
				        	$('#editclientID').addClass('is-invalid');
				        	$("#editclientID").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>detachments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        
        });*/

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var postname = $(this).attr('postname');

        	$.ajax({
                url : "<?php echo site_url('detachments/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		postname:postname},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>detachments');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

        $('.add').unbind('click').bind('click', function(){
			var postname = $('#postname').val().trim();
	        var housenumber = $('#housenumber').val().trim();
	        var streetname = $('#streetname').val().trim();
	        var barangay = $('#barangay').val().trim();
	        var city = $('#city').val().trim();
	        var clientID = $('#clientID').val().trim();
	        var commander = $('#commander').val().trim();
	        var startdate = $('#startdate').val().trim();
	        var enddate = $('#enddate').val().trim();
	        var noofguard = $('#noofguard').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('detachments/save');?>",
	                method : "POST",
	                data : {postname:postname,
	                		housenumber:housenumber,
	                		streetname:streetname,
	                		barangay:barangay,
	                		city:city,
	                		clientID:clientID,
	                		commander:commander,
	                		startdate:startdate,
	                		enddate:enddate,
	                		noofguard:noofguard
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-postname").innerHTML = result[1];
				        	$('#postname').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_designation').show();
				        	$("#postname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>detachments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var postname = $('#editpostname').val().trim();
	        var housenumber = $('#edithousenumber').val().trim();
	        var streetname = $('#editstreetname').val().trim();
	        var barangay = $('#editbarangay').val().trim();
	        var city = $('#editcity').val().trim();
	        var clientID = $('#editclientID').val().trim();
	        var commander = $('#editcommander').val().trim();
	        var startdate = $('#editstartdate').val().trim();
	        var enddate = $('#editenddate').val().trim();
	        var noofguard = $('#editnoofguard').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('detachments/update');?>",
	                method : "POST",
	                data : {id:id,
	                		postname:postname,
	                		housenumber:housenumber,
	                		streetname:streetname,
	                		barangay:barangay,
	                		city:city,
	                		clientID:clientID,
	                		commander:commander,
	                		startdate:startdate,
	                		enddate:enddate,
	                		noofguard:noofguard
	                	},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-postname").innerHTML = result[1];
				        	$('#editpostname').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_detachment').show();
				        	$("#editpostname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>detachments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });
       
	});
</script>