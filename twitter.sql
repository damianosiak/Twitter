-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Paź 2018, 21:47
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twitter`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kraje`
--

CREATE TABLE `kraje` (
  `IDkraju` int(11) NOT NULL,
  `Nazwakraju` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kraje`
--

INSERT INTO `kraje` (`IDkraju`, `Nazwakraju`) VALUES
(1, 'Anglia'),
(2, 'Austria'),
(3, 'Czechy'),
(4, 'Francja'),
(5, 'Hiszpania'),
(6, 'Holandia'),
(7, 'Irlandia'),
(8, 'Niemcy'),
(9, 'Polska'),
(10, 'Rosja'),
(11, 'Słowacja'),
(12, 'Szwajcaria'),
(13, 'Ukraina'),
(14, 'Węgry'),
(15, 'Włochy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plec`
--

CREATE TABLE `plec` (
  `IDplec` int(11) NOT NULL,
  `Nazwaplec` tinytext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `plec`
--

INSERT INTO `plec` (`IDplec`, `Nazwaplec`) VALUES
(1, 'Mężczyzna'),
(2, 'Kobieta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posty`
--

CREATE TABLE `posty` (
  `ID_uzytkownika` int(11) NOT NULL,
  `Tresc_post` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `ID` int(11) NOT NULL,
  `Login` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Haslo` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Email` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Telefon` bigint(11) NOT NULL,
  `Pytanie` text COLLATE utf8_polish_ci NOT NULL,
  `Odpowiedz` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Imie` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Plec` tinyint(4) NOT NULL,
  `Kraj` tinyint(4) NOT NULL,
  `Miasto` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Tytul` tinytext COLLATE utf8_polish_ci NOT NULL,
  `Dataurodzenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
