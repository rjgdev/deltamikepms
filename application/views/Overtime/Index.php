<?php 
$start = strtotime('12:00 AM');
$end   = strtotime('11:59 PM');
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Overtime</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Overtime</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_overtime"><i class="fa fa-plus"></i> Add Overtime</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								<th>Overtime No.</th>
								<th>Employee Name</th>
								<th>Department/Position</th>
								<th>Overtime Date</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th>Total Hour</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="showdata">
							<?php foreach ($data['record'] as $item): ?>
							<tr>
								<td><?php echo str_pad($item->overtimeid, 6, "0", STR_PAD_LEFT);  ?></td>
							<td>
                            <a id="<?php echo $item->employeeID; ?>" class="avatar">
                            <?php	
                            if($item->photo==""){
                              echo '<img alt="" src="uploads/profileimg.png"></a>'.' '.$item->fullname.'</td>';
                            }else{
                              echo '<img alt="" src="uploads/'.$item->photo.'" ></a>'.' '.$item->fullname.'</td>';
                            } ?>
                           </td> 
								<td><?php echo $item->positionDescription ?></td>
								 <td><?php echo $item->overtimedate ?></td>
								<td><?php echo $item->starttime ?></td>
								<td><?php echo $item->endtime ?></td>
								<td><?php echo $item->totalhour ?></td>
								<div class="dropdown dropdown-action">
								</div>
								<td class="text-right">
									<button type="button" id="<?php echo $item->overtimeid	; ?>" class="btn btn-info btn-sm edit_overtime" data-toggle="modal" data-target="#edit_overtime" data-id="<?php echo $item->overtimeid; ?>" data-employeeid="<?php echo $item->employeeID; ?>"  data-description="<?php echo $item->description; ?>" data-overtimedate="<?php echo $item->overtimedate; ?>" data-starttime="<?php echo $item->starttime; ?>" data-endtime="<?php echo $item->endtime; ?>" data-totalhour="<?php echo $item->totalhour; ?>" data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> 
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
	                            <select class="form-control" id="addemployee" name="addemployee" style="width: 100%;"  description="employee name" required>
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
								<input Class="form-control" id="totalTime"name="totalTime" readonly="readonly" />	
							</div>
						</div
						>
					 <div class="col-sm-12">	
						<div class="form-group">
							<label>Description <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="adddescription" name="adddescription" description="Description">
							<div class="invalid-feedback" id="add-description"></div>
						</div>
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
	                            <select class="form-control" id="editemployee" name="editemployee" style="width: 100%;" description="employee name" >
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
									<input class="form-control" type="text" style="width: 100%;" name="editstarttime" id="editstarttime" description="start time">
								<div class="invalid-feedback" id="edit-starttime"></div>
							</div>
						</div>	
						<div class="col-sm-12">	
							<div class="form-group">
								<label>End Time <span class="text-danger">*</span></label>	
								<input class="form-control" type="text" style="width: 100%;" name="editendtime" id="editendtime" description="end time">
							<div class="invalid-feedback" id="edit-endtime"></div>
							</div>
						</div>
						<div class="col-sm-12">	
							<div class="form-group">
								<label>Total Time</label>	
								<input Class="form-control" id="edittotalTime"name="edittotalTime" readonly="readonly" />	
							</div>
						</div>
					 <div class="col-sm-12">	
						<div class="form-group">
							<label>Description <span class="text-danger">*</span></label>
							<input id="editdescription" name="editdescription" class="form-control" description="description">
							<div class="invalid-feedback" id="edit-description"></div>
						</div>
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
	<!-- /Delete Overtime Modal -->
	
