<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
    	<div class="loader"></div>
		<div class="row">
			<div class="col-md-12">
			
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
								<input class="form-control alphanumericwithspacecompany" type="text" id="editcompany"name="editcompany" value="<?php echo $record->company; ?>" description="Company Name">
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
							<div class="col-sm-3">
							<div class="form-group">
								<label>Unit Number</label>
								<input class="form-control alphanumericwithspace" id="unitno"name="unitno" value="<?php echo $record->unitno; ?>" type="text">
								<div class="invalid-feedback" id="edit-unitno"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Bldg. Name/House Number  <code>*</code></label>
								<input class="form-control alphanumericwithspace" id="bldgname"name="bldgname" value="<?php echo $record->bldgname; ?>" type="text">
								<div class="invalid-feedback" id="edit-bldgname"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Street Name <code>*</code></label>
								<input class="form-control alphanumericwithspace" id="streetname"name="streetname" value="<?php echo $record->streetname; ?>" type="text" description="Street name">
								<div class="invalid-feedback" id="edit-streetname"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Subdivision Name </label>
								<input class="form-control alphanumericwithspace" id="subdivision"name="subdivision" value="<?php echo $record->subdivisionname; ?>" type="text">
								<div class="invalid-feedback" id="edit-subdivision"></div>
							</div>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="form-group">
								<label>Barangay <code>*</code></label>
								<input class="form-control alphanumericwithspace" id="barangay"name="barangay" value="<?php echo $record->barangay; ?>" type="text" description="Barangay">
								<div class="invalid-feedback" id="edit-barangay"></div>
							</div>	

						</div>	
						<div class="col-sm-3">
							<div class="form-group">
								<label>Municipality / City <code>*</code></label>
								<input class="form-control letterswithspace"id="municipality"name="municipality" value="<?php echo $record->municipality; ?>" type="text" description="Municipality">
								<div class="invalid-feedback" id="edit-municipality"></div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group">
								<label>Province/State/Country <code>*</code></label>
								<input type="text" class="form-control alphanumericwithspace"id="editprovince"name="editprovince" description="State/Province" value="<?php echo $record->province; ?>">
								<div class="invalid-feedback" id="edit-province"></div>
							</div>
						</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Zip Code <code>*</code></label>
								<input class="form-control alphanumericwithspace"id="editpostalcode"name="editpostalcode" value="<?php echo $record->zipcode; ?>" minlength=4 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-postalcode"></div>
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
							<div class="col-sm-3">
							<div class="form-group">
								<label>TIN </label>
								<input class="form-control alphanumericwithspace" id="tinno"name="tinno" value="<?php echo $record->tinno; ?>" value="000-000-000" placeholder="000-000-000" minlength=11 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-tinno"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>SSS Number </label>
								<input class="form-control alphanumericwithspace" id="sssno"name="sssno" value="<?php echo $record->sssno; ?>" value="00-0000000-0" placeholder="00-0000000-0" minlength=12 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-sssno"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>PhilHealth Number </label>
								<input class="form-control alphanumericwithspace" id="phic"name="phic" value="<?php echo $record->phic; ?>" value="0000-0000-0000" placeholder="0000-0000-0000" minlength=14 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-phic"></div>
							</div>
							</div>
							<div class="col-sm-3">
							<div class="form-group">
								<label>Pag-IBIG MID Number </label>
								<input class="form-control alphanumericwithspace" id="pagibig"name="pagibig" value="<?php echo $record->pagibig; ?>" value="0000-0000-0000" placeholder="0000-0000-0000" minlength=14 autocomplete="off" type="text">
								<div class="invalid-feedback" id="edit-pagibig"></div>
							</div>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Email <code>*</code></label>
								<input class="form-control withoutspace" id="editemail"name="editemail" value="<?php echo $record->email; ?>" type="email">
								<div class="invalid-feedback" id="edit-email"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Phone Number <code>*</code></label>
								<input class="form-control alphanumericwithspace"id="phonenumber"name="phonenumber" value="<?php echo $record->phonenumber; ?>" minlength=8 autocomplete="off" type="text"description="Phone number">
								<div class="invalid-feedback" id="edit-phonenumber"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Mobile Number <code>*</code></label>
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
								<label>Website URL</label>
								<input class="form-control withoutspace" id="editwebsite"name="editwebsite" value="<?php echo $record->website; ?>" type="text">
								<div class="invalid-feedback" id="edit-website"></div>
							</div>
						</div>
					</div>
					<div class="submit-section">
					<button class="btn btn-primary submit-btn update" style="width:20rem;">Update</button>
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
<?php 
	if($this->session->flashdata('success')!=""){
		echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
	}
