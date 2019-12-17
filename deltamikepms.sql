-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 12:00 PM
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
  `bankstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_bank`
--

INSERT INTO `dm_bank` (`bankID`, `bankname`, `bankstatus`) VALUES
(1, 'b', 'Active'),
(2, 'a', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_client`
--

CREATE TABLE `dm_client` (
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
-- Dumping data for table `dm_client`
--

INSERT INTO `dm_client` (`clientID`, `description`, `clientstatus`, `clientname`, `housenumber`, `streetname`, `barangay`, `city`, `contactperson`, `activedetachmentpost`, `contactno`, `email`) VALUES
(1, '1', 'Active', '1', '', '', '', '', '1', 1, '1', '1'),
(2, '2', 'Active', '3', '2', '3', '1', '1', '1', 1, '1', '1'),
(3, '', 'Active', '2', '', '2', '2', '2', '2', 2, '2', '2');

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
(1, 'IT Departments', 'Active'),
(2, 'HR Department', 'Inactive'),
(3, '1', 'Active'),
(4, '23', 'Active');

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
(2, 1, 'IT Programmer 1', 'Active');

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
(1, 'Post1', '', 'asd', 'asd', 'Pasig City', 1, 'Wilson Parajas', '2019-11-01', '2019-11-30', 5, 'Active'),
(2, 'Post2', '', 'asd', 'asd', 'Caloocan', 1, 'Jamie Capistrano', '2019-11-01', '2019-11-30', 3, 'Active');

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
-- Dumping data for table `dm_employee`
--

INSERT INTO `dm_employee` (`employeeID`, `firstname`, `middlename`, `lastname`, `gender`, `housenumber`, `streetname`, `barangay`, `city`, `birthdate`, `contactinfo`, `civilstatus`, `citizenship`, `hireddate`, `departmentID`, `designationID`, `detachmentID`, `roleID`, `approvalID`, `username`, `password`, `basicsalary`, `dailyrate`, `allowance`, `tinnumber`, `sssnumber`, `philhealthnumber`, `pagibignumber`, `employeestatus`, `photo`, `clientID`, `datecreated`) VALUES
(1, 'Administrator', '', 'Account', 'Male', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '2', 2, 1, 1, 'admin', 'admin', ' 10,000.00', ' 500.00', ' 0.00', '111-111-111', '22-2222222-2', '33-333333333-3', '4444-4444-4444', 'Active', '1.jpg', 1, '2019-11-25 08:26:51.905646'),
(2, 'Office', '', 'Staff', 'Female', '', 'Opel', '175', 'Caloocan', '1994-02-20', '0927-947-5792', 'Single', 'Filipino', '2019-04-22', 1, '1', 1, 2, 2, 'staff', 'staff', '10,000.00', '100.00', '', '', '', '', '', 'Active', '', 0, '2019-11-25 08:26:54.102823'),
(3, 'Office', '', 'Executive', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '2000-10-25', '0912-345-6789', 'Married', 'Fiipino', '2013-11-25', 1, '1', 1, 2, 2, 'exe', 'exe', '20,000.00', '200.00', '', '', '', '', '', 'Active', '', 0, '2019-12-03 11:56:31.366887');

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
(85, 1, 1, '06/12/2019', '08/12/2019', 3, 5, '21313'),
(86, 1, 1, '22/12/2019', '22/12/2019', 1, 4, '1'),
(87, 1, 1, '10/12/2019', '12/12/2019', 3, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `dm_employeeschedule`
--

CREATE TABLE `dm_employeeschedule` (
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
-- Dumping data for table `dm_employeeschedule`
--

INSERT INTO `dm_employeeschedule` (`scheduleID`, `employeeID`, `sunschedulefrom`, `sunscheduleto`, `sunrestday`, `monchedulefrom`, `monscheduleto`, `monrestday`, `tueschedulefrom`, `tuescheduleto`, `tuerestday`, `wedschedulefrom`, `wedscheduleto`, `wedrestday`, `thschedulefrom`, `thscheduleto`, `threstday`, `frischedulefrom`, `frischeduleto`, `frirestday`, `satschedulefrom`, `satscheduleto`, `satrestday`) VALUES
(1, 1, '15:33', '03:33', 0, '', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 1);

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
(1, 'asdd', '9999-11-30', 'Regular Holiday'),
(2, 'asd', '0001-08-08', 'Regular Holiday');

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
(1, 'a', 1, 'No', 'Active'),
(2, 'b', 1, 'No', 'Active'),
(3, 'asd', 1, 'Yes', 'Active'),
(4, 'e', 1, 'No', 'Active'),
(5, 'as', 1, 'Yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `dm_loan`
--

CREATE TABLE `dm_loan` (
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
-- Dumping data for table `dm_loan`
--

INSERT INTO `dm_loan` (`loanID`, `employeeID`, `loantypeID`, `dategranted`, `enddate`, `termofpaymentID`, `amount`, `deduction`, `balance`, `datecreated`) VALUES
(1, 1, 1, '21/11/2019', '08/02/2020', 1, '5,000.00', '400.00', '', '2019-11-20 06:19:30.733972'),
(2, 1, 2, '21/11/2019', '20/11/2019', 1, '2.00', '1.00', '', '2019-11-20 06:27:44.347017');

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
-- Table structure for table `dm_philhealthtable`
--

CREATE TABLE `dm_philhealthtable` (
  `philhealthID` int(11) NOT NULL,
  `belowrange` varchar(50) NOT NULL,
  `aboverange` varchar(50) NOT NULL,
  `percent` int(50) NOT NULL,
  `employer` varchar(50) NOT NULL,
  `employee` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_philhealthtable`
--

INSERT INTO `dm_philhealthtable` (`philhealthID`, `belowrange`, `aboverange`, `percent`, `employer`, `employee`, `total`) VALUES
(1, '100.00', '100.00', 100, '100.00', '100.00', '100.00');

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
(98, 13, 1, 0),
(99, 13, 2, 0),
(100, 13, 3, 0),
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
(122, 13, 25, 0);

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
(11, '123455'),
(12, 'wilson');

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
(1, '500.00', '600.00', '500.00', '500.00', '600.00'),
(2, '501.00', '600.00', '20.00', '20.00', '20.00');

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
(1, ' 1.00', ' 200.00', ' 200.00', '20'),
(2, '200.00', '200.00', '20.00', '20'),
(5, '900.00', '9,000.00', '900.00', '20'),
(6, '300.00', '400.00', '500.00', '20'),
(7, '600.00', '200.00', '300.00', '0'),
(8, '5,050.00', '5,050.00', '5,050.00', '30');

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
-- Indexes for table `dm_client`
--
ALTER TABLE `dm_client`
  ADD PRIMARY KEY (`clientID`);

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
-- Indexes for table `dm_employeeschedule`
--
ALTER TABLE `dm_employeeschedule`
  ADD PRIMARY KEY (`scheduleID`);

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
  MODIFY `approvalID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `dm_approvaldet`
--
ALTER TABLE `dm_approvaldet`
  MODIFY `approvaldetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
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
  MODIFY `clientID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dm_department`
--
ALTER TABLE `dm_department`
  MODIFY `departmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dm_designation`
--
ALTER TABLE `dm_designation`
  MODIFY `designationID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_detachment`
--
ALTER TABLE `dm_detachment`
  MODIFY `detachmentID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dm_employee`
--
ALTER TABLE `dm_employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dm_employeecreditleave`
--
ALTER TABLE `dm_employeecreditleave`
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `dm_employeeleave`
--
ALTER TABLE `dm_employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `dm_employeeschedule`
--
ALTER TABLE `dm_employeeschedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dm_employeetype`
--
ALTER TABLE `dm_employeetype`
  MODIFY `employeetypeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- AUTO_INCREMENT for table `dm_modulemstr`
--
ALTER TABLE `dm_modulemstr`
  MODIFY `moduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `dm_overtime`
--
ALTER TABLE `dm_overtime`
  MODIFY `overtimeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dm_rolemodule`
--
ALTER TABLE `dm_rolemodule`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `dm_rolemstr`
--
ALTER TABLE `dm_rolemstr`
  MODIFY `roleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `face_template`
--
ALTER TABLE `face_template`
  MODIFY `templateid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `finger_template`
--
ALTER TABLE `finger_template`
  MODIFY `templateid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `HolidayID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock`
--
ALTER TABLE `iclock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iclock_announcement`
--
ALTER TABLE `iclock_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_appactionlog`
--
ALTER TABLE `iclock_appactionlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_applist`
--
ALTER TABLE `iclock_applist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_biodata`
--
ALTER TABLE `iclock_biodata`
  MODIFY `bio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iclock_deviceoplog`
--
ALTER TABLE `iclock_deviceoplog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iclock_devicetransaction`
--
ALTER TABLE `iclock_devicetransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_dininghall`
--
ALTER TABLE `iclock_dininghall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iclock_dstime`
--
ALTER TABLE `iclock_dstime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_notice`
--
ALTER TABLE `iclock_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_notification`
--
ALTER TABLE `iclock_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_oplog`
--
ALTER TABLE `iclock_oplog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_testdata`
--
ALTER TABLE `iclock_testdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_testdata_admin_area`
--
ALTER TABLE `iclock_testdata_admin_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_testdata_admin_dept`
--
ALTER TABLE `iclock_testdata_admin_dept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_usbtransaction`
--
ALTER TABLE `iclock_usbtransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_workcode`
--
ALTER TABLE `iclock_workcode`
  MODIFY `workcode_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iclock_workcode_devices`
--
ALTER TABLE `iclock_workcode_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaveclass`
--
ALTER TABLE `leaveclass`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `leaveclass1`
--
ALTER TABLE `leaveclass1`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;
--
-- AUTO_INCREMENT for table `num_run`
--
ALTER TABLE `num_run`
  MODIFY `Num_runID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `num_run_deil`
--
ALTER TABLE `num_run_deil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operatecmds`
--
ALTER TABLE `operatecmds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_allowance`
--
ALTER TABLE `payroll_allowance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_allowancetype`
--
ALTER TABLE `payroll_allowancetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_cashadvance`
--
ALTER TABLE `payroll_cashadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_currency`
--
ALTER TABLE `payroll_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payroll_deduction`
--
ALTER TABLE `payroll_deduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_deductiontype`
--
ALTER TABLE `payroll_deductiontype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_exceptionformula`
--
ALTER TABLE `payroll_exceptionformula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_expense`
--
ALTER TABLE `payroll_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_formulasign`
--
ALTER TABLE `payroll_formulasign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payroll_increment`
--
ALTER TABLE `payroll_increment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_leaveformula`
--
ALTER TABLE `payroll_leaveformula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_otformula`
--
ALTER TABLE `payroll_otformula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_payrollcredit`
--
ALTER TABLE `payroll_payrollcredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_payrollleavecredit`
--
ALTER TABLE `payroll_payrollleavecredit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_salary`
--
ALTER TABLE `payroll_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_salarychange`
--
ALTER TABLE `payroll_salarychange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_salary_exception_formula`
--
ALTER TABLE `payroll_salary_exception_formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_salary_leave_formula`
--
ALTER TABLE `payroll_salary_leave_formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll_salary_ot_formula`
--
ALTER TABLE `payroll_salary_ot_formula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_area`
--
ALTER TABLE `personnel_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personnel_cities`
--
ALTER TABLE `personnel_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_countries`
--
ALTER TABLE `personnel_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_departmentapprove`
--
ALTER TABLE `personnel_departmentapprove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_departmentapprover`
--
ALTER TABLE `personnel_departmentapprover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_departmentnotify`
--
ALTER TABLE `personnel_departmentnotify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_document`
--
ALTER TABLE `personnel_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_documentdetail`
--
ALTER TABLE `personnel_documentdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_education`
--
ALTER TABLE `personnel_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_empchange`
--
ALTER TABLE `personnel_empchange`
  MODIFY `changeno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_employeeoption`
--
ALTER TABLE `personnel_employeeoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_iccard`
--
ALTER TABLE `personnel_iccard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personnel_iccard_posmeal`
--
ALTER TABLE `personnel_iccard_posmeal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_iccard_use_mechine`
--
ALTER TABLE `personnel_iccard_use_mechine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_issuecard`
--
ALTER TABLE `personnel_issuecard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_leavelog`
--
ALTER TABLE `personnel_leavelog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_meal`
--
ALTER TABLE `personnel_meal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `personnel_national`
--
ALTER TABLE `personnel_national`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_positions`
--
ALTER TABLE `personnel_positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personnel_state`
--
ALTER TABLE `personnel_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schclass`
--
ALTER TABLE `schclass`
  MODIFY `SchclassID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schclass_break_times`
--
ALTER TABLE `schclass_break_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setuseratt`
--
ALTER TABLE `setuseratt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sync_area`
--
ALTER TABLE `sync_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sync_department`
--
ALTER TABLE `sync_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sync_employee`
--
ALTER TABLE `sync_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sync_job`
--
ALTER TABLE `sync_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userinfo_attarea`
--
ALTER TABLE `userinfo_attarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `useruusedsclasses`
--
ALTER TABLE `useruusedsclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_of_run`
--
ALTER TABLE `user_of_run`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_speday`
--
ALTER TABLE `user_speday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_temp_sch`
--
ALTER TABLE `user_temp_sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worktable_groupmsg`
--
ALTER TABLE `worktable_groupmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worktable_instantmsg`
--
ALTER TABLE `worktable_instantmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worktable_msgtype`
--
ALTER TABLE `worktable_msgtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `worktable_usrmsg`
--
ALTER TABLE `worktable_usrmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_acaccesslevel`
--
ALTER TABLE `access_acaccesslevel`
  ADD CONSTRAINT `ac_tz_id_refs_id_45d358fb` FOREIGN KEY (`ac_tz_id`) REFERENCES `access_actimezones` (`id`);

--
-- Constraints for table `access_acaccesslevel_doors`
--
ALTER TABLE `access_acaccesslevel_doors`
  ADD CONSTRAINT `acaccesslevel_id_refs_level_id_55a41dcd` FOREIGN KEY (`acaccesslevel_id`) REFERENCES `access_acaccesslevel` (`level_id`),
  ADD CONSTRAINT `acdoor_id_refs_door_id_2d999c00` FOREIGN KEY (`acdoor_id`) REFERENCES `access_acdoor` (`door_id`);

--
-- Constraints for table `access_acaccesslevel_employees`
--
ALTER TABLE `access_acaccesslevel_employees`
  ADD CONSTRAINT `acaccesslevel_id_refs_level_id_c0a6f57` FOREIGN KEY (`acaccesslevel_id`) REFERENCES `access_acaccesslevel` (`level_id`),
  ADD CONSTRAINT `employee_id_refs_userid_314d1447` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `access_acantipassback`
--
ALTER TABLE `access_acantipassback`
  ADD CONSTRAINT `door_id_refs_door_id_27bf7fd7` FOREIGN KEY (`door_id`) REFERENCES `access_acdoor` (`door_id`);

--
-- Constraints for table `access_accombgroup`
--
ALTER TABLE `access_accombgroup`
  ADD CONSTRAINT `comb_id_refs_id_701b4d5` FOREIGN KEY (`comb_id`) REFERENCES `access_acunlockcomb` (`id`),
  ADD CONSTRAINT `group_id_refs_group_id_7e859806` FOREIGN KEY (`group_id`) REFERENCES `access_acgroup` (`group_id`);

--
-- Constraints for table `access_acdoor`
--
ALTER TABLE `access_acdoor`
  ADD CONSTRAINT `device_id_refs_id_3158457e` FOREIGN KEY (`device_id`) REFERENCES `iclock` (`id`),
  ADD CONSTRAINT `nc_tz_id_refs_id_43a365c8` FOREIGN KEY (`nc_tz_id`) REFERENCES `access_actimezone` (`id`),
  ADD CONSTRAINT `no_tz_id_refs_id_43a365c8` FOREIGN KEY (`no_tz_id`) REFERENCES `access_actimezone` (`id`);

--
-- Constraints for table `access_acgroup`
--
ALTER TABLE `access_acgroup`
  ADD CONSTRAINT `tzs_id_refs_id_3acfa22c` FOREIGN KEY (`tzs_id`) REFERENCES `access_actimezones` (`id`);

--
-- Constraints for table `access_acholidays`
--
ALTER TABLE `access_acholidays`
  ADD CONSTRAINT `tz_id_refs_id_22945471` FOREIGN KEY (`tz_id`) REFERENCES `access_actimezone` (`id`);

--
-- Constraints for table `access_actimezone`
--
ALTER TABLE `access_actimezone`
  ADD CONSTRAINT `tzs_id_refs_id_2b5824fd` FOREIGN KEY (`tzs_id`) REFERENCES `access_actimezones` (`id`);

--
-- Constraints for table `access_acunlockcomb`
--
ALTER TABLE `access_acunlockcomb`
  ADD CONSTRAINT `door_id_refs_door_id_7906e0e` FOREIGN KEY (`door_id`) REFERENCES `access_acdoor` (`door_id`);

--
-- Constraints for table `action_log`
--
ALTER TABLE `action_log`
  ADD CONSTRAINT `content_type_id_refs_id_4de4082b` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `user_id_refs_id_6a75a369` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `areaadmin`
--
ALTER TABLE `areaadmin`
  ADD CONSTRAINT `area_id_refs_id_732fe028` FOREIGN KEY (`area_id`) REFERENCES `personnel_area` (`id`),
  ADD CONSTRAINT `user_id_refs_id_36bfc4c5` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `attexception`
--
ALTER TABLE `attexception`
  ADD CONSTRAINT `UserId_refs_userid_77fe2014` FOREIGN KEY (`UserId`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `attrecabnormite`
--
ALTER TABLE `attrecabnormite`
  ADD CONSTRAINT `userid_refs_userid_69940d0b` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `attshifts`
--
ALTER TABLE `attshifts`
  ADD CONSTRAINT `SchId_refs_SchclassID_5ed7d93a` FOREIGN KEY (`SchId`) REFERENCES `schclass` (`SchclassID`),
  ADD CONSTRAINT `userid_refs_userid_7205af39` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `att_attreport`
--
ALTER TABLE `att_attreport`
  ADD CONSTRAINT `Author_id_refs_id_141eb522` FOREIGN KEY (`Author_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `att_changeschedule`
--
ALTER TABLE `att_changeschedule`
  ADD CONSTRAINT `timetable_id_refs_SchclassID_3bba7e7c` FOREIGN KEY (`timetable_id`) REFERENCES `schclass` (`SchclassID`),
  ADD CONSTRAINT `userid_refs_userid_32017aef` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `att_multipletransaction`
--
ALTER TABLE `att_multipletransaction`
  ADD CONSTRAINT `emp_id_refs_userid_43217ad` FOREIGN KEY (`emp_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `att_overtime`
--
ALTER TABLE `att_overtime`
  ADD CONSTRAINT `emp_id_refs_userid_25727377` FOREIGN KEY (`emp_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `att_training`
--
ALTER TABLE `att_training`
  ADD CONSTRAINT `category_id_refs_category_id_6fa23509` FOREIGN KEY (`category_id`) REFERENCES `att_trainingcategory` (`category_id`),
  ADD CONSTRAINT `userid_refs_userid_49c36a5e` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `att_waitforprocessdata`
--
ALTER TABLE `att_waitforprocessdata`
  ADD CONSTRAINT `UserID_id_refs_userid_1181a739` FOREIGN KEY (`UserID_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `group_id_refs_id_3cea63fe` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `permission_id_refs_id_5886d21f` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`);

--
-- Constraints for table `auth_message`
--
ALTER TABLE `auth_message`
  ADD CONSTRAINT `user_id_refs_id_650f49a6` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `content_type_id_refs_id_728de91f` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `auth_user_groups`
--
ALTER TABLE `auth_user_groups`
  ADD CONSTRAINT `group_id_refs_id_f116770` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `user_id_refs_id_7ceef80f` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `auth_user_user_permissions`
--
ALTER TABLE `auth_user_user_permissions`
  ADD CONSTRAINT `permission_id_refs_id_67e79cb` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `user_id_refs_id_dfbab7d` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `base_additiondata`
--
ALTER TABLE `base_additiondata`
  ADD CONSTRAINT `content_type_id_refs_id_546addb9` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `user_id_refs_id_1cafc7fb` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `base_datatranslation`
--
ALTER TABLE `base_datatranslation`
  ADD CONSTRAINT `content_type_id_refs_id_5cdb265` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `base_operatortemplate`
--
ALTER TABLE `base_operatortemplate`
  ADD CONSTRAINT `user_id_refs_id_750035a1` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `base_personaloption`
--
ALTER TABLE `base_personaloption`
  ADD CONSTRAINT `option_id_refs_id_7f17031f` FOREIGN KEY (`option_id`) REFERENCES `base_option` (`id`),
  ADD CONSTRAINT `user_id_refs_id_74c3551a` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `base_strtranslation`
--
ALTER TABLE `base_strtranslation`
  ADD CONSTRAINT `str_id_refs_id_5d349cf3` FOREIGN KEY (`str_id`) REFERENCES `base_strresource` (`id`);

--
-- Constraints for table `base_systemoption`
--
ALTER TABLE `base_systemoption`
  ADD CONSTRAINT `option_id_refs_id_10860d7e` FOREIGN KEY (`option_id`) REFERENCES `base_option` (`id`);

--
-- Constraints for table `checkexact`
--
ALTER TABLE `checkexact`
  ADD CONSTRAINT `userid_refs_userid_1d1a8a19` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `dbapp_viewmodel`
--
ALTER TABLE `dbapp_viewmodel`
  ADD CONSTRAINT `model_id_refs_id_79bf6e63` FOREIGN KEY (`model_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `dbbackuplog`
--
ALTER TABLE `dbbackuplog`
  ADD CONSTRAINT `user_id_refs_id_180ba78b` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `supdeptid_refs_DeptID_70dcc89` FOREIGN KEY (`supdeptid`) REFERENCES `departments` (`DeptID`);

--
-- Constraints for table `department_holiday`
--
ALTER TABLE `department_holiday`
  ADD CONSTRAINT `dept_id_refs_DeptID_3c0c4ecc` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`DeptID`),
  ADD CONSTRAINT `holiday_id_refs_HolidayID_7a29fa37` FOREIGN KEY (`holiday_id`) REFERENCES `holidays` (`HolidayID`);

--
-- Constraints for table `department_rule`
--
ALTER TABLE `department_rule`
  ADD CONSTRAINT `dept_id_refs_DeptID_2677a31` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`DeptID`),
  ADD CONSTRAINT `rule_id_refs_RuleID_40d37f27` FOREIGN KEY (`rule_id`) REFERENCES `att_rule` (`RuleID`);

--
-- Constraints for table `deptadmin`
--
ALTER TABLE `deptadmin`
  ADD CONSTRAINT `dept_id_refs_DeptID_602729fe` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`DeptID`),
  ADD CONSTRAINT `user_id_refs_id_759dae3` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `devcmds`
--
ALTER TABLE `devcmds`
  ADD CONSTRAINT `CmdOperate_id_refs_id_59acd186` FOREIGN KEY (`CmdOperate_id`) REFERENCES `operatecmds` (`id`),
  ADD CONSTRAINT `SN_id_refs_id_2cf7b853` FOREIGN KEY (`SN_id`) REFERENCES `iclock` (`id`);

--
-- Constraints for table `devcmds_bak`
--
ALTER TABLE `devcmds_bak`
  ADD CONSTRAINT `CmdOperate_id_refs_id_43995e93` FOREIGN KEY (`CmdOperate_id`) REFERENCES `operatecmds` (`id`),
  ADD CONSTRAINT `SN_id_refs_id_72564094` FOREIGN KEY (`SN_id`) REFERENCES `iclock` (`id`);

--
-- Constraints for table `devlog`
--
ALTER TABLE `devlog`
  ADD CONSTRAINT `SN_id_refs_id_9fc6243` FOREIGN KEY (`SN_id`) REFERENCES `iclock` (`id`);

--
-- Constraints for table `empitemdefine`
--
ALTER TABLE `empitemdefine`
  ADD CONSTRAINT `Author_id_refs_id_42892481` FOREIGN KEY (`Author_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `iclock`
--
ALTER TABLE `iclock`
  ADD CONSTRAINT `area_id_refs_id_4bcee01a` FOREIGN KEY (`area_id`) REFERENCES `personnel_area` (`id`),
  ADD CONSTRAINT `dining_id_refs_id_10714237` FOREIGN KEY (`dining_id`) REFERENCES `iclock_dininghall` (`id`),
  ADD CONSTRAINT `dstime_id_refs_id_58c5aa33` FOREIGN KEY (`dstime_id`) REFERENCES `iclock_dstime` (`id`);

--
-- Constraints for table `iclock_announcement`
--
ALTER TABLE `iclock_announcement`
  ADD CONSTRAINT `userid_refs_userid_6f54f506` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `iclock_notice`
--
ALTER TABLE `iclock_notice`
  ADD CONSTRAINT `DeviceID_refs_id_6bb1aea5` FOREIGN KEY (`DeviceID`) REFERENCES `iclock` (`id`),
  ADD CONSTRAINT `userid_refs_userid_696c0217` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `iclock_notification`
--
ALTER TABLE `iclock_notification`
  ADD CONSTRAINT `receiver_id_refs_userid_7182d89e` FOREIGN KEY (`receiver_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `iclock_oplog`
--
ALTER TABLE `iclock_oplog`
  ADD CONSTRAINT `SN_refs_id_3b91645d` FOREIGN KEY (`SN`) REFERENCES `iclock` (`id`);

--
-- Constraints for table `iclock_testdata`
--
ALTER TABLE `iclock_testdata`
  ADD CONSTRAINT `area_id_refs_id_1ccd366e` FOREIGN KEY (`area_id`) REFERENCES `personnel_area` (`id`),
  ADD CONSTRAINT `dept_id_refs_DeptID_78ae257a` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`DeptID`);

--
-- Constraints for table `iclock_testdata_admin_area`
--
ALTER TABLE `iclock_testdata_admin_area`
  ADD CONSTRAINT `area_id_refs_id_53590bb` FOREIGN KEY (`area_id`) REFERENCES `personnel_area` (`id`),
  ADD CONSTRAINT `testdata_id_refs_id_df0d148` FOREIGN KEY (`testdata_id`) REFERENCES `iclock_testdata` (`id`);

--
-- Constraints for table `iclock_testdata_admin_dept`
--
ALTER TABLE `iclock_testdata_admin_dept`
  ADD CONSTRAINT `department_id_refs_DeptID_3cd5ed6f` FOREIGN KEY (`department_id`) REFERENCES `departments` (`DeptID`),
  ADD CONSTRAINT `testdata_id_refs_id_6210bc2a` FOREIGN KEY (`testdata_id`) REFERENCES `iclock_testdata` (`id`);

--
-- Constraints for table `iclock_workcode_devices`
--
ALTER TABLE `iclock_workcode_devices`
  ADD CONSTRAINT `device_id_refs_id_6afe4a0b` FOREIGN KEY (`device_id`) REFERENCES `iclock` (`id`),
  ADD CONSTRAINT `workcode_id_refs_workcode_id_fb83af3` FOREIGN KEY (`workcode_id`) REFERENCES `iclock_workcode` (`workcode_id`);

--
-- Constraints for table `num_run_deil`
--
ALTER TABLE `num_run_deil`
  ADD CONSTRAINT `Num_runID_refs_Num_runID_782a4d87` FOREIGN KEY (`Num_runID`) REFERENCES `num_run` (`Num_runID`),
  ADD CONSTRAINT `SchclassID_refs_SchclassID_51a7cc12` FOREIGN KEY (`SchclassID`) REFERENCES `schclass` (`SchclassID`);

--
-- Constraints for table `operatecmds`
--
ALTER TABLE `operatecmds`
  ADD CONSTRAINT `Author_id_refs_id_484a3ab4` FOREIGN KEY (`Author_id`) REFERENCES `auth_user` (`id`);

--
-- Constraints for table `payroll_allowance`
--
ALTER TABLE `payroll_allowance`
  ADD CONSTRAINT `allowance_type_id_refs_id_7ef709b9` FOREIGN KEY (`allowance_type_id`) REFERENCES `payroll_allowancetype` (`id`),
  ADD CONSTRAINT `employee_id_refs_userid_41f9a2b1` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_cashadvance`
--
ALTER TABLE `payroll_cashadvance`
  ADD CONSTRAINT `employee_id_refs_userid_614c6968` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_deduction`
--
ALTER TABLE `payroll_deduction`
  ADD CONSTRAINT `deduction_type_id_refs_id_53cc1da5` FOREIGN KEY (`deduction_type_id`) REFERENCES `payroll_deductiontype` (`id`),
  ADD CONSTRAINT `employee_id_refs_userid_218f416e` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_expense`
--
ALTER TABLE `payroll_expense`
  ADD CONSTRAINT `employee_id_refs_userid_672726c9` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_increment`
--
ALTER TABLE `payroll_increment`
  ADD CONSTRAINT `employee_id_refs_userid_571b646c` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_leaveformula`
--
ALTER TABLE `payroll_leaveformula`
  ADD CONSTRAINT `leave_type_id_refs_LeaveID_561883a7` FOREIGN KEY (`leave_type_id`) REFERENCES `leaveclass` (`LeaveID`);

--
-- Constraints for table `payroll_payrollcredit`
--
ALTER TABLE `payroll_payrollcredit`
  ADD CONSTRAINT `userid_refs_userid_73eed065` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_payrollleavecredit`
--
ALTER TABLE `payroll_payrollleavecredit`
  ADD CONSTRAINT `userid_refs_userid_66068b9d` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `payroll_salary`
--
ALTER TABLE `payroll_salary`
  ADD CONSTRAINT `employee_id_refs_userid_9a0b116` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`),
  ADD CONSTRAINT `pay_currency_id_refs_id_3f2e58dc` FOREIGN KEY (`pay_currency_id`) REFERENCES `payroll_currency` (`id`);

--
-- Constraints for table `payroll_salary_exception_formula`
--
ALTER TABLE `payroll_salary_exception_formula`
  ADD CONSTRAINT `exceptionformula_id_refs_id_5417eac7` FOREIGN KEY (`exceptionformula_id`) REFERENCES `payroll_exceptionformula` (`id`),
  ADD CONSTRAINT `salary_id_refs_id_27e416d4` FOREIGN KEY (`salary_id`) REFERENCES `payroll_salary` (`id`);

--
-- Constraints for table `payroll_salary_leave_formula`
--
ALTER TABLE `payroll_salary_leave_formula`
  ADD CONSTRAINT `leaveformula_id_refs_id_b700e05` FOREIGN KEY (`leaveformula_id`) REFERENCES `payroll_leaveformula` (`id`),
  ADD CONSTRAINT `salary_id_refs_id_1f7b970a` FOREIGN KEY (`salary_id`) REFERENCES `payroll_salary` (`id`);

--
-- Constraints for table `payroll_salary_ot_formula`
--
ALTER TABLE `payroll_salary_ot_formula`
  ADD CONSTRAINT `otformula_id_refs_id_1564ff51` FOREIGN KEY (`otformula_id`) REFERENCES `payroll_otformula` (`id`),
  ADD CONSTRAINT `salary_id_refs_id_6bffaa81` FOREIGN KEY (`salary_id`) REFERENCES `payroll_salary` (`id`);

--
-- Constraints for table `personnel_area`
--
ALTER TABLE `personnel_area`
  ADD CONSTRAINT `parent_id_refs_id_6559da19` FOREIGN KEY (`parent_id`) REFERENCES `personnel_area` (`id`);

--
-- Constraints for table `personnel_cities`
--
ALTER TABLE `personnel_cities`
  ADD CONSTRAINT `country_id_refs_id_3599bc19` FOREIGN KEY (`country_id`) REFERENCES `personnel_countries` (`id`),
  ADD CONSTRAINT `state_id_refs_id_78352d66` FOREIGN KEY (`state_id`) REFERENCES `personnel_state` (`id`);

--
-- Constraints for table `personnel_departmentapprove`
--
ALTER TABLE `personnel_departmentapprove`
  ADD CONSTRAINT `dept_id_refs_DeptID_3f7ffbde` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`DeptID`);

--
-- Constraints for table `personnel_departmentapprover`
--
ALTER TABLE `personnel_departmentapprover`
  ADD CONSTRAINT `approve_id_refs_id_6e5c558` FOREIGN KEY (`approve_id`) REFERENCES `personnel_departmentapprove` (`id`),
  ADD CONSTRAINT `approver_id_refs_userid_480aa1c2` FOREIGN KEY (`approver_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_departmentnotify`
--
ALTER TABLE `personnel_departmentnotify`
  ADD CONSTRAINT `approve_id_refs_id_31d591be` FOREIGN KEY (`approve_id`) REFERENCES `personnel_departmentapprove` (`id`),
  ADD CONSTRAINT `notify_id_refs_userid_1a6ecbd8` FOREIGN KEY (`notify_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_documentdetail`
--
ALTER TABLE `personnel_documentdetail`
  ADD CONSTRAINT `doc_id_refs_id_3fa69f06` FOREIGN KEY (`doc_id`) REFERENCES `personnel_document` (`id`),
  ADD CONSTRAINT `emp_id_refs_userid_2fad50dd` FOREIGN KEY (`emp_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_empchange`
--
ALTER TABLE `personnel_empchange`
  ADD CONSTRAINT `UserID_id_refs_userid_8d2d3e8` FOREIGN KEY (`UserID_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_employeeoption`
--
ALTER TABLE `personnel_employeeoption`
  ADD CONSTRAINT `option_id_refs_id_1e3bd06b` FOREIGN KEY (`option_id`) REFERENCES `base_option` (`id`),
  ADD CONSTRAINT `user_id_refs_userid_77485c5c` FOREIGN KEY (`user_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_iccard_posmeal`
--
ALTER TABLE `personnel_iccard_posmeal`
  ADD CONSTRAINT `iccard_id_refs_id_54fef5d3` FOREIGN KEY (`iccard_id`) REFERENCES `personnel_iccard` (`id`),
  ADD CONSTRAINT `meal_id_refs_id_1a3ef3c4` FOREIGN KEY (`meal_id`) REFERENCES `personnel_meal` (`id`);

--
-- Constraints for table `personnel_iccard_use_mechine`
--
ALTER TABLE `personnel_iccard_use_mechine`
  ADD CONSTRAINT `device_id_refs_id_57b70b9d` FOREIGN KEY (`device_id`) REFERENCES `iclock` (`id`),
  ADD CONSTRAINT `iccard_id_refs_id_4b61aed1` FOREIGN KEY (`iccard_id`) REFERENCES `personnel_iccard` (`id`);

--
-- Constraints for table `personnel_issuecard`
--
ALTER TABLE `personnel_issuecard`
  ADD CONSTRAINT `UserID_id_refs_userid_77c69211` FOREIGN KEY (`UserID_id`) REFERENCES `userinfo` (`userid`),
  ADD CONSTRAINT `type_id_refs_id_2573889` FOREIGN KEY (`type_id`) REFERENCES `personnel_iccard` (`id`);

--
-- Constraints for table `personnel_leavelog`
--
ALTER TABLE `personnel_leavelog`
  ADD CONSTRAINT `UserID_id_refs_userid_9c50bf0` FOREIGN KEY (`UserID_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `personnel_positions`
--
ALTER TABLE `personnel_positions`
  ADD CONSTRAINT `parent_id_refs_id_59becf49` FOREIGN KEY (`parent_id`) REFERENCES `personnel_positions` (`id`);

--
-- Constraints for table `personnel_state`
--
ALTER TABLE `personnel_state`
  ADD CONSTRAINT `country_id_refs_id_a74d6b2` FOREIGN KEY (`country_id`) REFERENCES `personnel_countries` (`id`);

--
-- Constraints for table `schclass_break_times`
--
ALTER TABLE `schclass_break_times`
  ADD CONSTRAINT `breaktime_id_refs_id_731649fb` FOREIGN KEY (`breaktime_id`) REFERENCES `att_breaktime` (`id`),
  ADD CONSTRAINT `schclass_id_refs_SchclassID_287b8ebc` FOREIGN KEY (`schclass_id`) REFERENCES `schclass` (`SchclassID`);

--
-- Constraints for table `setuseratt`
--
ALTER TABLE `setuseratt`
  ADD CONSTRAINT `UserID_id_refs_userid_227b877c` FOREIGN KEY (`UserID_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `city_id_refs_id_58a85440` FOREIGN KEY (`city_id`) REFERENCES `personnel_cities` (`id`),
  ADD CONSTRAINT `country_id_refs_id_79222ee2` FOREIGN KEY (`country_id`) REFERENCES `personnel_countries` (`id`),
  ADD CONSTRAINT `defaultdeptid_refs_DeptID_17a2b9c0` FOREIGN KEY (`defaultdeptid`) REFERENCES `departments` (`DeptID`),
  ADD CONSTRAINT `education_id_refs_id_95e1866` FOREIGN KEY (`education_id`) REFERENCES `personnel_education` (`id`),
  ADD CONSTRAINT `morecard_group_id_refs_id_1069ef02` FOREIGN KEY (`morecard_group_id`) REFERENCES `acc_morecardempgroup` (`id`),
  ADD CONSTRAINT `national_id_refs_id_3450c405` FOREIGN KEY (`national_id`) REFERENCES `personnel_national` (`id`),
  ADD CONSTRAINT `position_id_refs_id_125c87d4` FOREIGN KEY (`position_id`) REFERENCES `personnel_positions` (`id`),
  ADD CONSTRAINT `state_id_refs_id_4198f6f5` FOREIGN KEY (`state_id`) REFERENCES `personnel_state` (`id`);

--
-- Constraints for table `userinfo_attarea`
--
ALTER TABLE `userinfo_attarea`
  ADD CONSTRAINT `area_id_refs_id_50a67231` FOREIGN KEY (`area_id`) REFERENCES `personnel_area` (`id`),
  ADD CONSTRAINT `employee_id_refs_userid_1db999aa` FOREIGN KEY (`employee_id`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `user_of_run`
--
ALTER TABLE `user_of_run`
  ADD CONSTRAINT `NUM_OF_RUN_ID_refs_Num_runID_3d45cc96` FOREIGN KEY (`NUM_OF_RUN_ID`) REFERENCES `num_run` (`Num_runID`),
  ADD CONSTRAINT `userid_refs_userid_5fa65de` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `user_speday`
--
ALTER TABLE `user_speday`
  ADD CONSTRAINT `DateID_refs_LeaveID_2d5c00f` FOREIGN KEY (`DateID`) REFERENCES `leaveclass` (`LeaveID`),
  ADD CONSTRAINT `userid_refs_userid_58fb1ceb` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `user_temp_sch`
--
ALTER TABLE `user_temp_sch`
  ADD CONSTRAINT `userid_refs_userid_2a036f9c` FOREIGN KEY (`userid`) REFERENCES `userinfo` (`userid`);

--
-- Constraints for table `worktable_groupmsg`
--
ALTER TABLE `worktable_groupmsg`
  ADD CONSTRAINT `group_id_refs_id_38b9d9d1` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`),
  ADD CONSTRAINT `msgtype_id_refs_id_38769aa5` FOREIGN KEY (`msgtype_id`) REFERENCES `worktable_msgtype` (`id`);

--
-- Constraints for table `worktable_instantmsg`
--
ALTER TABLE `worktable_instantmsg`
  ADD CONSTRAINT `msgtype_id_refs_id_3e2f3bb5` FOREIGN KEY (`msgtype_id`) REFERENCES `worktable_msgtype` (`id`);

--
-- Constraints for table `worktable_usrmsg`
--
ALTER TABLE `worktable_usrmsg`
  ADD CONSTRAINT `msg_id_refs_id_2f4ceb98` FOREIGN KEY (`msg_id`) REFERENCES `worktable_instantmsg` (`id`),
  ADD CONSTRAINT `user_id_refs_id_32198701` FOREIGN KEY (`user_id`) REFERENCES `auth_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
