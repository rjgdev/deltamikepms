TRUNCATE TABLE dm_approval;
TRUNCATE TABLE dm_approvaldet;
TRUNCATE TABLE dm_approvalmodule;
TRUNCATE TABLE dm_modulemstr;

INSERT INTO `dm_approval` (`approvalDescription`, `moduleID`) VALUES
('Timekeeping (Security Guard)', 7),
('Timekeeping (Staff)', 8),
('Payroll Process (Security Guard)', 10),
('Payroll Process (Staff)', 11),
('13th Month Process', 16),
('Retirement Process', 18),
('Billing Statement', 20);

INSERT INTO `dm_approvaldet` (`approvalID`, `employeeID`, `approvalLevel`, `lastapprover`) VALUES
(6, 9, 1, 1),
(7, 10, 1, 1),
(4, 4, 1, 0),
(4, 3, 2, 1),
(3, 1, 1, 1),
(8, 1, 1, 1),
(2, 1, 1, 1),
(1, 3, 1, 0),
(1, 2, 2, 1);

INSERT INTO `dm_approvalmodule` (`moduleID`) VALUES
(7),
(8),
(10),
(11),
(16),
(18),
(20);

INSERT INTO `dm_modulemstr` (`moduleID`, `moduleDescription`, `moduleShortDesc`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Profile', 'profile'),
(3, 'All Employees', 'employees'),
(4, 'Employee Leave', 'leaves'),
(5, 'Employee Overtime', 'overtime'),
(6, 'Employee Loan', 'loans'),
(7, 'Timesheet (Security Guard)', 'timesheet_sg'),
(8, 'Timesheet (Staff)', 'timesheet_staff'),
(9, 'Timekeeping Report', 'timekeepingreport'),
(10, 'Payroll Process (Security Guard)', 'payrollprocess_sg'),
(11, 'Payroll Process (Staff)', 'payrollprocess_staff'),
(12, 'Post Scheduling', 'postscheduling'),
(13, 'Generate Payslip', 'generatepayslip'),
(14, 'Payroll Report', 'payrollreport'),
(15, 'Payroll Adjustment Report', 'payrolladjustmentreport'),
(16, '13th Month Process', 'thirteenprocess'),
(17, '13th Month Report', 'thirteenreport'),
(18, 'Retirement Process', 'retirementprocess'),
(19, 'Retirement Report', 'retirementreport'),
(20, 'Billing Statement', 'billing'),
(21, 'PPS (Metrobank)', 'pps'),
(22, 'PHIC Premium Payment', 'phicpremium'),
(23, 'SSS Premium Payment', 'ssspremium'),
(24, 'HDMF Premium Payment', 'hdmfpremium'),
(25, 'Summary of Deductions', 'deduction'),
(26, 'Departments', 'departments'),
(27, 'Designations', 'designations'),
(28, 'Clients', 'clients'),
(29, 'Post', 'post'),
(30, 'SSS Table', 'ssstable'),
(31, 'PhilHealth Table', 'philhealthtable'),
(32, 'Tax Table', 'taxtable'),
(33, 'Holidays', 'holidays'),
(34, 'Leave Type', 'leavetype'),
(35, 'Bank', 'bank'),
(36, 'Company Profile', 'companyprofile'),
(37, 'Roles & Permission', 'rolespermission'),
(38, 'Approval Setup', 'approvalsetup');