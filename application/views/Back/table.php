<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 17.04.13
 * Time: 22:00
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
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
if(isset($total_items) AND isset($badges))
{
    ?>
    <blockquote>
        <?php
        foreach($badges as $key => $badge){
            ?>
            <p><?=$badge['text']?>: <span class="badge <?=$badge['class']?>"><?=$total_items[$key]?></span></p>
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
        <caption class="caption-invert"><?=$caption?></caption>
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
        $i = 0;
        foreach($datas as $data){
            ?>
            <tr class="js-row">
                <?php
                for($i = 0; $i < count($t_headers); $i++){
                    ?>
                    <td <?=($i == 0) ? 'class="js-id"' : NULL?>><?=$data->$field[$i]?></td>
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
<?php
if(isset($paginator))
    echo $paginator;
?>