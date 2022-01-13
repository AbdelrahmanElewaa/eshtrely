-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 11:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `adminPhoto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `sender`, `receiver`, `message`, `createdAt`) VALUES
(1, 44, 0, 'hello', '2022-01-12 01:58:28am'),
(2, 44, 0, 'hello', '2022-01-12 02:05:37am'),
(3, 44, 0, 'Can you add something ??', '2022-01-12 02:05:53am'),
(4, 55, 0, 'Hi I am bekas', '2022-01-12 03:28:29am'),
(5, 47, 0, 'Ya Abdooooo', '2022-01-12 04:26:58am'),
(6, 27, 44, 'yess sir i can help you', '2022-01-12 05:29:38am'),
(7, 27, 44, 'yess sir i can help you', '2022-01-12 05:29:41am'),
(8, 0, 44, 'hi', '2022-01-12 05:39:53am'),
(9, 47, 0, 'Ya Abdooooo', '2022-01-12 05:42:09am'),
(10, 47, 0, 'Ya Abdooooo', '2022-01-12 05:43:16am'),
(18, 0, 44, 'hi', '2022-01-12 06:06:48am'),
(19, 0, 44, 'i am alive', '2022-01-12 06:07:34am'),
(20, 0, 44, 'i am alive', '2022-01-12 06:07:40am'),
(21, 0, 44, 'i am alive', '2022-01-12 06:07:58am'),
(22, 0, 44, 'g', '2022-01-12 06:08:35am'),
(23, 0, 44, 'g', '2022-01-12 06:08:43am'),
(24, 0, 44, 'g', '2022-01-12 06:11:37am'),
(25, 0, 44, 'k', '2022-01-12 06:11:42am'),
(26, 0, 44, 'k', '2022-01-12 06:11:49am'),
(27, 0, 44, 'new\r\n', '2022-01-12 10:36:05pm'),
(28, 0, 44, 'new\r\n', '2022-01-12 10:36:14pm');

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
(29, 11, 1, 8);

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
('Laptop Dell', '1', 400.00, 'dell.jpg', 0.0, 46, 'electronics'),
('KitKat Chocolate', '10', 4.00, 'kitkat.jpg', 0.0, 96, 'food'),
('Pepsi Can', '11', 5.00, 'pepsican.jpg', 0.0, 220, 'food'),
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
('Twinkies', '4', 2.00, 'twinkies.jpg', 0.0, 500, 'food'),
('Galaxy Chocolate', '5', 4.00, 'galaxy.jpg', 0.0, 300, 'food'),
('IPhone 13', '6', 699.00, 'iPhone13.jpg', 0.0, 198, 'electronics'),
('Rice Bag', '7', 10.00, 'rice.jpg', 0.0, 100, 'food'),
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
  `productid` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `productid`) VALUES
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
(50, 'Ahmed', 5, 'aa', 1642114094, 0);

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
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `photo`, `created_at`, `updated_at`) VALUES
(14, 'Amr Elewa', 'amrelewa@gmail.com', '123456', '01002585821', 'nasr city', 'admin', 'WhatsApp Image 2021-12-13 at 5.56.22 PM.jpeg', NULL, NULL),
(21, 'Ali Khaled', 'ali@email.com', '218', '01140414492', '85 haroun elrashid- Misr elgdeda', 'customer', 'WhatsApp Image 2021-12-13 at 6.03.59 PM.jpeg', NULL, NULL),
(24, 'Hady Wael ', 'hadywk@gmail.com', '1234', '01151665100', 'nasr city', 'customer', 'background.jpg', NULL, NULL),
(28, 'mohmed', 'Mazenwk@gmail.com', '9876', '0309393', 'dehk st', 'customer', 'the_child_star_wars_gallery_5e3204be4f668.jpg', NULL, NULL),
(29, 'Ahmed Sameh', 'Ghourab@gmail.com', '682001', '01015266031', 'ahmed el sawy- nasr city, building 50-apartment11', 'customer', 'photo-1617127365659-c47fa864d8bc.jfif', NULL, NULL),
(30, 'shehab', 'shehab@gmail.com', '123', '123', 'shrouk', 'customer', 'images.jfif', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
