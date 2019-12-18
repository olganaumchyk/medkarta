-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2019 г., 18:25
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
-- База данных: `karta_privivok`
--

-- --------------------------------------------------------

--
-- Структура таблицы `karta`
--

CREATE TABLE `karta` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL COMMENT 'дата вакцинации',
  `patients_id` int(11) NOT NULL COMMENT 'пациент',
  `privivki_id` int(11) NOT NULL COMMENT 'вакцина'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `karta`
--

INSERT INTO `karta` (`id`, `date`, `patients_id`, `privivki_id`) VALUES
(2, '2019-11-05', 4, 1),
(3, '2019-11-05', 2, 2),
(4, '2019-11-14', 4, 1),
(5, '2019-11-12', 4, 4),
(6, '2019-12-26', 3, 2),
(7, '2019-12-05', 5, 1),
(8, '2019-12-18', 6, 1),
(9, '2019-12-06', 6, 1),
(10, '2019-12-06', 4, 1),
(11, '2019-12-05', 6, 1),
(12, '2019-12-13', 7, 1),
(13, '2019-12-12', 8, 1),
(14, '2019-12-11', 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fio` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Фамилия Имя Отчество',
  `adres` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'адрес',
  `birth_date` date DEFAULT NULL COMMENT 'дата рождения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patients`
--

INSERT INTO `patients` (`id`, `fio`, `adres`, `birth_date`) VALUES
(2, 'Наумчик Ольга Викторовна', 'ул.Титова', '2019-11-01'),
(3, 'иванов иван', 'ул.Титова', '2019-07-17'),
(4, 'федоров илья петрович', 'ул.3-я Загородная', '2018-02-14'),
(5, 'федорова анна петровна', 'ул.Титова, 142', '2005-06-16'),
(6, 'федоров сергей ильич', 'ул.Титова,150', '2006-03-21'),
(7, 'федоров иван сергеевич', 'ул.Титова,144', '2010-11-12'),
(8, 'иванов федор петрович', 'ул.Титова,146', '2004-05-27'),
(9, 'федуро андрей леонидович', 'ул.Титова, 148', '2012-08-15');

-- --------------------------------------------------------

--
-- Структура таблицы `privivki`
--

CREATE TABLE `privivki` (
  `id` int(11) NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'название прививки',
  `vaccine` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'описание вакцины'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `privivki`
--

INSERT INTO `privivki` (`id`, `name`, `vaccine`) VALUES
(1, 'ипв', 'имовакс-полио'),
(2, 'гепатит В', 'Эувакс, Корея'),
(3, 'дифтерия', 'ад-м'),
(4, 'столбняк', 'акдс'),
(5, 'столбняк', 'пентаксим');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT '№',
  `login` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Пароль',
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Имя',
  `surname` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Фамилия',
  `user_group_id` int(11) NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `user_group_id`) VALUES
(1, 'admin', '123', 'Ольга', 'Наумчик', 1),
(2, 'user', '111', 'Наталья', 'Иванова', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL COMMENT '№',
  `cod` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Код',
  `description` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_group`
--

INSERT INTO `user_group` (`id`, `cod`, `description`) VALUES
(1, 'adm', 'Администраторы'),
(2, 'usr', 'Пользователи');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karta_patients_idx` (`patients_id`),
  ADD KEY `fk_karta_privivki1_idx` (`privivki_id`);

--
-- Индексы таблицы `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `privivki`
--
ALTER TABLE `privivki`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`user_group_id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `fk_users_user_group1_idx` (`user_group_id`);

--
-- Индексы таблицы `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod` (`cod`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `karta`
--
ALTER TABLE `karta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `privivki`
--
ALTER TABLE `privivki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `karta`
--
ALTER TABLE `karta`
  ADD CONSTRAINT `fk_karta_patients` FOREIGN KEY (`patients_id`) REFERENCES `patients` (`id`),
  ADD CONSTRAINT `fk_karta_privivki1` FOREIGN KEY (`privivki_id`) REFERENCES `privivki` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_group1` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;