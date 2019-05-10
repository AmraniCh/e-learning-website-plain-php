-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10 مايو 2019 الساعة 03:32
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
  UNIQUE KEY `email_etu` (`email_etu`),
  KEY `question` (`question`),
  KEY `groupe_id` (`groupe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `etudient`
--

INSERT INTO `etudient` (`pseudo_etu`, `email_etu`, `prenom_etu`, `nom_etu`, `pass`, `adresse_etu`, `pays_etu`, `ville_etu`, `tele_etu`, `sexe_etu`, `propos_etu`, `image_etu`, `reponse`, `question`, `groupe_id`) VALUES
('chou500', 'el@gmail.com', 'dqsdff', 'qsdqsd', 'elamrani00', 'ggfdsdf\'', 'Maldives', 'Tangier', '84451', 'Male', '', 'cat_snow_eyes_fluffy_95615_1920x1080.jpg', 'aaa', '', 198),
('chou900', 'aa@gmail.com', 'safwane', 'el amrani', 'MOmo0514', 'tanger', 'maroc', 'tanger adresse', '0651479811', 'Male', NULL, 'cat_snow_eyes_fluffy_95615_1920x1080.jpg', 'ddgg', '', 208);

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
('fifty_shades_of_grey_2015_christian_gray_jamie_dornan_96584_1920x1080.jpg', 'autre', '2019-05-09 01:23:56', 208),
('glass_drop_rain_moisture_9427_1920x1080.jpg', 'course', '2019-05-08 22:56:47', 202),
('background_close-up_fence_86066_1920x1080.jpg', 'exercice', '2019-05-08 22:39:54', 202),
('big_hero_6_2014_beymaks_robot_97786_1600x1200.jpg', 'exercice', '2019-05-08 04:05:55', 198),
('city_china_japan_people_street_59088_1920x1080.jpg', 'exercice', '2019-05-09 01:20:36', 198),
('cat_computer_curiosity_56487_1920x1080.jpg', 'exercice', '2019-05-08 22:41:23', 202),
('assassins_creed_logo_art_113285_1920x1080.jpg', 'course', '2019-05-08 04:24:29', 198);

--
-- القوادح `fichier`
--
DROP TRIGGER IF EXISTS `fichier_after_insert_groupe`;
DELIMITER $$
CREATE TRIGGER `fichier_after_insert_groupe` AFTER INSERT ON `fichier` FOR EACH ROW BEGIN 
	DECLARE fichier_count int; 
    SET fichier_count= (SELECT COUNT(nom) FROM fichier);
	UPDATE groupe SET nbr_fichier = fichier_count;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `description` text,
  `image_groupe` text,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `pseudo_prof` varchar(100) NOT NULL,
  `nbr_fichier` int(11) DEFAULT '0',
  `nbr_etudient` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `pseudo_prof` (`pseudo_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `image_groupe`, `date_creation`, `pseudo_prof`, `nbr_fichier`, `nbr_etudient`) VALUES
(198, 'TDI', 'DEV', 'architecture_city_view_from_above_buildings_river_118446_1920x1080.jpg', '2019-05-08 04:05:30', 'prof900', 8, 0),
(208, 'qsd', 'qsd', 'cat_snow_eyes_fluffy_95615_1920x1080.jpg', '2019-05-09 00:34:29', 'prof500', 8, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `groupe_historique`
--

DROP TABLE IF EXISTS `groupe_historique`;
CREATE TABLE IF NOT EXISTS `groupe_historique` (
  `pseudo_prof` varchar(255) NOT NULL,
  `grp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pseudo_prof`),
  KEY `grp_id` (`grp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `groupe_historique`
--

INSERT INTO `groupe_historique` (`pseudo_prof`, `grp_id`) VALUES
('prof500', 208),
('prof900', 198);

-- --------------------------------------------------------

--
-- بنية الجدول `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_post` datetime DEFAULT CURRENT_TIMESTAMP,
  `contenu` text NOT NULL,
  `type_post` varchar(100) NOT NULL,
  `date_imp` datetime DEFAULT NULL,
  `groupe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupe_id` (`groupe_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  UNIQUE KEY `email_prof` (`email_prof`),
  KEY `question` (`question`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `professeur`
--

INSERT INTO `professeur` (`pseudo_prof`, `email_prof`, `prenom_prof`, `nom_prof`, `pass`, `adresse_prof`, `pays_prof`, `ville_prof`, `tele_prof`, `sexe_prof`, `propos_prof`, `image_prof`, `reponse`, `question`) VALUES
('prof500', 'bb@gmail.com', 'prof', 'prof', 'california744', 'ssdq', 'Austria', 'qsd', 'qsd', 'Male', 'qsd', 'fifty_shades_of_grey_2015_christian_gray_jamie_dornan_96584_1920x1080.jpg', 'aaa', ''),
('prof900', 'aa@gmail.com', 'elqsdqsd', 'qsdqsd', 'MOmo0514', NULL, NULL, NULL, NULL, 'Male', NULL, 'clouds_sky_abstract_88538_1920x1080.jpg', 'sfdsdfsdf', '');

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
