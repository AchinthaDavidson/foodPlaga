-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 04:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodplaga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` varchar(5) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `userName` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `Name`, `userName`, `password`) VALUES
('AD001', 'Ravindu Idamalgoda', 'Ad_1', 'Ravindu123'),
('AD002', 'isuru Achintha', 'Ad_2', 'Isuru123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `C_ID` varchar(5) NOT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`C_ID`, `Name`) VALUES
('CT001', 'Rice Conner'),
('CT002', 'Kottu'),
('CT003', 'Starter'),
('CT004', 'Soup'),
('CT005', 'Burger'),
('CT006', 'Submarine'),
('CT007', 'Backery'),
('CT008', 'Soft Drinks'),
('CT009', 'Cakes & Snaks');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Tele_No` varchar(12) DEFAULT NULL,
  `UserName` varchar(20) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_ID`, `Name`, `Address`, `Email`, `Tele_No`, `UserName`, `Password`) VALUES
(1, 'Sawanka yomal', '123 Pilimathalawa Kandy', 'sawankayomal@gmail.com', '0773073465', 'Sawanka', 'Sawanka123'),
(2, 'Malinda Amarakoon', '189Aggg', 'achinthawijethunga@gmail.com', '0773073466', 'Malinda', 'Malinda123'),
(14, 'Rohana  Wijethunga', '189A Katugasthota RD , kandy', 'rohanawijethunga@gmail.com', '0727235112', 'Manjula', 'Manjula123'),
(65, 'Ravihara Wijethunga', '189A', 'ravinduiddamalgoda55@gmail.com', '0772021465', 'Ravi', 'Ravi123');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_Id` varchar(5) NOT NULL,
  `name` longtext,
  `C_ID` varchar(5) DEFAULT NULL,
  `price` float NOT NULL,
  `image` longtext,
  `Discription` varchar(100) DEFAULT NULL,
  `A_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_Id`, `name`, `C_ID`, `price`, `image`, `Discription`, `A_ID`) VALUES
('FD132', 'Vegetable Fried Rice\r\n', 'CT001', 450, 'VCR.png', 'Basmati Fried Rice, Mango Chutney, Chili past', 'AD001'),
('FD134', 'Egg Fried Rice', 'CT001', 550, 'EFR.png', 'Basmati Fried Egg Rice, Mango Chutney, Chili past', 'AD001'),
('FD135', 'Egg Burger ', 'CT005', 150, 'EB.png', '', 'AD001'),
('FD136', 'Chicken Fried Rice   ', 'CT001', 650, 'CRF.png', 'Basmati Fried Egg Rice, Chicken Gravy Mango Chutney, Chili past', 'AD001'),
('FD137', 'Chicken Sausage Fried Rice', 'CT001', 600, 'CSFR.png', 'Basmati Fried Egg Rice, Chicken Gravy, Sausage, Mango Chutney, Chili past', 'AD001'),
('FD138', 'Chicken Dum Biriyani   ', 'CT001', 750, 'CB.png', 'Basmati Rice, Chicken, Vegetable salad, Boiled Egg, Mango Chutney, Chicken Curry', 'AD001'),
('FD139', 'Beef Dum Biriyani    ', 'CT001', 950, 'BB.png', 'Basmati Rice, Beef, Vegetable salad, Boiled Egg, Mango Chutney, Beef Curry ', 'AD001'),
('FD140', 'Mutton Dum Biriyani ', 'CT001', 1200, 'MB.png', 'Basmati Rice, Mutton, Vegetable salad, Boiled Egg, Mango Chutney, Mutton Curry ', 'AD001'),
('FD141', 'Chicken Burger ', 'CT005', 500, 'Cbur.png', '', 'AD001'),
('FD501', 'Egg n chicken ham burger', 'CT005', 700, 'EHB.png', '', 'AD001'),
('FD502', 'Chicken Cheese Burger', 'CT005', 650, 'CCesseB.png', '', 'AD001'),
('FD503', 'Double Chicken Burger', 'CT005', 750, 'DCB.png', '', 'AD001'),
('FD504', 'Beef Burger', 'CT005', 800, 'BBeu.png', '', 'AD001'),
('FD505', 'Food Plaga Special Burger', 'CT005', 1200, 'FPSB.png', '', 'AD001'),
('FD506', 'Chicken Submarine', 'CT006', 450, 'CS.png', '', 'AD001'),
('FD507', 'Crispy Chicken Submarine', 'CT006', 500, 'CCS.png', '', 'AD001'),
('FD508', 'Crispy Chicken Spicy Submarine', 'CT006', 550, 'CCSS.png', '', 'AD001'),
('FD509', 'Egg Submarine', 'CT006', 400, 'SES.png', '', 'AD001'),
('FD510', 'Tuna Submatine', 'CT006', 650, 'TS.png', '', 'AD001'),
('FD511', 'Chicken Kottu', 'CT002', 600, 'CK.png', '', 'AD001'),
('FD512', 'Veg. Kottu', 'CT002', 500, 'VK.png', '', 'AD001'),
('FD513', 'Cheese Kottu', 'CT002', 650, 'CeeK.png', '', 'AD001'),
('FD514', 'Chicken Cheese Kottu', 'CT002', 700, 'CCK.png', '', 'AD001'),
('FD515', 'French  Fries', 'CT003', 500, 'FF.png', '', 'AD001'),
('FD516', 'onion Rings', 'CT003', 600, 'OR.png', '', 'AD001'),
('FD517', 'Chicken Wings', 'CT003', 700, 'CW.png', '', 'AD001'),
('FD518', 'Chees French Fries', 'CT003', 800, 'CFF.png', '', 'AD001'),
('FD520', 'gobi manchurian', 'CT003', 850, 'GM.png', '', 'AD001'),
('FD521', 'Fish  Patties', 'CT007', 80, 'PAtis.png', '', 'AD001'),
('FD522', 'Chicken Roles', 'CT007', 95, 'CR.png', '', 'AD001'),
('FD523', 'Fish Cutlet', 'CT007', 80, 'C.png', '', 'AD001'),
('FD524', 'Ulundu wade', 'CT007', 100, 'UW.png', '', 'AD001'),
('FD525', 'Dhal wade', 'CT007', 35, 'W.png', '', 'AD001'),
('FD526', 'Chocolate Milk Shake  ', 'CT008', 450, 'CMS.png', '', 'AD001'),
('FD527', 'Vanilla Milk Shake ', 'CT008', 350, 'WMS.png', '', 'AD001'),
('FD528', 'Strawberry Milk Shake', 'CT008', 450, 'SMS.png', '', 'AD001'),
('FD529', 'Strawberry Chocolate Milk Shake', 'CT008', 600, 'SCMS.png', '', 'AD001'),
('FD530', 'Virgin Mojito', 'CT008', 300, 'VM.png', '', 'AD001'),
('FD531', 'Food Plaga Special Strawberry  Mojito', 'CT008', 400, 'FPSSM.png', '', 'AD001'),
('FD532', 'Sugar Donut with cream and berry', 'CT009', 50, 'C&S 1.png', '', 'AD001'),
('FD533', 'Sweet puff with Cream and Chocolates ', 'CT009', 350, 'C&S 2.png', '', 'AD001'),
('FD534', 'Sugar Cookie   ', 'CT009', 80, 'C&S 3.png', '', 'AD001'),
('FD535', 'Chocolate Donuts', 'CT009', 90, 'C&S 4.png', '', 'AD001'),
('FD536', 'Vanilla moose With Berry', 'CT009', 250, 'C&S 5.png', '', 'AD001'),
('FD537', 'Vanilla moose With Berry', 'CT009', 250, 'C&S 5.png', '', 'AD001'),
('FD538', 'Vanilla moose With Berry', 'CT009', 250, 'C&S 5.png', '', 'AD001'),
('FD539', 'Vanilla moose With Berry', 'CT009', 250, 'C&S 5.png', '', 'AD001'),
('FD540', 'Vanilla moose With Berry', 'CT009', 250, 'C&S 5.png', '', 'AD001'),
('FD541', 'Chicken Clear Soup', 'CT004', 350, 'CCSOUP.png', '', 'AD001'),
('FD542', 'Chicken Manchow Soup', 'CT004', 400, 'CMS 2.png', '', 'AD001'),
('FD543', 'Chicken Noodles Soup', 'CT004', 450, 'CNS.png', '', 'AD001'),
('FD544', 'Chicken Noodles Soup', 'CT004', 450, 'CNS.png', '', 'AD001'),
('FD545', 'Chicken Noodles Soup', 'CT004', 450, 'CNS.png', '', 'AD001'),
('FD546', 'Royal Chicken Soup', 'CT004', 550, 'RCS.png', '', 'AD001'),
('FD547', 'Chicken Chinese Hot & sour Soup', 'CT004', 600, 'CCHSS.png', '', 'AD001');

