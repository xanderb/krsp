<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 20:06
 * To change this template use File | Settings | File Templates.
 */
/**
 * Admin Control Panel
 * Class Controller_Admin_Cp
 *
 */
class Controller_Admin_Cp extends Controller_Back
{
    public $template = 'main/index';
    public $page_title = 'Контрольная панель администратора';

    protected $auth_required = 'admin';

    public $cp_menu = array(
        array(
            'text' => 'Материалы',
            'href' => '/admin/material/',
            'class' => 'btn-info'
        ),
        array(
            'text'  => 'Архив материалов',
            'href'  => '/admin/archive',
            'class' => 'btn-info'
        ),
        /*array(
            'text'  => 'Логи изменений материалов',
            'href'  => '/admin/log',
            'class' => 'btn-info'
        ),*/
    );

    public function action_index()
    {
        $admin_view = View::factory('back/control_panel');
        $admin_view->admin_menus = $this->menus;
        $admin_view->user_menus = $this->user_menu;

        $content = View::factory('/back/control_panel_content');
        $content->cp_menu = $this->cp_menu;
        $content->user_table = Model_User::render_table();
        //$content->material_table = Model_Material::render_table();

        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}