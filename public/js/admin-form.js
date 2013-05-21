/**
 * Created with JetBrains PhpStorm.
 * User: XanderB
 * Date: 19.04.13
 * Time: 11:38
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    function source(obj){
        var value_value = $('#value_source').val();
        var text_value = $("#text_source").val();
        if(!value_i(value_value)){
            $('#value_source').css('border', '1px solid red');
            $('#error-value').html('Ошибка! Значение может быть только числом');
        }else{
            $('#value_source').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(text_value)){
            $("#text_source").css('border', '1px solid red');
            $('#error-text').html('Ошибка! Источник должен быть заполнен');
        }else{
            $('#text_source').css('border', '1px solid green');
            $('#error-text').html('');
        }
    }
    function source_submit(obj){
        var value_value = $('#value_source').val();
        var text_value = $("#text_source").val();
        if(!value_i(value_value)){
            source();
            return false;
        }else if(!text(text_value)){
            source();
            return false;
        }else{
            return true;
        }
    }

    function period(obj){
        var days_value = $('#days').val();
        if(!days(days_value)){
            $('#days').css('border', '1px solid red');
            $('#error-days').html('Ошибка! Срок рассмотрения может быть только числом');
        }else{
            $('#days').css('border', '1px solid green');
            $('#error-days').html('');
        }
    }
    function period_submit(obj){
        var days_value = $('#days').val();
        if(!days(days_value)){
            period();
            return false;
        }else{
            return true;
        }
    }


    function article(obj){
        var value_value = $('#value_article').val();
        var text_value = $("#text_article").val();
        if(!value_t(value_value)){
            $('#value_article').css('border', '1px solid red');
            $('#error-value').html('Ошибка! Необходимо ввести статью');
        }else{
            $('#value_article').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(text_value)){
            $("#text_article").css('border', '1px solid red');
            $('#error-text').html('Ошибка! Описание статьи должено быть заполнено');
        }else{
            $('#text_article').css('border', '1px solid green');
            $('#error-text').html('');
        }
    }
    function article_submit(obj){
        var value_value = $('#value_article').val();
        var text_value = $("#text_article").val();
        if(!value_t(value_value)){
            article();
            return false;
        }else if(!text(text_value)){
            article();
            return false;
        }else{
            return true;
        }
    }

    function sled(obj){
        var name_value = $('#name').val();
        if(!name(name_value)){
            $('#name').css('border', '1px solid red');
            $('#error-name').html('Ошибка! Необходимо ввести ФИО следователя');
        }else{
            $('#name').css('border', '1px solid green');
            $('#error-name').html('');
        }
    }

    function sled_submit(obj){
        var name_value = $('#name').val();
        if(!name(name_value)){
            sled();
            return false;
        }else{
            return true;
        }
    }

    function fcause(obj){
        var value_value = $('#value_fcause').val();
        var text_value = $("#text_fcause").val();
        if(!value_i(value_value)){
            $('#value_fcause').css('border', '1px solid red');
            $('#error-value').html('Ошибка! Значение должно быть числом');
        }else{
            $('#value_fcause').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(text_value)){
            $("#text_fcause").css('border', '1px solid red');
            $('#error-text').html('Ошибка! Причина отказа должна быть заполнена');
        }else{
            $('#text_fcause').css('border', '1px solid green');
            $('#error-text').html('');
        }
    }

    function fcause_submit(obj){
        var value_value = $('#value_fcause').val();
        var text_value = $("#text_fcause").val();
        if(!value_i(value_value)){
            fcause();
            return false;
        }else if(!text(text_value)){
            fcause();
            return false;
        }else{
            return true;
        }
    }

    function char(obj){
        var value_value = $('#value_char').val();
        var text_value = $("#text_char").val();
        if(!value_i(value_value)){
            $('#value_char').css('border', '1px solid red');
            $('#error-value').html('Ошибка! Значение должно быть числом');
        }else{
            $('#value_char').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(text_value)){
            $("#text_char").css('border', '1px solid red');
            $('#error-text').html('Ошибка! Характеристика дела должна быть заполнена');
        }else{
            $('#text_char').css('border', '1px solid green');
            $('#error-text').html('');
        }
    }

    function char_submit(obj){
        var value_value = $('#value_char').val();
        var text_value = $("#text_char").val();
        if(!value_i(value_value)){
            char();
            return false;
        }else if(!text(text_value)){
            char();
            return false;
        }else{
            return true;
        }
    }

    function decree(obj){
        var value_value = $('#value_decree').val();
        var text_value = $("#text_decree").val();
        if(!value_i(value_value)){
            $('#value_decree').css('border', '1px solid red');
            $('#error-value').html('Ошибка! Значение должно быть числом');
        }else{
            $('#value_decree').css('border', '1px solid green');
            $('#error-value').html('');
        }
        if(!text(text_value)){
            $("#text_decree").css('border', '1px solid red');
            $('#error-text').html('Ошибка! Решение по делу должно быть заполнено');
        }else{
            $('#text_decree').css('border', '1px solid green');
            $('#error-text').html('');
        }
    }

    function decree_submit(obj){
        var value_value = $('#value_decree').val();
        var text_value = $("#text_decree").val();
        if(!value_i(value_value)){
            decree();
            return false;
        }else if(!text(text_value)){
            decree();
            return false;
        }else{
            return true;
        }
    }

    function role(obj){
        var name_value = $('#role-name').val();
        var description_value = $("#role-description").val();
        if(!role_name(name_value)){
            $('#role-name').css('border', '1px solid red');
            $('#error-name').html('Ошибка! Значение должно быть числом');
        }else{
            $('#role-name').css('border', '1px solid green');
            $('#error-name').html('');
        }
        if(!role_desc(description_value)){
            $("#role-description").css('border', '1px solid red');
            $('#error-description').html('Ошибка! Решение по делу должно быть заполнено');
        }else{
            $("#role-description").css('border', '1px solid green');
            $('#error-description').html('');
        }
    }
    function role_submit(obj){
        var name_value = $('#role-name').val();
        var description_value = $("#role-description").val();
        if(!role_name(name_value)){
            role();
            return false;
        }else if(!role_desc(description_value)){
            role();
            return false;
        }else{
            return true;
        }
    }



    function days(val){
        var exp = /^\d+$/;
        if(!exp.test(val)){
            return 0;
        }else{
            return 1;
        }
    }
    function value_i(val){
        var exp = /^\d+$/;
        if(!exp.test(val)){
            return 0;
        }else{
            return 1;
        }
    }
    function value_t(val){
        var exp = val.length;
        if(exp > 0 && exp < 51){
            return 1;
        }else{
            return 0;
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
    function name(val){
        var exp = val.length;
        if(exp > 0 && exp < 251){
            return 1;
        }else{
            return 0;
        }
    }
    function role_name(val){
        var len = val.length;
        if(len > 0 && len < 33){
            return 1;
        }else{
            return 0;
        }
    }
    function role_desc(val){
        var len = val.length;
        if(len > 0 && len < 251){
            return 1;
        }else{
            return 0;
        }
    }


    $('#days').keyup(function(e){
        period();
    });
    $('#period-form').submit(function(e){
        return period_submit();
    });
    //***//

    $('#value_source').keyup(function(e){
        source();
    });
    $('#text_source').keyup(function(e){
        source();
    });
    $('#source-form').submit(function(e){
        return source_submit();
    });

    //***//
    $('#value_article').keyup(function(e){
        article();
    });
    $('#text_article').keyup(function(e){
        article();
    });
    $('#article-form').submit(function(e){
        return article_submit();
    });

    //***//
    $('#name').keyup(function(e){
        sled();
    });

    $('#sled-form').submit(function(e){
        return sled_submit();
    });

    //***//
    $('#value_fcause').keyup(function(e){
        fcause();
    });
    $('#text_fcause').keyup(function(e){
        fcause();
    });
    $('#fcause-form').submit(function(e){
        return fcause_submit();
    });

    //***//
    $('#value_decree').keyup(function(e){
        decree();
    });
    $('#text_decree').keyup(function(e){
        decree();
    });
    $('#decree-form').submit(function(e){
        return decree_submit();
    });

    //***//
    $('#value_char').keyup(function(e){
        char();
    });
    $('#text_char').keyup(function(e){
        char();
    });
    $('#char-form').submit(function(e){
        return char_submit();
    });

    //***//
    $('#role-name').keyup(function(e){
        role();
    });
    $('#role-description').keyup(function(e){
        role();
    });
    $('#role-form').submit(function(e){
        return role_submit();
    });

});