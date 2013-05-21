<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:17
 * To change this template use File | Settings | File Templates.
 */

class Model_Characteristic extends ORM
{
    protected $_has_many = array(
        'materials'         => array(
            'model'         => 'material',
            'through'       => 'materials_characteristics'
        ),
    );
}