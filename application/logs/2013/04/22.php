<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-22 15:56:30 --- CRITICAL: View_Exception [ 0 ]: The requested view /back/edit-period could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in I:\Server\vhosts\kohana\system\classes\Kohana\View.php:137
2013-04-22 15:56:30 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(137): Kohana_View->set_filename('/back/edit-peri...')
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(30): Kohana_View->__construct('/back/edit-peri...', NULL)
#2 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Period.php(68): Kohana_View::factory('/back/edit-peri...')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Period->action_add()
#4 [internal function]: Kohana_Controller->execute()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Period))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\View.php:137
2013-04-22 16:37:04 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\classes\Controller\Admin\Period.php [ 167 ] in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Period.php:167
2013-04-22 16:37:04 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Period.php(167): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 167, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Period->action_delete()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Period))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Admin\Period.php:167
2013-04-22 17:27:38 --- CRITICAL: ErrorException [ 1 ]: Call to undefined function data() ~ APPPATH\views\main\index.php [ 43 ] in :
2013-04-22 17:27:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :