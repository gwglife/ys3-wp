
//Scroll menu animation
jQuery(window).scroll(function() {    
	var scroll = jQuery(window).scrollTop();
	if (scroll >= 500) {
		jQuery(".head-nav").addClass("bg-dark");
	} else {
		jQuery(".head-nav").removeClass("bg-dark");
	}
});

//Modal backup system
jQuery(document).ready(function(jQuery){

	function quoteLink(){
		jQuery(".quote-link, .quote-link-nostyle").click(function(){
			jQuery("#quoteModal").modal('show');
			console.log('fire!');
		});
	}

	setTimeout(quoteLink, 500);
});

