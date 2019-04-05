-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2019 at 04:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demosite`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudient`
--

DROP TABLE IF EXISTS `etudient`;
CREATE TABLE IF NOT EXISTS `etudient` (
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `tele` varchar(50) DEFAULT NULL,
  `reponse` varchar(50) NOT NULL,
  `quest` varchar(200) NOT NULL,
  PRIMARY KEY (`pseudo`,`email`),
  KEY `quest` (`quest`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `quest`) VALUES
(1, 'What is your pet\'s name ?'),
(2, 'What is your favorite book ?'),
(3, 'What is your dream job ?'),
(4, 'What is the name of the street on which you grew up ?'),
(5, 'What is the first name of your mother\'s mother ?'),
(6, 'What online forum or site do you frequent most ?');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
