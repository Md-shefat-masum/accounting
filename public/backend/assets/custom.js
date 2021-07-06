window.onbeforeunload = function() {window.scrollTo(0,0);};

$(document).ready(function () {
    $('.activeOn').find('label').addClass('active')

    $('.cancel_btn').on('click',function(){
        $('.modal').modal('hide');
    })

    $('.switch-button a').on('click',function(){
        $(this).removeClass('active');
        $(this).siblings('a').removeClass('active');
        $(this).addClass('active');
    })

    $(window).on('load',function(){
        $('.product_seleted_row input').on('click',function(){
            $('.product_seleted_row').removeClass('product_row_active');
            $(this).addClass('product_row_active');
        })
    });


});
