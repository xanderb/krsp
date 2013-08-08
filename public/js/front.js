/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.05.13
 * Time: 13:19
 * To change this template use File | Settings | File Templates.
 */
$(function(){

    function date_check(from, to, text, obj){
        if(to < from){
            alert(text);
            $(obj).css('border', '1px solid red');
            return false;
        }else{
            $(obj).css('border', '1px solid green');
            return true;
        }
    }
    function filter_submit(e){
        var rdf = $('#registration_date_from').val().split('.');
        var rdt = $('#registration_date_to').val().split('.');

        var to = new Date(rdt[2], rdt[1], rdt[0]).getTime();
        var from = new Date(rdf[2], rdf[1], rdf[0]).getTime();
        if(!date_check(from, to, 'Задан некорректный диапазон даты регистрации', $('#registration_date_to'))){
            return false;
        }
        rdf = $('#decree_date_from').val().split('.');
        rdt = $('#decree_date_to').val().split('.');

        to = new Date(rdt[2], rdt[1], rdt[0]).getTime();
        from = new Date(rdf[2], rdf[1], rdf[0]).getTime();
        if(!date_check(from, to, 'Задан некорректный диапазон даты принятия решения', $('#decree_date_to'))){
            return false;
        }
        rdf = $('#decree_cancel_date_from').val().split('.');
        rdt = $('#decree_cancel_date_to').val().split('.');

        to = new Date(rdt[2], rdt[1], rdt[0]).getTime();
        from = new Date(rdf[2], rdf[1], rdf[0]).getTime();
        if(!date_check(from, to, 'Задан некорректный диапазон даты отмены решения', $('#decree_cancel_date_to'))){
            return false;
        }
        rdf = $('#extra_decree_date_from').val().split('.');
        rdt = $('#extra_decree_date_to').val().split('.');

        to = new Date(rdt[2], rdt[1], rdt[0]).getTime();
        from = new Date(rdf[2], rdf[1], rdf[0]).getTime();
        if(!date_check(from, to, 'Задан некорректный диапазон даты принятия решения по ДОП', $('#extra_decree_date_to'))){
            return false;
        }
        return true;
    }
    $('#filter-form').submit(
        function(e)
        {
            filter_submit(e);
        }
    );
    $('#krsp_num').keypress(function(e){
        if(e.keyCode == 13){
            $('#filter-form').submit();
        }
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

    $('.null_check').click(function(e){
        if($(this).prop('checked'))
        {
            if($(this).parent().parent().find('input[type="text"]').length > 0)
                $(this).parent().parent().find('input[type="text"]').attr('disabled', 1);
            else
                $(this).parent().parent().find('select').each(function(){
                    $(this).attr('disabled', 1);
                });
        }
        else
        {
            if($(this).parent().parent().find('input[type="text"]').length > 0)
                $(this).parent().parent().find('input[type="text"]').removeAttr('disabled');
            else
                $(this).parent().parent().find('select').each(function(){
                    $(this).removeAttr('disabled')
                });
        }
    });
});