<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 04.06.13
 * Time: 14:49
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
    <caption  class="caption-<?=isset($caption_type) ? $caption_type : 'invert'?>"><?=$caption?></caption>
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
                <th <?php echo ($h['field'] == 'id' ? 'class="hid"' : NULL);?>><?=$h['text']?></th>
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
            <tr class="js-row<?=date('Y', time()) > date('Y', strtotime( isset($data->registration_date) ? $data->registration_date : $data->material->registration_date)) ? ' warning' : NULL?>">
                <?php
                if(isset($type))
                {
                    switch($type){
                        case 'today':
                            ?>
                            <td class="js-id hid"><?=$data->id?></td>
                            <td><?=$data->inv->name?></td>
                            <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->registration_date)), 2, 2) : NULL?></td>
                            <td class="word-wrap">
                                <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                                    <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                                </a>
                            </td>
                            <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                            <?php
                            break;
                        case 'fail':
                            ?>
                            <td class="js-id hid"><?=$data->id?></td>
                            <td><?=$data->inv->name?></td>
                            <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->registration_date)), 2, 2) : NULL?></td>
                            <td class="word-wrap">
                                <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                                    <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                                </a>
                            </td>
                            <td>
                                <?=date('d.m.Y', strtotime($data->registration_date) + ($data->period->days * 86400));?>
                            </td>
                            <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                            <?php
                            break;
                        case 'extra_today':
                            ?>
                            <td class="js-id hid"><?=$data->material->id?></td>
                            <td><?=$data->investigator->name?></td>
                            <td><?=$data->material->krsp_num?><?=isset($data->material->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->material->registration_date)), 2, 2) : NULL?></td>
                            <td class="word-wrap">
                                <a class="plot" href="#cur" rel="popover" data-content="<?=$data->material->plot?>" data-original-title="Краткая фабула">
                                    <?php echo mb_substr($data->material->plot, 0, 50).(strlen($data->material->plot) > 50 ? '&hellip;' : NULL); ?>
                                </a>
                            </td>
                            <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                            <?php
                            break;
                        case 'extra_fail':
                            ?>
                            <td class="js-id hid"><?=$data->material->id?></td>
                            <td><?=$data->investigator->name?></td>
                            <td><?=$data->material->krsp_num?><?=isset($data->material->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->material->registration_date)), 2, 2) : NULL?></td>
                            <td class="word-wrap">
                                <a class="plot" href="#cur" rel="popover" data-content="<?=$data->material->plot?>" data-original-title="Краткая фабула">
                                    <?php echo mb_substr($data->material->plot, 0, 50).(strlen($data->material->plot) > 50 ? '&hellip;' : NULL); ?>
                                </a>
                            </td>
                            <td>
                                <?=date('d.m.Y', strtotime($data->decree_cancel_date) + ($data->period->days * 86400));?>
                            </td>
                            <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                            <?php
                            break;
                    }
                }
                else
                {
                  ?>
                    <td class="js-id hid"><?=$data->id?></td>
                    <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->registration_date)), 2, 2) : NULL?></td>
                    <td><?=date('d.m.Y', strtotime($data->registration_date))?></td>
                    <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                    <td class="word-wrap">
                        <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                            <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                        </a>
                    </td>

                    <td><?=$data->inv->name?></td>
                <?php
                }
                ?>
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