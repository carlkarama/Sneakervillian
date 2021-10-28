-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2018 at 12:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakerVillains`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADDRESS`
--

CREATE TABLE `ADDRESS` (
  `addressID` int(60) NOT NULL,
  `userID` int(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `address2` varchar(60) NOT NULL,
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
  `addressID` int(60) NOT NULL,
  `payment` varchar(60) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `productID` int(60) NOT NULL,
  `brandID` int(60) NOT NULL,
  `categoryID` int(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL,
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
  `image` varchar(120) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `userID` (`userID`);

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
  ADD KEY `userID` (`userID`,`addressID`),
  ADD KEY `order_ibfk_2` (`addressID`);

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
  MODIFY `brandID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CART`
--
ALTER TABLE `CART`
  MODIFY `cartID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CATEGORY`
--
ALTER TABLE `CATEGORY`
  MODIFY `categoryID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ITEM`
--
ALTER TABLE `ITEM`
  MODIFY `itemID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `orderID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  MODIFY `productID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PRODUCT_CHILDREN`
--
ALTER TABLE `PRODUCT_CHILDREN`
  MODIFY `productChildID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `PRODUCT_TAG`
--
ALTER TABLE `PRODUCT_TAG`
  MODIFY `productTagID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TAG`
--
ALTER TABLE `TAG`
  MODIFY `tagID` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `userID` int(60) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ADDRESS`
--
ALTER TABLE `ADDRESS`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `USERS` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `USERS` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `ADDRESS` (`addressID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
