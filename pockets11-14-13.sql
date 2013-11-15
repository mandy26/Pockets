-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2013 at 12:45 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pockets`
--
CREATE DATABASE IF NOT EXISTS `pockets` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pockets`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`) VALUES
(1, 'Regions Checking'),
(2, 'Regions Savings'),
(3, 'Visa'),
(4, 'MasterCard');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'food'),
(2, 'car insurance'),
(3, 'renter''s insurance'),
(4, 'rent'),
(5, 'travel'),
(6, 'car payment'),
(7, 'savings'),
(8, 'pharmacy'),
(9, 'medical'),
(10, 'spending'),
(11, 'Tithe/offering'),
(12, 'ICC'),
(13, 'Phone'),
(14, 'Gas/Car maintanance'),
(15, 'Gifts'),
(16, 'Retirement'),
(17, 'Emergency'),
(18, 'Life Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `net_amount` decimal(10,2) DEFAULT NULL,
  `gross_amount` decimal(10,2) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `notes_2` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `date`, `net_amount`, `gross_amount`, `account_id`, `notes_2`) VALUES
(1, '2013-11-04', '313.00', '0.00', 1, 'Beginning Balance'),
(2, '2013-11-03', '178.18', '0.00', 1, 'Beginning Balance'),
(3, '2013-11-03', '350.00', '0.00', 1, 'Beginning Balance'),
(4, '2013-11-03', '0.00', '0.00', 1, 'Beginning Balance'),
(5, '2013-11-03', '60.00', '0.00', 1, 'Beginning Balance'),
(6, '2013-11-03', '20.00', '0.00', 1, 'Beginning Balance'),
(7, '2013-11-03', '100.00', '0.00', 1, 'Beginning Balance'),
(8, '2013-11-03', '610.00', '0.00', 1, 'Beginning Balance'),
(9, '2013-11-03', '350.00', '0.00', 1, 'Beginning Balance'),
(10, '2013-11-03', '660.00', '0.00', 1, 'Beginning Balance'),
(11, '2013-11-03', '120.00', '0.00', 1, 'Beginning Balance'),
(12, '2013-09-26', '-15.18', '0.00', 3, 'VM'),
(13, '2013-10-03', '-75.87', '0.00', 3, 'VM'),
(14, '2013-10-03', '-28.43', '0.00', 3, 'Exxon - gas'),
(15, '2013-10-06', '-2.72', '0.00', 3, 'Target - pretzel'),
(16, '2013-10-08', '-10.03', '0.00', 3, '4 corners cafe - lunch with Rachel'),
(17, '2013-10-08', '-24.17', '0.00', 3, 'VM'),
(18, '2013-10-09', '-27.00', '0.00', 3, 'USPS - PO box renew (6 month)'),
(19, '2013-10-15', '-10.00', '0.00', 3, 'emissions testing'),
(20, '2013-09-21', '0.00', '0.00', 4, 'paypal Netflix - already paid last month'),
(21, '2013-10-03', '-10.94', '0.00', 4, 'Kindle book - Daring Greatly'),
(22, '2013-10-07', '-1.99', '0.00', 4, 'Kindle book'),
(23, '2013-10-07', '-8.54', '0.00', 4, '5-htp (amazon)'),
(24, '2013-10-07', '-19.28', '0.00', 4, 'Theanine Serene (Amazon)'),
(25, '2013-11-03', '-82.77', '0.00', 3, 'Publix'),
(26, '2013-11-03', '-29.12', '0.00', 3, 'Wal-mart: toiletries/meds'),
(27, '2013-11-08', '-32.62', '0.00', 3, 'Exxon - gas'),
(28, '2013-10-31', '-26.00', '0.00', 3, 'ICC gift catalog - Christmas ornament and mug'),
(29, '2013-10-30', '-7.67', '0.00', 4, 'Amazon: 5-htp'),
(30, '2013-11-05', '-35.00', '0.00', 3, 'Dr. Showalter'),
(31, '2013-11-03', '-105.26', '0.00', 3, 'new tire: Wal-mart (right rear)'),
(32, '2013-11-03', '-48.04', '0.00', 3, 'oil change: Wal-mart (125571)'),
(33, '2013-10-21', '-21.09', '0.00', 3, 'VM'),
(34, '2013-10-22', '-20.00', '0.00', 3, 'Rite Aid: prescription, prilozec'),
(35, '2013-10-24', '-43.62', '0.00', 3, 'VM'),
(36, '2013-10-24', '-35.00', '0.00', 3, 'Dr. Showalter'),
(37, '2013-10-21', '-27.00', '0.00', 3, 'Hamilton Co. : tag renewal'),
(38, '2013-10-29', '-72.09', '0.00', 3, 'Quill Corp: therapuetica pillow (chriropractic pillow)'),
(39, '2013-10-30', '-125.00', '0.00', 3, 'State Farm: renters ins (1 year)'),
(40, '2013-10-30', '-344.23', '0.00', 3, 'State Farm: car insurance (6 months)'),
(41, '2013-10-30', '-570.03', '0.00', 3, 'Dr. Klinner - statement'),
(42, '2013-11-02', '-570.03', '0.00', 3, 'Delta (expedia): El Salvador ticket'),
(43, '2013-11-02', '-35.95', '0.00', 3, 'Expedia: travel insurance'),
(44, '2013-10-17', '-1.99', '0.00', 4, 'Kindle book'),
(45, '2013-11-10', '3706.32', '0.00', 2, 'Beginning Balance'),
(46, '2013-11-04', '-19.75', '0.00', 1, 'ck#204 Laura: food from Costco'),
(47, '2013-11-09', '-251.85', '0.00', 1, 'ck#205 Apison SDA: tithe 209.87, offering 41.98'),
(48, '2013-11-05', '-212.41', '0.00', 1, 'Lockheed: Matt: Car payment'),
(49, '2013-11-10', '104.12', '0.00', 1, 'insurance reimb. for 6/27-10/3/13 ck#36706 (mobile dep)'),
(50, '2013-11-10', '-0.50', '0.00', 1, 'mobile deposit fee'),
(51, '2013-11-03', '40.00', '0.00', 1, 'BeginningBalance'),
(52, '2013-11-03', '25.00', '0.00', 1, 'Beginning Balance'),
(53, '2013-11-03', '20.00', '0.00', 1, 'Beginning Balance'),
(54, '2013-11-10', '125.00', '0.00', 1, 'Beginning Balance'),
(55, '2013-11-10', '32.75', '0.00', 1, 'Beginning Balance'),
(56, '2013-10-31', '777.36', '1002.68', 1, 'paycheck: Bake Crafters');

-- --------------------------------------------------------

--
-- Table structure for table `preset`
--

CREATE TABLE IF NOT EXISTS `preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `preset_item`
--

