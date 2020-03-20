-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 09:31 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends_lends`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
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
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`ID`, `AddrLine1`, `AddrLine2`, `City`, `Postcode`, `Email`, `ContactNumber`, `User`) VALUES
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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `Groups_ID` int(7) NOT NULL,
  `Group_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`Groups_ID`, `Group_name`) VALUES
(1, 'family'),
(2, 'uni friends'),
(3, 'work friends'),
(4, 'my friends'),
(5, 'local people');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `item` text,
  `borrower` text,
  `start_loan` date DEFAULT NULL,
  `end_loan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Headline` varchar(40) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Terms` varchar(250) DEFAULT NULL,
  `PictureLocation` varchar(200) DEFAULT NULL,
  `PickupLocation` varchar(50) DEFAULT NULL,
  `Owner` varchar(10) NOT NULL,
  `Borrower` varchar(10) DEFAULT NULL,
  `start_loan` date DEFAULT NULL,
  `end_loan` date DEFAULT NULL,
  `active_status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Category`, `Headline`, `Description`, `Terms`, `PictureLocation`, `PickupLocation`, `Owner`, `Borrower`, `start_loan`, `end_loan`, `active_status`) VALUES
(1, 'Household', 'Travel Cot', 'Pop up travel cot with carry bag. Assembled size H76, L99, W57cm. Suitable from birth to 3 years, for babies up to 15kg.', '', '', 'My house', 'mariaf', NULL, NULL, NULL, 'active'),
(2, 'Outdoors', 'Hiking poles', 'Pair of lightweight hiking poles', 'Please clean tips after use', '', 'My house', 'amyr', NULL, NULL, NULL, 'active'),
(3, 'Outdoors', 'Tennis Ball', 'Tennis ball', 'Return in one piece', '', 'My house', 'sarahs', NULL, NULL, NULL, 'active'),
(4, 'Outdoors', 'Marquee', 'Heavy duty pop up gazebo with storage bag. Assembled dimensions 6m x 3m.', '', '', 'My house', 'stephf', NULL, NULL, NULL, 'active'),
(5, 'Outdoors', 'Sledge', 'Sledge with brakes and seats for two adults and one child', '', '', 'My house', 'gabbyv', NULL, NULL, NULL, 'active'),
(6, 'Outdoors', 'Camping Picnic Table Set', 'Seats 6. Includes table, two benches and two stools. Folds flat and comes with carry bag. Table: 120cm x 90cm x 37/70cm.', 'Must be cleaned prior to return', '', 'My house', 'martinay', NULL, NULL, NULL, 'active'),
(7, 'Skills', 'Code Guru', '15 minute slots available for emergency coding advice', '', '', 'Google Hangouts', 'martinay', NULL, NULL, NULL, 'active'),
(8, 'Skills', 'Vertical Fitness Tuition', '30 minute vertical fitness tuition slots', 'Wear comfortable clothing', '', 'My house', 'gabbyv', NULL, NULL, NULL, 'active'),
(9, 'Hobbies', 'Six Man Tent', 'Six berth inflatable tent with living area and three bedroom sections.', 'Must be cleaned prior to return', '', 'My house', 'sandyf', NULL, NULL, NULL, 'active'),
(10, 'Hobbies', 'Rubber plant', 'A beautiful rubber plant', 'Must be kept in a bright place and watered if needed', '', 'My house', 'amyr', NULL, NULL, NULL, 'active'),
(11, 'Hobbies', 'Mountain Bike', 'Unisex mountain bike, weighs 2kg, suitable for rider height between 1.65m and 1.74m', '', '', 'My house', 'amritab', NULL, NULL, NULL, 'active'),
(12, 'People_Pets', 'Cat (elderly)', 'Very old cat ', 'Preferably return alive', '', 'My house', 'linzic', NULL, NULL, NULL, 'active'),
(13, 'People_Pets', 'Dog', 'Jack Russell', 'Return well', '', 'My house', 'sarahs', NULL, NULL, NULL, 'active'),
(14, 'People_Pets', 'Performing Rabbits', 'Mountain and Moment - two very cute, housetrained rabbits, which will walk on their hind legs in return for treats', 'Please do not feed the rabbits anything other than the food/treats provided by the owner.', '', 'My house', 'bessm', NULL, NULL, NULL, 'active'),
(15, 'Tools', 'Sewing machine', 'Janome basic digital', '', '/uploadsPics/Items/ID_1/sewingmachine.jpg', 'My house', 'linzic', NULL, NULL, NULL, 'active'),
(16, 'Tools', 'Pressure Washer', 'High performance pressure washer, ideal for cleaning patios, decking, cars, bicycles, garden furniture, walls, garage doors and wood fencing.', '', '', 'My house', 'alexb', NULL, NULL, NULL, 'active'),
(17, 'Tools', 'Cordless Hedgetrimmer', 'Lightweight and powerful, ideal for medium to large hedges. Weighs 3.6kg.', '', '', 'My house', 'lilya', NULL, NULL, NULL, 'active'),
(18, 'Tools', 'Ladders', 'Telescopic, multi purpose, combination step ladder system.  4x4 rungs. Max open height step ladder 1.8m.  Max open height extension ladder 3.7m.', '', '', 'My house', 'clairew', NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `link_users_groups`
--

CREATE TABLE `link_users_groups` (
  `ID_usergroup` int(7) NOT NULL,
  `Users_FK` int(30) NOT NULL,
  `Groups_FK` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link_users_groups`
