<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid" >
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Approval Setup</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<ul class="nav nav-tabs nav-tabs-solid nav-justified" style="margin-bottom: 20px;">
			<?php foreach ($module as $item) { ?> 
				<li class="nav-item" style="border-bottom: 1px solid #dee2e6; border-top: 1px solid #dee2e6;">
					<a class="nav-link" name="<?php echo $item->moduleID; ?>" id="<?php echo $item->moduleShortDesc; ?>" href="#solid-justified-<?php echo $item->moduleShortDesc; ?>" data-toggle="tab"><?php echo $item->moduleDescription; ?>
					</a>
				</li>
			<?php } ?>
		</ul>

	 	<div class="row" id="headerapproval" style="display: none;">
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
					<a href="#" class="btn btn-success btn-block addApproval" data-toggle="modal" data-target="#add_approval"><i class="fa fa-plus"></i> Add New Approval</a>
					<div class="roles-menu">
						<ul id="roles">
							<?php foreach ($approval as $item) { ?> 
								<li id="<?php echo $item->approvalID; ?>">
									<a href="javascript:void(0);"><?php echo $item->approvalDescription; ?>
										<span class="role-action">
												<span class="action-circle large iconedit" id="<?php echo $item->approvalID; ?>" data-description="<?php echo $item->approvalDescription; ?>" data-toggle="modal" data-target="#edit_approval">
													<i class="material-icons">edit</i>
												</span>
												<span class="action-circle large delete-btn icondelete" id="<?php echo $item->approvalID; ?>" data-description="<?php echo $item->approvalDescription; ?>" data-toggle="modal" data-target="#delete_approval">
													<i class="material-icons">delete</i>
												</span>
										</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9" id="listapprover">
					<h6 class="card-title m-b-20">List of approver</h6>
					<div class="m-b-30">
						<ul class="list-group notification-list" id="show_approver" style="margin-top: 28px;">
							
						</ul>
					</div>      
			</div>
	    </div>
	</div>

	<div id="norecord"></div>
<?php 
	if($this->session->flashdata('successapproval')!=""){
		echo '<script type="text/javascript"> showRoleSuccessToast("'.$this->session->flashdata("successapproval").'")</script>';
	}
?>
<!-- /Page Wrapper -->

<!-- Add Approval Modal -->
	<div id="add_approval" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Approval</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>

						<div class="form-group">
							<label>Module <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="addModule" disabled>
						</div>

						<div class="form-group">
							<label>Description <span class="text-danger">*</span></label>
							<input class="form-control" type="text" id="adddescription">
							<div class="invalid-feedback" id="add-invalid"></div>
						</div>

                      	<div class="form-group">
	                        <label for="addtype">Employee Type <span class="text-danger">*</span></label>
	                        <div class="input-group">
		                        <select class="form-control"  id="selectemployeetype"  >
		                        	  
		                        </select>
		                        <div class="invalid-feedback" id="add-module"></div>
	                    	</div>
                      	</div> 	

                      	<div class="table-responsive">
									<table class="table table-review review-table mb-0" id="table_approval">
										<thead>
											<tr>
												<th>Employee Name</th>
												<th style="width: 64px;"><button type="button" class="btn btn-success btn-add-row" style="font-size: .6rem !important"><i class="fa fa-plus"></i></button></th>
											</tr>
										</thead>
										<tbody id="table_approval_tbody">

										</tbody>
									</table>
								</div>

						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Approval Modal -->

<!-- Delete Approval Modal -->
	<div class="modal custom-modal fade" id="delete_approval" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Approval</h3>
						<p>Are you sure want to delete?</p>
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
<!-- /Delete Approval Modal -->

<script>
$(document).ready(function() {
	var counter = 0;

	$(".nav-link").unbind('click').bind('click', function(){
		var id = $(this).attr('name');
		var desc = $("#" + $(this).attr('id')).text().trim();

		$('.modal-body #addModule').val(desc);
		$('.modal-body #addModule').attr('moduleID',id);
		$('.modal-body #addModule').attr('moduleShortDesc',$(this).attr('id'));

		$('.addApproval').attr('description', desc);
		$('.addApproval').attr('moduleid', id);

		$('.roles-menu').html("");
		$('#show_approver').html("");
		$('#norecord').html("");

		$.ajax({
	        url : "<?php echo site_url('approval/loadapproval');?>",
	        method : "POST",
	        data : {id:id,
	        		type:"0"},
	        async : true,
	        dataType : 'json',
	        success: function(data){
				var html ="";

					html += '<div class="form-group form-focus select-focus">' + 
								'<select class="select floating select2" id="searchbyemployeetype" style="width:100%;">' + 
									'<option value="0">All</option>';
								for (var i=0; i<data['employeetype'].length; i++) {
									html += '<option value="' + data['employeetype'][i].employeetypeID + '">' + data['employeetype'][i].employeeTypeDescription + '</option>';
								}
					html += '</select>' + 
								'<label class="focus-label">Employee Type</label>' + 
							'</div>';

					html += '<ul id="roles">';
				for (var i=0; i<data['approval'].length; i++) {
					html += '<li id="' + data['approval'][i].approvalID + '">' + 
								'<a href="javascript:void(0);">' +
									'<span class="role-action">'  + 
										'<span class="action-circle large iconedit" id="' + data['approval'][i].approvalID + '" data-description="' + data['approval'][i].approvalDescription + '" data-toggle="modal" data-target="#edit_approval">' +
												'<i class="material-icons">edit</i>' +
										'</span>' +
										'<span class="action-circle large delete-btn icondelete" id="' + data['approval'][i].approvalID + '" data-description="' + data['approval'][i].approvalDescription + '" data-toggle="modal" data-target="#delete_approval">' + 
											'<i class="material-icons">delete</i>' +
										'</span>' +
									'</span>' + data['approval'][i].approvalDescription +
									'<span style="color:#888;display: block; font-size: 11px;">' + data['approval'][i].employeeTypeDescription + '</span>' +
								'</a>' + 
							'</li>';
				}
					html += "</ul>";

				if(data['approval'].length==0){
					var norecord = "";
						norecord += '<div class="main-wrapper">' +
										'<div class="error-box" style="padding-top: 70px;">' +
											'<img class="isometric" style="height:180px;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
											'<h3></i>No records found!</h3>' +
											'<p style="color:#888">Setup new approval!</p>' +
											'<div style="text-align: -webkit-center;">' +
												'<a href="#" class="btn btn-success btn-block addApproval" data-toggle="modal" data-target="#add_approval"  style="width:300px;"><i class="fa fa-plus""></i> Add New Approval</a>' +
											'</div>' +
										'</div>' +
									'</div>';

					$("#headerapproval").hide();
					$("#norecord").html(norecord);
				}else{	
					$('#listapprover').show();	
					$('#headerapproval').show();		
					$(".roles-menu").html(html);
					$('.select2').select2();
					$('.roles-menu li:nth-child(1) a').click();
				}
	        },
	        error: function(request, textStatus, error) {

	    	}
	    });
	});

	$('#add_approval').on('show.bs.modal', function(){
		var htmlType = "";
		counter = 0;

		$('.update').attr('id', $(this).data('id'));

		$.ajax({
            url : "<?php echo site_url('approval/loademployeetype');?>",
            method : "POST",
            async : true,
            dataType : 'json',
            success: function(data){
        		htmlType+='<option value="">No Selected</option>';
				for (var i=0; i<data.length; i++) {

				  	htmlType += '<option value="' + data[i].employeetypeID + '">' + data[i].employeeTypeDescription + "</option>";
		  		}

				$("#selectemployeetype").html(htmlType);
            },
            error: function(request, textStatus, error) {

        	}
        });
	});

	$(document).on("click", '.btn-add-row', function () {
		var htmlEmployee = "";

		$.ajax({
            url : "<?php echo site_url('approval/loademployee');?>",
            method : "POST",
            async : true,
            dataType : 'json',
            success: function(data){
            	GetDynamicTextBox(data);
            },
            error: function(request, textStatus, error) {

        	}
        });
	});

	$(document).on("click", "#btn-delete-row", function () {
		$(this).closest("tr").remove();
	});		

	$(document).on("click", '#save', function () {
		var employeeID = [];

		var moduleID = $('.modal-body #addModule').attr("moduleID");
		var description = $('.modal-body #adddescription').val();
		var shortDesc = $('.modal-body #addModule').attr("moduleShortDesc");
		var type = $('.modal-body #selectemployeetype').val();

		$("#table_approval .classEmployee").each(function(){
			employeeID.push($(this).val());
		});

		$.ajax({
           url : "<?php echo site_url('approval/save');?>",
            method : "POST",
            data : { moduleID: moduleID,
            		 description: description,
            		 type: type,
            		 employeeID:employeeID},
            async : true,
            dataType : 'text',
            success: function(data){
            	$('#'+shortDesc).trigger("click");
            },
            error: function(request, textStatus, error) {

        	}
        }); 
		$('#add_approval').modal('hide')
        event.preventDefault();
	});

	function GetDynamicTextBox(data) {
		var html = "";

		var id = "table_approval"; 
		var div = $("<tr />");

		var select = '<select class="form-control select2 classEmployee" style="width:100%;" id="selectemployee'+ counter++ +'">' +
		            	'<option value="">No Selected</option>';
							for (var i=0; i<data.length; i++) {

							  	select += '<option value="' + data[i].employeeID + '">' + data[i].firstname + ' ' + data[i].lastname + "</option>";
					  		}
  			select +=  '</select>';

	    var newSelect = $(select);

		html += '<td>' + select +						
			    '</td>' + 
			    '<td>' + 
			   		'<button type="button" class="btn btn-primary" id="btn-delete-row"><i class="fa fa-trash-o"></i></button>' +
			    '</td>';

	  	div.html(html);

	  	$("#"+id+"_tbody").append(div);
	  	$('.select2').select2();
	}

	$(document).on('change', '#searchbyemployeetype', function(){
		var id = $('.addApproval').attr("moduleid");
		var type = $(this).val();

		$.ajax({
	        url : "<?php echo site_url('approval/loadapproval');?>",
	        method : "POST",
	        data : {id:id,
	        		type:type},
	        async : true,
	        dataType : 'json',
	        success: function(data){
				var html="";

				for (var i=0; i<data['approval'].length; i++) {
					html += '<li id="' + data['approval'][i].approvalID + '">' + 
								'<a href="javascript:void(0);">' +
									'<span class="role-action">'  + 
										'<span class="action-circle large iconedit" id="' + data['approval'][i].approvalID + '" data-description="' + data['approval'][i].approvalDescription + '" data-toggle="modal" data-target="#edit_approval">' +
												'<i class="material-icons">edit</i>' +
										'</span>' +
										'<span class="action-circle large delete-btn icondelete" id="' + data['approval'][i].approvalID + '" data-description="' + data['approval'][i].approvalDescription + '" data-toggle="modal" data-target="#delete_approval">' + 
											'<i class="material-icons">delete</i>' +
										'</span>' +
									'</span>' + data['approval'][i].approvalDescription +
									'<span style="color:#888;display: block; font-size: 11px;">' + data['approval'][i].employeeTypeDescription + '</span>' +
								'</a>' + 
							'</li>';
				}

				if(data['approval'].length==0){
					var norecord = "";
						norecord += '<div class="main-wrapper">' +
										'<div class="error-box">' +
											'<img class="isometric" style="height:160px;" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' + 
											'<h4></i>No records found!</h4>' +
											'<p style="color:#888">Setup new approval!</p>' +
										'</div>' +
									'</div>';

					$("#roles").html(norecord);
					$("#listapprover").hide();
				}else{	
					$("#listapprover").show();
					$('#headerapproval').show();		
					$("#roles").html(html);
					$('.select2').select2();
					$('.roles-menu li:nth-child(1) a').click();
				}
	        },
	        error: function(request, textStatus, error) {

	    	}
	    });

	});

	$(document).on('click', '.roles-menu li', function(){
		var id = $(this).attr('id');
		$('.roles-menu li').removeClass('active');
		$('#' + id).addClass('active');

		$.ajax({
	        url : "<?php echo site_url('approval/loadapprover');?>",
	        method : "POST",
	        data : {id:id},
	        async : true,
	        dataType : 'json',
	        success: function(data){
				var html ="";
				var img = "";
				for (var i=0; i<data.length; i++) {
					if(data[i].photo==""){
						img = '<img alt="" src="uploads/profileimg.png" >';
					}else{
						img = '<img alt="" src="uploads/' + data[i].photo + '">';
					}

					html += '<div class="dash-info-list">' + 
								'<div class="dash-card text-danger">' + 
									'<div class="dash-card-container">' +
										'<div class="e-avatar">' + img + '</div>' + 
										'<div class="dash-card-content">' + 
											'<p style="margin-left: 10px; color: black;">' + data[i].firstname + " " + data[i].lastname  + '<span style="color:#888;display: block; font-size: 11px;">' + data[i].description + ' | ' + data[i].designationdescription + '</span></p>' + 	
										'</div>' + 
										'<div class="dash-card-avatars">' +
												'LEVEL ' + data[i].approvalLevel +
											'</div>' +
									'</div>' + 
								'</div>' + 
							'</div>';
				}

				$("#show_approver").html(html);
	        },
	        error: function(request, textStatus, error) {

	    	}
	    });
	});

	/* CLEAR MODAL */
	$('#delete_approval').on('hidden.bs.modal', function(){
	    document.getElementById("status-invalid").innerHTML = "";
	});

	/* DELETE BUTTON - PASS DATA TO MODAL */
	$(document).on('click', '.icondelete', function(){
		$('.delete').attr('id', $(this).attr('id'));
		$('.delete').attr('description', $(this).data('description'));
	});

	/* DELETE APPROVAL */
	$('.delete').unbind('click').bind('click', function(){
        var id = $(this).attr('id');
        var description = $(this).attr('description');

    	$.ajax({
            url : "<?php echo site_url('approval/delete');?>",
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
					window.location.replace('<?php echo base_url(); ?>approval');
    			}
            },
            error: function(request, textStatus, error) {

        	}
        });
        event.preventDefault();
        return false;
    });

	$("#timesheet").addClass("active");
	$('.addApproval').attr('description', "Timesheet");
	$('.modal-body #addModule').val("Timesheet");
	$('.modal-body #addModule').attr('moduleID',7);
    $('#timesheet').trigger("click");
	$('.roles-menu li:nth-child(1) a').click();
});
</script>