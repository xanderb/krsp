<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-02 19:30:10 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: page_title ~ APPPATH\views\main\index.php [ 5 ] in I:\Server\vhosts\kohana\application\views\main\index.php:5
2013-04-02 19:30:10 --- DEBUG: #0 I:\Server\vhosts\kohana\application\views\main\index.php(5): Kohana_Core::error_handler(8, 'Undefined varia...', 'I:\Server\vhost...', 5, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(61): include('I:\Server\vhost...')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('I:\Server\vhost...', Array)
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#9 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in I:\Server\vhosts\kohana\application\views\main\index.php:5
2013-04-02 19:32:41 --- CRITICAL: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH\classes\Controller\Front.php [ 13 ] in I:\Server\vhosts\kohana\application\classes\Controller\Front.php:13
2013-04-02 19:32:41 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Front.php(13): Kohana_Core::error_handler(2, 'Attempt to assi...', 'I:\Server\vhost...', 13, Array)
#1 [internal function]: Controller_Front->__construct(Object(Request), Object(Response))
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#5 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Front.php:13
2013-04-02 19:34:47 --- CRITICAL: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH\classes\Controller\Front.php [ 13 ] in I:\Server\vhosts\kohana\application\classes\Controller\Front.php:13
2013-04-02 19:34:47 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Controller\Front.php(13): Kohana_Core::error_handler(2, 'Attempt to assi...', 'I:\Server\vhost...', 13, Array)
#1 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(69): Controller_Front->before()
#2 [internal function]: Kohana_Controller->execute()
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in I:\Server\vhosts\kohana\application\classes\Controller\Front.php:13