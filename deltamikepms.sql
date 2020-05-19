-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 07:35 AM
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
-- Table structure for table `access_acaccesslevel`
--

CREATE TABLE `access_acaccesslevel` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `level_id` int(11) NOT NULL,
  `level_name` varchar(30) NOT NULL,
  `ac_tz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_acaccesslevel_doors`
--

CREATE TABLE `access_acaccesslevel_doors` (
  `id` int(11) NOT NULL,
  `acaccesslevel_id` int(11) NOT NULL,
  `acdoor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_acaccesslevel_employees`
--

CREATE TABLE `access_acaccesslevel_employees` (
  `id` int(11) NOT NULL,
  `acaccesslevel_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_acantipassback`
--

CREATE TABLE `access_acantipassback` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `door_id` int(11) NOT NULL,
  `comb` smallint(6) NOT NULL,
  `state` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_accombgroup`
--

CREATE TABLE `access_accombgroup` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `comb_id` int(11) NOT NULL,
  `index` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `opener_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_acdoor`
--

CREATE TABLE `access_acdoor` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `door_id` int(11) NOT NULL,
  `device_id` int(11) DEFAULT NULL,
  `door_no` smallint(6) NOT NULL,
  `door_name` varchar(50) NOT NULL,
  `is_att` smallint(6) NOT NULL,
  `lock_delay` smallint(5) UNSIGNED NOT NULL,
  `sensor_delay` int(10) UNSIGNED NOT NULL,
  `sensor_type` smallint(6) NOT NULL,
  `alarm_delay` smallint(5) UNSIGNED NOT NULL,
  `retry_times` smallint(6) NOT NULL,
  `no_tz_id` int(11) DEFAULT NULL,
  `nc_tz_id` int(11) DEFAULT NULL,
  `valid_holiday` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_acgroup`
--

CREATE TABLE `access_acgroup` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `group_no` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `verification_mode` smallint(6) DEFAULT NULL,
  `tzs_id` int(11) DEFAULT NULL,
  `include_holidays` smallint(6) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_acgroup`
--

INSERT INTO `access_acgroup` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `group_id`, `group_no`, `group_name`, `verification_mode`, `tzs_id`, `include_holidays`, `remarks`) VALUES
(NULL, '2019-12-17 11:38:56', NULL, '2019-12-17 11:38:56', NULL, NULL, 0, 1, 1, 'Default Access Group', 0, 1, 0, 'Default Access Group');

-- --------------------------------------------------------

--
-- Table structure for table `access_acholidays`
--

CREATE TABLE `access_acholidays` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `holiday_no` int(11) NOT NULL,
  `holiday_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `holiday_type` smallint(6) DEFAULT NULL,
  `tz_id` int(11) DEFAULT NULL,
  `recurrence` smallint(6) DEFAULT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_actimezone`
--

CREATE TABLE `access_actimezone` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `tzs_id` int(11) NOT NULL,
  `tz_interval` int(11) NOT NULL,
  `tz_no` int(11) NOT NULL,
  `tz_period` varchar(100) NOT NULL,
  `remarks` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_actimezone`
--

INSERT INTO `access_actimezone` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `tzs_id`, `tz_interval`, `tz_no`, `tz_period`, `remarks`) VALUES
(1, NULL, '2019-12-17 11:38:56', NULL, '2019-12-17 11:38:56', NULL, NULL, 0, 1, 1, 1, '00002359000023590000235900002359000023590000235900002359', 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `access_actimezones`
--

CREATE TABLE `access_actimezones` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `tzs_name` varchar(50) NOT NULL,
  `mon_start_1` time NOT NULL,
  `mon_end_1` time NOT NULL,
  `mon_start_2` time NOT NULL,
  `mon_end_2` time NOT NULL,
  `mon_start_3` time NOT NULL,
  `mon_end_3` time NOT NULL,
  `tue_start_1` time NOT NULL,
  `tue_end_1` time NOT NULL,
  `tue_start_2` time NOT NULL,
  `tue_end_2` time NOT NULL,
  `tue_start_3` time NOT NULL,
  `tue_end_3` time NOT NULL,
  `wed_start_1` time NOT NULL,
  `wed_end_1` time NOT NULL,
  `wed_start_2` time NOT NULL,
  `wed_end_2` time NOT NULL,
  `wed_start_3` time NOT NULL,
  `wed_end_3` time NOT NULL,
  `thu_start_1` time NOT NULL,
  `thu_end_1` time NOT NULL,
  `thu_start_2` time NOT NULL,
  `thu_end_2` time NOT NULL,
  `thu_start_3` time NOT NULL,
  `thu_end_3` time NOT NULL,
  `fri_start_1` time NOT NULL,
  `fri_end_1` time NOT NULL,
  `fri_start_2` time NOT NULL,
  `fri_end_2` time NOT NULL,
  `fri_start_3` time NOT NULL,
  `fri_end_3` time NOT NULL,
  `sat_start_1` time NOT NULL,
  `sat_end_1` time NOT NULL,
  `sat_start_2` time NOT NULL,
  `sat_end_2` time NOT NULL,
  `sat_start_3` time NOT NULL,
  `sat_end_3` time NOT NULL,
  `sun_start_1` time NOT NULL,
  `sun_end_1` time NOT NULL,
  `sun_start_2` time NOT NULL,
  `sun_end_2` time NOT NULL,
  `sun_start_3` time NOT NULL,
  `sun_end_3` time NOT NULL,
  `ht1_start_1` time NOT NULL,
  `ht1_end_1` time NOT NULL,
  `ht1_start_2` time NOT NULL,
  `ht1_end_2` time NOT NULL,
  `ht1_start_3` time NOT NULL,
  `ht1_end_3` time NOT NULL,
  `ht2_start_1` time NOT NULL,
  `ht2_end_1` time NOT NULL,
  `ht2_start_2` time NOT NULL,
  `ht2_end_2` time NOT NULL,
  `ht2_start_3` time NOT NULL,
  `ht2_end_3` time NOT NULL,
  `ht3_start_1` time NOT NULL,
  `ht3_end_1` time NOT NULL,
  `ht3_start_2` time NOT NULL,
  `ht3_end_2` time NOT NULL,
  `ht3_start_3` time NOT NULL,
  `ht3_end_3` time NOT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_actimezones`
--

INSERT INTO `access_actimezones` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `tzs_name`, `mon_start_1`, `mon_end_1`, `mon_start_2`, `mon_end_2`, `mon_start_3`, `mon_end_3`, `tue_start_1`, `tue_end_1`, `tue_start_2`, `tue_end_2`, `tue_start_3`, `tue_end_3`, `wed_start_1`, `wed_end_1`, `wed_start_2`, `wed_end_2`, `wed_start_3`, `wed_end_3`, `thu_start_1`, `thu_end_1`, `thu_start_2`, `thu_end_2`, `thu_start_3`, `thu_end_3`, `fri_start_1`, `fri_end_1`, `fri_start_2`, `fri_end_2`, `fri_start_3`, `fri_end_3`, `sat_start_1`, `sat_end_1`, `sat_start_2`, `sat_end_2`, `sat_start_3`, `sat_end_3`, `sun_start_1`, `sun_end_1`, `sun_start_2`, `sun_end_2`, `sun_start_3`, `sun_end_3`, `ht1_start_1`, `ht1_end_1`, `ht1_start_2`, `ht1_end_2`, `ht1_start_3`, `ht1_end_3`, `ht2_start_1`, `ht2_end_1`, `ht2_start_2`, `ht2_end_2`, `ht2_start_3`, `ht2_end_3`, `ht3_start_1`, `ht3_end_1`, `ht3_start_2`, `ht3_end_2`, `ht3_start_3`, `ht3_end_3`, `remarks`) VALUES
(1, NULL, '2019-12-17 11:38:56', NULL, '2019-12-17 11:38:56', NULL, NULL, 0, '24-Hour Accessible', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '23:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '24-Hour Accessible');

-- --------------------------------------------------------

--
-- Table structure for table `access_acunlockcomb`
--

CREATE TABLE `access_acunlockcomb` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `comb_no` int(11) NOT NULL,
  `door_id` int(11) NOT NULL,
  `comb_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_morecardempgroup`
--

CREATE TABLE `acc_morecardempgroup` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `group_name` varchar(30) NOT NULL,
  `memo` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE `action_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `object_id` varchar(100) DEFAULT NULL,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL,
  `change_message` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_log`
--

INSERT INTO `action_log` (`id`, `action_time`, `user_id`, `content_type_id`, `object_id`, `object_repr`, `action_flag`, `change_message`) VALUES
(1, '2019-12-17 11:37:26', NULL, 1, '1', 'dbversion(1.5322)', 1, ''),
(2, '2019-12-17 11:37:26', NULL, 1, '2', 'msg_scanner(07:01)', 1, ''),
(3, '2019-12-17 11:37:27', NULL, 1, '3', 'browse_title(BioTime)', 1, ''),
(4, '2019-12-17 11:37:30', NULL, 4, 'phone_number', 'phone_number', 1, ''),
(5, '2019-12-17 11:37:30', NULL, 4, 'record_type', 'record_type', 1, ''),
(6, '2019-12-17 11:37:30', NULL, 4, 'name_pos', 'name_pos', 1, ''),
(7, '2019-12-17 11:37:31', NULL, 4, 'estd_id', 'estd_id', 1, ''),
(8, '2019-12-17 11:37:31', NULL, 4, 'agent_id', 'agent_id', 1, ''),
(9, '2019-12-17 11:37:31', NULL, 4, 'company_email', 'company_email', 1, ''),
(10, '2019-12-17 11:37:31', NULL, 4, 'currency', 'currency', 1, ''),
(11, '2019-12-17 11:37:31', NULL, 4, 'company_country', 'company_country', 1, ''),
(12, '2019-12-17 11:37:31', NULL, 4, 'show_in_report', 'show_in_report', 1, ''),
(13, '2019-12-17 11:37:31', NULL, 4, 'company_name', 'company_name', 1, ''),
(14, '2019-12-17 11:37:31', NULL, 4, 'logo_pos', 'logo_pos', 1, ''),
(15, '2019-12-17 11:37:32', NULL, 6, 'email_host_password', 'email_host_password', 1, ''),
(16, '2019-12-17 11:37:33', NULL, 6, 'sender_name', 'sender_name', 1, ''),
(17, '2019-12-17 11:37:33', NULL, 6, 'late_count', 'late_count', 1, ''),
(18, '2019-12-17 11:37:33', NULL, 6, 'early_count', 'early_count', 1, ''),
(19, '2019-12-17 11:37:33', NULL, 6, 'absent_count', 'absent_count', 1, ''),
(20, '2019-12-17 11:37:33', NULL, 6, 'send_time', 'send_time', 1, ''),
(21, '2019-12-17 11:37:33', NULL, 6, 'email_host_user', 'email_host_user', 1, ''),
(22, '2019-12-17 11:37:33', NULL, 6, 'send_rate', 'send_rate', 1, ''),
(23, '2019-12-17 11:37:34', NULL, 6, 'pop_alert', 'pop_alert', 1, ''),
(24, '2019-12-17 11:37:34', NULL, 6, 'send_day', 'send_day', 1, ''),
(25, '2019-12-17 11:37:34', NULL, 6, 'email_alert', 'email_alert', 1, ''),
(26, '2019-12-17 11:37:34', NULL, 6, 'exception_send', 'exception_send', 1, ''),
(27, '2019-12-17 11:37:34', NULL, 6, 'email_use_tls', 'email_use_tls', 1, ''),
(28, '2019-12-17 11:37:34', NULL, 6, 'email_port', 'email_port', 1, ''),
(29, '2019-12-17 11:37:34', NULL, 6, 'email_host', 'email_host', 1, ''),
(30, '2019-12-17 11:37:37', NULL, 10, '1', 'base.Date Format', 1, ''),
(31, '2019-12-17 11:37:37', NULL, 10, '2', 'base.Time', 1, ''),
(32, '2019-12-17 11:37:37', NULL, 10, '3', 'base.Date format', 1, ''),
(33, '2019-12-17 11:37:37', NULL, 10, '4', 'base.Short Date format', 1, ''),
(34, '2019-12-17 11:37:37', NULL, 10, '5', 'base.Date format', 1, ''),
(35, '2019-12-17 11:37:37', NULL, 10, '6', 'base.Language', 1, ''),
(36, '2019-12-17 11:37:37', NULL, 10, '7', 'base.System Default Page', 1, ''),
(37, '2019-12-17 11:37:38', NULL, 10, '8', 'base.System Default Page', 1, ''),
(38, '2019-12-17 11:37:38', NULL, 10, '9', 'base.Backup Time', 1, ''),
(39, '2019-12-17 11:37:40', NULL, 10, '10', 'dbapp.Maximum Image Width', 1, ''),
(40, '2019-12-17 11:37:40', NULL, 10, '11', 'dbapp.Style', 1, ''),
(41, '2019-12-17 11:37:44', NULL, 47, '1', '1 Area Name', 1, ''),
(42, '2019-12-17 11:37:47', NULL, 51, '1', '1 Department', 1, ''),
(43, '2019-12-17 11:37:51', NULL, 35, '1', 'Headquarters', 1, ''),
(44, '2019-12-17 11:37:55', NULL, 10, '12', 'iclock.Default access control page', 1, ''),
(45, '2019-12-17 11:38:01', NULL, 62, '1', 'Personnel Card---1', 1, ''),
(46, '2019-12-17 11:38:04', NULL, 65, '1', 'Breakfast 00:00:00 10:00:59', 1, ''),
(47, '2019-12-17 11:38:04', NULL, 65, '2', 'Lunch 10:01:00 14:00:59', 1, ''),
(48, '2019-12-17 11:38:04', NULL, 65, '3', 'Dinner 14:01:00 20:00:59', 1, ''),
(49, '2019-12-17 11:38:05', NULL, 65, '4', 'Supper 20:01:00 23:59:59', 1, ''),
(50, '2019-12-17 11:38:05', NULL, 65, '5', 'Meal 05 00:00:00 00:00:00', 1, ''),
(51, '2019-12-17 11:38:05', NULL, 65, '6', 'Meal 06 00:00:00 00:00:00', 1, ''),
(52, '2019-12-17 11:38:05', NULL, 65, '7', 'Meal 07 00:00:00 00:00:00', 1, ''),
(53, '2019-12-17 11:38:06', NULL, 65, '8', 'Meal 08 00:00:00 00:00:00', 1, ''),
(54, '2019-12-17 11:38:08', NULL, 10, '13', 'personnel.Default access control page', 1, ''),
(55, '2019-12-17 11:38:13', NULL, 72, '1', 'System', 1, ''),
(56, '2019-12-17 11:38:13', NULL, 72, '2', 'Attendance', 1, ''),
(57, '2019-12-17 11:38:14', NULL, 72, '4', 'Personnel', 1, ''),
(58, '2019-12-17 11:38:18', NULL, 93, 'WorkMonthStartDay', 'WorkMonthStartDay', 1, ''),
(59, '2019-12-17 11:38:19', NULL, 93, 'NoInAbsent', 'NoInAbsent', 1, ''),
(60, '2019-12-17 11:38:19', NULL, 93, 'filter_emp', 'filter_emp', 1, ''),
(61, '2019-12-17 11:38:19', NULL, 93, 'leave_include_in', 'leave_include_in', 1, ''),
(62, '2019-12-17 11:38:19', NULL, 93, 'MaxShiftInterval', 'MaxShiftInterval', 1, ''),
(63, '2019-12-17 11:38:20', NULL, 93, 'MinsLate', 'MinsLate', 1, ''),
(64, '2019-12-17 11:38:20', NULL, 93, 'MinsWorkDay', 'MinsWorkDay', 1, ''),
(65, '2019-12-17 11:38:20', NULL, 93, 'TakeCardOut', 'TakeCardOut', 1, ''),
(66, '2019-12-17 11:38:20', NULL, 93, 'LeaveClass11', 'LeaveClass11', 1, ''),
(67, '2019-12-17 11:38:20', NULL, 93, 'enable_capture', 'enable_capture', 1, ''),
(68, '2019-12-17 11:38:20', NULL, 93, 'LeaveClass0', 'LeaveClass0', 1, ''),
(69, '2019-12-17 11:38:20', NULL, 93, 'short_time', 'short_time', 1, ''),
(70, '2019-12-17 11:38:20', NULL, 93, 'LeaveClass13', 'LeaveClass13', 1, ''),
(71, '2019-12-17 11:38:21', NULL, 93, 'training_include_out', 'training_include_out', 1, ''),
(72, '2019-12-17 11:38:21', NULL, 93, 'NoOutAbsent', 'NoOutAbsent', 1, ''),
(73, '2019-12-17 11:38:21', NULL, 93, 'check_in', 'check_in', 1, ''),
(74, '2019-12-17 11:38:21', NULL, 93, 'training_include_in', 'training_include_in', 1, ''),
(75, '2019-12-17 11:38:21', NULL, 93, 'MinsNoIn', 'MinsNoIn', 1, ''),
(76, '2019-12-17 11:38:21', NULL, 93, 'EarlyAbsent', 'EarlyAbsent', 1, ''),
(77, '2019-12-17 11:38:21', NULL, 93, 'short_date', 'short_date', 1, ''),
(78, '2019-12-17 11:38:21', NULL, 93, 'LeaveClass8', 'LeaveClass8', 1, ''),
(79, '2019-12-17 11:38:21', NULL, 93, 'MinsWorkDay1', 'MinsWorkDay1', 1, ''),
(80, '2019-12-17 11:38:22', NULL, 93, 'TakeCardIn', 'TakeCardIn', 1, ''),
(81, '2019-12-17 11:38:22', NULL, 93, 'OutCheckRecType', 'OutCheckRecType', 1, ''),
(82, '2019-12-17 11:38:22', NULL, 93, 'LeaveClass9', 'LeaveClass9', 1, ''),
(83, '2019-12-17 11:38:22', NULL, 93, 'LeaveClass15', 'LeaveClass15', 1, ''),
(84, '2019-12-17 11:38:22', NULL, 93, 'MinsEarly', 'MinsEarly', 1, ''),
(85, '2019-12-17 11:38:22', NULL, 93, 'LateAbsent', 'LateAbsent', 1, ''),
(86, '2019-12-17 11:38:22', NULL, 93, 'jbd_action_type', 'jbd_action_type', 1, ''),
(87, '2019-12-17 11:38:22', NULL, 93, 'overtime_out', 'overtime_out', 1, ''),
(88, '2019-12-17 11:38:22', NULL, 93, 'TwoDay', 'TwoDay', 1, ''),
(89, '2019-12-17 11:38:22', NULL, 93, 'break_out', 'break_out', 1, ''),
(90, '2019-12-17 11:38:23', NULL, 93, 'week', 'week', 1, ''),
(91, '2019-12-17 11:38:23', NULL, 93, 'multiple_dept', 'multiple_dept', 1, ''),
(92, '2019-12-17 11:38:23', NULL, 93, 'MinsEarlyAbsent', 'MinsEarlyAbsent', 1, ''),
(93, '2019-12-17 11:38:23', NULL, 93, 'funckey14', 'funckey14', 1, ''),
(94, '2019-12-17 11:38:23', NULL, 93, 'funckey255', 'funckey255', 1, ''),
(95, '2019-12-17 11:38:23', NULL, 93, 'MinsOutOverTime', 'MinsOutOverTime', 1, ''),
(96, '2019-12-17 11:38:23', NULL, 93, 'funckey11', 'funckey11', 1, ''),
(97, '2019-12-17 11:38:23', NULL, 93, 'funckey10', 'funckey10', 1, ''),
(98, '2019-12-17 11:38:23', NULL, 93, 'funckey13', 'funckey13', 1, ''),
(99, '2019-12-17 11:38:23', NULL, 93, 'funckey12', 'funckey12', 1, ''),
(100, '2019-12-17 11:38:23', NULL, 93, 'punch_period', 'punch_period', 1, ''),
(101, '2019-12-17 11:38:24', NULL, 93, 'enable_funckey', 'enable_funckey', 1, ''),
(102, '2019-12-17 11:38:24', NULL, 93, 'MinsLateAbsent', 'MinsLateAbsent', 1, ''),
(103, '2019-12-17 11:38:24', NULL, 93, 'LeaveClass3', 'LeaveClass3', 1, ''),
(104, '2019-12-17 11:38:24', NULL, 93, 'leave_include_out', 'leave_include_out', 1, ''),
(105, '2019-12-17 11:38:24', NULL, 93, 'enable_workcode', 'enable_workcode', 1, ''),
(106, '2019-12-17 11:38:24', NULL, 93, 'check_out', 'check_out', 1, ''),
(107, '2019-12-17 11:38:24', NULL, 93, 'OTCheckRecType', 'OTCheckRecType', 1, ''),
(108, '2019-12-17 11:38:24', NULL, 93, 'OutOverTime', 'OutOverTime', 1, ''),
(109, '2019-12-17 11:38:24', NULL, 93, 'funckey0', 'funckey0', 1, ''),
(110, '2019-12-17 11:38:24', NULL, 93, 'LeaveClass1', 'LeaveClass1', 1, ''),
(111, '2019-12-17 11:38:24', NULL, 93, 'font_size', 'font_size', 1, ''),
(112, '2019-12-17 11:38:24', NULL, 93, 'LeaveClass7', 'LeaveClass7', 1, ''),
(113, '2019-12-17 11:38:25', NULL, 93, 'LeaveClass14', 'LeaveClass14', 1, ''),
(114, '2019-12-17 11:38:25', NULL, 93, 'LeaveClass6', 'LeaveClass6', 1, ''),
(115, '2019-12-17 11:38:25', NULL, 93, 'MinsNoOut', 'MinsNoOut', 1, ''),
(116, '2019-12-17 11:38:25', NULL, 93, 'LeaveClass10', 'LeaveClass10', 1, ''),
(117, '2019-12-17 11:38:25', NULL, 93, 'MinRecordInterval', 'MinRecordInterval', 1, ''),
(118, '2019-12-17 11:38:25', NULL, 93, 'LeaveClass12', 'LeaveClass12', 1, ''),
(119, '2019-12-17 11:38:25', NULL, 93, 'funckey8', 'funckey8', 1, ''),
(120, '2019-12-17 11:38:25', NULL, 93, 'funckey5', 'funckey5', 1, ''),
(121, '2019-12-17 11:38:25', NULL, 93, 'funckey4', 'funckey4', 1, ''),
(122, '2019-12-17 11:38:25', NULL, 93, 'funckey7', 'funckey7', 1, ''),
(123, '2019-12-17 11:38:25', NULL, 93, 'funckey6', 'funckey6', 1, ''),
(124, '2019-12-17 11:38:25', NULL, 93, 'funckey1', 'funckey1', 1, ''),
(125, '2019-12-17 11:38:26', NULL, 93, 'approval_ot', 'approval_ot', 1, ''),
(126, '2019-12-17 11:38:26', NULL, 93, 'funckey3', 'funckey3', 1, ''),
(127, '2019-12-17 11:38:26', NULL, 93, 'funckey2', 'funckey2', 1, ''),
(128, '2019-12-17 11:38:26', NULL, 93, 'LeaveClass2', 'LeaveClass2', 1, ''),
(129, '2019-12-17 11:38:26', NULL, 93, 'WorkWeekStartDay', 'WorkWeekStartDay', 1, ''),
(130, '2019-12-17 11:38:26', NULL, 93, 'overtime_in', 'overtime_in', 1, ''),
(131, '2019-12-17 11:38:26', NULL, 93, 'MinShiftInterval', 'MinShiftInterval', 1, ''),
(132, '2019-12-17 11:38:26', NULL, 93, 'funckey9', 'funckey9', 1, ''),
(133, '2019-12-17 11:38:26', NULL, 93, 'break_in', 'break_in', 1, ''),
(134, '2019-12-17 11:38:26', NULL, 93, 'LeaveClass4', 'LeaveClass4', 1, ''),
(135, '2019-12-17 11:38:26', NULL, 93, 'LeaveClass5', 'LeaveClass5', 1, ''),
(136, '2019-12-17 11:38:31', NULL, 122, '1', 'Sick Leave', 1, ''),
(137, '2019-12-17 11:38:31', NULL, 122, '2', 'Casual Leave', 1, ''),
(138, '2019-12-17 11:38:31', NULL, 122, '3', 'Maternity Leave', 1, ''),
(139, '2019-12-17 11:38:32', NULL, 122, '4', 'Compassionate Leave', 1, ''),
(140, '2019-12-17 11:38:33', NULL, 122, '5', 'Annual Leave', 1, ''),
(141, '2019-12-17 11:38:33', NULL, 122, '6', 'Business Trip', 1, ''),
(142, '2019-12-17 11:38:34', NULL, 123, '1000', 'LeaveClass1 object', 1, ''),
(143, '2019-12-17 11:38:34', NULL, 123, '1001', 'LeaveClass1 object', 1, ''),
(144, '2019-12-17 11:38:34', NULL, 123, '1002', 'LeaveClass1 object', 1, ''),
(145, '2019-12-17 11:38:34', NULL, 123, '1003', 'LeaveClass1 object', 1, ''),
(146, '2019-12-17 11:38:35', NULL, 123, '1004', 'LeaveClass1 object', 1, ''),
(147, '2019-12-17 11:38:35', NULL, 123, '1005', 'LeaveClass1 object', 1, ''),
(148, '2019-12-17 11:38:35', NULL, 123, '1008', 'LeaveClass1 object', 1, ''),
(149, '2019-12-17 11:38:35', NULL, 123, '1009', 'LeaveClass1 object', 1, ''),
(150, '2019-12-17 11:38:39', NULL, 10, '14', 'att.Default access control page', 1, ''),
(151, '2019-12-17 11:38:45', NULL, 162, '1', 'AED', 1, ''),
(152, '2019-12-17 11:38:46', NULL, 171, '1', 'FormulaSign object', 1, ''),
(153, '2019-12-17 11:38:46', NULL, 171, '2', 'FormulaSign object', 1, ''),
(154, '2019-12-17 11:38:47', NULL, 171, '3', 'FormulaSign object', 1, ''),
(155, '2019-12-17 11:38:47', NULL, 171, '4', 'FormulaSign object', 1, ''),
(156, '2019-12-17 11:38:47', NULL, 171, '5', 'FormulaSign object', 1, ''),
(157, '2019-12-17 11:38:51', NULL, 10, '15', 'payroll.????', 1, ''),
(158, '2019-12-17 11:38:56', NULL, 193, '1', '24-Hour Accessible', 1, ''),
(159, '2019-12-17 11:38:56', NULL, 194, '1', '1 ', 1, ''),
(160, '2019-12-17 11:38:56', NULL, 191, '1', '1 Default Access Group', 1, ''),
(161, '2019-12-17 11:38:59', NULL, 10, '16', 'access.Access Control Default UI', 1, ''),
(162, '2019-12-17 14:49:45', 1, NULL, '1', '', 5, ''),
(163, '2019-12-17 14:49:46', 1, 5, '1', '[en] content type.app_label: worktable -> worktable', 1, ''),
(164, '2019-12-17 14:49:47', 1, 5, '2', '[en] content type.app_label: dbapp -> dbapp', 1, ''),
(165, '2019-12-17 14:49:47', 1, 5, '3', '[en] content type.app_label: auth -> auth', 1, ''),
(166, '2019-12-17 14:49:47', 1, 5, '4', '[en] content type.app_label: django_extensions -> django_extensions', 1, ''),
(167, '2019-12-17 14:51:18', 1, 47, '2', '2 1701 Antel Global', 1, ''),
(168, '2019-12-17 14:51:37', 1, 32, '1', 'BOCK191760589(Testing Device)', 2, 'Device Name(auto_add->Testing Device);Time Zone(Etc/GMT+4->Etc/GMT+8);Serial Port No. (COM1->);Baud Rate(38400->);RS485 Address(1->);Area(1 Area Name->2 1701 Antel Global);Current price(yuan)(6.00->);Duration(minutes)(20->);Maximum Limit(999->);Cumulative Subsidy(1->);Check Blacklist(1->)'),
(169, '2019-12-17 14:51:41', 1, 32, '1', 'BOCK191760589(Testing Device)', 4, 'Sync Data To Device(sync_fingerprint=True, sync_employee=True, sync_picture=True, sync_face=True) '),
(170, '2019-12-17 14:53:21', 1, 32, '1', 'BOCK191760589(Testing Device)', 2, 'Device Name(auto_add->Testing Device);Fingerprint Algorithm(10.0 Algorithm->);Support FP(1->);Serial Port No. (COM1->);Baud Rate(38400->);RS485 Address(1->);Area(1 Area Name->2 1701 Antel Global);Current price(yuan)(6.00->);Duration(minutes)(20->);Maximum Limit(999->);Cumulative Subsidy(1->);Check Blacklist(1->)'),
(171, '2019-12-17 14:53:45', 1, 32, '1', 'BOCK191760589(Testing Device)', 4, 'Sync Data To Device(sync_fingerprint=True, sync_employee=True, sync_picture=True, sync_face=True) '),
(172, '2019-12-17 14:54:05', 1, 32, '1', 'BOCK191760589(Testing Device)', 4, 'Upload Data Again(upload_attlog=True, upload_user=True) '),
(173, '2019-12-17 14:54:14', NULL, 60, '1', '000000001 Administrator', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `areaadmin`
--

CREATE TABLE `areaadmin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attcalclog`
--

CREATE TABLE `attcalclog` (
  `id` int(11) NOT NULL,
  `DeptID` int(11) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime NOT NULL,
  `OperTime` datetime NOT NULL,
  `Type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attexception`
--

CREATE TABLE `attexception` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `ExceptionID` int(11) DEFAULT NULL,
  `AuditExcID` int(11) DEFAULT NULL,
  `OldAuditExcID` int(11) DEFAULT NULL,
  `OverlapTime` int(11) DEFAULT NULL,
  `TimeLong` int(11) DEFAULT NULL,
  `InScopeTime` int(11) DEFAULT NULL,
  `AttDate` datetime DEFAULT NULL,
  `OverlapWorkDayTail` int(11) NOT NULL,
  `OverlapWorkDay` double DEFAULT NULL,
  `schindex` int(11) DEFAULT NULL,
  `Minsworkday` int(11) DEFAULT NULL,
  `Minsworkday1` int(11) DEFAULT NULL,
  `schid` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attparam`
--

CREATE TABLE `attparam` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `ParaName` varchar(20) NOT NULL,
  `ParaType` varchar(2) DEFAULT NULL,
  `ParaValue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attparam`
--

INSERT INTO `attparam` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `ParaName`, `ParaType`, `ParaValue`) VALUES
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'approval_ot', NULL, '0'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'break_in', NULL, '"3"'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'break_out', NULL, '"2"'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'check_in', NULL, '"0"'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'check_out', NULL, '"1"'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'EarlyAbsent', NULL, '0'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'enable_capture', NULL, '0'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'enable_funckey', NULL, '0'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'enable_workcode', NULL, '0'),
(NULL, '2019-12-17 11:38:19', NULL, '2019-12-17 11:38:19', NULL, NULL, 0, 'filter_emp', NULL, '0'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'font_size', NULL, '8'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'funckey0', NULL, '"Check-In"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey1', NULL, '"Check-Out"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey10', NULL, '"10"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey11', NULL, '"11"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey12', NULL, '"12"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey13', NULL, '"13"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey14', NULL, '"14"'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'funckey2', NULL, '"Break-Out"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'funckey255', NULL, '"Unknown"'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'funckey3', NULL, '"Break-In"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey4', NULL, '"OT-In"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey5', NULL, '"OT-Out"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey6', NULL, '"6"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey7', NULL, '"7"'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'funckey8', NULL, '"8"'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'funckey9', NULL, '"9"'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'jbd_action_type', NULL, '1'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'LateAbsent', NULL, '0'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'LeaveClass0', NULL, '{"LeaveId": 1000, "MinUnit": 0.5, "IsLeave": 1, "LeaveName": "Actual Attendance", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 1, "ReportSymbol": " ", "Unit": 3}'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'LeaveClass1', NULL, '{"LeaveId": 1001, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Attendance Duration/Short", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": " ", "Unit": 2}'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'LeaveClass10', NULL, '{"LeaveId": 1010, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "No Check-In", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "[", "Unit": 1}'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'LeaveClass11', NULL, '{"LeaveId": 1011, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "No Check-Out", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "]", "Unit": 1}'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'LeaveClass12', NULL, '{"LeaveId": 1012, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Present", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "P", "Unit": 1}'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'LeaveClass13', NULL, '{"LeaveId": 1013, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Day Off", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "D", "Unit": 1}'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'LeaveClass14', NULL, '{"LeaveId": 1014, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Weekend", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "W", "Unit": 1}'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'LeaveClass15', NULL, '{"LeaveId": 1015, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Holiday", "Classify": 0, "RemaindCount": 0, "LeaveType": 2, "Color": 0, "RemaindProc": 2, "ReportSymbol": "H", "Unit": 1}'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'LeaveClass2', NULL, '{"LeaveId": 1002, "MinUnit": 1.0, "IsLeave": 2, "LeaveName": "Total Time/Total Time Worked", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": " ", "Unit": 2}'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'LeaveClass3', NULL, '{"LeaveId": 1003, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Break Time/Actual Break Time", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": " ", "Unit": 2}'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'LeaveClass4', NULL, '{"LeaveId": 1004, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Timetable", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": " ", "Unit": 2}'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'LeaveClass5', NULL, '{"LeaveId": 1005, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Late", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": ">", "Unit": 2}'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'LeaveClass6', NULL, '{"LeaveId": 1006, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Early Leave", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 2, "ReportSymbol": "<", "Unit": 2}'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'LeaveClass7', NULL, '{"LeaveId": 1007, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Leave", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 1, "ReportSymbol": "V", "Unit": 2}'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'LeaveClass8', NULL, '{"LeaveId": 1008, "MinUnit": 0.5, "IsLeave": 1, "LeaveName": "Absent", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 1, "ReportSymbol": "A", "Unit": 3}'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'LeaveClass9', NULL, '{"LeaveId": 1009, "MinUnit": 1.0, "IsLeave": 1, "LeaveName": "Overtime", "Classify": 0, "RemaindCount": 1, "LeaveType": 3, "Color": 0, "RemaindProc": 1, "ReportSymbol": "+", "Unit": 1}'),
(NULL, '2019-12-17 11:38:19', NULL, '2019-12-17 11:38:19', NULL, NULL, 0, 'leave_include_in', NULL, '1'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'leave_include_out', NULL, '1'),
(NULL, '2019-12-17 11:38:19', NULL, '2019-12-17 11:38:19', NULL, NULL, 0, 'MaxShiftInterval', NULL, '660'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'MinRecordInterval', NULL, '5'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'MinsEarly', NULL, '5'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'MinsEarlyAbsent', NULL, '100'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'MinShiftInterval', NULL, '120'),
(NULL, '2019-12-17 11:38:19', NULL, '2019-12-17 11:38:19', NULL, NULL, 0, 'MinsLate', NULL, '10'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'MinsLateAbsent', NULL, '100'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'MinsNoIn', NULL, '60'),
(NULL, '2019-12-17 11:38:25', NULL, '2019-12-17 11:38:25', NULL, NULL, 0, 'MinsNoOut', NULL, '60'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'MinsOutOverTime', NULL, '60'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'MinsWorkDay', NULL, '480'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'MinsWorkDay1', NULL, '0'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'multiple_dept', NULL, '0'),
(NULL, '2019-12-17 11:38:19', NULL, '2019-12-17 11:38:19', NULL, NULL, 0, 'NoInAbsent', NULL, '1'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'NoOutAbsent', NULL, '1'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'OTCheckRecType', NULL, '2'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'OutCheckRecType', NULL, '3'),
(NULL, '2019-12-17 11:38:24', NULL, '2019-12-17 11:38:24', NULL, NULL, 0, 'OutOverTime', NULL, '1'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'overtime_in', NULL, '"4"'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'overtime_out', NULL, '"5"'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:23', NULL, NULL, 0, 'punch_period', NULL, '1'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'short_date', NULL, '"1"'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'short_time', NULL, '"1"'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'TakeCardIn', NULL, '1'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'TakeCardOut', NULL, '1'),
(NULL, '2019-12-17 11:38:21', NULL, '2019-12-17 11:38:21', NULL, NULL, 0, 'training_include_in', NULL, '1'),
(NULL, '2019-12-17 11:38:20', NULL, '2019-12-17 11:38:20', NULL, NULL, 0, 'training_include_out', NULL, '1'),
(NULL, '2019-12-17 11:38:22', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'TwoDay', NULL, '0'),
(NULL, '2019-12-17 11:38:23', NULL, '2019-12-17 11:38:22', NULL, NULL, 0, 'week', NULL, '[]'),
(NULL, '2019-12-17 11:38:18', NULL, '2019-12-17 11:38:18', NULL, NULL, 0, 'WorkMonthStartDay', NULL, '1'),
(NULL, '2019-12-17 11:38:26', NULL, '2019-12-17 11:38:26', NULL, NULL, 0, 'WorkWeekStartDay', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `attrecabnormite`
--

CREATE TABLE `attrecabnormite` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `checktime` datetime NOT NULL,
  `CheckType` varchar(5) NOT NULL,
  `NewType` varchar(2) DEFAULT NULL,
  `AbNormiteID` int(11) DEFAULT NULL,
  `SchID` int(11) DEFAULT NULL,
  `OP` int(11) DEFAULT NULL,
  `AttDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attshifts`
--

CREATE TABLE `attshifts` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `SchIndex` int(11) DEFAULT NULL,
  `AutoSch` smallint(6) DEFAULT NULL,
  `AttDate` datetime NOT NULL,
  `SchId` int(11) DEFAULT NULL,
  `ClockInTime` datetime NOT NULL,
  `ClockOutTime` datetime NOT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `WorkDay` double DEFAULT NULL,
  `RealWorkDay` double DEFAULT NULL,
  `NoIn` smallint(6) DEFAULT NULL,
  `NoOut` smallint(6) DEFAULT NULL,
  `Late` double DEFAULT NULL,
  `Early` double DEFAULT NULL,
  `Absent` double DEFAULT NULL,
  `LateCount` int(11) DEFAULT NULL,
  `EarlyCount` int(11) DEFAULT NULL,
  `AbsentCount` int(11) DEFAULT NULL,
  `OverTime` double DEFAULT NULL,
  `OverTime_des` varchar(100) DEFAULT NULL,
  `WorkTime` double DEFAULT NULL,
  `ExceptionID` int(11) DEFAULT NULL,
  `Symbol` varchar(50) DEFAULT NULL,
  `MustIn` smallint(6) DEFAULT NULL,
  `MustOut` smallint(6) DEFAULT NULL,
  `OverTime1` int(11) DEFAULT NULL,
  `WorkMins` int(11) DEFAULT NULL,
  `SSpeDayNormal` double DEFAULT NULL,
  `SSpeDayWeekend` double DEFAULT NULL,
  `SSpeDayHoliday` double DEFAULT NULL,
  `AttTime` double DEFAULT NULL,
  `SSpeDayNormalOT` double DEFAULT NULL,
  `SSpeDayWeekendOT` double DEFAULT NULL,
  `SSpeDayHolidayOT` double DEFAULT NULL,
  `AbsentMins` int(11) DEFAULT NULL,
  `AttChkTime` varchar(10) DEFAULT NULL,
  `AbsentR` double DEFAULT NULL,
  `ScheduleName` varchar(20) DEFAULT NULL,
  `IsConfirm` smallint(6) DEFAULT NULL,
  `IsRead` smallint(6) DEFAULT NULL,
  `Exception` varchar(100) DEFAULT NULL,
  `total_work_time` double DEFAULT NULL,
  `cacl_break_out` datetime DEFAULT NULL,
  `cacl_break_in` datetime DEFAULT NULL,
  `break_time_real` double DEFAULT NULL,
  `break_time` double DEFAULT NULL,
  `break_time_deduct` double DEFAULT NULL,
  `cacl_check_in` datetime DEFAULT NULL,
  `in_transaction` int(11) DEFAULT NULL,
  `cacl_check_out` datetime DEFAULT NULL,
  `out_transaction` int(11) DEFAULT NULL,
  `total_time` double DEFAULT NULL,
  `Short` double DEFAULT NULL,
  `o_total` int(11) DEFAULT NULL,
  `o_short` int(11) DEFAULT NULL,
  `o_overtime` int(11) DEFAULT NULL,
  `o_late` int(11) DEFAULT NULL,
  `o_early_leave` int(11) DEFAULT NULL,
  `o_absent` int(11) DEFAULT NULL,
  `o_normal_ot` int(11) DEFAULT NULL,
  `o_weekend_ot` int(11) DEFAULT NULL,
  `o_holiday_ot` int(11) DEFAULT NULL,
  `timetable_long` int(11) DEFAULT NULL,
  `timetable_days` int(11) DEFAULT NULL,
  `break_late` double DEFAULT NULL,
  `break_early` double DEFAULT NULL,
  `break_absent` double DEFAULT NULL,
  `leave_time` double DEFAULT NULL,
  `training_time` double DEFAULT NULL,
  `data_type` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_approvedhistory`
--

CREATE TABLE `att_approvedhistory` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `category` smallint(6) NOT NULL,
  `obj` int(11) NOT NULL,
  `level` smallint(6) NOT NULL,
  `approved_status` smallint(6) NOT NULL,
  `approver_type` smallint(6) NOT NULL,
  `approver` varchar(50) NOT NULL,
  `approver_name` varchar(50) NOT NULL,
  `remark` longtext,
  `action_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_attreport`
--

CREATE TABLE `att_attreport` (
  `ItemName` varchar(100) NOT NULL,
  `ItemType` varchar(20) DEFAULT NULL,
  `Author_id` int(11) NOT NULL,
  `ItemValue` longtext,
  `Published` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_attreportperms`
--

CREATE TABLE `att_attreportperms` (
  `ItemName` varchar(100) NOT NULL,
  `ItemType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_autocal_log`
--

CREATE TABLE `att_autocal_log` (
  `id` int(11) NOT NULL,
  `cal_date` date NOT NULL,
  `cal_time` datetime DEFAULT NULL,
  `cal_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_autocal_log`
--

INSERT INTO `att_autocal_log` (`id`, `cal_date`, `cal_time`, `cal_type`) VALUES
(1, '2019-12-17', '2019-12-17 19:00:00', 'auto');

-- --------------------------------------------------------

--
-- Table structure for table `att_autoexportlog`
--

CREATE TABLE `att_autoexportlog` (
  `id` int(11) NOT NULL,
  `task` int(11) DEFAULT NULL,
  `data_amount` int(11) DEFAULT NULL,
  `action_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_breaktime`
--

CREATE TABLE `att_breaktime` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `break_code` varchar(20) NOT NULL,
  `break_name` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `break_time` int(11) NOT NULL,
  `calc_type` int(11) NOT NULL,
  `minimum_time` int(11) DEFAULT NULL,
  `is_consider_early` smallint(6) NOT NULL,
  `early_over` int(11) DEFAULT NULL,
  `early_type` smallint(6) NOT NULL,
  `is_consider_late` smallint(6) NOT NULL,
  `late_over` int(11) DEFAULT NULL,
  `late_type` smallint(6) NOT NULL,
  `bk_func_key` smallint(6) NOT NULL,
  `multiple_punch` smallint(6) NOT NULL,
  `bk_punch_period_mode` smallint(6) NOT NULL,
  `bk_punch_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_changeschedule`
--

CREATE TABLE `att_changeschedule` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `previous_shift` varchar(100) DEFAULT NULL,
  `timetable_id` int(11) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `audit_status` smallint(6) DEFAULT NULL,
  `audit_reason` varchar(100) DEFAULT NULL,
  `process_status` varchar(2) DEFAULT NULL,
  `audit_user_id` int(11) DEFAULT NULL,
  `approve_level` smallint(6) DEFAULT NULL,
  `approver` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_exportschedule`
--

CREATE TABLE `att_exportschedule` (
  `id` int(11) NOT NULL,
  `task_code` int(11) DEFAULT NULL,
  `task_name` varchar(50) NOT NULL,
  `file_prefix` varchar(100) DEFAULT NULL,
  `file_date` varchar(2) DEFAULT NULL,
  `file_time` varchar(2) DEFAULT NULL,
  `data_template` longtext NOT NULL,
  `short_date` varchar(2) DEFAULT NULL,
  `short_time` varchar(2) DEFAULT NULL,
  `frequency` varchar(1) NOT NULL,
  `export_day` int(11) NOT NULL,
  `end_day` varchar(1) NOT NULL,
  `interval` int(11) NOT NULL,
  `export_time` longtext NOT NULL,
  `export_format` longtext NOT NULL,
  `export_path` longtext NOT NULL,
  `export_email` longtext NOT NULL,
  `departments` longtext NOT NULL,
  `areas` longtext NOT NULL,
  `query_field` varchar(1) NOT NULL,
  `ftp_server` varchar(200) DEFAULT NULL,
  `ftp_path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_exportschedule`
--

INSERT INTO `att_exportschedule` (`id`, `task_code`, `task_name`, `file_prefix`, `file_date`, `file_time`, `data_template`, `short_date`, `short_time`, `frequency`, `export_day`, `end_day`, `interval`, `export_time`, `export_format`, `export_path`, `export_email`, `departments`, `areas`, `query_field`, `ftp_server`, `ftp_path`) VALUES
(1, 1, 'Task 1', 'ZKTeco', '12', '', '{Pin}\\t{FirstName}\\t{LastName}\\t{DepartmentCode}\\t{DepartmentName}\\t{Date}\\t{Time}\\t{Type}\\t{WorkCode}\\t{Area}\\t{DeviceName}\\t{DeviceSN}\\r\\n', '1', '1', '1', 1, '0', 0, '00:00', 'txt', '', '', '', '', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `att_multipletransaction`
--

CREATE TABLE `att_multipletransaction` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `data_type` smallint(6) NOT NULL,
  `att_date` datetime NOT NULL,
  `timetable` int(11) DEFAULT NULL,
  `data_index` int(11) NOT NULL,
  `in_time` datetime DEFAULT NULL,
  `in_transaction` int(11) DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `out_transaction` int(11) DEFAULT NULL,
  `total_time` double DEFAULT NULL,
  `worked_time` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_overtime`
--

CREATE TABLE `att_overtime` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `ottype` smallint(6) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `audit_status` int(11) NOT NULL,
  `auditreason` varchar(100) DEFAULT NULL,
  `audit_user_id` int(11) DEFAULT NULL,
  `approve_level` smallint(6) DEFAULT NULL,
  `approver` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_reportoption`
--

CREATE TABLE `att_reportoption` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `report` varchar(50) NOT NULL,
  `grid_col` varchar(50) NOT NULL,
  `col_name` longtext NOT NULL,
  `col_width` varchar(50) DEFAULT NULL,
  `whether_hide` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_rule`
--

CREATE TABLE `att_rule` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `RuleID` int(11) NOT NULL,
  `rule_name` varchar(30) NOT NULL,
  `approval_ot` smallint(6) DEFAULT NULL,
  `in_rule` smallint(6) NOT NULL,
  `out_rule` smallint(6) NOT NULL,
  `whether_ot` smallint(6) NOT NULL,
  `late_limit` int(11) NOT NULL,
  `leave_limit` int(11) NOT NULL,
  `miss_in` smallint(6) NOT NULL,
  `absent_in` int(11) NOT NULL,
  `miss_out` smallint(6) NOT NULL,
  `absent_out` int(11) NOT NULL,
  `leave_include_in` smallint(6) NOT NULL,
  `leave_include_out` smallint(6) NOT NULL,
  `training_include_in` smallint(6) NOT NULL,
  `training_include_out` smallint(6) NOT NULL,
  `check_in` varchar(20) DEFAULT NULL,
  `check_out` varchar(20) DEFAULT NULL,
  `break_out` varchar(20) DEFAULT NULL,
  `break_in` varchar(20) DEFAULT NULL,
  `overtime_in` varchar(20) DEFAULT NULL,
  `overtime_out` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_training`
--

CREATE TABLE `att_training` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `audit_status` smallint(6) DEFAULT NULL,
  `audit_reason` varchar(100) DEFAULT NULL,
  `process_status` varchar(2) DEFAULT NULL,
  `audit_user_id` int(11) DEFAULT NULL,
  `approve_level` smallint(6) DEFAULT NULL,
  `approver` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_trainingcategory`
--

CREATE TABLE `att_trainingcategory` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `symbol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_waitforprocessdata`
--

CREATE TABLE `att_waitforprocessdata` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `UserID_id` int(11) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_group`
--

INSERT INTO `auth_group` (`id`, `name`) VALUES
(1, 'role_for_employee');

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_group_permissions`
--

INSERT INTO `auth_group_permissions` (`id`, `group_id`, `permission_id`) VALUES
(60, 1, 325),
(42, 1, 326),
(43, 1, 327),
(44, 1, 328),
(45, 1, 329),
(59, 1, 345),
(54, 1, 375),
(55, 1, 377),
(57, 1, 380),
(58, 1, 381),
(51, 1, 383),
(46, 1, 396),
(48, 1, 398),
(49, 1, 401),
(47, 1, 402),
(56, 1, 428),
(52, 1, 430),
(53, 1, 433),
(50, 1, 434),
(41, 1, 485);

-- --------------------------------------------------------

--
-- Table structure for table `auth_message`
--

CREATE TABLE `auth_message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Browse', 198, 'browse_session'),
(2, 'Browse', 199, 'browse_contenttype'),
(3, 'Browse', 200, 'browse_group'),
(4, 'Add', 200, 'add_group'),
(5, 'Modify', 200, 'change_group'),
(6, 'Delete', 200, 'groupdel_group'),
(7, 'Browse', 201, 'browse_message'),
(8, 'Browse', 202, 'browse_permission'),
(9, 'Browse', 203, 'browse_user'),
(10, 'Add', 203, 'add_user'),
(11, 'Modify', 203, 'change_user'),
(12, 'Delete', 203, 'delete_user'),
(13, 'Browse', 1, 'browse_appoption'),
(14, 'Modify', 1, 'change_appoption'),
(15, 'Browse', 2, 'browse_basecode'),
(16, 'Add', 2, 'add_basecode'),
(17, 'Modify', 2, 'change_basecode'),
(18, 'Delete', 2, 'delete_basecode'),
(19, 'Browse', 4, 'browse_companysetting'),
(20, 'Add', 4, 'add_companysetting'),
(21, 'Modify', 4, 'change_companysetting'),
(22, 'Delete', 4, 'delete_companysetting'),
(23, 'Browse', 5, 'browse_datatranslation'),
(24, 'Add', 5, 'add_datatranslation'),
(25, 'Modify', 5, 'change_datatranslation'),
(26, 'Delete', 5, 'delete_datatranslation'),
(27, 'Browse', 6, 'browse_emailsetting'),
(28, 'Email Test', 6, 'emailtest_emailsetting'),
(29, 'Email Template', 6, 'setemailtemplate_emailsetting'),
(30, 'Modify', 6, 'change_emailsetting'),
(31, 'Delete', 6, 'delete_emailsetting'),
(32, 'Browse', 7, 'browse_emailtemplate'),
(33, 'Add', 7, 'add_emailtemplate'),
(34, 'Modify', 7, 'change_emailtemplate'),
(35, 'Delete', 7, 'delete_emailtemplate'),
(36, 'Browse', 8, 'browse_ftpserver'),
(37, 'Add', 8, 'add_ftpserver'),
(38, 'Modify', 8, 'change_ftpserver'),
(39, 'Delete', 8, 'delete_ftpserver'),
(40, 'Browse', 9, 'browse_logentry'),
(41, 'Browse', 10, 'browse_option'),
(42, 'Add', 10, 'add_option'),
(43, 'Modify', 10, 'change_option'),
(44, 'Delete', 10, 'delete_option'),
(45, 'Browse', 11, 'browse_personaloption'),
(46, 'Add', 11, 'add_personaloption'),
(47, 'Modify', 11, 'change_personaloption'),
(48, 'Delete', 11, 'delete_personaloption'),
(49, 'Browse', 12, 'browse_strresource'),
(50, 'Add', 12, 'add_strresource'),
(51, 'Modify', 12, 'change_strresource'),
(52, 'Delete', 12, 'delete_strresource'),
(53, 'Browse', 13, 'browse_strtranslation'),
(54, 'Add', 13, 'add_strtranslation'),
(55, 'Modify', 13, 'change_strtranslation'),
(56, 'Delete', 13, 'delete_strtranslation'),
(57, 'Browse', 14, 'browse_systemoption'),
(58, 'Add', 14, 'add_systemoption'),
(59, 'Modify', 14, 'change_systemoption'),
(60, 'Delete', 14, 'delete_systemoption'),
(61, 'Browse', 15, 'browse_dbbackuplog'),
(62, 'Backup Database', 15, 'opbackupdb_dbbackuplog'),
(63, 'Add', 15, 'add_dbbackuplog'),
(64, 'Delete', 15, 'delete_dbbackuplog'),
(65, 'Home Page', 16, 'can_Restore_db'),
(66, 'Browse', 17, 'browse_viewmodel'),
(67, 'Add', 17, 'add_viewmodel'),
(68, 'Modify', 17, 'change_viewmodel'),
(69, 'Delete', 17, 'delete_viewmodel'),
(70, 'Home Page', 18, 'can_sys_option'),
(71, 'Home Page', 19, 'can_user_option'),
(72, 'Browse', 20, 'browse_announcement'),
(73, 'Private', 20, 'privateannouncement_announcement'),
(74, 'Public', 20, 'publicannouncement_announcement'),
(75, 'Modify', 20, 'change_announcement'),
(76, 'Delete', 20, 'delete_announcement'),
(77, 'Browse', 21, 'browse_appactionlog'),
(78, 'Delete', 21, 'delete_appactionlog'),
(79, 'Browse', 22, 'browse_applist'),
(80, 'Disable', 22, 'disableclient_applist'),
(81, 'Enable', 22, 'enableclient_applist'),
(82, 'Force Offline', 22, 'forceoffline_applist'),
(83, 'Push Notification', 22, 'pushnotification_applist'),
(84, 'Delete', 22, 'delete_applist'),
(85, 'Browse', 47, 'browse_area'),
(86, 'Add personnel', 89, 'opadjustarea_attdeviceusermanage'),
(87, 'Device Data Synchronization', 47, 'syncareadata_area'),
(88, 'Add', 47, 'add_area'),
(89, 'Modify', 47, 'change_area'),
(90, 'Delete Area', 47, 'delete_area'),
(91, 'Browse', 23, 'browse_areaadmin'),
(92, 'Home Page', 24, 'can_AttRTMonitorPage'),
(93, 'Browse', 25, 'browse_biodata'),
(94, 'Add', 25, 'add_biodata'),
(95, 'Modify', 25, 'change_biodata'),
(96, 'Delete', 25, 'delete_biodata'),
(97, 'Browse', 26, 'browse_dstime'),
(98, 'Daylight saving time setting', 26, 'opsetdstime_dstime'),
(99, 'Add', 26, 'add_dstime'),
(100, 'Modify', 26, 'change_dstime'),
(101, 'Delete', 26, 'delete_dstime'),
(102, 'Browse', 51, 'browse_department'),
(103, 'Set Approver', 51, 'setdepartmentapprover_department'),
(104, 'Set Department', 51, 'setempsdept_department'),
(105, 'Add', 51, 'add_department'),
(106, 'Modify', 51, 'change_department'),
(107, 'Delete', 51, 'delete_department'),
(108, 'Import', 51, 'dataimport_department'),
(109, 'Browse', 27, 'browse_deptadmin'),
(110, 'Browse', 28, 'browse_devcmd'),
(111, 'Clear Commands', 28, 'opcleardevcmd_devcmd'),
(112, 'Download Failed Command', 28, 'opredownattdevcmd_devcmd'),
(113, 'Add', 28, 'add_devcmd'),
(114, 'Modify', 28, 'change_devcmd'),
(115, 'Delete', 28, 'delete_devcmd'),
(116, 'Browse', 29, 'browse_devcmdbak'),
(117, 'Clear failed commands.', 29, 'opcleardevcmd_devcmdbak'),
(118, 'Download Att Failed Command', 29, 'oploadattdevcmd_devcmdbak'),
(119, 'Add', 29, 'add_devcmdbak'),
(120, 'Modify', 29, 'change_devcmdbak'),
(121, 'Delete', 29, 'delete_devcmdbak'),
(122, 'Browse', 30, 'browse_devlog'),
(123, 'Home Page', 31, 'can_DevRTMonitorPage'),
(124, 'Browse', 32, 'browse_device'),
(125, 'Clear Att Photo', 32, 'clearpicture_device'),
(126, 'Clear Att Photo', 88, 'clearpicture_attdevicedatamanage'),
(127, 'Clear Records', 32, 'cleartransaction_device'),
(128, 'Clear Records', 88, 'cleartransaction_attdevicedatamanage'),
(129, 'Delete Device Command', 32, 'deldevicecmd_device'),
(130, 'Delete Device Command', 88, 'deldevicecmd_attdevicedatamanage'),
(131, 'Modify IP Address', 32, 'opchangeipofacpanel_device'),
(132, 'Change the fingerprint identification threshold', 32, 'opchangemthreshold_device'),
(133, 'Data Matching', 32, 'opcheckattinfo_device'),
(134, 'Clean Cache', 88, 'opclearcache_attdevicedatamanage'),
(135, 'Close Auxiliary Output', 32, 'opcloseauxout_device'),
(136, 'Control Auxiliary Output', 32, 'opctrlauxout_device'),
(137, 'Upload Data Again', 32, 'opreloaddata_device'),
(138, 'Upload Data Again', 88, 'opreloaddata_attdevicedatamanage'),
(139, 'Search Access Control Panels', 32, 'opsearchacpanel_device'),
(140, 'Upload Transaction', 32, 'opupattinfo_device'),
(141, 'Upload user information', 88, 'opupempinfo_attdevicedatamanage'),
(142, 'Upgrade Firmware', 32, 'opupgradefirmware_device'),
(143, 'Reboot Device', 32, 'reboot_device'),
(144, 'Reboot Device', 88, 'reboot_attdevicedatamanage'),
(145, 'Reading Device Information', 32, 'refreshdeviceinfo_device'),
(146, 'Reading Device Information', 88, 'refreshdeviceinfo_attdevicedatamanage'),
(147, 'Modify communication password', 32, 'resetpassword_device'),
(148, 'Synchronize time', 32, 'syncacpaneltime_device'),
(149, 'Sync Data To Device', 32, 'syncdata_device'),
(150, 'Sync Data To Device', 88, 'syncdata_attdevicedatamanage'),
(151, 'Add', 32, 'add_device'),
(152, 'Modify', 32, 'change_device'),
(153, 'Delete', 32, 'delete_device'),
(154, 'Browse', 33, 'browse_deviceoplog'),
(155, 'Delete', 33, 'delete_deviceoplog'),
(156, 'Browse', 34, 'browse_devicetransaction'),
(157, 'Browse', 35, 'browse_dininghall'),
(158, 'Add', 35, 'add_dininghall'),
(159, 'Modify', 35, 'change_dininghall'),
(160, 'Delete', 35, 'delete_dininghall'),
(161, 'Browse', 60, 'browse_employee'),
(162, 'APP Setting', 60, 'appsetting_employee'),
(163, 'Access Control Settings', 60, 'accesssetting_employee'),
(164, 'Attendance Settings', 60, 'attsetting_employee'),
(165, 'Delete Biometric Template', 60, 'delbiodata_employee'),
(166, 'Disable App', 60, 'disableapp_employee'),
(167, 'Enable App', 60, 'enableapp_employee'),
(168, 'Register Remotely By Device', 60, 'enrollfp_employee'),
(169, 'Add Access Level', 60, 'opaddlevel_employee'),
(170, 'Add to access levels', 60, 'opaddleveltoemp_employee'),
(171, 'Adjust Area', 60, 'opadjustarea_employee'),
(172, 'Adjust Department', 60, 'opadjustdept_employee'),
(173, 'Delete from access levels', 60, 'opdellevelfromemp_employee'),
(174, 'Pass Probation', 60, 'opemptype_employee'),
(175, 'Resignation', 60, 'opleave_employee'),
(176, 'Position Transfer', 60, 'oppositionchange_employee'),
(177, 'Remove From Access Group', 60, 'opremovefromgroup_employee'),
(178, 'Remove From Access Level', 60, 'opremovefromlevel_employee'),
(179, 'Resynchronize Device', 60, 'opsynctodevice_employee'),
(180, 'Payroll Setting', 60, 'payrollsetting_employee'),
(181, 'Add', 60, 'add_employee'),
(182, 'Modify', 60, 'change_employee'),
(183, 'Delete', 60, 'delete_employee'),
(184, 'Import', 60, 'dataimport_employee'),
(185, 'Browse', 36, 'browse_facetemplate'),
(186, 'Add', 36, 'add_facetemplate'),
(187, 'Modify', 36, 'change_facetemplate'),
(188, 'Delete', 36, 'delete_facetemplate'),
(189, 'Browse', 37, 'browse_notice'),
(190, 'Message Issued', 37, 'addcmd_notice'),
(191, 'Public Message', 37, 'opadddevicemsg_notice'),
(192, 'Private Message', 37, 'opaddusermsg_notice'),
(193, 'Modify', 37, 'change_notice'),
(194, 'Delete', 37, 'delete_notice'),
(195, 'Browse', 38, 'browse_notification'),
(196, 'Delete', 38, 'delete_notification'),
(197, 'Browse', 39, 'browse_oplog'),
(198, 'Transaction Monitor', 39, 'monitor_oplog'),
(199, 'Browse', 40, 'browse_operatecmd'),
(200, 'Browse', 41, 'browse_template'),
(201, 'Add', 41, 'add_template'),
(202, 'Modify', 41, 'change_template'),
(203, 'Delete', 41, 'delete_template'),
(204, 'Browse', 42, 'browse_testdata'),
(205, 'Add', 42, 'add_testdata'),
(206, 'Modify', 42, 'change_testdata'),
(207, 'Delete', 42, 'delete_testdata'),
(208, 'Browse', 43, 'browse_transaction'),
(209, 'Clear Obsolete Data', 43, 'clearObsoleteData_transaction'),
(210, 'Import ac log from udisk', 43, 'opuploadattlog_transaction'),
(211, '???????', 43, 'dataimport_transaction'),
(212, 'Browse', 44, 'browse_usbtransaction'),
(213, 'Browse', 45, 'browse_workcode'),
(214, 'Add', 45, 'add_workcode'),
(215, 'Modify', 45, 'change_workcode'),
(216, 'Delete', 45, 'delete_workcode'),
(217, 'Browse', 46, 'browse_accmorecardempgroup'),
(218, 'Add Personnel', 46, 'opaddemptomcegroup_accmorecardempgroup'),
(219, 'Delete a person', 46, 'opdelempfrommcegroup_accmorecardempgroup'),
(220, 'Add', 46, 'add_accmorecardempgroup'),
(221, 'Modify', 46, 'change_accmorecardempgroup'),
(222, 'Delete', 46, 'delete_accmorecardempgroup'),
(223, 'Home Page', 48, 'can_BaseDataPage'),
(224, 'Browse', 49, 'browse_city'),
(225, 'Add', 49, 'add_city'),
(226, 'Modify', 49, 'change_city'),
(227, 'Delete', 49, 'delete_city'),
(228, 'City', 48, 'can_CityPage'),
(229, 'Browse', 50, 'browse_country'),
(230, 'Add', 50, 'add_country'),
(231, 'Modify', 50, 'change_country'),
(232, 'Delete', 50, 'delete_country'),
(233, 'Nationality', 48, 'can_CountryPage'),
(234, 'Browse', 52, 'browse_departmentapprove'),
(235, 'Add', 52, 'add_departmentapprove'),
(236, 'Modify', 52, 'change_departmentapprove'),
(237, 'Delete', 52, 'delete_departmentapprove'),
(238, 'Browse', 53, 'browse_departmentapprover'),
(239, 'Add', 53, 'add_departmentapprover'),
(240, 'Modify', 53, 'change_departmentapprover'),
(241, 'Delete', 53, 'delete_departmentapprover'),
(242, 'Browse', 54, 'browse_departmentnotify'),
(243, 'Add', 54, 'add_departmentnotify'),
(244, 'Modify', 54, 'change_departmentnotify'),
(245, 'Delete', 54, 'delete_departmentnotify'),
(246, 'Browse', 55, 'browse_document'),
(247, 'Add', 55, 'add_document'),
(248, 'Modify', 55, 'change_document'),
(249, 'Delete', 55, 'delete_document'),
(250, 'Browse', 56, 'browse_documentdetail'),
(251, 'Add', 56, 'add_documentdetail'),
(252, 'Modify', 56, 'change_documentdetail'),
(253, 'Delete', 56, 'delete_documentdetail'),
(254, 'Browse', 57, 'browse_education'),
(255, 'Add', 57, 'add_education'),
(256, 'Modify', 57, 'change_education'),
(257, 'Delete', 57, 'delete_education'),
(258, 'Education', 48, 'can_EducationPage'),
(259, 'Browse', 58, 'browse_empchange'),
(260, 'Add', 58, 'add_empchange'),
(261, 'Browse', 59, 'browse_empitemdefine'),
(262, 'Department Roll', 59, 'deptrosterreport_empitemdefine'),
(263, 'Personnel Card List', 59, 'empcardreport_empitemdefine'),
(264, 'Education Composition Analysis', 59, 'empeducationreport_empitemdefine'),
(265, 'Turnover Report', 59, 'empflowreport_empitemdefine'),
(266, 'Browse', 61, 'browse_employeeoption'),
(267, 'Add', 61, 'add_employeeoption'),
(268, 'Modify', 61, 'change_employeeoption'),
(269, 'Delete', 61, 'delete_employeeoption'),
(270, 'Browse', 62, 'browse_iccard'),
(271, 'Add', 62, 'add_iccard'),
(272, 'Modify', 62, 'change_iccard'),
(273, 'Delete', 62, 'delete_iccard'),
(274, 'Browse', 63, 'browse_issuecard'),
(275, 'Batch Card', 63, 'opbatchissuecard_issuecard'),
(276, 'Retreat Card', 63, 'opretirecard_issuecard'),
(277, 'Issue Card', 63, 'add_issuecard'),
(278, 'Browse', 64, 'browse_leavelog'),
(279, 'Import', 64, 'dataimport_leavelog'),
(280, 'Disable Attendance Function', 64, 'opcloseatt_leavelog'),
(281, 'Reinstatement', 64, 'oprestoreempleave_leavelog'),
(282, 'Add', 64, 'add_leavelog'),
(283, 'Delete', 64, 'delete_leavelog'),
(284, 'Browse', 65, 'browse_meal'),
(285, 'Add', 65, 'add_meal'),
(286, 'Modify', 65, 'change_meal'),
(287, '??', 65, 'delete_meal'),
(288, 'Browse', 66, 'browse_national'),
(289, 'Add', 66, 'add_national'),
(290, 'Modify', 66, 'change_national'),
(291, 'Delete', 66, 'delete_national'),
(292, 'Ethnicity', 48, 'can_NationalPage'),
(293, 'Browse', 67, 'browse_position'),
(294, 'Import', 67, 'dataimport_position'),
(295, 'Delete', 67, 'delete_position'),
(296, 'Set Position', 67, 'setempsposition_position'),
(297, 'Add', 67, 'add_position'),
(298, 'Modify', 67, 'change_position'),
(299, 'Browse', 68, 'browse_state'),
(300, 'Add', 68, 'add_state'),
(301, 'Modify', 68, 'change_state'),
(302, 'Delete', 68, 'delete_state'),
(303, 'Province', 48, 'can_StatePage'),
(304, 'Home Page', 69, 'can_DeleteData'),
(305, 'Browse', 70, 'browse_groupmsg'),
(306, 'Add', 70, 'add_groupmsg'),
(307, 'Modify', 70, 'change_groupmsg'),
(308, 'Delete', 70, 'delete_groupmsg'),
(309, 'Browse', 71, 'browse_instantmsg'),
(310, 'Add', 71, 'add_instantmsg'),
(311, 'Modify', 71, 'change_instantmsg'),
(312, 'Delete', 71, 'delete_instantmsg'),
(313, 'Browse', 72, 'browse_msgtype'),
(314, 'Add', 72, 'add_msgtype'),
(315, 'Modify', 72, 'change_msgtype'),
(316, 'Delete', 72, 'delete_msgtype'),
(317, 'Browse', 73, 'browse_syncarea'),
(318, 'Browse', 74, 'browse_syncdepartment'),
(319, 'Browse', 75, 'browse_syncemployee'),
(320, 'Browse', 76, 'browse_syncjob'),
(321, 'Browse', 77, 'browse_usrmsg'),
(322, 'Add', 77, 'add_usrmsg'),
(323, 'Modify', 77, 'change_usrmsg'),
(324, 'Delete', 77, 'delete_usrmsg'),
(325, 'Home Page', 78, 'can_SelfCheckexact'),
(326, 'Home Page', 79, 'can_SelfOverTime'),
(327, 'Home Page', 80, 'can_SelfReport'),
(328, 'Home Page', 81, 'can_SelfSpecDay'),
(329, 'Home Page', 82, 'can_SelfTransaction'),
(330, 'Browse', 86, 'browse_approvedhistory'),
(331, 'Approved History', 91, 'can_ApprovedHistoryPage'),
(332, 'Home Page', 87, 'can_AttCalculate'),
(333, 'Home Page', 88, 'can_AttDeviceDataManage'),
(334, 'Home Page', 89, 'can_AttDeviceUserManage'),
(335, 'Browse', 90, 'browse_attexception'),
(336, 'Add', 90, 'add_attexception'),
(337, 'Modify', 90, 'change_attexception'),
(338, 'Delete', 90, 'delete_attexception'),
(339, 'Home Page', 91, 'can_AttExceptionPage'),
(340, 'Home Page', 92, 'can_AttGuide'),
(341, 'Browse', 93, 'browse_attparam'),
(342, 'Add', 93, 'add_attparam'),
(343, 'Modify', 93, 'change_attparam'),
(344, 'Delete', 93, 'delete_attparam'),
(345, 'Home Page', 94, 'can_AttReport'),
(346, 'Browse', 95, 'browse_attreportperms'),
(347, 'Absent', 95, 'absentreport_attreportperms'),
(348, 'Total Timecard', 95, 'attshiftsattreport_attreportperms'),
(349, 'Break Time', 95, 'breaktimereport_attreportperms'),
(350, 'Scheduled Logs', 95, 'calcresultdetail_attreportperms'),
(351, 'Attendance Summary', 95, 'calctotalreport_attreportperms'),
(352, 'Timecard', 95, 'cardtimesreport_attreportperms'),
(353, 'Summary Sector', 95, 'deptattsumreport_attreportperms'),
(354, 'Daily Attendance', 95, 'earchdayattreport_attreportperms'),
(355, 'Early Leave', 95, 'earlyleavereport_attreportperms'),
(356, 'Employee Schedule', 95, 'employeeschedulereport_attreportperms'),
(357, 'Exception', 95, 'exceptionreport_attreportperms'),
(358, 'First In Last Out', 95, 'firstlastreport_attreportperms'),
(359, 'Late', 95, 'latereport_attreportperms'),
(360, 'Leave Summary', 95, 'leavetotalreport_attreportperms'),
(361, 'Overtime', 95, 'overtimereport_attreportperms'),
(362, 'Multiple Transaction', 95, 'transactionsreport_attreportperms'),
(363, 'Home Page', 96, 'can_AttRulePage'),
(364, 'Home Page', 98, 'can_AttUserOfRun'),
(365, 'Browse', 99, 'browse_autoexportlog'),
(366, 'Browse', 100, 'browse_breaktime'),
(367, 'Add', 100, 'add_breaktime'),
(368, 'Modify', 100, 'change_breaktime'),
(369, 'Delete', 100, 'delete_breaktime'),
(370, 'Browse', 103, 'browse_changeschedule'),
(371, 'Approve', 103, 'opapproveshift_changeschedule'),
(372, 'Revoke', 103, 'oprevokeshift_changeschedule'),
(373, 'Modify', 103, 'change_changeschedule'),
(374, 'Delete', 103, 'delete_changeschedule'),
(375, 'Browse', 104, 'browse_checkexact'),
(376, 'Import', 104, 'dataimport_checkexact'),
(377, 'Add', 104, 'opaddmanycheckexact_checkexact'),
(378, 'Approve', 104, 'opauditcheckexact_checkexact'),
(379, 'Revoke', 104, 'opcancelcheckexact_checkexact'),
(380, 'Modify', 104, 'change_checkexact'),
(381, 'Delete', 104, 'delete_checkexact'),
(382, 'Manual Punch', 91, 'can_CheckExactPage'),
(383, 'Home Page', 105, 'can_CheckInOut'),
(384, 'Auto Export', 105, 'opautoexport_checkinout'),
(385, 'U Disk Import', 105, 'opuploadattlog_checkinout'),
(386, 'Browse', 109, 'browse_departmentholiday'),
(387, 'Add', 109, 'add_departmentholiday'),
(388, 'Modify', 109, 'change_departmentholiday'),
(389, 'Delete', 109, 'delete_departmentholiday'),
(390, 'Browse', 110, 'browse_departmentrule'),
(391, 'Add', 110, 'add_departmentrule'),
(392, 'Modify', 110, 'change_departmentrule'),
(393, 'Delete', 110, 'delete_departmentrule'),
(394, 'Rules', 96, 'can_DepartmentRulePage'),
(395, 'Schedule', 91, 'can_EmpSchedulePage'),
(396, 'Browse', 113, 'browse_empspecday'),
(397, 'Import', 113, 'dataimport_empspecday'),
(398, 'Add', 113, 'opaddmanyuserid_empspecday'),
(399, 'Revoke', 113, 'opcancelspec_empspecday'),
(400, 'Approve', 113, 'opspecaudit_empspecday'),
(401, 'Modify', 113, 'change_empspecday'),
(402, 'Delete', 113, 'delete_empspecday'),
(403, 'Leave', 91, 'can_EmpSpecDayPage'),
(404, 'Training', 91, 'can_EmpTrainingPage'),
(405, 'Browse', 118, 'browse_exportschedule'),
(406, 'Global Rule', 96, 'can_GlobalRulePage'),
(407, 'Browse', 120, 'browse_holiday'),
(408, 'Add', 120, 'add_holiday'),
(409, 'Modify', 120, 'change_holiday'),
(410, 'Delete', 120, 'delete_holiday'),
(411, 'Browse', 122, 'browse_leaveclass'),
(412, 'Add', 122, 'add_leaveclass'),
(413, 'Modify', 122, 'change_leaveclass'),
(414, 'Delete', 122, 'delete_leaveclass'),
(415, 'Browse', 123, 'browse_leaveclass1'),
(416, 'Add', 123, 'add_leaveclass1'),
(417, 'Modify', 123, 'change_leaveclass1'),
(418, 'Delete', 123, 'delete_leaveclass1'),
(419, 'Browse', 124, 'browse_multipletransaction'),
(420, 'Browse', 125, 'browse_num_run'),
(421, 'Add', 125, 'add_num_run'),
(422, 'Modify', 125, 'change_num_run'),
(423, 'Delete', 125, 'delete_num_run'),
(424, 'Browse', 126, 'browse_num_run_deil'),
(425, 'Add', 126, 'add_num_run_deil'),
(426, 'Modify', 126, 'change_num_run_deil'),
(427, 'Delete', 126, 'delete_num_run_deil'),
(428, 'Browse', 127, 'browse_overtime'),
(429, 'Import', 127, 'dataimport_overtime'),
(430, 'Add', 127, 'opaddmanyovertime_overtime'),
(431, 'Approve', 127, 'opauditmanyemployee_overtime'),
(432, 'Revoke', 127, 'opcancelovertime_overtime'),
(433, 'Modify', 127, 'change_overtime'),
(434, 'Delete', 127, 'delete_overtime'),
(435, 'Overtime', 91, 'can_OverTimePage'),
(436, 'Browse', 131, 'browse_rule'),
(437, 'Add', 131, 'add_rule'),
(438, 'Modify', 131, 'change_rule'),
(439, 'Delete', 131, 'delete_rule'),
(440, 'Browse', 132, 'browse_schclass'),
(441, 'Add', 132, 'add_schclass'),
(442, 'Modify', 132, 'change_schclass'),
(443, 'Delete', 132, 'delete_schclass'),
(444, 'Browse', 133, 'browse_setuseratt'),
(445, 'Add', 133, 'opaddmanyobj_setuseratt'),
(446, 'Modify', 133, 'change_setuseratt'),
(447, 'Delete', 133, 'delete_setuseratt'),
(448, 'Browse', 134, 'browse_training'),
(449, 'Add', 134, 'opaddtraining_training'),
(450, 'Approve', 134, 'opapprove_training'),
(451, 'Revoke', 134, 'oprevoketraining_training'),
(452, 'Modify', 134, 'change_training'),
(453, 'Delete', 134, 'delete_training'),
(454, 'Browse', 135, 'browse_trainingcategory'),
(455, 'Add', 135, 'add_trainingcategory'),
(456, 'Modify', 135, 'change_trainingcategory'),
(457, 'Delete', 135, 'delete_trainingcategory'),
(458, 'Browse', 137, 'browse_user_of_run'),
(459, 'Schedule', 137, 'opaddcycleschedule_user_of_run'),
(460, 'Temp Schedule', 137, 'opadddailyschedule_user_of_run'),
(461, 'Empty', 137, 'opclearrun_user_of_run'),
(462, 'Delete Schedule Records', 137, 'opdeleteshift_user_of_run'),
(463, 'Add', 137, 'add_user_of_run'),
(464, 'Modify', 137, 'change_user_of_run'),
(465, 'Delete', 137, 'delete_user_of_run'),
(466, 'Browse', 138, 'browse_user_temp_sch'),
(467, 'Delete Temporary Schedule', 138, 'opdeletetempshift_user_temp_sch'),
(468, 'Add', 138, 'add_user_temp_sch'),
(469, 'Modify', 138, 'change_user_temp_sch'),
(470, 'Delete', 138, 'delete_user_temp_sch'),
(471, 'Browse', 139, 'browse_userusedsclasses'),
(472, 'Browse', 140, 'browse_waitforprocessdata'),
(473, 'Add', 140, 'add_waitforprocessdata'),
(474, 'Modify', 140, 'change_waitforprocessdata'),
(475, 'Delete', 140, 'delete_waitforprocessdata'),
(476, 'Browse', 141, 'browse_attcalclog'),
(477, 'Browse', 142, 'browse_attrecabnormite'),
(478, 'Browse', 143, 'browse_attshifts'),
(479, 'Browse', 204, 'browse_att_autocal_log'),
(480, 'Home Page', 144, 'can_AttRecResultReport'),
(481, 'Home Page', 145, 'can_AttShiftsReport'),
(482, 'Home Page', 146, 'can_BreakTimeReport'),
(483, 'Home Page', 147, 'can_CardTimesReport'),
(484, 'Home Page', 148, 'can_ChangeScheduleReport'),
(485, 'Home Page', 149, 'can_CheckExactReport'),
(486, 'Home Page', 150, 'can_CheckInOutReport'),
(487, 'Home Page', 151, 'can_EmpSpecDayReport'),
(488, 'Home Page', 152, 'can_EmpSumReport'),
(489, 'Home Page', 153, 'can_LogReport'),
(490, 'Home Page', 154, 'can_MultipleTransactionReport'),
(491, 'Home Page', 155, 'can_OverTimeReport'),
(492, 'Home Page', 156, 'can_TrainingReport'),
(493, 'Browse', 158, 'browse_allowancetype'),
(494, 'Add', 158, 'add_allowancetype'),
(495, 'Modify', 158, 'change_allowancetype'),
(496, 'Delete', 158, 'delete_allowancetype'),
(497, 'Allowance type', 159, 'can_AllowanceTypePage'),
(498, 'Home Page', 159, 'can_BasePage'),
(499, 'Browse', 160, 'browse_cashadvance'),
(500, 'Add', 160, 'opaddcashadvance_cashadvance'),
(501, 'Modify', 160, 'change_cashadvance'),
(502, 'Delete', 160, 'delete_cashadvance'),
(503, 'Browse', 162, 'browse_currency'),
(504, 'Add', 162, 'add_currency'),
(505, 'Modify', 162, 'change_currency'),
(506, 'Delete', 162, 'delete_currency'),
(507, 'Currency', 159, 'can_CurrencyPage'),
(508, 'Browse', 163, 'browse_deduction'),
(509, 'Add', 163, 'opadddeduction_deduction'),
(510, 'Modify', 163, 'change_deduction'),
(511, 'Delete', 163, 'delete_deduction'),
(512, 'Browse', 165, 'browse_deductiontype'),
(513, 'Add', 165, 'add_deductiontype'),
(514, 'Modify', 165, 'change_deductiontype'),
(515, 'Delete', 165, 'delete_deductiontype'),
(516, 'Deduction Type', 159, 'can_DeductionTypePage'),
(517, 'Browse', 167, 'browse_exceptionformula'),
(518, 'Add', 167, 'add_exceptionformula'),
(519, 'Modify', 167, 'change_exceptionformula'),
(520, 'Delete', 167, 'delete_exceptionformula'),
(521, 'Exception Formula', 170, 'can_ExceptionFormulaPage'),
(522, 'Browse', 168, 'browse_expense'),
(523, 'Add', 168, 'opaddexpense_expense'),
(524, 'Modify', 168, 'change_expense'),
(525, 'Delete', 168, 'delete_expense'),
(526, 'Home Page', 170, 'can_FormulaPage'),
(527, 'Browse', 171, 'browse_formulasign'),
(528, 'Add', 171, 'add_formulasign'),
(529, 'Modify', 171, 'change_formulasign'),
(530, 'Delete', 171, 'delete_formulasign'),
(531, 'Formula Sign', 159, 'can_FormulaSignPage'),
(532, 'Browse', 172, 'browse_increment'),
(533, 'Add', 172, 'opaddincrement_increment'),
(534, 'Modify', 172, 'change_increment'),
(535, 'Delete', 172, 'delete_increment'),
(536, 'Browse', 174, 'browse_leaveformula'),
(537, 'Add', 174, 'add_leaveformula'),
(538, 'Modify', 174, 'change_leaveformula'),
(539, 'Delete', 174, 'delete_leaveformula'),
(540, 'Leave Formula', 170, 'can_LeaveFormulaPage'),
(541, 'Browse', 176, 'browse_otformula'),
(542, 'Add', 176, 'add_otformula'),
(543, 'Modify', 176, 'change_otformula'),
(544, 'Delete', 176, 'delete_otformula'),
(545, 'OT Formula', 170, 'can_OTFormulaPage'),
(546, 'Browse', 177, 'browse_payrollallowance'),
(547, 'Add', 177, 'opaddallowance_payrollallowance'),
(548, 'Modify', 177, 'change_payrollallowance'),
(549, 'Delete', 177, 'delete_payrollallowance'),
(550, 'Browse', 178, 'browse_payrollcredit'),
(551, 'Browse', 179, 'browse_payrollleavecredit'),
(552, 'Home Page', 180, 'can_PayrollReport'),
(553, 'Browse', 181, 'browse_salary'),
(554, 'Payroll Setting', 181, 'opaddsalary_salary'),
(555, 'Modify', 181, 'change_salary'),
(556, 'Delete', 181, 'delete_salary'),
(557, 'Browse', 182, 'browse_salarychange'),
(558, 'Add', 182, 'add_salarychange'),
(559, 'Modify', 182, 'change_salarychange'),
(560, 'Delete', 182, 'delete_salarychange'),
(561, 'Browse', 187, 'browse_acaccesslevel'),
(562, 'Add Door', 187, 'opadddoor2levels_acaccesslevel'),
(563, 'Add Person', 187, 'opaddemp2levels_acaccesslevel'),
(564, 'Remove Employee', 187, 'opremoveemployee_acaccesslevel'),
(565, 'Add', 187, 'add_acaccesslevel'),
(566, 'Modify', 187, 'change_acaccesslevel'),
(567, 'Delete', 187, 'delete_acaccesslevel'),
(568, 'Browse', 188, 'browse_acantipassback'),
(569, 'Add', 188, 'add_acantipassback'),
(570, 'Modify', 188, 'change_acantipassback'),
(571, 'Delete', 188, 'delete_acantipassback'),
(572, 'Browse', 189, 'browse_accombgroup'),
(573, 'Add', 189, 'add_accombgroup'),
(574, 'Modify', 189, 'change_accombgroup'),
(575, 'Delete', 189, 'delete_accombgroup'),
(576, 'Browse', 190, 'browse_acdoor'),
(577, 'Unlock', 190, 'acunlock_acdoor'),
(578, 'Delete Device Command', 190, 'clearcmd_acdoor'),
(579, 'Remove From Access Level', 190, 'removefromlevels_acdoor'),
(580, 'Modify', 190, 'change_acdoor'),
(581, 'Browse', 191, 'browse_acgroup'),
(582, 'Add Person', 191, 'addemp2group_acgroup'),
(583, 'Add', 191, 'add_acgroup'),
(584, 'Modify', 191, 'change_acgroup'),
(585, 'Delete', 191, 'delete_acgroup'),
(586, 'Browse', 192, 'browse_acholidays'),
(587, 'Sync To Device', 192, 'opsync2device_acholidays'),
(588, 'Add', 192, 'add_acholidays'),
(589, 'Modify', 192, 'change_acholidays'),
(590, 'Delete', 192, 'delete_acholidays'),
(591, 'Browse', 193, 'browse_actimezones'),
(592, 'Sync To Device', 193, 'opsync2device_actimezones'),
(593, 'Add', 193, 'add_actimezones'),
(594, 'Modify', 193, 'change_actimezones'),
(595, 'Delete', 193, 'delete_actimezones'),
(596, 'Browse', 194, 'browse_actimezone'),
(597, 'Sync to Device', 194, 'upload_actimezone'),
(598, 'Add', 194, 'add_actimezone'),
(599, 'Modify', 194, 'change_actimezone'),
(600, 'Delete', 194, 'delete_actimezone'),
(601, 'Browse', 195, 'browse_acunlockcomb'),
(602, 'Add', 195, 'add_acunlockcomb'),
(603, 'Modify', 195, 'change_acunlockcomb'),
(604, 'Delete', 195, 'delete_acunlockcomb'),
(605, 'Home Page', 196, 'can_SetAccessByEmployee'),
(606, 'Home Page', 197, 'can_SetAccessByLevel');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `date_joined` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `is_staff`, `is_active`, `is_superuser`, `last_login`, `date_joined`) VALUES
(1, 'admin', '', '', 'admin@zkteco.com', 'sha1$c271f$f1d0f908740c43c6ea6c8f122c582a875cc4613f', 1, 1, 1, '2019-12-17 14:49:45', '2019-12-17 11:37:02'),
(2, 'employee', '', '', 'employee@zksoftware.com', 'sha1$2e49f$066b1ac381a5c03d3d95a9962ce71478ae1544c8', 1, 1, 0, '2019-12-17 11:37:22', '2019-12-17 11:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_groups`
--

CREATE TABLE `auth_user_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user_groups`
--

INSERT INTO `auth_user_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_user_user_permissions`
--

CREATE TABLE `auth_user_user_permissions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_additiondata`
--

CREATE TABLE `base_additiondata` (
  `id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `object_id` varchar(100) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` varchar(128) NOT NULL,
  `data` longtext NOT NULL,
  `delete_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_appoption`
--

CREATE TABLE `base_appoption` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `optname` varchar(50) NOT NULL,
  `value` varchar(400) NOT NULL,
  `discribe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_appoption`
--

INSERT INTO `base_appoption` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `optname`, `value`, `discribe`) VALUES
(1, NULL, '2019-12-17 11:37:26', NULL, '2019-12-17 11:37:26', NULL, NULL, 0, 'dbversion', '1.5322', 'Database Version'),
(2, NULL, '2019-12-17 11:37:26', NULL, '2019-12-17 11:37:26', NULL, NULL, 0, 'msg_scanner', '07:01', 'Message monitor time'),
(3, NULL, '2019-12-17 11:37:26', NULL, '2019-12-17 11:37:26', NULL, NULL, 0, 'browse_title', 'BioTime', 'Browser Title');

-- --------------------------------------------------------

--
-- Table structure for table `base_basecode`
--

CREATE TABLE `base_basecode` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `content` varchar(30) NOT NULL,
  `content_class` int(11) DEFAULT NULL,
  `display` varchar(30) DEFAULT NULL,
  `value` varchar(30) NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `is_add` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_basecode`
--

INSERT INTO `base_basecode` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `content`, `content_class`, `display`, `value`, `remark`, `is_add`) VALUES
(3835, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Simplified Chinese', 'zh-cn', NULL, NULL),
(3836, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'English', 'en', NULL, NULL),
(3837, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Spanish', 'es', NULL, NULL),
(3838, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Traditional Chinese', 'zh-tw', NULL, NULL),
(3839, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Arabic', 'ar', NULL, NULL),
(3840, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Russian', 'ru', NULL, NULL),
(3841, NULL, '2019-12-17 11:37:25', NULL, NULL, NULL, NULL, 0, 'base.language', 0, 'Thai', 'th', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `base_companysetting`
--

CREATE TABLE `base_companysetting` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `ParaName` varchar(20) NOT NULL,
  `ParaType` varchar(2) DEFAULT NULL,
  `ParaValue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_companysetting`
--

INSERT INTO `base_companysetting` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `ParaName`, `ParaType`, `ParaValue`) VALUES
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'agent_id', NULL, '""'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'company_country', NULL, '""'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'company_email', NULL, '""'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'company_name', NULL, '""'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'currency', NULL, '""'),
(NULL, '2019-12-17 11:37:30', NULL, '2019-12-17 11:37:30', NULL, NULL, 0, 'estd_id', NULL, '""'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'logo_pos', NULL, '3'),
(NULL, '2019-12-17 11:37:30', NULL, '2019-12-17 11:37:30', NULL, NULL, 0, 'name_pos', NULL, '3'),
(NULL, '2019-12-17 11:37:29', NULL, '2019-12-17 11:37:29', NULL, NULL, 0, 'phone_number', NULL, '""'),
(NULL, '2019-12-17 11:37:30', NULL, '2019-12-17 11:37:30', NULL, NULL, 0, 'record_type', NULL, '"SCR"'),
(NULL, '2019-12-17 11:37:31', NULL, '2019-12-17 11:37:31', NULL, NULL, 0, 'show_in_report', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `base_datatranslation`
--

CREATE TABLE `base_datatranslation` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `property` varchar(100) NOT NULL,
  `language` varchar(10) NOT NULL,
  `value` varchar(200) NOT NULL,
  `display` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_datatranslation`
--

INSERT INTO `base_datatranslation` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `content_type_id`, `property`, `language`, `value`, `display`) VALUES
(1, NULL, '2019-12-17 14:49:46', 'admin', '2019-12-17 14:49:46', NULL, NULL, 0, 199, 'app_label', 'en', 'worktable', 'worktable'),
(2, NULL, '2019-12-17 14:49:47', 'admin', '2019-12-17 14:49:47', NULL, NULL, 0, 199, 'app_label', 'en', 'dbapp', 'dbapp'),
(3, NULL, '2019-12-17 14:49:47', 'admin', '2019-12-17 14:49:47', NULL, NULL, 0, 199, 'app_label', 'en', 'auth', 'auth'),
(4, NULL, '2019-12-17 14:49:47', 'admin', '2019-12-17 14:49:47', NULL, NULL, 0, 199, 'app_label', 'en', 'django_extensions', 'django_extensions');

-- --------------------------------------------------------

--
-- Table structure for table `base_emailsetting`
--

CREATE TABLE `base_emailsetting` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `ParaName` varchar(20) NOT NULL,
  `ParaType` varchar(2) DEFAULT NULL,
  `ParaValue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_emailsetting`
--

INSERT INTO `base_emailsetting` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `ParaName`, `ParaType`, `ParaValue`) VALUES
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'absent_count', NULL, '0'),
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'early_count', NULL, '0'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'email_alert', NULL, '0'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'email_host', NULL, '""'),
(NULL, '2019-12-17 11:37:32', NULL, '2019-12-17 11:37:32', NULL, NULL, 0, 'email_host_password', NULL, '""'),
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'email_host_user', NULL, '""'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'email_port', NULL, '25'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'email_use_tls', NULL, '0'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'exception_send', NULL, '0'),
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'late_count', NULL, '0'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'pop_alert', NULL, '0'),
(NULL, '2019-12-17 11:37:32', NULL, '2019-12-17 11:37:32', NULL, NULL, 0, 'sender_name', NULL, '""'),
(NULL, '2019-12-17 11:37:34', NULL, '2019-12-17 11:37:34', NULL, NULL, 0, 'send_day', NULL, '1'),
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'send_rate', NULL, '0'),
(NULL, '2019-12-17 11:37:33', NULL, '2019-12-17 11:37:33', NULL, NULL, 0, 'send_time', NULL, '"19:00"');

