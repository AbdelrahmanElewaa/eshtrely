-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 06:21 PM
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
  `senderName` varchar(100) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `sender`, `senderName`, `receiver`, `message`, `createdAt`) VALUES
(104, 56, 'Haidy', 47, 'Dont do that admin', '2022-01-14 06:55:33am'),
(105, 0, 'admin', 47, 'i am here ', '2022-01-14 07:11:54am'),
(106, 0, 'admin', 47, 'hello', '2022-01-14 07:14:18am'),
(107, 47, 'Ali Khaled Abdelmonem Elewa', 0, 'hello', '2022-01-14 07:18:54am'),
(108, 56, 'Haidy', 47, 'yes', '2022-01-14 07:22:02am'),
(109, 56, 'Haidy', 44, 'I request a penalty for the admin', '2022-01-14 07:43:45am'),
(110, 44, 'abdelrahman', 56, 'Ok i will do it', '2022-01-14 07:48:07am'),
(111, -1, '', 27, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', '2022-01-14 07:56:08am'),
(112, 56, 'Haidy', 44, 'Add another penalty', '2022-01-14 07:56:54am'),
(113, -1, '', 27, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', '2022-01-14 08:04:04am'),
(114, 0, 'admin', 58, 'hi', '2022-01-14 08:27:59am'),
(115, 56, 'Haidy', 58, 'answer admin', '2022-01-14 08:30:43am'),
(116, 56, 'Haidy', 44, 'make a penalty', '2022-01-14 08:30:58am'),
(117, 59, 'Khaled Elewa', 0, 'ya admin ana 3aiz 3arabya', '2022-01-14 08:52:01am'),
(118, 0, 'admin', 59, 'la mafesh 3arabia', '2022-01-14 08:52:47am'),
(119, 56, 'farah', 59, 'mynf3sh t2oul kda ya admin', '2022-01-14 08:55:29am'),
(120, 56, 'farah', 44, 'e3ml 3ekab lel admin', '2022-01-14 08:55:44am'),
(121, -1, '', 27, 'Dear Admin you have got a penalty due to your behaviour with the customer .. Please Go to The HR department!!!', '2022-01-14 08:56:22am');

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
('KitKat Chocolate', '10', 4.00, 'kitkat.jpg', 0.0, 191, 'food'),
('Pepsi Can', '11', 5.00, 'pepsican.jpg', 0.0, 247, 'food'),
('Coca Cola 2.5L Bottle', '12', 10.00, 'coke2l.jpg', 0.0, 149, 'food'),
('Snickers', '13', 4.00, 'snickers.jpg', 0.0, 197, 'food'),
('Pepsi 2L Bottle', '14', 10.00, 'pepsi2l.jpeg', 0.0, 150, 'food'),
('Chile Limon Chips', '15', 15.00, 'chilelimonchips.jpeg', 0.0, 199, 'food'),
('Liverpool Nike T-Shirt', '16', 200.00, 'liverpoolshirt.jpg', 0.0, 146, 'fashion'),
('Black Nike T-Shirt', '17', 250.00, 'nikeblackshirt.jpg', 0.0, 149, 'fashion'),
('Nike Black Sweatpants', '18', 150.00, 'nikeblackpants.jpg', 0.0, 239, 'fashion'),
('Nike Green Sweatpants', '19', 150.00, 'nikegreenpants.jpg', 0.0, 199, 'fashion'),
('Galaxy Chocolate', '5', 4.00, 'galaxy.jpg', 0.0, 300, 'food'),
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
(44, 'abdelrahman', 'abdo@gmail.com', '1234', '01154600033', 'haroun', 'HR', 'diseno-logotipo-o-icono-palmera-estilo-vintage-silueta-palma-sol-rojo-sobre-fondo-ilustracion-minimalista_148087-210.jpg', NULL, NULL),
(47, 'Ali Khaled Abdelmonem Elewa', 'ali@gmail.com', '1234', '11111111111111', 'shrouk', 'customer', 'download (4).jpg', NULL, NULL),
(56, 'farah', 'haidy@gmail.com', '1234', '02222222222', 'nasr city', 'auditor', 'Hermann_Park_Japanese_Garden_Baby_Portrait_Session_Greyson_serendipity_58.jpg', NULL, NULL),
(59, 'Khaled Elewa', 'khaled@gmail.com', '1234', '01211573638', 'shrouk', 'customer', 'download (1).jpg', NULL, NULL);

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
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
