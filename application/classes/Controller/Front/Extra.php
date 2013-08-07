<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 06.08.13
 * Time: 22:11
 * To change this template use File | Settings | File Templates.
 */

class Controller_Front_Extra extends Controller_Front
{
    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
            'href' => '/extra',
            'type' => 'n'
        ),

    );

    public $sub_menus = array(
        array(
            'text'  => '<i class="icon-th-list"></i> Сообщения',
            'href'  => '/',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-plus"></i> Добавить',
            'href'  => '/extra/add',
            'type'  => 'n'
        ),
        array(
            'text'  => '<i class="icon-pencil"></i> Редактировать',
            'href'  => '/extra/edit',
            'type'  =>  'y'
        ),
        array(
            'text'  => '<i class="icon-trash"></i> Удалить',
            'href'  => '/extra/delete',
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
        /*array(
            'text' => 'Отмененный ДОП, дата',
            'field' => 'parent_extra',
        ),*/
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
            ->group_by('ej.material_id')
            ->order_by('id', 'ASC')
            ->find_all();
        $extras = ORM_Log::factory('extra')->order_by('material_id', 'ASC')->order_by('decree_cancel_date', 'DESC')->find_all();
        $view = View::factory('/front/extra_view');
        $view->material_headers = $this->material_headers;
        $view->extra_headers = $this->extra_headers;
        $view->caption_material = "Сообщения";
        $view->caption_extra = "ДОПы";
        $view->materials = $materials;
        $view->extras = $extras;
        $view->sub_menus = $this->sub_menus;

        $grid = View::factory('front/front_grid');
        $grid->p_title = "ДОПы";
        //$grid->filters = $filters;
        $grid->top_content = $view;
        /*$grid->left_content = $today_table;
        $grid->right_content = $fail_table;*/

        $this->template->body = $grid;

    }
    public function action_delete()
    {
        $id = Request::$current->param('id');

        if(isset($id) AND $id > 0)
        {
            if(isset($_POST['id']))
            {
                $post_id = Arr::get($_POST, 'id', 0);
                $deleted_extra = ORM::factory('extra', $post_id);
                try
                {
                    $deleted_extra->delete();
                    $content = View::factory('back/accept');
                    $content->message = 'ДОП успешно удален';
                    $content->back_path = '/extra';
                    $content->back_path_text = 'Вернуться к ДОПам';
                }
                catch(Database_Exception $e)
                {
                    $content = View::factory('/back/error');
                    $content->message = "Произошла ошибка во время удаления ДОПа: <br>".$e->getMessage();
                    $content->back_path = '/extra';
                    $content->back_path_text = 'Вернуться назад';
                }
            }
            else
            {
                $deleted_extra = ORM::factory('extra', $id);
                $content = View::factory('/back/delete');
                $content->back_path = "/extra";
                $content->back_path_text = "Вернуться назад";
                $content->id = $id;
                $content->delete_text =
                    "Удалить ДОП сообщения №".(isset($deleted_extra->material->krsp_num) ? $deleted_extra->material->krsp_num : ' не задан')
                    .' с датой отмены решения: '
                    .date('d.m.Y', strtotime($deleted_extra->decree_cancel_date));
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать строку для удаления';
            $content->back_path = '/admin/extra';
            $content->back_path_text = 'Вернуться назад';
        }

        $grid = View::factory('front/front_grid');
        $grid->p_title = "Удаление ДОПа";
        $grid->top_content = $content;

        $this->template->body = $grid;
    }

    public function action_add()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('jui-plug');
        $this->addScript('extra-admin-table');

        //Получаем параметры из адреса
        $krsp_num = Request::$current->param('krsp', NULL);
        $year = Request::$current->param('year', NULL);
        //Ищем материал с введеными параметрами
        $parent_material = ORM::factory('material')
            ->where('krsp_num', '=', $krsp_num)
            ->and_where('work_year', '=', $year)
            ->and_where('archive', '=', 0)
            ->offset(0)
            ->limit(1)
            ->find();

        if(!is_null($krsp_num) AND !is_null($year) AND is_null($parent_material->id))
        {
            //если материала нет, то не задаем material_id и пишем ошибку
            $material_id = NULL;
            $wrap_error = 'Сообщения с введенными значениями не было найдено';
        }
        else
        {
            //если материал есть, задаем его id как material_id
            $material_id = $parent_material->id;
        }
        $this->template->debug = Debug::vars($krsp_num, $year, $parent_material);
        if(isset($material_id) AND !is_null($material_id))
        {

            $investigators = ORM::factory('investigator')->find_all();
            $decrees = ORM::factory('decree')->find_all();
            $periods = ORM::factory('period')->find_all();
            $parent_extra = ORM::factory('extra')
                ->where('material_id', '=', $material_id)
                ->order_by('decree_cancel_date', 'DESC')
                ->offset(0)
                ->limit(1)
                ->find();
            //$this->template->debug = Debug::vars($parent_extra);
            if(isset($_POST['extra-submit']))
            {
                $new_extra = ORM_Log::factory('extra');
                $new_extra->values(
                    array(
                        'material_id'       => Arr::get($_POST, 'material_id', NULL) == '' ? NULL : Arr::get($_POST, 'material_id', NULL),
                        'parent_extra_id'   => Arr::get($_POST, 'parent_extra_id', NULL) == '' ? NULL : Arr::get($_POST, 'parent_extra_id', NULL),
                        'period_id'         => Arr::get($_POST, 'period_id', NULL) == '' ? NULL : Arr::get($_POST, 'period_id', NULL),
                        'decree_id'         => Arr::get($_POST, 'decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'decree_id', NULL),
                        'user_id'           => $this->user->id,
                    )
                );

                $investigator_text = Arr::get($_POST, 'investigator_id', NULL);
                if(!is_null($investigator_text))
                {
                    $inv = ORM::factory('investigator')->where('name', '=', $investigator_text)->find();
                    $new_extra->investigator_id = $inv->id;
                }

                if(Arr::get($_POST, 'decree_date', NULL) != ''){
                    $new_extra->decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_date', NULL));
                }
                if(Arr::get($_POST, 'decree_cancel_date', NULL) != ''){
                    $new_extra->decree_cancel_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_cancel_date', NULL));
                }
                $new_extra->add_date = date('Y-m-d H:i:s', time());
                try
                {
                    $new_extra->save();
                    $content = View::factory('/back/accept');
                    $content->message = 'Новый ДОП успешно добавлен';
                    $content->back_path = '/extra';
                    $content->back_path_text = 'Вернуться назад';
                }
                catch(ORM_Validation_Exception $e)
                {
                    $content = View::factory('/front/edit_extra');

                    $content->extra = $new_extra;
                    $content->material_id = $material_id;
                    $content->sub_menus = $this->back_menu;
                    $content->legend = "Добавление ДОПа";
                    $content->parent_extra_id = $parent_extra->id;
                    $content->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                    $content->decrees = $decrees->as_array('id', 'text');
                    $content->periods = $periods->as_array('id', 'days');
                    $content->error = $e->errors('validation');
                }
            }
            else
            {
                $content = View::factory('/front/edit_extra');
                $content->material_id = $material_id;
                $content->sub_menus = $this->back_menu;
                $content->legend = "Добавление ДОПа";
                $content->parent_extra_id = $parent_extra->id;
                $content->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                $content->decrees = $decrees->as_array('id', 'text');
                $content->periods = $periods->as_array('id', 'days');


            }
        }
        else
        {
            $this->addScript('extra-wrapper');
            $content = View::factory('/front/extra_wrapper');
            if(isset($wrap_error))
                $content->error = $wrap_error;

            $krsp_num_obj = ORM::factory('material')->select('krsp_num')->distinct('krsp_num')->group_by('krsp_num')->having('krsp_num', '!=', NULL)->find_all();
            $year_obj = ORM::factory('material')->select('work_year')->distinct('work_year')->group_by('work_year')->having('work_year', '!=', NULL)->find_all();
            $content->krsps = Help::array_to_string($krsp_num_obj->as_array(NULL, 'krsp_num'));
            $content->years = Help::array_to_string($year_obj->as_array(NULL, 'work_year'));
        }

        $grid = View::factory('/front/front_grid');
        $grid->p_title = "Добавление ДОПа";
        $grid->admin_menus = $this->back_menu;
        $grid->top_content = $content;

        $this->template->body = $grid;
    }

    public function action_edit()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('jui-plug');
        $this->addScript('extra-admin-table');
        $extra_id = Request::$current->param('id');
        if(isset($extra_id) AND $extra_id > 0)
        {
            $extra = ORM::factory('extra', $extra_id);
            $investigators = ORM::factory('investigator')->find_all();
            $decrees = ORM::factory('decree')->find_all();
            $periods = ORM::factory('period')->find_all();
            if(isset($_POST['extra-submit']))
            {
                $extra->values(
                    array(
                        'material_id'       => Arr::get($_POST, 'material_id', NULL) == '' ? NULL : Arr::get($_POST, 'material_id', NULL),
                        'parent_extra_id'   => Arr::get($_POST, 'parent_extra_id', NULL) == '' ? NULL : Arr::get($_POST, 'parent_extra_id', NULL),
                        'period_id'         => Arr::get($_POST, 'period_id', NULL) == '' ? NULL : Arr::get($_POST, 'period_id', NULL),
                        'decree_id'         => Arr::get($_POST, 'decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'decree_id', NULL),
                    )
                );

                $investigator_text = Arr::get($_POST, 'investigator_id', NULL);
                if(!is_null($investigator_text))
                {
                    $inv = ORM::factory('investigator')->where('name', '=', $investigator_text)->find();
                    $extra->investigator_id = $inv->id;
                }

                if(Arr::get($_POST, 'decree_date', NULL) != ''){
                    $extra->decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_date', NULL));
                }
                if(Arr::get($_POST, 'decree_cancel_date', NULL) != ''){
                    $extra->decree_cancel_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_cancel_date', NULL));
                }

                try
                {
                    $extra->save();
                    $content = View::factory('/back/accept');
                    $content->message = 'ДОП успешно изменен';
                    $content->back_path = '/extra';
                    $content->back_path_text = 'Вернуться назад';
                }
                catch(ORM_Validation_Exception $e)
                {
                    $content = View::factory('/front/edit_extra');
                    $content->material_id = $extra->material->id;
                    $content->sub_menus = $this->back_menu;
                    $content->legend = "Редактирование ДОПа";

                    $content->parent_extra_id = $extra->parent->id;

                    $content->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                    $content->decrees = $decrees->as_array('id', 'text');
                    $content->periods = $periods->as_array('id', 'days');
                    $content->extra = $extra;
                    $content->error = $e->errors('validation');
                }
            }
            else
            {
                $content = View::factory('/front/edit_extra');
                $content->material_id = $extra->material->id;
                $content->sub_menus = $this->back_menu;
                $content->legend = "Редактирование ДОПа";

                $content->parent_extra_id = $extra->parent->id;

                $content->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                $content->decrees = $decrees->as_array('id', 'text');
                $content->periods = $periods->as_array('id', 'days');
                $content->extra = $extra;
            }
        }
        else
        {
            $content = View::factory('/back/error');
            $content->message = 'Необходимо выбрать ДОП для редактирования';
            $content->back_path = '/extra';
            $content->back_path_text = 'Вернуться назад';
        }

        $grid = View::factory('/front/front_grid');
        $grid->p_title = "Изменение ДОПа";
        $grid->admin_menus = $this->back_menu;
        $grid->top_content = $content;

        $this->template->body = $grid;
    }
}