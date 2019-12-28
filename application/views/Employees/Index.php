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
      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      <li class="breadcrumb-item active">Employees</li>
      </ul>
    </div>
    <div class="col-auto float-right ml-auto">
      <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee" id="addemployee" data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Add Employee</a>
    </div>
    </div>
  </div>
  <!-- /Page Header -->

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
    </thead>
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
    <a class="btn btn-white btn-sm btn-rounded action-status" href="#">
    <?php if($item->employeestatus=="Active") 
    echo '<i class="fa fa-dot-circle-o text-success"></i> Active';
    elseif($item->employeestatus=="Terminated")
    echo '<i class="fa fa-dot-circle-o"></i> Terminated';
    elseif($item->employeestatus=="Resigned")
    echo '<i class="fa fa-dot-circle-o text-danger"></i> Resigned';
    elseif($item->employeestatus=="End of Contract")
    echo '<i class="fa fa-dot-circle-o text-purple"></i> End of Contract';
    ?>
    </a> 
    </div>
    </td> 
    <td class="text-right">
    <div class="dropdown dropdown-action">
    <a href="" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
    <div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item editemployee" href="#"
    id="<?php echo $item->employeeID; ?>"
    class="btn btn-info btn-sm editemployee"
    data-toggle="modal" 
    data-target="#edit_employee"
    data-id="<?php echo $item->employeeID; ?>" 
    data-employeetypeid="<?php echo $item->employeetypeID; ?>"
    data-controls-modal="your_div_id" data-backdrop="static" data-keyboard="false"
    data-clientid="<?php echo $item->clientID; ?>" 
    data-firstname="<?php echo $item->firstname; ?>" 
    data-middlename="<?php echo $item->middlename; ?>" 
    data-lastname="<?php echo $item->lastname; ?>" 
    data-roleid="<?php echo $item->roleID; ?>" 
    data-gender="<?php echo $item->gender; ?>" 
    data-housenumber="<?php echo $item->housenumber; ?>" 
    data-streetname="<?php echo $item->streetname; ?>" 
    data-barangay="<?php echo $item->barangay; ?>"  
    data-city="<?php echo $item->city; ?>" 
    data-birthdate="<?php echo $item->birthdate; ?>" 
    data-contactinfo="<?php echo $item->contactinfo; ?>" 
    data-civilstatus="<?php echo $item->civilstatus; ?>"
    data-citizenship="<?php echo $item->citizenship; ?>" 
    data-hireddate="<?php echo $item->hireddate; ?>" 
    data-departmentid="<?php echo $item->departmentID; ?>" 
    data-designationid="<?php echo $item->designationID; ?>" 
    data-detachmentid="<?php echo $item->detachmentID; ?>" 
    data-designationid="<?php echo $item->designationID; ?>" 
    data-designationdescription="<?php echo $item->designationdescription; ?>" 
    data-employeestatus="<?php echo $item->employeestatus; ?>" 
    data-username="<?php echo $item->username; ?>"  
    data-password="<?php echo $item->password; ?>" 
    data-basicsalary="<?php echo $item->basicsalary; ?>" 
    data-dailyrate="<?php echo $item->dailyrate; ?>" 
    data-allowance="<?php echo $item->allowance; ?>" 
    data-backaccountname="<?php echo $item->backaccountname; ?>" 
    data-backaccountnumber="<?php echo $item->backaccountnumber; ?>" 
    data-tinnumber="<?php echo $item->tinnumber; ?>" 
    data-sssnumber="<?php echo $item->sssnumber; ?>" 
    data-philhealthnumber="<?php echo $item->philhealthnumber; ?>"  
    data-pagibignumber="<?php echo $item->pagibignumber; ?>" 
    data-tog="tooltip">
    <i class="fa fa-pencil m-r-5"></i> Edit</a>
    <a class="dropdown-item changestatus" href="#" data-toggle="modal" data-target="#status_employee" data-id="<?php echo $item->employeeID; ?>" data-status="<?php echo ($item->employeestatus=='Active') ? 'Resigned' : 'Active'  ?>" data-employeestatus="<?php echo $item->employeestatus; ?>" ><i class="fa fa-toggle-on m-r-5"></i> Change Status</a>
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
  <li class="nav-item"><a class="nav-link active" href="#bottom-justified-tab1" data-toggle="tab">Information</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-toggle="tab">User Account</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">Payroll</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab4" data-toggle="tab">Leave Credits</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab5" data-toggle="tab">Schedule</a></li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane show active" id="bottom-justified-tab1">
  <form class="form-group">
  <div class="row">
    <div class="col-sm-12">
    <div class="form-group">
    <label for="gender">Employee Type<span class="text-danger">*</span></label>
    <select class="form-control" name="addemployeetype" id="addemployeetype" description="employee type" required>
    <option value="">No Selected</option>
    <option value="1">Security Guard</option>
    <option value="2">Staff</option>
    </select>
    <div class="invalid-feedback" id="add-employeetype"></div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="form-group">
    <label for="firstname">First Name <span class="text-danger">*</span></label>
    <input id="addfirstname" type="text" name="addfirstname" class="form-control input lettersonly" autocomplete="off" description="first name" required>
    <div class="invalid-feedback" id="add-firstname"></div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="form-group">
    <label for="middlename">Middle Name</label>
    <input id="addmiddlename" type="text" name="addmiddlename" class="form-control input lettersonly" autocomplete="off">
    <div class="invalid-feedback" id="add-middlename"></div>
  </div>
  </div>
  <div class="col-sm-12">
    <div class="form-group">
    <label for="lastname">Last Name  <span class="text-danger">*</span></label>
    <input id="addlastname" type="text" name="addlastname" class="form-control input lettersonly" autocomplete="off" description="last name" required>
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
  <input id="addhousenumber" type="text" name="addhousenumber" class="form-control input alphanumericwithspace" autocomplete="off">
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group">
  <label for="streetname">Building/Street Name  <span class="text-danger">*</span></label>
  <input id="addstreetname" type="text" name="addstreetname" class="form-control input alphanumericwithspace" autocomplete="off" description="building/street name" required>
  <div class="invalid-feedback" id="add-streetname"></div>
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group">
  <label for="barangay">Barangay  <span class="text-danger">*</span></label>
  <input id="addbarangay" type="text" name="addbarangay" class="form-control input alphanumericwithspace" autocomplete="off" description="barangay" required>
  <div class="invalid-feedback" id="add-barangay"></div>
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group">
  <label for="city">City/Municipality  <span class="text-danger">*</span></label>
  <input id="addcity" type="text" name="addcity" class="form-control input alphanumericwithspace" autocomplete="off" description="city/municipality" required>
  <div class="invalid-feedback" id="add-city"></div>
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group">
  <label for="birthdate">Birthdate  <span class="text-danger">*</span></label>
  <input id="addbirthdate" name="addbirthdate" class="form-control datetimepicker" placeholder="dd/mm/yyyy" description="birthdate">
  <div class="invalid-feedback" id="add-birthdate"></div>
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
  <input id="addcitizenship" type="text" name="addcitizenship" class="form-control input letterswithspace" autocomplete="off" description="citizenship" required>
  <div class="invalid-feedback" id="add-citizenship"></div>
  </div>
  </div>
  <div class="col-sm-12">
  <div class="form-group">
  <label for="hireddate">Hired Date  <span class="text-danger">*</span></label>
  <input id="addhireddate"  name="addhireddate" class="form-control datetimepicker" placeholder="dd/mm/yyyy" description="hired date">
  <div class="invalid-feedback" id="add-hireddate"></div>
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
  <label for="adddetachment">Client <span class="text-danger">*</span></label>
  <select class="form-control" id="addclient" name="addclient" style="width: 100%;" description="Client" required>
  <option value="">No Selected</option>
  <?php
  foreach($data['client'] as $client)
  {
  echo '<option value="'.$client->clientID.'">'.$client->description.'</option>';
  }
  ?>
  </select>
  <div class="invalid-feedback" id="add-client"></div>
  </div>
  </div> 
  <div class="col-sm-12">
  <div class="form-group">
  <label for="adddetachment">Detachment <span class="text-danger">*</span></label>
  <select class="form-control" id="adddetachment" name="adddetachment" style="width: 100%;" description="detachment" required>
  <option value="">No Selected</option>
  </select>
  <div class="invalid-feedback" id="add-detachment"></div>
  </div>
  </div> 
  <div class="col-sm-12">
  <div class="form-group">
  <label for="addstatus">Status <span class="text-danger">*</span></label>
  <select class="form-control" name="addstatus" id="addstatus" description="status" required>
  <option value="">No Selected</option>
  <option></option>
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
                          <label for="1addusername">Username <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="la la-user"></i></span>
                       </div>

                            <input type="text" class="form-control input alphanumericwithspace" id="addusername" name="addusername" autocomplete="off" description="username" required>
                            <div class="invalid-feedback" id="add-username"></div>
                            </div>
                          <label for="addpassword">Password <span class="text-danger">*</span></label>
                          <div class="input-group">
                              <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                          <i class="la la-lock"></i></span>
                      </div>

                              <input type="password" class="form-control input border-right-0 alphanumericwithspace" id="addpassword" name="addpassword" autocomplete="off" description="password" required>
                              <div class="input-group-prepend bg-transparent">
                                <span class="input-group-text bg-transparent border-left-0">
                                  <a href="#" id="show_hide_password"><i class="text-warning iconshowhide la la-eye"></i></a>
                                </span>
                              </div>
                               <div class="invalid-feedback" id="add-password"></div>
                          </div>
                           <label for="caution"style="color:#ff0000;"  id="caution"name="caution">For detachment commander only</label>
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
                            <label for="allowance">Bank Account Name</label>                       
                            <input id="addbackaccountname" name="addbackaccountname" class="form-control input" autocomplete="off">
                          </div>
                        </div>
                         <div class="col-sm-12">
                           <div class="form-group">
                            <label for="allowance">Bank Account Number</label>
                            <input id="addbackaccountnumber" name="addbackaccountnumber" class="form-control input"  autocomplete="off">
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

                     <!--  <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
                     <div class="tab-pane" id="bottom-justified-tab4"> 
                       <form class="forms-group">
                      <div class="row">
                      <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-bordered table-review review-table mb-0" id="table_alterations">
                            <thead>
                              <tr>
                                <th style="width:40px;">#</th>
                                <th>Leave type</th>
                                <th>Total Leave</th>
                                <th style="width: 64px;"><button type="button" class="btn btn-primary btn-add-row"><i class="fa fa-plus"></i></button></th>
                              </tr>
                            </thead>
                            <tbody id="table_alterations_tbody">
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </form>
                     </div> 

                      <div class="tab-pane" id="bottom-justified-tab5">
                       <form class="forms-group"> 
                         <div class="card">
                         <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid">
                      <li class="nav-item"><a class="nav-link active" href="#solid-sunday" data-toggle="tab">Sunday</a></li>
                      <li class="nav-item"><a class="nav-link" href="#solid-monday" data-toggle="tab">Monday</a></li>
                      <li class="nav-item"><a class="nav-link" href="#solid-tuesday" data-toggle="tab">Tuesday</a></li>
                        <li class="nav-item"><a class="nav-link" href="#solid-wednesday" data-toggle="tab">Wednesday</a></li>
                        <li class="nav-item"><a class="nav-link" href="#solid-thursday" data-toggle="tab">Thursday</a></li>
                        <li class="nav-item"><a class="nav-link" href="#solid-friday" data-toggle="tab">Friday</a></li>
                        <li class="nav-item"><a class="nav-link" href="#solid-saturday" data-toggle="tab">Saturday</a></li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane show active" id="solid-sunday">
                        <div class="row">
                            <div class="col">
                           <input type="time" name="addsuntimefrom" id="addsuntimefrom" class="form-control input" description="start time"/>
                             <div class="invalid-feedback" id="add-suntimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addsuntimeto" id="addsuntimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-suntimetocheck" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input checkbox" type="checkbox" id="sunrestdays" name="sunrestdays"  required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                      <div class="tab-pane" id="solid-monday">
                            <div class="row">
                            <div class="col">
                           <input type="time" name="addmontimefrom" id="addmontimefrom" class="form-control input" description="start time"/>
                             <div class="invalid-feedback" id="add-montimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addmontimeto" id="addmontimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-montimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input checkbox" type="checkbox" value="1" id="monrestdays" name="monrestdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                      <div class="tab-pane" id="solid-tuesday">
                          <div class="row">
                            <div class="col">
                           <input type="time" name="addtuetimefrom " id="addtuetimefrom" class="form-control input" description="start time"/>
                             <div class="invalid-feedback" id="add-tuetimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addtuetimeto" id="addtuetimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-tuetimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input checkbox" type="checkbox" value="1" id="tuerestdays" name="tuerestdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                       <div class="tab-pane" id="solid-wednesday">
                        <div class="row">
                            <div class="col">
                           <input type="time" name="addwedtimefrom" id="addwedtimefrom" class="form-control input" description="start time"/>
                             <div class="invalid-feedback" id="add-wedtimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addwedtimeto" id="addwedtimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-wedtimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input checkbox" type="checkbox" value="1" id="wedrestdays" name="wedrestdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                       <div class="tab-pane" id="solid-thursday">
                        <div class="row">
                            <div class="col">
                           <input type="time" name="addthtimefrom" id="addthtimefrom" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-thtimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addthtimeto" id="addthtimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-thtimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="threstdays" name="threstdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                        <div class="tab-pane" id="solid-friday">
                        <div class="row">
                            <div class="col">
                           <input type="time" name="addfritimefrom" id="addfritimefrom" class="form-control input"  description="start time"/>
                             <div class="invalid-feedback" id="add-fritimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addfritimeto" id="addfritimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-fritimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="frirestdays" name="frirestdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                        <div class="tab-pane" id="solid-saturday">
                        <div class="row">
                            <div class="col">
                           <input type="time" name="addsattimefrom" id="addsattimefrom" class="form-control input"  description="start time"/>
                             <div class="invalid-feedback" id="add-sattimefrom"></div>
                           </div>
                            <div class="col form-group">  
                           <input type="time" name="addsattimetimeto" id="addsattimetimeto" class="form-control input" description="end time"/>
                             <div class="invalid-feedback" id="add-sattimetimeto" ></div>
                            </div>
                          </div> 
                          <div class="form-group">  
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="satrestdays" name="satrestdays" required="">
                            <label class="form-check-label" for="invalidCheck2">
                              Rest Day
                            </label>
                          </div>
                           </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
            <li class="nav-item"><a class="nav-link active" href="#bottom-justified-editinfo" data-toggle="tab">Information</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editlogin" data-toggle="tab">User Account</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editdetail" data-toggle="tab">Payroll</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editleave" data-toggle="tab">Leave Credits</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editschedule" data-toggle="tab">Schedule</a></li>
          </ul>
    <div class="tab-content" id="pills-tabContent">
    <!-- EMPLOYEE INFO -->
    <!--  <div class="tab-pane fade show active" id="pills-infoedit" role="tabpanel" aria-labelledby="pills-info-tab">  -->
    <div class="tab-pane show active" id="bottom-justified-editinfo">
      <div class="form-group">
      <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <label for="gender">Employee Type<span class="text-danger">*</span></label>
          <select class="form-control " name="editemployeetype" id="editemployeetype" description="employee type" required>
            <option value="">No Selected</option>
            <option value="1">Security Guard</option>
            <option value="2">Staff</option>
          </select>
          <div class="invalid-feedback" id="edit-employeetype"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="firstname">First Name <span class="text-danger">*</span></label>
        <input id="editfirstname" type="text" name="editfirstname " class="form-control input lettersonly" autocomplete="off" description="first name" required>
        <div class="invalid-feedback" id="edit-firstname"></div>
        </div>  
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="middlename">Middle Name</label>
        <input id="editmiddlename" type="text" name="editmiddlename" class="form-control input lettersonly" autocomplete="off">
        <div class="invalid-feedback" id="edit-middlename"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="lastname">Last Name <span class="text-danger">*</span></label>
        <input id="editlastname" type="text" name="editlastname" class="form-control input lettersonly" autocomplete="off" description="last name" required>
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
        <input id="edithousenumber" type="text" name="edithousenumber" class="form-control input alphanumericwithspace" autocomplete="off">
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="streetname">Building/Street Name <span class="text-danger">*</span></label>
        <input id="editstreetname" type="text" name="editstreetname" class="form-control input alphanumericwithspace" autocomplete="off" description="building/street name" required>
        <div class="invalid-feedback" id="edit-streetname"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="barangay">Barangay <span class="text-danger">*</span></label>
        <input id="editbarangay" type="text" name="editbarangay" class="form-control input alphanumericwithspace" autocomplete="off" description="barangay" required>
        <div class="invalid-feedback" id="edit-barangay"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="city">City/Municipality <span class="text-danger">*</span></label>
        <input id="editcity" type="text" name="editcity" class="form-control input letterswithspace" autocomplete="off" description="city/municipality" required>
        <div class="invalid-feedback" id="edit-city"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input id="editbirthdate" name="editbirthdate" class="form-control datetimepicker">
        <div class="invalid-feedback" id="edit-birthdate"></div>
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
        <input id="editcitizenship" type="text" name="editcitizenship" class="form-control input letterswithspace" autocomplete="off" description="citizenship" required>
        <div class="invalid-feedback" id="edit-citizenship"></div>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
        <label for="hireddate">Hired Date</label>
        <input id="edithireddate" name="edithireddate" class="form-control datetimepicker">
        <div class="invalid-feedback" id="edit-hireddate"></div>
        </div>
      </div>  
      <div class="col-sm-12">
        <div class="form-group">
        <label for="editdepartment">Department <span class="text-danger">*</span></label>
        <select class="form-control" id="editdepartment" name="editdepartment" style="width: 100%;" description="department" required>
          <option value="">No Selected</option>
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
  <label for="editdetachment">Client <span class="text-danger">*</span></label>
  <select class="form-control" id="editclient" name="editclient" style="width: 100%;" description="Client" required>
  <option value="">No Selected</option>
  <?php
  foreach($data['client'] as $client)
  {
  echo '<option value="'.$client->clientID.'">'.$client->description.'</option>';
  }
  ?>
  </select>
  <div class="invalid-feedback" id="edit-client"></div>
  </div>
  </div> 
      <div class="col-sm-12">
        <div class="form-group">
          <label for="editdetachment">Detachment <span class="text-danger">*</span></label>
           <input type="hidden" id="edithiddenDetachment" name="edithiddenDetachment">
          <select class="form-control" id="editdetachment" name="editdetachment" style="width: 100%;" description="detachment" required>
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
      <div class="form-group">
        <label for="editusername">Username <span class="text-danger">*</span></label>
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
          <i class="la la-user"></i></span>
          </div>
          <input type="text" class="form-control input alphanumericwithspace" id="editusername" name="editusername" autocomplete="off" description="username" required>
          <div class="invalid-feedback" id="edit-username"></div>
        </div>
        <label for="editpassword">Password <span class="text-danger">*</span></label>
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <span class="input-group-text bg-transparent border-right-0">
            <i class="la la-lock"></i></span>
          </div>
          <input type="password" class="form-control input  border-right-0 alphanumericwithspace" id="editpassword" name="editpassword" autocomplete="off" description="password" required>
          <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-left-0">
          <a href="#" id="edit_show_hide_password"><i class="text-warning iconshowhide la la-eye"></i></a>
          </span>
          </div>
          <div class="invalid-feedback" id="edit-password"></div>
        </div>
          <label for="caution"style="color:#ff0000;"  id="editcaution"name="editcaution">For detachment commander only</label>
      </div>
      </form>
    </div>

  <!-- <div class="tab-pane fade" id="pills-detailedit" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
  <div class="tab-pane" id="bottom-justified-editdetail">
  <form>
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
      <label for="allowance">Bank Account Name</label>                       
      <input id="editbackaccountname" name="editbackaccountname" class="form-control input" autocomplete="off">
        <div class="invalid-feedback" id="edit-backaccountname"></div>
    </div>
    </div>
    <div class="col-sm-12">
    <div class="form-group">
      <label for="allowance">Bank Account Number</label>
      <input id="editbackaccountnumber" name="editbackaccountnumber" class="form-control input"  autocomplete="off">
      <div class="invalid-feedback" id="edit-backaccountnumber"></div>
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
  </form>
  </div>
  <!--  <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
                <div class="tab-pane" id="bottom-justified-editleave">
                 <form class="forms-group">
                <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-review review-table mb-0" id="edittable_alterations">
                      <thead>
                        <tr>
                          <th style="width:40px;">#</th>
                          <th>Leave type</th>
                          <th>Total Leave</th>
                          <th style="width: 64px;"><button type="button" class="btn btn-primary btn-edit-row"><i class="fa fa-plus"></i></button></th>
                        </tr>
                      </thead>
                      <tbody id="edittable_alterations_tbody">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </form>
               </div> 

                  <div class="tab-pane" id="bottom-justified-editschedule">
                   <form class="forms-group"> 
                     <div class="card">
                     <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-solid">
                  <li class="nav-item"><a class="nav-link active" href="#solid-editsunday" data-toggle="tab">Sunday</a></li>
                  <li class="nav-item"><a class="nav-link" href="#solid-editmonday" data-toggle="tab">Monday</a></li>
                  <li class="nav-item"><a class="nav-link" href="#solid-edittuesday" data-toggle="tab">Tuesday</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-editwednesday" data-toggle="tab">Wednesday</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-editthursday" data-toggle="tab">Thursday</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-editfriday" data-toggle="tab">Friday</a></li>
                    <li class="nav-item"><a class="nav-link" href="#solid-editsaturday" data-toggle="tab">Saturday</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane show active" id="solid-editsunday">
                    <div class="row">
                        <div class="col">
                        <label for="civilstatus">Start Time</label>
                       <input type="time" name="editsuntimefrom" id="editsuntimefrom" class="form-control input" description="start time"/>
                       <div class="invalid-feedback" id="edit-suntimefrom"></div>
                       </div>
                        <div class="col form-group">  
                           <label for="civilstatus">End Time</label>
                       <input type="time" name="editsuntimeto" id="editsuntimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-suntimetocheck" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input checkbox" type="checkbox" id="editsunrestdays" name="editsunrestdays"  required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                  <div class="tab-pane" id="solid-editmonday">
                        <div class="row">
                        <div class="col">
                        <label for="civilstatus">Start Time</label>
                       <input type="time" name="editmontimefrom" id="editmontimefrom" class="form-control input" description="start time"/>
                         <div class="invalid-feedback" id="edit-montimefrom"></div>
                       </div>
                        <div class="col form-group">
                         <label for="civilstatus">End Time</label>  
                       <input type="time" name="editmontimeto" id="editmontimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-montimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input checkbox" type="checkbox" value="1" id="editmonrestdays" name="editmonrestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                  <div class="tab-pane" id="solid-edittuesday">
                      <div class="row">
                        <div class="col">
                           <label for="civilstatus">Start Time</label>
                       <input type="time" name="edittuetimefrom " id="edittuetimefrom" class="form-control input" description="start time"/>
                         <div class="invalid-feedback" id="edit-tuetimefrom"></div>
                       </div>
                        <div class="col form-group">  
                        <label for="civilstatus">End Time</label>
                       <input type="time" name="edittuetimeto" id="edittuetimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-tuetimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input checkbox" type="checkbox" value="1" id="edittuerestdays" name="edittuerestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                   <div class="tab-pane" id="solid-editwednesday">
                    <div class="row">
                        <div class="col">
                           <label for="civilstatus">Start Time</label>
                       <input type="time" name="editwedtimefrom" id="editwedtimefrom" class="form-control input" description="start time"/>
                         <div class="invalid-feedback" id="edit-wedtimefrom"></div>
                       </div>
                        <div class="col form-group">  
                           <label for="civilstatus">End Time</label>
                       <input type="time" name="editwedtimeto" id="editwedtimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-wedtimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input checkbox" type="checkbox" value="1" id="editwedrestdays" name="editwedrestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                   <div class="tab-pane" id="solid-editthursday">
                    <div class="row">
                        <div class="col">
                           <label for="civilstatus">Start Time</label>
                       <input type="time" name="editthtimefrom" id="editthtimefrom" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-thtimefrom"></div>
                       </div>
                        <div class="col form-group">  
                           <label for="civilstatus">End Time</label>
                       <input type="time" name="editthtimeto" id="editthtimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-thtimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="editthrestdays" name="editthrestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                    <div class="tab-pane" id="solid-editfriday">
                    <div class="row">
                        <div class="col">
                        <label for="civilstatus">Start Time</label>
                       <input type="time" name="editfritimefrom" id="editfritimefrom" class="form-control input"  description="start time"/>
                         <div class="invalid-feedback" id="edit-fritimefrom"></div>
                       </div>
                        <div class="col form-group"> 
                         <label for="civilstatus">End Time</label> 
                       <input type="time" name="editfritimeto" id="editfritimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-fritimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="editfrirestdays" name="editfrirestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                    <div class="tab-pane" id="solid-editsaturday">
                    <div class="row">
                        <div class="col">
                           <label for="civilstatus">Start Time</label>
                       <input type="time" name="editsattimefrom" id="editsattimefrom" class="form-control input"  description="start time"/>
                         <div class="invalid-feedback" id="edit-sattimefrom"></div>
                       </div>
                        <div class="col form-group"> 
                         <label for="civilstatus">End Time</label> 
                       <input type="time" name="editsattimetimeto" id="editsattimetimeto" class="form-control input" description="end time"/>
                         <div class="invalid-feedback" id="edit-sattimetimeto" ></div>
                        </div>
                      </div> 
                      <div class="form-group">  
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="editsatrestdays" name="editsatrestdays" required="">
                        <label class="form-check-label" for="invalidCheck2">
                          Rest Day
                        </label>
                      </div>
                       </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </div>  
        </div>
                    </div>    
                  </div>
                 <div class="submit-section">
              <button class="btn btn-primary submit-btn update">Update</button>
        </div>
                </div>
                </div>
             
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
           <div class="col-sm-12">
                <div class="dropdown">

                <!-- <a href="" class="btn btn-white btn-sm btn-rounded dropdown-toggle" data-toggle="dropdown" aria-expanded="false" name="changestatus" id="changestatus" description="status">Web Developer </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                  <a class="dropdown-item" href="#">Terminated</a>
                  <a class="dropdown-item" href="#">End of Contract</a>
                  <a class="dropdown-item" href="#">Resigned</a>
                </div> -->
              <p>Are you sure you want to
                  <select class="selectstatus" name="changestatus" id="changestatus" description="status">
                      <option value="Active"> Activate</option>
                      <option value="Terminated"> Terminate</option>
                      <option value="End of Contract"> End the Contract</option>
                      <option value="Resigned"> Resign</option>
                  </select>
                this record?</p>
              </div>
                </p>
            </div>
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

