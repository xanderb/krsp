<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 09.04.13
 * Time: 11:49
 * To change this template use File | Settings | File Templates.
 */

defined('SYSPATH') OR die('No direct script access.');

class ORM_Log extends ORM {

    public function update(Validation $validation = NULL)
    {
        if ( ! $this->_loaded)
            throw new Kohana_Exception('Cannot update :model model because it is not loaded.', array(':model' => $this->_object_name));

        // Run validation if the model isn't valid or we have additional validation rules.
        if ( ! $this->_valid OR $validation)
        {
            $this->check($validation);
        }

        if (empty($this->_changed))
        {
            // Nothing to update
            return $this;
        }

        $data = array();

        $prev_obj = ORM::factory($this->_object_name, $this->pk());

                /*echo Debug::vars($prev_obj);
                exit;*/

        foreach ($this->_changed as $column)
        {
            // Compile changed data
            $data[$column] = $this->_object[$column];
            //Loging changes
            $log = ORM::factory('upLog');
            $log_values = array(
                'table'         =>  $this->getTable(),
                'id_obj'        =>  $this->pk(),
                'field'         =>  $column,
                'prev_value'    =>  ($prev_obj->$column ? $prev_obj->$column : 'Пустое значение'),
                'post_value'    =>  $this->_object[$column],
                'ip'            =>  $_SERVER['REMOTE_ADDR'],
                'client_info'   =>  serialize($_SERVER),
                'cause'         =>  (!is_null(Arr::get($_POST, 'edit-cause', NULL)) ? Arr::get($_POST, 'edit-cause', NULL) : 'Исправление опечатки')
            );
            $log->values($log_values)->save();
        }

        if (is_array($this->_updated_column))
        {
            // Fill the updated column
            $column = $this->_updated_column['column'];
            $format = $this->_updated_column['format'];

            $data[$column] = $this->_object[$column] = ($format === TRUE) ? time() : date($format);
        }

        // Use primary key value
        $id = $this->pk();

        // Update a single record
        DB::update($this->_table_name)
            ->set($data)
            ->where($this->_primary_key, '=', $id)
            ->execute($this->_db);

        if (isset($data[$this->_primary_key]))
        {
            // Primary key was changed, reflect it
            $this->_primary_key_value = $data[$this->_primary_key];
        }

        // Object has been saved
        $this->_saved = TRUE;

        // All changes have been saved
        $this->_changed = array();
        $this->_original_values = $this->_object;

        return $this;
    }

    /*
     * Возвращает имя таблицы в БД, к которой привязана модель
     */
    public function getTable(){
        return $this->_table_name;
    }
}