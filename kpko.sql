-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 08:44 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpko`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_ketua`
--

CREATE TABLE `calon_ketua` (
  `id` int(20) NOT NULL,
  `nis_siswa` bigint(10) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_ketua`
--

INSERT INTO `calon_ketua` (`id`, `nis_siswa`, `imgpath`, `visi`, `misi`) VALUES
(6, 3103115200, 'asdf', 'asdf', 'adf'),
(8, 7363728, 'asdf', 'asd', 'fadsf'),
(10, 34512, 'asdf', 'dfasdfs', 'sdfa');

-- --------------------------------------------------------

--
-- Table structure for table `calon_wakilketua`
--

CREATE TABLE `calon_wakilketua` (
  `id` int(20) NOT NULL,
  `nis_siswa` bigint(10) NOT NULL,
  `imgpath` varchar(255) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_wakilketua`
--

INSERT INTO `calon_wakilketua` (`id`, `nis_siswa`, `imgpath`, `visi`, `misi`) VALUES
(2, 3103115257, 'asdf', 'adsf', 'sheeo'),
(4, 63783, 'asdf', 'dfasdfs', 'fadsfasdfasd'),
(5, 234234, 'asdf', 'dfasdfsasf', 'sdfasf');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(20) NOT NULL,
  `nis_users` bigint(10) NOT NULL,
  `nis_calon_ketua` bigint(10) NOT NULL,
  `nis_calon_wakilketua` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `nis_users`, `nis_calon_ketua`, `nis_calon_wakilketua`) VALUES
(1, 234234, 3103115200, 3103115257);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(20) NOT NULL,
  `nis` bigint(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `name`, `kelas`) VALUES
(1, 3103115257, 'Hafiz Jondes', 12),
(9, 7363728, 'Paijo Kun', 12),
(10, 63783, 'Kusdini Yoloo', 12),
(11, 34512, 'Sarimi Mi kuya', 12),
(12, 234324, 'Zultito Manuel', 10),
(13, 234234, 'InteGalileo', 11),
(59, 3103115200, 'Siti Nurbaya', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nis_siswa` bigint(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nis_siswa`, `username`, `password`, `level`) VALUES
(11, 3103115200, 'anikapu', '$2y$10$rWSmYuT39LDiepxNJoq3fuoMYWN6hS8Ol83nIi7KtqAabRHToLnaW', 1),
(13, 3103115257, 'hafizjoundy', '$2y$10$JXVuSI8HekJVSpHQBhbTuOfSNi81WKatndBaD.A3bTc7AdZfDlEAe', 1),
(15, 234234, 'galileo', '$2y$10$RpRUlnyxxDcq0xGzTIW4su0Iygq5J892JefwiIDyiYbK6lXby8yWq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_ketua`
--
ALTER TABLE `calon_ketua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis_siswa`);

--
-- Indexes for table `calon_wakilketua`
--
ALTER TABLE `calon_wakilketua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis_siswa`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis_users` (`nis_users`),
  ADD KEY `nis_calon_ketua` (`nis_calon_ketua`),
  ADD KEY `nis_calon_wakilketua` (`nis_calon_wakilketua`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis_siswa`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_ketua`
--
ALTER TABLE `calon_ketua`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `calon_wakilketua`
--
ALTER TABLE `calon_wakilketua`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_ketua`
--
ALTER TABLE `calon_ketua`
  ADD CONSTRAINT `calon_ketua_ibfk_1` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `calon_wakilketua`
--
ALTER TABLE `calon_wakilketua`
  ADD CONSTRAINT `calon_wakilketua_ibfk_1` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`nis_users`) REFERENCES `users` (`nis_siswa`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`nis_calon_ketua`) REFERENCES `calon_ketua` (`nis_siswa`),
  ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`nis_calon_wakilketua`) REFERENCES `calon_wakilketua` (`nis_siswa`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`nis_siswa`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
