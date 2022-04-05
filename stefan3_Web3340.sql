-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2022 at 08:11 PM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stefan3_Web3340`
--

-- --------------------------------------------------------

--
-- Table structure for table `Inquiry`
--

CREATE TABLE `Inquiry` (
  `InquiryId` int(11) NOT NULL,
  `UserId` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ItemId` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Item` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Brand` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ItemDesc` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductImage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ItemId`, `Item`, `Brand`, `ItemDesc`, `ProductImage`, `Price`, `Stock`) VALUES
('1001', 'Airpods', 'Apple', 'Wireless Headphones', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1001.png', '179.00', 5),
('1002', 'Earbuds', 'Samsung', 'Wireless Headphones', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1002.png', '189.99', 5),
('1003', 'Iphone 13 ', 'Apple', 'Iphone 13 Pro Max', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1003.png', '1379.99', 5),
('1004', 'Switch', 'Nintendo', 'Switch', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1004.png', '379.99', 5),
('1005', 'Switchlite', 'Nintendo', 'Swithlite', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1005.png', '234.99', 5),
('1006', 'PS5', 'Sony', 'Playstation 5 with HD', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1006.png', '1129.70', 5),
('1007', 'XBOX', 'Microsoft', 'XBOX Series X', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1007.png', '799.99', 5),
('1008', 'IPad', 'Apple', 'IPad', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1008.png', '429.00', 5),
('1009', 'Smartwatch', 'Garmin', 'Smartwatch with GPS', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1009.png', '329.99', 5),
('1010', 'Quest 2', 'Oculus', 'VR Headset', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1010.png', '399.99', 5),
('1011', 'Side Table', 'Ashley', 'Cement Side Table', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1011.jpg', '1299.99', 5),
('1012', 'Mirror', 'Crate', 'Gold Circle Mirror', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1012.jpg', '109.00', 5),
('1013', 'Table', 'Wilton', 'Bicycle Table', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1013.jpg', '79.99', 5),
('1014', 'Sofa Table', 'Modern Decor', 'Half circle sofa table', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1014.jpg\r\n', '459.00', 5),
('1015', 'Shelf', 'Restoration Hardware', '5 Tier Wall shelf', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1015.jpg', '999.00', 5),
('1016', 'Vases', 'Artworx', 'Set of 2 vases', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1016.png', '89.00', 5),
('1017', 'Wire Vases', 'Simplicity', 'Set of 2 gold wire vases', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1017.png', '45.99', 5),
('1018', 'Plant', 'Home Trends', 'Ficus plant in wicker basket', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1018.jpg\r\n', '65.00', 5),
('1019', 'Walkie Talkie', 'Diliss', '2-pack Walkie Talkie (Blue)', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1019.png', '120.00', 5),
('1020', 'Pin Art', 'Flexx', 'Pin Art Toy', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1020.png', '12.00', 5),
('1021', 'Piggy Bank', 'Koni', 'Purple Unicorn piggy bank', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1021.png', '34.99', 5),
('1022', 'Magic Cauldron', 'Magic Mixies', 'Magic Mixies Cauldron', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1022.png', '128.59', 5),
('1023', 'Car', 'Hot Wheels', 'Lexus battery operated car', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1023.jpg', '450.99', 5),
('1024', 'Washing Machine', 'Playtime', 'Pretend play Washing machine', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1024.png', '20.00', 5),
('1025', 'Karaoke', 'Sing-a-long', 'Karaoke microphone and stand', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1025.png', '89.60', 5),
('1026', 'Cash register', 'Hasbro', 'Play cash register', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1026.png', '30.00', 5),
('1027', 'Remote car', 'Traxx', 'Remote control car with twist action', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1027.png', '49.99', 5),
('1028', 'Cactus', 'Cacti', 'Singing and dancing Cactus', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1028.png', '19.99', 5),
('1029', 'Book1', 'Textbook', 'Algorithms to Live By', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1029.png', '89.00', 5),
('1030', 'Book2', 'Textbook', 'C++ Programming', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1030.png', '66.00', 5),
('1031', 'Book3', 'Textbook', 'Eloquent Javascript', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1031.png', '109.89', 5),
('1032', 'Book4', 'Textbook', 'How To Code', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1032.png', '98.99', 5),
('1033', 'Book5', 'Textbook', 'HTML & CSS', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1033.png', '100.00', 5),
('1034', 'Book6', 'Textbook', 'Java', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1034.png', '55.99', 5),
('1035', 'Book7', 'Textbook', 'Pragmatic Programmer', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1035.png', '78.60', 5),
('1036', 'Book8', 'Textbook', 'Beginning Programming for Dummies', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1036.png', '59.99', 5),
('1037', 'Book9', 'Textbook', 'Self Taught Programmer', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1037.png', '119.99', 5),
('1038', 'Book10', 'Textbook', 'The Book of R', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1038.png', '88.00', 5),
('1039', 'Book11', 'Textbook', 'The Go Programming Language', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1039.png', '42.40', 5),
('1040', 'Book12', 'Textbook', 'Think like a Programmer', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1040.png', '76.79', 5),
('1041', 'Basketball', 'Wilson', 'Wilson Basketball', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1041.png', '89.95', 5),
('1042', 'Soccerball', 'Adidas', 'Adidas soccerball', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1042.png', '24.99', 5),
('1043', 'Tennis balls', 'Wilson', 'Wilson Tennis balls 4-pack', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1043.png', '20.98', 5),
('1044', 'Hockey ministicks', 'Franklin', 'Set of Hockey Ministicks', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1044.png', '55.99', 5),
('1045', 'Baseball glove', 'Coach', 'Coach Baseball Glove', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1045.png', '425.00', 5),
('1046', 'Bicycle', 'Schwinn', 'Schwinn 10 speed bicycle', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1046.png', '499.99', 5),
('1047', 'Scuba', 'Nautical', 'Scuba Equipment', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1047.png', '79.00', 5),
('1048', 'Tennis Racket', 'Wilson', 'Wilson Tennis Racket', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1048.png', '54.59', 5),
('1049', 'Baseball Bat', 'Barnett', 'Barnett Wooden Baseball Bat', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1049.png', '100.00', 5),
('1050', 'Rollerblades', 'Bauer', 'Bauer Rollerblades', 'https://stefan3.myweb.cs.uwindsor.ca/assets/1050.png', '129.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `ReviewId` int(11) NOT NULL,
  `UserId` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ItemId` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `SaleID` int(11) NOT NULL,
  `ItemId` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `TransactionId` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `CompletedOrder` tinyint(1) GENERATED ALWAYS AS (1) VIRTUAL,
  `UserId` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date DEFAULT NULL,
  `SaleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UserAdmin`
--

CREATE TABLE `UserAdmin` (
  `UserId` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `AdminFlag` tinyint(1) NOT NULL DEFAULT 1,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PostalCode` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD PRIMARY KEY (`InquiryId`),
  ADD UNIQUE KEY `InquiryId_UNIQUE` (`InquiryId`),
  ADD KEY `UserId_idx` (`UserId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ItemId`),
  ADD UNIQUE KEY `Item_UNIQUE` (`Item`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`ReviewId`),
  ADD UNIQUE KEY `CustomerId_UNIQUE` (`UserId`),
  ADD UNIQUE KEY `ReviewId_UNIQUE` (`ReviewId`),
  ADD KEY `itemID_idx` (`ItemId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleID`),
  ADD UNIQUE KEY `TransactionId_UNIQUE` (`SaleID`),
  ADD KEY `ItemId_idx` (`ItemId`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD UNIQUE KEY `TransactionId_UNIQUE` (`TransactionId`),
  ADD UNIQUE KEY `SaleId_UNIQUE` (`SaleId`),
  ADD KEY `UserId_idx` (`UserId`);

--
-- Indexes for table `UserAdmin`
--
ALTER TABLE `UserAdmin`
  ADD PRIMARY KEY (`UserId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD CONSTRAINT `UserId` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `ItemId` FOREIGN KEY (`ItemId`) REFERENCES `Products` (`ItemId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UserId_2` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `ItemId_2` FOREIGN KEY (`ItemId`) REFERENCES `Products` (`ItemId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `SaleId` FOREIGN KEY (`SaleId`) REFERENCES `Sales` (`SaleID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UserId_3` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
