<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Loan<br></h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee Loan</li>
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
								  <th style="min-width: 80px ! important;">Loan Number </th>
								  <th style="min-width: 250px ! important;">Employee Name</th>
			                      <th style="min-width: 140px ! important;">Loan Type</th>
			                      <th style="min-width: 100px ! important;">Duration</th>
			                      <th style="min-width: 70px ! important; text-align: right;">Amount</th>
			                      <th style="min-width: 70px ! important; text-align: right;">Amortization</th>
			                      <th style="min-width: 50px ! important;">Status</th> 
								  <th style="min-width: 50px ! important;">Actions</th>
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
								<td><?php echo $item->loantype; ?>
									<span style="color:#e04d45;display: block; font-size: 11px;">Terms: 
										<span style="color:#888;">
											<?php echo $item->termofpaymentID; ?>
										</span>
									</span>
								</td>
								<td><span style="color:#e04d45;display: block; font-size: 11px;">Start Date: 
										<span style="color:#000;">
											<?php echo  date("F d, Y",strtotime($item->dategranted)); ?>
										</span>
									</span>
									<span class="pl-1" style="color:#e04d45;display: block; font-size: 11px;">End Date: 
										<span style="color:#000;">
											<?php echo  date("F d, Y",strtotime($item->enddate)); ?>
										</span>
									</span>
								</td>
								<td class="text-right"><?php  echo $item->amount; ?></td>
								<td class="text-right"><?php echo $item->deduction; ?></td>
								<td>
									<?php if($item->paid=="1"){
											 	echo '<span class="badge bg-inverse-success custom-status">
															<i class="fa fa-dot-circle-o text-success"></i> Paid
													  </span>';
										  }else{
										  		echo '<span class="badge bg-inverse-danger custom-status">
															<i class="fa fa-dot-circle-o text-danger"></i> Unpaid
													  </span>';
										  }
									  ?>
									
								</td>	
								</div>
									<td class="text-right">
								    <div class="dropdown dropdown-action">
								    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
								    <div class="dropdown-menu dropdown-menu-right">

						    		<?php if($item->isProcess==0){ ?>
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
											data-lnothers="<?php echo $item->lnothers; ?>" > 
										<i class="fa fa-pencil"></i> Edit</a>

										<a class="dropdown-item deleteloan" href="#"
										    id="<?php echo $item->loanid; ?>"
										    class="btn btn-info btn-sm deleteloan"
										    data-toggle="modal" 
										    data-target="#confirmation_delete"
											data-backdrop="static" data-keyboard="false"> 
										<i class="fa fa-trash"></i> Delete</a>
									<?php } ?>
								<a class="dropdown-item viewrecord" href="#" 
								 loanid="<?php echo $item->loanid; ?>"
								 class="btn btn-info btn-sm viewrecord"
								 data-toggle="modal" 
								 data-target="#view_record" 
								 data-recordlontype="<?php echo $item->loanday; ?>"
								 data-fullnameinsert="<?php echo $item->fullname; ?>" >
								 <i class="fas fa-coins"></i> Amortization</a>
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
			        	<div class="row">
							<div class="form-group col-sm-12">
								<label for="basicsalary">Employee Name <span class="text-danger">*</span></label>
					            <select class="form-control select2"  id="addemployeeID" name="addemployeeID" style="width: 100%;" description="an employee name" tabindex="1">
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

							<div class="form-group col-sm-12">
								<label for="loantype">Loan Type <span class="text-danger">*</span></label>
								<select class="form-control select2" id="addloantypeID" name="addloantypeID" name style="width: 100%;" description="a loan type" tabindex="2">
									  <option value="">No Selected</option>
									  <option value="1">Social Security System Loan</option>
									  <option value="2">PAG-IBIG Loan</option>
									  <option value="3">Salary Loan</option>
									  <option value="4">Emergency Loan</option>
									  <option value="5">Trainings</option>
									  <option value="6">Other Loan</option>
								</select>
								<div class="invalid-feedback" id="add-loantype"></div>
							</div>

							<div class="col-sm-12 form-group" id="addspecify" style="display: none;">
								<label>Description for other loan</label>
		    	 				<input id="addotherinput" type="text" name="addotherinput" class="form-control input alphanumericwithspace"  autocomplete="off" description="description for other loan">
		    	 				<div class="invalid-feedback" id="add-otherinput"></div>
						    </div>

							<div class="form-group col-sm-12">
								<label for="adddategranted">Start Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" id="adddategranted" name="adddategranted"  description="a start date" tabindex="3">
									<div class="invalid-feedback" id="add-dategranted"></div>
								</div>
							</div>

							<div class="form-group col-sm-12">
								<label for="addenddate">End Date <span class="text-danger">*</span></label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" id="addenddate" name="addenddate"  description="an end date" tabindex="4">
									<div class="invalid-feedback" id="add-addenddate"></div>
								</div>
							</div>
							
							<div class="form-group col-sm-12">
								<label for="basicsalary">Loan Amount <code>*</code></label>
								<div class="input-group mr-sm-2 mb-sm-0">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									<input id="addamount" name="addamount" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="a loan amount" tabindex="10">
									<div class="invalid-feedback" id="add-amount"></div>
								</div>
							</div>

							<div class="form-group col-sm-12">
								<label for="basicsalary">Deduction Amount <code>*</code></label>
								<div class="input-group mr-sm-2 mb-sm-0">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									<input id="adddeduction" name="adddeduction" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="a deduction amount" tabindex="11">
									<div class="invalid-feedback" id="add-deduction"></div>
								</div>
							</div>

							<div class="form-group col-sm-12 mb-0">
								<label for="exampleInputPassword1">Term of Payment <code>*</code></label>
					            <select class="form-control select2" name="addtermofpaymentID" id="addtermofpaymentID" style="width: 100%;"  description="a term of payment" tabindex="7">
						            <option value="">No Selected</option>
						            <option value="1">Payday</option>
						            <option value="2">Monthly</option>
					            </select> 
					            <div class="invalid-feedback" id="add-termofpaymentID"></div>    
					           	<input id="addpaid" name="addpaid" type="hidden" class="form-control input" tabindex="8">
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
						<div class="row">
							<div class="col-sm-12 form-group">
								<label for="basicsalary">Employee Name <code>*</code></label>
								<select class="form-control select2" name="editemployeeID" id="editemployeeID" style="width: 100%;" description="an employee name" tabindex="1">
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

							<div class="col-sm-12 form-group">
								<label for="exampleInputPassword1">Loan Type</label>
								<select class="form-control select2" id="editloantypeID" name="editloantypeID" name style="width: 100%;"description="a loan type" tabindex="2">
									<option value="">No Selected</option>
									<option value="1">Social Security System Loan</option>
									<option value="2">PAG-IBIG Loan</option>
									<option value="3">Salary Loan</option>
									<option value="4">Emergency Loan</option>
									<option value="5">Trainings</option>
					              	<option value="6">Other Loan</option>
								</select>
								<div class="invalid-feedback" id="edit-loantype"></div>
							</div>

							<div class="col-sm-12 form-group" id="editspecify" style="display: none;">
								<label>Description for other loan</label>
		    	 				<input id="editotherinput" type="text" name="editotherinput" class="form-control input alphanumericwithspace"  autocomplete="off" description="description for other loan">
		    	 				<div class="invalid-feedback" id="edit-otherinput"></div>
						    </div>

							<div class="col-sm-12 form-group">
								<label>Start Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" id="editdategranted" name="editdategranted"description="a start date" tabindex="3">
									<div class="invalid-feedback" id="edit-dategranted"></div>
								</div>
							</div>	

							<div class="col-sm-12 form-group">
								<label>End Date</label>
								<div class="cal-icon">
									<input class="form-control datetimepicker" type="text" id="editenddate" name="editenddate"description="an end date" tabindex="4">
									<div class="invalid-feedback" id="edit-enddate"></div>
								</div>
							</div>	

							<div class="col-sm-12 form-group">
								<label for="basicsalary">Loan Amount <code>*</code></label>
								<div class="input-group mr-sm-2 mb-sm-0">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									<input id="editamount" name="editamount" class="form-control input" data-inputmask="'alias': 'currency'" description="a loan amount" autocomplete="off" tabindex="5">
									<div class="invalid-feedback" id="edit-amount"></div>
								</div>
							</div>

							<div class="col-sm-12 form-group">
								<label for="basicsalary">Deduction Amount <code>*</code></label>
								<div class="input-group mr-sm-2 mb-sm-0">
									<div class="input-group-prepend">
										<span class="input-group-text">₱</span>
									</div>
									<input id="editdeduction" name="editdeduction" class="form-control input" data-inputmask="'alias': 'currency'" description="a deduction amount" autocomplete="off" tabindex="6">
									<div class="invalid-feedback" id="edit-deduction"></div>
								</div>
							</div>
							<div class="col-sm-12 form-group mb-0">
								<label for="exampleInputPassword1">Term of Payment</label>
								<select class="form-control select2" name="edittermofpaymentID" id="edittermofpaymentID" style="width: 100%;" description="a term of payment" tabindex="7">
									<option value="">No Selected</option>
									<option value="1">Payday</option>
									<option value="2">Monthly</option>
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
							<h3>Add Loan</h3>
							<p>Are you sure you want to add this loan?</p>
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
							<h3>Update Loan</h3>
							<p>Are you sure you want to update this loan?</p>
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
	<div id="confirmation_delete" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						  <img class="isometric confirmationisometric" src="<?=base_url(); ?>pages/assets/img/isometric/delete.svg">
							<h3>Delete Loan</h3>
							<p>Are you sure you want to delete this loan?</p>
							<div class="invalid-feedback" id="status-invalid"></div>
					</div>
						<div class="row">
							<div class="col-6">
								<a href="#" class="btn btn-primary submit-btn delete">Delete</a>
							</div>
							<div class="col-6">
								<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn" id="cncl-delete">Cancel</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Amortization Modal -->
	<div id="view_record" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Loan Amortization Schedule</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped custom-table" ID="table_modal">
						<thead>
						<tr>
							<th class="amortHeader" style="width:20px;">#</th>
							<th class="amortHeader">Deduction Date</th>
							<th class="amortHeader">Amount</th>
							<th class="amortHeader">Status</th>
						</tr>
						</thead>
						<tbody id="show_amortization">

						</tbody>
					</table>
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

	#table_modal td{
	    padding: .1rem .5rem; 
	}

	#table_modal .custom-status{
		width:80%;
		font-size: .6rem;
	}

	.amortHeader{
		background-color: #e04d45;
		color:#fff;
		border-left: #a9a8a8 1px solid;
	}
