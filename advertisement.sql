-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2017 г., 20:19
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `advertisement`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advt`
--

CREATE TABLE IF NOT EXISTS `advt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `advt`
--

INSERT INTO `advt` (`id`, `title`, `description`, `author_name`, `creation_date`, `user_id`) VALUES
(19, 'title1', 'desc', 'user 2', '2017-01-29 20:47:07', 16),
(20, 'title2', 'desc', 'user 1', '2017-01-29 21:34:34', 15),
(21, 'title3', 'desc', 'user 1', '2017-01-29 21:53:11', 15),
(22, 'title4', 'desc', 'user 1', '2017-01-29 22:01:17', 15),
(23, 'title5', 'desc', 'user 1', '2017-01-29 22:01:26', 15),
(24, 'title6', 'desc', 'user 1', '2017-01-30 22:07:38', 15),
(25, 'title7', 'desc', 'user 2', '2017-01-30 22:28:49', 16),
(28, 'title8', 'desc', 'user 2', '2017-01-30 22:44:10', 16),
(29, 'title9', 'desc', 'user 2', '2017-01-31 20:29:32', 16),
(30, 'title10', 'desc', 'user 2', '2017-01-31 20:30:33', 16),
(31, 'title11', 'desc', 'user 2', '2017-01-31 20:31:33', 16),
(32, 'title12', 'desc', 'user 2', '2017-01-31 21:29:03', 16),
(33, 'title13', 'desc', 'user 2', '2017-01-31 21:35:30', 16),
(34, 'title14', 'desc', 'user 2', '2017-01-31 21:37:42', 16),
(35, 'title15', 'desc', 'user 2', '2017-01-31 21:38:47', 16),
(37, 'title16', 'desc', 'user 2', '2017-01-31 21:40:09', 16),
(38, 'title17', 'desc', 'user 2', '2017-01-31 21:41:34', 16),
(40, 'title18', 'desc', 'user 1', '2017-02-01 22:14:35', 15),
(42, 'title19', 'desc', 'user 1', '2017-02-01 22:31:26', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(15, 'user 1', '111111'),
(16, 'user 2', '222222'),
(17, 'qq', 'qqqqqq'),
(19, 'ww', 'qqqqqq'),
(20, 'zz', 'zzzzzz');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `advt`
--
ALTER TABLE `advt`
  ADD CONSTRAINT `advt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
