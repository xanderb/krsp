<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 18:44
 * To change this template use File | Settings | File Templates.
 */

class Model_Material extends ORM_Log
{
    protected $_table_name = 'materials';

    protected $_belongs_to = array(
        'source'            => array(
            'model'         => 'source',
            'foreign_key'   => 'source_id'
        ),
        'inv'      => array(
            'model'         => 'investigator',
            'foreign_key'   => 'investigator_id'
        ),
        'failure_cause'     => array(
            'model'         => 'fcause',
            'foreign_key'   => 'failure_cause_id'
        ),
        'period'            => array(
            'model'         => 'period',
            'foreign_key'   => 'period_id'
        ),

        'decree'            => array(
            'model'         => 'decree',
            'foreign_key'   => 'decree_id'
        ),

        'user'              => array(
            'model'         => 'user',
            'foreign_key'   => 'user_id'
        ),

    );

    public static $t_headers = array(
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

    );

    protected $_has_many = array(
        'characteristic'         => array(
            'model'         => 'characteristic',
            'through'       => 'materials_characteristics'
        ),
        'extra'     => array(
            'model'         => 'extra',
            'foreign_key'   => 'material_id'
        ),
    );

    public $order_field_far_tables = array(
        'sources' => 'text',
        'articles' => 'value',
        'investigators' => 'name',
        'decrees'   => 'text',
        'periods'   => 'days',
        'failure_causes' => 'text'
    );

    public function rules()
    {
        return array(
            'krsp_num'  => array(
                array('digit')
            ),
            'registration_date' => array(
                array('date')
            ),
            'period_id' => array(
                array('not_empty')
            ),
            'plot'  => array(
                array('not_empty')
            ),
            'decree_date'   => array(
                array('date')
            ),
            'decree_cancel_date'   => array(
                array('date')
            ),
            'extra_decree_date'   => array(
                array('date')
            ),
        );
    }

    public function labels()
    {
        return array(
            'krsp_num'              => 'Номер КРСП',
            'registration_date'     => 'Дата регистрации материалов',
            'source_id'             => 'Источник сообщения',
            'plot'                  => 'Краткая фабула',
            'article_id'            => 'Статья',
            'investigator_id'       => 'Следователь',
            'decree_id'             => 'Решение по материалам',
            'decree_date'           => 'Дата вынесения решения',
            'period_id'             => 'Срок рассмотрения',
            'failure_cause_id'      => 'Причина для отказа',
            'decree_cancel_date'    => 'Дата отмены решения',
            'extra_investigator_id' => '(ДОП) Следователь',
            'extra_period_id'       => '(ДОП) Срок рассмотрения',
            'extra_decree_id'       => '(ДОП) Решение',
            'extra_decree_date'     => '(ДОП) Дата принятия решения',
            'characteristic'        => 'Характеристики',
            'user'                  => 'Автор сообщения',
        );
    }

    public static function render_table()
    {
        $materials = ORM_Log::factory('Material')
            ->where('archive', '=', 0)
            ->order_by('id', 'DESC')
            ->limit(10)
            ->find_all();
        $content = View::factory('/back/materials_table');
        $content->t_headers = Model_Material::$t_headers;
        $content->caption = "10 послених материалов";
        $content->datas = $materials;

        return $content;
    }

