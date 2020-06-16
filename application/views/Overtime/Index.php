<?php 
$start = strtotime('12:00 AM');
$end   = strtotime('11:59 PM');
?>
<?php foreach ($data['accesslevel'] as $access){ 
$accesslevel = $access->employeetypeID;
}
?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Overtime</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Overtime</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Overtime</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Employee's Overtime</h4>
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th style="min-width: 110px ! important;">Overtime Number</th>
								<th style="min-width: 260px ! important;">Employee Name</th>
								<th style="min-width: 90px ! important;">Overtime Date</th>
								<th style="min-width: 70px ! important;">Start Time</th>
								<th style="min-width: 70px ! important;">End Time</th>
								<th style="min-width: 40px ! important;">Hours</th>
								<th style="min-width: 100px ! important;">Note</th>
								<th style="min-width: 60px ! important;">Status</th>
								<th style="min-width: 50px ! important;">Actions</th>
							</tr>
						</thead>
						<tbody id="showdata">
							<?php foreach ($data['record'] as $item): ?>
							<tr>
								<td><?php echo 'OT-', str_pad($item->overtimeid, 6, "0", STR_PAD_LEFT);  ?></td>
							<td>
							<div class="dash-card-content">	
                            <a id="<?php echo $item->employeeID; ?>" class="avatar">
                            <?php	
                            if($item->photo==""){
                              echo '<img alt="" src="uploads/profileimg.png"></a> <p style="margin-left: 10px; color: black;">'.' '.$item->fullname.'<br> <span style="color:#888;display: block; font-size: 11px;">'.$item->department.' | ' .$item->designationdescription.'</span> </p> </div</td>';
                            }else{
                              echo '<img alt="" src="uploads/'.$item->photo.'" ></a> <div class="dash-card-content"><p style="margin-left: 10px; color: black;">'.' '.$item->fullname.'<br> <span style="color:#888;display: block; font-size: 11px;">'.$item->department.' | ' .$item->designationdescription.' </span> </p> </div></div></td>';
                            } ?>
                           </td> 
								 <td><?php echo  date("F d, Y", strtotime($item->overtimedate)) ?></td>
								<td><?php echo $item->starttime ?></td>
								<td><?php echo $item->endtime ?></td>
								<td><?php echo $item->totalhour ?></td>
								<td><?php echo $item->noted ?></td>
								<!-- <td><?php echo $item->overtimestatus ?></td> -->
								<td>
									<?php if($item->overtimestatus=="Reviewed") 
								      echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> '.$item->overtimestatus.'</span>';
								    else
								      echo '<span class="badge bg-inverse-info custom-status"><i class="fa fa-dot-circle-o text-info"></i> '.$item->overtimestatus.'</span>';
								  	?>
								</td>
								<div class="dropdown dropdown-action">
								</div>
								<td class="text-right">
								    <div class="dropdown dropdown-action">
								    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
								    <div class="dropdown-menu dropdown-menu-right">
								    <a class="dropdown-item edit_overtime" href="#"
									    id="<?php echo $item->overtimeid; ?>"
									    class="btn btn-info btn-sm edit_overtime"
									    data-toggle="modal" 
									    data-target="#edit_overtime"
										data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
										data-toggle="modal" data-target="#edit_overtime" 
										data-id="<?php echo $item->overtimeid; ?>" 
										data-employeeid="<?php echo $item->employeeID; ?>"  
										data-description="<?php echo $item->description; ?>" 
										data-overtimedate="<?php echo $item->overtimedate; ?>" 
										data-starttime="<?php echo $item->updatedstarttime; ?>" 
										data-endtime="<?php echo $item->updatedendtime; ?>" 
										data-totalhour="<?php echo $item->totalhour; ?>" 
										data-noted="<?php echo $item->noted; ?>" 
										data-tog="tooltip"data-placement="top" title="Edit">
									<i class="fa fa-pencil"></i> Edit</a>
									<?php  if($accesslevel==1){	
										}else{ ?>
								<a class="dropdown-item changesnoted" 
									href="#" data-toggle="modal" data-target="#noted_employee"
									data-id="<?php echo $item->overtimeid; ?>" 
									data-overtnoted="<?php echo $item->noted; ?>">
									<i class="fa fa-sticky-note"></i> Note</a> <?php } ?>
    							</div>	
    							</div>
								<!-- <td class="text-right">
									<button type="button" 
									id="<?php echo $item->overtimeid; ?>" 
									data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
									class="btn btn-info btn-sm edit_overtime" 
									data-toggle="modal" data-target="#edit_overtime" 
									data-id="<?php echo $item->overtimeid; ?>" 
									data-employeeid="<?php echo $item->employeeID; ?>"  
									data-description="<?php echo $item->description; ?>" 
									data-overtimedate="<?php echo $item->overtimedate; ?>" 
									data-starttime="<?php echo $item->updatedstarttime; ?>" 
									data-endtime="<?php echo $item->updatedendtime; ?>" 
									data-totalhour="<?php echo $item->totalhour; ?>" 
									data-noted="<?php echo $item->noted; ?>" 
									data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> 
								</td> -->
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Overtime Modal -->
	<div id="add_overtime" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Overtime</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						 <div class="col-sm-12">
							<div class="form-group">
                            <input id="datecreated" type="hidden" name="datecreated"  class="form-control input" autocomplete="off" value="<?php echo date("d/m/Y h:i A"); ?>"disabled>
                            <div class="invalid-feedback" id="add-firstname"></div>
                          </div>
                            </div>
                           
                         <div class="col-sm-12">
								<div class="form-group">
	                            <label for="description">Employee Name <span class="text-danger">*</span></label>
	                            <select class="form-control select2" id="addemployee" name="addemployee" style="width: 100%;"  description="employee name" required>
	                            <option value="">No Selected</option>
	                              <?php
	                              foreach($data['dropdownemp'] as $empldropdown)
	                              {
	                              echo '<option value="'.$empldropdown->employeeID.'">'.$empldropdown->fullname.'</option>';
	                              }
	                              ?>  
	                            </select>
	                             <div class="invalid-feedback" id="add-employee"></div>
	                           </div>
	                          </div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>Overtime Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="addovertimedate" name="addovertimedate" description="overtime date" required> 
								 <div class="invalid-feedback" id="add-overtime"></div>
							</div>
						</div>
					</div>	

						<div class="col-sm-12">
						 <div class="form-group">
								<label>Start Time <span class="text-danger">*</span></label>
								<input class="form-control" type="time" style="width: 100%;" name="addstarttime" id="addstarttime" description="start time">
								<div class="invalid-feedback" id="add-starttime"></div>
							</div>
						</div> 

						<div class="col-sm-12">	
							<div class="form-group">
								<label>End Time <span class="text-danger">*</span></label>
								<input class="form-control" type="time" style="width: 100%;" name="addendtime" id="addendtime" description="end time">
							<div class="invalid-feedback" id="add-endtime"></div>
							</div>
						</div>
							<div class="col-sm-12">	
							<div class="form-group">
								<label>Total Time</label>	
								<input Class="form-control" id="totalTime"name="totalTime" readonly="readonly" description="total time" />
								<div class="invalid-feedback" id="add-totalTime"></div>	
							</div>
						</div>
					 <div class="col-sm-12">	
						<div class="form-group">
							<label>Remarks <span class="text-danger">*</span></label>
							<input type="text" class="form-control alphanumericwithspace" id="adddescription" name="adddescription" description="Description">
							<div class="invalid-feedback" id="add-description"></div>
						</div>
					</div>	
				<!-- <?php	
	            if($accesslevel==1){	
					}else{
					 echo '<div class="col-sm-12">';
					 echo '<div class="form-group">';
					 echo '<label for="exampleInputPassword1">Noted</label>';
					 echo ' <input id="addnoted" type="text" name="addnoted" class="form-control input letterswithspace" autocomplete="off">';
					 echo '<div class="invalid-feedback" id="add-noted"></div> ' ; 
					 echo '</div>';
					 echo '</div>';
				}   
				?>   --> 
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
						</div>
					</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Overtime Modal -->
	<!-- Edit Overtime Modal -->
	<div id="edit_overtime" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Overtime</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
                         <div class="col-sm-12">
								<div class="form-group">
	                            <label for="description">Employee Name<span class="text-danger">*</span></label>
	                            <select class="form-control select2" id="editemployee" name="editemployee" style="width: 100%;" description="employee name" >
	                            <option value="">No Selected</option>
	                              <?php
	                              foreach($data['dropdownemp'] as $empldropdown)
	                              {
	                              echo '<option value="'.$empldropdown->employeeID.'">'.$empldropdown->fullname.'</option>';
	                              }
	                              ?>  
	                            </select>
	                             <div class="invalid-feedback" id="edit-employee"></div>
	                           </div>
	                          </div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>Overtime Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="editovertimedate" name="editovertimedate" description="overtime date"> 
								 <div class="invalid-feedback" id="edit-overtime"></div>
							</div>
						</div>
					</div>	
						<div class="col-sm-12">
						 <div class="form-group">
								<label>Start Time <span class="text-danger">*</span></label>
									<input class="form-control" type="time" style="width: 100%;" name="editstarttime" id="editstarttime" description="start time">
								<div class="invalid-feedback" id="edit-starttime"></div>
							</div>
						</div>	
						<div class="col-sm-12">	
							<div class="form-group">
								<label>End Time <span class="text-danger">*</span></label>	
								<input class="form-control" type="time" style="width: 100%;" name="editendtime" id="editendtime" description="end time">
							<div class="invalid-feedback" id="edit-endtime"></div>
							</div>
						</div>
						<div class="col-sm-12">	
							<div class="form-group">
								<label>Total Time</label>	
								<input Class="form-control" id="edittotalTime"name="edittotalTime" readonly="readonly" description="total time"/>
								<div class="invalid-feedback" id="edit-totalTime"></div>	
							</div>
						</div>
					 <div class="col-sm-12">	
						<div class="form-group">
							<label>Remarks <span class="text-danger">*</span></label>
							<input id="editdescription" name="editdescription" class="form-control alphanumericwithspace" description="description">
							<div class="invalid-feedback" id="edit-description"></div>
						</div>
					</div>
				<!-- <?php	
	            if($accesslevel==1){	
					}else{
					 echo '<div class="col-sm-12">';
					 echo '<div class="form-group">';
					 echo '<label for="exampleInputPassword1">Note</label>';
					 echo ' <input id="editnoted" type="text" name="editnoted" class="form-control input letterswithspace" autocomplete="off">';
					 echo '<div class="invalid-feedback" id="edit-noted"></div> ' ; 
					 echo '</div>';
					 echo '</div>';
				}   
				?>  -->  	
						<div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Overtime Modal -->
	
	<!-- Delete Overtime Modal -->
	<div class="modal custom-modal fade" id="delete_overtime" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Overtime</h3>
						<p>Are you sure want to Cancel this?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Approve Leave Modal -->
	
	
