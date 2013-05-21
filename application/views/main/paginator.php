<div class="pagination pagination-centered">
    <ul>
        <li class="<?php
        if($last < 2){
            echo 'disabled';
        }elseif(isset($active)){
            if($active == 1)
                echo 'disabled';
        }
        ?>">
            <a href="<?=$core_url.'/page/'.'1'?>">
                На первую
            </a>
        </li>
        <?php
        if(isset($active) AND $active < 2)
        {
            $next_page = $active + 1;
            ?>
            <li class="active"><a href="#">Страница 1</a></li>
            <li><a href="<?=$core_url.'/page/'.$next_page?>">Вперед</a></li>
            <?php
        }
        elseif(isset($active) AND $active == $last)
        {
            $prev_page = $last - 1;
            ?>
            <li><a href="<?=$core_url.'/page/'.$prev_page?>">Назад</a></li>
            <li class="active"><a href="#">Страница <?=$last?></a></li>
            <?php
        }
        elseif(isset($active))
        {
            $next_page = $active + 1;
            $prev_page = $active - 1;
            ?>
            <li><a href="<?=$core_url.'/page/'.$prev_page?>">Назад</a></li>
            <li class="active"><a href="#">Страница <?=$active?></a></li>
            <li><a href="<?=$core_url.'/page/'.$next_page?>">Вперед</a></li>
            <?php
        }
        ?>
        <li class="<?php
        if($last < 2){
            echo 'disabled';
        }elseif(isset($active)){
            if($active == $last)
                echo 'disabled';
        }
        ?>"><a href="<?=($last < 2 ? $core_url : $core_url.'/page/'.$last)?>">На последнюю</a></li>
    </ul>
</div>