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

    $(".openMenu").click(function (e) {
        if ($('.submenu').width() > 0) {
            $('.is-child').animate({ opacity: '0' }, {
                duration: 170,
                complete: function () {
                    $('.submenu').delay(210).animate({ width: '0px', padding: '0px', opacity: '0', display: 'none' }, 220);
                }
            });
        } else {
            if ($(document).width() > 990) {
                $('.submenu').animate({ width: '33vw', padding: '10px', opacity: '1', display: 'block' }, {
                    duration: 210,
                    complete: function () {
                        $('.is-child').animate({ opacity: '1' }, 170);
                    }
                });
            } else {
                $('.submenu').animate({ width: '200px', padding: '10px', opacity: '1', display: 'block' }, {
                    duration: 210,
                    complete: function () {
                        $('.is-child').animate({ opacity: '1' }, 170);
                    }
                });
            }
        }
        e.stopPropagation()
    });

    $(window).click(function () {
        $('.is-child').animate({ opacity: '0' }, {
            duration: 170,
            complete: function () {
                $('.submenu').delay(210).animate({ width: '0px', padding: '0px', opacity: '0', display: 'none' }, 220);
            }
        });
    });

});
