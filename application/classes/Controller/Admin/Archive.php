<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 11.05.13
 * Time: 14:35
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Archive extends Controller_Back
{
    public $badges = array(
        array(
            'text'  => 'Всего архивных материалов в базе',
            'class' => 'badge-info'
        ),
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/archive',
            'type' => 'n'
        ),

    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/material',
            'text'  => '<i class="icon-th-list icon-white"></i> Материалы',
            'class' => 'btn-info'
        )
    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-list"></i> Подробности',
            'href'  => '/admin/archive/info',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-folder-open"></i> Вывести материал из архива',
            'href'  => '/admin/archive/material',
            'type'  => 'y'
        ),
    );

    public $t_headers = array(
        array(
            'text' => 'ID',
            'field' => 'id'
        ),
        array(
            'text' => 'КРСП',
            'field' => 'krsp_num'
        ),
        array(
            'text' => 'Дата регистрации',
            'field' => 'registration_date'
        ),
        array(
            'text' => 'Источник сообщения',
            'field' => 'source'
        ),
        array(
            'text' => 'Краткая фабула',
            'field' => 'plot'
        ),
        array(
            'text' => 'Статья УК',
            'field' => 'article'
        ),
        array(
            'text' => 'Следователь',
            'field' => 'investigator'
        ),
        array(
            'text' => 'Характеристика',
            'field' => 'characteristic'
        ),
       /* array(
            'text' => 'Решение',
            'field' => 'decree'
        ),*/
        array(
            'text' => 'Дата принятия решения',
            'field' => 'decree_date'
        ),
        array(
            'text' => 'Срок рассмотрения',
            'field' => 'period'
        ),
        array(
            'text' => 'Причина отказа',
            'field' => 'failure_cause'
        ),
        /*array(
            'text' => 'Дата отмены решения',
            'field' => 'decree_cancel_date'
        ),
        array(
            'text' => '(ДОП) Следователь',
            'field' => 'extra_investigator'
        ),
        array(
            'text' => '(ДОП) Срок рассмотрения',
            'field' => 'extra_period'
        ),
        array(
            'text' => '(ДОП) Решение',
            'field' => 'extra_decree'
        ),
        array(
            'text' => '(ДОП) Дата принятия решения',
            'field' => 'extra_decree_date'
        ),*/
    );

    public function action_index()
    {
        $this->addScript('admin-table'); //Скрипты выбора поля для редактирования
        $total_items = ORM::factory('Material')->where('archive', '=', 1)->find_all()->count();
        $page = Request::$current->param('page');

        /*Рендер таблицы с материалами*/
        $materials = ORM_Log::factory('material')
            ->where('archive', '=', 1)
            ->order_by('registration_date', 'DESC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $content = View::factory('/back/materials_table');
        $content->t_headers = $this->t_headers;
        $content->caption = "Материалы в архиве";
        $content->datas = $materials;
        $content->sub_admin_menus = $this->sub_menus;
        $content->total_materials = $total_items;
        $content->badges = $this->badges;

        if(ceil($total_items / $this->config->items_per_page) > 1){
            $content->paginator = Help::render_paginator('material', $this->back_menu[0]['href'], $page, $total_items); //добавление постраничной навигации
        }

        /*Рендер шаблона админка*/
        $cp = View::factory('/back/control_panel');
        $cp->p_title = "Архивные материалы дел";
        $cp->admin_menus = $this->menu_to_cp;
        $cp->content = $content;

        /*Вывод всех вьюшек в общий шаблон*/
        $this->template->body = $cp;
    }

    public function action_material()
    {
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0)
        {
            $material = ORM_Log::factory('material', $id);
            $material->archive = 0;
            try
            {
                $material->save();
                $content = View::factory('back/accept');
                $content->message = 'Материал успешно выведен из архива';
                $content->back_path = '/admin/archive';
                $content->back_path_text = 'Вернуться назад к списку архивных материалов';
            }
            catch(ORM_Validation_Exception $exp)
            {
                $content = View::factory('/back/error');
                $content->message = "Произошла ошибка во время вывода материала из архива: <br>".$exp->getMessage();
                $content->back_path = '/admin/archive';
                $content->back_path_text = 'Вернуться назад';
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать материал для вывода из архива';
            $content->back_path = '/admin/archive';
            $content->back_path_text = 'Вернуться назад';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Вывод материалов из архива';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_info()
    {
        $id = Request::$current->param('id', NULL);
        if(!is_null($id))
        {
            $material = ORM_Log::factory('material', $id);
            $content = View::factory('back/info');
            $content->material = $material;
            $content->auth = $this->auth;
            $content->user = $this->user;
            $content->roles = $this->config->auth_required;
            $content->back_path = '/admin/archive';
            $content->no_edit = TRUE;
            $content->no_logs = TRUE;
        }
        else
        {
            $content = View::factory('back/error');
            $content->message = "Не был указан ID сообщения для вывода";
            $content->back_path = '/admin/archive';
            $content->back_path_text = "Вернуться назад";
        }

        $view = View::factory('/back/control_panel');
        $view->p_title = 'Подробная информация об архивном сообщении';
        $view->content = $content;
        $this->template->body = $view;
        //$this->template->debug = Debug::vars($this->config->auth_required);
    }
}