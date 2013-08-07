<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 03.08.13
 * Time: 17:01
 * To change this template use File | Settings | File Templates.
 */
?>

    <?=Form::open(
        '/admin/extra/add/',
        array(
            'method' => 'post',
            'name' => 'material_id_form',
            'class' => 'js-f'
        )
    )?>
    <?=isset($content) ? $content : NULL?>
    <div class="control-group">
        <?php
        if(isset($content))
        {
            echo Form::button(
                'set_material',
                'Выбрать материал для ДОПа',
                array(
                    'class' => 'btn btn-primary',
                    'id' => 'set_material_submit'
                )
            );
        }
        ?>
    </div>
    <?=Form::close()?>