-- --------------------------------------------------------

--
-- Table structure for table `base_emailtemplate`
--

CREATE TABLE `base_emailtemplate` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `event` smallint(6) NOT NULL,
  `event_status` smallint(6) DEFAULT NULL,
  `receiver` smallint(6) NOT NULL,
  `email_subject` varchar(200) DEFAULT NULL,
  `email_content` longtext,
  `content_type` longtext NOT NULL,
  `maximum` int(11) NOT NULL,
  `lng` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_ftpserver`
--

CREATE TABLE `base_ftpserver` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `server_name` varchar(100) NOT NULL,
  `host` varchar(50) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `pwd` varchar(100) DEFAULT NULL,
  `remark` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_operatortemplate`
--

CREATE TABLE `base_operatortemplate` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `template1` longtext,
  `finger_id` smallint(6) NOT NULL,
  `valid` smallint(6) NOT NULL,
  `fpversion` varchar(10) NOT NULL,
  `bio_type` smallint(6) NOT NULL,
  `utime` datetime DEFAULT NULL,
  `bitmap_picture` longtext,
  `bitmap_picture2` longtext,
  `bitmap_picture3` longtext,
  `bitmap_picture4` longtext,
  `use_type` smallint(6) DEFAULT NULL,
  `template2` longtext,
  `template3` longtext,
  `template_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_option`
