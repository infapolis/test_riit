-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 29, 2022 at 08:14 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-riit`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_cities`
--

CREATE TABLE `ref_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_cities`
--

INSERT INTO `ref_cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Москва', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(2, 'Санкт-Петербург', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(3, 'Новосибирск', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(4, 'Красноярск', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(5, 'Владивосток', '2022-11-21 22:49:33', '2022-11-21 22:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `ref_education`
--

CREATE TABLE `ref_education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_education`
--

INSERT INTO `ref_education` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Среднее', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(2, 'Бакалавр', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(3, 'Магистр', '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(4, 'Специалист', '2022-11-21 22:49:33', '2022-11-21 22:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `education_id`, `created_at`, `updated_at`) VALUES
(1, 'Сергей', 1, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(2, 'Владимир', 2, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(3, 'Иван', 1, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(4, 'Семен', 3, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(5, 'Анна', 1, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(6, 'Елена', 2, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(7, 'Мария', 4, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(8, 'Алексей', 4, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(9, 'Николай', 3, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(10, 'Оксана', 4, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(11, 'Александр', 3, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(12, 'Ирина', 2, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(13, 'Михаил', 4, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(14, 'Мария', 4, '2022-11-21 22:49:33', '2022-11-21 22:49:33'),
(15, 'Евгений', 1, '2022-11-21 22:49:33', '2022-11-21 22:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `users_to_cities`
--

CREATE TABLE `users_to_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ref_city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_to_cities`
--

INSERT INTO `users_to_cities` (`id`, `user_id`, `ref_city_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 4, 4, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 8, 3, NULL, NULL),
(9, 9, 4, NULL, NULL),
(10, 10, 5, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 2, NULL, NULL),
(13, 13, 3, NULL, NULL),
(14, 14, 4, NULL, NULL),
(15, 15, 5, NULL, NULL),
(16, 1, 2, NULL, NULL),
(17, 2, 3, NULL, NULL),
(18, 3, 4, NULL, NULL),
(19, 4, 5, NULL, NULL),
(20, 5, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_cities`
--
ALTER TABLE `ref_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_education`
--
ALTER TABLE `ref_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_to_cities`
--
ALTER TABLE `users_to_cities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_cities`
--
ALTER TABLE `ref_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ref_education`
--
ALTER TABLE `ref_education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_to_cities`
--
ALTER TABLE `users_to_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