--

INSERT INTO `link_users_groups` (`ID_usergroup`, `Users_FK`, `Groups_FK`) VALUES
(1, 1, 2),
(3, 3, 2),
(4, 3, 3),
(5, 4, 3),
(6, 1, 5),
(7, 2, 5),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `Surname` varchar(15) NOT NULL,
  `AccessLevel` enum('Administrator','Friend') DEFAULT NULL,
  `PW` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `Username`, `FirstName`, `Surname`, `AccessLevel`, `PW`) VALUES
(1, 'alexb', 'Alex', 'Brannon', 'Friend', 'Friend2'),
(2, 'amritab', 'Amrita', 'Bains', 'Friend', 'Friend5'),
(3, 'amyr', 'Amy', 'Robinson', 'Administrator', 'Admin2'),
(4, 'bessm', 'Bess', 'Martin', 'Friend', 'Friend6'),
(5, 'clairew', 'Claire', 'Winterbottom', 'Friend', 'Friend7'),
(6, 'gabbyv', 'Gabby', 'Virbasiute', 'Friend', 'Friend8'),
(7, 'lilya', 'Lily', 'Ackroyd', 'Friend', 'Friend3'),
(8, 'linzic', 'Linzi', 'Carlin', 'Administrator', 'Admin1'),
(9, 'mariaf', 'Maria', 'Flanagan', 'Friend', 'Friend9'),
(10, 'martinay', 'Martina', 'Yusuf', 'Friend', 'Friend1'),
(11, 'sandyf', 'Sandy', 'Forrester', 'Administrator', 'Admin3'),
(12, 'sarahs', 'Sarah', 'Sanderson', 'Administrator', 'Admin4'),
(13, 'sophiae', 'Sophia', 'Egornu', 'Administrator', 'Admin5'),
(14, 'sophieh', 'Sophie', 'Hemy', 'Friend', 'Friend11'),
(15, 'stephf', 'Steph', 'Foster', 'Friend', 'Friend4'),
(16, 'teseo', 'Tese', 'Ogbeifun', 'Friend', 'Friend10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`Groups_ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Owner` (`Owner`),
  ADD KEY `Borrower` (`Borrower`);

--
-- Indexes for table `link_users_groups`
--
ALTER TABLE `link_users_groups`
  ADD PRIMARY KEY (`ID_usergroup`),
  ADD KEY `Users_FK` (`Users_FK`),
  ADD KEY `Groups_FK` (`Groups_FK`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `users_index` (`Username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `Groups_ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `link_users_groups`
--
ALTER TABLE `link_users_groups`
  MODIFY `ID_usergroup` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`Username`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Owner`) REFERENCES `users` (`Username`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`Borrower`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
