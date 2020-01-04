<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">SSS Table</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">SSS Table</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_sss" id="addsss" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add SSS Range</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 50px;">ID No.</th>
								<th class="text-right">Minimum Range</th>
								<th class="text-right">Maximum Range</th>
								<th class="text-right">Employer Contribution</th>
								<th class="text-right">Employee Contribution</th>
								<th class="text-right">Total</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->sssID; ?></td>
									<td class="text-right"><?php echo $item->belowrange; ?></td>
									<td class="text-right"><?php echo $item->aboverange; ?></td>
									<td class="text-right"><?php echo $item->employer; ?></td>
									<td class="text-right"><?php echo $item->employee; ?></td>
									<td class="text-right"><?php echo $item->total; ?></td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->sssID; ?>" class="btn btn-info btn-sm editsss"
												data-toggle="modal"
												data-target="#edit_sss" 
												data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
												data-id="<?php echo $item->sssID; ?>"
												data-belowrange="<?php echo $item->belowrange; ?>"
												data-aboverange="<?php echo $item->aboverange; ?>"
												data-employer="<?php echo $item->employer; ?>"
												data-employee="<?php echo $item->employee; ?>"
												data-total="<?php echo $item->total; ?>"
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
	<div id="add_sss" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add SSS Range</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="test">
						<div class="form-group">
                            <label>Minimum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="belowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description=" below range" required>
                              <div class="invalid-feedback" id="add-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maximum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="aboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n above range" required>
                              <div class="invalid-feedback" id="add-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Employer Contribution <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="employer" class="form-control input sum" data-inputmask="'alias': 'currency'" autocomplete="off" description="n employer contribution" required>
                              <div class="invalid-feedback" id="add-employer"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Employee Contribution <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="employee" class="form-control input sum" data-inputmask="'alias': 'currency'" autocomplete="off" description="n employee contribution" required>
                              <div class="invalid-feedback" id="add-employee"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="total" class="form-control input total" data-inputmask="'alias': 'currency'" autocomplete="off" description=" total" readonly="true" required>
                              <div class="invalid-feedback" id="add-total"></div>
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
	<div id="edit_sss" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit SSS Ramge</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
                            <label>Minimum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editbelowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description=" below range" required>
                              <div class="invalid-feedback" id="edit-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maximum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editaboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n above range" required>
                              <div class="invalid-feedback" id="edit-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Employer Contribution <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editemployer" class="form-control input sum" data-inputmask="'alias': 'currency'" autocomplete="off" description="n employer contribution" required>
                              <div class="invalid-feedback" id="edit-employer"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Employee Contribution <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editemployee" class="form-control input sum" data-inputmask="'alias': 'currency'" autocomplete="off" description="n employee contribution" required>
                              <div class="invalid-feedback" id="edit-employee"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Total <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="edittotal" class="form-control input total" data-inputmask="'alias': 'currency'" autocomplete="off" description=" total" readonly="true" required>
                              <div class="invalid-feedback" id="edit-total"></div>
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
		$('#add_sss').on('shown.bs.modal', function(){
	   		$("#belowrange").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_sss').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-belowrange").innerHTML = "";
        	$('#belowrange').removeClass('is-invalid');
        	$('#belowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-aboverange").innerHTML = "";
        	$('#aboverange').removeClass('is-invalid');
        	$('#aboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-employer").innerHTML = "";
        	$('#employer').removeClass('is-invalid');
        	$('#employer').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-employee").innerHTML = "";
        	$('#employee').removeClass('is-invalid');
        	$('#employee').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-total").innerHTML = "";
        	$('#total').removeClass('is-invalid');
        	$('#total').removeClass('is-valid');
		});

		$('#edit_sss').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-belowrange").innerHTML = "";
        	$('#editbelowrange').removeClass('is-invalid');
        	$('#editbelowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-aboverange").innerHTML = "";
        	$('#editaboverange').removeClass('is-invalid');
        	$('#editaboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-employer").innerHTML = "";
        	$('#editemployer').removeClass('is-invalid');
        	$('#editemployer').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-employee").innerHTML = "";
        	$('#editemployee').removeClass('is-invalid');
        	$('#editemployee').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-total").innerHTML = "";
        	$('#edittotal').removeClass('is-invalid');
        	$('#edittotal').removeClass('is-valid');
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editsss').unbind('click').bind('click', function(){
			$(".modal-body #editbelowrange").val( $(this).data('belowrange') );
			$(".modal-body #editaboverange").val( $(this).data('aboverange') );
            $(".modal-body #editemployer").val( $(this).data('employer') );
            $(".modal-body #editemployee").val( $(this).data('employee') );
            $(".modal-body #edittotal").val( $(this).data('total') );
			$('.edit').attr('id', $(this).data('id'));
		});

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var belowrange = $('#belowrange').val().trim();
	        var aboverange = $('#aboverange').val().trim();
	        var employer = $('#employer').val().trim();
	        var employee = $('#employee').val().trim();
	        var total = $('#total').val().trim();

	        if(belowrange==""){
	        	document.getElementById("add-belowrange").innerHTML = "Please provide a below range.";
	        	$('#belowrange').addClass('is-invalid');
	        	$("#belowrange").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-belowrange").innerHTML = "";
	        	$('#belowrange').removeClass('is-invalid');
	        	$('#belowrange').addClass('is-valid');
	        	$("#belowrange").focus();
	        }

	        if(aboverange=="" || aboverange=="0.0000"){
	        	document.getElementById("add-aboverange").innerHTML = "Please provide an above range.";
	        	$('#aboverange').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-aboverange").innerHTML = "";
	        	$('#aboverange').removeClass('is-invalid');
	        	$('#aboverange').addClass('is-valid');
	        }

	        if(employer=="" || employer=="0.0000"){
	        	document.getElementById("add-employer").innerHTML = "Please provide an employer contribution.";
	        	$('#employer').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-employer").innerHTML = "";
	        	$('#employer').removeClass('is-invalid');
	        	$('#employer').addClass('is-valid');
	        }

	        if(employee=="" || employee=="0.0000"){
	        	document.getElementById("add-employee").innerHTML = "Please provide an employee contribution.";
	        	$('#employee').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-employee").innerHTML = "";
	        	$('#employee').removeClass('is-invalid');
	        	$('#employee').addClass('is-valid');
	        }

	        if(total=="" || total=="0.0000"){
	        	document.getElementById("add-total").innerHTML = "Please provide a total.";
	        	$('#total').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-total").innerHTML = "";
	        	$('#total').removeClass('is-invalid');
	        	$('#total').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || employer=="" || employer=="0.0000" || employee=="" || employee=="0.0000" || total=="" || total=="0.0000" ) return false;

	        $('#add_sss').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_sss').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var belowrange = $('#editbelowrange').val().trim();
	        var aboverange = $('#editaboverange').val().trim();
	        var employer = $('#editemployer').val().trim();
	        var employee = $('#editemployee').val().trim();
	        var total = $('#edittotal').val().trim();

	        if(belowrange==""){
	        	document.getElementById("edit-belowrange").innerHTML = "Please provide a percent.";
	        	$('#editbelowrange').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-belowrange").innerHTML = "";
	        	$('#editbelowrange').removeClass('is-invalid');
	        	$('#editbelowrange').addClass('is-valid');
	        }

	        if(aboverange=="" || aboverange=="0.0000"){
	        	document.getElementById("edit-aboverange").innerHTML = "Please provide an above range.";
	        	$('#editaboverange').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-aboverange").innerHTML = "";
	        	$('#editaboverange').removeClass('is-invalid');
	        	$('#editaboverange').addClass('is-valid');
	        }

	        if(employer=="" || employer=="0.0000"){
	        	document.getElementById("edit-employer").innerHTML = "Please provide an employer contribution.";
	        	$('#editemployer').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-employer").innerHTML = "";
	        	$('#editemployer').removeClass('is-invalid');
	        	$('#editemployer').addClass('is-valid');
	        }

	        if(employee=="" || employee=="0.0000"){
	        	document.getElementById("edit-employee").innerHTML = "Please provide an employee contribution.";
	        	$('#editemployee').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-employee").innerHTML = "";
	        	$('#editemployee').removeClass('is-invalid');
	        	$('#editemployee').addClass('is-valid');
	        }

	        if(total=="" || total=="0.0000"){
	        	document.getElementById("edit-total").innerHTML = "Please provide a total.";
	        	$('#edittotal').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-total").innerHTML = "";
	        	$('#edittotal').removeClass('is-invalid');
	        	$('#edittotal').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || employer=="" || employer=="0.0000" || employee=="" || employee=="0.0000" || total=="" || total=="0.0000" ) return false;

	        $('#edit_sss').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_sss').show();

		});

		$('.add').unbind('click').bind('click', function(){
			var belowrange = $('#belowrange').val().trim();
	        var aboverange = $('#aboverange').val().trim();
	        var employer = $('#employer').val().trim();
	        var employee = $('#employee').val().trim();
	        var total = $('#total').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('SSStable/save');?>",
	                method : "POST",
	                data : {belowrange:belowrange,
	                		aboverange:aboverange,
	                		employer:employer,
	                		employee:employee,
	                		total:total
	                		},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-belowrange").innerHTML = result[1];
				        	$('#belowrange').addClass('is-invalid');
				        	$('#aboverange').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_sss').show();
				        	$("#belowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>SSStable');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var belowrange = $('#editbelowrange').val().trim();
	        var aboverange = $('#editaboverange').val().trim();
	        var employer = $('#editemployer').val().trim();
	        var employee = $('#editemployee').val().trim();
	        var total = $('#edittotal').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('SSStable/update');?>",
	                method : "POST",
	                data : {id:id,
	                		belowrange:belowrange,
	                		aboverange:aboverange,
	                		employer:employer,
	                		employee:employee,
	                		total:total
	                	},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-belowrange").innerHTML = result[1];
				        	$('#editbelowrange').addClass('is-invalid');
				        	$('#editaboverange').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_sss').show();
				        	$("#editbelowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>SSStable');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.form-group').on('input', '.sum', function(){
        	var totalSum = 0;
        	$('.form-group .sum').each(function(){
        		var inputVal = $(this).val();
        		if ($.isNumeric(inputVal)) {
        			totalSum += parseFloat(inputVal);
        		}
        	});
        	$('#total')
        });

        $('.sum').keyup(function () {
		    var sum = 0;
		    $('.sum').each(function() {
		        sum += Number($(this).val().replace(",",""));
		    });
		    $('.total').val(sum);
		});

		

	});
</script>

