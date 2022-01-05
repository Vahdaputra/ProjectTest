-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Jan 2022 pada 11.58
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemukuan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembukuan`
--

CREATE TABLE `pembukuan` (
  `kode` int(11) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(255) NOT NULL,
  `jenis` varchar(300) NOT NULL,
  `keluar` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembukuan`
--

INSERT INTO `pembukuan` (`kode`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`) VALUES
(12, 'sumbangan 2', '2022-01-06', 0, 'masuk', 0),
(23, 'asok', '2021-12-31', 0, 'masuk', 0),
(221, 'Pemasukan dari jual tanah', '2022-01-07', 2147483647, 'masuk', 0),
(234, 'dafa', '2022-01-03', 0, 'masuk', 0),
(332, 'Test', '2022-01-01', 2000000, 'masuk', 0),
(464, 'sdasd', '2022-01-04', 1212, 'masuk', 3431231);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembukuan`
--
ALTER TABLE `pembukuan`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembukuan`
--
ALTER TABLE `pembukuan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
