<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 03.08.13
 * Time: 17:38
 * To change this template use File | Settings | File Templates.
 */
if(isset($sub_menus)){
    ?>
    <div class="sub_menu">
        <?php
        foreach($sub_menus as $item){
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

if(isset($error))
{
    ?>
    <div class="alert alert-error">
        <?php
        if(is_array($error)){
            ?>
            <ul>
                <?php
                foreach($error as $err){
                    ?>
                    <li>
                        <?php
                        if(is_array($err)){
                            ?>
                            <ul>
                                <?php
                                foreach($err as $sub_err){
                                    ?>
                                    <li><?=$sub_err?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        <?php
                        }else{
                            echo $err;
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        <?php
        }else{
            echo $error;
        }
        ?>
    </div>
<?php
}
?>
<?php
echo Form::open(
    '',
    array(
        'name' => 'extra-form',
        'method' => 'post',
        'id' => 'extra-form'
    )
);
?>

<fieldset>
<?php
if(isset($legend)){
    ?>
    <legend><?=$legend?></legend>
<?php
}
echo Form::hidden('material_id', (isset($material_id)) ? $material_id: NULL);
echo Form::hidden('id', (isset($extra)) ? $extra->id: NULL);?>

    <dl>
       <?php /* <dt><?=Form::label('parent_extra_id', 'Отменяемый ДОП')?></dt>
        <dd>
            <div class="input-append">
            <?php
            if(isset($material_id))
                echo Form::label('parent_extra_id',
                    Form::checkbox(
                        'parent_extra_id',
                        isset($parent_extra_id) AND !is_null($parent_extra_id) ? $parent_extra_id : '',
                        TRUE,
                        array(
                            'id' => 'parent_extra_id',
                            'class' => 'hid'
                    )
            ).' Отменить последний ДОП', array('class' => 'checkbox inline'));

            else
                echo Help::select(
                    'parent_extra_id',
                    isset($parent_extras) ? $parent_extras : NULL,
                    (isset($extra) ? $extra->extra_parent_id : NULL),
                    array(
                        'id'    => 'parent_extra_id',
                        'class' => 'span2'
                    ),
                    array(
                        '' => 'Выберите отменяемый ДОП'
                    )
                )
            ?>
            </div>
        </dd>
*/ ?>
        <dt><?=Form::label('decree_cancel_date', 'Дата отмены решения')?></dt>
        <dd>
            <div class="input-append">
                <?=Form::input(
                    'decree_cancel_date',
                    (isset($extra) ? $extra->decree_cancel_date : NULL),
                    array(
                        'id'    => 'decree_cancel_date',
                        'class' => 'span6 datepicker',
                        'type'  => 'text',
                        'disabled' => (isset($extra->decree_cancel_date) ? 'disabled' : NULL),
                    )
                )?>
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>

        <dt><?=Form::label('investigator', 'Следователь')?></dt>
        <dd>
            <?php
            echo Form::input(
                'investigator_id',
                (isset($extra) ? $extra->investigator->name : NULL),
                array(
                    'id' => 'investigator',
                    'class' => 'span2',
                    'disabled' => (isset($extra->investigator->name) ? 'disabled' : NULL),
                    'placeholder' => 'Введите следователя',
                    'data-provide' => 'typeahead',
                    'data-items' => '6',
                    'data-source' => isset($inv_text) ? $inv_text : '',

                )
            )
            ?>
        </dd>

        <dt><?=Form::label('period', 'Срок рассмотрения')?></dt>
        <dd>
            <?=Help::select(
                'period_id',
                (isset($periods) ? $periods : NULL),
                (isset($extra) ? $extra->period->id : NULL),
                array(
                    'id'    => 'period',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите срок рассмотрения'
                )
            )?>
            <span id="error-period" class="text-error"></span>
        </dd>

        <dt><?=Form::label('decree', 'Решение')?></dt>
        <dd>
            <?=Help::select(
                'decree_id',
                (isset($decrees) ? $decrees : NULL),
                (isset($extra) ? $extra->decree->id : NULL),
                array(
                    'id'    => 'decree',
                    'class' => 'span2',
                    'disabled' => (isset($extra->decree->id) ? 'disabled' : NULL),
                ),
                array(
                    '' => 'Выберите Решение'
                )
            )?>
        </dd>

        <dt><?=Form::label('decree_date', 'Дата принятия решения')?></dt>
        <dd>
            <div class="input-append">
                <?=Form::input(
                    'decree_date',
                    (isset($extra) ? $extra->decree_date : NULL),
                    array(
                        'id'    => 'decree_date',
                        'class' => 'span6 datepicker',
                        'type'  => 'text',
                        'disabled' => (isset($extra->decree_date) ? 'disabled' : NULL),
                    )
                )?>
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>


    </dl>

    <div class="form-actions">
        <?php
        echo Form::button('extra-submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'material-save'));
        ?>
    </div>
</fieldset>
<?php
echo Form::close();
?>