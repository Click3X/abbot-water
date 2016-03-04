(function($){

/* ==============================================
Page Loader
=============================================== */

$(window).load(function() {
    // 'use strict';
    // setTimeout( function() {
       
    //     $('#fixed_video').find('.mbYTP_wrapper').animate({opacity:1}, 500);
    //     //mbYTP_wrapper$('find')
    // }, 800 );

    
    $('#home-header > div.home-header .vc_column_container').css('padding-bottom', 0);
    // $('.fixed-text').css('opacity', 1);

    // CHECK FOR VIEW PORT HEIGHT UNIT SUPPORT //
    var $homeHeader = $('#new-home-header-container .new-home-header-container');

    var testEl = $("#vw-test");
    testEl.css({
        height: "100vh",
        display:"none"
    });

    // VIEW PORT HEGHT FIXES
    var winHeight  = window.innerHeight,
        testElHeight = testEl.height();
    
    // console.log('This is winHeight: ' + winHeight);
    // console.log('This is testElHeight: ' + testElHeight);
    
    if (testEl.height() == winHeight) {
        console.log("vh-supported");
        // $('.fixed-text').css('opacity', 1);
    } else {
        console.log("vh-unsupported");
        $homeHeader.height(winHeight);
        // $('.fixed-text').css('opacity', 1);
        // CHANGE HEIGHT ON WINDOW RESIZE
        // $( window ).resize(function() {
        //     winHeight  = window.innerHeight;
        //     $homeHeader.height(winHeight);
        // });
    }
    // END CHECK FOR VIEW PORT HEIGHT UNIT SUPPORT //

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

    /*

    jQuery Plugin: Outline Button
    author: Charles Davis
    purpose: To provide a debugger button that when clicked will toggle a red outline of all html elements

    */
    // (function($) {
    //     // APPEND STYLES TO HEAD
    //     $('head').append('<style>#outline {position:fixed;z-index:1000;bottom:50px;right:50px; width:20px; height:20px; } .outlines {outline:1px solid rgba(255, 0, 0, 0.3); }</style>');
    //     // APPEND DEBUGGER BUTTON TO BODY
    //     $('body').append('<input id=\"outline\" type=\"button\">');
    //     // CLICK EVENT HANDLER
    //     $('#outline').click(function() {
    //         $('*').toggleClass('outlines');
    //     });
        
    // })(jQuery);




    //SERVICE SLIDER
    if ($(".ts-service-slide").length > 0) {
    
        $(".ts-service-slide").owlCarousel({
            items: 3,
            // autoPlay: 6000,
            autoPlay: false,
            slideSpeed: 600,
            navigation: false,
            pagination: true,
            singleItem: false,
            itemsCustom: [[0, 1],[320,1], [480, 1], [768, 2], [992, 2], [1200, 3]]
        });
    }

    //FEATURE SLIDER
    if ($(".ts-feature-slide").length > 0) {
    
        $(".ts-feature-slide").owlCarousel({
            // autoPlay: false,
            autoPlay: ffalse,
            slideSpeed: 360,
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


    // ON WINDOW RESIZE ADJUST HEIGHTS
    var owlItems = $('.owl-item > .item-service-slide'),
        maxHeight,
        resizeTimeout,
        resizeHandler;

    maxHeight = Math.max.apply(null, owlItems.map(function () {
        return $(this).height();
    }).get());

    owlItems.each(function() {
        $(this).height(maxHeight);
    })

    // R E S I Z E 
    $(window).resize(function() {
        if (resizeTimeout) {
            // clear the timeout, if one is pending
            clearTimeout(resizeTimeout);
            resizeTimeout = null;
        }
        resizeTimeout = setTimeout(resizeHandler, 60/1000);
    });

    resizeHandler = function(argument) {
        owlItems.map(function () {
            $(this).height('auto');
        });
        maxHeight = Math.max.apply(null, owlItems.map(function () {
            return $(this).height();
        }).get());

        owlItems.each(function() {
            $(this).height(maxHeight);
        })
    }
    // E N D    R E S I Z E


    // D I S A B L E   Z O O M   B U G   O N   O R I E N T A T I O N   C H A N G E
    if (navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i)) {
         var viewportmeta = document.querySelector('meta[name="viewport"]');
         if (viewportmeta) {
              viewportmeta.content = 'width=device-width, minimum-scale=1.0, maximum-scale=1.0';
              document.body.addEventListener('gesturestart', function() {
                   viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
              }, false);
         }
    }
    // E N D   D I S A B L E   Z O O M   B U G   O N   O R I E N T A T I O N   C H A N G E


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
            // autoPlay: 4000,
            autoPlay: false,
            slideSpeed: 600,
            navigation: false,
            pagination: true,
            singleItem: true
        });
    }

    //CLIENT SLIDER
    if ($(".ts-client-slide").length > 0) {
    
        $(".ts-client-slide").owlCarousel({
            items: 3,
            // autoPlay: 4000,
            autoPlay: false,
            slideSpeed: 600,
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
            // autoPlay: 4000,
            autoPlay: false,
            slideSpeed: 600,
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


      // // if hash
      // if(window.location.hash) {
      //     // var noHash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
      //     var hash = window.location.hash;
      //     // alert (noHash);
      //     console.log(hash);

      //     var $hash = $(hash).get(0);
      //     console.dir($hash);

      //     // var url_wl = $(this).attr("href");
      //       var target_wl = $hash.offsetTop;

      //       console.log('This is target_wl: ' + target_wl);

      //       $('html,body').animate({scrollTop:target_wl-200},0);

      //       return false;
      //     // hash found
      // } else {
      //     // No hash found
      // }
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
            $('html,body').animate({scrollTop:target -80}, 0);

            if(windowWidth<=767) {
                $('#default-menu-position').hide();
            }

            return false;
          });


      $("#wrapper").fitVids();

      //BUTTON WELLCOME
      $('.ts-button-wellcome, .home-arrow > a').click(function(e){
        var url_wl = $(this).attr("href");
        var taget_wl = $(url_wl).offset().top;
        $('html,body').animate({scrollTop:taget_wl-80},0);
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


