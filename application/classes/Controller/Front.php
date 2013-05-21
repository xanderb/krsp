<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 02.04.13
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */
class Controller_Front extends Controller_Core
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
    protected $auth_required = FALSE;

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