<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 15.05.13
 * Time: 14:35
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="span12 left-padding">
    <h1><?=(isset($p_title) ? $p_title : 'Административная панель')?></h1>


<?php
/**
 * Основное меню приложения. Формат массивов:
 * array(
        array(
            'href', 'text', 'icon', 'type'
 *      ),
 *      array( 'href' ...)
 * для отдельной группы кнопок:
 *      array(
            array(
                'href', 'text', 'icon', 'type'
 *          ),
 *          array('href' ...)
 *      ),
 *      array('href'... OR array())
 * )
 *
 */
?>
    <div class="row-fluid">
        <div class="btn-toolbar">
        <?php
        if(isset($buttons))
        {
            foreach($buttons as $key => $button)
            {
                if(isset($button[$key]) AND is_array($button[$key]))
                {
                    ?>
                    <div class="btn-group">
                        <?php
                        foreach($button as $_button)
                        {
                            ?>
                            <a class="btn <?=Arr::get($_button, 'type', '')?> <?=Arr::get($_button, 'class', '')?>" href="<?=Arr::get($_button, 'href', '#')?>"  title="<?=Arr::get($_button, 'title', '')?>">
                                <?php
                                if(!is_null(Arr::get($_button, 'icon', NULL)))
                                {
                                    ?>
                                    <i class="<?=Arr::get($_button, 'icon', NULL)?>"></i>
                                    <?php
                                }
                                ?>
                                <?=Arr::get($_button, 'text', 'Текст потерялся :(')?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <a class="btn <?=Arr::get($_button, 'type', '')?> <?=Arr::get($_button, 'class', '')?>" href="<?=Arr::get($button, 'href', '#')?>" title="<?=Arr::get($_button, 'title', '')?>">
                        <?php
                        if(!is_null(Arr::get($button, 'icon', NULL)))
                        {
                            ?>
                            <i class="<?=Arr::get($button, 'icon', NULL)?>"></i>
                        <?php
                        }
                        ?>
                        <?=Arr::get($button, 'text', 'Текст потерялся :(')?>
                    </a>
                    <?php
                }
            }
        }
        ?>
    </div>
    </div>


    <div class="row-fluid">
        <div class="span12"><?=(isset($top_content) ? $top_content : NULL)?></div>
    </div>
    <div class="row-fluid">
        <div class="span6"><?=(isset($left_content) ? $left_content : NULL)?></div>
        <div class="span6"><?=(isset($right_content) ? $right_content : NULL)?></div>
    </div>
</div>

<?php
if(isset($filters))
{
    echo $filters;
    /*$filters_blocks = array_chunk($filters, $filters_per_block, TRUE);
    ?>
    <div class="row-fluid">
        <div class="alert alert-block alert-info span12">

        <h4>Данные в таблице отфильтрованы по следующим параметрам:</h4>
            <div class="row-fluid">
                <?php
                foreach($filters_blocks as $filters_block)
                {
                    ?>
                    <div class="span<?=$cells_per_block?>">
                        <?php
                        foreach($filters_block as $f_mark => $f_b)
                        {
                            ?><div class="well-very-small">
                                <span><?=$f_b['label']?>:</span>
                                <?php
                                foreach($f_b['elements'] as $k_f_e => $f_e)
                                {
                                    ?>
                                    <?=($k_f_e != 0 ? '&#9679;' : NULL)?> <code><?=$f_e?></code>
                                <?php
                                }
                            ?>
                            <a href="filter/delete/<?=$f_mark?>" class="close filter">&times;</a>
                            </div>
                            <?php
                        }
                        ?>

                    </div>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php*/
}
?>