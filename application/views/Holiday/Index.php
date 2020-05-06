<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Holidays</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Holidays</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<!-- <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday" id="addholiday" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Holiday</a> -->
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Holidays</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="min-width: 10px; width:10px;">#</th>
								<th style="min-width: 150px;">Holiday Name</th>
								<th style="min-width: 100px;">Holiday Date</th>
								<th style="min-width: 100px;">Type of Holiday</th>
								<th style="min-width: 50px; width:100px;" class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->holidayID; ?></td>
									<td><?php echo $item->holidayname; ?></td>
									<td><?php echo date("F d, Y",strtotime($item->holidaydate)) ?></td>
									<td><?php echo $item->holidaytype; ?></td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->holidayID; ?>" class="btn btn-info btn-sm editholiday"
												data-toggle="modal"
												data-target="#edit_holiday"
												data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false" 
												data-id="<?php echo $item->holidayID; ?>"
												data-holidayname="<?php echo $item->holidayname; ?>"
												data-holidaydate="<?php echo date('Y',strtotime($item->holidaydate)); ?>"
												data-holidaymonth="<?php echo date('m-d',strtotime($item->holidaydate)); ?>"
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
	<div id="add_holiday" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Holiday</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
							<label>Holiday Name <span class="text-danger">*</span></label>
							<input class="form-control restrictspecchar" type="text" id="holidayname">
							<div class="invalid-feedback" id="add-holidayname"></div>
						</div>
						<div class="form-group">
							<label class="col-form-label">Holiday Date <span class="text-danger">*</span></label>
							<input class="form-control" id="holidaydate" type="text">
							<div class="invalid-feedback" id="add-holidaydate"></div>
						</div>
						<div class="form-group">
							<label>Type of Holiday <span class="text-danger">*</span></label>
							<select class="custom-select" id="holidaytype" required="">
								<option value="">Select type of holiday</option>
								<option value="Regular Holiday">Regular Holiday</option>
								<option value="Special Holiday">Special Holiday</option>
								<option value="Double Holiday">Double Holiday</option>
							</select>
							<div class="invalid-feedback" id="add-holidaytype"></div>
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
	<div id="edit_holiday" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Holiday</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<!-- <div class="form-group"> -->
							<!-- <label>Holiday Name <span class="text-danger">*</span></label> -->
							<input class="form-control restrictspecchar" type="hidden" id="editholidayname">
							<div class="invalid-feedback" id="edit-holidayname"></div>
						<!-- </div> -->
						<div class="form-group">
							<label class="col-form-label">Holiday Year <span class="text-danger">*</span></label>
							<input class="form-control" id="editholidaydate" type="text">
							<div class="invalid-feedback" id="edit-holidaydate"></div>
						</div>
						<!-- <div class="form-group">
							<label>Type of Holiday <span class="text-danger">*</span></label>
							<select class="custom-select" id="editholidaytype" required="">
								<option value="">Select type of holiday</option>
								<option value="Regular Holiday">Regular Holiday</option>
								<option value="Special Holiday">Special Holiday</option>
								<option value="Double Holiday">Double Holiday</option>
							</select>
							<div class="invalid-feedback" id="edit-holidaytype"></div>
						</div> -->
						<div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Department Modal -->

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

<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
<!-- /Page Wrapper -->

