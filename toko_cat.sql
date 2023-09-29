-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 04:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `jenis_cat` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jml_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `nama_customer`, `no_hp`, `alamat`, `tgl_penjualan`, `jenis_cat`, `warna`, `jml_beli`) VALUES
(1, 'Fajar Holmes', '+1 6733552341', 'London Baker Street', '2023-09-26', 'Chlorinated Rubber', 'Biru', 15),
(42, 'Yusril Gicok', '09876252632', 'Gunung Cupu', '2023-09-26', 'Vinyl', 'Biru', 15),
(85, 'Eceng Gondok', '098728321321', 'Cikotok', '2023-09-07', 'Bituminous Paint', 'Biru', 2),
(158, 'Sherlock Holme', '08912313131', 'Baker Street 221B', '2023-09-28', 'Chlorinated Rubber', 'Biru', 14),
(192, 'Levi Ackerman', '0982312133', 'Paradise', '2023-09-29', 'Chlorinated Rubber', 'Merah', 20);

-- --------------------------------------------------------

--
-- Table structure for table `total_harga`
--

CREATE TABLE `total_harga` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_harga`
--

INSERT INTO `total_harga` (`id`, `id_penjualan`, `harga`, `total_harga`, `diskon`, `total_bayar`) VALUES
(163, 1, 30000, 450000, 45000, 405000),
(164, 85, 20000, 40000, 0, 40000),
(165, 158, 30000, 420000, 42000, 378000),
(167, 42, 40000, 600000, 60000, 540000),
(168, 192, 30000, 600000, 60000, 540000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_harga`
--
ALTER TABLE `total_harga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_penjualan` (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `total_harga`
--
ALTER TABLE `total_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `total_harga`
--
ALTER TABLE `total_harga`
  ADD CONSTRAINT `FK_id_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
