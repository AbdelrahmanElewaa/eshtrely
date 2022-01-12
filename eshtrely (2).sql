-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 10:45 PM
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
('Laptop Dell', '1', 400.00, 'dell.jpg', 0.0, 47, 'electronics'),
('KitKat Chocolate', '10', 4.00, 'kitkat.jpg', 0.0, 191, 'food'),
('Pepsi Can', '11', 5.00, 'pepsican.jpg', 0.0, 247, 'food'),
('Coca Cola 2L Bottle', '12', 10.00, 'coke2l.jpg', 0.0, 149, 'food'),
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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` int(100) NOT NULL,
  `userid` int(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `userimage` varchar(55) NOT NULL,
  `productid` int(100) NOT NULL,
  `reviewdate` varchar(100) NOT NULL,
  `review` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewid`, `userid`, `username`, `userimage`, `productid`, `reviewdate`, `review`) VALUES
(9, 29, 'Ahmed Sameh', 'photo-1617127365659-c47fa864d8bc.jfif', 11, 'Sunday 9th of January 2022 02:08:53 PM', 'ent3a4'),
(11, 30, 'shehab', 'images.jfif', 11, 'Sunday 9th of January 2022 02:23:16 PM', 'refreshing'),
(0, 27, 'admin', 'Balloteli.jpg', 12, 'Tuesday 11th of January 2022 10:08:27 PM', 'to7fa');

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
(27, 'admin', 'admin@gmail.com', '1234', '000000000000', 'shrouk', 'admin', 'Balloteli.jpg', NULL, NULL),
(29, 'amr Khaled Abdelmonem Elewa', 'amr@gmail.com', '1234', '1234', 'nasr city', 'admin', '4K-Ultra-HD-Wallpaper-680x500.jpg', NULL, NULL),
(36, 'Omar Mohamed', 'omar@gmail.com', '1234', '01154600033', 'shrouk', 'admin', '73-733145_nike-shoes-live-wallpaper-nike-shoes-hd-wallpaper.jpg', NULL, NULL),
(44, 'abdelrahman', 'abdo@gmail.com', '1234', '01154600033', 'haroun', 'customer', 'diseno-logotipo-o-icono-palmera-estilo-vintage-silueta-palma-sol-rojo-sobre-fondo-ilustracion-minimalista_148087-210.jpg', NULL, NULL),
(47, 'Ali Khaled Abdelmonem Elewa', 'ali@gmail.com', '1234', '11111111111111', 'shrouk', 'customer', 'download (4).jpg', NULL, NULL),
(54, ' Shehab ', 'Shehab@gmail.com', '1234', '00000000', ' ssss', 'admin', '948504_17063453.jpg', NULL, NULL),
(55, 'bekas', 'bekas@gmail.com', '1234', '01154600033', 'nasr', 'customer', 'MAC_VisitaVirtuale_sala4_1.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

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
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
