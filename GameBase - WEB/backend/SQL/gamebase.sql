-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: mysql.omega:3306
-- Létrehozás ideje: 2023. Máj 07. 16:13
-- Kiszolgáló verziója: 5.7.40-log
-- PHP verzió: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `gamebase`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `gameName` varchar(100) NOT NULL,
  `gameDesc` text NOT NULL,
  `gamePrice` int(11) NOT NULL,
  `pegi` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `downloadCount` int(11) NOT NULL,
  `releaseDate` varchar(30) NOT NULL,
  `publisherId` int(11) NOT NULL,
  `bannerUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `games`
--

INSERT INTO `games` (`id`, `gameName`, `gameDesc`, `gamePrice`, `pegi`, `category`, `downloadCount`, `releaseDate`, `publisherId`, `bannerUrl`) VALUES
(1, 'Counter Strike - Global Offensive', 'A Counter-Strike: Global Offensive (CS:GO) kiterjeszti azt a csapatalapú akciójátékot, amelynek 19 évvel ezelőtti megjelenésekor úttörője volt. A CS:GO új pályákat, karaktereket, fegyvereket és játékmódokat mutat be, és a klasszikus CS-tartalmak (de_dust2 stb.) frissített verzióit is elhozza.', 1, 18, 'FPS, Lövöldözős, Többjátékos	', 1411, '2012. aug. 21.', 1, 'https://media.steampowered.com/apps/csgo/blog/images/fb_image.png?v=1'),
(2, 'It Takes Two', 'Az It Takes Two egy akció-kaland platform videojáték, amelyet a Hazelight Studios fejlesztett ki és az Electronic Arts adott ki. 2021 márciusában jelent meg PlayStation 4-re, PlayStation 5-re, Windowsra, Xbox One-ra és Xbox Series X/S-re, 2022 novemberében pedig Nintendo Switchre', 40, 12, 'Együttműködő, Többjátékos, Osztott képernyős																		', 1324, '2021. márc. 26.', 2, 'https://i.imgur.com/XveJVNa.jpg'),
(4, 'Euro Truck Simulator 2', 'Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.', 20, 3, 'Vezetés, Többjátékos', 31, '2023-05-05', 0, 'https://cdn.akamai.steamstatic.com/steam/apps/227300/header.jpg?t=1677839068');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ownedgames`
--

CREATE TABLE `ownedgames` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `gameID` int(11) NOT NULL,
  `purchDate` varchar(30) NOT NULL COMMENT 'Vásárlás ideje',
  `playTime` int(11) NOT NULL COMMENT 'Játszott idő'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `ownedgames`
--

INSERT INTO `ownedgames` (`id`, `userID`, `gameID`, `purchDate`, `playTime`) VALUES
(11, 1, 1, '2023-05-04 17:32', 0),
(14, 1, 4, '2023-05-05 15:59', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `employeeCount` int(11) NOT NULL,
  `joinDate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `publishers`
--

INSERT INTO `publishers` (`id`, `Name`, `employeeCount`, `joinDate`) VALUES
(1, 'EA Games', 1341, '2023-05-05'),
(2, 'Epic Games', 41, '2023-05-01');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(10) NOT NULL COMMENT 'user, mod, admin',
  `emailAddress` varchar(100) NOT NULL,
  `regDate` varchar(30) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`, `emailAddress`, `regDate`, `money`) VALUES
(1, 'Ben', '5fd924625f6ab16a19cc9807c7c506ae1813490e4ba675f843d5a10e0baacdb8', 'admin', 'Ben@bendev.hu', '1', 10);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `ownedgames`
--
ALTER TABLE `ownedgames`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `ownedgames`
--
ALTER TABLE `ownedgames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
