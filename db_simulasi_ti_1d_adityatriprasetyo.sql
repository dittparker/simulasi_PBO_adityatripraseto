-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2026 at 07:04 AM
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
-- Database: `db_simulasi_ti_1d_adityatriprasetyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(255) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,0) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Aditya Tri Prasetyo', 'SMKN 1 Cilacap', '88.50', '250000', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Fawwaz Hudzaifah', 'SMA Negeri 2 Purwokerto', '91.25', '250000', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Pandu Wijaya', 'SMK Negeri 2 Cilacap', '85.00', '250000', 'Reguler', 'Teknik Elektro', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(4, 'Aditia Saputra', 'SMA Negeri 1 Purbalingga', '79.80', '250000', 'Reguler', 'Manajemen Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Rizky Ramadhan', 'SMA Negeri 3 Cilacap', '83.45', '250000', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Siti Nurhaliza', 'MAN 1 Banyumas', '87.20', '250000', 'Reguler', 'Akuntansi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(7, 'Budi Santoso', 'SMA PGRI 1 Cilacap', '76.50', '250000', 'Reguler', 'Teknik Mesin', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Ahmad Dahlan', 'SMA Muhammadiyah 1', '92.00', '200000', 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Dewi Lestari', 'SMA Negeri 1 Cilacap', '94.50', '200000', 'Prestasi', NULL, NULL, 'Futsal OSN', 'Provinsi', NULL, NULL),
(10, 'Gilang Dirga', 'SMK Komputama', '89.10', '200000', 'Prestasi', NULL, NULL, 'Lomba Kompetensi Siswa IT', 'Nasional', NULL, NULL),
(11, 'Hesti Purwadinata', 'SMA Negeri 4 Purwokerto', '90.00', '200000', 'Prestasi', NULL, NULL, 'Pencak Silat', 'Kabupaten', NULL, NULL),
(12, 'Indra Herlambang', 'SMA Negeri 1 Kebumen', '93.20', '200000', 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(13, 'Kevin Sanjaya', 'SMA Kristen Cilacap', '86.75', '200000', 'Prestasi', NULL, NULL, 'Bulutangkis Tunggal', 'Provinsi', NULL, NULL),
(14, 'Lesti Kejora', 'SMK Seni Banyumas', '88.90', '200000', 'Prestasi', NULL, NULL, 'Menyanyi Solo FLS2N', 'Nasional', NULL, NULL),
(15, 'Muhammad Adit', 'SMA Negeri 1 Kroya', '95.00', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-DIKNAS-2026-001', 'Kementerian Perhubungan'),
(16, 'Putra Pratama', 'SMK Negeri 1 Purwokerto', '93.80', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-BKN-IX-2026', 'Badan Kepegawaian Negara'),
(17, 'Rina Nose', 'SMA Negeri 1 Sidareja', '91.00', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KEMENKEU-042', 'Kementerian Keuangan'),
(18, 'Surya Insomnia', 'SMA Negeri 5 Purwokerto', '89.50', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-PROV-JATENG-01', 'Pemprov Jawa Tengah'),
(19, 'Tora Sudiro', 'SMK Tekkom Cilacap', '92.40', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KEMENHAN-112', 'Kementerian Pertahanan'),
(20, 'Vino G Bastian', 'SMA Negeri 1 Maos', '96.10', '300000', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-KOMINFO-2026', 'Kementerian Kominfo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