    public function add_filters($filters = NULL)
    {
        if(isset($filters) AND is_array($filters))
        {
            foreach($filters as $key => $values)
            {
                switch($key)
                {
                    case 'krsp_num':
                        if(is_array($values))
                            $this->and_where('krsp_num', '=', $values[0]);
                        else
                            $this->and_where('krsp_num', '=', NULL);
                        break;
                    case 'plot':
                        if(is_array($values))
                            $this->and_where('plot', 'LIKE', '%'.$values[0].'%');
                        else
                            $this->and_where('plot', 'LIKE', '%'.$values.'%');
                        break;
                    case 'articles':
                        if(is_array($values))
                        {
                            $this->and_where_open();
                            foreach($values as $value){
                                $this->or_where('article_id', '=', $value);
                            }
                            $this->and_where_close();
                        }
                        else
                            $this->and_where('article_id', '=', NULL);
                        break;
                    case 'sources':
                        if(is_array($values))
                            $this->and_where('source_id', 'IN', $values);
                        else
                            $this->and_where('source_id', '=', NULL);
                        break;
                    case 'investigators':
                        if(is_array($values))
                            $this->and_where('investigator_id', 'IN', $values);
                        else
                            $this->and_where('investigator_id', '=', NULL);
                        break;
                    case 'decrees':
                        if(is_array($values))
                            $this->and_where('decree_id', 'IN', $values);
                        else
                            $this->and_where('decree_id', '=', NULL);
                        break;
                    case 'periods':
                        $this->and_where('period_id', 'IN', $values);
                        break;
                    case 'characteristics':
                        $this->join(array('materials_characteristics', 'm_c'))
                        ->on('material.id', '=', 'm_c.material_id')
                        ->and_where('m_c.characteristic_id', 'IN', $values)
                        ->distinct('id');
                        break;
                    case 'failure_causes':
                        if(is_array($values))
                            $this->and_where('failure_cause_id', 'IN', $values);
                        else
                            $this->and_where('failure_cause_id', '=', NULL);
                        break;
                    case 'extra_investigators':
                        if(is_array($values))
                            $this->and_where('extra_investigators_id', 'IN', $values);
                        else
                            $this->and_where('extra_investigators_id', '=', NULL);
                        break;
                    case 'extra_periods':
                        $this->and_where('extra_period_id', 'IN', $values);
                        break;
                    case 'extra_decrees':
                        if(is_array($values))
                            $this->and_where('extra_decree_id', 'IN', $values);
                        else
                            $this->and_where('extra_decree_id', '=', NULL);
                        break;
                    case 'registration_date':
                    case 'decree_date':
                    case 'decree_cancel_date':
                    case 'extra_decree_date':
                        if(is_array($values))
                        {
                            if(count($values) > 1)
                            {
                                $from = date('Y-m-d 00:00:00', strtotime($values[0]));
                                $to = date('Y-m-d 23:59:59', strtotime($values[1]));
                                $this->and_where_open()->where($key, '>=', $from)->and_where($key, '<=', $to)->and_where_close();
                            }
                            elseif(isset($values[0]))
                            {
                                $from = date('Y-m-d 00:00:00', strtotime($values[0]));
                                $this->and_where($key, '>=', $from);
                            }
                            elseif(isset($values[1]))
                            {
                                $to = date('Y-m-d 23:59:59', strtotime($values[1]));
                                $this->and_where($key, '<=', $to);
                            }
                        }
                        else
                            $this->and_where($key, '=', NULL);
                        break;
                }
            }
        }

        return $this;
    }

    public function add_sub_extra_filters($sub, $filters = NULL)
    {
        if(isset($filters) AND is_array($filters))
        {
            foreach($filters as $key => $values)
            {
                switch($key)
                {
                    case 'investigators':
                        if(is_array($values))
                            $this->and_where($sub.'.'.'investigator_id', 'IN', $values);
                        else
                            $this->and_where($sub.'.'.'investigator_id', '=', NULL);
                        break;
                    case 'decrees':
                        if(is_array($values))
                            $this->and_where($sub.'.'.'decree_id', 'IN', $values);
                        else
                            $this->and_where($sub.'.'.'decree_id', '=', NULL);
                        break;
                    case 'periods':
                        $this->and_where($sub.'.'.'period_id', 'IN', $values);
                        break;
                    case 'decree_date':
                    case 'decree_cancel_date':
                        if(is_array($values))
                        {
                            if(count($values) > 1)
                            {
                                $from = date('Y-m-d 00:00:00', strtotime($values[0]));
                                $to = date('Y-m-d 23:59:59', strtotime($values[1]));
                                $this->and_where_open()->where($sub.'.'.$key, '>=', $from)->and_where($sub.'.'.$key, '<=', $to)->and_where_close();
                            }
                            elseif(isset($values[0]))
                            {
                                $from = date('Y-m-d 00:00:00', strtotime($values[0]));
                                $this->and_where($sub.'.'.$key, '>=', $from);
                            }
                            elseif(isset($values[1]))
                            {
                                $to = date('Y-m-d 23:59:59', strtotime($values[1]));
                                $this->and_where($sub.'.'.$key, '<=', $to);
                            }
                        }
                        else
                            $this->and_where($sub.'.'.$key, '=', NULL);
                        break;
                }
            }
        }

        return $this;
    }

