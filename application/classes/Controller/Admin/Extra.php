<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 29.07.13
 * Time: 13:37
 * To change this template use File | Settings | File Templates.
 */

class Controller_Admin_Extra extends Controller_Back implements Controller_Admin_Crud
{
    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/extra',
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
            'text'  => '<i class="icon-folder-open icon-white"></i> Сообщения',
            'class' => 'btn-info'
        )
    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/extra/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/extra/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/extra/delete',
            'type'  => 'y'
        ),
    );

    public $material_headers = array(
        array(
            'text' => 'ID',
            'field' => 'id'
        ),
        array(
            'text' => 'Номер КРСП',
            'field' => 'krsp_num'
        ),
        array(
            'text' => 'Следователь',
            'field' => 'investigator'
        ),
        array(
            'text' => 'Статья',
            'field' => 'article'
        ),
        array(
            'text' => 'Дата регистрации',
            'field' => 'registration_date'
        ),
        array(
            'text' => 'ДОПов у сообщения',
            'field' => ''
        )
    );

    public $extra_headers = array(
        array(
            'text' => 'ID',
            'field' => 'id'
        ),
        array(
            'text' => 'Сообщение (Номер КРСП, дата регистрации)',
            'field' => 'material'
        ),
        array(
            'text' => 'Отмененный ДОП, дата',
            'field' => 'parent_extra',
        ),
        array(
            'text' => 'Дата отмены решения',
            'field' => 'decree_cancel_date'
        ),
        array(
            'text' => '(ДОП) Следователь',
            'field' => 'investigator'
        ),
        array(
            'text' => '(ДОП) Срок рассмотрения',
            'field' => 'period'
        ),
        array(
            'text' => '(ДОП) Решение',
            'field' => 'decree'
        ),
        array(
            'text' => '(ДОП) Дата принятия решения',
            'field' => 'decree_date'
        ),
    );

    public function action_index()
    {
        $this->addScript('extra-admin-table');

        $materials = ORM_Log::factory('material')
            ->select(array(DB::expr('COUNT(*)'), 'ecount'))
            ->join(array('extras', 'ej'), 'INNER')
            ->on('material.id', '=', 'ej.material_id')
            //->distinct('material.id')
            ->group_by('ej.material_id')
            ->order_by('id', 'ASC')
            ->find_all();
        $extras = ORM_Log::factory('extra')->order_by('material_id', 'ASC')->order_by('decree_cancel_date', 'DESC')->find_all();
        $view = View::factory('/back/extra_view');
        $view->material_headers = $this->material_headers;
        $view->extra_headers = $this->extra_headers;
        $view->caption_material = "Сообщения";
        $view->caption_extra = "ДОПы";
        $view->materials = $materials;
        $view->extras = $extras;
        $view->sub_admin_menus = $this->sub_menus;

        /*Рендер шаблона админка*/
        $cp = View::factory('/back/control_panel');
        $cp->p_title = "ДОПы";
        $cp->admin_menus = $this->menu_to_cp;
        $cp->content = $view;
        /*foreach($materials as $material)
        {
            $this->template->debug = Debug::vars($material);
        }*/

        /*Вывод всех вьюшек в общий шаблон*/
        $this->template->body = $cp;
        //$this->template->debug = Debug::vars($materials);
    }

    public function action_add() {}

    public function action_edit() {}

    public function action_delete() {}

}