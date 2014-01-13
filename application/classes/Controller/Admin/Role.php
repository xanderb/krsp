<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.04.13
 * Time: 22:25
 * To change this template use File | Settings | File Templates.
 */
class Controller_Admin_Role extends Controller_Back {
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Название роли',
            'field' => 'name'
        ),
        array(
            'text'  => 'Описание',
            'field' => 'description',
        ),

    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/role/',
            'type' => 'n'
        ),

    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/user',
            'text'  => '<i class="icon-user icon-white"></i> Пользователи',
            'class' => 'btn-info'
        )
    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/role/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/role/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/role/delete',
            'type'  => 'y'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table');
        $table_view = View::factory('/back/table');
        $table_view->sub_admin_menus = $this->sub_menus;    //Меню выводимое над таблицей
        $table_view->t_headers = $this->t_headers;  //Имя полей в таблице и их текстовое описание
        $table_view->caption = "Роли пользователей";

        $role = ORM::factory('Role')->find_all();
        $table_view->datas = $role;
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Роли пользователей'; //заголовок выводимый на страницу в h1
        $admin_view->content = $table_view;
        $admin_view->admin_menus = $this->menu_to_cp;

        $this->template->body = $admin_view;
    }

    public function action_add ()
    {
        $this->addScript('admin-form');
        if(isset($_POST['name']))
        {
            $name = Arr::get($_POST, 'name');
            $description = Arr::get($_POST, 'description');
            $role = ORM::factory('Role');
            $role->name = $name;
            $role->description = $description;

            try
            {
                $role->save();
                $content = View::factory('/back/accept');
                $content->message = 'Роль успешно добавлена';
                $content->back_path = '/admin/role';
                $content->back_path_text = 'Вернуться назад к списку ролей';
            }
            catch (ORM_Validation_Exception $e)
            {
                $content = View::factory('/back/edit_role');
                $content->sub_menus = $this->back_menu;
                $content->data = $role;
                $content->legend = "Форма добавления роли";
                $content->error = "Введены не верные данные. Попробуйте добавить запись еще раз";
            }
        }
        else
        {
            $content = View::factory('/back/edit_role');
            $content->legend = "Форма добавления роли";
            $content->sub_menus = $this->back_menu;
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление новой роли пользователей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('admin-form');
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0){
            if(isset($_POST['submit']))
            {
                $name = Arr::get($_POST, 'name');
                $description = Arr::get($_POST, 'description');
                $post_id = Arr::get($_POST, 'id', 0);

                $role = ORM::factory('Role', $post_id);
                $role->name = $name;
                $role->description = $description;

                try
                {
                    $role->save();
                    $content = View::factory('/back/accept');
                    $content->message = 'Роль успешно изменена';
                    $content->back_path = '/admin/role';
                    $content->back_path_text = 'Вернуться назад к списку ролей';
                }
                catch (ORM_Validation_Exception $e)
                {
                    $content = View::factory('/back/edit_role');
                    $content->sub_menus = $this->back_menu;
                    $content->data = $role;
                    $content->legend = "Форма редактирования роли";
                    $content->error = $e->errors('validation');
                }
            }
            else
            {
                $role = ORM::factory('Role', $id);
                $content = View::factory('/back/edit_role');
                $content->legend = "Форма редактирования роли";
                $content->data = $role;
                $content->sub_menus = $this->back_menu;
            }
        }else{
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для редактирования';
            $content->back_path = '/admin/role';
            $content->back_path_text = 'Вернуться назад';
        }


        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование роли';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0){
            if(isset($_POST['id'])){
                $post_id = Arr::get($_POST, 'id', 0);
                $deleted_role = ORM::factory('Role', $post_id);
                try
                {
                    $deleted_role->delete();
                    $content = View::factory('back/accept');
                    $content->message = 'Роль успешно удалена';
                    $content->back_path = '/admin/role';
                    $content->back_path_text = 'Вернуться назад к списку ролей';
                }
                catch(Database_Exception $e)
                {
                    $content = View::factory('/back/error');
                    $content->message = "Произошла ошибка во время удаления роли: <br>".$e->getMessage();
                    $content->back_path = '/admin/role';
                    $content->back_path_text = 'Вернуться назад';
                }
            }else{
                $deleted_role = ORM::factory('Role', $id);
                $content = View::factory('/back/delete');
                $content->back_path = "/admin/role";
                $content->back_path_text = "Вернуться назад";
                $content->id = $id;
                $content->delete_text = "Удалить роль \"".$deleted_role->name."\"";
            }
        }else{
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для удаления';
            $content->back_path = '/admin/role';
            $content->back_path_text = 'Вернуться назад';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление ролей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}