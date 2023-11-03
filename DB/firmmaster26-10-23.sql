-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 08:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curvedent`
--

-- --------------------------------------------------------

--
-- Table structure for table `firmmaster`
--

CREATE TABLE `firmmaster` (
  `FirmId` int(11) NOT NULL,
  `FirmName` varchar(100) DEFAULT NULL,
  `FirmType` varchar(50) DEFAULT NULL,
  `FirmAddress` varchar(500) DEFAULT NULL,
  `FirmDisc` varchar(500) DEFAULT NULL,
  `FirmNo` int(15) DEFAULT NULL,
  `FirmEmail` varchar(50) DEFAULT NULL,
  `FirmGst` varchar(50) DEFAULT NULL,
  `FirmTin` varchar(50) DEFAULT NULL,
  `FirmPAN` varchar(50) DEFAULT NULL,
  `LogoAddress` varchar(500) DEFAULT NULL,
  `prefix` varchar(10) NOT NULL,
  `Status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `firmmaster`
--

INSERT INTO `firmmaster` (`FirmId`, `FirmName`, `FirmType`, `FirmAddress`, `FirmDisc`, `FirmNo`, `FirmEmail`, `FirmGst`, `FirmTin`, `FirmPAN`, `LogoAddress`, `prefix`, `Status`) VALUES
(2, 'Soulsoft infotech', 'GST', 'Top10 Business Plazza sangamner', 'Disc is here', 2147483647, 'demo@gmail.com', '784512326598', '', 'GLKPD4589K', NULL, 'SSI', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firmmaster`
--
ALTER TABLE `firmmaster`
  ADD PRIMARY KEY (`FirmId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `firmmaster`
--
ALTER TABLE `firmmaster`
  MODIFY `FirmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
