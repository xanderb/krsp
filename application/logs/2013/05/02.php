<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-02 00:07:33 --- CRITICAL: Kohana_Exception [ 0 ]: The krsp property does not exist in the Model_Material class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-02 00:07:33 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('krsp')
#1 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(59): Kohana_ORM->__get('krsp')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#5 I:\Server\vhosts\kohana\application\views\Back\control_panel_content.php(28): Kohana_View->__toString()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#9 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#12 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#13 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#14 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#15 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#18 [internal function]: Kohana_Controller->execute()
#19 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#20 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#23 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-02 00:08:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\main\index.php [ 38 ] in I:\Server\vhosts\kohana\application\views\main\index.php:38
2013-05-02 00:08:11 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 38, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\application\views\main\index.php:38
2013-05-02 00:09:46 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\views\Back\materials_table.php [ 56 ] in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:56
2013-05-02 00:09:46 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(56): Kohana_Core::error_handler(8, 'Trying to get p...', 'I:\Server\vhost...', 56, Array)
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
#22 {main} in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:56
2013-05-02 00:18:43 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\views\Back\materials_table.php [ 56 ] in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:56
2013-05-02 00:18:43 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(56): Kohana_Core::error_handler(8, 'Trying to get p...', 'I:\Server\vhost...', 56, Array)
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
#22 {main} in I:\Server\vhosts\kohana\application\views\Back\materials_table.php:56
2013-05-02 00:20:59 --- CRITICAL: ErrorException [ 1 ]: Call to a member function find_all() on a non-object ~ APPPATH\views\Back\materials_table.php [ 56 ] in :
2013-05-02 00:20:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-05-02 00:33:13 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Model\Material.php [ 136 ] in I:\Server\vhosts\kohana\application\classes\Model\Material.php:136
2013-05-02 00:33:13 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Model\Material.php(136): Kohana_Core::error_handler(8, 'Trying to get p...', 'I:\Server\vhost...', 136, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Cp.php(37): Model_Material::render_table()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Cp->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Model\Material.php:136
2013-05-02 00:34:31 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Model\Material.php [ 135 ] in I:\Server\vhosts\kohana\application\classes\Model\Material.php:135
2013-05-02 00:34:31 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Model\Material.php(135): Kohana_Core::error_handler(8, 'Trying to get p...', 'I:\Server\vhost...', 135, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Cp.php(37): Model_Material::render_table()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Cp->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Model\Material.php:135
2013-05-02 00:46:23 --- CRITICAL: Kohana_Exception [ 0 ]: The periods property does not exist in the Model_Material class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-02 00:46:23 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('periods')
#1 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(56): Kohana_ORM->__get('periods')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#5 I:\Server\vhosts\kohana\application\views\Back\control_panel_content.php(28): Kohana_View->__toString()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#9 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#12 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#13 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#14 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#15 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#18 [internal function]: Kohana_Controller->execute()
#19 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#20 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#21 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#22 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#23 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-02 01:14:11 --- CRITICAL: ErrorException [ 8 ]: Undefined index: source ~ MODPATH\orm\classes\Kohana\ORM.php [ 630 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:630
2013-05-02 01:14:11 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(630): Kohana_Core::error_handler(8, 'Undefined index...', 'I:\Server\vhost...', 630, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('source')
#2 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(56): Kohana_ORM->__get('source')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#6 I:\Server\vhosts\kohana\application\views\Back\control_panel_content.php(28): Kohana_View->__toString()
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#10 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#12 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#13 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#14 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#15 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#16 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#18 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#19 [internal function]: Kohana_Controller->execute()
#20 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#21 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#22 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#23 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#24 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:630
2013-05-02 14:40:06 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'materials_characteristics.char_id' in 'on clause' [ SELECT `characteristic`.`id` AS `id`, `characteristic`.`value` AS `value`, `characteristic`.`text` AS `text`, `characteristic`.`sort` AS `sort` FROM `characteristics` AS `characteristic` JOIN `materials_characteristics` ON (`materials_characteristics`.`char_id` = `characteristic`.`id`) WHERE `materials_characteristics`.`material_id` = '1' ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-02 14:40:06 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `charact...', 'Model_Character...', Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1060): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1001): Kohana_ORM->_load_result(true)
#3 I:\Server\vhosts\kohana\application\views\Back\materials_table.php(67): Kohana_ORM->find_all()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#7 I:\Server\vhosts\kohana\application\views\Back\control_panel_content.php(28): Kohana_View->__toString()
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#11 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#12 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#13 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#14 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#15 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#16 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#17 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#18 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#19 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#20 [internal function]: Kohana_Controller->execute()
#21 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#22 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#23 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#24 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#25 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-02 18:16:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\main\index.php [ 38 ] in I:\Server\vhosts\kohana\application\views\main\index.php:38
2013-05-02 18:16:10 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 38, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\application\views\main\index.php:38