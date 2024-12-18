-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_builder_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_details`
--

CREATE TABLE `alumni_details` (
  `id` int(11) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `YearGraduated` varchar(10) DEFAULT NULL,
  `Course` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni_details`
--

INSERT INTO `alumni_details` (`id`, `Email`, `Password`, `isAdmin`, `FirstName`, `LastName`, `YearGraduated`, `Course`) VALUES
(20, 'parasaugust0@gmail.com', 'Toper123!', 0, 'August Christopher', 'Paras', 'BS-IT', '2024-11-25'),
(24, 'admin@email.com', 'Toper123!', 1, 'Admin', 'Admin', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `Id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `Details` varchar(1000) DEFAULT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TimeEdited` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`Id`, `title`, `Details`, `TimeStamp`, `TimeEdited`) VALUES
(95, 'ALumni Home Coming', 'asdasdasdasd', '2024-12-05 00:21:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_list`
--

CREATE TABLE `form_list` (
  `id` int(30) NOT NULL,
  `form_code` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `fname` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_list`
--

INSERT INTO `form_list` (`id`, `form_code`, `title`, `fname`, `date_created`, `date_updated`) VALUES
(132, '8180559757', 'test1', '8180559757.xml', '2024-12-18 21:12:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `noti_user_uniqueid` varchar(100) NOT NULL,
  `noti_status` varchar(100) NOT NULL,
  `noti_date` varchar(100) NOT NULL,
  `noti_type` varchar(100) NOT NULL,
  `noti_url` varchar(1000) NOT NULL,
  `noti_uniqueid` varchar(100) NOT NULL,
  `noti_table` varchar(100) NOT NULL,
  `noti_seen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `noti_user_uniqueid`, `noti_status`, `noti_date`, `noti_type`, `noti_url`, `noti_uniqueid`, `noti_table`, `noti_seen`) VALUES
(20, '0', 'inactive', 'December 18, 2024, 9:12 am', 'survey', '8180559757', '8180559757', 'survey', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `notif_seen`
--

CREATE TABLE `notif_seen` (
  `id` int(11) NOT NULL,
  `notif_alumniuser` varchar(100) NOT NULL,
  `notif_url` varchar(100) NOT NULL,
  `notif_seen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(30) NOT NULL,
  `SurveyId` double NOT NULL,
  `ResponseList_Id` double NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `response_list`
--

CREATE TABLE `response_list` (
  `id` int(30) NOT NULL,
  `form_code` varchar(100) NOT NULL,
  `ResponseList_Id` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` int(11) NOT NULL,
  `Email` int(11) DEFAULT NULL,
  `Password` int(11) DEFAULT NULL,
  `Batch` date DEFAULT NULL,
  `FirstName` int(11) DEFAULT NULL,
  `LastName` int(11) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_details`
--
ALTER TABLE `alumni_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `form_list`
--
ALTER TABLE `form_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notif_seen`
--
ALTER TABLE `notif_seen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `response_list`
--
ALTER TABLE `response_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni_details`
--
ALTER TABLE `alumni_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `form_list`
--
ALTER TABLE `form_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notif_seen`
--
ALTER TABLE `notif_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `response_list`
--
ALTER TABLE `response_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
