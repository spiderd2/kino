-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Maj 2016, 01:54
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bilety`
--

CREATE TABLE `bilety` (
  `id_biletu` int(10) UNSIGNED NOT NULL,
  `rezerwacje_id_rezerwacji` smallint(5) UNSIGNED NOT NULL,
  `miejsca_id_miejsca` int(10) UNSIGNED NOT NULL,
  `ceny_idceny` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ceny`
--

CREATE TABLE `ceny` (
  `idceny` int(10) UNSIGNED NOT NULL,
  `rodzaj` varchar(45) NOT NULL,
  `cena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `id_filmu` int(10) UNSIGNED NOT NULL,
  `tytul` varchar(45) NOT NULL,
  `filmweb_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`id_filmu`, `tytul`, `filmweb_id`) VALUES
(1, 'Tytul Filmu1', 123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsca`
--

CREATE TABLE `miejsca` (
  `id_miejsca` int(10) UNSIGNED NOT NULL,
  `rzad` int(10) UNSIGNED DEFAULT NULL,
  `miejsce` int(10) UNSIGNED DEFAULT NULL,
  `sale_kinowe_id_sale_kinowe` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_rezerwacji` smallint(5) UNSIGNED NOT NULL,
  `data_rezerwacji` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rezerwacji`, `data_rezerwacji`, `uzytkownicy_id_uzytkownika`, `seanse_id_seansu`) VALUES
(0, '0000-00-00 00:00:00.000000', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sale_kinowe`
--

CREATE TABLE `sale_kinowe` (
  `id_sale_kinowe` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `sale_kinowe`
--

INSERT INTO `sale_kinowe` (`id_sale_kinowe`) VALUES
(1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seanse`
--

CREATE TABLE `seanse` (
  `id_seansu` int(10) UNSIGNED NOT NULL,
  `rozpoczecie` datetime NOT NULL,
  `zakonczenie` datetime NOT NULL,
  `filmy_id_filmu` int(10) UNSIGNED NOT NULL,
  `sale_kinowe_id_sale_kinowe` smallint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `seanse`
--

INSERT INTO `seanse` (`id_seansu`, `rozpoczecie`, `zakonczenie`, `filmy_id_filmu`, `sale_kinowe_id_sale_kinowe`) VALUES
(1, '2016-05-18 03:11:05', '2016-05-18 07:26:21', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` smallint(5) UNSIGNED NOT NULL,
  `login` varchar(20) NOT NULL,
  `haslo` varchar(32) NOT NULL,
  `email` varchar(254) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `email`, `imie`, `nazwisko`, `telefon`) VALUES
(1, 'User1', 'user', 'user1@user.pl', 'Pawel', 'Ka', '123123123'),
(2, 'User2', 'user', 'user2@ja.pl', 'Kamil', 'Iksinski', '12334345');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `bilety`
--
ALTER TABLE `bilety`
  ADD PRIMARY KEY (`id_biletu`),
  ADD UNIQUE KEY `id_biletu_UNIQUE` (`id_biletu`),
  ADD KEY `fk_bilety_rezerwacje1_idx` (`rezerwacje_id_rezerwacji`),
  ADD KEY `fk_bilety_miejsca1_idx` (`miejsca_id_miejsca`),
  ADD KEY `fk_bilety_ceny1_idx` (`ceny_idceny`);

--
-- Indexes for table `ceny`
--
ALTER TABLE `ceny`
  ADD PRIMARY KEY (`idceny`),
  ADD UNIQUE KEY `idceny_UNIQUE` (`idceny`);

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_filmu`),
  ADD UNIQUE KEY `idfilmy_UNIQUE` (`id_filmu`),
  ADD UNIQUE KEY `filmweb_id_UNIQUE` (`filmweb_id`);

--
-- Indexes for table `miejsca`
--
ALTER TABLE `miejsca`
  ADD PRIMARY KEY (`id_miejsca`),
  ADD UNIQUE KEY `id_miejsca_UNIQUE` (`id_miejsca`),
  ADD KEY `fk_miejsca_sale_kinowe1_idx` (`sale_kinowe_id_sale_kinowe`);

--
-- Indexes for table `sale_kinowe`
--
ALTER TABLE `sale_kinowe`
  ADD PRIMARY KEY (`id_sale_kinowe`),
  ADD UNIQUE KEY `id_sale_kinowe_UNIQUE` (`id_sale_kinowe`);

--
-- Indexes for table `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`id_seansu`),
  ADD UNIQUE KEY `idseanse_UNIQUE` (`id_seansu`),
  ADD KEY `fk_seanse_filmy1_idx` (`filmy_id_filmu`),
  ADD KEY `fk_seanse_sale_kinowe1_idx` (`sale_kinowe_id_sale_kinowe`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD UNIQUE KEY `id_uzytkownika_UNIQUE` (`id_uzytkownika`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bilety`
--
ALTER TABLE `bilety`
  MODIFY `id_biletu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `ceny`
--
ALTER TABLE `ceny`
  MODIFY `idceny` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_filmu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  MODIFY `id_miejsca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `sale_kinowe`
--
ALTER TABLE `sale_kinowe`
  MODIFY `id_sale_kinowe` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `seanse`
--
ALTER TABLE `seanse`
  MODIFY `id_seansu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `bilety`
--
ALTER TABLE `bilety`
  ADD CONSTRAINT `fk_bilety_ceny1` FOREIGN KEY (`ceny_idceny`) REFERENCES `ceny` (`idceny`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bilety_miejsca1` FOREIGN KEY (`miejsca_id_miejsca`) REFERENCES `miejsca` (`id_miejsca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bilety_rezerwacje1` FOREIGN KEY (`rezerwacje_id_rezerwacji`) REFERENCES `rezerwacje` (`id_rezerwacji`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  ADD CONSTRAINT `fk_miejsca_sale_kinowe1` FOREIGN KEY (`sale_kinowe_id_sale_kinowe`) REFERENCES `sale_kinowe` (`id_sale_kinowe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `fk_seanse_filmy1` FOREIGN KEY (`filmy_id_filmu`) REFERENCES `filmy` (`id_filmu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_seanse_sale_kinowe1` FOREIGN KEY (`sale_kinowe_id_sale_kinowe`) REFERENCES `sale_kinowe` (`id_sale_kinowe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
