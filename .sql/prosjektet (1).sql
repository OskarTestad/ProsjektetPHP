-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07. Des, 2021 18:39 PM
-- Tjener-versjon: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prosjektet`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `aktiviteter`
--

CREATE TABLE `aktiviteter` (
  `aktivitetID` int(6) NOT NULL,
  `navn` varchar(30) NOT NULL,
  `ansvarlig` varchar(30) NOT NULL,
  `startDato` date DEFAULT NULL,
  `sluttDato` date DEFAULT NULL,
  `dagensDato` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `aktiviteter`
--

INSERT INTO `aktiviteter` (`aktivitetID`, `navn`, `ansvarlig`, `startDato`, `sluttDato`, `dagensDato`) VALUES
(1, 'Bandy', 'Oskar', '2022-11-10', '2022-11-13', '2021-11-15 00:00:00'),
(2, 'Basket', 'Oskar', '2020-11-10', '2020-11-13', '2021-11-15 00:00:00'),
(3, 'Fotballturnering', 'Adel', '2021-12-20', '2021-12-27', '2021-11-15 00:00:00'),
(4, 'Bordtennis', 'Oskar', '2021-11-10', '2021-11-13', '2021-11-15 00:00:00'),
(5, 'Hockeyturnering', 'Oskar', '2011-05-05', '2011-05-05', '2011-05-05 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medaktivitet`
--

CREATE TABLE `medaktivitet` (
  `medlemID` int(6) NOT NULL,
  `aktivitetID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `medaktivitet`
--

INSERT INTO `medaktivitet` (`medlemID`, `aktivitetID`) VALUES
(1, 1),
(1, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlemmer`
--

CREATE TABLE `medlemmer` (
  `medlemID` int(6) NOT NULL,
  `fornavn` varchar(30) NOT NULL,
  `etternavn` varchar(30) NOT NULL,
  `brukernavn` varchar(50) DEFAULT NULL,
  `passord` varchar(255) DEFAULT NULL,
  `gateadresse` varchar(50) DEFAULT NULL,
  `postnr` int(4) DEFAULT NULL,
  `poststed` varchar(50) DEFAULT NULL,
  `epost` varchar(30) NOT NULL,
  `telefon` int(30) NOT NULL,
  `fødselsdato` date NOT NULL,
  `kjønn` varchar(30) NOT NULL,
  `interesser` varchar(30) NOT NULL,
  `medlemSiden` date NOT NULL,
  `kontigentStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `medlemmer`
--

INSERT INTO `medlemmer` (`medlemID`, `fornavn`, `etternavn`, `brukernavn`, `passord`, `gateadresse`, `postnr`, `poststed`, `epost`, `telefon`, `fødselsdato`, `kjønn`, `interesser`, `medlemSiden`, `kontigentStatus`) VALUES
(1, 'aDEL', 'Bero', 'Dz2', '$2y$10$iznUsd/axUombvoJ104tVeETcJefTrdyqlWo/mHxn2pOyX5z9YLcO', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'denetbero@hotmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', '2011-05-05', 'Betalt'),
(2, 'Oskar', 'Testad', 'Testad', '$2y$10$A7h9PUcPhWrb9knEyl2Mx..7kaSIGy7zvwzYAldz2nfW3GZwEW6pu', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', '2011-05-05', 'Betalt'),
(3, 'Irmelin', 'Dalbakken', 'irmelin', '$2y$10$g6O1WnATHA3JNjZP.WSgr./UqsVW7nAcBLgKqjlRinReywa7KpXHu', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'dame', 'Innebandy', '2021-12-07', 'Betalt');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlemrolle`
--

CREATE TABLE `medlemrolle` (
  `MedlemID` int(10) NOT NULL,
  `Rolle_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `medlemrolle`
--

INSERT INTO `medlemrolle` (`MedlemID`, `Rolle_ID`) VALUES
(1, 1),
(1, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `roller`
--

CREATE TABLE `roller` (
  `Rolle_ID` int(10) NOT NULL,
  `Roller` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `roller`
--

INSERT INTO `roller` (`Rolle_ID`, `Roller`) VALUES
(1, 'Leder'),
(2, 'Nestleder'),
(3, 'Kursansvarlig'),
(4, 'Kasserer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  ADD PRIMARY KEY (`aktivitetID`);

--
-- Indexes for table `medaktivitet`
--
ALTER TABLE `medaktivitet`
  ADD PRIMARY KEY (`medlemID`,`aktivitetID`),
  ADD KEY `aktivitetID` (`aktivitetID`);

--
-- Indexes for table `medlemmer`
--
ALTER TABLE `medlemmer`
  ADD PRIMARY KEY (`medlemID`);

--
-- Indexes for table `medlemrolle`
--
ALTER TABLE `medlemrolle`
  ADD PRIMARY KEY (`MedlemID`,`Rolle_ID`),
  ADD KEY `Rolle_ID` (`Rolle_ID`);

--
-- Indexes for table `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`Rolle_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  MODIFY `aktivitetID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roller`
--
ALTER TABLE `roller`
  MODIFY `Rolle_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `medaktivitet`
--
ALTER TABLE `medaktivitet`
  ADD CONSTRAINT `medaktivitet_ibfk_1` FOREIGN KEY (`medlemID`) REFERENCES `medlemmer` (`medlemID`),
  ADD CONSTRAINT `medaktivitet_ibfk_2` FOREIGN KEY (`aktivitetID`) REFERENCES `aktiviteter` (`aktivitetID`);

--
-- Begrensninger for tabell `medlemrolle`
--
ALTER TABLE `medlemrolle`
  ADD CONSTRAINT `medlemrolle_ibfk_1` FOREIGN KEY (`MedlemID`) REFERENCES `medlemmer` (`medlemID`),
  ADD CONSTRAINT `medlemrolle_ibfk_2` FOREIGN KEY (`Rolle_ID`) REFERENCES `roller` (`Rolle_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
