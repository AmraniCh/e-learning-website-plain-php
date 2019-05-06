-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2019 at 02:54 AM
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
-- Dumping data for table `etudient`
--

INSERT INTO `etudient` (`pseudo_etu`, `email_etu`, `prenom_etu`, `nom_etu`, `pass`, `adresse_etu`, `pays_etu`, `ville_etu`, `tele_etu`, `sexe_etu`, `propos_etu`, `image_etu`, `reponse`, `question`, `groupe_id`) VALUES
('chou500', 'el@gmail.com', 'dqsdff', 'qsdqsd', 'elamrani00', 'ggfdsdf\'', 'Maldives', 'Tangier', '84451', 'Male', '', 'cat_snow_eyes_fluffy_95615_1920x1080.jpg', 'aaa', '', 103),
('chou900', 'aa@gmail.com', 'sdqdqs', 'qsdqsdqs', 'MOmo0514', NULL, NULL, NULL, NULL, 'Male', NULL, 'user-male.png', 'ddgg', '', 104);

-- --------------------------------------------------------

--
-- Table structure for table `fichier`
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
-- Dumping data for table `fichier`
--

INSERT INTO `fichier` (`nom`, `type`, `fich_date`, `groupe_id`) VALUES
('points_cubes_background_light_91691_1920x1080.jpg', 'exercice', '2019-05-06 00:05:11', 103),
('pier_dock_sea_dusk_shore_118549_1920x1080.jpg', 'autre', '2019-05-04 05:04:35', 104),
('triangle_dark_background_light_line_shape_88539_1920x1080.jpg', 'exercice', '2019-05-06 00:07:23', 103),
('paint_water_liquid_85058_1920x1080.jpg', 'exercice', '2019-05-06 00:03:19', 103),
('raven_bird_flying_smoke_black_white_92907_1920x1080.jpg', 'course', '2019-05-06 00:03:23', 103),
('grass_dew_close-up_79587_1920x1080.jpg', 'autre', '2019-05-04 20:26:29', 103),
('assassins_creed_logo_art_113285_1920x1080.jpg', 'course', '2019-05-04 02:08:50', 104),
('triangle_light_dark_shape_88545_1920x1080.jpg', 'exercice', '2019-05-06 00:03:43', 103),
('autumn_macro_red_foliage_background_84016_1920x1080.jpg', 'exercice', '2019-05-04 02:48:15', 104),
('big_hero_6_2014_beymaks_robot_97786_1600x1200.jpg', 'course', '2019-05-04 02:08:58', 104),
('net_color_background_dark_85551_1920x1080.jpg', 'course', '2019-05-06 00:11:57', 103),
('boat_sea_view_from_above_water_119937_1920x1080.jpg', 'course', '2019-05-06 00:15:10', 103),
('board_black_line_texture_background_wood_55220_1920x1080.jpg', 'course', '2019-05-06 00:23:22', 103),
('oklahoma_city_usa_skyscrapers_buildings_architecture_118081_1920x1080.jpg', 'autre', '2019-05-04 05:04:39', 104),
('background_bumps_light_86951_1920x1080.jpg', 'course', '2019-05-05 23:55:50', 103),
('iy_tujiki_art_night_train_anime_starry_sky_98589_1920x1080.jpg', 'course', '2019-05-04 19:28:59', 103),
('triangle_light_dark_88542_1920x1080.jpg', 'exercice', '2019-05-05 23:01:18', 147);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  `image_groupe` text,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  `pseudo_prof` varchar(100) NOT NULL,
  `nbr_fichier` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pseudo_prof` (`pseudo_prof`)
) ENGINE=MyISAM AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `image_groupe`, `date_creation`, `pseudo_prof`, `nbr_fichier`) VALUES
(103, 'TDI204', 'Developpement informatique àé\"=', NULL, '2019-05-04 01:57:52', 'prof500', 0),
(104, 'TRI202', 'Réseau', NULL, '2019-05-04 02:07:59', '', 0),
(166, 'qsdqs', 'dqsdqd', 'butterfly_surface_wooden_116623_1920x1080.jpg', '2019-05-06 02:52:11', 'prof900', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groupe_historique`
--

DROP TABLE IF EXISTS `groupe_historique`;
CREATE TABLE IF NOT EXISTS `groupe_historique` (
  `pseudo_prof` varchar(255) NOT NULL,
  `grp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pseudo_prof`),
  KEY `grp_id` (`grp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupe_historique`
--

INSERT INTO `groupe_historique` (`pseudo_prof`, `grp_id`) VALUES
('prof500', 103),
('chou500', 77),
('', 103),
('prof900', 147);

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
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
-- Dumping data for table `professeur`
--

INSERT INTO `professeur` (`pseudo_prof`, `email_prof`, `prenom_prof`, `nom_prof`, `pass`, `adresse_prof`, `pays_prof`, `ville_prof`, `tele_prof`, `sexe_prof`, `propos_prof`, `image_prof`, `reponse`, `question`) VALUES
('prof500', 'bb@gmail.com', 'prof', 'prof', 'california744', 'ssdq', 'Austria', 'qsd', 'qsd', 'Male', 'qsd', 'fifty_shades_of_grey_2015_christian_gray_jamie_dornan_96584_1920x1080.jpg', 'aaa', ''),
('prof900', 'aa@gmail.com', 'elqsdqsd', 'qsdqsd', 'MOmo0514', NULL, NULL, NULL, NULL, 'Male', NULL, 'cat_snow_eyes_fluffy_95615_1920x1080.jpg', 'sfdsdfsdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quest` varchar(255) NOT NULL,
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
