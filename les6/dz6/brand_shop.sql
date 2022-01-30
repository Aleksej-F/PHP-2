-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2022 г., 18:30
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
-- База данных: `brand_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_user`, `id_product`, `count`) VALUES
(59, 1, 3, 5),
(60, 1, 2, 14),
(61, 1, 4, 4),
(62, 1, 8, 2),
(63, 1, 7, 2),
(64, 1, 6, 2),
(65, 1, 5, 2),
(66, 1, 1, 6),
(67, 26, 2, 3),
(68, 26, 3, 1),
(69, 26, 1, 1),
(70, 26, 4, 1),
(71, 30, 3, 1),
(72, 30, 2, 1),
(73, 30, 4, 1),
(74, 31, 3, 3),
(75, 31, 2, 2),
(76, 31, 1, 1),
(77, 31, 6, 1),
(79, 32, 3, 1),
(80, 32, 4, 1),
(81, 33, 3, 3),
(82, 34, 2, 2),
(83, 34, 4, 1),
(84, 34, 8, 1),
(85, 34, 7, 1),
(87, 35, 3, 1),
(88, 35, 7, 1),
(89, 35, 6, 1),
(90, 33, 6, 3),
(91, 36, 7, 1),
(92, 36, 8, 1),
(93, 36, 5, 1),
(94, 37, 2, 1),
(95, 37, 3, 1),
(96, 37, 4, 1),
(97, 37, 1, 1),
(99, 38, 3, 1),
(100, 38, 4, 1),
(101, 38, 1, 1),
(102, 39, 2, 1),
(103, 39, 3, 1),
(104, 39, 1, 1),
(105, 39, 4, 1),
(106, 40, 2, 1),
(107, 40, 1, 1),
(108, 40, 3, 1),
(109, 40, 4, 1),
(110, 33, 2, 6),
(111, 33, 7, 6),
(112, 33, 8, 1),
(113, 41, 2, 5),
(115, 41, 3, 3),
(116, 41, 7, 1),
(143, 43, 3, 2),
(148, 43, 4, 1),
(149, 43, 2, 1),
(150, 43, 6, 1),
(151, 43, 7, 1),
(152, 43, 8, 1),
(153, 43, 5, 1),
(162, 44, 3, 6),
(163, 44, 6, 2),
(164, 44, 7, 1),
(165, 45, 3, 1),
(166, 45, 4, 1),
(167, 45, 2, 1),
(168, 45, 1, 1),
(169, 48, 1, 2),
(170, 48, 2, 2),
(171, 48, 3, 2),
(172, 48, 4, 2),
(173, 48, 5, 2),
(174, 48, 6, 1),
(175, 48, 7, 2),
(176, 48, 8, 2),
(177, 49, 2, 1),
(178, 49, 3, 1),
(179, 49, 4, 1),
(180, 49, 5, 1),
(181, 49, 6, 1),
(182, 49, 7, 1),
(183, 49, 8, 1),
(184, 50, 1, 1),
(185, 51, 2, 13),
(186, 51, 3, 10),
(187, 51, 8, 1),
(188, 51, 1, 1),
(189, 51, 7, 1),
(190, 51, 4, 1),
(240, 163, 8, 1),
(241, 163, 7, 2),
(242, 163, 6, 2),
(243, 163, 5, 1),
(255, 209, 2, 7),
(271, 219, 2, 1),
(272, 219, 3, 7),
(273, 219, 4, 1),
(274, 219, 8, 1),
(275, 220, 2, 1),
(276, 220, 3, 1),
(277, 221, 1, 1),
(278, 221, 2, 1),
(279, 221, 3, 1),
(280, 221, 4, 1),
(281, 222, 2, 1),
(286, 217, 3, 1),
(287, 217, 2, 1),
(288, 217, 3, 1),
(289, 217, 4, 1),
(290, 217, 1, 1),
(329, 3, 2, 1),
(331, 3, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `house` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `delivery_address`
--

INSERT INTO `delivery_address` (`id`, `id_user`, `city`, `street`, `house`, `flat`) VALUES
(2, 227, 'Овчинникова', 'fdgdf', '10dfg', 434),
(3, 42, 'апр', 'апр', 'а', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `order_information`
--

CREATE TABLE `order_information` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `delivery_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_information`
--

INSERT INTO `order_information` (`id`, `id_user`, `order_number`, `status`, `delivery_address`) VALUES
(1, 55, 1, 'rtert', 10),
(2, 55, 2, 'erwerwer', 10),
(3, 56, 1, 'dfgd', 10),
(4, 56, 2, 'fgdfg', 10),
(5, 56, 3, 'fgdfg', 10),
(6, 77, 1, 'оплачен', 11),
(11, 42, 1, 'оплачен', 3),
(12, 42, 2, 'оплачен', 3),
(13, 42, 3, 'оплачен', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `title`, `size`, `price`, `img`, `description`, `count`) VALUES
(1, 'куртка мужская', 10, 725, 'rectangle_5_copy_3_1209.jpg', 'dfdfgdfcxvbbcvb\r\ndfgdfgdfg\r\nxcxcvxcvzxc\r\nsdfdsdfsgdfg\r\nxcvxcvxv \r\nghjghjgghj\r\nhgjghjghj', 10),
(2, 'MANGO PEOPLE T-SHIRT5555', 10, 545, 'rectangle_5_copy_1193.jpg', 'dfgdfgdfgdfgd fgbvxcvbcvb cvbcvbeertjghjghjkkk kkkkkkkkkkkkkkkkkkkkkkkkkkkk kkkkkkkkkkkkkkkkkkk kkkkkkkkkkkk kkkkkkkkk\r\nkkkkkkkkkk\r\nkkkkkkkkkk\r\nfghfgh\r\nfghfghfh dfgdfgdfg ghjghj ghfghfghfghfgh', 10),
(3, 'MANGO PEOPLE T-SHIRT', 10, 54, 'rectangle_5_copy_1201.jpg', 'ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg ggggg', 15),
(4, 'MANGO PEOPLE T-SHIRT', 10, 55, 'rectangle_5_copy_1240.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 15),
(5, 'MANGO PEOPLE T-SHIRT', 10, 56, 'rectangle_5_copy_1248.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 15),
(6, 'MANGO PEOPLE T-SHIRT', 10, 57, 'rectangle_5_copy_1256.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 15),
(7, 'MANGO PEOPLE T-SHIRT', 10, 589, 'rectangle_5_copy_1264.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 15),
(8, 'MANGO PEOPLE T-SHIRT', 10, 59, 'rectangle_5_copy_1272.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`id`, `id_order`, `id_product`, `count`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 3),
(3, 24, 1, 1),
(4, 24, 2, 1),
(5, 24, 7, 1),
(6, 24, 8, 1),
(7, 26, 2, 1),
(8, 26, 3, 1),
(9, 26, 4, 1),
(10, 29, 2, 1),
(11, 29, 3, 1),
(12, 29, 4, 1),
(13, 29, 8, 1),
(14, 29, 7, 1),
(15, 29, 6, 1),
(16, 29, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `title`, `id_product`) VALUES
(1, 1, 'hfghffghfgh', 1),
(2, 1, 'sdfsdf', 1),
(3, 4, 'очень хороша', 1),
(4, 5, 'неплохо', 2),
(5, 1, 'dfdfgdfgdfgdfgdfgdfgdfgdfgdfgg', 1),
(6, 1, 'dfdfgdfgdfgdfgdfgdfgdfgdfgdfgg', 1),
(7, 1, 'fghfghr tyg rytyu yui', 4),
(9, 1, 'reviews', 1),
(10, 1, 'dfgdfg', 1),
(12, 1, 'dfgdfg', 3),
(13, 1, 'dfgdfg', 3),
(14, 1, 'yuiyui', 3),
(15, 1, 'dfgdfg', 8),
(16, 1, 'fghfghfgh', 2),
(17, 1, 'dfgdfgdfgdfgdertertert', 6),
(18, 1, 'пропро', 6),
(57, 1, 'werwerwer', 1),
(58, 1, 'dfgdfgdgf', 1),
(59, 1, 'dfgdfg', 1),
(60, 1, 'dfgdfg', 1),
(61, 1, 'dfgdfg', 1),
(62, 1, 'dfgdfgdfg', 5),
(63, 1, 'dfgdfg', 5),
(64, 1, 'dfgdfg', 5),
(65, 1, 'dfgdfg', 5),
(66, 1, 'dfgdfg', 5),
(67, 1, 'dfgdfg', 2),
(68, 1, 'dfg', 2),
(69, 1, 'dfg', 2),
(70, 1, 'dfg', 2),
(71, 1, 'dfg', 2),
(72, 1, 'dfg', 2),
(73, 1, 'dfg', 4),
(74, 1, 'dg', 4),
(75, 1, 'dfg', 4),
(76, 1, '', 1),
(77, 1, 'пропропро', 2),
(78, 1, 'fghfgh', 4),
(79, 1, 'fghfgh', 4),
(80, 1, 'fghfgh', 4),
(81, 1, 'fghfh', 4),
(82, 1, '464654', 3),
(83, 1, 'dfgdfg', 2),
(84, 1, 'dfgdfg', 2),
(85, 1, 'fghfgh', 2),
(86, 1, 'fghfgh', 2),
(87, 1, 'fghfgh', 2),
(88, 1, 'fdgdfg', 2),
(89, 31, 'dfgdfg', 3),
(90, 33, 'вапвап', 2),
(91, 33, 'sdfsd', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rights` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `password`, `phone`, `mail`, `rights`) VALUES
(3, '', '', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '7921077', 'fghfgh@rrtyert', 'admin'),
(18, 'fgh', 'fghfgh', 'sldfjsklfdj23lfd0,.sde10adc3949ba59abbe56e057f20f883esldfjsklfdj23lfd0,.sd', '345345', 'retert@rtfg', 'user'),
(19, 'ert', 'ert', 'sldfjsklfdj23lfd0,.sd87d58962d7ed48cd1854011fe4253482sldfjsklfdj23lfd0,.sd', '345345', 'ertert@rty', 'user'),
(20, 'Aldyffl', 'dfgertert', 'sldfjsklfdj23lfd0,.sd5416d7cd6ef195a0f7622a9c56b55e84sldfjsklfdj23lfd0,.sd', '545345345', 'qweqwe@ertert', 'user'),
(21, '123', '123', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '12312', 'weqw@qwer', 'user'),
(22, 'werew', 'werwer', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '23424', 'ewrw@trert', 'user'),
(23, 'ertert', 'ertert', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', 'ertert', 'weqw@qwerr', 'user'),
(24, 'wer', 'wer', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '324234', 'ewrwe@sdfsdf', 'user'),
(33, 'dfgdfg', 'dfg', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '345345', 'dgdfg@dsfsdf', 'user'),
(42, 'ertert', 'ertert', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '345345345', 'ertert@wewr', 'user'),
(46, 'qwer', 'qweqwe', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '234234234', 'wqweqr@reter.ru', 'user'),
(47, 'werwer', 'werwer', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '234234', 'werwer@ertert.ru', 'user'),
(209, 'fghfgh', 'fghfgh', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '5456456456', 'fghfgh@ertefffrt.ru', 'user'),
(210, 'gfghfgh', 'fghfgh', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '345345345', 'ewrwerwe@tytyu.ru', 'user'),
(211, 'dfg', 'dfgdfg', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '5645645', 'rtyrtyr@tyrty.ty', 'user'),
(212, 'weqwe', 'asdasd', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '4534534', 'qeqwe@tyuty.yu', 'user'),
(213, 'йцуйцу', 'цуйцу', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '234234', 'qweqwe@rt.ru', 'user'),
(214, 'dfgdfg', 'dfgdfg', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '546456546', 'dgdfgdfg@yyuyu.yu', 'user'),
(215, 'retert', 'ertert', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '5345345', 'fdgdfgd@gh.tu', 'user'),
(216, 'dsdf', 'sdfsdf', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '34534534', 'fdgdfgd@grtrrth.tu', 'user'),
(217, 'ertert', 'ertert', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '345345', 'fdgdfgd@rrrrrrgh.tu', 'user'),
(219, '-1642889868', '1', '1', '1', '1', 'guest'),
(220, '-1642888605', '1', '1', '1', '1', 'guest'),
(221, '-1642890063', '1', '1', '1', '1', 'guest'),
(222, '-1642890541', '1', '1', '1', '1', 'guest'),
(223, '-1642889996', '1', '1', '1', '1', 'guest'),
(224, 'вапвап', 'вапвапвапукеуке', 'sldfjsklfdj23lfd0,.sd8e80d2035142b70ec6083887e1815994sldfjsklfdj23lfd0,.sd', '45345345', 'qedfgdfg@ttt.ru', 'user'),
(225, '-21643141681', '1', '1', '1', '1', 'guest'),
(226, '-31643220033', '1', '1', '1', '1', 'guest'),
(227, '-31643223470', '1', '1', '1', '1', 'guest');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_information`
--
ALTER TABLE `order_information`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT для таблицы `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `order_information`
--
ALTER TABLE `order_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
