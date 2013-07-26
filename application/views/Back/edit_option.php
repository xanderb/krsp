<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xanderb
 * Date: 24.07.13
 * Time: 12:59
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

echo Form::open('', array('id' => 'option-form'));
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
        <dt><?=Form::label('param', 'Системное имя параметра')?></dt>
        <dd>
            <?php
            echo Form::input(
                    'param',
                    (isset($data)) ? $data->param : '',
                    array(
                        'id' => 'param',
                        'class' => 'input-medium',
                        'type' => 'text',
                        'placeholder' => 'Имя',
                        'maxlength' => '200'
                    )
                )
            ?>
            <span class="help-block">Имя должно быть уникальным</span>
            <span id="error-param" class="text-error"></span>
        </dd>
        <dt><?=Form::label('value', 'Значение параметра')?></dt>
        <dd>
            <?php
            echo Form::textarea(
                'value',
                (isset($data)) ? $data->value : '',
                array(
                    'rows'  => '5',
                    'id'    => 'value',
                    'class' => 'span3',
                    'placeholder' => 'Значение параметра'
                )
            );
            ?>
            <span class="help-block">Это же значение будет записано по умолчанию</span>
            <span id="error-value" class="text-error"></span>
        </dd>
        <dt><?=Form::label('label', 'Описание параметра')?></dt>
        <dd>
            <?php
            echo Form::input(
                'label',
                (isset($data)) ? $data->label : '',
                array(
                    'id' => 'label',
                    'class' => 'input-medium',
                    'type' => 'text',
                    'placeholder' => 'Описание',
                    'maxlength' => '255'
                )
            )
            ?>
            <span id="error-label" class="text-error"></span>
        </dd>
        <dt><?=Form::label('type', 'Тип параметра')?></dt>
        <dd>
            <?php
            echo Form::select(
                'type',
                Model_Option::$types,
                isset($data)? $data->type : NULL,
                array(
                    'id' => 'type',
                    'class' => 'span3',

                )
            )
            ?>
            <span id="error-type" class="text-error"></span>
        </dd>
    </dl>
    <div class="form-actions">
        <?php echo Form::button('option-submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'option-save')); ?>
    </div>
</fieldset>
<?=Form::close()?>