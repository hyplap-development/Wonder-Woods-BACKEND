-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 06:26 AM
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
-- Database: `wonderwoods`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 'media/images/category/1716308095Screenshot 2024-05-13 183154.png', 'Test Cat 2', 'test-cat-2', 1, 0, '2024-05-21 10:33:07', '2024-05-21 10:44:55'),
(2, 'media/images/category/1716308368Screenshot 2024-05-20 222536.png', 'test', 'test', 1, 0, '2024-05-21 10:49:28', '2024-05-21 10:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `code`, `name`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, '#ff8585', 'random 2', 1, 1, '2024-05-21 01:35:08', '2024-05-20 20:23:27'),
(2, '#000000', 'Black', 1, 0, '2024-05-25 07:27:18', '2024-05-25 07:27:18'),
(3, '#ff0000', 'Red', 1, 0, '2024-05-25 07:27:42', '2024-05-25 07:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `name`, `slug`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Modern Interior', NULL, 1, 1, '2023-02-26 12:31:03', '2024-05-20 19:32:58'),
(2, NULL, 'Kasturi', 'kasturi', 1, 0, '2023-03-23 12:58:16', '2023-03-23 12:58:16'),
(3, NULL, 'Godrej', 'godrej', 1, 0, '2023-03-23 12:58:32', '2023-03-23 12:58:32'),
(4, NULL, 'Jaykamal', 'jaykamal', 1, 0, '2023-03-23 12:58:49', '2023-03-23 12:58:49'),
(5, NULL, 'Super', 'super', 1, 0, '2023-03-23 12:59:01', '2023-03-23 12:59:01'),
(6, NULL, 'Nilkamal', 'nilkamal', 1, 0, '2023-03-23 12:59:11', '2023-03-23 12:59:11'),
(7, NULL, 'Bindal', 'bindal', 1, 0, '2023-03-23 12:59:19', '2023-03-23 12:59:19'),
(8, NULL, 'Duroflex', 'duroflex', 1, 0, '2023-03-23 12:59:34', '2023-03-23 12:59:34'),
(9, NULL, 'Sleepwell', 'sleepwell', 1, 0, '2023-03-23 12:59:50', '2023-03-23 12:59:50'),
(10, NULL, 'Magenta', 'magenta', 1, 0, '2023-03-23 13:00:01', '2023-03-23 13:00:01'),
(11, NULL, 'Snooze Hub', 'snooze-hub', 1, 0, '2023-03-23 13:00:10', '2023-03-23 13:00:10'),
(12, NULL, 'Eliteo', 'eliteo', 1, 0, '2023-03-23 13:00:20', '2023-03-23 13:00:20'),
(13, NULL, 'Metal Magic', 'metal-magic', 1, 0, '2023-03-23 13:00:29', '2023-03-23 13:00:29'),
(14, NULL, 'Keep Well', 'keep-well', 1, 0, '2023-03-23 13:00:56', '2023-03-23 13:00:56'),
(15, NULL, 'Home Texa', 'home-texa', 1, 0, '2023-03-23 13:01:04', '2023-03-23 13:01:04'),
(16, NULL, 'Maheshwari Furniture', 'maheshwari-furniture', 1, 0, '2023-03-23 13:01:25', '2023-03-23 13:01:25'),
(17, NULL, 'Decorative', 'decorative', 1, 0, '2023-03-23 13:01:33', '2023-03-23 13:01:33'),
(18, NULL, 'Bhakti furnitures', 'bhakti-furnitures', 1, 0, '2023-03-23 13:01:42', '2023-03-23 13:01:42'),
(19, NULL, 'D- Decor Fabrics', 'd-decor-fabrics', 1, 0, '2023-03-23 13:03:38', '2023-03-23 13:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `gsts`
--

CREATE TABLE `gsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gsts`
--

INSERT INTO `gsts` (`id`, `percent`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, '0', 1, 0, '2024-05-20 20:42:37', '2024-05-20 20:42:37'),
(2, '1', 1, 0, '2024-05-20 20:44:27', '2024-05-20 20:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `function` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(111, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(112, '2022_04_07_104846_create_roles_table', 1),
(113, '2022_04_27_065932_create_users_table', 1),
(114, '2022_04_30_184924_create_addresses_table', 1),
(115, '2022_09_12_100710_create_logs_table', 1),
(116, '2023_02_15_184915_create_companies_table', 1),
(117, '2023_02_15_184917_create_colors_table', 1),
(118, '2023_02_15_184920_create_sizes_table', 1),
(119, '2023_02_15_184922_create_gsts_table', 1),
(120, '2023_02_15_184925_create_rooms_table', 1),
(121, '2023_02_15_184936_create_categories_table', 1),
(122, '2023_02_15_184937_create_subcategories_table', 1),
(123, '2023_02_15_184947_create_products_table', 1),
(124, '2023_02_15_184950_create_productimages_table', 1),
(125, '2023_02_15_184952_create_productratings_table', 1),
(126, '2023_02_15_185032_create_carts_table', 1),
(127, '2023_02_15_185040_create_wishlists_table', 1),
(128, '2023_02_15_185124_create_transactions_table', 1),
(129, '2023_02_15_185144_create_orders_table', 1),
(130, '2023_03_28_175053_create_banners_table', 1),
(131, '2024_05_19_104446_create_notifications_table', 1),
(132, '2024_05_19_110740_create_inventories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trxId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `productId`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'media/images/product/1716662061Screenshot 2024-05-20 222536.png', '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(2, 1, 'media/images/product/1716662061Screenshot 2024-05-20 204244.png', '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(3, 1, 'media/images/product/1716662061Screenshot 2024-05-19 145030.png', '2024-05-25 13:04:21', '2024-05-25 13:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `productratings`
--

CREATE TABLE `productratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productratings`
--

INSERT INTO `productratings` (`id`, `productId`, `userId`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(2, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(3, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(4, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(5, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(6, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(7, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(8, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(9, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(10, 1, NULL, 1, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(11, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(12, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(13, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(14, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(15, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(16, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(17, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(18, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(19, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(20, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(21, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(22, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(23, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(24, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(25, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(26, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(27, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(28, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(29, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(30, 1, NULL, 2, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(31, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(32, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(33, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(34, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(35, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(36, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(37, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(38, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(39, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(40, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(41, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(42, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(43, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(44, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(45, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(46, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(47, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(48, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(49, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(50, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(51, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(52, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(53, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(54, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(55, 1, NULL, 3, NULL, '2024-05-25 13:04:20', '2024-05-25 13:04:20'),
(56, 1, NULL, 3, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(57, 1, NULL, 3, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(58, 1, NULL, 3, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(59, 1, NULL, 3, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(60, 1, NULL, 3, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(61, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(62, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(63, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(64, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(65, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(66, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(67, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(68, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(69, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(70, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(71, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(72, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(73, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(74, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(75, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(76, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(77, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(78, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(79, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(80, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(81, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(82, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(83, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(84, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(85, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(86, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(87, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(88, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(89, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(90, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(91, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(92, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(93, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(94, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(95, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(96, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(97, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(98, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(99, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(100, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(101, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(102, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(103, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(104, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(105, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(106, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(107, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(108, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(109, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(110, 1, NULL, 4, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(111, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(112, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(113, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(114, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(115, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(116, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(117, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(118, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(119, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(120, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(121, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(122, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(123, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(124, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(125, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(126, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(127, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(128, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(129, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(130, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(131, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(132, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(133, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(134, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(135, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(136, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(137, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(138, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(139, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(140, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(141, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(142, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(143, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(144, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(145, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(146, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(147, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(148, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(149, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(150, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(151, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(152, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(153, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(154, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(155, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(156, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(157, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(158, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(159, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21'),
(160, 1, NULL, 5, NULL, '2024-05-25 13:04:21', '2024-05-25 13:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subcategoryId` int(11) DEFAULT NULL,
  `companyId` int(11) DEFAULT NULL,
  `sizeId` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL,
  `roomId` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `mrp` decimal(8,2) DEFAULT NULL,
  `discountedPrice` decimal(8,2) DEFAULT NULL,
  `gst` int(11) DEFAULT NULL,
  `deliveryCharge` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `finish` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `storage` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categoryId`, `subcategoryId`, `companyId`, `sizeId`, `colorId`, `roomId`, `tag`, `name`, `slug`, `mrp`, `discountedPrice`, `gst`, `deliveryCharge`, `description`, `material`, `finish`, `style`, `weight`, `length`, `width`, `height`, `warranty`, `storage`, `image`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 2, 1, 'New', 'Product 1', 'product-1', 15000.00, 12000.00, 1, 1500, 'Test description will be put here so that I can see how does this look in the app. and one it is done then we can change the description later.', 'Plastic', 'Natural', 'Antique', 132, 13, 21, 32, 60, 1, 'media/images/product/1716662060Screenshot 2024-05-18 104213.png', 1, 0, '2024-05-25 13:04:20', '2024-05-25 13:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 1, 0, '2024-05-19 05:48:00', '2024-05-19 05:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 'Hall', NULL, 1, 0, '2024-05-20 20:46:56', '2024-05-20 20:46:56'),
(2, 'Bed Room', 'media/images/room/1716306713Screenshot 2024-05-20 204244.png', 1, 0, '2024-05-20 20:47:04', '2024-05-21 10:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 'Small', 1, 0, '2024-05-20 20:29:54', '2024-05-20 20:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `image`, `categoryId`, `name`, `slug`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, 'media/images/subcategory/1716308749Screenshot 2024-05-21 212735.png', 1, 'test', 'test', 1, 0, '2024-05-21 10:55:49', '2024-05-21 10:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `addressId` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `deliveryCharge` int(11) DEFAULT NULL,
  `grandTotal` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleteId` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profileImage`, `name`, `phone`, `email`, `password`, `role`, `status`, `deleteId`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sayed Zaid', '8433885667', 'szaid444666@gmail.com', '$2y$10$GiDEZPe1OL2H7VTlMJJo7..5huOX6kCtoc68WjaVarm.GNosamDeC', 'admin', 1, 0, '2024-05-19 05:48:00', '2024-05-19 05:48:00'),
(2, NULL, 'Sayed Zaid', '9876543210', 'szaid44695@gmail.com', '$2y$10$LHTULKDHKZOUKviTvuOsb.ielU6rzBhEt.xbyXFoBBcUlhwilyfoG', 'customer', 1, 0, '2024-05-20 19:36:07', '2024-05-20 19:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gsts`
--
ALTER TABLE `gsts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productratings`
--
ALTER TABLE `productratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gsts`
--
ALTER TABLE `gsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productratings`
--
ALTER TABLE `productratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
