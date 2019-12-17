<style>
	a.avatar { cursor: pointer; }
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employees</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Employees</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee" id="addemployee"><i class="fa fa-plus"></i> Add Employee</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<!-- Search Filter -->
		<div class="row filter-row">
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3"> 
				<div class="form-group form-focus select-focus">
					<select class="select floating"> 
						<option>Select Designation</option>
						<option>Web Developer</option>
						<option>Web Designer</option>
						<option>Android Developer</option>
						<option>Ios Developer</option>
					</select>
					<label class="focus-label">Designation</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">  
				<a href="#" class="btn btn-success btn-block"> Search </a>  
			</div>     
        </div>
		<!-- /Search Filter -->
		
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">

					<table class="table table-striped custom-table datatable">
						<span><?php if($this->session->flashdata('img')=="error") echo '<script type="text/javascript"> showUploadPhotoError() </script>';?></span>
						<span><?php if($this->session->flashdata('photo')=="upload") echo '<script type="text/javascript"> showPhotoToast() </script>';?></span>
						<span><?php if($this->session->flashdata('empstatus')=="empsuccess") echo '<script type="text/javascript"> showdataSuccessToast() </script>';?></span>
						<thead>
                  <tr>
                      <th style="width: 110px ! important;">Employee No.</th>
                      <th>Employee Name</th>
                      <th>Designation</th>
                      <th>Department</th>
                      <th>Contact No.</th>
                      <th>Hired Date</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead
						<tbody id="showdata">
							<?php foreach ($data['employee'] as $item)  { ?>  
						<tr>
                          <td><?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);  ?></td>
                           <td>
                            <a id="<?php echo $item->employeeID; ?>" class="avatar">
                            <?php	
                            if($item->photo==""){
                              echo '<img alt="" src="uploads/profileimg.png"></a>'.' '.$item->firstname.' '.$item->lastname.'</td>';
                            }else{
                              echo '<img alt="" src="uploads/'.$item->photo.'" ></a>'.' '.$item->firstname.' '.$item->lastname.'</td>';
                            } ?>
                           </td> 
                          <td><?php echo $item->designationdescription ?></td>
                          <td><?php echo $item->description ?></td>  
                          <td><?php echo  $item->contactinfo ?></td>
                          <td><?php echo date("F d, Y",strtotime($item->hireddate)) ?></td>

                          <td>
							<div class="dropdown action-label">
								<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
								<?php if($item->employeestatus=="Active") 
								echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
								elseif($item->employeestatus=="Terminated")
									echo '<i class="fa fa-dot-circle-o text-danger"></i> Terminated';
								elseif($item->employeestatus=="Resigned")
									echo '<i class="fa fa-dot-circle-o text-purple"></i> Resigned';
								else echo '<i class="fa fa-dot-circle-o text-danger"></i> End of Contract';
								?>
								</a> 
							<div class="dropdown-menu">
								<?php if($item->employeestatus=='Active'){ ?>
								<a class="dropdown-item terminated" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Terminated" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-danger"></i> Terminated</a>
								<a class="dropdown-item endofcontract" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Endofcontract" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-info"></i> End of Contract</a>
								<a class="dropdown-item resigned" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Resigned" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-purple"></i> Resigned</a>
								<?php } elseif($item->employeestatus=='Terminated'){ ?>
								<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Active" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-danger"></i> active</a>
								<a class="dropdown-item endofcontract" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Endofcontract" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-info"></i> End of Contract</a>
								<a class="dropdown-item resigned" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Resigned" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-purple"></i> Resigned</a> 
								 <?php } elseif($item->employeestatus=='Resigned'){ ?>
								<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Active" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-danger"></i> active</a>
								<a class="dropdown-item endofcontract" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Endofcontract" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-info"></i> End of Contract</a>
								<a class="dropdown-item terminated" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Terminated" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-purple"></i> Terminated</a>  
								<?php }else{  ?>
								<a class="dropdown-item activate" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Active" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-danger"></i> active</a>
								<a class="dropdown-item terminated" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Terminated" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-info"></i> Terminated</a>
								<a class="dropdown-item resigned" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="Resigned" data-employeestatus="<?php echo $item->employeestatus; ?>"><i class="fa fa-dot-circle-o text-purple"></i> Resigned</a>
								<?php } ?>
							</div>
							</div>
                          </td>	
                            <div class="dropdown action-label">

                            </div>	

								<td class="text-right">
								<button type="button" id="<?php echo $item->employeeID; ?>" class="btn btn-info btn-sm editemployee" data-toggle="modal" data-target="#edit_employee" data-id="<?php echo $item->employeeID; ?>" data-firstname="<?php echo $item->firstname; ?>"data-middlename="<?php echo $item->middlename; ?>" data-lastname="<?php echo $item->lastname; ?>" data-roleid="<?php echo $item->roleID; ?>" data-gender="<?php echo $item->gender; ?>" data-housenumber="<?php echo $item->housenumber; ?>" data-streetname="<?php echo $item->streetname; ?>" data-barangay="<?php echo $item->barangay; ?>"  data-city="<?php echo $item->city; ?>" data-birthdate="<?php echo $item->birthdate; ?>" data-contactinfo="<?php echo $item->contactinfo; ?>" data-civilstatus="<?php echo $item->civilstatus; ?>" data-citizenship="<?php echo $item->citizenship; ?>" data-hireddate="<?php echo $item->hireddate; ?>" data-departmentid="<?php echo $item->departmentID; ?>" data-designationid="<?php echo $item->designationID; ?>" data-detachmentid="<?php echo $item->detachmentID; ?>" data-designationid="<?php echo $item->designationID; ?>" data-designationdescription="<?php echo $item->designationdescription; ?>" data-employeestatus="<?php echo $item->employeestatus; ?>" data-username="<?php echo $item->username; ?>"  data-password="<?php echo $item->password; ?>" data-basicsalary="<?php echo $item->basicsalary; ?>" data-dailyrate="<?php echo $item->dailyrate; ?>" data-allowance="<?php echo $item->allowance; ?>" data-tinnumber="<?php echo $item->tinnumber; ?>" data-sssnumber="<?php echo $item->sssnumber; ?>" data-philhealthnumber="<?php echo $item->philhealthnumber; ?>"  data-pagibignumber="<?php echo $item->pagibignumber; ?>" data-tog="tooltip"data-placement="top" title="Edit"> <i class="fa fa-pencil"></i> 
								</button>	
								</td>
							</tr>
							
								<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Add Employee Modal -->
	<div id="add_employee" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="ModalLabel">Add Employee</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row grid-margin"> 
                    <div class="col-lg-12">
					<ul class="nav nav-tabs nav-tabs-bottom nav-justified" id="addtabs">
						<li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1" data-toggle="tab">Employee Information</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-toggle="tab">User Account</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">Payroll Information</a></li>
					</ul>

                  <div class="tab-content" id="pills-tabContent">
                  	<div class="tab-pane show active" id="bottom-justified-tab1">
                      <form class="form-group">
                        <div class="row">
                           
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="firstname">First Name <span class="text-danger">*</span></label>
                            <input id="addfirstname" type="text" name="addfirstname" class="form-control input" autocomplete="off" description="first name" required>
                            <div class="invalid-feedback" id="add-firstname"></div>
                          </div>
                            </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input id="addmiddlename" type="text" name="addmiddlename" class="form-control input" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="lastname">Last Name  <span class="text-danger">*</span></label>
                            <input id="addlastname" type="text" name="addlastname" class="form-control input" autocomplete="off" description="last name" required>
                             <div class="invalid-feedback" id="add-lastname"></div>
                          </div>
                          </div>
                         <div class="col-sm-12">
							<div class="form-group">
                            <label for="gender">Gender  <span class="text-danger">*</span></label>
                            <select class="form-control" name="addgender" id="addgender" description="gender" required>
                              <option value="">No Selected</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                            <div class="invalid-feedback" id="add-gender"></div>
                          </div>
                        </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="housenumber">Unit/House No.</label>
                            <input id="addhousenumber" type="text" name="addhousenumber" class="form-control input" autocomplete="off">
                           </div>
                      	 </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="streetname">Building/Street Name  <span class="text-danger">*</span></label>
                            <input id="addstreetname" type="text" name="addstreetname" class="form-control input" autocomplete="off" description="building/street name" required>
                             <div class="invalid-feedback" id="add-streetname"></div>
                            </div>
                          </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="barangay">Barangay  <span class="text-danger">*</span></label>
                            <input id="addbarangay" type="text" name="addbarangay" class="form-control input" autocomplete="off" description="barangay" required>
                             <div class="invalid-feedback" id="add-barangay"></div>
                          	</div>
                          </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="city">City/Municipality  <span class="text-danger">*</span></label>
                            <input id="addcity" type="text" name="addcity" class="form-control input" autocomplete="off" description="city/municipality" required>
                            <div class="invalid-feedback" id="add-city"></div>
                            </div>
                         </div>


                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input id="addbirthdate" type="date" name="addbirthdate" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                           </div>
                          </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="">Contact No. <span class="text-danger">*</span></label>
                            <input id="addcontactinfo" type="text" name="addcontactinfo" class="form-control" minlength=13 autocomplete="off" description="contact no" required>
                             <div class="invalid-feedback" id="add-contactinfo"></div>
                          	</div>
                          </div>	
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="addcivilstatus" id="addcivilstatus" description="civil status" required>
                              <option value="">No Selected</option>
                              <option>Single</option>
                              <option>Married</option>
                            </select>
                             <div class="invalid-feedback" id="add-civilstatus"></div>
                          	</div>
                          </div>	
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="citizenship">Citizenship <span class="text-danger">*</span></label>
                            <input id="addcitizenship" type="text" name="addcitizenship" class="form-control input" autocomplete="off" description="citizenship" required>
                             <div class="invalid-feedback" id="add-citizenship"></div>
                           </div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="hireddate">Hired Date</label>
                            <input id="addhireddate" type="date" name="addhireddate" class="form-control"value="<?php echo date("Y-m-d") ?>">
                          	</div>
                           </div>	
	           
	                           <div class="col-sm-12">
								<div class="form-group">
	                            <label for="description">Department <span class="text-danger">*</span></label>
	                            <select class="form-control" id="adddepartment" name="adddepartment" style="width: 100%;" description="department" required>
	                              <option value="">No Selected</option>
	                              <?php
	                              foreach($data['department'] as $item)
	                              {
	                              echo '<option value="'.$item->departmentID.'">'.$item->description.'</option>';
	                              }
	                              ?>  
	                            </select>
	                             <div class="invalid-feedback" id="add-department"></div>
	                           </div>
	                          </div> 
	                           <div class="col-sm-12">
								<div class="form-group">
	                            <label for="designation">Designation <span class="text-danger">*</span></label>
	                            <input type="hidden" id="hiddenDesignation" name="hiddenDesignation">
	                            <select class="form-control" id="adddesignation" name="adddesignation" style="width: 100%;" description="designation" required>
	                              <option value="">No Selected</option>
	                            </select>
	                            <div class="invalid-feedback" id="add-designation"></div>
	                            </div>
	                           </div> 
	                             <div class="col-sm-12">
								<div class="form-group">
	                            <label for="adddetachment">Detachment <span class="text-danger">*</span></label>
	                            <select class="form-control" id="adddetachment" name="adddetachment" style="width: 100%;" description="detachment" required>
	                              <option value="">No Selected</option>
	                              <?php
	                              foreach($data['detachment'] as $item)
	                              {
	                              	echo '<option value="'.$item->detachmentID.'">'.$item->postname.'</option>';
	                              }
	                              ?>
	                            </select>
	                            <div class="invalid-feedback" id="add-detachment"></div>
	                            </div>
	                           </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="addstatus">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="addstatus" id="addstatus" description="status" required>
                              <option value="">No Selected</option>
                              <option>Active</option>
                              <option>Terminated</option>
                              <option>End of Contract</option>
                              <option>Resigned</option>
                            </select>
                             <div class="invalid-feedback" id="add-status"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                   </div>
                  
                   <!--  <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">  -->
                   	<div class="tab-pane" id="bottom-justified-tab2">
                      <form class="forms-group">
						<div class="form-group">
	                        <label for="addrole">Role <span class="text-danger">*</span></label>
	                        <div class="input-group">
	                        	<div class="input-group-prepend bg-transparent">
						          <span class="input-group-text bg-transparent border-right-0">
						          	<i class="la la-user-secret"></i></span>
						        </div>
	                        <select class="form-control" id="addrole" name="addrole" description="role" required>
	                        	  <option value="">No Selected</option>
	                          <?php
		                          foreach($data['roleaccess'] as $role)
		                          {
		                          	echo '<option value="'.$role->roleID.'">'.$role->roleDescription.'</option>';
		                          }
	                          ?>  
	                        </select>
	                        <div class="invalid-feedback" id="add-role"></div>
	                    </div>
                       </div>

					    <div class="form-group">
                        	<label for="addusername">Username <span class="text-danger">*</span></label>
                        	<div class="input-group">
	                        	<div class="input-group-prepend bg-transparent">
						          <span class="input-group-text bg-transparent border-right-0">
						          	<i class="la la-user"></i></span>
						        </div>

	                          <input type="text" class="form-control input" id="addusername" name="addusername" autocomplete="off" description="username" required>
	                          <div class="invalid-feedback" id="add-username"></div>
                          	</div>

                      		<label for="addpassword">Password <span class="text-danger">*</span></label>
                        	<div class="input-group">
		                        	<div class="input-group-prepend bg-transparent">
							          <span class="input-group-text bg-transparent border-right-0">
							          	<i class="la la-lock"></i></span>
							        </div>

		                          <input type="password" class="form-control input border-right-0" id="addpassword" name="addpassword" autocomplete="off" description="password" required>
		                          <div class="input-group-prepend bg-transparent">
		                          	<span class="input-group-text bg-transparent border-left-0">
		                          		<a href="#" id="show_hide_password"><i class="text-warning iconshowhide la la-eye"></i></a>
		                          	</span>
		                          </div>
	                          	 <div class="invalid-feedback" id="add-password"></div>
	                        </div>
                    	</div>
                      </form>
                    </div>

                   <!--  <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
                   	<div class="tab-pane" id="bottom-justified-tab3">
                      <form class="forms-group">
                        <div class="row">
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="basicsalary">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="addbasicsalary" name="addbasicsalary" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="basic salary" required>
                               <div class="invalid-feedback" id="add-basicsalary"></div>
                            </div>
                           </div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="dailyrate">Daily Rate <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="adddailyrate" name="adddailyrate" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="daily rate" required>
                            <div class="invalid-feedback" id="add-dailyrate"></div>
                           </div>
                          </div>
                         </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="allowance">Allowance</label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="addallowance" name="addallowance" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off">
                          </div>
                          </div>
                        </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="tinnumber">TIN</label>
                            <input id="addtinnumber" type="text" name="addtinnumber" class="form-control input" placeholder="000-000-000" minlength=11 autocomplete="off">
                            </div>
                           </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="sssnumber">SSS No.</label>
                            <input id="addsssnumber" type="text" name="addsssnumber" class="form-control input" placeholder="00-0000000-0"  minlength=12 autocomplete="off">
                           </div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="philhealthnumber">Philhealth No.</label>
                            <input id="addphilhealthnumber" type="text" name="addphilhealthnumber" class="form-control input" placeholder="00-000000000-0" minlength=14 autocomplete="off">
                           </div>
                          </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="pagibignumber">Pag-IBIG MID No.</label>
                            <input id="addpagibignumber" type="text" name="addpagibignumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
                           </div>
                          </div>
                        </div>
                      </form>
                    </div>    
                  </div>
                 <div class="submit-section">
							<button class="btn btn-primary submit-btn" id="save">Submit</button>
				</div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
