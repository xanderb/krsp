<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 23.04.13
 * Time: 12:50
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Source extends Controller_Back implements Controller_Admin_Crud
{

    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Видимое значение',
            'field' => 'value'
        ),
        array(
            'text'  => 'Источник сообщения',
            'field' => 'text',
        ),
        array(
            'text'  => 'Порядок сортировки',
            'field' => 'sort'
        ),
    );

    public $badges = array(
        array(
            'text'  => 'Всего источников в базе',
            'class' => 'badge-info'
        ),
    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/material',
            'text'  => '<i class="icon-list-alt icon-white"></i> Материалы',
            'class' => 'btn-info'
        )
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/source',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/source/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/source/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/source/delete',
            'type'  => 'y'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table');
        $page = Request::$current->param('page');
        $total_items = ORM::factory('source')->find_all()->count();

        $table_view = View::factory('/back/table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание
        $table_view->caption = "Источники сообщений";

        $periods = ORM::factory('source')
            ->order_by('sort', 'ASC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();


        $table_view->datas = $periods;
        $table_view->badges = $this->badges;
        $table_view->total_items = array($total_items);

        if(ceil($total_items / $this->config->items_per_page) > 1){
            $table_view->paginator = Help::render_paginator('source', $this->back_menu[0]['href'], $page, $total_items); //добавление постраничной навигации
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Источники сообщений'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;
    }

    public function action_add()
    {
        $this->addScript('admin-form');
        if(isset($_POST['text']))
        {
            $text = Arr::get($_POST, 'text');
            $value = Arr::get($_POST, 'value');
            $source = ORM::factory('source');
            $source->value = $value;
            $source->text = $text;

            $last_source = ORM::factory('source')->order_by('sort', 'DESC')->find();
            $source->sort = $last_source->sort + 1;
            try
            {
                $source->save();
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно добавлена';
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад к источникам сообщений';
            }
            catch (ORM_Validation_Exception $e)
            {
                $content = View::factory('/back/edit_source');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма добавления источника сообщения";
                $content->data = $source;
                $content->error = $e->errors('validation');
            }
        }
        else
        {
            $content = View::factory('/back/edit_source');
            $content->sub_menus = $this->back_menu;
            $content->legend = "Форма добавления источника сообщения";
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление источника сообщения';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('admin-form');
        if(isset($_POST['text'])){
            $id = Arr::get($_POST, 'id');
            $text = Arr::get($_POST, 'text');
            $value = Arr::get($_POST, 'value');
            $sort =  Arr::get($_POST, 'sort');
            $source = ORM::factory('source', $id);
            $source->value = $value;
            $source->text = $text;
            $source->sort = $sort;

            if($source->save()){
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно изменена';
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад к источникам сообщений';
            }else{
                $content = View::factory('/back/edit_source');
                $content->sub_menus = $this->back_menu;
                $content->data = $source;
                $content->legend = "Форма редактирования источника сообщения";
                $content->error = "Ошибка при сохранении. Введены не правильные данные или нет доступа к базе данных. Повторите попытку позже!";
            }
        }else{
            $id = $this->request->param('id');
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для редактирования';
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $content = View::factory('/back/edit_source');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма редактирования источника сообщения";
                $source = ORM::factory('source', $id);
                $content->data = $source;
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование источников сообщений';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($_POST['id'])){
            $source = ORM::factory('source', $id);
            try{
                $source->delete();
                $content = View::factory('back/accept');
                $content->message = 'Запись успешно удалена';
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад к источникам сообщений';
            }catch(Exception $e){
                $content = View::factory('/back/error');
                $content->message = $e->getMessage();
                $content->back_path = '/admin/period/';
                $content->back_path_text = 'Вернуться назад';
            }
        }else{
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для удаления';
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $source = ORM::factory('source', $id);
                $content = View::factory('/back/delete');
                $content->id = $id;
                $content->delete_text = "Удалить ".$source->text." из источников сообщений";
                $content->back_path = '/admin/source';
                $content->back_path_text = 'Вернуться назад';
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление источника сообщений';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}