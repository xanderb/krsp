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
            <tr class="js-row">
                <td class="js-id hid"><?=$data->id?></td>
                <td><?=$data->krsp_num?></td>
                <td><?=date('d.m.Y', strtotime($data->registration_date))?></td>
                <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                <td class="word-wrap">
                    <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                        <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                    </a>
                </td>

                <td><?=$data->inv->name?></td>
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