-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 25 2024 г., 20:57
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Stavki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Bonus`
--

CREATE TABLE `Bonus` (
  `id_Bonus` int NOT NULL,
  `Id_User` int NOT NULL,
  `Text_Bonus` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Chislo_Bonus` int NOT NULL DEFAULT '1',
  `DateActive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Game`
--

CREATE TABLE `Game` (
  `id_game` int NOT NULL,
  `KindOfSport` int NOT NULL,
  `Name_game` varchar(85) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descrip_game` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Foto_game` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Game`
--

INSERT INTO `Game` (`id_game`, `KindOfSport`, `Name_game`, `descrip_game`, `Foto_game`) VALUES
(1, 1, 'Футбол', 'Футбол (від англ. football)  — командний вид спорту, в який грають дві команди по одинадцять гравців зі сферичним м\'ячем. Близько 250 мільйонів чоловіків і жінок із більш ніж 200 країн грають у футбол, що робить його найпопулярнішим у світі видом спорту. Футбол — олімпійський вид спорту.', 'Fotbol.jpg'),
(2, 2, 'Counter-Strike 2', 'Counter-Strike 2 (скорочено CS 2) — багатокористувацька гра в жанрі тактичного шутера від першої особи, розроблена компанією Valve. Є 5-ю грою в серії Counter-Strike. Valve анонсувала гру 22 березня 2023 року, оголосивши, що вона вийде влітку 2023 року. Компанія почала розсилати перші запрошення на обмежений тест для Counter-Strike 2 в ніч з 22 на 23 березня 2023 року, доступний тільки для користувачів Windows, доступ до нової версії гри отримали не всі гравці, а лише частина. За офіційною інформацією[2], компанія спиралася на кількість годин на офіційних серверах і на Trust Factor. Реліз гри відбувся 27 вересня 2023 року. Counter Strike 2 замінила CS:GO, яка була видалена зі Steam.', 'CounterStrike2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `MatchVS`
--

CREATE TABLE `MatchVS` (
  `id_Match` int NOT NULL,
  `id_Game` int NOT NULL,
  `Name_Match` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Opis_Match` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Foto_Match` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Koef_Team1` float NOT NULL,
  `Koef_Team2` float NOT NULL,
  `Date_Start` date NOT NULL,
  `Date_End` date NOT NULL,
  `Visible` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `MatchVS`
--

INSERT INTO `MatchVS` (`id_Match`, `id_Game`, `Name_Match`, `Opis_Match`, `Foto_Match`, `Koef_Team1`, `Koef_Team2`, `Date_Start`, `Date_End`, `Visible`) VALUES
(2, 1, 'Динамо VS Шахтар', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque doloribus laudantium nemo esse ex itaque obcaecati quae, sint praesentium earum accusamus eos officia deserunt qui minima incidunt? Vel, nam ratione!', 'dinamo-shahtar.jpg', 1.2, 2, '2024-04-25', '2024-04-30', 1),
(3, 2, 'NaVi VS G2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'NAVIVSG2.png', 2.3, 4, '2024-04-10', '2024-05-23', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Stavka`
--

CREATE TABLE `Stavka` (
  `id_Stavka` int NOT NULL,
  `Id_User` int NOT NULL,
  `id_Match` int NOT NULL,
  `Suma` int NOT NULL,
  `Pobeda` int NOT NULL,
  `result` int NOT NULL,
  `DataUser` date NOT NULL,
  `Active` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id_User` int NOT NULL,
  `Name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `SurName` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Father` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Tel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Country` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Oblast` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `City` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `FullAddres` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LVL` int NOT NULL DEFAULT '1',
  `Ochki` int NOT NULL DEFAULT '0',
  `Limitation` int NOT NULL DEFAULT '5000',
  `Password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id_User`, `Name`, `SurName`, `Father`, `DateOfBirth`, `Tel`, `Email`, `Country`, `Oblast`, `City`, `FullAddres`, `LVL`, `Ochki`, `Limitation`, `Password`, `Reg_date`) VALUES
(35, 'Ilya', NULL, NULL, NULL, NULL, 'ilya@gmail.com', NULL, NULL, NULL, NULL, 1, 0, 5000, '$2y$10$7Db40Ksxu3uID/sqahWeE.avfOGoIeBKELEDMb7PUGnkQY.sC3kVC', '2024-04-25 20:14:22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Bonus`
--
ALTER TABLE `Bonus`
  ADD PRIMARY KEY (`id_Bonus`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Индексы таблицы `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id_game`);

--
-- Индексы таблицы `MatchVS`
--
ALTER TABLE `MatchVS`
  ADD PRIMARY KEY (`id_Match`),
  ADD KEY `id_Game` (`id_Game`);

--
-- Индексы таблицы `Stavka`
--
ALTER TABLE `Stavka`
  ADD PRIMARY KEY (`id_Stavka`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `id_Team` (`id_Match`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_User`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Bonus`
--
ALTER TABLE `Bonus`
  MODIFY `id_Bonus` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Game`
--
ALTER TABLE `Game`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `MatchVS`
--
ALTER TABLE `MatchVS`
  MODIFY `id_Match` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Stavka`
--
ALTER TABLE `Stavka`
  MODIFY `id_Stavka` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Bonus`
--
ALTER TABLE `Bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `Users` (`id_User`);

--
-- Ограничения внешнего ключа таблицы `MatchVS`
--
ALTER TABLE `MatchVS`
  ADD CONSTRAINT `matchvs_ibfk_1` FOREIGN KEY (`id_Game`) REFERENCES `Game` (`id_game`);

--
-- Ограничения внешнего ключа таблицы `Stavka`
--
ALTER TABLE `Stavka`
  ADD CONSTRAINT `stavka_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `Users` (`id_User`),
  ADD CONSTRAINT `stavka_ibfk_3` FOREIGN KEY (`id_Match`) REFERENCES `MatchVS` (`id_Match`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
