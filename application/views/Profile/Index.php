<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
    <div class="content container-fluid">
		<div class="loader"></div>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>Dashboard">Dashboard</a></li>
						<li class="breadcrumb-item active">Profile</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		<div class="row mr-1 ml-1">
		
		<div class="card mb-0 col-md-6">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="profile-view">
							<div class="profile-img-wrap">
								<div class="profile-img">
									<?php if($this->session->userdata('photo')==""){
					                      echo '<img src="uploads/profileimg.png" alt=""/>';
					                    }else{
					                      echo '<img src="uploads/'.$this->session->userdata('photo').'" alt=""/>';
					                    }
					                ?>
								</div>
							</div>
							<div class="profile-basic">
								<div class="row">
									<div class="col-md-12">
										<div class="profile-info">
											<h3 class="user-name m-t-0 mb-1"><?php echo $this->session->userdata('firstname').' '.$this->session->userdata('lastname'); ?></h3>
											<h6 class="text-muted mb-0"><?php echo $this->session->userdata('designationdescription'); ?> | <?php echo $this->session->userdata('description'); ?></h6>
											<div class="staff-id">Employee ID : <?php echo str_pad($this->session->userdata('employeeID'), 6, "0", STR_PAD_LEFT); ?></div>
											<div class="medium doj text-muted">Date of Join : <?php echo date("F d, Y",strtotime($this->session->userdata('hireddate'))); ?></div>
											<!-- <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send Message</a></div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card mb-0 col-md-6">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<section>
							<h5 class="dash-title">Remaining Leaves</h5>
							<div class="time-list">
								<div class="dash-stats-list">
									<?php foreach ($data['sick'] as $item) { ?>
										<h4><?php echo $item->totalleave; ?></h4>
										<!-- <?php if($item->remainingleave=="") 
												echo "<h4>$item->totalleave</h4>";
									    	?> -->
									<?php } ?>
									<p>Sick Leave</p>
								</div>
								<div class="dash-stats-list">
									<?php foreach ($data['vacation'] as $item) { ?>
										<h4><?php echo $item->totalleave; ?></h4>
										<!-- <?php if($item->remainingleave=="") 
												echo "<h4>$item->totalleave</h4>";
									    	?> -->
									<?php } ?>
									<p>Vacation Leave</p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>

		</div>
		
		<div class="card tab-box mt-2">
			<div class="row user-tabs">
				<div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
						<li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Payroll Information</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="tab-content">
		
			<!-- Profile Info Tab -->
			<div id="emp_profile" class="pro-overview tab-pane fade show active">

				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Personal Informations </h3>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-view">
									<div>
										<div class="row">
											<div class="col-md-6">
												<ul class="personal-info">
													<li>
														<div class="title">Status:</div>
														<div class="text"><?php echo $this->session->userdata('employeestatus'); ?></div>
													</li>
													<li>
														<div class="title">Address:</div>
														<div class="text"><?php echo $this->session->userdata('ehousenumber').' '.$this->session->userdata('estreetname').' '.$this->session->userdata('ebarangay').' '.$this->session->userdata('ecity'); ?></div>
													</li>
													<li>
														<div class="title">Contact Number:</div>
														<div class="text"><?php echo $this->session->userdata('contactinfo'); ?></div>
													</li>
													<li>
														<div class="title">Gender:</div>
														<div class="text"><?php echo $this->session->userdata('gender'); ?></div>
													</li>
												</ul>
											</div>
											<div class="col-md-6">
												<ul class="personal-info">
													<li>
														<div class="title">Civil Status:</div>
														<div class="text"><?php echo $this->session->userdata('civilstatus'); ?></div>
													</li>
													<li>
														<div class="title">Citizenship:</div>
														<div class="text"><?php echo $this->session->userdata('citizenship'); ?></div>
													</li>
													<li>
														<div class="title">Birthdate:</div>
														<div class="text"><?php echo date("F d, Y",strtotime($this->session->userdata('birthdate'))); ?></div>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Profile Info Tab -->
			
			<!-- Projects Tab -->
			<div id="emp_projects" class="pro-overview tab-pane fade show">
				<div class="row">
					<div class="col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<h3 class="card-title">Payroll Informations</h3>
								<ul class="personal-info">
									<li>
										<div class="title">Basic Salary</div>
										<div class="text" style="text-align: right;">₱<?php echo $this->session->userdata('basicsalary'); ?></div>
									</li>
									<li>
										<div class="title">Daily Rate</div>
										<div class="text" style="text-align: right;">₱<?php echo $this->session->userdata('dailyrate'); ?></div>
									</li>
									<li>
										<div class="title">Allowance</div>
										<div class="text" style="text-align: right;">₱<?php echo $this->session->userdata('allowance'); ?></div>
									</li>
									<!-- <li>
										<div class="title">Nationality</div>
										<div class="text">Indian</div>
									</li>
									<li>
										<div class="title">Religion</div>
										<div class="text">Christian</div>
									</li>
									<li>
										<div class="title">Marital status</div>
										<div class="text">Married</div>
									</li>
									<li>
										<div class="title">Employment of spouse</div>
										<div class="text">No</div>
									</li>
									<li>
										<div class="title">No. of children</div>
										<div class="text">2</div>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex">
						<div class="card flex-fill">
							<div class="card-body">
								<h3 class="card-title">Payroll Informations</h3>
								<ul class="personal-info">
									<li>
										<div class="title">TIN</div>
										<div class="text"><?php echo $this->session->userdata('tinnumber'); ?></div>
									</li>
									<li>
										<div class="title">SSS No.</div>
										<div class="text"><?php echo $this->session->userdata('sssnumber'); ?></div>
									</li>
									<li>
										<div class="title">PhilHealth No.</div>
										<div class="text"><?php echo $this->session->userdata('philhealthnumber'); ?></div>
									</li>
									<li>
										<div class="title">Pag-IBIG MID No.</div>
										<div class="text"><?php echo $this->session->userdata('pagibignumber'); ?></div>
									</li>
									<!-- <li>
										<div class="title">Marital status</div>
										<div class="text">Married</div>
									</li>
									<li>
										<div class="title">Employment of spouse</div>
										<div class="text">No</div>
									</li>
									<li>
										<div class="title">No. of children</div>
										<div class="text">2</div>
									</li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!-- /Projects Tab -->
			
			<!-- Bank Statutory Tab -->
			<!-- <div class="tab-pane fade" id="bank_statutory">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title"> Basic Salary Information</h3>
						<form>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select salary basis type</option>
											<option>Hourly</option>
											<option>Daily</option>
											<option>Weekly</option>
											<option>Monthly</option>
										</select>
								   </div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">$</span>
											</div>
											<input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Payment type</label>
										<select class="select">
											<option>Select payment type</option>
											<option>Bank transfer</option>
											<option>Check</option>
											<option>Cash</option>
										</select>
								   </div>
								</div>
							</div>
							<hr>
							<h3 class="card-title"> PF Information</h3>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">PF contribution</label>
										<select class="select">
											<option>Select PF contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">PF No. <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select PF contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Employee PF rate</label>
										<select class="select">
											<option>Select PF contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select additional rate</option>
											<option>0%</option>
											<option>1%</option>
											<option>2%</option>
											<option>3%</option>
											<option>4%</option>
											<option>5%</option>
											<option>6%</option>
											<option>7%</option>
											<option>8%</option>
											<option>9%</option>
											<option>10%</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Total rate</label>
										<input type="text" class="form-control" placeholder="N/A" value="11%">
									</div>
								</div>
						   </div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Employee PF rate</label>
										<select class="select">
											<option>Select PF contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select additional rate</option>
											<option>0%</option>
											<option>1%</option>
											<option>2%</option>
											<option>3%</option>
											<option>4%</option>
											<option>5%</option>
											<option>6%</option>
											<option>7%</option>
											<option>8%</option>
											<option>9%</option>
											<option>10%</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Total rate</label>
										<input type="text" class="form-control" placeholder="N/A" value="11%">
									</div>
								</div>
							</div>
							
							<hr>
							<h3 class="card-title"> ESI Information</h3>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">ESI contribution</label>
										<select class="select">
											<option>Select ESI contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select ESI contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Employee ESI rate</label>
										<select class="select">
											<option>Select ESI contribution</option>
											<option>Yes</option>
											<option>No</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
										<select class="select">
											<option>Select additional rate</option>
											<option>0%</option>
											<option>1%</option>
											<option>2%</option>
											<option>3%</option>
											<option>4%</option>
											<option>5%</option>
											<option>6%</option>
											<option>7%</option>
											<option>8%</option>
											<option>9%</option>
											<option>10%</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="col-form-label">Total rate</label>
										<input type="text" class="form-control" placeholder="N/A" value="11%">
									</div>
								</div>
						   </div>
							
							<div class="submit-section">
								<button class="btn btn-primary submit-btn" type="submit">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div> -->
			<!-- /Bank Statutory Tab -->
			
		</div>
    </div>
	<!-- /Page Content -->
	
	<!-- Profile Modal -->
	<div id="profile_info" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Profile Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap edit-img">
									<img class="inline-block" src="<?php echo base_url();?>pages\assets\img\profiles\avatar-02.jpg" alt="user">
									<div class="fileupload btn">
										<span class="btn-text">edit</span>
										<input class="upload" type="file">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" value="John">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" value="Doe">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Birth Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text" value="05/06/1985">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Gender</label>
											<select class="select form-control">
												<option value="male selected">Male</option>
												<option value="female">Female</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" value="4487 Snowbird Lane">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>State</label>
									<input type="text" class="form-control" value="New York">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Country</label>
									<input type="text" class="form-control" value="United States">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Pin Code</label>
									<input type="text" class="form-control" value="10523">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" class="form-control" value="631-889-3206">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Department <span class="text-danger">*</span></label>
									<select class="select">
										<option>Select Department</option>
										<option>Web Development</option>
										<option>IT Management</option>
										<option>Marketing</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation <span class="text-danger">*</span></label>
									<select class="select">
										<option>Select Designation</option>
										<option>Web Designer</option>
										<option>Web Developer</option>
										<option>Android Developer</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Reports To <span class="text-danger">*</span></label>
									<select class="select">
										<option>-</option>
										<option>Wilmer Deluna</option>
										<option>Lesley Grauer</option>
										<option>Jeffery Lalor</option>
									</select>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Profile Modal -->
	
	<!-- Personal Info Modal -->
	<div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personal Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Passport No</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Passport Expiry Date</label>
									<div class="cal-icon">
										<input class="form-control datetimepicker" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tel</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nationality <span class="text-danger">*</span></label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Religion</label>
									<div class="cal-icon">
										<input class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Marital status <span class="text-danger">*</span></label>
									<select class="select form-control">
										<option>-</option>
										<option>Single</option>
										<option>Married</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Employment of spouse</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>No. of children </label>
									<input class="form-control" type="text">
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Personal Info Modal -->
	
	<!-- Family Info Modal -->
	<div id="family_info_modal" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> Family Informations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Relationship <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of birth <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Relationship <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Date of birth <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone <span class="text-danger">*</span></label>
												<input class="form-control" type="text">
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Family Info Modal -->
	
	<!-- Emergency Contact Modal -->
	<div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personal Information</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Primary Contact</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Relationship <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone 2</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Primary Contact</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Relationship <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone 2</label>
											<input class="form-control" type="text">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Emergency Contact Modal -->
	
	<!-- Education Modal -->
	<div id="education_info" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"> Education Informations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Oxford University" class="form-control floating">
												<label class="focus-label">Institution</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Computer Science" class="form-control floating">
												<label class="focus-label">Subject</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<div class="cal-icon">
													<input type="text" value="01/06/2002" class="form-control floating datetimepicker">
												</div>
												<label class="focus-label">Starting Date</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<div class="cal-icon">
													<input type="text" value="31/05/2006" class="form-control floating datetimepicker">
												</div>
												<label class="focus-label">Complete Date</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="BE Computer Science" class="form-control floating">
												<label class="focus-label">Degree</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Grade A" class="form-control floating">
												<label class="focus-label">Grade</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Oxford University" class="form-control floating">
												<label class="focus-label">Institution</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Computer Science" class="form-control floating">
												<label class="focus-label">Subject</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<div class="cal-icon">
													<input type="text" value="01/06/2002" class="form-control floating datetimepicker">
												</div>
												<label class="focus-label">Starting Date</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<div class="cal-icon">
													<input type="text" value="31/05/2006" class="form-control floating datetimepicker">
												</div>
												<label class="focus-label">Complete Date</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="BE Computer Science" class="form-control floating">
												<label class="focus-label">Degree</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus focused">
												<input type="text" value="Grade A" class="form-control floating">
												<label class="focus-label">Grade</label>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Education Modal -->
	
	<!-- Experience Modal -->
	<div id="experience_info" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Experience Informations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="Digital Devlopment Inc">
												<label class="focus-label">Company Name</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="United States">
												<label class="focus-label">Location</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="Web Developer">
												<label class="focus-label">Job Position</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<div class="cal-icon">
													<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
												</div>
												<label class="focus-label">Period From</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<div class="cal-icon">
													<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
												</div>
												<label class="focus-label">Period To</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="Digital Devlopment Inc">
												<label class="focus-label">Company Name</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="United States">
												<label class="focus-label">Location</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="Web Developer">
												<label class="focus-label">Job Position</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<div class="cal-icon">
													<input type="text" class="form-control floating datetimepicker" value="01/07/2007">
												</div>
												<label class="focus-label">Period From</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-focus">
												<div class="cal-icon">
													<input type="text" class="form-control floating datetimepicker" value="08/06/2018">
												</div>
												<label class="focus-label">Period To</label>
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Experience Modal -->
	
</div>
<!-- /Page Wrapper -->

<script>
	$(window).on("load", function() {
		$(".loader").fadeOut();
	});
</script>