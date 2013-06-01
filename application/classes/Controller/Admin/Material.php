<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 22:42
 * To change this template use File | Settings | File Templates.
 */
class Controller_Admin_Material extends Controller_Back implements Controller_Admin_Crud
{
    public $badges = array(
        array(
            'text'  => 'Всего материалов в базе',
            'class' => 'badge-info'
        ),
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/admin/material',
            'type' => 'n'
        ),

    );

    public $menu_to_cp = array(
        array(
            'href'  => '/admin/',
            'text'  => '<i class="icon-arrow-left icon-white"></i> Вернуться в контрольную панель'
        ),
        array(
            'href'  => '/admin/archive',
            'text'  => '<i class="icon-folder-open icon-white"></i> Архив',
            'class' => 'btn-info'
        )
    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/admin/material/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/admin/material/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/admin/material/delete',
            'type'  => 'y'
        ),
        array(
            'text'  => '<i class="icon-folder-open"></i> Перенести в архив',
            'href'  => '/admin/material/archive',
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
        array(
            'text' => 'Решение',
            'field' => 'decree'
        ),
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
        array(
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
        ),
    );

    public function action_index()
    {
        $this->addScript('admin-table'); //Скрипты выбора поля для редактирования
        $page = Request::$current->param('page');
        $total_items = ORM::factory('material')->where('archive', '=', 0)->find_all()->count();
        /*Рендер таблицы с материалами*/
        $materials = ORM_Log::factory('material')
            ->where('archive', '=', 0)
            ->order_by('registration_date', 'DESC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $content = View::factory('/back/materials_table');
        $content->t_headers = $this->t_headers;
        $content->caption = "Материалы";
        $content->datas = $materials;
        $content->sub_admin_menus = $this->sub_menus;
        $content->total_materials = $total_items;
        $content->badges = $this->badges;
        if(ceil($total_items / $this->config->items_per_page) > 1){
            $content->paginator = Help::render_paginator('material', $this->back_menu[0]['href'], $page, $total_items); //добавление постраничной навигации
        }


        /*Рендер шаблона админка*/
        $cp = View::factory('/back/control_panel');
        $cp->p_title = "Материалы дел";
        $cp->admin_menus = $this->menu_to_cp;
        $cp->content = $content;

        /*Вывод всех вьюшек в общий шаблон*/
        $this->template->body = $cp;
    }

    public function action_add()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('material-form');

        //Получение списков для формы
        $sources = ORM::factory('source')->find_all();
        $articles = ORM::factory('article')->find_all();
        $investigators = ORM::factory('investigator')->find_all();
        $chars = ORM::factory('characteristic')->find_all();
        $decrees = ORM::factory('decree')->find_all();
        $periods = ORM::factory('period')->find_all();
        $failure_causes = ORM::factory('fcause')->find_all();
        //***//

        if(isset($_POST['submit'])){
            $new_material = ORM_Log::factory('material');
            $new_material->values(
                array(
                    'krsp_num' => (Arr::get($_POST, 'krsp_num', NULL) == '' ? NULL : Arr::get($_POST, 'krsp_num', NULL)),
                    'source_id' => (Arr::get($_POST, 'source_id', NULL) == '' ? NULL : Arr::get($_POST, 'source_id', NULL)),
                    'plot' => (Arr::get($_POST, 'plot', NULL) == '' ? NULL : Arr::get($_POST, 'plot', NULL)),
                    'article_id' => (Arr::get($_POST, 'article_id', NULL) == '' ? NULL : Arr::get($_POST, 'article_id', NULL)),
                    'investigator_id' => (Arr::get($_POST, 'investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'investigator_id', NULL)),
                    'decree_id' => (Arr::get($_POST, 'decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'decree_id', NULL)),
                    'period_id' => (Arr::get($_POST, 'period_id', NULL) == '' ? NULL : Arr::get($_POST, 'period_id', NULL)),
                    'failure_cause_id' => (Arr::get($_POST, 'failure_cause_id', NULL) == '' ? NULL : Arr::get($_POST, 'failure_cause_id', NULL)),
                    'extra_investigator_id' => (Arr::get($_POST, 'extra_investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_investigator_id', NULL)),
                    'extra_period_id' => (Arr::get($_POST, 'extra_period_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_period_id', NULL)),
                    'extra_decree_id' => (Arr::get($_POST, 'extra_decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_decree_id', NULL)),
                )
            );
            if(Arr::get($_POST, 'registration_date', NULL) != ''){
                $new_material->registration_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'registration_date', NULL));
            }
            if(Arr::get($_POST, 'decree_date', NULL) != ''){
                $new_material->decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_date', NULL));
            }
            if(Arr::get($_POST, 'decree_cancel_date', NULL) != ''){
                $new_material->decree_cancel_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_cancel_date', NULL));
            }
            if(Arr::get($_POST, 'extra_decree_date', NULL) != ''){
                $new_material->extra_decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'extra_decree_date', NULL));
            }

            $chars_array = Arr::get($_POST, 'chars', NULL);
            try
            {
                $new_material->save();
                if(count($chars_array) > 0)
                    $new_material->add('characteristic', $chars_array);

                $content = View::factory('/back/accept');
                $content->message = 'Новая запись успешно добавлена';
                $content->back_path = '/admin/material';
                $content->back_path_text = 'Вернуться назад к списку материалов';
            }
            catch(ORM_Validation_Exception $exc)
            {
                $material_form = View::factory('/back/edit_material');
                $material_form->material = $new_material;

                $material_form->sources = $sources->as_array('id', 'text');
                $material_form->articles = $articles->as_array('id', 'value');
                $material_form->investigators = $investigators->as_array('id', 'name');
                $material_form->chars = $chars;
                $material_form->decrees = $decrees->as_array('id', 'text');
                $material_form->periods = $periods->as_array('id', 'days');
                $material_form->failure_causes = $failure_causes->as_array('id', 'text');

                $material_form->legend = "Форма создания материала";
                $material_form->sub_menus = $this->back_menu;
                $material_form->error = $exc->errors('validation');
                $content = $material_form;
            }
        }else{
            $material_form = View::factory('/back/edit_material');

            $material_form->sources = $sources->as_array('id', 'text');
            $material_form->articles = $articles->as_array('id', 'value');
            $material_form->investigators = $investigators->as_array('id', 'name');
            $material_form->chars = $chars;
            $material_form->decrees = $decrees->as_array('id', 'text');
            $material_form->periods = $periods->as_array('id', 'days');
            $material_form->failure_causes = $failure_causes->as_array('id', 'text');

            $material_form->legend = "Форма создания материала";
            $material_form->sub_menus = $this->back_menu;
            $content = $material_form;
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Добавление материала';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_edit()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('material-form');

        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0)
        {
            $material_info = ORM_Log::factory('material', $id);
            //Получение списков для формы
            $sources = ORM::factory('source')->find_all();
            $articles = ORM::factory('article')->find_all();
            $investigators = ORM::factory('investigator')->find_all();
            $chars = ORM::factory('characteristic')->find_all();
            $decrees = ORM::factory('decree')->find_all();
            $periods = ORM::factory('period')->find_all();
            $failure_causes = ORM::factory('fcause')->find_all();
            //***//
            if(isset($_POST['submit']))
            {
                $material_info->values(
                    array(
                        'krsp_num' => (Arr::get($_POST, 'krsp_num', NULL) == '' ? NULL : Arr::get($_POST, 'krsp_num', NULL)),
                        'source_id' => (Arr::get($_POST, 'source_id', NULL) == '' ? NULL : Arr::get($_POST, 'source_id', NULL)),
                        'plot' => (Arr::get($_POST, 'plot', NULL) == '' ? NULL : Arr::get($_POST, 'plot', NULL)),
                        'article_id' => (Arr::get($_POST, 'article_id', NULL) == '' ? NULL : Arr::get($_POST, 'article_id', NULL)),
                        'investigator_id' => (Arr::get($_POST, 'investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'investigator_id', NULL)),
                        'decree_id' => (Arr::get($_POST, 'decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'decree_id', NULL)),
                        'period_id' => (Arr::get($_POST, 'period_id', NULL) == '' ? NULL : Arr::get($_POST, 'period_id', NULL)),
                        'failure_cause_id' => (Arr::get($_POST, 'failure_cause_id', NULL) == '' ? NULL : Arr::get($_POST, 'failure_cause_id', NULL)),
                        'extra_investigator_id' => (Arr::get($_POST, 'extra_investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_investigator_id', NULL)),
                        'extra_period_id' => (Arr::get($_POST, 'extra_period_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_period_id', NULL)),
                        'extra_decree_id' => (Arr::get($_POST, 'extra_decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_decree_id', NULL)),
                    )
                );
                if(Arr::get($_POST, 'registration_date', NULL) != ''){
                    $material_info->registration_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'registration_date', NULL));
                }
                if(Arr::get($_POST, 'decree_date', NULL) != ''){
                    $material_info->decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_date', NULL));
                }
                if(Arr::get($_POST, 'decree_cancel_date', NULL) != ''){
                    $material_info->decree_cancel_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_cancel_date', NULL));
                }
                if(Arr::get($_POST, 'extra_decree_date', NULL) != ''){
                    $material_info->extra_decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'extra_decree_date', NULL));
                }

                $chars_array = Arr::get($_POST, 'chars', NULL);
                try
                {
                    $material_info->save();
                    $material_info->remove('characteristic');
                    if(count($chars_array) > 0)
                        $material_info->add('characteristic', $chars_array);

                    $content = View::factory('/back/accept');
                    $content->message = 'Запись успешно изменена';
                    $content->back_path = '/admin/material';
                    $content->back_path_text = 'Вернуться назад к списку материалов';
                }
                catch(ORM_Validation_Exception $exc)
                {
                    $material_form = View::factory('/back/edit_material');
                    $material_form->material = $material_info;

                    $material_form->sources = $sources->as_array('id', 'text');
                    $material_form->articles = $articles->as_array('id', 'value');
                    $material_form->investigators = $investigators->as_array('id', 'name');
                    $material_form->chars = $chars;
                    $material_form->decrees = $decrees->as_array('id', 'text');
                    $material_form->periods = $periods->as_array('id', 'days');
                    $material_form->failure_causes = $failure_causes->as_array('id', 'text');

                    $material_form->legend = "Форма редактирования материала";
                    $material_form->sub_menus = $this->back_menu;
                    $material_form->error = $exc->errors('validation');
                    $content = $material_form;
                }
            }
            else
            {
                $content = View::factory('/back/edit_material');
                $content->material = $material_info;
                $content->sources = $sources->as_array('id', 'text');
                $content->articles = $articles->as_array('id', 'value');
                $content->investigators = $investigators->as_array('id', 'name');
                $content->chars = $chars;
                $content->decrees = $decrees->as_array('id', 'text');
                $content->periods = $periods->as_array('id', 'days');
                $content->failure_causes = $failure_causes->as_array('id', 'text');

                $content->legend = "Форма редактирования материала";
                $content->sub_menus = $this->back_menu;
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для редактирования';
            $content->back_path = '/admin/material';
            $content->back_path_text = 'Вернуться назад';
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Редактирование материалов';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_delete()
    {
        $id = Request::$current->param('id');

        if(isset($id) AND $id > 0)
        {
            if(isset($_POST['id']))
            {
                $post_id = Arr::get($_POST, 'id', 0);
                $deleted_material = ORM::factory('material', $post_id);
                try
                {
                    $deleted_material->delete();
                    $content = View::factory('back/accept');
                    $content->message = 'Материал успешно удален';
                    $content->back_path = '/admin/material';
                    $content->back_path_text = 'Вернуться назад к списку материалов';
                }
                catch(Database_Exception $e)
                {
                    $content = View::factory('/back/error');
                    $content->message = "Произошла ошибка во время удаления материала: <br>".$e->getMessage();
                    $content->back_path = '/admin/material';
                    $content->back_path_text = 'Вернуться назад';
                }
            }
            else
            {
                $deleted_material = ORM::factory('material', $id);
                $content = View::factory('/back/delete');
                $content->back_path = "/admin/material";
                $content->back_path_text = "Вернуться назад";
                $content->id = $id;
                $content->delete_text =
                    "Удалить материал - "
                    .($deleted_material->krsp_num ? '№'
                    .$deleted_material->krsp_num : 'Номер не задан')
                    .' от '
                    .date('d.m.Y', strtotime($deleted_material->registration_date));
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для удаления';
            $content->back_path = '/admin/material';
            $content->back_path_text = 'Вернуться назад';
        }

        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Удаление материалов';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }

    public function action_archive()
    {
        $id = Request::$current->param('id');
        if(isset($id) AND $id > 0)
        {
            $material = ORM_Log::factory('material', $id);
            $material->archive = 1;
            try
            {
                $material->save();
                $content = View::factory('back/accept');
                $content->message = 'Материал успешно переведен в архив';
                $content->back_path = '/admin/material';
                $content->back_path_text = 'Вернуться назад к списку материалов';
            }
            catch(ORM_Validation_Exception $exp)
            {
                $content = View::factory('/back/error');
                $content->message = "Произошла ошибка во время перевода материала в архив: <br>".$exp->getMessage();
                $content->back_path = '/admin/material';
                $content->back_path_text = 'Вернуться назад';
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать материал для перевода в архив';
            $content->back_path = '/admin/material';
            $content->back_path_text = 'Вернуться назад';
        }
        $admin_view = View::factory('/back/control_panel');
        $admin_view->p_title = 'Перевод материалов в архив';
        $admin_view->content = $content;
        $this->template->body = $admin_view;
    }
}