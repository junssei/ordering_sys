-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 01:07 AM
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
(2, 'Beverages', 'Soft drinks, Bottled water, Juices, Coffee & Tea, Alcohol drinks', 'Property 1=beverage.svg', '2024-12-25 16:00:00', '2024-12-28 19:29:02'),
(3, 'Household', 'Cleaning Materials, Toiletries, Paper Products ', 'Property 1=cleaning.svg', '2024-12-25 16:00:00', '2024-12-28 17:56:19'),
(4, 'Condiments', 'Soy sauce, Vinegar, Cooking Oil', 'Property 1=condiments.svg', '2024-12-25 16:00:00', '2024-12-28 19:21:01'),
(5, 'Miscellaneous', 'Batteries, Light Bulbs, Umbrellas', 'Property 1=misc.svg', '2024-12-25 16:00:00', '2024-12-28 17:58:12'),
(6, 'Baby Products', 'Baby Food, Diapers, Baby Wipes\r\n', 'Property 1=baby.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:10'),
(7, 'Snacks', 'Chips, Biscuits, Chocolates', 'Property 1=snack.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:36'),
(8, 'School Supplies', '  ', 'Property 1=school.svg', '2024-12-28 18:00:14', '2024-12-28 18:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `stock` int(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `variation_id` int(11) NOT NULL
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
  `prd_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subctg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `variation_id` int(11) NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `sku` varchar(155) DEFAULT NULL,
  `prd_id` int(11) NOT NULL
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
(8, 'Corned Beef', '  ', 'Property 1=image 16.svg', '2024-12-28 18:05:53', '2024-12-28 18:06:12', 1),
(9, 'Bottled Water', '', 'waterbottled.svg', '2024-12-28 19:28:31', '2024-12-28 19:28:31', 2),
(10, 'Soft drinks', '', 'softdrinks.svg', '2024-12-28 19:30:31', '2024-12-28 19:30:31', 2);

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
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `product_ibfk_1` (`subctg_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `prd_id` (`prd_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subctg_id`),
  ADD KEY `ctg_id` (`ctg_id`);

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
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`);

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_ibfk_1` FOREIGN KEY (`prd_id`) REFERENCES `product` (`prd_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`ctg_id`) REFERENCES `category` (`ctg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
