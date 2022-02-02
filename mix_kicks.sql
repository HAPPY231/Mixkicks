-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Paź 2021, 21:55
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mix_kicks`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `buty`
--

CREATE TABLE `buty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `cena` int(11) NOT NULL,
  `zdjecie` varchar(30) NOT NULL,
  `rok_produkcji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `buty`
--

INSERT INTO `buty` (`id`, `nazwa`, `cena`, `zdjecie`, `rok_produkcji`) VALUES
(1, 'Vapormax', 200, 'vapormax', 2021),
(2, 'Airmax', 300, 'airmax', 2020);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `buty`
--
ALTER TABLE `buty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `buty`
--
ALTER TABLE `buty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
