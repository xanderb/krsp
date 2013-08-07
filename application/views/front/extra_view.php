<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 29.07.13
 * Time: 16:47
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
<div class="row-fluid">
<?php
if($materials->count() AND $extras->count())
{
?>
    <div class="span5">
        <table class="table table-striped table-bordered table-hover">
            <?php
            if(isset($caption_material)){
                ?>
                <caption  class="caption-invert"><?=$caption_material?></caption>
            <?php
            }
            ?>
            <?php
            if(isset($material_headers)){
                ?>
                <tr class="table_header">
                    <?php
                    foreach($material_headers as $h){
                        ?>
                        <th <?=$h['field'] == 'id' ? 'class="hid"' : NULL?>><?=$h['text']?></th>
                        <?php
                        $field[] = $h['field'];
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
            <tbody class="tabs">
            <?php
            if(isset($materials))
            {
                foreach($materials as $material)
                {
                    if(!isset($first_material))
                        $first_material = $material->id;
                    ?>
                <tr class="toggler" tab-toggle="<?=$material->id?>">
                    <td class="hid"><?=$material->id?></td>
                    <td><?=$material->krsp_num?></td>
                    <td><?=$material->inv->name?></td>
                    <td><?=$material->article_id?></td>
                    <td><?=!is_null($material->registration_date) ? date('d.m.Y', strtotime($material->registration_date)) : ''?></td>
                    <td><?=$material->ecount?></td>
                </tr>
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="span7">
        <?php
        if(isset($extras))
        {

            ?>
            <table class="table table-striped table-bordered hid" id="extra<?=isset($first_material) ? $first_material : NULL?>">
                <?php
                if(isset($caption_extra)){
                    ?>
                    <caption  class="caption-invert"><?=$caption_extra?></caption>
                <?php
                }
                ?>
                <?php
                if(isset($extra_headers))
                {
                    ?>
                    <tr class="table_header">
                        <?php
                        foreach($extra_headers as $h){
                            ?>
                            <th <?=$h['field'] == 'id' ? 'class="hid"' : NULL?>><?=$h['text']?></th>
                            <?php
                            $field[] = $h['field'];
                        }
                        ?>
                    </tr>
                <?php
                }

                foreach($extras as $extra)
                {
                    if(!isset($prev_material))
                        $prev_material = $first_material;

                    //echo Debug::vars($prev_material, $first_material, $extra->parent);
                    if($prev_material != $extra->material_id)
                    {
                        ?>
                        </table>
                        <table class="table table-striped table-bordered hid" id="extra<?=$extra->material_id?>">
                            <?php
                            if(isset($caption_extra)){
                                ?>
                                <caption  class="caption-invert"><?=$caption_extra?></caption>
                            <?php
                            }
                            ?>
                            <?php
                            if(isset($extra_headers))
                            {
                                ?>
                                <tr class="table_header">
                                    <?php
                                    foreach($extra_headers as $h){
                                        ?>
                                        <th <?=$h['field'] == 'id' ? 'class="hid"' : NULL?>><?=$h['text']?></th>
                                        <?php
                                        $field[] = $h['field'];
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr class="js-row">
                                <td class="js-id hid"><?=$extra->id?></td>
                                <td><?=$extra->material->krsp_num.' от '.date('d.m.Y', strtotime($extra->material->registration_date))?></td>
                                <?php /*<td><?=!is_null($extra->parent->decree_cancel_date) ? 'От '.date('d.m.Y', strtotime($extra->parent->decree_cancel_date)) : ''?></td>*/ ?>
                                <td><?=!is_null($extra->decree_cancel_date) ? date('d.m.Y', strtotime($extra->decree_cancel_date)) : ''?></td>
                                <td><?=$extra->investigator->name?></td>
                                <td><?=$extra->period->days.' дня(ей)'?></td>
                                <td><?=$extra->decree->text?></td>
                                <td><?=!is_null($extra->decree_date) ? date('d.m.Y', strtotime($extra->decree_date)) : ''?></td>
                            </tr>
                            <?php
                    }
                    else
                    {
                        ?>
                        <tr class="js-row">
                            <td class="js-id hid"><?=$extra->id?></td>
                            <td><?=$extra->material->krsp_num.' от '.date('d.m.Y', strtotime($extra->material->registration_date))?></td>
                            <?php /*<td><?=!is_null($extra->parent->decree_cancel_date) ? 'От '.date('d.m.Y', strtotime($extra->parent->decree_cancel_date)) : ''?></td>*/ ?>
                            <td><?=!is_null($extra->decree_cancel_date) ? date('d.m.Y', strtotime($extra->decree_cancel_date)) : ''?></td>
                            <td><?=$extra->investigator->name?></td>
                            <td><?=$extra->period->days.' дня(ей)'?></td>
                            <td><?=$extra->decree->text?></td>
                            <td><?=!is_null($extra->decree_date) ? date('d.m.Y', strtotime($extra->decree_date)) : ''?></td>
                        </tr>
                        <?php
                    }

                    $prev_material = $extra->material_id;
                }
                ?>
            </table>
            <?php

        }
        ?>

    </div>
<?php

}
else
{
?>
<div class="span12">
    <div class="alert">В базе нет сообщений с ДОПами</div>
</div>
<?php
}
?>
</div>