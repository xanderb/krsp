<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 23.07.13
 * Time: 14:21
 * To change this template use File | Settings | File Templates.
 */

class Model_Option  extends ORM
{

    public static $types = array(
        'checkbox' => 'checkbox',
        'input' => 'input',
        'textarea' => 'textarea'
    );

    public function rules()
    {
        return array(
            'param' => array(
                array(array($this, 'unique'), array('param', ':value')),
                array('not_empty')
            ),
            'value' => array(
                array('not_empty')
            ),
            'default' => array(
                array('not_empty')
            ),

        );
    }

    /*
     * Метод возвращает объект с указанным именем параметра или список объектов, если передается массив параметров
     *
     * param: MIXED - string, array
     *
     * return: MIXED - boolean, ORM object
     */
    public static function getParam($param)
    {
        if(isset($param))
        {
            if(is_array($param))
            {
                $_in_params = array();
                foreach($param as $p)
                {
                    if(isset($p) AND $p !== '')
                        $_in_params[] = $p;
                }
                $obj = ORM::factory('option')->where('param', 'IN', $_in_params)->find_all();
            }
            else
            {
                $obj = ORM::factory('option')->where('param', '=', $param)->find();
            }
            return $obj;
        }
        return FALSE;
    }

    public static function setParam($option)
    {
        if(isset($option))
        {
            if(isset($option['id']))
                $obj = ORM::factory('option', $option['id']);
            else
            {
                $obj = ORM::factory('option');
                $obj->values($option);
                try
                {
                    $obj->save();
                    return TRUE;
                }
                catch(ORM_Validation_Exception $e)
                {
                    return FALSE;
                }
            }
        }
        return FALSE;
    }
}