--

CREATE TABLE `base_option` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `app_label` varchar(30) NOT NULL,
  `catalog` varchar(30) NOT NULL,
  `group` varchar(30) NOT NULL,
  `widget` varchar(400) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `validator` varchar(400) NOT NULL,
  `verbose_name` varchar(80) NOT NULL,
  `help_text` varchar(160) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `default` varchar(100) NOT NULL,
  `read_only` tinyint(1) NOT NULL,
  `for_personal` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `base_option`
--

INSERT INTO `base_option` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `name`, `app_label`, `catalog`, `group`, `widget`, `required`, `validator`, `verbose_name`, `help_text`, `visible`, `default`, `read_only`, `for_personal`, `type`) VALUES
(1, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'date_format', 'base', '2', '', '', 0, '', 'Date Format', '', 1, '%Y-%m-%d', 0, 1, 'CharField'),
(2, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'time_format', 'base', '2', '', '', 0, '', 'Time', '', 1, '%H:%M:%S', 0, 1, 'CharField'),
(3, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'datetime_format', 'base', '2', '', '', 0, '', 'Date format', '', 1, '%Y-%m-%d %H:%M:%S', 0, 1, 'CharField'),
(4, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'shortdate_format', 'base', '2', '', '', 0, '', 'Short Date format', '', 1, '%y-%m-%d', 0, 1, 'CharField'),
(5, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'shortdatetime_format', 'base', '2', '', '', 0, '', 'Date format', '', 1, '%y-%m-%d %H:%M', 0, 1, 'CharField'),
(6, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'language', 'base', '2', '', '', 0, '', 'Language', '', 1, 'en', 0, 1, 'CharField'),
(7, NULL, '2019-12-17 11:37:37', NULL, '2019-12-17 11:37:37', NULL, NULL, 0, 'base_default_page', 'base', '2', '', '', 0, '', 'System Default Page', '', 0, 'data/auth/User/', 0, 1, 'CharField'),
(8, NULL, '2019-12-17 11:37:38', NULL, '2019-12-17 11:37:38', NULL, NULL, 0, 'site_default_page', 'base', '2', '', '', 0, '', 'System Default Page', '', 0, 'data/worktable/', 0, 1, 'CharField'),
(9, NULL, '2019-12-17 11:37:38', NULL, '2019-12-17 11:37:38', NULL, NULL, 0, 'backup_sched', 'base', '1', '', '', 0, '', 'Backup Time', '', 1, '', 0, 1, 'CharField'),
(10, NULL, '2019-12-17 11:37:40', NULL, '2019-12-17 11:37:40', NULL, NULL, 0, 'max_photo_width', 'dbapp', '2', '', '', 0, '', 'Maximum Image Width', '', 1, '800', 0, 1, 'CharField'),
(11, NULL, '2019-12-17 11:37:40', NULL, '2019-12-17 11:37:40', NULL, NULL, 0, 'theme', 'dbapp', '2', '', '', 0, '', 'Style', '', 1, 'flat', 0, 1, 'CharField'),
(12, NULL, '2019-12-17 11:37:55', NULL, '2019-12-17 11:37:55', NULL, NULL, 0, 'iclock_default_page', 'iclock', '2', '', '', 0, '', 'Default access control page', '', 0, 'data/iclock/device/', 0, 1, 'CharField'),
(13, NULL, '2019-12-17 11:38:08', NULL, '2019-12-17 11:38:08', NULL, NULL, 0, 'personnel_default_page', 'personnel', '2', '', '', 0, '', 'Default access control page', '', 0, 'data/personnel/Employee/', 0, 1, 'CharField'),
(14, NULL, '2019-12-17 11:38:38', NULL, '2019-12-17 11:38:38', NULL, NULL, 0, 'att_default_page', 'att', '2', '', '', 0, '', 'Default access control page', '', 0, 'att/AttRulePage/', 0, 1, 'CharField'),
(15, NULL, '2019-12-17 11:38:51', NULL, '2019-12-17 11:38:51', NULL, NULL, 0, 'payroll_default_page', 'payroll', '2', '', '', 0, '', '????', '', 0, 'data/payroll/Salary/', 0, 1, 'CharField'),
(16, NULL, '2019-12-17 11:38:59', NULL, '2019-12-17 11:38:59', NULL, NULL, 0, 'access_default_page', 'access', '2', '', '', 0, '', 'Access Control Default UI', '', 0, 'data/access/ACTimeZones/', 0, 1, 'CharField');

