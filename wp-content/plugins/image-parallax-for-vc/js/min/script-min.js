function _gambitRefreshScroll(){var $=jQuery;_gambitScrollTop=$(window).scrollTop(),_gambitScrollLeft=$(window).scrollLeft()}function _gambitParallaxAll(){_gambitRefreshScroll();for(var t=0;t<_gambitImageParallaxImages.length;t++)_gambitImageParallaxImages[t].doParallax()}function _vcRowGetAllElementsWithAttribute(t){for(var e=[],i=document.getElementsByTagName("*"),a=0,n=i.length;n>a;a++)i[a].getAttribute(t)&&e.push(i[a]);return e}function _vcRowOnPlayerReady(t){var e=t.target;e.playVideo(),e.isMute&&e.mute(),e.loopInterval=setInterval(function(){"undefined"!=typeof e.loopTimeout&&clearTimeout(e.loopTimeout);var t=0;"undefined"!=typeof jQuery(e.a).parent().attr("data-loop-adjustment")&&""!==jQuery(e.a).parent().attr("data-loop-adjustment")&&"0"!==jQuery(e.a).parent().attr("data-loop-adjustment")&&(t=parseInt(jQuery(e.a).parent().attr("data-loop-adjustment"))),e.loopTimeout=setTimeout(function(){e.seekTo(0)},1e3*e.getDuration()-1e3*e.getCurrentTime()-60-t)},400)}function _vcRowOnPlayerStateChange(t){t.data===YT.PlayerState.ENDED?("undefined"!=typeof t.target.loopTimeout&&clearTimeout(t.target.loopTimeout),t.target.seekTo(0)):t.data===YT.PlayerState.PLAYING&&jQuery(t.target.getIframe()).parent().css("visibility","visible")}function resizeVideo(t){var e=t.parent();if(null===e.find("iframe").width())return void setTimeout(function(){resizeVideo(t)},500);var i=t;i.css({width:"auto",height:"auto",left:"auto",top:"auto"}),i.css("position","absolute");var a=e.find("iframe").width(),n=e.find("iframe").height(),r=e.width(),s=e.height(),o,d,l,g,h="16:9";"undefined"!=typeof t.attr("data-video-aspect-ratio")&&-1!==t.attr("data-video-aspect-ratio").indexOf(":")&&(h=t.attr("data-video-aspect-ratio").split(":"),h[0]=parseFloat(h[0]),h[1]=parseFloat(h[1])),d=s,o=h[0]/h[1]*s,l=h[0]/h[1]*s-r,g=r*h[1]/h[0]-s,o>=r&&d>=s?(height=s,width=h[0]/h[1]*s):(width=r,height=r*h[1]/h[0]),marginTop=-(height-s)/2,marginLeft=-(width-r)/2,e.find("iframe").css({width:width,height:height,marginLeft:marginLeft,marginTop:marginTop})}function onYouTubeIframeAPIReady(){for(var t=_vcRowGetAllElementsWithAttribute("data-youtube-video-id"),e=0;e<t.length;e++){for(var i=t[e].getAttribute("data-youtube-video-id"),a="",n=0;n<t[e].childNodes.length;n++)if(/div/i.test(t[e].childNodes[n].tagName)){a=t[e].childNodes[n].getAttribute("id");break}if(""!==a){var r=t[e].getAttribute("data-mute"),s=new YT.Player(a,{height:"auto",width:"auto",videoId:i,playerVars:{autohide:1,autoplay:1,fs:0,showinfo:0,loop:1,modestBranding:1,start:0,controls:0,rel:0,disablekb:1,iv_load_policy:3,wmode:"transparent"},events:{onReady:_vcRowOnPlayerReady,onStateChange:_vcRowOnPlayerStateChange}});s.isMute="true"===r}}}if("undefined"==typeof Modernizr&&(window.Modernizr=function(t,e,i){function a(t){c.cssText=t}function n(t,e){return a(u.join(t+";")+(e||""))}function r(t,e){return typeof t===e}function s(t,e){return!!~(""+t).indexOf(e)}function o(t,e,a){for(var n in t){var s=e[t[n]];if(s!==i)return a===!1?t[n]:r(s,"function")?s.bind(a||e):s}return!1}var d="2.8.3",l={},g=e.documentElement,h="modernizr",p=e.createElement(h),c=p.style,m,f={}.toString,u=" -webkit- -moz- -o- -ms- ".split(" "),b={},v={},w={},y=[],x=y.slice,T,I=function(t,i,a,n){var r,s,o,d,l=e.createElement("div"),p=e.body,c=p||e.createElement("body");if(parseInt(a,10))for(;a--;)o=e.createElement("div"),o.id=n?n[a]:h+(a+1),l.appendChild(o);return r=["&#173;",'<style id="s',h,'">',t,"</style>"].join(""),l.id=h,(p?l:c).innerHTML+=r,c.appendChild(l),p||(c.style.background="",c.style.overflow="hidden",d=g.style.overflow,g.style.overflow="hidden",g.appendChild(c)),s=i(l,t),p?l.parentNode.removeChild(l):(c.parentNode.removeChild(c),g.style.overflow=d),!!s},_={}.hasOwnProperty,P;P=r(_,"undefined")||r(_.call,"undefined")?function(t,e){return e in t&&r(t.constructor.prototype[e],"undefined")}:function(t,e){return _.call(t,e)},Function.prototype.bind||(Function.prototype.bind=function(t){var e=this;if("function"!=typeof e)throw new TypeError;var i=x.call(arguments,1),a=function(){if(this instanceof a){var n=function(){};n.prototype=e.prototype;var r=new n,s=e.apply(r,i.concat(x.call(arguments)));return Object(s)===s?s:r}return e.apply(t,i.concat(x.call(arguments)))};return a}),b.touch=function(){var i;return"ontouchstart"in t||t.DocumentTouch&&e instanceof DocumentTouch?i=!0:I(["@media (",u.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(t){i=9===t.offsetTop}),i};for(var k in b)P(b,k)&&(T=k.toLowerCase(),l[T]=b[k](),y.push((l[T]?"":"no-")+T));return l.addTest=function(t,e){if("object"==typeof t)for(var a in t)P(t,a)&&l.addTest(a,t[a]);else{if(t=t.toLowerCase(),l[t]!==i)return l;e="function"==typeof e?e():e,"undefined"!=typeof enableClasses&&enableClasses&&(g.className+=" "+(e?"":"no-")+t),l[t]=e}return l},a(""),p=m=null,l._version=d,l._prefixes=u,l.testStyles=I,l}(this,this.document)),function(){for(var t=0,e=["ms","moz","webkit","o"],i=0;i<e.length&&!window.requestAnimationFrame;++i)window.requestAnimationFrame=window[e[i]+"RequestAnimationFrame"];window.requestAnimationFrame||(window.requestAnimationFrame=function(t,e){return window.setTimeout(function(){t()},16)})}(),"undefined"==typeof _gambitImageParallaxImages)var _gambitImageParallaxImages=[],_gambitScrollTop,_gambitWindowHeight,_gambitScrollLeft,_gambitWindowWidth;!function($,t,e,i){function a(t,e){this.element=t,this.settings=$.extend({},r,e),""==this.settings.align&&(this.settings.align="center"),this._defaults=r,this._name=n,this.init()}var n="gambitImageParallax",r={direction:"up",mobileenabled:!1,mobiledevice:!1,width:"",height:"",align:"center",velocity:".3",image:"",target:"",repeat:!1,loopScroll:"",loopScrollTime:"2",removeOrig:!1,complete:function(){}};$.extend(a.prototype,{init:function(){""===this.settings.target&&(this.settings.target=$(this.element)),""===this.settings.image&&(console.log("2222aaaaa"),"undefined"!=typeof $(this.element).css("backgroundImage")&&""!==$(this.element).css("backgroundImage")&&(console.log("222bbbbb"),this.settings.image=$(this.element).css("backgroundImage").replace(/url\(|\)|"|'/g,""))),console.log("3333"),_gambitImageParallaxImages.push(this),console.log("44444"),this.setup(),console.log("5555"),this.settings.complete(),console.log("_gambitImageParallaxImages",_gambitImageParallaxImages.length,_gambitImageParallaxImages)},setup:function(){this.settings.removeOrig!==!1&&$(this.element).remove(),this.resizeParallaxBackground()},doParallax:function(){if((!this.settings.mobiledevice||this.settings.mobileenabled)&&"fixed"!=this.settings.direction&&this.isInView()){var t=this.settings.target.find(".parallax-inner");if(t.css({minHeight:"150px"}),"undefined"!=typeof t&&0!==t.length){var e=(_gambitScrollTop-this.scrollTopMin)/(this.scrollTopMax-this.scrollTopMin),i=this.moveMax*e;("left"==this.settings.direction||"up"==this.settings.direction)&&(i*=-1);var a="translate3d(",n="px, 0px, 0px)",r="translate3d(0px, ",s="px, 0px)";"undefined"!=typeof _gambitParallaxIE9&&(a="translate(",n="px, 0px)",r="translate(0px, ",s="px)"),t.css("left"==this.settings.direction||"right"==this.settings.direction?{webkitTransition:"webkitTransform 1ms linear",mozTransition:"mozTransform 1ms linear",msTransition:"msTransform 1ms linear",oTransition:"oTransform 1ms linear",transition:"transform 1ms linear",webkitTransform:a+i+n,mozTransform:a+i+n,msTransform:a+i+n,oTransform:a+i+n,transform:a+i+n}:{webkitTransition:"webkitTransform 1ms linear",mozTransition:"mozTransform 1ms linear",msTransition:"msTransform 1ms linear",oTransition:"oTransform 1ms linear",transition:"transform 1ms linear",webkitTransform:r+i+s,mozTransform:r+i+s,msTransform:r+i+s,oTransform:r+i+s,transform:r+i+s}),t.css({webkitTransition:"webkitTransform -1ms linear",mozTransition:"mozTransform -1ms linear",msTransition:"msTransform -1ms linear",oTransition:"oTransform -1ms linear",transition:"transform -1ms linear"})}}},isInView:function(){var t=this.settings.target;if("undefined"!=typeof t&&0!==t.length){var e=t.offset().top,i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));return _gambitScrollTop>e+i||e>_gambitScrollTop+_gambitWindowHeight?!1:!0}},resizeParallaxBackground:function(){var t=this.settings.target;if("undefined"!=typeof t&&0!==t.length)if("true"===this.settings.repeat||this.settings.repeat===!0||1===this.settings.repeat)if("fixed"===this.settings.direction)t.css({backgroundAttachment:"fixed",backgroundRepeat:"repeat"}),t.attr("style","background-image: url("+this.settings.image+") !important;"+t.attr("style"));else if("left"===this.settings.direction||"right"===this.settings.direction){var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),a=e;e+=400*Math.abs(parseFloat(this.settings.velocity));var n=0;"right"===this.settings.direction&&(n-=e-a),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:e,height:i,position:"absolute",zIndex:-1,top:0,left:n,backgroundRepeat:"repeat",backgroundImage:"url("+this.settings.image+")"});var r=0;t.offset().top>_gambitWindowHeight&&(r=t.offset().top-_gambitWindowHeight);var s=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=e-a,this.scrollTopMin=r,this.scrollTopMax=s}else{var o=800;"down"===this.settings.direction&&(o*=1.2);var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),d=i;i+=o*Math.abs(parseFloat(this.settings.velocity));var l=0;"down"===this.settings.direction&&(l-=i-d),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:e,height:i,position:"absolute",zIndex:-1,top:l,left:0,backgroundRepeat:"repeat",backgroundImage:"url("+this.settings.image+")"});var r=0;t.offset().top>_gambitWindowHeight&&(r=t.offset().top-_gambitWindowHeight);var s=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=i-d,this.scrollTopMin=r,this.scrollTopMax=s}else if("none"===this.settings.direction){var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),g=this.calculateAspectRatioFit(this.settings.width,this.settings.height,e,_gambitWindowHeight),h=t.offset().left;"center"===this.settings.align?h="50% 50%":"left"===this.settings.align?h="0% 50%":"right"===this.settings.align?h="100% 50%":"top"===this.settings.align?h="50% 0%":"bottom"===this.settings.align&&(h="50% 100%"),t.css({backgroundSize:"cover",backgroundAttachment:"scroll",backgroundPosition:h,backgroundRepeat:"no-repeat",backgroundImage:"url("+this.settings.image+")"})}else if("fixed"===this.settings.direction){var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),g=this.calculateAspectRatioFit(this.settings.width,this.settings.height,e,_gambitWindowHeight),n=t.offset().left;"center"===this.settings.align?g.width>e&&(n-=(g.width-e)/2):"right"===this.settings.align&&g.width>e&&(n-=g.width-e),t.css({backgroundSize:g.width+"px "+g.height+"px",backgroundAttachment:"fixed",backgroundPosition:n+"px 50%",backgroundRepeat:"no-repeat",backgroundImage:"url("+this.settings.image+")"})}else if("left"===this.settings.direction||"right"===this.settings.direction){var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),a=e;e+=400*Math.abs(parseFloat(this.settings.velocity));var g=this.calculateAspectRatioFit(this.settings.width,this.settings.height,e,i),l=0;"center"===this.settings.align?g.height>i&&(l-=(g.height-i)/2):"bottom"===this.settings.align&&g.height>i&&(l-=g.height-i);var n=0;"right"===this.settings.direction&&(n-=g.width-a),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:g.width,height:g.height,position:"absolute",zIndex:-1,top:l,left:n,backgroundSize:g.width+"px "+g.height+"px",backgroundPosition:"50% 50%",backgroundRepeat:"no-repeat",backgroundImage:"url("+this.settings.image+")"});var r=0;t.offset().top>_gambitWindowHeight&&(r=t.offset().top-_gambitWindowHeight);var s=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=g.width-a,this.scrollTopMin=r,this.scrollTopMax=s}else{var o=800;"down"===this.settings.direction&&(o*=1.2);var e=t.width()+parseInt(t.css("paddingRight"))+parseInt(t.css("paddingLeft")),i=t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom")),d=i;i+=o*Math.abs(parseFloat(this.settings.velocity));var g=this.calculateAspectRatioFit(this.settings.width,this.settings.height,e,i),n=0;"center"===this.settings.align?g.width>e&&(n-=(g.width-e)/2):"right"===this.settings.align&&g.width>e&&(n-=g.width-e);var l=0;"down"===this.settings.direction&&(l-=g.height-d),t.find(".parallax-inner").length<1&&t.prepend('<div class="parallax-inner"></div>'),t.css({position:"relative",overflow:"hidden",zIndex:1}).attr("style","background-image: none !important; "+t.attr("style")).find(".parallax-inner").css({pointerEvents:"none",width:g.width,height:g.height,position:"absolute",zIndex:-1,top:l,left:n,backgroundSize:g.width+"px "+g.height+"px",backgroundPosition:"50% 50%",backgroundRepeat:"no-repeat",backgroundImage:"url("+this.settings.image+")"});var r=0;t.offset().top>_gambitWindowHeight&&(r=t.offset().top-_gambitWindowHeight);var s=t.offset().top+t.height()+parseInt(t.css("paddingTop"))+parseInt(t.css("paddingBottom"));this.moveMax=g.height-d,this.scrollTopMin=r,this.scrollTopMax=s}},calculateAspectRatioFit:function(t,e,i,a){return t/e>i/a?{width:Math.ceil(a*(t/e)),height:a}:i/a>t/e?{width:i,height:Math.ceil(i*(e/t))}:{width:i,height:a}}}),$.fn[n]=function(t){return this.each(function(){$.data(this,"plugin_"+n)||$.data(this,"plugin_"+n,new a(this,t))}),this}}(jQuery,window,document),jQuery(document).ready(function($){"use strict";function t(){_gambitRefreshScroll();for(var e=0;e<_gambitImageParallaxImages.length;e++)_gambitImageParallaxImages[e].doParallax();requestAnimationFrame(t)}function e(){_gambitScrollTop=$(window).scrollTop(),_gambitWindowHeight=$(window).height(),_gambitScrollLeft=$(window).scrollLeft(),_gambitWindowWidth=$(window).width()}$(window).on("scroll touchmove touchstart touchend",function(){requestAnimationFrame(_gambitParallaxAll)}),(Modernizr.touch&&jQuery(window).width()<=1024||window.screen.width<=1281&&window.devicePixelRatio>1)&&requestAnimationFrame(t),$(window).on("resize",function(){setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},1)}),setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},1),setTimeout(function(){var $=jQuery;e(),$.each(_gambitImageParallaxImages,function(t,e){e.resizeParallaxBackground()})},100)}),jQuery(document).ready(function($){"use strict";function t(){return Modernizr.touch&&jQuery(window).width()<=1e3||window.screen.width<=1281&&window.devicePixelRatio>1}if(!$("body").hasClass("vc_editor")){t()&&$(".bg-parallax.video > div, .gambit-bg-parallax.video > div").remove();var e=function(){var $=jQuery;$(".bg-parallax, .gambit-bg-parallax").each(function(){var t=$(this).next();if(0!=t.length&&"undefined"!=typeof $(this).attr("data-break-parents")){var e=parseInt($(this).attr("data-break-parents"));if(!isNaN(e)){for(var i=t.parent(),a=0;e>a&&!i.is("html");a++)i=i.parent();"undefined"==typeof t.attr("data-orig-margin-left")?(t.attr("data-orig-margin-left",t.css("marginLeft")),t.attr("data-orig-padding-left",t.css("paddingLeft")),t.attr("data-orig-margin-right",t.css("marginRight")),t.attr("data-orig-padding-right",t.css("paddingRight"))):(t[0].style.removeProperty("margin-left"),t[0].style.removeProperty("padding-left"),t[0].style.removeProperty("margin-right"),t[0].style.removeProperty("padding-right"),t[0].style.setProperty("margin-left",t.attr("data-orig-margin-left"),"important"),t[0].style.setProperty("padding-left",t.attr("data-orig-padding-left"),"important"),t[0].style.setProperty("margin-right",t.attr("data-orig-margin-right"),"important"),t[0].style.setProperty("padding-right",t.attr("data-orig-padding-right"),"important"));var n=i.width()+parseInt(i.css("paddingLeft"))+parseInt(i.css("paddingRight")),r=t.width()+parseInt(t.css("paddingLeft"))+parseInt(t.css("paddingRight")),s=t.offset().left-i.offset().left,o=i.offset().left+n-(t.offset().left+r),d=parseFloat(t.css("marginLeft")),l=parseFloat(t.css("marginRight")),g=parseFloat(t.css("paddingLeft")),h=parseFloat(t.css("paddingRight"));d-=s,g+=s,l-=o,h+=o,t[0].style.removeProperty("margin-left"),t[0].style.removeProperty("padding-left"),t[0].style.removeProperty("margin-right"),t[0].style.removeProperty("padding-right"),t[0].style.setProperty("margin-left",d+"px","important"),t[0].style.setProperty("padding-left",g+"px","important"),t[0].style.setProperty("margin-right",l+"px","important"),t[0].style.setProperty("padding-right",h+"px","important"),t.addClass("broke-out broke-out-"+e)}}})};$(window).resize(e),e(),$(".bg-parallax, .gambit-bg-parallax").next().addClass("bg-parallax-parent"),$(".bg-parallax.parallax, .gambit-bg-parallax.parallax").attr("style","").css("display","none"),$(".bg-parallax.parallax, .gambit-bg-parallax.parallax").each(function(){$(this).gambitImageParallax({image:$(this).attr("data-bg-image"),direction:$(this).attr("data-direction"),mobileenabled:$(this).attr("data-mobile-enabled"),mobiledevice:t(),width:$(this).attr("data-bg-width"),height:$(this).attr("data-bg-height"),velocity:$(this).attr("data-velocity"),align:$(this).attr("data-bg-align"),repeat:$(this).attr("data-bg-repeat"),target:$(this).next(),complete:function(){}})})}});var tag=document.createElement("script");tag.src="https://www.youtube.com/iframe_api";var firstScriptTag=document.getElementsByTagName("script")[0];firstScriptTag.parentNode.insertBefore(tag,firstScriptTag),jQuery(document).ready(function($){if(!$("body").hasClass("vc_editor")){$(".bg-parallax.video, .gambit-bg-parallax.video").each(function(){$(this).prependTo($(this).next().addClass("video"))});var t=$("[data-youtube-video-id], [data-vimeo-video-id]").parent();t.css("overflow","hidden"),$("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var t=$(this);setTimeout(function(){resizeVideo(t)},100)}),$(window).resize(function(){$("[data-youtube-video-id], [data-vimeo-video-id]").each(function(){var t=$(this);setTimeout(function(){resizeVideo(t)},2)})}),$("[data-vimeo-video-id]").each(function(){var t=$f($(this).find("iframe")[0]);t.addEvent("ready",function(){t.addEvent("playProgress",function e(t,i){jQuery("#"+i).parent().css("visibility","visible")})})})}});