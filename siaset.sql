-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 12:39 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siaset`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_aset`
--

CREATE TABLE `data_aset` (
  `kode_aset` varchar(20) NOT NULL,
  `nama_aset` varchar(50) NOT NULL,
  `jumlah_aset` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal_input` date NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_aset`
--

INSERT INTO `data_aset` (`kode_aset`, `nama_aset`, `jumlah_aset`, `harga`, `tanggal_input`, `nama_kategori`, `kode_user`) VALUES
('1', 'tes', 12, 12, '2019-09-27', 'ALAT PENGUKUR WAKTU', 0),
('12131', 'hshshs', 12, 12, '2019-09-27', 'TANAH BANGUNAN PERUMAHAN/G.TEMPAT TINGGAL', 1),
('123', 'testertttttttt', 10, 100000, '2019-09-25', 'qweyu1', 0),
('3.10.02.03.001 ', 'CPU (Peralatan Personal Komputer)', 100, 4000000, '2019-09-22', 'PERALATAN PERSONAL KOMPUTER', 0),
('3.10.02.03.003', 'Printer (Peralatan Personal Komputer)', 10, 700000, '2019-09-22', 'PERALATAN PERSONAL KOMPUTER', 0),
('3.10.02.03.009', 'Keyboard (Peralatan Personal Komputer)', 20, 50000, '2019-09-22', 'PERALATAN PERSONAL KOMPUTER', 0),
('3.10.02.03.014', 'LAN Card', 290, 50000, '2019-09-22', 'PERALATAN PERSONAL KOMPUTER', 0),
('3.10.02.04.021', 'Kabel UTP', 25, 50000, '2019-09-22', 'PERALATAN JARINGAN', 0),
('3.10.02.04.022', 'Wireless PCI Card', 24, 50000, '2019-09-22', 'PERALATAN JARINGAN', 0),
('3.10.02.04.023 ', 'Wireless Access Point', 5, 300000, '2019-09-22', 'PERALATAN JARINGAN', 0),
('uygdsfygsdy', 'tester', 78678, 876767, '2019-09-27', 'TANAH UNTUK BANGUNAN GEDUNG SARANA OLAH RAGA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `kode_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`kode_kategori`, `nama_kategori`) VALUES
('123', 'qweyu1'),
('12345', 'tester'),
('2.01.01.01', 'TANAH BANGUNAN PERUMAHAN/G.TEMPAT TINGGAL'),
('2.01.01.05', 'TANAH UNTUK BANGUNAN GEDUNG SARANA OLAH RAGA'),
('2.01.01.06', 'TANAH UNTUK BANGUNAN TEMPAT IBADAHTANAH UNTUK BANG'),
('2.01.03.01', 'TANAH LAPANGAN OLAH RAGA'),
('3.02.01.01', 'KENDARAAN DINAS BERMOTOR PERORANGAN'),
('3.02.01.04', 'KENDARAAN BERMOTOR BERODA DUA'),
('3.05.02.02', 'ALAT PENGUKUR WAKTU'),
('3.05.02.03', 'ALAT PEMBERSIH'),
('3.05.02.06', 'ALAT RUMAH TANGGA LAINNYA ( HOME USE )'),
('3.06.02.07', 'ALAT-ALAT SANDI'),
('3.06.02.09', 'ALAT KOMUNIKASI DIGITAL DAN KONVENSIONAL'),
('3.08.01.61', 'ALAT LAB. SUMBER DAYA DAN ENERGI'),
('3.10.02.03', 'PERALATAN PERSONAL KOMPUTER'),
('3.10.02.04', 'PERALATAN JARINGAN'),
('3.10.02.99', 'PERALATAN KOMPUTER LAINNYA');

-- --------------------------------------------------------

--
-- Table structure for table `data_lokasi`
--

CREATE TABLE `data_lokasi` (
  `kode_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_lokasi`
--

INSERT INTO `data_lokasi` (`kode_lokasi`, `nama_lokasi`) VALUES
(1, 'MSKI'),
(2, 'PD'),
(3, 'VERA'),
(4, 'BAGIAN UMUM'),
(5, 'BANK');

-- --------------------------------------------------------

--
-- Table structure for table `data_pemeliharaan`
--

CREATE TABLE `data_pemeliharaan` (
  `kode_pemeliharaan` int(10) NOT NULL,
  `kode_aset` varchar(15) NOT NULL,
  `kode_lokasi` int(10) NOT NULL,
  `biaya_perbaiki` int(20) NOT NULL,
  `tanggal_rusak` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemeliharaan`
--

INSERT INTO `data_pemeliharaan` (`kode_pemeliharaan`, `kode_aset`, `kode_lokasi`, `biaya_perbaiki`, `tanggal_rusak`) VALUES
(1, '3.10.02.03.001', 1, 20000, '2019-09-25'),
(2, '3.10.02.03.001', 4, 200000, '2019-09-17'),
(3, '3.10.02.03.001 ', 1, 78000, '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `kode_user` int(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`kode_user`, `nama_user`, `level`, `username`, `password`) VALUES
(1, 'Muhammad Hutomi', 'admin', 'hutomi', 'hutomi'),
(3, 'M. Hutomi', 'admin', 'tomi', 'tomi'),
(4, 'tester', 'admin', 'tester', 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `kelola_aset`
--

CREATE TABLE `kelola_aset` (
  `kode_aset` varchar(15) NOT NULL,
  `kode_lokasi` varchar(10) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelola_aset`
--

INSERT INTO `kelola_aset` (`kode_aset`, `kode_lokasi`, `kode_kategori`, `jumlah`) VALUES
('123', '1', '123', 10),
('3.10.02.03.001 ', '2', '3.10.02.03', 10),
('3.10.02.03.001 ', '1', '3.10.02.03', 10),
('3.10.02.03.001 ', '3', '3.10.02.03', 10),
('3.10.02.03.001 ', '4', '3.10.02.03', 10),
('3.10.02.03.001 ', '5', '3.10.02.03', 10),
('123', '5', '123', 0),
('1', '5', '2.01.01.01', 0),
('543', '5', '12345', 0),
('jhgbfh', '5', '2.01.01.01', 0),
('76354', '5', '123', 0),
('11212', '5', '2.01.01.01', 0),
('1234', '5', '123', 0),
('1234', '5', '123', 0),
('1233', '5', '123', 0),
('1233', '5', '123', 0),
('12345', '5', '123', 0),
('123', '5', '123', 0),
('12131', '5', '2.01.01.01', 0),
('', '5', '2.01.01.06', 0),
('uygdsfygsdy', '5', '2.01.01.05', 0),
('1', '5', '3.05.02.02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_aset`
--
ALTER TABLE `data_aset`
  ADD PRIMARY KEY (`kode_aset`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `data_lokasi`
--
ALTER TABLE `data_lokasi`
  ADD PRIMARY KEY (`kode_lokasi`);

--
-- Indexes for table `data_pemeliharaan`
--
ALTER TABLE `data_pemeliharaan`
  ADD PRIMARY KEY (`kode_pemeliharaan`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_lokasi`
--
ALTER TABLE `data_lokasi`
  MODIFY `kode_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_pemeliharaan`
--
ALTER TABLE `data_pemeliharaan`
  MODIFY `kode_pemeliharaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `kode_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
