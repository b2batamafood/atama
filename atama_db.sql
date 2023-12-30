-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 02:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atama_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'SFC', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(2, 'MILKITA', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(3, 'CHEETOS', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(4, 'UFC', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(5, 'SEARAM', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(6, 'SHT ZERO', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(7, 'NOH FOODS', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(8, 'JUFRAN', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(9, 'HJH ORCHID', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(10, 'PARROT', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(11, 'FOCO', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(12, 'COJO-COJO', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(13, 'SIJI', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(14, 'MOGU', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(15, 'CARABAO', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(16, 'LAURA', '2023-12-30 07:45:51', '2023-12-30 07:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Beverage', 'beverage.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(2, 'Candy', 'candy.jpeg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(3, 'Snack', 'snack.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(4, 'Noodle', 'noodle.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(5, 'Can Food', 'can_food.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(6, 'Dessert', 'dessert.jpeg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(7, 'Condiment', 'condiments.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(8, 'Sauce', 'sauce.jpg', '2023-12-30 07:45:51', '2023-12-30 07:45:51'),
(9, 'Cooking Oil', 'cooking_oil.jpeg', '2023-12-30 07:45:51', '2023-12-30 07:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_12_23_183825_create_users_table', 1),
(3, '2023_12_28_021607_create_categories_table', 1),
(4, '2023_12_28_021619_create_brands_table', 1),
(5, '2023_12_28_102951_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `barcode`, `price`, `cost`, `tax`, `photo_url`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, '800002E1-1688915124', 'AT-20002', 'SFC FRUIT SODA - PLUM 4 x 6 x 350ml', '8', '28.8', '21.79', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002E1-1688915124_AT-20002', 1, 1, NULL, NULL),
(2, '80000329-1689088877', 'AT-20041', 'CARABAO ENERGY DRINK 50gb x 5.07fl.oz(150ml)', 'QB:0103479800809', '27.5', '44.5', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000329-1689088877_AT-20041', 1, 15, NULL, NULL),
(3, '800002F9-1688918340', 'AT-30004', 'MILKITA MILK CANDY CHOCOLATE 30CT 12 x 4.23oz', '8', '22.2', '18.65', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002F9-1688918340_AT-30004', 2, 2, NULL, NULL),
(4, '8000034F-1689361632', 'AT-30165', 'LAURA\'S BISCOCHO DE MANILA 32/175G', 'QB:0103479800847', '48', '40', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/8000034F-1689361632_AT-30165', 3, 16, NULL, NULL),
(5, '80000585-1696452410', 'AT-30135', 'Cheetos Corn Sticks (Japanese Steak Flavor) 50 x 60g', '6', '65', '48', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000585-1696452410_AT-30119', 3, 3, NULL, NULL),
(6, '800002C7-1688782020', 'AT-31095', 'UFC FLOUR STICK CANTON 30/16 OZ', 'QB:0103479800711', '75', '63', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002C7-1688782020_AT-31095', 4, 4, NULL, NULL),
(7, '800002DE-1688914697', 'AT-34001', 'SEARAM SARDINE (HOT), OVAL 24 x 15oz', '25225011112', '44.4', '37.6', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002DE-1688914697_AT-34001', 5, 5, NULL, NULL),
(8, '80000490-1693756753', 'AT-40001', 'SHT Zero Taiwanness Grass Jelly (Mango) 2 pack x 280gr x 18', '6', '49.5', '27', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000490-1693756753_AT-40001', 6, 6, NULL, NULL),
(9, '800002E6-1688916474', 'AT-50003', 'NOH FOODS CHINESE BARBECUE (CHAR SIU) 24 X 2.5OZ', '73562000207', '36', '29.25', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800002E6-1688916474_AT-50003', 7, 7, NULL, NULL),
(10, '80000309-1689042929', 'AT-51007', 'JUFRAN BANANA SAUCE KETCHUP (HOT BIG) 18/18.5 OZ', 'QB:0103479800777', '31.5', '23.99', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/80000309-1689042929_AT-51007', 8, 8, NULL, NULL),
(11, '800004E0-1694304376', 'AT-53001', 'HJH Orchid Peanut Oil 6 x 1.8L', '6', '84', '58.99', '0', 'https://insitusales.s3.us-east-1.amazonaws.com/web-app/data/10127/images/products/800004E0-1694304376_AT-53001', 9, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
