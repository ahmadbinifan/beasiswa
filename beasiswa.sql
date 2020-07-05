-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 01:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`username`, `password`, `nama`, `email`, `level`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Administrator', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblmapel`
--

CREATE TABLE `tblmapel` (
  `idmapel` int(11) NOT NULL,
  `mapel` varchar(35) DEFAULT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `sks` varchar(5) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmapel`
--

INSERT INTO `tblmapel` (`idmapel`, `mapel`, `semester`, `sks`, `ket`) VALUES
(1, 'Matematika', 'I', '4', '-'),
(4, 'Kewarganegaraan', 'I', '2', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tblpenilaian`
--

CREATE TABLE `tblpenilaian` (
  `idNilai` int(11) NOT NULL,
  `idmapel` int(11) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nilai1` int(11) DEFAULT NULL,
  `nilai2` int(11) DEFAULT NULL,
  `nilai3` int(11) DEFAULT NULL,
  `nilai4` int(11) DEFAULT NULL,
  `nilai5` int(11) DEFAULT NULL,
  `nilai6` int(11) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpenilaian`
--

INSERT INTO `tblpenilaian` (`idNilai`, `idmapel`, `nis`, `nilai1`, `nilai2`, `nilai3`, `nilai4`, `nilai5`, `nilai6`, `ket`) VALUES
(1, 1, '1120000100', 80, 80, 60, 80, 80, 80, '-'),
(2, 1, '1120000101', 60, 80, 80, 100, 80, 80, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE `tblsiswa` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(35) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `tempatLahir` varchar(20) DEFAULT NULL,
  `tglLahir` date DEFAULT NULL,
  `nomorTelp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`nis`, `nama`, `jk`, `tempatLahir`, `tglLahir`, `nomorTelp`, `alamat`) VALUES
('1120000100', 'Abdullah Munawar', 'Laki-laki', 'Medan', '1997-04-04', '081290902331', 'Jl. Perjuangan No. 12 Medan'),
('1120000101', 'Budiman Santoso', 'Laki-laki', 'Medan', '1998-01-05', '081290902334', 'Jl. Beringin No. 3 Medan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblmapel`
--
ALTER TABLE `tblmapel`
  ADD PRIMARY KEY (`idmapel`);

--
-- Indexes for table `tblpenilaian`
--
ALTER TABLE `tblpenilaian`
  ADD PRIMARY KEY (`idNilai`),
  ADD KEY `nis` (`nis`) USING BTREE,
  ADD KEY `idmapel` (`idmapel`) USING BTREE;

--
-- Indexes for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblmapel`
--
ALTER TABLE `tblmapel`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpenilaian`
--
ALTER TABLE `tblpenilaian`
  MODIFY `idNilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblpenilaian`
--
ALTER TABLE `tblpenilaian`
  ADD CONSTRAINT `idMatkul` FOREIGN KEY (`idmapel`) REFERENCES `tblmapel` (`idMapel`),
  ADD CONSTRAINT `nim` FOREIGN KEY (`nis`) REFERENCES `tblsiswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
