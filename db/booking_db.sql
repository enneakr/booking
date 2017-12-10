-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 12:29 PM
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

--
-- Dumping data for table `assignlocation`
--

INSERT INTO `assignlocation` (`LocationID`, `EventID`, `TierNo`) VALUES
(2, 1, 2),
(5, 1, 1),
(8, 2, 3),
(19, 4, 5),
(8, 5, 6),
(26, 7, 8),
(29, 8, 9);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `UserID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`UserID`, `Tel`) VALUES
('boeing', '0811111199'),
('boeing', '0822222222'),
('kao', '0833333333'),
('yorsh44', '0844444444');

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

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`CardID`, `CardNumber`, `UserID`, `NameOnCard`, `ExpireMonth`, `ExpireYear`, `Method`) VALUES
(1, '1111111111111111', 'boeing', 'boeing', 12, 2018, 'VISA'),
(2, '2222222222222222', 'boeing', 'boeing', 11, 2019, 'MASTERCARD'),
(3, '3333333333333333', 'kao', 'kaolin', 1, 2018, 'VISA'),
(4, '4444444444444444', 'yorsh44', 'yorsh', 12, 2018, 'VISA');

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
  `isCancel` tinyint(1) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` text COLLATE utf8_unicode_ci,
  `HeaderUrl` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`EventID`, `EventName`, `RegID`, `StartEventDate`, `EndEventDate`, `StartEventTime`, `EndEventTIme`, `isCancel`, `TypeID`, `CreatedDate`, `Description`, `HeaderUrl`) VALUES
