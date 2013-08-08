<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front_Material extends Controller_Front
{

    public $page_title = 'Контроллер Welcome';

    protected $auth_required = 'login';

    public $badges = array(
        array(
            'text' => 'Всего сообщений',
            'class' => 'badge-info',
        ),
    );

    public $sub_menu = array(
        array(
            'href'  => '/material/add',
            'text'  => 'Добавить сообщение',
            'type'  => 'n',
            'tooltip' => 'tt',
            'title' => 'Регистрация нового сообщения'
        ),
        array(
            'href'  => '/extra/',
            'text'  => 'ДОПы',
            'type'  => 'n',
            'class' => 'btn-inverse',
            'tooltip' => 'tt',
            'title' => 'ДОПы сообщений'
        ),
        array(
            'href'  => '/filter/decree_date/null',
            'text'  => 'В производстве',
            'type'  => 'n',
            'tooltip' => 'tt',
            'title' => 'Сообщения находящиеся в производстве у следователей'
        ),
        array(
            'href'  => '/archive/',
            'text'  => 'Архив сообщений',
            'type'  => 'n',
            'class' => 'btn-inverse',
            'tooltip' => 'tt',
            'title' => 'Архивные сообщения'
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

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться на главную',
            'href' => '/',
            'type' => 'n'
        ),

    );

    public $materials_headers = array(
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
            'field' => 'characteristic',
        ),
        /*array(
            'text' => 'Решение',
            'field' => 'decree'
        ),*/
        array(
            'text' => 'Дата принятия решения',
            'field' => 'decree_date'
        ),
        array(
            'text' => 'Срок рассмотрения',
            'field' => 'period'
        ),
        /*array(
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
        ),*/
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
        $this->addScript('front');
        $this->addScript('filters');
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');

        $page = Request::$current->param('page');

        $filters = Model_Material::render_filter_form('select');
        $sort = $this->session->get('sort');

        $materials = ORM_Log::factory('material')->where('archive', '=', '0');
        $materials =
            $materials
            ->add_filters($this->session->get('filters'))
            ->add_sort(isset($sort['materials']) ? $sort['materials'] : NULL)
            //->limit($this->config->items_per_page)
            //->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $total_items = ORM_Log::factory('material')
            ->where('archive', '=', '0')
            ->add_filters($this->session->get('filters'))
            ->add_sort(isset($sort['materials']) ? $sort['materials'] : NULL)
            ->find_all()->count();

        $materials_view = View::factory('front/materials_table');
        $materials_view->caption = "Сообщения в книге";
        $materials_view->datas = $materials;
        $materials_view->t_headers = $this->materials_headers;
        $materials_view->total_materials = $total_items;
        $materials_view->badges = $this->badges;
        $materials_view->sort = isset($sort['materials']) ? $sort['materials'] : array();
        if($this->auth->logged_in($this->config->auth_required['front_add']) OR $this->auth->logged_in($this->config->auth_required['admin']))
        {
            $materials_view->sub_menus = $this->sub_menu;
        }


        if(ceil($total_items / $this->config->items_per_page) > 1){
            //$materials_view->paginator = Help::render_paginator('material', '', $page, $total_items); //добавление постраничной навигации
        }

        //Таблица сообщений актуальных сегодня
        $today = date('Y-m-d', time());
        $today_mess = ORM_Log::factory('material')
            ->join(array('periods', 'p'), 'LEFT OUTER')
            ->on('period_id', '=', 'p.id')
            ->join( array('periods', 'ep'), 'LEFT OUTER')
            ->on('extra_period_id', '=', 'ep.id')
            ->where_open()
                ->where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '>=', $today.' 00:00:00')
                ->and_where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '<=', $today.' 23:59:59')
                ->and_where('decree_id', '=', NULL)
            ->where_close()
            ->or_where_open()
                ->where('failure_cause_id', '!=', NULL)
                ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '>=', $today.' 00:00:00')
                ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '<=', $today.' 23:59:59')
                ->and_where('extra_decree_id', '=', NULL)
            ->or_where_close()
            ->join(array('investigators', 'jt'), 'LEFT OUTER')
            ->on('investigator_id', '=', 'jt.id')
            ->order_by('jt.name', 'ASC')
            ->find_all();
        /*$today_mess = DB::query(
            Database::SELECT,
            "SELECT m.*
              FROM `materials` as m
                  INNER JOIN `periods` AS p ON m.period_id = p.id
                  WHERE
                  m.registration_date + INTERVAL p.days DAY >= '{$today} 00:00:00'
                  AND m.registration_date + INTERVAL p.days DAY <= '{$today} 23:59:59'")->execute();*/

        $today_table = View::factory('front/short_materials');
        $today_table->sub_menus = $this->today_sub_menu;
        $today_table->datas = $today_mess;
        $today_table->t_headers = $this->today_table_headers;
        $today_table->caption = 'Сообщения срок рассмотрения которых заканчивается сегодня';
        $today_table->caption_type = 'invert';
        $today_table->total_materials = $today_mess->count();
        $today_table->type = 'today';
        $today_table->badges = array(
            array(
                'text' => 'Всего актуальных сегодня сообщений',
                'class' => 'badge-info'
            ),
        );
        //

        //Таблица просроченных сообщений
        $fail_mess = ORM_Log::factory('material')
            ->join(array('periods', 'p'), 'LEFT OUTER')
            ->on('period_id', '=', 'p.id')
            ->join( array('periods', 'ep'), 'LEFT OUTER')
            ->on('extra_period_id', '=', 'ep.id')
            ->where_open()
                ->where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '<', $today.' 00:00:00')
                ->and_where('decree_date', '=', NULL)
            ->where_close()
            ->or_where_open()
                ->where('failure_cause_id', '!=', NULL)
                ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '<', $today.' 00:00:00')
                ->and_where('extra_decree_date', '=', NULL)
            ->or_where_close()
            ->join(array('investigators', 'jt'), 'LEFT OUTER')
            ->on('investigator_id', '=', 'jt.id')
            ->order_by('jt.name', 'ASC')
            ->find_all();
        /*$today_mess = DB::query(
            Database::SELECT,
            "SELECT m.*
              FROM `materials` as m
                  INNER JOIN `periods` AS p ON m.period_id = p.id
                  WHERE
                  m.registration_date + INTERVAL p.days DAY >= '{$today} 00:00:00'
                  AND m.registration_date + INTERVAL p.days DAY <= '{$today} 23:59:59'")->execute();*/

        $fail_table = View::factory('front/short_materials');
        $fail_table->sub_menus = $this->fail_sub_menu;
        $fail_table->datas = $fail_mess;
        $fail_table->t_headers = $this->fail_table_headers;
        $fail_table->caption = 'Просроченные сообщения';
        $fail_table->caption_type = 'danger';
        $fail_table->total_materials = $fail_mess->count();
        $fail_table->type = 'fail';
        $fail_table->badges = array(
            array(
                'text' => 'Всего просроченных сообщений',
                'class' => 'badge-info'
            ),
        );
        //


        $grid = View::factory('front/front_grid');
        $grid->p_title = "Электронная книга регистрации сообщений о преступлениях";
        $grid->filters = $filters;
        $grid->top_content = $materials_view;
        $grid->left_content = $today_table;
        $grid->right_content = $fail_table;

        $this->template->body = $grid;
        $filter_button = View::factory('front/filter_button');
        if(count($this->session->get('filters')) > 0)
            $filter_button->success = 'success';
        $this->template->filter_button = $filter_button;
        $this->template->debug = Debug::vars($this->session, Request::$current->referrer());
	}

    public function action_info()
    {
        $id = Request::$current->param('id', NULL);
        if(!is_null($id))
        {
            $material = ORM_Log::factory('material', $id);
            $view = View::factory('front/info');
            $view->material = $material;
            $view->auth = $this->auth;
            $view->user = $this->user;
            $view->roles = $this->config->auth_required;
            $view->back_path = '/';
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
        $this->template->debug = Debug::vars(URL::site(Request::$current->referrer()));
    }

    public function action_add()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('material-form');

        if($this->auth->logged_in($this->config->auth_required['front_add']) OR $this->auth->logged_in($this->config->auth_required['admin']))
        {
            //Получение списков для формы
            $sources = ORM::factory('source')->find_all();
            //$articles = ORM::factory('article')->find_all();
            $investigators = ORM::factory('investigator')->find_all();
            $chars = ORM::factory('characteristic')->find_all();
            $decrees = ORM::factory('decree')->find_all();
            $periods = ORM::factory('period')->find_all();
            $failure_causes = ORM::factory('fcause')->find_all();
            //***//

            if(isset($_POST['submit']))
            {
                $new_material = ORM_Log::factory('material');
                $new_material->values(
                    array(
                        'krsp_num' => (Arr::get($_POST, 'krsp_num', NULL) == '' ? NULL : Arr::get($_POST, 'krsp_num', NULL)),
                        //'source_id' => (Arr::get($_POST, 'source_id', NULL) == '' ? NULL : Arr::get($_POST, 'source_id', NULL)),
                        'plot' => (Arr::get($_POST, 'plot', NULL) == '' ? NULL : Arr::get($_POST, 'plot', NULL)),
                        'article_id' => (Arr::get($_POST, 'article_id', NULL) == '' ? NULL : Arr::get($_POST, 'article_id', NULL)),
                        //'investigator_id' => (Arr::get($_POST, 'investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'investigator_id', NULL)),
                        'decree_id' => (Arr::get($_POST, 'decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'decree_id', NULL)),
                        'period_id' => (Arr::get($_POST, 'period_id', NULL) == '' ? NULL : Arr::get($_POST, 'period_id', NULL)),
                        'failure_cause_id' => (Arr::get($_POST, 'failure_cause_id', NULL) == '' ? NULL : Arr::get($_POST, 'failure_cause_id', NULL)),
                        'extra_investigator_id' => (Arr::get($_POST, 'extra_investigator_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_investigator_id', NULL)),
                        'extra_period_id' => (Arr::get($_POST, 'extra_period_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_period_id', NULL)),
                        'extra_decree_id' => (Arr::get($_POST, 'extra_decree_id', NULL) == '' ? NULL : Arr::get($_POST, 'extra_decree_id', NULL)),
                        'user_id' => $this->user->id,
                    )
                );
                /*Отдельная выборка значений для полей с автодополнением*/
                $source_text = Arr::get($_POST, 'source_id', NULL);
                if(!is_null($source_text))
                {
                    $source = ORM::factory('source')->where('text', '=', $source_text)->find();
                    $new_material->source_id = $source->id;
                }

                $investigator_text = Arr::get($_POST, 'investigator_id', NULL);
                if(!is_null($investigator_text))
                {
                    $inv = ORM::factory('investigator')->where('name', '=', $investigator_text)->find();
                    $new_material->investigator_id = $inv->id;
                }

                //***********************************************************//

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
                $new_material->add_date = date('Y-m-d H:i:s', time()); //Время добавления записи

                $chars_array = Arr::get($_POST, 'chars', NULL);

                $new_material->set_work_year();
                try
                {
                    $new_material->save();
                    if(count($chars_array) > 0)
                        $new_material->add('characteristic', $chars_array);

                    $content = View::factory('/back/accept');
                    $content->message = 'Новая запись успешно добавлена';
                    $content->back_path = '/';
                    $content->back_path_text = 'Вернуться назад';
                }
                catch(ORM_Validation_Exception $exc)
                {
                    $material_form = View::factory('/front/edit_material');
                    $material_form->material = $new_material;

                    $material_form->sources = $sources->as_array('id', 'text');
                    $material_form->sources_text = Help::array_to_string($sources->as_array('id', 'text'));
                    //$material_form->articles = $articles->as_array('id', 'value');
                    $material_form->investigators = $investigators->as_array('id', 'name');
                    $material_form->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                    $material_form->chars = $chars;
                    $material_form->decrees = $decrees->as_array('id', 'text');
                    $material_form->periods = $periods->as_array('id', 'days');
                    $material_form->failure_causes = $failure_causes->as_array('id', 'text');

                    $material_form->legend = "Форма создания сообщения";
                    $material_form->sub_menus = $this->back_menu;
                    $material_form->error = $exc->errors('validation');
                    $content = $material_form;
                }
            }
            else
            {
                $material_form = View::factory('/front/edit_material');

                $material_form->sources = $sources->as_array('id', 'text');
                $material_form->sources_text = Help::array_to_string($sources->as_array('id', 'text'));
                //$material_form->articles = $articles->as_array('id', 'value');
                $material_form->investigators = $investigators->as_array('id', 'name');
                $material_form->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                $material_form->chars = $chars;
                $material_form->decrees = $decrees->as_array('id', 'text');
                $material_form->periods = $periods->as_array('id', 'days');
                $material_form->failure_causes = $failure_causes->as_array('id', 'text');

                $material_form->legend = "Форма создания сообщения";
                $material_form->sub_menus = $this->back_menu;
                $content = $material_form;
            }
        }
        else
        {
            $content = View::factory('back/error');
            $content->message = "У Вас нет прав на добавление нового сообщения";
            $content->back_path = '/';
            $content->back_path_text = "Вернуться назад";
        }

        $content->page_header = "Добавление сообщения";
        $this->template->body = $content;
    }

    public function action_edit()
    {
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');
        $this->addScript('material-form');

        $auth_required = $this->config->auth_required['front_edit'];
        $id = Request::$current->param('id', NULL);
        if(is_null($id) OR $id < 1)
        {
            $view = View::factory('back/error');
            $view->message = "Не указано сообщение для редактирования";
            $view->back_path = '/';
            $view->back_path_text = "Вернуться назад";
        }
        else
        {
            if($this->auth->logged_in($auth_required) OR $this->auth->logged_in($this->config->auth_required['admin']))
            {
                $material = ORM_Log::factory('material', $id);
                //Получение списков для формы
                $sources = ORM::factory('source')->find_all();
                //$articles = ORM::factory('article')->find_all();
                $investigators = ORM::factory('investigator')->find_all();
                $chars = ORM::factory('characteristic')->find_all();
                $decrees = ORM::factory('decree')->find_all();
                $periods = ORM::factory('period')->find_all();
                $failure_causes = ORM::factory('fcause')->find_all();
                //***//
                if(isset($_POST['submit']))
                {
                    $post_values = array(
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
                    );
                    foreach($post_values as $key => $value)
                    {
                        if(is_null($value))
                        {
                            unset($post_values[$key]);
                        }
                    }
                    $material->values($post_values);
                    /*Отдельная выборка значений для полей с автодополнением*/
                    $source_text = Arr::get($_POST, 'source_id', NULL);
                    if(!is_null($source_text))
                    {
                        $source = ORM::factory('source')->where('text', '=', $source_text)->find();
                        $material->source_id = $source->id;
                    }

                    $investigator_text = Arr::get($_POST, 'investigator_id', NULL);
                    if(!is_null($investigator_text))
                    {
                        $inv = ORM::factory('investigator')->where('name', '=', $investigator_text)->find();
                        $material->investigator_id = $inv->id;
                    }
                    //***********************************************************//
                    if(Arr::get($_POST, 'registration_date', NULL) != ''){
                        $material->registration_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'registration_date', NULL));
                    }
                    if(Arr::get($_POST, 'decree_date', NULL) != ''){
                        $material->decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_date', NULL));
                    }
                    if(Arr::get($_POST, 'decree_cancel_date', NULL) != ''){
                        $material->decree_cancel_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'decree_cancel_date', NULL));
                    }
                    if(Arr::get($_POST, 'extra_decree_date', NULL) != ''){
                        $material->extra_decree_date = Help::datepicker_to_timestamp(Arr::get($_POST, 'extra_decree_date', NULL));
                    }

                    $chars_array = Arr::get($_POST, 'chars', NULL);

                    $material->set_work_year();
                    try
                    {
                        $material->save();
                        if(!is_null($chars_array))
                        {
                            $material->remove('characteristic');
                            if(count($chars_array) > 0)
                                $material->add('characteristic', $chars_array);
                        }


                        $view = View::factory('/back/accept');
                        $view->message = 'Запись успешно изменена';
                        $view->back_path = '/material/info/'.$id;
                        $view->back_path_text = 'Вернуться назад';
                    }
                    catch(ORM_Validation_Exception $exc)
                    {
                        $view = View::factory('/front/edit_material');
                        $view->material = $material;

                        $view->sources = $sources->as_array('id', 'text');
                        $view->sources_text = Help::array_to_string($sources->as_array('id', 'text'));
                        //$view->articles = $articles->as_array('id', 'value');
                        $view->investigators = $investigators->as_array('id', 'name');
                        $view->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                        $view->chars = $chars;
                        $view->decrees = $decrees->as_array('id', 'text');
                        $view->periods = $periods->as_array('id', 'days');
                        $view->failure_causes = $failure_causes->as_array('id', 'text');

                        $view->legend = "Форма редактирования материала";
                        $view->sub_menus = Help::real_back_path_menu();
                        $view->error = $exc->errors('validation');
                    }
                }
                else
                {
                    $view = View::factory('/front/edit_material');
                    $view->material = $material;
                    $view->sources = $sources->as_array('id', 'text');
                    $view->sources_text = Help::array_to_string($sources->as_array('id', 'text'));
                    //$view->articles = $articles->as_array('id', 'value');
                    $view->investigators = $investigators->as_array('id', 'name');
                    $view->inv_text = Help::array_to_string($investigators->as_array('id', 'name'));
                    $view->chars = $chars;
                    $view->decrees = $decrees->as_array('id', 'text');
                    $view->periods = $periods->as_array('id', 'days');
                    $view->failure_causes = $failure_causes->as_array('id', 'text');

                    $view->legend = "Форма редактирования материала";
                    $view->sub_menus = Help::real_back_path_menu();
                }
            }
            else
            {
                $view = View::factory('back/error');
                $view->message = "У Вас нет прав на редактирование сообщения";
                $view->back_path = '/material/info/'.$id;
                $view->back_path_text = "Вернуться назад";
            }
        }


        $this->template->body = $view;
        $this->template->debug = Debug::vars(isset($post_values) ? $post_values : NULL);
    }

    public function action_print()
    {
        $type = Request::$current->param('type');
        if(isset($type))
        {
            $view = View::factory('front/print_table');
            $today = date('Y-m-d', time());
            switch($type){
                case 'today':
                    $data = ORM_Log::factory('material')
                        ->join(array('periods', 'p'), 'LEFT OUTER')
                        ->on('period_id', '=', 'p.id')
                        ->join( array('periods', 'ep'), 'LEFT OUTER')
                        ->on('extra_period_id', '=', 'ep.id')
                        ->where_open()
                        ->where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '>=', $today.' 00:00:00')
                        ->and_where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '<=', $today.' 23:59:59')
                        ->and_where('decree_id', '=', NULL)
                        ->where_close()
                        ->or_where_open()
                        ->where('failure_cause_id', '!=', NULL)
                        ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '>=', $today.' 00:00:00')
                        ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '<=', $today.' 23:59:59')
                        ->and_where('extra_decree_id', '=', NULL)
                        ->or_where_close()
                        ->join(array('investigators', 'jt'), 'LEFT OUTER')
                        ->on('investigator_id', '=', 'jt.id')
                        ->order_by('jt.name', 'ASC')
                        ->find_all();
                    $view->datas = $data;
                    $view->t_headers = $this->today_table_headers;
                    break;
                case 'fail':
                    $data = ORM_Log::factory('material')
                        ->join(array('periods', 'p'), 'LEFT OUTER')
                        ->on('period_id', '=', 'p.id')
                        ->join( array('periods', 'ep'), 'LEFT OUTER')
                        ->on('extra_period_id', '=', 'ep.id')
                        ->where_open()
                        ->where(DB::expr('material.registration_date + INTERVAL p.days DAY'), '<', $today.' 00:00:00')
                        ->and_where('decree_id', '=', NULL)
                        ->where_close()
                        ->or_where_open()
                        ->where('failure_cause_id', '!=', NULL)
                        ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '<', $today.' 00:00:00')
                        ->and_where('extra_decree_id', '=', NULL)
                        ->or_where_close()
                        ->join(array('investigators', 'jt'), 'LEFT OUTER')
                        ->on('investigator_id', '=', 'jt.id')
                        ->order_by('jt.name', 'ASC')
                        ->find_all();
                    $view->datas = $data;
                    $view->t_headers = $this->fail_table_headers;
                    break;
                default:
                    Controller::redirect('');
            }
            $view->type = $type;
            $this->template->body = $view;
        }
        else
        {
            Controller::redirect('');
        }

    }

}
