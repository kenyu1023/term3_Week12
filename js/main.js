$(function () {

    var openNav = 0;

    $("#openNav").click(function () {
        if (openNav == 0) {
            $("#sideNav").animate({"width": "100%"},300);
            openNav = 1;
        }
    });
    $("#closeBtn").click(function () {
        $("#sideNav").animate({"width": "0"},300);
        openNav = 0;
    });

    var doAnimation = function () {

        var offset = $(window).scrollTop() + $(window).height(),
            $animatables = $('.animatable');

        if ($animatables.size() === 0) {
            $(window).off('scroll', doAnimation);
        }

        $animatables.each(function (i) {
            var $animatable = $(this);
            if (($animatable.offset().top + $animatable.height()) < offset) {
                $animatable.css({"opacity":"1","transform":"translate(0,0)"});
            }
        });
    };

    $(window).on('scroll', doAnimation);
    $(window).trigger('scroll');

});

