<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 07.08.13
 * Time: 12:43
 * To change this template use File | Settings | File Templates.
 */
class Model_Archive extends Model_Material
{
    protected $_table_name = "materials";

    public static function render_filter_form($type = 'select')
    {
        $session = Session::instance();
        $post_filters = $session->get('archive_filters');
        if($type == 'checkbox')
        {
            $sources = ORM::factory('source')->order_by('sort')->find_all();
            $articles = ORM::factory('article')-> order_by('sort')->find_all();

            $filters = View::factory('front/filters');
        }
        elseif($type == 'select')
        {
            $sources = ORM::factory('source')->order_by('sort')->find_all()->as_array('id', 'text');
            $articles_value = ORM::factory('article')-> order_by('sort')->find_all()->as_array('id', 'value');
            $articles_text = ORM::factory('article')-> order_by('sort')->find_all()->as_array('id', 'text');
            foreach($articles_value as $key => $value){
                $articles[$key] = $value.' - '.$articles_text[$key];
            }
            $investigators = ORM::factory('investigator')->order_by('sort')->find_all()->as_array('id', 'name');
            $decrees = ORM::factory('decree')->order_by('sort')->find_all()->as_array('id', 'text');
            $periods = ORM::factory('period')->order_by('sort')->find_all()->as_array('id', 'days');
            $chars = ORM::factory('characteristic')->order_by('sort')->find_all()->as_array('id', 'text');
            $failure_causes = ORM::factory('fcause')->order_by('sort')->find_all()->as_array('id', 'text');


            $filters = View::factory('front/select_filters');
        }

        $filters->filters = $post_filters;
        $filters->action = '/filter/change/archive_filters';
        $filters->sources = $sources;
        //$filters->articles = $articles;
        $filters->invs = $investigators;
        $filters->decrees = $decrees;
        $filters->periods = $periods;
        $filters->chars = $chars;
        $filters->failure_causes = $failure_causes;
        $filters->clear_filters = '/filter/alldelete/archive_filters';

        return $filters;
    }
}