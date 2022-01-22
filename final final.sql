-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 09:38 AM
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
  `attachment` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messegeID`, `sender`, `senderName`, `receiver`, `message`, `seen`, `attachment`, `createdAt`) VALUES
(7, 32, 'Shehab Mohsen', 14, 'Admin Are you here', 'yes', '', '2022-01-21 07:09:46am'),
(8, 14, 'Abdelrahman Khaled', 32, 'Yes I am here', 'yes', '', '2022-01-21 07:10:01am'),
(9, 33, 'Hady Wael', 32, 'good job\r\n', '', '', '2022-01-21 07:16:40am'),
(10, 33, 'Hady Wael', 43, 'HR Hello', '', '', '2022-01-21 07:20:41am'),
(11, 43, 'Ahmed Sameh', 33, 'I am here', '', '', '2022-01-21 07:21:15am'),
(12, -1, '', 14, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', 'yes', '', '2022-01-21 07:21:24am'),
(13, 32, 'Shehab Mohsen', 14, 'I want to change a product', 'yes', '', '2022-01-21 03:00:23pm'),
(14, 14, 'Abdelrahman Khaled', 32, 'i will help you', 'yes', '', '2022-01-21 03:01:45pm'),
(15, 32, 'Shehab Mohsen', 14, ' here is a link to the product www.google.com', 'yes', '', '2022-01-21 03:17:00pm'),
(16, 32, 'Shehab Mohsen', 14, 'can you add this', 'yes', 'download (6).jpg', '2022-01-21 03:32:10pm'),
(17, 32, 'Shehab Mohsen', 14, 'and i want also this product', 'yes', '71BiNsqMF0L._AC_UY395_.jpg', '2022-01-21 03:53:40pm'),
(18, 32, 'Shehab Mohsen', 14, 'hi', 'yes', '', '2022-01-21 05:54:15pm'),
(19, 14, 'Abdelrahman Khaled', 56, 'hello', 'yes', '', '2022-01-21 06:10:14pm'),
(20, 14, 'Abdelrahman Khaled', 32, 'hello', 'yes', '', '2022-01-21 06:10:33pm'),
(21, 33, 'Hady Wael', 56, 'nice job', '', '', '2022-01-21 06:17:07pm'),
(22, 32, 'Shehab Mohsen', 14, 'do you see the product', 'yes', 'MAC_VisitaVirtuale_sala4_1.jpg', '2022-01-21 06:39:16pm'),
(23, -1, '', 14, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', '', '', '2022-01-21 07:06:37pm');

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
(68, 'shehab', 4, 'I Love it', 1642739161, 10);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `surveyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `product` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `prices` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`surveyID`, `userID`, `username`, `product`, `service`, `website`, `prices`) VALUES
(2, 32, 'Shehab Mohsen', '1', '1', '1', '1'),
(3, 32, 'Shehab Mohsen', '4', '3', '3', '5'),
(4, 32, 'Shehab Mohsen', '2', '3', '4', '5');

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
(43, 'Ahmed Sameh', 'sameh@gmail.com', '1234', '01211573638', ' ssss', 'HR', 'AAAABTZhS1ImHUMxQHGb7DcsUej-U2GkvAHSycLqiksSK1X5Wcqb0z-R6Mzt7MB6P6I9zLtqRAZSNOl7MS5KVlBNh59BAfcVeQlgwcOJzgc3srGktxH3rY2tkMhwKXIw.jpg'),
(56, 'Ahmed', 'ahmed@gmail.com', '1234', '02222222222', 'nasr city', 'customer', '51v6Kdpa6NL.jpg'),
(57, 'Ali Khaled Abdelmonem Elewa', 'ali@gmail.com', '1234', '01211573638', 'shrouk', 'customer', 'barca-2-min.jpg');

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
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`surveyID`);

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
  MODIFY `messegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `surveyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
