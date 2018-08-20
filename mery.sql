-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 20 2018 г., 14:58
-- Версия сервера: 5.7.23-0ubuntu0.16.04.1
-- Версия PHP: 7.0.31-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `created_at`, `comments`, `likes`, `img`, `is_show`, `status`) VALUES
(1, 'title 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi doloremque ipsa sequi. Alias aperiam ea fuga magnam nisi officia quam quia sequi veniam. Amet asperiores consequuntur deleniti eligendi ipsa minus ratione suscipit. Ad alias animi aspernatur atque blanditiis corporis dolorem esse, facilis illo incidunt iste magnam magni maiores molestias nam non nulla officiis omnis quae quasi qui recusandae sit tenetur ullam vel velit vitae. Accusantium aperiam consectetur, doloribus eligendi laudantium modi mollitia nesciunt non officia quam quia quisquam veniam vitae. Alias cupiditate deleniti doloremque doloribus eius est explicabo impedit in, nam, nihil non perferendis quia quidem rerum sint tempore voluptatibus.', '2018-08-20 13:58:43', 5, 7, 'kurs_1.png', 1, 1),
(2, 'title title 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi doloremque ipsa sequi. Alias aperiam ea fuga magnam nisi officia quam quia sequi veniam. Amet asperiores consequuntur deleniti eligendi ipsa minus ratione suscipit. Ad alias animi aspernatur atque blanditiis corporis dolorem esse, facilis illo incidunt iste magnam magni maiores molestias nam non nulla officiis omnis quae quasi qui recusandae sit tenetur ullam vel velit vitae. Accusantium aperiam consectetur, doloribus eligendi laudantium modi mollitia nesciunt non officia quam quia quisquam veniam vitae. Alias cupiditate deleniti doloremque doloribus eius est explicabo impedit in, nam, nihil non perferendis quia quidem rerum sint tempore voluptatibus.', '2018-08-20 13:58:43', 3, 6, 'kurs_1.png', 1, 1),
(3, 'title title title 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi doloremque ipsa sequi. Alias aperiam ea fuga magnam nisi officia quam quia sequi veniam. Amet asperiores consequuntur deleniti eligendi ipsa minus ratione suscipit. Ad alias animi aspernatur atque blanditiis corporis dolorem esse, facilis illo incidunt iste magnam magni maiores molestias nam non nulla officiis omnis quae quasi qui recusandae sit tenetur ullam vel velit vitae. Accusantium aperiam consectetur, doloribus eligendi laudantium modi mollitia nesciunt non officia quam quia quisquam veniam vitae. Alias cupiditate deleniti doloremque doloribus eius est explicabo impedit in, nam, nihil non perferendis quia quidem rerum sint tempore voluptatibus.', '2018-08-20 13:58:43', 9, 4, 'kurs_1.png', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carousel`
--

INSERT INTO `carousel` (`id`, `src`, `category_id`, `status`) VALUES
(1, '111.png', 1, 1),
(2, '111.png', 2, 1),
(3, '111.png', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `master_id` int(11) DEFAULT NULL,
  `banner` text,
  `img_preview` text,
  `img_center` text,
  `video` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `master_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `sits` int(11) NOT NULL,
  `limit_sits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `course_kind`
--

CREATE TABLE `course_kind` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `course_order`
--

CREATE TABLE `course_order` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `createc_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `course_type`
--

CREATE TABLE `course_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `decription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `course_users`
--

CREATE TABLE `course_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `alias`, `status`) VALUES
(1, 'Главная', 'home', 1),
(2, 'Курсы', 'courses', 1),
(3, 'Видеоуроки', 'video_lessons', 1),
(4, 'Форум', 'forum', 1),
(5, 'Отзывы', 'reviews', 1),
(6, 'Моделям', 'for_models', 1),
(7, 'Услуги салона', 'service', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` text NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id`, `url`, `created_at`, `likes`, `category_id`, `title`, `is_show`, `status`) VALUES
(1, 'IcrbM1l_BoI', '2018-08-20 14:08:29', 5, 1, 'Как наносить правильно макияж', 1, 1),
(2, 'aPO_qbRBhfQ', '2018-08-20 14:08:29', 3, 2, 'Как наносить правильно макияж 2', 1, 1),
(3, 'ULDZwdqZTwE', '2018-08-20 14:08:29', 8, 15, 'Как наносить правильно макияж 2', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_kind`
--
ALTER TABLE `course_kind`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_users`
--
ALTER TABLE `course_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `course_kind`
--
ALTER TABLE `course_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `course_order`
--
ALTER TABLE `course_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `course_users`
--
ALTER TABLE `course_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
