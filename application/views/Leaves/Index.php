<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Leaves</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Leaves</li>
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
					<table class="table table-striped custom-table mb-0 datatable">
						<thead>
							<tr>
								<th>Leave No</th>
								<th>Employee</th>
								<th>Leave Type</th>
								<th>From</th>
								<th>To</th>
								<th>No of Days</th>
								<th>Reason</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['record'] as $record):?>
							<tr>
								<td><?php echo $record->employeeleaveID ?></td>
								<td>
								<a id="<?php echo $record->employeeleaveID ?>" class="avatar">
								 <?php	
	                            if($record->photo==""){
	                              echo '<img alt="" src="uploads/profileimg.png"></a>'.' '.$record->fullname.'</td>';
	                            }else{
	                              echo '<img alt="" src="uploads/'.$record->photo.'" ></a>'.' '.$record->fullname.'</td>';
	                            } ?>	
	                       	 </td>
								<td><?php echo $record->leavetypename ?></td>
								<td><?php echo $record->leavefrom ?></td>
								<td><?php echo $record->leaveto ?></td>
								<td><?php echo $record->numberofdays ?></td>
								<td><?php echo $record->reason ?></td>
								<td class="text-right">
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
								</td>     
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
							<div class="form-group">
							<label for="description">Employee<code>*</code></label>
							<select class="form-control" id="addemployeeID" name="addemployeeID" style="width: 100%;" description="employee name">
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
							<label for="description">Leave Type<code>*</code></label>
							<input type="hidden" id="hiddenaddleaveID" name="hiddenaddleaveID">
							<select class="form-control" id="addleaveID" name="addleaveID" style="width: 100%;"description="leave type">
								<option value="">No Selected</option>
							</select>
							<div class="invalid-feedback" id="add-leave"></div>
							</div>
						</div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>From <span class="text-danger">*</span></label>
							
							<div class="cal-icon">
								<input class="form-control datetimepicker" id="addfrom" name="addfrom" data-date-format="DD/MM/YYYY" description="start date">
							</div>	
							<div class="invalid-feedback" id="add-from"></div>	
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>To <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker"  id="addto" name="addto" data-date-format="DD/MM/YYYY" description="end date">
							</div>
							<div class="invalid-feedback" id="add-to"></div>
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Number of days</label>
							<input class="form-control" readonly="" name="numberofdays"id="numberofdayss" type="text" description="credit">
							<div class="invalid-feedback" id="add-totalTime"></div>
						</div>
						</div>
 						
							<div class="col-sm-12">	
							<div class="form-group">
								<label>Remaining Leaves</label>
							<input class="form-control" readonly="" id="addremainingleave" name="addremainingleave" description="leave">
							<div class="invalid-feedback" id="add-leavenumber"></div>
							</div>
							</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Leave Reason <span class="text-danger">*</span></label>
							<input type="text" class="form-control alphanumericwithspace"id="addreason"name="addreason" description="reason">
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
							<label for="description">Employee<code>*</code></label>
							<select class="form-control" id="editemployee" name="editemployee" style="width: 100%;" description="employee name">
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
							<label for="">Leave Type<code>*</code></label>
							<input type="hidden" id="hiddeneditleaveID" name="hiddeneditleaveID">
							<select class="form-control" id="editleaveID" name="editleaveID" style="width: 100%;"description="leave type">
							</select>
							<div class="invalid-feedback" id="edit-leave"></div>
							</div>
						</div> 
						<div class="col-sm-12">
						<div class="form-group">
							<label>From <span class="text-danger">*</span></label>
							
							<div class="cal-icon">
								<input class="form-control datetimepicker" id="editfrom" name="editfrom" data-date-format="DD/MM/YYYY" description="start date">
							</div>	
							<div class="invalid-feedback" id="edit-from"></div>	
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>To <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker"  id="editto" name="editto" data-date-format="DD/MM/YYYY" description="end date">
							</div>
							<div class="invalid-feedback" id="edit-to"></div>
						</div>
						</div>
						<div class="col-sm-12">	
						<div class="form-group">
							<label>Number of days</label>
							<input class="form-control" readonly="" name="editnumberofdays"id="editnumberofdays" type="text">
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
							<input type="text" class="form-control alphanumericwithspace"id="editreason"name="editreason" description="reason">
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
							<h3>Confirmation Message</h3>
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
							<h3>Confirmation Message</h3>
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

	
	<!-- Delete Leave Modal -->
	<div class="modal custom-modal fade" id="delete_approve" role="dialog">
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
	<!-- /Delete Leave Modal -->	
