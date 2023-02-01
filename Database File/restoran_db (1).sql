-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--
-- Error reading structure for table restoran_db.detail_penjualan: #1932 - Table &#039;restoran_db.detail_penjualan&#039; doesn&#039;t exist in engine
-- Error reading data for table restoran_db.detail_penjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `restoran_db`.`detail_penjualan`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` char(5) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `harga` mediumint(9) NOT NULL,
  `gambar` varchar(90) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga`, `gambar`, `status`) VALUES
('P0001', 'American Beef Supreme', 86500, 'http://192.168.100.26/rest_api/foto/American Beef.png', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('Kasir','Pelayan','Owner','Admin') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `nama`, `level`, `password`) VALUES
('coba@gmail.com', 'coba lagi', 'Kasir', 'coba123'),
('cobalagi@gmail.com', 'coba lagi', 'Kasir', 'coba123'),
('stevi.ema@amikom.ac.id', 'Stevi Ema Wijayanti', 'Owner', '12345'),
('steviema.wijayanti@gmail.com', 'Stevi', 'Admin', 'qwerty'),
('tes@gmail.com', 'tes', 'Admin', 'tes123');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--
-- Error reading structure for table restoran_db.penjualan: #1932 - Table &#039;restoran_db.penjualan&#039; doesn&#039;t exist in engine
-- Error reading data for table restoran_db.penjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `restoran_db`.`penjualan`&#039; at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
