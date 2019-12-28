-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 03:39 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deltamikepmsnew`
--

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
(1, 'IT  Firm', 'Wilson1', 'Arrellano St., Dagupan City', 'Dagupan', 'Pangasinan', '1222', 'sadsad@gmail.com', '1222-344-4343', '3333-343-4434', '', 'sadsasda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_company`
--
ALTER TABLE `dm_company`
  ADD PRIMARY KEY (`companyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_company`
--
ALTER TABLE `dm_company`
  MODIFY `companyID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
