-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 08:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pruebadesa_jaime`
--
CREATE DATABASE IF NOT EXISTS `pruebadesa_jaime` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pruebadesa_jaime`;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombdepa` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `nombdepa`) VALUES(1, 'Cundinamarca');
INSERT INTO `departamento` (`id`, `nombdepa`) VALUES(2, 'Antioquia');
INSERT INTO `departamento` (`id`, `nombdepa`) VALUES(3, 'Huila');

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nombmuni` varchar(32) NOT NULL,
  `iddepa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(1, 'Bogota', 1);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(2, 'Chia', 1);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(3, 'Soacha', 1);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(4, 'Medellin', 2);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(5, 'Ciudad', 2);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(6, 'Neiva', 3);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(7, 'Garzon', 3);
INSERT INTO `municipio` (`id`, `nombmuni`, `iddepa`) VALUES(8, 'Pitalito', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tercero`
--

DROP TABLE IF EXISTS `tercero`;
CREATE TABLE `tercero` (
  `id` int(11) NOT NULL,
  `tipoidentificacion` varchar(48) NOT NULL,
  `numeroidentificacion` varchar(16) NOT NULL,
  `nombre1` varchar(16) NOT NULL,
  `nombre2` varchar(16) DEFAULT NULL,
  `apellido1` varchar(16) NOT NULL,
  `apellido2` varchar(16) NOT NULL,
  `tipotercero` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tercero`
--

INSERT INTO `tercero` (`id`, `tipoidentificacion`, `numeroidentificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `tipotercero`, `iddepartamento`, `idmunicipio`) VALUES(1, 'CC', '1001', 'Alex', 'B', 'Correa', 'D', 2, 1, 2);
INSERT INTO `tercero` (`id`, `tipoidentificacion`, `numeroidentificacion`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `tipotercero`, `iddepartamento`, `idmunicipio`) VALUES(3, 'CC', '1003', 'Daniela', 'Yuli', 'Meneses', 'Tovar', 3, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tipotercero`
--

DROP TABLE IF EXISTS `tipotercero`;
CREATE TABLE `tipotercero` (
  `id` int(11) NOT NULL,
  `nombtipo` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipotercero`
--

INSERT INTO `tipotercero` (`id`, `nombtipo`) VALUES(1, 'Paciente');
INSERT INTO `tipotercero` (`id`, `nombtipo`) VALUES(2, 'Empleado');
INSERT INTO `tipotercero` (`id`, `nombtipo`) VALUES(3, 'Contratista');
INSERT INTO `tipotercero` (`id`, `nombtipo`) VALUES(4, 'Otro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_municipio_departamento_idx` (`iddepa`);

--
-- Indexes for table `tercero`
--
ALTER TABLE `tercero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tercero_tipotercero1_idx` (`tipotercero`),
  ADD KEY `fk_tercero_departamento1_idx` (`iddepartamento`),
  ADD KEY `fk_tercero_municipio1_idx` (`idmunicipio`);

--
-- Indexes for table `tipotercero`
--
ALTER TABLE `tipotercero`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tercero`
--
ALTER TABLE `tercero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipotercero`
--
ALTER TABLE `tipotercero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_departamento` FOREIGN KEY (`iddepa`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tercero`
--
ALTER TABLE `tercero`
  ADD CONSTRAINT `fk_tercero_departamento1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tercero_municipio1` FOREIGN KEY (`idmunicipio`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tercero_tipotercero1` FOREIGN KEY (`tipotercero`) REFERENCES `tipotercero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
