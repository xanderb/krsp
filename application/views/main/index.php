<!DOCTYPE html>
<html lang="ru">
<head>
    <meta content="text/html" charset="utf-8">
    <title><?php echo (isset($page_title)) ? $page_title : ''; ?></title>
    <?php
    if(isset($styles) AND is_array($styles)){
        foreach($styles as $style){
            ?>
                <link href="<?=URL::base()?>public/css/<?=$style?>.css" type="text/css" rel="stylesheet" >
            <?php
        }
    }
    ?>
    <?php
    if(isset($scripts) AND is_array($scripts)){
        foreach($scripts as $script){
            ?>
            <script src="<?=URL::base()?>public/js/<?=$script?>.js"></script>
        <?php
        }
    }
    ?>
</head>
<body>
<?php //ProfilerToolbar::render(true); //TODO сделать включаемой/отключаемой из админки?>
<?php
if(isset($filter_button)){
    echo $filter_button;
}
?>

<div class="wrapper">
    <div class="container-fluid" id="main_container">
        <header class="row-fluid">
            <div class="top_line span3">
                <?php
                if(isset($to_main)){
                    echo $to_main;
                }
                ?>
            </div>
            <div class="top_line span3 offset3">
                <?=isset($top_search) ? $top_search : NULL?>
            </div>
            <div class="top_line span3">
                <?php
                if(isset($userinfo)){
                    echo $userinfo;
                }
                ?>
            </div>
        </header>

        <div class="row-fluid">
            <?=isset($body) ? $body : 'Данных для вывода не найдено'?>
        </div>

    </div>
</div>
<footer class="">
    <div class="">
        <p>Программа разработана студией Graphic Science &copy; 2013 - <?=date('Y', time())?> гг.</p>
    </div>
</footer>
<?php
if(isset($debug)){   //Сделать отключаемым через админку (таблица БД опций)
    ?>
    <div class="debug alert alert-info"><?=$debug?></div>
    <?php
}
?>


</body>
</html>

