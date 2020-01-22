<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid" >
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Approval Setup</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Approval Setup</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

	 	<div class="row" id="headerapproval">
	 		<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
					<h6 class="card-title m-b-20 text-primary">List of Approval</h6>
				<div class="roles-menu">
					<ul id="roles">
						<?php foreach ($module as $item) { ?> 
							<li id="<?php echo $item->moduleID; ?>">
								<a href="javascript:void(0);"><?php echo $item->moduleDescription; ?>
									<span class="role-action">
										<span class="action-circle large iconupdate" id="<?php echo $item->moduleID; ?>" data-description="<?php echo $item->moduleDescription; ?>" data-toggle="modal" data-target="#update_approver" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false">
											<i class="material-icons">edit</i>
										</span>
									</span>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="mt-3 col-sm-8 col-md-8 col-lg-8 col-xl-9" id="listapprover">

				<div class="m-b-30">
					<ul class="list-group notification-list" id="show_approver" style="margin-top: 28px;">
						<?php foreach ($approval as $item) { 

							if($item->photo==""){
								$img = '<img alt="" src="uploads/profileimg.png" >';
							}else{
								$img = '<img alt="" src="uploads/'.$item->photo.'">';
							}

							echo '<div class="dash-info-list">'.
								 	'<div class="dash-card text-danger" style="box-shadow:none;">'.
										'<div class="dash-card-container">'.
											'<div class="e-avatar">'.$img.'</div>'. 
											'<div class="dash-card-content">'. 
												'<p style="margin-left: 10px; color: black;">'.$item->firstname." ".$item->lastname.'<span style="color:#888;display: block; font-size: 11px;">'.$item->description.' | '.$item->designationdescription.'</span></p>'. 	
										'</div>'.
										'<div class="dash-card-avatars">'.
												'LEVEL '.$item->approvalLevel.
											'</div>'.
									'</div>'. 
								'</div>'. 
							'</div>';
						 } ?>
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

<!-- UPDATE Modal -->
	<div id="update_approver" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Approval</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
                      	<div class="table-responsive">
							<table class="table table-review review-table mb-0" id="table_approval">
								<thead>
									<tr>
										<th style="vertical-align: middle;">Employee Name</th>
										<th style="width: 64px;"><button type="button" class="btn btn-success btn-add-row" style="font-size: .6rem !important"><i class="fa fa-plus"></i></button></th>
									</tr>
								</thead>
								<tbody id="table_approval_tbody">
									<tr>
										<td colspan="2" style="text-align: center;">
											<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">
											<h4>No approver setup</h4>
											<p>Click <b>+</b> icon to add</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="submit-section">
							<button class="btn btn-primary submit-btn update" style="width:50%;">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- /UPDATE Modal -->

<!-- Confirmation Modal -->
	<div class="modal custom-modal fade" id="modal_confirmation" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric">
						<h3 id="modal_title"></h3>
						<p id="modal_message"></p>
					</div>
					<div class="modal-btn confirmation-action">
						<div class="row">
							<div class="col-6">
								<button class="btn btn-primary submit-btn"></a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /Confirmation Modal -->

<script>
$(document).ready(function() {
	var counter = 0;
	var exist = 0;
	var employeeID = [];

	$('#7').addClass('active');

	$(".roles-menu li").unbind('click').bind('click', function(){
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
								'<div class="dash-card text-danger" style="box-shadow:none;">' + 
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

	$(document).on("click", '.btn-add-row', function () {
		var htmlEmployee = "";

		$.ajax({
            url : "<?php echo site_url('approval/loademployee');?>",
            method : "POST",
            async : true,
            dataType : 'json',
            success: function(data){
            	if(exist==0) $("#table_approval_tbody").html("");
            	GetDynamicTextBox(data);
            },
            error: function(request, textStatus, error) {

        	}
        });
	});

	$(document).on("click", ".btn-delete-row", function () {
		
		$(this).closest("tr").remove();
		if($('#update_approver tr').length==1){
			exist=0;
			var tbody = '<tr>' +
							'<td colspan="2" style="text-align: center;">' +
								'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' +
								'<h4>No approver setup</h4>' +
								'<p>Click <b>+</b> icon to add</p>' +
							'</td>' +
						'</tr>';

			$("#table_approval_tbody").html(tbody);
		}
	});		

	function GetDynamicTextBox(data) {
		var html = "";
		exist = 1;
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
			   		'<button type="button" class="btn btn-primary btn-delete-row"><i class="fa fa-trash-o"></i></button>' +
			    '</td>';

	  	div.html(html);

	  	$("#"+id+"_tbody").append(div);
	  	$('.select2').select2();
	}

	function InsertDynamicTextBox(data) {
		 $("#table_approval_tbody").html("");
		 
		 if(data["approvaldet"].length==0){
		 	exist = 0;
		 	var tbody = '<tr>' +
							'<td colspan="2" style="text-align: center;">' +
								'<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/notfound.svg">' +
								'<h4>No approver setup</h4>' +
								'<p>Click <b>+</b> icon to add</p>' +
							'</td>' +
						'</tr>';

			$("#table_approval_tbody").html(tbody);
		 }else{
		 	exist = 1;
		 }

		for (var x=0; x<data["approvaldet"].length; x++) {
			var html = "";
			var selected = "";

			var id = "table_approval"; 
			var div = $("<tr />");

			var select = '<select class="form-control select2 classEmployee" style="width:100%;" id="selectemployee'+ counter++ +'">' +
		            	'<option value="">No Selected</option>';
							for (var i=0; i<data["employee"].length; i++) {
								
								selected = "";

								if(data["approvaldet"][x].employeeID==data["employee"][i].employeeID) selected = "selected";

							  	select += '<option value="' + data["employee"][i].employeeID + '"'+ selected + '>' + data["employee"][i].firstname + ' ' + data["employee"][i].lastname + "</option>";
					  		}
  			select +=  '</select>';

		    var newSelect = $(select);

			html += '<td>' + select +						
				    '</td>' + 
				    '<td>' + 
				   		'<button type="button" class="btn btn-primary btn-delete-row"><i class="fa fa-trash-o"></i></button>' +
				    '</td>';

		  	div.html(html);

		  	$("#"+id+"_tbody").append(div);
		}

	  	$('.select2').select2();
	}

	/* UPDATE BUTTON - PASS DATA TO MODAL */
	$(document).on('click', '.iconupdate', function(){
		var id = $(this).attr('id');

		$(".update").attr("id",id);

		$.ajax({
	        url : "<?php echo site_url('approval/updateapprover');?>",
	        method : "POST",
	        data : {id:id},
	        async : true,
	        dataType : 'json',
	        success: function(data){
				InsertDynamicTextBox(data);
	        },
	        error: function(request, textStatus, error) {

	    	}
	    });
	});

	$(document).on("click", '.update', function () {
		if(exist==0){
			showErrorToast('Cannot update please setup an approver first!');
			return false;
		}

		employeeID = [];
		var err = "";

		$("#table_approval .classEmployee").each(function(){
			if($(this).val()=="") {
				$("#" + $(this).attr("id")).focus();
				err = "error";
				showErrorToast('Cannot update please select a valid employee!');
				return false;
			}
			employeeID.push($(this).val());
		});

		if(err!="") return false;

   		$('#modal_confirmation .confirmationisometric').attr("src", "<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg");
		$('#modal_confirmation #modal_title').html("Confirmation message");
    	$('#modal_confirmation #modal_message').html("Are you sure you want to update this approval?");
    	$('#modal_confirmation .submit-btn').html("Update Approval");
    	$('#modal_confirmation .cancel-btn').html("Cancel");
		$('#modal_confirmation .submit-btn').attr("id","modal_approver");
        $('#update_approver').hide();
        $('#modal_confirmation').modal('show');
		return false;
	});

	$(document).on("click", '.cancel-btn', function () {
        $('#modal_confirmation').modal('hide');
        $('#update_approver').show()
      }); 

	$(document).on("click", '#modal_approver', function () {
		var moduleID = $(".update").attr('id');
		
		$.ajax({
           url : "<?php echo site_url('approval/save');?>",
            method : "POST",
            data : { moduleID:moduleID,
            		 employeeID:employeeID},
            async : true,
            dataType : 'json',
            success: function(data){
            	$('#update_approver').modal('hide');
            	$('#modal_confirmation').modal('hide');
            	$('#' + data).trigger('click');
            	showSuccessToast('Approval successfully updated!');
            },
            error: function(request, textStatus, error) {

        	}
        }); 
        return false;
	});
});
</script>