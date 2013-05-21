<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 20:04
 * To change this template use File | Settings | File Templates.
 */

class Controller_Back extends Controller_Core
{
    public $template = 'main/index';
    public $page_title = 'Тестовое приложение на Kohana';
    public $scripts = array(
        'jquery-min',
        'bootstrap.min',
        'bs-plug',
    );
    public $styles = array(
        'global',
        'bootstrap.min',

    );
    protected $auth_required = 'admin';

    public $menus = array(
        array(
            'text' => 'Источники',
            'href' => '/admin/source/'
        ),
        array(
            'text' => 'Статьи УК',
            'href' => '/admin/article/'
        ),
        array(
            'text' => 'Следователи',
            'href' => '/admin/sled/'
        ),
        array(
            'text' => 'Характеристики дел',
            'href' => '/admin/char/'
        ),
        array(
            'text' => 'Решения',
            'href' => '/admin/decree/'
        ),
        array(
            'text' => 'Сроки рассмотрения',
            'href' => '/admin/period/'
        ),
        array(
            'text' => 'Причины отказа',
            'href' => '/admin/fcause/'
        ),
    );

    public $user_menu = array(
        array(
            'text' => 'Пользователи',
            'href' => '/admin/user/'
        ),
        array(
            'text' => 'Роли',
            'href' => '/admin/role/'
        ),

    );


    public function before(){
        parent::before();
        $this->template->page_title = $this->page_title;
        $this->template->styles = $this->styles;
        $this->template->scripts = $this->scripts;

        if(isset($this->auth) AND isset($this->user)){
            $roles = $this->user->roles->find_all();
            $user_info = View::factory('main/user_info');
            $user_info->username = $this->user->username;
            $user_info->roles = $roles;
        }else{
            $user_info = 'Данных по пользователю нет';
        }
        $this->template->userinfo = $user_info;

        if($this->auth->logged_in() == 0){
            $login_form = View::factory('front/auth/login');
            $this->template->body = $login_form;
        }
    }

    public function addScript($script){
        $this->scripts[] = $script;
        $this->template->scripts = $this->scripts;
    }

    public function addStyle($style){
        $this->styles[] = $style;
        $this->template->styles = $this->styles;
    }
}