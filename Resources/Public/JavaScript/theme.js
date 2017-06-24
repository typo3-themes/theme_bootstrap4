/**
 *Theme main java script object
 * Must be included with force
 *
 * @type object
 */
var theme = {

	body: {
		jo: null,

		/**
		 * Offset when body classes must be toggled
		 * @type int
		 */
		scrollOffset: 0,
		/**
		 * Array of two css classes:
		 * First is appended to body when the scroll offset isn't reached yet.
		 * When the scroll offset is reached, the first css class is replaced with the second one in the body.
		 * @type Array
		 */
		scrollToggleClasses: ['scroll-offset-before', 'scroll-offset-after']

	},

	/**
	 * Initialize theme javascript
	 */
	initialize: function() {

		this.body.jo = jQuery('body');

		// Bind on scroll event
		jQuery(document).on('scroll', this.body.jo, theme.onScroll);
		// 
		//theme.onScroll();
		this.menu.initialize();
		this.elements.initialize();
		// Bind on resize and init
		jQuery(window).resize(theme.onResize);
		theme.onResize();
		theme.onScroll();
	},

	responsive: {
		// Contains the current device, identified by display resolution
		currentDevice: '',
		/**
		 * Steps contains a list with the definition of the breakpoints
		 * @type object
		 */
		breakpoints: {
			/**
			 * @todo: breakpoints should be passed
			 */
			xs: 0,
			sm: 544,
			md: 768,
			lg: 992,
			xl: 1200
		}

	},

	menu: {
		initialize: function() {

			this.main.initialize();
			this.language.initialize();
		},
		main: {
			jo: null,
			/**
			 * Offset when body classes must be toggled
			 * @type int
			 */
			scrollOffset: 0,
			/**
			 * Array of two css classes:
			 * First is appended to body when the scroll offset isn't reached yet.
			 * When the scroll offset is reached, the first css class is replaced with the second one in the body.
			 * @type Array
			 */
			scrollToggleClasses: ['', 'navbar-fixed-top'],
			initialize: function() {
				this.jo = jQuery('#menu-main');
				if (theme.menu.main.jo.length > 0) {
					// menu main initialization
				}
			}

		},
		language: {
			jo: null,
			initialize: function() {
				this.jo = jQuery('#menu-language');
				if(theme.menu.language.jo.length>0) {
					// Only in case of a select-box language menu
					if (theme.menu.language.jo.is('select')) {
						// ..bind the on-change
						theme.menu.language.jo.on('change', function () {
							document.location = $(this).find(':selected').data('link');
						});
					}
				}
			}
		}

	},

	/**
	 * Is called on resize for executing theme actions
	 */
	onResize: function() {
		// Identify the current device width
		jQuery.each(theme.responsive.breakpoints, function(key, value) {
			var width = jQuery(window).width();
			if(value <= width) {
				theme.responsive.currentDevice = key;
			}
		});
	},

	/**
	 * Is called on scroll for executing theme actions
	 */
	onScroll: function() {
		var scrollTop = jQuery(window).scrollTop();
		if(theme.body.jo !== null) {
			if(scrollTop > theme.body.scrollOffset) {
				theme.body.jo.addClass(theme.body.scrollToggleClasses[1]).removeClass(theme.body.scrollToggleClasses[0]);
			}
			else {
				theme.body.jo.addClass(theme.body.scrollToggleClasses[0]).removeClass(theme.body.scrollToggleClasses[1]);
			}
		}
		if(theme.menu.main.jo !== null) {
			if (scrollTop > theme.menu.main.scrollOffset) {
				theme.menu.main.jo.addClass(theme.menu.main.scrollToggleClasses[1]).removeClass(theme.menu.main.scrollToggleClasses[0]);
			}
			else {
				theme.menu.main.jo.addClass(theme.menu.main.scrollToggleClasses[0]).removeClass(theme.menu.main.scrollToggleClasses[1]);
			}
		}
	},

	/**
	 * Scroll to a selector position
	 * @param selector
	 */
	scrollTo: function(selector) {
		var element = jQuery(selector);
		jQuery('html, body').animate({
			/**
			 * @todo scrollto-offset per variable bereitstellen
			 */
			scrollTop: element.offset().top - 120
		}, 500);
	},

	/**
	 * Returns a translation value/label
	 * @param key
	 * @param type
	 * @returns {string}
	 */
	translate: function(key, type) {
		var label = '';
		type = typeof type !== 'undefined' ? type : 'label';
		type = 'tx_themes_' + type + '.';
		if(typeof TYPO3.lang[type] !== 'undefined') {
			if(typeof TYPO3.lang[type][key] !== 'undefined') {
				label = TYPO3.lang[type][key];
			}
			else if(typeof console !== 'undefined') {
				console.warn('theme.translate failed: TYPO3.lang[\'' + type + '\'].' + key + ' not found');
			}
		}
		else if(typeof console !== 'undefined') {
			console.warn('theme.translate failed: TYPO3.lang[\'' + type + '\'] not found');
		}
		return label;
	},
	
	elements: {
		initialize: function() {

			this.topLink.initialize();
		},
		topLink: {
			jo: null,
			initialize: function () {
				this.jo = jQuery('#partial-elements-top-link');
				if(theme.elements.topLink.jo.length>0) {
					jQuery('a', theme.elements.topLink.jo).click(function () {
						theme.scrollTo(theme.body.jo);
						return false;
					});
				}
			}
		}
		
		
	}


};