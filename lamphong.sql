-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamphong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `ten_admin` varchar(100) NOT NULL,
  `mk_admin` varchar(100) NOT NULL,
  `trang_thai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `ten_admin`, `mk_admin`, `trang_thai`) VALUES
(1, 'admin', '8e246f099ccf9d85bfccc8df52925170', 1);

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id_baiviet` int(11) NOT NULL,
  `ten_baiviet` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `nd_baiviet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id_baiviet`, `ten_baiviet`, `hinhanh`, `nd_baiviet`) VALUES
(2, 'Thời trang hàng đầu', '1723862779_z5735824374625_b23dcf10b54369b9dd9e330ae993082c.jpg', 'Doanh số khủng'),
(3, 'Top traiding', '454569463_122153720972247086_152564533376516294_n.jpg', 'Top ten');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_dm` varchar(255) NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_dm`, `stt`) VALUES
(25, 'Vest Đầm', 1),
(26, 'Vest Chân Váy Dài', 2),
(27, 'Vest Quần Suông', 3),
(28, 'Vest Chân Váy Ngắn', 5),
(29, 'Vest Quần Loe', 6);

-- --------------------------------------------------------

--
-- Table structure for table `danhmucbv`
--

CREATE TABLE `danhmucbv` (
  `id_danhmucbv` int(11) NOT NULL,
  `tdm_baiviet` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmucbv`
--

INSERT INTO `danhmucbv` (`id_danhmucbv`, `tdm_baiviet`, `thutu`) VALUES
(2, 'Tin thời trang', 1),
(5, 'Tin thời trang 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `id_danhmuc`) VALUES
(19, ' Vest Truyền Thống - Ống Loe', 'g1', '700000', 5, '1724060210_z5685864180636_93f737baec8c33ae5889e17fee225ffb.jpg', 'VN', 'TTTK - TAV - VN', 1, 29),
(20, 'Vest truyền thống - Ống Suông', 'as01', '680000', 12, '1724135549_454479029_122153721056247086_8108416544764296416_n.jpg', 'Sang xịn mịn', 'TTTK TAV - VN', 1, 27),
(21, 'Vest Đầm Dài', 'VD01', '620000', 5, '1724137820_z5738300587280_65c84384f7c926c31b68b0b6cddaf8fe.jpg', 'Sang Xịn Mịn', 'TTTK TAV - VN', 1, 25),
(22, 'Vest Chấn Váy Ngắn', 'CSL01', '650000', 12, '1724746364_z5735824409887_c16a3bc9dd9e33c5c879371ab350b445.jpg', 'Hàng thiết kế - sang -xịn - min', 'TTTK TAV - VN', 1, 28),
(23, 'Vest cam - Chân váy ', 'CV01', '700000', 15, '1724746173_441263543_122128786988247086_1099071698673815662_n.jpg', 'Sang Xịn Mịn', 'TTTK - TAV - VN', 1, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_baiviet`),
  ADD UNIQUE KEY `ten_baiviet` (`ten_baiviet`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`),
  ADD UNIQUE KEY `ten_dm` (`ten_dm`);

--
-- Indexes for table `danhmucbv`
--
ALTER TABLE `danhmucbv`
  ADD PRIMARY KEY (`id_danhmucbv`),
  ADD UNIQUE KEY `tdm_baiviet` (`tdm_baiviet`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD UNIQUE KEY `masp` (`masp`),
  ADD UNIQUE KEY `tensanpham` (`tensanpham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_baiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `danhmucbv`
--
ALTER TABLE `danhmucbv`
  MODIFY `id_danhmucbv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
