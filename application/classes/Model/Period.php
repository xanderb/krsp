<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:55
 * To change this template use File | Settings | File Templates.
 */

class Model_Period extends ORM
{

    protected $_has_many = array(
        'materials' => array('model' => 'Material', 'foreign_key' => 'period_id'),
        'extra_materials' => array('model' => 'Material', 'foreign_key' => 'extra_period_id'),
    );
    //TODO сделать правила валидации значений в методе rules()
}