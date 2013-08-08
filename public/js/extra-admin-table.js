/**
 * Created with JetBrains PhpStorm.
 * User: xanderb
 * Date: 29.07.13
 * Time: 14:37
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('.toggler').click(function(event)
    {
        $('.toggler').removeClass('success');
        var mat_id = $(this).attr('tab-toggle');
        $('.hid').hide();
        $('#extra'+mat_id).show();
        $(this).addClass('success');
    });
    $('.extra-js-row').click(function(e){
        $('.js-row').removeClass('info');
        $(this).addClass('info');
        var row_id = $(this).find('.js-id').html();
        if($('.js-p.changed').length < 1){
            hrefs = [];
        }
        if($('.js-f.changed').length < 1){
            actions = [];
        }

        $('.js-p').each(function(n, val){
            if($(this).hasClass('changed') == false){
                hrefs[n] = $(val).attr('href');
                $(this).addClass('changed');
            }
            var href = hrefs[n];
            href = href + "/" +row_id;
            $(this).attr('href', href);
        });
        $('.js-f').each(function(n, val){
            if($(this).hasClass('changed') == false){
                actions[n] = $(val).prop('action');
                $(this).addClass('changed');
            }
            var action = actions[n];
            action = action + "/" +row_id;
            $(this).prop('action', action);
        });
    });

    $('.js-row').hover(function(e){
        $(this).addClass('success').css('cursor', 'pointer');
    }, function(e){
        $(this).removeClass('success');
    }).find('td').click(function(e){
            var id = $(this).parent().find('.js-id').html();
            //alert('сработало. id = '+id);
            var contr = $('span#controller').html();
            if(contr == '' || contr == undefined)
                contr = 'material';
            location.href = "/"+contr+"/info/"+id;
        });
});