</div>
<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
<!-- /Page Wrapper -->
<script  type="text/javascript">  
  $(document).ready(function() {
 		//Clear Modal//
		$('#add_overtime').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
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
		var dtStart = new Date("7/20/2019 " + $starttime.val());
        var dtEnd = new Date("7/20/2019 " + $endtime.val());
         var startminute   =   dtStart.getMinutes();
        var endminute   =   dtEnd.getMinutes();
        var diff = (dtEnd - dtStart) /60000;
        var hr = Math.floor(diff/60)
		/*var totalminute = new Date($start);
		 totalminute.setMinutes(end.getMinutes() - dtStart);*/
        if(startminute <= 1){
        	 var totalminute = dtStart.getMinutes() - dtEnd.getMinutes();
        }else{
        	var totalminute =  dtEnd.getMinutes() - dtStart.getMinutes();
        }	
        if( hr <= 0){
        	 var hr = 0;
        	 var totalminute = 0;
        }else{
        	var hr; 
        	var totalminute;
        }	
        var diff = hr + ":" + totalminute; 
        $("#totalTime").val(diff);

	}	
    $("#addendtime").change(function(){
  		var $start = $("#addstarttime");
  		var $end = $("#addendtime");
  		var $diff = $("#totalTime");	
  		var dtStart = new Date("7/20/2019 " + $start.val());
        var dtEnd = new Date("7/20/2019 " + $end.val());
        var startminute   =   dtStart.getMinutes();
        var endminute   =   dtEnd.getMinutes();
        var diff = (dtEnd - dtStart) /60000;
        var hr = Math.floor(diff/60)
		/*var totalminute = new Date($start);
		 totalminute.setMinutes(end.getMinutes() - dtStart);*/
        if(startminute <= 1){
        	 var totalminute = dtStart.getMinutes() - dtEnd.getMinutes();
        }else{
        	var totalminute =  dtEnd.getMinutes() - dtStart.getMinutes();
        }	
        if( hr <= 0){
        	 var hr = 0;
        	 var totalminute = 0;
        }else{
        	var hr; 
        	var totalminute;
        }	
        var diff = hr + ":" + totalminute; 
        $("#totalTime").val(diff);
     });
     $("#editendtime").change(function(){
  		var $start = $("#editstarttime");
  		var $end = $("#editendtime");
  		var $diff = $("#edittotalTime");	
  		var dtStart = new Date("7/20/2019 " + $start.val());
        var dtEnd = new Date("7/20/2019 " + $end.val());
        var startminute   =   dtStart.getMinutes();
        var endminute   =   dtEnd.getMinutes();
        var diff = (dtEnd - dtStart) /60000;
        var hr = Math.floor(diff/60)
        if(startminute <=0){
        	 var totalminute = startminute - endminute;
        }else{
        	var totalminute =  endminute - startminute 
        }	
        if( hr <= 0){
        	 var hr = 0;
        	 var totalminute = 0;
        }else{
        	var hr; 
        	var totalminute;
        }	
        var diff = hr + ":" + totalminute; 
        $("#edittotalTime").val(diff);
     });
   

	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployee', '#addovertimedate', '#addstarttime', '#addendtime', '#totalTime', '#adddescription'];

		var ErrorIDArray = ['add-employee', 'add-overtime', 'add-starttime', 'add-endtime', 'add-totalTime', 'add-description'];

		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==4) continue;
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
    		$.ajax({
                url : "<?php echo site_url('overtime/save');?>",
                method : "POST",
                data : {employeeID: ValueArray[0], 		overtimedate: ValueArray[1],
                		starttime: ValueArray[2], 		endtime: ValueArray[3],
                		totalhour: ValueArray[4], 	    description: ValueArray[5]},
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
        					window.location.replace('<?php echo base_url(); ?>overtime');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	  	}
	});	

		$('.edit_overtime').unbind('click').bind('click', function(){
		$(".modal-body #editemployee").val( $(this).data('employeeid'));
		$(".modal-body #editovertimedate").val( $(this).data('overtimedate'));
		$(".modal-body #editstarttime").val( $(this).data('starttime'));
		$(".modal-body #editendtime").val( $(this).data('endtime'));
		$(".modal-body #edittotalTime").val( $(this).data('totalhour'));
		$(".modal-body #editdescription").val( $(this).data('description'));
		$('.update').attr('id', $(this).data('id'));
         }); 

		$('.update').unbind('click').bind('click', function(){
		var IDArray = ['#editemployee', '#editovertimedate', '#editstarttime', '#editendtime', '#edittotalTime', '#editdescription'];

		var ErrorIDArray = ['edit-employee', 'edit-overtime', 'edit-starttime', 'edit-endtime', 'edit-totalTime', 'edit-description'];

		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==4) continue;
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
    		$.ajax({
                url : "<?php echo site_url('overtime/update');?>",
                method : "POST",
                data : {id:id,
                	  	employeeID: ValueArray[0], 		overtimedate: ValueArray[1],
                		starttime: ValueArray[2], 		endtime: ValueArray[3],
                		totalhour: ValueArray[4], 	    description: ValueArray[5]},
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
        					window.location.replace('<?php echo base_url(); ?>overtime');
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