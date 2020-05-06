<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Posts</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Posts</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_detachment" id="adddetachment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Post</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Posts</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="min-width: 10px; width:10px;">#</th>
								<th style="min-width: 120px ! important;">Post Name</th>
								<th style="min-width: 120px ! important;">Location</th>
								<th style="min-width: 120px ! important;">Client Name</th>
								<th style="min-width: 150px ! important;">Detachment Commander</th>
								<th style="min-width: 70px ! important;">Start Date</th>
								<th style="min-width: 70px ! important;">End Date</th>
								<th style="min-width: 50px;">Status</th>
								<th style="min-width: 50px;" class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data['detachment'] as $item) { ?>    
								<tr>
									<td><?php echo $item->pstID; ?></td>
									<td>
										<div class="dash-card-content">  
											<p style="color: black;"> <?php echo $item->postname; ?> <span style="color:#888;display: block; font-size: 11px;"> Guards Assigned: <?php echo $item->noofguard; ?> </span></p> 	
										</div>
									</td>
									<td><?php echo $item->detachcity; ?></td>
									<td><?php echo $item->clientname; ?></td>
									<td><?php echo $item->lastname; ?>, <?php echo $item->firstname; ?> </td>
									<td><?php echo date("F d, Y",strtotime($item->startdate)) ?></td>
									<td><?php echo date("F d, Y",strtotime($item->enddate)) ?></td>
									<td >
										<div class="action-label">
												<?php if($item->poststatus=="Active") 
														   echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> Active</span>';
													  else echo '<span class="badge bg-inverse-danger custom-status"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</span>';
											    ?>
										</div>
									</td>

									<td class="text-right">
										<div class="dropdown dropdown-action">
											<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item editdetachment" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->pstID; ?>" 
													data-toggle="modal" 
													data-target="#edit_detachment" 
													data-postname="<?php echo $item->postname; ?>"
													data-housenumber="<?php echo $item->detachhousenumber; ?>"
													data-streetname="<?php echo $item->detachstreetname; ?>"
													data-barangay="<?php echo $item->detachbarangay; ?>"
													data-city="<?php echo $item->detachcity; ?>"
													data-client="<?php echo $item->clntID; ?>"
													data-commander="<?php echo $item->commander; ?>"
													data-startdate="<?php echo $item->startdate; ?>"
													data-enddate="<?php echo $item->enddate; ?>"
													data-noofguard="<?php echo $item->noofguard; ?>">

												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_detachment" 
													data-id="<?php echo $item->pstID; ?>" 
													data-status="<?php echo ($item->poststatus=='Active') ? 'Inactive' : 'Active' ?>" 
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

	<!-- Add Detachment Modal -->
	<div id="add_detachment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<form >
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Post Name <span class="text-danger">*</span></label>
									<input class="form-control restrictspecchar" type="text" id="postname">
									<div class="invalid-feedback" id="add-postname"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>Client <span class="text-danger">*</span></label>
									<select class="form-control select2" name="clientID" id="clientID" style="width:100%;" required="">
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
								<div class="form-group col-sm-6">
									<label>House No. </label>
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
									<label>Detachment Commander <span class="text-danger">*</span></label>
									<select class="form-control select2" name="commander" id="commander" style="width:100%;" required="">
										<option value="">Select Datachment Commander</option>
										<?php
										foreach($data['employee'] as $detachment)
										{
										echo '<option value="'.$detachment->employeeID.'">'.str_pad($detachment->employeeID, 6, "0", STR_PAD_LEFT).' - '.$detachment->lastname.', '.$detachment->firstname.' </option>';
										}
										?>  
									</select>
									<div class="invalid-feedback" id="add-commander"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>No. of Guards Assigned <span class="text-danger">*</span></label>
									<input class="form-control numbersonly" type="text" id="noofguard">
									<div class="invalid-feedback" id="add-noofguard"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>Start Date <span class="text-danger">*</span></label>
									<input class="form-control previousdate" id="startdate" type="text">
									<div class="invalid-feedback" id="add-startdate"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>End Date <span class="text-danger">*</span></label>
									<input class="form-control previousdate" id="enddate" type="text">
									<div class="invalid-feedback" id="add-enddate"></div>
								</div>						
							</div>
						</form>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Detachment Modal -->
	
	<!-- Edit Department Modal -->
	<div id="edit_detachment" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Post</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<form>
							<div class="row">
								<div class="form-group col-sm-6">
									<label>Post Name <span class="text-danger">*</span></label>
									<input class="form-control restrictspecchar" type="text" id="editpostname">
									<div class="invalid-feedback" id="edit-postname"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>Client <span class="text-danger">*</span></label>
									<select class="form-control select2" name="clientID" id="editclientID" style="width:100%;" required="">
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
								<div class="form-group col-sm-6">
									<label>House No. </label>
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
									<label>Detachment Commander <span class="text-danger">*</span></label>
									<select class="form-control select2" name="commander" id="editcommander" style="width:100%;" required="">
												<option value="">Select Datachment Commander</option>
												<?php
												foreach($data['employee'] as $detachment)
												{
												echo '<option value="'.$detachment->employeeID.'">'.str_pad($detachment->employeeID, 6, "0", STR_PAD_LEFT).' - '.$detachment->lastname.', '.$detachment->firstname.' </option>';
												}
												?>  
									</select>
									<div class="invalid-feedback" id="edit-commander"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>No. of Guards Assigned <span class="text-danger">*</span></label>
									<input class="form-control numbersonly" type="text" id="editnoofguard">
									<div class="invalid-feedback" id="edit-noofguard"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>Start Date <span class="text-danger">*</span></label>
									<input class="form-control previousdate" id="editstartdate" type="text">
									<div class="invalid-feedback" id="edit-startdate"></div>
								</div>
								<div class="form-group col-sm-6">
									<label>End Date <span class="text-danger">*</span></label>
									<input class="form-control previousdate" id="editenddate" type="text">
									<div class="invalid-feedback" id="edit-enddate"></div>
								</div>
							</div>
						</form>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
						</div>
					</div>
					
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
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/change.svg">
						<h3>Change Status</h3>
						<p id="statusmessage"></p>
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
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to add this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
							<br> 
							 <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter an authorized password: <span class="badge bg-inverse-warning" style="font-size: 10px;font-weight: 500;"> Passwords are case sensitive</span></p> 
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
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to update this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
							<br> 
							 <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter an authorized password: <span class="badge bg-inverse-warning" style="font-size: 10px;font-weight: 500;"> Passwords are case sensitive</span></p> 
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

			$('#status_detachment').on('shown.bs.modal', function(){
		   		$("#statusPassword").focus(); 
			});

			$('#status_detachment').on('hide.bs.modal', function(){
		   		document.getElementById("status-password").innerHTML = "";
		   		$("#statusPassword").val("");
	    		$('#statusPassword').removeClass('is-invalid');
			});
		/*********************** END FOCUS AND CLEAR CONFIRMPASSWORD ***********************/

		/* FOCUS ON DESCRIPTION */
		$('#add_detachment').on('shown.bs.modal', function(){
	   		$("#postname").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_detachment').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".form-control").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

	         $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

         	 $(".invalid-feedback").each(function(){
                document.getElementById($(this).attr('id')).innerHTML = "";
         	 });
		});

		$('#edit_detachment').on('hidden.bs.modal', function(){
		    
		    $(this).find('form')[0].reset();
		    $(".form-control").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

	         $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

         	 $(".invalid-feedback").each(function(){
                document.getElementById($(this).attr('id')).innerHTML = "";
         	 });
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
			$(".modal-body #editclientID").trigger("change");
			$(".modal-body #editcommander").val( $(this).data('commander') );
			$(".modal-body #editcommander").trigger("change");
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
			var IDArray = ['#enddate', '#startdate'];
			var ErrorIDArray = ['add-enddate', 'add-startdate'];
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
	        var focus = "";

	        var arrtodate = startdate.replace("-","").replace("-","");
			var arrt1odate = enddate.replace("-","").replace("-","");

	        $(".form-control").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

	         $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

	         $(".invalid-feedback").each(function(){
                document.getElementById($(this).attr('id')).innerHTML = "";
         	 });

	        if(postname==""){
	        	document.getElementById("add-postname").innerHTML = "Please provide a post name.";
	        	$('#postname').addClass('is-invalid');
	        	focus = "#postname";
                event.preventDefault();
	        }else{
	        	$('#postname').addClass('is-valid');
	        }

	        if(clientID==""){
	        	document.getElementById("add-clientID").innerHTML = "Please provide a client.";
	        	$("[aria-labelledby='select2-clientID-container']").addClass('is-invalid');
	        	$('#clientID').addClass('is-invalid');
	        	if(focus=="") focus = "#clientID";
	        	event.preventDefault();
	        }else{
	        	$("[aria-labelledby='select2-clientID-container']").addClass('is-valid');
	        	$('#clientID').addClass('is-valid');
	        }

	        if(streetname==""){
	        	document.getElementById("add-streetname").innerHTML = "Please provide a streetname.";
	        	$('#streetname').addClass('is-invalid');
	        	if(focus=="") focus = "#streetname";
	        	event.preventDefault();
	        }else{
	        	$('#streetname').addClass('is-valid');
	        }

	        if(barangay==""){
	        	document.getElementById("add-barangay").innerHTML = "Please provide a barangay.";
	        	$('#barangay').addClass('is-invalid');
	        	if(focus=="") focus = "#barangay";
	        	event.preventDefault();
	        }else{
	        	$('#barangay').addClass('is-valid');
	        }

	        if(city==""){
	        	document.getElementById("add-city").innerHTML = "Please provide a city.";
	        	$('#city').addClass('is-invalid');
	        	if(focus=="") focus = "#city";
	        	event.preventDefault();
	        }else{
	        	$('#city').addClass('is-valid');
	        }

	        if(commander==""){
	        	document.getElementById("add-commander").innerHTML = "Please provide a detachment commander.";
	        	$("[aria-labelledby='select2-commander-container']").addClass('is-invalid');
	        	$('#commander').addClass('is-invalid');
	        	if(focus=="") focus = "#commander";
	        	event.preventDefault();
	        }else{
	        	$("[aria-labelledby='select2-commander-container']").addClass('is-valid');
	        	$('#commander').addClass('is-valid');
	        }

	        if(noofguard==""){
	        	document.getElementById("add-noofguard").innerHTML = "Please provide a number of guards assigned.";
	        	$('#noofguard').addClass('is-invalid');
	        	if(focus=="") focus = "#noofguard";
	        	event.preventDefault();
	        }else{
	        	$('#noofguard').addClass('is-valid');
	        }

	        if(startdate==""){
	        	document.getElementById("add-startdate").innerHTML = "Please provide a start date.";
	        	$('#startdate').addClass('is-invalid');
	        	if(focus=="") focus = "#startdate";
	        	event.preventDefault();
	        }else{
	        	$('#startdate').addClass('is-valid');
	        }

	        if(enddate==""){
	        	document.getElementById("add-enddate").innerHTML = "Please provide an end date.";
	        	$('#enddate').addClass('is-invalid');
	        	if(focus=="") focus = "#enddate";
	        	event.preventDefault();
	        }else{
	        	$('#enddate').addClass('is-valid');
	        }

	        $(focus).focus(); 

	        if(postname=="" || streetname=="" || barangay=="" || city=="" || clientID=="" || commander=="" || startdate=="" || enddate=="" || noofguard=="") return false;

	        	if(arrtodate > arrt1odate){	
					document.getElementById("add-enddate").innerHTML = "Invalid chosen date.";
					document.getElementById("add-startdate").innerHTML = "Invalid chosen date.";
					$(IDArray[0]).addClass('is-invalid');
					$(IDArray[1]).addClass('is-invalid');
					event.preventDefault();
					return false;
					
				}else{
					document.getElementById("add-enddate").innerHTML = "";
					document.getElementById("add-startdate").innerHTML = "";
					$(IDArray[0]).removeClass('is-invalid');
					$(IDArray[0]).addClass('is-valid');
					$(IDArray[1]).removeClass('is-invalid');
					$(IDArray[1]).addClass('is-valid');
					event.preventDefault();
				
				};

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
        					window.location.replace('<?php echo base_url(); ?>Detachments');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });*/

 		$('.update').unbind('click').bind('click', function(){
 			var IDArray = ['#editenddate', '#editstartdate'];
			var ErrorIDArray = ['edit-enddate', 'edit-startdate'];
			var id = $(this).attr('id');
	        var postname = $('#editpostname').val().trim();
	        var housenumber = $('#edithousenumber').val().trim();
	        var streetname = $('#editstreetname').val().trim();
	        var barangay = $('#editbarangay').val().trim();
	        var city = $('#editcity').val().trim();
	        var clientID = $('#editclientID').val();
	        var commander = $('#editcommander').val();
	        var startdate = $('#editstartdate').val().trim();
	        var enddate = $('#editenddate').val().trim();
	        var noofguard = $('#editnoofguard').val().trim();
	        var focus = "";

	        var arrtodate = startdate.replace("-","").replace("-","");
			var arrt1odate = enddate.replace("-","").replace("-","");

			if(arrtodate > arrt1odate){	
				document.getElementById("edit-enddate").innerHTML = "Invalid chosen date.";
				document.getElementById("edit-startdate").innerHTML = "Invalid chosen date.";
				$(IDArray[0]).addClass('is-invalid');
				$(IDArray[1]).addClass('is-invalid');
				event.preventDefault();
				return false;
				
				}else{
				document.getElementById("edit-enddate").innerHTML = "";
				$(IDArray[0]).removeClass('is-invalid');
				$(IDArray[0]).addClass('is-valid');
				$(IDArray[1]).removeClass('is-invalid');
				$(IDArray[1]).addClass('is-valid');
				event.preventDefault();
			
			};

	         $(".form-control").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

	         $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });

         	 $(".invalid-feedback").each(function(){
                document.getElementById($(this).attr('id')).innerHTML = "";
         	 });
         	 
	        if(postname==""){
	        	document.getElementById("edit-postname").innerHTML = "Please provide a post name.";
	        	$('#editpostname').addClass('is-invalid');
	        	focus = "#editpostname";
                event.preventDefault();
	        }else{
	        	$('#editpostname').addClass('is-valid');
	        }

	        if(clientID==""){
	        	document.getElementById("edit-clientID").innerHTML = "Please provide a client.";
	        	$("[aria-labelledby='select2-editclientID-container']").addClass('is-invalid');
	        	$('#editclientID').addClass('is-invalid');
	        	if(focus=="") focus = "#editclientID";
                event.preventDefault();
	        }else{
	        	$("[aria-labelledby='select2-editclientID-container']").addClass('is-valid');
	        	$('#editclientID').addClass('is-valid');
	        }

	        if(streetname==""){
	        	document.getElementById("edit-streetname").innerHTML = "Please provide a streetname.";
	        	$('#editstreetname').addClass('is-invalid');
	        	if(focus=="") focus = "#editstreetname";
                event.preventDefault();
	        }else{
	        	$('#editstreetname').addClass('is-valid');
	        }

	        if(barangay==""){
	        	document.getElementById("edit-barangay").innerHTML = "Please provide a barangay.";
	        	$('#editbarangay').addClass('is-invalid');
	        	if(focus=="") focus = "#editbarangay";
                event.preventDefault();
	        }else{
	        	$('#editbarangay').addClass('is-valid');
	        }

	        if(city==""){
	        	document.getElementById("edit-city").innerHTML = "Please provide a city.";
	        	$('#editcity').addClass('is-invalid');
	        	if(focus=="") focus = "#editcity";
                event.preventDefault();
	        }else{
	        	$('#editcity').addClass('is-valid');
	        }

	        if(commander==""){
	        	document.getElementById("edit-commander").innerHTML = "Please provide a detachment commander.";
	        	$("[aria-labelledby='select2-editcommander-container']").addClass('is-invalid');
	        	$('#editcommander').addClass('is-invalid');
	        	if(focus=="") focus = "#editcommander";
                event.preventDefault();
	        }else{
	        	$("[aria-labelledby='select2-editcommander-container']").addClass('is-valid');
	        	$('#editcommander').addClass('is-valid');
	        }

	        if(noofguard==""){
	        	document.getElementById("edit-noofguard").innerHTML = "Please provide a number of guards assigned.";
	        	$('#editnoofguard').addClass('is-invalid');
	        	if(focus=="") focus = "#editnoofguard";
                event.preventDefault();
	        }else{
	        	$('#editnoofguard').addClass('is-valid');
	        }

	        if(startdate==""){
	        	document.getElementById("edit-startdate").innerHTML = "Please provide a start date.";
	        	$('#editstartdate').addClass('is-invalid');
	        	if(focus=="") focus = "#editstartdate";
                event.preventDefault();
	        }else{
	        	$('#editstartdate').addClass('is-valid');
	        }

	        if(enddate==""){
	        	document.getElementById("edit-enddate").innerHTML = "Please provide an end date.";
	        	$('#editenddate').addClass('is-invalid');
	        	if(focus=="") focus = "#editenddate";
                event.preventDefault();
	        }else{
	        	$('#editenddate').addClass('is-valid');
	        }
	        
        		$(focus).focus(); 

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

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var postname = $(this).attr('postname');
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
				                url : "<?php echo site_url('posts/changestatus');?>",
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
				    					window.location.replace('<?php echo base_url(); ?>Posts');
				        			}
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
					                url : "<?php echo site_url('posts/save');?>",
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
				        					window.location.replace('<?php echo base_url(); ?>Posts');
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
					                url : "<?php echo site_url('posts/update');?>",
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
					                		noofguard:noofguard,
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
				        					window.location.replace('<?php echo base_url(); ?>Posts');
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
       
	});
</script>