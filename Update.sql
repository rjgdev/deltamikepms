DROP TABLE IF EXISTS dm_retirement;
DROP TABLE IF EXISTS dm_thrmonth;
DROP TABLE IF EXISTS dm_billing;
DROP TABLE IF EXISTS dm_overtime;
DROP TABLE IF EXISTS dm_employeeleave;

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


ALTER TABLE `dm_retirement`
  ADD PRIMARY KEY (`retirementID`);

ALTER TABLE `dm_thrmonth`
  ADD PRIMARY KEY (`thrmonthID`);

ALTER TABLE `dm_billing`
  ADD PRIMARY KEY (`billingID`);

ALTER TABLE `dm_overtime`
  ADD PRIMARY KEY (`overtimeID`);

ALTER TABLE `dm_employeeleave`
  ADD PRIMARY KEY (`employeeleaveID`);
  
ALTER TABLE `dm_retirement`
  MODIFY `retirementID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `dm_thrmonth`
  MODIFY `thrmonthID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `dm_billing`
  MODIFY `billingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `dm_overtime`
  MODIFY `overtimeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `dm_employeeleave`
  MODIFY `employeeleaveID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;