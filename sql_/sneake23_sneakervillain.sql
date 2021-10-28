-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2019 at 07:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneake23_sneakervillain`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE `ADDRESS` (
  `addressID` int(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BRAND`
--

CREATE TABLE `BRAND` (
  `brandID` int(60) NOT NULL,
  `brandName` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRAND`
--

INSERT INTO `BRAND` (`brandID`, `brandName`, `createdOn`, `updatedOn`) VALUES
(14, 'Yeezy', '2018-11-20 07:31:36', '2018-11-20 07:31:36'),
(16, 'Balenciaga', '2018-11-20 07:42:27', '2018-11-20 07:42:27'),
(17, 'Off-White', '2018-11-20 07:42:55', '2018-11-20 07:42:55'),
(18, 'Gucci', '2018-11-28 05:31:52', '2018-11-28 05:31:52'),
(19, 'Utopian Societies', '2018-11-28 06:04:36', '2018-11-28 06:04:36'),
(20, 'Sailormade ', '2019-01-29 08:05:42', '2019-01-29 08:05:42'),
(21, 'Neon ', '2019-01-29 08:08:43', '2019-01-29 08:08:43');

-- --------------------------------------------------------

--
-- Table structure for table `CART`
--

CREATE TABLE `CART` (
  `cartID` int(60) NOT NULL,
  `userID` int(60) NOT NULL,
  `sessionID` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CATEGORY`
--

CREATE TABLE `CATEGORY` (
  `categoryID` int(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CATEGORY`
--

INSERT INTO `CATEGORY` (`categoryID`, `name`, `createdOn`, `updatedOn`) VALUES
(14, 'Shoes', '2018-11-20 12:24:14', '2018-11-20 12:24:14'),
(15, 'Hoodies', '2018-11-22 12:56:29', '2018-11-22 12:56:29'),
(16, 'Fullwear', '2019-01-14 14:01:50', '2019-01-14 14:01:50'),
(17, 'Sneakers', '2019-01-29 08:13:27', '2019-01-29 08:13:27'),
(18, 'Bottoms', '2019-01-29 08:27:24', '2019-01-29 08:27:24'),
(19, 'Jewellery', '2019-01-29 08:28:23', '2019-01-29 08:28:23'),
(20, 'Accessories', '2019-01-29 08:29:37', '2019-01-29 08:29:37'),
(21, 'Hoodie', '2019-02-15 02:17:53', '2019-02-15 02:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `ITEM`
--

CREATE TABLE `ITEM` (
  `itemID` int(60) NOT NULL,
  `cartID` int(60) NOT NULL,
  `orderID` int(60) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER`
--

CREATE TABLE `ORDER` (
  `orderID` int(60) NOT NULL,
  `userID` int(60) NOT NULL,
  `transactionID` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `payment` varchar(60) NOT NULL,
  `currencyCode` varchar(255) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDER`
--

INSERT INTO `ORDER` (`orderID`, `userID`, `transactionID`, `amount`, `payment`, `currencyCode`, `createdOn`, `updatedOn`) VALUES
(1, 1, '87M16599H6401244K', '19000.00', 'Completed', 'USD', '2019-01-29 02:45:38', '2019-01-29 02:45:38'),
(2, 1, '87M16599H6401244K', '19000.00', 'Completed', 'USD', '2019-01-29 02:46:15', '2019-01-29 02:46:15'),
(3, 1, '87M16599H6401244K', '19000.00', 'Completed', 'USD', '2019-01-29 03:07:15', '2019-01-29 03:07:15'),
(5, 1, '3VW07237G75780458', '2750.00', 'Completed', 'USD', '2019-01-29 03:18:22', '2019-01-29 03:18:22'),
(8, 1, '0L527236SJ935064Y', '5500.00', 'Completed', 'USD', '2019-01-29 03:28:40', '2019-01-29 03:28:40'),
(11, 1, '92P57191YU704240N', '8250.00', 'Completed', 'USD', '2019-01-29 03:32:03', '2019-01-29 03:32:03'),
(13, 1, '03R060959B3912204', '29750.00', 'Completed', 'USD', '2019-01-29 04:20:25', '2019-01-29 04:20:25'),
(14, 1, '4YD338369H517163N', '13500.00', 'Completed', 'USD', '2019-01-29 09:06:57', '2019-01-29 09:06:57'),
(16, 1, '1W196596C9401713S', '31750.00', 'Completed', 'USD', '2019-02-01 07:30:53', '2019-02-01 07:30:53'),
(18, 1, '6WX28439EW7111705', '11000.00', 'Completed', 'USD', '2019-02-04 10:08:45', '2019-02-04 10:08:45'),
(19, 1, '4GB09638U0697334C', '2750.00', 'Completed', 'USD', '2019-02-19 09:28:21', '2019-02-19 09:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `productID` int(60) NOT NULL,
  `brandID` int(60) NOT NULL,
  `categoryID` int(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_CHILDREN`
--

CREATE TABLE `PRODUCT_CHILDREN` (
  `productChildID` int(60) NOT NULL,
  `productID` int(60) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT_TAG`
--

CREATE TABLE `PRODUCT_TAG` (
  `productTagID` int(60) NOT NULL,
  `tagID` int(60) NOT NULL,
  `productID` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TAG`
--

CREATE TABLE `TAG` (
  `tagID` int(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TAG`
--

INSERT INTO `TAG` (`tagID`, `name`, `createdOn`, `updatedOn`) VALUES
(39, 'Zebra Yeezys', '2018-11-24 06:56:47', '2018-11-24 06:56:47'),
(40, 'Zebra Yeezys', '2018-11-24 07:03:20', '2018-11-24 07:03:20'),
(41, 'Zebra Yeezys', '2018-11-24 07:03:28', '2018-11-24 07:03:28'),
(42, 'Zebra Yeezys', '2018-11-24 07:04:57', '2018-11-24 07:04:57'),
(43, 'Zebra Yeezys', '2018-11-24 07:06:00', '2018-11-24 07:06:00'),
(44, 'Zebra Yeezys', '2018-11-24 07:07:27', '2018-11-24 07:07:27'),
(45, 'Yeezy', '2018-11-24 07:09:06', '2018-11-24 07:09:06'),
(46, 'Yeezy, Off-White, Season 3', '2018-11-28 13:48:03', '2018-11-28 13:48:03'),
(47, 'Japanese denim ', '2019-01-14 14:04:35', '2019-01-14 14:04:35'),
(48, 'Japanese, Denim, Long Sleeve', '2019-02-02 00:40:22', '2019-02-02 00:40:22'),
(49, 'Yeezy, Zebra ', '2019-02-07 05:01:57', '2019-02-07 05:01:57'),
(50, '#yeezy', '2019-02-08 07:43:54', '2019-02-08 07:43:54'),
(51, 'Japanese, Denim, Long Sleeve ', '2019-03-28 02:07:59', '2019-03-28 02:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `userID` int(60) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(120) NOT NULL,
  `email` varchar(60) NOT NULL,
  `flag` varchar(5) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`userID`, `username`, `pass`, `email`, `flag`, `firstName`, `lastName`, `createdOn`, `updatedOn`) VALUES
(1, 'directorx', 'a', 'directorx@sneakervillain.com', 'admin', 'carl', 'karama', '2018-11-14 04:57:54', '2018-11-14 04:57:54'),
(2, 'georgewbush', 'highTime1', 'goodgaminggm@gmail.com', 'user', 'No One', 'Is Safe', '2018-11-13 10:32:27', '2018-11-13 10:32:27'),
(3, 'mateo', '29484686', 'mattmerin@gmail.com', 'user', 'Mateo', 'Merin', '2018-11-22 15:51:21', '2018-11-22 15:51:21'),
(4, 'test', 'asdfgh', 'johnnysantana@gmail.com', 'user', 'Johnny', 'Santana', '2019-02-07 05:15:53', '2019-02-07 05:15:53'),
(5, 'lkhv', 'xgcfhvgjbh', 'yabko@gmail.com', 'user', 'kriis', 'fhtgjyh', '2019-02-08 07:39:00', '2019-02-08 07:39:00'),
(6, 'kk', '11', 'okoook@122.com', 'user', 'carl', 'karama', '2019-02-08 07:39:45', '2019-02-08 07:39:45'),
(7, 'mawadri', 'asdfgh', 'mawadri@gmail.com', 'user', 'Mawadri', 'Julius', '2019-02-08 14:28:23', '2019-02-08 14:28:23'),
(8, 'edwardgladstone', 'Swlipdsh0', 'edwardgladstone@comcast.net', 'user', 'Edward', 'Gladstone', '2019-02-09 01:49:18', '2019-02-09 01:49:18'),
(9, 'Terron', 'asdfgh', 'ceo@sneakervillain.com', 'admin', 'Terron', 'Outlaw', '2019-02-10 01:24:54', '2019-02-10 01:24:54'),
(10, 'Teezt', 'seantaylor21', 'sailclubaustralia@yahoo.com', 'user', 'Terron', 'Outlaw ', '2019-02-13 02:38:17', '2019-02-13 02:38:17'),
(11, 'kanyewest', 'asdfgh', 'kanyewest@gmail.com', 'user', 'Kanye', 'West', '2019-02-21 00:13:20', '2019-02-21 00:13:20'),
(12, 'pawat123', 'a123456789', 'pawata54@gmail.com', 'user', 'pawat', 'kusonchukul', '2019-04-09 04:13:45', '2019-04-09 04:13:45'),
(13, 'grandmasterflash', 'asdfgh', 'grandmasterflash@gmail.com', 'admin', 'Grand', 'Master', '2019-04-16 23:56:45', '2019-04-16 23:56:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `BRAND`
--
ALTER TABLE `BRAND`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `CART`
--
ALTER TABLE `CART`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `userID` (`userID`,`sessionID`);

--
-- Indexes for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `ITEM`
--
ALTER TABLE `ITEM`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `cartID` (`cartID`,`orderID`),
  ADD KEY `item_ibfk_3` (`orderID`);

--
-- Indexes for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `brandID` (`brandID`,`categoryID`),
  ADD KEY `product_ibfk_2` (`categoryID`);

--
-- Indexes for table `PRODUCT_CHILDREN`
--
ALTER TABLE `PRODUCT_CHILDREN`
  ADD PRIMARY KEY (`productChildID`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `PRODUCT_TAG`
--
ALTER TABLE `PRODUCT_TAG`
  ADD PRIMARY KEY (`productTagID`),
  ADD KEY `tagID` (`tagID`,`productID`),
  ADD KEY `product_tag_ibfk_2` (`productID`);

--
-- Indexes for table `TAG`
--
ALTER TABLE `TAG`
  ADD PRIMARY KEY (`tagID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  MODIFY `addressID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `BRAND`
--
ALTER TABLE `BRAND`
  MODIFY `brandID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `CART`
--
ALTER TABLE `CART`
  MODIFY `cartID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `categoryID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ITEM`
--
ALTER TABLE `ITEM`
  MODIFY `itemID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `orderID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `productID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `PRODUCT_CHILDREN`
--
ALTER TABLE `PRODUCT_CHILDREN`
  MODIFY `productChildID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `PRODUCT_TAG`
--
ALTER TABLE `PRODUCT_TAG`
  MODIFY `productTagID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `TAG`
--
ALTER TABLE `TAG`
  MODIFY `tagID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `userID` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CART`
--
ALTER TABLE `CART`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `USERS` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ITEM`
--
ALTER TABLE `ITEM`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`cartID`) REFERENCES `CART` (`cartID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`orderID`) REFERENCES `ORDER` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `USERS` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandID`) REFERENCES `BRAND` (`brandID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `CATEGORY` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PRODUCT_CHILDREN`
--
ALTER TABLE `PRODUCT_CHILDREN`
  ADD CONSTRAINT `product_children_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `PRODUCT` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `PRODUCT_TAG`
--
ALTER TABLE `PRODUCT_TAG`
  ADD CONSTRAINT `product_tag_ibfk_1` FOREIGN KEY (`tagID`) REFERENCES `TAG` (`tagID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_tag_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `PRODUCT` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
