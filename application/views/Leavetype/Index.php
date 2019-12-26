<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Leave Type</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Leave Type</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leavetype" id="addleavetype" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Leave Type</a>
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
								<th style="width: 50px;">ID No.</th>
								<th>Leave Type</th>
								<th>Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->leavetypeID; ?></td>
									<td><?php echo $item->leavetypename; ?></td>
									<td >
										<div class="action-label">
											<a class="btn btn-white btn-sm btn-rounded action-status" href="#">
												<?php if($item->leavetypestatus=="Active") 
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
												<a class="dropdown-item editleavetype" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->leavetypeID; ?>" 
													data-toggle="modal" 
													data-target="#edit_leavetype" 
													data-leavetypename="<?php echo $item->leavetypename; ?>">
												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_leavetype" 
													data-id="<?php echo $item->leavetypeID; ?>" 
													data-status="<?php echo ($item->leavetypestatus=='Active') ? 'Inactive' : 'Active' ?>" 
													data-leavetypename="<?php echo $item->leavetypename; ?>">
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
	<div id="add_leavetype" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Leave Type</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Leave Type <span class="text-danger">*</span></label>
							<input class="form-control letterswithspace" type="text" id="leavetypename">
							<div class="invalid-feedback" id="add-leavetypename"></div>
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
	<div id="edit_leavetype" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Leave Type</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Leave Type <span class="text-danger">*</span></label>
							<input class="form-control letterswithspace" type="text" id="editleavetypename">
							<div class="invalid-feedback" id="edit-leavetypename"></div>
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
	<div class="modal custom-modal fade" id="status_leavetype" role="dialog">
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

	<!-- Confirmation Modal -->
	<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
							<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.png">
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
							<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.png">
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
		$('.select2').select2();

  		$('[data-tog="tooltip"]').tooltip();

		/* FOCUS ON DESCRIPTION */
		$('#add_leavetype').on('shown.bs.modal', function(){
	   		$("#leavetypename").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_leavetype').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-leavetypename").innerHTML = "";
        	$('#leavetypename').removeClass('is-invalid');
        	$('#leavetypename').removeClass('is-valid');
		});

		$('#edit_leavetype').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-leavetypename").innerHTML = "";
        	$('#editleavetypename').removeClass('is-invalid');
        	$('#editleavetypename').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_leavetype').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

		/* EDIT BUTTON - PASS DATA TO MODAL */
		$(document).on("click", ".editleavetype", function(){
			$(".modal-body #editleavetypename").val( $(this).data('leavetypename') );
			$('.edit').attr('id', $(this).attr('id'));
		});

	    /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('leavetypename', $(this).data('leavetypename'));
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
	        var leavetypename = $('#leavetypename').val().trim();

	        if(leavetypename==""){
	        	document.getElementById("add-leavetypename").innerHTML = "Please provide a leave type.";
	        	$('#leavetypename').addClass('is-invalid');
	        	$("#leavetypename").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-leavetypename").innerHTML = "";
	        	$('#leavetypename').removeClass('is-invalid');
	        	$('#leavetypename').addClass('is-valid');
	        	$("#leavetypename").focus();
	        }

	        if(leavetypename=="") return false;

	        $('#add_leavetype').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_leavetype').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var leavetypename = $('#editleavetypename').val().trim();

	        if(leavetypename==""){
	        	document.getElementById("edit-leavetypename").innerHTML = "Please provide a leave type.";
	        	$('#editleavetypename').addClass('is-invalid');
	        	$("#editleavetypename").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-leavetypename").innerHTML = "";
	        	$('#editleavetypename').removeClass('is-invalid');
	        	$('#editleavetypename').addClass('is-valid');
	        	$("#editleavetypename").focus();
	        }
	       
	        if(leavetypename=="") return false;

	        $('#edit_leavetype').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_leavetype').show();

		});

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var leavetypename = $(this).attr('leavetypename');

        	$.ajax({
                url : "<?php echo site_url('leavetype/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		leavetypename:leavetypename},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>leavetype');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

        $('.add').unbind('click').bind('click', function(){
			var leavetypename = $('#leavetypename').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('leavetype/save');?>",
	                method : "POST",
	                data : {leavetypename:leavetypename
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-leavetypename").innerHTML = result[1];
				        	$('#clientname').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_leavetype').show();
				        	$("#leavetypename").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>leavetype');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var leavetypename = $('#editleavetypename').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('leavetype/update');?>",
	                method : "POST",
	                data : {id:id,
	                		leavetypename:leavetypename},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-leavetypename").innerHTML = result[1];
				        	$('#editleavetypename').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_leavetype').show();
				        	$("#editleavetypename").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>leavetype');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });
       
	});
</script>