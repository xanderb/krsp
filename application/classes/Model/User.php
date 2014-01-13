<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 20:01
 * To change this template use File | Settings | File Templates.
 */
class Model_User extends Model_Auth_User
{
    public static $t_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
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

    public static function render_table(){
        $users_list = ORM::factory('User')
            ->order_by('id')
            ->find_all();

        $content = View::factory('/back/user_table');
        $content->t_headers = self::$t_headers;
        $content->short = TRUE; //Флаг для вывода короткой версии таблицы пользователей
        $content->datas = $users_list;
        $content->caption = "Пользователи системы";

        return $content;
    }
}