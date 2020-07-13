CREATE FUNCTION SPLIT_STR(
  x VARCHAR(255),
  delim VARCHAR(12),
  pos INT
)
RETURNS VARCHAR(255)
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(x, delim, pos),
       CHAR_LENGTH(SUBSTRING_INDEX(x, delim, pos -1)) + 1),
       delim, "");

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
  `housenumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `streetname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contactinfo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilstatus` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `citizenship` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hireddate` date NOT NULL,
  `departmentID` bigint(20) NOT NULL,
  `designationID` bigint(20) NOT NULL,
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
(1, 'Maricelle', '', 'Magtanong', 'Female', '1701', 'Julia Vargas', 'San Antonio', 'Pasig', '2020-04-17', '0927-947-5792', 'Single', 'Filipino', '2020-04-16', 3, 7, 0, 1, 1, 'admin', 'admin', '6834.0000', '310.6363', '100.0000', '5000.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '1.jpg', 0, '2019-11-25 08:26:51.905646'),
(2, 'Cardo', '', 'Dalisay', 'Female', '', 'Opel', '175', 'Caloocan', '1960-03-10', '0927-947-5792', 'Single', 'Filipino', '2015-03-10', 5, 15, 2, 2, 2, 'staff', 'staff', '85.0000', '500.0000', '400.0000', '250.0000', '200.0000', '0.0000', 0, '', '', '234-676-455', '09-8765678-9', '56-798765456-7', '0098-7687-6465', 'Active', 1, '2.jpg', 1, '2019-11-25 08:26:54.102823'),
(3, 'John', 'y', 'Wick', 'Male', '', 'J. Vargas', 'San Antonio', 'Pasig', '1987-09-02', '0938-712-8975', 'Married', 'Fiipino', '2015-01-06', 5, 15, 1, 2, 2, 'exe', 'exe', '500.5050', '250.0000', '50.0000', '0.0000', '0.0000', '0.0000', 1, '', '9243-895-832-94', '213-456-789', '23-4567893-2', '23-456787654-3', '5432-1234-5643', 'Active', 1, '3.jpg', 1, '2019-12-03 11:56:31.366887'),
(4, 'Mary Rose', '', 'Vitor', 'Female', '', 'Sapang Hari', 'Newtown', 'Lapu-Lapu City', '1984-01-10', '0934-762-3857', 'Married', 'Filipino', '2015-02-03', 2, 5, 0, 1, 0, 'mrvitor', 'password', '21342.0000', '970.0909', '250.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '12-3123456-7', '13-214325365-4', '3243-5436-5442', 'Active', 2, '4.jpg', 0, '2019-12-20 07:50:01.399405'),
(5, 'Jeffrey', '', 'Cauguiran', 'Male', '2811', 'Cup Point', 'Fashion Hall', 'Old Town Road', '1978-03-09', '0938-764-3872', 'Married', 'Filipino', '2005-10-05', 8, 19, 0, 1, 0, 'mahnamejeff', 'password', '92000.0000', '4181.8182', '10000.0000', '1000.0000', '0.0000', '0.0000', 1, 'Curry Venti Regionals', '2820-191-115-51', '439-857-493', '24-3546786-9', '45-654334567-6', '6534-5677-6543', 'Active', 2, '5.jpg', 0, '2019-12-23 03:58:25.632917'),
(6, 'Cyndy', '', 'Marcellana', 'Female', 'asr3', 'sadsfsd', 'asdsad', 'asdsf a', '1994-06-15', '0978-463-5879', 'Single', 'Filipino', '2019-06-11', 2, 3, 0, 1, 0, 'cyndy', 'password', '12312.0000', '559.6364', '10.0000', '0.0000', '0.0000', '0.0000', 2, 'test account', '243 657 89 654', '123-546-213', '42-1123432-1', '54-678645454-3', '4323-4565-3245', 'Active', 2, '6.jpg', 0, '2019-12-23 06:11:05.731548'),
(7, 'Account', '', 'Officer', 'Male', '322', 'qe2 fd', 'd 3221f', '3 rwsdg', '2020-03-10', '0943-287-5236', 'Single', 'Filipino', '2020-03-11', 5, 20, 0, 1, 0, 'aofficer', 'password', '982.0000', '44.6364', '2.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '678-765-476', '67-4675456-5', '56-546754676-5', '5676-5675-6765', 'Active', 2, '7.jpg', 0, '2020-01-02 03:32:04.769082'),
(8, 'Operation', '', 'Manager', 'Male', '', 'TEST', 'TEST', 'TEST', '2020-03-10', '0956-876-5827', 'Single', 'Filipino', '2020-03-10', 8, 18, 0, 1, 0, 'omanager', 'password', '9832.0000', '446.9091', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '231-456-789', '78-9876543-2', '56-789087654-3', '4345-6789-0987', 'Active', 2, '8.jpg', 0, '2020-01-09 11:36:25.875891'),
(9, 'Noemi', '', 'Gaylan', 'Male', '', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1978-10-11', '0934-237-5988', 'Married', 'Filipino', '2005-07-21', 4, 11, 0, 1, 0, 'noemi', 'password', '5341.0000', '242.7727', '1000.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '456-789-098', '78-7554578-9', '56-788976543-4', '3475-6767-8754', 'Active', 2, '9.jpg', 0, '2020-01-09 11:40:54.965467'),
(10, 'Billy', '', 'Pascua', 'Male', '', 'JUAN', 'JUAN', 'JUAN', '1977-03-17', '0976-432-8628', 'Married', 'Filipino', '2005-07-28', 8, 21, 0, 2, 0, 'billy', 'password', '500.5050', '0.0909', '0.0000', '1234.0000', '0.0000', '0.0000', 1, '', '2432-568-376-52', '231-456-789', '24-5678965-4', '76-543234567-8', '5432-3456-7897', 'Active', 2, '', 0, '2020-01-09 11:46:07.385507'),
(11, 'Cristalyn', '', 'Cruzada', 'Female', '43589', 'Amorsolo Street', 'Pinagbuhatan', 'Pasig City', '2020-03-10', '0989-867-2987', 'Single', 'Filipino', '2020-03-10', 4, 10, 0, 2, 0, '', '', '12567.3000', '571.2409', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '87-6543245-6', '34-567899876-5', '4678-6543-5678', 'Active', 2, '', 0, '2020-01-09 11:50:25.340515'),
(12, 'Cyber Jonald', '', 'Coballes', 'Male', '565', 'Pachecho Street', 'One Orchard ', 'Quezon City', '2020-03-10', '0937-578-5687', 'Married', 'Filipino', '2020-03-10', 2, 4, 0, 2, 0, '', '', '15000.0000', '6818.8182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678654-3', '43-456789765-4', '6754-3456-7876', 'Active', 2, '', 0, '2020-01-09 11:53:12.623726'),
(13, 'Lea', '', 'Ylanan', 'Female', '', '79A Reyes Compound', 'Manggahan', 'Pasig City', '2020-03-10', '0946-574-8376', 'Married', 'Filipino', '2020-03-10', 2, 3, 0, 2, 0, '', '', '6705.0400', '304.7745', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-890', '34-5678908-7', '45-678908765-4', '6543-4567-8976', 'Active', 2, '', 0, '2020-01-09 11:54:58.434185'),
(14, 'Anna Jemima', '', 'Molino', 'Female', '65', 'Downtown Ridge', 'Bacoor', 'Cavite', '2020-03-10', '0975-567-8765', 'Single', 'Filipino', '2020-03-10', 2, 3, 0, 2, 0, '', '', '36000.0000', '1636.3636', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '234-567-865', '56-5564324-5', '67-654321345-6', '7654-3456-7543', 'Active', 2, '', 0, '2020-01-09 13:11:56.434744'),
(15, 'Alfredo', '', 'Gonzaga', 'Male', '46 ', 'Concepcion Street', 'Bangkal', 'Marikina City', '2020-03-10', '0975-324-5678', 'Married', 'Filipino', '2020-03-10', 3, 9, 0, 2, 0, '', '', '22882.1600', '1040.0982', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '345-678-990', '45-6789090-8', '45-678908765-4', '3456-7890-9870', 'Active', 2, '', 0, '2020-01-10 06:36:31.166842'),
(16, 'Michael Jihn', '', 'Maron', 'Male', '546A Adelf', 'Yen Street', 'Bagong Ilog', 'Pasig City', '2020-03-10', '0953-345-6789', 'Single', 'Filipino', '2020-03-10', 3, 8, 0, 2, 0, '', '', '15000.0000', '681.8182', '0.0000', '0.0000', '0.0000', '0.0000', 2, 'Michael Jihn Maron', '3456-7654-3213-4', '345-678-965', '56-7876545-4', '34-567876543-4', '6787-6567-7656', 'Active', 2, '', 0, '2020-01-10 09:25:43.559167'),
(17, 'Montano', 'Macalua', 'Abarsolo', 'Male', '', 'Sitio Sto Nino', 'Basak Tamiya', 'Lapu Lapu City', '2020-03-10', '0917-971-5870', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '12435.0000', '565.2273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '421-894-412', '06-2711892-2', '12-050966951-7', '1640-0007-3900', 'Active', 1, '', 1, '2020-02-17 01:03:25.193494'),
(18, 'Richie', 'Rodrigo', 'Artezuela', 'Male', '', 'Casanta', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0987-654-6789', 'Single', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '13436.0000', '610.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6478115-3', '09-303427427-1', '0302-6324-2854', 'Active', 1, '', 1, '2020-02-17 01:07:07.178939'),
(19, 'Richard', 'Briones', 'Abarquez', 'Male', '', 'Alangalang', 'Alangalang', 'Mandaue City', '2020-03-10', '0945-600-9497', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 1, 0, '', '', '24423.0000', '1110.1364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2264628-2', '12-050813657-4', '1211-1240-5852', 'Active', 1, '', 1, '2020-02-17 01:11:14.928189'),
(20, 'Mateo Jr.', 'Capute', 'Anura', 'Male', '', 'Purok Lubi', 'Canjulao', 'Lapu Lapu City', '2020-03-10', '0943-298-4723', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 1, 0, '', '', '2144.0000', '97.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3219363-1', '09-229238736-1', '1205-1303-4348', 'Active', 1, '', 1, '2020-02-17 01:14:30.187504'),
(21, 'Jessie', 'Virtudes', 'Aclo', 'Male', '', 'Saac 2', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0924-953-4586', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 1, 0, '', '', '3534.0000', '160.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '222-381-749', '33-7842651-7', '19-089509944-2', '1211-2111-7894', 'Active', 1, '', 1, '2020-02-17 01:16:48.073457'),
(22, 'Edison', 'Anunciado', 'Alcover', 'Male', '', 'Victoria Homes ', 'Sudtungan Basak', 'Lapu Lapu City', '2020-03-10', '0921-487-3642', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 1, 0, '', '', '23423.0000', '1064.6818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '289-076-696', '36-0027832-9', '02-050729485-6', '1211-0935-7230', 'Active', 1, '', 1, '2020-02-17 01:19:28.717081'),
(23, 'Jovencia', 'Laborte', 'Antiola', 'Female', '', 'Kawot', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0912-478-3682', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '21312.0000', '968.7273', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '270-576-276', '06-2741392-8', '12-050648920-8', '1210-1131-2354', 'Active', 1, '', 1, '2020-02-17 01:21:54.538877'),
(24, 'Helen', 'Velasquez', 'Ayuso', 'Female', '', 'Longos Apt Site Tagle Apt', 'Basuk', 'Lapu Lapu City', '2020-03-10', '0921-932-6484', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '24321.0000', '1105.5000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '319-931-309', '06-2704616-2', '12-050973461-0', '1210-2964-2007', 'Active', 1, '', 1, '2020-02-17 01:24:41.289978'),
(25, 'Jonathan', 'Albert', 'Ba-aclo', 'Male', '', 'Isuya', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0921-472-6483', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '4532.0000', '206.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '252-881-357', '06-2456183-1', '15-200643702-2', '1211-7120-2235', 'Active', 1, '', 1, '2020-02-17 01:27:34.149798'),
(26, 'Ricky', 'Acain', 'Balucan', 'Male', '', 'Soong', 'Mactan', 'Lapu Lapu', '2020-03-10', '0912-487-3264', 'Married', 'Filipino', '2020-03-10', 5, 15, 1, 2, 0, '', '', '6856.0000', '311.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '08-2315386-2', '00-000000000-0', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:29:35.502704'),
(27, 'Alberto III', 'Tampus', 'Cabalhug', 'Male', '', 'Bankal', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0943-856-2387', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-1537051-0', '12-050458523-4', '1670-0131-5826', 'Active', 1, '', 1, '2020-02-17 01:31:58.295240'),
(28, 'Alfredo', 'Tayapad', 'Cabanes', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0923-986-3487', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '21234.0000', '965.1818', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '34-6185532-5', '12-201611748-8', '0000-0000-0000', 'Active', 1, '', 1, '2020-02-17 01:35:33.401802'),
(29, 'Evamar', 'Dulfo', 'Cagande', 'Male', '26 ', 'Fabro Hills Subdivision', 'Pusuk', 'Lapu Lapu City', '2020-03-10', '0932-365-8734', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '191-732-735', '06-1623222-0', '12-050358252-5', '1210-4630-8741', 'Active', 1, '', 1, '2020-02-17 01:38:27.546361'),
(30, 'Randy', 'Sarsuelo', 'Calumba', 'Male', '', 'Buyong', 'Malibago', 'Lapu Lapu City', '2020-03-10', '0935-984-3759', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '3241.0000', '147.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '344-679-720', '06-2600111-1', '12-025515278-0', '1211-6762-0450', 'Active', 1, '', 1, '2020-02-17 01:41:09.505776'),
(31, 'Ronald', 'Sagario', 'Carillas', 'Male', '', 'Saac II', 'Buaya', 'Lapu Lapu City', '2020-03-10', '0934-598-4853', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '4324.0000', '196.5454', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '434-955-219', '06-2970380-1', '14-201738708-0', '1211-0531-5590', 'Active', 1, '', 1, '2020-02-17 01:44:05.987425'),
(32, 'Vernie', 'Ortega', 'Cañete', 'Male', '', 'Saac', 'Mactan', 'Lapu Lapu City', '2020-03-10', '0923-923-6873', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24324.0000', '1105.6364', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-2428417-6', '12-050581984-0', '1210-8736-3481', 'Active', 1, '', 1, '2020-02-17 01:46:23.666511'),
(33, 'Benjie Mark', 'Sino', 'Caroro', 'Male', '', 'Umapad', 'Mandaue', 'Cebu City', '2020-03-10', '0924-392-6587', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24235.0000', '1101.5909', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-4131601-4', '12-025798771-5', '1212-3462-9680', 'Active', 1, '', 1, '2020-02-17 01:48:29.572100'),
(34, 'Corazon', 'Gigante', 'Cartesiano', 'Female', '', 'Basak', 'Kagudoy', 'Lapu Lapu City', '2020-03-10', '0923-726-5848', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24232.0000', '1101.4545', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '334-454-473', '06-2427015-1', '12-050661210-7', '1270-2047-2713', 'Active', 1, '', 1, '2020-02-17 01:50:23.656968'),
(35, 'Jessie', '', 'Casonete', 'Female', '', 'Ticgahon', 'Bankal', 'Lapu Lapu City', '2020-03-10', '0932-857-4385', 'Single', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '24234.0000', '1101.5455', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '06-3913351-3', '12-025646769-6', '1212-0540-0094', 'Active', 1, '', 1, '2020-02-17 01:53:27.296675'),
(36, 'Loida', 'Abajo', 'Cimafranca', 'Female', '', 'New Lipata', 'Pusok', 'Lapu Lapu City', '2020-03-10', '0923-534-6587', 'Married', 'Filipino', '2020-03-10', 5, 15, 2, 2, 0, '', '', '19389.0004', '881.3182', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '495-304-269', '06-1705858-4', '12-050116040-1', '1210-3816-0502', 'Active', 1, '', 1, '2020-02-17 01:55:47.487867'),
(37, 'Juan', '', 'Dela Cruz', 'Male', '', 'Antel', 'Pinagbuhatan', 'Pasig', '1994-07-13', '0909-090-9090', 'Single', 'Filipino', '2020-03-25', 1, 6, 1, 2, 0, 'test', 'test', '0.0000', '800.0000', '1000.0000', '10000.0000', '1000.0000', '0.0000', 1, 'Test', '0000-000-00', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 1, '37.jpg', 1, '2020-03-25 08:28:17.837846'),
(38, 'try', 'try', 'try', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, 4, 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:39:58.330067'),
(39, 'trytest', 'try', 'trytest', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, 4, 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:40:17.279991'),
(40, 'testing', 'try', 'testing', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, 4, 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:40:42.275416'),
(41, 'jejejeje', 'try', 'jejej', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, 4, 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:44:14.060807'),
(42, 'bingbong', 'try', 'bongbong', 'Male', 'try', 'try', 'try', 'try', '2020-03-27', '2345-678-6543', 'Single', 'try', '2020-03-27', 2, 4, 0, 3, 0, 'try', 'try', '2543.0000', '214.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:44:46.152778'),
(43, 'bbboi', 'boi', 'boiboiboi', 'Male', '71246', 'jk hwfesudf', ' ETIURTGEW', '2312 r', '2020-03-02', '8778-435-4853', 'Single', 'sdj hfek', '2020-03-01', 4, 10, 0, 3, 0, 'boiboiboi', 'biboi', '432423.0000', '3463.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-03-27 08:49:49.867991'),
(44, 'post ', 'it', 'malone', 'Male', '15867', 'paper castle', 'mongol', 'clipperhead', '1910-11-24', '0921-278-5793', 'Single', 'Mongolian', '2005-01-06', 1, 14, 0, 1, 0, 'postme', 'password', '1321.0000', '543.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-04-01 09:26:19.402864'),
(45, 'Robinjamin', '', 'Gelilio', 'Male', 'Unit 4L Four Columbia Bldg. Cambridge Village Bara', 'Unit 4L Four Columbia Bldg. Cambridge Village Bara', 'wda', 'Cainta Rizal', '2020-06-01', '0927-947-5792', 'Single', 'dwa', '2020-06-01', 1, 1, 0, 1, 0, '', '', '12000.0000', '1000.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-06-01 08:49:09.704972'),
(46, 'Robinjaminww', '', 'Gelilio', 'Male', 'Unit 4L Four Columbia Bldg. Cambridge Village Bara', 'Unit 4L Four Columbia Bldg. Cambridge Village Bara', 'dwa', 'Cainta Rizal', '2020-06-01', '0927-947-5792', 'Single', 'dw', '2020-06-01', 1, 1, 0, 1, 0, '', '', '12000.0000', '1000.0000', '0.0000', '0.0000', '0.0000', '0.0000', 0, '', '', '000-000-000', '00-0000000-0', '00-000000000-0', '0000-0000-0000', 'Active', 2, '', 0, '2020-06-01 09:58:57.367013');

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
(135, 23, 2, 5),
(136, 17, 2, 9),
(141, 19, 1, 4),
(142, 19, 2, 5);

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
  `payrollType` int(11) NOT NULL,
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

--
-- Dumping data for table `dm_payroll`
--

INSERT INTO `dm_payroll` (`payrollID`, `payrollType`, `datefrom`, `dateto`, `payperiod`, `usersubmitted`, `datesubmitted`, `userapproved`, `dateapproved`, `level`, `approvalID`, `reason`, `userdenied`, `datedenied`, `payrollstatus`) VALUES
(1, 1, '2020-07-01', '2020-07-15', 1, 1, '2020-07-13 06:58:21', '1', '2020-07-13 06:58:26', 2, 3, '', '', '', 2),
(2, 2, '2020-07-01', '2020-07-15', 1, 1, '2020-07-13 06:58:33', '5|9', '2020-07-13 06:59:00|2020-07-13 06:59:21', 3, 4, '', '', '', 2),
(3, 1, '2020-07-16', '2020-07-31', 2, NULL, NULL, NULL, NULL, 0, 0, '', '', '', 0),
(4, 2, '2020-07-16', '2020-07-31', 2, NULL, NULL, NULL, NULL, 0, 0, '', '', '', 0);

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
(1, 1, 1, '07:00:00', '19:00:00', '2020-05-31', '2020-06-06'),
(2, 1, 2, '07:00:00', '19:00:00', '2020-05-31', '2020-06-06'),
(3, 2, 4, '07:00:00', '19:00:00', '2020-06-07', '2020-06-13'),
(4, 1, 2, '07:00:00', '19:00:00', '2020-06-07', '2020-06-13'),
(5, 1, 1, '07:00:00', '19:00:00', '2020-06-21', '2020-06-27');

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
(2, 2, 19, 2),
(3, 3, 17, 1),
(4, 3, 17, 2),
(5, 4, 19, 5),
(6, 5, 25, 0),
(7, 5, 25, 3);

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
(87, 17, 6),
(88, 17, 7),
(92, 19, 6),
(93, 19, 7);

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
(1, 1, '2020-06-01', '2020-06-15', 1, 1, '2020-06-23 08:50:39', '1', '2020-06-23 08:50:44', 2, 1, 2, '', NULL, NULL, 0),
(2, 1, '2020-06-16', '2020-06-30', 2, NULL, NULL, NULL, NULL, 0, 0, 0, '', NULL, NULL, 0);

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
(1, 1, 19, 'ord', 'Exist', 1, '2020-06-23 00:50:03', 'fse', '2020-06-01', 1, 1, '2020-06-01 07:00:00', '2020-06-01 19:00:00', '07:00:00', '19:00:00', '12:00:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(2, 1, 19, 'ord', 'Exist', 1, '2020-06-23 00:50:08', 'fes', '2020-06-02', 1, 2, '2020-06-02 07:54:00', '2020-06-02 19:30:00', '07:00:00', '19:00:00', '11:06:00', '07:06:00', '0.90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7.10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(3, 1, 19, '', 'Not exist', NULL, NULL, NULL, '2020-06-03', 1, 1, '2020-06-03 07:30:00', '2020-06-03 18:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(4, 1, 19, '', 'Not exist', NULL, NULL, NULL, '2020-06-04', 1, 2, '2020-06-04 06:30:00', '2020-06-04 17:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(5, 1, 19, 'rgl', 'Exist', 1, '2020-06-23 00:50:28', 'fes', '2020-06-12', 1, 2, '2020-06-12 06:30:00', '2020-06-12 17:30:00', '07:00:00', '19:00:00', '10:30:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '02:30:00', '0.00', '0.00', '0.00', '0.00', '2.50', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(6, 1, 17, 'ord', 'Exist', 1, '2020-06-23 00:50:13', 'fesfesf', '2020-06-08', 2, 4, '2020-06-08 07:00:00', '2020-06-08 19:00:00', '07:00:00', '19:00:00', '12:00:00', '08:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(7, 1, 17, 'ord', 'Exist', 1, '2020-06-23 00:50:23', 'fes', '2020-06-09', 2, 4, '2020-06-09 07:54:00', '2020-06-09 19:30:00', '07:00:00', '19:00:00', '11:06:00', '07:06:00', '0.90', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '7.10', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '04:00:00', '4.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(8, 2, 25, '', 'No schedule', NULL, NULL, NULL, '2020-06-17', 1, 1, '2020-06-17 17:50:00', '2020-06-18 03:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(9, 2, 25, '', 'No schedule', NULL, NULL, NULL, '2020-06-18', 1, 1, '2020-06-18 21:17:00', '2020-06-19 07:30:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(10, 2, 25, '', 'No schedule', NULL, NULL, NULL, '2020-06-19', 1, 1, '2020-06-19 19:14:00', '2020-06-20 06:59:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(11, 2, 25, '', 'No schedule', NULL, NULL, NULL, '2020-06-20', 1, 1, '2020-06-20 18:59:00', '2020-06-21 08:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(12, 2, 25, '', 'Not exist', NULL, NULL, NULL, '2020-06-21', 1, 1, '2020-06-21 20:01:00', '2020-06-22 07:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(13, 2, 25, 'ord', 'Exist', NULL, '2020-06-23 00:53:15', NULL, '2020-06-24', 1, 1, '2020-06-24 19:01:00', '2020-06-25 07:00:00', '07:00:00', '19:00:00', '11:59:00', '04:01:00', '12.02', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '4.02', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '16:00:00', '16.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '08:00:00', '8.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(14, 2, 25, '', 'Not exist', NULL, NULL, NULL, '2020-06-25', 1, 1, '2020-06-25 19:23:00', '2020-06-26 05:28:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(15, 2, 25, '', 'Not exist', NULL, NULL, NULL, '2020-06-26', 1, 1, '2020-06-26 18:23:00', '2020-06-27 04:43:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(16, 2, 25, '', 'Not exist', NULL, NULL, NULL, '2020-06-27', 1, 1, '2020-06-27 19:55:00', '2020-06-28 04:15:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(17, 2, 25, '', 'No schedule', NULL, NULL, NULL, '2020-06-28', 1, 1, '2020-06-28 19:00:00', '2020-06-29 05:48:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '00:00:00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `dm_timekeepingreport`
--

CREATE TABLE `dm_timekeepingreport` (
  `tkreportID` bigint(20) NOT NULL,
  `employeeID` bigint(20) NOT NULL,
  `timekeepingID` bigint(20) NOT NULL,
  `d1` varchar(40) NOT NULL,
  `d2` varchar(40) NOT NULL,
  `d3` varchar(40) NOT NULL,
  `d4` varchar(40) NOT NULL,
  `d5` varchar(40) NOT NULL,
  `d6` varchar(40) NOT NULL,
  `d7` varchar(40) NOT NULL,
  `d8` varchar(40) NOT NULL,
  `d9` varchar(40) NOT NULL,
  `d10` varchar(40) NOT NULL,
  `d11` varchar(40) NOT NULL,
  `d12` varchar(40) NOT NULL,
  `d13` varchar(40) NOT NULL,
  `d14` varchar(40) NOT NULL,
  `d15` varchar(40) NOT NULL,
  `d16` varchar(40) NOT NULL,
  `d17` varchar(40) NOT NULL,
  `d18` varchar(40) NOT NULL,
  `d19` varchar(40) NOT NULL,
  `d20` varchar(40) NOT NULL,
  `d21` varchar(40) NOT NULL,
  `d22` varchar(40) NOT NULL,
  `d23` varchar(40) NOT NULL,
  `d24` varchar(40) NOT NULL,
  `d25` varchar(40) NOT NULL,
  `d26` varchar(40) NOT NULL,
  `d27` varchar(40) NOT NULL,
  `d28` varchar(40) NOT NULL,
  `d29` varchar(40) NOT NULL,
  `d30` varchar(40) NOT NULL,
  `d31` varchar(40) NOT NULL,
  `totalhours` varchar(20) NOT NULL,
  `basichours` varchar(20) NOT NULL,
  `othours` varchar(20) NOT NULL,
  `restday` varchar(20) NOT NULL,
  `totaldays` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dm_timekeepingreport`
--

INSERT INTO `dm_timekeepingreport` (`tkreportID`, `employeeID`, `timekeepingID`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `totalhours`, `basichours`, `othours`, `restday`, `totaldays`) VALUES
(1, 19, 1, '12:00|08:00|04:00|1|2|1|1', '11:06|07:06|04:00|2|2|1|2', 'notexist|0|0|3|0|1|1', 'notexist|0|0|4|0|1|2', '', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '', '', '', '', '10:30|08:00|02:30|5|2|1|2', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '33:36', '23:06', '10:30', '4', '3'),
(2, 17, 1, '', '', '', '', '', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '12:00|08:00|04:00|6|2|2|4', '11:06|07:06|04:00|7|2|2|4', '', '', '', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '23:06', '15:06', '8:00', '4', '2'),
(3, 2, 1, '', '', '', '', 'RD|0|0|0|0|1|2', 'RD|0|0|0|0|1|2', '', '', '', '', '', 'RD|0|0|0|0|1|2', 'RD|0|0|0|0|1|2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', ''),
(4, 37, 1, '', '', '', '', '', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '', '', '', '', '', 'RD|0|0|0|0|1|1', 'RD|0|0|0|0|1|1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', '');

-- --------------------------------------------------------


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
-- Indexes for table `dm_timekeepingreport`
--
ALTER TABLE `dm_timekeepingreport`
  ADD PRIMARY KEY (`tkreportID`);


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
  MODIFY `employeeleavecreditID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
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
  MODIFY `payrollID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `postscheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `scheduleID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
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
  MODIFY `timesheetID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `dm_timekeepingreport`
--
ALTER TABLE `dm_timekeepingreport`
  MODIFY `tkreportID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;