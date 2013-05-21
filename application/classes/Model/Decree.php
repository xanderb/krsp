<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:58
 * To change this template use File | Settings | File Templates.
 */

class Model_Decree extends ORM
{
    protected $_has_many = array(
        'materials' => array('model' => 'Material', 'foreign_key' => 'decree_id'),
        'extra_materials' => array('model' => 'Material', 'foreign_key' => 'extra_decree_id'),
    );
}