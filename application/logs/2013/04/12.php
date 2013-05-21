<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-12 12:03:03 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:03:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:07:11 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:07:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:07:16 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:07:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:07:17 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:07:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:39:26 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:39:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:39:27 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:39:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:39:28 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:39:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:39:29 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:39:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:39:30 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 30 ] in :
2013-04-12 12:39:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:41:57 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:41:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:44:25 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:44:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:44:26 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:44:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:44:27 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:44:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:45:47 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:45:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:45:48 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:45:48 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:45:49 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:45:49 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:45:50 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:45:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 12:50:00 --- CRITICAL: View_Exception [ 0 ]: The requested view front/test/test could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in I:\Server\vhosts\kohana\system\classes\Kohana\View.php:137
2013-04-12 12:50:00 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(137): Kohana_View->set_filename('front/test/test')
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(30): Kohana_View->__construct('front/test/test', NULL)
#2 I:\Server\vhosts\kohana\application\classes\Controller\front\Welcome.php(28): Kohana_View::factory('front/test/test')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Front_Welcome->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Welcome))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\View.php:137
2013-04-12 12:51:39 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 12:51:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 14:08:21 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 14:08:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 14:08:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::instance() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 14:08:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 14:08:47 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Core.php [ 26 ] in :
2013-04-12 14:08:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-12 18:03:27 --- CRITICAL: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH\classes\Kohana\Session.php [ 324 ] in I:\Server\vhosts\kohana\system\classes\Kohana\Session.php:125
2013-04-12 18:03:27 --- DEBUG: #0 I:\Server\vhosts\kohana\system\classes\Kohana\Session.php(125): Kohana_Session->read(NULL)
#1 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Session\Database.php(74): Kohana_Session->__construct(Array, NULL)
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Session.php(54): Kohana_Session_Database->__construct(Array, NULL)
#3 I:\Server\vhosts\kohana\modules\auth\classes\Kohana\Auth.php(58): Kohana_Session::instance('database')
#4 I:\Server\vhosts\kohana\modules\auth\classes\Kohana\Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#5 I:\Server\vhosts\kohana\application\classes\Controller\Core.php(18): Kohana_Auth::instance()
#6 I:\Server\vhosts\kohana\application\classes\Controller\Front.php(21): Controller_Core->before()
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(69): Controller_Front->before()
#8 [internal function]: Kohana_Controller->execute()
#9 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#12 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in I:\Server\vhosts\kohana\system\classes\Kohana\Session.php:125
2013-04-12 18:50:34 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: test ~ APPPATH\views\front\auth\login.php [ 20 ] in I:\Server\vhosts\kohana\application\views\front\auth\login.php:20
2013-04-12 18:50:34 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\front\auth\login.php(20): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 20, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 I:\Server\vhosts\kohana\application\views\main\index.php(26): Kohana_View->__toString()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Reg))
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in I:\Server\vhosts\kohana\application\views\front\auth\login.php:20
2013-04-12 19:48:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: text_roles ~ APPPATH\views\front\auth\user_info.php [ 7 ] in I:\Server\vhosts\kohana\application\views\front\auth\user_info.php:7
2013-04-12 19:48:51 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\front\auth\user_info.php(7): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 7, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 I:\Server\vhosts\kohana\application\views\main\index.php(26): Kohana_View->__toString()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#6 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Front_Material))
#11 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#13 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#14 {main} in I:\Server\vhosts\kohana\application\views\front\auth\user_info.php:7