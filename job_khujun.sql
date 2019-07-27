-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 05:49 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_khujun`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'None', '2019-07-26 07:33:52', '2019-07-26 07:33:52'),
(2, 'BK_Z', '2019-07-26 07:34:21', '2019-07-26 07:34:21'),
(3, 'BRAC', '2019-07-27 07:51:40', '2019-07-27 07:51:40'),
(4, 'Samsung', '2019-07-27 08:06:25', '2019-07-27 08:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_applicant_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `job_title`, `job_description`, `salary`, `location`, `country`, `job_applicant_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Web Developer', 'HTML CSS JS LARAVEL', '20000', 'Gulsan', 'Bangladesh', NULL, '2019-07-26 07:37:50', '2019-07-27 07:49:10'),
(2, 2, 'Laravel Developer', 'Mid level knowledge & good multitasking skills', '30000', 'Gulshan 2', 'Bangladesh', '8', '2019-07-26 08:05:52', '2019-07-27 08:22:42'),
(3, 3, 'Support Engineer', 'Debugging System Flaws & Report', '25000', 'Banani', 'Bangladesh', '8,3', '2019-07-27 07:53:58', '2019-07-27 08:24:49'),
(4, 4, 'Programmer', 'C, Java, .NET', '30000', 'Niketon', 'Bangladesh', '3', '2019-07-27 08:07:16', '2019-07-27 08:24:45'),
(5, 2, 'WordPress Plugins developer', 'Wordpress', '18000', 'Mirpur DOHS', 'Bangladesh', '8', '2019-07-27 08:08:42', '2019-07-27 08:22:30'),
(6, 3, 'QA Engineer', 'QA Software useage', '22000', 'Dhanmondi', 'Bangladesh', NULL, '2019-07-27 08:58:03', '2019-07-27 08:58:03');

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
(3, '2019_07_25_051646_create_jobs_table', 1),
(4, '2019_07_25_070707_create_companies_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `admin_company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_pic_path` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.png',
  `cv_path` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `admin`, `admin_company_id`, `email`, `pro_pic_path`, `cv_path`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'None', 'None', 0, 1, 'none@gmail.com', 'images/default.png', NULL, NULL, '$2y$10$NEcodnE0HaUnABMx2MygJ.GN26PGdb5YyX8lPyBrTJxLJ2Rv46Gn6', NULL, '2019-07-26 07:33:52', '2019-07-26 07:33:52'),
(2, 'Arif', 'Faysal', 0, 2, 'ayon@gmail.com', 'images/default.png', NULL, NULL, '$2y$10$Vaca5nv8yy/453HXKT5XxuQOWalm0rVjPgbkHKYmerMNaa5Wq.VmG', NULL, '2019-07-26 07:34:21', '2019-07-26 07:34:21'),
(3, 'Shabu', 'Babu', 0, 1, 'babu@gmail.com', 'images/fQivjDaEK0sg5TQzCdzPLL56zJdEkgkdwdNMa3NZ.jpeg', 'cv/MLyzu7NNeNCSntHxMO0NlXdnVUJivjETujLNh57k.pdf', NULL, '$2y$10$IfRDXHQqsBTAlOOE.E83iegyfU.2M9/Ui0bEYjbWBnDnGuHAu.o4y', NULL, '2019-07-26 07:35:08', '2019-07-26 07:35:08'),
(5, 'giri', 'giri', 0, 1, 'giri@gmail.com', 'images/QqRdLByPdtXVvU5Rb1DFdhOtiLs2tXuXGh3mVNDw.gif', NULL, NULL, '$2y$10$HNDKoJQgYZZP.H9cnCPGGeUz0GKs94ssnfPrMguBQRAdbGdxYWeE6', NULL, '2019-07-27 01:20:43', '2019-07-27 01:20:43'),
(6, 'Rifat', 'Zabin', 0, 3, 'rifat@gmail.com', 'images/default.png', NULL, NULL, '$2y$10$Pj.dsjsgBIIwOjc7bDQzBuA3CCti2XulYvodeJoBdh3PGnjvOsVye', NULL, '2019-07-27 07:51:40', '2019-07-27 07:51:40'),
(7, 'Shahadat', 'Sunny', 0, 4, 'sunny@gmail.com', 'images/default.png', NULL, NULL, '$2y$10$muQx8UlHphGG1JNmd72R/uowHk.2xhj3e4FHR1g7i5qYsxjrZ0T7e', NULL, '2019-07-27 08:06:25', '2019-07-27 08:06:25'),
(8, 'Sadeqa', 'Hossain', 0, 1, 'sadeqa@gmail.com', 'images/biIKCZ4rjsgrsG02OeSxGmXWTPfwiKc2TSsCvo5w.jpeg', 'cv/BDF9nmPmCTNxud1AKaPyM53K9vUPZSEEk1DG90lc.pdf', NULL, '$2y$10$yfumQZ0Ml3fWwTidYWqjCe7kfjjOMDois1dab4jsmN8.2a2p29aiC', NULL, '2019-07-27 08:20:22', '2019-07-27 08:20:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `admin_company_id` (`admin_company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`admin_company_id`) REFERENCES `companies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
