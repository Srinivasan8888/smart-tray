-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 09:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lam`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `s.no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `s1` varchar(20) NOT NULL,
  `s2` varchar(20) NOT NULL,
  `s3` varchar(20) NOT NULL,
  `s4` varchar(20) NOT NULL,
  `s5` varchar(20) NOT NULL,
  `s6` varchar(20) NOT NULL,
  `s7` varchar(20) NOT NULL,
  `s8` varchar(20) NOT NULL,
  `s9` varchar(20) NOT NULL,
  `s10` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`s.no`, `id`, `s1`, `s2`, `s3`, `s4`, `s5`, `s6`, `s7`, `s8`, `s9`, `s10`, `date`) VALUES
(4, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '22', '2023-04-28_15:37:23'),
(5, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '22', '2023-04-28_15:40:54'),
(6, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '22', '2023-04-28_15:40:56'),
(7, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '22', '2023-04-28_15:59:43'),
(8, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '23', '2023-04-28_15:59:46'),
(9, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '22', '2023-04-28_16:21:31'),
(10, '1', '2', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:21:35'),
(11, '1', '22', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:21:44'),
(12, '1', '41', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:21:48'),
(13, '1', '77', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:21:52'),
(14, '1', '70', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:26:26'),
(15, '2', '70', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_16:40:43'),
(16, '2', '78', '33', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:00:30'),
(17, '2', '78', '44', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:18:25'),
(18, '2', '78', '88', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:18:34'),
(19, '2', '78', '89', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:18:46'),
(20, '2', '77', '89', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:18:55'),
(21, '2', '500', '89', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_17:30:36'),
(22, '2', '55', '89', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_22:09:15'),
(23, '2', '54', '89', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_22:09:29'),
(24, '2', '54', '600', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_22:09:46'),
(25, '2', '500', '600', '44', '11', '11', '22', '44', '66', '11', '29', '2023-04-28_22:10:34'),
(26, '2', '500', '600', '44', '112.7', '11', '22', '44', '66', '11', '29', '2023-04-29_13:04:01'),
(27, '2', '301.9', '600', '44', '112.7', '11', '22', '44', '66', '11', '29', '2023-04-29_13:04:19'),
(28, '2', '40.9', '600', '44', '112.7', '11', '22', '44', '66', '11', '29', '2023-04-29_18:11:25'),
(29, '2', '40.9', '600', '44', '112.7', '11', '77', '44', '66', '11', '29', '2023-04-29_18:11:41'),
(30, '2', '40.9', '600', '44', '112.7', '11', '77', '32', '66', '11', '29', '2023-04-29_18:12:13'),
(31, '2', '40.9', '600', '44', '112.7', '11', '77', '32', '66', '111', '29', '2023-04-29_18:12:40'),
(32, '2', '40.9', '600', '44', '112.7', '11', '77', '32', '66', '111', '290', '2023-04-29_18:13:04'),
(33, '2', '400', '600', '44', '112.7', '11', '77', '32', '66', '111', '290', '2023-04-30_13:27:15'),
(34, 'xy1waveguide', '400', '600', '44', '112.7', '11', '77', '32', '66', '111', '290', '2023-04-30_21:48:13'),
(35, 'xy1waveguide', '200', '600', '44', '112.7', '11', '77', '32', '66', '111', '290', '2023-04-30_22:53:00'),
(36, 'xy1waveguide', '200', '800', '44', '112.7', '11', '77', '32', '66', '111', '290', '2023-04-30_23:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `loginact`
--

CREATE TABLE `loginact` (
  `s.no` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash` varchar(60) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginact`
--

INSERT INTO `loginact` (`s.no`, `email`, `hash`, `date`) VALUES
(1, 'pras@xyma.in', 'sGcDMCFdeK2hVCHUa4TFDsmOR3bOzb', '2023-04-28_11:14:03am'),
(2, 'pras@xyma.in', 'wmNO056YSs3EZU4hcNmM1vQCIGsPNM', '2023-04-28_11:24:44am'),
(3, 'pras@xyma.in', 'NScW3piqWBiQrDqpalkpjQpH895VWl', '2023-04-28_12:10:06pm'),
(4, 'pras@xyma.in', 'HdzrP4hjWzpryMUUTRk8uEmT3k9Jzw', '2023-04-28_12:22:17pm'),
(5, 'pras@xyma.in', 'Iyj09LEo6JFKPFHSC7OR6CSUZ6kV63', '2023-04-28_02:22:26pm'),
(6, 'pras@xyma.in', 'IxmtvWwdILBbn3W0uX68Q6ywxcQQsk', '2023-04-28_10:30:18pm'),
(7, 'pras@xyma.in', 'fNjOmo9kV29EVRQCyOgeSSBKyK6bMD', '2023-04-29_12:59:37pm'),
(8, 'pras@xyma.in', 'CL6HfYjkwkUdOUkkbZu62Yz774PLEt', '2023-04-29_05:23:36pm'),
(9, 'pras@xyma.in', 'MaClhwL7nvZRenqEGwkIQZGE4xuANZ', '2023-04-30_09:46:01pm');

-- --------------------------------------------------------

--
-- Table structure for table `logincred`
--

CREATE TABLE `logincred` (
  `s.no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logincred`
--

INSERT INTO `logincred` (`s.no`, `email`, `password`) VALUES
(1, 'pras@xyma.in', 'BQJd8Ki5HvAC3WacpXRWjw==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `loginact`
--
ALTER TABLE `loginact`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `logincred`
--
ALTER TABLE `logincred`
  ADD PRIMARY KEY (`s.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `loginact`
--
ALTER TABLE `loginact`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logincred`
--
ALTER TABLE `logincred`
  MODIFY `s.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;