-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2026 at 03:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(3, 'Kids', '[{\"src\":\"uploads/1770789575-571524.jpg\",\"thumb\":\"uploads/1770789575-571524.jpg\"}]', 0, 'Kids Second Hand Clothings'),
(7, 'Sweatshirts', '[{\"src\":\"uploads/1771328712-834201.jpg\",\"thumb\":\"uploads/thumb_1771328712-834201.jpg\"}]', 1, 'Second Hand Good Quality Sweatshirts For men.');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `i_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`i_id`, `name`, `email`, `phone`, `subject`, `message`, `ip`, `created_at`, `user_id`) VALUES
(22, 'Tamekah Hood', 'leteqiluxu@mailinator.com', '+1 (948) 607-7936', 'In est nemo eos omn', 'Asperiores rerum ut', '::1', '2026-04-01 10:19:39', 12),
(23, 'Haley Foley', 'cekafa@mailinator.com', '+1 (996) 898-4544', 'Nisi minus anim obca', 'Est est ut rem lauda', '127.0.0.1', '2026-04-01 10:30:43', 11);

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
  `order_time` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `shipping`, `cart`, `order_time`, `total_price`) VALUES
(28, 18, 0, '{\"first_name\":\"Hari\",\"last_name\":\"Tamang\",\"email\":\"hari@gmail.com\",\"phone_number\":\"9749844496\",\"address\":\"Bhaktapur\"}', '{\"6\":{\"p_id\":\"6\",\"p_name\":\"Corduroy vintage jacket\",\"buying_price\":\"2500\",\"selling_price\":\"3000\",\"description\":\"Bust=46\\r\\nLength=27\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\/1770802135-166057.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802135-166057.jpeg\\\"},{\\\"src\\\":\\\"uploads\\/1770802135-473735.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802135-473735.jpeg\\\"},{\\\"src\\\":\\\"uploads\\/1770802135-757518.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802135-757518.jpeg\\\"}]\",\"c_id\":\"1\",\"user_id\":\"1\",\"c_name\":\"Men\",\"c_photo\":\"[{\\\"src\\\":\\\"uploads\\/1770789311-313704.jpg\\\",\\\"thumb\\\":\\\"uploads\\/1770789311-313704.jpg\\\"}]\",\"parent_id\":\"0\",\"c_description\":\"Second Hand Clothing For Men\",\"quantity\":1}}', '1774847741', 3100),
(29, 12, -1, '{\"first_name\":\"Kusum\",\"last_name\":\"Magar\",\"email\":\"user@gmail.com\",\"phone_number\":\"9749844496\",\"address\":\"Bhaktapur\"}', '{\"13\":{\"p_id\":\"13\",\"p_name\":\"Blazer\",\"buying_price\":\"1000\",\"selling_price\":\"1500\",\"description\":\"Bust=42, Length=30\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\\\\\/1771328457-194819.jpg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1771328457-194819.jpg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1771328457-526574.jpg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1771328457-526574.jpg\\\"},{\\\"src\\\":\\\"uploads\\\\\\/1771328457-387813.jpg\\\",\\\"thumb\\\":\\\"uploads\\\\\\/thumb_1771328457-387813.jpg\\\"}]\",\"c_id\":\"2\",\"user_id\":\"11\",\"c_name\":\"Women\",\"c_photo\":\"[{\\\"src\\\":\\\"uploads\\/1770789527-738804.jpg\\\",\\\"thumb\\\":\\\"uploads\\/1770789527-738804.jpg\\\"}]\",\"parent_id\":\"0\",\"c_description\":\"Second Hand Clothing For Women\",\"quantity\":1}}', '1774856967', 1600),
(30, 12, -1, '{\"first_name\":\"Kusum\",\"last_name\":\"Magar\",\"email\":\"user@gmail.com\",\"phone_number\":\"9749844496\",\"address\":\"Bhaktapur\"}', '{\"7\":{\"p_id\":\"7\",\"p_name\":\"Denim Jacket\",\"buying_price\":\"1000\",\"selling_price\":\"1500\",\"description\":\"Bust=38 | Length=25\\r\\n\",\"photos\":\"[{\\\"src\\\":\\\"uploads\\/1770802771-240671.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802771-240671.jpeg\\\"},{\\\"src\\\":\\\"uploads\\/1770802771-156372.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802771-156372.jpeg\\\"},{\\\"src\\\":\\\"uploads\\/1770802772-513264.jpeg\\\",\\\"thumb\\\":\\\"uploads\\/thumb_1770802772-513264.jpeg\\\"}]\",\"c_id\":\"1\",\"user_id\":\"11\",\"c_name\":\"Men\",\"c_photo\":\"[{\\\"src\\\":\\\"uploads\\/1770789311-313704.jpg\\\",\\\"thumb\\\":\\\"uploads\\/1770789311-313704.jpg\\\"}]\",\"parent_id\":\"0\",\"c_description\":\"Second Hand Clothing For Men\",\"quantity\":1}}', '1774858690', 1600);

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
(7, 'Denim Jacket', 1000, 1500, 'Bust=38 | Length=25\r\n', '[{\"src\":\"uploads/1770802771-240671.jpeg\",\"thumb\":\"uploads/thumb_1770802771-240671.jpeg\"},{\"src\":\"uploads/1770802771-156372.jpeg\",\"thumb\":\"uploads/thumb_1770802771-156372.jpeg\"},{\"src\":\"uploads/1770802772-513264.jpeg\",\"thumb\":\"uploads/thumb_1770802772-513264.jpeg\"}]', 1, 11),
(13, 'Blazer', 1000, 1500, 'Bust=42, Length=30', '[{\"src\":\"uploads\\/1771328457-194819.jpg\",\"thumb\":\"uploads\\/thumb_1771328457-194819.jpg\"},{\"src\":\"uploads\\/1771328457-526574.jpg\",\"thumb\":\"uploads\\/thumb_1771328457-526574.jpg\"},{\"src\":\"uploads\\/1771328457-387813.jpg\",\"thumb\":\"uploads\\/thumb_1771328457-387813.jpg\"}]', 2, 11),
(14, 'Teenie Weenie Sweatshirt', 1000, 1300, 'Bust-48, length-27', '[{\"src\":\"uploads\\/1771328773-739418.jpg\",\"thumb\":\"uploads\\/thumb_1771328773-739418.jpg\"}]', 7, 11),
(16, 'Hooded Zipper Romper', 1000, 1200, 'Condition: 4.5/5,  size : 3-6 months', '[{\"src\":\"uploads\\/1771329638-345865.jpg\",\"thumb\":\"uploads\\/thumb_1771329638-345865.jpg\"}]', 3, 11);

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
  `address` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `password`, `phone_number`, `email`, `address`, `user_type`, `created`) VALUES
(11, 'ThriftZaar', 'Admin', '$2y$10$CXbo.8QFQwJR66qtJe5JauDrd0OJau5tixcSVasmJUu05XtWmZG66', '9762447050', 'admin@gmail.com', '', 'admin', '1771248289'),
(12, 'Kusum', 'Magar', '$2y$10$DlkMsbpM8G4G4s3w01snZOOCC5MJjYDCkjEWAvgplaG2m5/AcVPNq', '9749844496', 'user@gmail.com', '', 'customer', '1771333014'),
(25, 'Krishna', 'Tamang', '$2y$10$fvVS8ldTh6b0p2nCgiZHfePhij6huNKPVgGrmcL/ycE5cAUkFEFvK', '9749844496', 'krishna@gmail.com', NULL, 'customer', '1774856004'),
(26, 'Karuna', 'Tamang', '$2y$10$oor0Wl85SitGQ9cfyJLq8.qx6zv1KULNV8NelAGJtmXIY.iRDuvcG', '9749844496', 'karuna@gmail.com', NULL, 'customer', '1774856084');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`i_id`);

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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
