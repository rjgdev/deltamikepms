-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 07:40 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `GetEmployee` (`test` INT) RETURNS INT(11) BEGIN

  DECLARE profit DECIMAL(9,2);
  SET profit = price-cost;
  RETURN profit;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dm_approval`
--

CREATE TABLE `dm_approval` (
  `approvalID` bigint(20) NOT NULL,
  `approvalDescription` varchar(255) NOT NULL,
  `moduleID` bigint(20) NOT NULL,
  `employeetypeID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_approval`
--

INSERT INTO `dm_approval` (`approvalID`, `approvalDescription`, `moduleID`, `employeetypeID`) VALUES
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
-- Table structure for table `dm_approvaldet`
--

CREATE TABLE `dm_approvaldet` (
  `approvaldetID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `approvalLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_approvaldet`
--

INSERT INTO `dm_approvaldet` (`approvaldetID`, `approvalID`, `employeeID`, `approvalLevel`) VALUES
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
-- Table structure for table `dm_approvalmodule`
--

CREATE TABLE `dm_approvalmodule` (
  `approvalmoduleID` bigint(20) NOT NULL,
  `moduleID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_approvalmodule`
--

INSERT INTO `dm_approvalmodule` (`approvalmoduleID`, `moduleID`) VALUES
(1, 7),
(2, 9),
(3, 10),
(4, 14),
(5, 16),
(6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `dm_bank`
--

CREATE TABLE `dm_bank` (
  `bankID` bigint(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `acctnoformat` varchar(50) NOT NULL,
  `bankstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_bank`
--

INSERT INTO `dm_bank` (`bankID`, `bankname`, `acctnoformat`, `bankstatus`) VALUES
(1, 'Metrobank', '0000-000-000-00', 'Active'),
(2, 'BPI', '000 000 00 000', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_client`
--

CREATE TABLE `dm_client` (
  `clientID` bigint(20) NOT NULL,
  `description` varchar(500) NOT NULL,
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
-- Dumping data for table `dm_client`
--

INSERT INTO `dm_client` (`clientID`, `description`, `clientstatus`, `clientname`, `housenumber`, `streetname`, `barangay`, `city`, `contactperson`, `activedetachmentpost`, `contactno`, `email`) VALUES
(1, 'A sprawling 25-hectare mega-community that combines office spaces luxury condominiums leisure amenities retail shops and', 'Active', 'Mactan Newton', '', 'Sapang Hari', 'Newtown Boulevard', 'Lapu-Lapu City', 'Jose Pacheco', 2, '0934-786-9877', 'jpachecho@gmail.com'),
(2, 'The country''s largest middle-income housing developer high-rise residential condominium developer and business process o', 'Active', 'Megaworld Corporation', '', 'Sen. Gil Puyat Avenue', 'San Isidro', 'Makati City', 'Arnulfo Policarpio', 3, '0995-345-3767', 'arn.arn_poli@gmail.com'),
(3, 'Eton', 'Active', 'Eton', '8th Floor', 'PNB Building', 'Bel-Air', 'Makati City', 'Dominador Arsenio', 2, '0956-896-8375', 'dom.arsenio@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dm_company`
--

CREATE TABLE `dm_company` (
  `companyID` bigint(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `Fax` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_company`
--

INSERT INTO `dm_company` (`companyID`, `company`, `contactperson`, `address`, `city`, `province`, `postalcode`, `email`, `phonenumber`, `mobilenumber`, `Fax`, `website`) VALUES
(1, 'DeltaMike Security Agency', 'Dominador Pacheco', '86 Sct Ojeda Street Diliman Quezon City', 'Quezon City', 'Metro Manila', '1103', 'dpachec@deltamikesekyu.com', '', '0987-095-4362', '63-12-09325838', 'deltamikesecurity.com');

-- --------------------------------------------------------

--
-- Table structure for table `dm_department`
--

CREATE TABLE `dm_department` (
  `departmentID` bigint(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `departmentstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_department`
--

INSERT INTO `dm_department` (`departmentID`, `description`, `departmentstatus`) VALUES
(1, 'IT Department', 'Active'),
(2, 'HR Department', 'Active'),
(3, 'Admin Department', 'Active'),
(4, 'Finance Department', 'Active'),
(5, 'Operations Department', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_designation`
--

CREATE TABLE `dm_designation` (
  `designationID` bigint(20) NOT NULL,
  `departmentID` int(11) NOT NULL,
  `designationdescription` varchar(50) NOT NULL,
  `designationstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_designation`
--

INSERT INTO `dm_designation` (`designationID`, `departmentID`, `designationdescription`, `designationstatus`) VALUES
(1, 1, 'IT Manager', 'Active'),
(2, 1, 'IT Programmer 1', 'Active'),
(3, 2, 'HR Specialist', 'Active'),
(4, 2, 'HR Assistant', 'Active'),
(5, 2, 'HR Director', 'Active'),
(6, 1, 'Software Quality Analyst Engineer', 'Active'),
(7, 3, 'Administrative Manager', 'Active'),
(8, 3, 'Administrative Assistant', 'Active'),
(9, 3, 'Membership Coordinator', 'Active'),
(10, 4, 'Financial Trainee', 'Active'),
(11, 4, 'Financial Manager', 'Active'),
(12, 4, 'Financial Consultant', 'Active'),
(13, 4, 'Financial Director', 'Active'),
(14, 1, 'Project Manager', 'Active'),
(15, 5, 'Security Guard', 'Active'),
(16, 5, 'Security Officer', 'Active'),
(17, 5, 'Detachment Commander', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_detachment`
--

CREATE TABLE `dm_detachment` (
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
-- Dumping data for table `dm_detachment`
--

INSERT INTO `dm_detachment` (`detachmentID`, `postname`, `housenumber`, `streetname`, `barangay`, `city`, `clientID`, `commander`, `startdate`, `enddate`, `noofguard`, `detachmentstatus`) VALUES
(1, 'Post 1', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', 1, 'Wilson Parajas', '2020-01-30', '2020-05-14', 5, 'Active'),
(2, 'Post 2', '', 'Sen. Gil Puyat', 'San Isidro', 'Makati City', 2, 'Jamie Capistrano', '2020-01-08', '2020-04-30', 3, 'Active'),
(3, 'Post 3', '8th Floor', 'PNB Building', 'Bel-Air', 'Makati City', 3, 'Post Malone', '2020-02-14', '2020-05-28', 6, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_employee`
--

CREATE TABLE `dm_employee` (
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
  `backaccountname` varchar(255) NOT NULL,
  `backaccountnumber` varchar(25) NOT NULL,
  `tinnumber` varchar(30) NOT NULL,
  `sssnumber` varchar(30) NOT NULL,
  `philhealthnumber` varchar(30) NOT NULL,
  `pagibignumber` varchar(30) NOT NULL,
  `employeestatus` varchar(20) NOT NULL,
  `employeetypeID` int(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `clientID` int(120) NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `dm_employee`
--

INSERT INTO `dm_employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `detachmentID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `backaccountname`, `backaccountnumber`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `employeetypeID`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Administrator', '', 'Account', 'Male', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '28/12/2019', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '2', 2, 1, 1, 'admin', 'admin', ' 10,000.0000', ' 500.0000', ' 0.0000', 'Wilson', '12', '', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', 1, '1.jpg', 1, '2019-11-25 08:26:51.905646'),
(2, 'Cardo', '', 'Dalisay', 'Female', '', 'Opel', '175', 'Caloocan', '1994-02-20', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '1', 1, 2, 2, 'staff', 'staff', ' 10,000.0000', ' 100.0000', '', '', '', '', '', '', '', 'Active', 0, '2.jpg', 0, '2019-11-25 08:26:54.102823'),
(3, 'John', '', 'Wick', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '07/10/2019', '0912-345-6789', 'Married', 'Fiipino', '2013-11-25', 1, '1', 0, 2, 2, 'exe', 'exe', ' 20,000.0000', ' 123,456,789.0000', '', 'SQWE RW', '243564323', '123-456-787', '23-4567893-2', '23-456787654-3', '5432-1234-5643', 'Active', 2, '3.png', 0, '2019-12-03 11:56:31.366887'),
(4, 'Shinra', '', 'Kusakabe', 'Male', '666', 'Station 8', 'Shinkai', 'Tokyo', '20/12/1998', '0966-623-4567', 'Single', 'Japanese', '23/09/2015', 1, '1', 1, 17, 0, 'ffgenki', 'password1234', ' 12,223.0000', ' 214.0000', ' 322.0000', 'BDO', '2343211', '', '12-31', '13-214325365-4', '3243-5436-5442', 'Active', 2, '4.png', 1, '2019-12-20 07:50:01.399405'),
(5, 'Curry Venti', 'The Cruise', 'Regionals', 'Female', '2811', 'Cup Point', 'Fashion Hall', 'Old Town Road', '2019-12-25', '3456-789-0987', 'Married', 'Italian', '2020-01-01', 1, '1', 1, 2, 0, 'currytheeggshell', 'nothingcanstopusnow', ' 1,321,324.0000', ' 1,232.0000', ' 21,422.0000', 'Curry Venti Regionas', '28201911155', '', '34-5654345-6', '45-654334567-6', '6534-5677-6543', 'Active', 2, '', 2, '2019-12-23 03:58:25.632917'),
(6, 'as asd', 'as fs', 'saf ', 'Male', 'asr3', 'sadsfsd', 'asdsad', 'asdsf a', '2019-12-25', '1234-567-7654', 'Single', 'Japanese', '2019-12-26', 1, '2', 2, 0, 0, '<b>j.doe</b>', 'qwerty', ' 12,321.0000', ' 234.0000', ' 2,112.0000', 'test account', '12421423', '123-546', '42-11234', '54-678645', '4323-456', 'Terminated', 1, '', 1, '2019-12-23 06:11:05.731548'),
(7, 'asdasd', 'asdq', 'sadrfsd', 'Male', '322', 'qe2 fd', 'd 3221f', '3 rwsdg', '02/01/2021', '2332-423-4354', 'Single', 'regg', '07/10/2019', 1, '2', 2, 2, 0, '', '', ' 231.0000', ' 54,633.0000', ' 2,142.0000', '35 rgff', '556354232', '678-765-476', '67-4675456-5', '56-546754676-5', '5676-5675-6765', 'Terminated', 1, '', 1, '2020-01-02 03:32:04.769082');

-- --------------------------------------------------------

--
-- Table structure for table `dm_employeecreditleave`
--

CREATE TABLE `dm_employeecreditleave` (
  `employeeleavecreditID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `leavetypeID` bigint(20) NOT NULL,
  `totalleave` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_employeecreditleave`
--

INSERT INTO `dm_employeecreditleave` (`employeeleavecreditID`, `employeeID`, `leavetypeID`, `totalleave`) VALUES
(5, 1, 1, 7),
(6, 1, 2, 5),
(7, 2, 0, 1),
(8, 2, 0, 1),
(9, 3, 3, 2),
(10, 3, 1, 0),
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
(61, 1, 1, 6),
(62, 4, 1, 5),
(63, 4, 4, 7),
(64, 4, 2, 9),
(65, 5, 5, 15),
(66, 5, 2, 20),
(67, 5, 3, 5),
(68, 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_employeeleave`
--

CREATE TABLE `dm_employeeleave` (
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
-- Dumping data for table `dm_employeeleave`
--

INSERT INTO `dm_employeeleave` (`employeeleaveID`, `leavetypeID`, `employeeID`, `leavefrom`, `leaveto`, `numberofdays`, `remainingleave`, `reason`) VALUES
(85, 1, 1, '06/12/2019', '03/12/2019', 0, 5, '3'),
(86, 1, 1, '22/12/2019', '22/12/2019', 1, 4, '1'),
(87, 1, 1, '10/12/2019', '12/12/2019', 3, 2, '1'),
(88, 2, 4, '15/01/2020', '15/01/2020', 1, 10, 'celebratinglife'),
(89, 1, 3, '15/01/2020', '15/01/2020', 1, 1, 'etsst');

-- --------------------------------------------------------

--
-- Table structure for table `dm_employeetype`
--

CREATE TABLE `dm_employeetype` (
  `employeetypeID` bigint(20) NOT NULL,
  `employeeTypeDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_employeetype`
--

INSERT INTO `dm_employeetype` (`employeetypeID`, `employeeTypeDescription`) VALUES
(1, 'Security Guard'),
(2, 'Office Staff');

-- --------------------------------------------------------

--
-- Table structure for table `dm_holiday`
--

CREATE TABLE `dm_holiday` (
  `holidayID` bigint(20) NOT NULL,
  `holidayname` varchar(60) DEFAULT NULL,
  `holidaydate` date DEFAULT NULL,
  `holidaytype` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dm_holiday`
--

INSERT INTO `dm_holiday` (`holidayID`, `holidayname`, `holidaydate`, `holidaytype`) VALUES
(1, 'Araw ng Kagitingan', '2020-04-09', 'Regular Holiday'),
(2, 'Maundy Thursday', '2020-04-09', 'Regular Holiday'),
(3, 'Good Friday', '2020-04-10', 'Regular Holiday'),
(4, 'Labor Day', '2020-05-01', 'Regular Holiday'),
(5, 'Independence Day', '2020-06-12', 'Regular Holiday'),
(6, 'National Heroes'' Day', '2020-08-31', 'Regular Holiday'),
(7, 'Bonifacio Day', '2020-11-30', 'Regular Holiday'),
(8, 'Christmas Day', '2020-12-25', 'Regular Holiday'),
(9, 'Rizal Day', '2020-12-30', 'Regular Holiday'),
(10, 'Chinese New Year', '2020-01-25', 'Special Non-working Holiday'),
(11, 'EDSA Revolution Anniversary', '2020-02-25', 'Special Non-working Holiday'),
(12, 'Black Saturday', '2020-04-11', 'Special Non-working Holiday'),
(13, 'Ninoy Aquino Day', '2020-08-21', 'Special Non-working Holiday'),
(14, 'All Saints'' Day', '2020-11-01', 'Special Non-working Holiday'),
(15, 'Feast of the Immaculate Concepcion of Mary', '2020-12-08', 'Special Non-working Holiday'),
(16, 'Last Day of the Year', '2020-12-31', 'Special Non-working Holiday'),
(17, 'All Soul''s Day', '2020-11-02', 'Special Non-working Holiday'),
(18, 'Christmas Eve', '2020-12-24', 'Special Non-working Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `dm_leavetype`
--

CREATE TABLE `dm_leavetype` (
  `leavetypeID` bigint(11) NOT NULL,
  `leavetypename` varchar(50) NOT NULL,
  `noofdays` int(11) NOT NULL,
  `accumulation` varchar(20) NOT NULL,
  `leavetypestatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_leavetype`
--

INSERT INTO `dm_leavetype` (`leavetypeID`, `leavetypename`, `noofdays`, `accumulation`, `leavetypestatus`) VALUES
(1, 'Sick Leave', 5, 'No', 'Active'),
(2, 'Vacation Leave', 5, 'No', 'Active'),
(3, 'Service Incentive Leave', 0, '', 'Active'),
(4, 'Paternity Leave', 1, 'No', 'Active'),
(5, 'Maternity Leave', 4, 'Yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loan`
--

CREATE TABLE `dm_loan` (
  `loanID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `loantypeID` int(11) NOT NULL,
  `dategranted` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enddate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `termofpaymentID` int(11) NOT NULL,
  `amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `dm_loan`
--

INSERT INTO `dm_loan` (`loanID`, `employeeID`, `loantypeID`, `dategranted`, `enddate`, `termofpaymentID`, `amount`, `deduction`, `balance`, `datecreated`) VALUES
(1, 1, 1, '21/11/2019', '08/02/2020', 1, '5,000.00', '400.00', '', '2019-11-20 06:19:30.733972'),
(2, 1, 2, '21/11/2019', '20/11/2019', 1, '2.00', '1.00', '', '2019-11-20 06:27:44.347017'),
(3, 4, 2, '15/01/2020', '14/02/2020', 1, '11,028.0000', '1,098.0000', '', '2019-12-21 07:08:25.393792'),
(4, 4, 1, '24/12/2019', '25/12/2019', 2, '122,342.0000', '32,423.0000', '', '2019-12-21 07:18:44.049330'),
(5, 3, 4, '20/12/2019', '01/12/2019', 2, '13,211.0000', '1,232.0000', '', '2019-12-21 07:37:43.622481'),
(6, 2, 3, '23/12/2019', '25/12/2019', 2, '5,500.0000', '55,000.0000', '', '2019-12-21 07:48:17.549156'),
(7, 3, 3, '18/12/2019', '19/12/2019', 2, '21,312.0000', '0.0000', '', '2019-12-21 07:56:02.290219'),
(8, 3, 2, '20/12/2019', '27/12/2019', 2, '0.0000', '12,321.0000', '', '2019-12-21 07:57:19.454716'),
(9, 4, 1, '18/12/2019', '26/12/2019', 2, '21,312.0000', '0.0000', '', '2019-12-21 08:00:44.984454'),
(10, 5, 2, '25/12/2019', '15/01/2020', 1, '12,130.0000', '1,500.0000', '', '2019-12-24 01:16:36.871312'),
(11, 4, 2, '26/02/2020', '14/05/2020', 1, ' 12.0000', ' 12,312.0000', '', '2019-12-24 01:22:15.033243'),
(12, 4, 3, '13/12/2019', '24/01/2020', 2, '12.0000', '12,321.0000', '', '2019-12-24 01:23:33.097915');

-- --------------------------------------------------------

--
-- Table structure for table `dm_modulemstr`
--

CREATE TABLE `dm_modulemstr` (
  `moduleID` bigint(20) NOT NULL,
  `moduleDescription` varchar(255) NOT NULL,
  `moduleShortDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_modulemstr`
--

INSERT INTO `dm_modulemstr` (`moduleID`, `moduleDescription`, `moduleShortDesc`) VALUES
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
-- Table structure for table `dm_overtime`
--

CREATE TABLE `dm_overtime` (
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
-- Dumping data for table `dm_overtime`
--

INSERT INTO `dm_overtime` (`overtimeID`, `employeeID`, `description`, `overtimedate`, `starttime`, `endtime`, `totalhour`, `datecreated`, `dateupdated`) VALUES
(1, 2, '11', '14/11/2019', '02:00 AM', '07:30 AM', '05:00', '13/11/2019 11:41 AM', '13/11/2019 01:46 PM'),
(3, 1, '7111', '14/11/2019', '02:30 AM', '10:00 AM', '07:30', '13/11/2019 01:47 PM', '13/11/2019 02:06 PM'),
(4, 1, 'hhh1', '18/11/2019', '02:30 AM', '03:00 AM', '1:30', '18/11/2019 05:20 PM', ''),
(5, 1, 'jn', '19/11/2019', '08:00', '05:30', '0:0', '18/11/2019 05:25 PM', ''),
(6, 1, 'adawdw', '20/11/2019', '18:00', '13:30', '0:0', '18/11/2019 05:26 PM', ''),
(7, 1, 'wseqwqe', '22/11/2019', '11:11', '14:14', '3:3', '19/11/2019 09:02 AM', ''),
(8, 5, 'weewew232', '28/11/2019', '11:11 AM', '03:33 PM', '04:22', '', ''),
(9, 3, '1112', '28/11/2019', '08:08 AM', '09:30 AM', '1:22', '', ''),
(10, 3, '121', '21/11/2019', '11:11', '16:21', '5:10', '', ''),
(11, 3, 'aeew', '29/11/2019', '11:11', '14:11', '3:0', '', ''),
(12, 3, 'Satruday work', '21/12/2019', '07:30', '17:30', '', '', ''),
(13, 2, 'Christmas work', '24/12/2019', '07:30', '17:30', '', '', ''),
(14, 3, 'trial', '15/01/2020', '12:00', '15:00', '', '', ''),
(15, 1, 'try', '10/09/2020', '17:00', '20:00', '', '', ''),
(16, 2, 'trial', '25/12/2019', '23:00', '23:59', '', '', ''),
(17, 3, '"T3st!n6''', '25/12/2019', '17:00', '21:00', '', '', ''),
(18, 2, '"try', '17/12/2019', '12:14', '18:34', '', '', ''),
(19, 4, 'try', '2019-12-25', '08:30', '10:45', '2:15', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dm_payroll`
--

CREATE TABLE `dm_payroll` (
  `payrollID` bigint(20) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_payroll`
--

INSERT INTO `dm_payroll` (`payrollID`, `datefrom`, `dateto`) VALUES
(1, '2020-01-01', '2020-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `dm_payrolldetails`
--

CREATE TABLE `dm_payrolldetails` (
  `payrolldetailsID` bigint(20) NOT NULL,
  `payrollID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `daysofwork` decimal(10,1) NOT NULL,
  `regularhours` decimal(10,2) NOT NULL,
  `overtimehours` decimal(10,4) NOT NULL,
  `dailyrate` decimal(10,4) NOT NULL,
  `hourlyrate` decimal(10,4) NOT NULL,
  `basicpay` decimal(10,4) NOT NULL,
  `ordinaryot` decimal(10,4) NOT NULL,
  `restot` decimal(10,4) NOT NULL,
  `specialot` decimal(10,4) NOT NULL,
  `specialrestot` decimal(10,4) NOT NULL,
  `regularot` decimal(10,4) NOT NULL,
  `regularrestot` decimal(10,4) NOT NULL,
  `doubleot` decimal(10,4) NOT NULL,
  `doublerestot` decimal(10,4) NOT NULL,
  `cola` decimal(10,4) NOT NULL,
  `incentives` decimal(10,4) NOT NULL,
  `nightdiff` decimal(10,4) NOT NULL,
  `uniformallowance` decimal(10,4) NOT NULL,
  `wtax` decimal(10,4) NOT NULL,
  `sss` decimal(10,4) NOT NULL,
  `phic` decimal(10,4) NOT NULL,
  `hdmf` decimal(10,4) NOT NULL,
  `sssloan` decimal(10,4) NOT NULL,
  `hdmfloan` decimal(10,4) NOT NULL,
  `netpay` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_philhealthtable`
--

CREATE TABLE `dm_philhealthtable` (
  `philhealthID` int(11) NOT NULL,
  `belowrange` varchar(50) NOT NULL,
  `aboverange` varchar(50) NOT NULL,
  `percent` decimal(3,2) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_philhealthtable`
--

INSERT INTO `dm_philhealthtable` (`philhealthID`, `belowrange`, `aboverange`, `percent`, `employer`, `employee`, `total`) VALUES
(1, '1.0000', '8,999.0000', '3.00', '100.0000', '100.0000', '200.0000'),
(5, '9,000.0000', '9,999.9900', '3.00', '112.5000', '112.5000', '225.0000'),
(6, '10,000.0000', '10,999.9900', '3.00', '125.0000', '125.0000', '250.0000'),
(7, '11,000.0000', '11,999.9900', '3.00', '137.5000', '137.5000', '275.0000'),
(8, '12,000.0000', '12,999.9900', '3.00', '150.0000', '150.0000', '300.0000'),
(9, '13,000.0000', '13,999.9900', '3.00', '162.5000', '162.5000', '325.0000'),
(10, '14,000.0000', '14,999.9900', '3.00', '175.0000', '175.0000', '350.0000'),
(11, '15,000.0000', '15,999.9900', '3.00', '187.5000', '187.5000', '375.0000'),
(12, '16,000.0000', '16,999.9900', '3.00', '200.0000', '200.0000', '400.0000'),
(13, '17,000.0000', '17,999.9900', '3.00', '212.5000', '212.5000', '425.0000'),
(14, '18,000.0000', '18,999.9900', '3.00', '225.0000', '225.0000', '450.0000'),
(15, '19,000.0000', '19,999.9900', '3.00', '237.5000', '237.5000', '475.0000'),
(16, '20,000.0000', '20,999.9900', '3.00', '250.0000', '250.0000', '500.0000'),
(17, '21,000.0000', '21,999.9900', '3.00', '262.5000', '262.5000', '525.0000'),
(18, '22,000.0000', '22,999.9900', '3.00', '275.0000', '275.0000', '550.0000'),
(19, '23,000.0000', '23,999.9900', '3.00', '287.5000', '287.5000', '575.0000'),
(20, '24,000.0000', '24,999.9900', '3.00', '300.0000', '300.0000', '600.0000'),
(21, '25,000.0000', '25,999.9900', '3.00', '312.5000', '312.5000', '625.0000'),
(22, '26,000.0000', '26,999.9900', '3.00', '325.0000', '325.0000', '650.0000'),
(23, '27,000.0000', '27,999.9900', '3.00', '337.5000', '337.5000', '675.0000'),
(24, '28,000.0000', '28,999.9900', '3.00', '350.0000', '350.0000', '700.0000'),
(25, '29,000.0000', '29,999.9900', '3.00', '362.5000', '362.5000', '725.0000'),
(26, '30,000.0000', '30,999.9900', '3.00', '375.0000', '375.0000', '750.0000'),
(27, '31,000.0000', '31,999.9900', '3.00', '387.5000', '387.5000', '775.0000'),
(28, '32,000.0000', '32,999.9900', '3.00', '400.0000', '400.0000', '800.0000'),
(29, '33,000.0000', '33,999.9900', '3.00', '412.5000', '412.5000', '825.0000'),
(30, '34,000.0000', '34,999.9900', '3.00', '425.0000', '425.0000', '850.0000'),
(31, '35,000.0000', '9,999,999.9900', '3.00', '437.5000', '437.5000', '875.0000');

-- --------------------------------------------------------

--
-- Table structure for table `dm_rolemodule`
--

CREATE TABLE `dm_rolemodule` (
  `ID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `moduleID` bigint(20) NOT NULL,
  `modulestatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_rolemodule`
--

INSERT INTO `dm_rolemodule` (`ID`, `roleID`, `moduleID`, `modulestatus`) VALUES
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
(97, 12, 25, 0),
(98, 13, 1, 1),
(99, 13, 2, 1),
(100, 13, 3, 1),
(101, 13, 4, 0),
(102, 13, 5, 0),
(103, 13, 6, 0),
(104, 13, 7, 0),
(105, 13, 8, 0),
(106, 13, 9, 0),
(107, 13, 10, 0),
(108, 13, 11, 0),
(109, 13, 12, 0),
(110, 13, 13, 0),
(111, 13, 14, 0),
(112, 13, 15, 0),
(113, 13, 16, 0),
(114, 13, 17, 0),
(115, 13, 18, 0),
(116, 13, 19, 0),
(117, 13, 20, 0),
(118, 13, 21, 0),
(119, 13, 22, 0),
(120, 13, 23, 0),
(121, 13, 24, 0),
(122, 13, 25, 0),
(123, 13, 1, 0),
(124, 13, 2, 0),
(125, 13, 3, 0),
(126, 13, 4, 0),
(127, 13, 5, 0),
(128, 13, 6, 0),
(129, 13, 7, 0),
(130, 13, 8, 0),
(131, 13, 9, 0),
(132, 13, 10, 0),
(133, 13, 11, 0),
(134, 13, 12, 0),
(135, 13, 13, 0),
(136, 13, 14, 0),
(137, 13, 15, 0),
(138, 13, 16, 0),
(139, 13, 17, 0),
(140, 13, 18, 0),
(141, 13, 19, 0),
(142, 13, 20, 0),
(143, 13, 21, 0),
(144, 13, 22, 0),
(145, 13, 23, 0),
(146, 13, 24, 0),
(147, 13, 25, 0),
(148, 14, 1, 0),
(149, 14, 2, 0),
(150, 14, 3, 0),
(151, 14, 4, 0),
(152, 14, 5, 0),
(153, 14, 6, 0),
(154, 14, 7, 0),
(155, 14, 8, 0),
(156, 14, 9, 0),
(157, 14, 10, 0),
(158, 14, 11, 0),
(159, 14, 12, 0),
(160, 14, 13, 0),
(161, 14, 14, 0),
(162, 14, 15, 0),
(163, 14, 16, 0),
(164, 14, 17, 0),
(165, 14, 18, 0),
(166, 14, 19, 0),
(167, 14, 20, 0),
(168, 14, 21, 0),
(169, 14, 22, 0),
(170, 14, 23, 0),
(171, 14, 24, 0),
(172, 14, 25, 0),
(173, 15, 1, 1),
(174, 15, 2, 1),
(175, 15, 3, 1),
(176, 15, 4, 1),
(177, 15, 5, 1),
(178, 15, 6, 0),
(179, 15, 7, 0),
(180, 15, 8, 0),
(181, 15, 9, 0),
(182, 15, 10, 0),
(183, 15, 11, 0),
(184, 15, 12, 0),
(185, 15, 13, 0),
(186, 15, 14, 0),
(187, 15, 15, 0),
(188, 15, 16, 0),
(189, 15, 17, 0),
(190, 15, 18, 0),
(191, 15, 19, 0),
(192, 15, 20, 0),
(193, 15, 21, 0),
(194, 15, 22, 0),
(195, 15, 23, 0),
(196, 15, 24, 0),
(197, 15, 25, 0),
(198, 16, 1, 0),
(199, 16, 2, 0),
(200, 16, 3, 0),
(201, 16, 4, 0),
(202, 16, 5, 0),
(203, 16, 6, 0),
(204, 16, 7, 0),
(205, 16, 8, 0),
(206, 16, 9, 0),
(207, 16, 10, 0),
(208, 16, 11, 0),
(209, 16, 12, 0),
(210, 16, 13, 0),
(211, 16, 14, 0),
(212, 16, 15, 0),
(213, 16, 16, 0),
(214, 16, 17, 0),
(215, 16, 18, 0),
(216, 16, 19, 0),
(217, 16, 20, 0),
(218, 16, 21, 0),
(219, 16, 22, 0),
(220, 16, 23, 0),
(221, 16, 24, 0),
(222, 16, 25, 0),
(223, 17, 1, 1),
(224, 17, 2, 1),
(225, 17, 3, 1),
(226, 17, 4, 0),
(227, 17, 5, 1),
(228, 17, 6, 1),
(229, 17, 7, 1),
(230, 17, 8, 1),
(231, 17, 9, 0),
(232, 17, 10, 0),
(233, 17, 11, 0),
(234, 17, 12, 0),
(235, 17, 13, 0),
(236, 17, 14, 0),
(237, 17, 15, 0),
(238, 17, 16, 0),
(239, 17, 17, 0),
(240, 17, 18, 0),
(241, 17, 19, 0),
(242, 17, 20, 0),
(243, 17, 21, 0),
(244, 17, 22, 0),
(245, 17, 23, 0),
(246, 17, 24, 0),
(247, 17, 25, 0),
(248, 18, 1, 0),
(249, 18, 2, 0),
(250, 18, 3, 0),
(251, 18, 4, 0),
(252, 18, 5, 0),
(253, 18, 6, 0),
(254, 18, 7, 0),
(255, 18, 8, 0),
(256, 18, 9, 0),
(257, 18, 10, 0),
(258, 18, 11, 0),
(259, 18, 12, 0),
(260, 18, 13, 0),
(261, 18, 14, 0),
(262, 18, 15, 0),
(263, 18, 16, 0),
(264, 18, 17, 0),
(265, 18, 18, 0),
(266, 18, 19, 0),
(267, 18, 20, 0),
(268, 18, 21, 0),
(269, 18, 22, 0),
(270, 18, 23, 0),
(271, 18, 24, 0),
(272, 18, 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_rolemstr`
--

CREATE TABLE `dm_rolemstr` (
  `roleID` bigint(20) NOT NULL,
  `roleDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_rolemstr`
--

INSERT INTO `dm_rolemstr` (`roleID`, `roleDescription`) VALUES
(1, 'Administrator'),
(2, 'Employee'),
(11, '1234567'),
(12, 'test account'),
(15, 'Plumber'),
(16, 'Astronaut'),
(17, 'Firefighter');

-- --------------------------------------------------------

--
-- Table structure for table `dm_schedule`
--

CREATE TABLE `dm_schedule` (
  `scheduleID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `restday` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_ssstable`
--

CREATE TABLE `dm_ssstable` (
  `sssID` int(11) NOT NULL,
  `belowrange` varchar(50) NOT NULL,
  `aboverange` varchar(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_ssstable`
--

INSERT INTO `dm_ssstable` (`sssID`, `belowrange`, `aboverange`, `employer`, `employee`, `total`) VALUES
(1, '1,000.0000', '1,249.9900', '73.7000', '36.3000', '110.0000'),
(2, '1,250.0000', '1,749.9900', '110.5000', '54.5000', '165.0000'),
(3, '1,750.0000', '2,249.9900', '147.3000', '72.7000', '220.0000'),
(4, '2,250.0000', '2,749.9900', '184.2000', '90.8000', '275.0000'),
(5, '2,750.0000', '3,249.9900', '221.0000', '109.0000', '330.0000'),
(6, '3,250.0000', '3,749.9900', '257.8000', '127.2000', '385.0000'),
(7, '3,750.0000', '4,249.9900', '294.7000', '145.3000', '440.0000'),
(8, '4,250.0000', '4,749.9900', '331.5000', '163.5000', '495.0000'),
(9, '4,750.0000', '5,249.9900', '368.3000', '181.7000', '550.0000'),
(10, '5,250.0000', '5,749.9900', '405.2000', '199.8000', '605.0000'),
(11, '5,750.0000', '6,249.9900', '442.0000', '218.0000', '660.0000'),
(12, '6,250.0000', '6,749.9900', '478.8000', '236.2000', '715.0000'),
(13, '6,750.0000', '7,249.9900', '515.7000', '254.3000', '770.0000'),
(14, '7,250.0000', '7,749.9900', '552.5000', '272.5000', '825.0000'),
(15, '7,750.0000', '8,249.9900', '589.3000', '290.7000', '880.0000'),
(16, '8,250.0000', '8,749.9900', '626.2000', '308.8000', '935.0000'),
(17, '8,750.0000', '9,249.9900', '663.0000', '327.0000', '990.0000'),
(18, '9,250.0000', '9,749.9900', '699.8000', '345.2000', '1,045.0000'),
(19, '9,750.0000', '10,249.9900', '736.7000', '363.3000', '1,100.0000'),
(20, '10,250.0000', '10,749.9900', '773.5000', '381.5000', '1,155.0000'),
(21, '10,750.0000', '11,249.9900', '810.3000', '399.7000', '1,210.0000'),
(22, '11,250.0000', '11,749.9900', '847.2000', '417.8000', '1,265.0000'),
(23, '11,750.0000', '12,249.9900', '884.0000', '436.0000', '1,320.0000'),
(24, '12,250.0000', '12,749.9900', '920.8000', '454.2000', '1,375.0000'),
(25, '12,750.0000', '13,249.9900', '957.7000', '472.3000', '1,430.0000'),
(26, '13,250.0000', '13,749.9900', '994.5000', '490.5000', '1,485.0000'),
(27, '13,750.0000', '14,249.9900', '1,031.3000', '508.7000', '1,540.0000'),
(28, '14,250.0000', '14,749.9900', '1,068.2000', '526.8000', '1,595.0000'),
(29, '14,750.0000', '15,249.9900', '1,105.0000', '545.0000', '1,650.0000'),
(30, '15,250.0000', '15,749.9900', '1,141.8000', '563.2000', '1,705.0000'),
(31, '15,750.0000', '9,999,999.9900', '1,178.7000', '581.3000', '1,760.0000'),
(32, '14,234.0000', '213.0000', '1,244.0000', '22.0000', '1,266.0000');

-- --------------------------------------------------------

--
-- Table structure for table `dm_taxtable`
--

CREATE TABLE `dm_taxtable` (
  `taxID` int(11) NOT NULL,
  `belowrange` varchar(30) NOT NULL,
  `aboverange` varchar(30) NOT NULL,
  `additionaltax` varchar(30) NOT NULL,
  `percent` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_taxtable`
--

INSERT INTO `dm_taxtable` (`taxID`, `belowrange`, `aboverange`, `additionaltax`, `percent`) VALUES
(1, '1.0000', '10,416.0000', '1.0000', '0'),
(2, '10,417.0000', '16,666.0000', '1.0000', '20'),
(5, '16,667.0000', '33,332.0000', '1,250.0000', '25'),
(6, '33,333.0000', '83,332.0000', '5,416.6700', '30'),
(7, '83,333.0000', '333,332.0000', '20,416.6700', '32'),
(8, '333,333.0000', '9,999,999.9900', '100,416.6700', '35'),
(9, '11.0000', '11.0000', '1.0000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dm_timesheet`
--

CREATE TABLE `dm_timesheet` (
  `timesheetID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `datesched` date NOT NULL,
  `regularhours` decimal(10,2) NOT NULL,
  `othours` decimal(10,2) NOT NULL,
  `nightdiff` decimal(10,2) NOT NULL,
  `late` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_approval`
--
ALTER TABLE `dm_approval`
  ADD PRIMARY KEY (`approvalID`);

--
-- Indexes for table `dm_approvaldet`
--
ALTER TABLE `dm_approvaldet`
  ADD PRIMARY KEY (`approvaldetID`);

--
-- Indexes for table `dm_approvalmodule`
--
ALTER TABLE `dm_approvalmodule`
  ADD PRIMARY KEY (`approvalmoduleID`);

--
-- Indexes for table `dm_bank`
--
ALTER TABLE `dm_bank`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `dm_client`
--
ALTER TABLE `dm_client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `dm_company`
--
ALTER TABLE `dm_company`
  ADD PRIMARY KEY (`companyID`);

--
-- Indexes for table `dm_department`
--
ALTER TABLE `dm_department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `dm_designation`
--
ALTER TABLE `dm_designation`
  ADD PRIMARY KEY (`designationID`);

--
-- Indexes for table `dm_detachment`
--
ALTER TABLE `dm_detachment`
  ADD PRIMARY KEY (`detachmentID`);

--
-- Indexes for table `dm_employeecreditleave`
--
ALTER TABLE `dm_employeecreditleave`
  ADD PRIMARY KEY (`employeeleavecreditID`);

--
-- Indexes for table `dm_employeeleave`
--
ALTER TABLE `dm_employeeleave`
  ADD PRIMARY KEY (`employeeleaveID`);

--
-- Indexes for table `dm_employeetype`
--
ALTER TABLE `dm_employeetype`
  ADD PRIMARY KEY (`employeetypeID`);

--
-- Indexes for table `dm_holiday`
--
ALTER TABLE `dm_holiday`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `dm_leavetype`
--
ALTER TABLE `dm_leavetype`
  ADD PRIMARY KEY (`leavetypeID`);

--
-- Indexes for table `dm_modulemstr`
--
ALTER TABLE `dm_modulemstr`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `dm_overtime`
--
ALTER TABLE `dm_overtime`
  ADD PRIMARY KEY (`overtimeID`);

--
-- Indexes for table `dm_payroll`
--
ALTER TABLE `dm_payroll`
  ADD PRIMARY KEY (`payrollID`);

--
-- Indexes for table `dm_payrolldetails`
--
ALTER TABLE `dm_payrolldetails`
  ADD PRIMARY KEY (`payrolldetailsID`);

--
-- Indexes for table `dm_philhealthtable`
--
ALTER TABLE `dm_philhealthtable`
  ADD PRIMARY KEY (`philhealthID`);

--
-- Indexes for table `dm_rolemodule`
--
ALTER TABLE `dm_rolemodule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dm_rolemstr`
--
ALTER TABLE `dm_rolemstr`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `dm_schedule`
--
ALTER TABLE `dm_schedule`
  ADD PRIMARY KEY (`scheduleID`);

--
-- Indexes for table `dm_ssstable`
--
ALTER TABLE `dm_ssstable`
  ADD PRIMARY KEY (`sssID`);

--
-- Indexes for table `dm_taxtable`
--
ALTER TABLE `dm_taxtable`
  ADD PRIMARY KEY (`taxID`);

--
-- Indexes for table `dm_timesheet`
--
ALTER TABLE `dm_timesheet`
  ADD PRIMARY KEY (`timesheetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_bank`
--
ALTER TABLE `dm_bank`
  MODIFY `bankID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_company`
--
ALTER TABLE `dm_company`
  MODIFY `companyID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_holiday`
--
ALTER TABLE `dm_holiday`
  MODIFY `holidayID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dm_payroll`
--
ALTER TABLE `dm_payroll`
  MODIFY `payrollID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_payrolldetails`
--
ALTER TABLE `dm_payrolldetails`
  MODIFY `payrolldetailsID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_schedule`
--
ALTER TABLE `dm_schedule`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_timesheet`
--
ALTER TABLE `dm_timesheet`
  MODIFY `timesheetID` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
