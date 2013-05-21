<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 13.04.13
 * Time: 19:41
 * To change this template use File | Settings | File Templates.
 */

class Model_Investigator extends ORM
{
    protected $_has_many = array(
        'materials' => array('model' => 'Material', 'foreign_key' => 'investigator_id'),
        'extra_materials' => array('model' => 'Material', 'foreign_key' => 'extra_investigator_id'),
    );
}