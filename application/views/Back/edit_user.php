<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 28.04.13
 * Time: 22:04
 * To change this template use File | Settings | File Templates.
 */

/**
 * inserted variables:
 * $sub_menus - меню выводимое над формой
 * $error - если будут ошибки, выводить туда текстовку
 * $uinfo - объект юзера
 * $roles - список ролей пользователей
 * $legend - легенда формы
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
echo Form::open(
    '',
    array(
        'name' => 'user-form',
        'method' => 'post',
        'id' => 'user-form'
    )
);
?>
<fieldset>
<?php
    if(isset($legend)){
        ?>
        <legend><?=$legend?></legend>
        <?php
    }
echo Form::hidden('id', (isset($uinfo)) ? $uinfo->id: NULL);?>
    <dl>
        <dt><?=Form::label('form_username', 'Имя пользователя')?></dt>
        <dd>
            <?=Form::input(
                'form_username',
                (isset($uinfo->username) ? $uinfo->username : ''),
                array(
                    'id' => 'form_username',
                    'placeholder' => 'Латинские буквы и цифры',
                    'maxlength' => '32',
                    'class' => 'span2'
                )
            )?>
        </dd>
        <dt><?=Form::label('form_email', 'Email пользователя')?></dt>
        <dd>
            <?=Form::input(
                'form_email',
                (isset($uinfo->email) ? $uinfo->email : ''),
                array(
                    'id' => 'form_email',
                    'placeholder' => 'Введите email адрес',
                    'maxlength' => '254',
                    'class' => 'span2'
                )
            )?>
        </dd>
        <dt><?=Form::label('form_password', 'Пароль')?></dt>
        <dd>
            <?=Form::password(
                'form_password',
                '',
                array(
                    'id'    => 'form_password',
                    'class' => 'span2',
                    'maxlength' => '64',
                    'placeholder'   => 'Не менее 8 символов'
                )
            )?>
        </dd>
        <dt><?=Form::label('form_password_confirm', 'Подтверждение пароля')?></dt>
        <dd>
            <?=Form::password(
                'form_password_confirm',
                '',
                array(
                    'id'    => 'form_password_confirm',
                    'class' => 'span2',
                    'maxlength' => '64',
                    'placeholder'   => 'Пароль еще раз'
                )
            )?>
        </dd>
        <dt><?=Form::label('roles', 'Права пользователя')?></dt>
        <dd>
            <?php
                if(isset($roles) AND count($roles) > 0){
                    foreach($roles as $role){
                        echo Form::label(
                            'check'.$role->id,
                            $role->name,
                            array(
                                'title' => $role->description,
                                'class' => 'checkbox inline'
                            )
                        )
                            . ' '
                            . Form::checkbox(
                                'roles[]',
                                $role->id,
                                (isset($uinfo) AND $uinfo->has('roles', $role->id) ? TRUE : FALSE),
                                array(
                                    'id' => 'check'.$role->id,
                                    ((isset($role) AND ($role->name == 'login')) ? 'disabled' : NULL)
                                )
                            );
                    }
                }else{
                    ?>
                    <div class="alert alert-info">Прежде чем создавать пользователя необходимо создать <a href="/admin/roles">группы прав для пользователей</a></div>
                    <?php
                }
            ?>
        </dd>
    </dl>
    <div class="form-actions">
        <?php
        echo Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary', 'id' => 'save'));
        ?>
    </div>
</fieldset>
<?php
echo Form::close();
?>

