<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:01
 * To change this template use File | Settings | File Templates.
 */
class Model_Source extends ORM
{
    protected $_has_many = array(
        'materials' => array('model' => 'Material', 'foreign_key' => 'source_id'),
    );
}