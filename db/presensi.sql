-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 02:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generate_barcode`
--

CREATE TABLE `tbl_generate_barcode` (
  `id_barcode` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generate_barcode`
--

INSERT INTO `tbl_generate_barcode` (`id_barcode`, `nip`, `gambar`) VALUES
(3, '00009', '00009.png'),
(4, '0001', '0001.png'),
(5, '333', '333.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generate_barcode_siswa`
--

CREATE TABLE `tbl_generate_barcode_siswa` (
  `id_barcode_siswa` int(11) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generate_barcode_siswa`
--

INSERT INTO `tbl_generate_barcode_siswa` (`id_barcode_siswa`, `nisn`, `gambar`) VALUES
(1, '1000000009', '1000000009.png'),
(2, '111', '111.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `guru_mapel` varchar(100) NOT NULL,
  `walikelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `guru_mapel`, `walikelas`) VALUES
(4, '0002', 'Rafka, S.Kom', 'Pria', '', 0),
(6, '00009', 'Budi', 'Pria', '', 0),
(11, '20003939', 'Yusup', 'Pria', '', 3),
(13, '333', 'testt', 'Pria', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kalender`
--

CREATE TABLE `tbl_kalender` (
  `id` int(11) NOT NULL,
  `tgl_kalender` date NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kalender`
--

INSERT INTO `tbl_kalender` (`id`, `tgl_kalender`, `deskripsi`) VALUES
(5, '2023-12-14', 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1 Nuh', '2023-11-21 07:12:35', '2023-11-21 14:12:35'),
(3, 'Kelas 5', '2023-12-13 13:38:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presensi`
--

CREATE TABLE `tbl_presensi` (
  `id_presensi` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_presensi`
--

INSERT INTO `tbl_presensi` (`id_presensi`, `nip`, `tanggal`, `jam_masuk`, `jam_keluar`, `flag`) VALUES
(34, '0001', '2023-12-14', '13:51:36', '00:00:00', 1),
(37, '20003939', '2023-12-14', '00:00:00', '00:00:00', 2),
(38, '0001', '2023-12-17', '12:49:48', '00:00:00', 0),
(39, '333', '2023-12-17', '13:35:49', '00:00:00', 0),
(40, '0002', '2023-12-17', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_presensi_siswa`
--

CREATE TABLE `tbl_presensi_siswa` (
  `id_presensi_siswa` int(11) NOT NULL,
  `nisn` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `flag` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `flag_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_presensi_siswa`
--

INSERT INTO `tbl_presensi_siswa` (`id_presensi_siswa`, `nisn`, `tanggal`, `jam_masuk`, `jam_keluar`, `flag`, `gambar`, `flag_2`) VALUES
(43, '111', '2023-12-17', '00:00:00', '00:00:00', 3, 'absen.png', 1),
(44, '1000000009', '2023-12-17', '00:00:00', '00:00:00', 3, 'fpk2022.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` int(11) NOT NULL,
  `orangtua_siswa` varchar(255) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `kelas`, `orangtua_siswa`, `alamat_siswa`, `status`, `created_at`, `updated_at`) VALUES
(1, '1000000009', 'Jul Junior', 1, 'Ayah', 'Bogor', 1, '2023-11-20 17:00:00', '0000-00-00 00:00:00'),
(2, '900090439049', 'Jul Senior', 1, 'julpa', 'cianjur', 1, '2023-12-14 08:43:32', '0000-00-00 00:00:00'),
(3, '111', 'tess', 1, 'tess', 'tess', 1, '2023-12-14 11:43:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin1', 'admin'),
(9, '20003939', '', '20003939', 'guru'),
(10, '1000000009', '', '1000000009', 'ots'),
(11, '111', '', '111', 'ots'),
(12, '900090439049', '', '900090439049', 'ots'),
(13, '200039393', '', '200039393', 'guru'),
(14, '333', '', '333', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_generate_barcode`
--
ALTER TABLE `tbl_generate_barcode`
  ADD PRIMARY KEY (`id_barcode`);

--
-- Indexes for table `tbl_generate_barcode_siswa`
--
ALTER TABLE `tbl_generate_barcode_siswa`
  ADD PRIMARY KEY (`id_barcode_siswa`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_kalender`
--
ALTER TABLE `tbl_kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `tbl_presensi_siswa`
--
ALTER TABLE `tbl_presensi_siswa`
  ADD PRIMARY KEY (`id_presensi_siswa`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_tbl_kelas` (`kelas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_generate_barcode`
--
ALTER TABLE `tbl_generate_barcode`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_generate_barcode_siswa`
--
ALTER TABLE `tbl_generate_barcode_siswa`
  MODIFY `id_barcode_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_kalender`
--
ALTER TABLE `tbl_kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_presensi`
--
ALTER TABLE `tbl_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_presensi_siswa`
--
ALTER TABLE `tbl_presensi_siswa`
  MODIFY `id_presensi_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `fk_tbl_kelas` FOREIGN KEY (`kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
