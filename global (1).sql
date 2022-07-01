-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `global`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aktivitas_project`
--

CREATE TABLE `tbl_aktivitas_project` (
  `id_aktivitas` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aktivitas_project`
--

INSERT INTO `tbl_aktivitas_project` (`id_aktivitas`, `id_project`, `keterangan`, `id_user`, `update_date`) VALUES
(18, 2, 'test', 2, '2022-06-22 03:41:24'),
(20, 2, 'Update nich', 2, '2022-06-29 06:53:43'),
(21, 2, 'khaidar', 10, '2022-07-01 15:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_project`
--

CREATE TABLE `tbl_file_project` (
  `id_file` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `nama_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `token` varchar(64) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_file_project`
--

INSERT INTO `tbl_file_project` (`id_file`, `id_project`, `nama_file`, `token`) VALUES
(39, 2, 'Layout Sekolah Mentari 2022 05 20.pdf', '3ov9uthrwn6'),
(53, 2, '24016VIP-SHISHA-STORY_cc746dc747e5a5af65ee757d61b6fa96.jpg', 'opqc1e4muu'),
(54, 2, '71289LOGo-VIP-black-transparent-1500x1500.png', 's7uo201p8ti');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_cuti`
--

CREATE TABLE `tbl_form_cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `approval_pm` tinyint(1) NOT NULL DEFAULT 0,
  `approval_direksi` tinyint(1) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) NOT NULL,
  `jumlah_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_form_cuti`
--

INSERT INTO `tbl_form_cuti` (`id_cuti`, `id_user`, `tanggal_mulai`, `tanggal_selesai`, `approval_pm`, `approval_direksi`, `keterangan`, `jumlah_hari`) VALUES
(6, 2, '2022-07-04', '2022-07-08', 1, 0, 'Liburan ke Paris', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_reimburstment`
--

CREATE TABLE `tbl_form_reimburstment` (
  `id_rembes` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` double DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `file_rembes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_form_reimburstment`
--

INSERT INTO `tbl_form_reimburstment` (`id_rembes`, `keterangan`, `nominal`, `status`, `id_project`, `tanggal_pengajuan`, `id_user`, `file_rembes`) VALUES
(8, 'Beli diamond di unipin', 700000, 0, 2, '2022-06-23', 2, '10349429-1114-1-SM.pdf'),
(10, 'Beli gorengan di Mall', 200000, 1, 2, '2022-06-26', 2, '78956PT. Global Integrasi Data.pdf'),
(14, 'Beli makanan di resto', 2000000, 0, 2, '2022-07-01', 11, '28346c6298bfd-8efb-4812-a6c1-f2627b9685f5-July.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id_project` int(11) NOT NULL,
  `nama_paket` varchar(255) DEFAULT NULL,
  `sub_pekerjaan` varchar(255) DEFAULT NULL,
  `lokasi_pekerjaan` varchar(255) DEFAULT NULL,
  `nama_ppk` varchar(100) DEFAULT NULL,
  `alamat_ppk` varchar(255) DEFAULT NULL,
  `nomor_kontrak` varchar(60) DEFAULT NULL,
  `nilai_kontrak` double DEFAULT NULL,
  `selesai_kontrak` date DEFAULT NULL,
  `serah_terima` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id_project`, `nama_paket`, `sub_pekerjaan`, `lokasi_pekerjaan`, `nama_ppk`, `alamat_ppk`, `nomor_kontrak`, `nilai_kontrak`, `selesai_kontrak`, `serah_terima`) VALUES
(2, 'Pengadaan Picture Archive Communication System Tahun 2012 Rumah Sakit Jantung dan Pembuluh Darah Harapan Kita Antara PT. Tawada Healthcare & PT. Global Integrasi Data.', 'Barang & Jasa', 'Jakarta', 'Satrija Sumarkho PT. Tawada Healthcare', 'Rukan Permata\r\nSenayan Blok A\r\nNo. 18-19, Jalan\r\nTentara Pelajar\r\nNo. 5 Jakarta\r\nSelatan 12210', '066/THC/VIII/2012/K Tanggal 7 Agustus 2012', 1732631318, '2015-09-03', 0),
(9, 'paket', 'asd', 'asd', 'asd', 'asd', 'asd', 111111111, '2022-06-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `level_user` smallint(6) DEFAULT NULL,
  `bulan_tahun` date DEFAULT NULL,
  `sisa_cuti` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `password`, `level_user`, `bulan_tahun`, `sisa_cuti`) VALUES
(2, 'Adam Hilman F', 'adam.hilman86@gmail.com', '0192023a7bbd73250516f069df18b500', 9, '2020-06-15', 12),
(10, 'Moch Khaidar Elhaq', 'khaidar@global-integrasi.co.id', '0192023a7bbd73250516f069df18b500', 6, '2022-06-29', 12),
(11, 'Teknisi', 'teknisi@gid.id', '0192023a7bbd73250516f069df18b500', 6, '2022-07-01', 0),
(12, 'Direksi', 'direksi@gid.id', '0192023a7bbd73250516f069df18b500', 1, '2022-07-01', 0),
(13, 'hrd', 'hrd@gid.id', '0192023a7bbd73250516f069df18b500', 2, '2022-07-01', 0),
(14, 'finance', 'finance@gid.id', '0192023a7bbd73250516f069df18b500', 3, '2022-07-01', 0),
(15, 'mp', 'mp@gid.id', '0192023a7bbd73250516f069df18b500', 4, '2022-07-01', 0),
(16, 'admin', 'admin@gid.id', '0192023a7bbd73250516f069df18b500', 5, '2022-07-01', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aktivitas_project`
--
ALTER TABLE `tbl_aktivitas_project`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tbl_file_project`
--
ALTER TABLE `tbl_file_project`
  ADD PRIMARY KEY (`id_file`) USING BTREE,
  ADD KEY `id_project` (`id_project`) USING BTREE;

--
-- Indexes for table `tbl_form_cuti`
--
ALTER TABLE `tbl_form_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tbl_form_reimburstment`
--
ALTER TABLE `tbl_form_reimburstment`
  ADD PRIMARY KEY (`id_rembes`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id_project`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aktivitas_project`
--
ALTER TABLE `tbl_aktivitas_project`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_file_project`
--
ALTER TABLE `tbl_file_project`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_form_cuti`
--
ALTER TABLE `tbl_form_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_form_reimburstment`
--
ALTER TABLE `tbl_form_reimburstment`
  MODIFY `id_rembes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
