-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2024 at 04:06 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lapor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `nama_kategori` text NOT NULL,
  `ket_kategori` text,
  `status_kategori` int(5) NOT NULL DEFAULT '0' COMMENT '0 = Tidak Aktif, 1 = Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `ket_kategori`, `status_kategori`) VALUES
(1, 'Agama', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_klasifikasi`
--

CREATE TABLE `tb_klasifikasi` (
  `id_klasifikasi` bigint(20) NOT NULL,
  `nama_klasifikasi` text NOT NULL,
  `ket_klasifikasi` text,
  `status_klasifikasi` int(5) NOT NULL DEFAULT '0' COMMENT '0 = Tidak Aktif, 1 = Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_klasifikasi`
--

INSERT INTO `tb_klasifikasi` (`id_klasifikasi`, `nama_klasifikasi`, `ket_klasifikasi`, `status_klasifikasi`) VALUES
(1, 'Pengaduan', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` bigint(20) NOT NULL,
  `id_klasifikasi` bigint(20) NOT NULL,
  `judul_laporan` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `no_whatsapp` text NOT NULL,
  `tanggal_laporan` datetime NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `file_pendukung` text,
  `status` int(10) DEFAULT '0' COMMENT '0=proses, 1 = Valid, 2 = Tidak Valid',
  `created_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `id_klasifikasi`, `judul_laporan`, `isi_laporan`, `id_kategori`, `email`, `no_whatsapp`, `tanggal_laporan`, `tanggal_kejadian`, `file_pendukung`, `status`, `created_by`) VALUES
(1, 1, 'Judul', 'Isi', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 15:52:50', '2024-11-05', 'images.png', 0, NULL),
(2, 1, 'Judul', 'isi', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 15:54:09', '2024-11-05', 'images.png', 0, NULL),
(3, 1, 'Judul', 'isi', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 15:57:39', '2024-11-05', '', 0, NULL),
(4, 1, 'Judul Tes', 'Isi Laporan', 1, 'evinopita973@gmail.com', '08674576446547', '2024-11-05 15:59:53', '2024-11-05', '', 0, NULL),
(5, 1, 'Judul Tes 2', 'isi 2', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 16:05:54', '2024-11-05', '', 0, NULL),
(6, 1, 'Judul Tes 3', 'tes3', 1, 'bilal270890@gmail.com', '08674576446547', '2024-11-05 16:07:13', '2024-11-05', '', 0, NULL),
(7, 1, 'Judul Tes', 'sd', 1, 'sjumi918@gmail.com', '08674576446547', '2024-11-05 16:08:31', '2024-11-05', '', 0, NULL),
(8, 1, 'Judul Tes', 'kn', 1, 'bilal270890@gmail.com', '08674576446547', '2024-11-05 16:09:29', '2024-11-05', '', 0, NULL),
(9, 1, 'Judul Tes', 'd', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:14:07', '2024-11-05', '', 0, NULL),
(10, 1, 'Judul Tes', 'd', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:14:21', '2024-11-05', '', 0, NULL),
(11, 1, 'Judul Tes 2', 'k', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 16:21:44', '2024-11-05', '', 0, NULL),
(12, 1, 'Judul Tes', 'g', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:22:11', '2024-11-05', 'generated_image (2).png', 0, NULL),
(13, 1, 'Judul Tes', 'g', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:26:22', '2024-11-05', 'generated_image (2).png', 0, NULL),
(14, 1, 'Judul Tes', 'g', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:26:48', '2024-11-05', 'generated_image (2).png', 0, NULL),
(15, 1, 'Judul Tes', 'g', 1, 'resydestri12@gmail.com', '08674576446547', '2024-11-05 16:27:41', '2024-11-05', 'generated_image (2).png', 0, NULL),
(16, 1, 'Judul Tes', 'tg', 1, 'bilal270890@gmail.com', 'ytht', '2024-11-05 16:29:10', '2024-11-05', 'images.jpg', 0, NULL),
(17, 1, 'Judul Tes', 'tg', 1, 'bilal270890@gmail.com', 'ytht', '2024-11-05 16:29:37', '2024-11-05', 'images.jpg', 0, NULL),
(18, 1, 'Judul Tes', 'p', 1, 'ricoardisaputra@gmail.com', '08674576446547', '2024-11-05 16:30:35', '2024-11-05', 'generated_image (1).png', 0, 'admin'),
(19, 1, 'Judul Tes', 'o', 1, 'sjumi918@gmail.com', '08674576446547', '2024-11-05 16:31:51', '2024-11-05', 'Sertifikat - 000.7.5.6 _ 06831 - 2024 _ BPSDM-III.pdf', 0, NULL),
(20, 1, 'aasas', 'asasas', 1, 'ricoardisaputra@gmail.com', '352345235', '2024-11-18 06:33:43', '2001-01-01', 'Rico Ardi Saputra CV 2023-1-3.pdf', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_klasifikasi`
--
ALTER TABLE `tb_klasifikasi`
  MODIFY `id_klasifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
