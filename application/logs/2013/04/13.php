<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-13 21:51:16 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: request ~ APPPATH\classes\Controller\Core.php [ 17 ] in I:\Server\vhosts\kohana\application\classes\Controller\Core.php:17
2013-04-13 21:51:16 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Core.php(17): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 17, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Back.php(25): Controller_Core->before()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(69): Controller_Back->before()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Cp))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Core.php:17