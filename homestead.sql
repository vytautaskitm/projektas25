-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 m. Bir 19 d. 12:46
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `kategorijos`
--

CREATE TABLE `kategorijos` (
  `id` int(50) NOT NULL,
  `kategorija` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `produktai`
--

CREATE TABLE `produktai` (
  `id` int(50) NOT NULL,
  `pavadinimas` varchar(50) CHARACTER SET utf8 NOT NULL,
  `aprasymas` varchar(100) CHARACTER SET utf8 NOT NULL,
  `kat_id` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `produktai`
--

INSERT INTO `produktai` (`id`, `pavadinimas`, `aprasymas`, `kat_id`) VALUES
(2, 'Riedlente 1', 'labai gera', 'sportas'),
(3, 'Riedlente 2', ' labai labai gera', 'laisvalaikis'),
(4, 'Riedlente 3', 'labai  labai  labai  gera', 'ekstremalus pojuciai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produktai`
--
ALTER TABLE `produktai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorijos`
--
ALTER TABLE `kategorijos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produktai`
--
ALTER TABLE `produktai`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
