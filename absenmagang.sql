-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 04:13 AM
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
('4', 'Keuangan, Komunikasi dan Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id` int(11) NOT NULL,
  `nobp` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id`, `nobp`, `nama`, `jam_masuk`, `jam_keluar`, `tanggal`, `status`) VALUES
(3, '12', 'Daffa', '00:00:00', '00:00:00', '', ''),
(5, '12', 'Daffa', '00:00:00', '00:00:00', '', ''),
(6, '12', 'Daffa', '00:00:00', '00:00:00', '', ''),
(7, '12', 'Daffa', '00:00:00', '00:00:00', '', '');

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
  `id_bidang` varchar(255) NOT NULL,
  `id_subbidang` varchar(50) NOT NULL,
  `tanggalmasuk` varchar(255) NOT NULL,
  `tanggalkeluar` varchar(255) NOT NULL,
  `lamapkl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nobp`, `nama`, `email`, `surat_pernyataan`, `universitas`, `jurusan`, `id_bidang`, `id_subbidang`, `tanggalmasuk`, `tanggalkeluar`, `lamapkl`) VALUES
('2011521001', 'Farhan Rizki Ghifari', 'farhan@gmail.com', 'ppt_daffa.pdf', 'Universitas Andalas', 'Akutansi', 'STI', 'Pengadaan ', '12 Januari ', '12 Januari ', '90 Hari '),
('2011522027', 'Delicia Syifa Maghfira', 'daffamuliya15@gmail.com', 'Bidang Bidang HIPMI PT UNAND[1].docx', 'Universitas Andalas', 'Sistem Informasi', 'STI', 'STI', '1 Januari', '1 Januari', '60 Hari'),
('2011527001', 'Farhan Rizki Ghifara', 'admin@gmail.com', 'Compro_Agung Adhitia Lingga (2).pdf', 'Universitas Andalas', 'Akutansi', 'STI', 'STI', '1 Januari', '1 Januari', '60 Hari');

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
(20, '4', 'Keselamatan, Kesehatan Kerja, dan Keamanan\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `level` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`) VALUES
(2, 'admin', '$2y$10$jV9REKJlc0a4GX.PqpMth.nupzv9UShJLY022fw8hQGl9yA132dL6', 'Admin', 'Admin PLN'),
(23, '2011521001', '$2y$10$S1wWe0HwxWcCxJBdlU8JyOPRcH55TsiPyvdcJZAy/nNSAzqHppb.y', 'Mahasiswa', 'Farhan Rizki Ghifari'),
(25, '2011522027', '$2y$10$JNPEVyeSxcEL5BAszS1jy.DnYK5fOq2YxvBR4ALXGxK1A0DMWWRT.', 'Mahasiswa', 'Delicia Syifa Maghfira');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_subbidang`
--
ALTER TABLE `tb_subbidang`
  MODIFY `id_subbidang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
