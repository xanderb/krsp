<?php defined('SYSPATH') or die('No direct script access.');
/*
 * Ядро системы. Подключение базового шаблона, модели аторизации, подключение на страницу стилей и скриптов по умолчанию.
 */

class Controller_Core extends Controller_Template {
    
    protected $auth; // модель авторизации

    protected $user; // текущий пользователь

    protected $auth_required = FALSE; //Необходимые права пользователя для входа на страницу

    public $session;

    public $config;

    public function before() {
        parent::before();
        $this->session = Session::instance();
        $this->auth = Auth::instance();
        $this->user = $this->auth->get_user();

        // Проверка авторизации пользователя и ролей.
        if (($this->auth_required !== FALSE AND $this->auth->logged_in($this->auth_required) === FALSE))
        {
            if ($this->auth->logged_in()){
                Controller::redirect('');
            }else{
                $this->session->set('prev_page', Request::$current->uri());
                Controller::redirect('login');
            }
        }
        //$this->template->debug = Debug::vars(Request::$current->action());
        $this->config = Kohana::$config->load('basic');
    }
}
