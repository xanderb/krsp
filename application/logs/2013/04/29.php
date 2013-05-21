<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-29 16:06:09 --- CRITICAL: ErrorException [ 1 ]: Can only throw objects ~ SYSPATH\classes\Kohana\HTTP.php [ 40 ] in :
2013-04-29 16:06:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-29 16:09:55 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: body ~ APPPATH\views\main\index.php [ 37 ] in I:\Server\vhosts\kohana\application\views\main\index.php:37
2013-04-29 16:09:55 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\main\index.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 37, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\application\views\main\index.php:37
2013-04-29 16:33:33 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user_form ~ APPPATH\classes\Controller\Admin\User.php [ 98 ] in I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php:98
2013-04-29 16:33:33 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php(98): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 98, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_User->action_add()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_User))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php:98
2013-04-29 16:48:33 --- CRITICAL: ErrorException [ 2 ]: Missing argument 2 for Model_Auth_User::create_user(), called in I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php on line 91 and defined ~ MODPATH\orm\classes\Model\Auth\User.php [ 161 ] in I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php:161
2013-04-29 16:48:33 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php(161): Kohana_Core::error_handler(2, 'Missing argumen...', 'I:\Server\vhost...', 161, Array)
#1 I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php(91): Model_Auth_User->create_user(Array)
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_User->action_add()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_User))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php:161
2013-04-29 16:52:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting T_VARIABLE or '$' ~ APPPATH\classes\Controller\Admin\User.php [ 128 ] in :
2013-04-29 16:52:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :