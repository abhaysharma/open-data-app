-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2012 at 07:28 PM
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
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(1) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` int(255) NOT NULL,
  `longi` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `skateboardparks`
--

INSERT INTO `skateboardparks` (`id`, `name`, `address`, `rating`, `description`, `lat`, `longi`) VALUES
(1, 'Fire Roll', '326, Shutdown Drive', 3, 'This place is as its name, fast, energetic and boombastic.', 2443, 3423),
(2, 'Burning Board', '497, Deadend Follow Ave.', 4, 'Here you get so many expert skaters who get hell out of there boards.', 789, 987);
