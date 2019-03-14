-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2019 at 04:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clover_database_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', '2019-03-10 04:08:10', '2019-03-10 07:06:37'),
(3, 'Gaming', '2019-03-10 04:11:46', '2019-03-10 04:11:46'),
(4, 'Movies', '2019-03-10 04:12:29', '2019-03-10 04:12:29'),
(9, 'Testing new category edit', '2019-03-11 10:09:22', '2019-03-11 10:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_10_091056_create_categories_table', 1),
(4, '2019_03_10_125736_create_products_table', 2),
(6, '2019_03_12_151554_create_siteusers_table', 3),
(9, '2019_03_12_162644_create_purchase_orders_table', 4),
(10, '2019_03_12_174713_create_purchase_order_details_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'test product', 3, 'this is a description', '5000', 'download.jpg', '2019-03-10 08:31:32', '2019-03-10 08:31:32'),
(2, 'TEsting product image', 3, 'test desc', '5000', 'uploads/download.jpg', '2019-03-10 11:59:27', '2019-03-10 11:59:27'),
(4, 'Ps4', 3, 'Playstation 4 console', '30000', 'uploads/ps4.jpg', '2019-03-11 12:10:53', '2019-03-11 12:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `user_id`, `name`, `mobile`, `landmark`, `city`, `address_type`, `order_total`, `created_at`, `updated_at`) VALUES
(15, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mumbai', 'Home', '5000300005000', '2019-03-12 13:06:50', '2019-03-12 13:06:50'),
(14, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mumbai', 'Home', '5000300005000', '2019-03-12 13:05:38', '2019-03-12 13:05:38'),
(13, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mazgaon', 'Commercial', '5000300005000', '2019-03-12 13:04:04', '2019-03-12 13:04:04'),
(12, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mazgaon', 'Commercial', '5000300005000', '2019-03-12 13:03:40', '2019-03-12 13:03:40'),
(11, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mazgaon', 'Commercial', '5000300005000', '2019-03-12 13:03:22', '2019-03-12 13:03:22'),
(10, 2, 'Yaser Aslam Kazi', '91677688858', 'Mazgaon', 'Mumbai', 'Home', '5000300005000', '2019-03-12 13:01:30', '2019-03-12 13:01:30'),
(16, 2, 'Rehan Khan', '8082034771', 'dockyard rd', 'mumbai', 'Home', '5000300005000', '2019-03-12 13:15:17', '2019-03-12 13:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_details`
--

DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE IF NOT EXISTS `purchase_order_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_details`
--

INSERT INTO `purchase_order_details` (`id`, `user_id`, `product_id`, `category`, `name`, `description`, `image_url`, `price`, `created_at`, `updated_at`) VALUES
(10, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(9, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(8, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(7, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(6, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(11, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(12, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(13, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(14, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(15, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(16, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(17, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(18, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(19, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(20, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(21, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(22, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(23, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(24, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL),
(25, 2, 4, 3, 'Ps4', 'Playstation 4 console', 'uploads/ps4.jpg', '30000', NULL, NULL),
(26, 2, 2, 3, 'TEsting product image', 'test desc', 'uploads/download.jpg', '5000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siteusers`
--

DROP TABLE IF EXISTS `siteusers`;
CREATE TABLE IF NOT EXISTS `siteusers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siteusers`
--

INSERT INTO `siteusers` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'yaser', 'kazi.yaser@gmail.com', '111111', '2019-03-12 10:38:51', '2019-03-12 10:38:51'),
(3, 'rehan', 'reykahn@gmail.com', '123456', '2019-03-12 13:16:02', '2019-03-12 13:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'clover', 'admin@clover.com', '$2y$10$goHIu2IfX9al0XZt.BV6A.ubWdHFM9Oc4joA2K79lXk/Nw9T8Qasa', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
