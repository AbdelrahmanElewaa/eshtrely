-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 09:08 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshtrely`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messegeID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `senderName` varchar(100) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `seen` varchar(100) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messegeID`, `sender`, `senderName`, `receiver`, `message`, `seen`, `createdAt`) VALUES
(7, 32, 'Shehab Mohsen', 14, 'Admin Are you here', 'yes', '2022-01-21 07:09:46am'),
(8, 14, 'Abdelrahman Khaled', 32, 'Yes I am here', 'yes', '2022-01-21 07:10:01am'),
(9, 33, 'Hady Wael', 32, 'good job\r\n', '', '2022-01-21 07:16:40am'),
(10, 33, 'Hady Wael', 43, 'HR Hello', '', '2022-01-21 07:20:41am'),
(11, 43, 'Ahmed Sameh', 33, 'I am here', '', '2022-01-21 07:21:15am'),
(12, -1, '', 14, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', '', '2022-01-21 07:21:24am');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `userid` int(55) NOT NULL,
  `productid` int(55) NOT NULL,
  `quantity` int(55) NOT NULL,
  `orderid` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`userid`, `productid`, `quantity`, `orderid`) VALUES
(29, 10, 1, 1),
(29, 10, 3, 2),
(29, 11, 1, 3),
(29, 10, 2, 4),
(29, 11, 1, 5),
(29, 10, 1, 6),
(29, 10, 2, 7),
(29, 11, 1, 8),
(32, 11, 1, 9),
(32, 10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productname` varchar(50) NOT NULL,
  `productid` varchar(50) NOT NULL,
  `productprice` double(10,2) NOT NULL,
  `productimage` varchar(50) NOT NULL,
  `rating` double(2,1) NOT NULL,
  `quantity` int(100) NOT NULL,
  `producttype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productname`, `productid`, `productprice`, `productimage`, `rating`, `quantity`, `producttype`) VALUES
('Laptop ', '1', 400.00, 'dell.jpg', 0.0, 46, 'electronics'),
('KitKat Chocolate', '10', 4.00, 'kitkat.jpg', 0.0, 95, 'food'),
('Pepsi Can', '11', 5.00, 'pepsican.jpg', 0.0, 219, 'food'),
('Coca Cola 2L Bottle', '12', 10.00, 'coke2l.jpg', 0.0, 148, 'food'),
('Snickers', '13', 4.00, 'snickers.jpg', 0.0, 197, 'food'),
('Pepsi 2L Bottle', '14', 10.00, 'pepsi2l.jpeg', 0.0, 150, 'food'),
('Chile Limon Chips', '15', 15.00, 'chilelimonchips.jpeg', 0.0, 199, 'food'),
('Liverpool Nike T-Shirt', '16', 200.00, 'liverpoolshirt.jpg', 0.0, 146, 'fashion'),
('Black Nike T-Shirt', '17', 250.00, 'nikeblackshirt.jpg', 0.0, 149, 'fashion'),
('Nike Black Sweatpants', '18', 150.00, 'nikeblackpants.jpg', 0.0, 239, 'fashion'),
('Nike Green Sweatpants', '19', 150.00, 'nikegreenpants.jpg', 0.0, 199, 'fashion'),
('Nike Shoes', '2', 200.00, 'nikeshoe.jpg', 0.0, 19, 'fashion'),
('Tomato Chips', '3', 15.00, 'tomatoochips.jpg', 0.0, 100, 'food'),
('Galaxy Chocolate', '5', 4.00, 'galaxy.jpg', 0.0, 300, 'food'),
('IPhone 13', '6', 699.00, 'iPhone13.jpg', 0.0, 198, 'electronics'),
('Sour Cream & Onions Chips', '8', 15.00, 'sourcreamchips.jpg', 0.0, 200, 'food'),
('Lenovo A5s', '9', 300.00, 'LenovoA5s.jpeg', 0.0, 299, 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `product_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `product_id`) VALUES
(6, 'John Smith', 4, 'Nice Product, Value for money', 1621935691, 0),
(7, 'Peter Parker', 5, 'Nice Product with Good Feature.', 1621939888, 0),
(8, 'Donna Hubber', 1, 'Worst Product, lost my money.', 1621940010, 0),
(20, 'Ahmed', 0, 'gg', 1642109794, 0),
(21, 'Ahmed', 5, 'gg', 1642110251, 0),
(22, 'Ahmed', 0, 'ss', 1642110395, 0),
(23, 'hady', 0, '55', 1642110531, 0),
(24, 'Ahmed', 0, 'gg', 1642110638, 0),
(25, 'Ahmed', 5, '66', 1642110857, 0),
(26, 'Ahmed', 5, '55', 1642111139, 0),
(27, 'Ahmed', 5, '55', 1642111194, 0),
(28, 'shehab', 5, 'ss', 1642111231, 0),
(29, 'Ahmed', 5, '55', 1642111393, 0),
(30, 'Ahmed', 5, '44', 1642111537, 0),
(31, 'Ahmed', 5, 'ss', 1642111613, 0),
(32, 'Ahmed', 0, 'aa', 1642111663, 0),
(33, 'Ahmed', 0, 'aa', 1642111681, 0),
(34, 'Ahmed', 5, 'aa', 1642111716, 0),
(35, 'hady', 3, 'ff', 1642111743, 0),
(36, 'hady', 5, 'ff', 1642111749, 0),
(37, 'Ahmedss', 5, 'ss', 1642112691, 0),
(38, 'Ahmedss', 5, 'ss', 1642112696, 0),
(39, 'Ahmedss', 5, 'ss', 1642112710, 0),
(40, 'hady', 4, 'ss', 1642112740, 0),
(41, 'Ahmed', 4, 'ss', 1642112813, 0),
(42, 'Ahmed', 5, '22', 1642112829, 0),
(43, 'Ahmed', 5, 'ss', 1642112960, 0),
(44, 'Ahmed', 5, 'ss', 1642113035, 0),
(45, 'Ahmed', 5, 'ss', 1642113093, 0),
(46, 'Ahmed', 5, 'ss', 1642113179, 0),
(47, 'Ahmed', 5, 'ss', 1642113425, 0),
(48, 'Ahmed', 5, 'ss', 1642113799, 0),
(49, 'Ahmed', 5, 'aa', 1642114078, 0),
(50, 'Ahmed', 5, 'aa', 1642114094, 0),
(51, 'hady', 1, 'efgfsf', 1642276710, 0),
(52, 'hady', 3, 'ewe', 1642277334, 10),
(53, 'hady', 3, 'ewe', 1642277364, 10),
(54, 'hady', 3, 'sss', 1642277429, 11),
(55, 'hady', 3, '4444444', 1642277488, 11),
(56, 'hady', 3, '55555', 1642277627, 1),
(57, 'hady', 3, 'sfffasf', 1642277789, 1),
(58, 'hady', 3, 'werfaf', 1642277869, 1),
(59, 'hady', 3, 'wrafs', 1642278037, 1),
(60, 'hady', 2, '24342', 1642278202, 1),
(61, 'hady', 3, '24342', 1642278401, 1),
(62, 'hady', 3, 'wrqr', 1642278671, 1),
(63, 'hady', 2, 'wrqaq', 1642279169, 1),
(64, 'ruvy', 2, 'wwr', 1642279914, 1),
(65, 'ruvy', 2, 'wrqrq32r3', 1642279931, 12),
(66, 'hady', 1, 'a7a\n', 1642280016, 12),
(67, 'shehab', 5, 'ksosmak', 1642280078, 12),
(68, 'shehab', 4, 'I Love it', 1642739161, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `photo`) VALUES
(14, 'Abdelrahman Khaled', 'abdo@gmail.com', '1234', '01002585821', 'nasr city', 'admin', 'IMG_20190201_140906_429.jpg'),
(32, 'Shehab Mohsen', 'Shehab@gmail.com', '1234', '01211573638', 'shrouk', 'customer', '5-atletico-madrid-19-20-third-shirt-min.jpg'),
(33, 'Hady Wael', 'hady@gmail.com', '1234', '01211573638', 'nasr', 'auditor', 'Simon Bolivar.jpg'),
(43, 'Ahmed Sameh', 'sameh@gmail.com', '1234', '01211573638', ' ssss', 'HR', 'AAAABTZhS1ImHUMxQHGb7DcsUej-U2GkvAHSycLqiksSK1X5Wcqb0z-R6Mzt7MB6P6I9zLtqRAZSNOl7MS5KVlBNh59BAfcVeQlgwcOJzgc3srGktxH3rY2tkMhwKXIw.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messegeID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
