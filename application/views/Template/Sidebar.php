<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="nav-item"> 
					<a href="<?php echo base_url(); ?>dashboard"><i class="la la-table"></i> <span>Dashboard</span></a>
				</li>
				<li class="nav-item"> 
					<a href="<?php echo base_url(); ?>profile"><i class="la la-user"></i> <span>Profile</span></a>
				</li>
				<li class="menu-title"> 
					<span>Employees</span>
				</li>
				<li class="submenu">
					<a href="#" class="employees-header"><i class="la la-users"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;" class="menu-header" id="employees-header">
						<li><a href="<?php echo base_url(); ?>employees">All Employees</a></li>
						<li><a href="<?php echo base_url(); ?>leaves">Leaves</a></li>
						<li><a href="<?php echo base_url(); ?>overtime">Overtime</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Loans</a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#" class="timekeeping-header"><i class="la la-dashboard"></i> <span> Timekeeping</span>  <span class="menu-arrow"></span></a>
					<ul style="display: none;" class="menu-header" id="timekeeping-header">
						<li><a href="<?php echo base_url(); ?>timekeeping/timesheet">Timesheet</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Timekeeping Report</a></li>
					</ul>
				</li>

				<li class="menu-title"> 
					<span>Process</span>
				</li>
				<li class="submenu">
					<a href="#" class="payroll-header"><i class="fa fa-money"></i> <span>Payroll</span><span class="menu-arrow"></a>
					<ul style="display: none;" class="menu-header" id="payroll-header">
						<li><a href="<?php echo base_url(); ?>maintenance">Payroll Process</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Payroll Adjustment</a></li>
						<li><a href="<?php echo base_url(); ?>payroll/payslip">Generate Payslip</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Payroll Report</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Payroll Adjustment Report</a></li>

					</ul>
				</li>				
				<li class="submenu">
					<a href="#" class="13th-header"><i class="la la-money"></i> <span>13th Month Pay</span><span class="menu-arrow"></a>
					<ul style="display: none;" class="menu-header" id="13th-header">
						<li><a href="<?php echo base_url(); ?>maintenance">13th Month Process</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">13th Month Report</a></li>
					</ul>
				</li>	
				<li class="submenu">
					<a href="#" class="retirement-header"><i class="la la-external-link-square"></i> <span>Retirement Fund</span><span class="menu-arrow"></a>
					
					<ul style="display: none;" class="menu-header" id="retirement-header">
						<li><a href="<?php echo base_url(); ?>maintenance">Retirement Process</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Retirement Report</a></li>
					</ul>
				</li>	
				<li class="submenu">
					<a href="#" class="reports-header"><i class="la la-pie-chart"></i> <span>Reports</span><span class="menu-arrow"></a>
					
					<ul style="display: none;" class="menu-header" id="reports-header">
						<li><a href="<?php echo base_url(); ?>maintenance">Billing Statement</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">PPS (Metrobank)</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">PHIC Premium Payment</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">SSS Premium Payment</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">HDMF Premium Payment</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Summary of Deductions</a></li>
					</ul>
				</li>	
				<li class="menu-title"> 
					<span>Administration</span>
				</li>
				<li class="submenu">
					<a href="#" class="maintenance-header"><i class="la la-folder-open"></i> <span> File Maintenance </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;" class="menu-header" id="maintenance-header">
						<li><a href="<?php echo base_url(); ?>departments">Departments</a></li>
						<li><a href="<?php echo base_url(); ?>designations">Designations</a></li>
						<li><a href="<?php echo base_url(); ?>clients">Clients</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Detachment Post</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Contribution</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Tax Table</a></li>
						<li><a href="<?php echo base_url(); ?>holidays">Holidays</a></li>
						<li><a href="<?php echo base_url(); ?>leavetype">Leave Type</a></li>
						<li><a href="<?php echo base_url(); ?>maintenance">Bank</a></li>
					</ul>
				</li>	
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>company"><i class="la la-building"></i></i> <span> Company Profile </span> </a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>roles"><i class="la la-key"></i></i> <span> Roles & Permission </span> </a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url(); ?>maintenance"><i class="la la-tasks"></i></i> <span> Approval Setup </span> </a>
				</li>
			</ul>
		</div>
    </div>
</div>
<!-- /Sidebar -->