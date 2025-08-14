-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2025 at 01:46 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllAdminUsers` ()   BEGIN
SELECT * FROM admin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllCategories` ()   BEGIN
SELECT * FROM product_category;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllCustomers` ()   BEGIN
SELECT * FROM customer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProducts` ()   BEGIN
SELECT * FROM product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllProductVariation` ()   BEGIN
SELECT * FROM product_variation;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllStockLog` ()   BEGIN
SELECT * FROM stock_log;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetFilteredSubcategories` (IN `input_ctg_id` VARCHAR(10), IN `input_sort` VARCHAR(10))   BEGIN
    IF input_ctg_id = 'all' THEN
        IF input_sort = 'oldest' THEN
            SELECT *
            FROM product_subcategory 
            LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id
            ORDER BY product_subcategory.created_at ASC;
        ELSE
            SELECT *
            FROM product_subcategory 
            LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id
            ORDER BY product_subcategory.created_at DESC;
        END IF;
    ELSE
        IF input_sort = 'oldest' THEN
            SELECT *
            FROM product_subcategory 
            LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id
            WHERE product_subcategory.ctg_id = CAST(input_ctg_id AS UNSIGNED)
            ORDER BY product_subcategory.created_at ASC;
        ELSE
            SELECT *
            FROM product_subcategory 
            LEFT JOIN product_category ON product_subcategory.ctg_id = product_category.ctg_id
            WHERE product_subcategory.ctg_id = CAST(input_ctg_id AS UNSIGNED)
            ORDER BY product_subcategory.created_at DESC;
        END IF;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProductwithVariations` ()   BEGIN
    SELECT
        p.product_id,
        p.product_name,
        p.product_brand,
        p.description,
        p.baseprice,
        p.image AS product_image,
        p.subctg_id,
        v.variation_id,
        v.name AS variation_name,
        v.price AS variation_price,
        v.stock,
        v.sku,
        v.image AS variation_image,
        v.created_at,
        v.updated_at
    FROM 
        product p
    JOIN 
        product_variation v ON p.product_id = v.product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSubcategoriesByCategoryID` (IN `input_ctg_id` INT)   BEGIN
    SELECT * 
    FROM product_subcategory 
    WHERE ctg_id = input_ctg_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetSubcategoriesWithCategory` ()   BEGIN
    SELECT * 
    FROM product_subcategory 
    LEFT JOIN product_category 
    ON product_subcategory.ctg_id = product_category.ctg_id 
    ORDER BY product_subcategory.created_at DESC;
END$$

DELIMITER ;

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
(2, 'bigcas_admin', '$2y$10$eQ9QHoGc7byv2K504u6TwuAWoGL68g2PE5BCIcs5l0SCR1lYBJSFi', 'Jessa Mae', 'Bigcas', 'jessamaebigcas@gmail.com', 'admin', '2025-01-07 03:41:52', '2025-01-07 03:41:52'),
(5, 'junevincent', '$2y$10$zTchd8/l/WlOOFWiwxHiyOmrFRJnQOZVOcxsQ6WVXL8vSlZk1okGq', 'June Vincent', 'Fernandez', 'junevincentmagsayofernandez@gmail.com', 'unassigned', '2025-08-14 11:43:40', '2025-08-14 11:43:40');

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
-- Table structure for table `orderp`
--

CREATE TABLE `orderp` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL COMMENT '0 - Pending Order\r\n1 - Confirmed Order\r\n2 - Deliver Order\r\n3 - Unpaid Order\r\n5 - Completed Order\r\n10 - Cancelled Order',
  `total_amount` double(12,2) NOT NULL,
  `delivery_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderp`
--