<script>	
	$(document).ready(function() {
		$('#editholidaydate').datepicker({
		    format: "yyyy",
		    minViewMode: 2,
		    autoclose: true
		});	

		$('.select2').select2();

  		$('[data-tog="tooltip"]').tooltip();

  		/*********************** FOCUS AND CLEAR CONFIRMPASSWORD ***********************/
			$('#confirmation_edit').on('shown.bs.modal', function(){
		   		$("#editPassword").focus(); 
			});

			$('#confirmation_edit').on('hide.bs.modal', function(){
		   		document.getElementById("edit-password").innerHTML = "";
		   		$("#editPassword").val("");
	    		$('#editPassword').removeClass('is-invalid');
			});
		/*********************** END FOCUS AND CLEAR CONFIRMPASSWORD ***********************/

		/* FOCUS ON DESCRIPTION */
		$('#add_holiday').on('shown.bs.modal', function(){
	   		$("#holidayname").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_holiday').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-holidayname").innerHTML = "";
        	$('#holidayname').removeClass('is-invalid');
        	$('#holidayname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-holidaydate").innerHTML = "";
        	$('#holidaydate').removeClass('is-invalid');
        	$('#holidaydate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-holidaytype").innerHTML = "";
        	$('#holidaytype').removeClass('is-invalid');
        	$('#holidaytype').removeClass('is-valid');
		});

		$('#edit_holiday').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-holidayname").innerHTML = "";
        	$('#editholidayname').removeClass('is-invalid');
        	$('#editholidayname').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-holidaydate").innerHTML = "";
        	$('#editholidaydate').removeClass('is-invalid');
        	$('#editholidaydate').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-holidaytype").innerHTML = "";
        	$('#editholidaytype').removeClass('is-invalid');
        	$('#editholidaytype').removeClass('is-valid');
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editholiday').unbind('click').bind('click', function(){
			$(".modal-body #editholidayname").val( $(this).data('holidayname') );
			$(".modal-body #editholidaydate").val( $(this).data('holidaydate') );
			$(".modal-body .update").attr("holidaymonth",$(this).data('holidaymonth'));
			/*$(".modal-body #editholidaytype").find( $(this).data('holidaytype') ).text();
            $(".modal-body #editholidaytype").val( $(this).data('holidaytype') );*/
			$('.edit').attr('id', $(this).data('id'));
		});


		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var holidayname = $('#holidayname').val().trim();
	        var holidaydate = $('#holidaydate').val().trim();
	        var holidaytype = $('#holidaytype').val().trim();

	        /*$('#holidaydate').datepicker({ minDate: 0});*/

	        if(holidayname==""){
	        	document.getElementById("add-holidayname").innerHTML = "Please provide a holiday name.";
	        	$('#holidayname').addClass('is-invalid');
	        	$("#holidayname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-holidayname").innerHTML = "";
	        	$('#holidayname').removeClass('is-invalid');
	        	$('#holidayname').addClass('is-valid');
	        	$("#holidayname").focus();
	        }

	        if(holidaydate==""){
	        	document.getElementById("add-holidaydate").innerHTML = "Please provide a holiday date.";
	        	$('#holidaydate').addClass('is-invalid');

	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-holidaydate").innerHTML = "";
	        	$('#holidaydate').removeClass('is-invalid');
	        	$('#holidaydate').addClass('is-valid');
	        	$("#holidaydate").focus();
	        }

	        if(holidaytype==""){
	        	document.getElementById("add-holidaytype").innerHTML = "Please provide a type of holiday.";
	        	$('#holidaytype').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-holidaytype").innerHTML = "";
	        	$('#holidaytype').removeClass('is-invalid');
	        	$('#holidaytype').addClass('is-valid');
	        	$("#holidaytype").focus();
	        }

	        if(holidayname=="" || holidaydate=="" || holidaytype=="" ) return false;

	        $('#add_holiday').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_holiday').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var holidayname  = $('#editholidayname').val();
	        var holidaymonth = $(this).attr('holidaymonth');
	        var holidaydate  = $('#editholidaydate').val() + "-" + holidaymonth;
	        /*var holidaytype = $('#editholidaytype').val().trim();*/

	        if(holidayname==""){
	        	document.getElementById("edit-holidayname").innerHTML = "Please provide a holiday name.";
	        	$('#editholidayname').addClass('is-invalid');
	        	$("#editholidayname").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-holidayname").innerHTML = "";
	        	$('#editholidayname').removeClass('is-invalid');
	        	$('#editholidayname').addClass('is-valid');
	        	$("#editholidayname").focus();
	        }

	        if(holidaydate==""){
	        	document.getElementById("edit-holidaydate").innerHTML = "Please provide a holiday year.";
	        	$('#editholidaydate').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-holidaydate").innerHTML = "";
	        	$('#editholidaydate').removeClass('is-invalid');
	        	$('#editholidaydate').addClass('is-valid');
	        }

	        /*if(holidaytype==""){
	        	document.getElementById("edit-holidaytype").innerHTML = "Please provide a type of holiday.";
	        	$('#editholidaytype').addClass('is-invalid');
                event.preventDefault();
	        }else{
	        	document.getElementById("edit-holidaytype").innerHTML = "";
	        	$('#editholidaytype').removeClass('is-invalid');
	        	$('#editholidaytype').addClass('is-valid');
	        }*/

	        if(holidayname=="" || holidaydate=="" /*|| holidaytype==""*/ ) return false;

	        $('#edit_holiday').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_holiday').show();

		});

        $('.add').unbind('click').bind('click', function(){
			var holidayname = $('#holidayname').val().trim();
	        var holidaydate = $('#holidaydate').val().trim();
	        var holidaytype = $('#holidaytype').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('holidays/save');?>",
	                method : "POST",
	                data : {holidayname:holidayname,
	                		holidaydate:holidaydate,
	                		holidaytype:holidaytype
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-holidayname").innerHTML = result[1];
				        	$('#holidayname').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_holiday').show();
				        	$("#holidayname").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Holidays');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var holidayname = $('#editholidayname').val().trim();
	        var holidaymonth = $('.update').attr('holidaymonth');
	        var holidaydate  = $('#editholidaydate').val() + "-" + holidaymonth;
	        /*var holidaytype = $('#editholidaytype').val().trim();*/
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
					                url : "<?php echo site_url('holidays/update');?>",
					                method : "POST",
					                data : {id:id,
					                		holidayname:holidayname,
					                		holidaydate:holidaydate/*,
					                		holidaytype:holidaytype*/},
					                async : true,
					                dataType : 'json',
					                success: function(data){
					                	var result = data.split('|');
				            			if(result[0]=="false"){
											document.getElementById("edit-holidayname").innerHTML = result[1];
								        	$('#editholidayname').addClass('is-invalid');
											$('#confirmation_edit').modal('hide');
								        	$('#edit_holiday').show();
								        	$("#editholidayname").focus(); 
				            			}else{
				        					window.location.replace('<?php echo base_url(); ?>Holidays');
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