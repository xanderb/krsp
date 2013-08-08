<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 08.08.13
 * Time: 16:14
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 22.05.13
 * Time: 14:41
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="modal" id="filtersModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
<div class="modal-header">
    <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
    <h3 id="myModalLabel">Фильтры для таблицы ДОПов</h3>
</div>
<div class="modal-body">
<?=Form::open(
    (isset($action) ? $action : '/filter/'),
    array(
        'name' => 'filter-form',
        'id' => 'filter-form'
    )
)?>
<fieldset>
    <legend>Дата отмены решения</legend>
    <div class="row-fluid">
        <div class="span7">
            <?=Form::label('decree_cancel_date', 'Фильтрация по дате отмены решения')?>
            <?php echo Form::input(
                    'decree_cancel_date[0]',
                    isset($filters['decree_cancel_date'][0]) ? $filters['decree_cancel_date'][0] : NULL,
                    array(
                        'class' => 'span4 datepicker',
                        'id' => 'decree_cancel_date_from'
                    )
                ).' - '.
                Form::input(
                    'decree_cancel_date[1]',
                    isset($filters['decree_cancel_date'][1]) ? $filters['decree_cancel_date'][1] : NULL,
                    array(
                        'class' => 'span4 datepicker',
                        'id' => 'decree_cancel_date_to'
                    )
                )?>
        </div>
        <div class="span5">
            <?=Form::label('null-decree_cancel_date', 'Сообщения без даты отмены решения')?>
            <?=Form::checkbox(
                'decree_cancel_date',
                'NULL',
                isset($filters['decree_cancel_date']) AND !is_array($filters['decree_cancel_date']) ? TRUE : FALSE,
                array(
                    'class' => 'null_check',
                    'id' => 'null-decree_cancel_date'
                )
            )?>
        </div>
    </div>
</fieldset>
<?php
if(isset($invs))
{
    ?>
    <fieldset id="invest-select">
        <legend>Следователи</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['investigators']) AND is_array($filters['investigators']) AND count($filters['investigators']) > 0){
                    foreach($filters['investigators'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'investigators[]',
                            $invs,
                            $filter,
                            array(
                                'class' => 'invest-select block',
                                'id' => ($k_filter == 0 ? 'first-invest-select' : '')
                            ),
                            array('' => '=Следователи='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'investigators[]',
                        $invs,
                        NULL,
                        array(
                            'class' => 'invest-select block',
                        ),
                        array('' => '=Следователи='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'investigators[]',
                        $invs,
                        isset($filters['investigators'][0]) ? $filters['investigators'][0] : NULL,
                        array(
                            'class' => 'invest-select block',
                            'id' => 'first-invest-select',
                        ),
                        array('' => '=Следователи='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-investigators', 'Сообщения без следователя')?>
                <?=Form::checkbox(
                    'investigators',
                    'NULL',
                    isset($filters['investigators']) AND !is_array($filters['investigators']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-investigators'
                    )
                )?>
            </div>
        </div>
    </fieldset>
<?php
}
if(isset($periods))
{
    ?>
    <fieldset id="period-select">
        <legend>Сроки рассмотрения сообщений</legend>
        <?php
        if(isset($filters['periods']) AND count($filters['periods']) > 0){
            foreach($filters['periods'] as $k_filter => $filter)
            {
                echo Help::select(
                    'periods[]',
                    $periods,
                    $filter,
                    array(
                        'class' => 'period-select block',
                        'id' => ($k_filter == 0 ? 'first-period-select' : '')
                    ),
                    array('' => '=Срок рассмотрения='),
                    TRUE
                );
            }
            echo Help::select(
                'periods[]',
                $periods,
                NULL,
                array(
                    'class' => 'period-select block',
                ),
                array('' => '=Срок рассмотрения='),
                TRUE
            );
        }else{
            echo Help::select(
                'periods[]',
                $periods,
                isset($filters['periods'][0]) ? $filters['periods'][0] : NULL,
                array(
                    'class' => 'period-select block',
                    'id' => 'first-period-select',
                ),
                array('' => '=Срок рассмотрения='),
                TRUE
            );
        }
        ?>
    </fieldset>

<?php
}
if(isset($decrees))
{
    ?>
    <fieldset id="decree-select">
        <legend>Решения по сообщению</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['decrees']) AND is_array($filters['decrees']) AND count($filters['decrees']) > 0){
                    foreach($filters['decrees'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'decrees[]',
                            $decrees,
                            $filter,
                            array(
                                'class' => 'decree-select block',
                                'id' => ($k_filter == 0 ? 'first-decree-select' : '')
                            ),
                            array('' => '=Решения по сообщению='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'decree[]',
                        $decrees,
                        NULL,
                        array(
                            'class' => 'decree-select block',
                        ),
                        array('' => '=Решения по сообщению='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'decrees[]',
                        $decrees,
                        isset($filters['decrees'][0]) ? $filters['decrees'][0] : NULL,
                        array(
                            'class' => 'decree-select block',
                            'id' => 'first-decree-select',
                        ),
                        array('' => '=Решения по сообщению='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-decrees', 'Сообщения без решения')?>
                <?=Form::checkbox(
                    'decrees',
                    'NULL',
                    isset($filters['decrees']) AND !is_array($filters['decrees']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-decrees'
                    )
                )?>
            </div>
        </div>
    </fieldset>

<?php
}
?>
<fieldset>
    <legend>Дата принятия решения</legend>
    <div class="row-fluid">
        <div class="span7">
            <?=Form::label('decree_date', 'Фильтрация по дате принятия решения')?>
            <?php echo Form::input(
                    'decree_date[0]',
                    isset($filters['decree_date'][0]) ? $filters['decree_date'][0] : NULL,
                    array(
                        'class' => 'span4 datepicker',
                        'id' => 'decree_date_from'
                    )
                ).' - '.
                Form::input(
                    'decree_date[1]',
                    isset($filters['decree_date'][1]) ? $filters['decree_date'][1] : NULL,
                    array(
                        'class' => 'span4 datepicker',
                        'id' => 'decree_date_to'
                    )
                )?>
        </div>
        <div class="span5">
            <?=Form::label('null-decree_date', 'Сообщения без даты принятия решения')?>
            <?=Form::checkbox(
                'decree_date',
                'NULL',
                isset($filters['decree_date']) AND !is_array($filters['decree_date']) ? TRUE : FALSE,
                array(
                    'class' => 'null_check',
                    'id' => 'null-decree_date'
                )
            )?>
        </div>
    </div>
</fieldset>

</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal">Закрыть</button>
    <a class="btn btn-danger" href="<?=isset($clear_filters) ? $clear_filters : '/filter/alldelete'?>">Сбросить фильтры</a>
    <button class="btn btn-primary" name="filter-submit" id="filter-submit">Сохранить</button>
</div>
<?=Form::close()?>
</div>