-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 09:57 PM
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
(2, 'HDFC Bank', 'Rahul Santosh Deshmukh', '34016203626', 'SBIN0001166', '', '', 0, 1),
(3, 'Kotak Mahindra Bank', 'Rahul Santosh Deshmukh', '34016203626', 'SBIN0001166', 'AKOLA (AHMEDNAGAR)', 'SHIVAJI ROAD, DIST AHMEDNAGAR, MAHARASHTRA 422601', 0, 1);

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
-- Table structure for table `customer master`
--

CREATE TABLE `customer master` (
  `CustId` int(11) NOT NULL,
  `CustNo` varchar(200) NOT NULL,
  `CustName` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Mobile` varchar(200) NOT NULL,
  `PAN` varchar(200) NOT NULL,
  `Aadhar` varchar(200) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `LedgerId` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` datetime NOT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itemmaster`
--

INSERT INTO `itemmaster` (`ItemId`, `ItemName`, `Description`, `UnitId`, `Rate`, `ItemGroupId`, `Taxrate`, `Status`) VALUES
(1, 'Item Name', 'disc', 2, 596, 3, 0, 0),
(2, 'Parle', 'Biskit', 2, 56, 3, 12, 0);

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
-- Table structure for table `sales details`
--

CREATE TABLE `sales details` (
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
-- Indexes for table `customer master`
--
ALTER TABLE `customer master`
  ADD PRIMARY KEY (`CustId`);

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
-- Indexes for table `sales details`
--
ALTER TABLE `sales details`
  ADD PRIMARY KEY (`BillId`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`StockId`);

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
-- AUTO_INCREMENT for table `customer master`
--
ALTER TABLE `customer master`
  MODIFY `CustId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item group`
--
ALTER TABLE `item group`
  MODIFY `ItemGroupId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itemmaster`
--
ALTER TABLE `itemmaster`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales details`
--
ALTER TABLE `sales details`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `StockId` int(11) NOT NULL AUTO_INCREMENT;

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
