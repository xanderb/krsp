/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 08.05.13
 * Time: 12:29
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $('.datepicker').datepicker($.datepicker.regional['ru']);

    function fields(){
        var plot = $('#plot');
        var period = $('#period');
        var article = $('#article');
        if(!not_empty_text(plot)){
            $(plot).css('border', '1px solid red');
            $('#error-plot').html('Ошибка! Необходимо ввести краткую фабулу');
        }else{
            $(plot).css('border', '1px solid green');
            $('#error-plot').html('');
        }

        if(!not_empty_text(period)){
            $(period).css('border', '1px solid red');
            $('#error-period').html('Ошибка! Необходимо выбрать срок рассмотрения');
        }else{
            $(period).css('border', '1px solid green');
            $('#error-period').html('');
        }

        /*if(!not_empty_text(article)){
            $(article).css('border', '1px solid red');
            $('#error-article').html('Ошибка! Необходимо выбрать статью');
        }else{
            $(article).css('border', '1px solid green');
            $('#error-article').html('');
        }*/

        if($('#edit-cause').length > '0'){
            var ecause = $('#edit-cause');
            if(!not_empty_text(ecause)){
                $(ecause).css('border', '1px solid red');
                $('#error-edit-cause').html('Ошибка! Необходимо указать причину редактирования материала');
            }else{
                $(ecause).css('border', '1px solid green');
                $('#error-edit-cause').html('');
            }
        }
    }

    function button_save(){
        var plot = $('#plot');
        var period = $('#period');
        var article = $('#article');
        if($('#edit-cause').length > '0'){
            var ecause = $('#edit-cause');
        }
        if($('#edit-cause').length > '0' && !not_empty_text(ecause)){
            fields();
            return false;
        }else if(!not_empty_text(plot)){
            fields();
            return false;
        }else if(!not_empty_text(period)){
            fields();
            return false;
        }else /*if(!not_empty_text(article)){
            fields();
            return false;
        }else*/{
            return true;
        }
    }

    function not_empty_text(obj){
        var text = $(obj).val();
        if(text.length > 0)
            return 1;
        else
            return 0;
    }
    function not_empty_date(obj){
        var date = $(obj).val();
        if(date.length > 0)
            return 1;
        else
            return 0;
    }

    $('#plot').keyup(function(){
        fields();
    });
    /*$('#article').change(function(){
        fields();
    });*/
    $('#period').change(function(){
        fields();
    });
    $('#edit-cause').keyup(function(){
        fields();
    });

    $('#material-form').submit(function(){
        return button_save();
    });
});