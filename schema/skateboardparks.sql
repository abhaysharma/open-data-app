-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2012 at 02:51 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shar0261`
--

-- --------------------------------------------------------

--
-- Table structure for table `skateboardparks`
--

CREATE TABLE IF NOT EXISTS `skateboardparks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `numrate` int(255) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `longi` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `skateboardparks`
--

INSERT INTO `skateboardparks` (`id`, `name`, `address`, `rating`, `numrate`, `description`, `lat`, `longi`) VALUES
(1, 'Flat', '65 Stonehaven Dr Kanata', 0, 0, '', 45.2907596432387, -75.8570398443873),
(2, 'Flat', '334 River Rd Gloucester', 0, 0, '', 45.3153555816278, -75.6953923012092),
(3, 'Flat', '8720 Russell Rd Cumberland', 0, 0, '', 45.3833215360272, -75.3372987729019),
(4, 'Flat', '110 Malvern Dr Nepean', 0, 0, '', 45.2806222163539, -75.7602352556204),
(5, 'Other', '1490 Youville Dr Gloucester', 0, 0, '', 45.4671345819859, -75.5465180859831),
(6, 'Bowl', '100 Walter Baker Pl Kanata', 0, 0, '', 45.295014380132, -75.8986105991386),
(7, 'Flat', '5572 Doctor Leach Dr Rideau', 0, 0, '', 45.2226613631575, -75.6867462142134),
(8, 'Flat', '2030 Ogilvie Rd Gloucester', 0, 0, '', 45.4364417770298, -75.6011584135361),
(9, 'Flat', '190 Glen Park Dr Gloucester', 0, 0, '', 45.4296434130932, -75.5627969203988),
(10, 'Other', '2785 8th Line Rd Osgoode', 0, 0, '', 45.2303256186091, -75.4685616420709),
(11, 'Flat', '10 Warner Colpitts Lane Goulbourn', 0, 0, '', 45.2606597749096, -75.9266513667319),
(12, 'Other', '5660 Osgoode Main St Osgoode', 0, 0, '', 45.1476419496887, -75.6011847878831),
(13, 'Flat', '435 Bronson Ave Old Ottawa', 0, 0, '', 45.4090645717813, -75.7019121821445),
(14, 'Other', '1448 Meadow Dr Osgoode', 0, 0, '', 45.2613539859851, -75.556978502268),
(15, 'Other', '262 Len Purcell Dr West Carleton', 0, 0, '', 45.4990500618365, -76.0924495736343),
(16, 'Flat', '700 Longfields Dr Nepean', 0, 0, '', 45.2831844272091, -75.7452983627208),
(17, 'Bowl', '101 Centrepointe Dr Nepean', 0, 0, '', 45.3455666690485, -75.7609333333026),
(18, 'Flat', '1500 Shea Rd Goulbourn', 0, 0, '', 45.2622895886827, -75.9072116682686),
(19, 'Flat', '3142 Conroy Rd Old Ottawa', 0, 0, '', 45.3754015878046, -75.625996131304),
(20, 'Flat', '65 Stonehaven Dr Kanata', 0, 0, '', 45.2907580293593, -75.8570098121127),
(21, 'Flat', '100 Clifford Campbell St West Carleton', 0, 0, '', 45.4703721794444, -76.2058749839388);
