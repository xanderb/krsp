<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.05.13
 * Time: 23:09
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="modal" id="filtersModal" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
    <div class="modal-header">
        <button class="close" aria-hidden="true" data-dismiss="modal" type="button">×</button>
        <h3 id="myModalLabel">Фильтры для таблицы сообщений</h3>
    </div>
    <div class="modal-body">
        <?=Form::open((isset($action) ? $action : '/filter/'), array(
            'name' => 'filter-form'
        ))?>
        <?php
        if(isset($sources))
        {
            ?>
            <fieldset>
                <legend>Источники сообщений</legend>
            <?php
            foreach($sources as $source)
            {
                echo Form::label(
                    'source'.$source->id,
                    Form::checkbox(
                        'sources[]',
                        $source->id,
                        (isset($filters['sources']) AND in_array($source->id, $filters['sources']) ? TRUE : FALSE),
                        array(
                            'id' => 'source'.$source->id
                        )
                    )
                    . ' '
                    . $source->text,
                    array(
                        'class' => 'checkbox'
                    )
                );
            }
            ?>
            </fieldset>
            <?php
        }

        if(isset($articles))
        {
            ?>
            <fieldset>
                <legend>Статьи УК РФ</legend>
                <?php
                foreach($articles as $article)
                {
                    echo Form::label(
                        'article'.$article->id,
                        Form::checkbox(
                            'articles[]',
                            $article->id,
                            (isset($filters['articles']) AND in_array($article->id, $filters['articles']) ? TRUE : FALSE),
                            array(
                                'id' => 'article'.$article->id
                            )
                        )
                        . ' '
                        . $article->value
                        . ' - '
                        . $article->text,
                        array(
                            'class' => 'checkbox'
                        )
                    );
                }
                ?>
            </fieldset>
        <?php
        }
        ?>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Закрыть</button>
        <button class="btn btn-primary" name="filter-submit" id="filter-submit">Сохранить</button>
    </div>
    <?=Form::close()?>
</div>