-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 13 2022 г., 00:13
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2dz5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rights` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `password`, `mail`, `rights`) VALUES
(3, '', '', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'fghfgh@rrtyert', 'admin'),
(42, 'ertert', 'ertert', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'ertert@wewr', 'user'),
(49, 'sdfsdf', 'sdfsdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'sdfsdf@dfgdfg', 'user'),
(50, 'dsfsdf', 'sdfsdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'qweqwe@dsfsdf', 'user'),
(51, 'dsfsdf', 'sdfsdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'qweqwe@dsfsdf', 'user'),
(52, 'dssdf', 'sdfsdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'sdfsdf@ertert', 'user'),
(53, 'Алексей', 'fgh', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'werwer@wer.ru', 'user'),
(54, 'Алексей', 'dd', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'dfgdfg@dfgdfg', 'user'),
(55, 'Алексей', 'Федоров', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'qwert@ty.ru', 'user'),
(56, 'fdgdfg', 'dfg', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'qweqwe@sdfdsf.ru', 'user'),
(57, 'fdgdfg', 'dfg', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'qweqwe@sdfdsf.ru', 'user'),
(58, 'Алексей', 'sdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'sdfsdf@trt.ru', 'user'),
(59, 'Алексей', 'sdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'sdfsdf@trt.ru', 'user'),
(60, 'dfg', 'dfgd', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'dfgdfg@rt.tu', 'user'),
(61, 'dfg', 'dfgd', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'dfgdfg@rt.tu', 'user'),
(62, 'Алексей', 'fgh', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'fghfghf@tyry.ru', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
