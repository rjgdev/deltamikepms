<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">PhilHealth Table</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">PhilHealth Table</li>
					</ul>
				</div>
				<!-- <div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_philhealth" id="addphilhealth" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add PhilHealth Range</a>
				</div> -->
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of PhilHealth Range</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="width: 50px;">ID No.</th>
								<th class="text-right">Minimum Range</th>
								<th class="text-right">Maximum Range</th>
								<th class="text-right">Percentage</th>
								<!-- <th class="text-right">Action</th> -->
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->philhealthID; ?></td>
									<td class="text-right"><?php echo number_format($item->belowrange,4,".",","); ?></td>
									<td class="text-right"><?php echo number_format($item->aboverange,4,".",","); ?></td>
									<td class="text-right"><?php echo number_format($item->percent,2,".",","); ?>%</td>
									<!-- <td class="text-right">
										<button type="button" id="<?php echo $item->philhealthID; ?>" class="btn btn-info btn-sm editphilhealth"
												data-toggle="modal"
												data-target="#edit_philhealth" 
												data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
												data-id="<?php echo $item->philhealthID; ?>"
												data-belowrange="<?php echo $item->belowrange; ?>"
												data-aboverange="<?php echo $item->aboverange; ?>"
												data-percent="<?php echo $item->percent; ?>"
												data-tog="tooltip"
												data-placement="top"
												title="Edit"> <i class="fa fa-pencil"></i> </button>
									</td> -->
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
	<div id="add_philhealth" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add PhilHealth Range</h5>
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
							<label>Percentage <span class="text-danger">*</span></label>
							<input class="form-control percentage" type="text" id="percent" description=" percent">
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
	<div id="edit_philhealth" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit PhilHealth Range</h5>
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
		$('#add_philhealth').on('shown.bs.modal', function(){
	   		$("#belowrange").focus(); 
		});
		
		/* CLEAR MODAL */
		$('#add_philhealth').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-belowrange").innerHTML = "";
        	$('#belowrange').removeClass('is-invalid');
        	$('#belowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-aboverange").innerHTML = "";
        	$('#aboverange').removeClass('is-invalid');
        	$('#aboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("add-percent").innerHTML = "";
        	$('#percent').removeClass('is-invalid');
        	$('#percent').removeClass('is-valid');
		});

		$('#edit_philhealth').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-belowrange").innerHTML = "";
        	$('#editbelowrange').removeClass('is-invalid');
        	$('#editbelowrange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-aboverange").innerHTML = "";
        	$('#editaboverange').removeClass('is-invalid');
        	$('#editaboverange').removeClass('is-valid');
        	$(this).find('form')[0].reset();
		    document.getElementById("edit-percent").innerHTML = "";
        	$('#editpercent').removeClass('is-invalid');
        	$('#editpercent').removeClass('is-valid');
		});

	    /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.editphilhealth').unbind('click').bind('click', function(){
			$(".modal-body #editbelowrange").val( $(this).data('belowrange') );
			$(".modal-body #editaboverange").val( $(this).data('aboverange') );
			$(".modal-body #editpercent").val( $(this).data('percent') );
			$('.edit').attr('id', $(this).data('id'));
		});

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
	        var belowrange = $('#belowrange').val().trim();
	        var aboverange = $('#aboverange').val().trim();
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

	        if(percent==""){
	        	document.getElementById("add-percent").innerHTML = "Please provide a percent.";
	        	$('#percent').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("add-percent").innerHTML = "";
	        	$('#percent').removeClass('is-invalid');
	        	$('#percent').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || percent=="" ) return false;

	        	$('#add_philhealth').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

		$("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_philhealth').show();

		});

 		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var belowrange = $('#editbelowrange').val().trim();
	        var aboverange = $('#editaboverange').val().trim();
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

	        if(percent==""){
	        	document.getElementById("edit-percent").innerHTML = "Please provide a percent.";
	        	$('#editpercent').addClass('is-invalid');
	        	event.preventDefault();
	        }else{
	        	document.getElementById("edit-percent").innerHTML = "";
	        	$('#editpercent').removeClass('is-invalid');
	        	$('#editpercent').addClass('is-valid');
	        }

	        if(belowrange=="" || aboverange=="" || aboverange=="0.0000" || percent=="" ) return false;

	        $('#edit_philhealth').hide();
				$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	    });

 		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_philhealth').show();

		});

        $('.add').unbind('click').bind('click', function(){
			var belowrange = $('#belowrange').val().trim().replace(",","");
	        var aboverange = $('#aboverange').val().trim().replace(",","")
	        var percent = $('#percent').val().trim().replace(",","");

        	$.ajax({
	                url : "<?php echo site_url('philhealthtable/save');?>",
	                method : "POST",
	                data : {belowrange:belowrange,
	                		aboverange:aboverange,
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
				        	$('#add_philhealth').show();
				        	$("#belowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Philhealthtable');
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
	        var percent = $('#editpercent').val().trim().replace(",","");

        	$.ajax({
	                url : "<?php echo site_url('philhealthtable/update');?>",
	                method : "POST",
	                data : {id:id,
	                		belowrange:belowrange,
	                		aboverange:aboverange,
	                		percent:percent
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
				        	$('#edit_philhealth').show();
				        	$("#editbelowrange").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Philhealthtable');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.sum').keyup(function () {
		    var sum = 0;
		    $('.sum').each(function() {
		        sum += Number($(this).val().replace(",",""));
		    });
		    $('.total').val(sum);
		});

		$("#employer").keyup(function () {
            var value = $(this).val();
            $("#employee").val(value);
        });

	});
</script>