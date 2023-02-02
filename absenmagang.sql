-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2023 at 02:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absenmagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` varchar(10) NOT NULL,
  `nama_bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
('1', 'Perencanaan'),
('2', 'Distribusi'),
('3', 'Niaga dan Manajemen Pelanggan'),
('4', 'Keuangan, Komunikasi dan Umum'),
('5', 'STI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id` int(11) NOT NULL,
  `nobp` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id`, `nobp`, `nama`, `jam_masuk`, `jam_keluar`, `tanggal`, `status`) VALUES
(141, '2011527002', 'Daffa Riza Muliya', '10:43:27', '10:43:34', '2023-01-16', 'Hadir'),
(146, '2011527002', 'Daffa Riza Muliya', '15:12:16', '00:00:00', '2023-01-17', 'Hadir'),
(174, '2011527002', 'Daffa Riza Muliya', '08:56:46', '11:23:11', '2023-01-18', 'Hadir'),
(182, '2011527002', 'Daffa Riza Muliya', '08:09:42', '08:09:50', '2023-01-19', 'Hadir'),
(183, '2011527001', 'Delicia Syifa Maghfira', '08:27:04', '10:11:25', '2023-01-19', 'Hadir'),
(184, '2011527002', 'Daffa Riza Muliya', '10:19:25', '00:00:00', '2023-01-20', 'Hadir'),
(185, '2011527001', 'Delicia Syifa Maghfira', '15:05:11', '15:59:31', '2023-01-20', 'Hadir'),
(186, '2011527002', 'Daffa Riza Muliya', '08:35:56', '00:00:00', '2023-01-24', 'Hadir'),
(187, '2011527001', 'Delicia Syifa Maghfira', '00:00:00', '00:00:00', '2023-01-24', 'Alfa'),
(188, '2011527002', 'Daffa Riza Muliya', '00:00:00', '00:00:00', '2023-01-25', 'Alfa'),
(189, '2011527001', 'Delicia Syifa Maghfira', '00:00:00', '00:00:00', '2023-01-25', 'Alfa'),
(190, '2011627289', 'Salman Gusnedi ', '00:00:00', '00:00:00', '2023-01-25', 'Alfa'),
(191, '2011527002', 'Daffa Riza Muliya', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(192, '2011527001', 'Delicia Syifa Maghfira', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(193, '2011627289', 'Salman Gusnedi ', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(194, '2011521001', 'Farhan Rizki Ghifara', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(195, '2011627287', 'Udin Syaifullah ', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(196, '2011627285', 'Abid Arrahman ', '00:00:00', '00:00:00', '2023-01-26', 'Alfa'),
(198, '2011527001', 'Delicia Syifa Maghfira', '00:00:00', '00:00:00', '2023-01-30', 'Alfa'),
(199, '2011627289', 'Salman Gusnedi ', '00:00:00', '00:00:00', '2023-01-30', 'Alfa'),
(200, '2011521001', 'Farhan Rizki Ghifara', '00:00:00', '00:00:00', '2023-01-30', 'Alfa'),
(201, '2011627287', 'Udin Syaifullah ', '00:00:00', '00:00:00', '2023-01-30', 'Alfa'),
(202, '2011627285', 'Abid Arrahman ', '00:00:00', '00:00:00', '2023-01-30', 'Alfa'),
(211, '2011527002', 'Daffa Riza Muliya', '11:18:18', '11:18:36', '2023-02-01', 'Hadir'),
(212, '2011527001', 'Delicia Syifa Maghfira', '00:00:00', '00:00:00', '2023-02-01', 'Alfa'),
(213, '2011627289', 'Salman Gusnedi ', '00:00:00', '00:00:00', '2023-02-01', 'Alfa'),
(214, '2011521001', 'Farhan Rizki Ghifara', '00:00:00', '00:00:00', '2023-02-01', 'Alfa'),
(215, '2011627287', 'Udin Syaifullah ', '00:00:00', '00:00:00', '2023-02-01', 'Alfa'),
(216, '2011627285', 'Abid Arrahman ', '00:00:00', '00:00:00', '2023-02-01', 'Alfa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nobp` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `surat_pernyataan` varchar(255) NOT NULL,
  `universitas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `id_bidang` varchar(500) NOT NULL,
  `id_subbidang` varchar(50) NOT NULL,
  `tanggalmasuk` varchar(255) NOT NULL,
  `tanggalkeluar` varchar(255) NOT NULL,
  `lamapkl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nobp`, `nama`, `email`, `surat_pernyataan`, `universitas`, `jurusan`, `id_bidang`, `id_subbidang`, `tanggalmasuk`, `tanggalkeluar`, `lamapkl`) VALUES
('2011521001', 'Farhan Rizki Ghifara', 'farhan@gmail.com', 'Pedoman Hibah PKM Internal Terintegrasi MBKM Unand 2023 (1).pdf', 'Universitas Andalas', 'Akutansi', '4', 'Akutansi', '1 Januari', '1 Januari', '90 Hari '),
('2011527001', 'Delicia Syifa Maghfira', 'deliciasyifamaghfira@gmail.com', 'Integrasi PKM ke MBKM_edit.pdf', 'Universitas Andalas', 'Sistem Informasi', '5', 'Sistem Teknologi dan Informasi\r\n', '1 Januari', '1 Januari', '60 Hari'),
('2011527002', 'Daffa Riza Muliya', 'daffamuliya15@gmail.com', 'Pedoman Hibah PKM Internal Terintegrasi MBKM Unand 2023.pdf', 'Universitas Andalas', 'Sistem Informasi', '5', 'Sistem Teknologi dan Informasi\r\n', '1 Januari', '1 Januari', '90 Hari '),
('2011627285', 'Abid Arrahman ', 'abid_nurabid@gmail.com', '4.-PKM-K.pdf', 'Politeknik Negeri Padang ', 'Teknologi Informasi', '5', 'Sistem Teknologi dan Informasi\r\n', '12 Januari ', '12 Maret', '60 Hari'),
('2011627287', 'Udin Syaifullah ', 'udinsamsudin@gmail.com', 'Pengumuman pembagian kelas PIMNAS.. (1).pdf', 'Universitas Andalas', 'Teknik Elektro', '4', 'Komunikasi dan TJSL', '1 Januari', '30 Maret', '60 Hari '),
('2011627289', 'Salman Gusnedi ', 'salma_alfarizy@gmail.com', 'PO HIPMI 2019 - 2022.pdf', 'Universitas Andalas', 'Gigi', '2', 'Pembangkitan', '1 Januari', '1 Januari', '60 Hari ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subbidang`
--

CREATE TABLE `tb_subbidang` (
  `id_subbidang` int(10) NOT NULL,
  `id_bidang` varchar(50) NOT NULL,
  `nama_subbidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_subbidang`
--

INSERT INTO `tb_subbidang` (`id_subbidang`, `id_bidang`, `nama_subbidang`) VALUES
(1, '1', 'Perencanaan Pengusahaan '),
(2, '1', 'Perencanaan Sistem Kelistrikan'),
(3, '1', 'IPP dan Excess Power'),
(4, '2', 'Efisisiensi, Pengukuran dan Mutu Sistem Distribusi'),
(6, '2', 'Pembangkitan'),
(7, '2', 'Perencanaan Sistem Distribusi'),
(8, '2', 'Operasi dan Pemeliharaan Sistem Distribusi'),
(9, '3', 'Mekanisme Niaga dan Pengendalian Piutang'),
(10, '3', 'Pemasaran'),
(11, '3', 'Sales Representative '),
(12, '4', 'Komunikasi dan TJSL'),
(13, '4', 'Aset Properti dan Umum '),
(14, '4', 'Keuangan dan Anggaran '),
(15, '4', 'Akutansi'),
(16, '4', 'Verifikasi dan Pembayaran'),
(17, '4', 'Perencana Pengadaan '),
(18, '4', 'Pelaksana Pengadaan '),
(19, '4', 'Keselamatan, Kesehatan Kerja, Lingkungan, dan Keamanan'),
(20, '4', 'Keselamatan, Kesehatan Kerja, dan Keamanan\r\n'),
(21, '5', 'Sistem Teknologi dan Informasi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `apiKey` text NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `status`, `apiKey`, `path`) VALUES
(2, 'admin', '$2y$10$jV9REKJlc0a4GX.PqpMth.nupzv9UShJLY022fw8hQGl9yA132dL6', 'Admin', 'Admin PLN', '', '', ''),
(35, '2011527002', '$2y$10$r7JeoQiTKwinKisbp3e7VODjGL7jq56tvZwzGbHfMShJ7tV4qfr02', 'Mahasiswa', 'Daffa Riza Muliya', '1', '', ''),
(36, '2011527001', '$2y$10$KNrwRWW5isfYuxrCXF947O49rlgct9JoxOvcaq5eBo3qnuOnb6esO', 'Mahasiswa', 'Delicia Syifa Maghfira', '1', '', ''),
(37, '2011627289', '$2y$10$3AFA4e1QsrO/zSdGvPe/Z.0WQLhG5k9qa5fqtRmOPXNqTZEDOB7yK', 'Mahasiswa', 'Salman Gusnedi ', '0', '', ''),
(38, '2011521001', '$2y$10$LjLAZpsXCoxkz/bi9FZYde6feG8ITvHOGtHaV2KRgpeABBdHxKYY.', 'Mahasiswa', 'Farhan Rizki Ghifara', '0', '', ''),
(39, '2011627287', '$2y$10$LtAY7PJbCBYV1pBzYRZPW.rPA7Sn9zHbvusTF2YIcYuYDKcugPNCa', 'Mahasiswa', 'Udin Syaifullah ', '0', '', ''),
(40, '2011627285', '$2y$10$0U71ve0VN0rxAN7bM9bgOekGti1ZGjQoeHd81mx4rCxpJq8RQdFjq', 'Mahasiswa', 'Abid Arrahman ', '0', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nobp`);

--
-- Indexes for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  ADD PRIMARY KEY (`id_subbidang`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  MODIFY `id_subbidang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  ADD CONSTRAINT `tb_subbidang_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
