<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
					<li class="menu-title"> 
						<span>Main</span>
					</li>
						<li class="nav-item"> 
							<a href="<?php echo base_url(); ?>Dashboard"><i class="la la-table"></i> <span>Dashboard</span></a>
						</li>
						<li class="nav-item"> 
							<a href="<?php echo base_url(); ?>Profile"><i class="la la-user"></i> <span>Profile</span></a>
						</li>

					<li class="menu-title"> 
						<span>Employees</span>
					</li>
						<li class="submenu">
							<a href="#" class="employees-header"><i class="la la-users"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;" class="menu-header" id="employees-header">
								<li><a href="<?php echo base_url(); ?>Employees">All Employees</a></li>
								<li><a href="<?php echo base_url(); ?>Leaves">Employee Leave</a></li>
								<li><a href="<?php echo base_url(); ?>Overtime">Employee Overtime</a></li>
								<li><a href="<?php echo base_url(); ?>Loans">Employee Loan</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#" class="timekeeping-header"><i class="la la-calendar"></i> <span> Timekeeping</span>  <span class="menu-arrow"></span></a>
							<ul style="display: none;" class="menu-header" id="timekeeping-header">
								<li><a href="<?php echo base_url(); ?>Timekeepingsecurityguard">Timekeeping (Security Guard)</a></li>
								<li><a href="<?php echo base_url(); ?>Timekeepingstaff">Timekeeping (Staff)</a></li>
								<li><a href="<?php echo base_url(); ?>Timekeepingreport">Timekeeping Report</a></li>
							</ul>
						</li>

					<li class="menu-title"> 
						<span>Operations</span>
					</li>
					<li class="nav-item"> 
						<a href="<?php echo base_url(); ?>Scheduling"><i class="la la-clipboard"></i> <span>Post Scheduling</span></a>
					</li>

					<li class="menu-title"> 
						<span>Process</span>
					</li>
						<li class="submenu">
							<a href="#" class="payroll-header"><i class="fa fa-money"></i> <span>Payroll</span><span class="menu-arrow"></a>
							<ul style="display: none;" class="menu-header" id="payroll-header">
								<li><a href="<?php echo base_url(); ?>Payrollsecurityguard" style="font-size: 81%;">Payroll Process (Security Guard)</a></li>
								<li><a href="<?php echo base_url(); ?>Payrollstaff">Payroll Process (Staff)</a></li>
								<li><a href="<?php echo base_url(); ?>Generatepayslip">Generate Payslip</a></li>
								<li><a href="<?php echo base_url(); ?>Payrollreport">Payroll Report</a></li>
								<li><a href="<?php echo base_url(); ?>Payrolladjustmentreport">Payroll Adjustment Report</a></li>
							</ul>
						</li>			

						<li class="submenu">
							<a href="#" class="13th-header"><i class="la la-money"></i> <span>13th Month Pay</span><span class="menu-arrow"></a>
							<ul style="display: none;" class="menu-header" id="13th-header">
									<li><a href="<?php echo base_url(); ?>Thirteenmonthprocess">13th Month Process</a></li>
									<li><a href="<?php echo base_url(); ?>Thirteenmonthreport">13th Month Report</a></li>
							</ul>
						</li>	

						<li class="submenu">
							<a href="#" class="retirement-header"><i class="la la-external-link-square"></i> <span>Retirement Fund</span><span class="menu-arrow"></a>
							
							<ul style="display: none;" class="menu-header" id="retirement-header">
									<li><a href="<?php echo base_url(); ?>Retirementprocess">Retirement Process</a></li>
									<li><a href="<?php echo base_url(); ?>Retirementreport">Retirement Report</a></li>
							</ul>
						</li>	

						<li class="submenu">
							<a href="#" class="billing-header"><i class="la la-bank"></i> <span>Billing Statement</span><span class="menu-arrow"></a>
							
							<ul style="display: none;" class="menu-header" id="billing-header">
									<li><a href="<?php echo base_url(); ?>Billingprocess">Billing Process</a></li>
									<li><a href="<?php echo base_url(); ?>Billingreport">Billing Report</a></li>
							</ul>
						</li>	

						<li class="submenu">
							<a href="#" class="reports-header"><i class="la la-pie-chart"></i> <span>Reports</span><span class="menu-arrow"></a>
							
							<ul style="display: none;" class="menu-header" id="reports-header">
									<li><a href="<?php echo base_url(); ?>Payrollpaymentsystemreport">PPS (Metrobank)</a></li>
									<li><a href="<?php echo base_url(); ?>Philhealthreport">PHIC Premium Payment</a></li>
									<li><a href="<?php echo base_url(); ?>SSSreport">SSS Premium Payment</a></li>
									<li><a href="<?php echo base_url(); ?>Hdmfreport">HDMF Premium Payment</a></li>
									<li><a href="<?php echo base_url(); ?>Summaryofdeductions">Summary of Deductions</a></li>
							</ul>
						</li>	

					<li class="menu-title"> 
						<span>Administration</span>
					</li>
						<li class="submenu">
							<a href="#" class="maintenance-header"><i class="la la-folder-open"></i> <span> File Maintenance </span> <span class="menu-arrow"></span></a>
							<ul style="display: none;" class="menu-header" id="maintenance-header">
								<li><a href="<?php echo base_url(); ?>Departments">Departments</a></li>
								<li><a href="<?php echo base_url(); ?>Designations">Designations</a></li>
								<li><a href="<?php echo base_url(); ?>Clients">Clients</a></li>
								<li><a href="<?php echo base_url(); ?>Posts">Posts</a></li>
								<li><a href="<?php echo base_url(); ?>SSStable">SSS Table</a></li>
								<li><a href="<?php echo base_url(); ?>Philhealthtable">PhilHealth Table</a></li>
								<li><a href="<?php echo base_url(); ?>Taxtable">Tax Table</a></li>
								<li><a href="<?php echo base_url(); ?>Holidays">Holidays</a></li>
								<li><a href="<?php echo base_url(); ?>Leavetype">Leave Type</a></li>
								<li><a href="<?php echo base_url(); ?>Banks">Banks</a></li>
							</ul>
						</li>	
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>Company"><i class="la la-building"></i></i> <span>Company Profile</span> </a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>Roles"><i class="la la-key"></i></i> <span>Roles & Permission</span> </a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>Approval"><i class="la la-tasks"></i></i> <span>Approval Setup</span> </a>
						</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->