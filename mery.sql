-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 01 2018 г., 07:47
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
  `alias` varchar(255) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `banner` text,
  `img_preview` text,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `alias`, `menu_id`, `banner`, `img_preview`, `price`, `status`) VALUES
(1, 'Маникюр', 'manikur', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(2, 'Педикюр', 'pedicur', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(3, 'Наращивание ресниц', 'resnitsi', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(4, 'Моделирование бровей', 'mod_brow', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(5, 'Микроблендинг', 'microblending', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(6, 'Шугаринг и Воск', 'shugaring_and_vosk', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(7, 'Услуги салона', '', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1),
(8, 'Татуаж (перманентный макияж)', 'tatug', 2, 'banner_1.png', 'kurs_1.png', '55.78', 1);

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
  `kind_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sits` int(11) NOT NULL DEFAULT '0',
  `limit_sits` int(11) NOT NULL,
  `img` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course`
--

INSERT INTO `course` (`id`, `name`, `date_start`, `date_end`, `master_id`, `category_id`, `kind_id`, `type_id`, `status`, `sits`, `limit_sits`, `img`) VALUES
(1, 'Как правильно наносить макияж', '2018-09-03', '2018-09-10', 1, 1, 1, 1, 1, 2, 3, 'beauty-care.png'),
(2, 'Как правильно наносить макияж 2', '2018-08-29', '2018-08-31', 1, 1, 1, 1, 1, 1, 3, 'beauty-care.png'),
(3, 'Как правильно наносить макияж 3', '2018-08-30', '2018-08-31', 1, 1, 1, 2, 1, 1, 3, 'beauty-care.png'),
(4, 'Как правильно наносить макияж 4', '2018-08-28', '2018-08-30', 1, 1, 1, 2, 1, 1, 3, 'beauty-care.png'),
(7, 'Как правильно наносить макияж 7', '2018-09-02', '2018-09-06', 1, 1, 2, 4, 1, 0, 3, 'beauty-care.png'),
(8, 'Как правильно наносить макияж 8', '2018-08-27', '2018-08-18', 1, 1, 2, 4, 1, 0, 3, 'beauty-care.png');

-- --------------------------------------------------------

--
-- Структура таблицы `course_kind`
--

CREATE TABLE `course_kind` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course_kind`
--

INSERT INTO `course_kind` (`id`, `name`, `category_id`) VALUES
(1, 'Обучения с нуля', 1),
(2, 'Повышения квалифакации', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `course_order`
--

CREATE TABLE `course_order` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course_order`
--

INSERT INTO `course_order` (`id`, `course_id`, `first_name`, `last_name`, `phone`, `price`, `status`, `created_at`) VALUES
(17, 2, 'Дмитрий', 'Ориховский', '+380979746559', 755, 2, '2018-08-28 08:51:47'),
(18, 4, 'Дмитрий', 'Ориховский', '+380979746559', 800, 1, '2018-08-28 08:51:52'),
(19, 3, 'Дмитрий', 'Ориховский', '+380979746559', 800, 1, '2018-08-28 11:50:13'),
(27, 1, 'Дмитрий', 'Ориховский', '+380979746559', 755, 3, '2018-08-30 13:42:42'),
(28, 1, 'Дмит', 'Ориховс', '+380979746777', 755, 2, '2018-08-31 07:49:03');

-- --------------------------------------------------------

--
-- Структура таблицы `course_type`
--

CREATE TABLE `course_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `course_type`
--

INSERT INTO `course_type` (`id`, `name`, `kind_id`, `category_id`, `price`, `description`) VALUES
(1, 'Базовый', 1, 1, 755, '1 деньОриентирован на то, чтобы изучить теоретические основы и базовые навыки для работы\n                                10.00 – 10.15 – Знакомство. Представление школы и внутреннего распорядка\n                                10.15 – 12.30 – Теоретическая часть\n                                дезинфекция и стерилизация в кабинете маникюра (руки клиента, руки мастера, поверхности, инструменты, обзор оборудования и средств)\n                                внешний вид мастера\n                                анатомия и строение ногтей и кожи\n                                придание правильной формы ногтей\n                                правила поведения мастера в коллективе и с клиентом\n                                виды инструментов\n                                виды маникюра\n\n                                12.30 – 13.00 – Перерыв на кофе\n                                13.00 – 16.00 – отработка практических навыков на модели\n\n                                классический обрезной маникюр\n                                парафинотерапия\n\n                                16.00 – 16.30 – Завершение, работа с вопросами\n\n                                2 деньНарабатывания практических навыков и отработка на моделях\n                                10.00 – 10.15 – Подготовка класса и демонстрация преподавателем правильной обработки инструментов. Короткое тестирования студентов по теории\n                                10.15 – 12.30 – Встреча клиента. Выполнение классического маникюра с покрытием гель-лаком\n                                12.30 – 15.00 – Встреча клиента. Выполнение европейского маникюра с покрытием гель-лаком\n                                15.00 – 17.30 - Отработка практических навыков в технике комбинированный маникюр с покрытием гель-лаком\n                                17.30 – 18.00 – Итоги работы. При успешной сдачи экзаменационной работы – вручение сертификата. Фотосетdsfsdfsdfsd\n                                Ученикам с собой иметь:*\n                                пушер\n                                asdasd\n                                кусачки\n                                блокнот и ручку\n                                sfdsf\n                                sdfsd\n                                sdfs'),
(2, 'Полный', 1, 1, 800, '2 деньОриентирован на то, чтобы изучить теоретические основы и базовые навыки для работы\n                                10.00 – 10.15 – Знакомство. Представление школы и внутреннего распорядка\n                                10.15 – 12.30 – Теоретическая часть\n                                дезинфекция и стерилизация в кабинете маникюра (руки клиента, руки мастера, поверхности, инструменты, обзор оборудования и средств)\n                                внешний вид мастера\n                                анатомия и строение ногтей и кожи\n                                придание правильной формы ногтей\n                                правила поведения мастера в коллективе и с клиентом\n                                виды инструментов\n                                виды маникюра\n\n                                12.30 – 13.00 – Перерыв на кофе\n                                13.00 – 16.00 – отработка практических навыков на модели\n\n                                классический обрезной маникюр\n                                парафинотерапия\n\n                                16.00 – 16.30 – Завершение, работа с вопросами\n\n                                2 деньНарабатывания практических навыков и отработка на моделях\n                                10.00 – 10.15 – Подготовка класса и демонстрация преподавателем правильной обработки инструментов. Короткое тестирования студентов по теории\n                                10.15 – 12.30 – Встреча клиента. Выполнение классического маникюра с покрытием гель-лаком\n                                12.30 – 15.00 – Встреча клиента. Выполнение европейского маникюра с покрытием гель-лаком\n                                15.00 – 17.30 - Отработка практических навыков в технике комбинированный маникюр с покрытием гель-лаком\n                                17.30 – 18.00 – Итоги работы. При успешной сдачи экзаменационной работы – вручение сертификата. Фотосетdsfsdfsdfsd\n                                Ученикам с собой иметь:*\n                                пушер\n                                asdasd\n                                кусачки\n                                блокнот и ручку\n                                sfdsf\n                                sdfsd\n                                sdfs'),
(4, 'Базовый', 2, 1, 1200, '3 деньОриентирован на то, чтобы изучить теоретические основы и базовые навыки для работы\n                                10.00 – 10.15 – Знакомство. Представление школы и внутреннего распорядка\n                                10.15 – 12.30 – Теоретическая часть\n                                дезинфекция и стерилизация в кабинете маникюра (руки клиента, руки мастера, поверхности, инструменты, обзор оборудования и средств)\n                                внешний вид мастера\n                                анатомия и строение ногтей и кожи\n                                придание правильной формы ногтей\n                                правила поведения мастера в коллективе и с клиентом\n                                виды инструментов\n                                виды маникюра\n\n                                12.30 – 13.00 – Перерыв на кофе\n                                13.00 – 16.00 – отработка практических навыков на модели\n\n                                классический обрезной маникюр\n                                парафинотерапия\n\n                                16.00 – 16.30 – Завершение, работа с вопросами\n\n                                2 деньНарабатывания практических навыков и отработка на моделях\n                                10.00 – 10.15 – Подготовка класса и демонстрация преподавателем правильной обработки инструментов. Короткое тестирования студентов по теории\n                                10.15 – 12.30 – Встреча клиента. Выполнение классического маникюра с покрытием гель-лаком\n                                12.30 – 15.00 – Встреча клиента. Выполнение европейского маникюра с покрытием гель-лаком\n                                15.00 – 17.30 - Отработка практических навыков в технике комбинированный маникюр с покрытием гель-лаком\n                                17.30 – 18.00 – Итоги работы. При успешной сдачи экзаменационной работы – вручение сертификата. Фотосетdsfsdfsdfsd\n                                Ученикам с собой иметь:*\n                                пушер\n                                asdasd\n                                кусачки\n                                блокнот и ручку\n                                sfdsf\n                                sdfsd\n                                sdfs'),
(5, 'Полный', 2, 1, 1100, '4 деньОриентирован на то, чтобы изучить теоретические основы и базовые навыки для работы\n                                10.00 – 10.15 – Знакомство. Представление школы и внутреннего распорядка\n                                10.15 – 12.30 – Теоретическая часть\n                                дезинфекция и стерилизация в кабинете маникюра (руки клиента, руки мастера, поверхности, инструменты, обзор оборудования и средств)\n                                внешний вид мастера\n                                анатомия и строение ногтей и кожи\n                                придание правильной формы ногтей\n                                правила поведения мастера в коллективе и с клиентом\n                                виды инструментов\n                                виды маникюра\n\n                                12.30 – 13.00 – Перерыв на кофе\n                                13.00 – 16.00 – отработка практических навыков на модели\n\n                                классический обрезной маникюр\n                                парафинотерапия\n\n                                16.00 – 16.30 – Завершение, работа с вопросами\n\n                                2 деньНарабатывания практических навыков и отработка на моделях\n                                10.00 – 10.15 – Подготовка класса и демонстрация преподавателем правильной обработки инструментов. Короткое тестирования студентов по теории\n                                10.15 – 12.30 – Встреча клиента. Выполнение классического маникюра с покрытием гель-лаком\n                                12.30 – 15.00 – Встреча клиента. Выполнение европейского маникюра с покрытием гель-лаком\n                                15.00 – 17.30 - Отработка практических навыков в технике комбинированный маникюр с покрытием гель-лаком\n                                17.30 – 18.00 – Итоги работы. При успешной сдачи экзаменационной работы – вручение сертификата. Фотосетdsfsdfsdfsd\n                                Ученикам с собой иметь:*\n                                пушер\n                                asdasd\n                                кусачки\n                                блокнот и ручку\n                                sfdsf\n                                sdfsd\n                                sdfs'),
(6, 'Тест', 1, 1, 877, '<p>вававіфвфавфіафііваіваівавіаіва і в віф віа іва іфва іва ів ваавіа івафаів ів ів</p>\r\n\r\n<p>іваіваіва іва</p>\r\n\r\n<ol>\r\n	<li>а іфва</li>\r\n	<li>аівф</li>\r\n	<li>фва</li>\r\n</ol>\r\n\r\n<p>іфваіваіфваіфаіваіва ідлвоаіва івр аліфвр ловірла віл аавір іваів аловіарів ар івраі ів ів афівр алівфр авір афівр аівр фі&nbsp;</p>\r\n\r\n<p>ів афріларвіфлар лірв аіфва олів іф враів арві аві авіфрарвіраівар вір івраірва&nbsp;</p>\r\n\r\n<p>іва іфвра іврарорівф раолвірарвіраоіфралоірфва іфв єфів аі</p>\r\n\r\n<p>ф іфвлоар іварівар фірфвіолд</p>\r\n\r\n<p>khfdsa&#39;</p>\r\n\r\n<p>dsf</p>\r\n\r\n<p>s</p>\r\n\r\n<p>dsfsfds</p>\r\n');

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

--
-- Дамп данных таблицы `course_user`
--

INSERT INTO `course_user` (`id`, `user_id`, `course_id`, `status`) VALUES
(16, 20, 2, 1),
(17, 20, 4, 1),
(18, 20, 3, 1),
(20, 20, 1, 1),
(21, 23, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `src` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `src`, `category_id`) VALUES
(1, 'work.png', 1),
(2, 'work.png', 1),
(3, 'work.png', 1),
(4, 'work.png', 1),
(5, 'work.png', 1);

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
  `video` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `master`
--

INSERT INTO `master` (`id`, `first_name`, `last_name`, `category_id`, `position`, `video`, `description`, `status`) VALUES
(1, 'Алла', 'Духова', 1, 'Мастер', 'BwDnMLQd', 'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное.Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное.Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное.Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. ', 1),
(3, 'Chuck ', 'Norris', 5, 'master', 'NIYZVSElmj4', 'Creators: Christopher Canaan, Leslie Greif, Paul Haggis, Albert S. Ruddy. Starring: Chuck Norris (as Cordell Walker), Clarence Gilyard Jr. (James Trivette), Sheree J. Wilson (as Alex Cahill), Noble Willingham (as C.D. Parker). Leslie Greif, Paul Haggis', 1);

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
(5, 'Отзывы', 'review', 0, 1),
(6, 'Моделям', 'for_models', 0, 1),
(7, 'Услуги салона', 'uslugi-salona', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `user_id`, `text`, `created_at`, `status`) VALUES
(1, 20, 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является  стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1),
(2, 20, 'Lorem Ipsum - это текст-"рыба", часто\r\n                                    используемый в печати и вэб-дизайне. Lorem Ipsum является\r\n                                    стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1),
(3, 20, 'Lorem Ipsum - это текст-"рыба", часто                                    используемый в печати и вэб-дизайне. Lorem Ipsum является                                    стандартной "рыбой" для текстов на латинице с начала XVI века.', '2018-08-22 08:21:49', 1),
(7, 20, 'dagdgdfg', '2018-08-31 14:58:48', 0);

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
(20, 'Дмитрий', 'Ориховский', '+380979746559', '$2y$10$71VquRdnFiWI5ZAnC.lG1.qGGfWu3WG14PDmrf1sJDq4U2Xg6RTk.', 'dimaoag@gmail.com', '2018-08-22 08:02:26', 'placeholder-profile.jpg', 'uploaded_photoe14cd44f_min.png', 4780, 1, 'admin'),
(21, 'Cергей', 'Соць', '+380939179871', '$2y$10$jizOJDL0YHDJiYXXG5SiJuJGftWKFRTDBPXT5iuOvLkZBVF4lgJ4u', 'dnevnik.marketologa@gmail.com', '2018-08-22 09:36:31', 'placeholder-profile.jpg', 'uploaded_photoc8489d2d_min.png', 1502, 1, 'user'),
(22, 'Ирина', 'Ковальчук', '+380633223426', '$2y$10$kV3MMRfYiIjwaO.rJEj/YOiEXjp5jNlsQ/wXF87A2EnXOrVPLl4IO', 'ik8697@gmail.com', '2018-08-22 11:15:27', 'no_avatar.jpg', 'no_avatar.jpg', 8806, 1, 'admin'),
(23, 'user', 'User', '+380111111111', '$2y$10$HbFHWFgcD4roQOisRDVVMuzpP.XLkwUkfQLsR2MVu4vB9AVnmmSG6', 'test@mail.com', '2018-08-23 14:29:26', 'no_avatar.jpg', 'no_avatar.jpg', 1217, 1, 'moderator');

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
  `category_id` int(11) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `video_review`
--

INSERT INTO `video_review` (`id`, `url`, `category_id`, `is_show`) VALUES
(1, 'IcrbM1l_BoI', 1, 1),
(2, 'IcrbM1l_BoI', 1, 1),
(3, 'IcrbM1l_BoI', 1, 1),
(4, 'IcrbM1l_BoI', 1, 1),
(5, 'oPrqeOrsQSc', 1, 1),
(6, 'MXvq8mcndfU', 1, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id_1` (`type_id`) USING BTREE;

--
-- Индексы таблицы `course_kind`
--
ALTER TABLE `course_kind`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Индексы таблицы `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kind_id` (`kind_id`);

--
-- Индексы таблицы `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `course_kind`
--
ALTER TABLE `course_kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `course_order`
--
ALTER TABLE `course_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `video_review`
--
ALTER TABLE `video_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `course_kind`
--
ALTER TABLE `course_kind`
  ADD CONSTRAINT `course_kind_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `course_order`
--
ALTER TABLE `course_order`
  ADD CONSTRAINT `course_order_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `course_type`
--
ALTER TABLE `course_type`
  ADD CONSTRAINT `course_type_ibfk_1` FOREIGN KEY (`kind_id`) REFERENCES `course_kind` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `video_review`
--
ALTER TABLE `video_review`
  ADD CONSTRAINT `video_review_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
