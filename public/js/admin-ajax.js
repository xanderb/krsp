/**
 * Created with JetBrains PhpStorm.
 * User: xanderb
 * Date: 25.07.13
 * Time: 14:53
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('#save_all_options').click(function(event){
        var post_values = new Object();
        $('.values').each(function(index){
            id = $('.opt_id:eq('+index+')').val();
            if($(this).hasClass('opt_checkbox'))
            {
                val = $(this).prop('checked') ? 1 : 0;
            }
            if($(this).hasClass('opt_input') || $(this).hasClass('opt_textarea'))
                val = $(this).val();
            post_values['value['+id+']'] = val;
        });

        $.ajax({
            url: '/admin/option/change',
            type: 'post',
            data: post_values,
            async: true
        }).done(function(){
                location.href = "/admin/option";
            });
    });
});