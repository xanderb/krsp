<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 22.07.13
 * Time: 9:12
 * To change this template use File | Settings | File Templates.
 */

echo Form::open(
    URL::site('filter/change'),
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
        'placeholder' => 'Поиск'
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