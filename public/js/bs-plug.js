/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 02.05.13
 * Time: 15:29
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('.plot').popover({
        trigger: 'hover',
        html: 'true'
    });
    $('.tt').tooltip();
    $('.ttd').tooltip({
        placement: 'bottom'
    });
});