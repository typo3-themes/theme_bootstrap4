// Define theme object, when it's not already available
var theme = theme || {};
jQuery(document).ready(function() {
	// Process menu actions
	if(typeof(theme.menu) === 'undefined') {
		theme.menu = {};
	}
	// Language menu
	theme.menu.language = jQuery('#menu-language');
	if(theme.menu.language.length>0) {
		// Only in case of a select-box language menu
		if(theme.menu.language.is('select')) {
			// ..bind the on-change
			theme.menu.language.on('change', function () {
				document.location = $(this).find(':selected').data('link');
			});
		}
	}
	
	
	
	

});