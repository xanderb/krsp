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
    public $today_sub_menu = array(
        array(
            'href'  => '/print/today',
            'text'  => '<i class="icon-print"></i> Распечатать',
            'type'  => 'n'
        ),
    );
    public $fail_sub_menu = array(
        array(
            'href'  => '/print/fail',
            'text'  => '<i class="icon-print"></i> Распечатать',
            'type'  => 'n'
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

    public $today_table_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text' => 'Следователь',
            'field' => 'investigator'
        ),
        array(
            'text' => 'КРСП',
            'field' => 'krsp_num'
        ),
        array(
            'text' => 'Краткая фабула',
            'field' => 'plot'
        ),
        array(
            'text' => 'Срок рассмотрения',
            'field' => 'period'
        ),
    );
    public $fail_table_headers = array(
        array(
            'text'  => 'ID',
            'field' => 'id'
        ),
        array(
            'text' => 'Следователь',
            'field' => 'investigator'
        ),
        array(
            'text' => 'КРСП',
            'field' => 'krsp_num'
        ),
        array(
            'text' => 'Краткая фабула',
            'field' => 'plot'
        ),
        array(
            'text' => 'Когда истек срок',
            'field' => 'fail_date'
        ),
        array(
            'text' => 'Срок рассмотрения',
            'field' => 'period'
        ),


    );

    public function action_index()
    {
        $this->addScript('extra-admin-table');
        $this->addScript('filters');
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');

        $filters = Model_Extra::render_filter_form('select');
        $materials = ORM_Log::factory('Material')
            ->select(array(DB::expr('COUNT(*)'), 'ecount'))
            ->join(array('extras', 'ej'), 'INNER')
            ->on('material.id', '=', 'ej.material_id')
            ->where('material.archive', '=', 0)
            ->add_sub_extra_filters('ej', $this->session->get('extra_filters'))
            ->group_by('ej.material_id')
            ->order_by('id', 'ASC')
            ->find_all();
        $extras = ORM_Log::factory('Extra')->add_filters($this->session->get('extra_filters'))->order_by('material_id', 'ASC')->order_by('decree_cancel_date', 'DESC')->find_all();
        $view = View::factory('/front/extra_view');
        $view->material_headers = $this->material_headers;
        $view->extra_headers = $this->extra_headers;
        $view->caption_material = "Сообщения";
        $view->caption_extra = "ДОПы";
        $view->materials = $materials;
        $view->extras = $extras;
        $view->sub_menus = $this->sub_menus;

        //Таблица сообщений актуальных сегодня
        $today = date('Y-m-d', time());
        $today_mess = ORM_Log::factory('Extra')
            ->join(array('periods', 'p'), 'LEFT OUTER')
            ->on('period_id', '=', 'p.id')
            ->where_open()
            ->where(DB::expr('extra.decree_cancel_date + INTERVAL p.days DAY'), '>=', $today.' 00:00:00')
            ->and_where(DB::expr('extra.decree_cancel_date + INTERVAL p.days DAY'), '<=', $today.' 23:59:59')
            ->and_where('extra.decree_date', '=', NULL)
            ->where_close()
            ->join(array('investigators', 'jt'), 'LEFT OUTER')
            ->on('extra.investigator_id', '=', 'jt.id')
            ->order_by('jt.name', 'ASC')
            ->find_all();

        $today_table = View::factory('front/short_materials');
        $today_table->sub_menus = $this->today_sub_menu;
        $today_table->datas = $today_mess;
        $today_table->t_headers = $this->today_table_headers;
        $today_table->caption = 'ДОПы срок рассмотрения которых заканчивается сегодня';
        $today_table->caption_type = 'invert';
        $today_table->total_materials = $today_mess->count();
        $today_table->type = 'extra_today';
        $today_table->badges = array(
            array(
                'text' => 'Всего актуальных сегодня ДОПов',
                'class' => 'badge-info'
            ),
        );
        //

        //Таблица просроченных сообщений
        $fail_mess = ORM_Log::factory('Extra')
            ->join(array('periods', 'p'), 'LEFT OUTER')
            ->on('period_id', '=', 'p.id')
            ->where_open()
            ->where(DB::expr('extra.decree_cancel_date + INTERVAL p.days DAY'), '<', $today.' 00:00:00')
            ->and_where('extra.decree_date', '=', NULL)
            ->where_close()
            ->join(array('investigators', 'jt'), 'LEFT OUTER')
            ->on('investigator_id', '=', 'jt.id')
            ->order_by('jt.name', 'ASC')
            ->find_all();

        $fail_table = View::factory('front/short_materials');
        $fail_table->sub_menus = $this->fail_sub_menu;
        $fail_table->datas = $fail_mess;
        $fail_table->t_headers = $this->fail_table_headers;
        $fail_table->caption = 'Просроченные ДОПы';
        $fail_table->caption_type = 'danger';
        $fail_table->total_materials = $fail_mess->count();
        $fail_table->type = 'extra_fail';
        $fail_table->badges = array(
            array(
                'text' => 'Всего просроченных ДОПов',
                'class' => 'badge-info'
            ),
        );
        //



        $grid = View::factory('front/front_grid');
        $grid->p_title = "ДОПы";
        $grid->filters = $filters;
        $grid->top_content = $view;
        $grid->left_content = $today_table;
        $grid->right_content = $fail_table;

        $filter_button = View::factory('front/filter_button');
        if(count($this->session->get('extra_filters')) > 0)
            $filter_button->success = 'success';
        $filter_button->text = "Фильтры по ДОПам";
        $this->template->filter_button = $filter_button;

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
                $deleted_extra = ORM::factory('Extra', $post_id);
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
                $deleted_extra = ORM::factory('Extra', $id);
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
        $parent_material = ORM::factory('Material')
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

            $investigators = ORM::factory('Investigator')->find_all();
            $decrees = ORM::factory('Decree')->find_all();
            $periods = ORM::factory('Period')->find_all();
            $parent_extra = ORM::factory('Extra')
                ->where('material_id', '=', $material_id)
                ->order_by('decree_cancel_date', 'DESC')
                ->offset(0)
                ->limit(1)
                ->find();
            //$this->template->debug = Debug::vars($parent_extra);
            if(isset($_POST['extra-submit']))
            {
                $new_extra = ORM_Log::factory('Extra');
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
                    $inv = ORM::factory('Investigator')->where('name', '=', $investigator_text)->find();
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

            $krsp_num_obj = ORM::factory('Material')->select('krsp_num')->distinct('krsp_num')->group_by('krsp_num')->having('krsp_num', '!=', NULL)->find_all();
            $year_obj = ORM::factory('Material')->select('work_year')->distinct('work_year')->group_by('work_year')->having('work_year', '!=', NULL)->find_all();
            $content->krsps = Help::array_to_string($krsp_num_obj->as_array(NULL, 'krsp_num'));
            $content->years = Help::array_to_string($year_obj->as_array(NULL, 'work_year'));
            $content->sub_menus = $this->back_menu;
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
            $extra = ORM::factory('Extra', $extra_id);
            $investigators = ORM::factory('Investigator')->find_all();
            $decrees = ORM::factory('Decree')->find_all();
            $periods = ORM::factory('Period')->find_all();
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
                    $inv = ORM::factory('Investigator')->where('name', '=', $investigator_text)->find();
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

    public function action_info()
    {
        $id = Request::$current->param('id', NULL);
        if(!is_null($id))
        {
            $material = ORM_Log::factory('Material', $id);
            $view = View::factory('front/info');
            $view->material = $material;
            $view->auth = $this->auth;
            $view->user = $this->user;
            $view->roles = $this->config->auth_required;

            $view->back_path = '/extra';
            $view->back_path_text = "Назад";
        }
        else
        {
            $view = View::factory('back/error');
            $view->message = "Не был указан ID сообщения для вывода";
            $view->back_path = URL::site(Request::$current->referrer());
            $view->back_path_text = "Вернуться назад";
        }
        $this->template->body = $view;
        $this->template->debug = Debug::vars(Request::$current);
    }
}