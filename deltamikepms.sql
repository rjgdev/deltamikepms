-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 03:39 AM
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
-- Table structure for table `dm_approval`
--

CREATE TABLE `dm_approval` (
  `approvalID` bigint(20) NOT NULL,
  `approvalDescription` varchar(255) NOT NULL,
  `moduleID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_approval`
--

INSERT INTO `dm_approval` (`approvalID`, `approvalDescription`, `moduleID`) VALUES
(1, 'Timekeeping', 7),
(2, 'Payroll Process', 9),
(3, 'Payroll Adjustment', 10),
(4, '13th Month Process', 14),
(5, 'Retirement Process', 16),
(6, 'Billing Statement', 18);

-- --------------------------------------------------------

--
-- Table structure for table `dm_approvaldet`
--

CREATE TABLE `dm_approvaldet` (
  `approvaldetID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `approvalLevel` int(11) NOT NULL,
  `lastapprover` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_approvaldet`
--

INSERT INTO `dm_approvaldet` (`approvaldetID`, `approvalID`, `employeeID`, `approvalLevel`, `lastapprover`) VALUES
(25, 3, 11, 1, 1),
(39, 1, 2, 1, 0),
(40, 1, 3, 2, 1),
(56, 4, 4, 1, 0),
(57, 4, 3, 2, 1),
(65, 5, 3, 1, 1),
(66, 6, 3, 1, 1),
(75, 2, 2, 1, 0),
(76, 2, 1, 2, 1);

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
(3, 'Eton', 'Active', 'Eton', '8th Floor', 'PNB Building', 'Bel-Air', 'Makati City', 'Dominador Arsenio', 2, '0956-896-8375', 'dom.arsenio@gmail.com'),
(4, '', 'Active', 'GTC', '', 'Dona Julia Vargas', 'San Antonio', 'Pasig City', 'CarlMark', 3, '7658-554-6766', 'cmar@gtcnow.com'),
(5, '', 'Active', 'daw', '', 'wadaw', 'dwadaw', 'dwad', 'dawdawd', 0, '2', 'robinjamin.gelilio.gtc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `dm_company`
--

CREATE TABLE `dm_company` (
  `companyID` bigint(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `contactperson` varchar(255) NOT NULL,
  `unitno` varchar(255) NOT NULL,
  `bldgname` varchar(255) NOT NULL,
  `streetname` varchar(255) NOT NULL,
  `subdivisionname` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `tinno` varchar(255) NOT NULL,
  `sssno` varchar(255) NOT NULL,
  `phic` varchar(255) NOT NULL,
  `pagibig` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `Fax` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_company`
--

INSERT INTO `dm_company` (`companyID`, `company`, `contactperson`, `unitno`, `bldgname`, `streetname`, `subdivisionname`, `barangay`, `municipality`, `province`, `zipcode`, `tinno`, `sssno`, `phic`, `pagibig`, `email`, `phonenumber`, `mobilenumber`, `Fax`, `website`) VALUES
(1, 'Deltamike Security Inc', 'Billy Pascua', '86', 'Antel Global Corporate', 'Opel', 'Brixtonville', '175', 'Caloocan', 'Metro Manila', '1103', '111-111-111', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'billypascua@deltamikesecurity.com', '55-55555-5555', '0912-345-6789', '66-66-66666666', 'deltamikesecurity.com');

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
(5, 'Operations Department', 'Active'),
(6, 'Utility Department', 'Active');

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
(17, 5, 'Detachment Commander', 'Active'),
(18, 6, 'Utility Officer', 'Inactive');

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
  `birthdate` date NOT NULL,
  `contactinfo` varchar(30) NOT NULL,
  `civilstatus` varchar(30) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `hireddate` date NOT NULL,
  `departmentID` int(11) NOT NULL,
  `designationID` varchar(50) NOT NULL,
  `detachmentID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `basicsalary` decimal(15,4) NOT NULL,
  `dailyrate` decimal(15,4) NOT NULL,
  `allowance` decimal(15,4) NOT NULL,
  `retfund` decimal(15,4) NOT NULL,
  `incentive` decimal(15,4) NOT NULL,
  `uniformallowance` decimal(15,4) NOT NULL,
  `bankname` bigint(20) NOT NULL,
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

INSERT INTO `dm_employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `detachmentID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `retfund`, `incentive`, `uniformallowance`, `bankname`, `backaccountname`, `backaccountnumber`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `employeetypeID`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Administrator', '', 'Account', 'Male', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '2020-01-21', '0927-947-5792', 'Single', 'Filipino', '2011-03-14', 1, '2', 0, 1, 1, 'admin', 'admin', '102000.0000', '4636.3636', '500.0000', '222222.0000', '0.0000', '0.0000', 1, '', '12', '666-666-666', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', 2, '1.jpg', 0, '2019-11-25 08:26:51.905646'),
(2, 'Cardo', '', 'Dalisay', 'Female', '', 'Opel', '175', 'Caloocan', '2020-02-20', '0927-947-5792', 'Single', 'Filipino', '2014-06-25', 6, '18', 3, 2, 2, 'staff', 'staff', '10.0000', '386.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 1, '2.jpg', 3, '2019-11-25 08:26:54.102823'),
(3, 'John', '', 'Wick', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '0000-00-00', '0912-345-6789', 'Married', 'Fiipino', '0000-00-00', 1, '1', 1, 2, 2, 'exe', 'exe', '20.0000', '620.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, 'SQWE RW', '243564323', '', '23-4567893-2', '23-456787654-3', '5432-1234-5643', 'Active', 1, '3.jpg', 1, '2019-12-03 11:56:31.366887'),
(4, 'Shinra', '', 'Kusakabe', 'Male', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', '0000-00-00', '0966-623-4567', 'Single', 'Japanese', '0000-00-00', 1, '1', 0, 2, 0, 'test', 'test', '12.0000', '214.0000', '322.0000', '0.0000', '0.0000', '0.0000', 0, 'BDO', '2343211', '', '12-31', '13-214325365-4', '3243-5436-5442', 'Active', 2, '4.jpg', 0, '2019-12-20 07:50:01.399405'),
(5, 'Curry Venti', 'The Cruise', 'Regionals', 'Female', '2811', 'Cup Point', 'Fashion Hall', 'Old Town Road', '0000-00-00', '3456-789-0987', 'Married', 'Italian', '0000-00-00', 1, '1', 0, 2, 0, 'c', 'c', '1.0000', '1.0000', '21.0000', '0.0000', '0.0000', '0.0000', 0, 'Curry Venti Regionas', '28201911155', '000-000-000', '34-5654345-6', '45-654334567-6', '6534-5677-6543', 'Active', 2, '', 0, '2019-12-23 03:58:25.632917'),
(6, 'as asd', 'as fs', 'saf ', 'Male', 'asr3', 'sadsfsd', 'asdsad', 'asdsf a', '0000-00-00', '1234-567-7654', 'Single', 'Japanese', '0000-00-00', 1, '2', 2, 2, 0, '<b>j.doe</b>', 'qwerty', '12.0000', '234.0000', '2.0000', '0.0000', '0.0000', '0.0000', 0, 'test account', '12421423', '123-546', '42-11234', '54-678645', '4323-456', 'Terminated', 1, '', 1, '2019-12-23 06:11:05.731548'),
(7, 'asdasd', 'asdq', 'sadrfsd', 'Male', '322', 'qe2 fd', 'd 3221f', '3 rwsdg', '0000-00-00', '2332-423-4354', 'Single', 'regg', '0000-00-00', 1, '2', 2, 2, 0, '', '', '231.0000', '54.0000', '2.0000', '0.0000', '0.0000', '0.0000', 0, '35 rgff', '556354232', '678-765-476', '67-4675456-5', '56-546754676-5', '5676-5675-6765', 'End of Contract', 1, '', 1, '2020-01-02 03:32:04.769082'),
(8, 'TEST', '', 'TEST', 'Male', '', 'TEST', 'TEST', 'TEST', '0000-00-00', '1111-111-1111', 'Single', 'TEST', '0000-00-00', 5, '15', 1, 2, 0, '', '', '1.0000', '1.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Resigned', 1, '', 1, '2020-01-09 11:36:25.875891'),
(9, 'SAMPLE', '', 'SAMPLE', 'Male', '', 'SAMPLE', 'SAMPLE', 'SAMPLE', '0000-00-00', '1111-111-1111', 'Single', 'SAMPLE', '0000-00-00', 1, '1', 0, 2, 0, '', '', '2.0000', '2.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 11:40:54.965467'),
(10, 'JUAN', '', 'JUAN', 'Male', '', 'JUAN', 'JUAN', 'JUAN', '0000-00-00', '1111-111-1111', 'Single', 'JUAN', '0000-00-00', 1, '1', 0, 2, 0, '', '', '2.0000', '2.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 11:46:07.385507'),
(11, 'WEW', '', 'WEW', 'Male', 'WEW', 'WEW', 'WEW', 'WEW', '0000-00-00', '1111-111-1111', 'Single', 'WEW', '0000-00-00', 1, '1', 0, 2, 0, '', '', '1.0000', '1.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 11:50:25.340515'),
(12, 'WOW', '', 'WOW', 'Male', '', 'WOW', 'WOW', 'WOW', '0000-00-00', '1111-111-1111', 'Single', 'WOW', '0000-00-00', 1, '1', 0, 2, 0, '', '', '3.0000', '3.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 11:53:12.623726'),
(13, 'YEY', '', 'YEY', 'Male', '', 'YEY', 'YEY', 'YEY', '0000-00-00', '1111-111-1111', 'Single', 'YEY', '0000-00-00', 1, '1', 0, 2, 0, '', '', '5.0000', '5.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 11:54:58.434185'),
(14, 'law', '', 'law', 'Female', '', 'law', 'law', 'law', '0000-00-00', '2222-222-2222', 'Single', 'law', '0000-00-00', 1, '1', 0, 2, 0, '', '', '23.0000', '14.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-09 13:11:56.434744'),
(15, 'kik', '', 'kik', 'Male', 'kik', 'kik', 'kik', 'kik', '0000-00-00', '1111-111-1111', 'Single', 'kik', '0000-00-00', 1, '1', 0, 2, 0, '', '', '1.0000', '1.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '', '', '', '', 'Active', 2, '', 0, '2020-01-10 06:36:31.166842'),
(16, 'EMP', '', 'EMP', 'Male', '', 'EMP', 'EMP', 'EMP', '0000-00-00', '1111-111-1111', 'Single', 'EMP', '0000-00-00', 1, '1', 0, 2, 0, '', '', '123456.7800', '876543.2100', '1111.0000', '2222.0000', '4444.0000', '3333.0000', 2, 'BANK ACCOUNTNAME', '0000000000', '666-666-666', '77-7777777-7', '88-888888888-8', '6666-6666-6666', 'Active', 2, '', 0, '2020-01-10 09:25:43.559167');

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
(13, 5, 2, 1),
(14, 5, 2, 4),
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
(68, 7, 2, 1),
(69, 9, 1, 1),
(70, 12, 1, 5);

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
  `dategranted` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enddate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `termofpaymentID` int(11) NOT NULL,
  `amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` int(11) NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `dm_loan`
--

INSERT INTO `dm_loan` (`loanID`, `employeeID`, `loantypeID`, `dategranted`, `enddate`, `termofpaymentID`, `amount`, `deduction`, `balance`, `paid`, `datecreated`) VALUES
(1, 1, 1, '21/11/2019', '08/02/2020', 1, '5,000.00', '400.00', '', 0, '2019-11-20 06:19:30.733972'),
(2, 1, 2, '21/11/2019', '20/11/2019', 1, '2.00', '1.00', '', 0, '2019-11-20 06:27:44.347017'),
(3, 4, 2, '15/01/2020', '14/02/2020', 1, '11,028.0000', '1,098.0000', '', 0, '2019-12-21 07:08:25.393792'),
(4, 4, 1, '24/12/2019', '25/12/2019', 2, '122,342.0000', '32,423.0000', '', 0, '2019-12-21 07:18:44.049330'),
(5, 3, 4, '20/12/2019', '01/12/2019', 2, '13,211.0000', '1,232.0000', '', 0, '2019-12-21 07:37:43.622481'),
(6, 2, 3, '23/12/2019', '25/12/2019', 2, '5,500.0000', '55,000.0000', '', 0, '2019-12-21 07:48:17.549156'),
(7, 3, 3, '18/12/2019', '19/12/2019', 2, '21,312.0000', '0.0000', '', 0, '2019-12-21 07:56:02.290219'),
(8, 3, 2, '20/12/2019', '27/12/2019', 2, '0.0000', '12,321.0000', '', 0, '2019-12-21 07:57:19.454716'),
(9, 4, 1, '18/12/2019', '26/12/2019', 2, '21,312.0000', '0.0000', '', 0, '2019-12-21 08:00:44.984454'),
(10, 5, 2, '25/12/2019', '15/01/2020', 1, '12,130.0000', '1,500.0000', '', 0, '2019-12-24 01:16:36.871312'),
(11, 4, 2, '26/02/2020', '14/05/2020', 1, ' 12.0000', ' 12,312.0000', '', 0, '2019-12-24 01:22:15.033243'),
(12, 4, 3, '13/12/2019', '24/01/2020', 2, '12.0000', '12,321.0000', '', 0, '2019-12-24 01:23:33.097915'),
(13, 1, 1, '06/01/2020', '07/01/2020', 1, ' 10,000.0000', ' 1,000.0000', '', 0, '2020-01-06 08:52:09.170966');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loandeduction`
--

CREATE TABLE `dm_loandeduction` (
  `loandeductionID` bigint(20) NOT NULL,
  `loanID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `datedection` date NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `loantypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_loandeduction`
--

INSERT INTO `dm_loandeduction` (`loandeductionID`, `loanID`, `employeeID`, `datedection`, `amount`, `loantypeID`) VALUES
(1, 25, 1, '2020-01-08', '1.0000', 1);

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
  `dateto` date NOT NULL,
  `payperiod` int(11) NOT NULL,
  `usersubmitted` bigint(20) DEFAULT NULL,
  `datesubmitted` datetime DEFAULT NULL,
  `userapproved` varchar(255) DEFAULT NULL,
  `dateapproved` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `payrollstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_payroll`
--

INSERT INTO `dm_payroll` (`payrollID`, `datefrom`, `dateto`, `payperiod`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `payrollstatus`) VALUES
(1, '2020-01-01', '2020-01-15', 1, 3, '2020-01-22 21:28:03', '2|2|1', '2020-01-22 21:26:15|2020-01-22 21:28:28|2020-01-22 21:28:50', 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dm_payrolldetails`
--

CREATE TABLE `dm_payrolldetails` (
  `payrolldetailsID` bigint(20) NOT NULL,
  `payrollID` bigint(20) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `daysofwork` decimal(10,1) NOT NULL,
  `daysofabsent` decimal(3,1) NOT NULL,
  `regularhours` decimal(10,2) NOT NULL,
  `regholidayhours` decimal(10,2) NOT NULL,
  `speholidayhours` decimal(10,2) NOT NULL,
  `latehours` decimal(10,2) NOT NULL,
  `overtimehours` decimal(10,2) NOT NULL,
  `restothours` decimal(10,2) NOT NULL,
  `specialothours` decimal(10,2) NOT NULL,
  `specialrestothours` decimal(10,2) NOT NULL,
  `regularothours` decimal(10,2) NOT NULL,
  `regularrestothours` decimal(10,2) NOT NULL,
  `doubleothours` decimal(10,2) NOT NULL,
  `doublerestothours` decimal(10,2) NOT NULL,
  `nightdiffhours` decimal(10,2) NOT NULL,
  `dailyrate` decimal(15,4) NOT NULL,
  `hourlyrate` decimal(15,4) NOT NULL,
  `basicpay` decimal(15,4) NOT NULL,
  `regholiday` decimal(15,4) NOT NULL,
  `speholiday` decimal(15,4) NOT NULL,
  `ordinaryot` decimal(15,4) NOT NULL,
  `restot` decimal(15,4) NOT NULL,
  `specialot` decimal(15,4) NOT NULL,
  `specialrestot` decimal(15,4) NOT NULL,
  `regularot` decimal(15,4) NOT NULL,
  `regularrestot` decimal(15,4) NOT NULL,
  `doubleot` decimal(15,4) NOT NULL,
  `doublerestot` decimal(15,4) NOT NULL,
  `allowance` decimal(15,4) NOT NULL,
  `incentive` decimal(15,4) NOT NULL,
  `uniformallowance` decimal(15,4) NOT NULL,
  `nightdiff` decimal(15,4) NOT NULL,
  `late` decimal(15,4) NOT NULL,
  `absent` decimal(15,4) NOT NULL,
  `wtax` decimal(15,4) NOT NULL,
  `sss_ee` decimal(15,4) NOT NULL,
  `sss_er` decimal(15,4) NOT NULL,
  `sss_ec` decimal(15,4) NOT NULL,
  `phic_ee` decimal(15,4) NOT NULL,
  `phic_er` decimal(15,4) NOT NULL,
  `hdmf_ee` decimal(15,4) NOT NULL,
  `hdmf_er` decimal(15,4) NOT NULL,
  `sssloan` decimal(15,4) NOT NULL,
  `hdmfloan` decimal(15,4) NOT NULL,
  `netpay` decimal(15,4) NOT NULL,
  `thrmonth` decimal(15,4) NOT NULL,
  `retfund` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_payrolldetails`
--

INSERT INTO `dm_payrolldetails` (`payrolldetailsID`, `payrollID`, `datefrom`, `dateto`, `employeeID`, `daysofwork`, `daysofabsent`, `regularhours`, `regholidayhours`, `speholidayhours`, `latehours`, `overtimehours`, `restothours`, `specialothours`, `specialrestothours`, `regularothours`, `regularrestothours`, `doubleothours`, `doublerestothours`, `nightdiffhours`, `dailyrate`, `hourlyrate`, `basicpay`, `regholiday`, `speholiday`, `ordinaryot`, `restot`, `specialot`, `specialrestot`, `regularot`, `regularrestot`, `doubleot`, `doublerestot`, `allowance`, `incentive`, `uniformallowance`, `nightdiff`, `late`, `absent`, `wtax`, `sss_ee`, `sss_er`, `sss_ec`, `phic_ee`, `phic_er`, `hdmf_ee`, `hdmf_er`, `sssloan`, `hdmfloan`, `netpay`, `thrmonth`, `retfund`) VALUES
(1, 1, '2020-01-01', '2020-01-15', 1, '12.0', '1.0', '94.75', '0.00', '0.00', '1.25', '48.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4636.3636', '579.5455', '51000.0000', '0.0000', '0.0000', '34772.7270', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '500.0000', '0.0000', '0.0000', '0.0000', '724.4318', '4636.3636', '0.0000', '0.0000', '0.0000', '0.0000', '450.0000', '450.0000', '50.0000', '50.0000', '0.0000', '0.0000', '80411.9316', '3803.2670', '222222.0000'),
(2, 1, '2020-01-01', '2020-01-15', 3, '10.0', '2.0', '64.00', '0.00', '0.00', '0.00', '30.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '620.0000', '77.5000', '4960.0000', '0.0000', '0.0000', '2906.2500', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '1240.0000', '0.0000', '0.0000', '0.0000', '0.0000', '75.0000', '75.0000', '50.0000', '50.0000', '0.0000', '0.0000', '6501.2500', '310.0000', '0.0000');

-- --------------------------------------------------------

--
-- Table structure for table `dm_philhealthtable`
--

CREATE TABLE `dm_philhealthtable` (
  `philhealthID` int(11) NOT NULL,
  `belowrange` decimal(15,4) NOT NULL,
  `aboverange` decimal(15,4) NOT NULL,
  `percent` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_philhealthtable`
--

INSERT INTO `dm_philhealthtable` (`philhealthID`, `belowrange`, `aboverange`, `percent`) VALUES
(1, '1.0000', '10000.0000', '3.00'),
(2, '10000.0100', '59999.9900', '3.00'),
(3, '60000.0000', '999999.9900', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_retirement`
--

CREATE TABLE `dm_retirement` (
  `retirementID` bigint(20) NOT NULL,
  `employeeID` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_retirement`
--

INSERT INTO `dm_retirement` (`retirementID`, `employeeID`) VALUES
(5, 5),
(19, 3),
(22, 2),
(32, 1);

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
(71, 2, 35, 0),
(72, 2, 36, 1);

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
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `dm_schedule`
--

CREATE TABLE `dm_schedule` (
  `scheduleID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `restday` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_schedule`
--

INSERT INTO `dm_schedule` (`scheduleID`, `employeeID`, `restday`) VALUES
(18, 15, 1),
(19, 15, 2),
(20, 15, 3),
(21, 15, 4),
(22, 15, 6),
(23, 15, 7),
(30, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dm_ssstable`
--

CREATE TABLE `dm_ssstable` (
  `sssID` int(11) NOT NULL,
  `belowrange` decimal(15,4) NOT NULL,
  `aboverange` decimal(15,4) NOT NULL,
  `employer` decimal(15,4) NOT NULL,
  `employee` decimal(15,4) NOT NULL,
  `ec` decimal(15,4) NOT NULL,
  `total` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_ssstable`
--

INSERT INTO `dm_ssstable` (`sssID`, `belowrange`, `aboverange`, `employer`, `employee`, `ec`, `total`) VALUES
(1, '1.0000', '2250.0000', '160.0000', '80.0000', '10.0000', '240.0000'),
(2, '2250.0000', '2749.9900', '200.0000', '100.0000', '10.0000', '300.0000'),
(3, '2750.0000', '3249.9900', '240.0000', '120.0000', '10.0000', '360.0000'),
(4, '3250.0000', '3749.9900', '280.0000', '140.0000', '10.0000', '420.0000'),
(5, '3750.0000', '4249.9900', '320.0000', '160.0000', '10.0000', '480.0000'),
(6, '4250.0000', '4749.9900', '360.0000', '180.0000', '10.0000', '540.0000'),
(7, '4750.0000', '5249.9900', '400.0000', '200.0000', '10.0000', '600.0000'),
(8, '5250.0000', '5749.9900', '440.0000', '220.0000', '10.0000', '660.0000'),
(9, '5750.0000', '6249.9900', '480.0000', '220.0000', '10.0000', '700.0000'),
(10, '6250.0000', '6749.9900', '520.0000', '260.0000', '10.0000', '780.0000'),
(11, '6750.0000', '7249.9900', '560.0000', '280.0000', '10.0000', '840.0000'),
(12, '7250.0000', '7749.9900', '600.0000', '300.0000', '10.0000', '900.0000'),
(13, '7750.0000', '8249.9900', '640.0000', '320.0000', '10.0000', '960.0000'),
(14, '8250.0000', '8749.9900', '680.0000', '320.0000', '10.0000', '1000.0000'),
(15, '8750.0000', '9249.9900', '680.0000', '340.0000', '10.0000', '1020.0000'),
(16, '9250.0000', '9749.9900', '760.0000', '380.0000', '10.0000', '1140.0000'),
(17, '9750.0000', '10249.9900', '800.0000', '400.0000', '10.0000', '1200.0000'),
(18, '10250.0000', '10749.9900', '840.0000', '420.0000', '10.0000', '1260.0000'),
(19, '10750.0000', '11249.9900', '880.0000', '440.0000', '10.0000', '1320.0000'),
(20, '11250.0000', '11749.9900', '920.0000', '460.0000', '10.0000', '1380.0000'),
(21, '11750.0000', '12249.9900', '960.0000', '480.0000', '10.0000', '1440.0000'),
(22, '12250.0000', '12749.9900', '960.0000', '480.0000', '10.0000', '1440.0000'),
(23, '12750.0000', '13249.9900', '1000.0000', '500.0000', '10.0000', '1500.0000'),
(24, '13250.0000', '13749.9900', '1080.0000', '540.0000', '10.0000', '1620.0000'),
(25, '13750.0000', '14249.9900', '1120.0000', '560.0000', '10.0000', '1680.0000'),
(26, '14250.0000', '14749.9900', '1160.0000', '580.0000', '10.0000', '1740.0000'),
(27, '14750.0000', '15249.9900', '1200.0000', '600.0000', '30.0000', '1800.0000'),
(28, '15250.0000', '15749.9900', '1240.0000', '620.0000', '30.0000', '1860.0000'),
(29, '15750.0000', '16249.9900', '1280.0000', '640.0000', '30.0000', '1920.0000'),
(30, '16250.0000', '16749.9900', '1320.0000', '660.0000', '30.0000', '1980.0000'),
(31, '16750.0000', '17249.9900', '1360.0000', '680.0000', '30.0000', '2040.0000'),
(32, '17250.0000', '17749.9900', '1400.0000', '700.0000', '30.0000', '2100.0000'),
(33, '17750.0000', '18249.9900', '1440.0000', '720.0000', '30.0000', '2160.0000'),
(34, '18250.0000', '18749.9900', '1480.0000', '740.0000', '30.0000', '2220.0000'),
(35, '18750.0000', '19249.9900', '1520.0000', '760.0000', '30.0000', '2280.0000'),
(36, '19250.0000', '19749.9900', '1560.0000', '780.0000', '30.0000', '2340.0000'),
(37, '19750.0000', '999999.0000', '1600.0000', '800.0000', '30.0000', '2400.0000');

-- --------------------------------------------------------

--
-- Table structure for table `dm_taxtable`
--

CREATE TABLE `dm_taxtable` (
  `taxID` int(11) NOT NULL,
  `belowrange` decimal(15,4) NOT NULL,
  `aboverange` decimal(15,4) NOT NULL,
  `additionaltax` decimal(15,4) NOT NULL,
  `percent` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_taxtable`
--

INSERT INTO `dm_taxtable` (`taxID`, `belowrange`, `aboverange`, `additionaltax`, `percent`) VALUES
(1, '1.0000', '20832.0000', '0.0000', '0.00'),
(2, '20833.0000', '33332.0000', '0.0000', '20.00'),
(3, '33333.0000', '66666.0000', '2500.0000', '25.00'),
(4, '66667.0000', '166666.0000', '10833.3300', '30.00'),
(5, '166667.0000', '666666.0000', '40833.3300', '32.00'),
(6, '666667.0000', '999999.0000', '200833.3300', '35.00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_thrmonth`
--

CREATE TABLE `dm_thrmonth` (
  `thrmonthID` bigint(20) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_thrmonth`
--

INSERT INTO `dm_thrmonth` (`thrmonthID`, `datefrom`, `dateto`) VALUES
(3, '2020-01-01', '2020-07-28'),
(4, '2020-01-01', '2020-01-28'),
(5, '2020-01-01', '2020-01-28'),
(6, '2020-01-01', '2020-01-28'),
(7, '2020-01-01', '2020-01-28'),
(8, '2020-01-01', '2020-01-28'),
(9, '2020-01-01', '2020-01-28'),
(10, '2020-01-01', '2020-01-28'),
(11, '2020-01-01', '2020-01-28'),
(12, '2020-01-01', '2020-01-28'),
(13, '2020-01-01', '2020-01-28'),
(14, '2020-01-01', '2020-01-28'),
(15, '2020-01-01', '2020-01-28'),
(16, '2020-01-01', '2020-01-28'),
(17, '2020-01-01', '2020-01-28'),
(18, '2020-01-01', '2020-01-28'),
(19, '2020-01-01', '2020-01-28'),
(20, '2020-01-01', '2020-01-28'),
(21, '2020-01-01', '2020-01-28'),
(22, '2020-01-01', '2020-01-28'),
(23, '2020-01-01', '2020-01-28'),
(24, '2020-01-01', '2020-01-28'),
(25, '2020-01-01', '2020-01-28'),
(26, '2020-01-01', '2020-01-28'),
(27, '2020-01-01', '2020-01-28'),
(28, '2020-01-01', '2020-01-28'),
(29, '2020-01-01', '2020-01-28'),
(30, '2020-01-01', '2020-01-28'),
(31, '2020-01-01', '2020-01-28'),
(32, '2020-01-01', '2020-01-28'),
(33, '2020-01-01', '2020-01-28'),
(34, '2020-01-01', '2020-01-28'),
(35, '2020-01-01', '2020-01-28'),
(36, '2020-01-01', '2020-01-28'),
(37, '2020-01-01', '2020-01-28'),
(38, '2020-01-01', '2020-01-28'),
(39, '2020-01-01', '2020-01-28'),
(40, '2020-01-01', '2020-01-28'),
(41, '2020-01-01', '2020-01-28'),
(42, '2020-01-01', '2020-01-28'),
(43, '2020-01-01', '2020-01-28'),
(44, '2020-01-01', '2020-01-28'),
(45, '2020-01-01', '2020-01-28'),
(46, '2020-01-01', '2020-01-28'),
(47, '2020-01-01', '2020-01-28'),
(48, '2020-01-01', '2020-01-28'),
(49, '2020-01-01', '2020-01-28'),
(50, '2020-01-01', '2020-01-28'),
(51, '2020-01-01', '2020-12-28'),
(52, '2020-01-01', '2020-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeeping`
--

CREATE TABLE `dm_timekeeping` (
  `timekeepingID` bigint(20) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `payperiod` int(11) NOT NULL,
  `usersubmitted` bigint(20) DEFAULT NULL,
  `datesubmitted` datetime DEFAULT NULL,
  `userapproved` varchar(255) DEFAULT NULL,
  `dateapproved` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `timekeepingstatus` int(11) NOT NULL,
  `payrollstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_timekeeping`
--

INSERT INTO `dm_timekeeping` (`timekeepingID`, `datefrom`, `dateto`, `payperiod`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `timekeepingstatus`, `payrollstatus`) VALUES
(1, '2020-01-01', '2020-01-15', 1, 4, '2020-01-22 21:24:06', '2|3', '2020-01-22 21:24:22|2020-01-22 21:24:36', 3, 1, 2, 2),
(2, '2020-01-16', '2020-01-31', 2, NULL, NULL, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeepingdetails`
--

CREATE TABLE `dm_timekeepingdetails` (
  `timesheetID` bigint(20) NOT NULL,
  `timekeepingID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `datesched` date NOT NULL,
  `regularhours` decimal(10,2) NOT NULL,
  `regholidayhours` decimal(10,2) NOT NULL,
  `speholidayhours` decimal(10,2) NOT NULL,
  `latehours` decimal(10,2) NOT NULL,
  `absent` decimal(10,2) NOT NULL,
  `othours` decimal(10,2) NOT NULL,
  `restot` decimal(10,2) NOT NULL,
  `specialot` decimal(10,2) NOT NULL,
  `specialrestot` decimal(10,2) NOT NULL,
  `regularot` decimal(10,2) NOT NULL,
  `regularrestot` decimal(10,2) NOT NULL,
  `doubleot` decimal(10,2) NOT NULL,
  `doublerestot` decimal(10,2) NOT NULL,
  `nightdiff` decimal(10,2) NOT NULL,
  `shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_timekeepingdetails`
--

INSERT INTO `dm_timekeepingdetails` (`timesheetID`, `timekeepingID`, `employeeID`, `datesched`, `regularhours`, `regholidayhours`, `speholidayhours`, `latehours`, `absent`, `othours`, `restot`, `specialot`, `specialrestot`, `regularot`, `regularrestot`, `doubleot`, `doublerestot`, `nightdiff`, `shift`) VALUES
(1, 1, 1, '2020-01-01', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(2, 1, 1, '2020-01-02', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(3, 1, 1, '2020-01-03', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(4, 1, 1, '2020-01-04', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(5, 1, 1, '2020-01-06', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(6, 1, 1, '2020-01-07', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(7, 1, 1, '2020-01-08', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(8, 1, 1, '2020-01-09', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(9, 1, 1, '2020-01-10', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(10, 1, 1, '2020-01-11', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(11, 1, 1, '2020-01-13', '0.00', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(12, 1, 1, '2020-01-14', '7.75', '0.00', '0.00', '0.25', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(13, 1, 1, '2020-01-15', '7.00', '0.00', '0.00', '1.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(14, 1, 3, '2020-01-01', '6.00', '0.00', '0.00', '0.00', '0.00', '2.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(15, 1, 3, '2020-01-02', '7.00', '0.00', '0.00', '0.00', '0.00', '3.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(16, 1, 3, '2020-01-03', '5.00', '0.00', '0.00', '0.00', '0.00', '3.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(17, 1, 3, '2020-01-04', '7.00', '0.00', '0.00', '0.00', '0.00', '3.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(18, 1, 3, '2020-01-06', '6.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(19, 1, 3, '2020-01-07', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(20, 1, 3, '2020-01-08', '8.00', '0.00', '0.00', '0.00', '0.00', '2.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(21, 1, 3, '2020-01-09', '8.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(22, 1, 3, '2020-01-10', '1.00', '0.00', '0.00', '0.00', '0.00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(23, 1, 3, '2020-01-11', '0.00', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(24, 1, 3, '2020-01-13', '0.00', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0),
(25, 1, 3, '2020-01-15', '8.00', '0.00', '0.00', '0.00', '0.00', '1.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 0);

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
-- Indexes for table `dm_loandeduction`
--
ALTER TABLE `dm_loandeduction`
  ADD PRIMARY KEY (`loandeductionID`);

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
-- Indexes for table `dm_retirement`
--
ALTER TABLE `dm_retirement`
  ADD PRIMARY KEY (`retirementID`);

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
-- Indexes for table `dm_thrmonth`
--
ALTER TABLE `dm_thrmonth`
  ADD PRIMARY KEY (`thrmonthID`);

--
-- Indexes for table `dm_timekeeping`
--
ALTER TABLE `dm_timekeeping`
  ADD PRIMARY KEY (`timekeepingID`);

--
-- Indexes for table `dm_timekeepingdetails`
--
ALTER TABLE `dm_timekeepingdetails`
  ADD PRIMARY KEY (`timesheetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_approval`
--
ALTER TABLE `dm_approval`
  MODIFY `approvalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_approvaldet`
--
ALTER TABLE `dm_approvaldet`
  MODIFY `approvaldetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `dm_approvalmodule`
--
ALTER TABLE `dm_approvalmodule`
  MODIFY `approvalmoduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_bank`
--
ALTER TABLE `dm_bank`
  MODIFY `bankID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_client`
--
ALTER TABLE `dm_client`
  MODIFY `clientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dm_company`
--
ALTER TABLE `dm_company`
  MODIFY `companyID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_department`
--
ALTER TABLE `dm_department`
  MODIFY `departmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_designation`
--
ALTER TABLE `dm_designation`
  MODIFY `designationID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dm_detachment`
--
ALTER TABLE `dm_detachment`
  MODIFY `detachmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_employeecreditleave`
--
ALTER TABLE `dm_employeecreditleave`
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `dm_employeeleave`
--
ALTER TABLE `dm_employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `dm_employeetype`
--
ALTER TABLE `dm_employeetype`
  MODIFY `employeetypeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_holiday`
--
ALTER TABLE `dm_holiday`
  MODIFY `holidayID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dm_leavetype`
--
ALTER TABLE `dm_leavetype`
  MODIFY `leavetypeID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dm_loan`
--
ALTER TABLE `dm_loan`
  MODIFY `loanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_loandeduction`
--
ALTER TABLE `dm_loandeduction`
  MODIFY `loandeductionID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_modulemstr`
--
ALTER TABLE `dm_modulemstr`
  MODIFY `moduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `dm_overtime`
--
ALTER TABLE `dm_overtime`
  MODIFY `overtimeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `dm_payroll`
--
ALTER TABLE `dm_payroll`
  MODIFY `payrollID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_payrolldetails`
--
ALTER TABLE `dm_payrolldetails`
  MODIFY `payrolldetailsID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_philhealthtable`
--
ALTER TABLE `dm_philhealthtable`
  MODIFY `philhealthID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_retirement`
--
ALTER TABLE `dm_retirement`
  MODIFY `retirementID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `dm_rolemodule`
--
ALTER TABLE `dm_rolemodule`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `dm_rolemstr`
--
ALTER TABLE `dm_rolemstr`
  MODIFY `roleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `dm_schedule`
--
ALTER TABLE `dm_schedule`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `dm_ssstable`
--
ALTER TABLE `dm_ssstable`
  MODIFY `sssID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `dm_taxtable`
--
ALTER TABLE `dm_taxtable`
  MODIFY `taxID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_thrmonth`
--
ALTER TABLE `dm_thrmonth`
  MODIFY `thrmonthID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `dm_timekeeping`
--
ALTER TABLE `dm_timekeeping`
  MODIFY `timekeepingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_timekeepingdetails`
--
ALTER TABLE `dm_timekeepingdetails`
  MODIFY `timesheetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
