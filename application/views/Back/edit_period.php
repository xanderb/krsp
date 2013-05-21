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
?>
<?php
echo Form::open('', array('id' => 'period-form'));
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
    <dt><?=Form::label('days', 'Срок рассмотрения')?></dt>
    <dd><div class="input-append">
        <?=Form::input(
            'days',
            (isset($data)) ? $data->days : '',
            array(
                'type' => 'text',
                'class' => 'span6',
                'id'    => 'days',
                'placeholder' => 'Целое число'
            )
        )?><span class="add-on">дней</span></div>
        <span id="error-days" class="text-error"></span>
    </dd>
</dl>
    <div class="form-actions">
        <?php echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'period-save')); ?>
    </div>

<?php
echo Form::hidden('sort', (isset($data)) ? $data->sort: NULL);
?>
</fieldset>
<?php
echo Form::close();
?>