INSERT INTO `orderp` (`order_id`, `customer_id`, `order_date`, `status`, `total_amount`, `delivery_method`) VALUES
(1, 1, '2025-01-06 19:11:43', 1, 85.00, 'Pickup'),
(2, 1, '2025-01-06 21:39:56', 0, 70.00, 'Pickup'),
(3, 1, '2025-01-08 08:29:18', 0, 205.00, 'Pickup'),
(4, 1, '2025-01-15 04:19:27', 0, 105.00, 'Pickup'),
(5, 1, '2025-01-15 04:23:10', 0, 105.00, 'Pickup'),
(6, 1, '2025-01-15 04:42:54', 0, 140.00, 'Pickup'),
(7, 1, '2025-01-16 16:01:48', 0, 100.00, 'Pickup'),
(8, 1, '2025-01-16 16:02:46', 0, 100.00, 'Pickup'),
(9, 1, '2025-01-26 17:26:59', 0, 40.00, 'Delivery'),
(10, 1, '2025-05-25 14:58:38', 0, 100.00, 'Pickup');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`, `variation_id`, `quantity`) VALUES
(22, 10, 4, 15, 2);

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
(14, 3, '2025-01-08 08:29:18', 'Cash', '0', NULL, 300.00),
(15, 5, '2025-01-15 04:23:10', 'Cash', '0', '', 105.00),
(16, 5, '2025-01-15 04:23:10', 'Cash', '0', '', 105.00),
(17, 6, '2025-01-15 04:42:54', 'Cash', '0', NULL, 140.00),
(18, 6, '2025-01-15 04:42:54', 'Cash', '0', NULL, 140.00),
(19, 8, '2025-01-16 16:02:46', 'Cash', '0', NULL, 100.00),
(20, 9, '2025-01-26 17:26:59', 'Cash', '0', NULL, 40.00),
(21, 10, '2025-05-25 14:58:38', 'Cash', '0', NULL, 100.00);

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
(4, 'HI-RO FIBISCO', 'FIBISCO', 'HI-RO FIBISCO\r\n- 33G 1 X 3 PAIRS \r\n- 33G 10 X 3 PAIRS', 10.00, '5E1916F69FA20370.jpg', 4, 23, '2025-05-17 11:37:09', '2025-05-17 11:39:18');

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
(13, 4, '33g x 1 packet', 10.00, 'HRF-01', 80, '659ae1_61d7dc32845d4cec800cb90e690286b1~mv2.avif', '2025-05-24 11:30:19', '2025-05-25 14:56:14'),
(14, 4, '33g x 10 packets', 120.00, 'HRF-33G10F', 50, 'FIBISCO-20-102.png', '2025-05-24 16:10:19', '2025-05-25 14:56:14'),
(15, 4, '200G x 1 packet', 50.00, 'HRF-200G1', 30, 'ph-11134201-7qul7-lhsuvw67482v38.jpg', '2025-05-25 14:54:33', '2025-05-25 14:56:14');

--
-- Triggers `product_variation`
--
DELIMITER $$
CREATE TRIGGER `after_stock_insert` AFTER INSERT ON `product_variation` FOR EACH ROW BEGIN
  INSERT INTO stock_log (variation_id, old_stock, new_stock, changed_at)
  VALUES (NEW.variation_id, 0, NEW.stock, NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_stock_update` BEFORE UPDATE ON `product_variation` FOR EACH ROW BEGIN
  IF OLD.stock != NEW.stock THEN
    INSERT INTO stock_log (variation_id, old_stock, new_stock, changed_at)
    VALUES (OLD.variation_id, OLD.stock, NEW.stock, NOW());
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_summary`
--

CREATE TABLE `sales_summary` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_sales` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_summary`
--

INSERT INTO `sales_summary` (`id`, `date`, `total_sales`, `created_at`) VALUES
(1, '2025-05-25', 100.00, '2025-05-25 15:12:30'),
(2, '2025-05-25', 100.00, '2025-05-25 15:13:30'),
(3, '2025-05-25', 100.00, '2025-05-25 15:14:30'),
(4, '2025-05-25', 100.00, '2025-05-25 15:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `stock_alert`
--

CREATE TABLE `stock_alert` (
  `variation_id` int(11) NOT NULL,
  `current_stock` int(11) NOT NULL,
  `message` text NOT NULL,
  `alert_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `log_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `old_stock` int(11) NOT NULL,
  `new_stock` int(11) NOT NULL,
  `changed_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`log_id`, `variation_id`, `old_stock`, `new_stock`, `changed_at`) VALUES
(1, 13, 50, 40, '2025-05-24 23:03:00'),
(2, 14, 0, 60, '2025-05-25 00:10:19'),
(3, 13, 40, 80, '2025-05-25 00:11:35'),
(4, 14, 60, 50, '2025-05-25 13:18:45'),
(5, 15, 0, 50, '2025-05-25 22:54:33'),
(6, 15, 50, 30, '2025-05-25 22:56:14');

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
  ADD KEY `cart_item_ibfk_1` (`cart_id`),
  ADD KEY `cart_item_ibfk_2` (`product_id`),
  ADD KEY `cart_item_ibfk_3` (`variation_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

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
  ADD KEY `order_product_ibfk_1` (`order_id`),
  ADD KEY `order_product_ibfk_2` (`product_id`),
  ADD KEY `order_product_ibfk_3` (`variation_id`);

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
  ADD KEY `product_ibfk_1` (`admin_id`),
  ADD KEY `product_ibfk_2` (`subctg_id`);

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
  ADD KEY `product_variation_ibfk_2` (`product_id`);

--
-- Indexes for table `sales_summary`
--
ALTER TABLE `sales_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `variation_id` (`variation_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderp`
--
ALTER TABLE `orderp`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales_summary`
--
ALTER TABLE `sales_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_ibfk_3` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderp`
--
ALTER TABLE `orderp`
  ADD CONSTRAINT `orderp_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderp` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_3` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orderp` (`order_id`);

--
-- Constraints for table `product_subcategory`
--
ALTER TABLE `product_subcategory`
  ADD CONSTRAINT `product_subcategory_ibfk_1` FOREIGN KEY (`ctg_id`) REFERENCES `product_category` (`ctg_id`);

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD CONSTRAINT `stock_log_ibfk_1` FOREIGN KEY (`variation_id`) REFERENCES `product_variation` (`variation_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `daily_sales_log` ON SCHEDULE EVERY 1 MINUTE STARTS '2025-05-25 23:12:30' ON COMPLETION PRESERVE ENABLE DO INSERT INTO sales_summary (date, total_sales)
  SELECT CURDATE(), SUM(total_amount) FROM orderp WHERE DATE(order_date) = CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