<?php 
  if($this->session->flashdata('success')!=""){
    echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
  }
?>
<!-- /Page Wrapper -->
<script  type="text/javascript"> 

  $(function () {
    var counter = 0;
    $(document).on("click", '.btn-add-row', function () {
      var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
      var div = $("<tr />");
      div.html(GetDynamicTextBox(id));
      $("#"+id+"_tbody").append(div);
    });
    $(document).on("click", "#comments_remove", function () {
      $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
      $(this).closest("tr").remove();
    });
    function GetDynamicTextBox(table_id) {
      $('#comments_remove').remove();
      var ctr = counter++;
      var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
      return '<td >'+rowsLength+'</td>' + 
            '<td>' +  '<div class="col-sm-12">' +
              '<select class="form-control addleave" id="addleave' + rowsLength + '" name="addleave' + rowsLength + '" description="leave type">' +
              '<option>No Selected</option>' + 
                <?php foreach($data['leave'] as $leave) {   
                  echo "'<option value=".'"'.$leave->leavetypeID.'"'.">".$leave->leavetypename."</option>' +"; 
                } ?> 
              '</select>' +  '<div class="invalid-feedback" id="add-leave"></div></div>' +
            '</td>' +
            '<td> <div class="col-sm-12">' +
             '<input type="text" name ="addtotalleave' + rowsLength + '" id="addtotalleave' + rowsLength + '" class="form-control addtotalleave" value = ""> <div class="invalid-feedback" id="add-totalleave"></div></div></td>' +  
          '<td>' + 
          '<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'

    }
  });
    $(function () {
    var counter = 0;
    $(document).on("click", '.btn-edit-row', function () {
      var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
      var div = $("<tr />");
      div.html(GetDynamicTextBox(id));
      $("#"+id+"_tbody").append(div);
    });
    $(document).on("click", "#comments_remove", function () {
      $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
      $(this).closest("tr").remove();
    });
    function GetDynamicTextBox(table_id) {
      $('#comments_remove').remove();
      var ctr = counter++;
      var editrowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
      return '<td >'+editrowsLength+'</td>' + 
            '<td>' +  '<div class="col-sm-12">' +
              '<select class="form-control editleave" id="editleave' + editrowsLength + '" name="editleave' + editrowsLength + '" description="leave type">' +
              '<option>No Selected</option>' + 
                <?php foreach($data['leave'] as $leave) {   
                  echo "'<option value=".'"'.$leave->leavetypeID.'"'.">".$leave->leavetypename."</option>' +"; 
                } ?> 
              '</select>' +  '<div class="invalid-feedback" id="edit-leave"></div></div>' +
            '</td>' +
            '<td> <div class="col-sm-12">' +
             '<input type="text" name ="edittotalleave' + editrowsLength + '" id="edittotalleave' + editrowsLength + '" class="form-control edittotalleave" value = ""> <div class="invalid-feedback" id="edit-totalleave"></div></div></td>' + 
             '<input type="hidden" name ="employee' + editrowsLength + '" id="employee' + editrowsLength + '" class="form-control employee" value = ""> <div class="invalid-feedback" id="edit-employee"></div></div>' + 

          '<td>' + 
          '<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'

    }
  });



  $("#sunrestdays").click(function(){
  var sunday = this.checked; 
  if(!sunday){
    $("#addsuntimefrom").prop("hidden", false);
    $("#addsuntimeto").prop("hidden", false);
    $("#addsuntimefrom").prop("text", true);
    $("#addsuntimefrom").val('');
    $("#addsuntimeto").val('');
  }else{
    $("#addsuntimefrom").prop("hidden", true);
    $("#addsuntimeto").prop("hidden", true); 
    $("#addsuntimefrom").prop("text", true);
    $("#addsuntimefrom").val('00:00');
    $("#addsuntimeto").val('00:00');
  }
  });
  $("#monrestdays").change(function(){
  var monday = this.checked; 
  if(!monday){
    $("#addmontimefrom").prop("hidden", false);
    $("#addmontimeto").prop("hidden", false);
    $("#addmontimefrom").val('');
    $("#addmontimeto").val('');
  }else{
    $("#addmontimefrom").prop("hidden", true);
    $("#addmontimeto").prop("hidden", true); 
    $("#addmontimefrom").val('00:00');
    $("#addmontimeto").val('00:00');
  }
  });
  $("#tuerestdays").change(function(){
  var tuesday = this.checked; 
  if(!tuesday){
    $("#addtuetimefrom").prop("hidden", false);
    $("#addtuetimeto").prop("hidden", false);
    $("#addtuetimefrom").val('');
    $("#addtuetimeto").val('');
  }else{
    $("#addtuetimefrom").prop("hidden", true);
    $("#addtuetimeto").prop("hidden", true); 
    $("#addtuetimefrom").val('00:00');
    $("#addtuetimeto").val('00:00');
  }
  });
  $("#wedrestdays").change(function(){
  var wednesday = this.checked; 
  if(!wednesday){
    $("#addwedtimefrom").prop("hidden", false);
    $("#addwedtimeto").prop("hidden", false);
    $("#addwedtimefrom").val('');
    $("#addwedtimeto").val('');
  }else{
    $("#addwedtimefrom").prop("hidden", true);
    $("#addwedtimeto").prop("hidden", true); 
    $("#addwedtimefrom").val('00:00');
    $("#addwedtimeto").val('00:00');
  }
  });
  $("#threstdays").change(function(){
  var thursday = this.checked; 
  if(!thursday){
    $("#addthtimefrom").prop("hidden", false);
    $("#addthtimeto").prop("hidden", false);
    $("#addthtimefrom").val('');
    $("#addthtimeto").val('');
  }else{
    $("#addthtimefrom").prop("hidden", true);
    $("#addthtimeto").prop("hidden", true); 
    $("#addthtimefrom").val('00:00');
    $("#addthtimeto").val('00:00');
  }
});
  $("#frirestdays").change(function(){
  var friday = this.checked; 
  if(!friday){
    $("#addfritimefrom").prop("hidden", false);
    $("#addfritimeto").prop("hidden", false);
    $("#addfritimefrom").val('');
    $("#addfritimeto").val('');
  }else{
  $("#addfritimefrom").prop("hidden", true);
    $("#addfritimeto").prop("hidden", true); 
    $("#addfritimefrom").val('00:00');
    $("#addfritimeto").val('00:00');
  }
  });
  $("#satrestdays").change(function(){
  var sat = this.checked; 
  if(!sat){
    $("#addsattimefrom").prop("hidden", false);
    $("#addsattimetimeto").prop("hidden", false);
    $("#addsattimefrom").val('');
    $("#addsattimetimeto").val('');
  }else{
  $("#addsattimefrom").prop("hidden", true);
    $("#addsattimetimeto").prop("hidden", true); 
    $("#addsattimefrom").val('00:00');
    $("#addsattimetimeto").val('00:00');
  }
  });
  $('#employeetype').on('change', function() {
     if ( this.value == '1')
      {
         $("#addrole").prop("disabled", true);
         $("#addusername").prop("disabled", true);
         $("#addpassword").prop("disabled", true);
         $("#addrole").val('');
         $("#addusername").val('');
         $("#addpassword").val('');
      }
      else
      {
         $("#addrole").prop("disabled", false);
         $("#addusername").prop("disabled", false);
         $("#addpassword").prop("disabled", false);
      }
    });


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
  });
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
  $('#addemployeetype').change(function(){
    var employeetype =$(this).val();
      if(employeetype==1){
         $("#caution").show();
         $("#addclient").prop("disabled", false);
         $("#adddetachment").prop("disabled", false);

      }else{
        $("#caution").hide();
        $("#addclient").prop("disabled", true);
        $("#adddetachment").prop("disabled", true);
      }

  });
     //dropdown department ADD //
  $('#editemployeetype').change(function(){
    var employeetype =$(this).val();
      if(employeetype==1){
         $("#editcaution").show();
         $("#editclient").prop("disabled", false);
         $("#editdetachment").prop("disabled", false);

      }else{
        $("#editcaution").hide();
        $("#editclient").prop("disabled", true);
        $("#editdetachment").prop("disabled", true);
      }

  });


     //dropdown department ADD //
  $('#editemployeetype').change(function(){
    var employeetype =$(this).val();
      if(employeetype==1){
         $("#caution").show();
         $("#addclient").prop("disabled", false);
         $("#adddetachment").prop("disabled", false);

      }else{
        $("#caution").hide();
        $("#addclient").prop("disabled", true);
        $("#adddetachment").prop("disabled", true);
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

  //dropdown client ADD //
  $('#addclient').change(function(){ 
    var id=$(this).val();
  
    $.ajax({
      url : "<?php echo site_url('Employees/get_client');?>",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          if($("#adddetachment").val()==data[i].detachmentID){
            html += '<option value='+data[i].detachmentID+' selected>'+data[i].postname+'</option>';
          }else{
            html += '<option value='+data[i].detachmentID+'>'+data[i].postname+'</option>';
          }
        }
        $('#adddetachment').html(html);
      }
    });
    return false;

  });
  // end of dropdown client//
   //dropdown client edit //
  $('#editclient').change(function(){ 
    var id=$(this).val();
  
    $.ajax({
      url : "<?php echo site_url('Employees/get_client');?>",
      method : "POST",
      data : {id: id},
      async : true,
      dataType : 'json',
      success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
          if($("#edithiddenDetachment").val()==data[i].detachmentID){
            html += '<option value='+data[i].detachmentID+' selected>'+data[i].postname+'</option>';
          }else{
            html += '<option value='+data[i].detachmentID+'>'+data[i].postname+'</option>';
          }
        }
        $('#editdetachment').html(html);
      }
    });
    return false;

  });
  // end of dropdown client//

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
        $(this).find('form')[1].reset();
        $(this).find('form')[2].reset();
        $("#edittable_alterations_tbody").html("");
        $(".invalid-feedback").html("");
          $('input').removeClass('is-invalid');
          $('input').removeClass('is-valid');
          $('select').removeClass('is-invalid');
          $('select').removeClass('is-valid');
          
    });

    /* CLEAR MODAL */
    $('#add_employee').on('hidden.bs.modal', function(){
      $("#table_alterations_tbody").html("");
        $(this).find('form')[0].reset();
        $(this).find('form')[1].reset();
        $(this).find('form')[2].reset();
        $(this).find('form')[3].reset();
         $(this).find('form')[4].reset();
        $(".invalid-feedback").html("");
          $('input').removeClass('is-invalid');
          $('input').removeClass('is-valid');
          $('select').removeClass('is-invalid');
          $('select').removeClass('is-valid');  
          $('input').prop("disabled", false);
        
    });

    /* CLEAR MODAL */
    $('#status_employee').on('hidden.bs.modal', function(){
        document.getElementById("status-invalid").innerHTML = "";
    });
      /* Change Status */
      $('.changestatus').unbind('click').bind('click', function(){
      $('.change').attr('id', $(this).data('id'));
      $('.change').attr('status', $(this).data('status'));
      $('.change').attr('employeestatus', $(this).data('employeestatus')); 
    
    });

    /* CHANGE STATUS */
    $('.change').unbind('click').bind('click', function(){
          var changestatus = $("#changestatus").val();
          var id = $(this).attr('id');
          $.ajax({
                url : "<?php echo site_url('employees/changestatus');?>",
                method : "POST",
                data : {id:id,
                    changestatus:changestatus},
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
      var employeetype = $("#addemployeetype").val();
      var firstname = $("#addfirstname").val();
      var lastname = $("#addlastname").val();
      var streetname = $("#addstreetname").val();
      var barangay = $("#addbarangay").val();
      var city = $("#addcity").val();
      var citizenship = $("#addcitizenship").val();
      var middlename = $("#addmiddlename").val();
      var basicsalary = $("#addbasicsalary").val();

    var IDArray = ['#addfirstname', '#addmiddlename', '#addlastname', '#addgender', '#addhousenumber',
                   '#addstreetname', '#addbarangay', '#addcity', '#addbirthdate', '#addcontactinfo',
                   '#addcivilstatus', '#addcitizenship', '#addhireddate', '#adddepartment', '#adddesignation',
                   '#adddetachment', '#addstatus', '#addrole', '#addusername', '#addpassword', 
                   '#addbasicsalary', '#adddailyrate', '#addallowance', '#addtinnumber', '#addsssnumber',
                   '#addphilhealthnumber', '#addpagibignumber', '#addsuntimefrom', '#addsuntimeto', '#sunrestdays',
                   '#addmontimefrom', '#addmontimeto','#monrestdays','#addtuetimefrom', '#addtuetimeto',
                   '#tuerestdays', '#addwedtimefrom', '#addwedtimeto', '#wedrestdays', '#addthtimefrom',
                   '#addthtimeto', '#threstdays', '#addfritimefrom', '#addfritimeto', '#frirestdays',
                   '#addsattimefrom', '#addsattimetimeto', '#satrestdays', '#addclient', '#addemployeetype',
                   '#addbackaccountname','#addbackaccountnumber'];

    var ErrorIDArray = ['add-firstname', 'add-middlename', 'add-lastname', 'add-gender', 'add-housenumber',
                     'add-streetname', 'add-barangay', 'add-city', 'add-birthdate', 'add-contactinfo',
                     'add-civilstatus', 'add-citizenship', 'add-hireddate', 'add-department', 'add-designation',
                     'add-detachment', 'add-status', 'add-role', 'add-username', 'add-password', 
                     'add-basicsalary', 'add-dailyrate', 'add-allowance', 'add-tinnumber', 'add-sssnumber',
                     'add-philhealthnumber', 'add-pagibignumber', 'add-suntimefrom','add-suntimetocheck','add-sunrestdays',
                     'add-montimefrom','add-montimeto','add-monrestdays','add-tuetimefrom','add-tuetimeto',
                     'add-tuerestdays','add-wedtimefrom','add-wedtimeto','add-wedrestdays','add-thtimefrom',
                     'add-thtimeto','add-threstdays','add-fritimefrom','add-fritimeto', 'add-frirestdays',
                     'add-sattimefrom','add-sattimetimeto', 'add-satrestdays', 'add-client', 'add-employeetype','add-backaccountname','add-backaccountnumber'];
      var ValueArray = [];
      var firstRequired = "";
      var navIndex = 0;
    if($(IDArray[20]).val()=="0"){
      document.getElementById(ErrorIDArray[20]).innerHTML = "Invalid input  " + $(IDArray[20]).attr("description") +".";
      $(IDArray[20]).addClass('is-invalid');
      event.preventDefault();
      return false;
    }else{
      document.getElementById(ErrorIDArray[20]).innerHTML = "";
      $(IDArray[20]).removeClass('is-invalid');
      $(IDArray[20]).addClass('is-valid');
      event.preventDefault();
    };
    if($(IDArray[21]).val()=="0"){
      document.getElementById(ErrorIDArray[21]).innerHTML = "Invalid input  " + $(IDArray[21]).attr("description") +".";
      $(IDArray[21]).addClass('is-invalid');
      event.preventDefault();
      return false;
    }else{
      document.getElementById(ErrorIDArray[21]).innerHTML = "";
      $(IDArray[21]).removeClass('is-invalid');
      $(IDArray[21]).addClass('is-valid');
      event.preventDefault();
    };
  var phone = $("#addcontactinfo").val();
   if(phone.length<13){
     document.getElementById(ErrorIDArray[9]).innerHTML = "Mobile number must be 11 digit " ;
    $(IDArray[9]).addClass('is-invalid');
    event.preventDefault();
    return false;
    }else{
       document.getElementById(ErrorIDArray[9]).innerHTML = "";
    $(IDArray[9]).removeClass('is-invalid');
    $(IDArray[9]).addClass('is-valid');
    event.preventDefault();
    };
    
    for(var i=0;i<IDArray.length;i++){
      ValueArray[i] = $(IDArray[i]).val().trim();
    if(employeetype=='1'){
      if(i==1 || i==4 || i==17 || i==18 || i==19 || i==22 || i==23 || i==24 || i==25 || i==26  || i==29 || i==32 || i==35 || i==38 || i==41 || i==44 || i==47 || i==50 || i==51) continue;
    
      if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
        if(firstRequired==""){
          firstRequired = IDArray[i]
             if(i<=16) navIndex = 0;
          /*else if(i<=19) navIndex = 1;*/
          else if(i<=26) navIndex = 2;
          else if(i<=47) navIndex = 3;
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
    }else{
         if(i==1 || i==4 || i==15 || i==22 || i==23 || i==24 || i==25 || i==26 || i==29 || i==32 || i==35 || i==38 || i==41 || i==44 || i==47 || i==48  || i==50 || i==51) continue;
        if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
        if(firstRequired==""){
          firstRequired = IDArray[i]
             if(i<=16) navIndex = 0;
          else if(i<=19) navIndex = 1;
          else if(i<=26) navIndex = 2;
          else if(i<=47) navIndex = 3;
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
    $('#addtabs li:eq('+navIndex+') a').tab('show');
    $(firstRequired).focus();
    if(firstRequired==""){
    if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
    $('#add_employee').hide();
    $('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
    event.preventDefault(); 
    return false;
    } 
    
  });
   $("#cncl-add").unbind('click').bind('click', function(){
      $('#confirmation_add').modal('hide');
      $('#add_employee').show();

    }); 

      $('.add').unbind('click').bind('click', function(){
        var leave = [];
        var totalleave = [];
        $(".addleave").each(function(){
           leave.push($(this).val());
        });
        $(".addtotalleave").each(function(){
           totalleave.push($(this).val());
        });
        var sunrestdays       =   $("#sunrestdays").prop('checked')==true ? "1" : "0"; 
        var monrestday        =   $("#monrestdays").prop('checked')==true ? "1" : "0"; 
        var tuerestday        =   $("#tuerestdays").prop('checked')==true ? "1" : "0"; 
        var wedrestday        =   $("#wedrestdays").prop('checked')==true ? "1" : "0";
        var thuresday         =   $("#threstdays").prop('checked')==true ? "1" : "0"; 
        var frirestday        =   $("#frirestdays").prop('checked')==true ? "1" : "0";
        var satrestday        =   $("#satrestdays").prop('checked')==true ? "1" : "0";    
        var firstname         =   $("#addfirstname").val();
        var middlename        =   $("#addmiddlename").val();
        var lastname          =   $("#addlastname").val();
        var gender            =   $("#addgender").val();
        var housenumber       =   $("#addhousenumber").val();
        var streetname        =   $("#addstreetname").val();
        var barangay          =   $("#addbarangay").val();
        var city              =   $("#addcity").val();
        var birthdate         =   $("#addbirthdate").val();
        var contactinfo       =   $("#addcontactinfo").val();
        var civilstatus       =   $("#addcivilstatus").val();
        var citizenship       =   $("#addcitizenship").val();
        var hireddate         =   $("#addhireddate").val();
        var departmentID      =   $("#adddepartment").val();
        var designationID     =   $("#adddesignation").val(); 
        var detachmentID      =   $("#adddetachment").val();
        var employeestatus    =   $("#addstatus").val();
        var roleDescription   =   $("#addrole").val();
        var username          =   $("#addusername").val();
        var password          =   $("#addpassword").val();
        var basicsalary       =   $("#addbasicsalary").val();
        var dailyrate         =   $("#adddailyrate").val();
        var allowance         =   $("#addallowance").val();
        var tinnumber         =   $("#addtinnumber").val();
        var sssnumber         =   $("#addsssnumber").val();
        var philhealthnumber  =   $("#addphilhealthnumber").val();
        var pagibignumber     =   $("#addpagibignumber").val();
        var suntimefrom       =   $("#addsuntimefrom").val();
        var suntimeto         =   $("#addsuntimeto").val();
        var montimefrom       =   $("#addmontimefrom").val();
        var montimeto         =   $("#addmontimeto").val();
        var tuetimefrom       =   $("#addtuetimefrom").val();
        var tuetimeto         =   $("#addtuetimeto").val();
        var wedtimefrom       =   $("#addwedtimefrom").val();
        var wedtimeto         =   $("#addwedtimeto").val();
        var thutimefrom       =   $("#addthtimefrom").val();
        var thutimeto         =   $("#addthtimeto").val();
        var fritimefrom       =   $("#addfritimefrom").val();
        var fritimeto         =   $("#addfritimeto").val();
        var sattimefrom       =   $("#addsattimefrom").val();
        var sattimeto         =   $("#addsattimetimeto").val();
        var clientID          =   $("#addclient").val();
        var employeetypeid    =   $("#addemployeetype").val();
        var backaccountname   =   $("#addbackaccountname").val();
        var backaccountnumber =    $("#addbackaccountnumber").val();
        $.ajax({
        url : "<?php echo site_url('employees/save');?>",
        method : "POST",
        data : {firstname:         firstname,       middlename:       middlename,      lastname:          lastname,
                gender:            gender,          housenumber:      housenumber,     streetname:        streetname,
                barangay:          barangay,        city:             city,             birthdate:        birthdate,
                contactinfo:       contactinfo,     civilstatus:      civilstatus,     citizenship:       citizenship,
                hireddate:         hireddate,       departmentID:     departmentID,    designationID:     designationID,
                detachmentID:      detachmentID,    employeestatus:   employeestatus,   roleDescription:  roleDescription, 
                username:          username,        password:         password,         basicsalary:      basicsalary,    
                dailyrate:         dailyrate,       allowance:        allowance,        tinnumber:        tinnumber,      
                sssnumber:         sssnumber,       philhealthnumber: philhealthnumber, pagibignumber:    pagibignumber,  
                suntimefrom:       suntimefrom,     suntimeto:        suntimeto,        sunrestdays:      sunrestdays,     
                montimefrom:       montimefrom,     montimeto:        montimeto,        monrestday:       monrestday,      
                tuetimefrom:       tuetimefrom,     tuetimeto:        tuetimeto,        tuerestday:       tuerestday,     
                wedtimefrom:       wedtimefrom,     wedtimeto:        wedtimeto,        wedrestday:       wedrestday,     
                thutimefrom:       thutimefrom,     thutimeto:        thutimeto,        thuresday:        thuresday,       
                fritimefrom:       fritimefrom,     fritimeto:        fritimeto,        frirestday:       frirestday,     
                sattimefrom:       sattimefrom,     sattimeto:        sattimeto,        satrestday:       satrestday,      
                clientID:          clientID,        employeetypeid:   employeetypeid,   backaccountname:  backaccountname, 
                backaccountnumber: backaccountnumber,leave:           leave,            totalleave:       totalleave},
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
      });

    $("#editsunrestdays").click(function(){
    var sunday = this.checked; 
    if(!sunday){
      $("#editsuntimefrom").prop("hidden", false);
      $("#editsuntimeto").prop("hidden", false);
      $("#editsuntimefrom").val('');
      $("#editsuntimeto").val('');
    }else{
      $("#editsuntimefrom").prop("hidden", true);
      $("#editsuntimeto").prop("hidden", true); 
      $("#editsuntimefrom").val('00:00');
      $("#editsuntimeto").val('00:00');
    }
    });
    $("#editmonrestdays").change(function(){
    var monday = this.checked; 
    if(!monday){
      $("#editmontimefrom").prop("hidden", false);
      $("#editmontimeto").prop("hidden", false);
      $("#editmontimefrom").val('');
      $("#editmontimeto").val('');
    }else{
      $("#editmontimefrom").prop("hidden", true);
      $("#editmontimeto").prop("hidden", true); 
      $("#editmontimefrom").val('00:00');
      $("#editmontimeto").val('00:00');
    }
    });
    $("#edittuerestdays").change(function(){
    var tuesday = this.checked; 
    if(!tuesday){
      $("#edittuetimefrom").prop("hidden", false);
      $("#edittuetimeto").prop("hidden", false);
      $("#edittuetimefrom").val('');
      $("#addtuetimeto").val('');
    }else{
      $("#edittuetimefrom").prop("hidden", true);
      $("#edittuetimeto").prop("hidden", true); 
      $("#edittuetimefrom").val('00:00');
      $("#edittuetimeto").val('00:00');
    }
    });
    $("#editwedrestdays").change(function(){
    var wednesday = this.checked; 
    if(!wednesday){
      $("#editwedtimefrom").prop("hidden", false);
      $("#editwedtimeto").prop("hidden", false);
      $("#editwedtimefrom").val('');
      $("#editwedtimeto").val('');
    }else{
      $("#editwedtimefrom").prop("hidden", true);
      $("#editwedtimeto").prop("hidden", true); 
      $("#editwedtimefrom").val('00:00');
      $("#editwedtimeto").val('00:00');
    }
    });
    $("#editthrestdays").change(function(){
    var thursday = this.checked; 
    if(!thursday){
      $("#editthtimefrom").prop("hidden", false);
      $("#editthtimeto").prop("hidden", false);
      $("#editthtimefrom").val('');
      $("#editthtimeto").val('');
    }else{
      $("#editthtimefrom").prop("hidden", true);
      $("#editthtimeto").prop("hidden", true); 
      $("#editthtimefrom").val('00:00');
      $("#editthtimeto").val('00:00');
    }
  });
    $("#editfrirestdays").change(function(){
    var friday = this.checked; 
    if(!friday){
      $("#editfritimefrom").prop("hidden", false);
      $("#editfritimeto").prop("hidden", false);
      $("#editfritimefrom").val('');
      $("#editfritimeto").val('');
    }else{
    $("#editfritimefrom").prop("hidden", true);
      $("#editfritimeto").prop("hidden", true); 
      $("#editfritimefrom").val('00:00');
      $("#editfritimeto").val('00:00');
    }
    });
    $("#editsatrestdays").change(function(){
    var sat = this.checked; 
    if(!sat){
      $("#editsattimefrom").prop("hidden", false);
      $("#editsattimetimeto").prop("hidden", false);
      $("#editsattimefrom").val('');
      $("#editsattimetimeto").val('');
    }else{
    $("#editsattimefrom").prop("hidden", true);
      $("#editsattimetimeto").prop("hidden", true); 
      $("#editsattimefrom").val('00:00');
      $("#editsattimetimeto").val('00:00');
    }
    });


  /* end SAVE employee */
  $('.editemployee').unbind('click').bind('click', function(){
    $(".modal-body #editemployeetype").val($(this).data('employeetypeid'));
    $(".modal-body #editfirstname").val($(this).data('firstname'));
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
    $(".modal-body #editclient").val($(this).data('clientid'));
    $(".modal-body #editclient").trigger("change");
    $(".modal-body #edithiddenDetachment").val( $(this).data('detachmentid'));
    $(".modal-body #editdetachment").val( $(this).data('detachmentid'));
    $(".modal-body #editstatus").val( $(this).data('employeestatus'));
    $(".modal-body #editusername").val( $(this).data('username'));
    $(".modal-body #editpassword").val( $(this).data('password'));
    $(".modal-body #editbasicsalary").val( $(this).data('basicsalary'));
    $(".modal-body #editdailyrate").val( $(this).data('dailyrate'));
    $(".modal-body #editallowance").val( $(this).data('allowance'));
    $(".modal-body #editbackaccountname").val( $(this).data('backaccountname'));
    $(".modal-body #editbackaccountnumber").val( $(this).data('backaccountnumber'));
    $(".modal-body #editsssnumber").val( $(this).data('sssnumber'));
    $(".modal-body #editphilhealthnumber").val( $(this).data('philhealthnumber'));
    $(".modal-body #editpagibignumber").val( $(this).data('pagibignumber'));
    $('.edit').attr('id', $(this).data('id'));
    var id = $(this).data('id');
    $.ajax({
          url : "<?php echo site_url('employees/Schedule');?>",
          method : "POST",
          data : {id: id},
          async : true,
          dataType : 'json',
          success: function(response){
            var len ="";
            var len = response.length;
              for(var i=0; i<len; i++){
              var sunschedulefrom1  =   response[i].sunschedulefrom;
              var sunscheduleto1    =   response[i].sunscheduleto;
              var sunrestday        =   response[i].sunrestday;
              var monchedulefrom    =   response[i].monchedulefrom;
              var monscheduleto     =   response[i].monscheduleto;
              var monrestday        =   response[i].monrestday;
              var tueschedulefrom   =   response[i].tueschedulefrom;
              var tuescheduleto     =   response[i].tuescheduleto;
              var tuerestday        =   response[i].tuerestday;
              var wedschedulefrom   =   response[i].wedschedulefrom;
              var wedscheduleto     =   response[i].wedscheduleto;
              var wedrestday        =   response[i].wedrestday;
              var thschedulefrom    =   response[i].thschedulefrom;
              var thscheduleto      =   response[i].thscheduleto;
              var threstday         =   response[i].threstday;
              var frischedulefrom   =   response[i].frischedulefrom;
              var frischeduleto     =   response[i].frischeduleto;
              var frirestday        =   response[i].frirestday ;
              var satschedulefrom   =   response[i].satschedulefrom;
              var satscheduleto     =   response[i].satscheduleto ;
              var satrestday        =   response[i].satrestday;
              $('#editsuntimefrom').val(sunschedulefrom1);
              $('#editsuntimeto').val(sunscheduleto1);
              $('#editmontimefrom').val(monchedulefrom);
              $('#editmontimeto').val(monscheduleto);
              $('#edittuetimefrom').val(tueschedulefrom);
              $('#edittuetimeto').val(tuescheduleto);
              $('#editwedtimefrom').val(wedschedulefrom);
              $('#editwedtimeto').val(wedscheduleto);
              $('#editthtimefrom').val(thschedulefrom);
              $('#editthtimeto').val(thscheduleto);
              $('#editfritimefrom').val(frischedulefrom);
              $('#editfritimeto').val(frischeduleto);
              $('#editsattimefrom').val(satschedulefrom);
              $('#editsattimetimeto').val(satscheduleto);
              if (sunrestday == 1){
              $("#editsunrestdays").prop("checked", true);
              $("#editsuntimefrom").prop("hidden",  true);
              $("#editsuntimeto").prop("hidden",    true); 
              } else {
              $("#editsunrestdays").prop("checked", false);
              $("#editsuntimefrom").prop("hidden",  false);
              $("#editsuntimeto").prop("hidden",    false);
              }
            if (monrestday == 1){
            $("#editmonrestdays").prop("checked",   true);
            $("#editmontimefrom").prop("hidden",    true);
            $("#editmontimeto").prop("hidden",      true); 
            } else {
            $("#editmonrestdays").prop("checked",   false);
            $("#editmontimefrom").prop("hidden",    false);
            $("#editmontimeto").prop("hidden",      false);
            }
            if (tuerestday == 1){
            $("#edittuerestdays").prop("checked",   true);
            $("#edittuetimefrom").prop("hidden",    true);
            $("#edittuetimeto").prop("hidden",      true); 
            } else {
            $("#edittuerestdays").prop("checked",   false);
            $("#edittuetimefrom").prop("hidden",    false);
            $("#edittuetimeto").prop("hidden",      false);
            }
            if (wedrestday == 1){
            $("#editwedrestdays").prop("checked",   true);
            $("#editwedtimefrom").prop("hidden",    true);
            $("#editwedtimeto").prop("hidden",      true); 
            } else {
            $("#editwedrestdays").prop("checked",   false);
            $("#editwedtimefrom").prop("hidden",    false);
            $("#editwedtimeto").prop("hidden",      false);
            }
            if (threstday == 1){
            $("#editthrestdays").prop("checked",    true);
            $("#editthtimefrom").prop("hidden",     true);
            $("#editthtimeto").prop("hidden",       true); 
            } else {
            $("#editthrestdays").prop("checked",    false);
            $("#editthtimefrom").prop("hidden",     false);
            $("#editthtimeto").prop("hidden",       false);
            }
            if (frirestday == 1){
            $("#editfrirestdays").prop("checked",   true);
            $("#editfritimefrom").prop("hidden",    true);
            $("#editfritimeto").prop("hidden",      true); 
            } else {
            $("#editfrirestdays").prop("checked",   false);
            $("#editfritimefrom").prop("hidden",    false);
            $("#editfritimeto").prop("hidden",      false);
            }
            if (satrestday == 1){
            $("#editsatrestdays").prop("checked",   true);
            $("#editsattimefrom").prop("hidden",    true);
            $("#editsattimetimeto").prop("hidden",  true); 
            } else {
            $("#editsatrestdays").prop("checked",   false);
            $("#editsattimefrom").prop("hidden",    false);
            $("#editsattimetimeto").prop("hidden",  false);
            }
            }
      }
     });
    var idleave = $(this).data('id');
        $.ajax({
              url : "<?php echo site_url('employees/leaverecord');?>",
              method : "POST",
              data : {idleave: idleave},
              async : true,
              dataType : 'json',
              success: function(response){
                var len ="";
                var len = response.length;

                  for(var i=0; i<len; i++){
                      $(".btn-edit-row").trigger('click');
                      var totalleave    =    response[i].totalleave;
                      var leavetypeID   =    response[i].leavetypeID;
                      var employeeID    =    response[i].employeeleavecreditID;
                      $("#editleave" + (i+1)).val(leavetypeID);
                      $("#edittotalleave" + (i+1)).val (totalleave);
                      $("#employee" + (i+1)).val (employeeID);
              } 
            } 
          });          

  });
  /* updated employee */
  $('.update').unbind('click').bind('click', function(){
    var IDArray = ['#editfirstname', '#editmiddlename', '#editlastname', '#editgender', '#edithousenumber',
                   '#editstreetname', '#editbarangay', '#editcity', '#editbirthdate', '#editcontactinfo',
                   '#editcivilstatus', '#editcitizenship', '#edithireddate', '#editdepartment', '#editdesignation',
                   '#editdetachment', '#editstatus', '#editrole', '#editusername', '#editpassword', 
                   '#editbasicsalary', '#editdailyrate', '#editallowance', '#edittinnumber', '#editsssnumber',
                   '#editphilhealthnumber', '#editpagibignumber','#editsuntimefrom', '#editsuntimeto', '#editsunrestdays',
                   '#editmontimefrom', '#editmontimeto','#editmonrestdays','#edittuetimefrom', '#edittuetimeto',
                   '#edittuerestdays', '#editwedtimefrom', '#editwedtimeto', '#editwedrestdays', '#editthtimefrom',
                   '#editthtimeto', '#editthrestdays', '#editfritimefrom', '#editfritimeto', '#editfrirestdaystdays',
                   '#editsattimefrom', '#editsattimetimeto', '#editsatrestdays','#editclient','#editemployeetype','#editbackaccountname', '#editbackaccountnumber'];

    var ErrorIDArray = ['edit-firstname', 'edit-middlename', 'edit-lastname', 'edit-gender', 'edit-housenumber',
                       'edit-streetname', 'edit-barangay', 'edit-city', 'edit-birthdate', 'edit-contactinfo',
                       'edit-civilstatus', 'edit-citizenship', 'edit-hireddate', 'edit-department', 'edit-designation',
                       'edit-detachment', 'edit-status', 'edit-role', 'edit-username', 'edit-password', 
                       'edit-basicsalary', 'edit-dailyrate', 'edit-allowance', 'edit-tinnumber', 'edit-sssnumber',
                       'edit-philhealthnumber', 'edit-pagibignumber','edit-suntimefrom','edit-suntimetocheck','edit-sunrestday',
                       'edit-montimefrom','edit-montimeto','edit-editmonrestdays','edit-tuetimefrom','edit-tuetimeto',
                       'edit-tuerestdays','edit-wedtimefrom','edit-wedtimeto','edit-wedrestdays','edit-thtimefrom',
                       'edit-thtimeto','edit-threstdays','edit-fritimefrom','edit-fritimeto','edit-frirestdays',
                       'edit-sattimefrom','edit-sattimetimeto','edit-satrestdays', 'edit-client', 'edit-employeetype','edit-backaccountname','edit-backaccountnumber'];

      var ValueArray = [];
      var firstRequired = "";
      var navIndex = 0;
      var id = $(this).attr('id');
      var employeetype = $("#editemployeetype").val();
      var firstname = $("#editfirstname").val();
      var lastname = $("#editlastname").val();
      var streetname = $("#editstreetname").val();
      var barangay = $("#editbarangay").val();
      var city = $("#editcity").val();
      var citizenship = $("#editcitizenship").val();
      var middlename = $("#editmiddlename").val();
      if($(IDArray[20]).val()=="0"){
      document.getElementById(ErrorIDArray[20]).innerHTML = "Invalid input  " + $(IDArray[20]).attr("description") +".";
      $(IDArray[20]).addClass('is-invalid');
                event.preventDefault();
      return false;
    }else{
      document.getElementById(ErrorIDArray[20]).innerHTML = "";
      $(IDArray[20]).removeClass('is-invalid');
      $(IDArray[20]).addClass('is-valid');
      event.preventDefault();
    };
    if($(IDArray[21]).val()=="0"){
      document.getElementById(ErrorIDArray[21]).innerHTML = "Invalid input  " + $(IDArray[21]).attr("description") +".";
      $(IDArray[21]).addClass('is-invalid');
      event.preventDefault();
      return false;
    }else{
      document.getElementById(ErrorIDArray[21]).innerHTML = "";
      $(IDArray[21]).removeClass('is-invalid');
      $(IDArray[21]).addClass('is-valid');
      event.preventDefault();
    };
  var phone = $("#editcontactinfo").val();
   if(phone.length<13){
     document.getElementById(ErrorIDArray[9]).innerHTML = "Mobile number must be 11 digit " ;
    $(IDArray[9]).addClass('is-invalid');
    event.preventDefault();
    return false;
    }else{
       document.getElementById(ErrorIDArray[9]).innerHTML = "";
    $(IDArray[9]).removeClass('is-invalid');
    $(IDArray[9]).addClass('is-valid');
    event.preventDefault();
    };

    for(var i=0;i<IDArray.length;i++){
      ValueArray[i] = $(IDArray[i]).val();
      if(employeetype=='1'){
       if(i==1 || i==4 || i==17 || i==18 || i==19 || i==22 || i==23 || i==24 || i==25 || i==26  || i==29 || i==32 || i==35 || i==38 || i==41 || i==44 || i==47) continue;
      
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
       }else{
         if(i==1 || i==4 || i==15 || i==22 || i==23 || i==24 || i==25 || i==26 || i==29 || i==32 || i==35 || i==38 || i==41 || i==44 || i==47 || i==48) continue;
        if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
        if(firstRequired==""){
          firstRequired = IDArray[i]
             if(i<=16) navIndex = 0;
          else if(i<=19) navIndex = 1;
          else if(i<=26) navIndex = 2;
          else if(i<=47) navIndex = 3;
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
    $('.modal-body #edittabs li:eq('+navIndex+') a').tab('show');
    $(firstRequired).focus();
    if(firstRequired==""){
    if($(IDArray[i]).val()=="" || $(IDArray[i]).val()=="") return false;
    $('#edit_employee').hide();
    $('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
    event.preventDefault(); 
    return false;
    }   
   });
  $("#cncl-edit").unbind('click').bind('click', function(){
      $('#confirmation_edit').modal('hide');
      $('#edit_employee').show();
    });
  $('.edit').unbind('click').bind('click', function(){
        var id                =   $(this).attr('id');
         var leave = [];
         var employee = [];
          $(".employee").each(function(){
           employee.push($(this).val());
        });
        var totalleave = [];
        $(".editleave").each(function(){
           leave.push($(this).val());
        });
        $(".edittotalleave").each(function(){
           totalleave.push($(this).val());
        });
        var sunrestdays       =   $("#editsunrestdays").prop('checked')==true ? "1" : "0"; 
        var monrestday        =   $("#editmonrestdays").prop('checked')==true ? "1" : "0"; 
        var tuerestday        =   $("#edittuerestdays").prop('checked')==true ? "1" : "0"; 
        var wedrestday        =   $("#editwedrestdays").prop('checked')==true ? "1" : "0";
        var thuresday         =   $("#editthrestdays").prop('checked')==true ? "1" : "0"; 
        var frirestday        =   $("#editfrirestdays").prop('checked')==true ? "1" : "0";
        var satrestday        =   $("#editsatrestdays").prop('checked')==true ? "1" : "0";  
        var firstname         =   $("#editfirstname").val();
        var middlename        =   $("#editmiddlename").val();
        var lastname          =   $("#editlastname").val();
        var gender            =   $("#editgender").val();
        var housenumber       =   $("#edithousenumber").val();
        var streetname        =   $("#editstreetname").val();
        var barangay          =   $("#editbarangay").val();
        var city              =   $("#editcity").val();
        var birthdate         =   $("#editbirthdate").val();
        var contactinfo       =   $("#editcontactinfo").val();
        var civilstatus       =   $("#editcivilstatus").val();
        var citizenship       =   $("#editcitizenship").val();
        var hireddate         =   $("#edithireddate").val();
        var departmentID      =   $("#editdepartment").val();
        var designationID     =   $("#editdesignation").val(); 
        var detachmentID      =   $("#editdetachment").val();
        var employeestatus    =   $("#editstatus").val();
        var roleDescription   =   $("#editrole").val();
        var username          =   $("#editusername").val();
        var password          =   $("#editpassword").val();
        var basicsalary       =   $("#editbasicsalary").val();
        var dailyrate         =   $("#editdailyrate").val();
        var allowance         =   $("#editallowance").val();
        var tinnumber         =   $("#edittinnumber").val();
        var sssnumber         =   $("#editsssnumber").val();
        var philhealthnumber  =   $("#editphilhealthnumber").val();
        var pagibignumber     =   $("#editpagibignumber").val();
        var suntimefrom       =   $("#editsuntimefrom").val();
        var suntimeto         =   $("#editsuntimeto").val();
        var montimefrom       =   $("#editmontimefrom").val();
        var montimeto         =   $("#editmontimeto").val();
        var tuetimefrom       =   $("#edittuetimefrom").val();
        var tuetimeto         =   $("#edittuetimeto").val();
        var wedtimefrom       =   $("#editwedtimefrom").val();
        var wedtimeto         =   $("#editwedtimeto").val();
        var thutimefrom       =   $("#editthtimefrom").val();
        var thutimeto         =   $("#editthtimeto").val();
        var fritimefrom       =   $("#editfritimefrom").val();
        var fritimeto         =   $("#editfritimeto").val();
        var sattimefrom       =   $("#editsattimefrom").val();
        var sattimeto         =   $("#editsattimetimeto").val();
        var clientID          =   $("#editclient").val();
        var employeetypeid    =   $("#editemployeetype").val();
        var backaccountname   =   $("#editbackaccountname").val();
        var backaccountnumber =   $("#editbackaccountnumber").val();
        $.ajax({
              url : "<?php echo site_url('employees/update');?>",
              method : "POST",
              data : {id:id, 
                firstname:         firstname,       middlename:       middlename,      lastname:          lastname,
                gender:            gender,          housenumber:      housenumber,     streetname:        streetname,
                barangay:          barangay,        city:             city,             birthdate:        birthdate,
                contactinfo:       contactinfo,     civilstatus:      civilstatus,     citizenship:       citizenship,
                hireddate:         hireddate,       departmentID:     departmentID,    designationID:     designationID,
                detachmentID:      detachmentID,    employeestatus:   employeestatus,   roleDescription:  roleDescription, 
                username:          username,        password:         password,         basicsalary:      basicsalary,    
                dailyrate:         dailyrate,       allowance:        allowance,        tinnumber:        tinnumber,      
                sssnumber:         sssnumber,       philhealthnumber: philhealthnumber, pagibignumber:    pagibignumber,  
                suntimefrom:       suntimefrom,     suntimeto:        suntimeto,        sunrestdays:      sunrestdays,     
                montimefrom:       montimefrom,     montimeto:        montimeto,        monrestday:       monrestday,      
                tuetimefrom:       tuetimefrom,     tuetimeto:        tuetimeto,        tuerestday:       tuerestday,     
                wedtimefrom:       wedtimefrom,     wedtimeto:        wedtimeto,        wedrestday:       wedrestday,     
                thutimefrom:       thutimefrom,     thutimeto:        thutimeto,        thuresday:        thuresday,       
                fritimefrom:       fritimefrom,     fritimeto:        fritimeto,        frirestday:       frirestday,     
                sattimefrom:       sattimefrom,     sattimeto:        sattimeto,        satrestday:       satrestday,      
                clientID:          clientID,        employeetypeid:   employeetypeid,   backaccountname:  backaccountname, 
                backaccountnumber: backaccountnumber,leave:           leave,            totalleave:       totalleave,
                employee:     employee},
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
 });

 

</script>







