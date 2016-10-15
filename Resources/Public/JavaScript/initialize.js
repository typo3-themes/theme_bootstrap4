/**
 * Theme specific initialization
 * Just overwrite this file include in your child theme!
 */
jQuery(document).ready(function() {
	theme.body.scrollOffset = 180;
	theme.menu.main.scrollOffset = 180;
	theme.initialize();

	// @ToDo: maybe move to teme.initialize() ?
	function carouselFade() {
		jQuery('.carousel-fade').each(function() {
			var maxHeight = -1;
			jQuery(this).find('.carousel-item > div').each(function() {
				if (jQuery(this).height() > maxHeight) {
					maxHeight = jQuery(this).height();
				}
			});
			jQuery(this).height(maxHeight);
		});
	}
	carouselFade();
	jQuery(window).resize(function() {
		carouselFade();
	});

});