<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-05-09 17:31:12 --- CRITICAL: ErrorException [ 4096 ]: Argument 2 passed to Help::select() must be an array, object given, called in I:\Server\vhosts\kohana\application\views\Back\edit_material.php on line 127 and defined ~ APPPATH\classes\Help.php [ 12 ] in I:\Server\vhosts\kohana\application\classes\Help.php:12
2013-05-09 17:31:12 --- DEBUG: #0 I:\Server\vhosts\kohana\application\classes\Help.php(12): Kohana_Core::error_handler(4096, 'Argument 2 pass...', 'I:\Server\vhost...', 12, Array)
#1 I:\Server\vhosts\kohana\application\views\Back\edit_material.php(127): Help::select('source_id', Object(Database_MySQL_Result), '5', Array, Array)
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
#19 {main} in I:\Server\vhosts\kohana\application\classes\Help.php:12
2013-05-09 17:34:07 --- CRITICAL: Kohana_Exception [ 0 ]: The text property does not exist in the Model_Period class ~ MODPATH\orm\classes\Kohana\ORM.php [ 684 ] in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-09 17:34:07 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(600): Kohana_ORM->get('text')
#1 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Result.php(157): Kohana_ORM->__get('text')
#2 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Material.php(272): Kohana_Database_Result->as_array('id', 'text')
#3 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Material->action_edit()
#4 [internal function]: Kohana_Controller->execute()
#5 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php:600
2013-05-09 18:40:53 --- CRITICAL: Database_Exception [ 1364 ]: Field 'prev_value' doesn't have a default value [ INSERT INTO `update_logs` (`table`, `id_obj`, `field`, `post_value`, `ip`, `client_info`, `cause`) VALUES ('materials', '1', 'extra_decree_id', '1', '127.0.0.1', 'a:37:{s:15:\"REDIRECT_STATUS\";s:3:\"200\";s:9:\"HTTP_HOST\";s:6:\"kohana\";s:15:\"HTTP_USER_AGENT\";s:72:\"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0\";s:11:\"HTTP_ACCEPT\";s:63:\"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\";s:20:\"HTTP_ACCEPT_LANGUAGE\";s:35:\"ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3\";s:20:\"HTTP_ACCEPT_ENCODING\";s:13:\"gzip, deflate\";s:12:\"HTTP_REFERER\";s:35:\"http://kohana/admin/material/edit/1\";s:11:\"HTTP_COOKIE\";s:34:\"session=a5uu16a49icbbc3havnv4rm1s0\";s:15:\"HTTP_CONNECTION\";s:10:\"keep-alive\";s:12:\"CONTENT_TYPE\";s:33:\"application/x-www-form-urlencoded\";s:14:\"CONTENT_LENGTH\";s:4:\"1189\";s:4:\"PATH\";s:532:\"C:\\Program Files (x86)\\NVIDIA Corporation\\PhysX\\Common;%CommonProgramFiles%\\Microsoft Shared\\Windows Live;I:\\Server\\PHP\\;C:\\Windows\\system32;C:\\Windows;C:\\Windows\\System32\\Wbem;C:\\Program Files\\TortoiseSVN\\bin;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files (x86)\\Common Files\\Acronis\\SnapAPI\\;I:\\3d Max\\backburner\\;C:\\Program Files (x86)\\Common Files\\Autodesk Shared\\;C:\\Program Files\\Common Files\\Autodesk Shared\\;C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\;C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live\";s:10:\"SystemRoot\";s:10:\"C:\\Windows\";s:7:\"COMSPEC\";s:27:\"C:\\Windows\\system32\\cmd.exe\";s:7:\"PATHEXT\";s:53:\".COM;.EXE;.BAT;.CMD;.VBS;.VBE;.JS;.JSE;.WSF;.WSH;.MSC\";s:6:\"WINDIR\";s:10:\"C:\\Windows\";s:16:\"SERVER_SIGNATURE\";s:0:\"\";s:15:\"SERVER_SOFTWARE\";s:32:\"Apache/2.2.22 (Win32) PHP/5.3.17\";s:11:\"SERVER_NAME\";s:6:\"kohana\";s:11:\"SERVER_ADDR\";s:9:\"127.0.0.1\";s:11:\"SERVER_PORT\";s:2:\"80\";s:11:\"REMOTE_ADDR\";s:9:\"127.0.0.1\";s:13:\"DOCUMENT_ROOT\";s:23:\"I:/Server/vhosts/kohana\";s:12:\"SERVER_ADMIN\";s:19:\"admin@profigames.ru\";s:15:\"SCRIPT_FILENAME\";s:33:\"I:/Server/vhosts/kohana/index.php\";s:11:\"REMOTE_PORT\";s:5:\"50589\";s:12:\"REDIRECT_URL\";s:22:\"/admin/material/edit/1\";s:17:\"GATEWAY_INTERFACE\";s:7:\"CGI/1.1\";s:15:\"SERVER_PROTOCOL\";s:8:\"HTTP/1.1\";s:14:\"REQUEST_METHOD\";s:4:\"POST\";s:12:\"QUERY_STRING\";s:0:\"\";s:11:\"REQUEST_URI\";s:22:\"/admin/material/edit/1\";s:11:\"SCRIPT_NAME\";s:10:\"/index.php\";s:9:\"PATH_INFO\";s:22:\"/admin/material/edit/1\";s:15:\"PATH_TRANSLATED\";s:57:\"redirect:\\index.php\\admin\\material\\edit\\1\\material\\edit\\1\";s:8:\"PHP_SELF\";s:32:\"/index.php/admin/material/edit/1\";s:12:\"REQUEST_TIME\";i:1368110452;}', 'Исправление опечатки') ] ~ MODPATH\database\classes\Kohana\Database\MySQL.php [ 194 ] in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251
2013-05-09 18:40:53 --- DEBUG: #0 I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `up...', false, Array)
#1 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1321): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): Kohana_ORM->create(NULL)
#3 I:\Server\vhosts\kohana\application\classes\ORM\Log.php(54): Kohana_ORM->save()
#4 I:\Server\vhosts\kohana\modules\orm\classes\Kohana\ORM.php(1418): ORM_Log->update(NULL)
#5 I:\Server\vhosts\kohana\application\classes\Controller\Admin\Material.php(292): Kohana_ORM->save()
#6 I:\Server\vhosts\kohana\system\classes\Kohana\Controller.php(84): Controller_Admin_Material->action_edit()
#7 [internal function]: Kohana_Controller->execute()
#8 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Admin_Material))
#9 I:\Server\vhosts\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 I:\Server\vhosts\kohana\system\classes\Kohana\Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 I:\Server\vhosts\kohana\index.php(118): Kohana_Request->execute()
#12 {main} in I:\Server\vhosts\kohana\modules\database\classes\Kohana\Database\Query.php:251