/**
 * Created with JetBrains PhpStorm.
 * User: xanderb
 * Date: 24.07.13
 * Time: 13:54
 * To change this template use File | Settings | File Templates.
 */
$(function()
{
    function option_submit()
    {
        var param_v = $('#param').val();
        var value_v = $('#value').val();
        var type_v = $('#type').val();
        if(!text(param_v))
        {
            options();
            return false;
        }
        else if(!text(value_v))
        {
            options();
            return false;
        }
        else if(!text(type_v) && (type_v != 'checkbox' || type_v != 'input' || type_v != 'textarea'))
        {
            options();
            return false;
        }
        else
        {
            return true;
        }
    }
    function options()
    {
        var param_v = $('#param').val();
        var value_v = $('#value').val();
        var type_v = $('#type').val();
        if(!text(param_v))
        {
            $('#param').css('border', '1px solid red');
            $('#error-param').html('Это поле обязательно для заполнения');
        }
        else
        {
            $('#param').css('border', '1px solid green');
            $('#error-param').html('');
        }
        if(!text(value_v))
        {
            $('#value').css('border', '1px solid red');
            $('#error-value').html('Это поле обязательно для заполнения');
        }
        else
        {
            $('#value').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(type_v))
        {
            $('#type').css('border', '1px solid red');
            $('#error-type').html('Это поле обязательно для заполнения');
        }
        else
        {
            $('#type').css('border', '1px solid green');
            $('#error-type').html('');
        }
    }
    function text(val){
        var exp = val.length;
        if(!exp){
            return 0;
        }else{
            return 1;
        }
    }
    $('#option-form').submit(function(){
        return option_submit();
    });
});