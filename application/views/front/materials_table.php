<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 21:49
 * To change this template use File | Settings | File Templates.
 */
if(isset($sub_menus)){
    ?>
    <div class="sub_menu">
        <?php
        foreach($sub_menus as $item){
            ?>
            <a class="btn <?=isset($item['class']) ? $item['class'] : NULL?> <?php
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
<?php
if(isset($total_materials) AND isset($badges))
{
    ?>
        <blockquote>
            <?php
            foreach($badges as $badge){
                ?>
                <p><?=$badge['text']?>: <span class="badge <?=$badge['class']?>"><?=$total_materials?></span></p>
                <?php
            }
            ?>

        </blockquote>
    <?php
}
?>
<table class="table table-striped table-bordered">
    <?php
    if(isset($caption)){
        ?>
        <caption  class="caption-invert"><?=$caption?></caption>
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
                <th>
                    <?php
                    if(!isset($sort) OR count($sort) < 1)
                    {
                        ?>
                    <a href="
                        <?php
                        echo Route::url(
                            'sort',
                            array(
                                'field' => $h['field'],
                                'direction' => $h['field'] != 'registration_date' ? 'DESC' : 'ASC'
                            )
                        );
                        ?>
                    "><?=$h['text']?> <div class="sort-direction-block"><span class="sort-chevron"><?=$h['field'] != 'registration_date' ? '&#709;' : '&#708;'?></span></div></a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="
                        <?php
                        echo Route::url(
                            'sort',
                            array(
                                'field' => $h['field'],
                                'direction' => $h['field'] != $sort['field'] ? 'DESC' : ($sort['direction'] == 'ASC') ? 'DESC' : 'ASC'
                            )
                        );
                        ?>
                    "><?=$h['text']?> <div class="sort-direction-block"><span class="sort-chevron"><?=$h['field'] != $sort['field'] ? '&#709;' : ($sort['direction'] == 'ASC') ? '&#708;' : '&#709;'?></span></div></a>
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
    ?>

    <?php
    if(isset($datas) AND count($datas) > 0){

            foreach($datas as $data){
                ?>
                <tr class="js-row">
                    <td class="js-id"><?=$data->id?></td>
                    <td><?=$data->krsp_num?></td>
                    <td><?=date('d.m.Y H:i:s', strtotime($data->registration_date))?></td>
                    <td><?=$data->source->text?></td>
                    <td class="word-wrap">
                        <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                            <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                        </a>
                    </td>
                    <td><abbr class="ttd" rel="tooltip" title="<?=$data->article->text?>"><?=$data->article->value?></abbr></td>
                    <td><?=$data->inv->name?></td>
                    <td>
                        <?php
                        $chars = $data->characteristic->find_all();
                        ?>
                        <ul>
                        <?php
                        foreach($chars as $char){
                           ?>
                            <li><?=$char->text?></li>
                            <?php
                        }
                        ?>
                        </ul>
                    </td>
                    <td><?=$data->decree->text?></td>
                    <td><?=!is_null($data->decree_date)? date('d.m.Y H:i:s', strtotime($data->decree_date)) : ''?></td>
                    <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                    <td><?=$data->failure_cause->text?></td>
                    <td><?=!is_null($data->decree_cancel_date)? date('d.m.Y H:i:s', strtotime($data->decree_cancel_date)) : ''?></td>
                    <td><?=$data->extra_inv->name?></td>
                    <td><?=isset($data->extra_period->days) ? $data->extra_period->days.' дня(ей)' : ''?></td>
                    <td><?=$data->extra_decree->text?></td>
                    <td><?=!is_null($data->extra_decree_date)? date('d.m.Y H:i:s', strtotime($data->extra_decree_date)) : ''?></td>
                </tr>
                <?php
            }

    }else{
        ?>
        <tr>
            <td colspan="<?=(isset($t_headers)) ? count($t_headers) : 4?>" class="text-center">Записи не найдены</td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
if(isset($paginator))
    echo $paginator;
?>