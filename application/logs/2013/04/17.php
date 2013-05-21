<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-17 13:07:46 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\main\index.php [ 33 ] in I:\Server\vhosts\kohana\application\views\main\index.php:33
2013-04-17 13:07:46 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\main\index.php(33): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 33, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\application\views\main\index.php:33