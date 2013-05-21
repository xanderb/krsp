<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 16.04.13
 * Time: 13:57
 * To change this template use File | Settings | File Templates.
 */
interface Controller_Admin_Crud {
    public function action_index();
    public function action_add();
    public function action_edit();
    public function action_delete();
}