<!-- /Add Department Modal -->
					
	<!-- Edit Employee Modal -->
	<div id="edit_employee" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Employee</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<form>
				<div class="row grid-margin">  
                    <div class="col-lg-12">
					<ul class="nav nav-tabs nav-tabs-bottom nav-justified" id="edittabs">
						<li class="nav-item"><a class="nav-link active" href="#bottom-justified-editinfo" data-toggle="tab">Employee Information</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-justified-editlogin" data-toggle="tab">User Account</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-justified-editdetail" data-toggle="tab">Payroll Information</a></li>
					</ul>

                  <div class="tab-content" id="pills-tabContent">

                    <!-- EMPLOYEE INFO -->
                   <!--  <div class="tab-pane fade show active" id="pills-infoedit" role="tabpanel" aria-labelledby="pills-info-tab">  -->
                   	<div class="tab-pane show active" id="bottom-justified-editinfo">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="firstname">First Name <span class="text-danger">*</span></label>
                            <input id="editfirstname" type="text" name="editfirstname" class="form-control input" autocomplete="off" description="first name" required>
                            <div class="invalid-feedback" id="edit-firstname"></div>
                          </div>
                            </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input id="editmiddlename" type="text" name="editmiddlename" class="form-control input" autocomplete="off">
                            </div>
                          </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="lastname">Last Name <span class="text-danger">*</span></label>
                            <input id="editlastname" type="text" name="editlastname" class="form-control input" autocomplete="off" description="last name" required>
                             <div class="invalid-feedback" id="edit-lastname"></div>
                          </div>
                          </div>
                         <div class="col-sm-12">
							<div class="form-group">
                            <label for="gender">Gender <span class="text-danger">*</span></label>
                            <select class="form-control" name="editgender" id="editgender" description="gender" required>
                              <option value="">No Selected</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                            <div class="invalid-feedback" id="edit-gender"></div>
                          </div>
                        </div>
                         <div class="col-sm-12">
							<div class="form-group">
                            <label for="housenumber">Unit/House No.</label>
                            <input id="edithousenumber" type="text" name="edithousenumber" class="form-control input" autocomplete="off">
                           </div>
                      	 </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="streetname">Building/Street Name <span class="text-danger">*</span></label>
                            <input id="editstreetname" type="text" name="editstreetname" class="form-control input" autocomplete="off" description="building/street name" required>
                             <div class="invalid-feedback" id="edit-streetname"></div>
                            </div>
                          </div>
                         <div class="col-sm-12">
							<div class="form-group">
                            <label for="barangay">Barangay <span class="text-danger">*</span></label>
                            <input id="editbarangay" type="text" name="editbarangay" class="form-control input" autocomplete="off" description="barangay" required>
                             <div class="invalid-feedback" id="edit-barangay"></div>
                          	</div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="city">City/Municipality <span class="text-danger">*</span></label>
                            <input id="editcity" type="text" name="editcity" class="form-control input" autocomplete="off" description="city/municipality" required>
                            <div class="invalid-feedback" id="edit-city"></div>
                            </div>
                         </div>
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input id="editbirthdate" type="date" name="editbirthdate" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                           </div>
                          </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="">Contact No. <span class="text-danger">*</span></label>
                            <input id="editcontactinfo" type="text" name="editcontactinfo" class="form-control" minlength=13 autocomplete="off" description="contact no." required>
                             <div class="invalid-feedback" id="edit-contactinfo"></div>
                          	</div>
                          </div>	
                          <div class="col-sm-12">
							<div class="form-group">
                            <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="editcivilstatus" id="editcivilstatus" description="civil status" required>
                              <option value="">No Selected</option>
                              <option>Single</option>
                              <option>Married</option>
                            </select>
                             <div class="invalid-feedback" id="edit-civilstatus"></div>
                          	</div>
                          </div>	
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="citizenship">Citizenship <span class="text-danger">*</span></label>
                            <input id="editcitizenship" type="text" name="editcitizenship" class="form-control input" autocomplete="off" description="citizenship" required>
                             <div class="invalid-feedback" id="edit-citizenship"></div>
                           </div>
                          </div>
                            <div class="col-sm-12">
							<div class="form-group">
                            <label for="hireddate">Hired Date</label>
                            <input id="edithireddate" type="date" name="edithireddate" class="form-control">
                          	</div>
                           </div>	 
	                           <div class="col-sm-12">
								<div class="form-group">
	                            <label for="editdepartment">Department <span class="text-danger">*</span></label>
	                            <select class="form-control" id="editdepartment" name="editdepartment" style="width: 100%;" description="department" required>
	                              <?php
	                              foreach($data['department'] as $department)
	                              {
	                              	echo '<option value="'.$department->departmentID.'">'.$department->description.'</option>';
	                              }
	                              ?>  
	                            </select>
	                            <div class="invalid-feedback" id="edit-department"></div>
	                           </div>
	                          </div> 
	                           <div class="col-sm-12">
								<div class="form-group">
	                            <label for="editdesignation">Designation <span class="text-danger">*</span></label>
	                            <input type="hidden" id="edithiddenDesignation" name="edithiddenDesignation">
	                            <select class="form-control" id="editdesignation" name="editdesignation" description="designation" style="width: 100%;">
	                            </select>
	                            <div class="invalid-feedback" id="edit-designation"></div>
	                            </div>
	                           </div> 
	                            <div class="col-sm-12">
								<div class="form-group">
	                            <label for="editdetachment">Detachment <span class="text-danger">*</span></label>
	                            <select class="form-control" id="editdetachment" name="editdetachment" style="width: 100%;" description="detachment" required>
	                              <option value="">No Selected</option>
	                              <?php
	                              foreach($data['detachment'] as $item)
	                              {
	                              	echo '<option value="'.$item->detachmentID.'">'.$item->postname.'</option>';
	                              }
	                              ?>  
	                            </select>
	                            <div class="invalid-feedback" id="edit-detachment"></div>
	                            </div>
	                           </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="editstatus">Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="editstatus" id="editstatus" description="status" required>
                              <option value="">No Selected</option>
                              <option value="Active">Active</option>
                              <option value="Terminated">Terminated</option>
                              <option value="End of Contract">End of Contract</option>
                              <option value="Resigned">Resigned</option>
                            </select>
                             <div class="invalid-feedback" id="edit-status"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                  
                    <!--  <div class="tab-pane fade" id="pills-loginedit" role="tabpanel" aria-labelledby="pills-login-tab">  -->
                    <div class="tab-pane" id="bottom-justified-editlogin">	
                  		<form class="forms-group">
	                      	<div class="form-group">
		                        <label for="editrole">Role <span class="text-danger">*</span></label>
		                        <div class="input-group">
		                        	<div class="input-group-prepend bg-transparent">
							          <span class="input-group-text bg-transparent border-right-0">
							          	<i class="la la-user-secret"></i></span>
							        </div>
			                        <select class="form-control" id="editrole" name="editrole" description="role" required>
			                        	  <option value="">No Selected</option>
			                          <?php
				                          foreach($data['roleaccess'] as $role)
				                          {
				                          	echo '<option value="'.$role->roleID.'">'.$role->roleDescription.'</option>';
				                          }
			                          ?>  
			                        </select>
			                        <div class="invalid-feedback" id="edit-role"></div>
		                    	</div>
	                      	</div> 	
                   		</form>

                        <div class="form-group">
                        	<label for="editusername">Username <span class="text-danger">*</span></label>
                        	<div class="input-group">
	                        	<div class="input-group-prepend bg-transparent">
						          <span class="input-group-text bg-transparent border-right-0">
						          	<i class="la la-user"></i></span>
						        </div>

	                          <input type="text" class="form-control input" id="editusername" name="editusername" autocomplete="off" description="username" required>
	                          <div class="invalid-feedback" id="edit-username"></div>
                          	</div>

                      		<label for="editpassword">Password <span class="text-danger">*</span></label>
                        	<div class="input-group">
		                        	<div class="input-group-prepend bg-transparent">
							          <span class="input-group-text bg-transparent border-right-0">
							          	<i class="la la-lock"></i></span>
							        </div>

		                          <input type="password" class="form-control input  border-right-0" id="editpassword" name="editpassword" autocomplete="off" description="password" required>
		                          <div class="input-group-prepend bg-transparent">
		                          	<span class="input-group-text bg-transparent border-left-0">
		                          		<a href="#" id="edit_show_hide_password"><i class="text-warning iconshowhide la la-eye"></i></a>
		                          	</span>
		                          </div>
	                          	 <div class="invalid-feedback" id="edit-password"></div>
	                        </div>
                    	</div>
                        <!-- <label for="editpassword">Password <span class="text-danger">*</span></label>
                        <div class="input-group" id="show_hide_password">
				     		<div class="input-group-prepend bg-transparent">
					          <span class="input-group-text bg-transparent border-right-0">
					          	<i class="la la-lock"></i>
					        </div>

					        <input type="text" class="form-control form-control-lg border-left-0 border-right-0" id="editpassword" name="editpassword" required>
					        <div class="input-group-prepend bg-transparent"><span class="input-group-text bg-transparent border-left-0"><a href=""> <i class="text-warning la la-eye"></i></a></span>
					        </div>
					    </div> -->
                      </form>
                    </div>

                    <!-- <div class="tab-pane fade" id="pills-detailedit" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
                    	<div class="tab-pane" id="bottom-justified-editdetail">
                      <div>
                        <div class="row">
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="basicsalary">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="editbasicsalary" name="editbasicsalary" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="basic salary" required>
                               <div class="invalid-feedback" id="edit-basicsalary"></div>
                            </div>
                           </div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="dailyrate">Daily Rate <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="editdailyrate" name="editdailyrate" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="daily rate" required>
                            <div class="invalid-feedback" id="edit-dailyrate"></div>
                           </div>
                          </div>
                         </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="allowance">Allowance</label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="editallowance" name="editallowance" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off">
                          </div>
                          </div>
                        </div>
                            <div class="col-sm-12">
							<div class="form-group">
                            <label for="tinnumber">TIN</label>
                            <input id="edittinnumber" type="text" name="edittinnumber" class="form-control input" placeholder="000-000-000" minlength=11 autocomplete="off">
                            </div>
                           </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="sssnumber">SSS No.</label>
                            <input id="editsssnumber" type="text" name="editsssnumber" class="form-control input" placeholder="00-0000000-0" minlength=12 autocomplete="off">
                           </div>
                          </div>
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="philhealthnumber">Philhealth No.</label>
                            <input id="editphilhealthnumber" type="text" name="editphilhealthnumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
                           </div>
                          </div> 
                           <div class="col-sm-12">
							<div class="form-group">
                            <label for="pagibignumber">Pag-IBIG MID No.</label>
                            <input id="editpagibignumber" type="text" name="editpagibignumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>    
                  </div>
                 <div class="submit-section">
							<button class="btn btn-primary submit-btn update">Update</button>
				</div>
                </div>
              	</div>
              </form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Employee Modal -->

	<!-- upload picture  -->
