<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 01.05.13
 * Time: 14:36
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


<?php
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
echo Form::open('', array('id' => 'role-form'));?>

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
        <dt><?=Form::label('role-name', 'Название роли')?></dt>
        <dd><?=Form::input(
                'name',
                (isset($data)) ? $data->name : '',
                array(
                    'type' => 'text',
                    'class' => 'span3',
                    'id'    => 'role-name',
                    'maxlength' => '32',
                    'placeholder' => 'Не меньше 4 и не больше 32 символов'
                )
            )?>
            <span id="error-name" class="text-error"></span>
        </dd>
        <dt><?=Form::label('role-description', 'Описание роли')?></dt>
        <dd><?=Form::textarea(
                'description',
                (isset($data)) ? $data->description : '',
                array(
                    'id'    => 'role-description',
                    'class' => 'span3',
                    'maxlength' => '250',
                    'rows' => '6'
                )
            )?>
            <span id="error-description" class="text-error"></span>
        </dd>

    </dl>
    <div class="form-actions"><?php echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'role-save')); ?></div>
<?php
echo Form::close();
?>