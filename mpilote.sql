-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 09, 2022 at 09:45 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpilote`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipement`
--

CREATE TABLE `equipement` (
  `name` varchar(255) NOT NULL,
  `startcommand` varchar(255) NOT NULL,
  `stopcommand` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipement`
--

INSERT INTO `equipement` (`name`, `startcommand`, `stopcommand`, `port`, `type`, `id`) VALUES
('BRIGHTSIGN', 'START', 'STOP', '2775', 'UDP', 11),
('DW630-GS', '(PWR 1)', '(PWR 0)', '7425', 'TCP', 12);

-- --------------------------------------------------------

--
-- Table structure for table `ghr`
--

CREATE TABLE `ghr` (
  `name` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `port` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `startcommand` varchar(255) NOT NULL,
  `stopcommand` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ghr`
--

INSERT INTO `ghr` (`name`, `ip`, `port`, `type`, `startcommand`, `stopcommand`, `id`) VALUES
('BRIGHTSIGN', '152.158.10.95', 5000, 'UDP', 'START', 'STOP', 53),
('BRIGHTSIGN', '152.158.10.12', 5000, 'UDP', 'START', 'STOP', 54),
('DW630-GS', '152.158.10.27', 3002, 'TCP', '(PWR 1)', '(PWR 0)', 55);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ghr`
--
ALTER TABLE `ghr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ghr`
--
ALTER TABLE `ghr`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
