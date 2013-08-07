/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 07.08.13
 * Time: 16:11
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('#submit').click(function(event)
    {
        var href = '/extra/add/';
        var krsp_num = $('#krsp').val();
        var year = $('#year').val();

        if(krsp_num != '' && year != '')
        {
            href = href + krsp_num + '/' + year;
            location.href = href;
        }
    });
});