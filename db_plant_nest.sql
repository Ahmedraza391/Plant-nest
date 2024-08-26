-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 05:28 PM
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
-- Database: `db_plant_nest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Ahmed Raza', 'ahmed@gmail.com', 'ahmed123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `plant_quantity` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_status` varchar(50) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Indoor Plants', 'available'),
(2, 'Outdoor Plants', 'available'),
(3, 'Plant Care', 'available'),
(4, 'Planting Guides', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `order_status` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plants`
--

CREATE TABLE `tbl_plants` (
  `id` int(11) NOT NULL,
  `plant_name` varchar(200) NOT NULL,
  `plant_description` text NOT NULL,
  `plant_image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `plant_status` varchar(30) NOT NULL DEFAULT 'available',
  `disabled_status` varchar(30) NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_plants`
--

INSERT INTO `tbl_plants` (`id`, `plant_name`, `plant_description`, `plant_image`, `category_id`, `plant_status`, `disabled_status`) VALUES
(1, 'Aloe Vera', 'Aloe Vera is a Good Plant For Indoor. Aloe Vera is a Good Plant For Indoor. Aloe Vera is a Good Plant For Indoor. Aloe Vera is a Good Plant For Indoor. Aloe Vera is a Good Plant For Indoor. Aloe Vera is a Good Plant For Indoor. ', 'uploads/plants/Aloe Vera/66cb1d6552644.jpeg', 1, 'available', 'enabled'),
(2, 'Spider Plant', 'Spider Plant Spider Plant Spider Plant Spider Plant Spider Plant Spider Plant Spider Plant Spider Plant Spider Plant ', 'uploads/plants/Spider Plant/66cb219ccb8f7.jpg', 1, 'available', 'enabled'),
(3, 'Snake Plant', 'Snake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake PlantSnake Plant', 'uploads/plants/Snake Plant/66cb21ac49fa2.png', 2, 'available', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(500) NOT NULL,
  `slider_image` text NOT NULL,
  `slider_status` varchar(30) NOT NULL DEFAULT 'activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `slider_title`, `slider_image`, `slider_status`) VALUES
(1, 'Discover Plants In Our Site.', 'uploads/slider//66cc55a232154.jpg', 'activate'),
(2, 'Without Plants Life Is Nothing.', 'uploads/slider//66cc55712de70.jpg', 'activate');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_image` text NOT NULL,
  `user_status` varchar(30) NOT NULL DEFAULT 'deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_status`) VALUES
(1, 'Ahmed Raza', 'ahmedjutt@gmail.com', 'ahmed123', 'uploads/users/ahmedjutt@gmail.com/66cc346505100.jpg', 'deactivate'),
(2, 'Muhammad Minhal Khan', 'minhal@gmail.com', 'minhal123', 'uploads/users/minhal@gmail.com/66cc36cfed514.png', 'deactivate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_plants`
--
ALTER TABLE `tbl_plants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_plants`
--
ALTER TABLE `tbl_plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
