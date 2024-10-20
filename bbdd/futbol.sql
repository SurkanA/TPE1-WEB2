-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 03:52 AM
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
  `biografia` varchar(300) NOT NULL,
  `imagen_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `ciudad`, `year_fundado`, `biografia`, `imagen_url`) VALUES
(1, 'River', 'Buenos Aires', '1901', '0', 'https://www.pnguniverse.com/wp-content/uploads/2020/09/Escudo-River-Plate.png'),
(2, 'Boca', 'Buenos Aires', '1905', '0', 'https://cdn.freebiesupply.com/logos/large/2x/boca-juniors-1-logo-png-transparent.png');

-- --------------------------------------------------------

--
-- Table structure for table `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `nombre_jugador` varchar(50) NOT NULL,
  `posicion` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `biografia` varchar(300) NOT NULL,
  `imagen_url` varchar(300) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `nombre_jugador`, `posicion`, `edad`, `biografia`, `imagen_url`, `id_equipo`, `nombre_equipo`) VALUES
(6, 'Marcos Rojo', 'Defensor', 34, 'Faustino Marcos Alberto Rojo es un futbolista argentino. Juega de defensa central o lateral izquierdo y su equipo actual es el C. A. Boca Juniors de la Primera División de Argentina. Fue internacional absoluto con la selección de fútbol de Argentina.', 'https://assets.manutd.com/AssetPicker/images/0/0/12/34/795141/Marcos_Rojo_Home_00931580406064929_medium.jpg', 2, 'Boca'),
(9, 'Miguel Borja', 'Delantero', 31, 'Miguel Ángel Borja Hernández es un futbolista colombiano. Juega de delantero en el Club Atlético River Plate de la Primera División de Argentina.​ Es internacional absoluto con la Selección de fútbol de Colombia.', 'https://www.cariverplate.com.ar/imagenes/jugadores/2024-09/1831-borja_653x667.png', 1, 'River');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrator` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `password`, `administrator`) VALUES
(1, 'webadmin', '$2y$10$6zil872KW/HBsFJKH0D33OlEaGsshD36NDl455kfhz9Uhs.FxqLa2', 'S');

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
  ADD PRIMARY KEY (`id_jugador`,`id_equipo`) USING BTREE,
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
