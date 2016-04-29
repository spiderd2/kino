-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Kwi 2016, 23:19
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `filmy_test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmytest`
--

CREATE TABLE `filmytest` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `FilmwebID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `filmytest`
--

INSERT INTO `filmytest` (`ID`, `Title`, `FilmwebID`) VALUES
(1, 'Wall-E', 399328),
(2, 'Gran Torino', 476580),
(3, 'Forrest Gump', 998),
(4, 'Terminator 2', 992),
(5, 'Wsciekle Psy', 11843),
(6, 'Pulp Fiction', 1039);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `filmytest`
--
ALTER TABLE `filmytest`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `filmytest`
--
ALTER TABLE `filmytest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
