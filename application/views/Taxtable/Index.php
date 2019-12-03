<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Tax table</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Tax table</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_tax" id="addtax"><i class="fa fa-plus"></i> Add Tax Range</a>
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
								<th style="width: 50px;">#</th>
								<th style="width: 250px;">Below Range</th>
								<th style="width: 250px;">Above Range</th>
								<th style="width: 250px;">Additional Tax</th>
								<th style="width: 250px;">Percent</th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
						 	<?php foreach ($data as $item) { ?>    
								<tr>
									<td><?php echo $item->taxID; ?></td>
									<td class="text-right"><?php echo $item->belowrange; ?></td>
									<td class="text-right"><?php echo $item->aboverange; ?></td>
									<td class="text-right"><?php echo $item->additionaltax; ?></td>
									<td class="text-right"><?php echo $item->percent; ?>%</td>
									<td class="text-right">
										<button type="button" id="<?php echo $item->taxID; ?>" class="btn btn-info btn-sm edittax"
												data-toggle="modal"
												data-target="#edit_tax" 
												data-id="<?php echo $item->taxID; ?>"
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
                            <label>Below Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="belowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description=" below range" required>
                              <div class="invalid-feedback" id="add-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Above Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="aboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n above range" required>
                              <div class="invalid-feedback" id="add-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Additional Tax <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="additionaltax" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n additional tax" required>
                              <div class="invalid-feedback" id="add-additionaltax"></div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Percent <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="percent" description=" percent">
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
					<h5 class="modal-title">Edit Tax Ramge</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
                            <label>Below Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editbelowrange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description=" below range" required>
                              <div class="invalid-feedback" id="edit-belowrange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Above Range <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editaboverange" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n above range" required>
                              <div class="invalid-feedback" id="edit-aboverange"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Additional Tax <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editadditionaltax" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="n additional tax" required>
                              <div class="invalid-feedback" id="edit-additionaltax"></div>
                            </div>
                        </div>
						<div class="form-group">
							<label>Percent <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editpercent" description=" percent">
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
			$('.update').attr('id', $(this).data('id'));
		});

		/* SAVE DESCIPTION */
		$('#save').unbind('click').bind('click', function(){
			var IDArray = ['#belowrange', '#aboverange', '#additionaltax', '#percent'];

			var ErrorIDArray = ['add-belowrange', 'add-aboverange', 'add-additionaltax', 'add-percent'];
		    var ValueArray = [];
			var firstRequired = "";
			var navIndex = 0;

			for(var i=0;i<IDArray.length;i++){
				ValueArray[i] = $(IDArray[i]).val().trim();

				if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
					if(firstRequired==""){
						firstRequired = IDArray[i]
							 if(i<=3) navIndex = 0;
					};
					document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide a" + $(IDArray[i]).attr("description") +".";
		        	$(IDArray[i]).addClass('is-invalid');
	                event.preventDefault();
				}else{
				    document.getElementById(ErrorIDArray[i]).innerHTML = "";
					$(IDArray[i]).removeClass('is-invalid');
					$(IDArray[i]).addClass('is-valid');
				 	event.preventDefault();
				}
			}

			$('#addtabs li:eq('+navIndex+') a').tab('show');
			$(firstRequired).focus();

			if(firstRequired==""){
	    		$.ajax({
	                url : "<?php echo site_url('taxtable/save');?>",
	                method : "POST",
	                data : {belowrange: ValueArray[0],		aboverange: ValueArray[1], 		
	                		additionaltax: ValueArray[2],	percent: ValueArray[3]},
	                async : true,
	                dataType : 'json',
	                success: function(data){
						var result = data.split('|');
	        			if(result[0]=="false"){
	        				if(result[1] == "Tax range already exist!"){
								document.getElementById("add-belowrange").innerHTML = result[1];
					        	$('#belowrange').removeClass('is-valid');
					        	$('#belowrange').addClass('is-invalid');
					        	$('#add-belowrange').addClass('invalid-feedback');
					        	$("#belowrange").focus();
					        	document.getElementById("add-aboverange").innerHTML = result[1];
					        	$('#aboverange').removeClass('is-valid');
					        	$('#aboverange').addClass('is-invalid');
					        	$('#add-aboverange').addClass('invalid-feedback');
	        				}
	        			}else{
	    					window.location.replace('<?php echo base_url(); ?>taxtable');
	        			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}													
	            });
	            return false;
	    	}
		});

 		$('.update').unbind('click').bind('click', function(){

		var IDArray = ['#editbelowrange', '#editaboverange', '#editadditionaltax', '#editpercent'];

		var ErrorIDArray = ['edit-belowrange', 'edit-aboverange', 'edit-additionaltax', 'edit-percent'];
	    var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val();
			
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
				if(firstRequired==""){
					firstRequired = IDArray[i];
						 if(i<=3) navIndex = 0;
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide a" + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}

		$('.modal-body #edittabs li:eq('+navIndex+') a').tab('show');
		$(firstRequired).focus();

		if(firstRequired==""){
	    	$.ajax({
	            url : "<?php echo site_url('taxtable/update');?>",
	            method : "POST",
	            data : {id:id, 
	        			belowrange: ValueArray[0], 		aboverange: ValueArray[1],
	            		additionaltax: ValueArray[2], 	percent: ValueArray[3]},
	            async : true,
	            dataType : 'json',
	            success: function(data){
					var result = data.split('|');
	    			if(result[0]=="false"){
	        				if(result[1] == "Tax range already exist!"){
								document.getElementById("edit-belowrange").innerHTML = result[1];
					        	$('#editbelowrange').removeClass('is-valid');
					        	$('#editbelowrange').addClass('is-invalid');
					        	$('#edit-belowrange').addClass('invalid-feedback');
					        	$("#editbelowrange").focus();
					        	document.getElementById("edit-lastname").innerHTML = result[1];
					        	$('#editlastname').removeClass('is-valid');
					        	$('#editlastname').addClass('is-invalid');
					        	$('#edit-lastname').addClass('invalid-feedback');
	        				}else{
	        					$('.modal-body #edittabs li:eq(1) a').tab('show');
					        	document.getElementById("edit-username").innerHTML = result[1];
	    						$('#editusername').removeClass('is-valid');
					        	$('#editusername').addClass('is-invalid');
					        	$('#edit-username').addClass('invalid-feedback');
					        	$("#editusername").focus();
	        				}
	        			}else{
	    					window.location.replace('<?php echo base_url(); ?>taxtable');
	        			}
	            },
	     		 error: function(request, textStatus, error) {

	        	}
	        });
	        return false;
    	}
	});
});
</script>