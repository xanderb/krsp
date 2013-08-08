<?php
/**
 * Created by JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.05.13
 * Time: 23:43
 * To change this template use File | Settings | File Templates.
 */
?>
<script type="text/javascript">
    $(function(){
        var width = $('#filter_button').width();
        var left = width / 2;
        $('#filter_button').css('left', -left+'px');
    });
</script>
<a id="filter_button" class="btn btn-<?=isset($success) ? 'success' : 'inverse'?> btn-large left-button filters" href="#none" data-toggle="modal" data-target="#filtersModal" role="button">
    <i class="icon-filter icon-white"></i> <?=isset($text) ? $text : 'Фильтр сообщений'?>
</a>
