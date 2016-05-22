-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 22 2016 г., 21:09
-- Версия сервера: 10.0.17-MariaDB
-- Версия PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `topic_amount` int(11) NOT NULL DEFAULT '0',
  `last_posted_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `topic_amount`, `last_posted_date`) VALUES
(1, 'Test', 'its just for testing', 0, '2016-05-18 00:00:00'),
(2, 'Gaming', 'gaming stuff', 0, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `topic_content` varchar(255) NOT NULL,
  `topic_creator` varchar(255) NOT NULL,
  `topic_upvotes` int(11) NOT NULL DEFAULT '0',
  `topic_date` datetime NOT NULL,
  `topic_last_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `category`, `topic_title`, `topic_content`, `topic_creator`, `topic_upvotes`, `topic_date`, `topic_last_user`) VALUES
(1, 1, 'Title1', 'lalasd;askddfksdmfkdmfkasmkasdmkasmdkasm kmfkasmkdasmdka', 'Buttman', 0, '2016-05-19 00:00:00', '1'),
(2, 1, 'Topic1', 'asdasdasdasd', 'admin', 0, '2016-05-19 00:00:00', 'admin'),
(3, 2, 'Topic2', 'sdasdamkdaksdmaksmdka', 'Admin', 0, '2016-05-19 00:00:00', 'Admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'password', ''),
(2, 'test123', '1234556789999', ''),
(3, '@!$&^', '1231546789456', ''),
(4, '1231231231', '$2y$09$B0tbx0DHSNUqZ6SeTYKSOOHJO3fokVvojVlQlktOieAkxZG9bULyW', ''),
(5, 'respawnss', '$2y$09$PMZOUb8B0tbx0DHSNUqZ6OsXIxTpUjQAzJ5tVo9w6dYnfoqyQ7CBe', ''),
(6, 'tessakdaskda', '$2y$09$zAZqv2LiFZa0JYek9sMieeUyv3ucDIWpQks/Xp/zW5BuqygALEw.6', ''),
(7, 'paaassss', '$2y$09$Z11YKqDeUK2UIse5gMBr4es19s/eWnGs.TWXMfZFqEhepDu7/nOoS', ''),
(8, 'testttt', '$2y$09$eTYKSOQ5klufp7bj6iuBAuhJKTX8HJRe567y/QRGmQwZbCMQqbC1y', ''),
(9, 'tedjfjwkkk', '$2y$09$zkalhaaxPcOT5cxFJJlSaONns/WNgzAHUFYSk6vvSWQ8cH6rP55/C', ''),
(10, 'aa', '$2y$09$hn6UciYPFG6ydsJFNdEyfuvjJbZpd6Ep./fCQJ1rFBt7pUVKSiWSa', ''),
(11, 'b', '$2y$09$KghlSiwu3yJ9cEtjFXwzp.0fNNtaIqwivf/CuzJ4KsVuHaL7ph73m', ''),
(12, 'lalka97', '$2y$09$luLvRwYhT2JajDAkwezz1ekru.Q9RNIIF2xMzNqBlNB7.S9EjEvcW', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
