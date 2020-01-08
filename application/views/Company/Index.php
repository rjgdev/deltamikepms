<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Company Profile</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<div id="edit_company">
				<form>

					<?php foreach ($data as $record):?>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Company Name <code>*</code></label>
									<input class="form-control" type="hidden" id="companyid" name="companyid" value="<?php echo $record->companyID; ?>">
								<input class="form-control alphanumericwithspace" type="text" id="editcompany"name="editcompany" value="<?php echo $record->company; ?>" description="Company Name">
								<div class="invalid-feedback" id="edit-company"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Contact Person</label>
								<input class="form-control letterswithspace" id="editcontactperson"name="editcontactperson" value="<?php echo $record->contactperson; ?>" type="text">
								<div class="invalid-feedback" id="edit-contactperson"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Address <code>*</code></label>
								<input class="form-control alphanumericwithspace" id="editaddress"name="editaddress" value="<?php echo $record->address; ?>" type="text">
								<div class="invalid-feedback" id="edit-address"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>City<code>*</code></label>
								<input class="form-control letterswithspace"id="editcity"name="editcity" value="<?php echo $record->city; ?>" type="text">
								<div class="invalid-feedback" id="edit-city"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>State/Province<code>*</code></label>
								<input type="text" class="form-control letterswithspace"id="editprovince"name="editprovince" description="State/Province" value="<?php echo $record->province; ?>">
								<div class="invalid-feedback" id="edit-province"></div>
							</div>
						</div>
					<!-- 	<div class="col-sm-6">
							<div class="form-group">
								<label>Postal Code<code>*</code></label>
								<input class="form-control alphanumericwithspace"id="editpostalcode"name="editostalcode" value="<?php echo $record->postalcode; ?>" minlength=4 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-postalcode"></div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email<code>*</code></label>
								<input class="form-control withoutspace" id="editemail"name="editemail" value="<?php echo $record->email; ?>" type="email">
								<div class="invalid-feedback" id="edit-email"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Postal Code<code>*</code></label>
								<input class="form-control alphanumericwithspace"id="editpostalcode"name="editostalcode" value="<?php echo $record->postalcode; ?>" minlength=4 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-postalcode"></div>
							</div>
						</div>
						<!-- <div class="col-sm-6">
							<div class="form-group">
								<label>Phone Number<code>*</code></label>
								<input class="form-control numbersonly numbersonly" id="editphonenumber"name="editphonenumber" value="<?php echo $record->phonenumber; ?>" minlength=13 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-phonenumber"></div>
							</div>
						</div> -->
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mobile Number<code>*</code></label>
								<input class="form-control numbersonly" id="editmobilenumber"name="editmobilenumber" value="<?php echo $record->mobilenumber; ?>"  minlength=13 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-mobilenumber"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Fax</label>
								<input class="form-control numbersonly" id="editfax"name="editfax" minlength=13 autocomplete="off" value="<?php echo $record->Fax; ?>" type="text">
								<div class="invalid-feedback" id="edit-fax"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Website Url</label>
								<input class="form-control withoutspace" id="editwebsite"name="editwebsite" value="<?php echo $record->website; ?>" type="text">
								<div class="invalid-feedback" id="edit-website"></div>
							</div>
						</div>
					</div>
					<div class="submit-section">
					<button class="btn btn-primary submit-btn update">Update</button>
					</div>
				<?php endforeach; ?>
				
				</form>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
</div>
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
	$('#editfax').mask('00-00-00000000');
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

	
	$('.edit_company').unbind('click').bind('click', function(){
			$("#editcompany").val( $(this).data('company'));	
			$("#editcontactperson").val($(this).data('contactperson'));
			$("#editaddress").val($(this).data('address'));
			$("#editcity").val($(this).data('city'));
			$("#editprovince").val($(this).data('province'));
			$("#editpostalcode").val($(this).data('postalcode'));
			$("#editemail").val($(this).data('email'));
			$("#editphonenumber").val($(this).data('phonenumber'));
			$("#editmobilenumber").val($(this).data('mobilenumber'));
			$("#editfax").val($(this).data('Fax'));
			$("#editwebsite").val($(this).data('website'));
			$('.edit').attr('id', $(this).data('id'));
	});
	$('.update').unbind('click').bind('click', function(){
			var id = $("#companyid").val();
			$('.edit').attr('id', id);
			//var id = $(this).attr('id');
			//alert(id);
			var IDArray = ['#editcompany', '#editcontactperson', '#editaddress', '#editcity', '#editprovince', '#editpostalcode', '#editemail',  '#editmobilenumber', '#editfax', '#editwebsite'];
			var ErrorIDArray = ['edit-company', 'edit-contactperson', 'edit-address', 'edit-city', 'edit-province', 'edit-postalcode', 'edit-email',  'edit-mobilenumber', 'edit-fax', 'edit-website'];
			var ValueArray = [];	
			var firstRequired = "";
			var navIndex = 0;
			var navIndex = 0;
			var editmobile = $("#editmobilenumber").val();
			var editpostal = $("#editpostalcode").val();
			var fax = $("#editfax").val();
			if(editmobile.length<13){
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

		   if(fax.length<12){
		     document.getElementById(ErrorIDArray[8]).innerHTML = "Fax number must be 12 digit ";
		    $(IDArray[8]).addClass('is-invalid');
		    event.preventDefault();
		    return false;
		    }else{
		       document.getElementById(ErrorIDArray[8]).innerHTML = "";
		    $(IDArray[8]).removeClass('is-invalid');
		    $(IDArray[8]).addClass('is-valid');
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
			var id 						= 		$(this).attr('id');
			var editcompany 			= 		$("#editcompany").val();
			var editcontactperson 		= 		$("#editcontactperson").val(); 
			var editaddress 			= 		$("#editaddress").val(); 
			var editcity 				= 		$("#editcity").val();
			var editprovince 			= 		$("#editprovince").val();
			var editpostalcode 			= 		$("#editpostalcode").val(); 
			var editemail 				= 		$("#editemail").val();
			var editmobilenumber 		= 		$("#editmobilenumber").val();
			var editfax 				= 		$("#editfax").val();  
			var editwebsite 			= 		$("#editwebsite").val();  
			$.ajax({
	            url : "<?php echo site_url('Company/update');?>",
	            method : "POST",
	            data : {id:  				id,
	            		editcompany: 		editcompany, 			editcontactperson: 			editcontactperson,				editaddress: 				editaddress,
	            		editcity: 			editcity, 				editprovince: 				editprovince,					editpostalcode: 			editpostalcode,
	            		editemail: 			editemail,  			editmobilenumber:   		editmobilenumber,				editfax: 					editfax,			
	            		editwebsite: 		editwebsite},
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


