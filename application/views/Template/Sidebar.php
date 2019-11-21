<?php
	$this->db->select('*');
	$this->db->from('rolemodule');
	$this->db->where("roleID", $this->session->userdata('roleID'));  
	$result = $this->db->get()->result();

	$permission=array();
	$index = 1;

    foreach($result as $single)
	{
	   $permission[$index] = $single->modulestatus;
	   $index++;
	}
?>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<?php if($permission[1] || $permission[2]){ ?>
					<li class="menu-title"> 
						<span>Main</span>
					</li>
					<?php if($permission[1]){ ?>
						<li class="nav-item"> 
							<a href="<?php echo base_url(); ?>dashboard"><i class="la la-table"></i> <span>Dashboard</span></a>
						</li>
					<?php } if($permission[2]){ ?>
						<li class="nav-item"> 
							<a href="<?php echo base_url(); ?>profile"><i class="la la-user"></i> <span>Profile</span></a>
						</li>
					<?php } 
				}?>

				<?php if($permission[3] || $permission[4] || $permission[5] || $permission[6] || $permission[7] || $permission[8]){ ?>
					<li class="menu-title"> 
						<span>Employees</span>
					</li>
					<?php if($permission[3] || $permission[4] || $permission[5] || $permission[6]){ ?>
						<li class="submenu">
							<a href="#" class="employees-header"><i class="la la-users"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;" class="menu-header" id="employees-header">
								<?php if($permission[3]){ ?>
									<li><a href="<?php echo base_url(); ?>employees">All Employees</a></li>
								<?php } if($permission[4]){ ?>
									<li><a href="<?php echo base_url(); ?>leaves">Leaves</a></li>
								<?php } if($permission[5]){ ?>	
									<li><a href="<?php echo base_url(); ?>overtime">Overtime</a></li>
								<?php } if($permission[6]){ ?>
									<li><a href="<?php echo base_url(); ?>loans">Loans</a></li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
					<?php if($permission[7] || $permission[8]){ ?>
						<li class="submenu">
							<a href="#" class="timekeeping-header"><i class="la la-dashboard"></i> <span> Timekeeping</span>  <span class="menu-arrow"></span></a>
							<ul style="display: none;" class="menu-header" id="timekeeping-header">
								<?php if($permission[7]){ ?>
									<li><a href="<?php echo base_url(); ?>timekeeping/timesheet">Timesheet</a></li>
								<?php } if($permission[8]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Timekeeping Report</a></li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
				<?php } ?>

				<?php if($permission[9]  || $permission[10] || $permission[11] || $permission[12] || $permission[13] ||
						 $permission[14] || $permission[15] || $permission[16] || $permission[17] || $permission[18] || 
						 $permission[19] || $permission[20] || $permission[21] || $permission[22] || $permission[23]){ ?>
					<li class="menu-title"> 
						<span>Process</span>
					</li>

					<?php if($permission[9] || $permission[10] || $permission[11] || $permission[12] || $permission[13]){ ?>
						<li class="submenu">
							<a href="#" class="payroll-header"><i class="fa fa-money"></i> <span>Payroll</span><span class="menu-arrow"></a>
							<ul style="display: none;" class="menu-header" id="payroll-header">
								<?php if($permission[9]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Payroll Process</a></li>
								<?php } if($permission[10]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Payroll Adjustment</a></li>
								<?php } if($permission[11]){ ?>
									<li><a href="<?php echo base_url(); ?>payroll/payslip">Generate Payslip</a></li>
								<?php } if($permission[12]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Payroll Report</a></li>
								<?php } if($permission[13]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Payroll Adjustment Report</a></li>
								<?php } ?>
							</ul>
						</li>			
					<?php } ?>

					<?php if($permission[14] || $permission[15]){ ?>
						<li class="submenu">
							<a href="#" class="13th-header"><i class="la la-money"></i> <span>13th Month Pay</span><span class="menu-arrow"></a>
							<ul style="display: none;" class="menu-header" id="13th-header">
								<?php if($permission[14]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">13th Month Process</a></li>
								<?php } if($permission[15]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">13th Month Report</a></li>
								<?php } ?>
							</ul>
						</li>	
					<?php } ?>

					<?php if($permission[16] || $permission[17]){ ?>
						<li class="submenu">
							<a href="#" class="retirement-header"><i class="la la-external-link-square"></i> <span>Retirement Fund</span><span class="menu-arrow"></a>
							
							<ul style="display: none;" class="menu-header" id="retirement-header">
								<?php if($permission[16]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Retirement Process</a></li>
								<?php } if($permission[17]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Retirement Report</a></li>
								<?php } ?>	
							</ul>
						</li>	
					<?php } ?>

					<?php if($permission[18] || $permission[19] || $permission[20] || $permission[21] || $permission[22] || $permission[23]){ ?>
						<li class="submenu">
							<a href="#" class="reports-header"><i class="la la-pie-chart"></i> <span>Reports</span><span class="menu-arrow"></a>
							
							<ul style="display: none;" class="menu-header" id="reports-header">
								<?php if($permission[18]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Billing Statement</a></li>
								<?php } if($permission[19]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">PPS (Metrobank)</a></li>
								<?php } if($permission[20]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">PHIC Premium Payment</a></li>
								<?php } if($permission[21]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">SSS Premium Payment</a></li>
								<?php } if($permission[22]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">HDMF Premium Payment</a></li>
								<?php } if($permission[23]){ ?>
									<li><a href="<?php echo base_url(); ?>maintenance">Summary of Deductions</a></li>
								<?php } ?>	
							</ul>
						</li>	
					<?php } ?>
				<?php } ?>

				<?php if($permission[24] || $permission[25] || $permission[26] || $permission[27] || $permission[28] ||
						 $permission[29] || $permission[30] || $permission[31] || $permission[32] || $permission[33] || 
						 $permission[34] || $permission[35] || $permission[36]){ ?>
					<li class="menu-title"> 
						<span>Administration</span>
					</li>
					<?php if($permission[24] || $permission[25] || $permission[26] || $permission[27] || $permission[28] ||
						 $permission[29] || $permission[30] || $permission[31] || $permission[32] || $permission[33]){ ?>
							<li class="submenu">
								<a href="#" class="maintenance-header"><i class="la la-folder-open"></i> <span> File Maintenance </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;" class="menu-header" id="maintenance-header">
									<?php if($permission[24]){ ?>
										<li><a href="<?php echo base_url(); ?>departments">Departments</a></li>
									<?php } if($permission[25]){ ?>
										<li><a href="<?php echo base_url(); ?>designations">Designations</a></li>
									<?php } if($permission[26]){ ?>
										<li><a href="<?php echo base_url(); ?>clients">Clients</a></li>
									<?php } if($permission[27]){ ?>
										<li><a href="<?php echo base_url(); ?>maintenance">Detachment Post</a></li>
									<?php } if($permission[28]){ ?>
										<li><a href="<?php echo base_url(); ?>maintenance">SSS Table</a></li>
									<?php } if($permission[29]){ ?>
										<li><a href="<?php echo base_url(); ?>maintenance">Philhealth Table</a></li>
									<?php } if($permission[30]){ ?>
										<li><a href="<?php echo base_url(); ?>maintenance">Tax Table</a></li>
									<?php } if($permission[31]){ ?>
										<li><a href="<?php echo base_url(); ?>holidays">Holidays</a></li>
									<?php } if($permission[32]){ ?>
										<li><a href="<?php echo base_url(); ?>leavetype">Leave Type</a></li>
									<?php } if($permission[33]){ ?>
										<li><a href="<?php echo base_url(); ?>banks">Bank</a></li>
									<?php } ?>
								</ul>
							</li>	
					<?php } ?>
					<?php if($permission[34]){ ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>company"><i class="la la-building"></i></i> <span>Company Profile</span> </a>
						</li>
					<?php } if($permission[35]){ ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>roles"><i class="la la-key"></i></i> <span>Roles & Permission</span> </a>
						</li>
					<?php } if($permission[36]){ ?>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>maintenance"><i class="la la-tasks"></i></i> <span>Approval Setup</span> </a>
						</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->