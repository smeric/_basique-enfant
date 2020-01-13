/**
 * Ensemble des scripts Javascript utilisés par le site
 * 
 * @package WordPress
 * @subpackage _basique-enfant
 **/

/** Definition d'un console.log minimum pour éviter des erreurs Javascript **/
window.console||(console={log:function(){}});

/** *************************************************************************************** **/

/*! Smooth scroll to the class area_name : $('.area_name').click(function(e){e.preventDefault();$(this).autoscroll($(this).attr('href'));}); */
(function($){$.fn.autoscroll=function(selector){$('html,body').animate({scrollTop:$(selector).offset().top},200);};})(jQuery);

/** *************************************************************************************** **/

(function($){
    'use strict';

    /** C'est parti ! **/
    $(function(){
        // Localisation des scripts : mise à jour de l'objet GLOBALS
        var GLOBALS_defaults = {
            "theme"            : "Theme",
            "site_url"         : "",
            "parent_theme_url" : "",
            "theme_url"        : "",
            "ajaxurl"          : "",
            'page_shortlink'   : "",
            /* Debug */
            "is_debug"         : false,
            "log"              : function(msg){
                                    if(!msg||!this.is_debug){return;}
                                    var prefix='['+this.theme+'] ';
                                    if(msg===null){console.log(prefix+'null');}
                                    else if('function'===typeof msg||'object'===typeof msg){console.log(msg);}
                                    else{console.log(prefix+msg);}
            },
            /* Viewport size */
            "viewport"         : {
                "width"  : Math.max(document.documentElement.clientWidth,window.innerWidth||0),
                "height" : Math.max(document.documentElement.clientHeight,window.innerHeight||0),
            },
            /* Screen size */
            "screensize"       : window.getComputedStyle(document.body,':before').getPropertyValue('content').replace(/['"]+/g,''),
            /* Traduction de chaines de caractères */
            "entering_debug"   : "",
            "viewport_size"    : "",
            "screen_size"      : "",
            "self_xss_title"   : "",
            "self_xss_text"    : "",
            "self_xss_link"    : "",
        };
        GLOBALS=$.extend({},GLOBALS_defaults,window.GLOBALS||{});
        GLOBALS.is_debug='1'===GLOBALS.is_debug?true:false;

        /* Avertissement self XSS */
		console.log("%c \r\n%s","color: red; font-size: xx-large;",GLOBALS.self_xss_title);
		console.log("%c%s","font-size: large;",GLOBALS.self_xss_text);
		console.log("%c%s\r\n ","font-style: italic;",GLOBALS.self_xss_link);

        GLOBALS.log(GLOBALS.entering_debug);
        GLOBALS.log('GLOBALS : ');
        GLOBALS.log(GLOBALS);

        // Mise en cache de variables utiles :
        var $w=$(window),$d=$(document),$html=$('html'),$body=$('body');

        $w.on('resize',function(){
            // Récupère la taille du viewport
            GLOBALS.viewport={
                "width"  : Math.max(document.documentElement.clientWidth,window.innerWidth||0),
                "height" : Math.max(document.documentElement.clientHeight,window.innerHeight||0)
            };
            GLOBALS.log(GLOBALS.viewport_size+GLOBALS.viewport.width+' x '+GLOBALS.viewport.height);
            // Récupère la taille de l'écran
            GLOBALS.screensize=window.getComputedStyle(document.body,':before').getPropertyValue('content').replace(/['"]+/g,'');
            GLOBALS.log(GLOBALS.screen_size+GLOBALS.screensize);
        });

        // Executez vos scripts Javascript ici...

        $('.go-top').click(function(e){e.preventDefault();$(this).autoscroll($(this).attr('href'));});

    });
}(jQuery));
