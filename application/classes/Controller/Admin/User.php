<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.04.13
 * Time: 22:25
 * To change this template use File | Settings | File Templates.
 */
class Controller_Admin_User extends Controller_Back {
    public $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text'  => 'Email',
            'field' => 'email'
        ),
        array(
            'text'  => 'Имя пользователя',
            'field' => 'username',
        ),
        array(
            'text'  => 'Уровни доступа',
            'field' => 'roles'
        ),
    );

    public $badges = array(
        array(
            'text'  => 'Всего пользователей в базе',
            'class' => 'badge-info'
        ),
    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/role',
            'text'  => '<i class="icon-th-list icon-white"></i> Роли',
            'class' => 'btn-info'
        )
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/user/',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/user/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/user/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/user/delete',
            'type'  => 'y'
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table');
        $users = ORM::factory('user')->find_all();
        $count_users = $users->count();

        $user_list = View::factory('/back/user_table');
        $user_list->sub_admin_menus = $this->sub_menus;
        $user_list->t_headers = $this->t_headers;
        $user_list->caption = "Пользователи системы";
        $user_list->badges = $this->badges;
        $user_list->total_users = $count_users;

        $user_list->datas = $users;
        $template = View::factory('/back/control_panel');
        $template->p_title = "Управление пользователями";
        $template->content = $user_list;
        $template->admin_menus = $this->menu_to_cp;

        $this->template->body = $template;
    }

    public function action_add()
    {
        if(isset($_POST['submit'])){
            $new_user = ORM::factory('user');
            $user_values = array(
                'username'  => Arr::get($_POST, 'form_username', ''),
                'email'     => Arr::get($_POST, 'form_email', ''),
                'password'  => Arr::get($_POST, 'form_password', ''),
                'password_confirm'  => Arr::get($_POST, 'form_password_confirm', '')
            );
            $roles_array = Arr::get($_POST, 'roles', NULL);
            try{
                $new_user = $new_user->create_user($user_values, array(
                    'username',
                    'email',
                    'password'
                ));
                $roles_array[] = 1;  //Принудительное присваивание роли login, требуемой системой для авторизации на сайте
                $new_user->add('roles', $roles_array);
                $content = View::factory('/back/accept');
                $content->message = 'Новый пользователь успешно добавлен';
                $content->back_path = '/admin/user';
                $content->back_path_text = 'Вернуться назад к списку пользователей';
            }catch(ORM_Validation_Exception $ex){
                $user_form = View::factory('/back/edit_user');
                $roles = ORM::factory('role')->find_all();
                $user_form->roles = $roles;
                $user_form->legend = "Форма создания пользователя";
                $user_form->sub_menus = $this->back_menu;
                $user_form->error = $ex->errors('validation');
                $content = $user_form;

            }
        }else{
            $roles = ORM::factory('role')->find_all();
            $user_form = View::factory('/back/edit_user');
            $user_form->roles = $roles;
            $user_form->legend = "Форма создания пользователя";
            $user_form->sub_menus = $this->back_menu;
            $content = $user_form;
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление пользователей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0){
            if(isset($_POST['id'])){
                $post_id = Arr::get($_POST, 'id', 0);
                $deleted_user = ORM::factory('user', $post_id);
                try
                {
                    $deleted_user->delete();
                    $content = View::factory('back/accept');
                    $content->message = 'Пользователь успешно удален';
                    $content->back_path = '/admin/user';
                    $content->back_path_text = 'Вернуться назад к списку пользователей';
                }
                catch(Database_Exception $e)
                {
                    $content = View::factory('/back/error');
                    $content->message = "Произошла ошибка во время удаления пользователя: <br>".$e->getMessage();
                    $content->back_path = '/admin/user';
                    $content->back_path_text = 'Вернуться назад';
                }
            }else{
                $deleted_user = ORM::factory('user', $id);
                $content = View::factory('/back/delete');
                $content->back_path = "/admin/user";
                $content->back_path_text = "Вернуться назад";
                $content->id = $id;
                $content->delete_text = "Удалить пользователя ".$deleted_user->username;
            }
        }else{
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для удаления';
            $content->back_path = '/admin/user';
            $content->back_path_text = 'Вернуться назад';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление пользователей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0){
            $user_info = ORM::factory('user', $id);
            if(isset($_POST['submit'])){
                $user_values = array(
                    'username'  => Arr::get($_POST, 'form_username', ''),
                    'email'     => Arr::get($_POST, 'form_email', ''),
                    'password'  => Arr::get($_POST, 'form_password', ''),
                    'password_confirm'  => Arr::get($_POST, 'form_password_confirm', '')
                );
                $roles_array = Arr::get($_POST, 'roles', NULL);
                try{
                    $user_info = $user_info->update_user($user_values, array(
                        'username',
                        'email',
                        'password'
                    ));
                    $user_info->remove('roles');
                    $roles_array[] = 1;
                    $user_info->add('roles', $roles_array);
                    $content = View::factory('/back/accept');
                    $content->message = 'Информация о пользователе успешно отредактирована';
                    $content->back_path = '/admin/user';
                    $content->back_path_text = 'Вернуться назад к списку пользователей';
                }catch(ORM_Validation_Exception $ex){
                    $user_form = View::factory('/back/edit_user');
                    $roles = ORM::factory('role')->find_all();
                    $user_form->uinfo = $user_info;
                    $user_form->roles = $roles;
                    $user_form->legend = "Форма редактирования информации о пользователе";
                    $user_form->sub_menus = $this->back_menu;
                    $user_form->error = $ex->errors('validation');
                    $content = $user_form;
                }
            }else{
                $roles = ORM::factory('role')->find_all();
                $user_form = View::factory('/back/edit_user');
                $user_form->roles = $roles;
                $user_form->uinfo = $user_info;
                $user_form->legend = "Форма редактирования информации о пользователе";
                $user_form->sub_menus = $this->back_menu;
                $content = $user_form;
            }
        }else{
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для редактирования';
            $content->back_path = '/admin/user';
            $content->back_path_text = 'Вернуться назад';
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование пользователей';
        $admin_view->content = $content;
        $this->template->body = $admin_view;

    }
}