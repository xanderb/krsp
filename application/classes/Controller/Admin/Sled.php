<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 24.04.13
 * Time: 22:53
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Sled extends Controller_Back implements Controller_Admin_Crud {
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'ФИО следователя',
            'field' => 'name'
        ),
        array(
            'text'  => 'Звание',
            'field' => 'position',
        ),
        array(
            'text'  => 'Порядок сортировки',
            'field' => 'sort'
        ),
    );

    public $badges = array(
        array(
            'text'  => 'Всего следователей в базе',
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
            'text'  => '<i class="icon-th-list icon-white"></i> Материалы',
            'class' => 'btn-info'
        )
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/sled',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/sled/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/sled/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/sled/delete',
            'type'  => 'y'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table');
        $page = Request::$current->param('page');
        $total_items = ORM::factory('investigator')->find_all()->count();

        $table_view = View::factory('/back/table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание
        $table_view->caption = "Список следователей";

        $invest = ORM::factory('investigator')
            ->order_by('sort', 'ASC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $table_view->datas = $invest;
        $table_view->badges = $this->badges;
        $table_view->total_items = array($total_items);

        if(ceil($total_items / $this->config->items_per_page) > 1){
            $table_view->paginator = Help::render_paginator('investigator', $this->back_menu[0]['href'], $page, $total_items); //добавление постраничной навигации
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Следователи'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;
    }

    public function action_add()
    {
        $this->addScript('admin-form');
        if(isset($_POST['name']))
        {
            $name = Arr::get($_POST, 'name');
            $position = Arr::get($_POST, 'position');
            $investigator = ORM::factory('investigator');
            $investigator->name = $name;
            $investigator->position = $position;

            $last_investigator = ORM::factory('investigator')->order_by('sort', 'DESC')->find();
            $investigator->sort = $last_investigator->sort + 1;
            try
            {
                $investigator->save();
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно добавлена';
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад к списку следователей';
            }
            catch (ORM_Validation_Exception $e)
            {
                $content = View::factory('/back/edit_investigator');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма добавления следователя";
                $content->data = $investigator;
                $content->error = $e->errors('validation');
            }
        }
        else
        {
            $content = View::factory('/back/edit_investigator');
            $content->sub_menus = $this->back_menu;
            $content->legend = "Форма добавления следователя";
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление информации о следователе';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('admin-form');
        if(isset($_POST['name'])){
            $id = Arr::get($_POST, 'id');
            $name = Arr::get($_POST, 'name');
            $position = Arr::get($_POST, 'position');
            $sort =  Arr::get($_POST, 'sort');
            $investigator = ORM::factory('investigator', $id);
            $investigator->name = $name;
            $investigator->position = $position;
            $investigator->sort = $sort;

            if($investigator->save()){
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно изменена';
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад к списку следователей';
            }else{
                $content = View::factory('/back/edit_investigator');
                $content->sub_menus = $this->back_menu;
                $content->data = $investigator;
                $content->legend = "Форма редактирования следователя";

                $content->error = "Ошибка при сохранении. Введены не правильные данные или нет доступа к базе данных. Повторите попытку позже!";
            }
        }else{
            $id = $this->request->param('id');
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для редактирования';
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $content = View::factory('/back/edit_investigator');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма редактирования следователя";
                $investigator = ORM::factory('investigator', $id);
                $content->data = $investigator;
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование информации о следователях';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($_POST['id'])){
            $investigator = ORM::factory('investigator', $id);
            try{
                $investigator->delete();
                $content = View::factory('back/accept');
                $content->message = 'Запись успешно удалена';
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад к списку следователей';
            }catch(Exception $e){
                $content = View::factory('/back/error');
                $content->message = $e->getMessage();
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад';
            }
        }else{
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для удаления';
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $investigator = ORM::factory('investigator', $id);
                $content = View::factory('/back/delete');
                $content->id = $id;
                $content->delete_text = "Удалить ".$investigator->name." из списка следователей";
                $content->back_path = '/admin/sled';
                $content->back_path_text = 'Вернуться назад';
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление информации о следователе';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}