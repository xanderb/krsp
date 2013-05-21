<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-04-27 12:11:58 --- CRITICAL: ErrorException [ 1 ]: Class 'Model_char' not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in :
2013-04-27 12:11:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-04-27 23:44:10 --- CRITICAL: Kohana_Exception [ 0 ]: The role property does not exist in the Model_User class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-04-27 23:44:10 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('role')
#1 I:\Server\vhosts\kohana\application\classes\Controller\Admin\User.php(66): Kohana_ORM->__get('role')
#2 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_User->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_User))
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600