CREATE TABLE IF NOT EXISTS `preset_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `preset_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1373588817),
('m130711_233353_initial', 1373588842),
('m130815_233801_create_parent', 1376611048),
('m131023_003946_presets', 1382489438);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `notes` text,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `category_id`, `amount`, `notes`, `parent_id`) VALUES
(1, 6, '313.00', NULL, 1),
(2, 11, '178.18', '', 2),
(3, 1, '350.00', '', 3),
(4, 4, '0.00', '', 4),
(5, 12, '60.00', NULL, 5),
(6, 13, '20.00', '', 6),
(7, 8, '100.00', NULL, 7),
(8, 9, '610.00', '', 8),
(9, 2, '350.00', '', 9),
(10, 5, '660.00', '', 10),
(11, 10, '120.00', '', 11),
(12, 1, '-15.18', 'VM', 12),
(13, 1, '-75.87', 'VM', 13),
(14, 14, '-28.43', 'Exxon - gas', 14),
(15, 1, '-2.72', 'Target - pretzel', 15),
(16, 1, '-10.03', '4 corners cafe - lunch with Rachel', 16),
(17, 1, '-24.17', 'VM', 17),
(18, 10, '-27.00', 'USPS - PO box renew (6 month)', 18),
(19, 14, '-10.00', 'emissions testing', 19),
(20, 10, '0.00', 'paypal Netflix', 20),
(21, 10, '-10.94', 'Kindle book - Daring Greatly', 21),
(22, 10, '-1.99', 'Kindle book', 22),
(23, 8, '-8.54', '5-htp (amazon)', 23),
(24, 8, '-19.28', 'Theanine Serene (Amazon)', 24),
(25, 1, '-82.77', 'Publix', 25),
(26, 10, '-29.12', 'Wal-mart: toiletries/meds', 26),
(27, 14, '-32.62', 'Exxon - gas', 27),
(28, 12, '-26.00', 'ICC gift catalog - Christmas ornament and mug', 28),
(29, 8, '-7.67', 'Amazon: 5-htp', 29),
(30, 9, '-35.00', 'Dr. Showalter', 30),
(31, 14, '-105.26', 'new tire: Wal-mart (right rear)', 31),
(32, 14, '-48.04', 'oil change: Wal-mart (125571)', 32),
(33, 1, '-21.09', 'VM', 33),
(34, 8, '-20.00', 'Rite Aid: prescription, prilozec', 34),
(35, 1, '-43.62', 'VM', 35),
(36, 9, '-35.00', 'Dr. Showalter', 36),
(37, 14, '-27.00', 'Hamilton Co. : tag renewal', 37),
(38, 9, '-72.09', 'Quill Corp: therapuetica pillow (chriropractic pillow)', 38),
(39, 3, '-125.00', 'State Farm: renters ins (1 year)', 39),
(40, 2, '-344.23', 'State Farm: car insurance (6 months)', 40),
(41, 9, '-570.03', 'Dr. Klinner - statement', 41),
(42, 5, '-570.03', 'Delta (expedia): El Salvador ticket', 42),
(43, 5, '-35.95', 'Expedia: travel insurance', 43),
(44, 10, '-1.99', 'Kindle book', 44),
(45, 7, '3706.32', NULL, 45),
(46, 1, '-19.75', 'ck#204 Laura: food from Costco', 46),
(47, 11, '-251.85', 'ck#205 Apison SDA: tithe 209.87, offering 41.98', 47),
(48, 6, '-212.41', 'Lockheed: Matt: Car payment', 48),
(49, 9, '104.12', NULL, 49),
(50, 9, '-0.50', 'mobile deposit fee', 50),
(51, 14, '40.00', NULL, 51),
(52, 15, '25.00', NULL, 52),
(53, 18, '20.00', NULL, 53),
(54, 3, '125.00', NULL, 54),
(55, 17, '32.75', NULL, 55),
(56, 11, '120.28', NULL, 56),
(57, 18, '20.45', NULL, 56),
(58, 6, '212.41', NULL, 56),
(59, 1, '100.00', NULL, 56),
(60, 14, '211.35', NULL, 56),
(61, 3, '10.00', NULL, 56),
(62, 2, '62.00', NULL, 56),
(63, 9, '40.87', NULL, 56);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
