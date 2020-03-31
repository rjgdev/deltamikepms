DROP TABLE dm_security;
DROP TABLE dm_billing;

CREATE TABLE `dm_security` (
  `securityID` bigint(20) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `dm_security` (`securityID`, `confirmPassword`) VALUES
(1, 'test');

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
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `dm_security`
  ADD PRIMARY KEY (`securityID`);
  
ALTER TABLE `dm_billing`
  ADD PRIMARY KEY (`billingID`);
  
ALTER TABLE `dm_security`
  MODIFY `securityID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
ALTER TABLE `dm_billing`
  MODIFY `billingID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;