-- --------------------------------------------------------

--
-- Table structure for table `base_personaloption`
--

CREATE TABLE `base_personaloption` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `option_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_strresource`
--

CREATE TABLE `base_strresource` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `app` varchar(20) DEFAULT NULL,
  `str` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_strtranslation`
--

CREATE TABLE `base_strtranslation` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `str_id` int(11) NOT NULL,
  `language` varchar(10) NOT NULL,
  `display` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `base_systemoption`
--

CREATE TABLE `base_systemoption` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `option_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkexact`
--

CREATE TABLE `checkexact` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `CHECKTIME` datetime NOT NULL,
  `CHECKTYPE` varchar(5) NOT NULL,
  `work_code` varchar(20) DEFAULT NULL,
  `ISADD` smallint(6) DEFAULT NULL,
  `YUYIN` varchar(100) DEFAULT NULL,
  `ISMODIFY` smallint(6) DEFAULT NULL,
  `ISDELETE` smallint(6) DEFAULT NULL,
  `INCOUNT` smallint(6) DEFAULT NULL,
  `ISCOUNT` smallint(6) DEFAULT NULL,
  `MODIFYBY` varchar(20) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  `audit_status` smallint(6) DEFAULT NULL,
  `audit_reason` varchar(100) DEFAULT NULL,
  `audit_user_id` int(11) DEFAULT NULL,
  `approve_level` smallint(6) DEFAULT NULL,
  `approver` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `checkinout`
--

CREATE TABLE `checkinout` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `pin` varchar(20) NOT NULL,
  `checktime` datetime NOT NULL,
  `checktype` varchar(5) NOT NULL,
  `verifycode` int(11) NOT NULL,
  `sensorid` varchar(5) DEFAULT NULL,
  `WorkCode` varchar(20) DEFAULT NULL,
  `Reserved` varchar(20) DEFAULT NULL,
  `sn_name` varchar(40) DEFAULT NULL,
  `SN` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `area_name` varchar(30) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `location` longtext,
  `app_client` varchar(50) DEFAULT NULL,
  `data_from` smallint(6) DEFAULT NULL,
  `mobile` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkinout`
--

INSERT INTO `checkinout` (`id`, `userid`, `pin`, `checktime`, `checktype`, `verifycode`, `sensorid`, `WorkCode`, `Reserved`, `sn_name`, `SN`, `area`, `area_name`, `upload_time`, `longitude`, `latitude`, `location`, `app_client`, `data_from`, `mobile`) VALUES
(1, NULL, '000000001', '2019-12-17 14:58:57', '1', 1, NULL, '', '0', 'BOCK191760589', 'Testing Device', '2', '1701 Antel Global', '2019-12-17 14:59:04', NULL, NULL, NULL, NULL, 1, NULL),
(2, NULL, '000000001', '2019-12-17 14:59:18', '0', 1, NULL, '', '0', 'BOCK191760589', 'Testing Device', '2', '1701 Antel Global', '2019-12-17 14:59:25', NULL, NULL, NULL, NULL, 1, NULL),
(3, NULL, '000000001', '2019-12-17 18:49:16', '0', 1, NULL, '', '0', 'BOCK191760589', 'Testing Device', '2', '1701 Antel Global', '2019-12-17 18:49:22', NULL, NULL, NULL, NULL, 1, NULL),
(4, NULL, '000000001', '2019-12-17 18:52:37', '0', 1, NULL, '', '0', 'BOCK191760589', 'Testing Device', '2', '1701 Antel Global', '2019-12-17 18:52:43', NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dbapp_viewmodel`
--

CREATE TABLE `dbapp_viewmodel` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `info` longtext NOT NULL,
  `viewtype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dbbackuplog`
--

CREATE TABLE `dbbackuplog` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `starttime` datetime DEFAULT NULL,
  `imflag` tinyint(1) NOT NULL,
  `successflag` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `DeptID` int(11) NOT NULL,
  `DeptName` varchar(50) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `supdeptid` int(11) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `invalidate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `DeptID`, `DeptName`, `code`, `supdeptid`, `type`, `invalidate`) VALUES
