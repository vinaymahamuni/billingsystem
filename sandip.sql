-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 06:39 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sandip`
--

-- --------------------------------------------------------

--
-- Table structure for table `billdetails`
--

CREATE TABLE IF NOT EXISTS `billdetails` (
  `billid` bigint(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vat` decimal(10,0) NOT NULL,
  `servicetax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `billentries`
--

CREATE TABLE IF NOT EXISTS `billentries` (
  `id` bigint(20) NOT NULL,
  `itemid` int(11) NOT NULL,
  `mrp` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `itemname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `companyid` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `phoneno` varchar(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyid`, `name`, `phoneno`, `address`) VALUES
(1, 'Tata motors', '', ''),
(2, 'Essar Oil', '', ''),
(3, 'Shell Oils', '', ''),
(4, 'Bajaj Automobiles', '', ''),
(16, 'Eaton', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemid` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `partno` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `unit` varchar(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemid`, `companyid`, `partno`, `name`, `unit`) VALUES
(1, 3, 'E5530', 'Fork Oil', 'Pc'),
(2, 1, 'E45', 'Horn', 'Pc'),
(3, 2, 'Q23', 'Engine Oil', 'Pc'),
(6, 16, 'E23Z', 'Aerospace', 'Pc'),
(7, 1, 'G90', 'Wheels', 'Pc');

-- --------------------------------------------------------

--
-- Table structure for table `pricedetail`
--

CREATE TABLE IF NOT EXISTS `pricedetail` (
  `itemid` int(11) NOT NULL,
  `mrp` double NOT NULL,
  `qty` int(11) NOT NULL,
  `disc` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricedetail`
--

INSERT INTO `pricedetail` (`itemid`, `mrp`, `qty`, `disc`, `date`) VALUES
(1, 200, 50, 30, '2016-08-04 13:35:16'),
(6, 300, 100, 23, '2016-08-09 06:29:50'),
(1, 400, 50, 10, '2016-08-04 13:35:16'),
(7, 890, 10, 3, '2016-08-09 15:53:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `billentries`
--
ALTER TABLE `billentries`
  ADD KEY `itemid` (`itemid`), ADD KEY `id` (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyid`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemid`), ADD KEY `companyid` (`companyid`), ADD KEY `companyid_2` (`companyid`);

--
-- Indexes for table `pricedetail`
--
ALTER TABLE `pricedetail`
  ADD PRIMARY KEY (`mrp`,`itemid`), ADD KEY `itemid` (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `billid` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `billentries`
--
ALTER TABLE `billentries`
ADD CONSTRAINT `FKey4` FOREIGN KEY (`id`) REFERENCES `billdetails` (`billid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `Fkey1` FOREIGN KEY (`companyid`) REFERENCES `company` (`companyid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pricedetail`
--
ALTER TABLE `pricedetail`
ADD CONSTRAINT `FKey` FOREIGN KEY (`itemid`) REFERENCES `item` (`itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