(1, 'TEDx', 1, '2017-12-01', '2017-12-08', '06:00:00', '13:00:00', 0, 5, '2017-12-06 19:07:14', 'ED.com, home of TED Talks, is a global initiative about ideas worth spreading via TEDx, the TED Prize, TED Books, TED Conferences, TED-Ed and more.', 'rs/tedx.jpg'),
(2, 'Unzip', 1, '2017-12-06', '2017-12-08', '06:00:00', '12:00:00', 0, 5, '2017-12-06 19:10:52', '-', ''),
(4, 'Devtalk', 1, '2017-12-20', '2017-12-21', '10:00:00', '15:00:00', 0, 2, '2017-12-07 20:25:48', 'Talk with Dev.', NULL),
(5, 'Poker Day', 1, '2017-12-29', '2017-12-30', '13:00:00', '15:00:00', 1, 1, '2017-12-07 21:24:33', 'Poker playing meet up.', NULL),
(7, 'ee', 1, '2017-12-11', '2017-12-28', '13:02:00', '02:02:00', 1, 5, '2017-12-08 10:36:20', 'qqqqq', NULL),
(8, 'We day', 1, '2017-12-14', '2017-12-15', '13:00:00', '17:00:00', 0, 6, '2017-12-08 21:26:08', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `TypeID` int(10) NOT NULL,
  `TypeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`TypeID`, `TypeName`) VALUES
(1, 'Meeting'),
(2, 'Technology'),
(3, 'Music'),
(4, 'Sport'),
(5, 'Education'),
(6, 'Conference'),
(7, 'Entertainment'),
(8, 'Workshop'),
(9, 'Bussiness'),
(10, 'Other');

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

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`LocationID`, `LocationName`, `Description`, `Url`) VALUES
(1, 'Siam Kempinski Hotel', 'Located on the vibrant Sukhumvit Soi 11, just a 7-minute walk from BTS Nana Skytrain Station, Travelodge Sukhumvit 11 offers minimal accommodation with free WiFi and private parking on site.', 'www.nope.com'),
(2, 'Centre Point Sukhumvit 10 Opens in new window', 'Located in Bangkok, 0.7 miles from Queen Sirikit National Convention Center, Centre Point Sukhumvit 10 features a restaurant and free WiFi. Guests can enjoy the on-site restaurant.', 'www.nope.com'),
(3, 'Wat Phra Kaeo', 'This temple is more commonly known as Temple of the Emerald Buddha; it is one of the city\'s most historic temples and is located close to the Grand Palace.', 'www.nope.com'),
(4, 'Wang Lang', 'This pier is located on the southern rim of the Khlong Bangkok Noi Canal mouth, ferries land at this pier traveling to Tha Chang and the Tha Phrachan Pier', 'www.nope.com'),
(5, 'Bangkok National Museum', 'This museum is located in the 18th century former palace (Wang Na) or Front Palace of the Vice King. King Rama V opened the museum in 1874 to display his father (King Rama IV – Mongkut)\'s private collection of antiques and art. The museum holds the largest collection of Thai art', 'www.nope.com'),
(6, 'Central World', 'CentralWorld is a massive shopping center with all the shopping opportunities you could ask for and plenty of entertainment as well. The shopping center has 8 floors, 550,000m² of store space and a total 830,000m² in all. The building has two towers, a hotel tower and office tower', 'www.nope.com'),
(7, 'Rose Garden', 'The Rose Garden Cultural Center is located about 30km out of Bangkok, it covers 75 acres and consists of landscaped gardens, a lake, picnic areas and restaurants on the water\'s edge. A visit to the Rose Garden gives you a chance to see typical rural life in Thailand.', 'www.nope.com'),
(8, 'Siam Ocean World', 'This aquarium is located beneath the Siam Paragon Shopping Center; it is one of the largest aquariums in Southeast Asia covering 10,000m²', 'www.nope.com'),
(18, 'Anywhere', NULL, NULL),
(19, 'KMUTT', NULL, NULL),
(20, 'KMITL', NULL, NULL),
(21, 'KMUTNB', NULL, NULL),
(22, 'Konohagakure', NULL, NULL),
(23, 'Yubaba Castle', NULL, NULL),
(24, 'Valley of Wind', NULL, NULL),
(25, 'Island Turtle', NULL, NULL),
(26, 'Fortune Cookie Attendence', NULL, NULL),
(27, 'Babayaga Castle', NULL, NULL),
(28, 'google', NULL, NULL),
(29, 'Thonburi Garden', NULL, NULL);

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
(1, 'Student'),
(2, 'Teacher'),
(3, 'Clerk'),
(4, 'Accountant'),
(5, 'Ambassador'),
(6, 'Animator'),
(7, 'Chef'),
(8, 'Economist');

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

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderNo`, `TotalPaid`, `OrderDate`, `Status`, `PaymentDate`, `UserID`, `CardID`) VALUES
(1, 0, '2017-12-06 19:50:55', 1, '2017-12-07 17:00:00', 'kao', 3),
(2, 50, '2017-12-06 19:50:55', 1, '2017-12-07 17:00:00', 'boeing', 2),
(3, 100, '2017-12-06 19:52:28', 1, '2017-12-07 17:00:00', 'yorsh44', 4),
(4, 0, '2017-12-06 19:52:28', 1, NULL, 'boeing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderDetailID` int(10) NOT NULL,
  `OrderNo` int(10) NOT NULL,
  `TierNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`OrderDetailID`, `OrderNo`, `TierNo`) VALUES
(1, 3, 3),
(2, 3, 3),
(3, 2, 2),
(4, 1, 3);

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
  `ApprovedStatus` tinyint(1) NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ContactName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `RegNote` text COLLATE utf8_unicode_ci,
  `ContactTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `LogoUrl` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`RegID`, `OrganizerID`, `Password`, `Facebook`, `Line`, `Website`, `Description`, `ApprovedStatus`, `CompanyName`, `ContactName`, `RegNote`, `ContactTime`, `LogoUrl`) VALUES
(1, 'orguOSDRnZ', 'i4XCnN', 'ttttttttt', 'uuuuu', 'www.cpe.kmutt.ac.th', 'E.ENG in Computer Engineering ', 1, 'Kmutt', 'CPE', '-', 'MON-FRI 8.00-16.00', '-'),
(2, 'PowerBy', '1234', 'facebook/powerbuy', 'power buy', 'www.powerbuy.com', 'Power Buy Shopping Online', 1, 'Power Buy', 'John Cena', '-', 'Mon-Fri 8.00-17.00', '-'),
(3, 'NASA', '1234', 'facebook/NASA', 'NASA44', 'www.nasa.com', 'NASA.gov brings you the latest news, images and videos from Americas space agency, pioneering the future in space exploration, scientific discovery and aeronautics research.', 1, 'ns', 'JDBC', '-', 'Mon-Fri 8.00-17.00', '-'),
(4, 'GiantBike', '1234', 'facebook.com/GB', 'GiantBike', 'https://www.giant-bicycles.com/', 'Giant Bicycles\' official site provides Giant\'s latest bikes, accessories, news, promotion, event, pro cycling team and where to find bicycle dealers near you.', 1, 'giantlike', 'Big', '-', 'MON-FRI 10.00-20.00', '-'),
(5, 'BlackDevil', '1234', 'facebook.com/bd', 'bd44', 'wwww.blackDevil.com', '-', 1, 'BD', 'Black', '-', 'MON-TUE 9.00-10.00', '-');

