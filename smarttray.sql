-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2023 at 11:28 AM
-- Server version: 8.0.33-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarttray`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset-infomation`
--

CREATE TABLE `asset-infomation` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `customerid` varchar(100) NOT NULL,
  `phoneno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `asset-infomation`
--

INSERT INTO `asset-infomation` (`name`, `email`, `customerid`, `phoneno`) VALUES
('srinivasan', 'srinivasan@xyma.in', 'XY045', '7708109230'),
('srinivasan', 'srinivasan@xyma.in', 'XY045', '7708109230');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `s.no` int NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`s.no`, `email`, `pass`) VALUES
(1, 'srinivasan@xyma.in', 'I7Y+5S3Y17P3xydko3M+Ow=='),
(2, 'shefin@xyma.in', 'euYGo+Wc73scIkJGXA/tGg==');

-- --------------------------------------------------------

--
-- Table structure for table `loginact`
--

CREATE TABLE `loginact` (
  `s.no` int NOT NULL,
  `email` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL,
  `mac` varchar(20) NOT NULL,
  `identity` varchar(100) NOT NULL,
  `hashkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `s.no` int NOT NULL,
  `Id` varchar(100) NOT NULL,
  `sensor1` varchar(100) NOT NULL,
  `sensor2` varchar(100) NOT NULL,
  `sensor3` varchar(100) NOT NULL,
  `sample` varchar(200) NOT NULL,
  `sample1` varchar(200) NOT NULL,
  `sample2` varchar(200) NOT NULL,
  `percentage` varchar(200) NOT NULL,
  `percentage1` varchar(200) NOT NULL,
  `percentage2` int NOT NULL,
  `timestamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`s.no`, `Id`, `sensor1`, `sensor2`, `sensor3`, `sample`, `sample1`, `sample2`, `percentage`, `percentage1`, `percentage2`, `timestamp`) VALUES
(1, '1', '52', '57', '54', '', '', '', '', '', 0, '2023-03-22 19:58:08'),
(2, '1', '58', '52', '53', '', '', '', '', '', 0, '2023-03-22 20:28:05'),
(3, '1', '54', '55', '51', '', '', '', '', '', 0, '2023-03-22 20:30:05'),
(4, '1', '60', '60', '51', '', '', '', '', '', 0, '2023-03-22 20:30:15'),
(5, '1', '59', '53', '51', '', '', '', '', '', 0, '2023-03-22 20:38:17'),
(6, '1', '50', '59', '53', '', '', '', '', '', 0, '2023-03-22 20:38:34'),
(7, '1', '57', '59', '54', '', '', '', '', '', 0, '2023-03-22 20:42:58'),
(8, '1', '50', '55', '60', '', '', '', '', '', 0, '2023-03-22 20:42:59'),
(9, '1', '53', '56', '53', '', '', '', '', '', 0, '2023-03-22 20:43:01'),
(10, '1', '60', '56', '51', '', '', '', '', '', 0, '2023-03-23 12:01:47'),
(11, '1', '51', '53', '60', '', '', '', '', '', 0, '2023-03-23 12:01:57'),
(12, '1', '55', '57', '54', '', '', '', '', '', 0, '2023-03-23 12:02:01'),
(13, '', '', '', '', '', '', '', '', '', 0, '2023-03-29 11:17:18'),
(14, '1', '900', '100', '200', 'water', 'petroleum', 'coconut oil', '90', '10', 20, '2023-03-29 11:17:42'),
(15, '1', '10', '20', '30', 'water', 'coconut oil', 'crude oil', '70', '80', 90, '2023-05-08 10:19:03'),
(16, '1', '10', '20', '30', 'water', 'coconut oil', 'crude oil', '70', '80', 90, '2023-05-08 10:20:30'),
(17, '1', '800', '900', '300', 'water', 'coconut oil', 'crude oil', '80', '90', 30, '2023-05-08 14:39:59'),
(18, '1', '900', '700', '400', 'water', 'coconut oil', 'crude oil', '90', '70', 40, '2023-05-08 14:44:31'),
(19, '1', '567', '760', '440', 'water', 'coconut oil', 'crude oil', '56.7', '76', 44, '2023-05-08 14:45:07'),
(20, '1', '750', '600', '50', 'water', 'coconut oil', 'crude oil', '75', '60', 5, '2023-05-08 18:05:34'),
(21, '1', '735', '212', '695', 'water', 'coconut oil', 'crude oil', '73.5', '21.2', 70, '2023-05-09 07:14:13'),
(22, '1', '216', '76', '440', 'water', 'coconut oil', 'crude oil', '21.6', '7.6', 44, '2023-05-09 07:16:07'),
(23, '1', '867', '201', '259', 'water', 'coconut oil', 'crude oil', '86.7', '20.1', 26, '2023-05-09 07:16:51'),
(24, '1', '199', '891', '145', 'water', 'coconut oil', 'crude oil', '19.900000000000002', '89.1', 14, '2023-05-09 07:18:27'),
(25, '1', '855', '532', '573', 'water', 'coconut oil', 'crude oil', '85.5', '53.2', 57, '2023-05-09 07:20:15'),
(26, '1', '507', '354', '374', 'water', 'coconut oil', 'crude oil', '50.7', '35.4', 37, '2023-05-09 07:20:17'),
(27, '1', '215', '175', '527', 'water', 'coconut oil', 'crude oil', '21.5', '17.5', 53, '2023-05-09 07:20:19'),
(28, '1', '562', '593', '260', 'water', 'coconut oil', 'crude oil', '56.2', '59.3', 26, '2023-05-09 07:20:21'),
(29, '1', '169', '516', '872', 'water', 'coconut oil', 'crude oil', '16.900000000000002', '51.6', 87, '2023-05-09 07:20:23'),
(30, '1', '418', '893', '85', 'water', 'coconut oil', 'crude oil', '41.8', '89.3', 9, '2023-05-09 07:20:25'),
(31, '1', '642', '666', '816', 'water', 'coconut oil', 'crude oil', '64.2', '66.60000000000001', 82, '2023-05-09 07:20:27'),
(32, '1', '646', '834', '706', 'water', 'coconut oil', 'crude oil', '64.60000000000001', '83.39999999999999', 71, '2023-05-09 07:20:29'),
(33, '1', '834', '472', '181', 'water', 'coconut oil', 'crude oil', '83.39999999999999', '47.199999999999996', 18, '2023-05-09 07:20:31'),
(34, '1', '540', '721', '61', 'water', 'coconut oil', 'crude oil', '54.0', '72.1', 6, '2023-05-09 07:20:33'),
(35, '1', '323', '835', '498', 'water', 'coconut oil', 'crude oil', '32.300000000000004', '83.5', 50, '2023-05-09 07:20:35'),
(36, '1', '194', '785', '465', 'water', 'coconut oil', 'crude oil', '19.400000000000002', '78.5', 47, '2023-05-09 07:20:37'),
(37, '1', '849', '377', '630', 'water', 'coconut oil', 'crude oil', '84.89999999999999', '37.7', 63, '2023-05-09 07:20:39'),
(38, '1', '332', '896', '232', 'water', 'coconut oil', 'crude oil', '33.2', '89.60000000000001', 23, '2023-05-09 07:20:41'),
(39, '1', '263', '672', '486', 'water', 'coconut oil', 'crude oil', '26.3', '67.2', 49, '2023-05-09 07:20:43'),
(40, '1', '133', '343', '344', 'water', 'coconut oil', 'crude oil', '13.3', '34.300000000000004', 34, '2023-05-09 07:20:45'),
(41, '1', '280', '136', '403', 'water', 'coconut oil', 'crude oil', '28.000000000000004', '13.600000000000001', 40, '2023-05-09 07:20:47'),
(42, '1', '528', '801', '294', 'water', 'coconut oil', 'crude oil', '52.800000000000004', '80.10000000000001', 29, '2023-05-09 07:20:49'),
(43, '1', '501', '51', '769', 'water', 'coconut oil', 'crude oil', '50.1', '5.1', 77, '2023-05-09 07:20:51'),
(44, '1', '876', '875', '549', 'water', 'coconut oil', 'crude oil', '87.6', '87.5', 55, '2023-05-09 07:20:53'),
(45, '1', '682', '371', '805', 'water', 'coconut oil', 'crude oil', '68.2', '37.1', 81, '2023-05-09 07:20:55'),
(46, '1', '147', '749', '357', 'water', 'coconut oil', 'crude oil', '14.7', '74.9', 36, '2023-05-09 07:20:57'),
(47, '1', '225', '512', '548', 'water', 'coconut oil', 'crude oil', '22.5', '51.2', 55, '2023-05-09 07:20:59'),
(48, '1', '329', '146', '273', 'water', 'coconut oil', 'crude oil', '32.9', '14.6', 27, '2023-05-09 07:21:01'),
(49, '1', '662', '309', '544', 'water', 'coconut oil', 'crude oil', '66.2', '30.9', 54, '2023-05-09 07:21:03'),
(50, '1', '721', '736', '734', 'water', 'coconut oil', 'crude oil', '72.1', '73.6', 73, '2023-05-09 07:21:05'),
(51, '1', '850', '50', '242', 'water', 'coconut oil', 'crude oil', '85.0', '5.0', 24, '2023-05-09 07:21:07'),
(52, '1', '773', '426', '855', 'water', 'coconut oil', 'crude oil', '77.3', '42.6', 86, '2023-05-09 07:21:09'),
(53, '1', '370', '560', '362', 'water', 'coconut oil', 'crude oil', '37.0', '56.00000000000001', 36, '2023-05-09 07:21:11'),
(54, '1', '856', '542', '458', 'water', 'coconut oil', 'crude oil', '85.6', '54.2', 46, '2023-05-09 07:21:13'),
(55, '1', '542', '891', '495', 'water', 'coconut oil', 'crude oil', '54.2', '89.1', 50, '2023-05-09 07:28:20'),
(56, '1', '725', '376', '466', 'water', 'coconut oil', 'crude oil', '72.5', '37.6', 47, '2023-05-09 07:28:22'),
(57, '1', '674', '764', '708', 'water', 'coconut oil', 'crude oil', '67.4', '76.4', 71, '2023-05-09 07:28:24'),
(58, '1', '682', '881', '417', 'water', 'coconut oil', 'crude oil', '68.2', '88.1', 42, '2023-05-09 07:28:26'),
(59, '1', '228', '829', '255', 'water', 'coconut oil', 'crude oil', '22.8', '82.89999999999999', 26, '2023-05-09 07:32:24'),
(60, '1', '153', '316', '485', 'water', 'coconut oil', 'crude oil', '15.299999999999999', '31.6', 49, '2023-05-09 07:32:26'),
(61, '1', '887', '468', '353', 'water', 'coconut oil', 'crude oil', '88.7', '46.800000000000004', 35, '2023-05-09 07:32:28'),
(62, '1', '655', '648', '767', 'water', 'coconut oil', 'crude oil', '65.5', '64.8', 77, '2023-05-09 07:32:30'),
(63, '1', '842', '339', '53', 'water', 'coconut oil', 'crude oil', '84.2', '33.900000000000006', 5, '2023-05-09 07:32:32'),
(64, '1', '834', '138', '326', 'water', 'coconut oil', 'crude oil', '83.39999999999999', '13.8', 33, '2023-05-09 07:32:34'),
(65, '1', '900', '769', '286', 'water', 'coconut oil', 'crude oil', '90.0', '76.9', 29, '2023-05-09 07:32:36'),
(66, '1', '712', '367', '526', 'water', 'coconut oil', 'crude oil', '71.2', '36.7', 53, '2023-05-09 07:32:38'),
(67, '1', '232', '395', '697', 'water', 'coconut oil', 'crude oil', '23.200000000000003', '39.5', 70, '2023-05-09 07:32:40'),
(68, '1', '196', '803', '714', 'water', 'coconut oil', 'crude oil', '19.6', '80.30000000000001', 71, '2023-05-09 07:32:42'),
(69, '1', '418', '644', '692', 'water', 'coconut oil', 'crude oil', '41.8', '64.4', 69, '2023-05-09 07:32:44'),
(70, '1', '370', '802', '704', 'water', 'coconut oil', 'crude oil', '37.0', '80.2', 70, '2023-05-09 07:32:46'),
(71, '1', '710', '380', '782', 'water', 'coconut oil', 'crude oil', '71.0', '38.0', 78, '2023-05-09 07:32:48'),
(72, '1', '648', '750', '75', 'water', 'coconut oil', 'crude oil', '64.8', '75.0', 8, '2023-05-09 07:32:50'),
(73, '1', '125', '308', '644', 'water', 'coconut oil', 'crude oil', '12.5', '30.8', 64, '2023-05-09 07:32:52'),
(74, '1', '141', '355', '638', 'water', 'coconut oil', 'crude oil', '14.099999999999998', '35.5', 64, '2023-05-09 07:32:54'),
(75, '1', '693', '835', '742', 'water', 'coconut oil', 'crude oil', '69.3', '83.5', 74, '2023-05-09 07:32:56'),
(76, '1', '178', '899', '131', 'water', 'coconut oil', 'crude oil', '17.8', '89.9', 13, '2023-05-09 07:32:58'),
(77, '1', '683', '501', '751', 'water', 'coconut oil', 'crude oil', '68.30000000000001', '50.1', 75, '2023-05-09 07:33:00'),
(78, '1', '376', '757', '273', 'water', 'coconut oil', 'crude oil', '37.6', '75.7', 27, '2023-05-09 07:33:02'),
(79, '1', '398', '821', '712', 'water', 'coconut oil', 'crude oil', '39.800000000000004', '82.1', 71, '2023-05-09 07:33:04'),
(80, '1', '470', '707', '435', 'water', 'coconut oil', 'crude oil', '47.0', '70.7', 44, '2023-05-09 07:33:06'),
(81, '1', '804', '511', '287', 'water', 'coconut oil', 'crude oil', '80.4', '51.1', 29, '2023-05-09 07:33:08'),
(82, '1', '701', '513', '284', 'water', 'coconut oil', 'crude oil', '70.1', '51.300000000000004', 28, '2023-05-09 07:33:10'),
(83, '1', '455', '642', '526', 'water', 'coconut oil', 'crude oil', '45.5', '64.2', 53, '2023-05-09 07:33:12'),
(84, '1', '135', '363', '354', 'water', 'coconut oil', 'crude oil', '13.5', '36.3', 35, '2023-05-09 07:33:14'),
(85, '1', '534', '493', '761', 'water', 'coconut oil', 'crude oil', '53.400000000000006', '49.3', 76, '2023-05-09 07:33:16'),
(86, '1', '801', '470', '220', 'water', 'coconut oil', 'crude oil', '80.10000000000001', '47.0', 22, '2023-05-09 07:33:18'),
(87, '1', '746', '722', '197', 'water', 'coconut oil', 'crude oil', '74.6', '72.2', 20, '2023-05-09 07:33:20'),
(88, '1', '539', '592', '92', 'water', 'coconut oil', 'crude oil', '53.900000000000006', '59.199999999999996', 9, '2023-05-09 07:33:22'),
(89, '1', '99', '626', '326', 'water', 'coconut oil', 'crude oil', '9.9', '62.6', 33, '2023-05-09 07:33:24'),
(90, '1', '60', '297', '143', 'water', 'coconut oil', 'crude oil', '6.0', '29.7', 14, '2023-05-09 07:33:26'),
(91, '1', '185', '313', '419', 'water', 'coconut oil', 'crude oil', '18.5', '31.3', 42, '2023-05-09 07:33:28'),
(92, '1', '881', '761', '610', 'water', 'coconut oil', 'crude oil', '88.1', '76.1', 61, '2023-05-09 07:33:30'),
(93, '1', '680', '609', '547', 'water', 'coconut oil', 'crude oil', '68.0', '60.9', 55, '2023-05-09 07:33:32'),
(94, '1', '715', '72', '599', 'water', 'coconut oil', 'crude oil', '71.5', '7.199999999999999', 60, '2023-05-09 07:33:34'),
(95, '1', '507', '256', '897', 'water', 'coconut oil', 'crude oil', '50.7', '25.6', 90, '2023-05-09 07:33:36'),
(96, '1', '336', '366', '450', 'water', 'coconut oil', 'crude oil', '33.6', '36.6', 45, '2023-05-09 07:33:38'),
(97, '1', '454', '684', '219', 'water', 'coconut oil', 'crude oil', '45.4', '68.4', 22, '2023-05-09 07:33:40'),
(98, '1', '685', '882', '64', 'water', 'coconut oil', 'crude oil', '68.5', '88.2', 6, '2023-05-09 07:33:42'),
(99, '1', '320', '626', '878', 'water', 'coconut oil', 'crude oil', '32.0', '62.6', 88, '2023-05-09 07:33:44'),
(100, '1', '231', '120', '786', 'water', 'coconut oil', 'crude oil', '23.1', '12.0', 79, '2023-05-09 07:33:46'),
(101, '1', '638', '512', '187', 'water', 'coconut oil', 'crude oil', '63.800000000000004', '51.2', 19, '2023-05-09 07:33:48'),
(102, '1', '810', '845', '90', 'water', 'coconut oil', 'crude oil', '81.0', '84.5', 9, '2023-05-09 07:33:50'),
(103, '1', '793', '652', '510', 'water', 'coconut oil', 'crude oil', '79.3', '65.2', 51, '2023-05-09 07:33:52'),
(104, '1', '556', '250', '530', 'water', 'coconut oil', 'crude oil', '55.60000000000001', '25.0', 53, '2023-05-09 07:33:54'),
(105, '1', '681', '769', '661', 'water', 'coconut oil', 'crude oil', '68.10000000000001', '76.9', 66, '2023-05-09 07:33:56'),
(106, '1', '172', '264', '747', 'water', 'coconut oil', 'crude oil', '17.2', '26.400000000000002', 75, '2023-05-09 07:33:58'),
(107, '1', '635', '641', '622', 'water', 'coconut oil', 'crude oil', '63.5', '64.1', 62, '2023-05-09 07:34:00'),
(108, '1', '740', '479', '398', 'water', 'coconut oil', 'crude oil', '74.0', '47.9', 40, '2023-05-09 07:34:02'),
(109, '1', '480', '96', '457', 'water', 'coconut oil', 'crude oil', '48.0', '9.6', 46, '2023-05-09 07:34:04'),
(110, '1', '196', '192', '740', 'water', 'coconut oil', 'crude oil', '19.6', '19.2', 74, '2023-05-09 07:34:06'),
(111, '1', '61', '345', '886', 'water', 'coconut oil', 'crude oil', '6.1', '34.5', 89, '2023-05-09 07:34:08'),
(112, '1', '184', '522', '766', 'water', 'coconut oil', 'crude oil', '18.4', '52.2', 77, '2023-05-09 07:34:10'),
(113, '1', '681', '522', '396', 'water', 'coconut oil', 'crude oil', '68.10000000000001', '52.2', 40, '2023-05-09 07:34:12'),
(114, '1', '771', '379', '680', 'water', 'coconut oil', 'crude oil', '77.10000000000001', '37.9', 68, '2023-05-09 07:34:14'),
(115, '1', '394', '412', '292', 'water', 'coconut oil', 'crude oil', '39.4', '41.199999999999996', 29, '2023-05-09 07:34:16'),
(116, '1', '669', '229', '288', 'water', 'coconut oil', 'crude oil', '66.9', '22.900000000000002', 29, '2023-05-09 07:34:18'),
(117, '1', '601', '384', '842', 'water', 'coconut oil', 'crude oil', '60.099999999999994', '38.4', 84, '2023-05-09 07:34:20'),
(118, '1', '132', '630', '76', 'water', 'coconut oil', 'crude oil', '13.200000000000001', '63.0', 8, '2023-05-09 07:34:22'),
(119, '1', '665', '437', '710', 'water', 'coconut oil', 'crude oil', '66.5', '43.7', 71, '2023-05-09 07:34:24'),
(120, '1', '726', '247', '350', 'water', 'coconut oil', 'crude oil', '72.6', '24.7', 35, '2023-05-09 07:34:26'),
(121, '1', '201', '862', '588', 'water', 'coconut oil', 'crude oil', '20.1', '86.2', 59, '2023-05-09 07:34:28'),
(122, '1', '637', '632', '727', 'water', 'coconut oil', 'crude oil', '63.7', '63.2', 73, '2023-05-09 07:34:30'),
(123, '1', '251', '444', '96', 'water', 'coconut oil', 'crude oil', '25.1', '44.4', 10, '2023-05-09 07:34:32'),
(124, '1', '820', '72', '665', 'water', 'coconut oil', 'crude oil', '82.0', '7.199999999999999', 67, '2023-05-09 07:34:34'),
(125, '1', '184', '303', '308', 'water', 'coconut oil', 'crude oil', '18.4', '30.3', 31, '2023-05-09 07:34:36'),
(126, '1', '582', '706', '334', 'water', 'coconut oil', 'crude oil', '58.199999999999996', '70.6', 33, '2023-05-09 07:34:38'),
(127, '1', '557', '783', '900', 'water', 'coconut oil', 'crude oil', '55.7', '78.3', 90, '2023-05-09 07:34:40'),
(128, '1', '859', '507', '865', 'water', 'coconut oil', 'crude oil', '85.9', '50.7', 87, '2023-05-09 07:34:42'),
(129, '1', '735', '776', '150', 'water', 'coconut oil', 'crude oil', '73.5', '77.60000000000001', 15, '2023-05-09 07:34:44'),
(130, '1', '634', '577', '503', 'water', 'coconut oil', 'crude oil', '63.4', '57.699999999999996', 50, '2023-05-09 07:34:46'),
(131, '1', '834', '628', '52', 'water', 'coconut oil', 'crude oil', '83.39999999999999', '62.8', 5, '2023-05-09 07:34:48'),
(132, '1', '890', '201', '427', 'water', 'coconut oil', 'crude oil', '89.0', '20.1', 43, '2023-05-09 07:34:50'),
(133, '1', '168', '159', '123', 'water', 'coconut oil', 'crude oil', '16.8', '15.9', 12, '2023-05-09 07:34:52'),
(134, '1', '339', '843', '701', 'water', 'coconut oil', 'crude oil', '33.900000000000006', '84.3', 70, '2023-05-09 07:34:54'),
(135, '1', '811', '377', '281', 'water', 'coconut oil', 'crude oil', '81.10000000000001', '37.7', 28, '2023-05-09 07:34:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`s.no`,`email`);

--
-- Indexes for table `loginact`
--
ALTER TABLE `loginact`
  ADD PRIMARY KEY (`s.no`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`s.no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `s.no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loginact`
--
ALTER TABLE `loginact`
  MODIFY `s.no` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `s.no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
