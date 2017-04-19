-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2017 at 04:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recruitdbv5`
--
CREATE DATABASE IF NOT EXISTS `recruitdbv5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `recruitdbv5`;

-- --------------------------------------------------------

--
-- Table structure for table `authen`
--

DROP TABLE IF EXISTS `authen`;
CREATE TABLE `authen` (
  `id` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authen`
--

INSERT INTO `authen` (`id`, `login`, `password`) VALUES
(1, 'admin', 'dad3a37aa9d50688b5157698acfd7aee');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`) VALUES
(1, 'name 1'),
(2, 'name 2'),
(3, 'name 3'),
(4, 'name 4'),
(5, 'name 5'),
(6, 'name 6'),
(7, 'name 7'),
(8, 'name 8'),
(9, 'name 9'),
(10, 'name 10'),
(11, 'name 11'),
(12, 'name 12'),
(13, 'name 13'),
(14, 'name 14'),
(15, 'name 15'),
(16, 'name 16'),
(17, 'name 17'),
(18, 'name 18'),
(19, 'name 19'),
(20, 'name 20'),
(21, 'name 21'),
(22, 'name 22'),
(23, 'name 23'),
(24, 'name 24'),
(25, 'name 25'),
(26, 'name 26'),
(27, 'name 27'),
(28, 'name 28'),
(29, 'name 29'),
(30, 'name 30'),
(31, 'name 31'),
(32, 'name 32'),
(33, 'name 33'),
(34, 'name 34'),
(35, 'name 35'),
(36, 'name 36'),
(37, 'name 37'),
(38, 'name 38'),
(39, 'name 39'),
(40, 'name 40'),
(41, 'name 41'),
(42, 'name 42'),
(43, 'name 43'),
(44, 'name 44'),
(45, 'name 45'),
(46, 'name 46'),
(47, 'name 47'),
(48, 'name 48'),
(49, 'name 49'),
(50, 'name 50'),
(51, 'name 51'),
(52, 'name 52'),
(53, 'name 53'),
(54, 'name 54'),
(55, 'name 55'),
(56, 'name 56'),
(57, 'name 57'),
(58, 'name 58'),
(59, 'name 59'),
(60, 'name 60'),
(61, 'name 61'),
(62, 'name 62'),
(63, 'name 63'),
(64, 'name 64'),
(65, 'name 65'),
(66, 'name 66'),
(67, 'name 67'),
(68, 'name 68'),
(69, 'name 69'),
(70, 'name 70'),
(71, 'name 71'),
(72, 'name 72'),
(73, 'name 73'),
(74, 'name 74'),
(75, 'name 75'),
(76, 'name 76'),
(77, 'name 77'),
(78, 'name 78'),
(79, 'name 79'),
(80, 'name 80'),
(81, 'name 81'),
(82, 'name 82'),
(83, 'name 83'),
(84, 'name 84'),
(85, 'name 85'),
(86, 'name 86'),
(87, 'name 87'),
(88, 'name 88'),
(89, 'name 89'),
(90, 'name 90'),
(91, 'name 91'),
(92, 'name 92'),
(93, 'name 93'),
(94, 'name 94'),
(95, 'name 95'),
(96, 'name 96'),
(97, 'name 97'),
(98, 'name 98'),
(99, 'name 99'),
(100, 'name 100'),
(101, 'name 101'),
(102, 'name 102'),
(103, 'name 103');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `title`, `total`) VALUES
(0, 'none', 300),
(1, 'position 1', 2),
(2, 'position 2', 1),
(3, 'position 3', 3),
(4, 'position 4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `position_has_member`
--

DROP TABLE IF EXISTS `position_has_member`;
CREATE TABLE `position_has_member` (
  `position_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position_has_member`
--

INSERT INTO `position_has_member` (`position_id`, `member_id`, `order`, `score`) VALUES
(0, 5, 1, NULL),
(0, 5, 2, NULL),
(0, 5, 3, NULL),
(0, 6, 1, NULL),
(0, 6, 2, NULL),
(0, 6, 3, NULL),
(0, 7, 1, NULL),
(0, 7, 2, NULL),
(0, 7, 3, NULL),
(0, 8, 1, NULL),
(0, 8, 2, NULL),
(0, 8, 3, NULL),
(0, 9, 1, NULL),
(0, 9, 2, NULL),
(0, 9, 3, NULL),
(0, 10, 1, NULL),
(0, 10, 2, NULL),
(0, 10, 3, NULL),
(0, 11, 1, NULL),
(0, 11, 2, NULL),
(0, 11, 3, NULL),
(0, 12, 1, NULL),
(0, 12, 2, NULL),
(0, 12, 3, NULL),
(0, 13, 1, NULL),
(0, 13, 2, NULL),
(0, 13, 3, NULL),
(0, 14, 1, NULL),
(0, 14, 2, NULL),
(0, 14, 3, NULL),
(0, 15, 1, NULL),
(0, 15, 2, NULL),
(0, 15, 3, NULL),
(0, 16, 1, NULL),
(0, 16, 2, NULL),
(0, 16, 3, NULL),
(0, 17, 1, NULL),
(0, 17, 2, NULL),
(0, 17, 3, NULL),
(0, 18, 1, NULL),
(0, 18, 2, NULL),
(0, 18, 3, NULL),
(0, 19, 1, NULL),
(0, 19, 2, NULL),
(0, 19, 3, NULL),
(0, 20, 1, NULL),
(0, 20, 2, NULL),
(0, 20, 3, NULL),
(0, 21, 1, NULL),
(0, 21, 2, NULL),
(0, 21, 3, NULL),
(0, 22, 1, NULL),
(0, 22, 2, NULL),
(0, 22, 3, NULL),
(0, 23, 1, NULL),
(0, 23, 2, NULL),
(0, 23, 3, NULL),
(0, 24, 1, NULL),
(0, 24, 2, NULL),
(0, 24, 3, NULL),
(0, 25, 1, NULL),
(0, 25, 2, NULL),
(0, 25, 3, NULL),
(0, 26, 1, NULL),
(0, 26, 2, NULL),
(0, 26, 3, NULL),
(0, 27, 1, NULL),
(0, 27, 2, NULL),
(0, 27, 3, NULL),
(0, 28, 1, NULL),
(0, 28, 2, NULL),
(0, 28, 3, NULL),
(0, 29, 1, NULL),
(0, 29, 2, NULL),
(0, 29, 3, NULL),
(0, 30, 1, NULL),
(0, 30, 2, NULL),
(0, 30, 3, NULL),
(0, 31, 1, NULL),
(0, 31, 2, NULL),
(0, 31, 3, NULL),
(0, 32, 1, NULL),
(0, 32, 2, NULL),
(0, 32, 3, NULL),
(0, 33, 1, NULL),
(0, 33, 2, NULL),
(0, 33, 3, NULL),
(0, 34, 1, NULL),
(0, 34, 2, NULL),
(0, 34, 3, NULL),
(0, 35, 1, NULL),
(0, 35, 2, NULL),
(0, 35, 3, NULL),
(0, 36, 1, NULL),
(0, 36, 2, NULL),
(0, 36, 3, NULL),
(0, 37, 1, NULL),
(0, 37, 2, NULL),
(0, 37, 3, NULL),
(0, 38, 1, NULL),
(0, 38, 2, NULL),
(0, 38, 3, NULL),
(0, 39, 1, NULL),
(0, 39, 2, NULL),
(0, 39, 3, NULL),
(0, 40, 1, NULL),
(0, 40, 2, NULL),
(0, 40, 3, NULL),
(0, 41, 1, NULL),
(0, 41, 2, NULL),
(0, 41, 3, NULL),
(0, 42, 1, NULL),
(0, 42, 2, NULL),
(0, 42, 3, NULL),
(0, 43, 1, NULL),
(0, 43, 2, NULL),
(0, 43, 3, NULL),
(0, 44, 1, NULL),
(0, 44, 2, NULL),
(0, 44, 3, NULL),
(0, 45, 1, NULL),
(0, 45, 2, NULL),
(0, 45, 3, NULL),
(0, 46, 1, NULL),
(0, 46, 2, NULL),
(0, 46, 3, NULL),
(0, 47, 1, NULL),
(0, 47, 2, NULL),
(0, 47, 3, NULL),
(0, 48, 1, NULL),
(0, 48, 2, NULL),
(0, 48, 3, NULL),
(0, 49, 1, NULL),
(0, 49, 2, NULL),
(0, 49, 3, NULL),
(0, 50, 1, NULL),
(0, 50, 2, NULL),
(0, 50, 3, NULL),
(0, 51, 1, NULL),
(0, 51, 2, NULL),
(0, 51, 3, NULL),
(0, 52, 1, NULL),
(0, 52, 2, NULL),
(0, 52, 3, NULL),
(0, 53, 1, NULL),
(0, 53, 2, NULL),
(0, 53, 3, NULL),
(0, 54, 1, NULL),
(0, 54, 2, NULL),
(0, 54, 3, NULL),
(0, 55, 1, NULL),
(0, 55, 2, NULL),
(0, 55, 3, NULL),
(0, 56, 1, NULL),
(0, 56, 2, NULL),
(0, 56, 3, NULL),
(0, 57, 1, NULL),
(0, 57, 2, NULL),
(0, 57, 3, NULL),
(0, 58, 1, NULL),
(0, 58, 2, NULL),
(0, 58, 3, NULL),
(0, 59, 1, NULL),
(0, 59, 2, NULL),
(0, 59, 3, NULL),
(0, 60, 1, NULL),
(0, 60, 2, NULL),
(0, 60, 3, NULL),
(0, 61, 1, NULL),
(0, 61, 2, NULL),
(0, 61, 3, NULL),
(0, 62, 1, NULL),
(0, 62, 2, NULL),
(0, 62, 3, NULL),
(0, 63, 1, NULL),
(0, 63, 2, NULL),
(0, 63, 3, NULL),
(0, 64, 1, NULL),
(0, 64, 2, NULL),
(0, 64, 3, NULL),
(0, 65, 1, NULL),
(0, 65, 2, NULL),
(0, 65, 3, NULL),
(0, 66, 1, NULL),
(0, 66, 2, NULL),
(0, 66, 3, NULL),
(0, 67, 1, NULL),
(0, 67, 2, NULL),
(0, 67, 3, NULL),
(0, 68, 1, NULL),
(0, 68, 2, NULL),
(0, 68, 3, NULL),
(0, 69, 1, NULL),
(0, 69, 2, NULL),
(0, 69, 3, NULL),
(0, 70, 1, NULL),
(0, 70, 2, NULL),
(0, 70, 3, NULL),
(0, 71, 1, NULL),
(0, 71, 2, NULL),
(0, 71, 3, NULL),
(0, 72, 1, NULL),
(0, 72, 2, NULL),
(0, 72, 3, NULL),
(0, 73, 1, NULL),
(0, 73, 2, NULL),
(0, 73, 3, NULL),
(0, 74, 1, NULL),
(0, 74, 2, NULL),
(0, 74, 3, NULL),
(0, 75, 1, NULL),
(0, 75, 2, NULL),
(0, 75, 3, NULL),
(0, 76, 1, NULL),
(0, 76, 2, NULL),
(0, 76, 3, NULL),
(0, 77, 1, NULL),
(0, 77, 2, NULL),
(0, 77, 3, NULL),
(0, 78, 1, NULL),
(0, 78, 2, NULL),
(0, 78, 3, NULL),
(0, 79, 1, NULL),
(0, 79, 2, NULL),
(0, 79, 3, NULL),
(0, 80, 1, NULL),
(0, 80, 2, NULL),
(0, 80, 3, NULL),
(0, 81, 1, NULL),
(0, 81, 2, NULL),
(0, 81, 3, NULL),
(0, 82, 1, NULL),
(0, 82, 2, NULL),
(0, 82, 3, NULL),
(0, 83, 1, NULL),
(0, 83, 2, NULL),
(0, 83, 3, NULL),
(0, 84, 1, NULL),
(0, 84, 2, NULL),
(0, 84, 3, NULL),
(0, 85, 1, NULL),
(0, 85, 2, NULL),
(0, 85, 3, NULL),
(0, 86, 1, NULL),
(0, 86, 2, NULL),
(0, 86, 3, NULL),
(0, 87, 1, NULL),
(0, 87, 2, NULL),
(0, 87, 3, NULL),
(0, 88, 1, NULL),
(0, 88, 2, NULL),
(0, 88, 3, NULL),
(0, 89, 1, NULL),
(0, 89, 2, NULL),
(0, 89, 3, NULL),
(0, 90, 1, NULL),
(0, 90, 2, NULL),
(0, 90, 3, NULL),
(0, 91, 1, NULL),
(0, 91, 2, NULL),
(0, 91, 3, NULL),
(0, 92, 1, NULL),
(0, 92, 2, NULL),
(0, 92, 3, NULL),
(0, 93, 1, NULL),
(0, 93, 2, NULL),
(0, 93, 3, NULL),
(0, 94, 1, NULL),
(0, 94, 2, NULL),
(0, 94, 3, NULL),
(0, 95, 1, NULL),
(0, 95, 2, NULL),
(0, 95, 3, NULL),
(0, 96, 1, NULL),
(0, 96, 2, NULL),
(0, 96, 3, NULL),
(0, 97, 1, NULL),
(0, 97, 2, NULL),
(0, 97, 3, NULL),
(0, 98, 1, NULL),
(0, 98, 2, NULL),
(0, 98, 3, NULL),
(0, 99, 1, NULL),
(0, 99, 2, NULL),
(0, 99, 3, NULL),
(0, 100, 1, NULL),
(0, 100, 2, NULL),
(0, 100, 3, NULL),
(0, 101, 1, NULL),
(0, 101, 2, NULL),
(0, 101, 3, NULL),
(0, 102, 1, NULL),
(0, 102, 2, NULL),
(0, 102, 3, NULL),
(0, 103, 1, NULL),
(0, 103, 2, NULL),
(0, 103, 3, NULL),
(1, 1, 1, 1),
(1, 2, 3, 3),
(2, 1, 2, 8),
(2, 2, 1, 5),
(2, 3, 1, 7),
(2, 4, 1, NULL),
(3, 1, 3, 5),
(3, 3, 2, 9),
(3, 4, 3, NULL),
(4, 2, 2, 5),
(4, 3, 3, 2),
(4, 4, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authen`
--
ALTER TABLE `authen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position_has_member`
--
ALTER TABLE `position_has_member`
  ADD PRIMARY KEY (`position_id`,`member_id`,`order`),
  ADD KEY `fk_position_has_member_member1_idx` (`member_id`),
  ADD KEY `fk_position_has_member_position_idx` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authen`
--
ALTER TABLE `authen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `position_has_member`
--
ALTER TABLE `position_has_member`
  ADD CONSTRAINT `fk_position_has_member_member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_position_has_member_position` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
