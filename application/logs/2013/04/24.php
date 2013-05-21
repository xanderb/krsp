<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-24 23:28:23 --- CRITICAL: Kohana_Exception [ 0 ]: The value property does not exist in the Model_Investigator class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-04-24 23:28:23 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('value')
#1 I:\Server\vhosts\kohana\application\views\Back\edit_investigator.php(37): Kohana_ORM->__get('value')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#5 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(24): Kohana_View->__toString()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#9 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#13 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Sled))
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#18 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#19 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600