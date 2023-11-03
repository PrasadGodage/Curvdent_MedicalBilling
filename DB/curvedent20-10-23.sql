-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 05:15 AM
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
(3, 'ayu1', 'Ayurveda2', 1, 0);

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
(1, '0', 'Rahul Deshmukh 21', 'Akole 21', '8412003014', 'GLKPD4091l', '235623562300', 'Disc is here 21', 1, 1);

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
(3, 'Gas', 'stove', 2, 650, 3, 18, 0, 1);

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
  `TotalQty` decimal(10,0) NOT NULL,
  `TotItemAmt` decimal(10,0) NOT NULL,
  `TotDiscPer` decimal(10,0) NOT NULL,
  `TotDiscAmt` decimal(10,0) NOT NULL,
  `TaxableTotal` decimal(10,0) NOT NULL,
  `TotalTax` decimal(10,0) NOT NULL,
  `NetTotal` decimal(10,0) NOT NULL,
  `RoundOff` decimal(10,0) NOT NULL,
  `NetBillTotal` decimal(10,0) NOT NULL,
  `PaidAmt` decimal(10,0) NOT NULL,
  `BalanceAmt` decimal(10,0) NOT NULL,
  `BillNarration` varchar(100) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salesdetails`
--

CREATE TABLE `salesdetails` (
  `BillId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `ItemDescription` varchar(200) NOT NULL,
  `UnitId` int(11) NOT NULL,
  `Qty` decimal(10,0) NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `ItemTotal` decimal(10,0) NOT NULL,
  `DiscPer` decimal(10,0) NOT NULL,
  `DiscAmt` decimal(10,0) NOT NULL,
  `TaxableAmt` decimal(10,0) NOT NULL,
  `TaxPer1` decimal(10,0) NOT NULL,
  `TaxAmt1` decimal(10,0) NOT NULL,
  `TaxPer2` decimal(10,0) NOT NULL,
  `TaxAmt2` decimal(10,0) NOT NULL,
  `TaxPer3` decimal(10,0) NOT NULL,
  `TaxAmt3` decimal(10,0) NOT NULL,
  `TaxPer4` decimal(10,0) NOT NULL,
  `TaxAmt4` decimal(10,0) NOT NULL,
  `TaxPer5` decimal(10,0) NOT NULL,
  `TaxAmt5` decimal(10,0) NOT NULL,
  `TotalTax` decimal(10,0) NOT NULL,
  `NetAmt` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(19);

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
  `Qty` decimal(10,0) NOT NULL,
  `Rate` decimal(10,0) NOT NULL,
  `ItemTotal` decimal(10,0) NOT NULL,
  `DiscPer` decimal(10,0) NOT NULL,
  `DiscAmt` decimal(10,0) NOT NULL,
  `TaxableAmt` decimal(10,0) NOT NULL,
  `TaxPer1` decimal(10,0) NOT NULL,
  `TaxAmt1` decimal(10,0) NOT NULL,
  `TaxPer2` decimal(10,0) NOT NULL,
  `TaxAmt2` decimal(10,0) NOT NULL,
  `TaxPer3` decimal(10,0) NOT NULL,
  `TaxAmt3` decimal(10,0) NOT NULL,
  `TaxPer4` decimal(10,0) NOT NULL,
  `TaxAmt4` decimal(10,0) NOT NULL,
  `TaxPer5` decimal(10,0) NOT NULL,
  `TaxAmt5` decimal(10,0) NOT NULL,
  `TotalTax` decimal(10,0) NOT NULL,
  `NetAmt` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempsalesdetails`
--

INSERT INTO `tempsalesdetails` (`id`, `BillId`, `ItemId`, `ItemDescription`, `UnitId`, `Qty`, `Rate`, `ItemTotal`, `DiscPer`, `DiscAmt`, `TaxableAmt`, `TaxPer1`, `TaxAmt1`, `TaxPer2`, `TaxAmt2`, `TaxPer3`, `TaxAmt3`, `TaxPer4`, `TaxAmt4`, `TaxPer5`, `TaxAmt5`, `TotalTax`, `NetAmt`) VALUES
(1, NULL, 1, 'Text item Disc', 2, 20, 596, 11920, 0, 100, 11820, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 11820),
(2, NULL, 2, 'Discription is here', 2, 20, 56, 1120, 0, 0, 1120, 6, 67, 6, 67, 0, 0, 0, 0, 0, 0, 134, 1254),
(3, NULL, 2, 'AMC for 1 year\\', 2, 20, 56, 1120, 0, 30, 1090, 6, 67, 6, 67, 0, 0, 0, 0, 0, 0, 131, 1221),
(4, '0', 2, 'Demo Text', 2, 84, 56, 4704, 0, 0, 4704, 6, 282, 6, 282, 0, 0, 0, 0, 0, 0, 564, 5268),
(5, 'SSI/23-24/18', 2, '', 2, 10, 56, 560, 0, 0, 560, 6, 34, 6, 34, 0, 0, 0, 0, 0, 0, 67, 627),
(6, 'SSI/23-24/18', 3, '', 2, 5, 650, 3250, 10, 0, 2925, 9, 293, 9, 293, 0, 0, 0, 0, 0, 0, 527, 3452),
(7, 'SSI/23-24/18', 2, '', 2, 20, 56, 1120, 10, 0, 1008, 6, 67, 6, 67, 0, 0, 0, 0, 0, 0, 121, 1129),
(8, 'SSI/23-24/18', 3, '', 2, 10, 650, 6500, 0, 0, 6500, 9, 585, 9, 585, 0, 0, 0, 0, 0, 0, 1170, 7670),
(9, 'SSI/23-24/18', 1, '', 2, 1, 596, 596, 0, 0, 596, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 596),
(10, 'SSI/23-24/19', 2, '', 2, 20, 56, 1120, 0, 120, 1000, 6, 67, 6, 67, 0, 0, 0, 0, 0, 0, 120, 1120);

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
  ADD PRIMARY KEY (`BillId`);

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
  MODIFY `CategoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customermaster`
--
ALTER TABLE `customermaster`
  MODIFY `CustId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesdetails`
--
ALTER TABLE `salesdetails`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempsalesdetails`
--
ALTER TABLE `tempsalesdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
