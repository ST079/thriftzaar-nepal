-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2026 at 03:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thriftzaar`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_name` text DEFAULT NULL,
  `c_photo` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `c_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_photo`, `parent_id`, `c_description`) VALUES
(1, 'Men', '[{\"src\":\"uploads/1770789311-313704.jpg\",\"thumb\":\"uploads/1770789311-313704.jpg\"}]', 0, 'Second Hand Clothing For Men'),
(2, 'Women', '[{\"src\":\"uploads/1770789527-738804.jpg\",\"thumb\":\"uploads/1770789527-738804.jpg\"}]', 0, 'Second Hand Clothing For Women'),
(3, 'Kids', '[{\"src\":\"uploads/1770789575-571524.jpg\",\"thumb\":\"uploads/1770789575-571524.jpg\"}]', 0, 'Kids Second Hand Clothings');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shipping` text DEFAULT NULL,
  `cart` text NOT NULL,
  `user` int(11) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` text DEFAULT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `description` text NOT NULL,
  `photos` text NOT NULL,
  `c_id` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `buying_price`, `selling_price`, `description`, `photos`, `c_id`, `user_id`) VALUES
(6, 'Corduroy vintage jacket', 2500, 3000, 'Bust=46\r\nLength=27', '[{\"src\":\"uploads/1770802135-166057.jpeg\",\"thumb\":\"uploads/thumb_1770802135-166057.jpeg\"},{\"src\":\"uploads/1770802135-473735.jpeg\",\"thumb\":\"uploads/thumb_1770802135-473735.jpeg\"},{\"src\":\"uploads/1770802135-757518.jpeg\",\"thumb\":\"uploads/thumb_1770802135-757518.jpeg\"}]', 1, 1),
(7, 'Denim Jacket', 1000, 1500, 'Bust=38 | Length=25\r\n', '[{\"src\":\"uploads/1770802771-240671.jpeg\",\"thumb\":\"uploads/thumb_1770802771-240671.jpeg\"},{\"src\":\"uploads/1770802771-156372.jpeg\",\"thumb\":\"uploads/thumb_1770802771-156372.jpeg\"},{\"src\":\"uploads/1770802772-513264.jpeg\",\"thumb\":\"uploads/thumb_1770802772-513264.jpeg\"}]', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `password`, `phone_number`, `email`, `address`, `user_type`, `created`) VALUES
(1, 'Sujan', 'Tamang', '$2y$10$IlXRuA0tNrEpkpTYRf8/tuMIC0X/52lETtj56e3yfLm5l3Wjmaffy', '9762447050', 'suzanyba079@gmail.com', '', 'admin', '1770786500'),
(7, 'Kusum', 'Darlami', '$2y$10$2P1zjA6Hg.yk.EbljWs3XunGklD/YxI61iZoixaJuasFPZhF3N0Fy', '9749844496', 'darlamikusum040@gmail.com', '', 'customer', '1770979736');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
