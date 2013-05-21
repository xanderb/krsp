<?php
defined('SYSPATH') or die('No direct script access.');
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 12.04.13
 * Time: 12:07
 * To change this template use File | Settings | File Templates.
 */

class Controller_Front_Reg extends Controller_Front{
    public $page_title = 'Авторизация в КРСП';

    public function action_index(){
        $this->action_login();
    }

    public function action_login()
    {
        //Проверка на авторизацию
        if($this->auth->logged_in()!= 0){
            Controller::redirect('');
        }
        //Получение параметров сообщений
        $warning = $this->request->param('type'); //тип сообщения
        $message = $this->request->param('message'); //параметр для messages
        if($warning){
            $warning_text = Kohana::message('controllers/reg', $message);
        }

        //непосредственно авторизация
        if(isset($_POST['username'])){
            $login = Arr::get($_POST, 'username', FALSE);
            $password = Arr::get($_POST, 'password', FALSE);
            $remember = Arr::get($_POST, 'remember', FALSE);
            if($login AND $password){
                if($this->auth->login($login, $password, $remember)){
                    Controller::redirect($this->session->get('prev_page'));   //если авторизация успешна - редиректим на предыдущую страницу
                }else{
                    Controller::redirect('login/error/auth'); //при не успешной авторизации выводим сообщение и редиректим обратно на форму авторизации
                }
            }else{
                Controller::redirect('login/error/empty'); //если не ввели логин или пароль редиректим обратно на форму с сообщением
            }
        }

        $body = View::factory('front/auth/login');  //подключаем вид формы логина
        $body->warning = (isset($warning) AND $warning) ? $warning : NULL;                      //тип сообщения
        $body->warning_text = (isset($warning_text) AND $warning_text) ? $warning_text : NULL;  //непосредственно сообщение
        $body->page_header = "Авторизация в КРСП";
        $this->template->body = $body;
    }

    public function action_logout()
    {
        $this->auth->logout();
        Controller::redirect('');
    }
}