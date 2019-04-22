-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22 أبريل 2019 الساعة 21:41
-- إصدار الخادم: 5.7.24
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
-- بنية الجدول `etudient`
--

DROP TABLE IF EXISTS `etudient`;
CREATE TABLE IF NOT EXISTS `etudient` (
  `pseudo_etu` varchar(100) NOT NULL,
  `email_etu` varchar(100) NOT NULL,
  `prenom_etu` varchar(100) NOT NULL,
  `nom_etu` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `adresse_etu` varchar(100) DEFAULT NULL,
  `pays_etu` varchar(100) DEFAULT NULL,
  `ville_etu` varchar(100) DEFAULT NULL,
  `tele_etu` varchar(100) DEFAULT NULL,
  `sexe_etu` varchar(100) NOT NULL,
  `propos_etu` text,
  `image_etu` text,
  `reponse` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `groupe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pseudo_etu`),
  KEY `question` (`question`),
  KEY `groupe_id` (`groupe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `etudient`
--

INSERT INTO `etudient` (`pseudo_etu`, `email_etu`, `prenom_etu`, `nom_etu`, `pass`, `adresse_etu`, `pays_etu`, `ville_etu`, `tele_etu`, `sexe_etu`, `propos_etu`, `image_etu`, `reponse`, `question`, `groupe_id`) VALUES
('chou500', 'chakir_alhoceima_rifi8@hotmail.fr', 'EL AMRANI', '051487088', 'elamrani00', 'ARD DAOULA RUE 48 N 3, 90002', 'Morocco', 'Tangier', '$phone', 'Male', 'elamrani', 'background_close-up_fence_86066_1920x1080.jpg', 'aaa', '', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `nom` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fich_date` datetime DEFAULT NULL,
  `groupe_id` int(11) NOT NULL,
  PRIMARY KEY (`nom`),
  KEY `groupe_id` (`groupe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `fichier`
--

INSERT INTO `fichier` (`nom`, `type`, `fich_date`, `groupe_id`) VALUES
('glare_background_blur_dark_63553_1920x1080.jpg', 'autre', '2019-04-22 21:23:48', 1),
('autumn_macro_red_foliage_background_84016_1920x1080.jpg', 'autre', '2019-04-21 20:27:17', 1),
('images.jpg', 'autre', '2019-04-22 21:23:38', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `image_groupe` text,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `pseudo_prof` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo_prof` (`pseudo_prof`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `image_groupe`, `date_creation`, `pseudo_prof`) VALUES
(1, 'TDI204', NULL, NULL, '2019-04-21 22:59:01', 'prof500'),
(10, 'TRI202', NULL, NULL, '2019-04-21 22:59:01', 'prof500');

-- --------------------------------------------------------

--
-- بنية الجدول `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `pseudo_prof` varchar(100) NOT NULL,
  `email_prof` varchar(100) NOT NULL,
  `prenom_prof` varchar(100) NOT NULL,
  `nom_prof` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `adresse_prof` varchar(100) DEFAULT NULL,
  `pays_prof` varchar(100) DEFAULT NULL,
  `ville_prof` varchar(100) DEFAULT NULL,
  `tele_prof` varchar(100) DEFAULT NULL,
  `sexe_prof` varchar(100) NOT NULL,
  `propos_prof` text,
  `image_prof` text,
  `reponse` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  PRIMARY KEY (`pseudo_prof`),
  KEY `question` (`question`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `professeur`
--

INSERT INTO `professeur` (`pseudo_prof`, `email_prof`, `prenom_prof`, `nom_prof`, `pass`, `adresse_prof`, `pays_prof`, `ville_prof`, `tele_prof`, `sexe_prof`, `propos_prof`, `image_prof`, `reponse`, `question`) VALUES
('prof500', 'elamrani.sv.laza@gmail.com', 'prof', 'prof', 'california744', 'ssdq', 'qsd', 'qsd', 'qsd', 'Male', 'qsd', 'user-male.png', 'aaa', '');

-- --------------------------------------------------------

--
-- بنية الجدول `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `question`
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
