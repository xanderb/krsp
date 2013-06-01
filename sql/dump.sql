-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 01 2013 г., 22:00
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
-- Структура таблицы `materials`
--

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
  `extra_period_id` int(10) unsigned DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `krsp_num`, `registration_date`, `source_id`, `plot`, `article_id`, `investigator_id`, `decree_id`, `decree_date`, `period_id`, `failure_cause_id`, `decree_cancel_date`, `extra_investigator_id`, `extra_period_id`, `extra_decree_id`, `extra_decree_date`, `archive`) VALUES
(1, 1, '2013-05-01 19:55:44', 4, 'Это наша коротенькая текстовая фабула, Которая должна для тестов быть просто ГИГАНТСКОЙ. Длинноесловобезпробеловнеобходимодляпроверкипереносасловвтаблице', 1, 1, 1, '2013-04-28 20:00:00', 2, 1, '2013-05-01 04:00:00', 1, 6, 1, '2013-05-22 20:00:00', 0),
(2, 123, '2013-05-08 22:00:06', 5, 'Тестовая фабула', 1, 1, 1, '2013-05-23 20:00:00', 2, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 12, '2013-05-11 11:05:43', 5, 'Совсем кратенькая фабула', 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, NULL, '2013-05-11 11:11:35', 4, 'Совсем коротенькая фабула', 1, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 15, '2013-05-07 20:00:00', NULL, 'Еще одна фабула', 1, 1, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, NULL, '2013-05-11 14:48:08', NULL, 'Краткая проверочная фабула', 4, 1, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, NULL, '2013-06-01 09:20:02', 6, 'Тест краткой фабулы с <strong>HTML</strong> кодом', 4, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
