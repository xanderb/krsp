<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-11 15:05:43 --- CRITICAL: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1 [ INSERT INTO `materials_characteristics` (`material_id`, `characteristic_id`) VALUES  ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-11 15:05:43 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ma...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1574): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Material.php(204): Kohana_ORM->add('characteristic', NULL)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Material->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-11 18:17:30 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: total_materials ~ APPPATH\views\Back\materials_table.php [ 26 ] in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:26
2013-05-11 18:17:30 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(26): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 26, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 I:\Server\vhosts\kohana\application\views\Back\control_panel_content.php(28): Kohana_View->__toString()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#12 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#13 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#14 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#15 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#17 [internal function]: Kohana_Controller->execute()
#18 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#19 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#20 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#21 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#22 {main} in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:26
2013-05-11 18:44:23 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: badges ~ APPPATH\views\Back\materials_table.php [ 27 ] in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:27
2013-05-11 18:44:23 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(27): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 27, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#8 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#13 [internal function]: Kohana_Controller->execute()
#14 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Archive))
#15 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#17 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#18 {main} in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:27