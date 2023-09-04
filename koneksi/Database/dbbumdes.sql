-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 02:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `tdalatsewa`
--

CREATE TABLE `tdalatsewa` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `harga_sewa` int(12) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdalatsewa`
--

INSERT INTO `tdalatsewa` (`id_alat`, `nama_alat`, `harga_sewa`, `keterangan`) VALUES
(1, 'Traktor M22s', 500000000, 'Testing 1'),
(2, 'Mesin Lampu X5669', 5000000, 'Testing 2');

-- --------------------------------------------------------

--
-- Table structure for table `tdlogin`
--

CREATE TABLE `tdlogin` (
  `id` int(11) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `jabatan` enum('Ketua','Sekretaris','Bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdlogin`
--

INSERT INTO `tdlogin` (`id`, `nip`, `nama_admin`, `password`, `jenis_kelamin`, `jabatan`) VALUES
(1, 'admin', 'Administrator', 'admin123', 'Pria', 'Ketua'),
(2, '202021053', 'Fiqri', 'fiqri002', 'Pria', 'Sekretaris'),
(3, '202021060', 'Zia', 'zia234', 'Wanita', 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tdnasabah`
--

CREATE TABLE `tdnasabah` (
  `kd_nasabah` varchar(10) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pendidikan` enum('SLTP/SD','SMP','D2/D1/SMA','D3','S1','S2','S3') NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdnasabah`
--

INSERT INTO `tdnasabah` (`kd_nasabah`, `nama_nasabah`, `tgl_masuk`, `tempat_lahir`, `tgl_lahir`, `pendidikan`, `alamat`, `jenis_kelamin`, `pekerjaan`, `nomor_hp`) VALUES
('12-NSB-001', 'Andi', '2022-06-17', 'Surabaya', '1998-05-12', 'D3', 'Jln. Pendidikan no.01', 'Pria', 'Wiraswasta', '081284592301'),
('12-NSB-002', 'Yanti', '2022-02-15', 'Samarinda', '1999-10-02', 'D3', 'Jln. Pengayoman no.29', 'Wanita', 'Pelajar', '082138492301');

-- --------------------------------------------------------

--
-- Table structure for table `tdpembayaranangsuran`
--

CREATE TABLE `tdpembayaranangsuran` (
  `no_angsuran` varchar(15) NOT NULL,
  `no_pinjaman` varchar(10) NOT NULL,
  `angsuranke` int(10) NOT NULL,
  `tgl_angsuran` date NOT NULL,
  `jumlah_angsuran` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdpembayaranangsuran`
--

INSERT INTO `tdpembayaranangsuran` (`no_angsuran`, `no_pinjaman`, `angsuranke`, `tgl_angsuran`, `jumlah_angsuran`) VALUES
('4073-PBAG-001', '705-PJ-001', 6, '2022-06-24', 5750000),
('4073-PBAG-002', '705-PJ-002', 6, '2022-06-24', 10700000);

-- --------------------------------------------------------

--
-- Table structure for table `tdpenyewaan`
--

CREATE TABLE `tdpenyewaan` (
  `no_sewa` varchar(12) NOT NULL,
  `kd_nasabah` varchar(10) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_sewa` int(12) NOT NULL,
  `harga_sewa` int(12) NOT NULL,
  `total_sewa` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdpenyewaan`
--

INSERT INTO `tdpenyewaan` (`no_sewa`, `kd_nasabah`, `id_alat`, `tgl_sewa`, `lama_sewa`, `harga_sewa`, `total_sewa`) VALUES
('600-ATPY-001', '12-NSB-001', 1, '2022-06-19', 2, 10000000, 5000000),
('600-ATPY-002', '12-NSB-002', 2, '2022-06-20', 6, 5000000, 833333);

-- --------------------------------------------------------

--
-- Table structure for table `tdpinjaman`
--

CREATE TABLE `tdpinjaman` (
  `no_pinjaman` varchar(10) NOT NULL,
  `kd_nasabah` varchar(10) NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `pokok_pinjaman` int(12) NOT NULL,
  `lama_pinjaman` int(12) NOT NULL,
  `total_pinjaman` bigint(12) NOT NULL,
  `bunga` int(10) NOT NULL,
  `besarnya_pinjaman` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdpinjaman`
--

INSERT INTO `tdpinjaman` (`no_pinjaman`, `kd_nasabah`, `tgl_pinjaman`, `pokok_pinjaman`, `lama_pinjaman`, `total_pinjaman`, `bunga`, `besarnya_pinjaman`) VALUES
('705-PJ-001', '12-NSB-001', '2022-06-23', 60000000, 12, 5000000, 15, 5750000),
('705-PJ-002', '12-NSB-002', '2022-06-16', 50000000, 5, 10000000, 7, 10700000);

-- --------------------------------------------------------

--
-- Table structure for table `tdsimpanan`
--

CREATE TABLE `tdsimpanan` (
  `no_simpanan` varchar(12) NOT NULL,
  `kd_nasabah` varchar(10) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `simpanan_pokok` int(12) NOT NULL,
  `simpanan_wajib` int(12) NOT NULL,
  `simpanan_lain` int(12) NOT NULL,
  `jumlah_simpanan` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tdsimpanan`
--

INSERT INTO `tdsimpanan` (`no_simpanan`, `kd_nasabah`, `tgl_simpanan`, `simpanan_pokok`, `simpanan_wajib`, `simpanan_lain`, `jumlah_simpanan`) VALUES
('612-SMNN-001', '12-NSB-001', '2022-06-15', 100000000, 27000000, 800000, 127800000),
('612-SMNN-002', '12-NSB-002', '2022-06-15', 900000000, 50000000, 10000000, 960000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tdalatsewa`
--
ALTER TABLE `tdalatsewa`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `tdlogin`
--
ALTER TABLE `tdlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tdnasabah`
--
ALTER TABLE `tdnasabah`
  ADD PRIMARY KEY (`kd_nasabah`);

--
-- Indexes for table `tdpembayaranangsuran`
--
ALTER TABLE `tdpembayaranangsuran`
  ADD PRIMARY KEY (`no_angsuran`),
  ADD KEY `no_pinjaman` (`no_pinjaman`);

--
-- Indexes for table `tdpenyewaan`
--
ALTER TABLE `tdpenyewaan`
  ADD PRIMARY KEY (`no_sewa`),
  ADD KEY `kd_nasabah` (`kd_nasabah`),
  ADD KEY `id_alat` (`id_alat`);

--
-- Indexes for table `tdpinjaman`
--
ALTER TABLE `tdpinjaman`
  ADD PRIMARY KEY (`no_pinjaman`),
  ADD KEY `kd_nasabah` (`kd_nasabah`);

--
-- Indexes for table `tdsimpanan`
--
ALTER TABLE `tdsimpanan`
  ADD PRIMARY KEY (`no_simpanan`),
  ADD KEY `kd_nasabah` (`kd_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tdalatsewa`
--
ALTER TABLE `tdalatsewa`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tdlogin`
--
ALTER TABLE `tdlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tdpembayaranangsuran`
--
ALTER TABLE `tdpembayaranangsuran`
  ADD CONSTRAINT `tdpembayaranangsuran_ibfk_1` FOREIGN KEY (`no_pinjaman`) REFERENCES `tdpinjaman` (`no_pinjaman`) ON DELETE CASCADE;

--
-- Constraints for table `tdpenyewaan`
--
ALTER TABLE `tdpenyewaan`
  ADD CONSTRAINT `tdpenyewaan_ibfk_1` FOREIGN KEY (`kd_nasabah`) REFERENCES `tdnasabah` (`kd_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tdpenyewaan_ibfk_2` FOREIGN KEY (`id_alat`) REFERENCES `tdalatsewa` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tdpinjaman`
--
ALTER TABLE `tdpinjaman`
  ADD CONSTRAINT `tdpinjaman_ibfk_1` FOREIGN KEY (`kd_nasabah`) REFERENCES `tdnasabah` (`kd_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tdsimpanan`
--
ALTER TABLE `tdsimpanan`
  ADD CONSTRAINT `tdsimpanan_ibfk_1` FOREIGN KEY (`kd_nasabah`) REFERENCES `tdnasabah` (`kd_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
