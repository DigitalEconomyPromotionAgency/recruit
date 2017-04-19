-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2017 at 11:19 AM
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
(4, 'name 4');

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
(1, 1, 1, 2),
(1, 3, 3, 4),
(2, 1, 2, 3),
(2, 2, 2, NULL),
(2, 3, 2, 6),
(3, 1, 3, 4),
(3, 2, 1, NULL),
(4, 2, 3, NULL),
(4, 3, 1, 8);

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
