-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 12:13 AM
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
-- Table structure for table `accledgermaster`
--

CREATE TABLE `accledgermaster` (
  `LedgerId` int(11) NOT NULL,
  `LedgerName` varchar(200) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `GSTIN` varchar(100) NOT NULL,
  `PAN` varchar(200) NOT NULL,
  `OpeningBalance` decimal(10,0) NOT NULL,
  `DrCrType` varchar(200) NOT NULL,
  `OpeningAsOn` datetime NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `LedgerType` varchar(200) NOT NULL,
  `CustSuppBankID` int(11) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `CreditLimit` decimal(10,0) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `GSTStateCode` int(11) NOT NULL,
  `Misc1` varchar(100) NOT NULL,
  `Misc2` varchar(100) NOT NULL,
  `Misc3` int(11) NOT NULL,
  `Misc4` varchar(100) NOT NULL,
  `Misc5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acclegdergroup`
--

CREATE TABLE `acclegdergroup` (
  `GroupId` int(11) NOT NULL,
  `GroupName` varchar(200) NOT NULL,
  `UnderGroupId` int(11) NOT NULL,
  `AffectGrossProfit` varchar(100) NOT NULL,
  `Nature` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account ledger master`
--

CREATE TABLE `account ledger master` (
  `LedgerId` int(11) NOT NULL,
  `LedgerName` varchar(200) NOT NULL,
  `GroupID` int(11) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Aadhar` varchar(200) NOT NULL,
  `PAN` varchar(200) NOT NULL,
  `OpeningBalance` decimal(10,0) NOT NULL,
  `DrCrType` varchar(200) NOT NULL,
  `OpeningAsOn` datetime NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `LedgerType` varchar(200) NOT NULL,
  `CustSuppBankID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account voucher`
--

CREATE TABLE `account voucher` (
  `VchId` int(11) NOT NULL,
  `VchSeriesId` int(11) NOT NULL,
  `VchNo` varchar(200) NOT NULL,
  `VchTypeId` int(11) NOT NULL,
  `VchDate` datetime NOT NULL,
  `VchAmt` decimal(10,0) NOT NULL,
  `VchNarration` varchar(200) NOT NULL,
  `RefBillId` int(11) NOT NULL,
  `Cancelled` bit(1) NOT NULL,
  `ChequeNo` varchar(200) NOT NULL,
  `ChequeDate` datetime NOT NULL,
  `ClearDate` datetime NOT NULL,
  `BankName` varchar(200) NOT NULL,
  `ChequeNarration` varchar(200) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` datetime NOT NULL,
  `Misc1` varchar(50) NOT NULL,
  `Misc2` varchar(50) NOT NULL,
  `Misc3` varchar(50) NOT NULL,
  `Misc4` varchar(50) NOT NULL,
  `Misc5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account voucher details`
--

CREATE TABLE `account voucher details` (
  `VchID` int(11) NOT NULL,
  `VchTypeId` int(11) NOT NULL,
  `VchDate` datetime NOT NULL,
  `VchTime` datetime NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `Amount` decimal(10,0) NOT NULL,
  `DrCrType` varchar(50) NOT NULL,
  `Cancelled` bit(1) NOT NULL,
  `Misc1` varchar(50) NOT NULL,
  `Misc2` varchar(50) NOT NULL,
  `Misc3` varchar(50) NOT NULL,
  `Misc4` varchar(50) NOT NULL,
  `Misc5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankmaster`
--

CREATE TABLE `bankmaster` (
  `id` int(11) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `AcName` varchar(100) NOT NULL,
  `AcNo` varchar(50) NOT NULL,
  `IFSC` varchar(15) NOT NULL,
  `BranchName` varchar(100) NOT NULL,
  `BranchAddress` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankmaster`
--

INSERT INTO `bankmaster` (`id`, `BankName`, `AcName`, `AcNo`, `IFSC`, `BranchName`, `BranchAddress`, `Status`, `CreatedBy`) VALUES
(2, 'ICICI Bank', 'Rahul Santosh Deshmane', '34016203627', 'SBIN0001167', 'PEINT(PETH)', 'DIST NASIK, MAHARASHTRA 422208', 0, 1),
(3, 'Kotak Mahindra Bank', 'Rahul Santosh Deshmukh', '34016203626', 'SBIN0001166', 'AKOLA (AHMEDNAGAR)', 'SHIVAJI ROAD, DIST AHMEDNAGAR, MAHARASHTRA 422601', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `CategoryId` int(10) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `Disc` varchar(100) NOT NULL,
  `CreateBy` int(10) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`CategoryId`, `CategoryName`, `Disc`, `CreateBy`, `status`) VALUES
(1, 'Alopathy', 'Alo', 0, 0),
(2, 'demo1', 'demo2', 1, 0),
(3, 'ayu1', 'Ayurveda2', 1, 0),
(4, 'category1', 'category1 fdsf', 1, 0),
(5, 'category2', 'category2 gfd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customermaster`
--

CREATE TABLE `customermaster` (
  `CustId` int(11) NOT NULL,
  `CustNo` varchar(200) NOT NULL,
  `CustName` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Mobile` varchar(200) NOT NULL,
  `PAN` varchar(200) NOT NULL,
  `Aadhar` varchar(200) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customermaster`
--

INSERT INTO `customermaster` (`CustId`, `CustNo`, `CustName`, `Address`, `Mobile`, `PAN`, `Aadhar`, `Description`, `LedgerId`, `Status`) VALUES
(1, '0', 'Rahul Deshmukh 21', 'Akole 21', '8412003014', 'GLKPD4091l', '235623562300', 'Disc is here 21', 1, 1),
(2, '0', 'urmilla', 'sangamner', '4587854895', '45845785455', 'ASDE45878546', 'aaaa', 1, 0),
(3, '0', 'Dipali', 'sangamner', '4578954568', '47854578546', '56688659625', 'sersr', 1, 0),
(4, '0', 'gaurav', 'sangamner', '123456789', '123445677', '12345678', 'what is this', 1, 0),
(5, '0', 'Gaurav', 'nashik', '4578965489', '41587895589', '556995656', 'tdrte', 1, 0),
(6, '0', 'rakesh', 'mumbai', '123456789', '123456789', '23456789', 'what is this', 1, 0),
(7, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(8, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(9, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(10, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(11, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(12, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(13, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(14, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(15, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(16, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(17, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(18, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(19, '0', 'Nitesh', 'akole', '4578954858', '5586869865', '54564654685', 'fdrtfd', 1, 0),
(20, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(21, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(22, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(23, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(24, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(25, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(26, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(27, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(28, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(29, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(30, '0', 'ashutosh', 'nashik', '123456789', '123456789', '12345678', 'what is this', 1, 0),
(31, '0', 'ashutosh', 'nashik', '123456789', '123456789', '123456789', 'what is this', 1, 0),
(32, '0', 'Vikas', 'pune', '457895485', '5468598569', '545465', 'fdfgdfg', 1, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `item group`
--

CREATE TABLE `item group` (
  `ItemGroupId` int(11) NOT NULL,
  `ItemGroupName` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemmaster`
--

CREATE TABLE `itemmaster` (
  `ItemId` int(11) NOT NULL,
  `ItemName` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `ItemGroupId` int(11) NOT NULL,
  `Taxrate` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemmaster`
--

INSERT INTO `itemmaster` (`ItemId`, `ItemName`, `Description`, `UnitId`, `Rate`, `ItemGroupId`, `Taxrate`, `Status`, `CreatedBy`) VALUES
(1, 'Item Name', 'disc', 2, 596, 3, 0, 0, 0),
(2, 'Parle', 'Biskit', 2, 56, 3, 12, 0, 0),
(3, 'Gas', 'stove', 2, 650, 3, 18, 0, 1),
(4, 'Sakhar', 'Kbazar', 2, 40, 2, 12, 0, 1),
(5, 'fddd', 'fggfdg', 2, 500, 3, 12, 0, 1),
(6, 'Shabudana', 'Super Shopi', 2, 70, 1, 18, 0, 1),
(7, 'Mit', 'Bazzar', 1, 20, 3, 28, 0, 1),
(8, 'Luz Gul ', 'Shopi', 2, 30, 4, 5, 0, 1),
(9, 'Masur Dal', 'Super Shopi', 1, 30, 5, 5, 0, 1),
(10, 'Shengdana', 'Market ', 1, 110, 3, 12, 0, 1),
(20, 'Ghee', 'Super Shopi', 1, 50, 5, 5, 0, 1),
(21, 'laptop', 'hard disk', 1, 1222, 2, 18, 0, 1),
(22, 'maggi', 'fytfty', 2, 0, 3, 12, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `BillId` int(11) NOT NULL,
  `BillNo` varchar(200) NOT NULL,
  `BillDate` date NOT NULL,
  `CustId` int(11) NOT NULL,
  `RateTypeId` int(11) NOT NULL,
  `BillType` varchar(100) NOT NULL,
  `PaymentType` varchar(200) NOT NULL,
  `SubPaymentType` varchar(50) NOT NULL,
  `AccountName` varchar(100) NOT NULL,
  `TotalQty` decimal(10,2) NOT NULL,
  `TotItemAmt` decimal(10,2) NOT NULL,
  `TotDiscPer` decimal(10,2) NOT NULL,
  `TotDiscAmt` decimal(10,2) NOT NULL,
  `TaxableTotal` decimal(10,2) NOT NULL,
  `TotalTax` decimal(10,2) NOT NULL,
  `NetTotal` decimal(10,2) NOT NULL,
  `RoundOff` decimal(10,2) NOT NULL,
  `NetBillTotal` decimal(10,2) NOT NULL,
  `ExtraBillCharges` decimal(10,2) NOT NULL,
  `ExtraBillDiscount` decimal(10,2) NOT NULL,
  `BillAmtForPaid` decimal(10,2) NOT NULL,
  `PaidAmt` decimal(10,2) NOT NULL,
  `BalanceAmt` decimal(10,2) NOT NULL,
  `BillNarration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`BillId`, `BillNo`, `BillDate`, `CustId`, `RateTypeId`, `BillType`, `PaymentType`, `SubPaymentType`, `AccountName`, `TotalQty`, `TotItemAmt`, `TotDiscPer`, `TotDiscAmt`, `TaxableTotal`, `TotalTax`, `NetTotal`, `RoundOff`, `NetBillTotal`, `ExtraBillCharges`, `ExtraBillDiscount`, `BillAmtForPaid`, `PaidAmt`, `BalanceAmt`, `BillNarration`) VALUES
(1, 'SSI/23-24/1', '0000-00-00', 0, 0, '', 'Cash', '', '', 0.00, 7350.00, 0.00, -270.00, 7620.00, 1304.40, 8924.40, 0.35, 8924.75, 20.00, 20.00, 8924.75, 100.00, 8824.75, ''),
(2, 'SSI/23-24/2', '0000-00-00', 0, 0, '', 'Cash', '', '', 0.00, 7350.00, 0.00, -270.00, 7620.00, 1304.40, 8924.40, 0.35, 8924.75, 20.00, 20.00, 8924.75, 100.00, 8824.75, ''),
(3, 'SSI/23-24/3', '2023-11-01', 5, 0, '', 'Cash', '', '', 0.00, 332.00, 0.00, 0.00, 332.00, 39.84, 371.84, 0.16, 372.00, 10.00, 0.00, 382.00, 0.00, 382.00, ''),
(4, 'SSI/23-24/4', '2023-11-01', 5, 0, '', 'Cash', '', '', 0.00, 332.00, 0.00, 0.00, 332.00, 39.84, 371.84, 0.16, 372.00, 10.00, 0.00, 382.00, 0.00, 382.00, ''),
(5, 'SSI/23-24/5', '2023-11-01', 5, 0, '', 'Cash', '', '', 0.00, 332.00, 0.00, 0.00, 332.00, 39.84, 371.84, 0.16, 372.00, 10.00, 0.00, 382.00, 0.00, 382.00, ''),
(6, 'SSI/23-24/6', '2023-11-01', 5, 0, '', 'Cash', '', '', 0.00, 332.00, 0.00, 0.00, 332.00, 39.84, 371.84, 0.16, 372.00, 10.00, 0.00, 382.00, 0.00, 382.00, ''),
(7, 'SSI/23-24/7', '2023-10-31', 3, 0, '', 'Bank', 'Bank', '0', 0.00, 48350.00, 0.00, 39.50, 48310.50, 2626.96, 50937.46, 0.00, 50937.46, 10.00, 0.00, 50947.46, 0.00, 50947.46, ''),
(8, 'SSI/23-24/8', '2023-10-25', 2, 0, '', 'Bank', 'Bank', 'ICICI Bank', 0.00, 12200.00, 0.00, 10.00, 12190.00, 1651.80, 13841.80, 0.00, 13841.80, 10.00, 0.00, 13851.80, 0.00, 13851.80, ''),
(9, 'SSI/23-24/9', '2023-10-28', 3, 0, '', 'Credit', '', '', 0.00, 6700.00, 0.00, 0.00, 6700.00, 1160.10, 7860.10, 0.00, 7860.10, 10.00, 0.00, 7870.10, 0.00, 7870.10, ''),
(10, 'SSI/23-24/10', '0000-00-00', 0, 0, '', 'Cash', '', '', 0.00, 6900.00, 0.00, 0.00, 6900.00, 723.00, 7623.00, 0.00, 7623.00, 0.00, 0.00, 7623.00, 0.00, 7623.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails`
--

CREATE TABLE `salesdetails` (
  `id` int(10) NOT NULL,
  `BillId` int(10) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `ItemDescription` varchar(200) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `Qty` decimal(10,2) NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `ItemTotal` decimal(10,2) NOT NULL,
  `DiscPer` decimal(10,2) NOT NULL,
  `DiscAmt` decimal(10,2) NOT NULL,
  `TaxableAmt` decimal(10,2) NOT NULL,
  `TaxPer1` decimal(10,2) NOT NULL,
  `TaxAmt1` decimal(10,2) NOT NULL,
  `TaxPer2` decimal(10,2) NOT NULL,
  `TaxAmt2` decimal(10,2) NOT NULL,
  `TaxPer3` decimal(10,2) NOT NULL,
  `TaxAmt3` decimal(10,2) NOT NULL,
  `TaxPer4` decimal(10,2) NOT NULL,
  `TaxAmt4` decimal(10,2) NOT NULL,
  `TaxPer5` decimal(10,2) NOT NULL,
  `TaxAmt5` decimal(10,2) NOT NULL,
  `TotalTax` decimal(10,2) NOT NULL,
  `NetAmt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesdetails`
--

INSERT INTO `salesdetails` (`id`, `BillId`, `ItemId`, `ItemDescription`, `UnitId`, `Qty`, `Rate`, `ItemTotal`, `DiscPer`, `DiscAmt`, `TaxableAmt`, `TaxPer1`, `TaxAmt1`, `TaxPer2`, `TaxAmt2`, `TaxPer3`, `TaxAmt3`, `TaxPer4`, `TaxAmt4`, `TaxPer5`, `TaxAmt5`, `TotalTax`, `NetAmt`) VALUES
(1, 1, 2, '', 2, 20.00, 56.00, 1120.00, 0.00, 0.00, 1120.00, 6.00, 67.20, 6.00, 67.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 134.40, 1254.40),
(2, 1, 3, '', 2, 5.00, 650.00, 3250.00, 0.00, 0.00, 3250.00, 9.00, 292.50, 9.00, 292.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 585.00, 3835.00),
(3, 1, 1, 'Demo Code', 2, 5.00, 596.00, 2980.00, 0.00, 0.00, 3250.00, 9.00, 268.20, 9.00, 268.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 585.00, 3835.00),
(4, 2, 2, '', 2, 20.00, 56.00, 1120.00, 0.00, 0.00, 1120.00, 6.00, 67.20, 6.00, 67.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 134.40, 1254.40),
(5, 2, 3, '', 2, 5.00, 650.00, 3250.00, 0.00, 0.00, 3250.00, 9.00, 292.50, 9.00, 292.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 585.00, 3835.00),
(6, 2, 1, 'Demo Code', 2, 5.00, 596.00, 2980.00, 0.00, 0.00, 3250.00, 9.00, 268.20, 9.00, 268.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 585.00, 3835.00),
(7, 3, 2, 'what', 2, 2.00, 56.00, 112.00, 18.00, 0.00, 112.00, 6.00, 6.72, 6.00, 6.72, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 13.44, 125.44),
(8, 3, 10, 'what', 1, 2.00, 110.00, 220.00, 0.00, 0.00, 220.00, 6.00, 13.20, 6.00, 13.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 26.40, 246.40),
(9, 3, 22, '', 2, 10.00, 0.00, 0.00, 11.00, 0.00, 0.00, 6.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(10, 3, 22, '', 2, 10.00, 0.00, 0.00, 11.00, 0.00, 0.00, 6.00, 0.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(11, 7, 11, 'sdsad', 1, 5.00, 110.00, 550.00, 5.00, 0.00, 522.50, 6.00, 33.00, 6.00, 33.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 62.70, 585.20),
(12, 7, 9, 'nbn', 1, 10.00, 30.00, 300.00, 0.00, 10.00, 290.00, 2.50, 7.50, 2.50, 7.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 14.50, 304.50),
(13, 7, 20, 'jhjg', 1, 50.00, 450.00, 22500.00, 0.00, 10.00, 22500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1125.00, 23625.00),
(14, 7, 20, 'jhjg', 1, 50.00, 450.00, 22500.00, 0.00, 10.00, 22500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1125.00, 23625.00),
(15, 7, 4, 'mhgmh', 2, 50.00, 50.00, 2500.00, 0.00, 2.00, 2498.00, 6.00, 150.00, 6.00, 150.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 299.76, 2797.76),
(16, 8, 4, 'Super', 2, 40.00, 40.00, 1600.00, 5.00, 0.00, 1600.00, 6.00, 96.00, 6.00, 96.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 192.00, 1792.00),
(17, 8, 8, 'Super', 2, 30.00, 30.00, 900.00, 10.00, 0.00, 900.00, 2.50, 22.50, 2.50, 22.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 45.00, 945.00),
(18, 8, 12, 'Super', 1, 50.00, 110.00, 5500.00, 0.00, 10.00, 5490.00, 6.00, 330.00, 6.00, 330.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 658.80, 6148.80),
(19, 8, 6, 'Super', 2, 60.00, 70.00, 4200.00, 10.00, 0.00, 4200.00, 9.00, 378.00, 9.00, 378.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 756.00, 4956.00),
(20, 9, 9, '50', 1, 5.00, 30.00, 150.00, 0.00, 0.00, 150.00, 2.50, 3.75, 2.50, 3.75, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7.50, 157.50),
(21, 9, 13, '20', 1, 4.00, 110.00, 440.00, 0.00, 0.00, 440.00, 6.00, 26.40, 6.00, 26.40, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 52.80, 492.80),
(22, 9, 21, '20', 1, 5.00, 1222.00, 6110.00, 0.00, 0.00, 6110.00, 9.00, 549.90, 9.00, 549.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1099.80, 7209.80),
(23, 10, 9, 'Market', 1, 50.00, 30.00, 1500.00, 0.00, 0.00, 1500.00, 2.50, 37.50, 2.50, 37.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 75.00, 1575.00),
(24, 10, 10, 'Market', 1, 40.00, 110.00, 4400.00, 0.00, 0.00, 4400.00, 6.00, 264.00, 6.00, 264.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 528.00, 4928.00),
(25, 10, 22, 'Market', 2, 100.00, 10.00, 1000.00, 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 120.00, 1120.00);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `StockDate` datetime NOT NULL,
  `LocationId` int(11) NOT NULL,
  `StockTypeCode` int(11) NOT NULL,
  `Quantity` decimal(10,0) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `TransId` int(11) NOT NULL,
  `PurchaseRate` decimal(10,0) NOT NULL,
  `MRP` decimal(10,0) NOT NULL,
  `SalesRate` decimal(10,0) NOT NULL,
  `PurchaseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tempbillserias`
--

CREATE TABLE `tempbillserias` (
  `SalesBillID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempbillserias`
--

INSERT INTO `tempbillserias` (`SalesBillID`) VALUES
(52);

-- --------------------------------------------------------

--
-- Table structure for table `tempsalesdetails`
--

CREATE TABLE `tempsalesdetails` (
  `id` int(11) NOT NULL,
  `BillId` varchar(50) DEFAULT NULL,
  `ItemId` int(11) NOT NULL,
  `ItemDescription` varchar(200) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `Qty` decimal(10,2) NOT NULL,
  `Rate` decimal(10,2) NOT NULL,
  `ItemTotal` decimal(10,2) NOT NULL,
  `DiscPer` decimal(10,2) NOT NULL,
  `DiscAmt` decimal(10,2) NOT NULL,
  `TaxableAmt` decimal(10,2) NOT NULL,
  `TaxPer1` decimal(10,2) NOT NULL,
  `TaxAmt1` decimal(10,2) NOT NULL,
  `TaxPer2` decimal(10,2) NOT NULL,
  `TaxAmt2` decimal(10,2) NOT NULL,
  `TaxPer3` decimal(10,2) NOT NULL,
  `TaxAmt3` decimal(10,2) NOT NULL,
  `TaxPer4` decimal(10,2) NOT NULL,
  `TaxAmt4` decimal(10,2) NOT NULL,
  `TaxPer5` decimal(10,2) NOT NULL,
  `TaxAmt5` decimal(10,2) NOT NULL,
  `TotalTax` decimal(10,2) NOT NULL,
  `NetAmt` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempsalesdetails`
--

INSERT INTO `tempsalesdetails` (`id`, `BillId`, `ItemId`, `ItemDescription`, `UnitId`, `Qty`, `Rate`, `ItemTotal`, `DiscPer`, `DiscAmt`, `TaxableAmt`, `TaxPer1`, `TaxAmt1`, `TaxPer2`, `TaxAmt2`, `TaxPer3`, `TaxAmt3`, `TaxPer4`, `TaxAmt4`, `TaxPer5`, `TaxAmt5`, `TotalTax`, `NetAmt`) VALUES
(17, 'SSI/23-24/23', 3, '', 2, 34.00, 650.00, 22100.00, 0.00, 0.00, 22100.00, 9.00, 1989.00, 9.00, 1989.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3978.00, 26078.00),
(18, 'SSI/23-24/25', 6, '', 2, 20.00, 70.00, 1400.00, 0.00, 0.00, 1400.00, 9.00, 126.00, 9.00, 126.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 252.00, 1652.00),
(19, 'SSI/23-24/25', 8, '', 2, 6.00, 30.00, 180.00, 0.00, 0.00, 180.00, 2.50, 4.50, 2.50, 4.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 9.00, 189.00),
(20, 'SSI/23-24/27', 6, '', 2, 50.00, 70.00, 3500.00, 0.00, 0.00, 3500.00, 9.00, 315.00, 9.00, 315.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 630.00, 4130.00),
(21, 'SSI/23-24/28', 21, '', 1, 25.00, 1222.00, 30550.00, 0.00, 0.00, 30550.00, 9.00, 2749.50, 9.00, 2749.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5499.00, 36049.00),
(22, 'SSI/23-24/28', 3, '', 2, 6.00, 650.00, 3900.00, 0.00, 0.00, 3900.00, 9.00, 351.00, 9.00, 351.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 702.00, 4602.00),
(24, 'SSI/23-24/24', 6, 'Super Market', 2, 50.00, 70.00, 3500.00, 5.00, 0.00, 3325.00, 9.00, 315.00, 9.00, 315.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 598.50, 3923.50),
(27, 'SSI/23-24/24', 4, 'Super Market', 2, 60.00, 40.00, 2400.00, 10.00, 0.00, 2400.00, 6.00, 144.00, 6.00, 144.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 288.00, 2688.00),
(28, 'SSI/23-24/24', 9, 'Super Market', 1, 30.00, 30.00, 900.00, 0.00, 6.00, 894.00, 2.50, 22.50, 2.50, 22.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 44.70, 938.70),
(32, 'SSI/23-24/35', 21, '', 1, 1.00, 1222.00, 1222.00, 0.00, 0.00, 1222.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 219.96, 1441.96),
(33, 'SSI/23-24/38', 2, '', 2, 6.00, 56.00, 336.00, 0.00, 0.00, 336.00, 6.00, 20.16, 6.00, 20.16, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 40.32, 376.32),
(34, 'SSI/23-24/38', 5, '', 2, 20.00, 500.00, 10000.00, 0.00, 0.00, 10000.00, 6.00, 600.00, 6.00, 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1200.00, 11200.00),
(38, 'SSI/23-24/38', 4, '', 2, 10.00, 40.00, 400.00, 0.00, 10.00, 400.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 48.00, 448.00),
(39, 'SSI/23-24/38', 3, '', 2, 1.00, 650.00, 650.00, 10.00, 0.00, 585.00, 9.00, 58.50, 9.00, 58.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 105.30, 690.30),
(41, 'SSI/23-24/39', 21, 'fdfd', 1, 2.00, 1222.00, 2444.00, 0.00, 100.00, 2344.00, 9.00, 219.96, 9.00, 219.96, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 421.92, 2765.92),
(42, 'SSI/23-24/40', 21, 'Hardware', 1, 5.00, 1222.00, 6110.00, 5.00, 0.00, 6110.00, 9.00, 549.90, 9.00, 549.90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1099.80, 7209.80),
(44, 'SSI/23-24/43', 2, '', 2, 10.00, 56.00, 560.00, 0.00, 0.00, 560.00, 6.00, 33.60, 6.00, 33.60, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 67.20, 627.20),
(45, 'SSI/23-24/43', 10, '', 1, 48.00, 110.00, 5280.00, 0.00, 0.00, 5280.00, 6.00, 316.80, 6.00, 316.80, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 633.60, 5913.60),
(46, 'SSI/23-24/40', 6, 'Kbazar', 2, 50.00, 70.00, 3500.00, 0.00, 10.00, 3490.00, 9.00, 315.00, 9.00, 315.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 628.20, 4118.20),
(47, 'SSI/23-24/39', 8, 'fdfd', 2, 8.00, 30.00, 240.00, 10.00, 0.00, 216.00, 2.50, 6.00, 2.50, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.80, 226.80),
(48, 'SSI/23-24/39', 9, 'hugtyt', 1, 5.00, 30.00, 150.00, 5.00, 0.00, 142.50, 2.50, 3.75, 2.50, 3.75, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 7.13, 149.63),
(49, 'SSI/23-24/40', 22, 'Kbazar', 2, 100.00, 10.00, 1000.00, 0.00, 0.00, 1000.00, 6.00, 60.00, 6.00, 60.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 120.00, 1120.00),
(50, 'SSI/23-24/39', 20, 'rdrtd', 1, 1.00, 1000.00, 1000.00, 0.00, 5.00, 995.00, 2.50, 25.00, 2.50, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 49.75, 1044.75),
(51, 'SSI/23-24/45', 4, '', 2, 0.50, 40.00, 20.00, 0.00, 2.00, 18.00, 6.00, 1.20, 6.00, 1.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.16, 20.16),
(52, 'SSI/23-24/39', 22, 'vtf', 2, 10.00, 10.00, 100.00, 1.00, 0.00, 99.00, 6.00, 6.00, 6.00, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 11.88, 110.88),
(53, 'SSI/23-24/40', 4, 'Kbazar', 2, 40.00, 40.00, 1600.00, 2.00, 0.00, 1600.00, 6.00, 96.00, 6.00, 96.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 192.00, 1792.00),
(54, 'SSI/23-24/44', 3, 'nitesh gas', 2, 11.00, 650.00, 7150.00, 0.00, 0.00, 7150.00, 9.00, 643.50, 9.00, 643.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1287.00, 8437.00),
(55, 'SSI/23-24/45', 6, '', 2, 2.00, 70.00, 140.00, 0.00, 0.00, 140.00, 9.00, 12.60, 9.00, 12.60, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 25.20, 165.20),
(56, 'SSI/23-24/39', 10, 'hygy', 1, 100.00, 90.00, 9000.00, 10.00, 0.00, 9000.00, 6.00, 540.00, 6.00, 540.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1080.00, 10080.00),
(57, 'SSI/23-24/40', 4, 'Kbazar', 2, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00),
(58, 'SSI/23-24/44', 4, '', 2, 122.00, 40.00, 4880.00, 0.00, 0.00, 4880.00, 6.00, 292.80, 6.00, 292.80, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 585.60, 5465.60),
(59, 'SSI/23-24/44', 6, '', 2, 12.00, 70.00, 840.00, 0.00, 0.00, 840.00, 9.00, 75.60, 9.00, 75.60, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 151.20, 991.20),
(60, 'SSI/23-24/46', 7, '10', 1, 1.00, 20.00, 20.00, 2.00, 0.00, 19.60, 14.00, 2.80, 14.00, 2.80, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5.49, 25.09),
(61, 'SSI/23-24/45', 8, 'demo', 2, 1.00, 30.00, 30.00, 0.00, 0.00, 30.00, 2.50, 0.75, 2.50, 0.75, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1.50, 31.50),
(62, 'SSI/23-24/44', 9, '', 1, 122.00, 30.00, 3660.00, 0.00, 0.00, 3660.00, 2.50, 91.50, 2.50, 91.50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 183.00, 3843.00),
(63, 'SSI/23-24/44', 20, '', 1, 12.00, 50.00, 600.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 30.00, 630.00),
(64, 'SSI/23-24/46', 10, '50', 1, 2.00, 458.00, 916.00, 1.00, 0.00, 906.84, 6.00, 54.96, 6.00, 54.96, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 108.82, 1015.66),
(65, 'SSI/23-24/52', 4, '', 2, 0.50, 40.00, 20.00, 0.00, 0.00, 20.00, 6.00, 1.20, 6.00, 1.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.40, 22.40),
(66, 'SSI/23-24/52', 2, '', 2, 15.00, 168.00, 840.00, 0.00, 0.00, 280.00, 6.00, 50.40, 6.00, 50.40, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 33.60, 940.80),
(67, 'SSI/23-24/52', 3, 'Gas As Demo', 2, 8.00, 1300.00, 5200.00, 0.00, 0.00, 1950.00, 9.00, 468.00, 9.00, 468.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 351.00, 6136.00);

-- --------------------------------------------------------

--
-- Table structure for table `unitmaster`
--

CREATE TABLE `unitmaster` (
  `UnitID` int(10) NOT NULL,
  `UnitName` varchar(10) NOT NULL,
  `CreatedBy` int(10) NOT NULL,
  `Satus` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unitmaster`
--

INSERT INTO `unitmaster` (`UnitID`, `UnitName`, `CreatedBy`, `Satus`) VALUES
(1, 'Demo23', 1, '1'),
(2, 'KG', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `usermaster`
--

CREATE TABLE `usermaster` (
  `userid` int(10) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` varchar(7) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registrationdate` date NOT NULL,
  `totalorderamt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usermaster`
--

INSERT INTO `usermaster` (`userid`, `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `status`, `registrationdate`, `totalorderamt`) VALUES
(1, 'admin', 'admin', '0000000000', 'admin@gmail.com', 'Admin@2023', 'admin', '.', '.', '.', 0, '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accledgermaster`
--
ALTER TABLE `accledgermaster`
  ADD PRIMARY KEY (`LedgerId`);

--
-- Indexes for table `acclegdergroup`
--
ALTER TABLE `acclegdergroup`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `account ledger master`
--
ALTER TABLE `account ledger master`
  ADD PRIMARY KEY (`LedgerId`);

--
-- Indexes for table `account voucher`
--
ALTER TABLE `account voucher`
  ADD PRIMARY KEY (`VchId`);

--
-- Indexes for table `account voucher details`
--
ALTER TABLE `account voucher details`
  ADD PRIMARY KEY (`VchID`);

--
-- Indexes for table `bankmaster`
--
ALTER TABLE `bankmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `customermaster`
--
ALTER TABLE `customermaster`
  ADD PRIMARY KEY (`CustId`);

--
-- Indexes for table `firmmaster`
--
ALTER TABLE `firmmaster`
  ADD PRIMARY KEY (`FirmId`);

--
-- Indexes for table `item group`
--
ALTER TABLE `item group`
  ADD PRIMARY KEY (`ItemGroupId`);

--
-- Indexes for table `itemmaster`
--
ALTER TABLE `itemmaster`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `salesdetails`
--
ALTER TABLE `salesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockId`);

--
-- Indexes for table `tempsalesdetails`
--
ALTER TABLE `tempsalesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unitmaster`
--
ALTER TABLE `unitmaster`
  ADD PRIMARY KEY (`UnitID`);

--
-- Indexes for table `usermaster`
--
ALTER TABLE `usermaster`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accledgermaster`
--
ALTER TABLE `accledgermaster`
  MODIFY `LedgerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acclegdergroup`
--
ALTER TABLE `acclegdergroup`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account ledger master`
--
ALTER TABLE `account ledger master`
  MODIFY `LedgerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account voucher`
--
ALTER TABLE `account voucher`
  MODIFY `VchId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account voucher details`
--
ALTER TABLE `account voucher details`
  MODIFY `VchID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bankmaster`
--
ALTER TABLE `bankmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
  MODIFY `CategoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customermaster`
--
ALTER TABLE `customermaster`
  MODIFY `CustId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `firmmaster`
--
ALTER TABLE `firmmaster`
  MODIFY `FirmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item group`
--
ALTER TABLE `item group`
  MODIFY `ItemGroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemmaster`
--
ALTER TABLE `itemmaster`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempsalesdetails`
--
ALTER TABLE `tempsalesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `unitmaster`
--
ALTER TABLE `unitmaster`
  MODIFY `UnitID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usermaster`
--
ALTER TABLE `usermaster`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
