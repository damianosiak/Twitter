-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Paź 2018, 12:39
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
  `IDpostu` int(11) NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL,
  `Tresc_post` text COLLATE utf8_polish_ci NOT NULL,
  `Datapostu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posty`
--

INSERT INTO `posty` (`IDpostu`, `ID_uzytkownika`, `Tresc_post`, `Datapostu`) VALUES
(5, 1, 'Witaj', '2018-10-22 15:42:23'),
(6, 1, 'asdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsdasdsd\r\n', '2018-10-22 15:42:32'),
(8, 2, 'Siemka', '2018-10-22 17:26:51');

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
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`ID`, `Login`, `Haslo`, `Email`, `Telefon`, `Pytanie`, `Odpowiedz`, `Imie`, `Nazwisko`, `Plec`, `Kraj`, `Miasto`, `Tytul`, `Dataurodzenia`) VALUES
(1, 'admin', '12345', 'admin@twitter.com', 48500213545, 'Jak się wabi mój pies?', 'Rufi', 'Damian', 'Osiak', 1, 9, 'Jastrzębie-Zdrój', 'Właściciel', '1999-03-26'),
(2, 'testowy', '123456', 'sdfds@op.pl', 42678567567, 'Jaki', 'Taki', 'Anin', 'Asds', 1, 9, 'Wra', 'Asda', '1989-12-21');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `posty`
--
ALTER TABLE `posty`
  ADD PRIMARY KEY (`IDpostu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `posty`
--
ALTER TABLE `posty`
  MODIFY `IDpostu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