<div class="modal custom-modal fade" id="uploadpicture" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <form id="commentForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('Uploadphoto/do_upload'); ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadpictureModalLabel">Select photo to upload</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col form-group">
          <label>Filename:</label>
         <div class="custom-file">
			<input type="file" class="custom-file-input" id="photo"name="photo" required="">
			 <div class="invalid-feedback" id="add-photo"></div>
			<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
			<div class="invalid-feedback">Example invalid custom file feedback</div>
			&nbsp;
			 <input type="hidden" name="empID" id="empID">  
             <input type="submit" class="btn btn-primary btn-rounded" style="width:100%" value="Upload Photo" />   
		</div>
        </div>
      </div>
     </form>
  </div>
</div>

<!-- Status Modal -->
	
<!-- end upload picture  -->
</div>
<div class="modal custom-modal fade" id="status_employee" role="dialog">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-header">
					<h3>Change Status</h3>
					<p id="statusmessage"></p>
					<div class="invalid-feedback" id="status-invalid"></div>
				</div>
				<div class="modal-btn delete-action">
					<div class="row">
						<div class="col-6">
							<a href="#" class="btn btn-primary continue-btn change">Change</a>
						</div>
						<div class="col-6">
							<a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
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
<!-- /Page Wrapper -->
<script  type="text/javascript">  
	$(document).ready(function(){
	$('#addcontactinfo').mask('0000-000-0000');
	$('#addtinnumber').mask('000-000-000');
	$('#addsssnumber').mask('00-0000000-0');
	$('#addphilhealthnumber').mask('00-000000000-0');
	$('#addpagibignumber').mask('0000-0000-0000');

	$('#editcontactinfo').mask('0000-000-0000');
	$('#edittinnumber').mask('000-000-000');
	$('#editsssnumber').mask('00-0000000-0');
	$('#editphilhealthnumber').mask('00-000000000-0');
	$('#editpagibignumber').mask('0000-0000-0000');

	/*$("#show_hide_password a").on('click', function(event) {
		event.preventDefault();
		if($('#show_hide_password input').attr("type") == "text"){
			$('#show_hide_password input').attr('type', 'password');
			$('#show_hide_password i').removeClass( "la la-eye-slash" );
			$('#show_hide_password i').addClass( "la la-eye" );
		}else if($('#show_hide_password input').attr("type") == "password"){
			$('#show_hide_password input').attr('type', 'text');
			$('#show_hide_password i').removeClass( "la la-eye" );
			$('#show_hide_password i').addClass( "la la-eye-slash");
		}
	});*/

    $('#add_employee').on('shown.bs.modal', function(){
	   	$("#addfirstname").focus(); 
	});

	$('#add_employee').on('show.bs.modal', function(){
	   	$('#addtabs li:eq(0) a').tab('show');
	});

	$('#edit_employee').on('shown.bs.modal', function(){
	   	$("#editfirstname").focus(); 
	});

	$('#edit_employee').on('show.bs.modal', function(){
	   	$('#edittabs li:eq(0) a').tab('show');
	});

	// upload picture //
	$(".avatar").on('click',function() {
		$('#empID').val($(this).attr("id"));
		$('#uploadpicture').modal('show');
	});
    // end upload picture//

    $('#show_hide_password').click(function(){
    	if($('#addpassword').attr('type')=="password"){
    		$('#addpassword').attr('type', 'text');
	     	$('.iconshowhide').removeClass('la la-eye');
	    	$('.iconshowhide').addClass('la la-eye-slash');
    	}else if($('#addpassword').attr('type')=="text"){
    		$('#addpassword').attr('type', 'password');
     		$('.iconshowhide').removeClass('la la-eye-slash');
    		$('.iconshowhide').addClass('la la-eye');
    	}
    });

    $('#edit_show_hide_password').click(function(){
    	if($('#editpassword').attr('type')=="password"){
    		$('#editpassword').attr('type', 'text');
	     	$('.iconshowhide').removeClass('la la-eye');
	    	$('.iconshowhide').addClass('la la-eye-slash');
    	}else if($('#editpassword').attr('type')=="text"){
    		$('#editpassword').attr('type', 'password');
     		$('.iconshowhide').removeClass('la la-eye-slash');
    		$('.iconshowhide').addClass('la la-eye');
    	}
    });

	//dropdown department ADD //
	$('#adddepartment').change(function(){ 
		var id=$(this).val();
		
		$.ajax({
			url : "<?php echo site_url('Employees/get_designation');?>",
			method : "POST",
			data : {id: id},
			async : true,
			dataType : 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					if($("#editDesignation").val()==data[i].designationID){
						html += '<option value='+data[i].designationID+' selected>'+data[i].designationdescription+'</option>';
					}else{
						html += '<option value='+data[i].designationID+'>'+data[i].designationdescription+'</option>';
					}
				}
				$('#adddesignation').html(html);
			}
		});
		return false;
	});
	// end of dropdown department//

	   //dropdown department edit //
	 $('#editdepartment').change(function(){ 
      var id=$(this).val();
      $.ajax({
          url : "<?php echo site_url('Employees/get_designation');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(data){
               
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                if($("#edithiddenDesignation").val()==data[i].designationID){
                  html += '<option value='+data[i].designationID+' selected>'+data[i].designationdescription+'</option>';
                }else{
                  html += '<option value='+data[i].designationID+'>'+data[i].designationdescription+'</option>';
                }
              }
              $('#editdesignation').html(html);
          }
      });
      return false;
    });
	 	/* CLEAR MODAL */
		$('#edit_employee').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
		});

		/* CLEAR MODAL */
		$('#add_employee').on('hidden.bs.modal', function(){
		    $(this).find('form')[0].reset();
		    $(this).find('form')[1].reset();
		    $(this).find('form')[2].reset();
		    $(".invalid-feedback").html("");
        	$('input').removeClass('is-invalid');
        	$('input').removeClass('is-valid');
        	$('select').removeClass('is-invalid');
        	$('select').removeClass('is-valid');
		});

 		/* CLEAR MODAL */
		$('#status_employee').on('hidden.bs.modal', function(){
		    document.getElementById("status-invalid").innerHTML = "";
		});

	   /* terminated */
		$('.terminated').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('employeestatus', $(this).data('employeestatus'));
			document.getElementById("statusmessage").innerHTML = 'Are you sure you want to <div class="action-label">' +
					'<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">' + 
						'<i class="fa fa-dot-circle-o text-purple"></i> New' +
					'</a>' + 
				'</div> this record?"';
		});

		 /* resigned */
		$('.resigned').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('employeestatus', $(this).data('employeestatus'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='#8000ff'>Resigned</font> this record?";
		});

		 /* endofcontract */
		$('.endofcontract').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('employeestatus', $(this).data('employeestatus'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='#0080ff'>End of Contract</font> this record?";
		});

		 /* active */
		$('.activate').unbind('click').bind('click', function(){
			$('.change').attr('id', $(this).data('id'));
			$('.change').attr('status', $(this).data('status'));
			$('.change').attr('employeestatus', $(this).data('employeestatus'));
			document.getElementById("statusmessage").innerHTML = "Are you sure you want to <font color='green'>Active</font> this record?";
		});


		/* CHANGE STATUS */
		$('.change').unbind('click').bind('click', function(){
	        var id = $(this).attr('id');
	        var status = $(this).attr('status');
	        var employeestatus = $(this).attr('employeestatus');
	      
        	$.ajax({
                url : "<?php echo site_url('employees/changestatus');?>",
                method : "POST",
                data : {id:id,
                		status:status},
                async : true,
                dataType : 'json',
                success: function(data){

                	window.location.replace('<?php echo base_url(); ?>employees');
                },
                error: function(request, textStatus, error) {

            	}
            });
            return false;
        });
       
	 // end of dropdown department edit//

	/* SAVE EMPLOYEE */
	$('#save').unbind('click').bind('click', function(){
		var IDArray = ['#addfirstname', '#addmiddlename', '#addlastname', '#addgender', '#addhousenumber',
					   '#addstreetname', '#addbarangay', '#addcity', '#addbirthdate', '#addcontactinfo',
					   '#addcivilstatus', '#addcitizenship', '#addhireddate', '#adddepartment', '#adddesignation',
					   '#adddetachment', '#addstatus', '#addrole', '#addusername', '#addpassword', 
					   '#addbasicsalary', '#adddailyrate', '#addallowance', '#addtinnumber', '#addsssnumber',
					   '#addphilhealthnumber', '#addpagibignumber'];

		var ErrorIDArray = ['add-firstname', 'add-middlename', 'add-lastname', 'add-gender', 'add-housenumber',
					   'add-streetname', 'add-barangay', 'add-city', 'add-birthdate', 'add-contactinfo',
					   'add-civilstatus', 'add-citizenship', 'add-hireddate', 'add-department', 'add-designation',
					   'add-detachment', 'add-status', 'add-role', 'add-username', 'add-password', 
					   'add-basicsalary', 'add-dailyrate', 'add-allowance', 'add-tinnumber', 'add-sssnumber',
					   'add-philhealthnumber', 'add-pagibignumber'];
	    var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val().trim();

			if(i==1 || i==4 || i==8 || i==12 || i==22 || i==23 || i==24 || i==25 || i==26) continue;

			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
				if(firstRequired==""){
					firstRequired = IDArray[i]
						 if(i<=16) navIndex = 0;
					else if(i<=19) navIndex = 1;
					else if(i<=26) navIndex = 2;
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

		$('#addtabs li:eq('+navIndex+') a').tab('show');
		$(firstRequired).focus();

		if(firstRequired==""){
    		$.ajax({
                url : "<?php echo site_url('employees/save');?>",
                method : "POST",
                data : {firstname: ValueArray[0], 		middlename: ValueArray[1],
                		lastname: ValueArray[2], 		gender: ValueArray[3],
                		housenumber: ValueArray[4], 	streetname: ValueArray[5],
                		barangay: ValueArray[6], 		city: ValueArray[7],
                		birthdate: ValueArray[8], 		contactinfo: ValueArray[9],
                		civilstatus: ValueArray[10], 	citizenship: ValueArray[11],
                		hireddate: ValueArray[12], 		departmentID: ValueArray[13],
                		designationID: ValueArray[14], 	detachmentID: ValueArray[15],
                		employeestatus: ValueArray[16], roleDescription: ValueArray[17], 
                		username: ValueArray[18],		password: ValueArray[19], 
                		basicsalary: ValueArray[20],	dailyrate: ValueArray[21], 		
                		allowance: ValueArray[22],		tinnumber: ValueArray[23], 	
            			sssnumber: ValueArray[24],		philhealthnumber: ValueArray[25], 	pagibignumber: ValueArray[26]},
                async : true,
                dataType : 'json',
                success: function(data){
					var result = data.split('|');
        			if(result[0]=="false"){
        				if(result[1] == "Employee name already exist!"){
							document.getElementById("add-firstname").innerHTML = result[1];
				        	$('#addfirstname').removeClass('is-valid');
				        	$('#addfirstname').addClass('is-invalid');
				        	$('#add-firstname').addClass('invalid-feedback');
				        	$("#addfirstname").focus();
				        	document.getElementById("add-lastname").innerHTML = result[1];
				        	$('#addlastname').removeClass('is-valid');
				        	$('#addlastname').addClass('is-invalid');
				        	$('#add-lastname').addClass('invalid-feedback');
        				}else{
        					$('#addtabs li:eq(1) a').tab('show');
				        	document.getElementById("add-username").innerHTML = result[1];
    						$('#addusername').removeClass('is-valid');
				        	$('#addusername').addClass('is-invalid');
				        	$('#add-username').addClass('invalid-feedback');
				        	$("#addusername").focus();
        				}
        			}else{
    					window.location.replace('<?php echo base_url(); ?>employees');
        			}
                },
         		 error: function(request, textStatus, error) {

            	}													
            });
            return false;
    	}
	});
	/* end SAVE employee */

	$('.editemployee').unbind('click').bind('click', function(){
		$(".modal-body #editfirstname").val( $(this).data('firstname'));
		$(".modal-body #editrole").val( $(this).data('roleid'));
		$(".modal-body #editmiddlename").val( $(this).data('middlename'));
		$(".modal-body #editlastname").val( $(this).data('lastname'));
		$(".modal-body #editgender").val( $(this).data('gender'));
		$(".modal-body #edithousenumber").val( $(this).data('housenumber'));
		$(".modal-body #editstreetname").val( $(this).data('streetname'));
		$(".modal-body #editbarangay").val( $(this).data('barangay'));
		$(".modal-body #editcity").val( $(this).data('city'));
		$(".modal-body #editbirthdate").val( $(this).data('birthdate'));
		$(".modal-body #editcontactinfo").val( $(this).data('contactinfo'));
		$(".modal-body #editcivilstatus").val( $(this).data('civilstatus'));
		$(".modal-body #editcitizenship").val( $(this).data('citizenship'));
		$(".modal-body #edithireddate").val( $(this).data('hireddate'));
		$(".modal-body #editdepartment").val( $(this).data('departmentid'));
		$(".modal-body #editdepartment").trigger("change");
		$(".modal-body #edithiddenDesignation").val( $(this).data('designationid'));
		$(".modal-body #editdesignation").val( $(this).data('designationid'));
		$(".modal-body #editdetachment").val( $(this).data('detachmentid'));
		$(".modal-body #editstatus").val( $(this).data('employeestatus'));
		$(".modal-body #editusername").val( $(this).data('username'));
		$(".modal-body #editpassword").val( $(this).data('password'));
		$(".modal-body #editbasicsalary").val( $(this).data('basicsalary'));
		$(".modal-body #editdailyrate").val( $(this).data('dailyrate'));
		$(".modal-body #editallowance").val( $(this).data('allowance'));
		$(".modal-body #edittinnumber").val( $(this).data('tinnumber'));
		$(".modal-body #editsssnumber").val( $(this).data('sssnumber'));
		$(".modal-body #editphilhealthnumber").val( $(this).data('philhealthnumber'));
		$(".modal-body #editpagibignumber").val( $(this).data('pagibignumber'));
		$('.update').attr('id', $(this).data('id'));
	});

	/* updated employee */
	$('.update').unbind('click').bind('click', function(){

		var IDArray = ['#editfirstname', '#editmiddlename', '#editlastname', '#editgender', '#edithousenumber',
					   '#editstreetname', '#editbarangay', '#editcity', '#editbirthdate', '#editcontactinfo',
					   '#editcivilstatus', '#editcitizenship', '#edithireddate', '#editdepartment', '#editdesignation',
					   '#editdetachment', '#editstatus', '#editrole', '#editusername', '#editpassword', 
					   '#editbasicsalary', '#editdailyrate', '#editallowance', '#edittinnumber', '#editsssnumber',
					   '#editphilhealthnumber', '#editpagibignumber'];

		var ErrorIDArray = ['edit-firstname', 'edit-middlename', 'edit-lastname', 'edit-gender', 'edit-housenumber',
					   'edit-streetname', 'edit-barangay', 'edit-city', 'edit-birthdate', 'edit-contactinfo',
					   'edit-civilstatus', 'edit-citizenship', 'edit-hireddate', 'edit-department', 'edit-designation',
					   'edit-detachment', 'edit-status', 'edit-role', 'edit-username', 'edit-password', 
					   'edit-basicsalary', 'edit-dailyrate', 'edit-allowance', 'edit-tinnumber', 'edit-sssnumber',
					   'edit-philhealthnumber', 'edit-pagibignumber'];
	    var ValueArray = [];
		var firstRequired = "";
		var navIndex = 0;
		var id = $(this).attr('id');

		for(var i=0;i<IDArray.length;i++){
			ValueArray[i] = $(IDArray[i]).val();

			if(i==1 || i==4 || i==8 || i==12 || i==22 || i==23 || i==24 || i==25 || i==26) continue;
			
			if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
				if(firstRequired==""){
					firstRequired = IDArray[i];
						 if(i<=16) navIndex = 0;
					else if(i<=19) navIndex = 1;
					else if(i<=26) navIndex = 2;
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

		$('.modal-body #edittabs li:eq('+navIndex+') a').tab('show');
		$(firstRequired).focus();

		if(firstRequired==""){
	    	$.ajax({
	            url : "<?php echo site_url('employees/update');?>",
	            method : "POST",
	            data : {id:id, 
	        			firstname: ValueArray[0], 		middlename: ValueArray[1],
	            		lastname: ValueArray[2], 		gender: ValueArray[3],
	            		housenumber: ValueArray[4], 	streetname: ValueArray[5],
	            		barangay: ValueArray[6], 		city: ValueArray[7],
	            		birthdate: ValueArray[8], 		contactinfo: ValueArray[9],
	            		civilstatus: ValueArray[10], 	citizenship: ValueArray[11],
	            		hireddate: ValueArray[12], 		departmentID: ValueArray[13],
	            		designationID: ValueArray[14], 	detachmentID: ValueArray[15],
	            		employeestatus: ValueArray[16], roleDescription: ValueArray[17], 
	            		username: ValueArray[18],		password: ValueArray[19], 
	            		basicsalary: ValueArray[20],	dailyrate: ValueArray[21], 		
	            		allowance: ValueArray[22],		tinnumber: ValueArray[23], 	
	        			sssnumber: ValueArray[24],		philhealthnumber: ValueArray[25], 	pagibignumber: ValueArray[26]},
	            async : true,
	            dataType : 'json',
	            success: function(data){
					var result = data.split('|');
	    			if(result[0]=="false"){
	        				if(result[1] == "Employee name already exist!"){
								document.getElementById("edit-firstname").innerHTML = result[1];
					        	$('#editfirstname').removeClass('is-valid');
					        	$('#editfirstname').addClass('is-invalid');
					        	$('#edit-firstname').addClass('invalid-feedback');
					        	$("#editfirstname").focus();
					        	document.getElementById("edit-lastname").innerHTML = result[1];
					        	$('#editlastname').removeClass('is-valid');
					        	$('#editlastname').addClass('is-invalid');
					        	$('#edit-lastname').addClass('invalid-feedback');
	        				}else{
	        					$('.modal-body #edittabs li:eq(1) a').tab('show');
					        	document.getElementById("edit-username").innerHTML = result[1];
	    						$('#editusername').removeClass('is-valid');
					        	$('#editusername').addClass('is-invalid');
					        	$('#edit-username').addClass('invalid-feedback');
					        	$("#editusername").focus();
	        				}
	        			}else{
	    					window.location.replace('<?php echo base_url(); ?>employees');
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







