<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.05.13
 * Time: 12:08
 * To change this template use File | Settings | File Templates.
 */
class Controller_Front_Sort extends Controller_Front
{
    public function action_index()
    {
        $sess =& $this->session;
        $field = Request::$current->param('field', 'registration_date');
        $direction = Request::$current->param('direction', 'DESC');
        $table = Request::$current->param('table', 'materials');
        $sess->delete('sort');
        $sess->set('sort', array(
            $table => array(
                'field'     => $field,
                'direction' => $direction
            ),
        ));

        Controller::redirect(Request::$current->referrer());
    }
}