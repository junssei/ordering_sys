-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 06:51 PM
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
-- Database: `bigcasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'junevincent', '$2y$10$IEjkwtYR1Pm9sCcTeSaf2u1H5TU0irJPPZgCzpnVUSQ8xGH3/mnb6', 'June Vincent', 'Fernandez', 'junevincentmagsayofernandez@gmail.com', 'unassigned', '2024-12-27 07:39:21', '2024-12-27 07:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(255) NOT NULL,
  `ctg_desc` varchar(255) DEFAULT NULL,
  `ctg_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctg_id`, `ctg_name`, `ctg_desc`, `ctg_img`, `created_at`, `updated_at`) VALUES
(1, 'Canned Goods', 'Sardines, Meat Loaf, Corned Beef.', 'Property 1=canned.svg', '2024-12-25 16:00:00', '2024-12-28 19:25:33'),
(2, 'Beverages', 'Soft drinks, Bottled water, Juices, Coffee & Tea, Alcohol drinks', 'Property 1=beverage.svg', '2024-12-25 16:00:00', '2025-01-01 08:45:41'),
(3, 'Household', 'Cleaning Materials, Toiletries, Paper Products ', 'Property 1=cleaning.svg', '2024-12-25 16:00:00', '2024-12-28 17:56:19'),
(4, 'Condiments', 'Soy sauce, Vinegar, Cooking Oil', 'Property 1=condiments.svg', '2024-12-25 16:00:00', '2024-12-28 19:21:01'),
(5, 'Miscellaneous', 'Batteries, Light Bulbs, Umbrellas', 'Property 1=misc.svg', '2024-12-25 16:00:00', '2024-12-28 17:58:12'),
(6, 'Baby Products', 'Baby Food, Diapers, Baby Wipes\r\n', 'Property 1=baby.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:10'),
(7, 'Snacks', 'Chips, Biscuits, Chocolates', 'Property 1=snack.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:36'),
(8, 'School Supplies', ' Pencils, Paper, Glue, etc', 'Property 1=school.svg', '2024-12-28 18:00:14', '2025-01-01 09:06:20'),
(9, 'Candies', 'Chocolate, Mint, Sour Candies', 'candies.svg', '2024-12-30 07:46:13', '2024-12-30 07:46:13'),
(10, 'Groceries', '', 'groceries.svg', '2024-12-31 10:52:46', '2025-01-01 08:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `stock` int(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_brand` varchar(255) NOT NULL,
  `prd_desc` varchar(255) DEFAULT NULL,
  `prd_baseprice` double(11,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subctg_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `prdvrt_id` int(11) NOT NULL,
  `prdvrt_name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `sku` varchar(155) DEFAULT NULL,
  `prdvrt_img` varchar(255) DEFAULT NULL,
  `prd_id` int(11) NOT NULL,
  `vrt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subctg_id` int(11) NOT NULL,
  `subctg_name` varchar(255) NOT NULL,
  `subctg_desc` varchar(255) DEFAULT NULL,
  `subctg_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ctg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subctg_id`, `subctg_name`, `subctg_desc`, `subctg_img`, `created_at`, `updated_at`, `ctg_id`) VALUES
(2, 'Sardines', 'All Sardines Canned Goods.', 'Phosphor icons.svg', '2024-12-28 04:24:35', '2024-12-28 19:18:58', 1),
(3, 'Meat Loaf', 'All Meat Loaf Canned Goods. ', 'meatcanned.svg', '2024-12-28 08:21:19', '2024-12-28 17:24:20', 1),
(7, 'Tuna', '', 'Property 1=image 15.svg', '2024-12-28 18:05:35', '2024-12-28 18:05:35', 1),
(11, 'Corned Beef', '', 'Property 1=image 16.svg', '2024-12-29 00:21:43', '2024-12-29 00:21:43', 1),
(12, 'Water Bottled', '', 'waterbottled.svg', '2024-12-29 00:21:57', '2024-12-29 16:12:44', 2),
(13, 'Soft Drinks', '', 'softdrinks.svg', '2024-12-29 00:22:09', '2024-12-29 00:22:09', 2),
(14, 'Chocolate', '', 'Property 1=image 23.svg', '2024-12-30 11:55:45', '2024-12-31 11:08:34', 9),
(15, 'Hard Candies', 'Lollipops, Peppermint Candies, Fruit-Flavored Hard Candies', 'Property 1=image 22.svg', '2024-12-31 07:12:42', '2024-12-31 11:08:29', 9),
(16, 'Egg', 'Chicken Egg, Salted Egg, Quail Egg', 'egg.svg', '2024-12-31 10:59:20', '2024-12-31 10:59:29', 10),
(19, 'Diapers', 'Diapers', 'diapers.svg', '2024-12-31 11:50:04', '2025-01-01 09:10:36', 6);

-- --------------------------------------------------------

--
-- Table structure for table `variation`
--

CREATE TABLE `variation` (
  `vrt_id` int(11) NOT NULL,
  `vrt_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variation`
--

INSERT INTO `variation` (`vrt_id`, `vrt_name`, `created_at`, `updated_at`) VALUES
(5, 'Egg Size', '2024-12-31 10:42:10', '2024-12-31 11:51:11'),
(6, 'Color', '2024-12-31 10:44:31', '2024-12-31 10:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `variation_option`
--

CREATE TABLE `variation_option` (
  `vrtopt_id` int(11) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `vrt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `variation_option`
--

INSERT INTO `variation_option` (`vrtopt_id`, `option_value`, `created_at`, `updated_at`, `vrt_id`) VALUES
(1, 'Peewee', '2024-12-31 10:43:04', '2024-12-31 10:43:45', 5),
(2, 'Super Jumbo', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(3, 'Jumbo', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(4, 'Extra Large', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(5, 'Large', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(6, 'Medium', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(7, 'Small', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(8, 'Extra Small', '2024-12-31 10:43:45', '2024-12-31 10:43:45', 5),
(9, 'Orange', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(10, 'Blue', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(11, 'Red', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(12, 'Yellow', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(13, 'Green', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(14, 'White', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6),
(15, 'Black', '2024-12-31 10:44:53', '2024-12-31 10:44:53', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `product_ibfk_1` (`subctg_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`prdvrt_id`),
  ADD KEY `prd_id` (`prd_id`),
  ADD KEY `vrt_id` (`vrt_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subctg_id`),
  ADD KEY `ctg_id` (`ctg_id`);

--
-- Indexes for table `variation`
--
ALTER TABLE `variation`
  ADD PRIMARY KEY (`vrt_id`);

--
-- Indexes for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD PRIMARY KEY (`vrtopt_id`),
  ADD KEY `variation_option_ibfk_1` (`vrt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `prdvrt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `variation`
--
ALTER TABLE `variation`
  MODIFY `vrt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `variation_option`
--
ALTER TABLE `variation_option`
  MODIFY `vrtopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`),
  ADD CONSTRAINT `product_variation_ibfk_2` FOREIGN KEY (`vrt_id`) REFERENCES `variation` (`vrt_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`ctg_id`) REFERENCES `category` (`ctg_id`);

--
-- Constraints for table `variation_option`
--
ALTER TABLE `variation_option`
  ADD CONSTRAINT `variation_option_ibfk_1` FOREIGN KEY (`vrt_id`) REFERENCES `variation` (`vrt_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
