<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Company Name</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Company Name</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_company" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Company</a>
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
								<th>Company No</th>
								<th>Company Name</th>
								<th>Contact Person</th>
								<th>Address</th>
								<th>email</th>
								<th>Phone Number</th>
								<th>Mobile Number</th>
								<th>Website</th>
								<th class="text-right">Actions</th>
							</tr>
						</thead>
						<tbody>
							 <?php foreach ($data as $record):?>
							<tr>
								<td><?php echo $record->companyID ?></td>
								<td><?php echo $record->company ?></td>
								<td><?php echo $record->contactperson ?></td>
								<td><?php echo $record->address ?></td>
								<td><?php echo $record->email ?></td>
								<td><?php echo $record->phonenumber ?></td>
								<td><?php echo $record->mobilenumber ?></td>
								<td><?php echo $record->website ?></td>
								<td class="text-right">
									<button type="button" 
									id="<?php echo $record->companyID; ?>" 
									data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
									class="btn btn-info btn-sm edit_company" 
									data-toggle="modal" data-target="#edit_company" 
									data-id="<?php echo $record->companyID; ?>" 
									data-company="<?php echo $record->company; ?>"
									data-contactperson="<?php echo $record->contactperson; ?>" 
									data-address="<?php echo $record->address; ?>" 
									data-city="<?php echo $record->city; ?>" 
									data-province="<?php echo $record->province; ?>" 
									data-postalcode="<?php echo $record->postalcode; ?>" 
									data-email="<?php echo $record->email; ?>"
									data-phonenumber="<?php echo $record->phonenumber; ?>" 
									data-mobilenumber="<?php echo $record->mobilenumber; ?>" 
									data-Fax="<?php echo $record->Fax; ?>" 
									data-website="<?php echo $record->website; ?>" 
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
	<!-- Add Company Modal -->
	<div id="add_company" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Company</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Company Name<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addcompany"name="addcompany" description="Company Name">
							<div class="invalid-feedback" id="add-company"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Contact Person<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addcontactperson"name="addcontactperson" description="Contact Person">
							<div class="invalid-feedback" id="add-contactperson"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Address<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addaddress"name="addaddress" description="Address">
							<div class="invalid-feedback" id="add-address"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">City<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addcity"name="addcity" description="City">
							<div class="invalid-feedback" id="add-city"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">State/Province<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addprovince"name="addprovince" description="State/Province">
							<div class="invalid-feedback" id="add-province"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Postal Code<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="addpostalcode"name="addpostalcode" minlength=4 autocomplete="off" description="Postal Code">
							<div class="invalid-feedback" id="add-postalcode"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Email<code>*</code></label>
							<input type="text" class="form-control "id="addemail"name="addemail" description="Email">
							<div class="invalid-feedback" id="add-email"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Phone Number<code>*</code></label>
							<input type="text" class="form-control numbersonly"id="addphonenumber"name="addphonenumber"  minlength=13 autocomplete="off" description="Phone Number">
							<div class="invalid-feedback" id="add-phonenumber"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Mobile Number<code>*</code></label>
							<input type="text" class="form-control numbersonly"id="addmobilenumber"name="addmobilenumber"  minlength=13 autocomplete="off" description="Phone Number">
							<div class="invalid-feedback" id="add-mobilenumber"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Fax</label>
							<input type="text" class="form-control numbersonly"id="addfax"name="addfax" description="Phone Number">
							<div class="invalid-feedback" id="add-fax"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Website<code>*</code></label>
							<input type="text" class="form-control "id="addwebsite"name="addwebsite" description="Phone Number">
							<div class="invalid-feedback" id="add-website"></div>
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
	<!-- /Add Company Modal -->

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
		<!-- Add Leave Modal -->
	<div id="edit_company" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Company</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Company Name<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editcompany"name="editcompany" description="Company Name">
							<div class="invalid-feedback" id="edit-company"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Contact Person<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editcontactperson"name="editcontactperson" description="Contact Person">
							<div class="invalid-feedback" id="edit-contactperson"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Address<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editaddress"name="editaddress" description="Address">
							<div class="invalid-feedback" id="edit-address"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">City<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editcity"name="editcity" description="City">
							<div class="invalid-feedback" id="edit-city"></div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">State/Province<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editprovince"name="editprovince" description="State/Province">
							<div class="invalid-feedback" id="edit-province"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Postal Code<code>*</code></label>
							<input type="text" class="form-control alphanumericwithspace"id="editpostalcode"name="editostalcode" minlength=4 autocomplete="off" description="Postal Code">
							<div class="invalid-feedback" id="edit-postalcode"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Email<code>*</code></label>
							<input type="text" class="form-control "id="editemail"name="editemail" description="Email">
							<div class="invalid-feedback" id="edit-email"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Phone Number<code>*</code></label>
							<input type="text" class="form-control numbersonly"id="editphonenumber"name="editphonenumber"  minlength=13 autocomplete="off" description="Phone Number">
							<div class="invalid-feedback" id="edit-phonenumber"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Mobile Number<code>*</code></label>
							<input type="text" class="form-control numbersonly"id="editmobilenumber"name="editmobilenumber"  minlength=13 autocomplete="off" description="Phone Number">
							<div class="invalid-feedback" id="edit-mobilenumber"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Fax</label>
							<input type="text" class="form-control numbersonly"id="editfax"name="editfax" description="Phone Number">
							<div class="invalid-feedback" id="edit-fax"></div>
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
							<label for="description">Website<code>*</code></label>
							<input type="text" class="form-control "id="editwebsite"name="editwebsite" description="Phone Number">
							<div class="invalid-feedback" id="edit-website"></div>
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
	<!-- /Edit Company Modal -->
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
<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>		
<script  type="text/javascript">  
$(document).ready(function() {

	$('#addphonenumber').mask('0000-000-0000');
	$('#addmobilenumber').mask('0000-000-0000');
	$('#addpostalcode').mask('0000');

	$('#editphonenumber').mask('0000-000-0000');
	$('#editmobilenumber').mask('0000-000-0000');
	$('#editpostalcode').mask('0000');

	$('#add_company').on('hidden.bs.modal', function(){
	    $(this).find('form')[0].reset();
	    $(".invalid-feedback").html("");
		$('input').removeClass('is-invalid');
		$('input').removeClass('is-valid');
		$('select').removeClass('is-invalid');
		$('select').removeClass('is-valid');
	}); 
	 $("#cncl-add").unbind('click').bind('click', function(){
		$('#confirmation_add').modal('hide');
		$('#add_company').show();

	});

	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addcompany', '#addcontactperson', '#addaddress', '#addcity', '#addprovince', '#addpostalcode', '#addemail', '#addphonenumber', '#addmobilenumber', '#addfax', '#addwebsite'];
		var ErrorIDArray = ['add-company', 'add-contactperson', 'add-address', 'add-city', 'add-province', 'add-postalcode', 'add-email', 'add-phonenumber', 'add-mobilenumber', 'add-fax', 'add-website'];
		var ValueArray = [];	
		var firstRequired = "";
		var navIndex = 0;
		var phone = $("#addphonenumber").val();
		var mobile = $("#addmobilenumber").val();
		var postal = $("#addpostalcode").val();
		if(phone.length<13){
			document.getElementById(ErrorIDArray[7]).innerHTML = "Mobile number must be 11 digit " ;
			$(IDArray[7]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
			document.getElementById(ErrorIDArray[7]).innerHTML = "";
			$(IDArray[7]).removeClass('is-invalid');
			$(IDArray[7]).addClass('is-valid');
			event.preventDefault();
		};
		if(mobile.length<13){
			document.getElementById(ErrorIDArray[8]).innerHTML = "Mobile number must be 11 digit " ;
			$(IDArray[8]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
			document.getElementById(ErrorIDArray[8]).innerHTML = "";
			$(IDArray[8]).removeClass('is-invalid');
			$(IDArray[8]).addClass('is-valid');
			event.preventDefault();
		};
		if(postal.length<4){
			document.getElementById(ErrorIDArray[5]).innerHTML = "Postal Code must be 4 digit " ;
			$(IDArray[5]).addClass('is-invalid');
			event.preventDefault();
			return false;
		}else{
		document.getElementById(ErrorIDArray[5]).innerHTML = "";
			$(IDArray[5]).removeClass('is-invalid');
			$(IDArray[5]).addClass('is-valid');
			event.preventDefault();
		};

			for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==9)  continue;
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
		$('#add_company').hide();
		$('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
		
	}); 
	$('.add').unbind('click').bind('click', function(){
			var company 			= 		$("#addcompany").val();
			var contactperson 		= 		$("#addcontactperson").val(); 
			var address 			= 		$("#addaddress").val(); 
			var city 				= 		$("#addcity").val();
			var province 			= 		$("#addprovince").val();
			var postalcode 			= 		$("#addpostalcode").val(); 
			var email 				= 		$("#addemail").val();
			var phonenumber 		= 		$("#addphonenumber").val(); 
			var mobilenumber 		= 		$("#addmobilenumber").val();
			var fax 				= 		$("#addfax").val();  
			var website 			= 		$("#addwebsite").val();  
			$.ajax({
	            url : "<?php echo site_url('Company/save');?>",
	            method : "POST",
	            data : {company: 		company, 			contactperson: 			contactperson,				address: 				address,
	            		city: 			city, 				province: 				province,					postalcode: 			postalcode,
	            		email: 			email, 				phonenumber: 			phonenumber, 				mobilenumber:   		mobilenumber,
	            		fax: 			fax,				website: 				 website},
	            async : true,
	            dataType : 'json',
	            success: function(data){
	            var result = data.split('|');
	            	if(result[0]=="false"){
								document.getElementById("add-company").innerHTML = result[1];
					        	$('#addcompany').removeClass('is-valid');
					        	$('#addcompany').addClass('is-invalid');
					        	$('#add-company').addClass('invalid-feedback');
					        	$("#addcompany").focus();
					}else{
								window.location.replace('<?php echo base_url(); ?>company');

					}
				},	
				 error: function(request, textStatus, error) {
				} 
			});						
			return false;
	});	
	$('.edit_company').unbind('click').bind('click', function(){
			$(".modal-body #editcompany").val( $(this).data('company'));	
			$(".modal-body #editcontactperson").val($(this).data('contactperson'));
			$(".modal-body #editaddress").val($(this).data('address'));
			$(".modal-body #editcity").val($(this).data('city'));
			$(".modal-body #editprovince").val($(this).data('province'));
			$(".modal-body #editpostalcode").val($(this).data('postalcode'));
			$(".modal-body #editemail").val($(this).data('email'));
			$(".modal-body #editphonenumber").val($(this).data('phonenumber'));
			$(".modal-body #editmobilenumber").val($(this).data('mobilenumber'));
			$(".modal-body #editfax").val($(this).data('Fax'));
			$(".modal-body #editwebsite").val($(this).data('website'));
			$('.edit').attr('id', $(this).data('id'));
	});
	$('.update').unbind('click').bind('click', function(){
			var id = $(this).attr('id');
			var IDArray = ['#editcompany', '#editcontactperson', '#editaddress', '#editcity', '#editprovince', '#editpostalcode', '#editemail', '#editphonenumber', '#editmobilenumber', '#editfax', '#editwebsite'];
			var ErrorIDArray = ['edit-company', 'edit-contactperson', 'edit-address', 'edit-city', 'edit-province', 'edit-postalcode', 'edit-email', 'edit-phonenumber', 'edit-mobilenumber', 'edit-fax', 'edit-website'];
			var ValueArray = [];	
			var firstRequired = "";
			var navIndex = 0;
			var navIndex = 0;
			var editphone = $("#editphonenumber").val();
			var editmobile = $("#editmobilenumber").val();
			var editpostal = $("#editpostalcode").val();
			if(editphone.length<13){
				document.getElementById(ErrorIDArray[7]).innerHTML = "Mobile number must be 11 digit " ;
				$(IDArray[7]).addClass('is-invalid');
				event.preventDefault();
				return false;
			}else{
				document.getElementById(ErrorIDArray[7]).innerHTML = "";
				$(IDArray[7]).removeClass('is-invalid');
				$(IDArray[7]).addClass('is-valid');
				event.preventDefault();
			};
			if(editmobile.length<13){
				document.getElementById(ErrorIDArray[8]).innerHTML = "Mobile number must be 11 digit " ;
				$(IDArray[8]).addClass('is-invalid');
				event.preventDefault();
				return false;
			}else{
				document.getElementById(ErrorIDArray[8]).innerHTML = "";
				$(IDArray[8]).removeClass('is-invalid');
				$(IDArray[8]).addClass('is-valid');
				event.preventDefault();
			};
			if(editpostal.length<4){
				document.getElementById(ErrorIDArray[5]).innerHTML = "Postal Code must be 4 digit " ;
				$(IDArray[5]).addClass('is-invalid');
				event.preventDefault();
				return false;
			}else{
			document.getElementById(ErrorIDArray[5]).innerHTML = "";
				$(IDArray[5]).removeClass('is-invalid');
				$(IDArray[5]).addClass('is-valid');
				event.preventDefault();
			};
			for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==9)  continue;
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
		$('#edit_company').hide();
		$('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
		event.preventDefault(); 
		return false;
		}
	});	
	$("#cncl-edit").unbind('click').bind('click', function(){
			$('#confirmation_edit').modal('hide');
			$('#edit_company').show();

	});	
	$('.edit').unbind('click').bind('click', function(){	 
			var id 					= 		$(this).attr('id');
			var editcompany 			= 		$("#editcompany").val();
			var editcontactperson 		= 		$("#editcontactperson").val(); 
			var editaddress 			= 		$("#editaddress").val(); 
			var editcity 				= 		$("#editcity").val();
			var editprovince 			= 		$("#editprovince").val();
			var editpostalcode 			= 		$("#editpostalcode").val(); 
			var editemail 				= 		$("#editemail").val();
			var editphonenumber 		= 		$("#editphonenumber").val(); 
			var editmobilenumber 		= 		$("#editmobilenumber").val();
			var editfax 				= 		$("#editfax").val();  
			var editwebsite 			= 		$("#editwebsite").val();  
			$.ajax({
	            url : "<?php echo site_url('Company/update');?>",
	            method : "POST",
	            data : {id:  			id,
	            		editcompany: 		editcompany, 			editcontactperson: 			editcontactperson,				editaddress: 				editaddress,
	            		editcity: 			editcity, 				editprovince: 				editprovince,					editpostalcode: 			editpostalcode,
	            		editemail: 			editemail, 				editphonenumber: 			editphonenumber, 				editmobilenumber:   		editmobilenumber,
	            		editfax: 			editfax,				editwebsite: 				 editwebsite},
	            async : true,
	            dataType : 'json',
	            success: function(data){
	            var result = data.split('|');
	            	if(result[0]=="false"){
								document.getElementById("edit-company").innerHTML = result[1];
					        	$('#editcompany').removeClass('is-valid');
					        	$('#editcompany').addClass('is-invalid');
					        	$('#edit-company').addClass('invalid-feedback');
					        	$("#editcompany").focus();
					}else{
								window.location.replace('<?php echo base_url(); ?>company');

					}
				},	
				 error: function(request, textStatus, error) {
				} 
			});						
			return false;
	});	

});	
</script>


