<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-07 18:20:51 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Help::add_first_option() ~ APPPATH\classes\Controller\Admin\Material.php [ 146 ] in :
2013-05-07 18:20:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-05-07 18:26:44 --- CRITICAL: ErrorException [ 2 ]: implode() [function.implode]: Invalid arguments passed ~ APPPATH\classes\Help.php [ 108 ] in :
2013-05-07 18:26:44 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'implode() [<a h...', 'I:\Server\vhost...', 108, Array)
#1 I:\Server\vhosts\kohana\application\classes\Help.php(108): implode('?', true)
#2 I:\Server\vhosts\kohana\application\views\Back\edit_material.php(122): Help::select('source', Array, NULL, Array, Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#6 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#9 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#10 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#12 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#13 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#14 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#15 [internal function]: Kohana_Controller->execute()
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#19 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#20 {main} in :