$(function () {
////////// nav function //////////
    var openNav = 0;

    $("#openNav").click(function () {
        if (openNav == 0) {
            $("#sideNav").animate({"width": "40%"},200);
            openNav = 1;
        }
    });
    $("#closeBtn").click(function () {
        $("#sideNav").animate({"width": "0"},200);
        openNav = 0;
    });

////////////////////////////////////////////
    
//////////// scroll animation /////////////

    var doAnimation = function () {

        var offset = $(window).scrollTop() + $(window).height();
        $animatables = $('.anima');

        if ($animatables.length === 0) {
            $(window).off('scroll', doAnimation);
        }else{
            $animatables.each(function (i) {
                var $animatable = $(this);
                if (($animatable.offset().top + $animatable.height()) < offset + 100) {
                    $animatable.css({"opacity":"1","transform":"translate(0,0)"});
                    $animatable.removeClass('anima');
                }
            });
        }
        console.log($animatables.length);

    };

    $(window).on('scroll', doAnimation);
    $(window).trigger('scroll');
    
////////////////////////////////////////////
    
//////// click thumbnail, modalbox will show ////
    //// click thumbnail, modalbox will come out ////
    $('.portfolio-page').click(function(){
        
        $('#portTitle').text($('#workTitle'+$(this).data('id')).text());
        $('#portImg').attr('src',$('#imagePort'+$(this).data('id')).attr('src'));
        $('#portDesc').text($('#workDesc'+$(this).data('id')).val());

        $('#modalBox').fadeIn(400);
    });
    ///////////////////////////////////////////////////

    //// click x, modalbox will fade out ////

    $("#closeModal").click(function(){
        $('#modalBox').fadeOut(400);
    });
    ////////////////////////////////////////
    
    ///// header nav function /////
//    
//    $(".headerNav").mouseover(function(){
//        $(".hoverNav").animate({"opaciry":"1"})
//    });
    
    ////////////////////////////////////////
//    
//    $(window).scroll(function(){
//        
//    var eScroll = $(this).scrollTop();
//        
//        $(".slowScroll").css({ "transform": "translateY("+ (eScroll *0.4)+ "px)" });
//        
//        $(".slowScrollquo").css({ "transform": "translateY("+ (eScroll /4)+ "px)" });
//        
//        $(".slowScrollsixth").css({ "transform": "translateY("+ (eScroll /6)+ "px)" });
//    });
    
    function parallax(){
        
        var box1 = document.getElementById("box1");
        
        box1.style.transform.translateY = -(window.pageYOffset / 3) + 'px';
    }
    window.addEventListener("scroll",parallax,false);
});

