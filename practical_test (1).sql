-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2023 at 03:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practical_test`
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
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dob` int(11) NOT NULL,
  `pan_no` varchar(25) NOT NULL,
  `gender` char(1) NOT NULL,
  `marital_status` int(11) NOT NULL,
  `education` int(11) NOT NULL,
  `monthly_income` int(11) NOT NULL,
  `salary_credit_type` int(11) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `pincode` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `office_address_1` text NOT NULL,
  `office_address_2` text NOT NULL,
  `office_pincode` varchar(25) NOT NULL,
  `office_state` varchar(25) NOT NULL,
  `office_city` varchar(25) NOT NULL,
  `employment_type` tinyint(1) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_type` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `total_exp` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lenders`
--

CREATE TABLE `lenders` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `logo` varchar(15) NOT NULL,
  `app_url` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lenders`
--

INSERT INTO `lenders` (`id`, `name`, `logo`, `app_url`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Cashe', '', '', 1, 1, 1, '2023-10-30 11:21:03', '2023-10-30 11:21:03'),
(4, 'EarlySalary', '', '', 1, 1, 1, '2023-10-30 11:21:16', '2023-10-30 11:21:16'),
(5, 'Upwards', '', '', 1, 1, 1, '2023-10-30 11:21:25', '2023-10-30 11:21:25'),
(6, 'Paysense', '', '', 1, 1, 1, '2023-10-30 11:21:34', '2023-10-30 11:21:34'),
(7, 'MoneyWide', '', '', 1, 1, 1, '2023-10-30 11:21:42', '2023-10-30 11:21:42'),
(8, 'LoanTap', '', '', 1, 1, 1, '2023-10-30 11:21:50', '2023-10-30 11:21:50'),
(9, 'MoneyView', '', '', 1, 1, 1, '2023-10-30 11:21:59', '2023-10-30 11:21:59'),
(10, 'KreditBee', '', '', 1, 1, 1, '2023-10-30 11:22:10', '2023-10-30 11:22:10'),
(11, 'Privo', '', '', 1, 1, 1, '2023-10-30 11:22:20', '2023-10-31 11:39:51'),
(12, 'MoneyWide', '1698752883.png', '', 1, 1, 1, '2023-10-31 11:48:03', '2023-10-31 11:48:03');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_09_043722_create_companies_table', 1),
(6, '2023_10_09_043758_create_employees_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_favicon` varchar(50) NOT NULL,
  `org_logo` varchar(50) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `admin_full_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `membership_certificate` varchar(50) NOT NULL,
  `credit_institution` varchar(50) NOT NULL,
  `authorization_certificate` varchar(50) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `org_name`, `org_favicon`, `org_logo`, `address_1`, `address_2`, `city`, `pincode`, `state`, `country`, `admin_full_name`, `admin_email`, `admin_phone`, `membership_certificate`, `credit_institution`, `authorization_certificate`, `currency`, `timezone`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'CreditBee 123', 'favi_1698761612.png', '1698761612.png', 'House No : 6, Gurukrupa Society, Radio Mirchi Road', 'Shyamal Cross Road, Ahmedabad', 'Ahmedabad', '380051', 'Gujarat', 'India', 'Super Admin', 'admin@gmail.com', '123456789', '', '', '', 'USD', 'Thu Apr 20 2023 19:49:24 GMT+0530 (India Standard Time)', 1, 1, '2023-10-31 14:42:54', '2023-11-01 03:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `pipelines`
--

CREATE TABLE `pipelines` (
  `id` int(11) NOT NULL,
  `pipeline_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stage_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pipelines`
--

INSERT INTO `pipelines` (`id`, `pipeline_type_id`, `name`, `stage_id`, `description`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'New Test Loan 23', 1, '', 1, 1, 1, '2023-10-31 03:19:51', '2023-10-31 03:19:51'),
(2, 2, 'test1', 1, '', 0, 1, 1, '2023-10-31 03:49:02', '2023-10-31 04:10:18'),
(3, 2, 'Offline DSA', 1, '', 1, 1, 1, '2023-10-31 03:49:39', '2023-10-31 03:49:39'),
(4, 3, 'Personal Loan123', 2, 'This is it', 1, 1, 1, '2023-10-31 03:49:51', '2023-10-31 04:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_types`
--

