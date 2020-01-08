<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Tax Table</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Tax Table</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_tax" id="addtax" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Tax Range</a>
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
								<th class="text-right">Additional Tax</th>
								<th class="text-right">Percentage</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->taxID; ?></td>
									<td class="text-right"><?php echo number_format($item->belowrange,4,".",","); ?></td>
									<td class="text-right"><?php echo number_format($item->aboverange,4,".",","); ?></td>
									<td class="text-right"><?php echo number_format($item->additionaltax,4,".",","); ?></td>
									<td class="text-right"><?php echo number_format($item->percent,4,".",","); ?>%</td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->taxID; ?>" class="btn btn-info btn-sm edittax"
												data-toggle="modal"
												data-target="#edit_tax" 
												data-id="<?php echo $item->taxID; ?>"
												data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
												data-belowrange="<?php echo $item->belowrange; ?>"
												data-aboverange="<?php echo $item->aboverange; ?>"
												data-additionaltax="<?php echo $item->additionaltax; ?>"
												data-percent="<?php echo $item->percent; ?>"
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
	<div id="add_tax" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Tax Range</h5>
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
                              <input id="belowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="below range" required>
                              <div class="invalid-feedback" id="add-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maximum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="aboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="above range" required>
                              <div class="invalid-feedback" id="add-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Additional Tax <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="additionaltax" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="additional tax" required>
                              <div class="invalid-feedback" id="add-additionaltax"></div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Percentage <span class="text-danger">*</span></label>
							<input class="form-control percentage" type="text" id="percent">
							<div class="invalid-feedback" id="add-percent"></div>
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
	<div id="edit_tax" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Tax Range</h5>
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
                              <input id="editbelowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="below range" required>
                              <div class="invalid-feedback" id="edit-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Maximum Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editaboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="above range" required>
                              <div class="invalid-feedback" id="edit-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Additional Tax <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editadditionaltax" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="additional tax" required>
                              <div class="invalid-feedback" id="edit-additionaltax"></div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Percentage <span class="text-danger">*</span></label>
							<input class="form-control percentage" type="text" id="editpercent">
							<div class="invalid-feedback" id="edit-percent"></div>
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
		$('#add_tax').on('shown.bs.modal', function(){
	   		$("#belowrange").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_tax').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-belowrange").innerHTML = "";
        	$('#belowrange').removeClass('is-invalid');
        	$('#belowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-aboverange").innerHTML = "";
        	$('#aboverange').removeClass('is-invalid');
        	$('#aboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-additionaltax").innerHTML = "";
        	$('#additionaltax').removeClass('is-invalid');
        	$('#additionaltax').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-percent").innerHTML = "";
        	$('#percent').removeClass('is-invalid');
        	$('#percent').removeClass('is-valid');
		});

		$('#edit_tax').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-belowrange").innerHTML = "";
        	$('#editbelowrange').removeClass('is-invalid');
        	$('#editbelowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-aboverange").innerHTML = "";
        	$('#editaboverange').removeClass('is-invalid');
        	$('#editaboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-additionaltax").innerHTML = "";
        	$('#editadditionaltax').removeClass('is-invalid');
        	$('#editadditionaltax').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-percent").innerHTML = "";
        	$('#editpercent').removeClass('is-invalid');
        	$('#editpercent').removeClass('is-valid');
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.edittax').unbind('click').bind('click', function(){
			$(".modal-body #editbelowrange").val( $(this).data('belowrange') );
			$(".modal-body #editaboverange").val( $(this).data('aboverange') );
            $(".modal-body #editadditionaltax").val( $(this).data('additionaltax') );
            $(".modal-body #editpercent").val( $(this).data('percent') );
			$('.edit').attr('id', $(this).data('id'));
		});

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var belowrange = $('#belowrange').val().trim();
	        var aboverange = $('#aboverange').val().trim();
	        var additionaltax = $('#additionaltax').val().trim();
	        var percent = $('#percent').val().trim();

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

	        if(additionaltax==""){
	        	document.getElementById("add-additionaltax").innerHTML = "Please provide an additional tax.";
	        	$('#additionaltax').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-additionaltax").innerHTML = "";
	        	$('#additionaltax').removeClass('is-invalid');
	        	$('#additionaltax').addClass('is-valid');
	        }

	        if(percent==""){
	        	document.getElementById("add-percent").innerHTML = "Please provide a percent.";
	        	$('#percent').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-percent").innerHTML = "";
	        	$('#percent').removeClass('is-invalid');
	        	$('#percent').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || additionaltax=="" || percent=="" ) return false;

	        $('#add_tax').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_tax').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var belowrange = $('#editbelowrange').val().trim();
	        var aboverange = $('#editaboverange').val().trim();
	        var additionaltax = $('#editadditionaltax').val().trim();
	        var percent = $('#editpercent').val().trim();

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

	        if(additionaltax==""){
	        	document.getElementById("edit-additionaltax").innerHTML = "Please provide an additional tax.";
	        	$('#editadditionaltax').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-additionaltax").innerHTML = "";
	        	$('#editadditionaltax').removeClass('is-invalid');
	        	$('#editadditionaltax').addClass('is-valid');
	        }

	        if(percent==""){
	        	document.getElementById("edit-percent").innerHTML = "Please provide a percent.";
	        	$('#editpercent').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-percent").innerHTML = "";
	        	$('#editpercent').removeClass('is-invalid');
	        	$('#editpercent').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || additionaltax=="" || percent=="" ) return false;

	        $('#edit_tax').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_tax').show();

		});

        $('.add').unbind('click').bind('click', function(){
			var belowrange = $('#belowrange').val().trim().replace(",","");
	        var aboverange = $('#aboverange').val().trim().replace(",","");
	        var additionaltax = $('#additionaltax').val().trim().replace(",","");
	        var percent = $('#percent').val().trim().replace(",","");

        	$.ajax({
	                url : "<?php echo site_url('taxtable/save');?>",
	                method : "POST",
	                data : {belowrange:belowrange,
	                		aboverange:aboverange,
	                		additionaltax:additionaltax,
	                		percent:percent
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
				        	$('#add_tax').show();
				        	$("#belowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>taxtable');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var belowrange = $('#editbelowrange').val().trim().replace(",","");
	        var aboverange = $('#editaboverange').val().trim().replace(",","");
	        var additionaltax = $('#editadditionaltax').val().trim().replace(",","");
	        var percent = $('#editpercent').val().trim().replace(",","");

        	$.ajax({
	                url : "<?php echo site_url('taxtable/update');?>",
	                method : "POST",
	                data : {id:id,
	                		belowrange:belowrange,
	                		aboverange:aboverange,
	                		additionaltax:additionaltax,
	                		percent:percent},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-belowrange").innerHTML = result[1];
				        	$('#editbelowrange').addClass('is-invalid');
				        	$('#editaboverange').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_tax').show();
				        	$("#editbelowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>taxtable');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

	});
</script>