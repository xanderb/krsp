<?php
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
    <div class="alert alert-error">
        <?php
        if(is_array($error)){
            ?>
            <ul>
                <?php
                foreach($error as $err){
                    ?>
                    <li>
                        <?php
                        if(is_array($err)){
                            ?>
                            <ul>
                                <?php
                                foreach($err as $sub_err){
                                    ?>
                                    <li><?=$sub_err?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        <?php
                        }else{
                            echo $err;
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        <?php
        }else{
            echo $error;
        }
        ?>
    </div>
<?php
}

echo Form::open('', array('id' => 'sled-form'));
?>
<fieldset>
<?php
if(isset($legend)){
    ?>
    <legend><?=$legend?></legend>
<?php
}
echo Form::hidden('id', (isset($data)) ? $data->id: NULL);
?>
    <dl>
        <dt><?=Form::label('name', 'ФИО следователя')?></dt>
        <dd><?=Form::input(
                'name',
                (isset($data)) ? $data->name : '',
                array(
                    'type' => 'text',
                    'class' => 'span2',
                    'id'    => 'name',
                    'maxlength' => '250',
                )
            )?>
            <span id="error-name" class="text-error"></span>
        </dd>
        <dt><?=Form::label('position', 'Звание')?></dt>
        <dd><?=Form::input(
                'position',
                (isset($data)) ? $data->position : '',
                array(
                    'type'  => 'text',
                    'id'    => 'position',
                    'class' => 'span2',
                    'maxlength' => '100',
                )
            )?>
            <span id="error-position" class="text-error"></span>
        </dd>
    </dl>
    <div class="form-actions">
        <?php echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'sled-save')); ?>
    </div>

<?php
echo Form::hidden('sort', (isset($data)) ? $data->sort: NULL);
?>
</fieldset>
<?php
echo Form::close();
?>