?>		
<script  type="text/javascript">  
$(document).ready(function() {
	$('#phonenumber').mask('00-00000-0000');
	$('#editmobilenumber').mask('0000-000-0000');
	$('#editfax').mask('00-00-00000000');
	$('#editpostalcode').mask('0000');
	$('#tinno').mask('000-000-000');
    $('#sssno').mask('00-0000000-0');
    $('#phic').mask('00-000000000-0');
    $('#pagibig').mask('0000-0000-0000');

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
			$("#unitno").val($(this).data('unitno'));
			$("#bldgname").val($(this).data('bldgname'));
			$("#streetname").val($(this).data('streetname'));
			$("#subdivision").val($(this).data('subdivisionname'));
			$("#barangay").val($(this).data('barangay'));
			$("#municipality").val($(this).data('municipality'));
			$("#editprovince").val($(this).data('province'));
			$("#editpostalcode").val($(this).data('zipcode'));
			$("#tinno").val($(this).data('tinno'));
			$("#sssno").val($(this).data('sssno'));
			$("#phic").val($(this).data('phic'));
			$("#pagibig").val($(this).data('pagibig'));
			$("#editemail").val($(this).data('email'));
			$("#phonenumber").val($(this).data('phonenumber'));
			$("#editmobilenumber").val($(this).data('mobilenumber'));
			$("#editfax").val($(this).data('Fax'));
			$("#editwebsite").val($(this).data('website'));
	});
	$('.update').unbind('click').bind('click', function(){
			var id = $("#companyid").val();
			$('.edit').attr('id', id);
			var id = $(this).attr('id');
			//alert(id);
				// 0 <--- company 		 1 <--- contactperson 	2<---unitno		3<---bldgname
				// 4 <-- streetname 	 5 <--- Subdivision     6<---Barangay   7<---Municipality
				// 8 <-- province		 9 <--- postalcode  	10<--tinno 		11<--sssno
				// 12<-- phic   		 13<---pagibig  		14<--email 		15<--phonenumber
				// 16<---mobilenumber    17<---fax 				18<--website
			var IDArray 	= ['#editcompany', 				'#editcontactperson',	'#unitno',		 	'#bldgname',		 			'#streetname', 	'#subdivision',
								'#barangay', 				'#municipality', 		'#editprovince', 	'#editpostalcode', 				'#tinno', 			
								'#sssno', 					'#phic', 				'#pagibig', 	 	'#editemail',		 			'#phonenumber',
								'#editmobilenumber',		'#editfax', 			'#editwebsite'];

			var ErrorIDArray = ['edit-company',  			'edit-contactperson',	'edit-unitno',		 'edit-bldgname',		 'edit-streetname', 'edit-subdivision',
			 					'edit-barangay',		 	'edit-municipality', 	'edit-province', 'edit-postalcode',  	  	 'edit-tinno', 
			 					'edit-sssno', 	 		 	'edit-phic', 			'edit-pagibig',		 'edit-email', 	     	 'edit-phonenumber',
			 					'edit-mobilenumber', 		'edit-fax', 				'edit-website'];
			var ValueArray = [];	
			var firstRequired = "";
			var navIndex = 0;
			var navIndex = 0;
			var editmobile = $("#editmobilenumber").val();
			var editpostal = $("#editpostalcode").val();
			var phonenumber = $("#phonenumber").val();
			var fax = $("#editfax").val();
			for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim()
			if(i==2 || i==5 /*|| i==10 || i==11 || i==12 || i==13*/  || i==17 || i==18)  continue;
			 if(i==9){
            if($(IDArray[i]).val().length<4){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Postal Code must be 4 digit";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
            }
             }else if(i==10){
            if($(IDArray[i]).val().length<11){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "TIN number must be 11 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();

            }
           }else if(i==11){
            if($(IDArray[i]).val().length<12){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "SSS number must be 12 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
           
            }   
            }else if(i==12){
            if($(IDArray[i]).val().length<14){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Philhealth number must be 14 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
           
            }
          }else if(i==13){
            if($(IDArray[i]).val().length<14){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Pag-ibig number must be 14 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
            }              
        	}else if(i==15){
            if($(IDArray[i]).val().length<12){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Phone number must be 10 digit";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();

            }
       		 }else if(i==16){
            if($(IDArray[i]).val().length<13){
               if(firstRequired==""){
                  firstRequired = IDArray[i];
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Mobile number must be 11 digit";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();

            }
            }else{

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
			var unitno 					=		$("#unitno").val(); 
			var bldgname  				=		$("#bldgname").val(); 
			var streetname 				=		$("#streetname").val(); 		
			var subdivisionname 		=		$("#subdivision").val(); 
			var barangay 				= 		$("#barangay").val();
			var municipality 			=		$("#municipality").val();
			var province 				= 		$("#editprovince").val();
			var zipcode 				= 		$("#editpostalcode").val();
			var tinno 					= 		$("#tinno").val();
			var sssno 					= 		$("#sssno").val();
			var phic 					= 		$("#phic").val();
			var pagibig 				= 		$("#pagibig").val();
			var email 					=  		$("#editemail").val();
			var phonenumber 			= 		$("#phonenumber").val();
			var mobilenumber 			= 		$("#editmobilenumber").val();
			var Fax 					= 		$("#editfax").val();
			var website 				= 		$("#editwebsite").val();
			$.ajax({
	            url : "<?php echo site_url('Company/update');?>",
	            method : "POST",
	            data : {id:  				id,
	            		editcompany: 		editcompany, 			editcontactperson: 			editcontactperson,			unitno: 				unitno,
	            		bldgname: 			bldgname, 				streetname: 				streetname,					subdivisionname: 			subdivisionname,
	            		barangay: 			barangay,  				municipality:   			municipality,				province: 					province,			
	            		zipcode: 			zipcode, 				tinno: 						tinno, 						sssno: 						sssno,
	            		phic: 				phic,  					pagibig: 					pagibig, 					email: 						email,
	            	 	phonenumber: 		phonenumber, 			mobilenumber: 				mobilenumber,				 Fax: 						Fax,
	            	 	website: 			website},
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
								window.location.replace('<?php echo base_url(); ?>Company');

					}
				},	
				 error: function(request, textStatus, error) {
				} 
			});						
			return false;
	});	

});	
</script>


