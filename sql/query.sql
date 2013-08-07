ALTER TABLE `update_logs` CHANGE `prev_value` `prev_value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Предыдущее значение',
CHANGE `post_value` `post_value` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Новое значение';

CREATE TABLE IF NOT EXISTS `extras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` int(10) unsigned NOT NULL,
  `parent_extra_id` int(10) unsigned DEFAULT NULL,
  `decree_cancel_date` timestamp NULL DEFAULT NULL,
  `investigator_id` int(10) unsigned DEFAULT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `decree_id` int(10) unsigned DEFAULT NULL,
  `decree_date` timestamp NULL DEFAULT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_extra_id` (`parent_extra_id`),
  KEY `user_id` (`user_id`),
  KEY `material_id` (`material_id`),
  KEY `investigator_id` (`investigator_id`),
  KEY `period_id` (`period_id`),
  KEY `decree_id` (`decree_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `extras_ibfk_2` FOREIGN KEY (`parent_extra_id`) REFERENCES `extras` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `extras_ibfk_3` FOREIGN KEY (`investigator_id`) REFERENCES `investigators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `extras_ibfk_4` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `extras_ibfk_5` FOREIGN KEY (`decree_id`) REFERENCES `decrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `kohana`.`materials` DROP INDEX `krsp_num` ,
ADD INDEX `krsp_num` ( `krsp_num` );

ALTER TABLE `materials` ADD `work_year` YEAR NULL ,
ADD INDEX ( `work_year` )