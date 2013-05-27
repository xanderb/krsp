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
        'article'           => array(
            'model'         => 'article',
            'foreign_key'   => 'article_id'
        ),
        'inv'      => array(
            'model'         => 'investigator',
            'foreign_key'   => 'investigator_id'
        ),
        'extra_inv'    => array(
            'model'         => 'investigator',
            'foreign_key'   => 'extra_investigator_id'
        ),
        'failure_cause'     => array(
            'model'         => 'fcause',
            'foreign_key'   => 'failure_cause_id'
        ),
        'period'            => array(
            'model'         => 'period',
            'foreign_key'   => 'period_id'
        ),
        'extra_period'      => array(
            'model'         => 'period',
            'foreign_key'   => 'extra_period_id'
        ),
        'decree'            => array(
            'model'         => 'decree',
            'foreign_key'   => 'decree_id'
        ),
        'extra_decree'      => array(
            'model'         => 'decree',
            'foreign_key'   => 'extra_decree_id'
        ),

    );

    protected $_has_many = array(
        'characteristic'         => array(
            'model'         => 'characteristic',
            'through'       => 'materials_characteristics'
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

    public function rules()
    {
        return array(
            'krsp_num'  => array(
                array('digit'),
                array(array($this, 'unique'), array('krsp_num', ':value'))
            ),
            'registration_date' => array(
                array('date')
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
            'characteristic'        => 'Характеристики'
        );
    }

    public static function render_table()
    {
        $materials = ORM_Log::factory('material')
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
                        $this->and_where('krsp_num', '=', $values[0]);
                        break;
                    case 'articles':
                        $this->and_where('article_id', 'IN', $values);
                        break;
                    case 'sources':
                        $this->and_where('source_id', 'IN', $values);
                        break;
                    case 'investigators':
                        $this->and_where('investigator_id', 'IN', $values);
                        break;
                    case 'decrees':
                        $this->and_where('decree_id', 'IN', $values);
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
                        $this->and_where('failure_cause_id', 'IN', $values);
                        break;
                    case 'extra_investigators':
                        $this->and_where('extra_investigators_id', 'IN', $values);
                        break;
                    case 'extra_periods':
                        $this->and_where('extra_period_id', 'IN', $values);
                        break;
                    case 'extra_decrees':
                        $this->and_where('extra_decree_id', 'IN', $values);
                        break;
                    case 'registration_date':
                    case 'decree_date':
                    case 'decree_cancel_date':
                    case 'extra_decree_date':
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
                        break;
                }
            }
        }

        return $this;
    }
}