/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 08.08.13
 * Time: 16:23
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
    function universal_input(obj, text_obj, append_text){
        var value = $(obj).val();
        if(value != ''){
            var exemp = $(text_obj).clone().removeAttr('id').val('').bind('keyup', function(e){ universal_input(this, text_obj, append_text); });
            $(append_text).append(exemp);
            $(obj).unbind('keyup');
        }
    }

    $('.source-select').change(function(e){
        universal_select(this, '#first-source-select', 'fieldset#source-select div.row-fluid');
    });
    $('.article-input').keyup(function(e){
        universal_input(this, '#first-article-input', 'fieldset#article-input div.row-fluid div.toin');
    });
    $('.invest-select').change(function(e){
        universal_select(this, '#first-invest-select', 'fieldset#invest-select div.row-fluid');
    });
    $('.decree-select').change(function(e){
        universal_select(this, '#first-decree-select', 'fieldset#decree-select div.row-fluid');
    });
    $('.period-select').change(function(e){
        universal_select(this, '#first-period-select', 'fieldset#period-select div.row-fluid');
    });
    $('.failure_cause-select').change(function(e){
        universal_select(this, '#first-failure_cause-select', 'fieldset#failure_cause-select div.row-fluid');
    });
    $('.extra_invest-select').change(function(e){
        universal_select(this, '#first-extra_invest-select', 'fieldset#extra_invest-select div.row-fluid');
    });
    $('.extra_period-select').change(function(e){
        universal_select(this, '#first-extra_period-select', 'fieldset#extra_period-select div.row-fluid');
    });
    $('.extra_decree-select').change(function(e){
        universal_select(this, '#first-extra_decree-select', 'fieldset#extra_decree-select div.row-fluid');
    });
    $('.characteristic-select').change(function(e){
        universal_select(this, '#first-characteristic-select', 'fieldset#characteristic-select div.row-fluid');
    });
    /**END Select-Form Scripts****/
});