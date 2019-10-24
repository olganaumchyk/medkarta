-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 24 2019 г., 20:31
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `karta`
--

CREATE TABLE `karta` (
  `idpatients` int(11) NOT NULL,
  `idprivivki` int(11) DEFAULT NULL,
  `name_priv` varchar(45) DEFAULT NULL,
  `fio` varchar(45) DEFAULT NULL,
  `privivki_idprivivki` int(11) NOT NULL,
  `patients_idpatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `idpatients` int(11) NOT NULL,
  `fio` text,
  `adress` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `privivki`
--

CREATE TABLE `privivki` (
  `idprivivki` int(11) NOT NULL,
  `name_priv` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `nomber_vaccine` varchar(45) DEFAULT NULL,
  `proizvoditel` varchar(45) DEFAULT NULL,
  `srok` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`idpatients`,`privivki_idprivivki`,`patients_idpatients`),
  ADD KEY `fk_karta_privivki_idx` (`privivki_idprivivki`),
  ADD KEY `fk_karta_patients1_idx` (`patients_idpatients`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`idpatients`);

--
-- Индексы таблицы `privivki`
--
ALTER TABLE `privivki`
  ADD PRIMARY KEY (`idprivivki`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `idpatients` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `privivki`
--
ALTER TABLE `privivki`
  MODIFY `idprivivki` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `karta`
--
ALTER TABLE `karta`
  ADD CONSTRAINT `fk_karta_patients1` FOREIGN KEY (`patients_idpatients`) REFERENCES `patients` (`idpatients`),
  ADD CONSTRAINT `fk_karta_privivki` FOREIGN KEY (`privivki_idprivivki`) REFERENCES `privivki` (`idprivivki`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
