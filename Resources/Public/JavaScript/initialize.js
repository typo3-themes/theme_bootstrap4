/**
 * Theme specific initialization
 * Just overwrite this file include in your child theme!
 */
jQuery(document).ready(function() {
	theme.body.scrollOffset = 180;
	theme.menu.main.scrollOffset = 180;
	theme.initialize();

	// activate dropdown
	// http://v4-alpha.getbootstrap.com/components/dropdowns/#via-javascript
	// jQuery('.dropdown-toggle').dropdown();
	
});