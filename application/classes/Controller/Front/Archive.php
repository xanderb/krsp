<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 07.07.13
 * Time: 13:11
 * To change this template use File | Settings | File Templates.
 */
class Controller_Front_Archive extends Controller_Front
{
    public $page_title = 'Архив сообщений';

    protected $auth_required = 'login';

    public $badges = array(
        array(
            'text' => 'Всего сообщений в архиве',
            'class' => 'badge-info',
        ),
    );

    public $back_menu = array(
        array(
            'text' => '<i class="icon-arrow-left"></i> Вернуться на главную',
            'href' => '/',
            'type' => 'n'
        ),

    );

    public $sub_menu = array(
        array(
            'href'  => '/',
            'text'  => '<i class="icon-th-list"></i> Сообщения',
            'type'  => 'n'
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
            'field' => 'characteristic'
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

    public function action_index()
    {
        $this->addScript('front');
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');

        $page = Request::$current->param('page');

        $filters = Model_Archive::render_filter_form('select');
        $sort = $this->session->get('sort');

        $materials = ORM_Log::factory('material')->where('archive', '=', '1');
        $materials =
            $materials
                ->add_filters($this->session->get('archive_filters'))
                ->add_sort(isset($sort['materials']) ? $sort['materials'] : NULL)
                //->limit($this->config->items_per_page)
                //->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
                ->find_all();
        $total_items = ORM_Log::factory('material')
            ->where('archive', '=', '1')
            ->add_filters($this->session->get('archive_filters'))
            ->add_sort(isset($sort['materials']) ? $sort['materials'] : NULL)
            ->find_all()->count();

        $materials_view = View::factory('front/materials_table');
        $materials_view->caption = "Сообщения в журнале";
        $materials_view->datas = $materials;
        $materials_view->t_headers = $this->materials_headers;
        $materials_view->total_materials = $total_items;
        $materials_view->badges = $this->badges;
        $materials_view->sort = isset($sort['materials']) ? $sort['materials'] : array();

        $materials_view->sub_menus = $this->sub_menu;




        /*if(ceil($total_items / $this->config->items_per_page) > 1){
            $materials_view->paginator = Help::render_paginator('material', '', $page, $total_items); //добавление постраничной навигации
        }*/

        //Таблица сообщений актуальных сегодня
        /*$today = date('Y-m-d', time());
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
            ->find_all();


        $today_table = View::factory('front/short_materials');
        $today_table->datas = $today_mess;
        $today_table->t_headers = $this->today_table_headers;
        $today_table->caption = 'Сообщения срок рассмотрения которых заканчивается сегодня';
        $today_table->caption_type = 'invert';
        $today_table->total_materials = $today_mess->count();
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
            ->and_where('decree_id', '=', NULL)
            ->where_close()
            ->or_where_open()
            ->where('failure_cause_id', '!=', NULL)
            ->and_where(DB::expr('material.decree_cancel_date + INTERVAL ep.days DAY'), '<', $today.' 00:00:00')
            ->and_where('extra_decree_id', '=', NULL)
            ->or_where_close()
            ->find_all();


        $fail_table = View::factory('front/short_materials');
        $fail_table->datas = $fail_mess;
        $fail_table->t_headers = $this->today_table_headers;
        $fail_table->caption = 'Просроченные сообщения';
        $fail_table->caption_type = 'danger';
        $fail_table->total_materials = $fail_mess->count();
        $fail_table->badges = array(
            array(
                'text' => 'Всего просроченных сообщений',
                'class' => 'badge-info'
            ),
        );
        //
*/

        $grid = View::factory('front/front_grid');
        $grid->p_title = $this->page_title;
        $grid->filters = $filters;
        $grid->top_content = $materials_view;
       /* $grid->left_content = $today_table;
        $grid->right_content = $fail_table;*/

        $this->template->body = $grid;
        $this->template->filter_button = View::factory('front/filter_button');
        if(count($this->session->get('archive_filters')) > 0)
            $this->template->filter_button->success = TRUE;

        $this->template->debug = Debug::vars($this->session);
    }


}