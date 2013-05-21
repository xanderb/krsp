<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-06 14:23:46 --- CRITICAL: ErrorException [ 4096 ]: Argument 2 passed to Kohana_Form::select() must be an array, object given, called in I:\Server\vhosts\kohana\application\views\Back\edit_material.php on line 119 and defined ~ SYSPATH\classes\Kohana\Form.php [ 252 ] in I:\Server\vhosts\kohana\system\classes\Kohana\Form.php:252
2013-05-06 14:23:46 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\Form.php(252): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'I:\Server\vhost...', 252, Array)
#1 I:\Server\vhosts\kohana\application\views\Back\edit_material.php(119): Kohana_Form::select('source', Object(Database_MySQL_Result), NULL, Array)
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#4 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#5 I:\Server\vhosts\kohana\application\views\Back\control_panel.php(41): Kohana_View->__toString()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#7 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#8 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#9 I:\Server\vhosts\kohana\application\views\main\index.php(38): Kohana_View->__toString()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#11 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#13 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#14 [internal function]: Kohana_Controller->execute()
#15 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#16 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#17 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#18 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#19 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\Form.php:252