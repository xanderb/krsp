/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.05.13
 * Time: 13:19
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('.datepicker').datepicker($.datepicker.regional['ru']);

    /*Select-form Scripts / Скрипты для select-формы фильтров*/
    function universal_select(obj, text_obj, append_text){
        var value = $(obj).val();
        if(value != ''){
            var exemp = $(text_obj).clone().removeAttr('id').find('option').removeAttr('selected').parent().bind('change', function(e){ universal_select(this, text_obj, append_text); });
            $(append_text).append(exemp);
            $(obj).unbind('change');
        }
    }

    $('.source-select').change(function(e){
        universal_select(this, '#first-source-select', 'fieldset#source-select');
    });
    $('.article-select').change(function(e){
        universal_select(this, '#first-article-select', 'fieldset#article-select');
    });
    $('.invest-select').change(function(e){
        universal_select(this, '#first-invest-select', 'fieldset#invest-select');
    });
    $('.decree-select').change(function(e){
        universal_select(this, '#first-decree-select', 'fieldset#decree-select');
    });
    $('.period-select').change(function(e){
        universal_select(this, '#first-period-select', 'fieldset#period-select');
    });
    $('.failure_cause-select').change(function(e){
        universal_select(this, '#first-failure_cause-select', 'fieldset#failure_cause-select');
    });
    $('.extra_invest-select').change(function(e){
        universal_select(this, '#first-extra_invest-select', 'fieldset#extra_invest-select');
    });
    $('.extra_period-select').change(function(e){
        universal_select(this, '#first-extra_period-select', 'fieldset#extra_period-select');
    });
    $('.extra_decree-select').change(function(e){
        universal_select(this, '#first-extra_decree-select', 'fieldset#extra_decree-select');
    });
    $('.characteristic-select').change(function(e){
        universal_select(this, '#first-characteristic-select', 'fieldset#characteristic-select');
    });
    /**END Select-Form Scripts****/

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
    $('#filter-form').submit(function(e){
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
    });

    $('.js-row').hover(function(e){
        $(this).addClass('success').css('cursor', 'pointer');
    }, function(e){
        $(this).removeClass('success');
    }).find('td').not('.word-wrap').click(function(e){
        var id = $(this).parent().find('.js-id').html();
            //alert('сработало. id = '+id);
        location.href = "/material/info/"+id;
    });
});