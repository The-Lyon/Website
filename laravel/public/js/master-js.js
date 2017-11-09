$(document).ready(function () {
    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > 20) {
            $('.nav-item').animate({
                'padding-top': '7',
                'padding-bottom': '7'
            }, 0);
            $('#mac-logo').animate({
                height: '45'
            }, 0);
            $('.dropdown-menu').animate({
                'margin-top': '11'
            }, 0)
        } else {
            $('.nav-item').animate({
                'padding-top': '24',
                'padding-bottom': '24'
            }, 0);
            $('#mac-logo').animate({
                height: '60'
            }, 0);
            $('.dropdown-menu').animate({
                'margin-top': '27'
            }, 0)
        }
    });
});
