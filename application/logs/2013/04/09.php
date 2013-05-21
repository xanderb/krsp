<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-09 13:16:15 --- CRITICAL: ErrorException [ 1 ]: Class 'ORM_Logs' not found ~ APPPATH\classes\Model\Users.php [ 10 ] in :
2013-04-09 13:16:15 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-09 13:16:55 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_Users' not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in :
2013-04-09 13:16:55 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-09 13:17:20 --- CRITICAL: Database_Exception [ 2 ]: mysql_connect() [function.mysql-connect]: Access denied for user ''@'localhost' (using password: NO) ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 67 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\MySQL.php:171
2013-04-09 13:17:20 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\MySQL.php(171): Kohana_Database_MySQL->connect()
#1 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\MySQL.php(358): Kohana_Database_MySQL->query(1, 'SHOW FULL COLUM...', false)
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1665): Kohana_Database_MySQL->list_columns('users')
#3 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(441): Kohana_ORM->list_columns()
#4 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(386): Kohana_ORM->reload_columns()
#5 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#6 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#7 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(9): Kohana_ORM::factory('Users')
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#9 [internal function]: Kohana_Controller->execute()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\MySQL.php:171
2013-04-09 14:42:38 --- CRITICAL: Database_Exception [ 1364 ]: Field 'post_value' doesn't have a default value [ INSERT INTO `update_logs` (`table`, `id_obj`, `field`, `prev_value`, `cause`) VALUES ('users', '1', 'logins', '1', 'Исправление опечатки') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-04-09 14:42:38 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `up...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): Kohana_ORM->create(NULL)
#3 I:\Server\vhosts\kohana\application\classes\ORM\Logs.php(52): Kohana_ORM->save()
#4 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): ORM_Logs->update(NULL)
#5 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(12): Kohana_ORM->save()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#9 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#12 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251