-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 13, 2023 at 01:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextstepapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_09_07_115327_blog', 1),
(4, '2023_09_07_115350_posting', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` int NOT NULL,
  `id` int NOT NULL,
  `judul_berita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi_berita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar_berita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id_blog`, `id`, `judul_berita`, `isi_berita`, `gambar_berita`, `created_at`, `updated_at`) VALUES
(1, 1, 'akuu', 'lorem ', 'project-3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int UNSIGNED NOT NULL,
  `id` int NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `id`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'loremmmmm', 'project.jpg', NULL, NULL),
(2, 6, 'loremm', 'project.jpg', NULL, NULL),
(25, 6, 'akuaaaaa', '8CcWK62h2ny5sCXWPhlVvI3HRkECv0xY6eMyMu2g.jpg', '2023-09-09 07:10:26', '2023-09-09 07:10:26'),
(26, 6, 'akuaaaaa', '2dqab0AAa643loDUYtFhbcx73NW04p84xp03hpcn.jpg', '2023-09-09 07:10:31', '2023-09-09 07:10:31'),
(27, 6, 'akuaaaaa', 'q8gi3CwL63YETWl67Ak9qa2cg3V8Pc0MZj0azfn2.jpg', '2023-09-09 07:11:36', '2023-09-09 07:11:36'),
(28, 6, 'akuaaaaa', 't0GAJkFjDAW6RaCXNBdBwTNLVPvRbcT4vlOfQbdj.jpg', '2023-09-09 07:11:55', '2023-09-09 07:11:55'),
(29, 6, 'asuuu kau', '94yyhiYOnFxIHPvp5rKNpVSJnOUTIQQOhlkEgouG.jpg', '2023-09-09 07:15:24', '2023-09-09 07:15:24'),
(30, 1, 'anjing', 'ZR0wrWm08gYUgItQPeWeTZ7MbaihBxUvt4XqRDAE.jpg', '2023-09-10 00:33:11', '2023-09-10 00:33:11'),
(31, 1, 'akuaa', '0IsQwgoDYV9xZNUD5sP3Un0mFRLF2LPfGNXzi6tD.jpg', '2023-09-10 00:33:24', '2023-09-10 00:33:24'),
(32, 1, 'aku suka dia', 'zbhe73pDHVozniUtV6OX7ysIxcneWfQRddEOLzK9.jpg', '2023-09-10 00:34:21', '2023-09-10 00:34:21'),
(33, 1, 'anjing', '4L6a9VYHlj6t4gnVLqdk21gJYevOAMVAqnYiLJEx.jpg', '2023-09-10 18:12:05', '2023-09-10 18:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profil_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `bio`, `profil_picture`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', '@admin', 'admin@gmail.com', '$2y$10$f//KewYgnGrnfQVT2Ecik.rCLyBdvW3r98yeogTSpTfGHztykxRiW', 'loreman', 'profile.jpg', 'co-founder', NULL, '2023-09-10 22:50:32'),
(4, 'aku', NULL, 'aku@gmail.com', '$2y$10$O9Q3qrE7xgbRbV.YlckwjuVKSNXuJCWzTBPzuUU7Fv7K6OJ.fWNOS', NULL, NULL, NULL, '2023-09-07 20:19:22', '2023-09-07 20:19:22'),
(6, 'yudopriaa', '@yudo', 'yudopri@gmail.com', '$2y$10$MhUcsUJyeY1gN3lImM832.1NKbYBK1Ac5DKpKOQpxU.D0OLgtmace', 'loremmm', 'rzTThdmtDkvVnMaXgsuUw1ZTxOeKrJcXYfRGVX4q.jpg', 'founder', '2023-09-08 04:13:22', '2023-09-10 00:42:21'),
(12, 'joko', '@joko', 'joko@gmail.com', '$2y$10$Vs/hY4M78VwlXO8SfEyRq.cyatOqHI2M8cNaHXCFkzTSEPx/lgUMS', NULL, NULL, NULL, '2023-09-08 04:19:19', '2023-09-08 04:19:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_post`
--
ALTER TABLE `tb_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_post`
--
ALTER TABLE `tb_post`
  MODIFY `id_post` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
