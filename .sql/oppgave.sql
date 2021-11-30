-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30. Nov, 2021 15:54 PM
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
-- Database: `oppgave`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dataark for tabell `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq', 'test@test.com');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `ajax_example`
--

CREATE TABLE `ajax_example` (
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `wpm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `ajax_example`
--

INSERT INTO `ajax_example` (`name`, `age`, `sex`, `wpm`) VALUES
('Frank', 45, 'm', 87),
('Jerry', 120, 'm', 20),
('Jill', 22, 'f', 72),
('Julie', 35, 'f', 90),
('Regis', 75, 'm', 44),
('Tracy', 27, 'f', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `aktiviteter`
--

CREATE TABLE `aktiviteter` (
  `aktivitetID` int(6) UNSIGNED NOT NULL,
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
(4, 'Bordtennis', 'Oskar', '2021-11-10', '2021-11-13', '2021-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `medlemmer`
--

CREATE TABLE `medlemmer` (
  `medlemID` int(6) UNSIGNED NOT NULL,
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
  `interesser2` varchar(50) DEFAULT NULL,
  `fagAktiviteter` varchar(30) NOT NULL,
  `medlemSiden` date NOT NULL,
  `kontigentStatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `medlemmer`
--

INSERT INTO `medlemmer` (`medlemID`, `fornavn`, `etternavn`, `brukernavn`, `passord`, `gateadresse`, `postnr`, `poststed`, `epost`, `telefon`, `fødselsdato`, `kjønn`, `interesser`, `interesser2`, `fagAktiviteter`, `medlemSiden`, `kontigentStatus`) VALUES
(1, 'Oskar', 'Testad', 'testad98', '123', 'Peder Claussøns gate', 4630, 'Kristiansand', 'Oskar.testad@gmail.com', 48350836, '1998-11-10', 'Mann', 'Fotball', 'Bordtennis', 'IT', '1998-10-11', 'Betalt'),
(2, 'Irmelin', 'Dalbakken', 'irmelin99', '1234', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'dairmelin@hotmail.no', 41264752, '1999-04-12', 'dame', 'Greys', 'Bordtennis', 'Journalistikk', '2011-05-03', 'Betalt'),
(3, 'Adel', 'Hodzalari', NULL, NULL, 'Kristiansands gate', 4630, 'Kristiansand', 'adelh@gmail.com', 12121212, '1998-08-20', 'mann', 'Innebandy', 'Basket', 'IT', '2011-05-05', 'Betalt'),
(8, 'Adrian', 'Hammer', NULL, NULL, 'Kristiansands gate', 4630, 'Kristiansand', 'adr@gmail.com', 12345678, '2005-06-16', 'mann', 'Fotball', 'Langrenn', 'IT', '2011-05-05', 'Betalt'),
(9, 'Kristian', 'Testad', NULL, NULL, 'Labråtan 18', 1349, 'Rykkinn', 'kristian@gmail.com', 12345678, '2001-05-24', 'mann', 'Gaming', 'Damer', 'XXL', '2011-05-02', 'Betalt'),
(10, 'Kristian2', 'Testad', NULL, NULL, 'Labråtan 18', 1349, 'Rykkinn', 'kristian@gmail.com', 12345678, '2001-05-24', 'mann', 'Gaming', 'Damer', 'XXL', '2011-05-02', 'Betalt'),
(18, 'Oskar', 'Testad', 'testad', '$2y$10$L1vPI0iBmXEDdD1Lmws5yuvFNyCMNegKg1g/s9vku8W8SRsVXUgpC', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', 'Bordtennis', 'Journalistikk', '2011-05-05', 'Betalt'),
(19, 'Irmelin', 'Dalbakken', 'irm', '$2y$10$7pS9VoA2F/8PHdzNmBAgKuQZw0hVMybKNYGtkFuDUtwS5MvDqPIVq', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', 'Bordtennis', 'XXL', '2011-05-05', 'Betalt'),
(20, 'Sindre', 'Dalbakken', 'sindre', '$2y$10$Hh1QoeNv7ehhG.NBpnhvYegths.58giiG2PaLTN4x7Myg1ekyRHqy', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', 'Damer', 'XXL', '2011-05-05', 'Betalt'),
(21, 'Dzenet ', 'Bero', 'Dz', '$2y$10$wr.0g5FGoYypkYnLrNr.2uKCiUD94q6hLQM4EbqExGOWJvPDbp7dm', 'Gyldensjagh', 1252, 'jdjhd,,saj', 'osjmdij@ksdhyu', 12345678, '2011-05-05', 'mann', 'Fotball', 'Damer', 'IT', '2011-05-05', 'Betalt'),
(22, 'Irmelin', 'Dalbakken', 'testad1', '$2y$10$U.HT375KbQm42bDVTmqOLO4ZwqaMWlsy/LJg.Lw.UvO/erUxPWfVm', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'oskar.testad@gmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', 'Bordtennis', 'IT', '2011-05-05', 'Betalt'),
(23, 'Irmelin', 'Dalbakken', 'irm1', '$2y$10$9dlvHtp2sfTgmC3UXFSZve6g4PnoX2SHQitrhwz8mxgzGvfS57ymO', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'dairmelin@hotmail.no', 41264752, '2011-05-05', 'dame', 'Greys', 'Damer', 'Journalistikk', '2021-11-29', 'Betalt'),
(24, 'Dzenet', 'Bero', 'Dz2', '$2y$10$iznUsd/axUombvoJ104tVeETcJefTrdyqlWo/mHxn2pOyX5z9YLcO', 'Peder Claussøns Gate', 4630, 'Kristiansand', 'denetbero@hotmail.com', 41264752, '2011-05-05', 'mann', 'Fotball', 'Fotball', 'Journalistikk', '2011-05-05', 'Betalt');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `sitater`
--

CREATE TABLE `sitater` (
  `sitatID` int(6) UNSIGNED NOT NULL,
  `dato` datetime DEFAULT NULL,
  `sitat` varchar(255) NOT NULL,
  `opphavsperson` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dataark for tabell `sitater`
--

INSERT INTO `sitater` (`sitatID`, `dato`, `sitat`, `opphavsperson`) VALUES
(2, '2021-11-24 13:59:53', 'If you build it, they will come', 'Joe Jackson'),
(3, '2021-11-24 00:00:00', 'If you want something done right, do it yourself', 'Charles-Guillaume Étienne'),
(4, '2021-11-24 00:00:00', 'If you want something said, ask a man; if you want something done, ask a woman.', 'Margaret Thatcher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ajax_example`
--
ALTER TABLE `ajax_example`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  ADD PRIMARY KEY (`aktivitetID`);

--
-- Indexes for table `medlemmer`
--
ALTER TABLE `medlemmer`
  ADD PRIMARY KEY (`medlemID`);

--
-- Indexes for table `sitater`
--
ALTER TABLE `sitater`
  ADD PRIMARY KEY (`sitatID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aktiviteter`
--
ALTER TABLE `aktiviteter`
  MODIFY `aktivitetID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medlemmer`
--
ALTER TABLE `medlemmer`
  MODIFY `medlemID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sitater`
--
ALTER TABLE `sitater`
  MODIFY `sitatID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
