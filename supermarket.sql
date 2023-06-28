-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 12:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `description`, `price`, `img_url`, `manufacturer`, `quantity`) VALUES
(13, 'Maggi', 'Indian Style noodles for everyone', 25, 'images/maggi.jpg', 'Nestle', 20),
(14, 'Oreo', 'Cream Biscuits', 30, 'images/oreo.jpeg', 'Mondelez International', 5),
(15, 'Kurkure', 'Masala Munch', 10, 'images/kurkure.jpg', 'PepsiCo India', 30),
(16, 'Doritos', 'Nachos for the bold', 20, 'images/doritos.jpeg', 'PepsiCo India', 30),
(17, 'Cheetos', 'The childhood snack returns', 10, 'images/cheetos.png', 'PepsiCo India', 30),
(18, 'Bikaneri Bhujia', 'Spicy slims right from Bikaner', 10, 'images/bikaneri.webp', 'Samrat', 30),
(20, 'Cream &amp; Onion Wafers', 'Spicy Onion and Sour cream in one pack', 10, 'images/balaji.jpg', 'Balaji Wafers', 30);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`product_id`, `price`, `quantity`, `order_id`) VALUES
(13, 25, 1, 1),
(14, 30, 1, 1),
(15, 10, 4, 1),
(16, 20, 4, 1),
(13, 25, 1, 2),
(14, 30, 1, 2),
(15, 10, 4, 2),
(16, 20, 4, 2),
(13, 25, 1, 3),
(14, 30, 1, 3),
(15, 10, 1, 3),
(20, 10, 1, 3),
(13, 25, 1, 4),
(14, 30, 1, 4),
(15, 10, 1, 4),
(20, 10, 1, 4),
(17, 10, 1, 4),
(18, 10, 1, 4),
(13, 25, 1, 5),
(14, 30, 1, 5),
(15, 10, 1, 5),
(20, 10, 1, 5),
(17, 10, 1, 5),
(18, 10, 1, 5),
(16, 20, 1, 5),
(15, 10, 1, 6),
(20, 10, 1, 6),
(17, 10, 1, 6),
(18, 10, 1, 6),
(16, 20, 1, 6),
(13, 25, 7, 6),
(14, 30, 10, 6),
(15, 10, 1, 7),
(20, 10, 1, 7),
(17, 10, 1, 7),
(18, 10, 1, 7),
(16, 20, 1, 7),
(13, 25, 7, 7),
(14, 30, 10, 7),
(15, 10, 19, 8),
(14, 30, 9, 8),
(13, 25, 6, 8),
(17, 10, 5, 8),
(13, 25, 20, 10),
(14, 30, 2, 10),
(17, 10, 6, 10),
(13, 25, 8, 11),
(14, 30, 3, 11),
(16, 20, 4, 11),
(15, 10, 1, 12),
(15, 10, 1, 13),
(18, 10, 1, 13),
(17, 10, 1, 13),
(15, 10, 1, 14),
(18, 10, 1, 14),
(17, 10, 1, 14),
(15, 10, 1, 15),
(18, 10, 1, 15),
(17, 10, 1, 15),
(14, 30, 1, 16),
(18, 10, 1, 16),
(17, 10, 1, 16),
(20, 10, 1, 16),
(13, 25, 5, 17),
(14, 30, 1, 17),
(15, 10, 3, 17),
(18, 10, 1, 18),
(13, 25, 1, 19),
(17, 10, 1, 19),
(14, 30, 1, 20),
(15, 10, 1, 20),
(16, 20, 4, 20),
(13, 25, 10, 21),
(14, 30, 29, 21),
(15, 10, 19, 21),
(16, 20, 10, 21),
(13, 25, 24, 22),
(17, 10, 4, 22),
(13, 25, 1, 23),
(14, 30, 5, 23),
(14, 30, 1, 24),
(15, 10, 1, 24),
(13, 25, 4, 24),
(13, 25, 1, 25),
(14, 30, 1, 25),
(15, 10, 5, 25),
(13, 25, 1, 26),
(13, 25, 1, 27),
(13, 25, 1, 28),
(14, 30, 1, 28),
(15, 10, 1, 28),
(16, 20, 1, 28),
(15, 10, 1, 29),
(13, 25, 1, 30),
(15, 10, 1, 31),
(14, 30, 2, 31),
(13, 25, 10, 32),
(14, 30, 4, 32),
(15, 10, 4, 32),
(13, 25, 10, 33),
(14, 30, 20, 33),
(13, 25, 5, 34),
(14, 30, 5, 34);

-- --------------------------------------------------------

--
-- Table structure for table `order_summary`
--

