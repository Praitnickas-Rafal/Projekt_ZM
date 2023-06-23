-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` enum('Dobry','Zły') NOT NULL,
  `comment` text NOT NULL,
  `date_added` datetime NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `name`, `feedback`, `comment`, `date_added`, `parent_comment_id`) VALUES
(5, 5, 'Valdemar', 'Dobry', '544524', '2023-06-23 13:13:17', NULL),
(6, 5, 'Valdemar', 'Dobry', '5656', '2023-06-23 13:13:50', NULL),
(7, 5, 'Valdemar', 'Dobry', '5656', '2023-06-23 13:14:40', NULL),
(8, 5, 'Valdemar', 'Zły', 'Na stronie nie ma funkcjanolsci', '2023-06-23 13:15:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image_path`) VALUES
(5, 'Deska Terasowa 95x25x600', 1505.00, '../productsDeska-konstrukcyjna-100-40-3-m_[3545]_550.jpg'),
(6, 'Deska Budowlana 90x25x600', 150.00, 'products/Deska-konstrukcyjna-100-40-3-m_[3545]_550.jpg'),
(8, 'Deska Terasowa 85x30x300', 95.00, 'products/Deska-konstrukcyjna-100-40-3-m_[3545]_550.jpg'),
(12, 'Obraz', 155.00, '../productsListek zamyslu.jpg'),
(14, 'Ryba', 120.00, '../productsZawistnuc w prostym.jpg'),
(15, 'Ryba', 120.00, '../productsLusterko wieczoru.jpg'),
(16, 'IT Conquerors Team', 1500.00, '../productsrugiapjūtis.jpg'),
(18, 'Deska ', 1500.00, '../productsdeska.png'),
(19, 'Brus 50x50x600', 1500.00, '../productsproduct1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'Rafal Praitnickas', 'vrspraitnickas2@gmail.com', '8fa675eb2fcec5b95d9d21c670da7f30', 'user'),
(2, 'tyty', 'vrspraitnickas23@gmail.com', '4f22a4b4bcbe105cc8a7bbeb24eaa0dc', 'user'),
(4, 'Mariusz', 'to@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(5, 'Valdemar', 'valdemar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_comment_id` (`parent_comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`parent_comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
