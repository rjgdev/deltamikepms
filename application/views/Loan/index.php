<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Loan</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Loan</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_loan"><i class="fa fa-plus"></i> Add Loan</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								  <th style="width: 20px ! important;">Reference#</th>
								  <th>Employee Name</th>
			                      <th>Loan Type</th>
			                      <th>Term of Payment</th>
			                      <th>Start Date</th>
			                      <th>End Date</th>
			                      <th>Amount</th>
			                      <th>Deduction</th>
			                      <th>Balance</th>  
								<th>Actions</th>
							</tr>
						</thead>
						<tbody id="showdata">
							<?php foreach ($data['loanrecord'] as $item){ ?>
							<tr>
								<td><?php echo $item->loanid ?></td>
								<td><?php echo $item->fullname ?></td>
								<td><?php echo $item->loantype ?></td>
								<td><?php echo $item->termofpaymentID ?></td>
								<td><?php echo $item->dategranted ?></td>
								<td><?php echo $item->enddate ?></td>
								<td class="text-right"><?php echo $item->amount ?></td>
								<td class="text-right"><?php echo $item->deduction ?></td>
								<td class="text-right"><?php echo $item->balance ?></td>
								<div class="dropdown dropdown-action">
								</div>
								<td class="text-right">
									<button type="button" id="<?php echo $item->loanid; ?>" class="btn btn-info btn-sm edit_loan" data-toggle="modal" data-target="#edit_loan" data-id="<?php echo $item->loanid; ?>" data-employeeid="<?php echo $item->employeeID; ?>" data-fullname="<?php echo $item->fullname; ?>" data-dategranted="<?php echo $item->dategranted; ?>" data-enddate="<?php echo $item->enddate; ?>" data-paymenttermid="<?php echo $item->termofpaymentID; ?>" data-termofpaymentI1D="	<?php echo $item->termofpaymentID2; ?>" data-loantypeid1="<?php echo $item->loantypeid1; ?>" data-amount="<?php echo $item->amount; ?>" data-deduction="<?php echo $item->deduction; ?>" data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> 
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    	</div>
    	<div id="add_loan" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Loan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
	        <div class="modal-body">
	        <form>
	        <div class="col-sm-12">
	          <div class="form-group">
	            <label for="basicsalary">Employee Name<span class="text-danger">*</span></label>
	            <select class="form-control"  id="addemployeeID" name="addemployeeID" style="width: 100%;" description="employee name">
	            <option value="">No Selected</option>
	          <?php
	            foreach($data['dropdownemp'] as $item)
	            {
	            echo '<option value="'.$item->employeeID.'">'.$item->fullname. '</option>';
	            }
	            ?> 
	            </select>
	            <div class="invalid-feedback" id="add-employee"></div>
	          </div>
          </div>
             <div class="col-sm-12">
          	<div class="form-group">
              <label for="exampleInputPassword1">Loan Type<span class="text-danger">*</span></label>
              <select class="form-control" id="addloantypeID" name="addloantypeID" name style="width: 100%;" description="loan type">
              	  <option value="">No Selected</option>
	              <option value="1">Social Security System(SSS)</option>
	              <option value="2">Pag-IBIG</option>
	              <option value="3">Salary</option>
	              <option value="4">Emergency</option>
              </select>
              <div class="invalid-feedback" id="add-loantype"></div>
            </div> 
             </div>

             	<div class="col-sm-12">
						<div class="form-group">
							<label>Start Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="adddategranted" name="adddategranted" description="start date"">
								 <div class="invalid-feedback" id="add-dategranted"></div>
							</div>
						</div>
				</div>
             	<div class="col-sm-12">
						<div class="form-group">
							<label>End Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="addenddate" name="addenddate" description="end date"">
								 <div class="invalid-feedback" id="add-addenddate"></div>
							</div>
						</div>
				</div>		
			<div class="col-sm-12">
			  <div class="form-group">
				<label for="basicsalary">Loan Amount<code>*</code></label>
				<div class="input-group mr-sm-2 mb-sm-0">
					<div class="input-group-prepend">
					<span class="input-group-text">₱</span>
					</div>
					<input id="addamount" name="addamount" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="amount" required>
					<div class="invalid-feedback" id="add-amount"></div>
					</div>
				</div>
			</div>
           <div class="col-sm-12">
			  <div class="form-group">
				<label for="basicsalary">Deduction Amount<code>*</code></label>
				<div class="input-group mr-sm-2 mb-sm-0">
					<div class="input-group-prepend">
					<span class="input-group-text">₱</span>
					</div>
					<input id="adddeduction" name="adddeduction" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="deduction" required>
					<div class="invalid-feedback" id="add-deduction"></div>
					</div>
				</div>
			</div>
           <div class="col-sm-12">
          	 <div class="form-group">
             <label for="exampleInputPassword1">Term of Payments</label>
            <select class="form-control select2" name="addtermofpaymentID" id="addtermofpaymentID" style="width: 100%;">
            <option value="1">Monthly</option>
            <option value="2">Payday</option>
            <option value="3">Yearly</option>
            </select>   
           <!--  <div class="invalid-feedback" id="add-termofpaymentID"></div>      -->
        </div>
        </div>            
		<div class="submit-section">
		<button class="btn btn-primary submit-btn" id="save">Submit</button>
		</div>
        </div>
    	</form>
        </div>	
        </div>
       </div>
           	<div id="edit_loan" class="modal custom-modal fade" role="dialog">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Loan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
	        <div class="modal-body">
	        <form>
	        <div class="col-sm-12">
	          <div class="form-group">
	            <label for="basicsalary">Employee Name<code>*</code></label>
	            <select class="form-control" name="editemployeeID" id="editemployeeID" style="width: 100%;">
	            <option value="">No Selected</option>
	          <?php
	            foreach($data['dropdownemp'] as $item)
	            {
	            echo '<option value="'.$item->employeeID.'">'.$item->fullname. '</option>';
	            }
	            ?> 
	            </select>
	            <div class="invalid-feedback" id="edit-employee"></div>
	          </div>
          </div> 
             <div class="col-sm-12">
          	<div class="form-group">
              <label for="exampleInputPassword1">Loan Type</label>
              <select class="form-control" id="editloantypeID" name="editloantypeID" name style="width: 100%;">
	              <option value="1">Social Security System(SSS)</option>
	              <option value="2">Pag-IBIG</option>
	              <option value="3">Salary</option>
	              <option value="4">Emergency</option>
              </select>
              <div class="invalid-feedback" id="edit-loantype"></div>
            </div> 
             </div>

             	<div class="col-sm-12">
						<div class="form-group">
							<label>Start Date</label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="editdategranted" name="editdategranted"">
								 <div class="invalid-feedback" id="edit-dategranted"></div>
							</div>
						</div>
				</div>	
				<div class="col-sm-12">
						<div class="form-group">
							<label>End Date</label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="editenddate" name="editenddate"">
								 <div class="invalid-feedback" id="edit-enddate"></div>
							</div>
						</div>
				</div>	
			<div class="col-sm-12">
			  <div class="form-group">
				<label for="basicsalary">Loan Amount<code>*</code></label>
				<div class="input-group mr-sm-2 mb-sm-0">
					<div class="input-group-prepend">
					<span class="input-group-text">₱</span>
					</div>
					<input id="editamount" name="editamount" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" required>
					<div class="invalid-feedback" id="edit-amount"></div>
					</div>
				</div>
			</div>
           <div class="col-sm-12">
			  <div class="form-group">
				<label for="basicsalary">Deduction Amount<code>*</code></label>
				<div class="input-group mr-sm-2 mb-sm-0">
					<div class="input-group-prepend">
					<span class="input-group-text">₱</span>
					</div>
					<input id="editdeduction" name="editdeduction" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" required>
					<div class="invalid-feedback" id="edit-deduction"></div>
					</div>
				</div>
			</div>
           <div class="col-sm-12">
          	 <div class="form-group">
             <label for="exampleInputPassword1">Term of Payments</label>
            <select class="form-control select2" name="edittermofpaymentID" id="edittermofpaymentID" style="width: 100%;">
            <option value="1">Monthly</option>
            <option value="2">Payday</option>
            <option value="3">Yearly</option>
            </select>      
        </div>
        </div>            
		<div class="submit-section">
		<button class="btn btn-primary submit-btn update">Update</button>
		</div>
        </div>
    	</form>
        </div>	
        </div>
       </div>
       <?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>
 <script  type="text/javascript">
   $(document).ready(function() { 

   		$('#add_loan').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
		}); 

		$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployeeID', '#addloantypeID', '#adddategranted', '#addenddate', '#addamount', '#adddeduction', '#addtermofpaymentID'];
		var ErrorIDArray = ['add-employee', 'add-loantype', 'add-dategranted', 'add-addenddate', 'add-amount', 'add-deduction', 'add-termofpaymentID'];
		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==6) continue;
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
                url : "<?php echo site_url('Loans/save');?>",
                method : "POST",
                data : {employeeID: ValueArray[0], 		loantypeID: ValueArray[1],
                		dategranted: ValueArray[2], 	enddate: ValueArray[3],
                		amount: ValueArray[4], 	        deduction: ValueArray[5], termofpaymentID: ValueArray[6]},
                async : true,
                dataType : 'json',
                success: function(data){
					var result = data.split('|');
        			if(result[0]=="false"){
							document.getElementById("add-employee").innerHTML = result[1];
				        	$('#addemployeeID').removeClass('is-valid');
				        	$('#addemployeeID').addClass('is-invalid');
				        	$('#add-employee').addClass('invalid-feedback');
				        	$("#addemployeeID").focus();
				        	document.getElementById("add-loantype").innerHTML = result[1];
				        	$('#addloantypeID').removeClass('is-valid');
				        	$('#addloantypeID').addClass('is-invalid');
				        	$('#add-loantype').addClass('invalid-feedback');
				        	document.getElementById("add-dategranted").innerHTML = result[1];
				        	$('#adddategranted').removeClass('is-valid');
				        	$('#adddategranted').addClass('is-invalid');
				        	$('#add-dategranted').addClass('invalid-feedback');
						}else{
        					window.location.replace('<?php echo base_url(); ?>loans');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	  	}
	});	
			 	/* CLEAR MODAL */
		$('#edit_loan').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
        	
		});

		//end loan save
		//edit loan
		$('.edit_loan').unbind('click').bind('click', function(){
		$(".modal-body #editemployeeID").val($(this).data('employeeid'));
		$(".modal-body #editloantypeID").val( $(this).data('loantypeid1'));
		$(".modal-body #editdategranted").val( $(this).data('dategranted'));
		$(".modal-body #editenddate").val( $(this).data('enddate'));
		$(".modal-body #editamount").val( $(this).data('amount'));
		$(".modal-body #editdeduction").val( $(this).data('deduction'));
		$(".modal-body #edittermofpaymentID").val( $(this).data('termofpaymentI1D'));
		$('.update').attr('id', $(this).data('id'));
	
         	/* updated employee */

$('.update').unbind('click').bind('click', function(){
		var IDArray = ['#editemployeeID', '#editloantypeID', '#editdategranted', '#editenddate', '#editamount', '#editdeduction', '#edittermofpaymentID'];
		var ErrorIDArray = ['edit-employee', 'edit-loantype', 'edit-dategranted', 'edit-enddate', 'edit-amount', 'edit-deduction' , 'edit-termofpaymentID'];

		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');	

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==6) continue;
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
                url : "<?php echo site_url('loans/update');?>",
                method : "POST",
                data : {id:id,
                	  	employeeID: ValueArray[0], 		loantypeID: ValueArray[1],
                		dategranted: ValueArray[2], 	enddate: ValueArray[3],
                		amount: ValueArray[4], 	        deduction: ValueArray[5],  termofpaymentID: ValueArray[6]},
                async : true,
                dataType : 'json',
                success: function(data){
					var result = data.split('|');
        			if(result[0]=="false"){
							document.getElementById("edit-employee").innerHTML = result[1];
				        	$('#editemployeeID').removeClass('is-valid');
				        	$('#editemployeeID').addClass('is-invalid');
				        	$('#edit-employee').addClass('invalid-feedback');
				        	$("#editemployeeID").focus();
				        	document.getElementById("edit-dategranted").innerHTML = result[1];
				        	$('#editdategranted').removeClass('is-valid');
				        	$('#editdategranted').addClass('is-invalid');
				        	$('#edit-dategranted').addClass('invalid-feedback');
						}else{
        					window.location.replace('<?php echo base_url(); ?>loans');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
	  	}
	});	
 });   
});      
</script>

