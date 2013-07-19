<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.04.13
 * Time: 12:33
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript">
    $(function(){
       setTimeout(function(){
           location.href = '<?=$back_path?>';
       }, 1000);
    });
</script>
<div class="span11">
    <h1>Успешно</h1>
    <div class="alert alert-success"><?=$message?></div>
    <a class="btn" href="<?=$back_path?>"><?=$back_path_text?></a>
</div>