-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 02:32 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_depan`, `nama_belakang`, `email`, `password`) VALUES
(1, 'Saraswati', 'Cahyati', 'sarascahya@gmail.com', 'sarascahya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id` int(3) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id`, `nama_depan`, `nama_belakang`, `jk`, `no_telp`, `alamat`, `email`, `password`, `foto`) VALUES
(1, 'shiro', 'hana', 'P', '+62857371116', 'tabanan', 'shirohana@gmail.com', 'shirohana@gmail.com', ''),
(3, 'saraswati suci', 'cahyati', 'L', 'dddd', 'ddd', 'sarascahya@gmail.com', 'sarascahya@gmail.com', '3.jpg'),
(4, 'saraswati suci', 'a', 'L', '085737111679', 'lalala', 'sarascahya@yahoo.com', '', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(5) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `alamat` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama_lengkap`, `nama_panggilan`, `no_telp`, `alamat`, `email`, `password`) VALUES
(1, 'fitri', 'fatma', '+6285123456789', 'jimbaran', 'fitrifatma@gmail.com', 'fitrifatma@gmail.com'),
(3, 'Saraswati Suci Cahyati', 'Saras', '', '', 'sarascahya@gmail.com', 'sarascahya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_panitia` int(3) NOT NULL,
  `peserta` int(4) NOT NULL,
  `pembicara` varchar(50) NOT NULL,
  `harga` int(6) NOT NULL,
  `foto` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar`
--

INSERT INTO `seminar` (`id`, `judul`, `deskripsi`, `id_panitia`, `peserta`, `pembicara`, `harga`, `foto`, `tanggal`) VALUES
(12, 'Seminar Nasional TE', 'Seminar Nasional TE adalah bla bla bla', 3, 200, 'Saraswati', 750000, '3_2016-12-06.png', '2016-12-06'),
(19, 'efswefdefewf', '', 3, 0, '', 0, '3_2016-12-051.jpg', '2016-12-05'),
(21, 'Judul Seminar', 'iadfbiuahfcocmfa', 3, 200, '', 100000, '3_2016-12-14.jpg', '2016-12-14'),
(22, 'lalalal', 'cdsacdsacac', 3, 200, 'Saraswati', 75000, '3_2016-12-101.jpg', '2016-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
