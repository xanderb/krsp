<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 29.07.13
 * Time: 12:24
 * To change this template use File | Settings | File Templates.
 */

class Model_Extra extends ORM_Log
{
    protected $_table_name = "extras";

    protected $_belongs_to = array(
        'investigator'      => array(
            'model'         => 'investigator',
            'foreign_key'   => 'investigator_id'
        ),
        'period'      => array(
            'model'         => 'period',
            'foreign_key'   => 'period_id'
        ),
        'decree'      => array(
            'model'         => 'decree',
            'foreign_key'   => 'decree_id'
        ),
        'material'  => array(
            'model'         => 'material',
            'foreign_key'   => 'material_id'
        ),
        'user'  => array(
            'model'         => 'user',
            'foreign_key'   => 'user_id'
        ),
        'parent'    => array(
            'model'         => 'extra',
            'foreign_key'   => 'parent_extra_id'
        )
    );

    protected $_has_one = array(

    );

    public function rules()
    {
        return array(
            'decree_cancel_date' => array(
                array('not_empty'),
                array('date')
            ),
            'material_id' => array(
                array('not_empty')
            ),
            'period_id' => array(
                array('not_empty')
            ),
            'decree_date' => array(
                array('date')
            ),

        );
    }

    public function add_filters($filters = NULL)
    {
        if(isset($filters) AND is_array($filters))
        {
            foreach($filters as $key => $values)
            {
                switch($key)
                {
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
                    case 'decree_date':
                    case 'decree_cancel_date':
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

    public static function render_filter_form($type = 'select')
    {
        $session = Session::instance();
        $post_filters = $session->get('extra_filters');
        if($type == 'checkbox')
        {

        }
        elseif($type == 'select')
        {
            $articles_value = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'value');
            $articles_text = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'text');
            foreach($articles_value as $key => $value){
                $articles[$key] = $value.' - '.$articles_text[$key];
            }
            $investigators = ORM::factory('Investigator')->order_by('sort')->find_all()->as_array('id', 'name');
            $decrees = ORM::factory('Decree')->order_by('sort')->find_all()->as_array('id', 'text');
            $periods = ORM::factory('Period')->order_by('sort')->find_all()->as_array('id', 'days');



            $filters = View::factory('front/extra_filters');
        }

        $filters->filters = $post_filters;
        $filters->action = '/filter/change/extra_filters';

        $filters->invs = $investigators;
        $filters->decrees = $decrees;
        $filters->periods = $periods;

        $filters->clear_filters = '/filter/alldelete/extra_filters';

        return $filters;
    }
}