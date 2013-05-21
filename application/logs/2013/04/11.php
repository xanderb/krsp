<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-11 15:26:35 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Welcome::$auth_required ~ APPPATH\classes\Controller\Core.php [ 20 ] in I:\Server\vhosts\kohana\application\classes\Controller\Core.php:20
2013-04-11 15:26:35 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Core.php(20): Kohana_Core::error_handler(8, 'Undefined prope...', 'I:\Server\vhost...', 20, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Front.php(20): Controller_Core->before()
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(69): Controller_Front->before()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Core.php:20
2013-04-11 15:43:54 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Database_MySQL_Result::$name ~ APPPATH\classes\Controller\Welcome.php [ 12 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:12
2013-04-11 15:43:54 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(12): Kohana_Core::error_handler(8, 'Undefined prope...', 'I:\Server\vhost...', 12, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:12
2013-04-11 15:49:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: text_roles ~ APPPATH\classes\Controller\Welcome.php [ 14 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:14
2013-04-11 15:49:11 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(14): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 14, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:14