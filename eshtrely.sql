-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 11:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
('laptop dell', '1', 400.00, 'dell.jpg', 0.0, 50, 'electronics'),
('nike shoes', '2', 200.00, 'nike.jpg', 0.0, 20, 'fashion'),
('tomato chips', '3', 15.00, 'tomatochips.jpg', 0.0, 100, 'food');

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
(24, 'Hady Wael ', 'hadywk@gmail.com', '1234', '01151665100', 'nasr city', 'customer', 'background.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
