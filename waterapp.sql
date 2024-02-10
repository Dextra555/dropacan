-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2024 at 06:19 AM
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
-- Database: `waterapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `area` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `city` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Velachery', 1, '2024-01-24 02:04:19', '2024-01-24 02:04:19'),
(2, 'Guindy', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Chennai', 1, '2024-01-24 02:04:04', '2024-01-24 02:04:04'),
(2, 'Kumbakonam', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'India', NULL, NULL),
(2, 'USA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `privacy_policy` int(10) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `profileimg` varchar(250) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `email`, `privacy_policy`, `apartment`, `profileimg`, `area`, `city`, `state`, `country`, `created_at`, `updated_at`) VALUES
(5, 'Serina', '$2y$10$z2mJwG7fTy/jkkeYURQzo.M66emQo3VRusNhBvB1Bp3qw2AYKJf.G', 'serina123@gmail.com', NULL, 'test', NULL, 1, 1, 1, 1, '2024-02-03 06:10:43', '2024-02-03 06:10:43'),
(6, 'Balaji', '$2y$10$QHe8zcNer.XRiFLlx3YcOuL9vDb2nKZkRgZk0fVdKMyZwBHydF5Eq', 'balaji1212@gmail.com', 1, 'test', NULL, 2, 2, 2, 2, '2024-02-03 06:11:23', '2024-02-03 06:11:23'),
(7, 'Anjali', '$2y$10$QDSR/09S7cgejUIHrEiZS.Gn8oxCVbAJJ6cuJouWa4qgSEvuEfC92', 'serina123@gmail.com', 1, 'test', NULL, 1, 1, 1, 1, '2024-02-05 07:13:48', '2024-02-05 07:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_08_102520_create_countries_table', 1),
(7, '2023_09_08_102643_create_states_table', 1),
(8, '2023_09_08_102843_create_cities_table', 1),
(9, '2023_09_08_103045_create_areas_table', 1),
(10, '2023_09_15_101806_create_apartmentments_table', 1),
(11, '2023_09_15_121556_create_customers_table', 1),
(12, '2024_01_24_115809_products', 2),
(13, '2024_01_25_064503_products', 3),
(14, '2024_01_25_125925_otpverfication', 4),
(15, '2024_01_29_083056_otpverification', 5),
(16, '2024_02_05_123838_superadmin_login', 6),
(17, '2024_02_06_063657_review', 7),
(18, '2024_02_06_072757_create_ratings_table', 8),
(19, '2024_02_07_045944_orders', 9),
(20, '2024_02_07_122951_create_orders_table', 10),
(21, '2024_02_07_123533_create_orders_table', 11),
(22, '2024_02_07_124223_create_orders_table', 12),
(23, '2024_02_07_124822_create_orders_table', 13),
(24, '2024_02_07_132249_create_orders_table', 14),
(25, '2024_02_07_132347_create_orders_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `brands` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `brands`, `quantity`, `price`, `location`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'serina123@gmail.com', 'amul', 3, '999', '{\"country\":\"India\",\"state\":\"tamilnadu\",\"city\":\"Chennai\",\"area\":\"Velachery\"}', 5, '2024-02-07 08:06:14', '2024-02-07 08:06:14'),
(2, 'serina123@gmail.com', 'amul', 3, '999', '{\"country\":\"India\",\"state\":\"tamilnadu\",\"city\":\"Chennai\",\"area\":\"Velachery\"}', 5, '2024-02-07 08:08:32', '2024-02-07 08:08:32'),
(3, 'serina123@gmail.com', 'amul', 3, '999', '{\"country\":\"India\",\"state\":\"tamilnadu\",\"city\":\"Chennai\",\"area\":\"Velachery\"}', 5, '2024-02-09 01:34:44', '2024-02-09 01:34:44'),
(4, 'balaji1212@gmail.com', 'dextra', 5, '10', '{\"country\":\"India\",\"state\":\"tamilnadu\",\"city\":\"Chennai\",\"area\":\"Velachery\"}', 6, '2024-02-09 08:27:09', '2024-02-09 08:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `otpverfication`
--

CREATE TABLE `otpverfication` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp_code` int(11) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otpverfication`
--

INSERT INTO `otpverfication` (`id`, `otp_code`, `otp_expires_at`, `user`, `created_at`, `updated_at`) VALUES
(1, 8374, '2024-01-29 04:09:51', 'Dextra Nanthini', '2024-01-29 04:00:00', '2024-01-29 04:00:00'),
(2, 3593, '2024-01-29 05:05:50', NULL, '2024-01-29 04:55:57', '2024-01-29 04:55:57'),
(3, 6250, '2024-01-29 05:21:31', 'nanthini7596@gmail.com', '2024-01-29 05:11:37', '2024-01-29 05:11:37'),
(4, 7498, '2024-01-30 02:29:47', 'nanthini7596@gmail.com', '2024-01-30 02:19:54', '2024-01-30 02:19:54'),
(5, 8629, '2024-01-30 02:33:28', 'nanthini7596@gmail.com', '2024-01-30 02:23:34', '2024-01-30 02:23:34'),
(6, 5922, '2024-01-30 02:37:26', 'nanthini7596@gmail.com', '2024-01-30 02:27:32', '2024-01-30 02:27:32'),
(7, 3438, '2024-01-30 02:45:22', 'nanthini7596@gmail.com', '2024-01-30 02:35:28', '2024-01-30 02:35:28'),
(8, 5350, '2024-01-31 02:44:42', 'nanthini7596@gmail.com', '2024-01-31 02:34:48', '2024-01-31 02:34:48'),
(9, 4607, '2024-01-31 03:04:46', 'nanthini7596@gmail.com', '2024-01-31 02:54:53', '2024-01-31 02:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `brands` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `brands`, `created_at`, `updated_at`) VALUES
(2, 'Aqua', 'tes', 230.00, 2, 'aqua12', '2024-02-05 02:55:53', '2024-02-05 02:55:53'),
(3, 'Marina', 'test', 500.00, 3, 'marina34', '2024-02-05 02:56:33', '2024-02-05 02:56:33'),
(4, 'uw', 'ajsa', 56.00, 2, 'ass', '2024-02-05 02:59:38', '2024-02-05 02:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `ratings` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `username`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 'nanthini7996@gmail.com', 4, '2024-02-06 02:04:52', '2024-02-06 02:04:52'),
(2, 'serina123@gmail.com', 5, '2024-02-06 05:35:17', '2024-02-06 05:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country`, `created_at`, `updated_at`) VALUES
(1, 'tamilnadu', 1, '2024-01-24 01:51:08', '2024-01-24 01:51:08'),
(2, 'Kerla', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superadmin_login`
--

CREATE TABLE `superadmin_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `superadmin_login`
--

INSERT INTO `superadmin_login` (`id`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'dextrawebdeveloper@gmail.com', '$2y$10$QDSR/09S7cgejUIHrEiZS.Gn8oxCVbAJJ6cuJouWa4qgSEvuEfC92', 1, '2024-02-05 12:41:14', '2024-02-05 12:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'dextrawebdeveloper@gmail.com', '2024-01-24 01:49:59', '$2y$10$nSGaNf3UlkdY2.lfvbJglepVHpVclTwAEQ8u/DMYz4qHk0w9exhH6', NULL, '2024-01-24 01:49:59', '2024-01-24 01:49:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otpverfication`
--
ALTER TABLE `otpverfication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin_login`
--
ALTER TABLE `superadmin_login`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otpverfication`
--
ALTER TABLE `otpverfication`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `superadmin_login`
--
ALTER TABLE `superadmin_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
