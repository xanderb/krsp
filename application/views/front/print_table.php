<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 22.07.13
 * Time: 10:09
 * To change this template use File | Settings | File Templates.
 */
if(isset($datas))
{
    ?>
    <a href="javascript:window.print()" class="btn btn-primary">Печатать</a>
<table class="table table-bordered print-table">
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
    if(isset($type))
    {
        foreach($datas as $data){
            ?>
            <tr>
            <?php
            if($type == 'today')
            {
                ?>

                <td class="js-id hid"><?=$data->id?></td>
                <td><?=$data->inv->name?></td>
                <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr($data->work_year, 2, 2) : NULL?></td>
                <td class="word-wrap"><?=$data->plot?></td>
                <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                <?php
            }
            elseif($type == 'fail')
            {
                ?>
                <td class="js-id hid"><?=$data->id?></td>
                <td><?=$data->inv->name?></td>
                <td><?=$data->krsp_num?><?=isset($data->krsp_num) ? 'пр'.substr($data->work_year, 2, 2) : NULL?></td>
                <td class="word-wrap"><?=$data->plot?></td>
                <td>
                    <?=date('d.m.Y', strtotime($data->registration_date) + ($data->period->days * 86400));?>
                </td>
                <td><?=isset($data->period->days) ? $data->period->days.' дня(ей)' : ''?></td>
                <?php
            }
            ?>
            </tr>
        <?php
        }

    }
    ?>

</table>
    <?php
}
?>
<a href="/" class="print_link btn"><i class="icon-home"></i>Вернуться на главную</a>
