<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 23.07.13
 * Time: 15:13
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Option extends Controller_Back
{
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Описание параметра',
            'field' => 'label'
        ),
        array(
            'text'  => 'Имя параметра',
            'field' => 'param'
        ),
        array(
            'text'  => 'Значение параметра',
            'field' => 'value',
        ),
        array(
            'text'  => 'Значение по умолчанию',
            'field' => 'default'
        ),
        array(
            'text' => 'Тип значения',
            'field' => 'type'
        ),
        array(
            'text' => 'Действия',
            'field' => 'actions'
        )
    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/option/add',
            'type'  => 'n'
        ),
    );
    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/option',
            'type' => 'n'
        ),

    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-ajax');

        $table_view = View::factory('/back/option_table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание
        $table_view->caption = "Параметры приложения";

        $options = ORM::factory('Option')->find_all();
        $table_view->options = $options;


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Управление параметрами приложения'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;
        $this->template->debug = Debug::vars($options);
    }

    public function action_add()
    {
        $this->addScript('option-form');
        if(isset($_POST['option-submit']))
        {
            $values = array(
                'param' => Arr::get($_POST, 'param', NULL),
                'value' => Arr::get($_POST, 'value', NULL),
                'default' => Arr::get($_POST, 'value', NULL),
                'label' => Arr::get($_POST, 'label', NULL),
                'type' => Arr::get($_POST, 'type', NULL)
            );
            $option = ORM::factory('Option');
            $option->values($values);
            try
            {
                $option->save();
                $content = View::factory('/back/accept');
                $content->message = 'Параметр был успешно добавлен';
                $content->back_path = '/admin/option';
                $content->back_path_text = 'Вернуться назад к параметрам';
            }
            catch(ORM_Validation_Exception $e)
            {
                $content = View::factory('/back/edit_option');
                $content->sub_menus = $this->back_menu;
                $content->data = $option;
                $content->legend = 'Форма добавления системного параметра';
                $content->error = $e->errors('validation');
            }
        }
        else
        {
            $content = View::factory('back/edit_option');
            $content->sub_menus = $this->back_menu;
            $content->legend = "Форма добавления системного параметра";
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление параметра';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('option-form');
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0)
        {
            if(isset($_POST['option-submit']))
            {
                $values = array(
                    'param' => Arr::get($_POST, 'param', NULL),
                    'value' => Arr::get($_POST, 'value', NULL),
                    'default' => Arr::get($_POST, 'value', NULL),
                    'label' => Arr::get($_POST, 'label', NULL),
                    'type' => Arr::get($_POST, 'type', NULL)
                );
                $option = ORM::factory('Option', $id);
                $option->values($values);
                try
                {
                    $option->save();
                    $content = View::factory('/back/accept');
                    $content->message = 'Параметр был успешно изменен';
                    $content->back_path = '/admin/option';
                    $content->back_path_text = 'Вернуться назад к параметрам';
                }
                catch(ORM_Validation_Exception $e)
                {
                    $content = View::factory('/back/edit_option');
                    $content->sub_menus = $this->back_menu;
                    $content->data = $option;
                    $content->legend = 'Форма изменения системного параметра';
                    $content->error = $e->errors('validation');
                }
            }
            else
            {
                $option = ORM::factory('Option', $id);
                $content = View::factory('back/edit_option');
                $content->sub_menus = $this->back_menu;
                $content->legend = "Форма изменения системного параметра";
                $content->data = $option;
            }
        }
        else
        {
            $content = View::factory('back/error');
            $content->message = "Ошибка изменения параметра: Не указан идентификатор параметра";
            $content->back_path = '/admin/option';
            $content->back_path_text = 'Вернуться назад к параметрам';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Изменение параметра';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($_POST['id'])){
            $option = ORM::factory('Option', $id);
            try{
                $option->delete();
                $content = View::factory('back/accept');
                $content->message = 'Параметр успешно удален';
                $content->back_path = '/admin/option';
                $content->back_path_text = 'Вернуться назад к списку параметров';
            }catch(Exception $e){
                $content = View::factory('/back/error');
                $content->message = $e->getMessage();
                $content->back_path = '/admin/option';
                $content->back_path_text = 'Вернуться назад';
            }
        }else{
            if(!isset($id)){
                $content = View::factory('/back/error');
                $content->message = 'Ошибка удаления: Не указан идентификатор параметра';
                $content->back_path = '/admin/option';
                $content->back_path_text = 'Вернуться назад';
            }else{
                $option = ORM::factory('Option', $id);
                $content = View::factory('/back/delete');
                $content->id = $id;
                $content->delete_text = "Удалить параметр ".$option->param;
                $content->back_path = '/admin/option';
                $content->back_path_text = 'Вернуться назад';
            }
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление параметра из системы';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_change()
    {
        $values = Arr::get($_POST, 'value', NULL);
        if(!is_null($values))
        {
            foreach($values as $key => $val)
            {
                $option = ORM::factory('Option', $key);
                $option->value = $val;
                $option->save();
            }
        }
        Request::$current->body(NULL);
    }

    public function action_item_change()
    {
        if(isset($_POST['opt_change']))
        {
            $id = Arr::get($_POST, 'id', NULL);
            if(!is_null($id))
            {
                $value = Arr::get($_POST, 'value', 0);
                $option = ORM::factory('Option', $id);
                if(is_array($value))
                    $value = $value[$id];
                $option->value = $value;
                try
                {
                    $option->save();
                    $view = View::factory('back/accept');
                    $view->message = 'Значение опции было успешно изменено';
                    $view->back_path = '/admin/option/';
                    $view->back_path_text = 'Вернуться к опциям';
                }
                catch(ORM_Validation_Exception $e)
                {
                    $view = View::factory('back/error');
                    $view->message = 'Ошибка при изменении значения: '.$e->getMessage();
                    $view->back_path = '/admin/option/';
                    $view->back_path_text = 'Вернуться к опциям';
                }
            }
            else
            {
                $view = View::factory('back/error');
                $view->message = 'Ошибка при изменении значения: Не передан идентификатор';
                $view->back_path = '/admin/option/';
                $view->back_path_text = 'Вернуться к опциям';
            }
        }
        else
        {
            $view = View::factory('back/error');
            $view->message = 'Ошибка при изменении значения: Не переданы параметры';
            $view->back_path = '/admin/option/';
            $view->back_path_text = 'Вернуться к опциям';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Изменение значения параметра';
        $admin_view->content = $view;
        $this->template->body = $admin_view;
    }
}