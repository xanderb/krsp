<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 29.04.13
 * Time: 17:31
 * To change this template use File | Settings | File Templates.
 */
defined('SYSPATH') or die('No direct script access.');
return array(
    'alpha'         => 'Поле :field может содержать только буквы',
    'alpha_dash'    => 'Поле :field может содержать только числа, буквы и знаки тире',
    'alpha_numeric' => 'Поле :field может содержать только цифры и буквы',
    'color'         => 'Поле :field может содержать только значение цвета',
    'credit_card'   => 'Поле :field может содержать только номер кредитной карты',
    'date'          => 'Поле :field может содержать только дату',
    'decimal'       => 'Поле :field должно быть десятичным с :param2 знакам(ом) после запятой',
    'digit'         => 'Поле :field должно быть цифровым',
    'email'         => 'Поле :field должно быть правильным email адресом',
    'email_domain'  => 'Поле :field должно содержать только правильный email домен',
    'equals'        => 'Поле :field должно быть равно :param2',
    'exact_length'  => 'Поле :field должно содержать ровно :param2 символ(а/ов)',
    'in_array'      => 'Поле :field может содержать только доступные из списка опции',
    'ip'            => 'Поле :field может быть только ip адресом',
    'matches'       => 'Поле :field должно быть таким же, как :param3',
    'min_length'    => 'Поле :field должно содержать не меньше :param2 символа(ов)',
    'max_length'    => 'Поле :field должно содержать не более :param2 символа(ов)',
    'not_empty'     => 'Поле :field не должно быть пустым',
    'numeric'       => 'Поле :field должно быть числом',
    'phone'         => 'Поле :field должно быть номером телефона',
    'range'         => 'Значение поля :field должно быть в промежутке от :param2 до :param3',
    'regex'         => 'Поле :field не совпадает с требуемым форматом',
    'unique'        => 'Такое значение :field уже существует. Введите уникальное значение в поле :field',
    'url'           => 'Поле :field должно быть ссылкой на веб-страницу',
);