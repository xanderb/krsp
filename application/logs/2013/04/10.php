<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-10 11:45:25 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: _SESSION ~ APPPATH\classes\Controller\Welcome.php [ 13 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:13
2013-04-10 11:45:25 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(13): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 13, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:13
2013-04-10 18:48:56 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\Kohana\Cookie.php [ 152 ] in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 18:48:56 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(155): Kohana_Cookie::get('session')
#2 I:\Server\vhosts\kohana\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 18:53:25 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\Kohana\Cookie.php [ 152 ] in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 18:53:25 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(155): Kohana_Cookie::get('session')
#2 I:\Server\vhosts\kohana\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 18:53:26 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt. ~ SYSPATH\classes\Kohana\Cookie.php [ 152 ] in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 18:53:26 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(155): Kohana_Cookie::get('session')
#2 I:\Server\vhosts\kohana\index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\Cookie.php:67
2013-04-10 19:08:34 --- CRITICAL: ErrorException [ 1 ]: Call to a member function logged_in() on a non-object ~ APPPATH\classes\Controller\Welcome.php [ 10 ] in :
2013-04-10 19:08:34 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-10 19:09:13 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: text ~ APPPATH\classes\Controller\Welcome.php [ 16 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:16
2013-04-10 19:09:13 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(16): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 16, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:16
2013-04-10 19:09:42 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: text ~ APPPATH\classes\Controller\Welcome.php [ 16 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:16
2013-04-10 19:09:42 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(16): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 16, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:16
2013-04-10 19:20:45 --- CRITICAL: Kohana_Exception [ 0 ]: Cannot update user model because it is not loaded. ~ MODPATH\orm\classes\Kohana\ORM.php [ 1354 ] in I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php:201
2013-04-10 19:20:45 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php(201): Kohana_ORM->update(Object(Validation))
#1 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(21): Model_Auth_User->update_user(Array)
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Model\Auth\User.php:201
2013-04-10 19:21:33 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH\classes\Controller\Welcome.php [ 22 ] in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:22
2013-04-10 19:21:33 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php(22): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 22, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Welcome->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Welcome.php:22