-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2022 at 07:01 PM
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
-- Database: `manso118_Web3340`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `CategoryId` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`CategoryId`, `name`) VALUES
(1, 'books'),
(2, 'electronics'),
(3, 'home'),
(4, 'sport'),
(5, 'toy');

-- --------------------------------------------------------

--
-- Table structure for table `Inquiry`
--

CREATE TABLE `Inquiry` (
  `InquiryId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date DEFAULT NULL,
  `Response` varchar(400) COLLATE utf8_unicode_ci NOT NULL DEFAULT '""'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Inquiry`
--

INSERT INTO `Inquiry` (`InquiryId`, `UserId`, `Title`, `Description`, `Date`, `Response`) VALUES
(7, 10, 'Test Inquiry', 'Testing this function', '2022-04-06', 'Test response'),
(8, 10, 'Test inquiry', 'Test Description', '2022-04-06', '\"\"'),
(9, 10, 'Leave Test Inquiry', 'Leave Test Description', '2022-04-06', 'The test response');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ItemId` int(11) NOT NULL,
  `Item` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Brand` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ItemDesc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ProductImage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ItemId`, `Item`, `Brand`, `ItemDesc`, `ProductImage`, `Price`, `Stock`, `CategoryId`) VALUES
(1001, 'Airpods', 'Apple', 'Wireless Headphones', '../../assets/images/airpod.png', '179.00', 25, 2),
(1002, 'Earbuds', 'Samsung', 'Wireless Headphones', '../../assets/images/earbuds.png', '189.99', 18, 2),
(1003, 'Iphone 13 ', 'Apple', 'Iphone 13 Pro Max', '../../assets/images/iphone13promax.png', '1379.99', 18, 2),
(1004, 'Switch', 'Nintendo', 'Switch', '../../assets/images/switch.png', '379.99', 20, 2),
(1005, 'Switchlite', 'Nintendo', 'Swithlite', '../../assets/images/switchlite.png', '234.99', 20, 2),
(1006, 'PS5', 'Sony', 'Playstation 5 with HD', '../../assets/images/ps5.png', '1129.70', 20, 2),
(1007, 'XBOX', 'Microsoft', 'XBOX Series X', '../../assets/images/xbox.png', '799.99', 20, 2),
(1008, 'IPad', 'Apple', 'IPad', '../../assets/images/ipad.png', '429.00', 20, 2),
(1009, 'Smartwatch', 'Garmin', 'Smartwatch with GPS', '../../assets/images/garmin.png', '329.99', 20, 2),
(1010, 'Quest 2', 'Oculus', 'VR Headset', '../../assets/images/occulus.png', '399.99', 20, 2),
(1011, 'Side Table', 'Ashley', 'Cement Side Table', '../../assets/images/cementtable.jpg', '1299.99', 20, 3),
(1012, 'Mirror', 'Crate', 'Gold Circle Mirror', '../../assets/images/mirror.jpg', '109.00', 20, 3),
(1013, 'Table', 'Wilton', 'Bicycle Table', '../../assets/images/Table.jpg', '79.99', 20, 3),
(1014, 'Sofa Table', 'Modern Decor', 'Half circle sofa table', '../../assets/images/sofatable.jpg', '459.00', 20, 3),
(1015, 'Shelf', 'Restoration Hardware', '5 Tier Wall shelf', '../../assets/images/shelf.png', '999.00', 20, 3),
(1016, 'Vases', 'Artworx', 'Set of 2 vases', '../../assets/images/whitevases.jpg', '89.00', 18, 3),
(1017, 'Wire Vases', 'Simplicity', 'Set of 2 gold wire vases', '../../assets/images/vases.png', '45.99', 20, 3),
(1018, 'Plant', 'Home Trends', 'Ficus plant in wicker basket', '../../assets/images/ficus.jpg', '65.00', 20, 3),
(1019, 'Walkie Talkie', 'Diliss', '2-pack Walkie Talkie (Blue)', '../../assets/images/walkietalkie.png', '120.00', 19, 5),
(1020, 'Pin Art', 'Flexx', 'Pin Art Toy', '../../assets/images/pinart.png', '12.00', 20, 5),
(1021, 'Piggy Bank', 'Koni', 'Purple Unicorn piggy bank', '../../assets/images/piggiebank.png', '34.99', 20, 5),
(1022, 'Magic Cauldron', 'Magic Mixies', 'Magic Mixies Cauldron', '../../assets/images/magicmixies.png', '128.59', 20, 5),
(1023, 'Car', 'Hot Wheels', 'Lexus battery operated car', '../../assets/images/lexus.png', '450.99', 20, 5),
(1024, 'Washing Machine', 'Playtime', 'Pretend play Washing machine', '../../assets/images/machine.png', '20.00', 20, 5),
(1025, 'Karaoke', 'Sing-a-long', 'Karaoke microphone and stand', '../../assets/images/karaoke.png', '89.60', 20, 5),
(1026, 'Cash register', 'Hasbro', 'Play cash register', '../../assets/images/cashregister.png', '30.00', 20, 5),
(1027, 'Remote car', 'Traxx', 'Remote control car with twist action', '../../assets/images/car.png', '49.99', 20, 5),
(1028, 'Cactus', 'Cacti', 'Singing and dancing Cactus', '../../assets/images/cactus.png', '19.99', 20, 5),
(1029, 'Book1', 'Textbook', 'Algorithms to Live By', '../../assets/images/algorithms.png', '89.00', 20, 1),
(1030, 'Book2', 'Textbook', 'C++ Programming', '../../assets/images/c++.png', '66.00', 20, 1),
(1031, 'Book3', 'Textbook', 'Eloquent Javascript', '../../assets/images/eloquentjavascript.png', '109.89', 20, 1),
(1032, 'Book4', 'Textbook', 'How To Code', '../../assets/images/Howtocode.png', '98.99', 20, 1),
(1033, 'Book5', 'Textbook', 'HTML & CSS', '../../assets/images/html_css.png', '100.00', 20, 1),
(1034, 'Book6', 'Textbook', 'Java', '../../assets/images/java.png', '55.99', 20, 1),
(1035, 'Book7', 'Textbook', 'Pragmatic Programmer', '../../assets/images/pragmaticprogrammer.png', '78.60', 20, 1),
(1036, 'Book8', 'Textbook', 'Beginning Programming for Dummies', '../../assets/images/programfordummies.png', '59.99', 20, 1),
(1037, 'Book9', 'Textbook', 'Self Taught Programmer', '../../assets/images/selftaughtprogrammer.png', '119.99', 20, 1),
(1038, 'Book10', 'Textbook', 'The Book of R', '../../assets/images/thebookofR.png', '88.00', 20, 1),
(1039, 'Book11', 'Textbook', 'The Go Programming Language', '../../assets/images/thegolanguage.png', '42.40', 20, 1),
(1040, 'Book12', 'Textbook', 'Think like a Programmer', '../../assets/images/thinklikeaprogrammer.png', '76.79', 20, 1),
(1041, 'Basketball', 'Wilson', 'Wilson Basketball', '../../assets/images/basketball.png', '89.95', 20, 4),
(1042, 'Soccerball', 'Adidas', 'Adidas soccerball', '../../assets/images/soccerball.png', '24.99', 20, 4),
(1043, 'Tennis balls', 'Wilson', 'Wilson Tennis balls 4-pack', '../../assets/images/tennisballs.png', '20.98', 20, 4),
(1044, 'Hockey ministicks', 'Franklin', 'Set of Hockey Ministicks', '../../assets/images/Hockey.png', '55.99', 20, 4),
(1045, 'Baseball glove', 'Coach', 'Coach Baseball Glove', '../../assets/images/baseball.png', '425.00', 20, 4),
(1046, 'Bicycle', 'Schwinn', 'Schwinn 10 speed bicycle', '../../assets/images/bike.png', '499.99', 20, 4),
(1047, 'Scuba', 'Nautical', 'Scuba Equipment', '../../assets/images/scuba.png', '79.00', 20, 4),
(1048, 'Tennis Racket', 'Wilson', 'Wilson Tennis Racket', '../../assets/images/raquet.png', '54.59', 20, 4),
(1049, 'Baseball Bat', 'Barnett', 'Barnett Wooden Baseball Bat', '../../assets/images/bat.png', '100.00', 20, 4),
(1050, 'Rollerblades', 'Bauer', 'Bauer Rollerblades', '../../assets/images/rollerblades.png', '129.00', 20, 4),
(1053, 'Test Item', 'Test', 'Test Description', 'Test image', '12.40', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `ReviewId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`ReviewId`, `UserId`, `ItemId`, `Rating`, `Description`) VALUES
(1, 1, 1002, 4, 'test'),
(2, 1, 1002, 4, '0'),
(3, 1, 1002, 3, 'this can be better'),
(4, 1, 1002, 1, 'test again'),
(8, 10, 1002, 4, 'This Item is exceptional');

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `TransactionId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`TransactionId`, `ItemId`, `Quantity`) VALUES
(1, 1001, 1),
(1, 1002, 1),
(6, 1003, 2),
(6, 1002, 2),
(7, 1019, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `TransactionId` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `CompletedOrder` tinyint(1) GENERATED ALWAYS AS (1) VIRTUAL,
  `UserId` int(11) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`TransactionId`, `TotalPrice`, `UserId`, `Date`) VALUES
(1, '368.99', 1, '2022-04-04'),
(6, '3139.96', 10, '2022-04-06'),
(7, '120.00', 1, '2022-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `UserAdmin`
--

CREATE TABLE `UserAdmin` (
  `UserId` int(11) NOT NULL,
  `AdminFlag` tinyint(1) NOT NULL DEFAULT 1,
  `FirstName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LastName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PostalCode` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `ColorScheme` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dark',
  `isDisabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `UserAdmin`
--

INSERT INTO `UserAdmin` (`UserId`, `AdminFlag`, `FirstName`, `LastName`, `Email`, `Password`, `Address`, `City`, `PostalCode`, `ColorScheme`, `isDisabled`) VALUES
(1, 1, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin', 'admin', 'blue', 0),
(10, 0, 'Test Edited', 'Test Last Name', 'testagain@gmail.com', 'thisthis', 'test address 2', 'test city', '000 000', 'dark', 0),
(11, 0, 'add user Edited', 'add user last name', 'adduser@gmail.com', 'addaddadd', 'add address', 'add city', '000 000', 'dark', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD PRIMARY KEY (`InquiryId`),
  ADD KEY `user_id` (`UserId`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ItemId`),
  ADD UNIQUE KEY `Item_UNIQUE` (`Item`),
  ADD KEY `categoryid` (`CategoryId`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`ReviewId`),
  ADD KEY `itemID_idx` (`ItemId`),
  ADD KEY `userid_2` (`UserId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD KEY `ItemId_idx` (`ItemId`),
  ADD KEY `transaction_id` (`TransactionId`) USING BTREE;

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `UserId_idx` (`UserId`);

--
-- Indexes for table `UserAdmin`
--
ALTER TABLE `UserAdmin`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Inquiry`
--
ALTER TABLE `Inquiry`
  MODIFY `InquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `ReviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `TransactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `UserAdmin`
--
ALTER TABLE `UserAdmin`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Inquiry`
--
ALTER TABLE `Inquiry`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`CategoryId`) REFERENCES `Categories` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`ItemId`) REFERENCES `Products` (`ItemId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid_2` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `item_id2` FOREIGN KEY (`ItemId`) REFERENCES `Products` (`ItemId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_id` FOREIGN KEY (`TransactionId`) REFERENCES `Transactions` (`TransactionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`UserId`) REFERENCES `UserAdmin` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
