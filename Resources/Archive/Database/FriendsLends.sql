-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 29, 2020 at 08:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FriendsLends`
--

-- --------------------------------------------------------

--
-- Table structure for table `Addresses`
--

CREATE TABLE `Addresses` (
  `ID` int(11) NOT NULL,
  `AddrLine1` varchar(50) NOT NULL,
  `AddrLine2` varchar(20) DEFAULT NULL,
  `City` varchar(15) NOT NULL,
  `Postcode` varchar(8) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `User` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Addresses`
--

INSERT INTO `Addresses` (`ID`, `AddrLine1`, `AddrLine2`, `City`, `Postcode`, `Email`, `ContactNumber`, `User`) VALUES
(1, '12 Random Avenue', 'Bramley', 'Leeds', 'LS1 3BB', 'linzic@example.com', '01234567890', 'linzic'),
(2, '13 Random Avenue', 'Woodhouse', 'Leeds', 'LS1 4BB', 'amyr@example.com', '01234567891', 'amyr'),
(3, '14 Random Avenue', 'Adel', 'Leeds', 'LS1 5BB', 'sandyf@example.com', '01234567892', 'sandyf'),
(4, '15 Random Avenue', 'Roundhay', 'Leeds', 'LS1 6BB', 'sarahs@example.com', '01234567893', 'sarahs'),
(5, '16 Random Avenue', 'Chapel Allerton', 'Leeds', 'LS1 7BB', 'sophiae@example.com', '01234567894', 'sophiae'),
(6, '1 Random Avenue', 'Harehills', 'Leeds', 'LS1 1AB', 'martinay@example.com', '01234567895', 'martinay'),
(8, '2 Random Avenue', 'Seacroft', 'Leeds', 'LS1 2AB', 'alexb@example.com', '1234567896', 'alexb'),
(9, '3 Random Avenue', 'Meanwood', 'Leeds', 'LS1 3AB', 'lilya@example.com', '1234567897', 'lilya'),
(10, '4 Random Avenue', 'Castleford', 'Leeds', 'LS1 4AB', 'stephf@example.com', '1234567898', 'stephf'),
(11, '5 Random Avenue', 'Roundhay', 'Leeds', 'LS1 5AB', 'amritab@example.com', '1234567899', 'amritab'),
(12, '6 Random Avenue', 'Bramley', 'Leeds', 'LS1 6AB', 'bessm@example.com', '1234567900', 'bessm'),
(13, '7 Random Avenue', 'Morley', 'Leeds', 'LS1 7AB', 'clairew@example.com', '1234567901', 'clairew'),
(14, '8 Random Avenue', 'Pudsey', 'Leeds', 'LS1 8AB', 'gabbyv@example.com', '1234567902', 'gabbyv'),
(15, '9 Random Avenue', 'Whitby', 'Leeds', 'LS1 9AB', 'mariaf@example.com', '1234567903', 'mariaf'),
(16, '10 Random Avenue', 'Crossgates', 'Leeds', 'LS1 1BB', 'teseo@example.com', '1234567904', 'teseo'),
(17, '11 Random Avenue', 'Adel', 'Leeds', 'LS1 2BB', 'sophieh@example.com', '1234567905', 'sophieh');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `ID` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Headline` varchar(40) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Terms` varchar(250) DEFAULT NULL,
  `PictureLocation` varchar(200) DEFAULT NULL,
  `PickupLocation` varchar(50) DEFAULT NULL,
  `Owner` varchar(10) NOT NULL,
  `Borrower` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`ID`, `Category`, `Headline`, `Description`, `Terms`, `PictureLocation`, `PickupLocation`, `Owner`, `Borrower`) VALUES
