  <style>
  a.avatar { cursor: pointer; }
  .custom-file-input{ cursor: pointer; }
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
    
    <thead>
    <tr>
    <th style="width: 100px ! important;">Employee No.</th>
    <th style="width: 220px ! important;">Employee Name</th>
    <th style="width: 150px ! important;">Client</th>
    <th style="width: 100px ! important;">Employee Type</th>
    <th style="width: 110px ! important;">Contact No.</th>
    <th style="width: 110px ! important;">Hired Date</th>
    <th style="width: 50px ! important;">Status</th>
    <th style="width: 30px ! important;">Action</th>
    </tr>
    </thead>
    <tbody id="showdata">
    <?php foreach ($data['employee'] as $item)  { ?>  
    <tr>
    <td><?php echo str_pad($item->employeeID, 6, "0", STR_PAD_LEFT);  ?></td>
    <td>
    <div class="dash-card-content">
    <a id="<?php echo $item->employeeID; ?>" class="avatar">
    <?php 
    if($item->photo==""){
    echo '<img alt="" src="uploads/profileimg.png"></a><p style="margin-left: 10px; color: black;"> '.' '.$item->firstname.' '.$item->lastname.'<br> <span style="color:#888;display: block; font-size: 11px;">'.$item->deptdesc.' | ' .$item->designationdescription.'</span> </p> </div</td>';
    }else{
    echo '<img alt="" src="uploads/'.$item->photo.'" ></a> <div class="dash-card-content"><p style="margin-left: 10px; color: black;">'.' '.$item->firstname.' '.$item->lastname.'<br> <span style="color:#888;display: block; font-size: 11px;">'.$item->deptdesc.' | ' .$item->designationdescription.' </span> </p> </div></div></td>';
    } ?>
    </td> 
    <td>
        <div class="dash-card-content">  
          <p style="color: black;"> <?php echo $item->clientname; ?> <span style="color:#888;display: block; font-size: 11px;"> <?php echo $item->postname; ?> </span></p>   
        </div>
    </td>  
    <td><?php echo $item->employeetypeDesc ?></td>
    <td><?php echo  $item->contactinfo ?></td>
    <td><?php echo date("F d, Y",strtotime($item->hireddate)) ?></td>

    <td>

    <?php if($item->employeestatus=="Active") 
      echo '<span class="badge bg-inverse-success custom-status"><i class="fa fa-dot-circle-o text-success"></i> Active</span>';
    elseif($item->employeestatus=="Terminated")
      echo '<span class="badge bg-inverse-purple custom-status"><i class="fa fa-dot-circle-o text-purple"></i> Terminated</span>';
    elseif($item->employeestatus=="Resigned")
      echo '<span class="badge bg-inverse-danger custom-status"><i class="fa fa-dot-circle-o text-danger"></i> Resigned</span>';
    elseif($item->employeestatus=="End of Contract")
      echo '<span class="badge bg-inverse-info custom-status"><i class="fa fa-dot-circle-o text-info"></i> End of Contract</span>';
    ?>
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
    data-retfund="<?php echo $item->retfund; ?>" 
    data-incentive="<?php echo $item->incentive; ?>" 
    data-uniformallowance="<?php echo $item->uniformallowance; ?>"
    data-bankname="<?php echo $item->bankname; ?>"  
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
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab2" data-toggle="tab">Account</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab3" data-toggle="tab">Payroll</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab4" data-toggle="tab">Leave Balance</a></li>
  <li class="nav-item"><a class="nav-link" href="#bottom-justified-tab5" data-toggle="tab">Restday</a></li>
  </ul>

  <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane show active" id="bottom-justified-tab1">
  <form class="form-group">
  <div class="row">
    <div class="form-group col-sm-6">
    <label for="addemployeetype">Employee Type <span class="text-danger">*</span></label>
    <select class="form-control" name="addemployeetype" id="addemployeetype" description="employee type" required tabindex="1">
    <option value="">No Selected</option>
    <option value="1">Security Guard</option>
    <option value="2">Staff</option>
    </select>
    <div class="invalid-feedback" id="add-employeetype"></div>
    </div>
    <div class="form-group col-sm-6">
    <label for="">Contact No. <span class="text-danger">*</span></label>
    <input id="addcontactinfo" type="text" name="addcontactinfo" class="form-control" minlength=13 autocomplete="off" description="contact no" required tabindex="10">
    <div class="invalid-feedback" id="add-contactinfo"></div>
  </div>
    <div class="form-group col-sm-6">
    <label for="firstname">First Name <span class="text-danger">*</span></label>
    <input id="addfirstname" type="text" name="addfirstname" class="form-control input lettersonly" autocomplete="off" description="first name" required tabindex="1">
    <div class="invalid-feedback" id="add-firstname"></div>
    </div>
    <div class="form-group col-sm-6">
  <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
  <select class="form-control" name="addcivilstatus" id="addcivilstatus" description="civil status" required tabindex="11">
  <option value="">No Selected</option>
  <option>Single</option>
  <option>Married</option>
  </select>
  <div class="invalid-feedback" id="add-civilstatus"></div>
  </div>  
    <div class="form-group col-sm-6">
    <label for="middlename">Middle Name</label>
    <input id="addmiddlename" type="text" name="addmiddlename" class="form-control input lettersonly" autocomplete="off" tabindex="2">
    <div class="invalid-feedback" id="add-middlename"></div>
  </div>
   <div class="form-group col-sm-6">
  <label for="citizenship">Citizenship <span class="text-danger">*</span></label>
  <input id="addcitizenship" type="text" name="addcitizenship" class="form-control input letterswithspace" autocomplete="off" description="citizenship" required tabindex="12">
  <div class="invalid-feedback" id="add-citizenship"></div>
  </div>
    <div class="form-group col-sm-6">
    <label for="lastname">Last Name  <span class="text-danger">*</span></label>
    <input id="addlastname" type="text" name="addlastname" class="form-control input lettersonly" autocomplete="off" description="last name" required tabindex="3">
    <div class="invalid-feedback" id="add-lastname"></div>
    </div>
     <div class="form-group col-sm-6">
  <label for="hireddate">Hired Date  <span class="text-danger">*</span></label>
  <input id="addhireddate"  name="addhireddate" class="form-control datetimepicker" placeholder="dd/mm/yyyy" description="hired date" tabindex="13">
  <div class="invalid-feedback" id="add-hireddate"></div>
  </div>
  <div class="form-group col-sm-6">
  <label for="gender">Gender  <span class="text-danger">*</span></label>
  <select class="form-control" name="addgender" id="addgender" description="gender" required tabindex="4">
  <option value="">No Selected</option>
  <option>Male</option>
  <option>Female</option>
  </select>
  <div class="invalid-feedback" id="add-gender"></div>
  </div>
  <div class="form-group col-sm-6">
  <label for="description">Department <span class="text-danger">*</span></label>
  <select class="form-control" id="adddepartment" name="adddepartment" style="width: 100%;" description="department" required tabindex="14">
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
  <div class="form-group col-sm-6">
  <label for="housenumber">Unit/House No.</label>
  <input id="addhousenumber" type="text" name="addhousenumber" class="form-control input alphanumericwithspace" autocomplete="off" tabindex="5">
  </div>

  <div class="form-group col-sm-6">
  <label for="designation">Designation <span class="text-danger">*</span></label>
  <input type="hidden" id="hiddenDesignation" name="hiddenDesignation">
  <select class="form-control" id="adddesignation" name="adddesignation" style="width: 100%;" description="designation" required tabindex="15">
  <option value="">No Selected</option>
  </select>
  <div class="invalid-feedback" id="add-designation"></div>
  </div>
  <div class="form-group col-sm-6">
  <label for="streetname">Building/Street Name  <span class="text-danger">*</span></label>
  <input id="addstreetname" type="text" name="addstreetname" class="form-control input alphanumericwithspace" autocomplete="off" description="building/street name" required tabindex="6">
  <div class="invalid-feedback" id="add-streetname"></div>
  </div>
   <div class="form-group col-sm-6">
  <label for="adddetachment">Client <span class="text-danger">* </span><span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;"> For security guard only</span></label>
  <select class="form-control" id="addclient" name="addclient" style="width: 100%;" description="client" required tabindex="16">
  <option value="">No Selected</option>
  <?php
  foreach($data['client'] as $client)
  {
  echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
  }
  ?>
  </select>
  <div class="invalid-feedback" id="add-client"></div>
  </div> 
  <div class="form-group col-sm-6">
  <label for="barangay">Barangay  <span class="text-danger">*</span></label>
  <input id="addbarangay" type="text" name="addbarangay" class="form-control input alphanumericwithspace" autocomplete="off" description="barangay" required tabindex="7">
  <div class="invalid-feedback" id="add-barangay"></div>
  </div>
  <div class="form-group col-sm-6">
  <label for="adddetachment">Detachment <span class="text-danger">* </span><span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;"> For security guard only</span></label>
  <select class="form-control" id="adddetachment" name="adddetachment" style="width: 100%;" description="detachment" required tabindex="17">
  <option value="">No Selected</option>
  </select>
  <div class="invalid-feedback" id="add-detachment"></div>
  </div> 
  <div class="form-group col-sm-6">
  <label for="city">City/Municipality  <span class="text-danger">*</span></label>
  <input id="addcity" type="text" name="addcity" class="form-control input alphanumericwithspace" autocomplete="off" description="city/municipality" required tabindex="8">
  <div class="invalid-feedback" id="add-city"></div>
  </div>
    <div class="form-group col-sm-6">
  <label for="addstatus">Status <span class="text-danger">*</span></label>
  <select class="form-control" name="addstatus" id="addstatus" description="status" required tabindex="18">
  <option value="">No Selected</option>
   <option>Active</option>
  <option>Terminated</option>
  <option>End of Contract</option>
  <option>Resigned</option>
  </select>
  <div class="invalid-feedback" id="add-status"></div>
  </div>
  <div class="form-group col-sm-6">
  <label for="birthdate">Birthdate  <span class="text-danger">*</span></label>
  <input id="addbirthdate" name="addbirthdate" class="form-control datetimepicker" placeholder="dd/mm/yyyy" description="birthdate" tabindex="9">
  <div class="invalid-feedback" id="add-birthdate"></div>
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
                          <label for="1addusername">Username <span id="lblusername" name="lblusername" class="text-danger">*</span></label>
                          <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="la la-user"></i></span>
                       </div>

                            <input type="text" class="form-control input alphanumericwithspace" id="addusername" name="addusername" autocomplete="off" description="username" required>
                            <div class="invalid-feedback" id="add-username"></div>
                            </div>
                          <label for="addpassword">Password <span id="lblpassword" name="lblpassword" class="text-danger">*</span></label>
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
                            <span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;">NOTE: Provide username and password if the user is autorized to access the system.</span>
                      </div>
                      </form>
                    </div>

                   <!--  <div class="tab-pane fade" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
                    <div class="tab-pane" id="bottom-justified-tab3">
                      <form class="forms-group">
                        <div class="row">
                           <div class="form-group col-sm-6">
                            <label for="basicsalary">Basic Salary <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                              <input id="addbasicsalary" name="addbasicsalary" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="basic salary" required>
                               <div class="invalid-feedback" id="add-basicsalary"></div>
                            </div>
                           </div>
                           <div class="form-group col-sm-6">
                            <label for="dailyrate">Daily Rate <span class="text-danger">*</span></label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="adddailyrate" name="adddailyrate" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="daily rate" required>
                            <div class="invalid-feedback" id="add-dailyrate"></div>
                           </div>
                          </div>
                           <div class="form-group col-sm-6">
                            <label for="allowance">Allowance</label>
                            <div class="input-group mr-sm-2 mb-sm-0">
                              <div class="input-group-prepend">
                                <span class="input-group-text">₱</span>
                              </div>
                            <input id="addallowance" name="addallowance" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off">
                          </div>
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="allowance">Bank Account Name</label>                       
                            <input id="addbankaccountname" type="text" name="addbankaccountname" class="form-control input letterswithspace" autocomplete="off" description="Bank acount Name" required>
                           <div class="invalid-feedback" id="add-bankaccountname"></div>
                          </div>
                           <div class="form-group col-sm-6">
                            <label for="allowance">Bank Name</label>                       
                             <select class="form-control" id="addbankname" name="addbankname" style="width: 100%;" description="bank account name" required>
                            <option value="">No Selected</option>
                            <?php
                            foreach($data['bank'] as $bank)
                            {
                            echo '<option value="'.$bank->bankID.'">'.$bank->bankname.'</option>';
                            }
                            ?>
                          </select>
                           <div class="invalid-feedback" id="add-bankname"></div>
                          </div>
                           <div class="form-group col-sm-6">
                            <label for="allowance">Bank Account Number</label>
                            <input id="addbackaccountnumber" name="addbackaccountnumber" class="form-control input accountnumber"  autocomplete="off">
                          </div>
                            <div class="form-group col-sm-6">
                            <label for="allowance">Retirement Fund</label>
                            <input id="addretfund" name="addretfund" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="Retirement fund">
                          </div>
                            <div class="form-group col-sm-6">
                            <label for="allowance">Incentives</label>
                            <input id="addincentive" name="addincentive" class="form-control input"  data-inputmask="'alias': 'currency'" autocomplete="off" description="Incentives">
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="allowance">Uniform Allowances</label>
                            <input id="adduniformallowance" name="adduniformallowance" class="form-control input"  data-inputmask="'alias': 'currency'" autocomplete="off" description="Uniform Allowances">
                          </div>
                           <div class="form-group col-sm-6">
                            <label for="tinnumber">TIN</label>
                            <input id="addtinnumber" type="text" name="addtinnumber" class="form-control input" placeholder="000-000-000" minlength=11 autocomplete="off">
                            </div> 
                           <div class="form-group col-sm-6">
                            <label for="sssnumber">SSS No.</label>
                            <input id="addsssnumber" type="text" name="addsssnumber" class="form-control input" placeholder="00-0000000-0"  minlength=12 autocomplete="off">
                           </div>
                           <div class="form-group col-sm-6">
                            <label for="philhealthnumber">Philhealth No.</label>
                            <input id="addphilhealthnumber" type="text" name="addphilhealthnumber" class="form-control input" placeholder="00-000000000-0" minlength=14 autocomplete="off">
                           </div>
                           <div class="form-group col-sm-6">
                            <label for="pagibignumber">Pag-IBIG MID No.</label>
                            <input id="addpagibignumber" type="text" name="addpagibignumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
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
                            <div class="col-sm-12">
                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Monday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Monday" class="check addremoveLater" type="checkbox" value="1">
                                    <label for="add_Monday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>
                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Tuesday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Tuesday" class="check addremoveLater" type="checkbox" value="2">
                                    <label for="add_Tuesday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Wednesday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Wednesday" class="check addremoveLater" type="checkbox" value="3">
                                    <label for="add_Wednesday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Thursday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Thursday" class="check addremoveLater" type="checkbox" value="4">
                                    <label for="add_Thursday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Friday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Friday" class="check addremoveLater" type="checkbox" value="5">
                                    <label for="add_Friday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Saturday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Saturday" class="check addremoveLater" type="checkbox" value="6">
                                    <label for="add_Saturday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Sunday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="add_Sunday" class="check addremoveLater" type="checkbox" value="7">
                                    <label for="add_Sunday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>
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
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editlogin" data-toggle="tab">Account</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editdetail" data-toggle="tab">Payroll</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editleave" data-toggle="tab">Leave Balance</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-justified-editschedule" data-toggle="tab">Restday</a></li>
          </ul>
    <div class="tab-content" id="pills-tabContent">
    <!-- EMPLOYEE INFO -->
    <!--  <div class="tab-pane fade show active" id="pills-infoedit" role="tabpanel" aria-labelledby="pills-info-tab">  -->
    <div class="tab-pane show active" id="bottom-justified-editinfo">
      <div class="form-group">
      <div class="row">
        <div class="form-group col-sm-6">
          <label for="gender">Employee Type <span class="text-danger">*</span></label>
          <select class="form-control " name="editemployeetype" id="editemployeetype" description="employee type" required tabindex="1">
            <option value="">No Selected</option>
            <option value="1">Security Guard</option>
            <option value="2">Staff</option>
          </select>
          <div class="invalid-feedback" id="edit-employeetype"></div>
        </div>
         <div class="form-group col-sm-6">
        <label for="">Contact No. <span class="text-danger">*</span></label>
        <input id="editcontactinfo" type="text" name="editcontactinfo" class="form-control" minlength=13 autocomplete="off" description="contact no." required tabindex="11">
        <div class="invalid-feedback" id="edit-contactinfo"></div>
        </div> 
        <div class="form-group col-sm-6">
        <label for="firstname">First Name <span class="text-danger">*</span></label>
        <input id="editfirstname" type="text" name="editfirstname " class="form-control input lettersonly" autocomplete="off" description="first name" required tabindex="2">
        <div class="invalid-feedback" id="edit-firstname"></div>
        </div> 
         <div class="form-group col-sm-6">
        <label for="civilstatus">Civil Status <span class="text-danger">*</span></label>
        <select class="form-control" name="editcivilstatus" id="editcivilstatus" description="civil status" required tabindex="12">
        <option value="">No Selected</option>
        <option>Single</option>
        <option>Married</option>
        </select>
        <div class="invalid-feedback" id="edit-civilstatus"></div>
        </div>  
        <div class="form-group col-sm-6">
        <label for="middlename">Middle Name</label>
        <input id="editmiddlename" type="text" name="editmiddlename" class="form-control input lettersonly" autocomplete="off" tabindex="3">
        <div class="invalid-feedback" id="edit-middlename"></div>
        </div>
        <div class="form-group col-sm-6">
        <label for="citizenship">Citizenship <span class="text-danger">*</span></label>
        <input id="editcitizenship" type="text" name="editcitizenship" class="form-control input letterswithspace" autocomplete="off" description="citizenship" required tabindex="13">
        <div class="invalid-feedback" id="edit-citizenship"></div>
        </div>
        <div class="form-group col-sm-6">
        <label for="lastname">Last Name <span class="text-danger">*</span></label>
        <input id="editlastname" type="text" name="editlastname" class="form-control input lettersonly" autocomplete="off" description="last name" required tabindex="4">
        <div class="invalid-feedback" id="edit-lastname"></div>
        </div>
        <div class="form-group col-sm-6">
        <label for="hireddate">Hired Date</label>
        <input id="edithireddate" name="edithireddate" class="form-control datetimepicker" tabindex="14">
        <div class="invalid-feedback" id="edit-hireddate"></div>
        </div>
        <div class="form-group col-sm-6">
        <label for="gender">Gender <span class="text-danger">*</span></label>
        <select class="form-control" name="editgender" id="editgender" description="gender" required tabindex="5">
        <option value="">No Selected</option>
        <option>Male</option>
        <option>Female</option>
        </select>
        <div class="invalid-feedback" id="edit-gender"></div>
        </div>
          <div class="form-group col-sm-6">
        <label for="editdepartment">Department <span class="text-danger">*</span></label>
        <select class="form-control" id="editdepartment" name="editdepartment" style="width: 100%;" description="department" required tabindex="15">
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
        <div class="form-group col-sm-6">
        <label for="housenumber">Unit/House No.</label>
        <input id="edithousenumber" type="text" name="edithousenumber" class="form-control input alphanumericwithspace" autocomplete="off" tabindex="6">
      </div>
        <div class="form-group col-sm-6">
          <label for="editdesignation">Designation <span class="text-danger">*</span></label>
          <input type="hidden" id="edithiddenDesignation" name="edithiddenDesignation">
          <select class="form-control" id="editdesignation" name="editdesignation" description="designation" style="width: 100%;" tabindex="16">
          </select>
          <div class="invalid-feedback" id="edit-designation"></div>
          </div>
        <div class="form-group col-sm-6">
        <label for="streetname">Building/Street Name <span class="text-danger">*</span></label>
        <input id="editstreetname" type="text" name="editstreetname" class="form-control input alphanumericwithspace" autocomplete="off" description="building/street name" required tabindex="7">
        <div class="invalid-feedback" id="edit-streetname"></div>
        </div>
    <div class="form-group col-sm-6">
  <label for="editclient">Client <span class="text-danger">* <span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;"> For security guard only</span></span></label>
  <select class="form-control" id="editclient" name="editclient" style="width: 100%;" description="Client" required tabindex="17">
  <option value="">No Selected</option>
  <?php
  foreach($data['client'] as $client)
  {
  echo '<option value="'.$client->clientID.'">'.$client->clientname.'</option>';
  }
  ?>
  </select>
  <div class="invalid-feedback" id="edit-client"></div>
  </div>
        <div class="form-group col-sm-6">
        <label for="barangay">Barangay <span class="text-danger">*</span></label>
        <input id="editbarangay" type="text" name="editbarangay" class="form-control input alphanumericwithspace" autocomplete="off" description="barangay" required tabindex="8">
        <div class="invalid-feedback" id="edit-barangay"></div>
        </div>

        <div class="form-group col-sm-6">
          <label for="editdetachment">Detachment <span class="text-danger">* <span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;"> For security guard only</span></span></label>
           <input type="hidden" id="edithiddenDetachment" name="edithiddenDetachment">
          <select class="form-control" id="editdetachment" name="editdetachment" style="width: 100%;" description="detachment" required tabindex="18">
          </select>
          <div class="invalid-feedback" id="edit-detachment"></div>
        </div> 
        <div class="form-group col-sm-6">
        <label for="city">City/Municipality <span class="text-danger">*</span></label>
        <input id="editcity" type="text" name="editcity" class="form-control input letterswithspace" autocomplete="off" description="city/municipality" required tabindex="9">
        <div class="invalid-feedback" id="edit-city"></div>
        </div>
        
         <div class="form-group col-sm-6">
          <label for="editstatus">Status <span class="text-danger">*</span></label>
          <select class="form-control" name="editstatus" id="editstatus" description="status" required tabindex="19">
          <option value="">No Selected</option>
          <option value="Active">Active</option>
          <option value="Terminated">Terminated</option>
          <option value="End of Contract">End of Contract</option>
          <option value="Resigned">Resigned</option>
          </select>
          <div class="invalid-feedback" id="edit-status"></div>
        </div>
        <div class="form-group col-sm-6">
        <label for="birthdate">Birthdate</label>
        <input id="editbirthdate" name="editbirthdate" class="form-control datetimepicker" tabindex="10">
        <div class="invalid-feedback" id="edit-birthdate"></div>
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
        <label for="editusername">Username <span id="lbleditusername" name="lbleditusername" class="text-danger">*</span></label>
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
          <i class="la la-user"></i></span>
          </div>
          <input type="text" class="form-control input alphanumericwithspace" id="editusername" name="editusername" autocomplete="off" description="username" required>
          <div class="invalid-feedback" id="edit-username"></div>
        </div>
        <label for="editpassword">Password <span id="lbleditpassword" name="lbleditpassword" class="text-danger">*</span></label>
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
          <span class="badge bg-inverse-warning" style="font-size: 11px;font-weight: 500;">NOTE: Provide username and password if the user is autorized to access the system.</span>
      </div>
      </form>
    </div>

  <!-- <div class="tab-pane fade" id="pills-detailedit" role="tabpanel" aria-labelledby="pills-detail-tab"> -->
  <div class="tab-pane" id="bottom-justified-editdetail">
  <form>
    <div class="row">
        <div class="form-group col-sm-6">
        <label for="basicsalary">Basic Salary <span class="text-danger">*</span></label>
        <div class="input-group mr-sm-2 mb-sm-0">
        <div class="input-group-prepend">
        <span class="input-group-text">₱</span>
        </div>
        <input id="editbasicsalary" name="editbasicsalary" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="basic salary" required>
        <div class="invalid-feedback" id="edit-basicsalary"></div>
        </div>
        </div>
      <div class="form-group col-sm-6">
      <label for="dailyrate">Daily Rate <span class="text-danger">*</span></label>
      <div class="input-group mr-sm-2 mb-sm-0">
      <div class="input-group-prepend">
      <span class="input-group-text">₱</span>
      </div>
      <input id="editdailyrate" name="editdailyrate" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="daily rate" required>
      <div class="invalid-feedback" id="edit-dailyrate"></div>
      </div>
      </div> 
      <div class="form-group col-sm-6">
      <label for="allowance">Allowance</label>
      <div class="input-group mr-sm-2 mb-sm-0">
      <div class="input-group-prepend">
      <span class="input-group-text">₱</span>
      </div>
      <input id="editallowance" name="editallowance" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off">
      </div>
      </div>
    <div class="form-group col-sm-6">
    <label for="allowance">Bank Account Name</label>                       
      <input id="editbackaccountname" type="text" name="editbackaccountname" class="form-control input letterswithspace" autocomplete="off" description="Bank acount Name" required>
      <div class="invalid-feedback" id="edit-bankaccountname"></div>
    </div>
    <div class="form-group col-sm-6">
      <label for="allowance">Bank Name</label>                       
       <select class="form-control" id="editbankname" name="editbankname" style="width: 100%;" description="Client" required>
        <option value="">No Selected</option>
        <?php
        foreach($data['bank'] as $bank)
        {
        echo '<option value="'.$bank->bankID.'">'.$bank->bankname.'</option>';
        }
        ?>
      </select>
        <div class="invalid-feedback" id="edit-bankname"></div>
    </div>
    <div class="form-group col-sm-6">
      <label for="allowance">Bank Account Number</label>
      <input id="editbackaccountnumber" name="editbackaccountnumber" class="form-control input"  autocomplete="off">
      <div class="invalid-feedback" id="edit-backaccountnumber"></div>
    </div>
        <div class="form-group col-sm-6">
        <label for="allowance">Retirment Fund</label>
        <input id="editretfund" name="editretfund" class="form-control input" data-inputmask="'alias': 'currency'" autocomplete="off" description="Retirement fund">
        </div>
        <div class="form-group col-sm-6">
        <label for="allowance">Incentives</label>
        <input id="editincentive" name="editincentive" class="form-control input"  data-inputmask="'alias': 'currency'" autocomplete="off" description="Incentives">
      </div>
      <div class="form-group col-sm-6">
        <label for="allowance">Uniform Allowances</label>
        <input id="edituniformallowance" name="edituniformallowance" class="form-control input"  data-inputmask="'alias': 'currency'" autocomplete="off" description="Uniform Allowances">
      </div>
      <div class="form-group col-sm-6">
      <label for="tinnumber">TIN</label>
      <input id="edittinnumber" type="text" name="edittinnumber" class="form-control input" placeholder="000-000-000" minlength=11 autocomplete="off">
      </div>
      <div class="form-group col-sm-6">
      <label for="sssnumber">SSS No.</label>
      <input id="editsssnumber" type="text" name="editsssnumber" class="form-control input" placeholder="00-0000000-0" minlength=12 autocomplete="off">
      </div>
      <div class="form-group col-sm-6">
      <label for="philhealthnumber">Philhealth No.</label>
      <input id="editphilhealthnumber" type="text" name="editphilhealthnumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
      </div>
      <div class="form-group col-sm-6">
      <label for="pagibignumber">Pag-IBIG MID No.</label>
      <input id="editpagibignumber" type="text" name="editpagibignumber" class="form-control input" placeholder="0000-0000-0000" minlength=14 autocomplete="off">
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
                            <div class="col-sm-12">
                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Monday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Monday" class="check editremoveLater" type="checkbox" value="1">
                                    <label for="edit_Monday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>
                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Tuesday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Tuesday" class="check editremoveLater" type="checkbox" value="2">
                                    <label for="edit_Tuesday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Wednesday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Wednesday" class="check editremoveLater" type="checkbox" value="3">
                                    <label for="edit_Wednesday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Thursday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Thursday" class="check editremoveLater" type="checkbox" value="4">
                                    <label for="edit_Thursday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Friday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Friday" class="check editremoveLater" type="checkbox" value="5">
                                    <label for="edit_Friday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Saturday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Saturday" class="check editremoveLater" type="checkbox" value="6">
                                    <label for="edit_Saturday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>

                            <ul class="list-group notification-list" style="margin-bottom:5px;">
                              <li class="list-group-item">
                                  Sunday               
                                  <div class="status-toggle">
                                    <input name="selector[]" id="edit_Sunday" class="check editremoveLater" type="checkbox" value="7">
                                    <label for="edit_Sunday" class="checktoggle">checkbox</label>
                                </div>
                              </li>
                            </ul>
                          </div>
              </form>
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
  </div>
  <!-- /Edit Employee Modal -->
  <!-- upload picture  -->
<div class="modal custom-modal fade" id="uploadpicture" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
    <form id="commentForm" method="post" enctype="multipart/form-data" action="<?php echo site_url('Uploadphoto/do_upload'); ?>">
    <div class="modal-content modal-upload">
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
      <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/png,image/jpeg" required="">
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
<span><?php if($this->session->flashdata('img')=="error") echo '<script type="text/javascript"> showUploadPhotoError() </script>';?></span>
<span><?php if($this->session->flashdata('photoupload')=="upload") echo '<script type="text/javascript"> showPhotoToast() </script>';?></span>
<span><?php if($this->session->flashdata('empstatus')=="empsuccess") echo '<script type="text/javascript"> showdataSuccessToast() </script>';?></span>
<?php 
  if($this->session->flashdata('success')!=""){
    echo '<script type="text/javascript"> showSuccessToast("'.$this->session->flashdata("success").'")</script>';
  }
?>
<!-- /Page Wrapper -->
<script  type="text/javascript"> 
var restdayid =[];
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

  $(document).ready(function(){

    $('#photo').change(function(){
      var name = document.getElementById('photo'); 
      $(".custom-file-label").text(name.files.item(0).name);
    });

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
      $("#addemployeetype").focus(); 
    });

  $('#add_employee').on('show.bs.modal', function(){  
      $('#addtabs li:eq(0) a').tab('show');
      $("#addemployeetype").trigger("change");
  });

  $('#edit_employee').on('shown.bs.modal', function(){
      $("#editemployeetype").focus(); 
  });

  $('#edit_employee').on('show.bs.modal', function(){
      $('#edittabs li:eq(0) a').tab('show');
      var employeetype = $("#editemployeetype").val();

      if(employeetype==1){
         $("#lbleditusername").hide();
         $("#lbleditpassword").hide();
         $("#editclient").prop("disabled", false);
         $("#editdetachment").prop("disabled", false);

      }else{
        $("#editdetachment").val($("#editdetachment option:first").val());
        $("#lbleditusername").show();
        $("#lbleditpassword").show();
        $("#editclient").prop("disabled", true);
        $("#editdetachment").prop("disabled", true);
      }
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
         $("#lblusername").hide();
         $("#lblpassword").hide();
         $("#addclient").prop("disabled", false);
         $("#adddetachment").prop("disabled", false);

      }else{
         $("#lblusername").show();
         $("#lblpassword").show();
        $("#addclient").prop("disabled", true);
        $("#adddetachment").prop("disabled", true);
      }

  });
     //dropdown department ADD //
  $('#editemployeetype').change(function(){
    var employeetype = $(this).val();
    $("#editclient").prop("selectedIndex", 0);
    $("#editdetachment").val($("#editdetachment option:first").val());
      if(employeetype==1){
         $("#lbleditusername").hide();
         $("#lbleditpassword").hide();
         $("#editclient").prop("disabled", false);
         $("#editdetachment").prop("disabled", false);

      }else{
        $("#lbleditusername").show();
        $("#lbleditpassword").show();
        $("#editclient").prop("disabled", true);
        $("#editdetachment").prop("disabled", true);
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
        html += '<option value="">No Selected</option>';
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
        html += '<option value="">No Selected</option>';
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
    if(id!=null){
      $.ajax({
        url : "<?php echo site_url('Employees/get_client');?>",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
          var html = '';
          var i;
          html += '<option value="">No Selected</option>';
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
    }else{
        var html = '<option value="">No Selected</option>';
        $('#editdetachment').html(html);

      $("#editclient").prop("selectedIndex", 0);
      $("#editdetachment").val($("#editdetachment option:first").val());
    }
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

              html += '<option value="">No Selected</option>';
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
         $(this).find('form')[3].reset();

        $("#edittable_alterations_tbody").html("");
        $(".invalid-feedback").html("");
          $('input').removeClass('is-invalid');
          $('input').removeClass('is-valid');
          $('select').removeClass('is-invalid');
          $('select').removeClass('is-valid');
          $('checkbox').removeClass('is-invalid');
          $('checkbox').removeClass('is-valid');
          
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
      var employeetype  = $("#addemployeetype").val();
      var firstname     = $("#addfirstname").val();
      var lastname      = $("#addlastname").val();
      var streetname    = $("#addstreetname").val();
      var barangay      = $("#addbarangay").val();
      var city          = $("#addcity").val();
      var citizenship   = $("#addcitizenship").val();
      var middlename    = $("#addmiddlename").val();
      var basicsalary   = $("#addbasicsalary").val();
      var dailyrate     = $("#adddailyrate").val();
      var phone         = $("#addcontactinfo").val();

      /* 
         0 = addemployeetype         1 = addfirstname        2 = addmiddlename         3 = addlastname            4 = addgender           5 = addhousenumber
         6 = addstreetname           7 = addbarangay         8 = addcity               9 = addbirthdate          10 = addcontactinfo     11 = addcivilstatus
         12 = addcitizenship        13 = addhireddate       14 = adddepartment        15 = adddesignation        16 = addclient          17 = adddetachment
         18 = addstatus             19 = addrole            20 = addusername          21 = addpassword           22 = addbasicsalary     23 = adddailyrate 
         24 = addallowance          25 = addretfund         26 = addincentive         27 = adduniformallowance   28 = addtinnumber       29 = addsssnumber
         30 = addphilhealthnumber   31 = addpagibignumber   32 = addbankaccountname   33 = addbackaccountnumber  34 = addbankname
      */
      
      var IDArray = ['#addemployeetype','#addfirstname', '#addmiddlename', '#addlastname', '#addgender', '#addhousenumber',
                    '#addstreetname', '#addbarangay', '#addcity', '#addbirthdate', '#addcontactinfo',
                    '#addcivilstatus', '#addcitizenship', '#addhireddate', '#adddepartment', '#adddesignation',
                    '#addclient', '#adddetachment', '#addstatus', '#addrole', '#addusername', 
                    '#addpassword', '#addbasicsalary', '#adddailyrate', '#addallowance', '#addretfund',
                    '#addincentive', '#adduniformallowance', '#addtinnumber', '#addsssnumber', '#addphilhealthnumber',  
                    '#addpagibignumber', '#addbankaccountname', '#addbackaccountnumber','#addbankname'];

      var ErrorIDArray = ['add-employeetype','add-firstname', 'add-middlename', 'add-lastname', 'add-gender', 'add-housenumber',
                          'add-streetname', 'add-barangay', 'add-city', 'add-birthdate', 'add-contactinfo',
                          'add-civilstatus', 'add-citizenship', 'add-hireddate', 'add-department', 'add-designation',
                          'add-client','add-detachment', 'add-status', 'add-role', 'add-username',  
                          'add-password', 'add-basicsalary', 'add-dailyrate', 'add-allowance', 'add-retfund', 
                          'add-incentive', 'add-uniformallowance', 'add-tinnumber', 'add-sssnumber', 'add-philhealthnumber',  
                          'add-pagibignumber', 'add-backaccountname', 'add-backaccountnumber','add-bankname'];

      var ValueArray = [];
      var firstRequired = "";
      var navIndex = 0;

      for(var i=0;i<IDArray.length;i++){
          ValueArray[i] = $(IDArray[i]).val().trim();
          if(employeetype==1){
            if(i==2 || i==5 || i==20 || i==21 || i==24 || i==25 || i==26 || i==27 || i==28 || i==29 || i==30  || i==31 || i==32 || i==33 || i==34) continue;
          }else{
            if(i==2 || i==5 || i==16 || i==17 || i==20 || i==21 ||  i==24 || i==25 || i==26 || i==27 || i==28 || i==29 || i==30  || i==31 || i==32 || i==33 || i==34) continue;
          }

          if(i==10){
            if($(IDArray[i]).val().length<13){
               if(firstRequired==""){
                  firstRequired = IDArray[i];

                       if(i<=18) navIndex = 0;
                  else if(i<=21) navIndex = 1;
                  else if(i<=34) navIndex = 2;
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Mobile number must be 11 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
            }
          }else if(i==22 || i==23){
            if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.0000" || editbasicsalary < editdailyrate){
                if(firstRequired==""){
                    firstRequired = IDArray[i];

                         if(i<=18) navIndex = 0;
                    else if(i<=21) navIndex = 1;
                    else if(i<=34) navIndex = 2;
                };

                document.getElementById(ErrorIDArray[i]).innerHTML = "Invalid input  " + $(IDArray[i]).attr("description") +".";
                $(IDArray[i]).addClass('is-invalid');
                $('#addtabs li:eq(2) a').tab('show');
                $("#adddailyrate").focus();
            }else{
                document.getElementById(ErrorIDArray[i]).innerHTML = "";
                $(IDArray[i]).removeClass('is-invalid');
                $(IDArray[i]).addClass('is-valid');
                event.preventDefault();
            }
          }else{
            if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
                if(firstRequired==""){
                    firstRequired = IDArray[i];

                         if(i<=18) navIndex = 0;
                    else if(i<=21) navIndex = 1;
                    else if(i<=34) navIndex = 2;
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
        $('#add_employee').hide();
        $('#confirmation_add').modal({backdrop: 'static', keyboard: false},'show');
        event.preventDefault(); 
        return false;
      } 
  });

      $("#cncl-add").unbind('click').bind('click', function(){
        $('#confirmation_add').modal('hide');
        $('#add_employee').show()

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

        var restdayresult = [];
        $('input.addremoveLater:checked').map(function() {
        restdayresult.push($(this).val());
        });

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
        var basicsalary       =   $("#addbasicsalary").val().replace(",","");
        var dailyrate         =   $("#adddailyrate").val().replace(",","");
        var allowance         =   $("#addallowance").val().replace(",","");
        var retfund           =   $("#addretfund").val().replace(",","");
        var incentive         =   $("#addincentive").val().replace(",","");
        var uniformallowance  =   $("#adduniformallowance").val().replace(",","");
        var tinnumber         =   $("#addtinnumber").val();
        var sssnumber         =   $("#addsssnumber").val();
        var philhealthnumber  =   $("#addphilhealthnumber").val();
        var pagibignumber     =   $("#addpagibignumber").val();
        var clientID          =   $("#addclient").val();
        var employeetypeid    =   $("#addemployeetype").val();
        var backaccountname   =   $("#addbankaccountname").val();
        var backaccountnumber =    $("#addbackaccountnumber").val();
        var bankname          =    $("#addbankname").val();
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
                dailyrate:         dailyrate,       allowance:        allowance,        retfund:          retfund,    
                incentive:         incentive,       uniformallowance: uniformallowance, tinnumber:        tinnumber,              
                sssnumber:         sssnumber,       philhealthnumber: philhealthnumber, pagibignumber:    pagibignumber,             
                clientID:         clientID,         employeetypeid:   employeetypeid,   backaccountname:  backaccountname,             
                backaccountnumber: backaccountnumber,leave:            leave,            totalleave:       totalleave,       
                restdayresult:     restdayresult,   bankname:          bankname},
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
        $('#confirmation_add').modal('hide');
        $('#add_employee').show();
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

   

  // end SAVE employee 
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
    $(".modal-body #edithireddate").val($(this).data('hireddate'));
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
    $(".modal-body #editretfund").val( $(this).data('retfund'));
    $(".modal-body #editincentive").val( $(this).data('incentive'));
    $(".modal-body #edituniformallowance").val( $(this).data('uniformallowance'))
     $(".modal-body #editbankname").val( $(this).data('bankname'));
    $(".modal-body #editbackaccountname").val( $(this).data('backaccountname'));
    $(".modal-body #editbackaccountnumber").val( $(this).data('backaccountnumber'));
    $(".modal-body #edittinnumber").val( $(this).data('tinnumber'));
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
               var restday = response[i].restday;
               restdayid[i] = response[i].restday;
             if (restday == 1){
              $("#edit_Monday").prop("checked", true);
            };
            if (restday == 2){
             $("#edit_Tuesday").prop("checked", true);
            };
            if (restday == 3){
             $("#edit_Wednesday").prop("checked", true);
            };
            if (restday == 4){
             $("#edit_Thursday").prop("checked", true);
            };
            if (restday == 5){
             $("#edit_Friday").prop("checked", true);
            };
            if (restday == 6){
             $("#edit_Saturday").prop("checked", true);
            };
            if (restday == 7){
              $("#edit_Sunday").prop("checked", true);
            };
       
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

    /* 
       0 = editemployeetype         1 = editfirstname        2 = editmiddlename         3 = editlastname            4 = editgender           5 = edithousenumber
       6 = editstreetname           7 = editbarangay         8 = editcity               9 = editbirthdate          10 = editcontactinfo     11 = editcivilstatus
       12 = editcitizenship        13 = edithireddate       14 = editdepartment        15 = editdesignation        16 = editclient          17 = editdetachment
       18 = editstatus             19 = editrole            20 = editusername          21 = editpassword           22 = editbasicsalary     23 = editdailyrate 
       24 = editallowance          25 = editretfund         26 = editincentive         27 = edituniformallowance   28 = edittinnumber       29 = editsssnumber
       30 = editphilhealthnumber   31 = editpagibignumber   32 = editbankaccountname   33 = editbackaccountnumber  34 = editbankname
    */

     var IDArray = ['#editemployeetype','#editfirstname', '#editmiddlename', '#editlastname', '#editgender', '#edithousenumber',
                   '#editstreetname', '#editbarangay', '#editcity', '#editbirthdate', '#editcontactinfo',
                   '#editcivilstatus', '#editcitizenship', '#edithireddate', '#editdepartment', '#editdesignation',
                   '#editclient',  '#editdetachment', '#editstatus', '#editrole', '#editusername', 
                   '#editpassword', '#editbasicsalary', '#editdailyrate', '#editallowance','#editretfund', 
                   '#editincentive', '#edituniformallowance', '#edittinnumber',  '#editsssnumber','#editphilhealthnumber',
                   '#editpagibignumber',  '#editbackaccountname','#editbackaccountnumber','#editbankname'];

    var ErrorIDArray = ['edit-employeetype','edit-firstname', 'edit-middlename', 'edit-lastname', 'edit-gender', 'edit-housenumber',
                        'edit-streetname', 'edit-barangay', 'edit-city', 'edit-birthdate', 'edit-contactinfo',
                        'edit-civilstatus', 'edit-citizenship', 'edit-hireddate', 'edit-department', 'edit-designation',
                        'edit-client','edit-detachment', 'edit-status', 'edit-role', 'edit-username',  
                        'edit-password','edit-basicsalary', 'edit-dailyrate', 'edit-allowance', 'edit-retfund', 
                        'edit-incentive', 'edit-uniformallowance', 'edit-tinnumber',  'edit-sssnumber', 'edit-philhealthnumber',
                        'edit-pagibignumber', 'edit-backaccountname', 'edit-backaccountnumber','edit-backaccountnumber','edit-bankname'];

      var ValueArray = [];
      var firstRequired = "";
      var navIndex = 0;

      var employeetype = $("#editemployeetype").val();

      for(var i=0;i<IDArray.length;i++){
          
          if(employeetype==1){
            if(i==2 || i==5 || i==20 || i==21 || i==24 || i==25 || i==26 || i==27 || i==28 || i==29 || i==30  || i==31 || i==32 || i==33 || i==34) continue;
          }else{
            if(i==2 || i==5 || i==16 || i==17 || i==20 || i==21 ||  i==24 || i==25 || i==26 || i==27 || i==28 || i==29 || i==30  || i==31 || i==32 || i==33 || i==34) continue;
          }

          ValueArray[i] = $(IDArray[i]).val().trim();

          if(i==10){
            if($(IDArray[i]).val().length<13){
               if(firstRequired==""){
                  firstRequired = IDArray[i];

                       if(i<=18) navIndex = 0;
                  else if(i<=21) navIndex = 1;
                  else if(i<=34) navIndex = 2;
              };

              document.getElementById(ErrorIDArray[i]).innerHTML = "Mobile number must be 11 digit ";
              $(IDArray[i]).addClass('is-invalid');
            }else{
              document.getElementById(ErrorIDArray[i]).innerHTML = "";
              $(IDArray[i]).removeClass('is-invalid');
              $(IDArray[i]).addClass('is-valid');
              event.preventDefault();
            }
          }else if(i==22 || i==23){
            if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.0000"){
                if(firstRequired==""){
                    firstRequired = IDArray[i];

                         if(i<=18) navIndex = 0;
                    else if(i<=21) navIndex = 1;
                    else if(i<=34) navIndex = 2;
                };

                document.getElementById(ErrorIDArray[i]).innerHTML = "Invalid input  " + $(IDArray[i]).attr("description") +".";
                $(IDArray[i]).addClass('is-invalid');
                $('#edittabs li:eq(2) a').tab('show');
                $("#editdailyrate").focus();
            }else{
                document.getElementById(ErrorIDArray[i]).innerHTML = "";
                $(IDArray[i]).removeClass('is-invalid');
                $(IDArray[i]).addClass('is-valid');
                event.preventDefault();
            }
          }else{
            if($(IDArray[i]).val().trim()=="" || $(IDArray[i]).val().trim()=="0.00"){
                if(firstRequired==""){
                    firstRequired = IDArray[i];

                         if(i<=18) navIndex = 0;
                    else if(i<=21) navIndex = 1;
                    else if(i<=34) navIndex = 2;
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

      $('#edittabs li:eq('+navIndex+') a').tab('show');
      $(firstRequired).focus();
      if(firstRequired==""){
        $('#edit_employee').hide();
        $('#confirmation_edit').modal({backdrop: 'static', keyboard: false},'show');
        event.preventDefault(); 
        return false;
      } 

        $('.modal-body #edittabs li:eq('+navIndex+') a').tab('show');
        $(firstRequired).focus();
        if(firstRequired==""){
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
        var id    =   $(this).attr('id');
        var leave = [];  
        var employee      = [];
        var restdayresult = [];

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
        $('input.editremoveLater:checked').map(function() {
          restdayresult.push($(this).val());
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
        var basicsalary       =   $("#editbasicsalary").val().replace(",","");
        var dailyrate         =   $("#editdailyrate").val().replace(",","");
        var allowance         =   $("#editallowance").val().replace(",","");
        var retfund           =   $("#editretfund").val().replace(",","");
        var incentive         =   $("#editincentive").val().replace(",","");
        var uniformallowance  =   $("#edituniformallowance").val().replace(",","");
        var tinnumber         =   $("#edittinnumber").val();
        var sssnumber         =   $("#editsssnumber").val();
        var philhealthnumber  =   $("#editphilhealthnumber").val();
        var pagibignumber     =   $("#editpagibignumber").val();
        var clientID          =   $("#editclient").val();
        var employeetypeid    =   $("#editemployeetype").val();
        var bankname          =   $("#editbankname").val();
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
                dailyrate:         dailyrate,       allowance:        allowance,        retfund:          retfund,    
                incentive:         incentive,       uniformallowance: uniformallowance, tinnumber:        tinnumber,      
                sssnumber:         sssnumber,       philhealthnumber: philhealthnumber, pagibignumber:    pagibignumber,       
                clientID:          clientID,        employeetypeid:   employeetypeid,   backaccountname:  backaccountname, 
                backaccountnumber: backaccountnumber,leave:           leave,            totalleave:       totalleave,
                employee:          employee,        restdayresult:    restdayresult,    bankname:          bankname},
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
                    $('#confirmation_edit').modal('hide');
                    $('#edit_employee').show();
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







