$(document).ready(function () {
    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > 20) {
            $('.nav-item').animate({
                'margin-top': '0',
                'margin-bottom': '0'
            }, 0);
            $('#mac-logo').animate({
                height: '45'
            }, 0);
            $('.dropdown-menu').animate({
                'margin-top': '11'
            }, 0)
        } else {
            $('.nav-item').animate({
                'margin-top': '20',
                'margin-bottom': '20'
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
