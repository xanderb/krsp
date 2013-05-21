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
        Controller::redirect('');
    }

    public function action_change()
    {

        if(isset($_POST['filter-submit']))
        {
            $this->session->delete('filters');
            $filters = array(
                'sources'   => Arr::get($_POST, 'sources', array()),
                'articles'  => Arr::get($_POST, 'articles', array()),

            );

            $this->session->set('filters', $filters);
        }
       // $this->template->debug = Debug::vars($this->session->as_array());
        Controller::redirect('');
    }
}