(NULL, '2019-12-17 11:37:45', NULL, '2019-12-17 11:37:45', NULL, NULL, 0, 1, 'Department', '1', NULL, 'dept', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_holiday`
--

CREATE TABLE `department_holiday` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `holiday_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_rule`
--

CREATE TABLE `department_rule` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deptadmin`
--

CREATE TABLE `deptadmin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devcmds`
--

CREATE TABLE `devcmds` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `SN_id` int(11) DEFAULT NULL,
  `dev_sn` varchar(20) DEFAULT NULL,
  `CmdOperate_id` int(11) DEFAULT NULL,
  `CmdSort` int(11) DEFAULT NULL,
  `CmdInfo` longtext NOT NULL,
  `CmdContent` longtext NOT NULL,
  `CmdCommitTime` datetime NOT NULL,
  `CmdTransTime` datetime DEFAULT NULL,
  `CmdOverTime` datetime DEFAULT NULL,
  `CmdReturn` int(11) DEFAULT NULL,
  `CmdReturnContent` longtext,
  `CmdImmediately` tinyint(1) NOT NULL,
  `cmdreturntype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devcmds_bak`
--

CREATE TABLE `devcmds_bak` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `SN_id` int(11) DEFAULT NULL,
  `CmdOperate_id` int(11) DEFAULT NULL,
  `CmdContent` longtext NOT NULL,
  `CmdCommitTime` datetime NOT NULL,
  `CmdTransTime` datetime DEFAULT NULL,
  `CmdOverTime` datetime DEFAULT NULL,
  `CmdReturn` int(11) DEFAULT NULL,
  `CmdReturnContent` longtext,
  `CmdImmediately` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `devlog`
--

CREATE TABLE `devlog` (
  `id` int(11) NOT NULL,
  `SN_id` int(11) NOT NULL,
  `OP` varchar(40) NOT NULL,
  `Object` varchar(80) DEFAULT NULL,
  `Cnt` int(11) NOT NULL,
  `ECnt` int(11) NOT NULL,
  `OpTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `name`, `app_label`, `model`) VALUES
(1, 'System Parameter', 'base', 'appoption'),
(2, 'Basic code table', 'base', 'basecode'),
(3, 'caching model', 'base', 'cachingmodel'),
(4, 'Company Setting', 'base', 'companysetting'),
(5, 'Translated to data', 'base', 'datatranslation'),
(6, 'Alert Settings', 'base', 'emailsetting'),
(7, 'Email Template', 'base', 'emailtemplate'),
(8, 'FTP Server', 'base', 'ftpserver'),
(9, 'Log', 'base', 'logentry'),
(10, 'Settings', 'base', 'option'),
(11, 'Personal option', 'base', 'personaloption'),
(12, 'str resource', 'base', 'strresource'),
(13, 'Translated to character string resource', 'base', 'strtranslation'),
(14, 'System Parameter', 'base', 'systemoption'),
(15, 'Database Management', 'dbapp', 'dbbackuplog'),
(16, 'Restore Database', 'dbapp', 'restore_db'),
(17, 'view model', 'dbapp', 'viewmodel'),
(18, 'System parameter setting', 'dbapp', 'sys_option'),
(19, 'Settings', 'dbapp', 'user_option'),
(20, 'Announcement', 'iclock', 'announcement'),
(21, 'Action Log', 'iclock', 'appactionlog'),
(22, 'Mobile App', 'iclock', 'applist'),
(23, 'Area Management', 'iclock', 'areaadmin'),
(24, 'Real-Time Monitoring', 'iclock', 'attrtmonitorpage'),
(25, 'Bio Data', 'iclock', 'biodata'),
(26, 'Daylight Saving Time', 'iclock', 'dstime'),
(27, 'Department Management', 'iclock', 'deptadmin'),
(28, 'Comm Commands', 'iclock', 'devcmd'),
(29, 'Failed command', 'iclock', 'devcmdbak'),
(30, 'Device Operation log', 'iclock', 'devlog'),
(31, 'Device Monitoring', 'iclock', 'devrtmonitorpage'),
(32, 'Device', 'iclock', 'device'),
(33, 'Device Operation log', 'iclock', 'deviceoplog'),
(34, 'Device Transaction', 'iclock', 'devicetransaction'),
(35, 'Dininghall data', 'iclock', 'dininghall'),
(36, 'Face Template', 'iclock', 'facetemplate'),
(37, 'Message', 'iclock', 'notice'),
(38, 'Notification', 'iclock', 'notification'),
(39, 'Device operation log', 'iclock', 'oplog'),
(40, 'Command details', 'iclock', 'operatecmd'),
(41, 'Fingerprint', 'iclock', 'template'),
(42, 'test data', 'iclock', 'testdata'),
(43, 'Transactions', 'iclock', 'transaction'),
(44, 'USB Transaction', 'iclock', 'usbtransaction'),
(45, 'Work Code', 'iclock', 'workcode'),
(46, 'Multi-Card Opening Personnel Groups', 'personnel', 'accmorecardempgroup'),
(47, 'Area', 'personnel', 'area'),
(48, 'BaseData', 'personnel', 'basedatapage'),
(49, 'City', 'personnel', 'city'),
(50, 'Nationality', 'personnel', 'country'),
(51, 'Department', 'personnel', 'department'),
(52, 'Department Approve', 'personnel', 'departmentapprove'),
(53, 'Department Approver', 'personnel', 'departmentapprover'),
(54, 'Department Notify', 'personnel', 'departmentnotify'),
(55, 'Document Setup', 'personnel', 'document'),
(56, 'Document Setting Detail', 'personnel', 'documentdetail'),
(57, 'Education', 'personnel', 'education'),
(58, 'Transfer', 'personnel', 'empchange'),
(59, 'Reports', 'personnel', 'empitemdefine'),
(60, 'Personnel', 'personnel', 'employee'),
(61, 'Personal option', 'personnel', 'employeeoption'),
(62, 'CardClass data', 'personnel', 'iccard'),
(63, 'Issue Card', 'personnel', 'issuecard'),
(64, 'Resignation', 'personnel', 'leavelog'),
(65, 'Meal data', 'personnel', 'meal'),
(66, 'Ethnicity', 'personnel', 'national'),
(67, 'Position', 'personnel', 'position'),
(68, 'Province', 'personnel', 'state'),
(69, 'Data Cleaning', 'worktable', 'deletedata'),
(70, 'System reminder setting', 'worktable', 'groupmsg'),
(71, 'Release notice', 'worktable', 'instantmsg'),
(72, 'Notice type', 'worktable', 'msgtype'),
(73, 'Sync Area', 'worktable', 'syncarea'),
(74, 'Sync Department', 'worktable', 'syncdepartment'),
(75, 'Sync Employee', 'worktable', 'syncemployee'),
(76, 'Sync Job', 'worktable', 'syncjob'),
(77, 'Confirm user information', 'worktable', 'usrmsg'),
(78, 'Manual Punch', 'selfservice', 'selfcheckexact'),
(79, 'OT', 'selfservice', 'selfovertime'),
(80, 'Attendance Report', 'selfservice', 'selfreport'),
(81, 'Leave', 'selfservice', 'selfspecday'),
(82, 'Transactions', 'selfservice', 'selftransaction'),
(83, 'Absence Report', 'att', 'absencereport'),
(84, 'Absent', 'att', 'absentreport'),
(85, 'App Report', 'att', 'appreport'),
(86, 'Approved History', 'att', 'approvedhistory'),
(87, 'Attendance Report', 'att', 'attcalculate'),
(88, 'Att Device', 'att', 'attdevicedatamanage'),
(89, 'Zone', 'att', 'attdeviceusermanage'),
(90, 'att exception', 'att', 'attexception'),
(91, 'Approvals', 'att', 'attexceptionpage'),
(92, 'Guide', 'att', 'attguide'),
(93, 'Rule', 'att', 'attparam'),
(94, 'Attendance Report', 'att', 'attreport'),
(95, 'Attendance Report', 'att', 'attreportperms'),
(96, 'Rule', 'att', 'attrulepage'),
(97, 'Total Timecard', 'att', 'attshiftsbase'),
(98, 'Schedule', 'att', 'attuserofrun'),
(99, 'Export Log', 'att', 'autoexportlog'),
(100, 'Break Time', 'att', 'breaktime'),
(101, 'Break Time Report', 'att', 'breaktimereport'),
(102, 'Timecard', 'att', 'cardtimes'),
(103, 'Schedule', 'att', 'changeschedule'),
(104, 'Manual Punch', 'att', 'checkexact'),
(105, 'Transactions', 'att', 'checkinout'),
(106, 'Transactions', 'att', 'checkinoutgrid'),
(107, 'Exception', 'att', 'dayabnormal'),
(108, 'Daily Attendance', 'att', 'daylist'),
(109, 'Department Holiday', 'att', 'departmentholiday'),
(110, 'Rules', 'att', 'departmentrule'),
(111, 'éƒ¨é—¨æ±‡æ€»è¡¨', 'att', 'deptattsum'),
(112, 'Early Leave', 'att', 'earlyleavereport'),
(113, 'Leave', 'att', 'empspecday'),
(114, 'Attendance Summary', 'att', 'empsum'),
(115, 'Employee Schedule', 'att', 'employeeschedule'),
(116, 'Exception', 'att', 'exceptionattshifts'),
(117, 'Leave Summary', 'att', 'exceptionsum'),
(118, 'Export Schedule', 'att', 'exportschedule'),
(119, 'First In Last Out', 'att', 'firstlast'),
(120, 'Holiday', 'att', 'holiday'),
(121, 'Late', 'att', 'latereport'),
(122, 'Leave Type', 'att', 'leaveclass'),
(123, 'Statistics table', 'att', 'leaveclass1'),
(124, 'Multiple Transaction', 'att', 'multipletransaction'),
(125, 'Shift', 'att', 'num_run'),
(126, 'Details', 'att', 'num_run_deil'),
(127, 'OT', 'att', 'overtime'),
(128, 'Overtime', 'att', 'overtimereport'),
(129, 'Present Report', 'att', 'presentreport'),
(130, 'Scheduled Report', 'att', 'recabnormite'),
(131, 'Department Rule', 'att', 'rule'),
(132, 'Timetable', 'att', 'schclass'),
(133, 'Reschedule', 'att', 'setuseratt'),
(134, 'Training', 'att', 'training'),
(135, 'Training Type', 'att', 'trainingcategory'),
(136, 'Multiple Transaction', 'att', 'transactionsreport'),
(137, 'Schedule', 'att', 'user_of_run'),
(138, 'Temporary schedule', 'att', 'user_temp_sch'),
(139, 'user used s classes', 'att', 'userusedsclasses'),
(140, 'wait for process data', 'att', 'waitforprocessdata'),
(141, 'att calc log', 'att', 'attcalclog'),
(142, 'Scheduled Logs', 'att', 'attrecabnormite'),
(143, 'Total Timecard', 'att', 'attshifts'),
(144, 'Scheduled Logs', 'selfatt', 'attrecresultreport'),
(145, 'Total Timecard', 'selfatt', 'attshiftsreport'),
(146, 'Break Time Report', 'selfatt', 'breaktimereport'),
(147, 'Timecard', 'selfatt', 'cardtimesreport'),
(148, 'Schedule', 'selfatt', 'changeschedulereport'),
(149, 'Manual Punch', 'selfatt', 'checkexactreport'),
(150, 'Transactions', 'selfatt', 'checkinoutreport'),
(151, 'Leave', 'selfatt', 'empspecdayreport'),
(152, 'Attendance Summary', 'selfatt', 'empsumreport'),
(153, 'Log', 'selfatt', 'logreport'),
(154, 'Multiple Transaction', 'selfatt', 'multipletransactionreport'),
(155, 'OT', 'selfatt', 'overtimereport'),
(156, 'Training', 'selfatt', 'trainingreport'),
(157, 'Allowance Detail', 'payroll', 'allowancedetail'),
(158, 'Allowance type', 'payroll', 'allowancetype'),
(159, 'Basic Setting', 'payroll', 'basepage'),
(160, 'Cash Advance', 'payroll', 'cashadvance'),
(161, 'Cash Advance Detail', 'payroll', 'cashadvancedetail'),
(162, 'Currency', 'payroll', 'currency'),
(163, 'Deduction', 'payroll', 'deduction'),
(164, 'Deduction Detail', 'payroll', 'deductiondetail'),
(165, 'Deduction Type', 'payroll', 'deductiontype'),
(166, 'Exception Detail', 'payroll', 'exceptiondetail'),
(167, 'Exception Formula', 'payroll', 'exceptionformula'),
(168, 'Expense', 'payroll', 'expense'),
(169, 'Expense Detail', 'payroll', 'expensedetail'),
(170, 'Formula', 'payroll', 'formulapage'),
(171, 'Formula Sign', 'payroll', 'formulasign'),
(172, 'Salary Change', 'payroll', 'increment'),
(173, 'Leave Detail', 'payroll', 'leavedetail'),
(174, 'Leave Formula', 'payroll', 'leaveformula'),
(175, '???', 'payroll', 'monthlysalary'),
(176, 'OT Formula', 'payroll', 'otformula'),
(177, 'Allowance', 'payroll', 'payrollallowance'),
(178, 'Payroll Credit', 'payroll', 'payrollcredit'),
(179, 'Payroll Leave Credit', 'payroll', 'payrollleavecredit'),
(180, 'Payroll Report', 'payroll', 'payrollreport'),
(181, 'Salary Structure', 'payroll', 'salary'),
(182, 'Salary Change', 'payroll', 'salarychange'),
(183, 'Salary Change', 'payroll', 'salarychangelog'),
(184, '????', 'payroll', 'salarydetail'),
(185, 'Salary Formula', 'payroll', 'salaryformula'),
(186, 'WPS Report', 'payroll', 'wpsreport'),
(187, 'Access Levels', 'access', 'acaccesslevel'),
(188, 'Anti-Passback', 'access', 'acantipassback'),
(189, 'Combined Verification', 'access', 'accombgroup'),
(190, 'Door', 'access', 'acdoor'),
(191, 'Access Group', 'access', 'acgroup'),
(192, 'Holidays', 'access', 'acholidays'),
(193, 'Access Time Zones', 'access', 'actimezones'),
(194, 'Timezone', 'access', 'actimezone'),
(195, 'Combined Verification', 'access', 'acunlockcomb'),
(196, 'Set Access By Employee', 'access', 'setaccessbyemployee'),
(197, 'Set Access By Level', 'access', 'setaccessbylevel'),
(198, 'session', 'sessions', 'session'),
(199, 'content type', 'contenttypes', 'contenttype'),
(200, '??', 'auth', 'group'),
(201, 'message', 'auth', 'message'),
(202, 'permission', 'auth', 'permission'),
(203, '??', 'auth', 'user'),
(204, 'Attendance Calculate Log', 'iclock', 'att_autocal_log');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('c253821dc2b51bb455fc87adcd5fbd31', 'Z0FKOWNRRW9WUkpmWVhWMGFGOTFjMlZ5WDJKaFkydGxibVJ4QWxVcFpHcGhibWR2TG1OdmJuUnlh\nV0l1WVhWMGFDNWlZV05yWlc1awpjeTVOYjJSbGJFSmhZMnRsYm1SeEExVU5YMkYxZEdoZmRYTmxj\nbDlwWkhFRWlnRUJWUTlrYW1GdVoyOWZiR0Z1WjNWaFoyVnhCVmdDCkFBQUFaVzV4Qm5VdQpkODE1\nNzFiOGM0NzZhYjU3NzFiMjE0NTQ3YzE3ZTg3Mw==\n', '2019-12-17 15:49:46');

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
(17, 2, 1, 1, 0),
(18, 2, 5, 2, 1),
(21, 4, 5, 1, 0),
(22, 4, 9, 2, 1),
(25, 6, 5, 1, 0),
(26, 6, 9, 2, 1),
(27, 7, 5, 1, 0),
(28, 7, 9, 2, 1),
(31, 8, 5, 1, 0),
(32, 8, 9, 2, 1),
(33, 1, 1, 1, 1),
(35, 3, 1, 1, 1);

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
(3, 'test bank', '000-000-0000', 'Inactive'),
(4, 'Royal Mint of Spain', '0000 0000 0000 0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_billing`
--

CREATE TABLE `dm_billing` (
  `billingID` bigint(20) NOT NULL,
  `payrolldateID` bigint(20) NOT NULL,
  `clientID` bigint(20) DEFAULT NULL,
  `usersubmitted` bigint(20) DEFAULT NULL,
  `datesubmitted` datetime DEFAULT NULL,
  `userapproved` varchar(255) DEFAULT NULL,
  `dateapproved` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `billingstatus` int(11) NOT NULL,
  `bstatus` bigint(20) NOT NULL,
  `userdenied` bigint(20) NOT NULL,
  `datedenied` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `clientrecord` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'A sprawling 25-hectare mega-community that combines office spaces luxury condominiums leisure amenities retail shops and', 'Active', 'Mactan Newton', '', 'Sapang Hari', 'Newtown Boulevard', 'Lapu-Lapu City', 'Jose Pacheco', 2, '0934-786-9877', 'joecheco@gmail.com'),
(2, 'The country''s largest middle-income housing developer high-rise residential condominium developer and business process o', 'Active', 'Megaworld Corporation', '', 'Sen. Gil Puyat Avenue', 'San Isidro', 'Makati City', 'Arnulfo Policarpio', 3, '0995-345-3767', 'arn.arn_poli@gmail.com'),
(3, 'Eton', 'Active', 'Eton', '8th Floor', 'PNB Building', 'Bel-Air', 'Makati City', 'Dominador Arsenio', 2, '0956-896-8375', 'dom.arsenio@gmail.com'),
(4, 'Egis Projects Philippines, Inc. is engage in the business of rendering services to private sector entities involved in the business of building, operating or managing roadways, railways, and other transportation infrastructure projects.', 'Active', 'EGIS Projects Phils INC', 'Unit 703', 'Citystate Center', 'Shaw Boulevard', 'Mandaluyong City', 'Bernardo Capule', 1, '0956-234-5678', 'beniecap@gmail.com'),
(5, 'One Palm Tree Villa is a sprawling establishment which boasts 10 floors in the property. Guests will have a wide range of room options to choose from.', 'Active', 'One Palm Tree Villas', '8', 'Resort Drive', 'Barangay 183', 'Pasay', 'Crisostomo Garcia', 1, '0987-287-4673', 'crissy.g@gmail.com'),
(6, 'Featuring bay or city views from all guest rooms, Armada Hotel Manila is a 5-minute walk from the Manila Bay waterfront. It houses a rooftop pool and offers pampering spa treatments at its Sensui Spa.', 'Active', 'Armada Hotel Manila', '2108', 'Marcelo H. Del Pila', 'Malate', 'Manila', 'Narding Constancio', 1, '0967-651-2678', 'nardi.c@gmail.com'),
(7, 'testing the system', 'Active', 'test clients', '555', 'test', 'test', 'test', 'test', 3, '1234-567-8910', 'test@test.com');

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
(1, 'DeltaMike Security Agency Inc.', 'Billy Pascua', '', '96', 'Guirayan Street', '', 'Dona Imelda', 'Quezon City', 'Metro Manila', '1113', '436-523-984', '32-3675839-4', '87-684723948-3', '4657-8798-2575', 'opcen24hrs@deltamikesecurity.com', '63-28244-9255', '0977-801-1202', '12-94-23823940', 'http://deltamikesecurity.com/');

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
(7, 'Security Department', 'Active'),
(8, 'Executives', 'Active'),
(9, 'No Department', 'Inactive'),
(10, 'Test Department', 'Inactive'),
(11, 'Test Department 2', 'Active'),
(12, 'testing department', 'Inactive'),
(13, 'Tester Department', 'Active');

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
(2, 1, 'IT Programmer 2', 'Active'),
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
(18, 8, 'Operations Manager', 'Active'),
(19, 8, 'General Manager', 'Active'),
(20, 5, 'Account Officer', 'Active'),
(21, 8, 'Manager', 'Active'),
(22, 9, 'Test Designation', 'Inactive'),
(23, 13, 'Test Designation1', 'Inactive'),
(24, 10, 'Test Designation2', 'Inactive'),
(25, 13, 'Test Designation', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `dm_employee`
--

CREATE TABLE `dm_employee` (
  `employeeID` bigint(20) NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housenumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contactinfo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilstatus` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hireddate` date NOT NULL,
  `departmentID` int(11) NOT NULL,
  `designationID` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postID` bigint(20) NOT NULL,
  `roleID` bigint(20) NOT NULL,
  `approvalID` bigint(20) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basicsalary` decimal(15,4) NOT NULL,
  `dailyrate` decimal(15,4) NOT NULL,
  `allowance` decimal(15,4) NOT NULL,
  `retfund` decimal(15,4) NOT NULL,
  `incentive` decimal(15,4) NOT NULL,
  `uniformallowance` decimal(15,4) NOT NULL,
  `bankname` bigint(20) NOT NULL,
  `backaccountname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `backaccountnumber` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinnumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sssnumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `philhealthnumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pagibignumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeestatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeetypeID` int(255) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clientID` int(120) NOT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `dm_employee`
--

INSERT INTO `dm_employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `postID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `retfund`, `incentive`, `uniformallowance`, `bankname`, `backaccountname`, `backaccountnumber`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `employeetypeID`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Maricelle', '', 'Magtanong', 'Female', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '2020-04-17', '0927-947-5792', 'Single', 'Filipino', '2020-04-16', 3, '7', 0, 1, 1, 'admin', 'admin', '6834.0000', '310.6363', '100.0000', '5000.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '1.jpg', 0, '2019-11-25 08:26:51.905646'),
(2, 'Cardo', '', 'Dalisay', 'Female', '', 'Opel', '175', 'Caloocan', '1960-03-10', '0927-947-5792', 'Single', 'Filipino', '2015-03-10', 5, '15', 2, 2, 2, 'staff', 'staff', '85.0000', '500.0000', '400.0000', '250.0000', '200.0000', '0.0000', 0, '', '', '234-676-455', '09-8765678-9', '56-798765456-7', '0098-7687-6465', 'Active', 1, '2.jpg', 1, '2019-11-25 08:26:54.102823'),
(3, 'John', 'y', 'Wick', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '1987-09-02', '0938-712-8975', 'Married', 'Fiipino', '2015-01-06', 5, '15', 1, 2, 2, 'exe', 'exe', '500.5050', '250.0000', '50.0000', '0.0000', '0.0000', '0.0000', 1, '', '9243-895-832-94', '213-456-789', '23-4567893-2', '23-456787654-3', '5432-1234-5643', 'Active', 1, '3.jpg', 1, '2019-12-03 11:56:31.366887'),
(4, 'Mary Rose', '', 'Vitor', 'Female', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', '1984-01-10', '0934-762-3857', 'Married', 'Filipino', '2015-02-03', 2, '5', 0, 1, 0, 'mrvitor', 'password', '21342.0000', '970.0909', '250.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '12-3123456-7', '13-214325365-4', '3243-5436-5442', 'Active', 2, '4.jpg', 0, '2019-12-20 07:50:01.399405'),
(5, 'Jeffrey', '', 'Cauguiran', 'Male', '2811', 'Cup Point', 'Fashion Hall', 'Old Town Road', '1978-03-09', '0938-764-3872', 'Married', 'Filipino', '2005-10-05', 8, '19', 0, 1, 0, 'mahnamejeff', 'password', '92000.0000', '4181.8182', '10000.0000', '1000.0000', '0.0000', '0.0000', 1, 'Curry Venti Regionals', '2820-191-115-51', '439-857-493', '24-3546786-9', '45-654334567-6', '6534-5677-6543', 'Active', 2, '5.jpg', 0, '2019-12-23 03:58:25.632917'),
(6, 'Cyndy', '', 'Marcellana', 'Female', 'asr3', 'sadsfsd', 'asdsad', 'asdsf a', '1994-06-15', '0978-463-5879', 'Single', 'Filipino', '2019-06-11', 2, '3', 0, 1, 0, 'cyndy', 'password', '12312.0000', '559.6364', '10.0000', '0.0000', '0.0000', '0.0000', 2, 'test account', '243 657 89 654', '123-546-213', '42-1123432-1', '54-678645454-3', '4323-4565-3245', 'Active', 2, '6.jpg', 0, '2019-12-23 06:11:05.731548'),
(7, 'Account', '', 'Officer', 'Male', '322', 'qe2 fd', 'd 3221f', '3 rwsdg', '2020-03-10', '0943-287-5236', 'Single', 'Filipino', '2020-03-11', 5, '20', 0, 1, 0, 'aofficer', 'password', '982.0000', '44.6364', '2.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '678-765-476', '67-4675456-5', '56-546754676-5', '5676-5675-6765', 'Active', 2, '7.jpg', 0, '2020-01-02 03:32:04.769082'),
(8, 'Operation', '', 'Manager', 'Male', '', 'TEST', 'TEST', 'TEST', '2020-03-10', '0956-876-5827', 'Single', 'Filipino', '2020-03-10', 8, '18', 0, 1, 0, 'omanager', 'password', '9832.0000', '446.9091', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '78-9876543-2', '56-789087654-3', '4345-6789-0987', 'Active', 2, '8.jpg', 0, '2020-01-09 11:36:25.875891'),
(9, 'Noemi', '', 'Gaylan', 'Male', '', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1978-10-11', '0934-237-5988', 'Married', 'Filipino', '2005-07-21', 4, '11', 0, 1, 0, 'noemi', 'password', '5341.0000', '242.7727', '1000.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '456-789-098', '78-7554578-9', '56-788976543-4', '3475-6767-8754', 'Active', 2, '9.jpg', 0, '2020-01-09 11:40:54.965467'),
(10, 'Billy', '', 'Pascua', 'Male', '', 'JUAN', 'JUAN', 'JUAN', '1977-03-17', '0976-432-8628', 'Married', 'Filipino', '2005-07-28', 8, '21', 0, 2, 0, 'billy', 'password', '500.5050', '0.0909', '0.0000', '1234.0000', '0.0000', '0.0000', 1, '', '2432-568-376-52', '231-456-789', '24-5678965-4', '76-543234567-8', '5432-3456-7897', 'Active', 2, '', 0, '2020-01-09 11:46:07.385507'),
(11, 'Cristalyn', '', 'Cruzada', 'Female', '43589', 'Amorsolo Street', 'Pinagbuhatan', 'Pasig City', '2020-03-10', '0989-867-2987', 'Single', 'Filipino', '2020-03-10', 4, '10', 0, 2, 0, '', '', '12567.3000', '571.2409', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '87-6543245-6', '34-567899876-5', '4678-6543-5678', 'Active', 2, '', 0, '2020-01-09 11:50:25.340515'),
(12, 'Cyber Jonald', '', 'Coballes', 'Male', '565', 'Pachecho Street', 'One Orchard ', 'Quezon City', '2020-03-10', '0937-578-5687', 'Married', 'Filipino', '2020-03-10', 2, '4', 0, 2, 0, '', '', '15000.0000', '6818.8182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678654-3', '43-456789765-4', '6754-3456-7876', 'Active', 2, '', 0, '2020-01-09 11:53:12.623726'),
(13, 'Lea', '', 'Ylanan', 'Female', '', '79A Reyes Compound', 'Manggahan', 'Pasig City', '2020-03-10', '0946-574-8376', 'Married', 'Filipino', '2020-03-10', 2, '3', 0, 2, 0, '', '', '6705.0400', '304.7745', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678908-7', '45-678908765-4', '6543-4567-8976', 'Active', 2, '', 0, '2020-01-09 11:54:58.434185'),
(14, 'Anna Jemima', '', 'Molino', 'Female', '65', 'Downtown Ridge', 'Bacoor', 'Cavite', '2020-03-10', '0975-567-8765', 'Single', 'Filipino', '2020-03-10', 2, '3', 0, 2, 0, '', '', '36000.0000', '1636.3636', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-865', '56-5564324-5', '67-654321345-6', '7654-3456-7543', 'Active', 2, '', 0, '2020-01-09 13:11:56.434744'),
(15, 'Alfredo', '', 'Gonzaga', 'Male', '46 ', 'Concepcion Street', 'Bangkal', 'Marikina City', '2020-03-10', '0975-324-5678', 'Married', 'Filipino', '2020-03-10', 3, '9', 0, 2, 0, '', '', '22882.1600', '1040.0982', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '345-678-990', '45-6789090-8', '45-678908765-4', '3456-7890-9870', 'Active', 2, '', 0, '2020-01-10 06:36:31.166842'),
(16, 'Michael Jihn', '', 'Maron', 'Male', '546A Adelf', 'Yen Street', 'Bagong Ilog', 'Pasig City', '2020-03-10', '0953-345-6789', 'Single', 'Filipino', '2020-03-10', 3, '8', 0, 2, 0, '', '', '15000.0000', '681.8182', '0.0000', '0.0000', '0.0000', '0.0000', 2, 'Michael Jihn Maron', '3456-7654-3213-4', '345-678-965', '56-7876545-4', '34-567876543-4', '6787-6567-7656', 'Active', 2, '', 0, '2020-01-10 09:25:43.559167'),
(17, 'Montano', 'Macalua', 'Abarsolo', 'Male', '', 'Sitio Sto Nino', 'Basak Tamiya', 'Lapu Lapu City', '2020-03-10', '0917-971-5870', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '12435.0000', '565.2273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '421-894-412', '06-2711892-2', '12-050966951-7', '1640-0007-3900', 'Active', 1, '', 1, '2020-02-17 01:03:25.193494'),
(18, 'Richie', 'Rodrigo', 'Artezuela', 'Male', '', 'Casanta', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0987-654-6789', 'Single', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '13436.0000', '610.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6478115-3', '09-303427427-1', '0302-6324-2854', 'Active', 1, '', 1, '2020-02-17 01:07:07.178939'),
(19, 'Richard', 'Briones', 'Abarquez', 'Male', '', 'Alangalang', 'Alangalang', 'Mandaue City', '2020-03-10', '0945-600-9497', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 1, 0, '', '', '24423.0000', '1110.1364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2264628-2', '12-050813657-4', '1211-1240-5852', 'Active', 1, '', 1, '2020-02-17 01:11:14.928189'),
(20, 'Mateo Jr.', 'Capute', 'Anura', 'Male', '', 'Purok Lubi', 'Canjulao', 'Lapu Lapu City', '2020-03-10', '0943-298-4723', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 1, 0, '', '', '2144.0000', '97.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3219363-1', '09-229238736-1', '1205-1303-4348', 'Active', 1, '', 1, '2020-02-17 01:14:30.187504'),
(21, 'Jessie', 'Virtudes', 'Aclo', 'Male', '', 'Saac 2', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0924-953-4586', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 1, 0, '', '', '3534.0000', '160.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '222-381-749', '33-7842651-7', '19-089509944-2', '1211-2111-7894', 'Active', 1, '', 1, '2020-02-17 01:16:48.073457'),
(22, 'Edison', 'Anunciado', 'Alcover', 'Male', '', 'Victoria Homes ', 'Sudtungan Basak', 'Lapu Lapu City', '2020-03-10', '0921-487-3642', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 1, 0, '', '', '23423.0000', '1064.6818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '289-076-696', '36-0027832-9', '02-050729485-6', '1211-0935-7230', 'Active', 1, '', 1, '2020-02-17 01:19:28.717081'),
(23, 'Jovencia', 'Laborte', 'Antiola', 'Female', '', 'Kawot', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0912-478-3682', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '21312.0000', '968.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '270-576-276', '06-2741392-8', '12-050648920-8', '1210-1131-2354', 'Active', 1, '', 1, '2020-02-17 01:21:54.538877'),
(24, 'Helen', 'Velasquez', 'Ayuso', 'Female', '', 'Longos Apt Site Tagle Apt', 'Basuk', 'Lapu Lapu City', '2020-03-10', '0921-932-6484', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '24321.0000', '1105.5000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '319-931-309', '06-2704616-2', '12-050973461-0', '1210-2964-2007', 'Active', 1, '', 1, '2020-02-17 01:24:41.289978'),
(25, 'Jonathan', 'Albert', 'Ba-aclo', 'Male', '', 'Isuya', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0921-472-6483', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '4532.0000', '206.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '252-881-357', '06-2456183-1', '15-200643702-2', '1211-7120-2235', 'Active', 1, '', 1, '2020-02-17 01:27:34.149798'),
(26, 'Ricky', 'Acain', 'Balucan', 'Male', '', 'Soong', 'Mactan', 'Lapu Lapu', '2020-03-10', '0912-487-3264', 'Married', 'Filipino', '2020-03-10', 5, '15', 1, 2, 0, '', '', '6856.0000', '311.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '08-2315386-2', '00-000000000-0', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:29:35.502704'),
(27, 'Alberto III', 'Tampus', 'Cabalhug', 'Male', '', 'Bankal', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0943-856-2387', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-1537051-0', '12-050458523-4', '1670-0131-5826', 'Active', 1, '', 1, '2020-02-17 01:31:58.295240'),
(28, 'Alfredo', 'Tayapad', 'Cabanes', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0923-986-3487', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '21234.0000', '965.1818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6185532-5', '12-201611748-8', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:35:33.401802'),
(29, 'Evamar', 'Dulfo', 'Cagande', 'Male', '26 ', 'Fabro Hills Subdivision', 'Pusuk', 'Lapu Lapu City', '2020-03-10', '0932-365-8734', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '191-732-735', '06-1623222-0', '12-050358252-5', '1210-4630-8741', 'Active', 1, '', 1, '2020-02-17 01:38:27.546361'),
(30, 'Randy', 'Sarsuelo', 'Calumba', 'Male', '', 'Buyong', 'Malibago', 'Lapu Lapu City', '2020-03-10', '0935-984-3759', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '3241.0000', '147.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '344-679-720', '06-2600111-1', '12-025515278-0', '1211-6762-0450', 'Active', 1, '', 1, '2020-02-17 01:41:09.505776'),
(31, 'Ronald', 'Sagario', 'Carillas', 'Male', '', 'Saac II', 'Buaya', 'Lapu Lapu City', '2020-03-10', '0934-598-4853', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '4324.0000', '196.5454', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '434-955-219', '06-2970380-1', '14-201738708-0', '1211-0531-5590', 'Active', 1, '', 1, '2020-02-17 01:44:05.987425'),
(32, 'Vernie', 'Ortega', 'Cañete', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0923-923-6873', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2428417-6', '12-050581984-0', '1210-8736-3481', 'Active', 1, '', 1, '2020-02-17 01:46:23.666511'),
(33, 'Benjie Mark', 'Sino', 'Caroro', 'Male', '', 'Umapad', 'Mandaue', 'Cebu City', '2020-03-10', '0924-392-6587', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24235.0000', '1101.5909', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-4131601-4', '12-025798771-5', '1212-3462-9680', 'Active', 1, '', 1, '2020-02-17 01:48:29.572100'),
(34, 'Corazon', 'Gigante', 'Cartesiano', 'Female', '', 'Basak', 'Kagudoy', 'Lapu Lapu City', '2020-03-10', '0923-726-5848', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24232.0000', '1101.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '334-454-473', '06-2427015-1', '12-050661210-7', '1270-2047-2713', 'Active', 1, '', 1, '2020-02-17 01:50:23.656968'),
(35, 'Jessie', '', 'Casonete', 'Female', '', 'Ticgahon', 'Bankal', 'Lapu Lapu City', '2020-03-10', '0932-857-4385', 'Single', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3913351-3', '12-025646769-6', '1212-0540-0094', 'Active', 1, '', 1, '2020-02-17 01:53:27.296675'),
(36, 'Loida', 'Abajo', 'Cimafranca', 'Female', '', 'New Lipata', 'Pusok', 'Lapu Lapu City', '2020-03-10', '0923-534-6587', 'Married', 'Filipino', '2020-03-10', 5, '15', 2, 2, 0, '', '', '19389.0004', '881.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '495-304-269', '06-1705858-4', '12-050116040-1', '1210-3816-0502', 'Active', 1, '', 1, '2020-02-17 01:55:47.487867'),
(37, 'Juan', '', 'Dela Cruz', 'Male', '', 'Antel', 'Pinagbuhatan', 'Pasig', '1994-07-13', '0909-090-9090', 'Single', 'Filipino', '2020-03-25', 1, '6', 1, 2, 0, 'test', 'test', '0.0000', '800.0000', '1000.0000', '10000.0000', '1000.0000', '0.0000', 1, 'Test', '0000-000-00', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 1, '37.jpg', 1, '2020-03-25 08:28:17.837846'),
(38, 'try', 'try', 'try', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, '4', 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:39:58.330067'),
(39, 'trytest', 'try', 'trytest', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, '4', 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:40:17.279991'),
(40, 'testing', 'try', 'testing', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, '4', 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:40:42.275416'),
(41, 'jejejeje', 'try', 'jejej', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, '4', 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:44:14.060807'),
(42, 'bingbong', 'try', 'bongbong', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, '4', 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:44:46.152778'),
(43, 'bbboi', 'boi', 'boiboiboi', 'Male', '71246', 'jk hwfesudf', ' ETIURTGEW', '2312 r', '2020-03-02', '8778-435-4853', 'Single', 'sdj hfek', '2020-03-01', 4, '10', 0, 3, 0, 'boiboiboi', 'biboi', '432423.0000', '3463.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:49:49.867991'),
(44, 'post ', 'it', 'malone', 'Male', '15867', 'paper castle', 'mongol', 'clipperhead', '1910-11-24', '0921-278-5793', 'Single', 'Mongolian', '2005-01-06', 1, '14', 0, 1, 0, 'postme', 'password', '1321.0000', '543.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-04-01 09:26:19.402864');

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
(11, 4, 1, 5),
(12, 4, 2, 9),
(13, 5, 2, 5),
(14, 5, 2, 4),
(15, 6, 2, 3),
(16, 6, 1, 1),
(17, 7, 5, 5),
(18, 11, 2, 7),
(19, 11, 5, 5),
(20, 13, 4, 5),
(21, 13, 1, 1),
(22, 14, 3, 43),
(23, 14, 4, 2),
(24, 15, 1, 6),
(25, 16, 1, 234),
(27, 18, 1, 1),
(29, 20, 2, 234),
(30, 21, 2, 234),
(31, 22, 1, 232),
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
(46, 40, 1, 5),
(47, 41, 1, 1),
(48, 42, 1, 5),
(49, 43, 1, 3),
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
(62, 4, 1, 5),
(63, 4, 4, 7),
(64, 4, 2, 9),
(65, 5, 5, 14),
(66, 5, 2, 20),
(67, 5, 3, 5),
(68, 7, 2, 1),
(69, 9, 1, 1),
(70, 12, 1, 5),
(114, 3, 3, 3),
(115, 3, 1, 5),
(124, 2, 1, 6),
(125, 2, 2, 1),
(126, 44, 1, 11),
(127, 44, 2, 7),
(128, 37, 1, 1),
(129, 1, 1, 1),
(130, 1, 2, 10),
(131, 1, 5, 30),
(132, 19, 1, 4),
(133, 19, 2, 5),
(135, 23, 2, 5),
(136, 17, 2, 9);

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
  `reason` varchar(250) NOT NULL,
  `notedleave` varchar(255) NOT NULL,
  `leavestatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_employeeleave`
--

INSERT INTO `dm_employeeleave` (`employeeleaveID`, `leavetypeID`, `employeeID`, `leavefrom`, `leaveto`, `numberofdays`, `remainingleave`, `reason`, `notedleave`, `leavestatus`) VALUES
(1, 2, 2, '2020-04-01', '2020-04-02', 2, 7, 'kornbip19', 'test', 'Reviewed'),
(2, 3, 3, '2020-04-14', '2020-04-16', 3, 3, 'Not Feeling Well', 'Sample', 'Reviewed'),
(3, 1, 6, '2020-04-15', '2020-04-15', 1, 3, 'test', '', 'For review'),
(4, 1, 37, '2020-04-01', '2020-04-01', 1, 5, 'Test', '', 'For review'),
(6, 1, 1, '2020-04-28', '2020-04-28', 1, 6, 'Not Feeling Well', '', 'For review'),
(7, 2, 17, '2020-05-01', '2020-05-01', 1, 10, 'Test', '', 'For review'),
(8, 1, 19, '2020-05-19', '2020-05-19', 1, 5, 'Test', '', 'For review');

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
(2, 'Staff');

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
(18, 'Christmas Eve', '2020-12-24', 'Regular Holiday');

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
(1, 'Vacation Leave', 0, '', 'Active'),
(2, 'Sick Leave', 5, 'No', 'Active'),
(3, 'Emergency Leave', 5, 'No', 'Active'),
(4, 'Service Incentive Leave', 0, '', 'Active'),
(5, 'Paternity Leave', 1, 'No', 'Active'),
(6, 'Maternity Leave', 4, 'Yes', 'Active');

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
  `amount` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deduction` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` int(11) NOT NULL,
  `lnothers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

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
(20, 'Billing Process', 'billingprocess'),
(21, 'Billing Report', 'billingreport'),
(22, 'PPS (Metrobank)', 'pps'),
(23, 'PHIC Premium Payment', 'phicpremium'),
(24, 'SSS Premium Payment', 'ssspremium'),
(25, 'HDMF Premium Payment', 'hdmfpremium'),
(26, 'Summary of Deductions', 'deduction'),
(27, 'Departments', 'departments'),
(28, 'Designations', 'designations'),
(29, 'Clients', 'clients'),
(30, 'Post', 'post'),
(31, 'SSS Table', 'ssstable'),
(32, 'PhilHealth Table', 'philhealthtable'),
(33, 'Tax Table', 'taxtable'),
(34, 'Holidays', 'holidays'),
(35, 'Leave Type', 'leavetype'),
(36, 'Bank', 'bank'),
(37, 'Company Profile', 'companyprofile'),
(38, 'Roles & Permission', 'rolespermission'),
(39, 'Approval Setup', 'approvalsetup');

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
  `overtimestatus` varchar(255) NOT NULL,
  `datecreated` varchar(255) NOT NULL,
  `dateupdated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_overtime`
--

INSERT INTO `dm_overtime` (`overtimeID`, `employeeID`, `description`, `overtimedate`, `starttime`, `endtime`, `totalhour`, `noted`, `overtimestatus`, `datecreated`, `dateupdated`) VALUES
(1, 2, 'overtime thank you', '2020-04-27', '00:00', '00:00', '0:0', 'the system is accepting a zero total hour', 'Reviewed', '', '');

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
  `reason` text NOT NULL,
  `userdenied` varchar(255) NOT NULL,
  `datedenied` varchar(255) NOT NULL,
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
  `otnotes` varchar(255) NOT NULL,
  `nightdiffadjustment` decimal(15,4) NOT NULL,
  `nightnotes` varchar(255) NOT NULL,
  `lateadjustment` decimal(15,4) NOT NULL,
  `latenotes` varchar(255) NOT NULL,
  `leaveadjustment` decimal(15,4) NOT NULL,
  `otheradjustment` decimal(15,4) NOT NULL,
  `leavenotes` varchar(255) NOT NULL,
  `othernotes` varchar(255) NOT NULL,
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
  `sssDesc` varchar(50) NOT NULL,
  `hdmfloan` decimal(15,4) NOT NULL,
  `hdmfDesc` varchar(50) NOT NULL,
  `salaryloan` decimal(15,4) NOT NULL,
  `salaryDesc` varchar(50) NOT NULL,
  `emergencyloan` decimal(15,4) NOT NULL,
  `emergencyDesc` varchar(50) NOT NULL,
  `trainingloan` decimal(15,4) NOT NULL,
  `trainingDesc` varchar(50) NOT NULL,
  `otherloan` decimal(15,4) NOT NULL,
  `otherLoanDesc` varchar(255) NOT NULL,
  `otherDesc` varchar(50) NOT NULL,
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
  `clientID` bigint(20) NOT NULL,
  `postID` int(11) NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `weekstart` date NOT NULL,
  `weekend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_postschedule`
--

INSERT INTO `dm_postschedule` (`postscheduleID`, `clientID`, `postID`, `timein`, `timeout`, `weekstart`, `weekend`) VALUES
(1, 1, 1, '07:00:00', '19:00:00', '2020-05-03', '2020-05-09'),
(2, 1, 1, '07:00:00', '19:00:00', '2020-05-17', '2020-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `dm_postschedule_guard`
--

CREATE TABLE `dm_postschedule_guard` (
  `ID` bigint(20) NOT NULL,
  `postscheduleID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `weekday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_postschedule_guard`
--

INSERT INTO `dm_postschedule_guard` (`ID`, `postscheduleID`, `employeeID`, `weekday`) VALUES
(1, 1, 19, 1),
(2, 1, 19, 2),
(3, 1, 19, 3),
(4, 1, 19, 4),
(5, 1, 17, 1),
(6, 1, 17, 2),
(7, 2, 2, 0);

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
  `retirementidstatus` bigint(20) NOT NULL,
  `userdenied` bigint(20) NOT NULL,
  `datedenied` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(37, 1, 37, 1),
(38, 1, 38, 1),
(39, 1, 39, 1),
(40, 2, 1, 1),
(41, 2, 2, 1),
(42, 2, 3, 1),
(43, 2, 4, 1),
(44, 2, 5, 1),
(45, 2, 6, 1),
(46, 2, 7, 1),
(47, 2, 8, 1),
(48, 2, 9, 1),
(49, 2, 10, 1),
(50, 2, 11, 1),
(51, 2, 12, 1),
(52, 2, 13, 1),
(53, 2, 14, 1),
(54, 2, 15, 1),
(55, 2, 16, 1),
(56, 2, 17, 1),
(57, 2, 18, 1),
(58, 2, 19, 1),
(59, 2, 20, 1),
(60, 2, 21, 1),
(61, 2, 22, 1),
(62, 2, 23, 1),
(63, 2, 24, 1),
(64, 2, 25, 1),
(65, 2, 26, 1),
(66, 2, 27, 1),
(67, 2, 28, 1),
(68, 2, 29, 1),
(69, 2, 30, 1),
(70, 2, 31, 1),
(71, 2, 32, 1),
(72, 2, 33, 1),
(73, 2, 34, 1),
(74, 2, 35, 1),
(75, 2, 36, 1),
(76, 2, 37, 1),
(77, 2, 38, 0),
(78, 2, 39, 1);

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
(3, 'test role');

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
(1, 10, 6),
(2, 10, 7),
(7, 4, 6),
(8, 4, 7),
(9, 6, 6),
(10, 6, 7),
(75, 2, 5),
(76, 2, 6),
(77, 44, 1),
(78, 44, 7),
(79, 37, 6),
(80, 37, 7),
(81, 1, 6),
(82, 1, 7),
(83, 19, 6),
(84, 19, 7),
(87, 17, 6),
(88, 17, 7);

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
-- Table structure for table `dm_security`
--

CREATE TABLE `dm_security` (
  `securityID` bigint(20) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_security`
--

INSERT INTO `dm_security` (`securityID`, `confirmPassword`) VALUES
(1, 'test');

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
  `monthstatus` bigint(20) NOT NULL,
  `userdenied` bigint(20) NOT NULL,
  `datedenied` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `employeerecord` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, '2020-05-01', '2020-05-15', 1, 1, '2020-05-18 17:29:17', '1', '2020-05-18 17:29:24', 2, 1, 2, '', NULL, NULL, 0),
(2, 1, '2020-05-16', '2020-05-31', 2, NULL, NULL, NULL, NULL, 0, 0, 0, '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeepingdetails`
--

CREATE TABLE `dm_timekeepingdetails` (
  `timesheetID` bigint(20) NOT NULL,
  `timekeepingID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `rateCode` varchar(255) NOT NULL,
  `tkType` varchar(100) NOT NULL,
  `validateuser` bigint(20) DEFAULT NULL,
  `validatedate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(255) DEFAULT NULL,
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
-- Dumping data for table `dm_timekeepingdetails`
--

INSERT INTO `dm_timekeepingdetails` (`timesheetID`, `timekeepingID`, `employeeID`, `rateCode`, `tkType`, `validateuser`, `validatedate`, `remarks`, `datesched`, `clientID`, `postID`, `timein`, `timeout`, `post_timein`, `post_timeout`, `actualhours`, `actual_regular_hours`, `ordlate`, `rstlate`, `spclate`, `spcrstlate`, `rgllate`, `rglrstlate`, `dbllate`, `dblrstlate`, `ord`, `rst`, `spc`, `spcrst`, `rgl`, `rglrst`, `dbl`, `dblrst`, `actual_ot_hours`, `ordot`, `rstot`, `spcot`, `spcrstot`, `rglot`, `rglrstot`, `dblot`, `dblrstot`, `actual_nightdiff_hours`, `ordnight`, `rstnight`, `spcnight`, `spcrstnight`, `rglnight`, `rglrstnight`, `dblnight`, `dblrstnight`) VALUES
(1, 1, 19, 'ord', 'Exist', 1, '2020-05-18 09:21:33', 'test', '2020-05-04', 1, 1, '2020-05-04 07:00:00', '2020-05-04 19:00:00', '07:00:00', '19:00:00', '12:00:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, 1, 19, 'ord', 'Exist', 1, '2020-05-18 09:21:38', 'test', '2020-05-05', 1, 1, '2020-05-05 07:54:00', '2020-05-05 19:30:00', '07:00:00', '19:00:00', '11:06:00', '07:06:00', '0.90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7.10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, 1, 19, 'ord', 'Exist', 1, '2020-05-18 09:21:42', 'test', '2020-05-06', 1, 1, '2020-05-06 07:30:00', '2020-05-06 18:30:00', '07:00:00', '19:00:00', '11:00:00', '07:30:00', '0.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '03:30:00', '3.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, 1, 19, 'ord', 'Exist', 1, '2020-05-18 09:21:46', 'test', '2020-05-07', 1, 1, '2020-05-07 06:30:00', '2020-05-07 17:30:00', '07:00:00', '19:00:00', '10:30:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '02:30:00', '2.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, 1, 17, 'ord', 'Exist', 1, '2020-05-18 09:21:51', 'test', '2020-05-04', 1, 1, '2020-05-04 07:00:00', '2020-05-04 19:00:00', '07:00:00', '19:00:00', '12:00:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, 1, 17, 'ord', 'Exist', 1, '2020-05-18 09:21:56', 'test', '2020-05-05', 1, 1, '2020-05-05 07:54:00', '2020-05-05 19:30:00', '07:00:00', '19:00:00', '11:06:00', '07:06:00', '0.90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7.10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `empitemdefine`
--

CREATE TABLE `empitemdefine` (
  `ItemName` varchar(100) NOT NULL,
  `ItemType` varchar(20) DEFAULT NULL,
  `Author_id` int(11) NOT NULL,
  `ItemValue` longtext,
  `Published` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `face_template`
--

CREATE TABLE `face_template` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `templateid` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `facetemp` longtext NOT NULL,
  `faceid` smallint(6) NOT NULL,
  `sn` varchar(20) DEFAULT NULL,
  `utime` datetime DEFAULT NULL,
  `valid` smallint(6) NOT NULL,
  `face_ver` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finger_template`
--

CREATE TABLE `finger_template` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `templateid` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `Template` longtext NOT NULL,
  `FingerID` smallint(6) NOT NULL,
  `Valid` smallint(6) NOT NULL,
  `Fpversion` varchar(10) NOT NULL,
  `bio_type` smallint(6) NOT NULL,
  `SN` varchar(20) DEFAULT NULL,
  `UTime` datetime DEFAULT NULL,
  `BITMAPPICTURE` longtext,
  `BITMAPPICTURE2` longtext,
  `BITMAPPICTURE3` longtext,
  `BITMAPPICTURE4` longtext,
  `USETYPE` smallint(6) DEFAULT NULL,
  `Template2` longtext,
  `Template3` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `HolidayID` int(11) NOT NULL,
  `HolidayName` varchar(20) NOT NULL,
  `HolidayYear` smallint(6) DEFAULT NULL,
  `HolidayMonth` smallint(6) DEFAULT NULL,
  `HolidayDay` smallint(6) DEFAULT NULL,
  `StartTime` date NOT NULL,
  `Duration` smallint(6) NOT NULL,
  `IsCycle` smallint(6) NOT NULL,
  `HolidayType` smallint(6) DEFAULT NULL,
  `work_type` smallint(6) NOT NULL,
  `XINBIE` varchar(4) DEFAULT NULL,
  `MINZU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock`
--

CREATE TABLE `iclock` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `sn` varchar(20) DEFAULT NULL,
  `device_type` int(11) NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `trans_times` varchar(50) DEFAULT NULL,
  `TransInterval` int(11) DEFAULT NULL,
  `log_stamp` varchar(20) DEFAULT NULL,
  `oplog_stamp` varchar(20) DEFAULT NULL,
  `photo_stamp` varchar(20) DEFAULT NULL,
  `alias` varchar(20) NOT NULL,
  `UpdateDB` varchar(10) DEFAULT NULL,
  `push_status` varchar(10) DEFAULT NULL,
  `fw_version` varchar(50) DEFAULT NULL,
  `device_name` varchar(30) DEFAULT NULL,
  `photo_func_on` smallint(6) DEFAULT NULL,
  `Fpversion` varchar(10) DEFAULT NULL,
  `fp_count` int(11) DEFAULT NULL,
  `fp_func_on` smallint(6) DEFAULT NULL,
  `face_count` int(11) DEFAULT NULL,
  `face_tmp_count` int(11) DEFAULT NULL,
  `face_ver` varchar(30) DEFAULT NULL,
  `face_func_on` smallint(6) DEFAULT NULL,
  `fv_count` int(11) DEFAULT NULL,
  `fv_ver` varchar(30) DEFAULT NULL,
  `fv_func_on` smallint(6) DEFAULT NULL,
  `pv_count` int(11) DEFAULT NULL,
  `pv_ver` varchar(30) DEFAULT NULL,
  `pv_func_on` smallint(6) DEFAULT NULL,
  `transaction_count` int(11) DEFAULT NULL,
  `user_count` int(11) DEFAULT NULL,
  `main_time` varchar(20) DEFAULT NULL,
  `max_user_count` int(11) DEFAULT NULL,
  `max_finger_count` int(11) DEFAULT NULL,
  `max_attlog_count` int(11) DEFAULT NULL,
  `alg_ver` varchar(30) DEFAULT NULL,
  `flash_size` varchar(10) DEFAULT NULL,
  `free_flash_size` varchar(10) DEFAULT NULL,
  `language` varchar(30) DEFAULT NULL,
  `lng_encode` varchar(10) DEFAULT NULL,
  `volume` varchar(10) DEFAULT NULL,
  `dt_fmt` varchar(10) DEFAULT NULL,
  `is_tft` varchar(5) DEFAULT NULL,
  `platform` varchar(20) DEFAULT NULL,
  `brightness` varchar(5) DEFAULT NULL,
  `oem_vendor` varchar(30) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `AccFun` smallint(6) NOT NULL,
  `TZAdj` smallint(6) DEFAULT NULL,
  `comm_type` smallint(6) NOT NULL,
  `agent_ipaddress` varchar(20) DEFAULT NULL,
  `ipaddress` char(15) DEFAULT NULL,
  `ip_port` int(11) DEFAULT NULL,
  `subnet_mask` char(15) DEFAULT NULL,
  `gateway` char(15) DEFAULT NULL,
  `com_port` smallint(6) DEFAULT NULL,
  `baudrate` smallint(6) DEFAULT NULL,
  `com_address` smallint(6) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `comm_pwd` varchar(32) DEFAULT NULL,
  `acpanel_type` int(11) DEFAULT NULL,
  `sync_time` tinyint(1) NOT NULL,
  `four_to_two` tinyint(1) NOT NULL,
  `video_login` varchar(20) DEFAULT NULL,
  `fp_mthreshold` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `max_comm_size` int(11) DEFAULT NULL,
  `max_comm_count` int(11) DEFAULT NULL,
  `realtime` tinyint(1) NOT NULL,
  `delay` int(11) DEFAULT NULL,
  `encrypt` tinyint(1) NOT NULL,
  `dstime_id` int(11) DEFAULT NULL,
  `is_elevator` int(11) NOT NULL,
  `dining_id` int(11) DEFAULT NULL,
  `consume_model` int(11) DEFAULT NULL,
  `dz_money` decimal(10,2) DEFAULT NULL,
  `time_price` decimal(10,2) DEFAULT NULL,
  `long_time` int(11) DEFAULT NULL,
  `device_use_type` int(11) DEFAULT NULL,
  `cash_model` int(11) DEFAULT NULL,
  `cash_type` int(11) DEFAULT NULL,
  `favorable` int(11) DEFAULT NULL,
  `card_max_money` decimal(5,0) DEFAULT NULL,
  `is_add` tinyint(1) NOT NULL,
  `is_zeor` tinyint(1) NOT NULL,
  `is_OK` tinyint(1) NOT NULL,
  `check_black_list` tinyint(1) NOT NULL,
  `check_white_list` tinyint(1) NOT NULL,
  `is_cons_keap` tinyint(1) NOT NULL,
  `is_check_operate` tinyint(1) NOT NULL,
  `pos_all_log_stamp` varchar(20) DEFAULT NULL,
  `pos_log_stamp` varchar(20) DEFAULT NULL,
  `full_log_stamp` varchar(20) DEFAULT NULL,
  `allow_log_stamp` varchar(20) DEFAULT NULL,
  `table_name_stamp` varchar(20) DEFAULT NULL,
  `only_RFMachine` varchar(5) DEFAULT NULL,
  `pos_log_stamp_id` varchar(20) DEFAULT NULL,
  `full_log_stamp_id` varchar(20) DEFAULT NULL,
  `allow_log_stamp_id` varchar(20) DEFAULT NULL,
  `pos_log_bak_stamp_id` varchar(20) DEFAULT NULL,
  `full_log_bak_stamp_id` varchar(20) DEFAULT NULL,
  `allow_log_bak_stamp_id` varchar(20) DEFAULT NULL,
  `pos_dev_data_status` tinyint(1) NOT NULL,
  `time_zones` varchar(30) DEFAULT NULL,
  `last_check` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iclock`
--

INSERT INTO `iclock` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `sn`, `device_type`, `last_activity`, `trans_times`, `TransInterval`, `log_stamp`, `oplog_stamp`, `photo_stamp`, `alias`, `UpdateDB`, `push_status`, `fw_version`, `device_name`, `photo_func_on`, `Fpversion`, `fp_count`, `fp_func_on`, `face_count`, `face_tmp_count`, `face_ver`, `face_func_on`, `fv_count`, `fv_ver`, `fv_func_on`, `pv_count`, `pv_ver`, `pv_func_on`, `transaction_count`, `user_count`, `main_time`, `max_user_count`, `max_finger_count`, `max_attlog_count`, `alg_ver`, `flash_size`, `free_flash_size`, `language`, `lng_encode`, `volume`, `dt_fmt`, `is_tft`, `platform`, `brightness`, `oem_vendor`, `city`, `AccFun`, `TZAdj`, `comm_type`, `agent_ipaddress`, `ipaddress`, `ip_port`, `subnet_mask`, `gateway`, `com_port`, `baudrate`, `com_address`, `area_id`, `comm_pwd`, `acpanel_type`, `sync_time`, `four_to_two`, `video_login`, `fp_mthreshold`, `enabled`, `max_comm_size`, `max_comm_count`, `realtime`, `delay`, `encrypt`, `dstime_id`, `is_elevator`, `dining_id`, `consume_model`, `dz_money`, `time_price`, `long_time`, `device_use_type`, `cash_model`, `cash_type`, `favorable`, `card_max_money`, `is_add`, `is_zeor`, `is_OK`, `check_black_list`, `check_white_list`, `is_cons_keap`, `is_check_operate`, `pos_all_log_stamp`, `pos_log_stamp`, `full_log_stamp`, `allow_log_stamp`, `table_name_stamp`, `only_RFMachine`, `pos_log_stamp_id`, `full_log_stamp_id`, `allow_log_stamp_id`, `pos_log_bak_stamp_id`, `full_log_bak_stamp_id`, `allow_log_bak_stamp_id`, `pos_dev_data_status`, `time_zones`, `last_check`) VALUES
(1, 'admin', '2019-12-17 18:52:54', NULL, '2019-12-17 11:58:25', NULL, NULL, 1, 'BOCK191760589', 1, '2019-12-17 17:58:39', '00:00;14:05', 1, '9999', '9999', '0', 'Testing Device', '1111101011', '1101000000', 'Ver 8.0.3.7-20181026', 'F22/ID', 0, '10', 1, 1, 0, 0, '', 0, 0, '3', 0, 0, '1', 0, 52, 1, '1970-01-01 00:00:00', NULL, 30, 3, '2.2.14', '100736', '29292', '69', 'gb2312', NULL, '9', '1', 'ZLM60_TFT', '0', ' ZKTeco Inc. ', '', 0, 8, 3, '', '192.168.1.201', 4370, NULL, NULL, NULL, NULL, NULL, 2, '', NULL, 1, 0, '', NULL, 1, 40, 20, 1, 10, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `iclock_announcement`
--

CREATE TABLE `iclock_announcement` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `subject` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `category` smallint(6) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `system_sender` varchar(50) DEFAULT NULL,
  `send_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_appactionlog`
--

CREATE TABLE `iclock_appactionlog` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `user` varchar(20) NOT NULL,
  `client` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `params` longtext,
  `describe` longtext,
  `request_status` smallint(6) NOT NULL,
  `action_time` datetime NOT NULL,
  `remote_ip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_applist`
--

CREATE TABLE `iclock_applist` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `login_time` datetime NOT NULL,
  `last_active` datetime NOT NULL,
  `token` varchar(100) NOT NULL,
  `device_token` longtext NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `client_category` smallint(6) NOT NULL,
  `active` smallint(6) DEFAULT NULL,
  `enable` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_biodata`
--

CREATE TABLE `iclock_biodata` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `bio_id` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `bio_no` smallint(6) NOT NULL,
  `bio_index` smallint(6) NOT NULL,
  `bio_tmp` longtext NOT NULL,
  `bio_type` smallint(6) NOT NULL,
  `bio_format` smallint(6) NOT NULL,
  `major_ver` varchar(10) NOT NULL,
  `minor_ver` varchar(10) DEFAULT NULL,
  `valid` smallint(6) NOT NULL,
  `duress` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iclock_biodata`
--

INSERT INTO `iclock_biodata` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `bio_id`, `pin`, `bio_no`, `bio_index`, `bio_tmp`, `bio_type`, `bio_format`, `major_ver`, `minor_ver`, `valid`, `duress`) VALUES
(NULL, '2019-12-17 14:54:14', NULL, '2019-12-17 14:54:14', NULL, NULL, 0, 1, '000000001', 5, 0, 'TQ9TUzIxAAAETFAECAUHCc7QAAAcTWkBAAAAhPEhmkw7AI0PaQD5AH9DcwBiAHYPAQBmTJIPywCIAFUPk0yOAHwPeQBRAPhDbACeAGYP4wC0TN0PtQCwAEwPP0y9AOAPmgB6AGtDpADJAG4PJADSTBoPfgD0AIAP3Ez5ACcPOADHAUNDjwALATcPkgAKTUUPJQAQAY0PxkwdASsPsADbAStDdQAnATMPmAArTTgPogA5AXYOMUw/AT4PrwD7ATFCzwBAAasPXwBCTa4OtABSAfwNmUxWAbENpQCdAbhCvABcARwOthUTslYbPgYH8fqDxrJGfS//JgZWCktXq/5HCG8Vu4B+Vyv36Zh+gIaJ+SAP7zf6uf5ae9vbUxxmHJoP8AaLM+KbMQD+6Bb0tUzr5HMrsvXCl+vjZBOnAIcV4w22s776oQJKBJoT9burBl4KzvyzDV5eIAJvDDsFFP2Ozqv6TQWmfFP8xbIv/u7yOQrH9b6z3IAlBKKE8wfztB7/3YSB/XiKXjQ/dC6QqfzIAPm5aR+5fP0FEfaNSMh6SA61hKgNDKvsYu5ss0NvVQRsPwECnSPAzQB+Wgg4wEwFAFoZCLI2CQB3HQ8EL8QgBgBHKf3/B/xWSwFDMvr+TwUEBCk4gIwMAG35BlFj/sBZBgCi+RPEsm4GAGU+dAV1CkzBYJPAeIKjkQNMbGJ0wMPAvBQEUIPXMcD+LzvA+RD/TA8AyYRSh4iNwMLAgxMA5oXadC/A/0DAwIb+CkzGiZPC/4sGdXxJAc+LFsEzzQCXwILEaXcKAF6QDbJLVf8OAHFZ+jlnVVQPAGmdrHDGjsD/W3UEAB+fEyQKAGyiZ3hGUxNM/qOeb/6EtMLGs8Vmgv8WADenk4zC/nHAwcMEwY+NwcTC/v8VxbKowIPCg4t4aqgUBP2wiYLCg8KsasUlCQC5shNKBU4ATCW0STQbADu+mI3ATm6Gg8EEwcAKwv5yCwCWenTHxMDBwlcPAGfJcOzBwsLBwcAGwWVJAeXYHMBG2wEBkJ3AwHvC/gbCxY3FfIBYwXg6lgNMqOhix8TAmQsE4OsXKGtiD8WA9J///f76/v4F/sWywf/ABACnNEadRwGs8SL+ZoBrA0yr9jDAwf+tHAVD9KDBZ2WJBsKXjXZpwHgKAL/3TcTAaf8IAIA9Q8XNxf4HANn650NQRBE4BUl0/lMRFMIGw//8+vs+wPmz/sDBwMBKwBCIQzzCfgQQkco0aFAQDw2pfsE6wcXPwMTCw8CJBGZ6jQYQVxFGeKoFFG0SScBXBxDiFEIVVRsRDxurB2bFKsPAxMSNcQSDxDgHEMMgKcCjBhTjIDTBgwYQcSEvs8JcBhB0KvHBxCQEEFoyPcKgBRQTMzdcExCk8Ldss/r6+Pz+/gXAxIzAwP8WEQvwrX8w/sLCwsXEAcPFjcHDwsAEEHZBNO4CEK1CQP6XQgRHQgEAAAtFlwA=', 1, 0, '10', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `iclock_deviceoplog`
--

CREATE TABLE `iclock_deviceoplog` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `sn` varchar(50) NOT NULL,
  `tz` smallint(6) NOT NULL,
  `device_admin` int(11) NOT NULL,
  `device_admin_id` varchar(50) NOT NULL,
  `operation` smallint(6) DEFAULT NULL,
  `operation_time` datetime NOT NULL,
  `object` varchar(50) DEFAULT NULL,
  `param1` int(11) DEFAULT NULL,
  `param2` int(11) DEFAULT NULL,
  `param3` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iclock_deviceoplog`
--

INSERT INTO `iclock_deviceoplog` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `sn`, `tz`, `device_admin`, `device_admin_id`, `operation`, `operation_time`, `object`, `param1`, `param2`, `param3`, `update_time`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'BOCK191760589', 8, 0, '0', 3, '2019-12-17 12:01:54', '55', 0, 0, 0, '2019-12-17 14:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `iclock_devicetransaction`
--

CREATE TABLE `iclock_devicetransaction` (
  `id` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `punch_time` datetime NOT NULL,
  `punch_type` varchar(5) NOT NULL,
  `verify_type` int(11) NOT NULL,
  `work_code` varchar(20) DEFAULT NULL,
  `dev_sn` varchar(40) DEFAULT NULL,
  `dev_alias` varchar(200) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `area_alias` varchar(200) DEFAULT NULL,
  `reserved` varchar(20) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `location` longtext,
  `app_client` varchar(50) DEFAULT NULL,
  `data_from` smallint(6) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `sync_time` datetime DEFAULT NULL,
  `sync_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_dininghall`
--

CREATE TABLE `iclock_dininghall` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iclock_dininghall`
--

INSERT INTO `iclock_dininghall` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `code`, `name`, `remark`) VALUES
(1, NULL, '2019-12-17 11:37:51', NULL, '2019-12-17 11:37:51', NULL, NULL, 0, 1, 'Headquarters', '');

-- --------------------------------------------------------

--
-- Table structure for table `iclock_dstime`
--

CREATE TABLE `iclock_dstime` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `dst_name` varchar(20) NOT NULL,
  `mode` smallint(6) DEFAULT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_notice`
--

CREATE TABLE `iclock_notice` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `context` longtext NOT NULL,
  `starttime` datetime DEFAULT NULL,
  `lasttime` int(11) NOT NULL,
  `DeviceID` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `isset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_notification`
--

CREATE TABLE `iclock_notification` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `system_sender` varchar(50) DEFAULT NULL,
  `category` smallint(6) NOT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `content` longtext,
  `source` int(11) DEFAULT NULL,
  `notification_time` datetime NOT NULL,
  `read_status` smallint(6) NOT NULL,
  `read_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_oplog`
--

CREATE TABLE `iclock_oplog` (
  `id` int(11) NOT NULL,
  `SN` int(11) DEFAULT NULL,
  `admin` int(11) NOT NULL,
  `OP` smallint(6) NOT NULL,
  `OPTime` datetime NOT NULL,
  `Object` int(11) DEFAULT NULL,
  `Param1` int(11) DEFAULT NULL,
  `Param2` int(11) DEFAULT NULL,
  `Param3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_testdata`
--

CREATE TABLE `iclock_testdata` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_testdata_admin_area`
--

CREATE TABLE `iclock_testdata_admin_area` (
  `id` int(11) NOT NULL,
  `testdata_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_testdata_admin_dept`
--

CREATE TABLE `iclock_testdata_admin_dept` (
  `id` int(11) NOT NULL,
  `testdata_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_usbtransaction`
--

CREATE TABLE `iclock_usbtransaction` (
  `id` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `punch_time` datetime NOT NULL,
  `punch_type` varchar(5) NOT NULL,
  `verify_type` int(11) NOT NULL,
  `work_code` varchar(20) DEFAULT NULL,
  `dev_sn` varchar(40) DEFAULT NULL,
  `dev_alias` varchar(200) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `area_alias` varchar(200) DEFAULT NULL,
  `data_from` smallint(6) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `sync_time` datetime DEFAULT NULL,
  `sync_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_workcode`
--

CREATE TABLE `iclock_workcode` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `workcode_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iclock_workcode_devices`
--

CREATE TABLE `iclock_workcode_devices` (
  `id` int(11) NOT NULL,
  `workcode_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaveclass`
--

CREATE TABLE `leaveclass` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `LeaveID` int(11) NOT NULL,
  `LeaveName` varchar(30) NOT NULL,
  `MinUnit` double NOT NULL,
  `Unit` smallint(6) NOT NULL,
  `RemaindProc` smallint(6) NOT NULL,
  `RemaindCount` smallint(6) NOT NULL,
  `ReportSymbol` varchar(4) NOT NULL,
  `Deduct` double DEFAULT NULL,
  `Color` int(11) NOT NULL,
  `Classify` smallint(6) NOT NULL,
  `clearance` smallint(6) NOT NULL,
  `LeaveType` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveclass`
--

INSERT INTO `leaveclass` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `LeaveID`, `LeaveName`, `MinUnit`, `Unit`, `RemaindProc`, `RemaindCount`, `ReportSymbol`, `Deduct`, `Color`, `Classify`, `clearance`, `LeaveType`) VALUES
(NULL, '2019-12-17 11:38:31', NULL, '2019-12-17 11:38:31', NULL, NULL, 0, 1, 'Sick Leave', 1, 1, 1, 1, 'B', 0, 3398744, 0, 0, 1),
(NULL, '2019-12-17 11:38:31', NULL, '2019-12-17 11:38:31', NULL, NULL, 0, 2, 'Casual Leave', 0.5, 1, 1, 1, 'G', 0, 16715535, 0, 0, 2),
(NULL, '2019-12-17 11:38:31', NULL, '2019-12-17 11:38:31', NULL, NULL, 0, 3, 'Maternity Leave', 0.5, 1, 1, 1, 'C', 0, 16715535, 0, 0, 3),
(NULL, '2019-12-17 11:38:31', NULL, '2019-12-17 11:38:31', NULL, NULL, 0, 4, 'Compassionate Leave', 1, 1, 1, 1, 'T', 0, 16744576, 0, 0, 4),
(NULL, '2019-12-17 11:38:33', NULL, '2019-12-17 11:38:33', NULL, NULL, 0, 5, 'Annual Leave', 1, 1, 1, 1, 'S', 0, 8421631, 0, 0, 5),
(NULL, '2019-12-17 11:38:33', NULL, '2019-12-17 11:38:33', NULL, NULL, 0, 6, 'Business Trip', 1, 1, 1, 1, 'W', 0, 16715535, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `leaveclass1`
--

CREATE TABLE `leaveclass1` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `LeaveID` int(11) NOT NULL,
  `LeaveName` varchar(20) NOT NULL,
  `MinUnit` double NOT NULL,
  `Unit` smallint(6) NOT NULL,
  `RemaindProc` smallint(6) NOT NULL,
  `RemaindCount` smallint(6) NOT NULL,
  `ReportSymbol` varchar(4) NOT NULL,
  `Deduct` double NOT NULL,
  `Color` int(11) NOT NULL,
  `Classify` smallint(6) NOT NULL,
  `LeaveType` smallint(6) NOT NULL,
  `Calc` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveclass1`
--

INSERT INTO `leaveclass1` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `LeaveID`, `LeaveName`, `MinUnit`, `Unit`, `RemaindProc`, `RemaindCount`, `ReportSymbol`, `Deduct`, `Color`, `Classify`, `LeaveType`, `Calc`) VALUES
(NULL, '2019-12-17 11:38:34', NULL, '2019-12-17 11:38:34', NULL, NULL, 0, 1000, 'Expected/Actual', 0.5, 3, 1, 0, ' ', 0, 0, 0, 3, NULL),
(NULL, '2019-12-17 11:38:34', NULL, '2019-12-17 11:38:34', NULL, NULL, 0, 1001, 'Late', 10, 2, 2, 1, '>', 0, 0, 0, 3, 'AttItem(minLater)'),
(NULL, '2019-12-17 11:38:34', NULL, '2019-12-17 11:38:34', NULL, NULL, 0, 1002, 'Early Leave', 10, 2, 2, 1, '<', 0, 0, 0, 3, 'AttItem(minEarly)'),
(NULL, '2019-12-17 11:38:34', NULL, '2019-12-17 11:38:34', NULL, NULL, 0, 1003, 'Leave', 1, 1, 1, 1, 'V', 0, 0, 0, 3, 'if((AttItem(LeaveType1)>0) and (AttItem(LeaveType1)<999), "AttItem(LeaveTime1), "0)+if((AttItem(LeaveType2)>0) and (AttItem(LeaveType2)<999), "AttItem(LeaveTime2), "0)+if((AttItem(LeaveType3)>0) and (AttItem(LeaveType3)<999), "AttItem(LeaveTime3), "0)+if((AttItem(LeaveType4)>0) and (AttItem(LeaveType4)<999), "AttItem(LeaveTime4), "0)+if((AttItem(LeaveType5)>0) and (AttItem(LeaveType5)<999), "AttItem(LeaveTime5), "0)'),
(NULL, '2019-12-17 11:38:35', NULL, '2019-12-17 11:38:35', NULL, NULL, 0, 1004, 'Absent', 0.5, 3, 1, 0, 'A', 0, 0, 0, 3, 'AttItem(MinAbsent)'),
(NULL, '2019-12-17 11:38:35', NULL, '2019-12-17 11:38:35', NULL, NULL, 0, 1005, 'Overtime', 1, 1, 1, 1, '+', 0, 0, 0, 3, 'AttItem(MinOverTime)'),
(NULL, '2019-12-17 11:38:35', NULL, '2019-12-17 11:38:35', NULL, NULL, 0, 1008, 'No Check-In', 1, 4, 2, 1, '[', 0, 0, 0, 2, 'If(AttItem(CheckIn)": null, "If(AttItem(OnDuty)": null, "0, "if(((AttItem(LeaveStart1)": null) or (AttItem(LeaveStart1)>AttItem(OnDuty))) and AttItem(DutyOn), "1, "0)), "0)'),
(NULL, '2019-12-17 11:38:35', NULL, '2019-12-17 11:38:35', NULL, NULL, 0, 1009, 'No Check-Out', 1, 4, 2, 1, ']', 0, 0, 0, 2, 'If(AttItem(CheckOut)": null, "If(AttItem(OffDuty)": null, "0, "if((AttItem(LeaveEnd1)": null) or (AttItem(LeaveEnd1)<AttItem(OffDuty)), "if((AttItem(LeaveEnd2)": null) or (AttItem(LeaveEnd2)<AttItem(OffDuty)), "if(((AttItem(LeaveEnd3)": null) or (AttItem(LeaveEnd3)<AttItem(OffDuty))) and AttItem(DutyOff), "1, "0), "0), "0)), "0)');

-- --------------------------------------------------------

--
-- Table structure for table `num_run`
--

CREATE TABLE `num_run` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `Num_runID` int(11) NOT NULL,
  `OLDID` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Units` smallint(6) NOT NULL,
  `Cyle` smallint(6) NOT NULL,
  `work_weekend` tinyint(1) NOT NULL,
  `work_type` smallint(6) NOT NULL,
  `work_day_off` tinyint(1) NOT NULL,
  `day_off_type` smallint(6) NOT NULL,
  `auto_shift` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `num_run_deil`
--

CREATE TABLE `num_run_deil` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `Num_runID` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time DEFAULT NULL,
  `Sdays` smallint(6) NOT NULL,
  `Edays` smallint(6) DEFAULT NULL,
  `SchclassID` int(11) DEFAULT NULL,
  `OverTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operatecmds`
--

CREATE TABLE `operatecmds` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `Author_id` int(11) DEFAULT NULL,
  `CmdContent` longtext NOT NULL,
  `CmdCommitTime` datetime NOT NULL,
  `commit_time` datetime DEFAULT NULL,
  `CmdReturn` int(11) DEFAULT NULL,
  `process_count` smallint(6) NOT NULL,
  `success_flag` smallint(6) NOT NULL,
  `receive_data` longtext,
  `cmm_type` smallint(6) NOT NULL,
  `cmm_system` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_allowance`
--

CREATE TABLE `payroll_allowance` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `allowance_type_id` int(11) NOT NULL,
  `model` smallint(6) DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `issue_date` datetime NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_allowancetype`
--

CREATE TABLE `payroll_allowancetype` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `code` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_cashadvance`
--

CREATE TABLE `payroll_cashadvance` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `issue_date` datetime NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_currency`
--

CREATE TABLE `payroll_currency` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `currency` varchar(20) NOT NULL,
  `is_basic` tinyint(1) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_currency`
--

INSERT INTO `payroll_currency` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `currency`, `is_basic`, `remarks`) VALUES
(1, NULL, '2019-12-17 11:38:43', NULL, '2019-12-17 11:38:43', NULL, NULL, 0, 'AED', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_deduction`
--

CREATE TABLE `payroll_deduction` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `deduction_type_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `issue_date` datetime NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_deductiontype`
--

CREATE TABLE `payroll_deductiontype` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `code` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_exceptionformula`
--

CREATE TABLE `payroll_exceptionformula` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `exception_type` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `calculate_type` int(11) NOT NULL,
  `formula` varchar(100) DEFAULT NULL,
  `fixed_amount` decimal(8,2) DEFAULT NULL,
  `fixed_unit` int(11) DEFAULT NULL,
  `is_basic` tinyint(1) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_expense`
--

CREATE TABLE `payroll_expense` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `issue_date` datetime NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_formulasign`
--

CREATE TABLE `payroll_formulasign` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `db_key` varchar(20) NOT NULL,
  `sys_code` varchar(20) NOT NULL,
  `sys_name` varchar(30) NOT NULL,
  `sign` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll_formulasign`
--

INSERT INTO `payroll_formulasign` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `db_key`, `sys_code`, `sys_name`, `sign`) VALUES
(1, NULL, '2019-12-17 11:38:46', NULL, '2019-12-17 11:38:46', NULL, NULL, 0, 'b_s', 'basic_salary', 'Basic Salary', 'BS'),
(2, NULL, '2019-12-17 11:38:46', NULL, '2019-12-17 11:38:46', NULL, NULL, 0, 'w_d', 'workdays', 'Workdays', 'WD'),
(3, NULL, '2019-12-17 11:38:47', NULL, '2019-12-17 11:38:47', NULL, NULL, 0, 'w_h', 'work_hours', 'Work Hours', 'WH'),
(4, NULL, '2019-12-17 11:38:47', NULL, '2019-12-17 11:38:47', NULL, NULL, 0, 'ot_h', 'ot_hours', 'OT Hours', 'OTH'),
(5, NULL, '2019-12-17 11:38:47', NULL, '2019-12-17 11:38:47', NULL, NULL, 0, 'd_s', 'daily_salary', 'Daily Salary', 'DS');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_increment`
--

CREATE TABLE `payroll_increment` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `issue_date` date NOT NULL,
  `updated` tinyint(1) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_leaveformula`
--

CREATE TABLE `payroll_leaveformula` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `calculate_type` int(11) NOT NULL,
  `formula` varchar(100) DEFAULT NULL,
  `fixed_amount` decimal(8,2) DEFAULT NULL,
  `fixed_unit` int(11) DEFAULT NULL,
  `is_basic` tinyint(1) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_otformula`
--

CREATE TABLE `payroll_otformula` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `overtime_type` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `calculate_type` int(11) NOT NULL,
  `formula` varchar(100) DEFAULT NULL,
  `fixed_amount` decimal(8,2) DEFAULT NULL,
  `fixed_unit` int(11) DEFAULT NULL,
  `is_basic` tinyint(1) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_payrollcredit`
--

CREATE TABLE `payroll_payrollcredit` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pin` varchar(30) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `basic_salary` decimal(8,2) NOT NULL,
  `att_date` datetime NOT NULL,
  `normal_ot` int(11) NOT NULL,
  `not_formula_id` int(11) NOT NULL,
  `normal_ot_amount` decimal(8,2) NOT NULL,
  `weekend_ot` int(11) NOT NULL,
  `wot_formula_id` int(11) NOT NULL,
  `weekend_ot_amount` decimal(8,2) NOT NULL,
  `holiday_ot` int(11) NOT NULL,
  `hot_formula_id` int(11) NOT NULL,
  `holiday_ot_amount` decimal(8,2) NOT NULL,
  `late` int(11) NOT NULL,
  `late_formula_id` int(11) NOT NULL,
  `late_amount` decimal(8,2) NOT NULL,
  `early_leave` int(11) NOT NULL,
  `early_leave_formula_id` int(11) NOT NULL,
  `early_leave_amount` decimal(8,2) NOT NULL,
  `absent` int(11) NOT NULL,
  `absent_formula_id` int(11) NOT NULL,
  `absent_amount` decimal(8,2) NOT NULL,
  `leave_credits` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_payrollleavecredit`
--

CREATE TABLE `payroll_payrollleavecredit` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `att_date` datetime DEFAULT NULL,
  `leave_type` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `total_time` int(11) DEFAULT NULL,
  `total_hrs` decimal(8,2) DEFAULT NULL,
  `total_days` decimal(8,2) DEFAULT NULL,
  `formula_id` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `remarks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary`
--

CREATE TABLE `payroll_salary` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_account` varchar(30) DEFAULT NULL,
  `basic_salary` decimal(8,2) DEFAULT NULL,
  `pay_currency_id` int(11) NOT NULL,
  `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salarychange`
--

CREATE TABLE `payroll_salarychange` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `pin` varchar(30) NOT NULL,
  `old_salary` decimal(8,2) DEFAULT NULL,
  `new_salary` decimal(8,2) DEFAULT NULL,
  `issue_date` date NOT NULL,
  `remarks` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary_exception_formula`
--

CREATE TABLE `payroll_salary_exception_formula` (
  `id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `exceptionformula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary_leave_formula`
--

CREATE TABLE `payroll_salary_leave_formula` (
  `id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `leaveformula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_salary_ot_formula`
--

CREATE TABLE `payroll_salary_ot_formula` (
  `id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `otformula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_area`
--

CREATE TABLE `personnel_area` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `areaid` varchar(20) NOT NULL,
  `areaname` varchar(30) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `remark` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel_area`
--

INSERT INTO `personnel_area` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `id`, `areaid`, `areaname`, `parent_id`, `remark`) VALUES
(NULL, '2019-12-17 11:37:41', NULL, '2019-12-17 11:37:41', NULL, NULL, 0, 1, '1', 'Area Name', NULL, NULL),
(NULL, '2019-12-17 14:51:18', 'admin', '2019-12-17 14:51:18', NULL, NULL, 0, 2, '2', '1701 Antel Global', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_cities`
--

CREATE TABLE `personnel_cities` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `city_code` varchar(20) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_countries`
--

CREATE TABLE `personnel_countries` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_departmentapprove`
--

CREATE TABLE `personnel_departmentapprove` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `approve_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_departmentapprover`
--

CREATE TABLE `personnel_departmentapprover` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `approve_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `approve_level` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_departmentnotify`
--

CREATE TABLE `personnel_departmentnotify` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `approve_id` int(11) NOT NULL,
  `notify_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_document`
--

CREATE TABLE `personnel_document` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `doc_code` varchar(20) NOT NULL,
  `doc_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_documentdetail`
--

CREATE TABLE `personnel_documentdetail` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `emp_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_email` smallint(6) NOT NULL,
  `early_days` int(11) NOT NULL,
  `has_send` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_education`
--

CREATE TABLE `personnel_education` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_empchange`
--

CREATE TABLE `personnel_empchange` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `changeno` int(11) NOT NULL,
  `UserID_id` int(11) NOT NULL,
  `changedate` datetime DEFAULT NULL,
  `changepostion` int(11) DEFAULT NULL,
  `oldvalue` longtext,
  `newvalue` longtext,
  `changereason` varchar(200) DEFAULT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `approvalstatus` int(11) NOT NULL,
  `remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_employeeoption`
--

CREATE TABLE `personnel_employeeoption` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `option_id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_iccard`
--

CREATE TABLE `personnel_iccard` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `discount` smallint(6) NOT NULL,
  `pos_time` varchar(10) NOT NULL,
  `date_max_money` decimal(8,0) NOT NULL,
  `date_max_count` int(11) NOT NULL,
  `per_max_money` decimal(8,0) NOT NULL,
  `meal_max_money` decimal(8,0) NOT NULL,
  `meal_max_count` int(11) NOT NULL,
  `less_money` decimal(8,0) NOT NULL,
  `max_money` decimal(8,0) NOT NULL,
  `use_date` smallint(6) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `use_fingerprint` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel_iccard`
--

INSERT INTO `personnel_iccard` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `code`, `name`, `discount`, `pos_time`, `date_max_money`, `date_max_count`, `per_max_money`, `meal_max_money`, `meal_max_count`, `less_money`, `max_money`, `use_date`, `remark`, `use_fingerprint`) VALUES
(1, NULL, '2019-12-17 11:38:00', NULL, '2019-12-17 11:38:00', NULL, NULL, 0, 1, 'Personnel Card', 0, '1', '0', 0, '0', '0', 0, '0', '0', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_iccard_posmeal`
--

CREATE TABLE `personnel_iccard_posmeal` (
  `id` int(11) NOT NULL,
  `iccard_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_iccard_use_mechine`
--

CREATE TABLE `personnel_iccard_use_mechine` (
  `id` int(11) NOT NULL,
  `iccard_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_issuecard`
--

CREATE TABLE `personnel_issuecard` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `UserID_id` int(11) DEFAULT NULL,
  `cardno` varchar(20) NOT NULL,
  `effectivenessdate` date DEFAULT NULL,
  `isvalid` tinyint(1) NOT NULL,
  `cardpwd` varchar(20) DEFAULT NULL,
  `failuredate` datetime DEFAULT NULL,
  `cardstatus` varchar(3) NOT NULL,
  `issuedate` date DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `blance` decimal(9,2) DEFAULT NULL,
  `mng_cost` decimal(8,2) DEFAULT NULL,
  `card_cost` decimal(8,2) DEFAULT NULL,
  `Password` varchar(6) DEFAULT NULL,
  `card_privage` varchar(20) DEFAULT NULL,
  `date_money` decimal(10,2) DEFAULT NULL,
  `date_count` int(11) DEFAULT NULL,
  `meal_money` decimal(10,2) DEFAULT NULL,
  `meal_count` int(11) DEFAULT NULL,
  `pos_date` date DEFAULT NULL,
  `pos_time` datetime DEFAULT NULL,
  `meal_type` smallint(6) DEFAULT NULL,
  `sys_card_no` int(11) DEFAULT NULL,
  `card_serial_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_leavelog`
--

CREATE TABLE `personnel_leavelog` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `UserID_id` int(11) NOT NULL,
  `leavedate` date NOT NULL,
  `leavetype` int(11) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `isReturnTools` tinyint(1) NOT NULL,
  `isReturnClothes` tinyint(1) NOT NULL,
  `isReturnCard` tinyint(1) NOT NULL,
  `isClassAtt` tinyint(1) NOT NULL,
  `isClassAccess` tinyint(1) NOT NULL,
  `is_close_pos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_meal`
--

CREATE TABLE `personnel_meal` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `available` int(11) NOT NULL,
  `money` decimal(8,2) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel_meal`
--

INSERT INTO `personnel_meal` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `code`, `name`, `available`, `money`, `starttime`, `endtime`, `remark`) VALUES
(1, NULL, '2019-12-17 11:38:03', NULL, '2019-12-17 11:38:03', NULL, NULL, 0, '1', 'Breakfast', 1, '2.00', '00:00:00', '10:00:59', ''),
(2, NULL, '2019-12-17 11:38:04', NULL, '2019-12-17 11:38:04', NULL, NULL, 0, '2', 'Lunch', 1, '3.00', '10:01:00', '14:00:59', ''),
(3, NULL, '2019-12-17 11:38:04', NULL, '2019-12-17 11:38:04', NULL, NULL, 0, '3', 'Dinner', 1, '4.00', '14:01:00', '20:00:59', ''),
(4, NULL, '2019-12-17 11:38:05', NULL, '2019-12-17 11:38:05', NULL, NULL, 0, '4', 'Supper', 1, '2.00', '20:01:00', '23:59:59', ''),
(5, NULL, '2019-12-17 11:38:05', NULL, '2019-12-17 11:38:05', NULL, NULL, 0, '5', 'Meal 05', 0, '2.00', '00:00:00', '00:00:00', ''),
(6, NULL, '2019-12-17 11:38:05', NULL, '2019-12-17 11:38:05', NULL, NULL, 0, '6', 'Meal 06', 0, '2.00', '00:00:00', '00:00:00', ''),
(7, NULL, '2019-12-17 11:38:05', NULL, '2019-12-17 11:38:05', NULL, NULL, 0, '7', 'Meal 07', 0, '2.00', '00:00:00', '00:00:00', ''),
(8, NULL, '2019-12-17 11:38:06', NULL, '2019-12-17 11:38:06', NULL, NULL, 0, '8', 'Meal 08', 0, '2.00', '00:00:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `personnel_national`
--

CREATE TABLE `personnel_national` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_positions`
--

CREATE TABLE `personnel_positions` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personnel_state`
--

CREATE TABLE `personnel_state` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_code` varchar(20) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schclass`
--

CREATE TABLE `schclass` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `SchclassID` int(11) NOT NULL,
  `SchName` varchar(20) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `LateMinutes` int(11) DEFAULT NULL,
  `EarlyMinutes` int(11) DEFAULT NULL,
  `CheckIn` smallint(6) NOT NULL,
  `CheckOut` smallint(6) NOT NULL,
  `CheckInTime1` time NOT NULL,
  `CheckInTime2` time NOT NULL,
  `CheckOutTime1` time NOT NULL,
  `CheckOutTime2` time NOT NULL,
  `Color` int(11) NOT NULL,
  `AutoBind` smallint(6) DEFAULT NULL,
  `WorkDay` double DEFAULT NULL,
  `IsCalcRest` int(11) DEFAULT NULL,
  `StartRestTime` time DEFAULT NULL,
  `EndRestTime` time DEFAULT NULL,
  `StartRestTime1` time DEFAULT NULL,
  `EndRestTime1` time DEFAULT NULL,
  `shiftworktime` int(11) NOT NULL,
  `IsOverTime` smallint(6) NOT NULL,
  `OverTime` int(11) DEFAULT NULL,
  `timetable_type` smallint(6) NOT NULL,
  `IsCheckInOverTime` smallint(6) NOT NULL,
  `CheckInOverTime` int(11) DEFAULT NULL,
  `change_at` time NOT NULL,
  `only_first_last` smallint(6) NOT NULL,
  `is_support_cross` smallint(6) NOT NULL,
  `cross_days` int(11) DEFAULT NULL,
  `is_ot_ft` smallint(6) NOT NULL,
  `min_ot_time` int(11) DEFAULT NULL,
  `is_day_off` smallint(6) NOT NULL,
  `func_key` smallint(6) NOT NULL,
  `punch_period_mode` smallint(6) NOT NULL,
  `punch_period` int(11) NOT NULL,
  `work_time_type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schclass_break_times`
--

CREATE TABLE `schclass_break_times` (
  `id` int(11) NOT NULL,
  `schclass_id` int(11) NOT NULL,
  `breaktime_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setuseratt`
--

CREATE TABLE `setuseratt` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `UserID_id` int(11) DEFAULT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `atttype` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sync_area`
--

CREATE TABLE `sync_area` (
  `id` int(11) NOT NULL,
  `area_code` varchar(20) NOT NULL,
  `area_name` varchar(30) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `flag` smallint(6) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `sync_ret` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sync_department`
--

CREATE TABLE `sync_department` (
  `id` int(11) NOT NULL,
  `dept_code` varchar(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `flag` smallint(6) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `sync_ret` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sync_employee`
--

CREATE TABLE `sync_employee` (
  `id` int(11) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `first_name` varchar(24) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `dept_code` varchar(20) DEFAULT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `job_code` varchar(20) DEFAULT NULL,
  `job_name` varchar(50) DEFAULT NULL,
  `area_code` varchar(20) DEFAULT NULL,
  `area_name` varchar(30) DEFAULT NULL,
  `card_no` varchar(20) DEFAULT NULL,
  `multi_area` tinyint(1) NOT NULL,
  `employment_date` date DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `flag` smallint(6) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `sync_ret` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sync_job`
--

CREATE TABLE `sync_job` (
  `id` int(11) NOT NULL,
  `job_code` varchar(20) NOT NULL,
  `job_name` varchar(50) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `flag` smallint(6) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `sync_ret` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `badgenumber` varchar(20) NOT NULL,
  `defaultdeptid` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `name` varchar(24) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `arabic_name` varchar(100) DEFAULT NULL,
  `Password` varchar(16) DEFAULT NULL,
  `Privilege` int(11) DEFAULT NULL,
  `apply_group` int(11) DEFAULT NULL,
  `AccGroup` int(11) DEFAULT NULL,
  `TimeZones` varchar(20) DEFAULT NULL,
  `Gender` varchar(2) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `zip` varchar(6) DEFAULT NULL,
  `ophone` varchar(20) DEFAULT NULL,
  `FPHONE` varchar(20) DEFAULT NULL,
  `pager` varchar(20) DEFAULT NULL,
  `SSN` varchar(20) DEFAULT NULL,
  `identitycard` varchar(20) DEFAULT NULL,
  `UTime` datetime DEFAULT NULL,
  `Hiredday` date DEFAULT NULL,
  `VERIFICATIONMETHOD` smallint(6) DEFAULT NULL,
  `SECURITYFLAGS` smallint(6) DEFAULT NULL,
  `ATT` tinyint(1) NOT NULL,
  `OverTime` tinyint(1) NOT NULL,
  `Holiday` tinyint(1) NOT NULL,
  `INLATE` smallint(6) DEFAULT NULL,
  `OutEarly` smallint(6) DEFAULT NULL,
  `Lunchduration` smallint(6) DEFAULT NULL,
  `MVerifyPass` varchar(6) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `SEP` smallint(6) DEFAULT NULL,
  `OffDuty` smallint(6) NOT NULL,
  `DelTag` smallint(6) NOT NULL,
  `AutoSchPlan` smallint(6) DEFAULT NULL,
  `MinAutoSchInterval` int(11) DEFAULT NULL,
  `RegisterOT` int(11) DEFAULT NULL,
  `morecard_group_id` int(11) DEFAULT NULL,
  `set_valid_time` tinyint(1) NOT NULL,
  `acc_startdate` date DEFAULT NULL,
  `acc_enddate` date DEFAULT NULL,
  `acc_super_auth` smallint(6) DEFAULT NULL,
  `birthplace` varchar(20) DEFAULT NULL,
  `Political` varchar(20) DEFAULT NULL,
  `hiretype` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `firedate` date DEFAULT NULL,
  `isatt` tinyint(1) NOT NULL,
  `homeaddress` varchar(100) DEFAULT NULL,
  `emptype` int(11) DEFAULT NULL,
  `bankcode1` varchar(50) DEFAULT NULL,
  `bankcode2` varchar(50) DEFAULT NULL,
  `isblacklist` int(11) DEFAULT NULL,
  `Iuser1` int(11) DEFAULT NULL,
  `Iuser2` int(11) DEFAULT NULL,
  `Iuser3` int(11) DEFAULT NULL,
  `Iuser4` int(11) DEFAULT NULL,
  `Iuser5` int(11) DEFAULT NULL,
  `Cuser1` varchar(100) DEFAULT NULL,
  `Cuser2` varchar(100) DEFAULT NULL,
  `Cuser3` varchar(20) DEFAULT NULL,
  `Cuser4` varchar(20) DEFAULT NULL,
  `Cuser5` varchar(20) DEFAULT NULL,
  `Duser1` date DEFAULT NULL,
  `Duser2` date DEFAULT NULL,
  `Duser3` date DEFAULT NULL,
  `Duser4` date DEFAULT NULL,
  `Duser5` date DEFAULT NULL,
  `selfpassword` varchar(20) DEFAULT NULL,
  `is_visitor` tinyint(1) NOT NULL,
  `person_id` varchar(20) DEFAULT NULL,
  `agent_id` varchar(20) DEFAULT NULL,
  `record_type` smallint(6) DEFAULT NULL,
  `account_number` varchar(30) DEFAULT NULL,
  `app_status` smallint(6) DEFAULT NULL,
  `app_role` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `userid`, `badgenumber`, `defaultdeptid`, `country_id`, `state_id`, `city_id`, `position_id`, `education_id`, `national_id`, `name`, `lastname`, `nickname`, `arabic_name`, `Password`, `Privilege`, `apply_group`, `AccGroup`, `TimeZones`, `Gender`, `Birthday`, `street`, `zip`, `ophone`, `FPHONE`, `pager`, `SSN`, `identitycard`, `UTime`, `Hiredday`, `VERIFICATIONMETHOD`, `SECURITYFLAGS`, `ATT`, `OverTime`, `Holiday`, `INLATE`, `OutEarly`, `Lunchduration`, `MVerifyPass`, `photo`, `SEP`, `OffDuty`, `DelTag`, `AutoSchPlan`, `MinAutoSchInterval`, `RegisterOT`, `morecard_group_id`, `set_valid_time`, `acc_startdate`, `acc_enddate`, `acc_super_auth`, `birthplace`, `Political`, `hiretype`, `email`, `firedate`, `isatt`, `homeaddress`, `emptype`, `bankcode1`, `bankcode2`, `isblacklist`, `Iuser1`, `Iuser2`, `Iuser3`, `Iuser4`, `Iuser5`, `Cuser1`, `Cuser2`, `Cuser3`, `Cuser4`, `Cuser5`, `Duser1`, `Duser2`, `Duser3`, `Duser4`, `Duser5`, `selfpassword`, `is_visitor`, `person_id`, `agent_id`, `record_type`, `account_number`, `app_status`, `app_role`) VALUES
(NULL, '2019-12-17 14:54:14', NULL, '2019-12-17 14:54:14', NULL, NULL, 0, 1, '000000001', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Administrator', NULL, NULL, NULL, 'EFHFGFBFAFDF', 0, 1, 1, '0001000000000000', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, '', NULL, '2019-12-17', -1, NULL, 1, 1, 1, 0, 0, 1, NULL, '', 1, 0, 0, 1, 24, 1, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123456', 0, NULL, NULL, 1, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo_attarea`
--

CREATE TABLE `userinfo_attarea` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo_attarea`
--

INSERT INTO `userinfo_attarea` (`id`, `employee_id`, `area_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `useruusedsclasses`
--

CREATE TABLE `useruusedsclasses` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SchId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_of_run`
--

CREATE TABLE `user_of_run` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `NUM_OF_RUN_ID` int(11) NOT NULL,
  `ISNOTOF_RUN` int(11) DEFAULT NULL,
  `ORDER_RUN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_speday`
--

CREATE TABLE `user_speday` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `StartSpecDay` datetime NOT NULL,
  `EndSpecDay` datetime DEFAULT NULL,
  `DateID` int(11) NOT NULL,
  `YUANYING` varchar(100) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `audit_status` smallint(6) DEFAULT NULL,
  `audit_reason` varchar(100) DEFAULT NULL,
  `State` varchar(2) DEFAULT NULL,
  `audit_user_id` int(11) DEFAULT NULL,
  `approve_level` smallint(6) DEFAULT NULL,
  `approver` longtext,
  `data_from` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_temp_sch`
--

CREATE TABLE `user_temp_sch` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `ComeTime` datetime NOT NULL,
  `LeaveTime` datetime NOT NULL,
  `OverTime` int(11) NOT NULL,
  `Type` smallint(6) DEFAULT NULL,
  `Flag` smallint(6) DEFAULT NULL,
  `SchClassID` int(11) DEFAULT NULL,
  `WorkType` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worktable_groupmsg`
--

CREATE TABLE `worktable_groupmsg` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `msgtype_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worktable_instantmsg`
--

CREATE TABLE `worktable_instantmsg` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `monitor last time` datetime DEFAULT NULL,
  `msgtype_id` int(11) NOT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worktable_msgtype`
--

CREATE TABLE `worktable_msgtype` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `msgtype_name` varchar(50) NOT NULL,
  `msgtype_value` varchar(20) NOT NULL,
  `msg_keep_time` int(11) NOT NULL,
  `msg_ahead_remind` int(11) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worktable_msgtype`
--

INSERT INTO `worktable_msgtype` (`id`, `change_operator`, `change_time`, `create_operator`, `create_time`, `delete_operator`, `delete_time`, `status`, `msgtype_name`, `msgtype_value`, `msg_keep_time`, `msg_ahead_remind`, `type`) VALUES
(1, NULL, '2019-12-17 11:38:12', NULL, '2019-12-17 11:38:12', NULL, NULL, 0, 'System', '9', 1, 0, '-1'),
(2, NULL, '2019-12-17 11:38:13', NULL, '2019-12-17 11:38:13', NULL, NULL, 0, 'Attendance', '8', 1, 0, '-1'),
(4, NULL, '2019-12-17 11:38:14', NULL, '2019-12-17 11:38:14', NULL, NULL, 0, 'Personnel', '6', 1, 0, '-1');

-- --------------------------------------------------------

--
-- Table structure for table `worktable_usrmsg`
--

CREATE TABLE `worktable_usrmsg` (
  `id` int(11) NOT NULL,
  `change_operator` varchar(30) DEFAULT NULL,
  `change_time` datetime DEFAULT NULL,
  `create_operator` varchar(30) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `delete_operator` varchar(30) DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `msg_id` int(11) DEFAULT NULL,
  `readtype` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_acaccesslevel`
--
ALTER TABLE `access_acaccesslevel`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `access_acaccesslevel_ac_tz_id` (`ac_tz_id`);

--
-- Indexes for table `access_acaccesslevel_doors`
--
ALTER TABLE `access_acaccesslevel_doors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acaccesslevel_id` (`acaccesslevel_id`,`acdoor_id`),
  ADD KEY `access_acaccesslevel_doors_acaccesslevel_id` (`acaccesslevel_id`),
  ADD KEY `access_acaccesslevel_doors_acdoor_id` (`acdoor_id`);

--
-- Indexes for table `access_acaccesslevel_employees`
--
ALTER TABLE `access_acaccesslevel_employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acaccesslevel_id` (`acaccesslevel_id`,`employee_id`),
  ADD KEY `access_acaccesslevel_employees_acaccesslevel_id` (`acaccesslevel_id`),
  ADD KEY `access_acaccesslevel_employees_employee_id` (`employee_id`);

--
-- Indexes for table `access_acantipassback`
--
ALTER TABLE `access_acantipassback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_acantipassback_door_id` (`door_id`);

--
-- Indexes for table `access_accombgroup`
--
ALTER TABLE `access_accombgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_accombgroup_comb_id` (`comb_id`),
  ADD KEY `access_accombgroup_group_id` (`group_id`);

--
-- Indexes for table `access_acdoor`
--
ALTER TABLE `access_acdoor`
  ADD PRIMARY KEY (`door_id`),
  ADD KEY `access_acdoor_device_id` (`device_id`),
  ADD KEY `access_acdoor_no_tz_id` (`no_tz_id`),
  ADD KEY `access_acdoor_nc_tz_id` (`nc_tz_id`);

--
-- Indexes for table `access_acgroup`
--
ALTER TABLE `access_acgroup`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `access_acgroup_tzs_id` (`tzs_id`);

--
-- Indexes for table `access_acholidays`
--
ALTER TABLE `access_acholidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_acholidays_tz_id` (`tz_id`);

--
-- Indexes for table `access_actimezone`
--
ALTER TABLE `access_actimezone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_actimezone_tzs_id` (`tzs_id`);

--
-- Indexes for table `access_actimezones`
--
ALTER TABLE `access_actimezones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_acunlockcomb`
--
ALTER TABLE `access_acunlockcomb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_acunlockcomb_door_id` (`door_id`);

--
-- Indexes for table `acc_morecardempgroup`
--
ALTER TABLE `acc_morecardempgroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_name` (`group_name`);

--
-- Indexes for table `action_log`
--
ALTER TABLE `action_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_log_user_id` (`user_id`),
  ADD KEY `action_log_content_type_id` (`content_type_id`);

--
-- Indexes for table `areaadmin`
--
ALTER TABLE `areaadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areaadmin_user_id` (`user_id`),
  ADD KEY `areaadmin_area_id` (`area_id`);

--
-- Indexes for table `attcalclog`
--
ALTER TABLE `attcalclog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attexception`
--
ALTER TABLE `attexception`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attexception_UserId` (`UserId`);

--
-- Indexes for table `attparam`
--
ALTER TABLE `attparam`
  ADD PRIMARY KEY (`ParaName`);

--
-- Indexes for table `attrecabnormite`
--
ALTER TABLE `attrecabnormite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`AttDate`,`checktime`,`CheckType`,`NewType`),
  ADD KEY `attrecabnormite_userid` (`userid`);

--
-- Indexes for table `attshifts`
--
ALTER TABLE `attshifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`AttDate`,`SchId`,`StartTime`),
  ADD KEY `attshifts_userid` (`userid`),
  ADD KEY `attshifts_SchId` (`SchId`);

--
-- Indexes for table `att_approvedhistory`
--
ALTER TABLE `att_approvedhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_attreport`
--
ALTER TABLE `att_attreport`
  ADD PRIMARY KEY (`ItemName`),
  ADD KEY `att_attreport_Author_id` (`Author_id`);

--
-- Indexes for table `att_attreportperms`
--
ALTER TABLE `att_attreportperms`
  ADD PRIMARY KEY (`ItemName`);

--
-- Indexes for table `att_autocal_log`
--
ALTER TABLE `att_autocal_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cal_date` (`cal_date`,`cal_type`);

--
-- Indexes for table `att_autoexportlog`
--
ALTER TABLE `att_autoexportlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_breaktime`
--
ALTER TABLE `att_breaktime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_changeschedule`
--
ALTER TABLE `att_changeschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `att_changeschedule_userid` (`userid`),
  ADD KEY `att_changeschedule_timetable_id` (`timetable_id`);

--
-- Indexes for table `att_exportschedule`
--
ALTER TABLE `att_exportschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `att_multipletransaction`
--
ALTER TABLE `att_multipletransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `att_multipletransaction_emp_id` (`emp_id`);

--
-- Indexes for table `att_overtime`
--
ALTER TABLE `att_overtime`
  ADD PRIMARY KEY (`id`),
  ADD KEY `att_overtime_emp_id` (`emp_id`);

--
-- Indexes for table `att_reportoption`
--
ALTER TABLE `att_reportoption`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`report`,`grid_col`);

--
-- Indexes for table `att_rule`
--
ALTER TABLE `att_rule`
  ADD PRIMARY KEY (`RuleID`);

--
-- Indexes for table `att_training`
--
ALTER TABLE `att_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `att_training_userid` (`userid`),
  ADD KEY `att_training_category_id` (`category_id`);

--
-- Indexes for table `att_trainingcategory`
--
ALTER TABLE `att_trainingcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `att_waitforprocessdata`
--
ALTER TABLE `att_waitforprocessdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `att_waitforprocessdata_UserID_id` (`UserID_id`);

--
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_id` (`group_id`,`permission_id`),
  ADD KEY `auth_group_permissions_group_id` (`group_id`),
  ADD KEY `auth_group_permissions_permission_id` (`permission_id`);

--
-- Indexes for table `auth_message`
--
ALTER TABLE `auth_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_message_user_id` (`user_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_type_id` (`content_type_id`,`codename`),
  ADD KEY `auth_permission_content_type_id` (`content_type_id`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`group_id`),
  ADD KEY `auth_user_groups_user_id` (`user_id`),
  ADD KEY `auth_user_groups_group_id` (`group_id`);

--
-- Indexes for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`permission_id`),
  ADD KEY `auth_user_user_permissions_user_id` (`user_id`),
  ADD KEY `auth_user_user_permissions_permission_id` (`permission_id`);

--
-- Indexes for table `base_additiondata`
--
ALTER TABLE `base_additiondata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `base_additiondata_user_id` (`user_id`),
  ADD KEY `base_additiondata_content_type_id` (`content_type_id`);

--
-- Indexes for table `base_appoption`
--
ALTER TABLE `base_appoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_basecode`
--
ALTER TABLE `base_basecode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_companysetting`
--
ALTER TABLE `base_companysetting`
  ADD PRIMARY KEY (`ParaName`);

--
-- Indexes for table `base_datatranslation`
--
ALTER TABLE `base_datatranslation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_type_id` (`content_type_id`,`property`,`language`,`value`),
  ADD KEY `base_datatranslation_content_type_id` (`content_type_id`);

--
-- Indexes for table `base_emailsetting`
--
ALTER TABLE `base_emailsetting`
  ADD PRIMARY KEY (`ParaName`);

--
-- Indexes for table `base_emailtemplate`
--
ALTER TABLE `base_emailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_ftpserver`
--
ALTER TABLE `base_ftpserver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_operatortemplate`
--
ALTER TABLE `base_operatortemplate`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`finger_id`,`fpversion`),
  ADD KEY `base_operatortemplate_user_id` (`user_id`);

--
-- Indexes for table `base_option`
--
ALTER TABLE `base_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_personaloption`
--
ALTER TABLE `base_personaloption`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_id` (`option_id`,`user_id`),
  ADD KEY `base_personaloption_option_id` (`option_id`),
  ADD KEY `base_personaloption_user_id` (`user_id`);

--
-- Indexes for table `base_strresource`
--
ALTER TABLE `base_strresource`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_strtranslation`
--
ALTER TABLE `base_strtranslation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `base_strtranslation_str_id` (`str_id`);

--
-- Indexes for table `base_systemoption`
--
ALTER TABLE `base_systemoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `base_systemoption_option_id` (`option_id`);

--
-- Indexes for table `checkexact`
--
ALTER TABLE `checkexact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkexact_userid` (`userid`);

--
-- Indexes for table `checkinout`
--
ALTER TABLE `checkinout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pin` (`pin`,`checktime`);

--
-- Indexes for table `dbapp_viewmodel`
--
ALTER TABLE `dbapp_viewmodel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbapp_viewmodel_model_id` (`model_id`);

--
-- Indexes for table `dbbackuplog`
--
ALTER TABLE `dbbackuplog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dbbackuplog_user_id` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DeptID`),
  ADD KEY `departments_supdeptid` (`supdeptid`);

--
-- Indexes for table `department_holiday`
--
ALTER TABLE `department_holiday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_holiday_dept_id` (`dept_id`),
  ADD KEY `department_holiday_holiday_id` (`holiday_id`);

--
-- Indexes for table `department_rule`
--
ALTER TABLE `department_rule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_rule_dept_id` (`dept_id`),
  ADD KEY `department_rule_rule_id` (`rule_id`);

--
-- Indexes for table `deptadmin`
--
ALTER TABLE `deptadmin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deptadmin_user_id` (`user_id`),
  ADD KEY `deptadmin_dept_id` (`dept_id`);

--
-- Indexes for table `devcmds`
--
ALTER TABLE `devcmds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devcmds_SN_id` (`SN_id`),
  ADD KEY `devcmds_CmdOperate_id` (`CmdOperate_id`);

--
-- Indexes for table `devcmds_bak`
--
ALTER TABLE `devcmds_bak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devcmds_bak_SN_id` (`SN_id`),
  ADD KEY `devcmds_bak_CmdOperate_id` (`CmdOperate_id`);

--
-- Indexes for table `devlog`
--
ALTER TABLE `devlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devlog_SN_id` (`SN_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `app_label` (`app_label`,`model`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`);

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
-- Indexes for table `dm_billing`
--
ALTER TABLE `dm_billing`
  ADD PRIMARY KEY (`billingID`);

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
-- Indexes for table `dm_postschedule_guard`
--
ALTER TABLE `dm_postschedule_guard`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `dm_security`
--
ALTER TABLE `dm_security`
  ADD PRIMARY KEY (`securityID`);

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
-- Indexes for table `empitemdefine`
--
ALTER TABLE `empitemdefine`
  ADD PRIMARY KEY (`ItemName`),
  ADD KEY `empitemdefine_Author_id` (`Author_id`);

--
-- Indexes for table `face_template`
--
ALTER TABLE `face_template`
  ADD PRIMARY KEY (`templateid`),
  ADD UNIQUE KEY `pin` (`pin`,`faceid`,`face_ver`);

--
-- Indexes for table `finger_template`
--
ALTER TABLE `finger_template`
  ADD PRIMARY KEY (`templateid`),
  ADD UNIQUE KEY `pin` (`pin`,`FingerID`,`Fpversion`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`HolidayID`);

--
-- Indexes for table `iclock`
--
ALTER TABLE `iclock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iclock_area_id` (`area_id`),
  ADD KEY `iclock_dstime_id` (`dstime_id`),
  ADD KEY `iclock_dining_id` (`dining_id`);

--
-- Indexes for table `iclock_announcement`
--
ALTER TABLE `iclock_announcement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iclock_announcement_userid` (`userid`);

--
-- Indexes for table `iclock_appactionlog`
--
ALTER TABLE `iclock_appactionlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iclock_applist`
--
ALTER TABLE `iclock_applist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iclock_biodata`
--
ALTER TABLE `iclock_biodata`
  ADD PRIMARY KEY (`bio_id`),
  ADD UNIQUE KEY `pin` (`pin`,`bio_no`,`bio_index`,`bio_type`,`bio_format`,`major_ver`);

--
-- Indexes for table `iclock_deviceoplog`
--
ALTER TABLE `iclock_deviceoplog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iclock_devicetransaction`
--
ALTER TABLE `iclock_devicetransaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pin` (`pin`,`punch_time`);

--
-- Indexes for table `iclock_dininghall`
--
ALTER TABLE `iclock_dininghall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iclock_dstime`
--
ALTER TABLE `iclock_dstime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dst_name` (`dst_name`);

--
-- Indexes for table `iclock_notice`
--
ALTER TABLE `iclock_notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iclock_notice_DeviceID` (`DeviceID`),
  ADD KEY `iclock_notice_userid` (`userid`);

--
-- Indexes for table `iclock_notification`
--
ALTER TABLE `iclock_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iclock_notification_receiver_id` (`receiver_id`);

--
-- Indexes for table `iclock_oplog`
--
ALTER TABLE `iclock_oplog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SN` (`SN`,`OPTime`),
  ADD KEY `iclock_oplog_SN` (`SN`);

--
-- Indexes for table `iclock_testdata`
--
ALTER TABLE `iclock_testdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iclock_testdata_dept_id` (`dept_id`),
  ADD KEY `iclock_testdata_area_id` (`area_id`);

--
-- Indexes for table `iclock_testdata_admin_area`
--
ALTER TABLE `iclock_testdata_admin_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testdata_id` (`testdata_id`,`area_id`),
  ADD KEY `iclock_testdata_admin_area_testdata_id` (`testdata_id`),
  ADD KEY `iclock_testdata_admin_area_area_id` (`area_id`);

--
-- Indexes for table `iclock_testdata_admin_dept`
--
ALTER TABLE `iclock_testdata_admin_dept`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testdata_id` (`testdata_id`,`department_id`),
  ADD KEY `iclock_testdata_admin_dept_testdata_id` (`testdata_id`),
  ADD KEY `iclock_testdata_admin_dept_department_id` (`department_id`);

--
-- Indexes for table `iclock_usbtransaction`
--
ALTER TABLE `iclock_usbtransaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pin` (`pin`,`punch_time`);

--
-- Indexes for table `iclock_workcode`
--
ALTER TABLE `iclock_workcode`
  ADD PRIMARY KEY (`workcode_id`);

--
-- Indexes for table `iclock_workcode_devices`
--
ALTER TABLE `iclock_workcode_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `workcode_id` (`workcode_id`,`device_id`),
  ADD KEY `iclock_workcode_devices_workcode_id` (`workcode_id`),
  ADD KEY `iclock_workcode_devices_device_id` (`device_id`);

--
-- Indexes for table `leaveclass`
--
ALTER TABLE `leaveclass`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `leaveclass1`
--
ALTER TABLE `leaveclass1`
  ADD PRIMARY KEY (`LeaveID`);

--
-- Indexes for table `num_run`
--
ALTER TABLE `num_run`
  ADD PRIMARY KEY (`Num_runID`);

--
-- Indexes for table `num_run_deil`
--
ALTER TABLE `num_run_deil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Num_runID` (`Num_runID`,`Sdays`,`StartTime`),
  ADD KEY `num_run_deil_Num_runID` (`Num_runID`),
  ADD KEY `num_run_deil_SchclassID` (`SchclassID`);

--
-- Indexes for table `operatecmds`
--
ALTER TABLE `operatecmds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operatecmds_Author_id` (`Author_id`);

--
-- Indexes for table `payroll_allowance`
--
ALTER TABLE `payroll_allowance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_allowance_employee_id` (`employee_id`),
  ADD KEY `payroll_allowance_allowance_type_id` (`allowance_type_id`);

--
-- Indexes for table `payroll_allowancetype`
--
ALTER TABLE `payroll_allowancetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_cashadvance`
--
ALTER TABLE `payroll_cashadvance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_cashadvance_employee_id` (`employee_id`);

--
-- Indexes for table `payroll_currency`
--
ALTER TABLE `payroll_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_deduction`
--
ALTER TABLE `payroll_deduction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_deduction_employee_id` (`employee_id`),
  ADD KEY `payroll_deduction_deduction_type_id` (`deduction_type_id`);

--
-- Indexes for table `payroll_deductiontype`
--
ALTER TABLE `payroll_deductiontype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_exceptionformula`
--
ALTER TABLE `payroll_exceptionformula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_expense`
--
ALTER TABLE `payroll_expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_expense_employee_id` (`employee_id`);

--
-- Indexes for table `payroll_formulasign`
--
ALTER TABLE `payroll_formulasign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_increment`
--
ALTER TABLE `payroll_increment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_increment_employee_id` (`employee_id`);

--
-- Indexes for table `payroll_leaveformula`
--
ALTER TABLE `payroll_leaveformula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_leaveformula_leave_type_id` (`leave_type_id`);

--
-- Indexes for table `payroll_otformula`
--
ALTER TABLE `payroll_otformula`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_payrollcredit`
--
ALTER TABLE `payroll_payrollcredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_payrollcredit_userid` (`userid`);

--
-- Indexes for table `payroll_payrollleavecredit`
--
ALTER TABLE `payroll_payrollleavecredit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_payrollleavecredit_userid` (`userid`);

--
-- Indexes for table `payroll_salary`
--
ALTER TABLE `payroll_salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_salary_employee_id` (`employee_id`),
  ADD KEY `payroll_salary_pay_currency_id` (`pay_currency_id`);

--
-- Indexes for table `payroll_salarychange`
--
ALTER TABLE `payroll_salarychange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_salary_exception_formula`
--
ALTER TABLE `payroll_salary_exception_formula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_id` (`salary_id`,`exceptionformula_id`),
  ADD KEY `payroll_salary_exception_formula_salary_id` (`salary_id`),
  ADD KEY `payroll_salary_exception_formula_exceptionformula_id` (`exceptionformula_id`);

--
-- Indexes for table `payroll_salary_leave_formula`
--
ALTER TABLE `payroll_salary_leave_formula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_id` (`salary_id`,`leaveformula_id`),
  ADD KEY `payroll_salary_leave_formula_salary_id` (`salary_id`),
  ADD KEY `payroll_salary_leave_formula_leaveformula_id` (`leaveformula_id`);

--
-- Indexes for table `payroll_salary_ot_formula`
--
ALTER TABLE `payroll_salary_ot_formula`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `salary_id` (`salary_id`,`otformula_id`),
  ADD KEY `payroll_salary_ot_formula_salary_id` (`salary_id`),
  ADD KEY `payroll_salary_ot_formula_otformula_id` (`otformula_id`);

--
-- Indexes for table `personnel_area`
--
ALTER TABLE `personnel_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_area_parent_id` (`parent_id`);

--
-- Indexes for table `personnel_cities`
--
ALTER TABLE `personnel_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_cities_country_id` (`country_id`),
  ADD KEY `personnel_cities_state_id` (`state_id`);

--
-- Indexes for table `personnel_countries`
--
ALTER TABLE `personnel_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_departmentapprove`
--
ALTER TABLE `personnel_departmentapprove`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_departmentapprove_dept_id` (`dept_id`);

--
-- Indexes for table `personnel_departmentapprover`
--
ALTER TABLE `personnel_departmentapprover`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_departmentapprover_approve_id` (`approve_id`),
  ADD KEY `personnel_departmentapprover_approver_id` (`approver_id`);

--
-- Indexes for table `personnel_departmentnotify`
--
ALTER TABLE `personnel_departmentnotify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_departmentnotify_approve_id` (`approve_id`),
  ADD KEY `personnel_departmentnotify_notify_id` (`notify_id`);

--
-- Indexes for table `personnel_document`
--
ALTER TABLE `personnel_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_documentdetail`
--
ALTER TABLE `personnel_documentdetail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`,`doc_id`),
  ADD KEY `personnel_documentdetail_emp_id` (`emp_id`),
  ADD KEY `personnel_documentdetail_doc_id` (`doc_id`);

--
-- Indexes for table `personnel_education`
--
ALTER TABLE `personnel_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_empchange`
--
ALTER TABLE `personnel_empchange`
  ADD PRIMARY KEY (`changeno`),
  ADD KEY `personnel_empchange_UserID_id` (`UserID_id`);

--
-- Indexes for table `personnel_employeeoption`
--
ALTER TABLE `personnel_employeeoption`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `option_id` (`option_id`,`user_id`),
  ADD KEY `personnel_employeeoption_option_id` (`option_id`),
  ADD KEY `personnel_employeeoption_user_id` (`user_id`);

--
-- Indexes for table `personnel_iccard`
--
ALTER TABLE `personnel_iccard`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `personnel_iccard_posmeal`
--
ALTER TABLE `personnel_iccard_posmeal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iccard_id` (`iccard_id`,`meal_id`),
  ADD KEY `personnel_iccard_posmeal_iccard_id` (`iccard_id`),
  ADD KEY `personnel_iccard_posmeal_meal_id` (`meal_id`);

--
-- Indexes for table `personnel_iccard_use_mechine`
--
ALTER TABLE `personnel_iccard_use_mechine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iccard_id` (`iccard_id`,`device_id`),
  ADD KEY `personnel_iccard_use_mechine_iccard_id` (`iccard_id`),
  ADD KEY `personnel_iccard_use_mechine_device_id` (`device_id`);

--
-- Indexes for table `personnel_issuecard`
--
ALTER TABLE `personnel_issuecard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_issuecard_UserID_id` (`UserID_id`),
  ADD KEY `personnel_issuecard_type_id` (`type_id`);

--
-- Indexes for table `personnel_leavelog`
--
ALTER TABLE `personnel_leavelog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_leavelog_UserID_id` (`UserID_id`);

--
-- Indexes for table `personnel_meal`
--
ALTER TABLE `personnel_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_national`
--
ALTER TABLE `personnel_national`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnel_positions`
--
ALTER TABLE `personnel_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_positions_parent_id` (`parent_id`);

--
-- Indexes for table `personnel_state`
--
ALTER TABLE `personnel_state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel_state_country_id` (`country_id`);

--
-- Indexes for table `schclass`
--
ALTER TABLE `schclass`
  ADD PRIMARY KEY (`SchclassID`);

--
-- Indexes for table `schclass_break_times`
--
ALTER TABLE `schclass_break_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schclass_id` (`schclass_id`,`breaktime_id`),
  ADD KEY `schclass_break_times_schclass_id` (`schclass_id`),
  ADD KEY `schclass_break_times_breaktime_id` (`breaktime_id`);

--
-- Indexes for table `setuseratt`
--
ALTER TABLE `setuseratt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setuseratt_UserID_id` (`UserID_id`);

--
-- Indexes for table `sync_area`
--
ALTER TABLE `sync_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sync_department`
--
ALTER TABLE `sync_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sync_employee`
--
ALTER TABLE `sync_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sync_job`
--
ALTER TABLE `sync_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `badgenumber` (`badgenumber`),
  ADD KEY `userinfo_defaultdeptid` (`defaultdeptid`),
  ADD KEY `userinfo_country_id` (`country_id`),
  ADD KEY `userinfo_state_id` (`state_id`),
  ADD KEY `userinfo_city_id` (`city_id`),
  ADD KEY `userinfo_position_id` (`position_id`),
  ADD KEY `userinfo_education_id` (`education_id`),
  ADD KEY `userinfo_national_id` (`national_id`),
  ADD KEY `userinfo_morecard_group_id` (`morecard_group_id`);

--
-- Indexes for table `userinfo_attarea`
--
ALTER TABLE `userinfo_attarea`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`,`area_id`),
  ADD KEY `userinfo_attarea_employee_id` (`employee_id`),
  ADD KEY `userinfo_attarea_area_id` (`area_id`);

--
-- Indexes for table `useruusedsclasses`
--
ALTER TABLE `useruusedsclasses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserId` (`UserId`,`SchId`);

--
-- Indexes for table `user_of_run`
--
ALTER TABLE `user_of_run`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`NUM_OF_RUN_ID`,`StartDate`,`EndDate`),
  ADD KEY `user_of_run_userid` (`userid`),
  ADD KEY `user_of_run_NUM_OF_RUN_ID` (`NUM_OF_RUN_ID`);

--
-- Indexes for table `user_speday`
--
ALTER TABLE `user_speday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_speday_userid` (`userid`),
  ADD KEY `user_speday_DateID` (`DateID`);

--
-- Indexes for table `user_temp_sch`
--
ALTER TABLE `user_temp_sch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`ComeTime`,`LeaveTime`),
  ADD KEY `user_temp_sch_userid` (`userid`);

--
-- Indexes for table `worktable_groupmsg`
--
ALTER TABLE `worktable_groupmsg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worktable_groupmsg_msgtype_id` (`msgtype_id`),
  ADD KEY `worktable_groupmsg_group_id` (`group_id`);

--
-- Indexes for table `worktable_instantmsg`
--
ALTER TABLE `worktable_instantmsg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worktable_instantmsg_msgtype_id` (`msgtype_id`);

--
-- Indexes for table `worktable_msgtype`
--
ALTER TABLE `worktable_msgtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worktable_usrmsg`
--
ALTER TABLE `worktable_usrmsg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `worktable_usrmsg_user_id` (`user_id`),
  ADD KEY `worktable_usrmsg_msg_id` (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_acaccesslevel`
--
ALTER TABLE `access_acaccesslevel`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_acaccesslevel_doors`
--
ALTER TABLE `access_acaccesslevel_doors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_acaccesslevel_employees`
--
ALTER TABLE `access_acaccesslevel_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_acantipassback`
--
ALTER TABLE `access_acantipassback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_accombgroup`
--
ALTER TABLE `access_accombgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_acdoor`
--
ALTER TABLE `access_acdoor`
  MODIFY `door_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_acgroup`
--
ALTER TABLE `access_acgroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `access_acholidays`
--
ALTER TABLE `access_acholidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `access_actimezone`
--
ALTER TABLE `access_actimezone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `access_actimezones`
--
ALTER TABLE `access_actimezones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `access_acunlockcomb`
--
ALTER TABLE `access_acunlockcomb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `acc_morecardempgroup`
--
ALTER TABLE `acc_morecardempgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `areaadmin`
--
ALTER TABLE `areaadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attcalclog`
--
ALTER TABLE `attcalclog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attexception`
--
ALTER TABLE `attexception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attrecabnormite`
--
ALTER TABLE `attrecabnormite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attshifts`
--
ALTER TABLE `attshifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_approvedhistory`
--
ALTER TABLE `att_approvedhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_autocal_log`
--
ALTER TABLE `att_autocal_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `att_autoexportlog`
--
ALTER TABLE `att_autoexportlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_breaktime`
--
ALTER TABLE `att_breaktime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_changeschedule`
--
ALTER TABLE `att_changeschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_exportschedule`
--
ALTER TABLE `att_exportschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `att_multipletransaction`
--
ALTER TABLE `att_multipletransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_overtime`
--
ALTER TABLE `att_overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_reportoption`
--
ALTER TABLE `att_reportoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_rule`
--
ALTER TABLE `att_rule`
  MODIFY `RuleID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_training`
--
ALTER TABLE `att_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_trainingcategory`
--
ALTER TABLE `att_trainingcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_waitforprocessdata`
--
ALTER TABLE `att_waitforprocessdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `auth_message`
--
ALTER TABLE `auth_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;
--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_additiondata`
--
ALTER TABLE `base_additiondata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_appoption`
--
ALTER TABLE `base_appoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `base_basecode`
--
ALTER TABLE `base_basecode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3842;
--
-- AUTO_INCREMENT for table `base_datatranslation`
--
ALTER TABLE `base_datatranslation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `base_emailtemplate`
--
ALTER TABLE `base_emailtemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_ftpserver`
--
ALTER TABLE `base_ftpserver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_operatortemplate`
--
ALTER TABLE `base_operatortemplate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_option`
--
ALTER TABLE `base_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `base_personaloption`
--
ALTER TABLE `base_personaloption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_strresource`
--
ALTER TABLE `base_strresource`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_strtranslation`
--
ALTER TABLE `base_strtranslation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `base_systemoption`
--
ALTER TABLE `base_systemoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkexact`
--
ALTER TABLE `checkexact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `checkinout`
--
ALTER TABLE `checkinout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dbapp_viewmodel`
--
ALTER TABLE `dbapp_viewmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dbbackuplog`
--
ALTER TABLE `dbbackuplog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DeptID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department_holiday`
--
ALTER TABLE `department_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_rule`
--
ALTER TABLE `department_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deptadmin`
--
ALTER TABLE `deptadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devcmds`
--
ALTER TABLE `devcmds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devcmds_bak`
--
ALTER TABLE `devcmds_bak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `devlog`
--
ALTER TABLE `devlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `dm_approval`
--
ALTER TABLE `dm_approval`
  MODIFY `approvalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dm_approvaldet`
--
ALTER TABLE `dm_approvaldet`
  MODIFY `approvaldetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `dm_approvalmodule`
--
ALTER TABLE `dm_approvalmodule`
  MODIFY `approvalmoduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dm_bank`
--
ALTER TABLE `dm_bank`
  MODIFY `bankID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dm_billing`
--
ALTER TABLE `dm_billing`
  MODIFY `billingID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_client`
--
ALTER TABLE `dm_client`
  MODIFY `clientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dm_company`
--
ALTER TABLE `dm_company`
  MODIFY `companyID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_department`
--
ALTER TABLE `dm_department`
  MODIFY `departmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dm_designation`
--
ALTER TABLE `dm_designation`
  MODIFY `designationID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_employeecreditleave`
--
ALTER TABLE `dm_employeecreditleave`
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `dm_employeeleave`
--
ALTER TABLE `dm_employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `postscheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_postschedule_guard`
--
ALTER TABLE `dm_postschedule_guard`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dm_rate`
--
ALTER TABLE `dm_rate`
  MODIFY `rateID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `dm_retirement`
--
ALTER TABLE `dm_retirement`
  MODIFY `retirementID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_rolemodule`
--
ALTER TABLE `dm_rolemodule`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `dm_rolemstr`
--
ALTER TABLE `dm_rolemstr`
  MODIFY `roleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_schedule`
--
ALTER TABLE `dm_schedule`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `dm_scheduleguard`
--
ALTER TABLE `dm_scheduleguard`
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_security`
--
ALTER TABLE `dm_security`
  MODIFY `securityID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `thrmonthID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_timekeeping`
--
ALTER TABLE `dm_timekeeping`
  MODIFY `timekeepingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_timekeepingdetails`
--
ALTER TABLE `dm_timekeepingdetails`
  MODIFY `timesheetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
