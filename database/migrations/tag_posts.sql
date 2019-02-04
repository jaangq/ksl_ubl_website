-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 04, 2019 at 04:57 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksl_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tag_posts`
--

CREATE TABLE `tag_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_posts` int(10) UNSIGNED NOT NULL,
  `id_tags` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_posts`
--

INSERT INTO `tag_posts` (`id`, `id_posts`, `id_tags`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2018-09-08 09:58:08', '2018-09-08 09:58:08'),
(2, 2, 3, '2018-09-08 09:58:08', '2018-09-08 09:58:08'),
(3, 3, 2, '2018-09-08 09:58:08', '2018-09-08 09:58:08'),
(4, 3, 3, '2018-09-08 09:58:08', '2018-09-08 09:58:08'),
(6, 4, 4, '2018-09-08 10:11:06', '2018-09-08 10:11:06'),
(7, 5, 4, '2018-09-08 10:19:56', '2018-09-08 10:19:56'),
(8, 6, 4, '2018-09-08 10:55:11', '2018-09-08 10:55:11'),
(9, 7, 4, '2018-09-08 11:16:17', '2018-09-08 11:16:17'),
(10, 8, 4, '2018-09-08 11:41:01', '2018-09-08 11:41:01'),
(11, 9, 4, '2018-09-08 11:50:41', '2018-09-08 11:50:41'),
(12, 9, 8, '2018-09-08 11:50:42', '2018-09-08 11:50:42'),
(13, 10, 4, '2018-09-08 11:57:16', '2018-09-08 11:57:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tag_posts`
--
ALTER TABLE `tag_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_posts_id_posts_foreign` (`id_posts`),
  ADD KEY `tag_posts_id_tags_foreign` (`id_tags`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tag_posts`
--
ALTER TABLE `tag_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
