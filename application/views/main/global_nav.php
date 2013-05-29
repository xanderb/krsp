<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.05.13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */

if(isset($user) AND $user->logged_in('admin'))
{
    ?>
    <a href="<?=isset($is_admin) ? '/' : '/admin'?>" class="btn btn-small">
        <i class="icon-<?=isset($is_admin) ? 'home' : 'lock'?>"></i>
        <?=isset($is_admin) ? 'На главную' : 'В админку'?>
    </a>
    <?php
}
?>
