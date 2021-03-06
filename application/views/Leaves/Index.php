
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
    	<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Leave</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Leave</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Leave</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Employee's Leave</h4>
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th style="min-width: 90px ! important;">Leave Number</th>
								<th style="min-width: 260px ! important;">Employee Name</th>
								<th style="min-width: 70px ! important;">Leave Type</th>
								<th style="min-width: 70px ! important;">From</th>
								<th style="min-width: 70px ! important;">To</th>
								<th style="min-width: 70px ! important;">No. of Days</th>
								<th style="min-width: 70px ! important;">Status</th>
								<th style="min-width: 100px ! important;">Note</th>
								<th style="min-width: 50px ! important;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['record'] as $record):?>
							<tr>
								<td><?php echo 'LV-', str_pad($record->employeeleaveID, 6, "0", STR_PAD_LEFT); ?></td>
								<td>
								<div class="dash-card-content">	
								<a id="<?php echo $record->employeeleaveID ?>" class="avatar">
								 <?php	
	                            if($record->photo==""){
	                              echo '<img alt="" src="uploads/profileimg.png"></a> <p style="margin-left: 10px; color: black;">'.' '.$record->fullname.' <br> <span style="color:#888;display: block; font-size: 11px;">'.$record->department.' | ' .$record->designationdescription.'</span> </p> </div</td>';
	                            }else{
	                              echo '<img alt="" src="uploads/'.$record->photo.'" ></a> <div class="dash-card-content"><p style="margin-left: 10px; color: black;">'.' '.$record->fullname. ' <br> <span style="color:#888;display: block; font-size: 11px;">'.$record->department.' | ' .$record->designationdescription.' </span> </p> </div></div></td>';
	                            } ?>	
	                       	 </td>
								<td><?php echo $record->leavetypename ?></td>
								<td><?php echo  date("F d, Y", strtotime($record->leavefrom)) ?></td>
								<td><?php echo  date("F d, Y", strtotime($record->leaveto)) ?></td>
								<td style="text-align: center;"><?php echo $record->numberofdays ?></td>
								<td>
									<?php if($record->leavestatus=="Reviewed") 
								      echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> '.$record->leavestatus.'</span>';
								    else
								      echo '<span class="badge bg-inverse-info custom-status"><i class="fa fa-dot-circle-o text-info"></i> '.$record->leavestatus.'</span>';
								  	?>
								</td>
								<td><?php echo $record->noted ?></td>
								<td class="text-right">
						    <div class="dropdown dropdown-action">
						    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
						    <div class="dropdown-menu dropdown-menu-right">
						    <a class="dropdown-item edit_leave" href="#"
						   		 id="<?php echo $record->employeeleaveID; ?>" 
									data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
									class="btn btn-info btn-sm edit_leave" 
									data-toggle="modal" data-target="#edit_leave" 
									data-id="<?php echo $record->employeeleaveID; ?>" 
									data-leavetypeid="<?php echo $record->leavetypeID; ?>"
									data-employeeid="<?php echo $record->employeeID; ?>" 
									data-leavetypename="<?php echo $record->leavetypename; ?>" 
									data-leavefrom="<?php echo $record->leavefrom; ?>"
									data-leaveto="<?php echo $record->leaveto; ?>" 
									data-numberofdays="<?php echo $record->numberofdays; ?>" 
									data-editremainingleave="<?php echo $record->remainingleave; ?>" 
									data-reason="<?php echo $record->reason; ?>" 
									data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> Edit</a>
									
									<?php if($record->leavestatus!="Reviewed") { ?>
										<a class="dropdown-item changesnoted" 
										href="#" data-toggle="modal" data-target="#noted_employee"
										data-id="<?php echo $record->employeeleaveID; ?>" 
										data-noted="<?php echo $record->noted; ?>">
										<i class="fa fa-sticky-note"></i> Note</a>
									<?php } ?>
								<!-- <td class="text-right">
									<button type="button" 
									id="<?php echo $record->employeeleaveID; ?>" 
									data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
									class="btn btn-info btn-sm edit_leave" 
									data-toggle="modal" data-target="#edit_leave" 
									data-id="<?php echo $record->employeeleaveID; ?>" 
									data-leavetypeid="<?php echo $record->leavetypeID; ?>"
									data-employeeid="<?php echo $record->employeeID; ?>" 
									data-leavetypename="<?php echo $record->leavetypename; ?>" 
									data-leavefrom="<?php echo $record->leavefrom; ?>"
									data-leaveto="<?php echo $record->leaveto; ?>" 
									data-numberofdays="<?php echo $record->numberofdays; ?>" 
									data-remainingleave="<?php echo $record->remainingleave; ?>" 
									data-reason="<?php echo $record->reason; ?>" 
									data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> 
								</td>      -->
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	<!-- Add Leave Modal -->
	<div id="add_leave" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Leave</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="col-sm-12">
							<div class="form-group select-focus">
							<label for="description">Employee Name <code>*</code></label>
							<select class="form-control select2" id="addemployeeID" name="addemployeeID" style="width: 100%;" description="an employee name">
								<option value="">No Selected</option>
								<?php
								foreach($data['employee'] as $item)
								{
								echo '<option value="'.$item->employeeID.'">'.$item->fullname.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="add-employee"></div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Leave Type <code>*</code></label>
							<input type="hidden" id="hiddenaddleaveID" name="hiddenaddleaveID">
							<select class="form-control select2" id="addleaveID" name="addleaveID" style="width: 100%;"description="a leave type">
								<option value="">No Selected</option>
							</select>
							<div class="invalid-feedback" id="add-leave"></div>
							</div>
						</div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>From <span class="text-danger">*</span></label>
							
							<div class="cal-icon">
								<input class="form-control datetimepicker" id="addfrom" name="addfrom" data-date-format="YYYY-MM-DD" description="a start date">
								<div class="invalid-feedback" id="add-from"></div>	
							</div>	
							
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>To <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker"  id="addto" name="addto" data-date-format="YYYY-MM-DD" description="an end date">
								<div class="invalid-feedback" id="add-to"></div>
							</div>
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Number of days</label>
							<input class="form-control" readonly="" name="numberofdays"id="numberofdayss" type="text" description="a leave credit">
							<div class="invalid-feedback" id="add-totalTime"></div>
						</div>
						</div>
 						
							<div class="col-sm-12">	
							<div class="form-group">
								<label>Remaining Leaves</label>
							<input class="form-control" readonly="" id="addremainingleave" name="addremainingleave" description="a remaining leave">
							<div class="invalid-feedback" id="add-leavenumber"></div>
							</div>
							</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Leave Reason <span class="text-danger">*</span></label>
							<input type="text" class="form-control alphanumericwithspace"id="addreason"name="addreason" description="a reason for filing a leave">
							<div class="invalid-feedback" id="add-reason"></div>
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
	<!-- /Add Leave Modal -->
	<!-- Edit Leave Modal -->
	<div id="edit_leave" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Leave</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
							<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Employee Name <code>*</code></label>
							<select class="form-control select2" id="editemployee" name="editemployee" style="width: 100%;" description="employee name">
								<option value="">No Selected</option>
								<?php
								foreach($data['employee'] as $item)
								{
								echo '<option value="'.$item->employeeID.'">'.$item->fullname.'</option>';
								}
								?>  
							</select>
							<div class="invalid-feedback" id="edit-employee"></div>
							</div>
						</div> 

						<div class="col-sm-12">
							<div class="form-group">
							<label for="">Leave Type <code>*</code></label>
							<input type="hidden" id="hiddeneditleaveID" name="hiddeneditleaveID">
							<select class="form-control select2" id="editleaveID" name="editleaveID" style="width: 100%;"description="leave type">
							</select>
							<div class="invalid-feedback" id="edit-leave"></div>
							</div>
						</div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>From <span class="text-danger">*</span></label>
							
							<div class="cal-icon">
								<input class="form-control datetimepicker" id="editfrom" name="editfrom" data-date-format="YYYY-MM-DD" description="start date">
								<div class="invalid-feedback" id="edit-from"></div>	
							</div>	
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>To <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker"  id="editto" name="editto" data-date-format="YYYY-MM-DD" description="end date">
								<div class="invalid-feedback" id="edit-to"></div>
							</div>
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Number of days</label>
							<input class="form-control" readonly="" name="editnumberofdays"id="editnumberofdays" type="text">
							<input class="form-control" readonly="" name="editnumberofdays1"id="editnumberofdays1" type="text" hidden>
							<div class="invalid-feedback" id="edit-numberofdays"></div>
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<input class="form-control "  name="editnumberofdaysnumber"id="editnumberofdaysnumber" type="hidden">
						</div>
						</div>
							<div class="col-sm-12">	
							<div class="form-group">
							<label>Remaining Leaves</label>
							<input class="form-control" readonly="" id="editremainingleave" name="editremainingleave" description="remaining leave">
							<div class="invalid-feedback" id="edit-remainingleave"></div>
							</div>
							
							</div>				
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Leave Reason <span class="text-danger">*</span></label>
							<input type="text" class="form-control alphanumericwithspace"id="editreason"name="editreason" description="reason for filing a leave">
							<div class="invalid-feedback" id="edit-reason"></div>
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
	<!-- /Edit Leave Modal -->
	<!-- Approve Leave Modal -->
	<div class="modal custom-modal fade" id="approve_leave" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Leave Approve</h3>
						<p>Are you sure want to approve for this leave?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Approve</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Approve Leave Modal -->
	<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Add Leave</h3>
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
						<img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/questionmark.svg">
							<h3>Edit Leave</h3>
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

	<!-- Confirmation Modal -->
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


	
	<!-- Delete Leave Modal -->
	<div  class="modal custom-modal fade" id="delete_approve" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Leave</h3>
						<p>Are you sure want to delete this leave?</p>
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
	</div>
	
	<!-- /Delete Leave Modal -->
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
          <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/note.svg">
          <h3>Note</h3>
	       <p class="text-left text-purple mb-2" style="font-size: 1.1em;">Please enter any notes you have for this record:</p> 
         
          	<input class="form-control letterswithspace" id="editnoted" name="editnoted" description="note">
          	<div class="invalid-feedback" id="edit-editnoted"></div>
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

<!-- /Page Wrapper -->

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
  $(document).ready(function() {
  	var schedule = [];
  	var writtenDay = [];
  	var editschedule = [];
  	var editwrittenDay = [];
  	$('.select2').select2();
  	 $('#addemployeeID').change(function(){ 
   	 var id=$(this).val();
    $.ajax({
      url : "<?php echo site_url('Leaves/get_employeeleave');?>",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        html += '<option value="">No Selected</option>';
        for(i=0; i<data.length; i++){

          if($("#addleaveID").val()==data[i].leavetypeID){
          	html += /*'<option value="">No Selected</option>'+*/
            		'<option value='+data[i].leavetypeID+' selected>'+data[i].leavetypename+'</option>';
          }else{
          	html += /*'<option value="">No Selected</option>'+*/
           			'<option value='+data[i].leavetypeID+'>'+data[i].leavetypename+'</option>';
          }
        }
        $('#addleaveID').html(html);
      }
    });
    return false;

  });
   $('#editemployee').change(function(){ 

      var id=$(this).val();
 		 if(id!=null){
      $.ajax({
          url : "<?php echo site_url('Leaves/get_employeeleave');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){
               
              var html = '';
              var i;
               html += '<option value="">No Selected</option>';
              for(i=0; i<data.length; i++){
                if($("#hiddeneditleaveID").val()==data[i].leavetypeID){
                  	html += '<option value='+data[i].leavetypeID+' selected>'+data[i].leavetypename+'</option>';
                }else{
                	html += '<option value='+data[i].leavetypeID+'>'+data[i].leavetypename+'</option>';

                }
              }
              $('#editleaveID').html(html);
          }
      });
        }else{
            var html = '<option value="">No Selected</option>';
            $('#editleaveID').html(html);

          $("#editclient").prop("selectedIndex", 0);
          $("#editleaveID").val($("#editleaveID option:first").val());
        }
        return false;
    });
  // end of dropdown EMPLOYEE//
	$('#add_leave').on('hidden.bs.modal', function(){
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
		$('#edit_leave').on('hidden.bs.modal', function(){
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

	$("#addleaveID").change(function(){
		var id = $("#addemployeeID").val().trim(); 
	 	var leave = $(this).val();
	 	if(id!="") computeLeave(id,leave);
	});
	$("#addemployeeID").change(function(){
		var id = $(this).val(); 	
	 	var leave = $("#addleaveID").val();
	 	if(leave!="") computeLeave(id,leave);
	});	

	function computeLeave(id,leave){
		
		$.ajax({
	        url : "<?php echo site_url('Leaves/searchtotalleave');?>",
	        method : "POST",
	        data : {id: id, leave: leave},
	        async : true,
	        dataType : 'json',
	        success: function(response){
	        	if (!$.trim(response["leave"])){  
	        		var remainingleave = 0;
				    $('#addremainingleave').val(remainingleave);
				}
				else{   
				    for(var i=0; i<response["leave"].length; i++){
				    var remainingleave  = 	response["leave"][i].remainingleave;
				$('#addremainingleave').val(remainingleave);
				}
			}
				 schedule = [];
				for(var i=0; i<response["schedule"].length; i++){
		      		schedule[i] 		= response["schedule"][i].restday;
		      		 if (schedule[i] !== null || schedule[i] !== "" || !schedule[i]) {
				        schedule[i];
				      
				    }else{
				         schedule = 0;  
				    }
		      			
	      		}
			return false;
		}
	 });
		
	}
	$('#addfrom').on("dp.change", function() {
		var datefrom 	= 	$(this).val(); 
		var dateto 		= $("#addto").val().trim();
		if(datefrom!="") computedate(datefrom, dateto);
	});	

	$('#addto').on("dp.change", function() {
		var dateto 		= $(this).val(); 
		var datefrom 	= $("#addfrom").val().trim();
		if(dateto!="") computedate(datefrom, dateto);
	});	
	function computedate(datefrom, dateto){

		var start_date 	= 	moment(dateto, 'YYYY-MM-DD HH:mm:ss');
   		var end_date 	= 	moment(datefrom, 'YYYY-MM-DD HH:mm:ss');
   		
   		var duration 	= 	moment.duration(start_date.diff(end_date));
   		var days 		= 	duration.asDays() + 1 || 0;  
   			
   		var getDateArray = function(start_date, end_date) {
	    var arr = new Array();
	    var dt 	= new Date(start_date);

	    while (dt <= end_date) {	
	    arr.push(new Date(dt));
        dt.setDate(dt.getDate() + 1);
        
    }

    return arr;
  
	}
		var checkdateto1 	= new Date(end_date);
		var checkdatefrom1 	= new Date(start_date);
		var weekday = new Array(7);
		weekday[0]=  "7"; //Sunday
		weekday[1] = "1"; //Monday
		weekday[2] = "2";//Tuesday
		weekday[3] = "3";//Wednesday
		weekday[4] = "4";//Thursday
		weekday[5] = "5";//Friday
		weekday[6] = "6";//Saturday

		writtenDay = [];
		var dateArr = getDateArray(end_date, start_date);

		for (var i = 0; i < dateArr.length; i++) {
			 writtenDay[i] = weekday[dateArr[i].getDay()];

			var result = 0;
			var countNotMatched = 0;
			var array3 = writtenDay.filter(function(obj) { return schedule.indexOf(obj) <0; });
			var result = array3.length;	
			if( result <= 0){
   			result = 0;
   		 }else{
   		 	var result;
   		 	
   		}
		  } 
   		 $("#numberofdayss").val(result);
	}
	
	$("#editemployee").change(function(){
		var id 		= $(this).val(); 	
	 	var editleave 	= $("#editleaveID").val();	
	 	 if(id!="")  editcomputeLeave(id,editleave);
	});	
	$("#editleaveID").change(function(){
		var id 			= $("#editemployee").val(); 
	 	var editleave 	= $(this).val(); 
	 
	 	if(editleave!="") editcomputeLeave(id,editleave);
	});
		function editcomputeLeave(id,leave){
			
			if(leave==null){
				leave = $("#hiddeneditleaveID").val();	
				  $.ajax({
			        url : "<?php echo site_url('Leaves/editsearchtotalleave');?>",
			        method : "POST",
			        data : {id: id, leave: leave},
			        async : true,
			        dataType : 'json',
			        success: function(response){
						 editschedule = [];
						
						for(var i=0; i<response["schedule"].length; i++){
				      			editschedule[i] 		= response["schedule"][i].restday;
				      		 if (editschedule[i] !== null || editschedule[i] !== "" || !editschedule[i]) {
						        editschedule[i];  
						    }else{
						         editschedule = 0;  

						    }		
			      		}
				
			            return false;
					}
			 	 });
	}else{
				leave;
		$.ajax({
	        url : "<?php echo site_url('Leaves/editsearchtotalleave');?>",
	        method : "POST",
	        data : {id: id, leave: leave},
	        async : true,
	        dataType : 'json',
	        success: function(response){
	        	if (!$.trim(response["leave"])){  
	        		var editremainingleave = 0;
				    $('#editremainingleave').val(editremainingleave);
				}
				else{   
				    for(var i=0; i<response["leave"].length; i++){
				    var editremainingleave  = 	response["leave"][i].remainingleave;
				$('#editremainingleave').val(editremainingleave);
				}
			}
				 editschedule = [];
				
				for(var i=0; i<response["schedule"].length; i++){
		      			editschedule[i] 		= response["schedule"][i].restday;
		      		 if (editschedule[i] !== null || editschedule[i] !== "" || !editschedule[i]) {
				        editschedule[i];  

				    }else{
				         editschedule = 0;  

				    }		
	      		}
		
	            return false;
			}
	 	 });
		}
	}

	$('#editfrom').on("dp.change", function() {
		var datefrom = 	$(this).val(); 
		var dateto 	 = 	$("#editto").val().trim();
		
		if(datefrom!="") editcomputedate(datefrom, dateto);
	});	
	$('#editto').on("dp.change", function() {
		var dateto 	 = $(this).val(); 
		var datefrom = $("#editfrom").val().trim();
		if(dateto!="") editcomputedate(datefrom, dateto);
	});	
	function editcomputedate(datefrom, dateto){
		//var days = 0;
		var editstart_date = moment(dateto, 'YYYY-MM-DD HH:mm:ss');
   		var editend_date   = moment(datefrom, 'YYYY-MM-DD HH:mm:ss');
   		var duration   = moment.duration(editstart_date.diff(editend_date));
   		var days 	   = duration.asDays() + 1 || 0; 

   		var editgetDateArray = function(editstart_date, editend_date) {
	    var editarr = new Array();
	    var editdt 	= new Date(editstart_date);

	    while (editdt <= editend_date) {	
	    editarr.push(new Date(editdt));
        editdt.setDate(editdt.getDate() + 1);   
    }
    return editarr;
  
	}
	var editcheckdateto1 	= new Date(editend_date);
		var editcheckdatefrom1 	= new Date(editstart_date);
		var weekday = new Array(7);
		weekday[0]=  "7"; //Sunday
		weekday[1] = "1"; //Monday
		weekday[2] = "2";//Tuesday
		weekday[3] = "3";//Wednesday
		weekday[4] = "4";//Thursday
		weekday[5] = "5";//Friday
		weekday[6] = "6";//Saturday

		editwrittenDay = [];
		var editdateArr = editgetDateArray(editend_date, editstart_date);

		for (var i = 0; i < editdateArr.length; i++) {
			 editwrittenDay[i] = weekday[editdateArr[i].getDay()];
			 


			var editresult = 0;
			var countNotMatched = 0;
			var editarray3 = editwrittenDay.filter(function(obj) { return editschedule.indexOf(obj) <0; });
			var editresult = editarray3.length;	
			if( editresult <= 0){
   			editresult = 0;
   		 }else{
   		 	var editresult;	
   		}
	} 
   	 $("#editnumberofdays").val(editresult);
	}
	

	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployeeID','#addleaveID', '#addfrom', '#addto', '#numberofdayss','#addremainingleave', '#addreason'];
		var ErrorIDArray = ['add-employee','add-leave', 'add-from', 'add-to', 'add-totalTime','add-leavenumber', 'add-reason'];
		var ValueArray = [];	
		var firstRequired = "";

		var reason = $("#addreason").val();
		var addleaveID = $("#addleaveID").val();
		var addemployeeID = $("#addemployeeID").val();

		 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
	
		if($(IDArray[5]).val()=="0"){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Insufficient  " + $(IDArray[5]).attr("description") +".";
			$(IDArray[5]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}

			for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==5) continue;
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}
		if(addemployeeID===""){
			document.getElementById("add-employee").innerHTML = "Please provide an employee name.";
			$("[aria-labelledby='select2-addemployeeID-container']").addClass('is-invalid');
			$('#addemployeeID').addClass('is-invalid');
				event.preventDefault();
		}else{
			document.getElementById("add-employee").innerHTML = "";
			 $('#addemployeeID').removeClass('is-invalid');
			$("[aria-labelledby='select2-addemployeeID-container']").addClass('is-valid');
	        $('#addemployeeID').addClass('is-valid');
	        event.preventDefault();
		}
		if(addleaveID==""){
			document.getElementById("add-leave").innerHTML = "Please provide a leave type.";
			$("[aria-labelledby='select2-addleaveID-container']").addClass('is-invalid');
			$('#addleaveID').addClass('is-invalid');
				event.preventDefault();
		}else{
			document.getElementById("add-leave").innerHTML = "";
			$("[aria-labelledby='select2-addleaveID-container']").addClass('is-valid');
	        $('#addleaveID').addClass('is-valid');
	        event.preventDefault();
		}
		if($(IDArray[4]).val()=="0" || $(IDArray[4]).val()==""){
			document.getElementById("add-to").innerHTML = "Invalid chosen date.";
			$(IDArray[3]).removeClass('is-valid');
			$(IDArray[3]).addClass('is-invalid');
                event.preventDefault();
			return false;
		};
		if($(IDArray[5]).val()=="0"){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Insufficient  " + $(IDArray[5]).attr("description") +".";
			//$(IDArray[5]).removeClass('is-valid');
			$(IDArray[5]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}else{
		};
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#add_leave').hide();
		$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
		
	 });

	 $("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_leave').show();

		});
		$('.add').unbind('click').bind('click', function(){
			var leaveID 		= 	$("#addleaveID").val();
			var employeeID 		= 	$("#addemployeeID").val();
			var startdate 		=  	$("#addfrom").val();
			var enddate 		=  	$("#addto").val();
			var numberofdays 	=  	$("#numberofdayss").val();
			var remainingleave  =  	$("#addremainingleave").val();
			var reason 			=  	$("#addreason").val();

    		$.ajax({
                url : "<?php echo site_url('Leaves/save');?>",
                method : "POST",
                data : {leaveID: 		leaveID , 		employeeID: 	employeeID,
                		startdate: 		startdate, 		enddate: 		enddate,
                		numberofdays: 	numberofdays, 	remainingleave: remainingleave, 
                		reason: 		reason},
                async : true,
                dataType : 'json',
                success: function(data){
                var result = data.split('|');
        			if(result[0]=="false"){
							document.getElementById("add-leave").innerHTML = result[1];
				        	$('#addleaveID').removeClass('is-valid');
				        	$('#addleaveID').addClass('is-invalid');
				        	$('#add-leave').addClass('invalid-feedback');
				        	$("#addleaveID").focus();
				        	document.getElementById("add-employee").innerHTML = result[1];
				        	$('#addemployeeID').removeClass('is-valid');
				        	$('#addemployeeID').addClass('is-invalid');
				        	$('#add-employee').addClass('invalid-feedback');
						}else{
        					window.location.replace('<?php echo base_url(); ?>Leaves');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	  	});
	  	$("#editleaveID").val($(this).data('leavetypeid'));

		$('.edit_leave').unbind('click').bind('click', function(){
		$(".modal-body #hiddeneditleaveID").val( $(this).data('leavetypeid'));
		$(".modal-body #editemployee").val($(this).data('employeeid'));
		$(".modal-body #editemployee").trigger("change");
		$(".modal-body #editleaveID").val($(this).data('leavetypeid'));
		$(".modal-body #editleaveID").trigger("change");
		$(".modal-body #editfrom").val($(this).data('leavefrom'));
		$(".modal-body #editto").val($(this).data('leaveto'));
		$(".modal-body #editnumberofdays").val($(this).data('numberofdays'));
		$(".modal-body #editnumberofdays1").val($(this).data('numberofdays'));
		$(".modal-body #editnumberofdaysnumber").val($(this).data('numberofdays'));
		$(".modal-body #editremainingleave").val($(this).data('editremainingleave'));
		$(".modal-body #editremainingleavetotal").val($(this).data('numberofdays'));
		$(".modal-body #editreason").val( $(this).data('reason'));
		$('.edit').attr('id', $(this).data('id'));
     });
		$('.update').unbind('click').bind('click', function(){
		var id = $(this).attr('id');
		var IDArray = ['#editemployee', '#editleaveID', '#editfrom', '#editto', '#editnumberofdays', '#editremainingleave', '#editreason'];
		var ErrorIDArray = ['edit-employee', 'edit-leave', 'edit-from', 'edit-to', 'edit-numberofdays', 'edit-remainingleave', 'edit-reason'];
		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var reason = $("#editreason").val();
		var editemployeeID = $("#editemployee").val();
		var editleaveID = $("#editleaveID").val();
		var editfrom = $("#editfrom").val();

		 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
	

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==5) continue;
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()==""){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}
		if(editemployeeID==""){
			document.getElementById("edit-employee").innerHTML = "Please provide an employee name.";
			$("[aria-labelledby='select2-editemployee-container']").addClass('is-invalid');
			$('#editemployee').addClass('is-invalid');
				event.preventDefault();
		}else{
			document.getElementById("edit-employee").innerHTML = "";
			$("[aria-labelledby='select2-editemployee-container']").addClass('is-valid');
	        $('#editemployee').addClass('is-valid');
	        event.preventDefault();
		}
		if(editleaveID==""){
			document.getElementById("edit-leave").innerHTML = "Please provide a leave type.";
			$("[aria-labelledby='select2-editleaveID-container']").addClass('is-invalid');
			$('#editleaveID').addClass('is-invalid');
				event.preventDefault();
		}else{
			document.getElementById("edit-leave").innerHTML = "";
			$("[aria-labelledby='select2-editleaveID-container']").addClass('is-valid');
	        $('#editleaveID').addClass('is-valid');
	        event.preventDefault();
		}
		if($(IDArray[4]).val()=="0" || $(IDArray[4]).val()==""){
			document.getElementById("edit-to").innerHTML = "Invalid chosen date.";
			$(IDArray[3]).removeClass('is-valid');
			$(IDArray[3]).addClass('is-invalid');
                event.preventDefault();
			return false;
		};
		if($(IDArray[5]).val()=="0"){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Insufficient  " + $(IDArray[5]).attr("description") +".";
			$(IDArray[5]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}else{
		};
		if($(IDArray[4]).val() - 1 > $(IDArray[5]).val()){	
			document.getElementById(ErrorIDArray[4]).innerHTML = "Invalid chosen date.";
			$(IDArray[4]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
		};		
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#edit_leave').hide();
		$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}	
	 });
	$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_leave').show();

		});
	$('.edit').unbind('click').bind('click', function(){
		var id 						= 	$(this).attr('id');
		var leaveID 				= 	$('#editleaveID').val().trim();
		var employeeID 				= 	$('#editemployee').val().trim();
		var startdate 				= 	$('#editfrom').val().trim();
		var enddate 				= 	$('#editto').val().trim();
		var numberofdays 			= 	$('#editnumberofdays').val().trim();
		var remainingleave 			= 	$('#editremainingleave').val().trim();
		var reason 					= 	$('#editreason').val().trim();
		var originalvalue = $("#editnumberofdaysnumber").val();
		var newvalue = $("#editnumberofdays").val();
		var remainingLeaves = $("#editremainingleave").val()
		var minusdays =  $("#editnumberofdaysnumber").val();
		var lessLeave;
		var ifSuccess = false;
		if(originalvalue!=newvalue){
			// DAGDAG LEAVE
			if(newvalue > originalvalue){
			var lessLeave =  newvalue - originalvalue;
			ifSuccess = true;
			if(lessLeave > remainingLeaves){
				document.getElementById("edit-remainingleave").innerHTML = "Insufficient credit remaining leave.";
				$(IDArray[4]).addClass('is-invalid');
                event.preventDefault();
				return false;
				}else{
					//////// subract leave
					var lessLeave1 =  parseInt(newvalue,10) - parseInt(minusdays,10);
					var lessLeave = parseInt(remainingLeaves,10) - parseInt(lessLeave1,10);
					ifSuccess = true;
				}
			// add creadit leave
			}else{
				//alert(originalvalue + + newvalue);
				var lessLeave12 =  parseInt(originalvalue,10) - parseInt(newvalue,10);
				var lessLeave =  parseInt(remainingLeaves,10) + parseInt(lessLeave12,10);	
				ifSuccess = true;
			}
		}else{
			//alert(remainingLeaves);
			var lessLeave =  parseInt(remainingLeaves,10);
			ifSuccess = true;
		}
		if(ifSuccess==true){
		
		$.ajax({
			url : "<?php echo site_url('Leaves/update');?>",
			method : "POST",
			data : {id:id,
			leaveID: 			leaveID, 			employeeID: 		employeeID,
			startdate: 			startdate, 			enddate: 			enddate,
			numberofdays: 		numberofdays, 		remainingleave: 	numberofdays, 
			reason: 			reason, 			lessLeave: 			lessLeave},
			async : true,
			dataType : 'json',
			success: function(data){
			var result = data.split('|');
			if(result[0]=="false"){
			document.getElementById("edit-leave").innerHTML = result[1];
			$('#editleaveID').removeClass('is-valid');
			$('#editleaveID').addClass('is-invalid');
			$('#edit-leave').addClass('invalid-feedback');
			$("#editleaveID").focus();
			document.getElementById("edit-employee").innerHTML = result[1];
			$('#editemployee').removeClass('is-valid');
			$('#editemployee').addClass('is-invalid');
			$('#edit-employee').addClass('invalid-feedback');
			}else{
			window.location.replace('<?php echo base_url(); ?>Leaves');
			}
			},
			error: function(request, textStatus, error) {
			}
		});
		return false;
		}

		});	
		
	$('.changesnoted').unbind('click').bind('click', function(){
     $(".modal-body #editnoted").val( $(this).data('noted'));
     $('.editnote').attr('id', $(this).data('id'));
    
    });

    $('.updatenote').unbind('click').bind('click', function(){
        var id    =   $(this).attr('id');
        var noted =   $('#editnoted').val().trim();
        $('#noted_employee').hide();
		$('#confirmation_noteedit').modal({backdrop: 'static', keyboard: false},'show');
		
     });    
     $("#cncl-editnote").unbind('click').bind('click', function(){
			$('#confirmation_noteedit').modal('hide');
			$('#noted_employee').show();
		});
$('.editnote').unbind('click').bind('click', function(){
		var id 				= 	$(this).attr('id');
		var noted 			= 	$('#editnoted').val().trim();
		
		$.ajax({
			url : "<?php echo site_url('Leaves/updatenoted');?>",
			method : "POST",
			data : {id:     id,
			noted: 			noted},
			async : true,
			dataType : 'json',
			success: function(data){
		var result = data.split('|');
            			if(result[0]=="false"){
							document.getElementById("edit-postname").innerHTML = result[1];
				        	$('#editnoted').addClass('is-invalid');
							$('#confirmation_noteedit').modal('hide');
				        	$('#editnoted').show();
				        	$("#editnoted").focus(); 
            			}else{
        					window.location.replace('<?php echo base_url(); ?>Leaves');
            			}
	                },
	                error: function(request, textStatus, error) {

	            	}
	            });
	            return false;		

				
});

}); 		

</script>