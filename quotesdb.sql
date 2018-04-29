-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2018 at 11:15 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quotesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblquotes`
--

CREATE TABLE IF NOT EXISTS `tblquotes` (
  `quoteId` int(11) NOT NULL AUTO_INCREMENT,
  `quoteText` text NOT NULL,
  `attributedTo` varchar(50) NOT NULL DEFAULT 'Anonymous',
  `source` varchar(50) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`quoteId`),
  KEY `attributedTo` (`attributedTo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblquotes`
--

INSERT INTO `tblquotes` (`quoteId`, `quoteText`, `attributedTo`, `source`, `year`) VALUES
(3, 'We keep moving forward, opening new doors, and doing new things, because were curious and curiosity keeps leading us down new paths.', '', 'Walt Disney', 1997),
(4, 'One of the most beautiful qualities of true friendship is to understand and to be understood.', '', 'Lucius Annaeus Seneca', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE IF NOT EXISTS `tblusers` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(30) NOT NULL,
  `userPassword` varchar(20) NOT NULL,
  `userType` varchar(6) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userId`, `userEmail`, `userPassword`, `userType`) VALUES
(2, 'tansdj@gmail.com', 'SaXk9aKQvKF/2', 'Admin'),
(5, 'anyone@gmail.com', 'SaXk9aKQvKF/2', 'Editor'),
(6, 'reader@gmail.com', 'SaXk9aKQvKF/2', 'Reader');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
