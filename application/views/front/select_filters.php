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
    <h3 id="myModalLabel">Фильтры для таблицы сообщений</h3>
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
    <legend>Номер КРСП</legend>
    <div class="row-fluid">
        <div class="span5">
            <?=Form::label('krsp_num', 'Фильтр по номеру КРСП')?>
            <?=Form::input(
                'krsp_num[]',
                isset($filters['krsp_num'][0]) AND is_array($filters['krsp_num']) ? $filters['krsp_num'][0] : NULL,
                array(
                    'class' => 'span6',
                    'id' => 'krsp_num'
                )
            )?>
        </div>
        <div class="span5 offset2">
            <?=Form::label('null-krsp_num', 'Сообщения без номера КРСП')?>
            <?=Form::checkbox(
                'krsp_num',
                'NULL',
                isset($filters['krsp_num']) AND !is_array($filters['krsp_num']) ? TRUE : FALSE,
                array(
                    'class' => 'null_check',
                    'id' => 'null-krsp_num'
                )
            )?>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Дата регистрации сообщения</legend>
    <?=Form::label('registration_date', 'Фильтрация по дате регистрации сообщения')?>
    <?php echo Form::input(
        'registration_date[0]',
        isset($filters['registration_date'][0]) ? $filters['registration_date'][0] : NULL,
        array(
            'class' => 'span3 datepicker',
            'id' => 'registration_date_from'
        )
    ).' - '.
        Form::input(
            'registration_date[1]',
            isset($filters['registration_date'][1]) ? $filters['registration_date'][1] : NULL,
            array(
                'class' => 'span3 datepicker',
                'id' => 'registration_date_to'
            )
        )?>
</fieldset>
<?php
if(isset($sources))
{
    ?>
    <fieldset id="source-select">
        <legend>Источники сообщений</legend>
        <div class="row-fluid">
            <div class="span7">
            <?php
            if(isset($filters['sources']) AND is_array($filters['sources']) AND count($filters['sources']) > 0){
                foreach($filters['sources'] as $k_filter => $filter)
                {
                    echo Help::select(
                        'sources[]',
                        $sources,
                        $filter,
                        array(
                            'class' => 'source-select block',
                            'id' => ($k_filter == 0 ? 'first-source-select' : '')
                        ),
                        array('' => '=Источник сообщения='),
                        TRUE
                    );
                }
                echo Help::select(
                    'sources[]',
                    $sources,
                    NULL,
                    array(
                        'class' => 'source-select block',
                    ),
                    array('' => '=Источник сообщения='),
                    TRUE
                );
            }else{
                echo Help::select(
                    'sources[]',
                    $sources,
                    isset($filters['sources'][0]) ? $filters['sources'][0] : NULL,
                    array(
                        'class' => 'source-select block',
                        'id' => 'first-source-select',
                    ),
                    array('' => '=Источник сообщения='),
                    TRUE
                );
            }
            ?>
            </div>
            <div class="span5">
                <?=Form::label('null-sources', 'Сообщения без источника')?>
                <?=Form::checkbox(
                    'sources',
                    'NULL',
                    isset($filters['sources']) AND !is_array($filters['sources']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-sources'
                    )
                )?>
            </div>
        </div>
    </fieldset>
<?php
}

