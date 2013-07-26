<div class="span12">
    <h1><?=(isset($p_title) ? $p_title : 'Административная панель')?></h1>
    <div class="btn-toolbar">
        <?php
        if(isset($admin_menus)){
            ?>
            <div class="btn-group">
                <?php
                foreach($admin_menus as $menu){
                    ?>
                        <a class="btn <?=(isset($menu['class'])? $menu['class'] : 'btn-inverse')?>" href="<?=$menu['href']?>">
                            <?=$menu['text']?>
                        </a>
                <?php
                }
                ?>
            </div>
        <?php
        }

        if(isset($user_menus)){
            ?>
            <div class="btn-group">
                <?php
                foreach($user_menus as $menu){
                    ?>
                    <a class="btn btn-inverse" href="<?=$menu['href']?>">
                        <?=$menu['text']?>
                    </a>
                <?php
                }
                ?>
            </div>
        <?php
        }

        if(isset($sadmin_menu) AND $auth->logged_in('sadmin'))
        {
            ?>
            <div class="btn-group">
                <?php
                foreach($sadmin_menu as $menu)
                {
                    ?>
                    <a class="btn <?=isset($menu['type']) ? $menu['type'] : NULL ?>" href="<?=$menu['href']?>">
                        <?=$menu['text']?>
                    </a>
                    <?php
                }
                ?>
            </div>
            <?php
        }
    ?>
    </div>

    <?php
    if(isset($content)){
        echo $content;
    }
    ?>
</div>