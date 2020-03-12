-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 04:41 AM
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
(1, 'Timekeeping (Security Guard)', 7),
(2, 'Timekeeping (Staff)', 8),
(3, 'Payroll Process (Security Guard)', 10),
(4, 'Payroll Process (Staff)', 11),
(5, 'Payroll Adjustment', 12),
(6, '13th Month Process', 16),
(7, 'Retirement Process', 18),
(8, 'Billing Statement', 20);

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
(6, 6, 9, 1, 1),
(7, 7, 10, 1, 1),
(8, 8, 16, 1, 1),
(9, 2, 3, 1, 1),
(10, 4, 4, 1, 0),
(11, 4, 3, 2, 1),
(12, 3, 1, 1, 1),
(13, 5, 5, 1, 0),
(14, 5, 2, 2, 1),
(19, 1, 3, 1, 0),
(20, 1, 2, 2, 1);

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
(2, 8),
(3, 10),
(4, 11),
(5, 12),
(6, 16),
(7, 18),
(8, 20);

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
(2, 'BPI', '000 000 00 000', 'Active'),
(3, 'BPIS', '0-0-0', 'Active');

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
  `noofpost` int(10) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_client`
--

INSERT INTO `dm_client` (`clientID`, `description`, `clientstatus`, `clientname`, `housenumber`, `streetname`, `barangay`, `city`, `contactperson`, `noofpost`, `contactno`, `email`) VALUES
(1, 'A sprawling 25-hectare mega-community that combines office spaces luxury condominiums leisure amenities retail shops and', 'Active', 'Mactan Newton', '', 'Sapang Hari', 'Newtown Boulevard', 'Lapu-Lapu City', 'Jose Pacheco', 2, '0934-786-9877', 'jpachecho@gmail.com'),
(2, 'The country''s largest middle-income housing developer high-rise residential condominium developer and business process o', 'Active', 'Megaworld Corporation Testing', '', 'Sen. Gil Puyat Avenue', 'San Isidro', 'Makati City', 'Arnulfo Policarpio', 3, '0995-345-3767', 'arn.arn_poli@gmail.com'),
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
(6, 'Utility Department', 'Active'),
(7, 'Security Depsrtmrnt', 'Inactive');

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
(5, 2, 'HR Manager', 'Active'),
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
(18, 6, 'Operations Manager', 'Active'),
(19, 6, 'General Manager', 'Active'),
(20, 5, 'Account Officer', 'Active'),
(21, 6, 'Manager', 'Active'),
(22, 6, 'IT Manager', 'Inactive');

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
  `postID` bigint(20) NOT NULL,
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

INSERT INTO `dm_employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `postID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `retfund`, `incentive`, `uniformallowance`, `bankname`, `backaccountname`, `backaccountnumber`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `employeetypeID`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Maricelle', '', 'Magtanong', 'Male', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '2020-01-21', '0927-947-5792', 'Single', 'Filipino', '2011-03-14', 3, '7', 0, 1, 1, 'admin', 'admin', '112.0000', '12.0000', '0.0000', '222222.0000', '0.0000', '0.0000', 1, '', '12', '666-666-666', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', 2, '1.jpg', 0, '2019-11-25 08:26:51.905646'),
(2, 'Cardo', '', 'Dalisay', 'Female', '', 'Opel', '175', 'Caloocan', '2020-02-20', '0927-947-5792', 'Single', 'Filipino', '2014-06-25', 1, '1', 2, 2, 2, 'staff', 'staff', '0.0000', '520.0000', '500.0000', '0.0000', '223.7500', '0.0000', 0, '', '', '111-111-111', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', 1, '2.jpg', 1, '2019-11-25 08:26:54.102823'),
(3, 'John', '', 'Wick', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '2020-02-17', '0912-345-6789', 'Married', 'Fiipino', '2020-02-17', 1, '1', 1, 2, 2, 'exe', 'exe', '500.5050', '22.7502', '50.0000', '0.0000', '0.0000', '0.0000', 1, 'SQWE RW', '2435-643-23', '213-456-789', '23-4567893-2', '23-456787654-3', '5432-1234-5643', 'Active', 1, '3.png', 1, '2019-12-03 11:56:31.366887'),
(4, 'Mary Rose', '', 'Vitor', 'Female', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', '0000-00-00', '0966-623-4567', 'Single', 'Japanese', '0000-00-00', 2, '5', 0, 1, 0, 'mrvitor', 'password', '21342.0000', '879.0000', '322.0000', '0.0000', '0.0000', '0.0000', 0, 'BDO', '2343211', '231-456-789', '12-3123456-7', '13-214325365-4', '3243-5436-5442', 'Active', 2, '4.jpg', 0, '2019-12-20 07:50:01.399405'),
(5, 'Jeffrey', '', 'Cauguiran', 'Male', '2811', 'Cup Point', 'Fashion Hall', 'Old Town Road', '0000-00-00', '3456-789-0987', 'Married', 'Italian', '0000-00-00', 6, '19', 0, 1, 0, 'mahnamejeff', 'password', '92000.0000', '4181.8182', '10000.0000', '0.0000', '0.0000', '0.0000', 0, 'Curry Venti Regionas', '282 019 11 155', '000-000-000', '34-5654345-6', '45-654334567-6', '6534-5677-6543', 'Active', 2, '', 0, '2019-12-23 03:58:25.632917'),
(6, 'Cyndy', '', 'Marcellana', 'Female', 'asr3', 'sadsfsd', 'asdsad', 'asdsf a', '0000-00-00', '1234-567-7654', 'Single', 'Japanese', '0000-00-00', 2, '3', 0, 1, 0, 'cyndy', 'password', '12312.0000', '324.0000', '2.0000', '0.0000', '0.0000', '0.0000', 0, 'test account', '12421423', '123-546-213', '42-1123432-1', '54-678645454-3', '4323-4565-3245', 'Active', 2, '', 0, '2019-12-23 06:11:05.731548'),
(7, 'Account', '', 'Officer', 'Male', '322', 'qe2 fd', 'd 3221f', '3 rwsdg', '0000-00-00', '2332-423-4354', 'Single', 'regg', '0000-00-00', 5, '20', 0, 1, 0, 'aofficer', 'password', '982.0000', '44.6364', '2.0000', '0.0000', '0.0000', '0.0000', 0, '35 rgff', '556354232', '678-765-476', '67-4675456-5', '56-546754676-5', '5676-5675-6765', 'Active', 2, '', 0, '2020-01-02 03:32:04.769082'),
(8, 'Operation', '', 'Manager', 'Male', '', 'TEST', 'TEST', 'TEST', '0000-00-00', '1111-111-1111', 'Single', 'TEST', '0000-00-00', 6, '18', 0, 1, 0, 'omanager', 'password', '1.0000', '1.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '78-9876543-2', '56-789087654-3', '4345-6789-0987', 'Active', 2, '', 0, '2020-01-09 11:36:25.875891'),
(9, 'Noemi', '', 'Gaylan', 'Male', '', 'SAMPLE', 'SAMPLE', 'SAMPLE', '0000-00-00', '1111-111-1111', 'Single', 'SAMPLE', '0000-00-00', 4, '11', 0, 1, 0, 'noemi', 'password', '2.0000', '2.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '456-789-098', '78-7554578-9', '56-788976543-4', '3475-6767-8754', 'Active', 2, '', 0, '2020-01-09 11:40:54.965467'),
(10, 'Billy', '', 'Pascua', 'Male', '', 'JUAN', 'JUAN', 'JUAN', '0000-00-00', '1111-111-1111', 'Single', 'JUAN', '0000-00-00', 6, '21', 0, 2, 0, '', '', '2.0000', '0.0909', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '24-5678965-4', '76-543234567-8', '5432-3456-7897', 'Active', 2, '', 0, '2020-01-09 11:46:07.385507'),
(11, 'Cristalyn', '', 'Cruzada', 'Female', '43589', 'Amorsolo Street', 'Pinagbuhatan', 'Pasig City', '1997-07-10', '0989-867-2987', 'Single', 'Filipino', '2019-06-12', 4, '10', 0, 2, 0, '', '', '12567.3000', '571.2409', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '87-6543245-6', '34-567899876-5', '4678-6543-5678', 'Active', 2, '', 0, '2020-01-09 11:50:25.340515'),
(12, 'Cyber Jonald', '', 'Coballes', 'Male', '565', 'Pachecho Street', 'One Orchard ', 'Quezon City', '1985-02-20', '0937-578-5687', 'Married', 'Filipino', '2018-12-10', 2, '4', 0, 2, 0, '', '', '15000.0000', '6818.8182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678654-3', '43-456789765-4', '6754-3456-7876', 'Active', 2, '', 0, '2020-01-09 11:53:12.623726'),
(13, 'Lea', '', 'Ylanan', 'Female', '', '79A Reyes Compound', 'Manggahan', 'Pasig City', '1986-04-11', '0946-574-8376', 'Married', 'Filipino', '2015-08-13', 2, '3', 0, 2, 0, '', '', '6705.0400', '304.7745', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678908-7', '45-678908765-4', '6543-4567-8976', 'Active', 2, '', 0, '2020-01-09 11:54:58.434185'),
(14, 'Anna Jemima', '', 'Molino', 'Female', '65', 'Downtown Ridge', 'Bacoor', 'Cavite', '1980-07-24', '0975-567-8765', 'Single', 'Filipino', '2018-09-04', 2, '3', 0, 2, 0, '', '', '36000.0000', '1636.3636', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-865', '56-5564324-5', '67-654321345-6', '7654-3456-7543', 'Active', 2, '', 0, '2020-01-09 13:11:56.434744'),
(15, 'Alfredo', '', 'Gonzaga', 'Male', '46 ', 'Concepcion Street', 'Bangkal', 'Marikina City', '1978-05-09', '0975-324-5678', 'Married', 'Filipino', '2017-11-06', 3, '9', 0, 2, 0, '', '', '22882.1600', '1040.0982', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '345-678-990', '45-6789090-8', '45-678908765-4', '3456-7890-9870', 'Active', 2, '', 0, '2020-01-10 06:36:31.166842'),
(16, 'Michael Jihn', '', 'Maron', 'Male', '546A Adelf', 'Yen Street', 'Bagong Ilog', 'Pasig City', '1993-08-19', '0953-345-6789', 'Single', 'Filipino', '2017-07-20', 3, '8', 0, 2, 0, '', '', '15000.0000', '681.8182', '0.0000', '0.0000', '0.0000', '0.0000', 2, 'Michael Jihn Maron', '3456-7654-3213-4', '345-678-965', '56-7876545-4', '34-567876543-4', '6787-6567-7656', 'Active', 2, '', 0, '2020-01-10 09:25:43.559167'),
(17, 'Montano', 'Macalua', 'Abarsolo', 'Male', '', 'Sitio Sto Nino', 'Basak Tamiya', 'Lapu Lapu City', '1985-02-14', '0917-971-5870', 'Married', 'Filipino', '2019-02-01', 5, '15', 1, 2, 0, '', '', '12435.0000', '565.2273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '421-894-412', '06-2711892-2', '12-050966951-7', '1640-0007-3900', 'Active', 1, '', 1, '2020-02-17 01:03:25.193494'),
(18, 'Richie', 'Rodrigo', 'Artezuela', 'Male', '', 'Casanta', 'Mactan', 'Lapu Lapu City', '1995-09-07', '0987-654-6789', 'Single', 'Filipino', '2019-02-01', 5, '15', 1, 2, 0, '', '', '13436.0000', '610.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6478115-3', '09-303427427-1', '0302-6324-2854', 'Active', 1, '', 1, '2020-02-17 01:07:07.178939'),
(19, 'Richard', 'Briones', 'Abarquez', 'Male', '', 'Alangalang', 'Alangalang', 'Mandaue City', '1980-02-13', '0945-600-9497', 'Married', 'Filipino', '2019-03-06', 5, '15', 1, 1, 0, '', '', '24423.0000', '1110.1364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2264628-2', '12-050813657-4', '1211-1240-5852', 'Active', 1, '', 1, '2020-02-17 01:11:14.928189'),
(20, 'Mateo Jr.', 'Capute', 'Anura', 'Male', '', 'Purok Lubi', 'Canjulao', 'Lapu Lapu City', '1992-09-20', '0943-298-4723', 'Married', 'Filipino', '2019-11-01', 5, '15', 1, 1, 0, '', '', '2144.0000', '97.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3219363-1', '09-229238736-1', '1205-1303-4348', 'Active', 1, '', 1, '2020-02-17 01:14:30.187504'),
(21, 'Jessie', 'Virtudes', 'Aclo', 'Male', '', 'Saac 2', 'Mactan', 'Lapu Lapu City', '1983-01-10', '0924-953-4586', 'Married', 'Filipino', '2019-02-01', 5, '15', 1, 1, 0, '', '', '3534.0000', '160.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '222-381-749', '33-7842651-7', '19-089509944-2', '1211-2111-7894', 'Active', 1, '', 1, '2020-02-17 01:16:48.073457'),
(22, 'Edison', 'Anunciado', 'Alcover', 'Male', '', 'Victoria Homes ', 'Sudtungan Basak', 'Lapu Lapu City', '1982-04-22', '0921-487-3642', 'Married', 'Filipino', '2019-02-01', 5, '15', 1, 1, 0, '', '', '23423.0000', '1064.6818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '289-076-696', '36-0027832-9', '02-050729485-6', '1211-0935-7230', 'Active', 1, '', 1, '2020-02-17 01:19:28.717081'),
(23, 'Jovencia', 'Laborte', 'Antiola', 'Female', '', 'Kawot', 'Mactan', 'Lapu Lapu City', '1989-06-04', '0912-478-3682', 'Married', 'Filipino', '2019-02-05', 5, '15', 1, 2, 0, '', '', '21312.0000', '968.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '270-576-276', '06-2741392-8', '12-050648920-8', '1210-1131-2354', 'Active', 1, '', 1, '2020-02-17 01:21:54.538877'),
(24, 'Helen', 'Velasquez', 'Ayuso', 'Female', '', 'Longos Apt Site Tagle Apt', 'Basuk', 'Lapu Lapu City', '1972-10-09', '0921-932-6484', 'Married', 'Filipino', '2019-02-01', 5, '15', 1, 2, 0, '', '', '24321.0000', '1105.5000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '319-931-309', '06-2704616-2', '12-050973461-0', '1210-2964-2007', 'Active', 1, '', 1, '2020-02-17 01:24:41.289978'),
(25, 'Jonathan', 'Albert', 'Ba-aclo', 'Male', '', 'Isuya', 'Mactan', 'Lapu Lapu City', '1981-06-16', '0921-472-6483', 'Married', 'Filipino', '2019-02-01', 5, '15', 1, 2, 0, '', '', '4532.0000', '206.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '252-881-357', '06-2456183-1', '15-200643702-2', '1211-7120-2235', 'Active', 1, '', 1, '2020-02-17 01:27:34.149798'),
(26, 'Ricky', 'Acain', 'Balucan', 'Male', '', 'Soong', 'Mactan', 'Lapu Lapu', '1983-11-13', '0912-487-3264', 'Married', 'Filipino', '2019-06-14', 5, '15', 1, 2, 0, '', '', '6856.0000', '311.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '08-2315386-2', '00-000000000-0', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:29:35.502704'),
(27, 'Alberto III', 'Tampus', 'Cabalhug', 'Male', '', 'Bankal', 'Mactan', 'Lapu Lapu City', '1979-03-12', '0943-856-2387', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-1537051-0', '12-050458523-4', '1670-0131-5826', 'Active', 1, '', 1, '2020-02-17 01:31:58.295240'),
(28, 'Alfredo', 'Tayapad', 'Cabanes', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '1991-10-15', '0923-986-3487', 'Married', 'Filipino', '2019-02-16', 5, '15', 2, 2, 0, '', '', '21234.0000', '965.1818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6185532-5', '12-201611748-8', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:35:33.401802'),
(29, 'Evamar', 'Dulfo', 'Cagande', 'Male', '26 ', 'Fabro Hills Subdivision', 'Pusuk', 'Lapu Lapu City', '1976-02-07', '0932-365-8734', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '191-732-735', '06-1623222-0', '12-050358252-5', '1210-4630-8741', 'Active', 1, '', 1, '2020-02-17 01:38:27.546361'),
(30, 'Randy', 'Sarsuelo', 'Calumba', 'Male', '', 'Buyong', 'Malibago', 'Lapu Lapu City', '1986-10-06', '0935-984-3759', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '3241.0000', '147.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '344-679-720', '06-2600111-1', '12-025515278-0', '1211-6762-0450', 'Active', 1, '', 1, '2020-02-17 01:41:09.505776'),
(31, 'Ronald', 'Sagario', 'Carillas', 'Male', '', 'Saac II', 'Buaya', 'Lapu Lapu City', '1986-09-07', '0934-598-4853', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '4324.0000', '196.5454', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '434-955-219', '06-2970380-1', '14-201738708-0', '1211-0531-5590', 'Active', 1, '', 1, '2020-02-17 01:44:05.987425'),
(32, 'Vernie', 'Ortega', 'Cañete', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '1983-04-01', '0923-923-6873', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2428417-6', '12-050581984-0', '1210-8736-3481', 'Active', 1, '', 1, '2020-02-17 01:46:23.666511'),
(33, 'Benjie Mark', 'Sino', 'Caroro', 'Male', '', 'Umapad', 'Mandaue', 'Cebu City', '1994-01-28', '0924-392-6587', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24235.0000', '1101.5909', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-4131601-4', '12-025798771-5', '1212-3462-9680', 'Active', 1, '', 1, '2020-02-17 01:48:29.572100'),
(34, 'Corazon', 'Gigante', 'Cartesiano', 'Female', '', 'Basak', 'Kagudoy', 'Lapu Lapu City', '1986-04-23', '0923-726-5848', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24232.0000', '1101.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '334-454-473', '06-2427015-1', '12-050661210-7', '1270-2047-2713', 'Active', 1, '', 1, '2020-02-17 01:50:23.656968'),
(35, 'Jessie', '', 'Casonete', 'Female', '', 'Ticgahon', 'Bankal', 'Lapu Lapu City', '1995-12-25', '0932-857-4385', 'Single', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3913351-3', '12-025646769-6', '1212-0540-0094', 'Active', 1, '', 1, '2020-02-17 01:53:27.296675'),
(36, 'Loida', 'Abajo', 'Cimafranca', 'Female', '', 'New Lipata', 'Pusok', 'Lapu Lapu City', '1978-08-04', '0923-534-6587', 'Married', 'Filipino', '2019-02-01', 5, '15', 2, 2, 0, '', '', '19389.0000', '881.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '495-304-269', '06-1705858-4', '12-050116040-1', '1210-3816-0502', 'Active', 1, '', 1, '2020-02-17 01:55:47.487867'),
(37, 'Jamie', '', 'Capistrano', 'Male', '', 'Tipaz', 'Barangay maayos', 'Taguig', '1973-05-07', '0956-617-6352', 'Married', 'Indian', '2019-06-03', 5, '15', 1, 2, 0, '1', '1', '0.0000', '520.0000', '500.0000', '250.0000', '100.0000', '0.0000', 1, 'Jamie Capistrano', '1234-567-890-12', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 1, '37.jpg', 1, '2020-03-11 06:52:08.717201'),
(38, 'Wilson', '', 'Parajas', 'Male', '', 'Building 1', '175', 'Pasig', '2020-03-12', '0911-111-1111', 'Single', 'Filipino', '2020-03-12', 1, '2', 0, 2, 0, '', '', '20000.0000', '1000.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-12 01:30:15.579776');

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
(1, 37, 1, 2),
(2, 37, 2, 1),
(3, 38, 1, 8),
(4, 38, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `dm_employeeleave`
--

CREATE TABLE `dm_employeeleave` (
  `employeeleaveID` bigint(20) NOT NULL,
  `leavetypeID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `leavefrom` date NOT NULL,
  `leaveto` date NOT NULL,
  `numberofdays` bigint(20) NOT NULL,
  `remainingleave` int(11) NOT NULL,
  `reason` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_employeeleave`
--

INSERT INTO `dm_employeeleave` (`employeeleaveID`, `leavetypeID`, `employeeID`, `leavefrom`, `leaveto`, `numberofdays`, `remainingleave`, `reason`) VALUES
(1, 2, 37, '2020-03-11', '2020-03-11', 1, 5, '1'),
(2, 1, 37, '0000-00-00', '0000-00-00', 2, 4, '2');

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
(10, 'Chinese New Year', '2020-01-25', 'Special Holiday'),
(11, 'EDSA Revolution Anniversary', '2020-02-25', 'Special Holiday'),
(12, 'Black Saturday', '2020-04-11', 'Special Holiday'),
(13, 'Ninoy Aquino Day', '2020-08-21', 'Special Holiday'),
(14, 'All Saints'' Day', '2020-11-01', 'Special Holiday'),
(15, 'Feast of the Immaculate Concepcion of Mary', '2020-12-08', 'Special Holiday'),
(16, 'Last Day of the Year', '2020-12-31', 'Special Holiday'),
(17, 'All Soul''s Day', '2020-11-02', 'Special Holiday'),
(18, 'Christmas Eve', '2020-12-25', 'Double Holiday');

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
(5, 'Maternity Leave', 4, 'Yes', 'Active'),
(6, 'Sick Leaves', 0, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loan`
--

