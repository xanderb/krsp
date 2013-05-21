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

echo Form::open('', array('id' => 'article-form'));
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
        <dt><?=Form::label('value_article', 'Статья')?></dt>
        <dd><?=Form::input(
                'value',
                (isset($data)) ? $data->value : '',
                array(
                    'type' => 'text',
                    'class' => 'span2',
                    'id'    => 'value_article',
                    'maxlength' => '50',
                    'placeholder' => 'Не более 50 символов'
                )
            )?>
            <span id="error-value" class="text-error"></span>
        </dd>
        <dt><?=Form::label('text_article', 'Описание статьи')?></dt>
        <dd><?=Form::textarea(
                'text',
                (isset($data)) ? $data->text : '',
                array(
                    'rows'  => '5',
                    'id'    => 'text_article',
                    'class' => 'span3'
                )
            )?>
            <span id="error-text" class="text-error"></span>
        </dd>
    </dl>
    <div class="form-actions">
        <?php echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'article-save')); ?>
    </div>

<?php
echo Form::hidden('sort', (isset($data)) ? $data->sort: NULL);
?>
</fieldset>
<?php
echo Form::close();
?>