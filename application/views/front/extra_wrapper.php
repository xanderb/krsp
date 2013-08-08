<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 07.08.13
 * Time: 16:04
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

if(isset($error))
{
    ?>
    <p class="alert alert-error"><?=$error?></p>
    <?php
}

?>
<p class="alert alert-info">
    Введите номер КРСП сообщения и год производства для указания сообщения, к которому необходимо добавить ДОП
</p>

<?php
echo Form::open(
        '',
        array(
            'class' => 'form-horizontal',
            'id' => 'extra-add-form'
        )
     );
?>
<div class="control-group">
    <?=Form::label(
        'krsp',
        'Номер КРСП',
        array(
            'class' => 'control-label'
        )
    )?>
    <div class="controls">
    <?php
    echo Form::input(
        'krsp_num',
        (isset($material) ? $material->source->text : NULL),
        array(
            'id' => 'krsp',
            'class' => 'span2',
            'placeholder' => 'Номер КРСП',
            'data-provide' => 'typeahead',
            'data-items' => '6',
            'data-source' => isset($krsps) ? $krsps : ''
        )
    );
    ?>
    </div>
</div>
<div class="control-group">
    <?=Form::label(
        'year',
        'Год производства',
        array(
            'class' => 'control-label'
        )
    )?>
    <div class="controls">
<?php
echo Form::input(
    'year',
    (isset($material) ? $material->source->text : NULL),
    array(
        'id' => 'year',
        'class' => 'span2',
        'placeholder' => 'Год производства',
        'data-provide' => 'typeahead',
        'data-items' => '6',
        'data-source' => isset($years) ? $years : ''
    )
);
?>
    </div>
</div>
<div class="control-group">
    <div class="controls">
        <a class="btn btn-primary" href="#add" id="submit">Добавить ДОП для сообщения</a>
    </div>
</div>
<?php


echo Form::close();

?>
