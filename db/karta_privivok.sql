-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 29 2019 г., 19:33
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `karta_privivok`
--

-- --------------------------------------------------------

--
-- Структура таблицы `karta`
--

CREATE TABLE `karta`
(
  `id` int
(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `patients_id` int
(11) NOT NULL,
  `privivki_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients`
(
  `id` int
(11) NOT NULL,
  `fio` text,
  `adres` varchar
(45) DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `privivki`
--

CREATE TABLE `privivki`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(45) DEFAULT NULL,
  `vaccine` varchar
(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `karta`
--
ALTER TABLE `karta`
ADD PRIMARY KEY
(`id`),
ADD KEY `fk_karta_patients_idx`
(`patients_id`),
ADD KEY `fk_karta_privivki1_idx`
(`privivki_id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
ADD PRIMARY KEY
(`id`);

--
-- Индексы таблицы `privivki`
--
ALTER TABLE `privivki`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `karta`
--
ALTER TABLE `karta`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `privivki`
--
ALTER TABLE `privivki`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `karta`
--
ALTER TABLE `karta`
ADD CONSTRAINT `fk_karta_patients` FOREIGN KEY
(`patients_id`) REFERENCES `patients`
(`id`),
ADD CONSTRAINT `fk_karta_privivki1` FOREIGN KEY
(`privivki_id`) REFERENCES `privivki`
(`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
