(function($){

/* ==============================================
Page Loader
=============================================== */

$(window).load(function() {
    'use strict';
    setTimeout( function() {
       
        $('#fixed_video').find('.mbYTP_wrapper').animate({opacity:1}, 500);
        //mbYTP_wrapper$('find')
    }, 800 );
});
/* ==============================================
Home Super Slider (images)
=============================================== */

 $('#slides').superslides({
      animation: 'fade',
      pagination:'false'
    });

/* ==============================================
Parallax Calling
=============================================== */


( function ( $ ) {
'use strict';
$(document).ready(function(){
$(window).bind('load', function () {
        parallaxInit();                       
    });
    function parallaxInit() {
        testMobile = isMobile.any();
        if (testMobile == null)
        {
 
            $('.ff-slider-paralax').each(function(){
                $(this).parallax('50%', 0.5);
            });
        }
    }   
    parallaxInit();  
});
}( jQuery ));
//Mobile Detect
var testMobile;
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};


/* ==============================================
Video Script
=============================================== */

jQuery(function(){
    'use strict';

    if( isMobile.any() ){
        $('.player.video-container').each(function(){
            $(this).addClass('mobile-bg');
            if( $(this).attr('data-background') ){
                $(this).append('<div></div>');
                $(this).find('div').css('background-image', 'url(' + $(this).attr('data-background') + ')' );
            }
        });
    }else{
        $('.player').each(function(){
            $(this).mb_YTPlayer();
        });
    }
});

})(jQuery)


jQuery(document).ready(function ($) {
    //SERVICE SLIDER
    if ($(".ts-service-slide").length > 0) {
    
        $(".ts-service-slide").owlCarousel({
            items: 3,
            autoPlay: 6000,
            slideSpeed: 3000,
            navigation: false,
            pagination: true,
            singleItem: false,
            itemsCustom: [[0, 1],[320,1], [480, 1], [768, 2], [992, 2], [1200, 3]]
        });
    }

    //FEATURE SLIDER
    if ($(".ts-feature-slide").length > 0) {
    
        $(".ts-feature-slide").owlCarousel({
            autoPlay: false,
            slideSpeed: 3000,
            navigation: true,
            pagination: false,
            singleItem: true,
            navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        });
    }

    //FUNFACE
    $('.ts-funfact').appear(function() {
        var count_element = $('.funfact-number', this).html();
        $(".funfact-number", this).countTo({
            from: 0,
            to: count_element,
            speed: 2500,
            refreshInterval: 50,
        });
    });

    //HOVER EFFECT
     // handle the mouseenter functionality
    $(".ts-item-member").mouseenter(function(){
        $(this).addClass("hover");
    })
    // handle the mouseleave functionality
    .mouseleave(function(){
        $(this).removeClass("hover");
    });

    //TESTIMONIAL SLIDER
    if ($(".ts-testimonial-slide").length > 0) {
    
        $(".ts-testimonial-slide").owlCarousel({
            autoPlay: 4000,
            slideSpeed: 3000,
            navigation: false,
            pagination: true,
            singleItem: true
        });
    }

    //CLIENT SLIDER
    if ($(".ts-client-slide").length > 0) {
    
        $(".ts-client-slide").owlCarousel({
            items: 3,
            autoPlay: 4000,
            slideSpeed: 3000,
            navigation: true,
            pagination: false,
            singleItem: false,
            navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
            itemsCustom: [[0, 1],[320,2], [480, 2], [768, 4], [992, 4], [1200, 5]]
        });
    }

    

    //BLOG-GALLARY
    if ($(".blog-grallery").length > 0) {
    
        $(".blog-grallery").owlCarousel({
            autoPlay: 4000,
            slideSpeed: 3000,
            navigation: true,
            pagination: false,
            singleItem: true,
            navigationText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        });
    }
    var mgBdy = $('.main-header').outerHeight()
    $('#banner').css("margin-top",mgBdy-2);

    $heightbody = $(window).height() - $('.main-header').outerHeight();

    $('.ts-menu-animation').css("height",$heightbody);
    $('.menubar-animation').click(function(){
            $('.ts-menu-animation').slideToggle();
        });

    $('.close-menu').click(function(){
        $('.ts-menu-animation').slideToggle({
            opacity:"0",
            filter: "alpha(opacity=0)",
            height:"0"
        },1000)
        $('.social-top').show();
    });
    //MAIN MENU DEFAULT
    widthW = $(window).width();
    if(widthW<768){
        
        $('.menubar-default').click(function(){
            $('.ts-default-menu').slideToggle();
        });
        $('.header-1').css({
            "max-height":$(window).height() - 50,
            "overflow": "auto"
        });
    }else{
        $('.menubar-default').toggle(function(){
            $('.social-top').show().animate({
                opacity:"1",
                filter:"alpha(opacity=100)",
            },1000);
            $('.ts-default-menu').hide();
        },function(){
            $('.social-top').animate({
                opacity:"0",
                filter: "alpha(opacity=0)",
            },1000).hide();
            $('.ts-default-menu').show();
        });
    }
    if(widthW < 992){
        $('.header-2').css({
            "max-height":$(window).height() - 50,
            "overflow": "auto"
        });
    }
    


    /*Main Menu Scroll*/
    var offs = '15%';
      $("#container_full > div").waypoint({
        handler: function(event, direction) {
          var active_section = $(this);
          if (direction === "up") active_section = active_section.prev();
          if (direction === "up") offs = '30%'; 

          if(typeof active_section.attr("id") != 'undefined') { 
            $('.ts-main-menu a').removeClass("active");
            $('.ts-main-menu a[href="#' + active_section.attr("id") + '"]').addClass("active");
          }
        },
        offset: offs
      });

      //MENU ONEPAGE
        $(".ts-main-menu ul a").click(function(e){
            var windowWidth = $(window).width();
            if(windowWidth<=959) {
              $('.ts-main-menu ul').slideUp("fast");
            }
            $(".ts-main-menu ul li a").removeClass("active");
            $(this).addClass("active");
            var url = $(this).attr("href");
            var target = $(url).offset().top; 
            $('html,body').animate({scrollTop:target -70}, 'slow');
            return false;
          });


      $("#wrapper").fitVids();

      //BUTTON WELLCOME
      $('.ts-button-wellcome, .home-arrow > a').click(function(e){
        var url_wl = $(this).attr("href");
        var taget_wl = $(url_wl).offset().top;
        $('html,body').animate({scrollTop:taget_wl-70},'slow');
        return false;
      })
    

    // Skill bar
    jQuery('.skillbar').each(function(){
            jQuery(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },6000);
        });

    if (ARIVA.menu_onload_state =='menu_hide') {
        jQuery(".header-1").removeClass('hidden');
        jQuery(window).bind('scroll', function() {
            if (jQuery(window).scrollTop() > (jQuery(window).height()-500)) {
                jQuery('.header-1').fadeIn('slow');
                jQuery(".header-1").removeClass('hidden').addClass('displayed');
            }
            if (jQuery(window).scrollTop() < (jQuery(window).height()-500)) {
                jQuery('.header-1').fadeOut('slow', function() {
                    jQuery(".header-1").removeClass('displayed').addClass('hidden');
                });
            }
        });
    }



    //SHOP
    if(jQuery().chosen) {
        jQuery(".woocommerce-ordering .orderby").chosen();
    }
})


