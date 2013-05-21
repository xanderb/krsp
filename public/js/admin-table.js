$(function(){
    $('.js-row').click(function(e){
        $('.js-row').removeClass('success');
        $(this).addClass('success');
        var row_id = $(this).find('.js-id').html();
        if($('.js-p.changed').length < 1){
            hrefs = [];
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
    });
});