    public function add_sort($sort = NULL)
    {
        $without_join = array(
            'id',
            'registration_date',
            'krsp_num',
            'plot',
            'decree_date',
            'decree_cancel_date',
            'extra_decree_date'
        );
        if(is_null($sort))
        {
            $this->order_by('registration_date', 'DESC');
        }
        else
        {
            if(in_array($sort['field'], $without_join))
            {
                $this->order_by($sort['field'], $sort['direction']);
            }
            elseif($sort['field'] != 'characteristic')
            {
                if(!preg_match('#extra_.+#is', $sort['field']))
                {
                    $this->join(array($sort['field'].'s', 'jt'), 'LEFT OUTER')
                        ->on($sort['field'].'_id', '=', 'jt.id')
                        ->order_by($this->order_field_far_tables[$sort['field'].'s'], $sort['direction']);
                }
                else
                {
                    $field = str_replace('extra_', '', $sort['field']);
                    $this->join(array($field.'s', 'jt'), 'LEFT OUTER')
                        ->on($sort['field'].'_id', '=', 'jt.id')
                        ->order_by($this->order_field_far_tables[$field.'s'], $sort['direction']);
                }

            }
            else
            {
                $this->join(array('materials_characteristics', 'm_c'), 'LEFT OUTER')
                    ->on('material.id', '=', 'm_c.material_id')
                    ->join(array('characteristics', 'jt'), 'LEFT OUTER')
                    ->on('m_c.characteristic_id', '=', 'jt.id')
                    ->distinct('id')
                    ->order_by('jt.text', $sort['direction']);
            }

        }
        return $this;
    }

    public static function render_filter_form($type = 'select')
    {
        $session = Session::instance();
        $post_filters = $session->get('filters');
        if($type == 'checkbox')
        {
            $sources = ORM::factory('Source')->order_by('sort')->find_all();
            $articles = ORM::factory('Article')-> order_by('sort')->find_all();

            $filters = View::factory('front/filters');
        }
        elseif($type == 'select')
        {
            $sources = ORM::factory('Source')->order_by('sort')->find_all()->as_array('id', 'text');
            /*$articles_value = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'value');
            $articles_text = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'text');
            foreach($articles_value as $key => $value){
                $articles[$key] = $value.' - '.$articles_text[$key];
            }*/
            $investigators = ORM::factory('Investigator')->order_by('sort')->find_all()->as_array('id', 'name');
            $decrees = ORM::factory('Decree')->order_by('sort')->find_all()->as_array('id', 'text');
            $periods = ORM::factory('Period')->order_by('sort')->find_all()->as_array('id', 'days');
            $chars = ORM::factory('Characteristic')->order_by('sort')->find_all()->as_array('id', 'text');
            $failure_causes = ORM::factory('Fcause')->order_by('sort')->find_all()->as_array('id', 'text');


            $filters = View::factory('front/select_filters');
        }

        $filters->filters = $post_filters;
        $filters->action = '/filter/change';
        $filters->sources = $sources;
        //$filters->articles = $articles;
        $filters->invs = $investigators;
        $filters->decrees = $decrees;
        $filters->periods = $periods;
        $filters->chars = $chars;
        $filters->failure_causes = $failure_causes;
        $filters->clear_filters = '/filter/alldelete/filters';

        return $filters;
    }

    //Метод для автоматического указания года производства
    public function set_work_year()
    {
        if(!is_null($this->decree_date))
        {
            $year = date('Y', strtotime($this->decree_date));
            $this->work_year = $year;
        }
        else
        {
            if(!is_null($this->registration_date))
            {
                $year = date('Y', strtotime($this->registration_date));
                $this->work_year = $year;
            }
            else
                $this->work_year = date('Y', time());
        }
        return $this;
    }

    public static function year_buttons()
    {
        $year_obj = ORM::factory('Material')->select('work_year')->distinct('work_year')->group_by('work_year')->having('work_year', '!=', NULL)->and_having('archive', '=', 0)->find_all();
        $years = array();
        foreach($year_obj as $year)
        {
            $years[] = array(
                'text' => $year->work_year,
                'href' => '/year/'.$year->work_year,
                'icon' => 'icon-calendar',
                'class' => 'tt',
                'title' => 'Сообщения за '.$year->work_year
            );
        }
        $years[] = array(
            'text' => 'Все года',
            'href' => '/year/all',
            'icon' => 'icon-calendar',
            'class' => 'tt',
            'title' => 'Сообщения за все года'
        );
        $buttons = array($years);
        return $buttons;
    }
}