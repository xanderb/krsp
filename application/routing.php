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
Route::set('filters', 'filter/<action>(/<filter>(/<filter_item>))')
    ->defaults(array(
        'directory'  => 'front',
        'controller' => 'filter',
        'action'     => 'index',
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