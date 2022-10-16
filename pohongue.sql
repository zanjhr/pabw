-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 09:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pohongue`
--

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE `pohon` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id`, `nama`, `jenis`, `harga`, `jumlah`) VALUES
(49, 'testststst', 'berbuah', 6778, 44444),
(50, 'www', 'hias', 6777, 44445),
(51, 'uuu', 'berbuah', 6776, 44446),
(52, 'hhh', 'berbuah', 6775, 44447),
(53, 'jjj', 'hias', 6774, 44448),
(54, 'mmm', 'hias', 6773, 44449),
(55, 'gg', 'berbuah', 6772, 44450),
(56, 'rrr', 'hias', 6771, 44451);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `email`, `password`) VALUES
(6, 'linggaaksara', 'linggaaksara@gmail.com', 'e3a958df39563a3bc9cbc53fc79dee52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pohon`
--
ALTER TABLE `pohon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pohon`
--
ALTER TABLE `pohon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
