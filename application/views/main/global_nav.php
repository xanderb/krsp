<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 27.05.13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */

?>
<a href="<?=URL::site('')?>" class="btn btn-small"><i class="icon-home"></i> На главную</a>
<?php
if(isset($user) AND $user->logged_in('admin'))
{
    ?>
    <a href="/admin" class="btn btn-small">
        <i class="icon-lock"></i> В админку
    </a>
    <?php
}
?>