-- --------------------------------------------------------

--
-- Table structure for table `organizeremail`
--

CREATE TABLE `organizeremail` (
  `RegID` int(10) NOT NULL,
  `EmailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizeremail`
--

INSERT INTO `organizeremail` (`RegID`, `EmailAddress`) VALUES
(1, 'cpekmutt2@mail.kmutt.ac.th'),
(2, 'superpower@live.com'),
(3, 'nasagenius@hotmail.com'),
(4, 'giantbike@mail.ac.th'),
(5, 'black01@gmail.com'),
(5, 'black02@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organizertel`
--

CREATE TABLE `organizertel` (
  `RegID` int(10) NOT NULL,
  `Tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizertel`
--

INSERT INTO `organizertel` (`RegID`, `Tel`) VALUES
(1, '024567654'),
(2, '042897654'),
(3, '039581223'),
(4, '013333333'),
(5, '026660022');

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

--
-- Dumping data for table `tier`
--

INSERT INTO `tier` (`TierNo`, `Name`, `MaxQuantity`, `Price`, `StartRegDate`, `EndRegDate`, `StartRegTime`, `EndRegTime`) VALUES
(1, 'Free', 30, 0, '2017-12-02', '2017-12-03', '04:00:00', '09:00:00'),
(2, 'Business', 20, 100, '2017-12-04', '2017-12-11', '07:00:00', '14:00:00'),
(3, 'Education', 50, 0, '2017-12-08', '2017-12-11', '03:00:00', '10:00:00'),
(5, 'Early Bird', 20, 1000, '2017-12-12', '2017-12-13', '00:00:00', '00:00:00'),
(6, 'Poker Mania', 10, 10000, '2017-12-20', '2017-12-25', '00:00:00', '00:00:00'),
(8, 'TTTT', 4, 22, '2017-12-19', '2017-12-20', '02:03:00', '02:04:00'),
(9, 'WE', 5, 10, '2017-12-13', '2017-12-14', '00:00:00', '12:00:00');

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
('boeing', 'Thanarit', 'Lert', '81dc9bdb52d04dc20036dbd8313ed055', '-', '2017-12-06 19:28:39', 'mama@gmail.com', 1, 'faceboook.com/thanatit', 'M', '2012-07-01', '1', 0, 1),
('kao', 'Vorachote', 'Most Handsome man alive', '81dc9bdb52d04dc20036dbd8313ed055', '-', '2017-12-06 19:31:24', 'knea@gmail.com', 6, 'facebook.com/kao', 'M', '2009-09-17', '1', 0, 1),
('Newuser', 'New', 'Nunon', '81dc9bdb52d04dc20036dbd8313ed055', NULL, '2017-12-08 04:53:34', 'new_non@gmail.com', 1, NULL, '', '0000-00-00', '73e26516571c1be1604122c796298320e424a43a', 0, 0),
('u600kkkkkk', 'rtyu', 'hjkl', '3bad6af0fa4b8b330d162e19938ee981', NULL, '2017-12-08 10:39:16', 'jjj@tgmail.com', 1, NULL, '', '0000-00-00', '9c899a4b13b2d30802e74ab75d55b0f1e96e7689', 0, 0),
('yorsh44', 'Thanathip', 'Sunate', '81dc9bdb52d04dc20036dbd8313ed055', '-', '2017-12-06 19:32:11', 'yorsh44@gmail.ocm', 1, 'facebook.com/yorsh44', 'M', '2017-12-01', '1', 0, 1);

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
  MODIFY `CardID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `TypeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `LocationID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `JobID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `OrderDetailID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `RegID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tier`
--
ALTER TABLE `tier`
  MODIFY `TierNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
