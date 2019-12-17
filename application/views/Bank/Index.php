<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Banks</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Banks</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_bank" id="addbank" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Bank</a>
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
								<th>Bank Name</th>
								<th>Status</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody id="show_data">
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->bankID; ?></td>
									<td><?php echo $item->bankname; ?></td>
									<td >
										<div class="action-label">
											<a class="btn btn-white btn-sm btn-rounded action-status" href="#">
												<?php if($item->bankstatus=="Active") 
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
												<a class="dropdown-item editbank" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													id="<?php echo $item->bankID; ?>" 
													data-toggle="modal" 
													data-target="#edit_bank" 
													data-bankname="<?php echo $item->bankname; ?>">
												<i class="fa fa-pencil m-r-5"></i> Edit</a>

												<a class="dropdown-item changestatus" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" href="#" 
													data-toggle="modal" 
													data-target="#status_bank" 
													data-id="<?php echo $item->bankID; ?>" 
													data-status="<?php echo ($item->bankstatus=='Active') ? 'Inactive' : 'Active' ?>" 
													data-bankname="<?php echo $item->bankname; ?>">
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
	<div id="add_bank" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Bank</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Bank Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="bankname">
							<div class="invalid-feedback" id="add-bankname"></div>
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
	<div id="edit_bank" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Bank</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Bank Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="editbankname">
							<div class="invalid-feedback" id="edit-bankname"></div>
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
	<div class="modal custom-modal fade" id="status_bank" role="dialog">
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

  		$('[data-tog="tooltip"]').tooltip();

		/* FOCUS ON DESCRIPTION */
		$('#add_bank').on('shown.bs.modal', function(){
	   		$("#bankname").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_bank').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-bankname").innerHTML = "";
        	$('#bankname').removeClass('is-invalid');
        	$('#bankname').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#edit_bank').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-bankname").innerHTML = "";
        	$('#editbankname').removeClass('is-invalid');
        	$('#editbankname').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#status_bank').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$(document).on("click", ".editbank", function(){
			$(".modal-body #editbankname").val( $(this).data('bankname'));
			$('.edit').attr('id', $(this).attr('id'));
		});

	    /* Change Status */
		$('.changestatus').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('bankname', $(this).data('bankname'));
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
	        var bankname = $('#bankname').val().trim();

	        if(bankname==""){
	        	document.getElementById("add-bankname").innerHTML = "Please provide a bank name.";
	        	$('#bankname').addClass('is-invalid');
	        	$("#bankname").focus(); 
                event.preventDefault();
	        }else{
	       		document.getElementById("add-bankname").innerHTML = "";
	        	$('#bankname').removeClass('is-invalid');
	        	$('#bankname').addClass('is-valid');
	        	$("#bankname").focus();
	        }

	        if(bankname=="" ) return false;

	        	$('#add_bank').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

        $("#cncl-add").unbind('click').bind('click', function(){

			$('#confirmation_add').modal('hide');
			$('#add_bank').show();
		});

        /* UPDATE DESCIPTION */
		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var bankname = $('#editbankname').val().trim();

	        if(bankname==""){
	        	document.getElementById("edit-bankname").innerHTML = "Please provide a bank name.";
	        	$('#editbankname').addClass('is-invalid');
	        	$("#editbankname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-bankname").innerHTML = "";
	        	$('#editbankname').removeClass('is-invalid');
	        	$('#editbankname').addClass('is-valid');
	        	$("#editbankname").focus();
	        }
	       
	        if(bankname=="" ) return false;

	        $('#edit_bank').hide();
			$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

    		event.preventDefault(); 
    		return false;
        });

        $("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_bank').show();

    	});

		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var bankname = $(this).attr('bankname');

        	$.ajax({
                url : "<?php echo site_url('banks/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status,
                		bankname:bankname},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
        				$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
    					window.location.replace('<?php echo base_url(); ?>banks');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

		$('.add').unbind('click').bind('click', function(){
			var bankname = $('#bankname').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('banks/save');?>",
	                method : "POST",
	                data : {bankname:bankname},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-bankname").innerHTML = result[1];
				        	$('#bankname').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_bank').show();
				        	$("#bankname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>banks');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var bankname = $('#editbankname').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('banks/update');?>",
	                method : "POST",
	                data : {id:id,
	                		bankname:bankname},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-bankname").innerHTML = result[1];
				        	$('#editbankname').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_department').show();
				        	$("#editbankname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>banks');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });
       
	});
</script>