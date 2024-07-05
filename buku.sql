-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 10:26 AM
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
-- Database: `buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(64) NOT NULL,
  `id_pengarang` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` varchar(64) NOT NULL,
  `kategori_buku` varchar(64) NOT NULL,
  `no_isbn` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `id_pengarang`, `penerbit`, `tahun_terbit`, `kategori_buku`, `no_isbn`) VALUES
('HT01', 'BELAJAR HTML', 'PI01', 'PT EZEKIEL PERMATA', '2019', 'Ensiklopedia', '5974563214587'),
('JA01', 'BELAJAR JAVASCRIPT', 'BL01', 'PT EZEKIEL PERMATA', '2020', 'Ensiklopedia', '5974563214894'),
('NE01', 'BELAJAR .NET', 'JA01', 'PT EZEKIEL PERMATA', '2022', 'Ensiklopedia', '5974563214425');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(10) NOT NULL,
  `nama_pengarang` varchar(32) NOT NULL,
  `no_telp` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `alamat` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `no_telp`, `email`, `alamat`) VALUES
('BL01', 'Bleky', '084563798154', 'bleky@gmail.com', 'JL INPRES 18'),
('JA01', 'Jaeger', '084521364769', 'jaeger@gmail.com', 'JL LEMPUYANG 1'),
('PI01', 'Pinky', '085697423151', 'pinky@gmail.com', 'JL INPRES 17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_pengarang` (`id_pengarang`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
