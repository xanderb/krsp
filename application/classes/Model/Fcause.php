<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:51
 * To change this template use File | Settings | File Templates.
 */

class Model_Fcause extends ORM
{
    protected $_table_name = 'failure_causes';

    protected $_has_many = array(
        'materials' => array('model' => 'Material', 'foreign_key' => 'failure_cause_id'),
    );
}