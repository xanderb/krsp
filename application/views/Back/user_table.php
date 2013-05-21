<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.04.13
 * Time: 22:52
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
if(isset($total_users) AND isset($badges))
{
    ?>
    <blockquote>
        <?php
        foreach($badges as $badge){
            ?>
            <p><?=$badge['text']?>: <span class="badge <?=$badge['class']?>"><?=$total_users?></span></p>
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
        <thead>
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
        </thead>
    <?php
    }
    ?>

    <?php
    if(isset($datas) AND count($datas) > 0){
        ?>
        <tbody>
        <?php
        if(!isset($short))
        {
            foreach($datas as $data){
                ?>
                <tr class="js-row">
                    <td class="js-id"><?=$data->id?></td>
                    <td class=""><?=$data->email?></td>
                    <td class=""><?=$data->username?></td>
                    <td class="">
                        <ul>
                            <?php
                            $roles = $data->roles->find_all();
                            foreach($roles as $role){
                                ?>
                                <li><abbr title="<?=$role->description?>"><?=$role->name?></abbr></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </td>

                </tr>
            <?php
            }
        }
        else
        {
            foreach($datas as $data){
                ?>
                <tr class="js-row">
                    <td class="js-id"><?=$data->id?></td>
                    <td class=""><?=$data->username?></td>
                    <td class="">
                        <ul>
                            <?php
                            $roles = $data->roles->find_all();
                            foreach($roles as $role){
                                ?>
                                <li><abbr class="tt" rel="tooltip" title="<?=$role->description?>"><?=$role->name?></abbr></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </td>

                </tr>
            <?php
            }
        }
        ?>
        </tbody>
        <?php
    }else{
        ?>
        <tbody>
            <tr>
                <td colspan="<?=(isset($t_headers)) ? count($t_headers) : 4?>" class="text-center">Записи не найдены</td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>