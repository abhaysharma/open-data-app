-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2012 at 05:39 PM
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
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `longi` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=151 ;

--
-- Dumping data for table `skateboardparks`
--

INSERT INTO `skateboardparks` (`id`, `name`, `address`, `rating`, `description`, `lat`, `longi`) VALUES
(1, 'Fire Roll', '326, Shutdown Drive', 3, 'This place is as its name, fast, energetic and boombastic.', 2443, 3423),
(2, 'Burning Board', '497, Deadend Follow Ave.', 4, 'Here you get so many expert skaters who get hell out of there boards.', 789.5566, 98766.55),
(109, 'bowl', '', 0, '', 45.295014380139, -75.8986105991385),
(110, 'bowl', '', 0, '', 45.3455666690555, -75.7609333333025),
(111, 'flat', '', 0, '', 45.2907596432457, -75.8570398443872),
(112, 'flat', '', 0, '', 45.3153555816348, -75.6953923012091),
(113, 'flat', '', 0, '', 45.3833215360345, -75.3372987729018),
(114, 'flat', '', 0, '', 45.2806222163608, -75.7602352556203),
(115, 'flat', '', 0, '', 45.2226613631644, -75.6867462142134),
(116, 'flat', '', 0, '', 45.436441777037, -75.601158413536),
(117, 'flat', '', 0, '', 45.4296434131003, -75.5627969203987),
(118, 'flat', '', 0, '', 45.2606597749165, -75.9266513667318),
(119, 'flat', '', 0, '', 45.4090645717884, -75.7019121821444),
(120, 'flat', '', 0, '', 45.283184427216, -75.7452983627207),
(121, 'flat', '', 0, '', 45.2622895886896, -75.9072116682685),
(122, 'flat', '', 0, '', 45.3754015878117, -75.6259961313039),
(123, 'flat', '', 0, '', 45.2907580293663, -75.8570098121126),
(124, 'flat', '', 0, '', 45.4703721794515, -76.2058749839388),
(125, 'other', '', 0, '', 45.4671345819931, -75.546518085983),
(126, 'other', '', 0, '', 45.2303256186161, -75.4685616420708),
(127, 'other', '', 0, '', 45.1476419496956, -75.601184787883),
(128, 'other', '', 0, '', 45.2613539859921, -75.5569785022679),
(129, 'other', '', 0, '', 45.4990500618436, -76.0924495736342),
(130, 'bowl', '', 0, '', 45.295014380139, -75.8986105991385),
(131, 'bowl', '', 0, '', 45.3455666690555, -75.7609333333025),
(132, 'flat', '', 0, '', 45.2907596432457, -75.8570398443872),
(133, 'flat', '', 0, '', 45.3153555816348, -75.6953923012091),
(134, 'flat', '', 0, '', 45.3833215360345, -75.3372987729018),
(135, 'flat', '', 0, '', 45.2806222163608, -75.7602352556203),
(136, 'flat', '', 0, '', 45.2226613631644, -75.6867462142134),
(137, 'flat', '', 0, '', 45.436441777037, -75.601158413536),
(138, 'flat', '', 0, '', 45.4296434131003, -75.5627969203987),
(139, 'flat', '', 0, '', 45.2606597749165, -75.9266513667318),
(140, 'flat', '', 0, '', 45.4090645717884, -75.7019121821444),
(141, 'flat', '', 0, '', 45.283184427216, -75.7452983627207),
(142, 'flat', '', 0, '', 45.2622895886896, -75.9072116682685),
(143, 'flat', '', 0, '', 45.3754015878117, -75.6259961313039),
(144, 'flat', '', 0, '', 45.2907580293663, -75.8570098121126),
(145, 'flat', '', 0, '', 45.4703721794515, -76.2058749839388),
(146, 'other', '', 0, '', 45.4671345819931, -75.546518085983),
(147, 'other', '', 0, '', 45.2303256186161, -75.4685616420708),
(148, 'other', '', 0, '', 45.1476419496956, -75.601184787883),
(149, 'other', '', 0, '', 45.2613539859921, -75.5569785022679),
(150, 'other', '', 0, '', 45.4990500618436, -76.0924495736342);