CREATE TABLE `order_summary` (
  `order_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_summary`
--

INSERT INTO `order_summary` (`order_id`, `order_time`, `user_id`) VALUES
(1, '2023-05-06 08:34:11', 2),
(2, '2023-05-09 18:49:40', 1),
(3, '2023-05-13 14:08:51', 1),
(4, '2023-05-13 14:11:46', 1),
(5, '2023-05-13 14:12:35', 1),
(6, '2023-05-13 15:11:37', 1),
(7, '2023-05-13 15:23:38', 8),
(8, '2023-05-13 15:50:41', 8),
(9, '2023-05-20 18:29:17', 1),
(10, '2023-05-20 18:33:30', 1),
(11, '2023-05-20 18:56:18', 1),
(12, '2023-05-20 19:08:22', 1),
(13, '2023-05-20 19:11:33', 1),
(14, '2023-05-20 19:16:09', 1),
(15, '2023-05-20 19:17:42', 1),
(16, '2023-05-20 22:09:07', 2),
(17, '2023-05-21 16:11:34', 1),
(18, '2023-05-21 16:13:02', 1),
(19, '2023-05-21 16:15:44', 1),
(20, '2023-05-21 16:22:40', 1),
(21, '2023-05-22 09:08:58', 10),
(22, '2023-05-22 23:14:45', 1),
(23, '2023-05-22 23:36:22', 1),
(24, '2023-05-23 14:27:50', 11),
(25, '2023-05-23 15:16:45', 1),
(26, '2023-06-03 18:34:47', 1),
(27, '2023-06-03 19:25:07', 1),
(28, '2023-06-05 17:30:13', 1),
(29, '2023-06-05 17:41:38', 1),
(30, '2023-06-05 17:41:59', 1),
(31, '2023-06-05 18:03:59', 1),
(32, '2023-06-05 18:15:57', 1),
(33, '2023-06-06 10:19:22', 13),
(34, '2023-06-06 23:00:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(5) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `password`) VALUES
(1, 'sanket', '$2y$10$2ksoGF0FmwafpDY.AjbIY.6CM8Ou26277U0a/p7Hc4rXfbdizXyxi'),
(2, 'harshpal', '$2y$10$FZkzbciHpyOBYohHgI9iuOEnioCRJv.9vjD9s/WYi.6qKSyFD8vEa'),
(3, 'dummy', '$2y$10$o.pD0Qv4V5WlrDGbNo5UN.tnpaPs9ZkN74drFWfRU1Hq6zpnnbZYi'),
(4, 'dummy2', '$2y$10$OYmAwX3efpYucXQ91A/GLOuZLvQn/78xT9JHjIuH3KbTKl2Nv2wKq'),
(5, 'sanket1', '$2y$10$RQKmDsBmWYs/EkOnFQlSZejbniGBRnSFoSSHMKCuEqFKLDGiwNYbO'),
(6, '&lt;a href=&#039;https://www.google.com&gt;Google&lt;/a&gt;', '$2y$10$uUFjJeMm4fI1E16IKY4Iu.H5PKBRGsnjXEk8nlgaxgvkpVE2Y9FIu'),
(7, '&lt;a href=&#039;https://www.google.com&#039;&gt;Google&lt;/', '$2y$10$KbyJxidEgMwpuVd00K.LHuZwAIo91mkIufVbo8s1IPKnOsG8Z0PUW'),
(8, 'heet', '$2y$10$3g.Q6JJ2.ZIXuM1v6VnYfuZFzSy55jbKVN2DhZcjnBKAyI7ZUv95W'),
(9, 'sa', '$2y$10$EyaQZcpxJV2UsI1WWcZli.byyg3FB3tRPOShoZmOXsyCjwAUivXO.'),
(10, 'harry', '$2y$10$MLz2My.O6guTHPzUYxrnm.3FFN5VJ0hgdzu8JvwARNuk6YWIs/yGS'),
(11, 'rushang', '$2y$10$bfTsmqRP5YG.2DYU3MJB0ets6TWMBqesztdsN8KHXPBl9raZ9MHDW'),
(12, 'abcd123', '$2y$10$GHKve6P3Tm7QMgvwD/XY8OwOka8RfF5IWOYW.KPlwn74NElEMxM3e'),
(13, 'abcd1234', '$2y$10$rSfQFgdbQTnNKTBdrYAx7OixZuALM4kj.20engU6Gty/n8KCV8Jky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_summary`
--
ALTER TABLE `order_summary`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_summary`
--
ALTER TABLE `order_summary`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `ordered_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `inventory` (`id`),
  ADD CONSTRAINT `ordered_products_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_summary` (`order_id`);

--
-- Constraints for table `order_summary`
--
ALTER TABLE `order_summary`
  ADD CONSTRAINT `order_summary_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
