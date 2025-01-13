-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2025 at 09:54 AM
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `unit_number` int(255) NOT NULL,
  `street_number` varchar(255) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'junevincent', '$2y$10$IEjkwtYR1Pm9sCcTeSaf2u1H5TU0irJPPZgCzpnVUSQ8xGH3/mnb6', 'June Vincent', 'Fernandez', 'junevincentmagsayofernandez@gmail.com', 'admin', '2024-12-27 07:39:21', '2024-12-27 07:39:21'),
(2, 'bigcas_admin', '$2y$10$eQ9QHoGc7byv2K504u6TwuAWoGL68g2PE5BCIcs5l0SCR1lYBJSFi', 'Jessa Mae', 'Bigcas', 'jessamaebigcas@gmail.com', 'admin', '2025-01-07 03:41:52', '2025-01-07 03:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`, `created_at`, `updated_at`) VALUES
(7, 'Size', '2025-01-01 18:41:27', '2025-01-01 18:52:16'),
(8, 'Colour', '2025-01-01 18:52:49', '2025-01-01 18:52:49'),
(9, 'Packaging', '2025-01-02 05:27:08', '2025-01-02 06:11:11'),
(10, 'Bottle Size', '2025-01-02 08:36:59', '2025-01-02 08:36:59'),
(11, 'Bottle Type', '2025-01-02 13:32:33', '2025-01-02 13:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_option`
--

CREATE TABLE `attributes_option` (
  `attributeopt_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `opt_value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attributes_option`
--

INSERT INTO `attributes_option` (`attributeopt_id`, `attribute_id`, `opt_value`, `created_at`, `updated_at`) VALUES
(16, 7, 'Large', '2025-01-01 18:49:28', '2025-01-04 09:12:33'),
(17, 7, 'Medium', '2025-01-01 18:49:28', '2025-01-04 09:12:33'),
(18, 7, 'Small', '2025-01-01 18:49:28', '2025-01-04 09:12:33'),
(19, 8, 'White', '2025-01-01 18:52:54', '2025-01-01 18:55:38'),
(20, 8, 'Black', '2025-01-01 18:52:54', '2025-01-01 18:55:38'),
(23, 8, 'Blue', '2025-01-01 18:54:58', '2025-01-01 18:55:38'),
(24, 8, 'Red', '2025-01-01 18:55:35', '2025-01-01 18:55:38'),
(27, 10, '2L', '2025-01-02 08:37:23', '2025-01-02 08:37:23'),
(28, 10, '1.5L', '2025-01-02 08:37:23', '2025-01-02 08:37:23'),
(29, 10, '1L', '2025-01-02 08:37:23', '2025-01-02 08:37:23'),
(30, 10, '500ml', '2025-01-02 08:37:23', '2025-01-02 08:37:23'),
(31, 10, '250ml', '2025-01-02 08:37:23', '2025-01-02 08:37:23'),
(32, 11, 'Canned', '2025-01-02 13:32:45', '2025-01-02 13:32:45'),
(33, 11, 'Plastic', '2025-01-02 13:32:45', '2025-01-02 13:32:45'),
(34, 11, 'Glass', '2025-01-02 13:32:45', '2025-01-02 13:32:45'),
(35, 9, 'Tray', '2025-01-03 21:10:50', '2025-01-03 21:10:50'),
(37, 7, 'Extra Large', '2025-01-04 09:12:33', '2025-01-04 09:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `customer_id`, `created_at`) VALUES
(1, 1, '2025-01-05 12:21:43'),
(2, 2, '2025-01-05 15:34:11'),
(3, 3, '2025-01-05 15:34:42'),
(4, 4, '2025-01-08 12:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `cart_id`, `product_id`, `variation_id`, `quantity`, `price`) VALUES
(39, 1, 2, 6, 2, 20.00),
(40, 1, 1, 2, 2, 20.00),
(41, 1, 1, 1, 1, 15.00),
(42, 1, 2, 4, 1, 10.00),
(43, 1, 3, 11, 1, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `firstname`, `lastname`, `address`, `email`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 'jibsy', '$2y$10$NxYaq4Zmehq6WRV0b7w0MOK3YM7Y0Ogn/gbaS3YbF5JcassezCiNa', 'June Vincent', 'Fernandez', '', 'junevincentmagsayofernandez@gmail.com', '', '', '2025-01-05 08:33:15', '2025-01-05 08:33:15'),
(2, 'jessa', '$2y$10$8TCj1fqliLqJmv6H7oDfj.jwHw8FdwHvhveV6gnml.PUMQeCh17VO', 'Jessa Mae', 'Bigcas', '', 'jessamaebigcas@gmail.com', '', '', '2025-01-05 15:32:47', '2025-01-05 15:32:47'),
(3, 'kiervy', '$2y$10$Q0LWCufyJRq6UDISLmieZOYBTws9vGnkV/0zO50XF7xd0b8hljr/K', 'Kiervy', 'Estole', '', 'kiervyestole@gmail.com', '', '', '2025-01-05 15:34:42', '2025-01-05 15:34:42'),
(4, 'junevincentfernandez', '$2y$10$8sUZwcwlQS6Tgf8nytczTucCjBQOk5f8ntzAtV/PlFAnte4QB79PS', 'June Vincent', 'Fernandez', '', 'junevincentmagsayo.fernandez@my.smcligan.edu.ph', '', '', '2025-01-08 12:15:33', '2025-01-08 12:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderp`
--

CREATE TABLE `orderp` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `total_amount` double(12,2) NOT NULL,
  `delivery_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderp`
--

INSERT INTO `orderp` (`order_id`, `customer_id`, `order_date`, `status`, `total_amount`, `delivery_method`) VALUES
(1, 1, '2025-01-06 19:11:43', 0, 85.00, 'Pickup'),
(2, 1, '2025-01-06 21:39:56', 0, 70.00, 'Pickup'),
(3, 1, '2025-01-08 08:29:18', 0, 205.00, 'Pickup');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `variation_id`, `quantity`, `price`) VALUES
(7, 1, 1, 1, 1, 15.00),
(8, 1, 1, 3, 1, 50.00),
(9, 1, 2, 6, 1, 20.00),
(10, 2, 1, 2, 3, 60.00),
(11, 2, 2, 4, 1, 10.00),
(12, 3, 1, 3, 3, 150.00),
(13, 3, 2, 5, 3, 45.00),
(14, 3, 3, 11, 1, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_image` varchar(255) DEFAULT NULL,
  `amount` double(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `payment_date`, `payment_method`, `payment_status`, `payment_image`, `amount`) VALUES
(7, 1, '2025-01-06 19:11:43', 'Cash', '0', NULL, 100.00),
(8, 1, '2025-01-06 19:11:43', 'Cash', '0', NULL, 100.00),
(9, 1, '2025-01-06 19:11:43', 'Cash', '0', NULL, 100.00),
(10, 2, '2025-01-06 21:39:56', 'Cash', '0', NULL, 100.00),
(11, 2, '2025-01-06 21:39:56', 'Cash', '0', NULL, 100.00),
(12, 3, '2025-01-08 08:29:18', 'Cash', '0', NULL, 300.00),
(13, 3, '2025-01-08 08:29:18', 'Cash', '0', NULL, 300.00),
(14, 3, '2025-01-08 08:29:18', 'Cash', '0', NULL, 300.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `baseprice` double(11,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `subctg_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_brand`, `description`, `baseprice`, `image`, `admin_id`, `subctg_id`, `created_at`, `updated_at`) VALUES
(1, 'Coca Cola (Bottled)', 'Coca Cola', 'Bottled Coca Cola 12oz-1L ', 10.00, 's-l1200.jpg', 1, 13, '2025-01-03 08:04:29', '2025-01-05 05:43:14'),
(2, 'White Egg (S-XL)', '', '', 10.00, 'xlegg_345x@2x.webp', 1, 16, '2025-01-03 14:19:44', '2025-01-03 14:19:44'),
(3, 'FIBISCO HI-RO Chocolate Sandwich Cookies', 'FIBISCO', '', 7.00, 'ph-11134207-7rasl-m2kuuncyuwhrcf.webp', 1, 23, '2025-01-03 20:57:29', '2025-01-05 03:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(255) NOT NULL,
  `ctg_desc` varchar(255) DEFAULT NULL,
  `ctg_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`ctg_id`, `ctg_name`, `ctg_desc`, `ctg_img`, `created_at`, `updated_at`) VALUES
(1, 'Canned Goods', 'Sardines, Meat Loaf, Corned Beef.', 'Property 1=canned.svg', '2024-12-25 16:00:00', '2024-12-28 19:25:33'),
(2, 'Beverages', 'Soft drinks, Bottled water, Juices, Coffee & Tea, Alcohol drinks', 'Property 1=beverage.svg', '2024-12-25 16:00:00', '2025-01-01 08:45:41'),
(3, 'Household', 'Cleaning Materials, Toiletries, Paper Products ', 'Property 1=cleaning.svg', '2024-12-25 16:00:00', '2024-12-28 17:56:19'),
(4, 'Condiments', 'Soy sauce, Vinegar, Cooking Oil', 'Property 1=condiments.svg', '2024-12-25 16:00:00', '2024-12-28 19:21:01'),
(5, 'Miscellaneous', 'Batteries, Light Bulbs, Umbrellas', 'Property 1=misc.svg', '2024-12-25 16:00:00', '2024-12-28 17:58:12'),
(6, 'Baby Products', 'Baby Food, Diapers, Baby Wipes\r\n', 'Property 1=baby.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:10'),
(7, 'Snacks', 'Chips, Biscuits, Chocolates', 'Property 1=snack.svg', '2024-12-25 16:00:00', '2024-12-28 17:59:36'),
(8, 'School Supplies', ' Pencils, Paper, Glue, etc', 'Property 1=school.svg', '2024-12-28 18:00:14', '2025-01-01 09:06:20'),
(9, 'Candies', 'Chocolate, Mint, Sour Candies', 'candies.svg', '2024-12-30 07:46:13', '2024-12-30 07:46:13'),
(10, 'Groceries', '', 'groceries.svg', '2024-12-31 10:52:46', '2025-01-02 06:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_subcategory`
--

CREATE TABLE `product_subcategory` (
  `subctg_id` int(11) NOT NULL,
  `subctg_name` varchar(255) NOT NULL,
  `subctg_desc` varchar(255) DEFAULT NULL,
  `subctg_img` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ctg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_subcategory`
--

INSERT INTO `product_subcategory` (`subctg_id`, `subctg_name`, `subctg_desc`, `subctg_img`, `updated_at`, `created_at`, `ctg_id`) VALUES
(2, 'Sardines', 'All Sardines Canned Goods.', 'Phosphor icons.svg', '2024-12-28 19:18:58', '2024-12-28 04:24:35', 1),
(3, 'Meat Loaf', 'All Meat Loaf Canned Goods. ', 'meatcanned.svg', '2024-12-28 17:24:20', '2024-12-28 08:21:19', 1),
(7, 'Tuna', '', 'Property 1=image 15.svg', '2024-12-28 18:05:35', '2024-12-28 18:05:35', 1),
(11, 'Corned Beef', '', 'Property 1=image 16.svg', '2024-12-29 00:21:43', '2024-12-29 00:21:43', 1),
(12, 'Water Bottled', '', 'waterbottled.svg', '2024-12-29 16:12:44', '2024-12-29 00:21:57', 2),
(13, 'Soft Drinks', '', 'softdrinks.svg', '2024-12-29 00:22:09', '2024-12-29 00:22:09', 2),
(14, 'Chocolate', '', 'Property 1=image 23.svg', '2024-12-31 11:08:34', '2024-12-30 11:55:45', 9),
(15, 'Hard Candies', 'Lollipops, Peppermint Candies, Fruit-Flavored Hard Candies', 'Property 1=image 22.svg', '2024-12-31 11:08:29', '2024-12-31 07:12:42', 9),
(16, 'Egg', 'Chicken Egg, Salted Egg, Quail Egg', 'egg.svg', '2024-12-31 10:59:29', '2024-12-31 10:59:20', 10),
(19, 'Diapers', 'Diapers', 'diapers.svg', '2025-01-02 06:31:04', '2024-12-31 11:50:04', 6),
(23, 'Biscuit', '', 'biscuit.svg', '2025-01-03 20:53:46', '2025-01-03 20:53:46', 7),
(24, 'Chips', '', 'chips.svg', '2025-01-03 20:55:51', '2025-01-03 20:55:51', 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `sku` varchar(155) DEFAULT NULL,
  `stock` int(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variation`
--

INSERT INTO `product_variation` (`variation_id`, `product_id`, `name`, `price`, `sku`, `stock`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '8oz', 15.00, '', 39, '5cb35e9b-f4e2-459e-9729-2f43b8cc31e6.jpg', '2025-01-04 05:32:22', '2025-01-05 14:59:28'),
(2, 1, '12oz', 20.00, 'CCSF-12oz', 69, 'coca-cola-bottle-NxeKw2A-600.jpg', '2025-01-04 05:32:22', '2025-01-05 14:59:28'),
(3, 1, '1L', 50.00, 'CCSF-1L', 30, 's-l1200.jpg', '2025-01-04 05:32:22', '2025-01-05 14:59:28'),
(4, 2, 'Small', 10.00, '', 50, 'xlegg_345x@2x.webp', '2025-01-04 06:59:24', '2025-01-04 12:00:14'),
(5, 2, 'Medium', 15.00, '', 50, 'xlegg_345x@2x.webp', '2025-01-04 06:59:24', '2025-01-04 12:00:14'),
(6, 2, 'Large', 20.00, '', 50, 'xlegg_345x@2x.webp', '2025-01-04 06:59:24', '2025-01-04 12:00:14'),
(7, 2, 'Extra Large', 25.00, '', 50, 'xlegg_345x@2x.webp', '2025-01-04 06:59:24', '2025-01-04 12:00:14'),
(8, 2, 'White Egg (30 x 1 Tray)', 300.00, '', 10, 'xlegg_345x@2x.webp', '2025-01-04 08:45:05', '2025-01-04 12:00:14'),
(9, 3, '80g (1 packet x 1 pack)', 50.00, '', 41, 'ph-11134207-7quky-lk57jy3dgwwf6a.webp', '2025-01-04 08:45:05', '2025-01-05 14:59:44'),
(10, 3, '200g (1 packet)', 75.00, '', 17, 'sg-11134201-22100-x034s2prapiv4a.webp', '2025-01-04 08:45:05', '2025-01-05 14:59:44'),
(11, 3, '33g (1 packet)', 10.00, '', 36, 'ph-11134207-7rasl-m2kuuncyuwhrcf.webp', '2025-01-04 08:45:05', '2025-01-05 14:59:44'),
(12, 3, '33g (10 packets x 1 pack)', 100.00, '', 10, 'ph-11134201-7qukx-lhsuw0kwnz7t6e.webp', '2025-01-04 08:45:05', '2025-01-05 14:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attributes_option`
--
ALTER TABLE `attributes_option`
  ADD PRIMARY KEY (`attributeopt_id`),
  ADD KEY `variation_option_ibfk_1` (`attribute_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variation_id` (`variation_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD KEY `address_id` (`address_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orderp`
--
ALTER TABLE `orderp`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variation_id` (`variation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `subctg_id` (`subctg_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD PRIMARY KEY (`subctg_id`),
  ADD KEY `ctg_id` (`ctg_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attributes_option`
--
ALTER TABLE `attributes_option`
  MODIFY `attributeopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderp`
--
ALTER TABLE `orderp`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  MODIFY `subctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes_option`
--
ALTER TABLE `attributes_option`
  ADD CONSTRAINT `attributes_option_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_item_ibfk_3` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `customer_address_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `orderp`
--
ALTER TABLE `orderp`
  ADD CONSTRAINT `orderp_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderp` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`),
  ADD CONSTRAINT `order_product_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product_variation` (`product_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderp` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`subctg_id`) REFERENCES `product_subcategory` (`subctg_id`);

--
-- Constraints for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD CONSTRAINT `product_subcategory_ibfk_1` FOREIGN KEY (`ctg_id`) REFERENCES `product_category` (`ctg_id`);

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