(1, 'Household', 'Travel Cot', 'Pop up travel cot with carry bag. Assembled size H76, L99, W57cm. Suitable from birth to 3 years, for babies up to 15kg.', '', '', 'My house', 'mariaf', NULL),
(2, 'Outdoors', 'Hiking poles', 'Pair of lightweight hiking poles', 'Please clean tips after use', '', 'My house', 'amyr', NULL),
(3, 'Outdoors', 'Tennis Ball', 'Tennis ball', 'Return in one piece', '', 'My house', 'sarahs', NULL),
(4, 'Outdoors', 'Marquee', 'Heavy duty pop up gazebo with storage bag. Assembled dimensions 6m x 3m.', '', '', 'My house', 'stephf', NULL),
(5, 'Outdoors', 'Sledge', 'Sledge with brakes and seats for two adults and one child', '', '', 'My house', 'gabbyv', NULL),
(6, 'Outdoors', 'Camping Picnic Table Set', 'Seats 6. Includes table, two benches and two stools. Folds flat and comes with carry bag. Table: 120cm x 90cm x 37/70cm.', 'Must be cleaned prior to return', '', 'My house', 'martinay', NULL),
(7, 'Skills', 'Code Guru', '15 minute slots available for emergency coding advice', '', '', 'Google Hangouts', 'martinay', NULL),
(8, 'Skills', 'Vertical Fitness Tuition', '30 minute vertical fitness tuition slots', 'Wear comfortable clothing', '', 'My house', 'gabbyv', NULL),
(9, 'Hobbies', 'Six Man Tent', 'Six berth inflatable tent with living area and three bedroom sections.', 'Must be cleaned prior to return', '', 'My house', 'sandyf', NULL),
(10, 'Hobbies', 'Rubber plant', 'A beautiful rubber plant', 'Must be kept in a bright place and watered if needed', '', 'My house', 'amyr', NULL),
(11, 'Hobbies', 'Mountain Bike', 'Unisex mountain bike, weighs 2kg, suitable for rider height between 1.65m and 1.74m', '', '', 'My house', 'amritab', NULL),
(12, 'People_Pets', 'Cat (elderly)', 'Very old cat ', 'Preferably return alive', '', 'My house', 'linzic', NULL),
(13, 'People_Pets', 'Dog', 'Jack Russell', 'Return well', '', 'My house', 'sarahs', NULL),
(14, 'People_Pets', 'Performing Rabbits', 'Mountain and Moment - two very cute, housetrained rabbits, which will walk on their hind legs in return for treats', 'Please do not feed the rabbits anything other than the food/treats provided by the owner.', '', 'My house', 'bessm', NULL),
(15, 'Tools', 'Sewing machine', 'Janome basic digital', '', '/uploadsPics/Items/ID_1/sewingmachine.jpg', 'My house', 'linzic', NULL),
(16, 'Tools', 'Pressure Washer', 'High performance pressure washer, ideal for cleaning patios, decking, cars, bicycles, garden furniture, walls, garage doors and wood fencing.', '', '', 'My house', 'alexb', NULL),
(17, 'Tools', 'Cordless Hedgetrimmer', 'Lightweight and powerful, ideal for medium to large hedges. Weighs 3.6kg.', '', '', 'My house', 'lilya', NULL),
(18, 'Tools', 'Ladders', 'Telescopic, multi purpose, combination step ladder system.  4x4 rungs. Max open height step ladder 1.8m.  Max open height extension ladder 3.7m.', '', '', 'My house', 'clairew', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Username` varchar(10) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `Surname` varchar(15) NOT NULL,
  `AccessLevel` enum('Administrator','Friend') DEFAULT NULL,
  `PW` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Username`, `FirstName`, `Surname`, `AccessLevel`, `PW`) VALUES
('alexb', 'Alex', 'Brannon', 'Friend', 'Friend2'),
('amritab', 'Amrita', 'Bains', 'Friend', 'Friend5'),
('amyr', 'Amy', 'Robinson', 'Administrator', 'Admin2'),
('bessm', 'Bess', 'Martin', 'Friend', 'Friend6'),
('clairew', 'Claire', 'Winterbottom', 'Friend', 'Friend7'),
('gabbyv', 'Gabby', 'Virbasiute', 'Friend', 'Friend8'),
('lilya', 'Lily', 'Ackroyd', 'Friend', 'Friend3'),
('linzic', 'Linzi', 'Carlin', 'Administrator', 'Admin1'),
('mariaf', 'Maria', 'Flanagan', 'Friend', 'Friend9'),
('martinay', 'Martina', 'Yusuf', 'Friend', 'Friend1'),
('sandyf', 'Sandy', 'Forrester', 'Administrator', 'Admin3'),
('sarahs', 'Sarah', 'Sanderson', 'Administrator', 'Admin4'),
('sophiae', 'Sophia', 'Egornu', 'Administrator', 'Admin5'),
('sophieh', 'Sophie', 'Hemy', 'Friend', 'Friend11'),
('stephf', 'Steph', 'Foster', 'Friend', 'Friend4'),
('teseo', 'Tese', 'Ogbeifun', 'Friend', 'Friend10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Addresses`
--
ALTER TABLE `Addresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Owner` (`Owner`),
  ADD KEY `Borrower` (`Borrower`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Addresses`
--
ALTER TABLE `Addresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Addresses`
--
ALTER TABLE `Addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`User`) REFERENCES `Users` (`Username`);

--
-- Constraints for table `Items`
--
ALTER TABLE `Items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Owner`) REFERENCES `Users` (`Username`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`Borrower`) REFERENCES `Users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
