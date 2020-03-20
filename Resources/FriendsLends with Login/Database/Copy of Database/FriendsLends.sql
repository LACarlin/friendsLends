-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 02:44 PM
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `aid` int(11) NOT NULL,
  `addrline1` varchar(50) NOT NULL,
  `addrline2` varchar(20) DEFAULT NULL,
  `city` varchar(15) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contactnumber` varchar(11) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`aid`, `addrline1`, `addrline2`, `city`, `postcode`, `email`, `contactnumber`, `userid`) VALUES
(1, '12 Random Avenue', 'Bramley', 'Leeds', 'LS1 3BB', 'linzic@example.com', '01234567890', 8),
(2, '13 Random Avenue', 'Woodhouse', 'Leeds', 'LS1 4BB', 'amyr@example.com', '01234567891', 3),
(3, '14 Random Avenue', 'Adel', 'Leeds', 'LS1 5BB', 'sandyf@example.com', '01234567892', 11),
(4, '15 Random Avenue', 'Roundhay', 'Leeds', 'LS1 6BB', 'sarahs@example.com', '01234567893', 12),
(5, '16 Random Avenue', 'Chapel Allerton', 'Leeds', 'LS1 7BB', 'sophiae@example.com', '01234567894', 13),
(6, '1 Random Avenue', 'Harehills', 'Leeds', 'LS1 1AB', 'martinay@example.com', '01234567895', 10),
(7, '2 Random Avenue', 'Seacroft', 'Leeds', 'LS1 2AB', 'alexb@example.com', '01234567896', 1),
(8, '3 Random Avenue', 'Meanwood', 'Leeds', 'LS1 3AB', 'lilya@example.com', '01234567897', 7),
(9, '4 Random Avenue', 'Castleford', 'Leeds', 'LS1 4AB', 'stephf@example.com', '01234567898', 15),
(10, '5 Random Avenue', 'Roundhay', 'Leeds', 'LS1 5AB', 'amritab@example.com', '01234567899', 2),
(11, '6 Random Avenue', 'Bramley', 'Leeds', 'LS1 6AB', 'bessm@example.com', '01234567900', 4),
(12, '7 Random Avenue', 'Morley', 'Leeds', 'LS1 7AB', 'clairew@example.com', '01234567901', 5),
(13, '8 Random Avenue', 'Pudsey', 'Leeds', 'LS1 8AB', 'gabbyv@example.com', '01234567902', 6),
(14, '9 Random Avenue', 'Whitby', 'Leeds', 'LS1 9AB', 'mariaf@example.com', '01234567903', 9),
(15, '10 Random Avenue', 'Crossgates', 'Leeds', 'LS1 1BB', 'teseo@example.com', '01234567904', 16),
(16, '11 Random Avenue', 'Adel', 'Leeds', 'LS1 2BB', 'sophieh@example.com', '01234567905', 14);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gid` int(11) NOT NULL,
  `groupname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gid`, `groupname`) VALUES
