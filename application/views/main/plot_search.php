<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 22.07.13
 * Time: 9:12
 * To change this template use File | Settings | File Templates.
 */
$controller = Request::$current->controller();
switch($controller)
{
    case 'Material':
        $form_action = 'filter/change';
        break;
    case 'Archive':
        $form_action = 'filter/change/archive_filters';
        break;
    default:
        $form_action = 'filter/change';
}
//echo Debug::vars($controller);

echo Form::open(
    URL::site($form_action),
    array(
        'method'    => 'POST',
        'id'        => 'plot_search_form',
        'class'     => 'form-search',
        'name'      => 'plot_search_form'
    )
);
?>
<div class="input-append">
<?php
echo Form::input(
    'plot',
    NULL,
    array(
        'id' => 'search_plot',
        'class' => 'search-query span12',
        'placeholder' => 'Поиск по фабуле'
    )
)
    .
Form::button(
    'filter-submit',
    '<i class="icon-search"></i>',
    array(
        'class' => 'btn'
    )
);
?>
</div>
<?php
echo Form::close();