CREATE TABLE `dm_loan` (
  `loanID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `loantypeID` int(11) NOT NULL,
  `dategranted` date NOT NULL,
  `enddate` date NOT NULL,
  `termofpaymentID` int(11) NOT NULL,
  `amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` int(11) NOT NULL,
  `lnothers` varchar(255) DEFAULT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `dm_loan`
--

INSERT INTO `dm_loan` (`loanID`, `employeeID`, `loantypeID`, `dategranted`, `enddate`, `termofpaymentID`, `amount`, `deduction`, `balance`, `paid`, `lnothers`, `datecreated`) VALUES
(1, 37, 1, '2020-03-02', '2020-03-31', 2, ' 1,000.0000', ' 500.0000', '', 0, NULL, '2020-03-11 07:54:23.032542'),
(2, 1, 1, '2020-03-13', '2020-03-21', 2, ' 11,111.0000', ' 111.0000', '', 0, NULL, '2020-03-12 01:54:18.674612');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loandeduction`
--

CREATE TABLE `dm_loandeduction` (
  `loandeductionID` bigint(20) NOT NULL,
  `loanID` bigint(20) NOT NULL,
  `datededuction` date NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `loanstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'Timesheet (Security Guard)', 'timesheet_sg'),
(8, 'Timesheet (Staff)', 'timesheet_staff'),
(9, 'Timekeeping Report', 'timekeepingreport'),
(10, 'Payroll Process (Security Guard)', 'payrollprocess_sg'),
(11, 'Payroll Process (Staff)', 'payrollprocess_staff'),
(12, 'Payroll Adjustment', 'payrolladjustment'),
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
(29, 'Detachment Post', 'detachment'),
(30, 'SSS Table', 'ssstable'),
(31, 'Philhealth Table', 'philhealthtable'),
(32, 'Tax Table', 'taxtable'),
(33, 'Holidays', 'holidays'),
(34, 'Leave Type', 'leavetype'),
(35, 'Bank', 'bank'),
(36, 'Company Profile', 'companyprofile'),
(37, 'Roles & Permission', 'rolespermission'),
(38, 'Approval Setup', 'approvalsetup');

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
  `noted` varchar(255) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `dateupdated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_overtime`
--

INSERT INTO `dm_overtime` (`overtimeID`, `employeeID`, `description`, `overtimedate`, `starttime`, `endtime`, `totalhour`, `noted`, `datecreated`, `dateupdated`) VALUES
(1, 37, 'Test Only', '2020-03-04', '18:00', '18:30', '0:30', 'Testing', '', '');

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
  `ordhours` decimal(10,2) NOT NULL,
  `rsthours` decimal(10,2) NOT NULL,
  `spchours` decimal(10,2) NOT NULL,
  `spcrsthours` decimal(10,2) NOT NULL,
  `rglhours` decimal(10,2) NOT NULL,
  `rglrsthours` decimal(10,2) NOT NULL,
  `dblhours` decimal(10,2) NOT NULL,
  `dblrsthours` decimal(10,2) NOT NULL,
  `ordothours` decimal(10,2) NOT NULL,
  `rstothours` decimal(10,2) NOT NULL,
  `spcothours` decimal(10,2) NOT NULL,
  `spcrstothours` decimal(10,2) NOT NULL,
  `rglothours` decimal(10,2) NOT NULL,
  `rglrstothours` decimal(10,2) NOT NULL,
  `dblothours` decimal(10,2) NOT NULL,
  `dblrstothours` decimal(10,2) NOT NULL,
  `ordnighthours` decimal(10,2) NOT NULL,
  `rstnighthours` decimal(10,2) NOT NULL,
  `spcnighthours` decimal(10,2) NOT NULL,
  `spcrstnighthours` decimal(10,2) NOT NULL,
  `rglnighthours` decimal(10,2) NOT NULL,
  `rglrstnighthours` decimal(10,2) NOT NULL,
  `dblnighthours` decimal(10,2) NOT NULL,
  `dblrstnighthours` decimal(10,2) NOT NULL,
  `ordlatehours` decimal(10,2) NOT NULL,
  `rstlatehours` decimal(10,2) NOT NULL,
  `spclatehours` decimal(10,2) NOT NULL,
  `spcrstlatehours` decimal(10,2) NOT NULL,
  `rgllatehours` decimal(10,2) NOT NULL,
  `rglrstlatehours` decimal(10,2) NOT NULL,
  `dbllatehours` decimal(10,2) NOT NULL,
  `dblrstlatehours` decimal(10,2) NOT NULL,
  `ord` decimal(15,4) NOT NULL,
  `rst` decimal(15,4) NOT NULL,
  `spc` decimal(15,4) NOT NULL,
  `spcrst` decimal(15,4) NOT NULL,
  `rgl` decimal(15,4) NOT NULL,
  `rglrst` decimal(15,4) NOT NULL,
  `dbl` decimal(15,4) NOT NULL,
  `dblrst` decimal(15,4) NOT NULL,
  `ordot` decimal(15,4) NOT NULL,
  `rstot` decimal(15,4) NOT NULL,
  `spcot` decimal(15,4) NOT NULL,
  `spcrstot` decimal(15,4) NOT NULL,
  `rglot` decimal(15,4) NOT NULL,
  `rglrstot` decimal(15,4) NOT NULL,
  `dblot` decimal(15,4) NOT NULL,
  `dblrstot` decimal(15,4) NOT NULL,
  `ordnight` decimal(15,4) NOT NULL,
  `rstnight` decimal(15,4) NOT NULL,
  `spcnight` decimal(15,4) NOT NULL,
  `spcrstnight` decimal(15,4) NOT NULL,
  `rglnight` decimal(15,4) NOT NULL,
  `rglrstnight` decimal(15,4) NOT NULL,
  `dblnight` decimal(15,4) NOT NULL,
  `dblrstnight` decimal(15,4) NOT NULL,
  `ordlate` decimal(15,4) NOT NULL,
  `rstlate` decimal(15,4) NOT NULL,
  `spclate` decimal(15,4) NOT NULL,
  `spcrstlate` decimal(15,4) NOT NULL,
  `rgllate` decimal(15,4) NOT NULL,
  `rglrstlate` decimal(15,4) NOT NULL,
  `dbllate` decimal(15,4) NOT NULL,
  `dblrstlate` decimal(15,4) NOT NULL,
  `dailyrate` decimal(15,4) NOT NULL,
  `hourlyrate` decimal(15,4) NOT NULL,
  `basicpay` decimal(15,4) NOT NULL,
  `allowance` decimal(15,4) NOT NULL,
  `incentive` decimal(15,4) NOT NULL,
  `late` decimal(15,4) NOT NULL,
  `absent` decimal(15,4) NOT NULL,
  `otadjustment` decimal(15,4) NOT NULL,
  `nightdiffadjustment` decimal(15,4) NOT NULL,
  `lateadjustment` decimal(15,4) NOT NULL,
  `leaveadjustment` decimal(15,4) NOT NULL,
  `otheradjustment` decimal(15,4) NOT NULL,
  `otherdescription` varchar(255) NOT NULL,
  `grosspay` decimal(15,4) NOT NULL,
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
  `salaryloan` decimal(15,4) NOT NULL,
  `emergencyloan` decimal(15,4) NOT NULL,
  `trainingloan` decimal(15,4) NOT NULL,
  `otherloan` decimal(15,4) NOT NULL,
  `netpay` decimal(15,4) NOT NULL,
  `thrmonth` decimal(15,4) NOT NULL,
  `retfund` decimal(15,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dm_payslipstatus`
--

CREATE TABLE `dm_payslipstatus` (
  `payslipstatusID` int(11) NOT NULL,
  `payrolldetailsID` int(10) NOT NULL,
  `employeeID` int(10) NOT NULL,
  `payslipstatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `dm_post`
--

CREATE TABLE `dm_post` (
  `postID` bigint(20) NOT NULL,
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
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `poststatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_post`
--

INSERT INTO `dm_post` (`postID`, `postname`, `housenumber`, `streetname`, `barangay`, `city`, `clientID`, `commander`, `startdate`, `enddate`, `noofguard`, `timein`, `timeout`, `poststatus`) VALUES
(1, 'Mactan Parking', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', 1, 'Wilson Parajas', '2020-01-30', '2020-05-14', 5, '19:00:00', '07:00:00', 'Active'),
(2, 'Mactan Entrance', '', 'Sen. Gil Puyat', 'San Isidro', 'Makati City', 1, 'Jamie Capistrano', '2020-01-08', '2020-04-30', 3, '19:00:00', '07:00:00', 'Active'),
(3, 'Post 3', '8th Floor', 'PNB Building', 'Bel-Air', 'Makati City', 3, 'Post Malone', '2020-02-14', '2020-05-28', 6, '00:00:00', '00:00:00', 'Active'),
(4, 'Post 2', '', 'Opel Steet', 'Brgy. 175', 'Caloocan', 2, 'Test Only', '2020-02-10', '2020-02-11', 5, '07:00:00', '19:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_postschedule`
--

CREATE TABLE `dm_postschedule` (
  `postscheduleID` bigint(20) NOT NULL,
  `postID` int(11) NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_postschedule`
--

INSERT INTO `dm_postschedule` (`postscheduleID`, `postID`, `timein`, `timeout`) VALUES
(1, 1, '07:00:00', '19:00:00'),
(2, 1, '19:00:00', '07:00:00'),
(3, 2, '07:00:00', '19:00:00'),
(4, 2, '19:00:00', '07:00:00'),
(5, 3, '07:00:00', '19:00:00'),
(6, 3, '19:00:00', '07:00:00'),
(7, 4, '07:00:00', '19:00:00'),
(8, 4, '19:00:00', '07:00:00'),
(9, 5, '07:00:00', '19:00:00'),
(10, 5, '19:00:00', '07:00:00'),
(11, 6, '07:00:00', '19:00:00'),
(12, 6, '19:00:00', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_rate`
--

CREATE TABLE `dm_rate` (
  `rateID` bigint(20) NOT NULL,
  `rateCode` varchar(255) NOT NULL,
  `rateDescription` varchar(255) NOT NULL,
  `rate` decimal(10,3) NOT NULL,
  `ordinary` int(11) NOT NULL,
  `restday` int(11) NOT NULL,
  `specialholiday` int(11) NOT NULL,
  `specialrestday` int(11) NOT NULL,
  `regularholiday` int(11) NOT NULL,
  `regularrestday` int(11) NOT NULL,
  `doubleholiday` int(11) NOT NULL,
  `doublerestday` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `nightdifferential` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_rate`
--

INSERT INTO `dm_rate` (`rateID`, `rateCode`, `rateDescription`, `rate`, `ordinary`, `restday`, `specialholiday`, `specialrestday`, `regularholiday`, `regularrestday`, `doubleholiday`, `doublerestday`, `overtime`, `nightdifferential`) VALUES
(1, 'ord', 'Ordinary Day', '1.000', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'rst', 'Rest Day', '1.300', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'spc', 'Special Holiday', '1.300', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(4, 'spcrst', 'Special Holiday, Rest Day', '1.500', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(5, 'rgl', 'Regular Holiday', '2.000', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(6, 'rglrst', 'Regular Holiday, Rest Day', '2.600', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(7, 'dbl', 'Double Holiday', '3.000', 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(8, 'dblrst', 'Double Holiday, Rest Day', '3.900', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(9, 'ordnight', 'Ordinary Day, Night Shift', '1.100', 1, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(10, 'rstnight', 'Rest Day, Night Shift', '1.430', 0, 1, 0, 0, 0, 0, 0, 0, 0, 1),
(11, 'spcnight', 'Special Holiday, Night Shift', '1.430', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1),
(12, 'spcrstnight', 'Special Holiday, Rest Day, Night Shift', '1.650', 0, 0, 0, 1, 0, 0, 0, 0, 0, 1),
(13, 'rglnight', 'Regular Holiday, Night Shift', '2.200', 0, 0, 0, 0, 1, 0, 0, 0, 0, 1),
(14, 'rglrstnight', 'Regular Holiday, Rest Day, Night Shift', '2.860', 0, 0, 0, 0, 0, 1, 0, 0, 0, 1),
(15, 'dblnight', 'Double Holiday, Night Shift', '3.300', 0, 0, 0, 0, 0, 0, 1, 0, 0, 1),
(16, 'dblrstnight', 'Double Holiday, Rest Day, Night Shift', '4.290', 0, 0, 0, 0, 0, 0, 0, 1, 0, 1),
(17, 'ordot', 'Ordinary Day, Overtime', '1.250', 1, 0, 0, 0, 0, 0, 0, 0, 1, 0),
(18, 'rstot', 'Rest Day, Overtime', '1.690', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0),
(19, 'spcot', 'Special Holiday, Overtime', '1.690', 0, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(20, 'spcrstot', 'Special Holiday, Rest Day, Overtime', '1.950', 0, 0, 0, 1, 0, 0, 0, 0, 1, 0),
(21, 'rglot', 'Regular Holiday, Overtime', '2.600', 0, 0, 0, 0, 1, 0, 0, 0, 1, 0),
(22, 'rglrstot', 'Regular Holiday, Rest Day, Overtime', '3.380', 0, 0, 0, 0, 0, 1, 0, 0, 1, 0),
(23, 'dblot', 'Double Holiday, Overtime', '3.900', 0, 0, 0, 0, 0, 0, 1, 0, 1, 0),
(24, 'dblrstot', 'Double Holiday, Rest Day, Overtime', '5.070', 0, 0, 0, 0, 0, 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_retirement`
--

CREATE TABLE `dm_retirement` (
  `retirementID` bigint(20) NOT NULL,
  `employeeID` varchar(255) DEFAULT '',
  `usersubmitted` bigint(20) DEFAULT NULL,
  `datesubmitted` datetime DEFAULT NULL,
  `userapproved` varchar(255) DEFAULT NULL,
  `dateapproved` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `retirementstatus` int(11) NOT NULL,
  `retirementidstatus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_retirement`
--

INSERT INTO `dm_retirement` (`retirementID`, `employeeID`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `retirementstatus`, `retirementidstatus`) VALUES
(1, '0', NULL, NULL, NULL, NULL, 0, 0, 0, 0);

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
(26, 1, 26, 0),
(27, 1, 27, 0),
(28, 1, 28, 1),
(29, 1, 29, 1),
(30, 1, 30, 1),
(31, 1, 31, 1),
(32, 1, 32, 1),
(33, 1, 33, 1),
(34, 1, 34, 1),
(35, 1, 35, 1),
(36, 1, 36, 1),
(37, 1, 37, 1),
(38, 1, 38, 0),
(39, 2, 1, 1),
(40, 2, 2, 1),
(41, 2, 3, 1),
(42, 2, 4, 1),
(43, 2, 5, 1),
(44, 2, 6, 1),
(45, 2, 7, 1),
(46, 2, 8, 1),
(47, 2, 9, 1),
(48, 2, 10, 1),
(49, 2, 11, 1),
(50, 2, 12, 1),
(51, 2, 13, 1),
(52, 2, 14, 1),
(53, 2, 15, 1),
(54, 2, 16, 1),
(55, 2, 17, 1),
(56, 2, 18, 1),
(57, 2, 19, 1),
(58, 2, 20, 1),
(59, 2, 21, 1),
(60, 2, 22, 1),
(61, 2, 23, 1),
(62, 2, 24, 1),
(63, 2, 25, 1),
(64, 2, 26, 0),
(65, 2, 27, 0),
(66, 2, 28, 1),
(67, 2, 29, 1),
(68, 2, 30, 1),
(69, 2, 31, 1),
(70, 2, 32, 1),
(71, 2, 33, 1),
(72, 2, 34, 1),
(73, 2, 35, 1),
(74, 2, 36, 1),
(75, 2, 37, 1),
(76, 2, 38, 1),
(77, 3, 1, 0),
(78, 3, 2, 0),
(79, 3, 3, 1),
(80, 3, 4, 0),
(81, 3, 5, 0),
(82, 3, 6, 0),
(83, 3, 7, 0),
(84, 3, 8, 0),
(85, 3, 9, 0),
(86, 3, 10, 0),
(87, 3, 11, 0),
(88, 3, 12, 0),
(89, 3, 13, 0),
(90, 3, 14, 0),
(91, 3, 15, 0),
(92, 3, 16, 0),
(93, 3, 17, 0),
(94, 3, 18, 0),
(95, 3, 19, 0),
(96, 3, 20, 0),
(97, 3, 21, 0),
(98, 3, 22, 0),
(99, 3, 23, 0),
(100, 3, 24, 0),
(101, 3, 25, 0),
(102, 3, 26, 0),
(103, 3, 27, 0),
(104, 3, 28, 0),
(105, 3, 29, 0),
(106, 3, 30, 0),
(107, 3, 31, 0),
(108, 3, 32, 0),
(109, 3, 33, 0),
(110, 3, 34, 0),
(111, 3, 35, 0),
(112, 3, 36, 0);

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
(3, 'Security Guard');

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
(12, 37, 6),
(13, 37, 7),
(26, 38, 6),
(27, 38, 7);

-- --------------------------------------------------------

--
-- Table structure for table `dm_scheduleguard`
--

CREATE TABLE `dm_scheduleguard` (
  `scheduleID` bigint(20) NOT NULL,
  `postscheduleID` bigint(20) NOT NULL,
  `scheduleDay` int(11) NOT NULL,
  `postType` varchar(255) NOT NULL,
  `postID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dateto` date NOT NULL,
  `usersubmitted` bigint(20) DEFAULT NULL,
  `datesubmitted` datetime DEFAULT NULL,
  `userapproved` varchar(255) DEFAULT NULL,
  `dateapproved` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `thrmonthstatus` int(11) NOT NULL,
  `monthstatus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_thrmonth`
--

INSERT INTO `dm_thrmonth` (`thrmonthID`, `datefrom`, `dateto`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `thrmonthstatus`, `monthstatus`) VALUES
(1, '1888-01-01', '1888-01-01', NULL, NULL, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeeping`
--

CREATE TABLE `dm_timekeeping` (
  `timekeepingID` bigint(20) NOT NULL,
  `timekeepingType` int(11) NOT NULL,
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
  `reason` text NOT NULL,
  `userdenied` varchar(255) DEFAULT NULL,
  `datedenied` varchar(255) DEFAULT NULL,
  `payrollstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_timekeeping`
--

INSERT INTO `dm_timekeeping` (`timekeepingID`, `timekeepingType`, `datefrom`, `dateto`, `payperiod`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `timekeepingstatus`, `reason`, `userdenied`, `datedenied`, `payrollstatus`) VALUES
(1, 1, '2020-03-01', '2020-03-15', 1, NULL, NULL, NULL, NULL, 0, 0, 0, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeepingdetails`
--

CREATE TABLE `dm_timekeepingdetails` (
  `timesheetID` bigint(20) NOT NULL,
  `timekeepingID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `rateCode` varchar(255) NOT NULL,
  `datesched` date NOT NULL,
  `clientID` bigint(20) NOT NULL,
  `postID` bigint(20) NOT NULL,
  `timein` datetime NOT NULL,
  `timeout` datetime NOT NULL,
  `post_timein` time NOT NULL,
  `post_timeout` time NOT NULL,
  `actualhours` time NOT NULL,
  `actual_regular_hours` time NOT NULL,
  `ordlate` decimal(10,2) NOT NULL,
  `rstlate` decimal(10,2) NOT NULL,
  `spclate` decimal(10,2) NOT NULL,
  `spcrstlate` decimal(10,2) NOT NULL,
  `rgllate` decimal(10,2) NOT NULL,
  `rglrstlate` decimal(10,2) NOT NULL,
  `dbllate` decimal(10,2) NOT NULL,
  `dblrstlate` decimal(10,2) NOT NULL,
  `ord` decimal(10,2) NOT NULL,
  `rst` decimal(10,2) NOT NULL,
  `spc` decimal(10,2) NOT NULL,
  `spcrst` decimal(10,2) NOT NULL,
  `rgl` decimal(10,2) NOT NULL,
  `rglrst` decimal(10,2) NOT NULL,
  `dbl` decimal(10,2) NOT NULL,
  `dblrst` decimal(10,2) NOT NULL,
  `actual_ot_hours` time NOT NULL,
  `ordot` decimal(10,2) NOT NULL,
  `rstot` decimal(10,2) NOT NULL,
  `spcot` decimal(10,2) NOT NULL,
  `spcrstot` decimal(10,2) NOT NULL,
  `rglot` decimal(10,2) NOT NULL,
  `rglrstot` decimal(10,2) NOT NULL,
  `dblot` decimal(10,2) NOT NULL,
  `dblrstot` decimal(10,2) NOT NULL,
  `actual_nightdiff_hours` time NOT NULL,
  `ordnight` decimal(10,2) NOT NULL,
  `rstnight` decimal(10,2) NOT NULL,
  `spcnight` decimal(10,2) NOT NULL,
  `spcrstnight` decimal(10,2) NOT NULL,
  `rglnight` decimal(10,2) NOT NULL,
  `rglrstnight` decimal(10,2) NOT NULL,
  `dblnight` decimal(10,2) NOT NULL,
  `dblrstnight` decimal(10,2) NOT NULL
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
-- Indexes for table `dm_employee`
--
ALTER TABLE `dm_employee`
  ADD PRIMARY KEY (`employeeID`);

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
-- Indexes for table `dm_loan`
--
ALTER TABLE `dm_loan`
  ADD PRIMARY KEY (`loanID`);

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
-- Indexes for table `dm_payslipstatus`
--
ALTER TABLE `dm_payslipstatus`
  ADD PRIMARY KEY (`payslipstatusID`);

--
-- Indexes for table `dm_philhealthtable`
--
ALTER TABLE `dm_philhealthtable`
  ADD PRIMARY KEY (`philhealthID`);

--
-- Indexes for table `dm_post`
--
ALTER TABLE `dm_post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `dm_postschedule`
--
ALTER TABLE `dm_postschedule`
  ADD PRIMARY KEY (`postscheduleID`);

--
-- Indexes for table `dm_rate`
--
ALTER TABLE `dm_rate`
  ADD PRIMARY KEY (`rateID`);

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
-- Indexes for table `dm_scheduleguard`
--
ALTER TABLE `dm_scheduleguard`
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
  MODIFY `approvalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dm_approvaldet`
--
ALTER TABLE `dm_approvaldet`
  MODIFY `approvaldetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `dm_approvalmodule`
--
ALTER TABLE `dm_approvalmodule`
  MODIFY `approvalmoduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dm_bank`
--
ALTER TABLE `dm_bank`
  MODIFY `bankID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `departmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dm_designation`
--
ALTER TABLE `dm_designation`
  MODIFY `designationID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_employeecreditleave`
--
ALTER TABLE `dm_employeecreditleave`
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dm_employeeleave`
--
ALTER TABLE `dm_employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `leavetypeID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dm_loan`
--
ALTER TABLE `dm_loan`
  MODIFY `loanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_loandeduction`
--
ALTER TABLE `dm_loandeduction`
  MODIFY `loandeductionID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_modulemstr`
--
ALTER TABLE `dm_modulemstr`
  MODIFY `moduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `dm_overtime`
--
ALTER TABLE `dm_overtime`
  MODIFY `overtimeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_payroll`
--
ALTER TABLE `dm_payroll`
  MODIFY `payrollID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_payrolldetails`
--
ALTER TABLE `dm_payrolldetails`
  MODIFY `payrolldetailsID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_payslipstatus`
--
ALTER TABLE `dm_payslipstatus`
  MODIFY `payslipstatusID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_philhealthtable`
--
ALTER TABLE `dm_philhealthtable`
  MODIFY `philhealthID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_post`
--
ALTER TABLE `dm_post`
  MODIFY `postID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dm_postschedule`
--
ALTER TABLE `dm_postschedule`
  MODIFY `postscheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dm_rate`
--
ALTER TABLE `dm_rate`
  MODIFY `rateID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `dm_retirement`
--
ALTER TABLE `dm_retirement`
  MODIFY `retirementID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_rolemodule`
--
ALTER TABLE `dm_rolemodule`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `dm_rolemstr`
--
ALTER TABLE `dm_rolemstr`
  MODIFY `roleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_schedule`
--
ALTER TABLE `dm_schedule`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `dm_scheduleguard`
--
ALTER TABLE `dm_scheduleguard`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT;
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
  MODIFY `thrmonthID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_timekeeping`
--
ALTER TABLE `dm_timekeeping`
  MODIFY `timekeepingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_timekeepingdetails`
--
ALTER TABLE `dm_timekeepingdetails`
  MODIFY `timesheetID` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
