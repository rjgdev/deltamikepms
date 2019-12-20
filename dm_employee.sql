-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 08:37 AM
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
(1, 'wqaxq', '', 'wA', 'Male', '', 'w', 'w', 'w', '19/12/2019', '2334-344-3434', 'Single', 'ew', '19/12/2019', 1, '1', 1, 0, 0, '', '', ' 3.0000', ' 3.0000', ' 3.0000', 'CHINA BANK', '34344343', '', '', '', '', 'Active', 1, '', 1, '2019-12-19 09:52:20.819238'),
(2, 'Q', '', 'Q', 'Male', '', 'Q', 'Q', 'Q', '19/12/2019', '4333-333-4444', 'Single', 'Q', '19/12/2019', 1, '1', 1, 0, 0, '', '', ' 33.0000', ' 3.0000', '', 'China bank', '0', '', '', '', '', 'Terminated', 1, '', 1, '2019-12-19 09:59:16.963662'),
(3, 'caq', '', 'c', 'Male', '', 'c', 'c', 'c', '19/12/2019', '3434-344-3434', 'Single', 'c', '19/12/2019', 1, '1', 1, 0, 0, '', '', ' 2.0000', ' 2.0000', '', 'wilson', '1', '', '', '', '', 'End of Contract', 1, '', 1, '2019-12-19 11:11:28.192688');

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
