
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Loan</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Loan</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_loan" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Loan</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					 <h4 class="mb-3 text-primary">List of Employee's Loan</h4>
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
								  <th style="width: 220px ! important;">Loan No.</th>
								  <th style="width: 500px ! important;">Employee Name</th>
			                      <th style="width: 300px ! important;">Loan Type</th>
			                      <th style="width: 200px ! important;">Term of Payment</th>
			                      <th style="width: 150px ! important;">Start Date</th>
			                      <th style="width: 150px ! important;">End Date</th>
			                      <th style="width: 70px ! important;">Amount</th>
			                      <th style="width: 70px ! important;">Deduction</th>
			                      <th style="width: 30px ! important;">Paid</th> 
								<th style="width: 30px ! important;">Actions</th>
							</tr>
						</thead>
						<tbody id="showdata">
							<?php foreach ($data['loanrecord'] as $item){ ?>
							<tr>

								<td><?php echo 'LN-', str_pad($item->loanid, 6, "0", STR_PAD_LEFT) ?></td>
								<td>
								<div class="dash-card-content">	
								<a id="<?php echo $item->loanid ?>" class="avatar">
								<?php	
	                            if($item->photo==""){
	                              echo '<img alt="" src="uploads/profileimg.png"></a> <p style="margin-left: 10px; color: black;">'.' '.$item->fullname.' <br> <span style="color:#888;display: block; font-size: 11px;">'.$item->department.' | ' .$item->designationdescription.'</span> </p> </div</td>';
	                            }else{
	                              echo '<img alt="" src="uploads/'.$item->photo.'" ></a> <div class="dash-card-content"><p style="margin-left: 10px; color: black;">'.' '.$item->fullname. ' <br> <span style="color:#888;display: block; font-size: 11px;">'.$item->department.' | ' .$item->designationdescription.' </span> </p> </div></div></td>';
	                            } ?>	
								<td><?php echo $item->loantype; ?></td>
								<td><?php echo $item->termofpaymentID; ?></td>
								<td><?php echo date("F d, Y",strtotime($item->dategranted)) ;?></td>
								<td><?php echo date("F d, Y",strtotime($item->enddate)); ?></td>
								<td class="text-right"><?php  echo $item->amount; ?></td>
								<td class="text-right"><?php echo $item->deduction; ?></td>
								<td>
								<div class="action-label">
										<a class="btn btn-white btn-sm btn-rounded action-status" href="#">
											<?php if($item->paid=="1") 
													   echo '<i class="fa fa-dot-circle-o text-success"></i> Paid';
												  else echo '<i class="fa fa-dot-circle-o text-danger"></i> Unpaid';
										    ?>
										</a>
									</div>
								</td>	
								</div>
									<td class="text-right">
								    <div class="dropdown dropdown-action">
								    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
								    <div class="dropdown-menu dropdown-menu-right">
								    <a class="dropdown-item editloan" href="#"
									    id="<?php echo $item->loanid; ?>"
									    class="btn btn-info btn-sm editloan"
									    data-toggle="modal" 
									    data-target="#edit_loan"
										data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
										data-id="<?php echo $item->loanid; ?>" 
										data-employeeid="<?php echo $item->employeeID; ?>" 
										data-fullname="<?php echo $item->fullname; ?>" 
										data-dategranted="<?php echo $item->dategranted; ?>" 
										data-enddate="<?php echo $item->enddate; ?>" 
										data-paymenttermid="<?php echo $item->termofpaymentID; ?>" 
										data-termofpayment="<?php echo $item->termofpaymentID2; ?>" 
										data-loantypeid1="<?php echo $item->loantypeid1; ?>" 
										data-amount="<?php echo $item->amount; ?>" 
										data-deduction="<?php echo $item->deduction; ?>" 
										data-lnothers="<?php echo $item->lnothers; ?>" 
										data-tog="tooltip"data-placement="top" title="Edit"> 
									<i class="fa fa-pencil m-r-5"></i> Edit</a>
								<a class="dropdown-item viewrecord" href="#" 
								 loanid="<?php echo $item->loanid; ?>"
								 class="btn btn-info btn-sm viewrecord"
								 data-toggle="modal" 
								 data-target="#view_record" 
								 data-fullnameinsert="<?php echo $item->fullname; ?>" >
								 <i class="fa fa-eye"></i> View payments</a>
    							</div>	
    							</div>	
    						</td>		  
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
	            <label for="basicsalary">Employee Name <span class="text-danger">*</span></label>
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
              <label for="exampleInputPassword1">Loan Type <span class="text-danger">*</span></label>
              <select class="form-control" id="addloantypeID" name="addloantypeID" name style="width: 100%;" description="loan type">
              	  <option value="">No Selected</option>
	              <option value="1">Social Security System(SSS)</option>
	              <option value="2">Pag-IBIG</option>
	              <option value="3">Salary</option>
	              <option value="4">Emergency</option>
	              <option value="5">Trainings</option>
	              <option value="6">Others</option>
              </select>
              <div class="invalid-feedback" id="add-loantype"></div>
            </div> 
             </div>
              <div class="col-sm-12">
				 <div id ="specify" name ="specify" class="alphanumericwithspace">
			  
			    </div>
			    </div>
             	<div class="col-sm-12">
						<div class="form-group">
							<label>Start Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="adddategranted" name="adddategranted"  description="start date">
								 <div class="invalid-feedback" id="add-dategranted"></div>
							</div>
						</div>
				</div>
             	<div class="col-sm-12">
						<div class="form-group">
							<label>End Date <span class="text-danger">*</span></label>
							<div class="cal-icon">
								<input class="form-control datetimepicker" type="text" id="addenddate" name="addenddate" description="end date">
								 <div class="invalid-feedback" id="add-addenddate"></div>
							</div>
						</div>
				</div>		
			<div class="col-sm-12">
			  <div class="form-group">
				<label for="basicsalary">Loan Amount <code>*</code></label>
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
				<label for="basicsalary">Deduction Amount <code>*</code></label>
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
             <label for="exampleInputPassword1">Term of Payment <code>*</code></label>
            <select class="form-control" name="addtermofpaymentID" id="addtermofpaymentID" style="width: 100%;"  description="Term of Payment">
            <option value="">No Selected</option>
            <option value="1">Monthly</option>
            <option value="2">Payday</option>
            </select> 
            <div class="invalid-feedback" id="add-termofpaymentID"></div>    
           <!--  <div class="invalid-feedback" id="add-termofpaymentID"></div>      -->
           <input id="addpaid" name="addpaid" type="hidden" class="form-control input">
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
					<label for="basicsalary">Employee Name <code>*</code></label>
					<select class="form-control" name="editemployeeID" id="editemployeeID" style="width: 100%;" description="employee name">
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
					<option value="5">Trainings</option>
	              	<option value="6">Others</option>
					</select>
					<div class="invalid-feedback" id="edit-loantype"></div>
					</div> 
				</div>
				 <div class="col-sm-12">
				 <div id ="editspecify" name ="editspecify"class="alphanumericwithspace">
			  
			    </div>
			    </div>
				<div class="col-sm-12">
					<div class="form-group">
					<label>Start Date</label>
					<div class="cal-icon">
					<input class="form-control datetimepicker" type="text" id="editdategranted" name="editdategranted">
					<div class="invalid-feedback" id="edit-dategranted"></div>
					</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="form-group">
					<label>End Date</label>
					<div class="cal-icon">
					<input class="form-control datetimepicker" type="text" id="editenddate" name="editenddate">
					<div class="invalid-feedback" id="edit-enddate"></div>
					</div>
					</div>
				</div>	
				<div class="col-sm-12">
					<div class="form-group">
					<label for="basicsalary">Loan Amount <code>*</code></label>
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
					<label for="basicsalary">Deduction Amount <code>*</code></label>
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
					<label for="exampleInputPassword1">Term of Payment</label>
					<select class="form-control" name="edittermofpaymentID" id="edittermofpaymentID" style="width: 100%;" description="Term of Payment">
					<option value="">No Selected</option>
					<option value="1">Monthly</option>
					<option value="2">Payday</option>
					</select> 
					<div class="invalid-feedback" id="edit-termofpaymentID"></div>     
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
<!-- /Approve Leave Modal -->
	<div id="confirmation_add" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						  <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/submit.svg">
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
						  <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/submit.svg">
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
		<div id="view_record" class="modal custom-modal fade" role="dialog">
			<div class="col-md-12">
		<div class="modal-dialog modal-dialog-centered modal-xs" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">loan type - term of payment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					
				<!-- 	<input type="text" class="form-control" id="lblname"name="lblname"> -->
				</div>
				<div class="modal-body">
					<div class="col-6">
					<input id="lblname" name="lblname" class="form-control input" STYLE="color: #000000;background-color: #FFFFFF;border-color: transparent;font-size: 14px" readonly/>
				</div>
				<br>
				<div class="table-responsive">
					<table class="table table-striped custom-table datatable">
						<thead>
							<tr>
			                      <th >Deduction Date</th>
			                      <th >Amount</th>
							</tr>
						</thead>
						<tbody id="showdatarecord" name="showdatarecord">
						</tbody>
					</table>
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
 <script  type="text/javascript">
   $(document).ready(function() {
   		$(window).on("load", function() {
			$(".loader").fadeOut();
		});

   		$('.viewrecord').click(function(){
   			var id = $(this).attr('loanid'); 
   			
   			 $.ajax({
              url : "<?php echo base_url(); ?>Loans/get_loan_data",
              method : "POST",
	          data : {id: id},
	          async : true,
	          dataType : 'json',
          	success: function(response){
             var html = '';
             var i;
            for(i=0; i<response.length; i++){	
              	 html += '<tr>'+
              	 '<td>'+response[i].fullname+'</td>'+
              	 '<td>'+response[i].datedection+'</td>'+
              	 '<td>'+response[i].amount+'</td>'+
              	 '</tr>';
              } 
              $('#showdatarecord').html(html);

         	 }
          });
      });
   			/*$('#view_record').on('hidden.bs.modal', function(){
   			url : "<?php echo base_url(); ?>Loans";

   			});	*/

   		
   	$('.viewrecord').unbind('click').bind('click', function(){
		$(".modal-body #lblname").val( $(this).data('fullnameinsert'));


	});		


   	$('#addloantypeID').change(function(){
    	var addloantype = $(this).val(); 
    	html = "";
    	 if(addloantype==6){
    	 	html += '<div class="form-group">' +
    	 				'<label id ="addlblspecify" name="addlblspecify" for="addlblspecify">Please specify</label>' +
    	 				'<input id="addotherinput" type="text" name="addotherinput" class="form-control input alphanumericwithspace" placeholder="Others" autocomplete="off" description="Others">' +
    	 				'<div class="invalid-feedback" id="add-otherinput"></div>' +
    	 				'</div>';
    	 	$("#specify").show();	
    	 	$("#specify").html(html);		
    	 } else {
    	 	 $("#addlblspecify").hide();	 
 			$("#addotherinput").hide();
    	 }	
    });	  
    $(".alphanumericwithspace").keypress(function(e){
		    var keyCode = e.which;

		    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 32 && keyCode != 13) {
		      e.preventDefault();
		    }
		});
    	$('#editloantypeID').change(function(){
    	var editloantype = $(this).val(); 
    	html = "";
    	 if(editloantype==6){
    	 	html += '<div class="form-group">' +
    	 				'<label id ="editlblspecify" name="editlblspecify" for="editlblspecify">Please specify</label>' +
    	 				'<input id="editotherinput" type="text" name="editotherinput" class="form-control input alphanumericwithspace" placeholder="Others" autocomplete="off" description="Others">' +
    	 				'<div class="invalid-feedback" id="edit-otherinput"></div>' +
    	 				'</div>';
    	 	$("#editspecify").show();	
    	 	$("#editspecify").html(html);		
    	 } else {
    	 	 $("#editspecify").hide();	 
 			$("#editotherinput").hide();
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

   		$('#add_loan').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
		}); 

		$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployeeID', '#addloantypeID', '#adddategranted', '#addenddate', '#addamount', '#adddeduction', '#addtermofpaymentID','#addotherinput'];
		var ErrorIDArray = ['add-employee', 'add-loantype', 'add-dategranted', 'add-addenddate', 'add-amount', 'add-deduction', 'add-termofpaymentID','add-otherinput'];
		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;
		
	 	var addemployeeID = $('#addemployeeID').val().trim();
	 	var addloantypeID = $('#addloantypeID').val().trim();
		var adddategranted = $("#adddategranted").val();
		var enddate = $("#addenddate").val();
		var deductionrecord = $("#adddeduction").val().trim();
		/*var addloantype = $("#addloantypeID").val();*/

		var addtermofpaymentID = $("#addtermofpaymentID").val();
		var amount = $("#addamount").val().trim().replace(",","");
		var amountothercomma =amount.replace(",","");
      	var amountwithoutperiod = amountothercomma.replace(".","");
		var amountparse = parseInt(amountwithoutperiod,25);
		
		var deduction = $("#adddeduction").val().trim().replace(",","");
		var deductionothercomma =deduction.replace(",","");
		var deductionwithoutperiod = deductionothercomma.replace(".","");
		var deductionparse = parseInt(deductionwithoutperiod,25);

		var arrtodate = adddategranted.split("-");
		var arrt1odate = enddate.split("-");
		var tdate = arrt1odate[0];
		var tmonth = arrt1odate[1];
		var tyear = arrt1odate[2]; 
		var fdate = arrtodate[0];
		var fmonth = arrtodate[1];
		var fyear = arrtodate[2]; 
		var dtfTest = new Date (fyear, fmonth, fdate);
		var dttTest = new Date (tyear, tmonth, tdate);
			// for(var i=0;i<IDArray.length;i++){
			// ValueArray[i] = $(IDArray[i]).val()
			// if(addloantypeID ==6){
			// 	if(i==8) continue;
			// }else{
			// 	if(i==7) continue;
			// }
			//  }

		   if(addemployeeID==""){
	        	document.getElementById("add-employee").innerHTML = "Please provide an employee name.";
	        	$('#addemployeeID').addClass('is-invalid');
	        	$("#addemployeeID").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-employee").innerHTML = "";
	        	$('#addemployeeID').removeClass('is-invalid');
	        	$('#addemployeeID').addClass('is-valid');
	        	$("#addemployeeID").focus();
	        }
	         if(addloantypeID=="" ){
	         	for(var i=0;i<IDArray.length;i++){
					ValueArray[i] = $(IDArray[i]).val()
					if(addloantypeID ==6){
				if(i==8) continue;
				}else{
				if(i==7) continue;
			}
			 }
	        	document.getElementById("add-loantype").innerHTML = "Please provide an loan type.";
	        	$('#addloantypeID').addClass('is-invalid');
	        	$("#addloantypeID").focus(); 
                event.preventDefault();
	        }else{
	        	
	        	document.getElementById("add-loantype").innerHTML = "";
	        	$('#addloantypeID').removeClass('is-invalid');
	        	$('#addloantypeID').addClass('is-valid');
	        	$("#addloantypeID").focus();
	        }
	         if(adddategranted==""){
	         	
	        	document.getElementById("add-dategranted").innerHTML = "Please provide an start date.";
	        	$('#adddategranted').addClass('is-invalid');
	        	$("#adddategranted").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-dategranted").innerHTML = "";
	        	$('#adddategranted').removeClass('is-invalid');
	        	$('#adddategranted').addClass('is-valid');
	        	$("#adddategranted").focus();
	        }
	         if(enddate==""){

	        	document.getElementById("add-addenddate").innerHTML = "Please provide an end date.";
	        	$('#addenddate').addClass('is-invalid');
	        	$("#addenddate").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-addenddate").innerHTML = "";
	        	$('#addenddate').removeClass('is-invalid');
	        	$('#addenddate').addClass('is-valid');
	        	$("#addenddate").focus();
	        }
	        if(dttTest < dtfTest){
	         		document.getElementById("add-addenddate").innerHTML = "Invalid dates.";
					$('#addenddate').addClass('is-invalid');
					$("#addenddate").focus(); 
               		 event.preventDefault();
               		 return false;
					}else{
					document.getElementById("add-addenddate").innerHTML = "";
					$('#addenddate').removeClass('is-invalid');
					$('#addenddate').addClass('is-valid');
					$("#addenddate").focus();
			}
			if(amount==""){
				document.getElementById("add-amount").innerHTML = "Please provide an amount.";
				$('#addamount').addClass('is-invalid');
				$("#addamount").focus(); 
                event.preventDefault();
				}else{
				document.getElementById("add-amount").innerHTML = "";
				$('#addamount').removeClass('is-invalid');
				$('#addamount').addClass('is-valid');
				$("#addamount").focus();
			}
			 if(addtermofpaymentID==""){
	        	document.getElementById("add-termofpaymentID").innerHTML = "Please provide an term of payment.";
	        	$('#addtermofpaymentID').addClass('is-invalid');
	        	$("#addtermofpaymentID").focus(); 
                event.preventDefault();
	        }else{
	        	document.getElementById("add-termofpaymentID").innerHTML = "";
	        	$('#addtermofpaymentID').removeClass('is-invalid');
	        	$('#addtermofpaymentID').addClass('is-valid');
	        	$("#addtermofpaymentID").focus();
	        }  
			
			if(deductionrecord==""){
			document.getElementById("add-deduction").innerHTML = "Please provide an deduction.";
			$('#adddeduction').addClass('is-invalid');
			$("#adddeduction").focus();
             event.preventDefault(); 
             return false;
         }else{
		document.getElementById("add-deduction").innerHTML = "";
		$('#adddeduction').removeClass('is-invalid');
		$('#adddeduction').addClass('is-valid');
		$("#adddeduction").focus();
		} 
	        if(deductionwithoutperiod > amountwithoutperiod){
			document.getElementById("add-deduction").innerHTML = "Deduction amount is to high.";
			$('#adddeduction').addClass('is-invalid');
			 $("#adddeduction").focus();
               event.preventDefault(); 
                return false;
		}else{
		document.getElementById("add-deduction").innerHTML = "";
		$('#adddeduction').removeClass('is-invalid');
		$('#adddeduction').addClass('is-valid');
		$("#adddeduction").focus();
		} 
		if(addemployeeID=="" || addloantypeID=="" || adddategranted=="" || enddate=="" || amount=="" || deductionrecord=="" || addtermofpaymentID=="") return false;

	        $('#add_loan').hide();
				$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');

	    		event.preventDefault(); 
	    		return false;
	 });
	  $("#cncl-add").unbind('click').bind('click', function(){
			$('#confirmation_add').modal('hide');
			$('#add_loan').show();

		});	
	 	 $('.add').unbind('click').bind('click', function(){
	 	 	var employeeID 		= 		$("#addemployeeID").val();
	 	 	var loantypeID 		= 		$("#addloantypeID").val();
	 	 	var dategranted 	= 		$("#adddategranted").val();
	 	 	var enddate 		= 		$("#addenddate").val();
	 	 	var amount 			= 		$("#addamount").val();
	 	 	var deduction 		= 		$("#adddeduction").val();
	 	 	var termofpaymentID = 		$("#addtermofpaymentID").val();
	 	 	var termofpaymentID = 		$("#addtermofpaymentID").val();
	 	 	var paid 			= 		$("#addpaid").val();
	 	 	var lnothers 		= 		$("#addotherinput").val();

    		$.ajax({
                url : "<?php echo site_url('Loans/save');?>",
                method : "POST",
                data : {employeeID: 		employeeID, 		loantypeID: loantypeID,
                		dategranted: 		dategranted, 		enddate: 	enddate,
                		amount: 			amount, 	        deduction:  deduction, 
                		termofpaymentID: 	termofpaymentID, 	paid: 		paid,
                		lnothers: 			lnothers},
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
        					window.location.replace('<?php echo base_url(); ?>Loans');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
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
		$('.editloan').unbind('click').bind('click', function(){
		$(".modal-body #editemployeeID").val($(this).data('employeeid'));
		$(".modal-body #editloantypeID").val( $(this).data('loantypeid1'));
		$(".modal-body #editloantypeID").trigger("change");
		$(".modal-body #editdategranted").val( $(this).data('dategranted'));
		$(".modal-body #editenddate").val( $(this).data('enddate'));
		$(".modal-body #editamount").val( $(this).data('amount'));
		$(".modal-body #editdeduction").val( $(this).data('deduction'));
		$(".modal-body #edittermofpaymentID").val( $(this).data('termofpayment'));
		$(".modal-body #editotherinput").val( $(this).data('lnothers'));
		$('.edit').attr('id', $(this).data('id'));

	});	
	
         	/* updated employee */
$('.update').unbind('click').bind('click', function(){
		var IDArray = ['#editemployeeID', '#editloantypeID', '#editdategranted', '#editenddate', '#editamount', '#editdeduction', '#edittermofpaymentID','#editotherinput'];
		var ErrorIDArray = ['edit-employee', 'edit-loantype', 'edit-dategranted', 'edit-enddate', 'edit-amount', 'edit-deduction' , 'edit-termofpaymentID','edit-otherinput'];

		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');
		var amount = $("#editamount").val().trim().replace(",","");
		var amountothercomma =amount.replace(",","");
      	var amountwithoutperiod = amountothercomma.replace(".","");
		var amountparse = parseInt(amountwithoutperiod,25);
		
		var deduction = $("#editdeduction").val().trim().replace(",","");
		var deductionothercomma =deduction.replace(",","");
		var deductionwithoutperiod = deductionothercomma.replace(".","");
		var deductionparse = parseInt(deductionwithoutperiod,25);

		var enddate = $("#editenddate").val();
		var dategranted = $("#editdategranted").val();
		var loantype = $("#editloantypeID").val();
		var arrtodate = dategranted.split("-");
		var arrt1odate = enddate.split("-");
		var tdate = arrt1odate[0];
		var tmonth = arrt1odate[1];
		var tyear = arrt1odate[2]; 
		var fdate = arrtodate[0];
		var fmonth = arrtodate[1];
		var fyear = arrtodate[2]; 
		var dtfTest = new Date (fyear, fmonth, fdate);
		var dttTest = new Date (tyear, tmonth, tdate);
		if(dttTest > dtfTest){	
		document.getElementById("edit-enddate").innerHTML = "";
		$(IDArray[3]).removeClass('is-invalid');
		$(IDArray[3]).addClass('is-valid');
		event.preventDefault();
		}else{
		document.getElementById("edit-enddate").innerHTML = "Invalid dates.";
		$(IDArray[3]).addClass('is-invalid');
		event.preventDefault();
		return false;
		};
		if(editamount ==0){
		document.getElementById("edit-amount").innerHTML = "Invalid input.";
		$(IDArray[4]).addClass('is-invalid');
		return false;
		}else{
		document.getElementById("edit-amount").innerHTML = "";
		$(IDArray[4]).removeClass('is-invalid');
		$(IDArray[4]).addClass('is-valid');
		event.preventDefault();
		};
		if(editdeduction ==0){
		document.getElementById("edit-deduction").innerHTML = "Invalid input.";
		$(IDArray[5]).addClass('is-invalid');
		return false;
		}else{
		document.getElementById("edit-deduction").innerHTML = "";
		$(IDArray[5]).removeClass('is-invalid');
		$(IDArray[5]).addClass('is-valid');
		event.preventDefault();
		};
		if(deductionparse > amountparse){
		document.getElementById("edit-deduction").innerHTML = "Deduction amount is to high.";
		$(IDArray[5]).addClass('is-invalid');
		return false;
		}else{
		document.getElementById("edit-deduction").innerHTML = "";
		$(IDArray[5]).removeClass('is-invalid');
		$(IDArray[5]).addClass('is-valid');
		event.preventDefault();
		};
		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val()
			if(loantype ==6){
			if(i==8) continue;
			}else{
				if(i==6 || i==7) continue;
			}
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
		$('#edit_loan').hide();
		$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
	});	
		$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_loan').show();

		});

	$('.edit').unbind('click').bind('click', function(){
		var id = $(this).attr('id');
		 var employeeID 		= 	$('#editemployeeID').val().trim();
		 var loantypeID 		= 	$('#editloantypeID').val().trim();
		 var dategranted 		= 	$('#editdategranted').val().trim();
		 var enddate 			= 	$('#editenddate').val().trim();
		 var amount 			= 	$('#editamount').val().trim();
		 var deduction 			= 	$('#editdeduction').val().trim();
		 var termofpaymentID 	= 	$('#edittermofpaymentID').val().trim();
		 var lnothers 			= 	$('#editotherinput').val();
    		$.ajax({
                url : "<?php echo site_url('loans/update');?>",
                method : "POST",
                data : {id: 				id,
                	  	employeeID: 		employeeID, 		loantypeID: 	loantypeID,
                		dategranted: 		dategranted, 		enddate: 		enddate,
                		amount: 			amount, 	    	deduction: 		deduction,  
                		termofpaymentID: 	termofpaymentID,	lnothers: 		lnothers},
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
        					window.location.replace('<?php echo base_url(); ?>Loans');
            			}
	                },
	         		 error: function(request, textStatus, error) {

	            	}
	            });
	            return false;
		 });   
		});      
</script>