</div>
<div id="confirmationovertime_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Add Overtime</h3>
							<p>Are you sure you want to add this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn add" >Add</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cnclovertime-add">Cancel</a>
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
							<h3>Update Overtime</h3>
							<p>Are you sure you want to update this record?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn edit">Update</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-edit">Cancel</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div id="confirmation_noteedit" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Confirmation Message</h3>
							<p>Are you sure you want to add note?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
				
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn editnote">Add</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-editnote">Cancel</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal custom-modal fade" id="noted_employee" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
      <div class="modal-body">
        <div class="form-header">
          <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/change.svg">
          <h3>Note</h3>
          <div class="col-sm-12">
          	<input class="form-control letterswithspace" id="overtimenoted" name="overtimenoted" description="note">
          	<div class="invalid-feedback" id="edit-overtimenoted"></div>
            </div>
        </div>
        <div class="modal-btn delete-action">
          <div class="row">
            <div class="col-12">
              <a href="#" class="btn btn-primary continue-btn updatenote">Submit</a>
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
<style>
	div#DataTables_Table_0_wrapper .row:nth-child(2){
    overflow-y: hidden;
}
</style>

<!-- /Page Wrapper -->
<script  type="text/javascript"> 

	$('.changesnoted').unbind('click').bind('click', function(){
     $(".modal-body #overtimenoted").val( $(this).data('overtnoted'));
     $('.editnote').attr('id', $(this).data('id'));
    
    });

    $('.updatenote').unbind('click').bind('click', function(){
        var id    =   $(this).attr('id');
        var noted =   $('#overtimenoted').val();
        if(noted==""){
        		document.getElementById("edit-overtimenoted").innerHTML = "Please provide a noted.";
				$("#overtimenoted").addClass('is-invalid');
				event.preventDefault();
        }else{
        		document.getElementById("edit-overtimenoted").innerHTML = "";
	        	$('#overtimenoted').removeClass('is-invalid');
	        	$('#overtimenoted').addClass('is-valid'); 
        }
        if(noted=="") return false;

        $('#noted_employee').hide();
		$('#confirmation_noteedit').modal({backdrop: 'static', keyboard: false},'show');
		
     });    
     $("#cncl-editnote").unbind('click').bind('click', function(){
			$('#confirmation_noteedit').modal('hide');
			$('#noted_employee').show();
		});
     $('.editnote').unbind('click').bind('click', function(){
		var id 				= 	$(this).attr('id');
		var noted 		= 	$('#overtimenoted').val();
		/*alert(noted +' '+ id);*/
		$.ajax({
			url : "<?php echo site_url('Overtime/updatenoted');?>",
			method : "POST",
			data : {id:     id,
			noted: 			noted},
			async : true,
			dataType : 'json',
			success: function(data){
		var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-overtimenoted").innerHTML = result[1];
				        	$('#overtimenoted').addClass('is-invalid');
							$('#confirmation_noteedit').modal('hide');
				        	$('#overtimenoted').show();
				        	$("#overtimenoted").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Overtime');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;		

				
});

  	$(document).ready(function() {
 		//Clear Modal//
		$('#add_overtime').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');

        	 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
		});
		//Clear Modal//
		$('#edit_overtime').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');

        	 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
		});

$("#addendtime").change(function(){
	var starttime = $("#addstarttime").val().trim(); 
	var endtime = $(this).val();
	 if(endtime!="") computeOvertime(starttime,endtime);
	});
$("#addstarttime").change(function(){
	var endtime = $("#addendtime").val().trim(); 
	var starttime = $(this).val();
	 if(starttime!="") computeOvertime(starttime,endtime);
	});

	function computeOvertime(starttime,endtime){

		let valuestart = moment.duration(starttime, "HH:mm");
		let valuesend = moment.duration(endtime, "HH:mm");
		var starttimevalidation = starttime;
		var endtimevalidation = endtime;
		if(starttimevalidation <= endtimevalidation){
		if(valuestart <= valuesend) {
			let difference = valuesend.subtract(valuestart);
			var diff = (difference.hours() + ":" + difference.minutes());
		}else{
			let difference = valuestart.subtract(valuesend);
			var diff = (difference.hours() + ":" + difference.minutes())
		}
		}
		else{
			document.getElementById("add-endtime").innerHTML = "Invalid chosen time.";
	        	$('#addendtime').addClass('is-invalid');
                event.preventDefault();
                return false;
		}
        $("#totalTime").val(diff);
	};	

	$("#editendtime").change(function(){
	var starttime = $("#editstarttime").val().trim(); 
	var endtime = $(this).val();
	 if(endtime!="") editcomputeOvertime(starttime,endtime);
	});
	$("#editstarttime").change(function(){
	var endtime = $("#editendtime").val().trim(); 
	var starttime = $(this).val();
	 if(starttime!="") editcomputeOvertime(starttime,endtime);
	});
	function editcomputeOvertime(starttime,endtime){
		var starttimevalidation = starttime;
		var endtimevalidation = endtime;
		let editvaluestart = moment.duration(starttime, "HH:mm");
		let editvaluesend = moment.duration(endtime, "HH:mm");
		if(starttimevalidation <= endtimevalidation){
		if(editvaluestart <= editvaluesend) {
			let difference = editvaluesend.subtract(editvaluestart);
			var diff = (difference.hours() + ":" + difference.minutes());
		
		}else{
			let difference = editvaluestart.subtract(editvaluesend);
			var diff = (difference.hours() + ":" + difference.minutes())
		
		}
		}
		else{
			document.getElementById("edit-endtime").innerHTML = "Invalid chosen time.";
	        	$('#editendtime').addClass('is-invalid');
                event.preventDefault();
                return false;
		}
        $("#edittotalTime").val(diff);
	};	
	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployee', '#addovertimedate', '#addstarttime', '#addendtime', /*'#totalTime'*//*, '#adddescription'*//*,'#addnoted'*/];
		var ErrorIDArray = ['add-employee', 'add-overtime', 'add-starttime', 'add-endtime', /*'add-totalTime'*//*, 'add-description'*//*,'add-noted'*/];
		var addemployee = $("#addemployee").val();
		var starttimecheck = $("#addstarttime").val();
		var endtimecheck = $("#addendtime").val();
		var description = $("#adddescription").val();
		var totalTime = $("#totalTime").val();
		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;

		 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
		
		if(starttimecheck <= endtimecheck){
		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			/*if(i==4) continue;*/
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide an " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}

		if(addemployee==""){
			document.getElementById("add-employee").innerHTML = "Please provide an employee name.";
			$("[aria-labelledby='select2-addemployee-container']").addClass('is-invalid');
			$('#addemployee').addClass('is-invalid');
				event.preventDefault();
            
		}else{
			document.getElementById("add-employee").innerHTML = "";
			$("[aria-labelledby='select2-addemployee-container']").addClass('is-valid');
	        $('#addemployee').addClass('is-valid');
	        event.preventDefault();
		};
		if(endtimecheck==""){
			document.getElementById("add-endtime").innerHTML = "Please provide an end time.";
	        $('#addendtime').addClass('is-invalid');
            event.preventDefault(); 
		}else{
			document.getElementById("add-endtime").innerHTML = "";	
			$('#addendtime').removeClass('is-invalid');
			$('#addendtime').addClass('is-valid');
		 	event.preventDefault();
		}

		if(endtimecheck==""){
			document.getElementById("add-endtime").innerHTML = "Please provide an end time.";
	        $('#addendtime').addClass('is-invalid');
            event.preventDefault(); 
		}else{
			document.getElementById("add-endtime").innerHTML = "";	
			$('#addendtime').removeClass('is-invalid');
			$('#addendtime').addClass('is-valid');
		 	event.preventDefault();
		}

		if(description==""){
			document.getElementById("add-description").innerHTML = "Please provide a desciption.";
	        $('#adddescription').addClass('is-invalid');
            event.preventDefault();
            return false;
		}else{
			document.getElementById("add-description").innerHTML = "";	
				$('#adddescription').removeClass('is-invalid');
				$('#adddescription').addClass('is-valid');
			 	event.preventDefault();
		};
		if(totalTime=="0:0"){
			document.getElementById("add-totalTime").innerHTML = "Invalid total time.";
	        $('#totalTime').addClass('is-invalid');
            event.preventDefault();
            return false;
            
		}else{
		};
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#add_overtime').hide();
		$('#confirmationovertime_add').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
		}else{
		document.getElementById("add-endtime").innerHTML = "Invalid chosen time.";
		$('#addendtime').addClass('is-invalid');
		event.preventDefault();
		return false;
		};
		
		
		});
	  $("#cnclovertime-add").unbind('click').bind('click', function(){
			$('#confirmationovertime_add').modal('hide');
			$('#add_overtime').show();
		});	
		$('.add').unbind('click').bind('click', function(){
			var employeeID = $("#addemployee").val();
			var overtimedate = $("#addovertimedate").val();
			var starttime = $("#addstarttime").val();
			var endtime = $("#addendtime").val();
			var totalhour = $("#totalTime").val();
			var description = $("#adddescription").val();
			/*var noted = $("#addnoted").val();*/
    		$.ajax({
                url : "<?php echo site_url('overtime/save');?>",
                method : "POST",
                data : {employeeID: employeeID, 		overtimedate: overtimedate,
                		starttime:  starttime, 			endtime: endtime,
                		totalhour:  totalhour, 	   		description: description/*,
                		noted: 		noted*/},
                async : true,
                dataType : 'json',
                success: function(data){
					var result = data.split('|');
        			if(result[0]=="false"){
							document.getElementById("add-employee").innerHTML = result[1];
				        	$('#addemployee').removeClass('is-valid');
				        	$('#addemployee').addClass('is-invalid');
				        	$('#add-employee').addClass('invalid-feedback');
				        	$("#addemployee").focus();
				        	document.getElementById("add-overtime").innerHTML = result[1];
				        	$('#addovertimedate').removeClass('is-valid');
				        	$('#addovertimedate').addClass('is-invalid');
				        	$('#add-overtime').addClass('invalid-feedback');
						}else{
        					window.location.replace('<?php echo base_url(); ?>Overtime');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	});	

		$('.edit_overtime').unbind('click').bind('click', function(){
		$(".modal-body #editemployee").val( $(this).data('employeeid'));
		$(".modal-body #editemployee").trigger("change");
		$(".modal-body #editovertimedate").val( $(this).data('overtimedate'));
		$(".modal-body #editstarttime").val( $(this).data('starttime'));
		$(".modal-body #editendtime").val( $(this).data('endtime'));
		$(".modal-body #edittotalTime").val( $(this).data('totalhour'));
		$(".modal-body #editdescription").val( $(this).data('description'));
		/*$(".modal-body #editnoted").val( $(this).data('noted'));*/
		$('.edit').attr('id', $(this).data('id'));
         }); 
		$('.update').unbind('click').bind('click', function(){
		var IDArray = ['#editemployee', '#editovertimedate', '#editstarttime', '#editendtime', '#edittotalTime'/*, '#editdescription'*//*,'#editnoted'*/];
		var ErrorIDArray = ['edit-employee', 'edit-overtime', 'edit-starttime', 'edit-endtime', 'edit-totalTime'/*, 'edit-description'*//*,'#edit-noted'*/];
		var starttimecheck = $("#editstarttime").val();
		var endtimecheck = $("#editendtime").val();
		var description = $("#editdescription").val();
		var edittotalTime = $("#edittotalTime").val();
		var editemployee = $("#editemployee").val();
		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');
		$(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
		if(starttimecheck <= endtimecheck){

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			/*if(i==4 || i==6) continue;*/
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0:0"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide an " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}
		if(editemployee==""){
			document.getElementById("edit-employee").innerHTML = "Please provide an employee name.";
			$("[aria-labelledby='select2-editemployee-container']").addClass('is-invalid');
			$('#editemployee').addClass('is-invalid');
				event.preventDefault();
            
		}else{
			document.getElementById("add-employee").innerHTML = "";
			$("[aria-labelledby='select2-editemployee-container']").addClass('is-valid');
	        $('#editemployee').addClass('is-valid');
	        event.preventDefault();
		};
		if(endtimecheck==""){
			document.getElementById("edit-endtime").innerHTML = "Please provide an end time.";
	        $('#editendtime').addClass('is-invalid');
            event.preventDefault();
           
		}else{
			/*document.getElementById("edit-endtime").innerHTML = "";	
				$('#editendtime').removeClass('is-invalid');
				$('#editendtime').addClass('is-valid');
			 	event.preventDefault();*/
		};
		if(starttimecheck==""){
			document.getElementById("edit-starttime").innerHTML = "Please provide a start time.";
	        $('#editstarttime').addClass('is-invalid');
            event.preventDefault();
           
		}else{
			/*document.getElementById("edit-starttime").innerHTML = "";	
				$('#editstarttime').removeClass('is-invalid');
				$('#editstarttime').addClass('is-valid');
			 	event.preventDefault();*/
		};
		if(description==""){
			document.getElementById("edit-description").innerHTML = "Please provide a desciption.";
	        $('#editdescription').addClass('is-invalid');
            event.preventDefault();
            return false;
		}else{
			document.getElementById("edit-description").innerHTML = "";	
				$('#editdescription').removeClass('is-invalid');
				$('#editdescription').addClass('is-valid');
			 	event.preventDefault();
		};
		if(edittotalTime=="0:0"){
			document.getElementById("edit-totalTime").innerHTML = "Invalid total time.";
	        $('#edit-totalTime').addClass('is-invalid');
            event.preventDefault();
            return false;
            
		}else{
		};
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#edit_overtime').hide();
		$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
	}else{
		document.getElementById("edit-endtime").innerHTML = "invalid end time.";
	        	$('#editendtime').addClass('is-invalid');
                event.preventDefault();
                return false;
	}
	});
		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_overtime').show();
		});
		$('.edit').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
			var employeeID 		= 	$('#editemployee').val().trim();
			var overtimedate 	= 	$('#editovertimedate').val().trim();
			var starttime 		= 	$('#editstarttime').val().trim();
			var endtime 		= 	$('#editendtime').val().trim();
			var totalhour 		= 	$('#edittotalTime').val().trim();
			var description 	= 	$('#editdescription').val().trim();
			/*var noted 			= 	$('#editnoted').val().trim();*/
    		$.ajax({
                url : "<?php echo site_url('overtime/update');?>",
                method : "POST",
                data : {id: 			id,
                	  	employeeID: 	employeeID, 	overtimedate: 		overtimedate,
                		starttime: 		starttime, 		endtime: 			endtime,
                		totalhour: 		totalhour, 	    description: 		description/*,
                		noted: 			noted*/},
                async : true,
                dataType : 'json',
                success: function(data){
					var result = data.split('|');
        			if(result[0]=="false"){
							document.getElementById("edit-employee").innerHTML = result[1];
				        	$('#editemployee').removeClass('is-valid');
				        	$('#editemployee').addClass('is-invalid');
				        	$('#edit-employee').addClass('invalid-feedback');
				        	$("#editemployee").focus();
				        	document.getElementById("edit-overtime").innerHTML = result[1];
				        	$('#editovertimedate').removeClass('is-valid');
				        	$('#editovertimedate').addClass('is-invalid');
				        	$('#edit-overtime').addClass('invalid-feedback');
						}else{
        					window.location.replace('<?php echo base_url(); ?>Overtime');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
		});	
	
     }); 		 
</script>