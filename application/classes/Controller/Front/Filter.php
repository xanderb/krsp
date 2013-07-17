<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 15.05.13
 * Time: 19:44
 * To change this template use File | Settings | File Templates.
 */

class Controller_Front_Filter extends Controller_Front
{
    public function action_index()
    {
        Controller::redirect('');
    }

    public function action_delete()
    {
        $filter = Request::$current->param('filter', NULL);
        $filter_item = Request::$current->param('filter_item', NULL);
        Controller::redirect(URL::site(Request::$current->referrer()));
    }

    public function action_alldelete()
    {
        $this->session->delete('filters');
        Controller::redirect(URL::site(Request::$current->referrer()));
    }

    public function action_change()
    {

        if(isset($_POST['filter-submit']) OR (isset($_POST['krsp_num']) AND !empty($_POST['krsp_num'])))
        {
            $this->session->delete('filters');
            $prefilters = array(
                'krsp_num'  => Arr::get($_POST, 'krsp_num', array()),
                'registration_date' => Arr::get($_POST, 'registration_date', array()),
                'sources'   => Arr::get($_POST, 'sources', array()),
                'articles'  => Arr::get($_POST, 'articles', array()),
                'investigators' => Arr::get($_POST, 'investigators', array()),
                'characteristics' => Arr::get($_POST, 'characteristics', array()),
                'decrees' =>  Arr::get($_POST, 'decrees', array()),
                'decree_date' =>  Arr::get($_POST, 'decree_date', array()),
                'periods' =>  Arr::get($_POST, 'periods', array()),
                'failure_causes' =>  Arr::get($_POST, 'failure_causes', array()),
                'decree_cancel_date' =>  Arr::get($_POST, 'decree_cancel_date', array()),
                'extra_investigators' =>  Arr::get($_POST, 'extra_investigators', array()),
                'extra_periods' =>  Arr::get($_POST, 'extra_periods', array()),
                'extra_decrees' =>  Arr::get($_POST, 'extra_decrees', array()),
                'extra_decree_date' =>  Arr::get($_POST, 'extra_decree_date', array()),
            );
            $filters = array();
            foreach($prefilters as $key => $value_arr){

                $without_unique = array(
                    'extra_decree_date',
                    'decree_cancel_date',
                    'decree_date',
                    'registration_date'
                ); //Массив содержит ключи массива фильтров в которых НЕ удаляются повторяющиеся элементы (даты)

                if(!is_array($value_arr))       //Если нужно отобрать все незаполненные поля
                {
                    $filters[$key] = $value_arr;
                }
                else
                {
                    if(!in_array($key, $without_unique))    //очистка повторяющихся значений из фильтра
                        $arr = array_unique($value_arr);
                    else
                        $arr = $value_arr;
                    foreach($arr as $key_in => $a_i){
                        if($a_i != '' AND !is_null($a_i)){
                            $filters[$key][$key_in] = $a_i;
                        }
                    }
                }

            }
            $this->session->set('filters', $filters);
        }
        //$this->template->debug = Debug::vars($_POST);
        Controller::redirect(URL::site(Request::$current->referrer()));
    }
}