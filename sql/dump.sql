-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 30 2013 г., 14:40
-- Версия сервера: 5.5.28
-- Версия PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `kohana`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `value`, `text`, `sort`) VALUES
(1, '105.2 а', 'Убийство двух и более лиц', 1),
(4, '228.1', 'Производство и распространение наркотических средств', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

DROP TABLE IF EXISTS `characteristics`;
CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `characteristics`
--

INSERT INTO `characteristics` (`id`, `value`, `text`, `sort`) VALUES
(2, 2, 'Совершено в отношении несовершеннолетнего', 2),
(3, 3, 'Совершено военнослужащими', 3),
(4, 4, 'Правонарушения против полицейских', 4),
(5, 6, 'Совершено несовершеннолетним', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `decrees`
--

DROP TABLE IF EXISTS `decrees`;
CREATE TABLE IF NOT EXISTS `decrees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `decrees`
--

INSERT INTO `decrees` (`id`, `value`, `text`, `sort`) VALUES
(1, 1, 'Отправить в суд', 1),
(2, 2, 'Отправить в прокуратуру', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `failure_causes`
--

DROP TABLE IF EXISTS `failure_causes`;
CREATE TABLE IF NOT EXISTS `failure_causes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `failure_causes`
--

INSERT INTO `failure_causes` (`id`, `value`, `text`, `sort`) VALUES
(1, 1, 'Вышел срок давности ', 1),
(2, 2, 'Тестовая', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `investigators`
--

DROP TABLE IF EXISTS `investigators`;
CREATE TABLE IF NOT EXISTS `investigators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `investigators`
--

INSERT INTO `investigators` (`id`, `name`, `position`, `sort`) VALUES
(1, 'Иванов Сергей Иванович', 'Лейтенант', 1),
(2, 'Петров Виталий Петрович', 'Старший лейтенант', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

DROP TABLE IF EXISTS `materials`;
CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `krsp_num` int(10) unsigned DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `source_id` int(10) unsigned DEFAULT NULL,
  `plot` text NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `investigator_id` int(10) unsigned DEFAULT NULL,
  `decree_id` int(10) unsigned DEFAULT NULL,
  `decree_date` timestamp NULL DEFAULT NULL,
  `period_id` int(10) unsigned NOT NULL DEFAULT '1',
  `failure_cause_id` int(10) unsigned DEFAULT NULL,
  `decree_cancel_date` timestamp NULL DEFAULT NULL,
  `extra_investigator_id` int(10) unsigned DEFAULT NULL,
  `extra_period_id` int(10) unsigned DEFAULT '1',
  `extra_decree_id` int(10) unsigned DEFAULT NULL,
  `extra_decree_date` timestamp NULL DEFAULT NULL,
  `archive` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `krsp_num` (`krsp_num`),
  KEY `source` (`source_id`,`article_id`,`investigator_id`,`decree_id`),
  KEY `period` (`period_id`),
  KEY `extra_period` (`extra_period_id`),
  KEY `source_2` (`source_id`),
  KEY `article` (`article_id`),
  KEY `investigator` (`investigator_id`),
  KEY `extra_investigator` (`extra_investigator_id`),
  KEY `failure_cause` (`failure_cause_id`),
  KEY `decree` (`decree_id`),
  KEY `extra_decree` (`extra_decree_id`),
  KEY `failure_cause_2` (`failure_cause_id`),
  KEY `failure_cause_3` (`failure_cause_id`),
  KEY `failure_cause_4` (`failure_cause_id`),
  KEY `failure_cause_5` (`failure_cause_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `krsp_num`, `registration_date`, `source_id`, `plot`, `article_id`, `investigator_id`, `decree_id`, `decree_date`, `period_id`, `failure_cause_id`, `decree_cancel_date`, `extra_investigator_id`, `extra_period_id`, `extra_decree_id`, `extra_decree_date`, `archive`) VALUES
(1, 1, '2013-05-01 19:55:44', 4, 'Это наша коротенькая текстовая фабула, Которая должна для тестов быть просто ГИГАНТСКОЙ. Длинноесловобезпробеловнеобходимодляпроверкипереносасловвтаблице', 1, 1, 1, '2013-04-28 20:00:00', 2, 1, '2013-05-01 04:00:00', 1, 6, 1, '2013-05-22 20:00:00', 0),
(2, 123, '2013-05-08 22:00:06', 5, 'Тестовая фабула', 1, 1, 1, '2013-05-23 20:00:00', 2, NULL, NULL, NULL, 1, NULL, NULL, 0),
(3, 12, '2013-05-11 11:05:43', 5, 'Совсем кратенькая фабула', 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, 1, NULL, NULL, 0),
(4, NULL, '2013-05-11 11:11:35', 4, 'Совсем коротенькая фабула', 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, 1, NULL, NULL, 0),
(5, 15, '2013-05-07 20:00:00', NULL, 'Еще одна фабула', 1, 1, NULL, NULL, 5, NULL, NULL, NULL, 1, NULL, NULL, 0),
(6, NULL, '2013-05-11 14:48:08', NULL, 'Краткая проверочная фабула', 4, 1, NULL, NULL, 4, NULL, NULL, NULL, 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `materials_characteristics`
--

DROP TABLE IF EXISTS `materials_characteristics`;
CREATE TABLE IF NOT EXISTS `materials_characteristics` (
  `material_id` int(10) unsigned NOT NULL,
  `characteristic_id` int(10) unsigned NOT NULL,
  KEY `material_id` (`material_id`),
  KEY `characteristic_id` (`characteristic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `materials_characteristics`
--

INSERT INTO `materials_characteristics` (`material_id`, `characteristic_id`) VALUES
(2, 2),
(1, 4),
(5, 3),
(4, 4),
(6, 2),
(6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `periods`
--

DROP TABLE IF EXISTS `periods`;
CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `days` int(10) unsigned NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `periods`
--

INSERT INTO `periods` (`id`, `days`, `sort`) VALUES
(1, 2, 1),
(2, 9, 2),
(3, 29, 3),
(4, 3, 4),
(5, 10, 5),
(6, 30, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Права, требуемые для авторизации в приложении. Добавляются новым пользователям в автоматическом режиме'),
(2, 'admin', 'Для пользователей, имеющих доступ в административную панель. Роль позволяет добавлять и изменять что угодно в приложении и просматривать логи изменений в материалах'),
(3, 'editor', 'Права дающие возможность редактировать сообщения в Front-End и некоторые другие мелкие привилегии. Роль между admin и login');

-- --------------------------------------------------------

--
-- Структура таблицы `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `sources`
--

DROP TABLE IF EXISTS `sources`;
CREATE TABLE IF NOT EXISTS `sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `sources`
--

INSERT INTO `sources` (`id`, `value`, `text`, `sort`) VALUES
(4, 1, 'Прокуратура', 1),
(5, 3, 'Суд Набережных Челнов', 2),
(6, 2, 'Республиканский суд', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `update_logs`
--

DROP TABLE IF EXISTS `update_logs`;
CREATE TABLE IF NOT EXISTS `update_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table` varchar(250) NOT NULL COMMENT 'таблица в которой произошли изменения',
  `id_obj` int(10) unsigned NOT NULL COMMENT 'ID объекта в котором произошли изменения',
  `field` varchar(250) NOT NULL COMMENT 'Название поля в котором поменялось значение',
  `prev_value` text NOT NULL COMMENT 'Предыдущее значение',
  `post_value` text NOT NULL COMMENT 'Новое значение',
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата и время в которое произошло изменение',
  `ip` varchar(50) DEFAULT NULL COMMENT 'IP адрес изменившего значение',
  `client_info` text COMMENT 'Информация о пользовательском компьютере, с которого произошло изменение',
  `cause` text COMMENT 'Причина изменения поля',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `update_logs`
--

INSERT INTO `update_logs` (`id`, `table`, `id_obj`, `field`, `prev_value`, `post_value`, `date_update`, `ip`, `client_info`, `cause`) VALUES
(1, 'materials', 1, 'archive', 'Пустое значение', '1', '2013-05-11 10:43:30', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:28:"http://kohana/admin/material";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"50746";s:12:"REDIRECT_URL";s:25:"/admin/material/archive/1";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/material/archive/1";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/material/archive/1";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\material\\archive\\1\\material\\archive\\1";s:8:"PHP_SELF";s:35:"/index.php/admin/material/archive/1";s:12:"REQUEST_TIME";i:1368269009;}', 'Исправление опечатки'),
(2, 'materials', 1, 'archive', '1', '0', '2013-05-11 10:43:38', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:27:"http://kohana/admin/archive";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"50746";s:12:"REDIRECT_URL";s:25:"/admin/archive/material/1";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/archive/material/1";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/archive/material/1";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\archive\\material\\1\\archive\\material\\1";s:8:"PHP_SELF";s:35:"/index.php/admin/archive/material/1";s:12:"REQUEST_TIME";i:1368269016;}', 'Исправление опечатки'),
(3, 'materials', 3, 'krsp_num', 'Пустое значение', '12', '2013-05-11 12:00:03', '127.0.0.1', 'a:37:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/edit/3";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:12:"CONTENT_TYPE";s:33:"application/x-www-form-urlencoded";s:14:"CONTENT_LENGTH";s:3:"600";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"59519";s:12:"REDIRECT_URL";s:22:"/admin/material/edit/3";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/admin/material/edit/3";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:22:"/admin/material/edit/3";s:15:"PATH_TRANSLATED";s:57:"redirect:\\index.php\\admin\\material\\edit\\3\\material\\edit\\3";s:8:"PHP_SELF";s:32:"/index.php/admin/material/edit/3";s:12:"REQUEST_TIME";i:1368273602;}', 'Дополнение информации о материалах'),
(4, 'materials', 3, 'source_id', 'Пустое значение', '5', '2013-05-11 12:00:03', '127.0.0.1', 'a:37:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/edit/3";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:12:"CONTENT_TYPE";s:33:"application/x-www-form-urlencoded";s:14:"CONTENT_LENGTH";s:3:"600";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"59519";s:12:"REDIRECT_URL";s:22:"/admin/material/edit/3";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/admin/material/edit/3";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:22:"/admin/material/edit/3";s:15:"PATH_TRANSLATED";s:57:"redirect:\\index.php\\admin\\material\\edit\\3\\material\\edit\\3";s:8:"PHP_SELF";s:32:"/index.php/admin/material/edit/3";s:12:"REQUEST_TIME";i:1368273602;}', 'Дополнение информации о материалах'),
(5, 'materials', 4, 'source_id', 'Пустое значение', '4', '2013-05-11 14:12:32', '127.0.0.1', 'a:37:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/edit/4";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:12:"CONTENT_TYPE";s:33:"application/x-www-form-urlencoded";s:14:"CONTENT_LENGTH";s:3:"843";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"56656";s:12:"REDIRECT_URL";s:22:"/admin/material/edit/4";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/admin/material/edit/4";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:22:"/admin/material/edit/4";s:15:"PATH_TRANSLATED";s:57:"redirect:\\index.php\\admin\\material\\edit\\4\\material\\edit\\4";s:8:"PHP_SELF";s:32:"/index.php/admin/material/edit/4";s:12:"REQUEST_TIME";i:1368281551;}', 'Добавление источника сообщений\nИсправление орфографической ошибки в фабуле'),
(6, 'materials', 4, 'plot', 'Совсем кратенькая фабула', 'Совсем коротенькая фабула', '2013-05-11 14:12:32', '127.0.0.1', 'a:37:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/edit/4";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:12:"CONTENT_TYPE";s:33:"application/x-www-form-urlencoded";s:14:"CONTENT_LENGTH";s:3:"843";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"56656";s:12:"REDIRECT_URL";s:22:"/admin/material/edit/4";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/admin/material/edit/4";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:22:"/admin/material/edit/4";s:15:"PATH_TRANSLATED";s:57:"redirect:\\index.php\\admin\\material\\edit\\4\\material\\edit\\4";s:8:"PHP_SELF";s:32:"/index.php/admin/material/edit/4";s:12:"REQUEST_TIME";i:1368281551;}', 'Добавление источника сообщений\nИсправление орфографической ошибки в фабуле'),
(7, 'materials', 3, 'archive', 'Пустое значение', '1', '2013-05-11 14:27:26', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:29:"http://kohana/admin/material/";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"57782";s:12:"REDIRECT_URL";s:25:"/admin/material/archive/3";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/material/archive/3";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/material/archive/3";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\material\\archive\\3\\material\\archive\\3";s:8:"PHP_SELF";s:35:"/index.php/admin/material/archive/3";s:12:"REQUEST_TIME";i:1368282445;}', 'Исправление опечатки'),
(8, 'materials', 5, 'archive', 'Пустое значение', '1', '2013-05-11 14:46:17', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/page/2";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"60287";s:12:"REDIRECT_URL";s:25:"/admin/material/archive/5";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/material/archive/5";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/material/archive/5";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\material\\archive\\5\\material\\archive\\5";s:8:"PHP_SELF";s:35:"/index.php/admin/material/archive/5";s:12:"REQUEST_TIME";i:1368283576;}', 'Исправление опечатки'),
(9, 'materials', 4, 'archive', 'Пустое значение', '1', '2013-05-11 14:46:40', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:28:"http://kohana/admin/material";s:11:"HTTP_COOKIE";s:34:"session=2a605pmg52u6lfqkorkevno3v4";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"60299";s:12:"REDIRECT_URL";s:25:"/admin/material/archive/4";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/material/archive/4";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/material/archive/4";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\material\\archive\\4\\material\\archive\\4";s:8:"PHP_SELF";s:35:"/index.php/admin/material/archive/4";s:12:"REQUEST_TIME";i:1368283599;}', 'Исправление опечатки'),
(10, 'materials', 4, 'archive', '1', '0', '2013-05-12 10:43:03', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:27:"http://kohana/admin/archive";s:11:"HTTP_COOKIE";s:34:"session=3c1tm4j603at2k5ead4ndcgku2";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"52028";s:12:"REDIRECT_URL";s:25:"/admin/archive/material/4";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/archive/material/4";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/archive/material/4";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\archive\\material\\4\\archive\\material\\4";s:8:"PHP_SELF";s:35:"/index.php/admin/archive/material/4";s:12:"REQUEST_TIME";i:1368355382;}', 'Исправление опечатки'),
(11, 'materials', 6, 'article_id', '1', '4', '2013-05-12 16:02:35', '127.0.0.1', 'a:37:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:35:"http://kohana/admin/material/edit/6";s:11:"HTTP_COOKIE";s:34:"session=3c1tm4j603at2k5ead4ndcgku2";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:12:"CONTENT_TYPE";s:33:"application/x-www-form-urlencoded";s:14:"CONTENT_LENGTH";s:3:"540";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"52733";s:12:"REDIRECT_URL";s:22:"/admin/material/edit/6";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:4:"POST";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:22:"/admin/material/edit/6";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:22:"/admin/material/edit/6";s:15:"PATH_TRANSLATED";s:57:"redirect:\\index.php\\admin\\material\\edit\\6\\material\\edit\\6";s:8:"PHP_SELF";s:32:"/index.php/admin/material/edit/6";s:12:"REQUEST_TIME";i:1368374554;}', 'Изменение статьи'),
(12, 'materials', 3, 'archive', '1', '0', '2013-05-15 08:32:14', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:27:"http://kohana/admin/archive";s:11:"HTTP_COOKIE";s:34:"session=tomapfkca1n738e26bgbq7roh2";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"50586";s:12:"REDIRECT_URL";s:25:"/admin/archive/material/3";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/archive/material/3";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/archive/material/3";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\archive\\material\\3\\archive\\material\\3";s:8:"PHP_SELF";s:35:"/index.php/admin/archive/material/3";s:12:"REQUEST_TIME";i:1368606733;}', 'Исправление опечатки'),
(13, 'materials', 5, 'archive', '1', '0', '2013-05-15 08:32:23', '127.0.0.1', 'a:35:{s:15:"REDIRECT_STATUS";s:3:"200";s:9:"HTTP_HOST";s:6:"kohana";s:15:"HTTP_USER_AGENT";s:72:"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0";s:11:"HTTP_ACCEPT";s:63:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";s:20:"HTTP_ACCEPT_LANGUAGE";s:35:"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3";s:20:"HTTP_ACCEPT_ENCODING";s:13:"gzip, deflate";s:12:"HTTP_REFERER";s:27:"http://kohana/admin/archive";s:11:"HTTP_COOKIE";s:34:"session=tomapfkca1n738e26bgbq7roh2";s:15:"HTTP_CONNECTION";s:10:"keep-alive";s:4:"PATH";s:532:"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live";s:10:"SystemRoot";s:10:"C:\\Windows";s:7:"COMSPEC";s:27:"C:\\Windows\\system32\\cmd.exe";s:7:"PATHEXT";s:53:".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC";s:6:"WINDIR";s:10:"C:\\Windows";s:16:"SERVER_SIGNATURE";s:0:"";s:15:"SERVER_SOFTWARE";s:32:"Apache/2.2.22 (Win32) PHP/5.3.17";s:11:"SERVER_NAME";s:6:"kohana";s:11:"SERVER_ADDR";s:9:"127.0.0.1";s:11:"SERVER_PORT";s:2:"80";s:11:"REMOTE_ADDR";s:9:"127.0.0.1";s:13:"DOCUMENT_ROOT";s:23:"I:/Server/vhosts/kohana";s:12:"SERVER_ADMIN";s:19:"admin@profigames.ru";s:15:"SCRIPT_FILENAME";s:33:"I:/Server/vhosts/kohana/index.php";s:11:"REMOTE_PORT";s:5:"50586";s:12:"REDIRECT_URL";s:25:"/admin/archive/material/5";s:17:"GATEWAY_INTERFACE";s:7:"CGI/1.1";s:15:"SERVER_PROTOCOL";s:8:"HTTP/1.1";s:14:"REQUEST_METHOD";s:3:"GET";s:12:"QUERY_STRING";s:0:"";s:11:"REQUEST_URI";s:25:"/admin/archive/material/5";s:11:"SCRIPT_NAME";s:10:"/index.php";s:9:"PATH_INFO";s:25:"/admin/archive/material/5";s:15:"PATH_TRANSLATED";s:63:"redirect:\\index.php\\admin\\archive\\material\\5\\archive\\material\\5";s:8:"PHP_SELF";s:35:"/index.php/admin/archive/material/5";s:12:"REQUEST_TIME";i:1368606742;}', 'Исправление опечатки');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'admin@profigames.ru', 'admin', '73305ab73d1f554b47f637078432c8ab9e3d6b1ad49f666a7f86fee916ccc7e5', 80, 1369903945),
(2, 'test@test.ru', 'non_admin', '0839799a01b3530c8dcce4cbffb403dc334c08249612871f836c2d195303d32b', 4, 1369832396);

-- --------------------------------------------------------

--
-- Структура таблицы `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `user_agent`, `token`, `created`, `expires`) VALUES
(1, 1, '19b62e2f697adc030c6dcc59146d5b002dadf041', '5203b0c43ef0024a68045c13c8a4e8cb5090f29c', 1365612236, 1366821836);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_10` FOREIGN KEY (`source_id`) REFERENCES `sources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_11` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_12` FOREIGN KEY (`investigator_id`) REFERENCES `investigators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_13` FOREIGN KEY (`decree_id`) REFERENCES `decrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_14` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_15` FOREIGN KEY (`failure_cause_id`) REFERENCES `failure_causes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_16` FOREIGN KEY (`extra_investigator_id`) REFERENCES `investigators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_17` FOREIGN KEY (`extra_period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_ibfk_18` FOREIGN KEY (`extra_decree_id`) REFERENCES `decrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `materials_characteristics`
--
ALTER TABLE `materials_characteristics`
  ADD CONSTRAINT `materials_characteristics_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materials_characteristics_ibfk_2` FOREIGN KEY (`characteristic_id`) REFERENCES `characteristics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
