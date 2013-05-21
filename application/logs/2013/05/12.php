<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-12 14:41:39 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: total_items ~ SYSPATH\classes\Kohana\View.php [ 171 ] in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Source.php:98
2013-05-12 14:41:39 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Source.php(98): Kohana_View->__get('total_items')
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Source->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Source))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Source.php:98
2013-05-12 14:54:24 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Admin_Article::$badges ~ APPPATH\classes\Controller\Admin\Article.php [ 86 ] in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Article.php:86
2013-05-12 14:54:24 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Article.php(86): Kohana_Core::error_handler(8, 'Undefined prope...', 'I:\Server\vhost...', 86, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Article->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Article))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Article.php:86
2013-05-12 19:22:20 --- CRITICAL: Database_Exception [ 1366 ]: Incorrect integer value: '' for column 'value' at row 1 [ INSERT INTO `failure_causes` (`value`, `text`, `sort`) VALUES ('', '', 2) ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-12 19:22:20 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fa...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): Kohana_ORM->create(NULL)
#3 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Fcause.php(108): Kohana_ORM->save()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Fcause->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Fcause))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-12 19:22:28 --- CRITICAL: Database_Exception [ 1366 ]: Incorrect integer value: '' for column 'value' at row 1 [ INSERT INTO `failure_causes` (`value`, `text`, `sort`) VALUES ('', '', 2) ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-12 19:22:28 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `fa...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): Kohana_ORM->create(NULL)
#3 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Fcause.php(108): Kohana_ORM->save()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Fcause->action_add()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Fcause))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251