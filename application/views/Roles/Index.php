<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Roles & Permissions</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Roles & Permissions</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
				<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Roles</a>
				<div class="roles-menu">
					<ul id="roles">
						<?php foreach ($role as $item) { ?> 
							<li id="<?php echo $item->roleID; ?>">
								<a href="javascript:void(0);"><?php echo $item->roleDescription; ?>
									<span class="role-action">
										<?php if($item->roleID!=1 && $item->roleID!=2){ ?>
											<span class="action-circle large iconedit" id="<?php echo $item->roleID; ?>" data-description="<?php echo $item->roleDescription; ?>" data-toggle="modal" data-target="#edit_role" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false">
												<i class="material-icons">edit</i>
											</span>
											<span class="action-circle large delete-btn icondelete" id="<?php echo $item->roleID; ?>" data-description="<?php echo $item->roleDescription; ?>" data-toggle="modal" data-target="#delete_role" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false">
												<i class="material-icons">delete</i>
											</span>
										<?php } ?>
									</span>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
				<h6 class="card-title m-b-20">Module Access</h6>
				<div class="m-b-30">
					<ul class="list-group notification-list" id="show_data" style="margin-top: 28px;">
						<?php foreach ($module as $item) { 
							if($item->moduleShortDesc=="rolespermission" || $item->moduleShortDesc=="payrolladjustment") continue;
						 ?> 
							<li class="list-group-item">
								<?php echo $item->moduleDescription; ?>
							</label>
								
								<div class="status-toggle">
									<input type="checkbox" id="<?php echo $item->moduleShortDesc; ?>" description="<?php echo $item->moduleDescription; ?>" name="<?php echo $item->ID; ?>" class="check" <?php if($item->modulestatus==1){ echo 'checked'; } ?>>
									<label for="<?php echo $item->moduleShortDesc; ?>" class="checktoggle">checkbox</label>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>      
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Role Modal -->
	<div id="add_role" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Role Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="addrole">
							<div class="invalid-feedback" id="add-invalid"></div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Role Modal -->
	
	<!-- Edit Role Modal -->
	<div id="edit_role" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-md">
				<div class="modal-header">
					<h5 class="modal-title">Edit Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label>Role Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="editdescription">
							<div class="invalid-feedback" id="edit-invalid"></div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Role Modal -->

	<!-- Delete Role Modal -->
	<div class="modal custom-modal fade" id="delete_role" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/delete.svg">
						<h3>Delete Role</h3>
						<p>Are you sure you want to delete this role?</p>
						<div class="invalid-feedback" id="status-invalid"></div>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary continue-btn delete">Delete</a>
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
	<!-- /Delete Role Modal -->

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
	if($this->session->flashdata('successroles')!=""){
		echo '<script type="text/javascript"> showRoleSuccessToast("'.$this->session->flashdata("successroles").'")</script>';
	}
?>
<!-- /Page Wrapper -->

<script>
	$(document).ready(function() {
		$('#1').addClass('active');

		/* FOCUS ON DESCRIPTION */
		$('#add_role').on('shown.bs.modal', function(){
	   		$("#addrole").focus(); 
		});

		/* FOCUS ON DESCRIPTION */
		$('#edit_role').on('shown.bs.modal', function(){
	   		$("#editdescription").focus(); 
		});

		/* CLEAR MODAL */
		$('#add_role').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("add-invalid").innerHTML = "";
        	$('#addrole').removeClass('is-invalid');
		});

		/* CLEAR MODAL */
		$('#edit_role').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    document.getElementById("edit-invalid").innerHTML = "";
        	$('#editdescription').removeClass('is-invalid');
		});

		/* CLEAR MODAL */
		$('#delete_role').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

		/* SAVE ROLE */
		$('#save').unbind('click').bind('click', function(){
	        var description = $('#addrole').val().trim();

	        if(description==""){
	        	document.getElementById("add-invalid").innerHTML = "Please provide a role name.";
	        	$('#addrole').addClass('is-invalid');
	        	$("#addrole").focus(); 
                event.preventDefault();
                return false;
	        }else{
	        	$('#addrole').removeClass('is-invalid');
	        	$('#addrole').addClass('is-valid');
	        }

        	$('#add_role').hide();
			$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

    		event.preventDefault(); 
    		return false;
	    });

        $("#cncl-add").unbind('click').bind('click', function(){

			$('#confirmation_add').modal('hide');
			$('#add_role').show();
		});

	        	/*$.ajax({
	                url : "<?php echo site_url('roles/save');?>",
	                method : "POST",
	                data : {description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-invalid").innerHTML = result[1];
				        	$('#addrole').addClass('is-invalid');
				        	$("#addrole").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>roles');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        }
        });*/

		/* DELETE BUTTON - PASS DATA TO MODAL */
        $('.icondelete').unbind('click').bind('click', function(){
			$('.delete').attr('id', $(this).attr('id'));
			$('.delete').attr('description', $(this).data('description'));
		});

        /* DELETE ROLE */
		$('.delete').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var description = $(this).attr('description');

        	$.ajax({
                url : "<?php echo site_url('roles/delete');?>",
                method : "POST",
                data : {id:id,
                		description:description},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){
    					$("#status-invalid").css("display","block");
						document.getElementById("status-invalid").innerHTML = result[1];
        			}else{
						window.location.replace('<?php echo base_url(); ?>roles');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });

        /* EDIT BUTTON - PASS DATA TO MODAL */
		$('.iconedit').unbind('click').bind('click', function(){
			$(".modal-body #editdescription").val( $(this).data('description'));
			$('.edit').attr('id', $(this).attr('id'));
		});

		/* UPDATE DESCIPTION */
		$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
	        var description = $('#editdescription').val().trim();

	        if(description==""){
	        	document.getElementById("edit-invalid").innerHTML = "Please provide a role name.";
	        	$('#editdescription').addClass('is-invalid');
	        	$("#editdescription").focus(); 
                event.preventDefault();
                return false;
	        }

	        $('#edit_role').hide();
			$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');

    		event.preventDefault(); 
    		return false;
        });

        $("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_role').show();

    	});
	        	/*$.ajax({
	                url : "<?php echo site_url('roles/update');?>",
	                method : "POST",
	                data : {id:id,
	                		description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-invalid").innerHTML = result[1];
				        	$('#editdescription').addClass('is-invalid');
				        	$("#editdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>roles');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	        }
        });*/

		/* UPDATE MODULE */
		$(document).on("click", ".check", function(){
			var id = $(this).attr('name');
			var description = $("ul#roles li.active a").text().replace("edit","").replace("delete","").trim() + " - " + $(this).attr('description');
			var status = $(this).prop('checked')==true ? "1" : "0";

			$.ajax({
                url : "<?php echo site_url('roles/changestatus');?>",
                method : "POST",
                data : {id:id,
                		description:description,
                		status,status},
                async : true,
                dataType : 'json',
                success: function(data){
                	var result = data.split('|');
        			if(result[0]=="false"){

        			}else{        				
        				showRoleModuleSuccessToast(result[1],result[2]=="enabled" ? '#3c763d':'#b02b2b');
        			}
                },
                error: function(request, textStatus, error) {

            	}
            });
		});

		/* LOAD MODULES */
		$('.roles-menu li').unbind('click').bind('click', function(){
			var id = $(this).attr('id');

			$('.roles-menu li').removeClass('active');
			$('#' + id).addClass('active');

			$.ajax({
                url : "<?php echo site_url('roles/loadmodules');?>",
                method : "POST",
                data : {id:id},
                async : true,
                dataType : 'json',
                success: function(data){
        			var html ="";

					for ( var i=0; i<data.length; i++ ) {
						var checked = "";

						if(data[i].moduleShortDesc=="rolespermission") continue;

						if(data[i].modulestatus=="1"){
							checked = "checked=''";
						}

						html += '<li class="list-group-item">' +
									data[i].moduleDescription +
									'<div class="status-toggle">' +
										'<input type="checkbox" id="' + data[i].moduleShortDesc + '" description="' + data[i].moduleDescription + '" name="' + data[i].ID + '" class="check"' + checked + '">' +
										'<label for="' + data[i].moduleShortDesc + '" class="checktoggle">checkbox</label>' + 
									'</div>' +
								'</li>';
					}

					$("#show_data").html(html);
                },
                error: function(request, textStatus, error) {

            	}
            });

		});

		$('.add').unbind('click').bind('click', function(){
			var description = $('#addrole').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('roles/save');?>",
	                method : "POST",
	                data : {description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("add-invalid").innerHTML = result[1];
				        	$('#addrole').addClass('is-invalid');
							$('#confirmation_add').modal('hide');
				        	$('#add_role').show();
				        	$("#addrole").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>roles');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

        $('.edit').unbind('click').bind('click', function(){
        	var id = $(this).attr('id');
	        var description = $('#editdescription').val().trim();

        	$.ajax({
	                url : "<?php echo site_url('roles/update');?>",
	                method : "POST",
	                data : {id:id,
	                		description:description},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                	var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-invalid").innerHTML = result[1];
				        	$('#editdescription').addClass('is-invalid');
							$('#confirmation_edit').modal('hide');
				        	$('#edit_role').show();
				        	$("#editdescription").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>roles');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
        });

	});
</script>