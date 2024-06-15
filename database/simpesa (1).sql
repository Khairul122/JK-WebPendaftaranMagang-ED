-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 03:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_pengguna` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `no_hp`, `email`, `password`, `hak_pengguna`) VALUES
(1, 'admin', '082165443677', 'admin@gmail.com', '12345678', 'admin'),
(2, 'aji', '082165443677', 'aji@gmail.com', 'aji', 'user'),
(3, 'sari', 'sari', 'sari@gmail.com', 'sari', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int(11) NOT NULL,
  `foto` text NOT NULL,
  `surat_lamaran` text NOT NULL,
  `cv` text NOT NULL,
  `transkrip_nilai` text NOT NULL,
  `surat_rekomendasi` text NOT NULL,
  `ktp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `foto`, `surat_lamaran`, `cv`, `transkrip_nilai`, `surat_rekomendasi`, `ktp`) VALUES
(12, '../assets/img/uploads/bobapeeriklan.jpg', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf'),
(14, '../assets/img/uploads/exit.png', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf'),
(15, '../assets/img/uploads/IMG_2702.jpg', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf', '../assets/img/uploads/Receipt-2889-6529.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_datadiri`
--

CREATE TABLE `tbl_datadiri` (
  `id_datadiri` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_berkas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_datadiri`
--

INSERT INTO `tbl_datadiri` (`id_datadiri`, `id_lowongan`, `nama_lengkap`, `no_ktp`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `alamat`, `id_berkas`) VALUES
(6, 2, 'Aji', '1222', 'aji@gmail.com', 'Padang', '2024-06-15', 'Perempuan', '082165443677', 'Lhoksuemawe', 12),
(8, 2, 'Sari', '111', 'sari@gmail.com', 'surabaya', '2024-06-15', 'Laki-laki', '082165443677', 'Lhoksuemawe', 14),
(9, 2, 'Sari', '1222', 'aji@gmail.com', 'asasa', '2024-06-15', 'Perempuan', '82165443675', 'Lhoksuemawe', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `kuota` int(11) NOT NULL,
  `valid_until` date NOT NULL,
  `persyaratan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `nama_perusahaan`, `bidang`, `kuota`, `valid_until`, `persyaratan`) VALUES
(2, 'BPJS Ketenagakerjaan', 'Farmasi', 5, '2024-06-14', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_lowongan` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_datadiri` int(11) NOT NULL,
  `id_berkas` int(11) NOT NULL,
  `status` enum('Pending','Diterima','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `id_lowongan`, `id_pengguna`, `id_datadiri`, `id_berkas`, `status`) VALUES
(6, 2, 2, 6, 12, 'Diterima'),
(8, 2, 3, 8, 14, 'Pending'),
(9, 2, 3, 9, 15, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  ADD PRIMARY KEY (`id_datadiri`),
  ADD KEY `id_berkas` (`id_berkas`),
  ADD KEY `id_lowongan` (`id_lowongan`);

--
-- Indexes for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_lowongan` (`id_lowongan`),
  ADD KEY `id_datadiri` (`id_datadiri`),
  ADD KEY `id_berkas` (`id_berkas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  MODIFY `id_datadiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_datadiri`
--
ALTER TABLE `tbl_datadiri`
  ADD CONSTRAINT `tbl_datadiri_ibfk_1` FOREIGN KEY (`id_berkas`) REFERENCES `tbl_berkas` (`id_berkas`),
  ADD CONSTRAINT `tbl_datadiri_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`);

--
-- Constraints for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `tbl_lowongan` (`id_lowongan`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_2` FOREIGN KEY (`id_datadiri`) REFERENCES `tbl_datadiri` (`id_datadiri`),
  ADD CONSTRAINT `tbl_pendaftaran_ibfk_3` FOREIGN KEY (`id_berkas`) REFERENCES `tbl_berkas` (`id_berkas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
