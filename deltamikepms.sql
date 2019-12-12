-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 07:43 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltamikepms`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approvalID` bigint(20) NOT NULL,
  `approvalDescription` varchar(255) NOT NULL,
  `moduleID` bigint(20) NOT NULL,
  `employeetypeID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`approvalID`, `approvalDescription`, `moduleID`, `employeetypeID`) VALUES
(1, 'Timesheet Approval', 7, 2),
(2, 'Timesheet Timesheet', 7, 1),
(7, '', 9, 0),
(25, 'Payroll 2', 10, 0),
(28, 'DAWDAWDWW', 10, 0),
(31, 'Payroll', 9, 1),
(32, '', 7, 0),
(33, 'Payroll Adjustment', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `approvaldet`
--

CREATE TABLE `approvaldet` (
  `approvaldetID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `approvalLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvaldet`
--

INSERT INTO `approvaldet` (`approvaldetID`, `approvalID`, `employeeID`, `approvalLevel`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 2, 1),
(4, 2, 3, 2),
(30, 25, 1, 1),
(33, 28, 1, 1),
(36, 31, 1, 1),
(37, 31, 3, 2),
(38, 31, 2, 3),
(39, 33, 2, 1),
(40, 33, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `approvalmodule`
--

CREATE TABLE `approvalmodule` (
  `approvalmoduleID` bigint(20) NOT NULL,
  `moduleID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvalmodule`
--

INSERT INTO `approvalmodule` (`approvalmoduleID`, `moduleID`) VALUES
(1, 7),
(2, 9),
(3, 10),
(4, 14),
(5, 16),
(6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bankID` bigint(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankID`, `bankname`, `bankstatus`) VALUES
(1, 'b', 'Active'),
(2, 'a', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` bigint(20) NOT NULL,
  `description` varchar(120) NOT NULL,
  `clientstatus` varchar(120) NOT NULL,
  `clientname` varchar(50) NOT NULL,
  `housenumber` varchar(50) NOT NULL,
  `streetname` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `activedetachmentpost` int(10) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `description`, `clientstatus`, `clientname`, `housenumber`, `streetname`, `barangay`, `city`, `contactperson`, `activedetachmentpost`, `contactno`, `email`) VALUES
(1, '1', 'Active', '1', '', '', '', '', '1', 1, '1', '1'),
(2, '2', 'Active', '3', '2', '3', '1', '1', '1', 1, '1', '1'),
(3, '', 'Active', '2', '', '2', '2', '2', '2', 2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` bigint(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `departmentstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `description`, `departmentstatus`) VALUES
(1, 'IT Departments', 'Active'),
(2, 'HR Department', 'Inactive'),
(3, '1', 'Active'),
(4, '23', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `designationID` bigint(20) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `designationdescription` varchar(50) NOT NULL,
  `designationstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designationID`, `departmentID`, `designationdescription`, `designationstatus`) VALUES
(1, 1, 'IT Manager', 'Active'),
(2, 1, 'IT Programmer 1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `detachment`
--

CREATE TABLE `detachment` (
  `detachmentID` bigint(20) NOT NULL,
  `postname` varchar(60) NOT NULL,
  `housenumber` varchar(100) NOT NULL,
  `streetname` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `clientID` int(11) NOT NULL,
  `commander` varchar(60) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `noofguard` int(11) NOT NULL,
  `detachmentstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detachment`
--

INSERT INTO `detachment` (`detachmentID`, `postname`, `housenumber`, `streetname`, `barangay`, `city`, `clientID`, `commander`, `startdate`, `enddate`, `noofguard`, `detachmentstatus`) VALUES
(1, 'Post1', '', 'asd', 'asd', 'Pasig City', 1, 'Wilson Parajas', '2019-11-01', '2019-11-30', 5, 'Active'),
(2, 'Post2', '', 'asd', 'asd', 'Caloocan', 1, 'Jamie Capistrano', '2019-11-01', '2019-11-30', 3, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` bigint(20) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `middlename` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `housenumber` varchar(10) NOT NULL,
  `streetname` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `birthdate` varchar(60) NOT NULL,
  `contactinfo` varchar(30) NOT NULL,
  `civilstatus` varchar(30) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `hireddate` varchar(60) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `designationID` varchar(50) NOT NULL,
  `detachmentID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `basicsalary` varchar(50) NOT NULL,
  `dailyrate` varchar(50) NOT NULL,
  `allowance` varchar(50) NOT NULL,
  `tinnumber` varchar(30) NOT NULL,
  `sssnumber` varchar(30) NOT NULL,
  `philhealthnumber` varchar(30) NOT NULL,
  `pagibignumber` varchar(30) NOT NULL,
  `employeestatus` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `clientID` int(120) NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `detachmentID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Administrator', '', 'Account', 'Male', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '2', 2, 1, 1, 'admin', 'admin', ' 10,000.00', ' 500.00', ' 0.00', '111-111-111', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', '1.jpg', 1, '2019-11-25 08:26:51.905646'),
(2, 'Office', '', 'Staff', 'Female', '', 'Opel', '175', 'Caloocan', '1994-02-20', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '1', 1, 2, 2, 'staff', 'staff', '10,000.00', '100.00', '', '', '', '', '', 'Active', '', 0, '2019-11-25 08:26:54.102823'),
(3, 'Office', '', 'Executive', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '2000-10-25', '0912-345-6789', 'Married', 'Fiipino', '2013-11-25', 1, '1', 1, 2, 2, 'exe', 'exe', '20,000.00', '200.00', '', '', '', '', '', 'Active', '', 0, '2019-12-03 11:56:31.366887');

-- --------------------------------------------------------

--
-- Table structure for table `employeecreditleave`
--

CREATE TABLE `employeecreditleave` (
  `employeeleavecreditID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `leavetypeID` bigint(20) NOT NULL,
  `totalleave` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeecreditleave`
--

INSERT INTO `employeecreditleave` (`employeeleavecreditID`, `employeeID`, `leavetypeID`, `totalleave`) VALUES
(5, 1, 1, 3),
(6, 1, 2, 5),
(7, 2, 0, 1),
(8, 2, 0, 1),
(9, 3, 0, 11),
(10, 3, 0, 1),
(11, 4, 0, 1),
(12, 4, 0, 12),
(13, 5, 0, 1),
(14, 5, 0, 4),
(15, 6, 2, 3),
(16, 6, 1, 3),
(17, 7, 5, 5),
(18, 11, 2, 7),
(19, 11, 5, 5),
(20, 13, 4, 5),
(21, 13, 1, 1),
(22, 14, 3, 43),
(23, 14, 4, 2),
(24, 15, 1, 6),
(25, 16, 1, 234),
(26, 17, 1, 1),
(27, 18, 1, 1),
(28, 19, 1, 43543),
(29, 20, 2, 234),
(30, 21, 2, 234),
(31, 22, 1, 232),
(32, 23, 2, 5656),
(33, 25, 1, 45),
(34, 26, 2, 4),
(35, 26, 1, 1),
(36, 27, 1, 4),
(37, 28, 3, 3),
(38, 29, 1, 44),
(39, 30, 1, 4),
(40, 31, 1, 4),
(41, 33, 1, 33),
(42, 34, 1, 3434),
(43, 35, 1, 4545),
(44, 36, 1, 4),
(45, 37, 1, 4545),
(46, 40, 1, 5),
(47, 41, 1, 1),
(48, 42, 1, 5),
(49, 43, 1, 3),
(50, 44, 1, 11),
(51, 45, 0, 0),
(52, 46, 1, 2),
(53, 48, 1, 2),
(54, 50, 1, 4),
(55, 51, 2, 6),
(56, 52, 1, 4545),
(57, 53, 2, 5),
(58, 54, 1, 4545),
(59, 55, 1, 55),
(60, 57, 1, 0),
(61, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employeeleave`
--

CREATE TABLE `employeeleave` (
  `employeeleaveID` bigint(20) NOT NULL,
  `leavetypeID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `leavefrom` varchar(250) NOT NULL,
  `leaveto` varchar(250) NOT NULL,
  `numberofdays` bigint(20) NOT NULL,
  `remainingleave` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeleave`
--

INSERT INTO `employeeleave` (`employeeleaveID`, `leavetypeID`, `employeeID`, `leavefrom`, `leaveto`, `numberofdays`, `remainingleave`, `reason`) VALUES
(85, 1, 1, '06/12/2019', '08/12/2019', 3, 5, '21313'),
(86, 1, 1, '22/12/2019', '22/12/2019', 1, 4, '1'),
(87, 1, 1, '10/12/2019', '12/12/2019', 3, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `employeeschedule`
--

CREATE TABLE `employeeschedule` (
  `scheduleID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `sunschedulefrom` varchar(15) NOT NULL,
  `sunscheduleto` varchar(15) NOT NULL,
  `sunrestday` int(11) NOT NULL,
  `monchedulefrom` varchar(15) NOT NULL,
  `monscheduleto` varchar(15) NOT NULL,
  `monrestday` int(11) NOT NULL,
  `tueschedulefrom` varchar(15) NOT NULL,
  `tuescheduleto` varchar(15) NOT NULL,
  `tuerestday` int(11) NOT NULL,
  `wedschedulefrom` varchar(15) NOT NULL,
  `wedscheduleto` varchar(15) NOT NULL,
  `wedrestday` int(11) NOT NULL,
  `thschedulefrom` varchar(15) NOT NULL,
  `thscheduleto` varchar(15) NOT NULL,
  `threstday` int(11) NOT NULL,
  `frischedulefrom` varchar(15) NOT NULL,
  `frischeduleto` varchar(15) NOT NULL,
  `frirestday` int(11) NOT NULL,
  `satschedulefrom` varchar(15) NOT NULL,
  `satscheduleto` varchar(15) NOT NULL,
  `satrestday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeschedule`
--

INSERT INTO `employeeschedule` (`scheduleID`, `employeeID`, `sunschedulefrom`, `sunscheduleto`, `sunrestday`, `monchedulefrom`, `monscheduleto`, `monrestday`, `tueschedulefrom`, `tuescheduleto`, `tuerestday`, `wedschedulefrom`, `wedscheduleto`, `wedrestday`, `thschedulefrom`, `thscheduleto`, `threstday`, `frischedulefrom`, `frischeduleto`, `frirestday`, `satschedulefrom`, `satscheduleto`, `satrestday`) VALUES
(1, 1, '15:33', '03:33', 0, '', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeetype`
--

CREATE TABLE `employeetype` (
  `employeetypeID` bigint(20) NOT NULL,
  `employeeTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetype`
--

INSERT INTO `employeetype` (`employeetypeID`, `employeeTypeDescription`) VALUES
(1, 'Security Guard'),
(2, 'Office Staff');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holidayID` bigint(20) NOT NULL,
  `holidayname` varchar(60) DEFAULT NULL,
  `holidaydate` date DEFAULT NULL,
  `holidaytype` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`holidayID`, `holidayname`, `holidaydate`, `holidaytype`) VALUES
(1, 'asdd', '9999-11-30', 'Regular Holiday'),
(2, 'asd', '0001-08-08', 'Regular Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `leavetype`
--

CREATE TABLE `leavetype` (
  `leavetypeID` bigint(11) NOT NULL,
  `leavetypename` varchar(50) NOT NULL,
  `noofdays` int(11) NOT NULL,
  `accumulation` varchar(20) NOT NULL,
  `leavetypestatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leavetype`
--

INSERT INTO `leavetype` (`leavetypeID`, `leavetypename`, `noofdays`, `accumulation`, `leavetypestatus`) VALUES
(1, 'a', 1, 'No', 'Active'),
(2, 'b', 1, 'No', 'Active'),
(3, 'asd', 1, 'Yes', 'Active'),
(4, 'e', 1, 'No', 'Active'),
(5, 'as', 1, 'Yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `loantypeID` int(11) NOT NULL,
  `dategranted` varchar(50) NOT NULL,
  `enddate` varchar(255) NOT NULL,
  `termofpaymentID` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `deduction` varchar(25) NOT NULL,
  `balance` varchar(25) NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanID`, `employeeID`, `loantypeID`, `dategranted`, `enddate`, `termofpaymentID`, `amount`, `deduction`, `balance`, `datecreated`) VALUES
(1, 1, 1, '21/11/2019', '08/02/2020', 1, '5,000.00', '400.00', '', '2019-11-20 06:19:30.733972'),
(2, 1, 2, '21/11/2019', '20/11/2019', 1, '2.00', '1.00', '', '2019-11-20 06:27:44.347017');

-- --------------------------------------------------------

--
-- Table structure for table `modulemstr`
--

CREATE TABLE `modulemstr` (
  `moduleID` bigint(20) NOT NULL,
  `moduleDescription` varchar(255) NOT NULL,
  `moduleShortDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modulemstr`
--

INSERT INTO `modulemstr` (`moduleID`, `moduleDescription`, `moduleShortDesc`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Profile', 'profile'),
(3, 'All Employees', 'employees'),
(4, 'Leaves', 'leaves'),
(5, 'Overtime', 'overtime'),
(6, 'Loans', 'loans'),
(7, 'Timesheet', 'timesheet'),
(8, 'Timekeeping Report', 'timekeepingreport'),
(9, 'Payroll Process', 'payrollprocess'),
(10, 'Payroll Adjustment', 'payrolladjustment'),
(11, 'Generate Payslip', 'generatepayslip'),
(12, 'Payroll Report', 'payrollreport'),
(13, 'Payroll Adjustment Report', 'payrolladjustmentreport'),
(14, '13th Month Process', 'thirteenprocess'),
(15, '13th Month Report', 'thirteenreport'),
(16, 'Retirement Process', 'retirementprocess'),
(17, 'Retirement Report', 'retirementreport'),
(18, 'Billing Statement', 'billing'),
(19, 'PPS (Metrobank)', 'pps'),
(20, 'PHIC Premium Payment', 'phicpremium'),
(21, 'SSS Premium Payment', 'ssspremium'),
(22, 'HDMF Premium Payment', 'hdmfpremium'),
(23, 'Summary of Deductions', 'deduction'),
(24, 'Departments', 'departments'),
(25, 'Designations', 'designations'),
(26, 'Clients', 'clients'),
(27, 'Detachment Post', 'detachment'),
(28, 'SSS Table', 'ssstable'),
(29, 'Philhealth Table', 'philhealthtable'),
(30, 'Tax Table', 'taxtable'),
(31, 'Holidays', 'holidays'),
(32, 'Leave Type', 'leavetype'),
(33, 'Bank', 'bank'),
(34, 'Company Profile', 'companyprofile'),
(35, 'Roles & Permission', 'rolespermission'),
(36, 'Approval Setup', 'approvalsetup');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `overtimeID` int(8) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `overtimedate` varchar(250) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `totalhour` varchar(255) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `dateupdated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`overtimeID`, `employeeID`, `description`, `overtimedate`, `starttime`, `endtime`, `totalhour`, `datecreated`, `dateupdated`) VALUES
(1, 1, '11', '14/11/2019', '02:30 AM', '07:30 AM', '05:00', '13/11/2019 11:41 AM', '13/11/2019 01:46 PM'),
(3, 1, '7111', '14/11/2019', '02:30 AM', '10:00 AM', '07:30', '13/11/2019 01:47 PM', '13/11/2019 02:06 PM'),
(4, 1, 'hhh1', '18/11/2019', '01:30 AM', '03:00 AM', '1:30', '18/11/2019 05:20 PM', ''),
(5, 1, 'jn', '19/11/2019', '08:00', '05:30', '0:0', '18/11/2019 05:25 PM', ''),
(6, 1, 'adawdw', '20/11/2019', '18:00', '13:30', '0:0', '18/11/2019 05:26 PM', ''),
(7, 1, 'wseqwqe', '22/11/2019', '11:11', '14:14', '3:3', '19/11/2019 09:02 AM', ''),
(8, 5, 'weewew232', '28/11/2019', '11:11 AM', '03:33 PM', '04:22', '', ''),
(9, 3, '1112', '28/11/2019', '08:08 AM', '09:30 AM', '1:22', '', ''),
(10, 3, '121', '21/11/2019', '11:11', '16:21', '5:10', '', ''),
(11, 3, 'aeew', '29/11/2019', '11:11', '14:11', '3:0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `philhealthtable`
--

CREATE TABLE `philhealthtable` (
  `philhealthID` int(11) NOT NULL,
  `belowrange` varchar(50) NOT NULL,
  `aboverange` varchar(50) NOT NULL,
  `percent` int(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `philhealthtable`
--

INSERT INTO `philhealthtable` (`philhealthID`, `belowrange`, `aboverange`, `percent`, `employer`, `employee`, `total`) VALUES
(1, '100.00', '100.00', 100, '100.00', '100.00', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `rolemodule`
--

CREATE TABLE `rolemodule` (
  `ID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `moduleID` bigint(20) NOT NULL,
  `modulestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolemodule`
--

INSERT INTO `rolemodule` (`ID`, `roleID`, `moduleID`, `modulestatus`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 1, 8, 1),
(9, 1, 9, 1),
(10, 1, 10, 1),
(11, 1, 11, 1),
(12, 1, 12, 1),
(13, 1, 13, 1),
(14, 1, 14, 1),
(15, 1, 15, 1),
(16, 1, 16, 1),
(17, 1, 17, 1),
(18, 1, 18, 1),
(19, 1, 19, 1),
(20, 1, 20, 1),
(21, 1, 21, 1),
(22, 1, 22, 1),
(23, 1, 23, 1),
(24, 1, 24, 1),
(25, 1, 25, 1),
(26, 1, 26, 1),
(27, 1, 27, 1),
(28, 1, 28, 1),
(29, 1, 29, 1),
(30, 1, 30, 1),
(31, 1, 31, 1),
(32, 1, 32, 1),
(33, 1, 33, 1),
(34, 1, 34, 1),
(35, 1, 35, 1),
(36, 1, 36, 1),
(37, 2, 1, 1),
(38, 2, 2, 1),
(39, 2, 3, 1),
(40, 2, 4, 1),
(41, 2, 5, 1),
(42, 2, 6, 1),
(43, 2, 7, 1),
(44, 2, 8, 1),
(45, 2, 9, 1),
(46, 2, 10, 1),
(47, 2, 11, 1),
(48, 2, 12, 1),
(49, 2, 13, 1),
(50, 2, 14, 1),
(51, 2, 15, 1),
(52, 2, 16, 1),
(53, 2, 17, 1),
(54, 2, 18, 1),
(55, 2, 19, 1),
(56, 2, 20, 1),
(57, 2, 21, 1),
(58, 2, 22, 1),
(59, 2, 23, 1),
(60, 2, 24, 1),
(61, 2, 25, 1),
(62, 2, 26, 1),
(63, 2, 27, 1),
(64, 2, 28, 1),
(65, 2, 29, 1),
(66, 2, 30, 1),
(67, 2, 31, 1),
(68, 2, 32, 1),
(69, 2, 33, 1),
(70, 2, 34, 1),
(71, 2, 35, 1),
(72, 2, 36, 1),
(73, 12, 1, 0),
(74, 12, 2, 0),
(75, 12, 3, 0),
(76, 12, 4, 0),
(77, 12, 5, 0),
(78, 12, 6, 0),
(79, 12, 7, 0),
(80, 12, 8, 0),
(81, 12, 9, 0),
(82, 12, 10, 0),
(83, 12, 11, 0),
(84, 12, 12, 0),
(85, 12, 13, 0),
(86, 12, 14, 0),
(87, 12, 15, 0),
(88, 12, 16, 0),
(89, 12, 17, 0),
(90, 12, 18, 0),
(91, 12, 19, 0),
(92, 12, 20, 0),
(93, 12, 21, 0),
(94, 12, 22, 0),
(95, 12, 23, 0),
(96, 12, 24, 0),
(97, 12, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rolemstr`
--

CREATE TABLE `rolemstr` (
  `roleID` bigint(20) NOT NULL,
  `roleDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolemstr`
--

INSERT INTO `rolemstr` (`roleID`, `roleDescription`) VALUES
(1, 'Administrator'),
(2, 'Employee'),
(11, '123455'),
(12, 'wilson');

-- --------------------------------------------------------

--
-- Table structure for table `ssstable`
--

CREATE TABLE `ssstable` (
  `sssID` int(11) NOT NULL,
  `belowrange` varchar(50) NOT NULL,
  `aboverange` varchar(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssstable`
--

INSERT INTO `ssstable` (`sssID`, `belowrange`, `aboverange`, `employer`, `employee`, `total`) VALUES
(1, '500.00', '600.00', '500.00', '500.00', '600.00'),
(2, '501.00', '600.00', '20.00', '20.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `taxtable`
--

CREATE TABLE `taxtable` (
  `taxID` int(11) NOT NULL,
  `belowrange` varchar(30) NOT NULL,
  `aboverange` varchar(30) NOT NULL,
  `additionaltax` varchar(30) NOT NULL,
  `percent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taxtable`
--

INSERT INTO `taxtable` (`taxID`, `belowrange`, `aboverange`, `additionaltax`, `percent`) VALUES
(1, ' 1.00', ' 200.00', ' 200.00', '20'),
(2, '200.00', '200.00', '20.00', '20'),
(5, '900.00', '9,000.00', '900.00', '20'),
(6, '300.00', '400.00', '500.00', '20'),
(7, '600.00', '200.00', '300.00', '0'),
(8, '5,050.00', '5,050.00', '5,050.00', '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`approvalID`);

--
-- Indexes for table `approvaldet`
--
ALTER TABLE `approvaldet`
  ADD PRIMARY KEY (`approvaldetID`);

--
-- Indexes for table `approvalmodule`
--
ALTER TABLE `approvalmodule`
  ADD PRIMARY KEY (`approvalmoduleID`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designationID`);

--
-- Indexes for table `detachment`
--
ALTER TABLE `detachment`
  ADD PRIMARY KEY (`detachmentID`);

--
-- Indexes for table `employeecreditleave`
--
ALTER TABLE `employeecreditleave`
  ADD PRIMARY KEY (`employeeleavecreditID`);

--
-- Indexes for table `employeeleave`
--
ALTER TABLE `employeeleave`
  ADD PRIMARY KEY (`employeeleaveID`);

--
-- Indexes for table `employeeschedule`
--
ALTER TABLE `employeeschedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `employeetype`
--
ALTER TABLE `employeetype`
  ADD PRIMARY KEY (`employeetypeID`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `leavetype`
--
ALTER TABLE `leavetype`
  ADD PRIMARY KEY (`leavetypeID`);

--
-- Indexes for table `modulemstr`
--
ALTER TABLE `modulemstr`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`overtimeID`);

--
-- Indexes for table `philhealthtable`
--
ALTER TABLE `philhealthtable`
  ADD PRIMARY KEY (`philhealthID`);

--
-- Indexes for table `rolemodule`
--
ALTER TABLE `rolemodule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rolemstr`
--
ALTER TABLE `rolemstr`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `ssstable`
--
ALTER TABLE `ssstable`
  ADD PRIMARY KEY (`sssID`);

--
-- Indexes for table `taxtable`
--
ALTER TABLE `taxtable`
  ADD PRIMARY KEY (`taxID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `approvalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `approvaldet`
--
ALTER TABLE `approvaldet`
  MODIFY `approvaldetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `approvalmodule`
--
ALTER TABLE `approvalmodule`
  MODIFY `approvalmoduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bankID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designationID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detachment`
--
ALTER TABLE `detachment`
  MODIFY `detachmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeecreditleave`
--
ALTER TABLE `employeecreditleave`
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `employeeleave`
--
ALTER TABLE `employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `employeeschedule`
--
ALTER TABLE `employeeschedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employeetype`
--
ALTER TABLE `employeetype`
  MODIFY `employeetypeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `leavetype`
--
ALTER TABLE `leavetype`
  MODIFY `leavetypeID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `modulemstr`
--
ALTER TABLE `modulemstr`
  MODIFY `moduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `overtimeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rolemodule`
--
ALTER TABLE `rolemodule`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `rolemstr`
--
ALTER TABLE `rolemstr`
  MODIFY `roleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
