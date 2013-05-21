<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 04.05.13
 * Time: 13:08
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
        'name' => 'material-form',
        'method' => 'post',
        'id' => 'material-form'
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
echo Form::hidden('id', (isset($material)) ? $material->id: NULL);?>

    <dl>
        <dt><?=Form::label('krsp', 'Номер КРСП')?></dt>
        <dd><?=Form::input(
                'krsp_num',
                (isset($material) ? $material->krsp_num : NULL),
                array(
                    'id' => 'krsp',
                    'class' => 'span1',

                )
            )?></dd>

        <dt><?=Form::label('registration_date', 'Дата регистрации материала')?></dt>
        <dd>
            <div class="input-append">
            <?=Form::input(
                'registration_date',
                (isset($material) ? $material->registration_date : NULL),
                array(
                    'id'    => 'registration_date',
                    'class' => 'span6 datepicker',
                    'type'  => 'text'
                )
            )?>
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>
        <dt><?=Form::label('source', 'Источник сообщения')?></dt>
        <dd><?=Help::select(
                'source_id',
                (isset($sources) ? $sources : NULL),
                (isset($material) ? $material->source->id : NULL),
                array(
                    'id'    => 'source',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите источник'
                )
            )?></dd>
        <dt><?=Form::label('plot', '<span class="text-error tt" rel="tooltip" title="Поле обязательно для заполнения">Краткая фабула *</span>')?></dt>
        <dd>
            <?=Form::textarea(
                'plot',
                (isset($material) ? $material-> plot : NULL),
                array(
                    'id'    => 'plot',
                    'rows'  => '4',
                    'class' => 'span3',

                )
            )?>
            <span id="error-plot" class="text-error"></span>
        </dd>
        <dt><?=Form::label('article', '<span class="text-error tt" rel="tooltip" title="Поле обязательно для заполнения">Статья *</span>')?></dt>
        <dd>
            <?=Help::select(
                'article_id',
                (isset($articles) ? $articles : NULL),
                (isset($material) ? $material->article->id : NULL),
                array(
                    'id'    => 'article',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите статью'
                )
            )?>
            <span id="error-article" class="text-error"></span>
        </dd>
        <dt><?=Form::label('investigator', 'Следователь')?></dt>
        <dd>
            <?=Help::select(
                'investigator_id',
                (isset($investigators) ? $investigators : NULL),
                (isset($material) ? $material->inv->id : NULL),
                array(
                    'id'    => 'investigator',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите следователя'
                )
            )?>
        </dd>

        <dt><?=Form::label('', 'Характеристика материалов')?></dt>
        <dd>
            <?php
            if(isset($chars))
            {
                foreach($chars as $char)
                {
                    echo Form::label(
                        'char'.$char->id,
                        Form::checkbox(
                            'chars[]',
                            $char->id,
                            (isset($material) AND $material->has('characteristic', $char->id) ? TRUE : FALSE),
                            array(
                                'id'    => 'char'.$char->id
                            )
                        )
                            .' '
                            .$char->text,
                        array(
                            'class' => 'checkbox'
                        )
                    );

                }
            }
            ?>
        </dd>
        <dt><?=Form::label('decree', 'Решение')?></dt>
        <dd>
            <?=Help::select(
                'decree_id',
                (isset($decrees) ? $decrees : NULL),
                (isset($material) ? $material->decree->id : NULL),
                array(
                    'id'    => 'decree',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите Решение'
                )
            )?>
        </dd>

        <dt>
            <?=Form::label(
                'decree_date',
                'Дата принятия решения')?>
        </dt>
        <dd>
            <div class="input-append">
            <?=Form::input(
                'decree_date',
                (isset($material) ? $material->decree_date : NULL),
                array(
                    'id'    => 'decree_date',
                    'class' => 'span6 datepicker',
                    'type'  => 'text'
                )
            )?>
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>

        <dt><?=Form::label('period', '<span class="text-error tt" rel="tooltip" title="Поле обязательно для заполнения">Срок рассмотрения *</span>')?></dt>
        <dd>
            <?=Help::select(
                'period_id',
                (isset($periods) ? $periods : NULL),
                (isset($material) ? $material->period->id : NULL),
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

        <dt><?=Form::label('failure_cause', 'Причина отказа')?></dt>
        <dd>
            <?=Help::select(
                'failure_cause_id',
                (isset($failure_causes) ? $failure_causes : NULL),
                (isset($material) ? $material->failure_cause->id : NULL),
                array(
                    'id'    => 'failure_cause',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите причину отказа'
                )
            )?>
        </dd>

        <dt>
            <?=Form::label(
                'decree_cancel_date',
                'Дата отмены решения')?>
        </dt>
        <dd>
            <div class="input-append">
            <?=Form::input(
                'decree_cancel_date',
                (isset($material) ? $material->decree_cancel_date : NULL),
                array(
                    'id'    => 'decree_cancel_date',
                    'class' => 'span6 datepicker',
                    'type'  => 'text'
                )
            )?>
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>

        <dt><?=Form::label('extra_investigator', '(ДОП) Следователь')?></dt>
        <dd>
            <?=Help::select(
                'extra_investigator_id',
                (isset($investigators) ? $investigators : NULL),
                (isset($material) ? $material->extra_inv->id : NULL),
                array(
                    'id'    => 'extra_investigator',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите следователя для ДОП'
                )
            )?>
        </dd>

        <dt><?=Form::label('extra_period', '(ДОП) Срок рассмотрения')?></dt>
        <dd>
            <?=Help::select(
                'extra_period_id',
                (isset($periods) ? $periods : NULL),
                (isset($material) ? $material->extra_period->id : NULL),
                array(
                    'id'    => 'extra_period',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите срок рассмотрения для ДОП'
                )
            )?>
        </dd>

        <dt><?=Form::label('extra_decree', '(ДОП) Решение')?></dt>
        <dd>
            <?=Help::select(
                'extra_decree_id',
                (isset($decrees) ? $decrees : NULL),
                (isset($material) ? $material->extra_decree->id : NULL),
                array(
                    'id'    => 'extra_decree',
                    'class' => 'span2'
                ),
                array(
                    '' => 'Выберите решение для ДОП'
                )
            )?>
        </dd>

        <dt>
            <?=Form::label(
                'extra_decree_date',
                '(ДОП) Дата принятия решения')?>
        </dt>
        <dd>
            <div class="input-append">
            <?=Form::input(
                'extra_decree_date',
                (isset($material) ? $material->extra_decree_date : NULL),
                array(
                    'id'    => 'extra_decree_date',
                    'class' => 'span6 datepicker',
                    'type'  => 'text'
                )
            )?>
                 <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </dd>
        <?php
        if(Request::$current->action() == 'edit'){
            ?>
            <dt>
                <?=Form::label('edit-cause', '<span class="text-error tt" rel="tooltip" title="Поле обязательно для заполнения">Причина редактирования *</span>')?>
            </dt>
            <dd>
                <?=Form::textarea(
                    'edit-cause',
                    (!is_null(Arr::get($_POST, 'edit-cause', NULL)) ? Arr::get($_POST, 'edit-cause', NULL) : ''),
                    array(
                        'id'    => 'edit-cause',
                        'class' => 'span2',
                        'row'   => '4'
                    )
                )?>
                <span id="error-edit-cause" class="text-error"></span>
            </dd>
            <?php
        }
        ?>

    </dl>


    <div class="form-actions">
        <?php
        echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'material-save'));
        ?>
    </div>
</fieldset>
<?php
echo Form::close();
?>