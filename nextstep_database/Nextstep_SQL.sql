-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 12:12 AM
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
-- Database: `nextstep_aplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` varchar(255) DEFAULT NULL,
  `id_tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `id_tanggal`, `id_user`) VALUES
(1, 'Story of Nextstep', 'ukiii', NULL, '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_post`
--

CREATE TABLE `tb_post` (
  `id_post` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_user` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_post`
--

INSERT INTO `tb_post` (`id_post`, `deskripsi`, `foto`, `id_user`) VALUES
(1, 'asdas', 'uploads/konsultasi-dokter-anak-removebg-preview.png', 1),
(2, 'sadasd', 'uploads/konsultasi-dokter-anak.jpg', 1),
(0, 'helo world', '', 3),
(0, 'jdjdjdd', '', 5),
(0, 'jssjs', '', 5),
(0, 'hai all aku sedang membangun project cafe\r\n\r\njika bermirnat  berpartisipasi dafgtar blbla\r\n\r\n', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`, `bio`, `profile_picture`, `title`) VALUES
(1, 'Muhammad Zaky', 'zaky', 'jackdesign03@gmail.com', 'Jancokkalian123', 'nama saya muhammad zaky saya berasal dari sidoarjo dan saya seorang mahasiswa teknik informatik politeknik negeri jember angkatan 2023 dan saya berumur 20 tahun dan saya ingin menjadi seorang founder dan ceo nextstep sebuah social media', 'uploads/1.jpg', 'CEO - Nextstep'),
(2, 'Muhammad Ghufron', 'ghufron', 'ghufron123@gmail.com', 'jancok123', 'saya lahir di sidoarjo dan sma di sma antartika sidoarjo dan kuliah jurusan teknologi pendidikan universitas negeri surabaya', 'uploads/2.jpg', 'CEO - Nextstep'),
(3, 'zaky', '', 'zaky@gmail.com', '$2y$10$nJ1QJOYdicmOdG4s57g44.FFOtvuESgYMav0g1XF7o.bWnaj0.svC', 'Halo saya zaky', 'uploads/3.jpg', 'CEO - We Fish'),
(4, 'zaky12345', '', 'qwqw@gmail.com', '$2y$10$AT3AJnLDttWlsP27iuhEBu5/AxArjI.Fq1oqUxbfGPKJ18PPaUT9S', NULL, NULL, NULL),
(5, 'zaky', '', 'nana@gmail.com', '$2y$10$1rHh9Nb1G99hbol2hMXtg.QtZwSSLZ6kdM3Jp9L/KjI4BMEJlTYye', 'Halo iam zaky', 'uploads/5.jpg', 'CEO - Nextstep');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD CONSTRAINT `tb_blog_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
