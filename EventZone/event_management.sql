-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 07:50 PM
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
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `event_date`, `price`, `user_id`, `location`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(2, 'game play', 'game is the', NULL, '2025-04-16', 750.00, 4, NULL, NULL, NULL, NULL, NULL),
(33, 'Tech Conference 2025', 'A gathering of tech enthusiasts, developers, and entrepreneurs.', 'https://via.placeholder.com/600x400?text=Tech+Conference', '2025-05-10', 250.00, 2, 'Dhaka', '2025-05-10', '2025-05-12', '10:00:00', '17:00:00'),
(34, 'Music Fest', 'A full-day music festival with local and international artists.', 'https://via.placeholder.com/600x400?text=Music+Fest', '2025-06-15', 150.00, 2, 'Chittagong', '2025-06-15', '2025-06-15', '14:00:00', '22:00:00'),
(35, 'Startup Workshop', 'An interactive session for startup founders and mentors.', 'https://via.placeholder.com/600x400?text=Startup+Workshop', '2025-07-20', 50.00, 3, 'Noakhali', '2025-07-20', '2025-07-20', '09:00:00', '13:00:00'),
(36, 'Photography Bootcamp', 'Learn the fundamentals of photography in this weekend bootcamp.', 'https://via.placeholder.com/600x400?text=Photography+Bootcamp', '2025-08-05', 80.00, 2, 'Sylhet', '2025-08-05', '2025-08-06', '10:00:00', '16:00:00'),
(37, 'AI & Machine Learning Seminar', 'Explore the future of AI with expert speakers.', 'https://via.placeholder.com/600x400?text=AI+Seminar', '2025-09-12', 200.00, 3, 'Dhaka', '2025-09-12', '2025-09-13', '11:00:00', '18:00:00'),
(38, 'Career Fair 2025', 'Meet top recruiters and find your dream job.', 'https://via.placeholder.com/600x400?text=Career+Fair', '2025-10-01', 0.00, 2, 'Khulna', '2025-10-01', '2025-10-01', '10:00:00', '16:00:00'),
(39, 'Gaming Expo', 'Experience the latest games and gaming tech.', 'https://via.placeholder.com/600x400?text=Gaming+Expo', '2025-10-25', 120.00, 3, 'Rajshahi', '2025-10-25', '2025-10-26', '12:00:00', '20:00:00'),
(40, 'Cultural Night', 'Enjoy a night of cultural performances and food.', 'https://via.placeholder.com/600x400?text=Cultural+Night', '2025-11-14', 100.00, 2, 'Barisal', '2025-11-14', '2025-11-14', '18:00:00', '22:00:00'),
(41, 'Women in Tech', 'Empowering women in the technology industry.', 'https://via.placeholder.com/600x400?text=Women+in+Tech', '2025-12-03', 75.00, 2, 'Dhaka', '2025-12-03', '2025-12-03', '10:00:00', '14:00:00'),
(42, 'Food Carnival', 'Taste delicious dishes from all over Bangladesh.', 'https://via.placeholder.com/600x400?text=Food+Carnival', '2025-12-20', 60.00, 3, 'Sylhet', '2025-12-20', '2025-12-21', '11:00:00', '19:00:00'),
(43, 'Design Workshop 2025', 'A hands-on design workshop for beginners and professionals.', NULL, '2025-04-16', 120.00, 3, 'Noakhali', '2025-04-17', '2025-04-18', '05:22:00', '07:25:00'),
(44, 'Design Workshop 2026 update', 'A hands-on design workshop for beginners and professionals.', 'images/sJqPM9H9y4GjwqjRisFx3BEHkUjZ89kTfDLdQ1Fr.png', '2025-04-17', 170.00, 3, 'Noakhali', '2025-04-17', '2025-04-18', '17:29:00', '19:31:00'),
(45, 'Design Workshop 2025 update', 'hl', 'images/UfvFCXbpKV5Y7D1U6dPvli2ufbLKdqSYsFRQ6jY5.png', '2025-04-17', 178.00, 3, 'Noakhali', '2025-04-17', '2025-04-18', NULL, NULL);

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_04_190035_create_events_table', 1),
(5, '2025_04_04_190036_create_orders_table', 1),
(6, '2025_04_04_190036_create_tickets_table', 1),
(8, '2025_04_11_050838_add_is_admin_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `event_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `name`, `email`, `event_id`) VALUES
(1, '2025-04-16 12:30:08', '2025-04-16 12:30:08', 'MD Billal Hossain', 'billalmia297222@gmail.com', NULL),
(2, '2025-04-17 06:16:41', '2025-04-17 06:16:41', 'Billal', 'asif.i48al@gmail.com', NULL),
(3, '2025-04-17 07:22:12', '2025-04-17 07:22:12', 'Billal', 'asif.i48al@gmail.com', NULL),
(4, '2025-04-17 07:46:46', '2025-04-17 07:46:46', 'hgvxc', 'billalmia297@gmail.com', 35);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0TUViABEhCTkxSJ56tVnQ3uGpc7KiCIh2k8weEx1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHk0NU01OVZsREdCak1mOU5GNWRLTXN4aXEzV0tVS0VLT084ekMxWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1744919533);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `bio` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `bio`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(2, 'MD Billal Hossain', 'billalmia2972222@gmail.com', NULL, NULL, NULL, '$2y$12$9tZ7BUC1eTlwKvMspnyWlO65IwGE7VejpS/DP3YlVabWyD5qp9Irm', NULL, '2025-04-10 23:46:34', '2025-04-10 23:46:34', 0),
(3, 'MD Billal Hossain', 'billal@gmail.com', 'Hello everyone', 'profiles/4rlD8VgY0KW8c1q57zDEJMHeBr7OaL16OB8hPSl5.png', NULL, '$2y$12$mPqB01pBnTtIitfr6rtkK.JLOVQn6oJx8VtsnPfIHH0jWFsZAXv4m', NULL, '2025-04-10 23:59:04', '2025-04-17 13:38:55', 0),
(4, 'Admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$12$5Mg7c/jkphKTyz.wnHANqOP/zOGN89JKyPyxeoo1vfao2Q0FLhfyW', NULL, '2025-04-11 00:57:16', '2025-04-11 03:56:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_event_id_index` (`event_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
