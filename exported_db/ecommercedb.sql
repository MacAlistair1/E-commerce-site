-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 11:56 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$96FiOuDOQTwfbBc96Zo1w.3KT20z6GrSMb39M7luEoeP0hjtpGSce', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(13, 5, 6, 1, '2018-10-24 10:41:06', '2018-10-24 10:41:06'),
(14, 1, 21, 3, '2018-10-24 11:07:15', '2018-10-25 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(2, 'wholesale-items', 'Wholesale Items', NULL, NULL),
(3, 'men-handicrafts ', 'Men Handicrafts ', NULL, NULL),
(4, 'women-handicrafts', 'Women Handicrafts', NULL, NULL),
(5, 'accessories', 'Accessories', NULL, NULL),
(7, 'test', 'Test', '2018-10-21 22:44:32', '2018-10-21 22:44:32'),
(8, 'women-dresses', 'Women Dresses', '2018-10-22 22:59:51', '2018-10-22 22:59:51'),
(9, 'bags', 'Bags', '2018-10-22 23:16:35', '2018-10-22 23:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `unique_id` tinyint(4) NOT NULL,
  `delivered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout_details`
--

CREATE TABLE `checkout_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `checkout_id` int(10) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `feedback`) VALUES
(1, '@aj_style', 'Lamichhaneaj@gmail.com', 'I really like the style of this site..............'),
(2, '@me_aj', 'replymisclive@gmail.com', 'This is superb');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_14_182445_create_admins_table', 1),
(4, '2018_10_17_022927_create_categories_table', 2),
(5, '2018_10_17_023051_create_sub_categories_table', 2),
(7, '2018_10_17_025436_create_products_table', 3),
(8, '2018_10_17_213912_create_carts_table', 4),
(9, '2018_10_18_011538_create_wishlist_controllers_table', 5),
(10, '2018_10_18_011538_create_wishlist_table', 6),
(11, '2018_10_19_010503_create_checkouts_table', 7),
(12, '2018_10_19_013630_create_checkout_details_table', 8),
(13, '2018_10_19_015531_add_checkout_id_to_checkoutdetails', 9),
(14, '2018_10_19_024010_add_totalprice_to_checkouts', 10),
(15, '2018_10_19_024723_add_totalprice_to_checkoutdetails', 11),
(16, '2018_10_19_155659_add_time_to_checkouts_and_checkout_details', 12),
(17, '2018_10_19_201736_create_subscribers_table', 13),
(18, '2018_10_20_224754_create_feedback_table', 14),
(19, '2018_10_21_231214_create_userhistories_table', 15),
(20, '2018_10_24_005127_create_owner_details_table', 16),
(21, '2018_10_24_013312_add_banner_imgs_to_owner_details', 17),
(22, '2018_10_24_035404_add_header_title_to_owner_details', 18),
(23, '2018_10_24_040247_create_ad_views_table', 19),
(24, '2018_10_24_201511_create_ad_views_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `off` int(11) NOT NULL DEFAULT '0',
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bestseller` tinyint(1) NOT NULL DEFAULT '0',
  `popular` tinyint(1) NOT NULL DEFAULT '0',
  `seasonal` tinyint(1) NOT NULL DEFAULT '0',
  `topsell` tinyint(1) NOT NULL DEFAULT '0',
  `highprice` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `branding` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `detail`, `slug`, `price`, `off`, `stock`, `code`, `description`, `tags`, `image`, `bestseller`, `popular`, `seasonal`, `topsell`, `highprice`, `featured`, `branding`, `created_at`, `updated_at`) VALUES
(6, 5, 13, 'Headphone', 'no', 'headphone', '500', 10, '3', 'H10', '<p>null</p>', 'no', 'banner1.jpg', 0, 0, 0, 0, 0, 0, 1, NULL, '2018-10-24 08:25:26'),
(21, 5, 13, 'Pocket', 'no', 'pocket', '250', 0, '5', 'H10', 'null', 'no', 'no|no', 1, 1, 1, 1, 1, 1, 0, NULL, NULL),
(27, 5, 13, 'Keyboard', 'no', 'keyboard', '750', 1, '5', 'KB10', '<p>null</p>', 'no', '665011.jpg', 1, 1, 1, 1, 1, 1, 0, NULL, '2018-10-24 08:32:22'),
(30, 7, 16, 'Test Product 1', 'No detail', 'test-product-1', '120', 1, '10', 'TP2', '<p>No Description</p>', 'no', '547480.jpg|208810.jpg', 0, 1, 1, 0, 0, 0, 0, '2018-10-22 02:26:10', '2018-10-22 02:26:10'),
(31, 3, 13, 'Headphone', 'no', 'headphone', '500', 0, '0', 'H10', 'null', 'no', 'banner1.jpg', 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(32, 3, 13, 'Pocket', 'no', 'pocket', '250', 0, '0', 'H10', 'null', 'no', 'no|no', 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(33, 3, 13, 'Keyboard', 'no', 'key-board', '750', 0, '0', 'KB10', 'null', 'no', 'no|no', 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
(34, 3, 16, 'Test Product', 'There is none', 'test-product', '100', 2, '3', 'TP10', '<p>We are here</p>', 'no', 'no|no|no', 0, 0, 0, 0, 0, 0, 0, '2018-10-22 01:58:05', '2018-10-22 01:58:05'),
(35, 2, 16, 'Test Product 1', 'No detail', 'test-product-1', '120', 1, '10', 'TP2', '<p>No Description</p>', 'no', '547480.jpg|208810.jpg', 0, 0, 0, 0, 0, 0, 0, '2018-10-22 02:26:10', '2018-10-22 02:26:10'),
(36, 8, 17, 'Red Jacket', 'Suite for Ladies', 'red-jacket', '570', 2, '1', 'RJ1', '<ul>\r\n	<li>Fit for Young Lady</li>\r\n	<li>New Product</li>\r\n	<li>Red Color</li>\r\n	<li>Best for Ladies</li>\r\n</ul>', 'red,jacket,ladies', '948359.jpg', 0, 0, 0, 0, 0, 1, 0, '2018-10-22 23:02:18', '2018-10-22 23:02:18'),
(37, 8, 18, 'Hot Pants', '2 diffrent types available', 'hot-pants', '780', 0, '2', 'HP0', '<ul>\r\n	<li>Nice Pant</li>\r\n	<li>Can wear in Summar</li>\r\n	<li>Stylish</li>\r\n	<li>Cheap</li>\r\n</ul>', 'Hot,pant,dress', '621571.png|635572.png', 0, 1, 0, 0, 0, 0, 0, '2018-10-22 23:14:23', '2018-10-22 23:14:23'),
(38, 9, 19, 'Ladies & Jeans Bag', 'Different types of bag for ladies and jeans', 'ladies-jeans-bag', '1300', 2, '4', 'B40', '<ul>\r\n	<li>For Ladies and jeans</li>\r\n	<li>2 Color Available</li>\r\n	<li>Water Proof</li>\r\n	<li>New Product</li>\r\n</ul>', 'bag,school bag', '770337.jpg|920755.png|922596.jpg|885552.jpg', 0, 0, 1, 0, 0, 0, 0, '2018-10-22 23:19:20', '2018-10-22 23:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Lamichhaneaj@gmail.com', '2018-10-20 03:29:28', '2018-10-20 03:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 2, 'Cakras 1', 'cakras-1', NULL, NULL),
(6, 2, 'Hemp Dress 1', 'hemp-dress-1', NULL, NULL),
(7, 2, 'Red Velvet 1', 'red-velvet-1', NULL, NULL),
(8, 2, 'Four Corners 1', 'four-corners-1', NULL, NULL),
(9, 3, 'Cakras 2', 'cakras-2', NULL, NULL),
(10, 3, 'Hemp Dress 2', 'hemp-dress-2', NULL, NULL),
(11, 3, 'Red Velvet 2', 'red-velvet-2', NULL, NULL),
(12, 3, 'Four Corners 2', 'four-corners-2', NULL, NULL),
(13, 5, 'Wearable', 'wearable', NULL, NULL),
(14, 4, 'Women Wearable', 'women-wearable', NULL, NULL),
(16, 7, 'test me', 'test-me', '2018-10-22 01:42:37', '2018-10-22 01:42:37'),
(17, 8, 'Dress', 'dress', '2018-10-22 23:00:18', '2018-10-22 23:00:18'),
(18, 8, 'Pants', 'pants', '2018-10-22 23:12:38', '2018-10-22 23:12:38'),
(19, 9, 'School Bags', 'school-bags', '2018-10-22 23:16:50', '2018-10-22 23:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `userhistories`
--

CREATE TABLE `userhistories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userhistories`
--

INSERT INTO `userhistories` (`id`, `user_id`, `product_name`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(13, 1, 'Red Jacket|Hot Pants', '1|1', '1626', '2018-10-24 07:45:39', '2018-10-24 07:45:39'),
(14, 6, 'Pocket|Keyboard|Test Product 1', '1|1|1', '1366', '2018-10-24 07:46:23', '2018-10-24 07:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verifytoken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` int(6) DEFAULT NULL,
  `country` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` int(1) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `verifytoken`, `contact`, `company`, `address`, `city`, `postal`, `country`, `province`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jeeven', 'Lamichhane', 'Lamichhaneaj@gmail.com', NULL, 'q7dls2W9Czm6HW0zNSVwcIv8va139M88oNuRWcPY', '9803610971', 'Horizon', 'Banepa', 'Kavre', 634200, 'Nepal', 3, '1', '$2y$10$Wbpb34WWIm4jS6IkvCaoYO8pn1kZ5KfCEUPAqmmAPFeYj75yQB1j6', 'YPnZN4CXE6x2zNclieHK9Qvj0h2BGYWDarbA0Ka2VluTYvYgitiDiZSycJwQ', '2018-10-18 00:51:46', '2018-10-22 08:38:21'),
(3, 'MacAlistair', 'Lamichhane', 'mac@thesunbi.com', NULL, 'G8vNeSN6Yke2WVfFHh2yadiZ1BXZgeq456IeW82W', '9860463471', 'SunBi', 'Shantinagar', 'Kathmandu', NULL, 'Nepal', 3, '0', '$2y$10$.8B6MZOUclih9sg6npZ2sOArRHJXk2cq2g9yIu2wjuvVCHwzvGTrW', 'eSQhEZfrpI2neYKQ2J4AQMskl8NUal2swTaoiZgayWqKLCIHCTCD1GPAPy9b', '2018-10-18 01:06:18', '2018-10-23 06:02:53'),
(5, 'MIS', 'Community', 'replymisclive@gmail.com', NULL, '0va8bKn6F5QuzqzcLcPCY9DC2bWYO4qPAwUtALuH', '0000000000000', NULL, 'SA', 'CA', NULL, 'USA', 2, '1', '$2y$10$6zZVn1wQsoeexD.RSb35keBBYePpxvj6YZ6nUEcGrw74uBhHFEEg2', 'VSmxWf9pVrXmUywKofYMLmxRUVfT50oe56gEg2uVt4F2YVHQkwyuAGpfeCJx', '2018-10-23 05:55:26', '2018-10-23 05:55:26'),
(6, 'Some', 'One', 'someone@gmail.com', NULL, 'yuGAbhZe6BYlJi5Xf0juM9ltcQSJ1EBTSnAM5ZVg', '0000000000', NULL, 'Anywhere', 'sorry', NULL, 'Nepal', 2, '1', '$2y$10$g/XYOAbMQJ1LqbbWdplMHOxwLDJZX2r91HUD7j0MPPOgHJGdiybKu', 'MUVo5t1QpZDSUSmMu7IZdlkRK4RCiEEbIQVo5zKWI6Kn6lhSyy5o8dRBC0Ff', '2018-10-24 06:17:47', '2018-10-24 06:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 1, 36, '2018-10-22 23:07:04', '2018-10-22 23:07:04'),
(5, 1, 37, '2018-10-22 23:15:23', '2018-10-22 23:15:23'),
(6, 1, 38, '2018-10-22 23:20:11', '2018-10-22 23:20:11'),
(7, 6, 37, '2018-10-24 06:20:53', '2018-10-24 06:20:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_index` (`user_id`),
  ADD KEY `carts_product_id_index` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_user_id_index` (`user_id`),
  ADD KEY `checkouts_product_id_index` (`product_id`);

--
-- Indexes for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_details_checkout_id_index` (`checkout_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_subcategory_id_index` (`subcategory_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_index` (`category_id`);

--
-- Indexes for table `userhistories`
--
ALTER TABLE `userhistories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userhistories_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_index` (`user_id`),
  ADD KEY `wishlist_product_id_index` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `checkout_details`
--
ALTER TABLE `checkout_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userhistories`
--
ALTER TABLE `userhistories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkout_details`
--
ALTER TABLE `checkout_details`
  ADD CONSTRAINT `checkout_details_checkout_id_foreign` FOREIGN KEY (`checkout_id`) REFERENCES `checkouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userhistories`
--
ALTER TABLE `userhistories`
  ADD CONSTRAINT `userhistories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlist_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
