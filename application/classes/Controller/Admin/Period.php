<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 17.04.13
 * Time: 20:31
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Period extends Controller_Back implements Controller_Admin_Crud
{
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Дней на рассмотрение',
            'field' => 'days'
        ),
        array(
            'text'  => 'Порядок сортировки',
            'field' => 'sort'
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
            'href' => '/admin/period/',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/period/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/period/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/period/delete',
            'type'  => 'y'
        ),
    );

    public function before() {
        parent::before();
    }

    public function action_index() {
        $this->addScript('admin-table');


        $table_view = View::factory('/back/table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание

        $periods = ORM::factory('Period')->find_all();
        $table_view->datas = $periods;
        $table_view->caption = "Сроки рассмотрения материалов";

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Сроки рассмотрения материалов дел'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;

    }

    public function action_add() {
        $this->addScript('admin-form');

        if(isset($_POST['days'])){

            $days = Arr::get($_POST, 'days');
            $period = ORM::factory('Period');
            $period->days = $days;

            $last_period = ORM::factory('Period')->order_by('sort', 'DESC')->find();
            $period->sort = $last_period->sort + 1;
            try{
                $period->save();
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно добавлена';
                $content->back_path = '/admin/period';
                $content->back_path_text = 'Вернуться назад к срокам рассмотрения';
            }catch (ORM_Validation_Exception $e){
                $content = View::factory('/back/edit_period');
                $content->sub_menus = $this->back_menu;
                $content->data = $period;
                $content->legend = "Форма добавления срока рассмотрения";
                $content->error = $e->errors('validation');
            }


        }else{
            $content = View::factory('/back/edit_period');
            $content->sub_menus = $this->back_menu;
            $content->legend = "Форма добавления срока рассмотрения";
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление срока рассмотрения дел';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit() {
        $this->addScript('admin-form');
        if(isset($_POST['days'])){
            $id = Arr::get($_POST, 'id');
            $days = Arr::get($_POST, 'days');
            $period = ORM::factory('Period', $id);
            $period->days = $days;

            if($period->save()){
                $content = View::factory('/back/accept');
                $content->message = 'Запись успешно изменена';
                $content->back_path = '/admin/period';
                $content->back_path_text = 'Вернуться назад к срокам рассмотрения';
            }else{
                $content = View::factory('/back/edit_period');
                $content->sub_menus = $this->back_menu;
                $content->data = $period;
                $content->legend = "Форма редактирования срока рассмотрения";
                $content->error = "Ошибка при сохранении. Введены не правильные данные или нет доступа к базе данных. Повторите попытку позже!";
            }
        }else{
            $id = $this->request->param('id');
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Необходимо выбрать строку для редактирования';
                $content->back_path = '/admin/period/';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $content = View::factory('/back/edit_period');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма редактирования срока рассмотрения";
                $period = ORM::factory('Period', $id);
                $content->data = $period;
            }
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование срока рассмотрения дел';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete() {
        $id = Request::$current->param('id');
        if(isset($_POST['id'])){
            $period = ORM::factory('Period', $id);
            try{
                $period->delete();
                $content = View::factory('back/accept');
                $content->message = 'Запись успешно удалена';
                $content->back_path = '/admin/period';
                $content->back_path_text = 'Вернуться назад к срокам рассмотрения';
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
                $content->back_path = '/admin/period/';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $period = ORM::factory('Period', $id);
                $content = View::factory('/back/delete');
                $content->id = $id;
                $content->delete_text = "Удалить срок рассмотрения в ".$period->days." дней из списка";
                $content->back_path = '/admin/period/';
                $content->back_path_text = 'Вернуться назад';
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление срока рассмотрения дел';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

}