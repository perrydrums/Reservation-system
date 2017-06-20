-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 jan 2017 om 13:15
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leondrums`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `available`
--

CREATE TABLE `available` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groupdays`
--

CREATE TABLE `groupdays` (
  `id` int(11) NOT NULL,
  `monday1` tinyint(1) NOT NULL,
  `monday2` tinyint(1) NOT NULL,
  `wednesday` tinyint(1) NOT NULL,
  `thursday` tinyint(1) NOT NULL,
  `friday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `groupdays`
--

INSERT INTO `groupdays` (`id`, `monday1`, `monday2`, `wednesday`, `thursday`, `friday`) VALUES
(20, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `grouplessons`
--

CREATE TABLE `grouplessons` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(15) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `grouplessons`
--

INSERT INTO `grouplessons` (`id`, `firstname`, `lastname`, `email`, `tel`, `age`, `gender`, `datetime`) VALUES
(4, 'd', 'd', 'd@d.a', 2, 20, 'Man', '2017-01-18 13:45:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `privatelessons`
--

CREATE TABLE `privatelessons` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` int(15) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `groupdays`
--
ALTER TABLE `groupdays`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `grouplessons`
--
ALTER TABLE `grouplessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `privatelessons`
--
ALTER TABLE `privatelessons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `available`
--
ALTER TABLE `available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;
--
-- AUTO_INCREMENT voor een tabel `groupdays`
--
ALTER TABLE `groupdays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `grouplessons`
--
ALTER TABLE `grouplessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `privatelessons`
--
ALTER TABLE `privatelessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
