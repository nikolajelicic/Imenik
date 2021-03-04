-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2020 at 08:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domaci_imenik`
--

-- --------------------------------------------------------

--
-- Table structure for table `brojevi`
--

DROP TABLE IF EXISTS `brojevi`;
CREATE TABLE IF NOT EXISTS `brojevi` (
  `idnumber` int(11) NOT NULL AUTO_INCREMENT,
  `broj` varchar(45) DEFAULT NULL,
  `users_idusers` int(11) NOT NULL,
  `vreme_upisivanja` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idnumber`),
  KEY `fk_brojevi_users_idx` (`users_idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brojevi`
--

INSERT INTO `brojevi` (`idnumber`, `broj`, `users_idusers`, `vreme_upisivanja`) VALUES
(83, '111456', 87, '2020-06-03 19:56:15'),
(84, '22244', 87, '2020-06-03 19:56:17'),
(85, '1267563', 88, '2020-06-03 19:56:21'),
(86, '232777', 88, '2020-06-03 19:56:24'),
(87, '2243757', 89, '2020-06-03 19:56:28'),
(88, '232777', 90, '2020-06-03 19:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `name`, `surname`, `time`) VALUES
(87, 'Marko', 'Markovic', '2020-06-03 19:54:51'),
(88, 'Milos', 'Milosevic', '2020-06-03 19:54:58'),
(89, 'Milica', 'Rodic', '2020-06-03 19:55:07'),
(90, 'Nenad ', 'Staniskovic', '2020-06-03 19:55:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brojevi`
--
ALTER TABLE `brojevi`
  ADD CONSTRAINT `fk_brojevi_users` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
