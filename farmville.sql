-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 11:29 AM
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
-- Database: `farmville`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_24_085123_create_users_table', 2),
(6, '2023_08_24_135135_create_others_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('Employee','Customer') DEFAULT NULL,
  `specific_role` enum('Farmer','Manager','Laborer','New Customer','Returning Customer') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `name`, `role`, `specific_role`, `address`, `phone_no`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Mr Krishok', 'Employee', 'Farmer', 'Lake Paar', '0179972138', 15000.00, NULL, NULL),
(2, 'Krishok', 'Employee', 'Farmer', 'Ghaatpaar', '0183647856', 20000.00, NULL, NULL),
(3, 'Bossman', 'Employee', 'Manager', 'Gulshan', '01938475832', 50000.00, NULL, NULL),
(4, 'Mr. Customer', 'Customer', 'Returning Customer', 'asdasdas', '0183434343', NULL, NULL, '2023-08-25 00:37:31'),
(5, 'sakeb', 'Employee', 'Farmer', 'Dhanmondi', '23213123123', 40000.00, '2023-08-24 15:14:28', '2023-08-24 17:01:40'),
(6, 'Ken', 'Employee', 'Manager', 'Dhanmondi', '0183242342', 50000.00, '2023-08-24 16:32:11', '2023-08-24 16:32:11'),
(7, 'Scott', 'Customer', 'New Customer', 'Dhanmondi', '0174556434', NULL, '2023-08-24 17:22:39', '2023-08-24 17:30:02'),
(8, 'Mr. Customer', 'Customer', 'New Customer', 'Dhanmondi', '53463453454', NULL, '2023-08-25 00:42:40', '2023-08-25 00:42:40'),
(9, 'Oshohay Bekti', 'Employee', 'Laborer', 'Tejgaon', '0178989678', 10000.00, '2023-08-25 02:48:02', '2023-08-25 02:51:42'),
(10, 'Provat', 'Customer', 'Returning Customer', 'Green Road', '0183434343', NULL, '2023-08-25 02:53:49', '2023-08-25 03:27:52');

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
(1, 'Abid', 'abid@gmail.com', NULL, '$2y$10$tQ4p/TRBMiI.A98kJEpDA./6/OGUJQERBCcXhRSRFVN3MBMdsYIfG', NULL, '2023-08-24 04:39:56', '2023-08-24 04:39:56'),
(2, 'Farhan', 'farhan@gmail.com', NULL, '$2y$10$kYDnyCA.GHe.dz7VpcvciecFZX3fGjXlYtsHQrRMkEWq6BYMXsPyW', NULL, '2023-08-24 04:54:25', '2023-08-24 04:54:25'),
(3, 'furr', 'farhan11@gmail.com', NULL, '$2y$10$Sy9RZ9Bu9scsFVqyNbzMo.xPi966zXZyxC28DV.yVih2t/TXX7O76', NULL, '2023-08-24 04:55:19', '2023-08-24 04:55:19'),
(5, 'Faiyaz', 'faiyaz@gmail.com', NULL, '$2y$10$7dXub6MeIcsMS0HOCMf91uZydwMsa35zQTdHFeZEa5dvc5/a.y.da', NULL, '2023-08-24 04:56:49', '2023-08-24 04:56:49'),
(6, 'Ken', 'ken@gmail.com', NULL, '$2y$10$lnox8N/.rH/pBDi158e7buocv1wbzKOjiU5NatQ80UAtgaT1AfRa6', NULL, '2023-08-24 05:08:04', '2023-08-24 05:08:04'),
(7, 'Himel', 'himel@gmail.com', NULL, '$2y$10$5EDp39CIL7/XFPwO4HENS.HIB7t5.HqtoDtwVRaHoKbM/T8xkgnAC', NULL, '2023-08-24 05:29:24', '2023-08-24 05:29:24'),
(8, 'nazmus', 'nazmus@gmail.com', NULL, '$2y$10$ERv093xJQUM/m06eZuu2d.Mj8OnyXCTKjtiOZjHqs4eX4FsHpBVzK', NULL, '2023-08-24 07:22:54', '2023-08-24 07:22:54'),
(9, 'Mahin', 'mahin@gmail.com', NULL, '$2y$10$O41eRQ.mksVcTfOCxF7Th.Tk1QRXIt1x5E/jM7TmaB4PSffvXp59G', NULL, '2023-08-24 07:34:07', '2023-08-24 07:34:07'),
(10, 'Barish', 'barish@gmail.com', NULL, '$2y$10$jbie0Z5MvAMvvR35SvZ9puPtL5EakKoveRKZ3pJBlKl7Db4yv.AHa', NULL, '2023-08-25 02:39:21', '2023-08-25 02:39:21');

--
-- Indexes for dumped tables
--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `crop` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