(9999, 'Guest Users'),
(1030, 'Little GITs'),
(1031, 'Yeeha Gitty Up');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `hid` int(11) NOT NULL,
  `itemid` int(11) DEFAULT NULL,
  `borrowerid` int(10) DEFAULT NULL,
  `startloan` date DEFAULT NULL,
  `endloan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `iid` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `headline` varchar(40) NOT NULL,
  `description` varchar(500) NOT NULL,
  `terms` varchar(500) DEFAULT NULL,
  `itempic` varchar(255) DEFAULT NULL,
  `pickuplocation` varchar(50) DEFAULT NULL,
  `owner` int(10) NOT NULL,
  `borrower` int(10) DEFAULT NULL,
  `start_loan` date DEFAULT NULL,
  `end_loan` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`iid`, `category`, `headline`, `description`, `terms`, `itempic`, `pickuplocation`, `owner`, `borrower`, `start_loan`, `end_loan`, `active`) VALUES
(1, 'Household', 'Travel Cot', 'Pop up travel cot with carry bag.', NULL, NULL, 'My house', 9, NULL, NULL, NULL, 1),
(2, 'Tools', 'Pressure Washer', 'High performance pressure washer, ideal for cleaning patios, decking, cars, bicycles, garden furniture, walls, garage doors and wood fencing.', NULL, NULL, 'My house', 1, NULL, NULL, NULL, 1),
(3, 'Hobbies', 'Mountain Bike', 'Mountain bike suitable for rider height between 1.65m and 1.74m', NULL, NULL, 'My house', 2, NULL, NULL, NULL, 1),
(4, 'Outdoors', 'Hiking poles', 'Pair of lightweight hiking poles', NULL, NULL, 'My house', 3, NULL, NULL, NULL, 1),
(5, 'Hobbies', 'Rubber plant', 'A beautiful rubber plant', 'Must be kept in a bright place and watered if needed', NULL, 'My house', 3, NULL, NULL, NULL, 1),
(6, 'People_Pets', 'Performing Rabbits', 'Mountain and Moment - two very cute, fully housetrained rabbits, that walk on their hind legs in return for treats', 'Please do not feed the rabbits anything other than the food/treats provided by the owner.', NULL, 'My house', 4, NULL, NULL, NULL, 1),
(7, 'Tools', 'Cordless Hedgetrimmer', 'Ideal for medium to large hedges, weighs 3.6kg.', NULL, NULL, 'My house', 13, NULL, NULL, NULL, 1),
(8, 'Outdoors', 'Sledge', 'Sledge with seats for two adults and one child', NULL, NULL, 'My house', 6, NULL, NULL, NULL, 1),
(9, 'Tools', 'Ladders', 'Telescopic ladder system.  Max open height step ladder 1.8m or extension ladder 3.7m.', NULL, NULL, 'My house', 7, NULL, NULL, NULL, 1),
(10, 'Electrical', 'Sewing machine', 'Janome basic digital', NULL, NULL, 'My house', 8, NULL, NULL, NULL, 1),
(11, 'Outdoors', 'Camping Picnic Table Set', 'Seats 6. Includes table, two benches and two stools. Folds flat and comes with carry bag. Table: 120cm x 90cm x 70cm.', NULL, NULL, 'My house', 16, NULL, NULL, NULL, 1),
(12, 'Skills', 'Code Guru', '15 minute slots available for emergency coding advice', NULL, NULL, 'Google Hangouts', 10, NULL, NULL, NULL, 1),
(13, 'Hobbies', 'Six Man Tent', 'Six berth inflatable tent with living area and three bedroom sections.', NULL, NULL, 'My house', 11, NULL, NULL, NULL, 1),
(14, 'People_Pets', 'Dog', 'Jack Russell', NULL, NULL, 'My house', 12, NULL, NULL, NULL, 1),
(15, 'Outdoors', 'Marquee', 'Heavy duty pop up gazebo with storage bag. Assembled dimensions 6m x 3m.', NULL, NULL, 'My house', 15, NULL, NULL, NULL, 1),
(16, 'Tools', 'Rug Doctor', 'Portable carpet cleaner', NULL, NULL, 'My House', 14, NULL, NULL, NULL, 1),
(17, 'Electrical', 'Projector', 'Mini home cinema projector', NULL, NULL, 'My House', 5, NULL, NULL, NULL, 1),
(18, 'Electrical', 'Portable PA System', 'Portable PA system with two microphones', NULL, NULL, 'My House', 11, NULL, NULL, NULL, 1),
(19, 'Outdoors', 'Barbecue', 'Portable barrel barbecue', NULL, NULL, 'My House', 1, NULL, NULL, NULL, 1),
(20, 'Hobbies', 'Pogo Stick', 'Black and red Krunk pogo stick', NULL, NULL, 'My House', 2, NULL, NULL, NULL, 1),
(21, 'Hobbies', 'Skateboard', 'Powell Peralta, red and blue, 7.5 inch', NULL, NULL, 'My House', 3, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `accesslevel` enum('Administrator','Friend') DEFAULT NULL,
  `userpic` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `groupid1` int(10) NOT NULL DEFAULT '9999',
  `groupid2` int(10) DEFAULT NULL,
  `groupid3` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `firstname`, `surname`, `accesslevel`, `userpic`, `password`, `groupid1`, `groupid2`, `groupid3`) VALUES
(1, 'alexb', 'Alex', 'Brannon', 'Friend', NULL, '$2y$10$BiCO4AYT3I9ic6D5p/2EFeBu.6RflA9y3HKqw4SZQMMRPTT3BlRf2', 1030, NULL, NULL),
(2, 'amritab', 'Amrita', 'Bains', 'Friend', NULL, '$2y$10$68W2w1v.G026SEhisQKh3eov4k4GfJrXvLqbHaKC7.2Dddp2zhw0S', 1030, NULL, NULL),
(3, 'amyr', 'Amy', 'Robinson', 'Administrator', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, 1031, NULL),
(4, 'bessm', 'Bess', 'Martin', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(5, 'clairew', 'Claire', 'Winterbottom', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(6, 'gabbyv', 'Gabby', 'Virbasiute', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(7, 'lilya', 'Lily', 'Ackroyd', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(8, 'linzic', 'Linzi', 'Carlin', 'Administrator', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, 1031, NULL),
(9, 'mariaf', 'Maria', 'Flanagan', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(10, 'martinay', 'Martina', 'Yusuf', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(11, 'sandyf', 'Sandy', 'Forrester', 'Administrator', NULL, '$2y$10$gV1qDqrbj.RTmiwYs8u3BOy9bKSetf9Xp4kanc61PmnBNaPyrzEqG', 1030, 1031, NULL),
(12, 'sarahs', 'Sarah', 'Sanderson', 'Administrator', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, 1031, NULL),
(13, 'sophiae', 'Sophia', 'Egornu', 'Administrator', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, 1031, NULL),
(14, 'sophieh', 'Sophie', 'Hemy', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(15, 'stephf', 'Steph', 'Foster', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL),
(16, 'teseo', 'Tese', 'Ogbeifun', 'Friend', NULL, '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 1030, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gid`),
  ADD UNIQUE KEY `groupname` (`groupname`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`hid`),
  ADD KEY `itemid` (`itemid`),
  ADD KEY `borrowerid` (`borrowerid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`),
  ADD KEY `owner` (`owner`),
  ADD KEY `borrower` (`borrower`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `groupid1` (`groupid1`),
  ADD KEY `groupid2` (`groupid2`),
  ADD KEY `groupid3` (`groupid3`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `items` (`iid`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`borrowerid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`borrower`) REFERENCES `users` (`uid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`groupid1`) REFERENCES `groups` (`gid`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`groupid2`) REFERENCES `groups` (`gid`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`groupid3`) REFERENCES `groups` (`gid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
