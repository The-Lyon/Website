$(document).ready(function () {
    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > 30) {
            $('.nav-item').animate({
                'padding-top': '7',
                'padding-bottom': '7'
            }, 0);
            $('#mac-logo').animate({
                height: '45'
            }, 0);
            $('#mobile-nav').animate({
                'top': '58'
            }, 0);
        } else {
            $('.nav-item').animate({
                'padding-top': '24',
                'padding-bottom': '24'
            }, 0);
            $('#mac-logo').animate({
                height: '60'
            }, 0);
            $('#mobile-nav').animate({
                'top': '92'
            }, 0);
        }
    });


    $(".nav-item").hover(function () {
        //$(this).css("background-color", "#f4df42");
        //$(this).children().css("color", "white");
    }, function () {
        // $(this).css("background-color", "white");
        //$(this).children().css("color", "black");
    });

    $(".openMenu").click(function(e){
        $('.submenu').toggle("slide", 310);
        e.stopPropagation()
    });

    $(window).click(function () {
        $('.submenu').hide("slide", 310);
    });

});
