-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 11:50 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` varchar(10) NOT NULL,
  `Cat_Name` varchar(30) NOT NULL,
  `Cat_Des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`, `Cat_Des`) VALUES
('BBC01', 'Rolex', 'Watch'),
('BBC02', 'Zenith', 'Watch'),
('BBC03', 'Tissot', 'Watch '),
('BBC04', 'Frederique Constant', 'Watch'),
('BBC05', 'Certina', 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Cusname` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `CusDate` int(11) NOT NULL,
  `CusMonth` int(11) NOT NULL,
  `CusYear` int(11) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `Cusname`, `gender`, `Address`, `telephone`, `email`, `CusDate`, `CusMonth`, `CusYear`, `state`) VALUES
('ad', '96e79218965eb72c92a549dd5a330112', 'Nguyen Tuan Anh', '0', 'Cantho', '0704725944', 'anhntgcc200302@gmail.com', 19, 11, 2002, 1),
('tanh', '7fa8282ad93047a4d6fe6111c93b308a', 'Nguyen Tuan Anh', '0', 'Cantho', '1038127387', 'qwerty.com', 19, 11, 2002, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` varchar(6) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `DeiveryDate` datetime NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Paymethod` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orde_detail`
--

CREATE TABLE `orde_detail` (
  `OrderID` varchar(6) NOT NULL,
  `Product_ID` varchar(6) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(10) NOT NULL,
  `Product_Name` varchar(30) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `SmallDesc` varchar(1000) NOT NULL,
  `DetailDesc` text NOT NULL,
  `ProDate` datetime NOT NULL,
  `Pro_qty` int(11) NOT NULL,
  `Pro_image` varchar(200) NOT NULL,
  `Cat_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Price`, `SmallDesc`, `DetailDesc`, `ProDate`, `Pro_qty`, `Pro_image`, `Cat_ID`) VALUES
('BBP01', 'Zenith BB1', 3500, 'Men', '<p>\r\n	Limited</p>\r\n', '2022-05-13 16:34:31', 5, 'pro1.png', 'BBC02'),
('BBP02', 'Rolex X02', 3900, 'Men', '<p>\r\n	Limited</p>\r\n', '2022-05-13 16:35:37', 5, 'pro4.png', 'BBC01'),
('BBP03', 'Zenith BX', 1800, 'Men', '<p>\r\n	Limited</p>\r\n', '2022-05-13 16:39:02', 5, 'pro6.png', 'BBC04'),
('BBP04', 'FX400', 1650, 'Men', 'Luxury & Elegance', '2022-05-13 16:37:39', 50, 'pro3.png', 'BBC04'),
('BBP05', 'Frederique V', 1500, 'Men', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:02:08', 50, 'pro5.png', 'BBC04'),
('BBP06', 'Rolex XX', 3700, 'Men', 'Limited', '2022-05-13 16:58:09', 50, 'pro2.png', 'BBC01'),
('BBP07', 'Zenith SH', 2200, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 16:58:52', 50, 'pro7.png', 'BBC03'),
('BBP08', 'Tissot G3', 1125, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 16:59:50', 50, 'pro8.png', 'BBC03'),
('BBP09', 'Certina 2000', 2000, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:02:55', 50, 'pro9.png', 'BBC05'),
('BBP10', 'Certina TX', 1120, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:11:33', 50, 'pro10.png', 'BBC05'),
('BBP11', 'Tissot P30', 1325, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:12:12', 50, 'pro11.png', 'BBC03'),
('BBP12', 'FX2500', 1500, 'Men', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:12:50', 50, 'pro12.png', 'BBC04'),
('BBP13', 'Frederique CX', 3900, 'Men', 'Limited', '2022-05-13 17:14:03', 5, 'pro3.png', 'BBC02'),
('BBP14', 'Zenith TA1', 1650, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n', '2022-05-13 17:14:51', 50, 'pro14.png', 'BBC02'),
('BBP15', 'Frederique V3', 900, 'Women', '<p>\r\n	Luxury &amp; Elegance</p>\r\n<p>\r\n	&nbsp;</p>\r\n', '2022-05-13 17:15:36', 50, 'pro17.png', 'BBC04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `orde_detail`
--
ALTER TABLE `orde_detail`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orde_detail` (`OrderID`);

--
-- Constraints for table `orde_detail`
--
ALTER TABLE `orde_detail`
  ADD CONSTRAINT `orde_detail_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_ID`) REFERENCES `category` (`Cat_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
