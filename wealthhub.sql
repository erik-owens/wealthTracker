-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2018 at 11:42 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wealthhub`
--
CREATE DATABASE IF NOT EXISTS `wealthhub` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wealthhub`;

-- --------------------------------------------------------

--
-- Table structure for table `a_account`
--

DROP TABLE IF EXISTS `a_account`;
CREATE TABLE `a_account` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `type` enum('Checking','Savings','Brokerage','Annuity','CD') NOT NULL,
  `account_number` float DEFAULT NULL,
  `balance` float DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `a_asset`
--

DROP TABLE IF EXISTS `a_asset`;
CREATE TABLE `a_asset` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `value` float NOT NULL,
  `descriprtion` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `a_corprate`
--

DROP TABLE IF EXISTS `a_corprate`;
CREATE TABLE `a_corprate` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `type` enum('S-Corp','C-Corp','LLC','Sole Proprietor') NOT NULL,
  `percent_owner` float NOT NULL,
  `profit` float NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `a_property`
--

DROP TABLE IF EXISTS `a_property`;
CREATE TABLE `a_property` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `purchase_price` float NOT NULL,
  `last_price` float DEFAULT NULL,
  `gain` float DEFAULT NULL,
  `gain_percent` float DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_property`
--

INSERT INTO `a_property` (`id`, `name`, `type`, `address`, `city`, `state`, `zip`, `purchase_price`, `last_price`, `gain`, `gain_percent`, `comments`, `updated`, `user`) VALUES
(1, 'Home', NULL, '747 Hillsboro Way', 'San Marcos', 'CA', '92026', 420000, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `a_stock`
--

DROP TABLE IF EXISTS `a_stock`;
CREATE TABLE `a_stock` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `symbol` varchar(10) NOT NULL,
  `exchange` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `shares` int(11) NOT NULL,
  `purchase_price` float NOT NULL,
  `last_price` float DEFAULT NULL,
  `gain` float DEFAULT NULL,
  `gain_percent` float DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a_stock`
--

INSERT INTO `a_stock` (`id`, `name`, `symbol`, `exchange`, `type`, `shares`, `purchase_price`, `last_price`, `gain`, `gain_percent`, `comments`, `updated`, `user`) VALUES
(1, 'Erie Indemnity Co (NASDAQ)', 'ERIE', '', 'Rad', 25, 25.56, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(2, 'Erie Indemnity Co (NASDAQ)', 'ERIE', '', 'Rad', 25, 25.56, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(3, '', '', '', '', 0, 0, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(4, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(5, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(6, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(7, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(8, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(9, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(10, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(11, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(12, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(13, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(14, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(15, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(16, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(17, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(18, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(19, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(20, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(21, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(22, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(23, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(24, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(25, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(26, 'Destination Maternity Corp (NASDAQ)', 'DEST', '', 'Cool', 20, 100.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(27, 'Rush Enterprises Inc (NASDAQ)', 'RUSHA', '', 'Great', 23, 45.78, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(28, 'Erie Indemnity Co (NASDAQ)', 'ERIE', '', 'erer', 23, 6777.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(29, 'Graco Inc (BATS Trading Inc)', 'GGG', '', 'new', 100, 200, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(30, 'Ford Motor Co (BATS Trading Inc)', 'F', '', '', 0, 34.99, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(31, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(32, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(33, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(34, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(35, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, NULL, NULL, '', '2018-02-16 01:36:12', 0),
(36, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, 1.99, 1.13374, '', '2018-02-16 01:51:56', 0),
(37, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, 1.99, 0.882039, '', '2018-02-16 01:53:00', 0),
(38, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, 1.99, 0.133737, '', '2018-02-16 01:57:14', 0),
(39, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, 1.99, 13.3737, '', '2018-02-16 01:58:20', 0),
(40, 'John Hancock Hedged Equity & Income Fund (NYSE)', 'HEQ', '', 'set', 23, 14.88, 16.87, 1.99, 13.3737, '', '2018-02-16 02:07:30', 0),
(41, 'Adobe Systems Inc (NASDAQ)', 'ADBE', '', 'fixed', 200, 14.5, 202.97, 188.47, 1299.79, 'A great Deal!!', '2018-02-16 02:34:02', 0),
(42, 'Adobe Systems Inc (NASDAQ)', 'ADBE', '', 'fixed', 200, 14.5, 202.97, 188.47, 1299.79, 'A great Deal!!', '2018-02-16 02:35:40', 0),
(43, 'Wayfair Inc (NYSE)', 'W', '', '', 0, 0, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0),
(44, 'Wayfair Inc (NYSE)', 'W', '', '', 3, 25.99, 96.76, 70.77, 272.297, '', '2018-02-16 03:58:32', 0),
(45, 'Alcoa Corp (NYSE)', 'AA', '', 'fixed', 22, 23.01, 25.22, 2.21, 9.60452, 'Heavy Metal!', '2018-02-16 04:45:01', 0),
(46, 'Ferro Corp (NYSE)', 'FOE', '', '', 100, 11, 21.7, 10.7, 97.2727, 'Yay!!', '2018-02-16 05:54:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stats_daily`
--

DROP TABLE IF EXISTS `stats_daily`;
CREATE TABLE `stats_daily` (
  `id` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `item_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `descriprtion` varchar(255) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stats_daily_totals`
--

DROP TABLE IF EXISTS `stats_daily_totals`;
CREATE TABLE `stats_daily_totals` (
  `id` int(11) NOT NULL,
  `value` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive',
  `type` enum('Admin','User','Guest') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `created`, `updated`, `status`, `type`) VALUES
(0, 'Fred', 'fred@example.com', '2018-02-12 04:00:00', '2018-02-12 04:00:00', 'Active', 'Admin'),
(1, 'Fred', 'fred@example.com', '2018-02-12 04:00:00', '2018-02-12 04:00:00', 'Active', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_account`
--
ALTER TABLE `a_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_asset`
--
ALTER TABLE `a_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_corprate`
--
ALTER TABLE `a_corprate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_property`
--
ALTER TABLE `a_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_stock`
--
ALTER TABLE `a_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats_daily`
--
ALTER TABLE `stats_daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats_daily_totals`
--
ALTER TABLE `stats_daily_totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_account`
--
ALTER TABLE `a_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_asset`
--
ALTER TABLE `a_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_corprate`
--
ALTER TABLE `a_corprate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_property`
--
ALTER TABLE `a_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_stock`
--
ALTER TABLE `a_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stats_daily`
--
ALTER TABLE `stats_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stats_daily_totals`
--
ALTER TABLE `stats_daily_totals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