</div>
<!-- /Page Wrapper -->

<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
<!--

<!-- /Page Wrapper -->
<script  type="text/javascript">  
  $(document).ready(function() {
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
        for(i=0; i<data.length; i++){
          if($("#addleaveID").val()==data[i].leavetypeID){
            html += '<option value='+data[i].leavetypeID+' selected>'+data[i].leavetypename+'</option>';
          }else{
            html += '<option value='+data[i].leavetypeID+'>'+data[i].leavetypename+'</option>';
          }
        }
        $('#addleaveID').html(html);
      }
    });
    return false;

  });
   $('#editemployee').change(function(){ 
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
              for(i=0; i<data.length; i++){
              	console.log(data[i]);
                if($("#hiddeneditleaveID").val()==data[i].leavetypeID){
                  html += '<option value='+data[i].leavetypeID+' selected>'+data[i].leavetypename+'</option>';
                }else{
                  html += '<option value='+data[i].leavetypeID+'>'+data[i].leavetypename+'</option>';
                }
              }
              $('#editleaveID').html(html);
          }
      });
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
	}); 
		$('#edit_leave').on('hidden.bs.modal', function(){
	    $(this).find('form')[0].reset();
	    $(".invalid-feedback").html("");
		$('input').removeClass('is-invalid');
		$('input').removeClass('is-valid');
		$('select').removeClass('is-invalid');
		$('select').removeClass('is-valid');
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
	        	if (!$.trim(response)){  
	        		var remainingleave = 0;
				    $('#addremainingleave').val(remainingleave);
				}
				else{   
				    var len 			= 	response.length;
				     for(var i=0; i<len; i++){
				    var remainingleave  = 	response[i].remainingleave;
				    console.log(remainingleave);
				$('#addremainingleave').val(remainingleave);
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
		var start_date 	= 	moment(dateto, 'DD-MM-YYYY HH:mm:ss');
   		var end_date 	= 	moment(datefrom, 'DD-MM-YYYY HH:mm:ss');
   		var duration 	= 	moment.duration(start_date.diff(end_date));
   		var days 		= 	duration.asDays() + 1;  
   		if( days <= 0){
   			var days = 0;
   		 }else{
   		 	var days;
   		} 	
   		 $("#numberofdayss").val(days);
	}
	$('#editfrom').on("dp.change", function() {
		var datefrom = 	$(this).val(); 
		var dateto 	 = 	$("#editto").val().trim();
		console.log(datefrom);
		if(datefrom!="") editcomputedate(datefrom, dateto);

	});	
	$('#editto').on("dp.change", function() {
		var dateto 	 = $(this).val(); 
		var datefrom = $("#editfrom").val().trim();
		if(dateto!="") editcomputedate(datefrom, dateto);
	});	
	function editcomputedate(datefrom, dateto){
		var start_date = moment(dateto, 'DD-MM-YYYY HH:mm:ss');
   		var end_date   = moment(datefrom, 'DD-MM-YYYY HH:mm:ss');
   		var duration   = moment.duration(start_date.diff(end_date));
   		var days 	   = duration.asDays() + 1;  
   		if( days <= 0){
   			var days = 0;
   		 }else{
   		 	var days;
   		} 	
		
   		 $("#editnumberofdays").val(days);
	}
	$("#editleaveID").change(function(){
		var id 		= $("#editemployee").val().trim(); 
	 	var leave 	= $(this).val();
	 	if(id!="") editcomputeLeave(id,leave);
	});
	$("#editemployee").change(function(){
		var id 		= $(this).val(); 	
	 	var leave 	= $("#editleaveID").val();
	 	if(leave!="") editcomputeLeave(id,leave);
	});	

	function editcomputeLeave(id,leave){
		$.ajax({
	        url : "<?php echo site_url('Leaves/searchtotalleave');?>",
	        method : "POST",
	        data : {id: id, leave: leave},
	        async : true,
	        dataType : 'json',
	        success: function(response){
	        	var len ="";
	        	var len = response.length;
	            for(var i=0; i<len; i++){
	            var remainingleave = response[i].remainingleave;

				$('#editremainingleave').val(remainingleave);
			  }
			}
	 	 });
		return false;
	}
	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addleaveID', '#addemployeeID', '#addfrom', '#addto', '#numberofdayss','#addremainingleave', '#addreason'];
		var ErrorIDArray = ['add-leave', 'add-employee', 'add-from', 'add-to', 'add-totalTime','add-leavenumber', 'add-reason'];
		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;
		var reason = $("#addreason").val();
		if(/^[a-zA-Z0-9- ,_]*$/.test(reason) == false){
			document.getElementById(ErrorIDArray[6]).innerHTML = "Invalid input" ;
			$(IDArray[6]).addClass('is-invalid');

			event.preventDefault();
			return false;
		}else{
			document.getElementById(ErrorIDArray[6]).innerHTML = "";
			$(IDArray[6]).removeClass('is-invalid');
			$(IDArray[6]).addClass('is-valid');
			event.preventDefault();
		};

		if($(IDArray[4]).val()=="0"){
			document.getElementById(ErrorIDArray[4]).innerHTML = "Invalid  Dates ";
			$(IDArray[4]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}

		if($(IDArray[5]).val()=="0"){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Insufficient  " + $(IDArray[5]).attr("description") +".";
			$(IDArray[5]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}
		if($(IDArray[4]).val() - 1 > $(IDArray[5]).val()){	
			document.getElementById(ErrorIDArray[4]).innerHTML = "Insufficient " + $(IDArray[4]).attr("description") +".";
			$(IDArray[4]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
			

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==4 || i==5)  continue;
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()==""){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide a " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		
		}
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#add_leave').hide();
		$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
		
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
        					window.location.replace('<?php echo base_url(); ?>leaves');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	  	});

		$('.edit_leave').unbind('click').bind('click', function(){
		$(".modal-body #hiddeneditleaveID").val( $(this).data('leavetypeid'));
		$(".modal-body #editleaveID").val($(this).data('leavetypeid'));
		$(".modal-body #editemployee").val($(this).data('employeeid'));
		$(".modal-body #editemployee").trigger("change");
		$(".modal-body #editfrom").val($(this).data('leavefrom'));
		$(".modal-body #editto").val($(this).data('leaveto'));
		$(".modal-body #editnumberofdays").val($(this).data('numberofdays'));
		$(".modal-body #editnumberofdaysnumber").val($(this).data('numberofdays'));
		$(".modal-body #editremainingleave").val($(this).data('remainingleave'));
		$(".modal-body #editremainingleavetotal").val($(this).data('numberofdays'));
		$(".modal-body #editreason").val( $(this).data('reason'));
		$('.edit').attr('id', $(this).data('id'));
     });
		$('.update').unbind('click').bind('click', function(){
		var id = $(this).attr('id');
		var IDArray = ['#editleaveID', '#editemployee', '#editfrom', '#editto', '#editnumberofdays', '#editremainingleave', '#editreason'];
		var ErrorIDArray = ['edit-leave', 'edit-employee', 'edit-from', 'edit-to', 'edit-numberofdays', 'edit-remainingleave', 'edit-reason'];
		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var reason = $("#editreason").val();
		if($(IDArray[4]).val()=="0"){
			document.getElementById(ErrorIDArray[4]).innerHTML = "Invalid  Dates ";
			$(IDArray[4]).addClass('is-invalid');
                event.preventDefault();
			return false;
		};

		if(/^[a-zA-Z0-9- ,_]*$/.test(reason) == false){
			document.getElementById(ErrorIDArray[6]).innerHTML = "Invalid input" ;
			$(IDArray[6]).addClass('is-invalid');

			event.preventDefault();
			return false;
		}else{
			document.getElementById(ErrorIDArray[6]).innerHTML = "";
			$(IDArray[6]).removeClass('is-invalid');
			$(IDArray[6]).addClass('is-valid');
			event.preventDefault();
		};
		if($(IDArray[5]).val()=="0"){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Insufficient  " + $(IDArray[5]).attr("description") +".";
			$(IDArray[5]).addClass('is-invalid');
                event.preventDefault();
			return false;
		}else{
			document.getElementById(ErrorIDArray[5]).innerHTML = "";
			$(IDArray[5]).removeClass('is-invalid');
			$(IDArray[5]).addClass('is-valid');
			event.preventDefault();
		};
		if($(IDArray[4]).val() - 1 > $(IDArray[5]).val()){	
			document.getElementById(ErrorIDArray[4]).innerHTML = "Invalid  Dates";
			$(IDArray[4]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
			
		
		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==4 || i==5)  continue;
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide a " + $(IDArray[i]).attr("description") +".";
	        	$(IDArray[i]).addClass('is-invalid');
                event.preventDefault();
			}else{
			    document.getElementById(ErrorIDArray[i]).innerHTML = "";	
				$(IDArray[i]).removeClass('is-invalid');
				$(IDArray[i]).addClass('is-valid');
			 	event.preventDefault();
			}
		}
		$(firstRequired).focus();
		if(firstRequired==""){
		if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
		$('#edit_leave').hide();
		$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
		}			
	 });
	$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_leave').show();

		});
	$('.edit').unbind('click').bind('click', function(){
		var id 				= 	$(this).attr('id');
		var leaveID 		= 	$('#editleaveID').val().trim();
		var employeeID 		= 	$('#editemployee').val().trim();
		var startdate 		= 	$('#editfrom').val().trim();
		var enddate 		= 	$('#editto').val().trim();
		var numberofdays 	= 	$('#editnumberofdays').val().trim();
		var remainingleave 	= 	$('#editremainingleave').val().trim();
		var reason 			= 	$('#editremainingleave').val().trim();
		var originalvalue 	= 	$("#editnumberofdaysnumber").val();
		var newvalue 		= 	$("#editnumberofdays").val();
		var remainingLeaves = 	$("#editremainingleave").val()
		var minusdays 		=  	$("#editnumberofdaysnumber").val();
		var lessLeave;
		var ifSuccess 		= false;
		if(originalvalue!=newvalue){
		// DAGDAG LEAVE
			if(newvalue > originalvalue){
			var lessLeave 	=  newvalue - originalvalue;
			ifSuccess 		= true;
			if(lessLeave > remainingLeaves){
				document.getElementById("edit-remainingleave").innerHTML = "Insufficient credit remaining leave.";
				$('#editremainingleave').addClass('is-invalid');
				event.preventDefault();
				return false;
				}else{
				var lessLeave =   	parseInt(newvalue,10) - parseInt(originalvalue,10);
				ifSuccess = true;
			}
			// add creadit leave
			}else{
			var lessLeave1 	 =  	parseInt(newvalue,10) - parseInt(minusdays,10)  ;
			var lessLeave 	 = 		parseInt(remainingLeaves,10) - parseInt(lessLeave1,10);

			ifSuccess = true;
			}
		}else{
		var lessLeave 		=  		parseInt(originalvalue,10);

		ifSuccess = true;
		}
			/*var lessLeave = parseInt(originalvalue,10) - parseInt(newvalue,10)
			alert(originalvalue + " " +  newvalue);*/
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
			window.location.replace('<?php echo base_url(); ?>leaves');
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