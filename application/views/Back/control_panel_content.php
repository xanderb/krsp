<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 18:49
 * To change this template use File | Settings | File Templates.
 */?>
<div class="btn-toolbar">
    <?php
    if(isset($cp_menu)){
        ?>
        <div class="btn-group">
        <?php
        foreach($cp_menu as $cmenu){
            ?>
            <a href="<?=$cmenu['href']?>" class="btn <?=$cmenu['class']?> btn-large"><?=$cmenu['text']?></a>
            <?php
        }
        ?>
        </div>
        <?php
    }
    ?>
</div>
<div class="row-fluid">
    <div class="span12">
        <?=(isset($material_table) ? $material_table : NULL)?>
    </div>
</div>
<div class="row-fluid">
    <div class="span3">
        <?=(isset($user_table) ? $user_table : NULL)?>
    </div>
</div>