CREATE TABLE `pipeline_types` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pipeline_types`
--

INSERT INTO `pipeline_types` (`id`, `name`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Lenders Pipelines', 1, 1, 1, '2023-10-30 13:35:38', '2023-10-30 13:35:38'),
(3, 'Other Pipelines', 1, 1, 1, '2023-10-30 13:35:53', '2023-10-30 13:35:53'),
(4, 'Credit Card Pipelines', 0, 1, 1, '2023-10-30 13:36:09', '2023-10-30 13:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `amount` double NOT NULL,
  `duration` int(11) NOT NULL,
  `visit` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_role_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `assigned_to` longtext DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `parent_role_id`, `description`, `assigned_to`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'Role 1', 0, 'This is role 1', 'Harshal Kithoriya,Henisha Kithoriya', 1, 1, '2023-11-01 04:22:09', '2023-11-01 10:34:01'),
(4, 'Role 2', 0, 'This is role 2', 'Henisha Kithoriya', 1, 1, '2023-11-01 04:22:45', '2023-11-01 10:33:31'),
(5, 'Role 3', 0, 'This is role 3', NULL, 1, 1, '2023-11-01 04:44:48', '2023-11-01 04:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_val` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_key`, `setting_val`) VALUES
(1, '_token', 'hSj4whjk3Gs81Yui8j977JA9GBOBIxQyxzADEtv8'),
(2, 'app_name', 'Creditline'),
(3, 'app_email', 'info@creditline.com'),
(4, 'app_phone', '9876543210'),
(5, 'old_app_logo', '1698671465.png'),
(6, 'app_logo', '1698671881.png');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `json` longtext NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `name`, `json`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Test', '', 1, 1, 1, '2023-10-31 04:02:17', '2023-10-31 04:02:17'),
(2, 'Default Template', '', 1, 1, 1, '2023-10-31 04:02:17', '2023-10-31 04:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL DEFAULT 0,
  `country` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `avatar` varchar(25) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1-SA,2-user',
  `role_id` int(11) NOT NULL DEFAULT 0,
  `assigned_to` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `avatar`, `role`, `role_id`, `assigned_to`, `email_verified_at`, `password`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', 1234567890, 'India', 'Gujarat', 'Ahmedabad', 'Ahmedabad, Gujarat, India', '1698546459.png', 1, 0, 0, NULL, '$2y$10$tjxXFUjzLZ6me4jxk8z5f.5VL/hB/jiT6da.QW5WxwKcDksruwszi', NULL, 0, 1, '2023-10-08 23:35:58', '2023-10-28 21:32:13'),
(4, 'Harshal Kithoriya', 'vch242516@gmail.com', 9714191947, 'India', 'Gujarat', 'Ahmedabad', 'Ahmedabad, Gujarat, India', '1698376444.png', 2, 3, 4, NULL, '$2y$10$Yn3AbskEHlgNqKdCUcHdYOKSM2ZFgj5rC/o09sF2wgp6kaqLDk55G', NULL, 1, 1, '2023-10-26 21:28:47', '2023-11-01 05:02:28'),
(6, 'Henisha Kithoriya', 'henishakithoriya007@gmail.com', 9265724422, 'India', 'Maharasthra', 'Pune', '', NULL, 2, 3, 4, NULL, '$2y$10$/O3U4YeVLHA6CZ4lkIVrfu2dh0RHYP.H.SJyq9i6SiJ44cTe6s81K', NULL, 1, 1, '2023-11-01 05:03:31', '2023-11-01 05:04:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lenders`
--
ALTER TABLE `lenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pipelines`
--
ALTER TABLE `pipelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_types`
--
ALTER TABLE `pipeline_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lenders`
--
ALTER TABLE `lenders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pipelines`
--
ALTER TABLE `pipelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pipeline_types`
--
ALTER TABLE `pipeline_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
