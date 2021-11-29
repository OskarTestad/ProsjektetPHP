-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29. Nov, 2021 13:14 PM
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
-- Database: `prosjekt`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `adresse`
--

CREATE TABLE `adresse` (
  `Adresse_ID` int(10) NOT NULL,
  `Gateadresse_ID` int(6) DEFAULT NULL,
  `Poststed_ID` int(6) DEFAULT NULL,
  `Postnummer_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `gateadresse`
--

CREATE TABLE `gateadresse` (
  `Gateadresse_ID` int(6) NOT NULL,
  `Gateadresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `interesse`
--

CREATE TABLE `interesse` (
  `Interesse_ID` int(6) NOT NULL,
  `Interesse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `interesseset`
--

CREATE TABLE `interesseset` (
  `Intteresseset_ID` int(6) NOT NULL,
  `Medlem_ID` int(6) DEFAULT NULL,
  `Interesse_ID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kursaktiviteter`
--

CREATE TABLE `kursaktiviteter` (
  `Kursaktiviteter_ID` int(6) NOT NULL,
  `Kursaktiviteter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlem`
--

CREATE TABLE `medlem` (
  `Medlem_ID` int(6) NOT NULL,
  `Kursaktiviteter_ID` int(6) DEFAULT NULL,
  `Adresse_ID` int(10) DEFAULT NULL,
  `BirtDate` datetime DEFAULT NULL,
  `Fornavn` varchar(50) DEFAULT NULL,
  `Etternavn` varchar(50) DEFAULT NULL,
  `Mobilnummer` int(8) DEFAULT NULL,
  `E_post` varchar(50) DEFAULT NULL,
  `KontigentStatus` varchar(50) DEFAULT NULL,
  `Kjønn` varchar(50) DEFAULT NULL,
  `MedlemSiden` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `postnummer`
--

CREATE TABLE `postnummer` (
  `Postnummer_ID` int(6) NOT NULL,
  `Postnummer` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `poststed`
--

CREATE TABLE `poststed` (
  `Poststed_ID` int(6) NOT NULL,
  `Poststed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`Adresse_ID`),
  ADD KEY `Gateadresse_ID` (`Gateadresse_ID`),
  ADD KEY `Poststed_ID` (`Poststed_ID`),
  ADD KEY `Postnummer_ID` (`Postnummer_ID`);

--
-- Indexes for table `gateadresse`
--
ALTER TABLE `gateadresse`
  ADD PRIMARY KEY (`Gateadresse_ID`);

--
-- Indexes for table `interesse`
--
ALTER TABLE `interesse`
  ADD PRIMARY KEY (`Interesse_ID`);

--
-- Indexes for table `interesseset`
--
ALTER TABLE `interesseset`
  ADD PRIMARY KEY (`Intteresseset_ID`),
  ADD KEY `Medlem_ID` (`Medlem_ID`),
  ADD KEY `Interesse_ID` (`Interesse_ID`);

--
-- Indexes for table `kursaktiviteter`
--
ALTER TABLE `kursaktiviteter`
  ADD PRIMARY KEY (`Kursaktiviteter_ID`);

--
-- Indexes for table `medlem`
--
ALTER TABLE `medlem`
  ADD PRIMARY KEY (`Medlem_ID`),
  ADD KEY `Kursaktiviteter_ID` (`Kursaktiviteter_ID`),
  ADD KEY `Adresse_ID` (`Adresse_ID`);

--
-- Indexes for table `postnummer`
--
ALTER TABLE `postnummer`
  ADD PRIMARY KEY (`Postnummer_ID`);

--
-- Indexes for table `poststed`
--
ALTER TABLE `poststed`
  ADD PRIMARY KEY (`Poststed_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `Adresse_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateadresse`
--
ALTER TABLE `gateadresse`
  MODIFY `Gateadresse_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interesse`
--
ALTER TABLE `interesse`
  MODIFY `Interesse_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interesseset`
--
ALTER TABLE `interesseset`
  MODIFY `Intteresseset_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kursaktiviteter`
--
ALTER TABLE `kursaktiviteter`
  MODIFY `Kursaktiviteter_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medlem`
--
ALTER TABLE `medlem`
  MODIFY `Medlem_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postnummer`
--
ALTER TABLE `postnummer`
  MODIFY `Postnummer_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poststed`
--
ALTER TABLE `poststed`
  MODIFY `Poststed_ID` int(6) NOT NULL AUTO_INCREMENT;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`Gateadresse_ID`) REFERENCES `gateadresse` (`Gateadresse_ID`),
  ADD CONSTRAINT `adresse_ibfk_2` FOREIGN KEY (`Poststed_ID`) REFERENCES `poststed` (`Poststed_ID`),
  ADD CONSTRAINT `adresse_ibfk_3` FOREIGN KEY (`Postnummer_ID`) REFERENCES `postnummer` (`Postnummer_ID`);

--
-- Begrensninger for tabell `interesseset`
--
ALTER TABLE `interesseset`
  ADD CONSTRAINT `interesseset_ibfk_1` FOREIGN KEY (`Medlem_ID`) REFERENCES `medlem` (`Medlem_ID`),
  ADD CONSTRAINT `interesseset_ibfk_2` FOREIGN KEY (`Interesse_ID`) REFERENCES `interesse` (`Interesse_ID`);

--
-- Begrensninger for tabell `medlem`
--
ALTER TABLE `medlem`
  ADD CONSTRAINT `medlem_ibfk_1` FOREIGN KEY (`Kursaktiviteter_ID`) REFERENCES `kursaktiviteter` (`Kursaktiviteter_ID`),
  ADD CONSTRAINT `medlem_ibfk_2` FOREIGN KEY (`Adresse_ID`) REFERENCES `adresse` (`Adresse_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
