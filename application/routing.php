 <?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 12.04.13
 * Time: 12:04
 * To change this template use File | Settings | File Templates.
 */

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('login', 'login(/<type>(/<message>))')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'reg',
        'action'     => 'login',
    ));
Route::set('logout', 'logout')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'reg',
        'action'     => 'logout',
    ));
Route::set('prints', '(<controller>/)print(/<type>)')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'material',
        'action'     => 'print',
    ));
 Route::set('year_view', '(<controller>/)year(/<wyear>)')
     ->defaults(array(
         'directory'  => 'front',
         'controller' => 'material',
         'action'     => 'index',
     ));
Route::set('extra_add', 'extra/add(/<krsp>(/<year>))')
     ->defaults(array(
         'directory'  => 'front',
         'controller' => 'extra',
         'action'     => 'add',
     ));
Route::set('change_filters', 'filter/change(/<type>)')
 ->defaults(array(
     'directory'  => 'front',
     'controller' => 'filter',
     'action'     => 'change',
 ));
Route::set('clear_filters', 'filter/alldelete(/<type>)')
     ->defaults(array(
         'directory'  => 'front',
         'controller' => 'filter',
         'action'     => 'alldelete',
    ));
Route::set('get_filters', 'filter/<var>/<val>')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'filter',
        'action'     => 'change',
    ));
Route::set('filters', 'filter/<action>(/<filter>(/<filter_item>))')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'filter',
        'action'     => 'index',
    ));
Route::set('sort', 'sort/<field>(/<direction>(/<table>))')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'sort',
        'action'     => 'index'
    ));
Route::set('front_page', 'page/<page>')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'material',
        'action'     => 'index',
    ));
Route::set('admin_page', 'admin/<controller>/page/<page>')
    ->defaults(array(
        'directory'  => 'admin',
        'controller' => 'material',
        'action'     => 'index',
    ));
Route::set('admin_default', 'admin(/<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'directory'  => 'admin',
        'controller' => 'cp',
        'action'     => 'index',
    ));

Route::set('default', '(<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'material',
        'action'     => 'index',
    ));