jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 500) {
        jQuery(".head-nav").addClass("bg-dark");
    } else {
jQuery(".head-nav").removeClass("bg-dark");
    }
});