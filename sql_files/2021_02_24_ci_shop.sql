-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 01:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(255) DEFAULT NULL,
  `cat_url` varchar(255) DEFAULT NULL,
  `parent_cat_id` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_url`, `parent_cat_id`, `priority`) VALUES
(1, 'Many Guitars', 'many-guitars', NULL, NULL),
(2, 'Peaks', 'peaks', NULL, NULL),
(3, 'Guitarara', 'guitarara', NULL, NULL),
(4, 'sfdsdf', 'sfdsdf', NULL, NULL),
(5, 'Guitarar', 'guitarar', NULL, NULL),
(6, 'Guitarsss', 'guitarsss', NULL, NULL),
(7, 'asjkdgasd ', 'asjkdgasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(11) NOT NULL,
  `item_title` varchar(255) DEFAULT NULL,
  `item_url` varchar(255) DEFAULT NULL,
  `item_price` decimal(7,2) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `big_pic` varchar(255) DEFAULT NULL,
  `small_pic` varchar(255) DEFAULT NULL,
  `was_price` decimal(7,2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_title`, `item_url`, `item_price`, `item_description`, `big_pic`, `small_pic`, `was_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sdsdf', 'sdsdf', '500.00', '<p>sdfsdfdsf</p>', '1614143231_755673b499cb38eb892b.jpg', '1614143231_755673b499cb38eb892b.jpg', '0.00', 'active', '2021-02-23 05:09:26', '2021-02-23 23:07:12'),
(2, 'First Item Second Try', 'first-item-second-try', '1000.00', '<p>xc v xcvnmkx dfshjdkgf dfgh</p>', '1614165843_9ba622fc9bd9726bbc16.jpg', '1614165843_9ba622fc9bd9726bbc16.jpg', '850.00', 'active', '2021-02-23 05:32:52', '2021-02-24 05:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_colours`
--

CREATE TABLE `store_item_colours` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_item_colours`
--

INSERT INTO `store_item_colours` (`id`, `item_id`, `colour`) VALUES
(3, 2, 'Blue'),
(4, 2, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_sizes`
--

CREATE TABLE `store_item_sizes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_item_sizes`
--

INSERT INTO `store_item_sizes` (`id`, `item_id`, `size`) VALUES
(2, 2, 'xl'),
(3, 2, 'sm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_admin` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `photo`, `status`, `verification_code`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '$2y$10$aj4V6riHi891lNyy0rOxkO9YmRW2IT/E668L6VO/pIWbIPOivb292', NULL, 'active', NULL, 1, '2021-02-22 02:12:22', '2021-02-22 02:12:22'),
(2, 'Test', 'Verification', 'test.verification@gmail.com', '$2y$10$tQmzFDHhuVDoe35b2mrRiOB9CxRZniUaLP3TWX6OlU40qNa0W3dHu', NULL, NULL, '975e521d556a3d3df0f0ee7656f0b8de736f0c629ff1361e267e07d3dadb4c7e', 0, '2021-02-24 01:26:33', '2021-02-24 01:26:33'),
(3, 'James', 'Doe', 'james.doe@gmail.com', '$2y$10$ejZcUfeu6lF3lopvL5mKJeuZANSc/l2VYg2/CU/vCArlo3QLiesBS', NULL, NULL, '352498044770be2adac2305528af638cfbcc8e741fadefb41040f287e8fb0f9e', 0, '2021-02-24 04:28:19', '2021-02-24 04:28:19'),
(4, 'Jane', 'Doe', 'jane.doe@gmail.com', '$2y$10$v3IuntxdaQ4Oa0RFZ8ZwYuriN3bemCS4Lt9spaUm7BwNAKkIvG9yK', NULL, 'active', NULL, 0, '2021-02-24 04:29:13', '2021-02-24 04:36:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_colours`
--
ALTER TABLE `store_item_colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `store_item_colours`
--
ALTER TABLE `store_item_colours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_item_sizes`
--
ALTER TABLE `store_item_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
