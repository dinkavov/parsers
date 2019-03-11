-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Жов 12 2017 р., 00:06
-- Версія сервера: 5.6.34-log
-- Версія PHP: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `search_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `query` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `queries`
--

INSERT INTO `queries` (`id`, `query`) VALUES
(1, '+iPhone+6'),
(2, 'iPhone'),
(3, 'Samsung s8 duos'),
(4, 'iPhone 7'),
(5, 'iPad 3'),
(6, 'iPhone 6');

-- --------------------------------------------------------

--
-- Структура таблиці `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `query_id` int(11) NOT NULL,
  `shop` varchar(50) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `results`
--

INSERT INTO `results` (`id`, `query_id`, `shop`, `price`) VALUES
(1, 5, 'NOVOMOBI', '295\n329\n,00\n,00\n'),
(2, 6, 'S-TELL', '7 999\n11 199\n,00\n,00'),
(3, 6, 'City.com.ua', '7 999,00'),
(4, 6, 'Protovar.com.ua - Одесса', '12 933,00'),
(5, 6, 'SMUZI MARKET', '8 040,00'),
(6, 6, 'JetPad', '8 040,00');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `query_id` (`query_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`query_id`) REFERENCES `queries` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
