<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 21:49
 * To change this template use File | Settings | File Templates.
 */
if(isset($sub_admin_menus)){
    ?>
    <div class="sub_menu">
        <?php
        foreach($sub_admin_menus as $item){
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
                <th><?=$h['text']?></th>
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
                <tr class="js-row<?=date('Y', time()) > date('Y', strtotime($data->registration_date)) ? ' warning' : NULL?>">
                    <td class="js-id"><?=$data->id?></td>
                    <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr(date('Y', strtotime($data->registration_date)), 2, 2) : NULL?></td>
                    <td><?=date('d.m.Y H:i:s', strtotime($data->registration_date))?></td>
                    <td><?=$data->source->text?></td>
                    <td class="word-wrap">
                        <a class="plot" href="#cur" rel="popover" data-content="<?=$data->plot?>" data-original-title="Краткая фабула">
                            <?php echo mb_substr($data->plot, 0, 50).(strlen($data->plot) > 50 ? '&hellip;' : NULL); ?>
                        </a>
                    </td>
                    <td><?=$data->article_id?></td>
                    <td><?=$data->inv->name?></td>
                    <td class="char-wrap">
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
                    <?php /*<td><?=$data->decree->text?></td> */?>
                    <td><?=!is_null($data->decree_date)? date('d.m.Y H:i:s', strtotime($data->decree_date)) : ''?></td>
                    <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                    <td><?=$data->failure_cause->text?></td>
                    
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