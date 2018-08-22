-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 22 2018 г., 12:51
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
  `video` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `alias`, `menu_id`, `master_id`, `banner`, `img_preview`, `img_center`, `video`, `description`, `price`, `status`) VALUES
(1, 'Маникюр', 'manikur', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это теківаіаіваст-"рыба", частіваіваіво испольіваізуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.\n\n', '55.78', 1),
(2, 'Педикюр', 'pedicur', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это тorem Ipsum является стнице с начала XVI века.', '55.78', 1),
(3, 'Наращивание ресниц', 'resnitsi', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", айне. Lorem Ipsum яв"рыбой" для текстов на латинице с начала XVI века.', '55.78', 1),
(4, 'Моделирование бровей', 'mod_brow', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", частsdfsdо испоfdsfsdfsdfльзуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.', '55.78', 1),
(5, 'Микроблендинг', 'microblending', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", частsdfsdо испоfdsfsdfsdfльзуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.', '55.78', 1),
(6, 'Шугаринг и Воск', 'shugaring_and_vosk', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", частsdfsdо испоfdsfsdfsdfльзуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.', '55.78', 1),
(7, 'Электроэпиляция', 'electroepil', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", частsdfsdо испоfdsfsdfsdfльзуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.', '55.78', 1),
(8, 'Татуаж (перманентный макияж)', 'tatug', 2, 1, 'baner.jpg', 'kurs_1.png', 'center.jpg', '11', 'Lorem Ipsum - это текст-"рыба", частsdfsdо испоfdsfsdfsdfльзуемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.', '55.78', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `master_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `sits` int(11) NOT NULL,
  `img` text,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Структура таблицы `course_user`
--

CREATE TABLE `course_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `src` text NOT NULL,
  `category_id` int(11) NOT NULL
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
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `master`
--

INSERT INTO `master` (`id`, `first_name`, `last_name`, `category_id`, `position`, `description`, `status`) VALUES
(1, 'Алла', 'Духова', 1, 'Мастер', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `is_child` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name`, `alias`, `is_child`, `status`) VALUES
(1, 'Главная', 'home', 0, 1),
(2, 'Курсы', 'courses', 1, 1),
(3, 'Видеоуроки', 'video_lessons', 0, 1),
(4, 'Форум', 'forum', 0, 1),
(5, 'Отзывы', 'reviews', 0, 1),
(6, 'Моделям', 'for_models', 0, 1),
(7, 'Услуги салона', 'service', 0, 1);

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

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `user_id`, `text`, `created_at`, `status`, `is_show`) VALUES
(1, 20, 'Lorem Ipsum - это текст-"рыба", часто\r\n                                    используемый в печати и вэб-дизайне. Lorem Ipsum является\r\n                                    стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1, 1),
(2, 20, 'Lorem Ipsum - это текст-"рыба", часто\r\n                                    используемый в печати и вэб-дизайне. Lorem Ipsum является\r\n                                    стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1, 1),
(3, 20, 'Lorem Ipsum - это текст-"рыба", часто\r\n                                    используемый в печати и вэб-дизайне. Lorem Ipsum является\r\n                                    стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1, 1);

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
  `photo_origin` text,
  `photo_profile` text,
  `code` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `role` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `phone`, `password`, `email`, `created_at`, `photo_origin`, `photo_profile`, `code`, `active`, `role`) VALUES
(20, 'Дмитрий', 'Ориховский', '+380979746559', '$2y$10$71VquRdnFiWI5ZAnC.lG1.qGGfWu3WG14PDmrf1sJDq4U2Xg6RTk.', 'dimaoag@gmail.com', '2018-08-22 08:02:26', 'placeholder-profile.jpg', 'uploaded_photoe14cd44f_min.png', 4780, 1, 'user'),
(21, 'Cергей', 'Соць', '+380939179871', '$2y$10$jizOJDL0YHDJiYXXG5SiJuJGftWKFRTDBPXT5iuOvLkZBVF4lgJ4u', 'dnevnik.marketologa@gmail.com', '2018-08-22 09:36:31', 'placeholder-profile.jpg', 'uploaded_photoc8489d2d_min.png', 1502, 1, 'user'),
(22, 'Ирина', 'Ковальчук', '+380633223426', '$2y$10$kV3MMRfYiIjwaO.rJEj/YOiEXjp5jNlsQ/wXF87A2EnXOrVPLl4IO', 'ik8697@gmail.com', '2018-08-22 11:15:27', 'no_avatar.jpg', 'no_avatar.jpg', 8806, 1, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL,
  `comments` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video`
--

INSERT INTO `video` (`id`, `url`, `created_at`, `likes`, `comments`, `category_id`, `title`, `is_show`, `status`) VALUES
(1, 'IcrbM1l_BoI', '2018-08-20 14:08:29', 5, 10, 1, 'Как наносить правильно макияж', 1, 1),
(2, 'aPO_qbRBhfQ', '2018-08-20 14:08:29', 3, 7, 2, 'Как наносить правильно макияж 2', 1, 1),
(3, 'ULDZwdqZTwE', '2018-08-20 14:08:29', 8, 5, 15, 'Как наносить правильно макияж 2', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `video_review`
--

CREATE TABLE `video_review` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Индексы таблицы `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
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
-- Индексы таблицы `video_review`
--
ALTER TABLE `video_review`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT для таблицы `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `video_review`
--
ALTER TABLE `video_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
