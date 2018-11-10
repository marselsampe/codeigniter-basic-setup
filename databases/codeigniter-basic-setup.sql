-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2018 at 09:44 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter-basic-setup`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uniqueId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isArchived` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uniqueId`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uniqueId`, `name`, `username`, `password`, `email`, `status`, `isActive`, `isArchived`) VALUES
(1, 'Marsel Sampe Asang', 'marsel', '13cf7655e7908b1d877d8bdb210fdf1c', 'marselsampe@gmail.com', 'Administrator', 1, 0),
(4, 'Marsel Sampe Asang', 'marselx', '13cf7655e7908b1d877d8bdb210fdf1c', 'marselsampe@gmail.com', 'Administrator', 1, 0),
(5, 'Marsel Sampe Asang', 'marselx3', '13cf7655e7908b1d877d8bdb210fdf1c', 'marselsampe@gmail.com', 'Administrator', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_authorization_token`
--

CREATE TABLE IF NOT EXISTS `user_authorization_token` (
  `uniqueId` int(11) NOT NULL AUTO_INCREMENT,
  `user_uniqueId` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expiredDate` datetime NOT NULL,
  PRIMARY KEY (`uniqueId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
