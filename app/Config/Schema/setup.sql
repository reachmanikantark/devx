-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 04:35 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devx`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(125) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `contactnumber` varchar(30) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `state` varchar(50) COLLATE utf8_bin NOT NULL,
  `is_admin` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `contactnumber`, `address`, `state`, `is_admin`, `deleted`, `created`, `modified`) VALUES
(7, 'Maniii', 'Kantaa', 'reachmanikantark@gmail.com', '$2a$10$Rp7r6noEt84KY3euS6tFbecasUuBZMleJeISdTdXdmk0ZBwI2JeXm', '1234567851', 'testd\r\na\r\nfdsfaasd', 'AP', '1', 0, '2024-03-02 08:40:43', '2024-03-02 16:03:44'),
(9, 'Mani', 'kantaddd', 'test@test.com', '$2a$10$/gu6tONCTbFnFhyu0C2Idek8a40SVrwrMfT6NBGytmJRD2fnPSZcy', '1234567891', 'tes', 'TS', '1', 0, '2024-03-02 08:48:17', '2024-03-02 16:34:41'),
(19, 'ajaxtest', 'ajaxtest', 'ajaxtest3@gmail.com', '$2a$10$5MzTiTvE7438ZatV5yDl6eC5TeNK2zLUcaEdKjZJ0rf4ypfRCNZEa', '1234567888', 'test', 'AP', '0', 1, '2024-03-02 12:39:47', '2024-03-02 14:18:39'),
(20, 'ajax', 'moretest', 'ajaxtest4@gmail.com', '$2a$10$3uaF/kq8hmyTFsvqS6MNbe36lDRRtG7fxzc990Gty1enTVoEAyhMm', '7897897891', 'afdasds\r\nasfs\r\n', 'TS', '0', 1, '2024-03-02 12:41:28', '2024-03-02 14:17:51'),
(23, 'Mani', 'kanta', 'reachmanikantark2@gmail.com', '$2a$10$jUbuYgT/3K0gst5wYqBhvO8EDl9pz7qGJozh2iRLtPl9chWdJSzGS', '1234567891', 'test\r\ntest\r\ntest', 'AP', '1', 0, '2024-03-02 13:16:02', '2024-03-02 16:15:09'),
(24, 'Devx', 'Staffing', 'manikanta1234@gmail.com', '$2a$10$mrgfP0T/30AQpC.N3xzllOmxucRB42OgqflIzupAxIQu9UG/sIPY.', '7418529633', 'test test', 'AP', '0', 0, '2024-03-02 14:33:59', '2024-03-02 14:33:59'),
(25, 'allstates', 'allstates', 'allstates@gmail.com', '$2a$10$5j9EUjLuVtiAtipTZg0H0OatDgsqSPVryiohuDHTonhGQHqhJF196', '8529637411', 'test\r\ntest\r\ntest', '3', '0', 1, '2024-03-02 14:55:41', '2024-03-02 15:06:05'),
(26, 'testing', 'testing', 'testing@gmail.com', '$2a$10$rp4J3/ifwRCKhI5mD0TbJeknkHl3nA4Zul2M0f2cfNjgOv525bxOW', '8528528522', 'test \r\ntest', 'BR', '0', 0, '2024-03-02 15:13:31', '2024-03-02 15:13:31'),
(27, 'usrmanied', 'kantalnamed', 'manikanta123@testtt.com', '$2a$10$zbwC8slj93G1I/ipG9OlN.99K4HnmPIqdh61Hbhc7MtXK12z8yssq', '1223456784', 'test addr area test\r\ntest eddd', 'AR', '1', 1, '2024-03-02 15:40:45', '2024-03-02 15:46:51'),
(28, 'Testing', 'testing', 'testingtesting@gmail.com', '$2a$10$KOLZQOBGxTH5R7/V2lGHw.ghGQ3DL7T7dKJ.lQK./kUJ7JAm6/Yae', '7418529633', 'afsdfdsf', 'GA', '0', 0, '2024-03-02 16:04:15', '2024-03-02 16:04:15'),
(29, 'test', 'test', 'test@com.com', '$2a$10$Rl0gvohhZ/6S2po.nhCeDulG.T4w6bNsUO0BJfWuVanbSN6eR7w16', '1123456789', 'test', 'KA', '0', 0, '2024-03-02 16:04:57', '2024-03-02 16:04:57'),
(30, 'Testing', 'testing', 'reachmanikantark12@gmail.com', '$2a$10$vbKrexCaJt5HiAGlPtbc8ee6nMZTwA6.yAVGHWTPySe6vQi5SVuRi', '7418529632', 'test test test test', 'HP', '0', 0, '2024-03-02 16:12:14', '2024-03-02 16:12:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
