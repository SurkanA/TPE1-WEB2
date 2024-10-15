-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 08:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futbol`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `year_fundado` year(4) NOT NULL,
  `imagen_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `ciudad`, `year_fundado`, `imagen_url`) VALUES
(1, 'River', 'Buenos Aires', '1901', 'https://www.pnguniverse.com/wp-content/uploads/2020/09/Escudo-River-Plate.png'),
(2, 'Boca', 'Buenos Aires', '1905', 'https://cdn.freebiesupply.com/logos/large/2x/boca-juniors-1-logo-png-transparent.png');

-- --------------------------------------------------------

--
-- Table structure for table `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(15) NOT NULL,
  `nombre_jugador` varchar(100) NOT NULL,
  `posicion` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `nombre_jugador`, `posicion`, `edad`, `id_equipo`) VALUES
(30, 'Franco Mastantuono', 'Centrocampista', 17, 1),
(33, 'Brian Aguirre', 'Delantero', 21, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indexes for table `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
