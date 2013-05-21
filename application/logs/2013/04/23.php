<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-23 16:02:24 --- CRITICAL: Database_Exception [ 1364 ]: Field 'sort' doesn't have a default value [ INSERT INTO `sources` (`value`, `text`) VALUES ('2', 'Районный суд Набережных Челнов') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-04-23 16:02:24 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `so...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): Kohana_ORM->create(NULL)
#3 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Source.php(133): Kohana_ORM->save()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Source->action_edit()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Source))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251