-- --------------------------------------------------------

--
-- Table structure for table `orderlists`
--

CREATE TABLE `orderlists` (
  `order_no` int(11) NOT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `customer_ID` int(11) DEFAULT NULL,
  `P_ID` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlists`
--

INSERT INTO `orderlists` (`order_no`, `time`, `date`, `customer_ID`, `P_ID`) VALUES
(0, '12:37:48', '2022-05-21', 2, '100'),
(1, '07:44:48', '2022-05-22', 2, '100');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Details_Id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `order_no` int(11) DEFAULT NULL,
  `food_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Details_Id`, `qty`, `amount`, `order_no`, `food_id`) VALUES
(36, 1, 150, 31, 'FD135'),
(119, 5, 500, 1, 'FD507'),
(123, 1, 750, 1, 'FD138');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Coustomer_ID` int(5) NOT NULL,
  `curd_no` varchar(16) DEFAULT NULL,
  `exp_year` int(11) NOT NULL,
  `exp_mon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Coustomer_ID`, `curd_no`, `exp_year`, `exp_mon`) VALUES
(2, '1111555522224444', 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `P_ID` varchar(5) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `A_ID` varchar(5) DEFAULT NULL,
  `foodId` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`P_ID`, `discount`, `A_ID`, `foodId`) VALUES
('FD132', 150, 'AD002', 'FD132'),
('FD134', 456, 'AD002', 'FD134'),
('FD135', 456, 'AD002', 'FD135');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_Id`),
  ADD KEY `food_FK1` (`C_ID`),
  ADD KEY `food_FK2` (`A_ID`);

--
-- Indexes for table `orderlists`
--
ALTER TABLE `orderlists`
  ADD PRIMARY KEY (`order_no`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Details_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Coustomer_ID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `promotion_FK` (`A_ID`),
  ADD KEY `foodId` (`foodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Details_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_FK1` FOREIGN KEY (`C_ID`) REFERENCES `category` (`C_ID`),
  ADD CONSTRAINT `food_FK2` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`A_ID`);

--
-- Constraints for table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `FK_foodId` FOREIGN KEY (`foodId`) REFERENCES `food` (`Food_Id`),
  ADD CONSTRAINT `promotion_FK` FOREIGN KEY (`A_ID`) REFERENCES `admin` (`A_ID`),
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`foodId`) REFERENCES `food` (`Food_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
