-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2018 at 01:28 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `redteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
CREATE TABLE IF NOT EXISTS `flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `flag` text NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`id`, `name`, `flag`, `score`) VALUES
(1, 'kali', 'flag{simple_kali}', 100),
(2, 'zaza', 'flag{hzhz}', 211),
(3, 'yoyoyo', 'flag{123}', 400);

-- --------------------------------------------------------

--
-- Table structure for table `score_log`
--

DROP TABLE IF EXISTS `score_log`;
CREATE TABLE IF NOT EXISTS `score_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `score_date` datetime NOT NULL,
  `challenge_score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score_log`
--

INSERT INTO `score_log` (`id`, `team_id`, `challenge_id`, `score_date`, `challenge_score`) VALUES
(13, 38, 1, '2018-10-05 10:25:40', 100),
(14, 35, 1, '2018-10-05 10:25:58', 100),
(15, 36, 1, '2018-10-05 10:26:10', 100),
(16, 37, 1, '2018-10-05 10:27:32', 100);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamname` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `teamname`, `password`) VALUES
(31, 'test5', 'test5'),
(30, 'rea4', 'rea4'),
(29, 'rea3', 'rea3'),
(28, 'rea2', 'rea2'),
(27, 'aa', 'aa'),
(26, 'nono', 'nono'),
(25, 'rea', 'rea1'),
(24, 'yoyo', 'yoyo'),
(23, 'rearea1', 'rearea1'),
(22, 'rearea', 'rearea'),
(21, 'rea1', 'rea1'),
(20, 'reamb', 'icetop'),
(32, 'yo', 'yo'),
(33, 'mend', 'mend'),
(34, 'fda', 'fda'),
(35, 'altantuya', 'altantuya'),
(36, 'enkhbold', 'enkhbold'),
(37, 'naranbaatar', 'naranbaatar'),
(38, 'zolboobayar', 'zolboobayar'),
(39, 'hi', 'hi'),
(40, 'bilguun', 'bilguun');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
