-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Máj 23. 12:18
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tortarendelesek_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tortarendelesek`
--

CREATE TABLE `tortarendelesek` (
  `id` int(11) NOT NULL,
  `nev` varchar(255) NOT NULL,
  `megrendeles_datuma` date NOT NULL,
  `komment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `tortarendelesek`
--

INSERT INTO `tortarendelesek` (`id`, `nev`, `megrendeles_datuma`, `komment`) VALUES
(1, 'BAILEYS', '2024-05-30', 'dscscs'),
(2, 'SZABOLCSI', '2024-05-31', 'nagyon finom');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tortarendelesek`
--
ALTER TABLE `tortarendelesek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tortarendelesek`
--
ALTER TABLE `tortarendelesek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
