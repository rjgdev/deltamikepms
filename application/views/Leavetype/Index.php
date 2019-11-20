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
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Leave Type</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leavetype" id="addleavetype"><i class="fa fa-plus"></i> Add Leave Type</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-id">
					<label class="focus-label">Leave type ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating" id="search-description">
					<label class="focus-label">Leave Type</label>
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
								<th>Leave Type</th>
								<th>Leave Days</th>
								<th>Accumulation</th>
								<th>Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->leavetypeID; ?></td>
									<td><?php echo $item->leavetypename; ?></td>
									<td><?php echo $item->noofdays; ?></td>
									<td><?php echo $item->accumulation; ?></td>
									<td>
										<div class="dropdown action-label">
											<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
												<?php if($item->leavetypestatus=="Active") 
														   echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
													  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Inactive';
											    ?>
											</a>
											<div class="dropdown-menu">
												<?php if($item->leavetypestatus=='Active'){ ?>
													<a class="dropdown-item inactive" href="#" data-toggle="modal" data-target="#status_leavetype" data-id="<?php echo $item->leavetypeID; ?>" data-status="Inactive" data-leavetypename="<?php echo $item->leavetypename; ?>"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
												<?php }else{ ?>
													<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_leavetype" data-id="<?php echo $item->leavetypeID; ?>" data-status="Active" data-leavetypename="<?php echo $item->leavetypename; ?>"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
												<?php } ?>
											</div>
										</div>
									</td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->leavetypeID; ?>" class="btn btn-info btn-sm editleavetype"
												data-toggle="modal"
												data-target="#edit_leavetype" 
												data-id="<?php echo $item->leavetypeID; ?>"
												data-leavetypename="<?php echo $item->leavetypename; ?>"
												data-noofdays="<?php echo $item->noofdays; ?>"
												data-accumulation="<?php echo $item->accumulation; ?>"
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
							<input class="form-control" type="text" id="leavetypename">
							<div class="invalid-feedback" id="add-leavetypename"></div>
						</div>
						<div class="form-group">
							<label>Number of days <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="noofdays">
							<div class="invalid-feedback" id="add-noofdays"></div>
						</div>
						<div class="form-group">
							<label>Accumulation <span class="text-danger">*</span></label>
							<select class="custom-select" id="accumulation" required="">
								<option value="">Is it accumulated yearly?</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
							<div class="invalid-feedback" id="add-accumulation"></div>
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
							<input class="form-control" type="text" id="editleavetypename">
							<div class="invalid-feedback" id="edit-leavetypename"></div>
						</div>
						<div class="form-group">
							<label>Number of days <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editnoofdays">
							<div class="invalid-feedback" id="edit-noofdays"></div>
						</div>
						<div class="form-group">
							<label>Accumulation <span class="text-danger">*</span></label>
							<select class="custom-select" id="editaccumulation" required="">
								<option value="">Is it accumulated yearly?</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
							</select>
							<div class="invalid-feedback" id="edit-accumulation"></div>
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
        	$(this).find('form')[0].reset();
		    document.getElementById("add-noofdays").innerHTML = "";
        	$('#noofdays').removeClass('is-invalid');
        	$('#noofdays').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-accumulation").innerHTML = "";
        	$('#accumulation').removeClass('is-invalid');
        	$('#accumulation').removeClass('is-valid');
		});

		$('#edit_leavetype').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-leavetypename").innerHTML = "";
        	$('#editleavetypename').removeClass('is-invalid');
        	$('#editleavetypename').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-noofdays").innerHTML = "";
        	$('#editnoofdays').removeClass('is-invalid');
        	$('#editnoofdays').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-accumulation").innerHTML = "";
        	$('#editaccumulation').removeClass('is-invalid');
        	$('#editaccumulation').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_leavetype').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editleavetype').unbind('click').bind('click', function(){
			$(".modal-body #editleavetypename").val( $(this).data('leavetypename') );
			$(".modal-body #editnoofdays").val( $(this).data('noofdays') );
			$(".modal-body #editaccumulation").find( $(this).data('accumulation') ).text();
            $(".modal-body #editaccumulation").val( $(this).data('accumulation') );
			$('.update').attr('id', $(this).data('id'));
		});

	    /* ACTIVATE */
		$('.activate').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('leavetypename', $(this).data('leavetypename'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='green'>activate</font> this record?";
		});

	    /* INACTIVE */
		$('.inactive').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('leavetypename', $(this).data('leavetypename'));
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
	        var leavetypename = $('#leavetypename').val().trim();
	        var noofdays = $('#noofdays').val().trim();
	        var accumulation = $('#accumulation').val().trim();

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

	        if(noofdays==""){
	        	document.getElementById("add-noofdays").innerHTML = "Please provide a number of days.";
	        	$('#noofdays').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-noofdays").innerHTML = "";
	        	$('#noofdays').removeClass('is-invalid');
	        	$('#noofdays').addClass('is-valid');
	        	$("#noofdays").focus();
	        }

	        if(accumulation==""){
	        	document.getElementById("add-accumulation").innerHTML = "Please provide an answer.";
	        	$('#accumulation').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-accumulation").innerHTML = "";
	        	$('#accumulation').removeClass('is-invalid');
	        	$('#accumulation').addClass('is-valid');
	        	$("#accumulation").focus();
	        }

	        if(leavetypename=="" || noofdays=="" || accumulation=="" ) return false;

	        	$.ajax({
	                url : "<?php echo site_url('leavetype/save');?>",
	                method : "POST",
	                data : {leavetypename:leavetypename,
	                		noofdays:noofdays,
	                		accumulation:accumulation
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-leavetypename").innerHTML = result[1];
				        	$('#leavetypename').addClass('is-invalid');
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

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var leavetypename = $('#editleavetypename').val().trim();
	        var noofdays = $('#editnoofdays').val().trim();
	        var accumulation = $('#editaccumulation').val().trim();

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

	        if(noofdays==""){
	        	document.getElementById("edit-noofdays").innerHTML = "Please provide a number of days.";
	        	$('#editnoofdays').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-noofdays").innerHTML = "";
	        	$('#editnoofdays').removeClass('is-invalid');
	        	$('#editnoofdays').addClass('is-valid');
	        }

	        if(accumulation==""){
	        	document.getElementById("edit-accumulation").innerHTML = "Please provide an answer.";
	        	$('#editaccumulation').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-accumulation").innerHTML = "";
	        	$('#editaccumulation').removeClass('is-invalid');
	        	$('#editaccumulation').addClass('is-valid');
	        }
	       
	        if(leavetypename=="" || noofdays=="" || accumulation=="" ) return false;

	        	$.ajax({
	                url : "<?php echo site_url('leavetype/update');?>",
	                method : "POST",
	                data : {id:id,
	                		leavetypename:leavetypename,
	                		noofdays:noofdays,
	                		accumulation:accumulation},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-leavetypename").innerHTML = result[1];
				        	$('#editleavetypename').addClass('is-invalid');
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
       
	});
</script>