<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 23.07.13
 * Time: 15:38
 * To change this template use File | Settings | File Templates.
 */

if(isset($sub_admin_menus)){
    ?>
    <div class="sub_menu">
        <?php
        foreach($sub_admin_menus as $item){
            ?>
            <a class="btn <?php
            if($item['type'] == 'y')
                echo 'js-p';
            ?>" href="<?=$item['href']?>"><?=$item['text']?></a>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<table class="table table-striped table-bordered">
<?php
if(isset($caption)){
    ?>
    <caption class="caption-invert"><?=$caption?></caption>
<?php
}
?>
<?php
if(isset($t_headers)){
    ?>
    <tr class="table_header">
        <?php
        foreach($t_headers as $h){
            ?>
            <th <?=$h['field'] == 'id' ? 'class="hid"' : NULL?>>
                <?=$h['text']?>
                <?php
                if($h['field'] == 'value')
                {
                    ?>
                    <a class="btn btn-primary opt_value_sub tt" href="#option_submit" id="save_all_options" title="Применить все изменения значений опций"><i class="icon-edit icon-white header-button"></i></a>
                    <?php
                }
                ?>
            </th>
            <?php
            $field[] = $h['field'];
        }
        ?>
    </tr>
<?php
}

if(isset($options) AND count($options) > 0)
{
    foreach($options as $k => $opt)
    {
        ?>
        <tr id="row<?=$k?>">
            <td class="js-id hid"><?=$opt->id?></td>
            <td><?=$opt->label?></td>
            <td><?=$opt->param?></td>
            <td class="opt_value">
                <form action="/admin/option/item_change" method="post">
                <?php
                echo Form::hidden('type['.$opt->id.']', $opt->type)
                    .' '
                    .Form::hidden('id', $opt->id, array('class' => 'opt_id'));
                switch($opt->type)
                {
                    case 'checkbox':
                        echo Form::checkbox(
                            'value['.$opt->id.']',
                            '1',
                            $opt->value == 1 ? TRUE : FALSE,
                            array(
                                'class' => 'opt_checkbox values'
                            )
                        );
                        break;
                    case 'input':
                        echo Form::input(
                            'value['.$opt->id.']',
                            (isset($opt->value) AND $opt->value != '') ? $opt->value : NULL,
                            array(
                                'class' => 'opt_input span8 values'
                            )
                        );
                        break;
                    case 'textarea':
                        echo Form::textarea(
                            'value['.$opt->id.']',
                            (isset($opt->value) AND $opt->value != '') ? $opt->value : NULL,
                            array(
                                'class' => 'opt_textarea span8 values',
                            )
                        );
                        break;
                    default:
                }
                ?>
                    <button type="submit" name="opt_change[<?=$opt->id?>]" class="btn tt opt_change" title="Изменить значение опции">
                        <i class="icon-pencil"></i>
                    </button>
                </form>
            </td>
            <td><?=$opt->default?></td>
            <td><?=$opt->type?></td>
            <td>
                <a class="btn tt" href="/admin/option/edit/<?=$opt->id?>" title="Редактировать опцию"><i class="icon-pencil"></i></a>
                <a class="btn tt" href="/admin/option/delete/<?=$opt->id?>" title="Удалить опцию"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php

    }
}
else
{
    ?>
    <tr>
        <td colspan="7">У программы нет настроек</td>
    </tr>
    <?php
}
?>

</table>