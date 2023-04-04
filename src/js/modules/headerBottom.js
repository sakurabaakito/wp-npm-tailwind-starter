const headerBottom = () => {
    $(window).on('scroll', function () {
        if ($('#header').height() < $(this).scrollTop()) {
            $('#header-bottom').addClass('invisible opacity-0');
            $('#header-bottom').removeClass('visible');
        } else {
            $('#header-bottom').addClass('visible');
            $('#header-bottom').removeClass('invisible opacity-0');
        }
    });
};

export default headerBottom