</style>

 <script  type="text/javascript">
   $("#specify").hide();
   $(document).ready(function() {
   		$(document).on("click", ".viewrecord", function(){
   			var loanID = $(this).attr('loanid'); 
   			
   			 $.ajax({
	              url : "<?php echo base_url(); ?>Loans/getamortization",
	              method : "POST",
		          data : {loanID: loanID},
		          async : true,
		          dataType : 'json',
	          	  success: function(data){
					var html = '';
					var status = '';
					var counter = 0;
					var grandtotal = 0;

					for(var i=0; i<data.length; i++){	
						if(data[i].loanstatus==0){
							status = '<span class="badge bg-inverse-danger custom-status">'+ 
											'<i class="fa fa-dot-circle-o text-danger"></i> UNPAID' +
									'</span>';
						}else{
							status = '<span class="badge bg-inverse-success custom-status">'+ 
											'<i class="fa fa-dot-circle-o text-success"></i> PAID' +
									'</span>';
						}

						counter++;
						grandtotal += parseFloat(data[i].loanamount.trim().replace(",","").replace(" ",""));

						 html += '<tr>'+
									 '<td class="text-right">'+counter+'</td>'+
									 '<td>'+data[i].datededuction+'</td>'+
									 '<td class="text-right">'+data[i].loanamount+'</td>'+
									 '<td class="text-center">' + status + '</td>'+
								 '</tr>';
					} 

					html += '<tr>' + 
								'<td colspan=2 class="text-right" style="background-color: #e04d45;color: #fff;">Grand Total:</td>'+
								'<td class="text-right" style="background-color: #1e1e1e;color: #fff;">'+accounting.formatMoney(grandtotal)+'</td>'+
								'<td class="text-right"></td>'+
							'</tr>';


					$('#show_amortization').html(html);
				  }
  			});
      });
   			/*$('#view_record').on('hidden.bs.modal', function(){
   			url : "<?php echo base_url(); ?>Loans";

   			});	*/

   		
   	$('.viewrecord').unbind('click').bind('click', function(){
		$(".modal-body #lblname").val( $(this).data('fullnameinsert'));
		$(".modal-body #lbltypeofpayment").val( $(this).data('recordlontype'));


	});		

   	$('#addloantypeID').change(function(){
    	var addloantype = $(this).val(); 

    	$("#addotherinput").val("");
    	$("#addotherinput").removeClass("is-invalid");
    	$("#addotherinput").removeClass("is-valid");
    	
    	 if(addloantype==6){
	 		$("#addspecify").css("display","block");	
    	 } else {
	 		$("#addspecify").css("display","none");	
    	 }	
    });	  

    $('#editloantypeID').change(function(){
    	var editloantype = $(this).val(); 

    	$("#editotherinput").val("");
    	$("#editotherinput").removeClass("is-invalid");
    	$("#editotherinput").removeClass("is-valid");

    	 if(editloantype==6){
	 		$("#editspecify").css("display","block");	
    	 } else {
	 		$("#editspecify").css("display","none");	
    	 }	
    });	  

    $(".alphanumericwithspace").keypress(function(e){
	    var keyCode = e.which;

	    if ( !( (keyCode >= 48 && keyCode <= 57) ||(keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && keyCode != 32 && keyCode != 13) {
	      e.preventDefault();
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

        	 $(".select2-selection--single").each(function(){
                $(this).removeClass("is-invalid");
                $(this).removeClass("is-valid");
         	 });
		});

   		$('#add_loan').on('hidden.bs.modal', function(){
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

		$('#addamount').click(function(){
			var addamount = $(this).val();
			var adddeduction = $("#adddeduction").val().trim(); 
			 if(addamount!="") validatedamount(addamount,adddeduction);

		});	
		$('#adddeduction').click(function(){
			var adddeduction = $(this).val();
			var addamount = $("#addamount").val().trim(); 
			 if(adddeduction!="") validatedamount(adddeduction,addamount);

		});	

	function validatedamount(adddeduction,addamount){
		var deduction = adddeduction.replace(",","").replace(",","").replace(",","").replace(".","");
		var amount = addamount.replace(",","").replace(",","").replace(",","").replace(".","");
		/*if(amount <= deduction){

		}else{
			document.getElementById("add-deduction").innerHTML = "Deduction amount is too high.";
			$('#adddeduction').addClass('is-invalid');
       		 event.preventDefault();
       		 return false;

		}*/
	
	};	
		$('#editamount').click(function(){
			var editamount = $(this).val();
			var editdeduction = $("#editdeduction").val().trim(); 
			 if(editamount!="") editvalidatedamount(editamount,editdeduction);

		});	
		$('#editdeduction').click(function(){
			var editdeduction = $(this).val();
			var editamount = $("#editamount").val().trim(); 
			 if(editdeduction!="") editvalidatedamount(editdeduction,editamount);

		});	

	function editvalidatedamount(editdeduction,editamount){
		//deduction
		var columnsdeduction = editdeduction.replace(",","");
		var editdeductionremove = columnsdeduction.replace(",","");
		var deduction = editdeductionremove.replace(".","");
		//amount
		var columnsamount = editamount.replace(",","");
		var editamountremove = columnsamount.replace(",","");
		var amount = editamountremove.replace(".","");


	/*	var deduction = editdeduction.replace(",","").replace(",","").replace(",","").replace(".","");
		var amount = editamount.replace(",","").replace(",","").replace(",","").replace(".","");*/
		/*if(amount < deduction){

		}else{
			document.getElementById("edit-deduction").innerHTML = "Deduction amount is too high.";
			$('#editdeduction').addClass('is-invalid');
       		 event.preventDefault();
       		 return false;

		}*/
	
	};	

	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addemployeeID', '#addloantypeID','#addotherinput', '#adddategranted',
					   '#addenddate', '#addamount', '#adddeduction', '#addtermofpaymentID'];

		var ErrorIDArray = ['add-employee', 'add-loantype','add-otherinput', 'add-dategranted', 
							'add-addenddate', 'add-amount', 'add-deduction', 'add-termofpaymentID'];

		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;
		
	 	var addemployeeID 	= $('#addemployeeID').val();
	 	var addloantypeID 	= $('#addloantypeID').val();
		var adddategranted 	= $("#adddategranted").val();
		var addenddate 		= $("#addenddate").val();
		var addamount 		= $("#addamount").val();
		var adddeduction 	= $("#adddeduction").val();
		var addtermofpaymentID = $("#addtermofpaymentID").val();

		var decimalAmount    = parseInt(addamount.replace(",",""));
		var decimalDeduction = parseInt(adddeduction.replace(",",""));

		 $(".select2-selection--single").each(function(){
            $(this).removeClass("is-invalid");
            $(this).removeClass("is-valid");
     	 });
		
		for(var i=0;i<IDArray.length;i++){
			$(IDArray[i]).removeClass("is-invalid");
            $(IDArray[i]).removeClass("is-valid");

			if(i==2 && addloantypeID!=6){
				continue;
			}

			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.0000"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};

				$(IDArray[i]).addClass('is-invalid');
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide " + $(IDArray[i]).attr("description") +".";
				
				if(i==0){
					$("[aria-labelledby='select2-addemployeeID-container']").addClass('is-invalid');
				}else if(i==1){
					$("[aria-labelledby='select2-addloantypeID-container']").addClass('is-invalid');
				}else if(i==6){
					$("[aria-labelledby='select2-addtermofpaymentID-container']").addClass('is-invalid');
				}
			}else{
				if(i==3){
					if(new Date(adddategranted) > new Date(addenddate)){
						if(firstRequired==""){
							firstRequired = IDArray[i];
						};

						$(IDArray[i]).addClass('is-invalid');
						document.getElementById(ErrorIDArray[i]).innerHTML = "Please choose a valid end date.";
					}else{
						document.getElementById(ErrorIDArray[i]).innerHTML = "";	
						$(IDArray[i]).addClass('is-valid');
					}
				}else if(i==5){
					if(decimalDeduction > decimalAmount){
						if(firstRequired==""){
							firstRequired = IDArray[i];
						};

						$(IDArray[i]).addClass('is-invalid');
						document.getElementById(ErrorIDArray[i]).innerHTML = "Deduction amount is too high.";
					}else{
						document.getElementById(ErrorIDArray[i]).innerHTML = "";	
						$(IDArray[i]).addClass('is-valid');
					}
				}else{
					document.getElementById(ErrorIDArray[i]).innerHTML = "";	
					$(IDArray[i]).addClass('is-valid');
					if(i==0){
						$("[aria-labelledby='select2-addemployeeID-container']").addClass('is-valid');
					}else if(i==1){
						$("[aria-labelledby='select2-addloantypeID-container']").addClass('is-valid');
					}else if(i==6){
						$("[aria-labelledby='select2-addtermofpaymentID-container']").addClass('is-valid');
					}
				 }
			}
		}

		if(firstRequired!=""){
			$(firstRequired).focus();
			return false;
		}else{
			$('#add_loan').hide();
			$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
		}		

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
		/*$('#edit_loan').on('hidden.bs.modal', function(){
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
        	
		});*/
	$('.editloan').unbind('click').bind('click', function(){
		$(".modal-body #editemployeeID").val($(this).data('employeeid'));
		$(".modal-body #editloantypeID").val( $(this).data('loantypeid1'));
		$(".modal-body #editemployeeID").trigger("change");
		$(".modal-body #editloantypeID").trigger("change");
		$(".modal-body #editdategranted").val( $(this).data('dategranted'));
		$(".modal-body #editenddate").val( $(this).data('enddate'));
		$(".modal-body #editamount").val( $(this).data('amount'));
		$(".modal-body #editdeduction").val( $(this).data('deduction'));
		$(".modal-body #edittermofpaymentID").val( $(this).data('termofpayment'));
		$(".modal-body #edittermofpaymentID").trigger("change");
		$(".modal-body #editotherinput").val( $(this).data('lnothers'));
		$('.edit').attr('id', $(this).data('id'));
	});	
	
         	/* updated employee */
$('.update').unbind('click').bind('click', function(){
		var IDArray = ['#editemployeeID', '#editloantypeID','#editotherinput', '#editdategranted', 
					   '#editenddate', '#editamount', '#editdeduction', '#edittermofpaymentID'];

		var ErrorIDArray = ['edit-employee', 'edit-loantype','edit-otherinput', 'edit-dategranted',
						    'edit-enddate', 'edit-amount', 'edit-deduction' , 'edit-termofpaymentID'];

		var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');

		var employeeID 		= $('#editemployeeID').val();
	 	var editloantypeID 	= $('#editloantypeID').val();
		var dategranted 	= $("#editdategranted").val();
		var enddate 		= $("#editenddate").val();
		var editamount 		= $("#editamount").val();
		var editdeduction 	= $("#editdeduction").val();
		var edittermofpaymentID = $("#edittermofpaymentID").val();
		
		var editarrtodate 	= dategranted.replace("-","");
		var editarrt1odate 	= enddate.replace("-","");

		var decimalAmount    = parseInt(editamount.replace(",",""));
		var decimalDeduction = parseInt(editdeduction.replace(",",""));

		 $(".select2-selection--single").each(function(){
            $(this).removeClass("is-invalid");
            $(this).removeClass("is-valid");   
     	 });

		for(var i=0;i<IDArray.length;i++){
			$(IDArray[i]).removeClass("is-invalid");
            $(IDArray[i]).removeClass("is-valid");
			
			if(i==2 && editloantypeID!=6){
				continue;
			}

			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.0000"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
				};

	        	$(IDArray[i]).addClass('is-invalid');
				document.getElementById(ErrorIDArray[i]).innerHTML = "Please provide " + $(IDArray[i]).attr("description") +".";

				if(i==0){
					$("[aria-labelledby='select2-editemployeeID-container']").addClass('is-invalid');
				}else if(i==1){
					$("[aria-labelledby='select2-editloantypeID-container']").addClass('is-invalid');
				}else if(i==6){
					$("[aria-labelledby='select2-edittermofpaymentID-container']").addClass('is-invalid');
				}
			}else{
			    if(i==3){
					if(new Date(dategranted) > new Date(enddate)){
						if(firstRequired==""){
							firstRequired = IDArray[i];
						};

						$(IDArray[i]).addClass('is-invalid');
						document.getElementById(ErrorIDArray[i]).innerHTML = "Please choose a valid end date.";
					}else{
						document.getElementById(ErrorIDArray[i]).innerHTML = "";	
						$(IDArray[i]).addClass('is-valid');
					}
				}else if(i==5){
					if(decimalDeduction > decimalAmount){
						if(firstRequired==""){
							firstRequired = IDArray[i];
						};

						$(IDArray[i]).addClass('is-invalid');
						document.getElementById(ErrorIDArray[i]).innerHTML = "Deduction amount is too high.";
					}else{
						document.getElementById(ErrorIDArray[i]).innerHTML = "";	
						$(IDArray[i]).addClass('is-valid');
					}
				}else{
					document.getElementById(ErrorIDArray[i]).innerHTML = "";	
					$(IDArray[i]).addClass('is-valid');
					if(i==0){
						$("[aria-labelledby='select2-editemployeeID-container']").addClass('is-valid');
					}else if(i==1){
						$("[aria-labelledby='select2-editloantypeID-container']").addClass('is-valid');
					}else if(i==6){
						$("[aria-labelledby='select2-edittermofpaymentID-container']").addClass('is-valid');
					}
				 }
			}
		}
		
		if(firstRequired!=""){
			$(firstRequired).focus();
			return false;
		}else{
			$('#edit_loan').hide();
			$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		}		

		return false;
	 });

	$("#cncl-edit").unbind('click').bind('click', function(){
		$('#confirmation_edit').modal('hide');
		$('#edit_loan').show();

	});

	$(document).on("click", ".edit", function(){
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

	$(document).on("click", ".deleteloan", function(){
		$('#confirmation_delete .delete').attr('id', $(this).attr('id'));
	});	  

	$(document).on("click", ".delete", function(){
		var loanID = $(this).attr('id');
		
		$.ajax({
				url : "<?php echo site_url('loans/delete');?>",
				method : "POST",
				data : {loanID:loanID},
				async : true,
				success: function(data){
					window.location.replace('<?php echo base_url(); ?>Loans');		
			    },
				error: function(request, textStatus, error) {
					return false;
				}
		});
		return false;
	 });   
	
});    
</script>

