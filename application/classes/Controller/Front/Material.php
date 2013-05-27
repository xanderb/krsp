<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front_Material extends Controller_Front
{

    public $page_title = 'Контроллер Welcome';

    protected $auth_required = 'login';

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
        $this->addScript('front');
        $this->addScript('datepicker.10.3.min');
        $this->addStyle('ui.10.3.min');
        $this->addScript('jquery.ui.datepicker-ru');

        $page = Request::$current->param('page');

        $filters = Help::render_filter_form();
        $materials = ORM_Log::factory('material')->where('archive', '=', '0');
        $materials =
            $materials
            ->add_filters($this->session->get('filters'))
            ->order_by('registration_date', 'DESC')
            ->limit($this->config->items_per_page)
            ->offset((isset($page) ? ($page-1)*$this->config->items_per_page : 0))
            ->find_all();
        $total_items = ORM_Log::factory('material')
                ->where('archive', '=', '0')
                ->add_filters($this->session->get('filters'))
                ->order_by('registration_date', 'DESC')
                ->find_all()->count();

        $materials_view = View::factory('front/materials_table');
        $materials_view->caption = "Сообщения в журнале";
        $materials_view->datas = $materials;
        $materials_view->t_headers = $this->materials_headers;

        if(ceil($total_items / $this->config->items_per_page) > 1){
            $materials_view->paginator = Help::render_paginator('material', '', $page, $total_items); //добавление постраничной навигации
        }


        $grid = View::factory('front/front_grid');
        $grid->p_title = "Электронная книга регистрации сообщений о преступлениях";
        $grid->filters = $filters;
        $grid->top_content = $materials_view;

        $this->template->body = $grid;
        $this->template->filter_button = View::factory('front/filter_button');
        $this->template->debug = Debug::vars($this->session, $materials, $total_items);
	}

}
