-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 03:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignlocation`
--

CREATE TABLE `assignlocation` (
  `LocationID` int(10) NOT NULL,
  `EventID` int(10) NOT NULL,
  `TierNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `UserID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `CardID` int(10) NOT NULL,
  `CardNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NameOnCard` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ExpireMonth` int(2) NOT NULL,
  `ExpireYear` int(4) NOT NULL,
  `Method` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `EventID` int(10) NOT NULL,
  `EventName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RegID` int(10) NOT NULL,
  `StartEventDate` date NOT NULL,
  `EndEventDate` date NOT NULL,
  `StartEventTime` time NOT NULL,
  `EndEventTIme` time NOT NULL,
  `isCancel` bit(1) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` text COLLATE utf8_unicode_ci,
  `HeaderUrl` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `TypeID` int(10) NOT NULL,
  `TypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `LocationID` int(10) NOT NULL,
  `LocationName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci,
  `Url` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `JobID` int(10) NOT NULL,
  `JobName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`JobID`, `JobName`) VALUES
(1, ''),
(2, 'Student'),
(3, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderNo` int(10) NOT NULL,
  `TotalPaid` float DEFAULT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` tinyint(2) NOT NULL,
  `PaymentDate` timestamp NULL DEFAULT NULL,
  `UserID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CardID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(10) NOT NULL,
  `OrderNo` int(10) NOT NULL,
  `TierNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `RegID` int(10) NOT NULL,
  `OrganizerID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Line` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Website` text COLLATE utf8_unicode_ci,
  `Description` text COLLATE utf8_unicode_ci,
  `AprovedStatus` bit(1) NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ContactName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RegNote` text COLLATE utf8_unicode_ci,
  `ContachTime` datetime NOT NULL,
  `LogoUrl` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizeremail`
--

CREATE TABLE `organizeremail` (
  `RegID` int(10) NOT NULL,
  `EmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizertel`
--

CREATE TABLE `organizertel` (
  `RegID` int(10) NOT NULL,
  `Tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tier`
--

CREATE TABLE `tier` (
  `TierNo` int(10) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `MaxQuantity` int(10) NOT NULL,
  `Price` float NOT NULL,
  `StartRegDate` date NOT NULL,
  `EndRegDate` date NOT NULL,
  `StartRegTime` time NOT NULL,
  `EndRegTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `FirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgUrl` text COLLATE utf8_unicode_ci,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `JobID` int(10) NOT NULL,
  `Facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `BirthDate` date NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '0',
  `tokenvalid` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Password`, `imgUrl`, `RegDate`, `EmailAddress`, `JobID`, `Facebook`, `Gender`, `BirthDate`, `token`, `valid`, `tokenvalid`) VALUES
('testuser', 'yorsh', 'Thanatip', '5d9c68c6c50ed3d02a2fcf54f63993b6', NULL, '2017-12-05 14:40:52', 'yorshza007@gmail.com', 1, NULL, '', '0000-00-00', 'f338892589be008baf85c4b20153f47cd53312ce', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignlocation`
--
ALTER TABLE `assignlocation`
  ADD PRIMARY KEY (`LocationID`,`TierNo`),
  ADD KEY `Fk_TierNo` (`TierNo`),
  ADD KEY `Fk_EventID` (`EventID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`UserID`,`Tel`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`CardID`),
  ADD KEY `Fk_UserID_Creditcard` (`UserID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `Fk_RegID_Event` (`RegID`),
  ADD KEY `Fk_TypeID` (`TypeID`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `Fk_UserID_Order` (`UserID`),
  ADD KEY `Fk_CardID` (`CardID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `Fk_OrderNo` (`OrderNo`),
  ADD KEY `Fk_TierNo_OrderDetail` (`TierNo`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `organizeremail`
--
ALTER TABLE `organizeremail`
  ADD PRIMARY KEY (`RegID`,`EmailAddress`);

--
-- Indexes for table `organizertel`
--
ALTER TABLE `organizertel`
  ADD PRIMARY KEY (`RegID`,`Tel`);

--
-- Indexes for table `tier`
--
ALTER TABLE `tier`
  ADD PRIMARY KEY (`TierNo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Fk_JopID` (`JobID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `CardID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `TypeID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `JobID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderNo` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderDetailID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `RegID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tier`
--
ALTER TABLE `tier`
  MODIFY `TierNo` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignlocation`
--
ALTER TABLE `assignlocation`
  ADD CONSTRAINT `Fk_EventID` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`),
  ADD CONSTRAINT `Fk_LocationID` FOREIGN KEY (`LocationID`) REFERENCES `location` (`LocationID`),
  ADD CONSTRAINT `Fk_TierNo` FOREIGN KEY (`TierNo`) REFERENCES `tier` (`TierNo`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `Fk_UserID_Contact` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD CONSTRAINT `Fk_UserID_Creditcard` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `Fk_RegID_Event` FOREIGN KEY (`RegID`) REFERENCES `organizer` (`RegID`),
  ADD CONSTRAINT `Fk_TypeID` FOREIGN KEY (`TypeID`) REFERENCES `eventtype` (`TypeID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Fk_CardID` FOREIGN KEY (`CardID`) REFERENCES `creditcard` (`CardID`),
  ADD CONSTRAINT `Fk_UserID_Order` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `Fk_OrderNo` FOREIGN KEY (`OrderNo`) REFERENCES `order` (`OrderNo`),
  ADD CONSTRAINT `Fk_TierNo_OrderDetail` FOREIGN KEY (`TierNo`) REFERENCES `tier` (`TierNo`);

--
-- Constraints for table `organizeremail`
--
ALTER TABLE `organizeremail`
  ADD CONSTRAINT `Fk_OganEmail` FOREIGN KEY (`RegID`) REFERENCES `organizer` (`RegID`);

--
-- Constraints for table `organizertel`
--
ALTER TABLE `organizertel`
  ADD CONSTRAINT `Fk_RegID_OrganTel` FOREIGN KEY (`RegID`) REFERENCES `organizer` (`RegID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Fk_JopID` FOREIGN KEY (`JobID`) REFERENCES `occupation` (`JobID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
