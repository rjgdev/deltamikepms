DROP TABLE dm_payroll;
DROP TABLE dm_billing;

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
  `bstatus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `dm_payroll`
  ADD PRIMARY KEY (`payrollID`);

ALTER TABLE `dm_billing`
  ADD PRIMARY KEY (`billingID`);

ALTER TABLE `dm_payroll`
  MODIFY `payrollID` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `dm_billing`
  MODIFY `billingID` bigint(20) NOT NULL AUTO_INCREMENT;