if(isset($articles))
{
    ?>
    <fieldset id="article-select">
        <legend>Статьи УК РФ</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['articles']) AND is_array($filters['articles']) AND count($filters['articles']) > 0){
                    foreach($filters['articles'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'articles[]',
                            $articles,
                            $filter,
                            array(
                                'class' => 'article-select block',
                                'id' => ($k_filter == 0 ? 'first-article-select' : '')
                            ),
                            array('' => '=Статьи УК РФ='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'articles[]',
                        $articles,
                        NULL,
                        array(
                            'class' => 'article-select block',
                        ),
                        array('' => '=Статьи УК РФ='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'articles[]',
                        $articles,
                        isset($filters['articles'][0]) ? $filters['articles'][0] : NULL,
                        array(
                            'class' => 'article-select block',
                            'id' => 'first-article-select',
                        ),
                        array('' => '=Статьи УК РФ='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-articles', 'Сообщения без статьи')?>
                <?=Form::checkbox(
                    'articles',
                    'NULL',
                    isset($filters['articles']) AND !is_array($filters['articles']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-articles'
                    )
                )?>
            </div>
        </div>
    </fieldset>
<?php
}
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
if(isset($chars))
{
    ?>
    <fieldset id="characteristic-select">
        <legend>Характеристика</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['characteristics']) AND is_array($filters['characteristics']) AND count($filters['characteristics']) > 0){
                    foreach($filters['characteristics'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'characteristics[]',
                            $chars,
                            $filter,
                            array(
                                'class' => 'characteristic-select block',
                                'id' => ($k_filter == 0 ? 'first-characteristic-select' : '')
                            ),
                            array('' => '=Характеристика='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'characteristics[]',
                        $chars,
                        NULL,
                        array(
                            'class' => 'characteristic-select block',
                        ),
                        array('' => '=Характеристика='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'characteristics[]',
                        $chars,
                        isset($filters['characteristics'][0]) ? $filters['characteristics'][0] : NULL,
                        array(
                            'class' => 'characteristic-select block',
                            'id' => 'first-characteristic-select',
                        ),
                        array('' => '=Характеристика='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-characteristics', 'Сообщения без характеристик')?>
                <?=Form::checkbox(
                    'characteristics',
                    'NULL',
                    isset($filters['characteristics']) AND !is_array($filters['characteristics']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-characteristics'
                    )
                )?>
            </div>
        </div>
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
                isset($filters['decree_date'][0]) AND is_array($filters['decree_date']) ? $filters['decree_date'][0] : NULL,
                array(
                    'class' => 'span4 datepicker',
                    'id' => 'decree_date_from'
                )
            ).' - '.
                Form::input(
                    'decree_date[1]',
                    isset($filters['decree_date'][1]) AND is_array($filters['decree_date']) ? $filters['decree_date'][1] : NULL,
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
<?php
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
if(isset($failure_causes))
{
    ?>
    <fieldset id="failure_cause-select">
        <legend>Причины для отмены решения</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['failure_causes']) AND is_array($filters['failure_causes']) AND count($filters['failure_causes']) > 0){
                    foreach($filters['failure_causes'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'failure_causes[]',
                            $failure_causes,
                            $filter,
                            array(
                                'class' => 'failure_cause-select block',
                                'id' => ($k_filter == 0 ? 'first-failure_cause-select' : '')
                            ),
                            array('' => '=Причина для отмены решения='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'failure_causes[]',
                        $failure_causes,
                        NULL,
                        array(
                            'class' => 'failure_cause-select block',
                        ),
                        array('' => '=Причина для отмены решения='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'failure_causes[]',
                        $failure_causes,
                        isset($filters['failure_causes'][0]) ? $filters['failure_causes'][0] : NULL,
                        array(
                            'class' => 'failure_cause-select block',
                            'id' => 'first-failure_cause-select',
                        ),
                        array('' => '=Причина для отмены решения='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-failure_causes', 'Сообщения без причин отмены решения')?>
                <?=Form::checkbox(
                    'failure_causes',
                    'NULL',
                    isset($filters['failure_causes']) AND !is_array($filters['failure_causes']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-failure_causes'
                    )
                )?>
            </div>
        </div>
    </fieldset>

<?php
}
?>
<fieldset>
    <legend>Дата отмены решения</legend>
    <div class="row-fluid">
        <div class="span7">
            <?=Form::label('decree_cancel_date', 'Фильтрация по дате отмены решения')?>
            <?php echo Form::input(
                'decree_cancel_date[0]',
                isset($filters['decree_cancel_date'][0]) AND is_array($filters['decree_cancel_date']) ? $filters['decree_cancel_date'][0] : NULL,
                array(
                    'class' => 'span4 datepicker',
                    'id' => 'decree_cancel_date_from'
                )
            ).' - '.
                Form::input(
                    'decree_cancel_date[1]',
                    isset($filters['decree_cancel_date'][1]) AND is_array($filters['decree_cancel_date']) ? $filters['decree_cancel_date'][1] : NULL,
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
    <fieldset id="extra_invest-select">
        <legend>(ДОП) Следователи</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['extra_investigators']) AND is_array($filters['extra_investigators']) AND count($filters['extra_investigators']) > 0){
                    foreach($filters['extra_investigators'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'extra_investigators[]',
                            $invs,
                            $filter,
                            array(
                                'class' => 'extra_invest-select block',
                                'id' => ($k_filter == 0 ? 'first-extra_invest-select' : '')
                            ),
                            array('' => '=(ДОП) Следователи='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'extra_investigators[]',
                        $invs,
                        NULL,
                        array(
                            'class' => 'extra_invest-select block',
                        ),
                        array('' => '=(ДОП) Следователи='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'extra_investigators[]',
                        $invs,
                        isset($filters['extra_investigators'][0]) ? $filters['extra_investigators'][0] : NULL,
                        array(
                            'class' => 'extra_invest-select block',
                            'id' => 'first-extra_invest-select',
                        ),
                        array('' => '=(ДОП) Следователи='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-extra_investigators', 'Сообщения без (ДОП) следователя')?>
                <?=Form::checkbox(
                    'extra_investigators',
                    'NULL',
                    isset($filters['extra_investigators']) AND !is_array($filters['extra_investigators']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-extra_investigators'
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
    <fieldset id="extra_period-select">
        <legend>(ДОП) Сроки рассмотрения сообщений</legend>
        <?php
        if(isset($filters['extra_periods']) AND count($filters['extra_periods']) > 0){
            foreach($filters['extra_periods'] as $k_filter => $filter)
            {
                echo Help::select(
                    'extra_periods[]',
                    $periods,
                    $filter,
                    array(
                        'class' => 'extra_period-select block',
                        'id' => ($k_filter == 0 ? 'first-extra_period-select' : '')
                    ),
                    array('' => '=(ДОП) Срок рассмотрения='),
                    TRUE
                );
            }
            echo Help::select(
                'extra_periods[]',
                $periods,
                NULL,
                array(
                    'class' => 'extra_period-select block',
                ),
                array('' => '=(ДОП) Срок рассмотрения='),
                TRUE
            );
        }else{
            echo Help::select(
                'extra_periods[]',
                $periods,
                isset($filters['extra_periods'][0]) ? $filters['extra_periods'][0] : NULL,
                array(
                    'class' => 'extra_period-select block',
                    'id' => 'first-extra_period-select',
                ),
                array('' => '=(ДОП) Срок рассмотрения='),
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
    <fieldset id="extra_decree-select">
        <legend>(ДОП) Решения по сообщению</legend>
        <div class="row-fluid">
            <div class="span7">
                <?php
                if(isset($filters['extra_decrees']) AND is_array($filters['extra_decrees']) AND count($filters['extra_decrees']) > 0){
                    foreach($filters['extra_decrees'] as $k_filter => $filter)
                    {
                        echo Help::select(
                            'extra_decrees[]',
                            $decrees,
                            $filter,
                            array(
                                'class' => 'extra_decree-select block',
                                'id' => ($k_filter == 0 ? 'first-extra_decree-select' : '')
                            ),
                            array('' => '=(ДОП) Решения по сообщению='),
                            TRUE
                        );
                    }
                    echo Help::select(
                        'extra_decree[]',
                        $decrees,
                        NULL,
                        array(
                            'class' => 'extra_decree-select block',
                        ),
                        array('' => '=(ДОП) Решения по сообщению='),
                        TRUE
                    );
                }else{
                    echo Help::select(
                        'extra_decrees[]',
                        $decrees,
                        isset($filters['extra_decrees'][0]) ? $filters['extra_decrees'][0] : NULL,
                        array(
                            'class' => 'extra_decree-select block',
                            'id' => 'first-extra_decree-select',
                        ),
                        array('' => '=(ДОП) Решения по сообщению='),
                        TRUE
                    );
                }
                ?>
            </div>
            <div class="span5">
                <?=Form::label('null-extra_decrees', 'Сообщения без (ДОП) решения')?>
                <?=Form::checkbox(
                    'extra_decrees',
                    'NULL',
                    isset($filters['extra_decrees']) AND !is_array($filters['extra_decrees']) ? TRUE : FALSE,
                    array(
                        'class' => 'null_check',
                        'id' => 'null-extra_decrees'
                    )
                )?>
            </div>
        </div>
    </fieldset>

<?php
}
?>
<fieldset>
    <legend>(ДОП) Дата принятия решения</legend>
    <div class="row-fluid">
        <div class="span7">
            <?=Form::label('extra_decree_date', 'Фильтрация по дате принятия решения (ДОП)')?>
            <?php echo Form::input(
                'extra_decree_date[0]',
                isset($filters['extra_decree_date'][0]) AND is_array($filters['extra_decree_date']) ? $filters['extra_decree_date'][0] : NULL,
                array(
                    'class' => 'span4 datepicker',
                    'id' => 'extra_decree_date_from'
                )
            ).' - '.
                Form::input(
                    'extra_decree_date[1]',
                    isset($filters['extra_decree_date'][1]) AND is_array($filters['extra_decree_date']) ? $filters['extra_decree_date'][1] : NULL,
                    array(
                        'class' => 'span4 datepicker',
                        'id' => 'extra_decree_date_to'
                    )
                )?>
        </div>
        <div class="span5">
            <?=Form::label('null-extra_decree_date', 'Сообщения без (ДОП) даты принятия решения')?>
            <?=Form::checkbox(
                'extra_decree_date',
                'NULL',
                isset($filters['extra_decree_date']) AND !is_array($filters['extra_decree_date']) ? TRUE : FALSE,
                array(
                    'class' => 'null_check',
                    'id' => 'null-extra_decree_date'
                )
            )?>
        </div>
    </div>
</fieldset>
</div>
<div class="modal-footer">
    <button class="btn" data-dismiss="modal">Закрыть</button>
    <a class="btn btn-danger" href="/filter/alldelete">Сбросить фильтры</a>
    <button class="btn btn-primary" name="filter-submit" id="filter-submit">Сохранить</button>
</div>
<?=Form::close()?>
</div>