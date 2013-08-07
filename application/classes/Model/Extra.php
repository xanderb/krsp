<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 29.07.13
 * Time: 12:24
 * To change this template use File | Settings | File Templates.
 */

class Model_Extra extends ORM_Log
{
    protected $_table_name = "extras";

    protected $_belongs_to = array(
        'investigator'      => array(
            'model'         => 'investigator',
            'foreign_key'   => 'investigator_id'
        ),
        'period'      => array(
            'model'         => 'period',
            'foreign_key'   => 'period_id'
        ),
        'decree'      => array(
            'model'         => 'decree',
            'foreign_key'   => 'decree_id'
        ),
        'material'  => array(
            'model'         => 'material',
            'foreign_key'   => 'material_id'
        ),
        'user'  => array(
            'model'         => 'user',
            'foreign_key'   => 'user_id'
        ),
        'parent'    => array(
            'model'         => 'extra',
            'foreign_key'   => 'parent_extra_id'
        )
    );

    protected $_has_one = array(

    );

    public function rules()
    {
        return array(
            'decree_cancel_date' => array(
                array('not_empty'),
                array('date')
            ),
            'material_id' => array(
                array('not_empty')
            ),
            'period_id' => array(
                array('not_empty')
            ),
            'decree_date' => array(
                array('date')
            ),

        );
    }

}