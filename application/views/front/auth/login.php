<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 12.04.13
 * Time: 12:32
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="span4 offset4 auth">


<?php
if(isset($page_header))
{
    ?>
    <h1><?=$page_header?></h1>
    <?php
}

if(isset($warning_text)){
    ?>
    <div class="alert alert-<?=(isset($warning)) ? $warning : 'info'?>"><?=$warning_text?></div>
    <?php
}

echo Form::open(); ?>
<fieldset>
    <legend>Форма авторизации</legend>
    <dl>
        <dt><?php echo Form::label('username', 'Имя пользователя') ?></dt>
        <dd><?php echo Form::input('username', '', array('id' => 'username')) ?></dd>
        <dt><?php echo Form::label('password', 'Пароль') ?></dt>
        <dd><?php echo Form::password('password', '', array('id' => 'password')) ?></dd>
        <dt><?php echo Form::label('remember', 'Запомнить меня')?></dt>
        <dd><?php echo Form::checkbox('remember', 1, TRUE, array('id' => 'remember')) ?></dd>
    </dl>
    <div class="form-actions"><?php echo Form::submit(NULL, 'Войти', array('class' => 'btn btn-primary')); ?></div>
</fieldset>
<?php echo Form::close();?>

</div>