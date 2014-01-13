<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 07.05.13
 * Time: 17:42
 * To change this template use File | Settings | File Templates.
 */

class Help
{
    public static function select($name, array $options = NULL, $selected = NULL, array $attributes = NULL, array $default_option = NULL, $force_default = FALSE)
    {
        // Set the input name
        $attributes['name'] = $name;

        if (is_array($selected))
        {
            // This is a multi-select, god save us!
            $attributes[] = 'multiple';
        }

        if ( ! is_array($selected))
        {
            if ($selected === NULL)
            {
                // Use an empty array
                $selected = array();
            }
            else
            {
                // Convert the selected options to an array
                $selected = array( (string) $selected);
            }
        }

        if (empty($options))
        {
            // There are no options
            $options = '';
        }
        else
        {
            foreach ($options as $value => $name)
            {
                if (is_array($name))
                {
                    // Create a new optgroup
                    $group = array('label' => $value);

                    // Create a new list of options
                    $_options = array();

                    foreach ($name as $_value => $_name)
                    {
                        // Force value to be string
                        $_value = (string) $_value;

                        // Create a new attribute set for this option
                        $option = array('value' => $_value);

                        if (in_array($_value, $selected))
                        {
                            // This option is selected
                            $option[] = 'selected';
                        }

                        // Change the option to the HTML string
                        $_options[] = '<option'.HTML::attributes($option).'>'.HTML::chars($_name, FALSE).'</option>';
                    }

                    // Compile the options into a string
                    $_options = "\n".implode("\n", $_options)."\n";

                    $options[$value] = '<optgroup'.HTML::attributes($group).'>'.$_options.'</optgroup>';
                }
                else
                {
                    // Force value to be string
                    $value = (string) $value;

                    // Create a new attribute set for this option
                    $option = array('value' => $value);

                    if (in_array($value, $selected))
                    {
                        // This option is selected
                        $option[] = 'selected';
                    }

                    // Change the option to the HTML string
                    $options[$value] = '<option'.HTML::attributes($option).'>'.HTML::chars($name, FALSE).'</option>';
                }
            }
            if(is_array($default_option) AND (is_array($selected) AND count($selected) < 1 OR $force_default))
            {
                foreach($default_option as $def_key => $def_value)
                {
                    if(is_array($selected) AND count($selected) < 1)
                        $def_selected = 'selected';
                    else
                        $def_selected = '';
                    $options[$def_key] = '<option value="'.$def_key.'" '.$def_selected.' >'.HTML::chars($def_value, FALSE).'</option>';
                }
                ksort($options);
            }
            // Compile the options into a single string
            $options = "\n".implode("\n", $options)."\n";
        }

        return '<select'.HTML::attributes($attributes).'>'.$options.'</select>';
    }

    public static function datepicker_to_timestamp($date)
    {
        if(!is_null($date) OR $date != '' OR $date != 0)
            return date('Y-m-d H:i:s', strtotime($date));
        else
            return NULL;
    }

    public static function render_paginator($model, $core_url, $cur_page = NULL, $total_items = NULL)
    {
        $config = Kohana::$config->load('basic');
        $items = $config->items_per_page;
        $count_items = $total_items;
        $last_page = ceil($count_items / $items);

        $paginator = View::factory('main/paginator');
        $paginator->core_url = $core_url;
        $paginator->last = $last_page;
        $paginator->active = ($cur_page ? $cur_page : 1);
        return $paginator;
    }

    public static function render_filter_form($type = 'select')
    {
        $session = Session::instance();
        $post_filters = $session->get('filters');
        if($type == 'checkbox')
        {
            $sources = ORM::factory('Source')->order_by('sort')->find_all();
            $articles = ORM::factory('Article')-> order_by('sort')->find_all();

            $filters = View::factory('front/filters');
        }
        elseif($type == 'select')
        {
            $sources = ORM::factory('Source')->order_by('sort')->find_all()->as_array('id', 'text');
            $articles_value = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'value');
            $articles_text = ORM::factory('Article')-> order_by('sort')->find_all()->as_array('id', 'text');
            foreach($articles_value as $key => $value){
                $articles[$key] = $value.' - '.$articles_text[$key];
            }
            $investigators = ORM::factory('Investigator')->order_by('sort')->find_all()->as_array('id', 'name');
            $decrees = ORM::factory('Decree')->order_by('sort')->find_all()->as_array('id', 'text');
            $periods = ORM::factory('Period')->order_by('sort')->find_all()->as_array('id', 'days');
            $chars = ORM::factory('Characteristic')->order_by('sort')->find_all()->as_array('id', 'text');
            $failure_causes = ORM::factory('Fcause')->order_by('sort')->find_all()->as_array('id', 'text');


            $filters = View::factory('front/select_filters');
        }

        $filters->filters = $post_filters;
        $filters->action = '/filter/change';
        $filters->sources = $sources;
        //$filters->articles = $articles;
        $filters->invs = $investigators;
        $filters->decrees = $decrees;
        $filters->periods = $periods;
        $filters->chars = $chars;
        $filters->failure_causes = $failure_causes;

        return $filters;
    }

    public static function real_back_path_menu()
    {
        return array(
            array(
                'text' => '<i class="icon-arrow-left"></i> Вернуться назад',
                'href' => Request::$current->referrer(),
                'type' => 'n'
            )
        );

    }

    public static function array_to_string($obj)
    {
        $text = "[";
        foreach($obj as $val)
        {
            $text .= '"'.$val.'",';
        }
        $text = substr($text, 0, strlen($text) - 1);
        $text .= "]";

        return $text;
    }
}