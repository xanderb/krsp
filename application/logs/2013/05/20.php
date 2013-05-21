<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-20 18:45:40 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Session_Native as array ~ APPPATH\classes\Help.php [ 139 ] in :
2013-05-20 18:45:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-05-20 18:46:17 --- CRITICAL: ErrorException [ 1 ]: Cannot use object of type Session_Native as array ~ APPPATH\classes\Controller\Front\Filter.php [ 27 ] in :
2013-05-20 18:46:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-05-20 18:51:14 --- CRITICAL: ErrorException [ 8 ]: Undefined index: filters ~ APPPATH\classes\Help.php [ 139 ] in I:\Server\vhosts\kohana\application\classes\Help.php:139
2013-05-20 18:51:14 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Help.php(139): Kohana_Core::error_handler(8, 'Undefined index...', 'I:\Server\vhost...', 139, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Front\Material.php(15): Help::render_filter_form()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Front_Material->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Help.php:139
2013-05-20 18:55:50 --- CRITICAL: ErrorException [ 8 ]: Undefined index: filters ~ APPPATH\classes\Help.php [ 139 ] in I:\Server\vhosts\kohana\application\classes\Help.php:139
2013-05-20 18:55:50 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Help.php(139): Kohana_Core::error_handler(8, 'Undefined index...', 'I:\Server\vhost...', 139, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Front\Material.php(15): Help::render_filter_form()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Front_Material->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Help.php:139
2013-05-20 19:03:52 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'article' in 'order clause' [ SELECT `article`.`id` AS `id`, `article`.`value` AS `value`, `article`.`text` AS `text`, `article`.`sort` AS `sort` FROM `articles` AS `article` ORDER BY `article` ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-20 19:03:52 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `article...', 'Model_Article', Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1060): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1001): Kohana_ORM->_load_result(true)
#3 I:\Server\vhosts\kohana\application\classes\Help.php(141): Kohana_ORM->find_all()
#4 I:\Server\vhosts\kohana\application\classes\Controller\Front\Material.php(15): Help::render_filter_form()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Front_Material->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#10 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#11 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-20 19:04:09 --- CRITICAL: ErrorException [ 8 ]: Undefined index: article ~ APPPATH\views\front\filters.php [ 63 ] in I:\Server\vhosts\kohana\application\views\front\filters.php:63
2013-05-20 19:04:09 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\front\filters.php(63): Kohana_Core::error_handler(8, 'Undefined index...', 'I:\Server\vhost...', 63, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 I:\Server\vhosts\kohana\application\views\front\front_grid.php(101): Kohana_View->__toString()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 I:\Server\vhosts\kohana\application\views\main\index.php(43): Kohana_View->__toString()
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#13 [internal function]: Kohana_Controller->execute()
#14 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#15 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#17 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#18 {main} in I:\Server\vhosts\kohana\application\views\front\filters.php:63