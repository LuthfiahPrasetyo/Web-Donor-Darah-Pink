-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2026 at 05:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_donor_darah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama`, `foto_profil`, `created_at`) VALUES
(1, 'admin_pmi', 'admin123', 'admin@donordarah.com', 'babang pmi ganteng', '../assets/profiles/6af92fa07e65b.jpg', '2026-11-14 01:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_donor`
--

CREATE TABLE `jadwal_donor` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `penyelenggara` varchar(100) NOT NULL,
  `kuota` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_donor`
--

INSERT INTO `jadwal_donor` (`id_jadwal`, `tanggal`, `lokasi`, `penyelenggara`, `kuota`, `created_at`) VALUES
(1, '2026-06-15', 'Aula Kampus UPN Veteran Yogyakarta', 'PMI Kota Yogyakarta & BEM KM UPNVYK', 49, '2026-11-14 01:21:28'),
(2, '2026-06-20', 'Atrium Galeria Mall Yogyakarta', 'Palang Merah Indonesia Cabang Sleman', 67, '2026-11-14 01:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_donor`
--

CREATE TABLE `pendaftaran_donor` (
  `id_daftar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `usia` int(11) NOT NULL,
  `berat_badan` decimal(5,2) NOT NULL,
  `tinggi_badan` decimal(5,2) NOT NULL,
  `terakhir_donor` date DEFAULT NULL,
  `golongan_darah` enum('A','B','AB','O') NOT NULL,
  `status_pendaftaran` enum('terdaftar','selesai','batal') DEFAULT 'terdaftar',
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_donor`
--

INSERT INTO `pendaftaran_donor` (`id_daftar`, `id_user`, `id_jadwal`, `nama`, `usia`, `berat_badan`, `tinggi_badan`, `terakhir_donor`, `golongan_darah`, `status_pendaftaran`, `tanggal_daftar`) VALUES
(1, 2, 1, 'Budi Santoso', 23, 68.50, 172.00, '2025-12-10', 'O', 'terdaftar', '2026-11-14 01:21:28'),
(2, 3, 1, 'Siti Aminah', 22, 55.00, 160.00, NULL, 'A', 'terdaftar', '2026-11-14 01:21:28'),
(4, 4, 1, 'ilham kurniadi', 67, 67.00, 67.00, NULL, 'A', 'terdaftar', '2026-11-15 04:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `bb` decimal(5,2) DEFAULT NULL,
  `tb` decimal(5,2) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `golongan_darah` enum('A','B','AB','O') DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `nomor`, `usia`, `bb`, `tb`, `jenis_kelamin`, `golongan_darah`, `nama`, `tanggal_lahir`, `gender`, `foto_profil`, `created_at`) VALUES
(1, 'andi_baru', '123456', 'andi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-14 01:21:28'),
(2, 'budi_santoso', '123456', 'budi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Budi Santoso', '2002-08-17', 'Laki-laki', NULL, '2026-11-14 01:21:28'),
(3, 'siti_aminah', '123456', 'siti@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'Siti Aminah', '2004-03-21', 'Perempuan', NULL, '2026-11-14 01:21:28'),
(4, 'ilham', '123', 'gay@gmail.com', '09999311', 67, 67.00, 67.00, 'Perempuan', 'A', 'ilham kurniadi', '0000-00-00', '', '../assets/profiles/6af920ce41227.jpg', '2026-11-14 02:50:21'),
(5, 'fia', 'fia', 'fia@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-14 02:52:55'),
(6, 'lukman', 'lukman', 'lukman@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-14 02:53:54'),
(7, 'cika', 'cika', 'cika@gemail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-14 02:56:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jadwal_donor`
--
ALTER TABLE `jadwal_donor`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pendaftaran_donor`
--
ALTER TABLE `pendaftaran_donor`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_jadwal` (`id_jadwal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal_donor`
--
ALTER TABLE `jadwal_donor`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran_donor`
--
ALTER TABLE `pendaftaran_donor`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran_donor`
--
ALTER TABLE `pendaftaran_donor`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_donor` (`id_jadwal`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
