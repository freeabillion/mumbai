(function($){
jQuery(document).ready(function(){
	"use strict";

// Add Colorb Class to cause progress bar
	$( '.cause-meta .vc_bar' ).addClass( 'colorb' );
	$( '.cause-box .vc_bar ' ).addClass( 'colorb' );

// hamburger full menu
	(function(){
		var fire_fatnav = $( '.wn-hamburger-wrap' ).data( 'wnfire-fatnav' );
		if ( fire_fatnav == true ) {
			$.fatNav();
		}
	})();

// row animation
	$('.w-animate:not(.w-start_animation)').waypoint(function() {
		$(this).addClass('w-start_animation');
	},
	{
		offset: '70%'
	});

// elements animation
	$('.max-title:not(.wn-done-anim), .subtitle-element:not(.wn-done-anim), .wn-layer-anim:not(.wn-done-anim), .title-plus-text:not(.wn-done-anim)').waypoint(function() {
		$(this).addClass('wn-done-anim');
	},
	{
		offset: '80%'
	});

	if ( $('body').find('.blog-post').length > 0 ) {
		$('body').addClass('blog-pg-w');
	}

// sticky menu
	if ( jQuery("#header.horizontal-w").length >= 1 ) {
		jQuery(function() {
			var header = jQuery("#header.horizontal-w");
			var navHomeY = header.offset().top;
			var isFixed = false;
			var scrolls_pure = parseInt( $('body').data('scrolls-value') );
			var $w = jQuery(window);
			$w.scroll(function(e) {
				var scrollTop = $w.scrollTop();
				var shouldBeFixed = scrollTop > scrolls_pure;
				if (shouldBeFixed && !isFixed) {
					header.addClass("sticky");
					isFixed = true;
				}
				else if (!shouldBeFixed && isFixed) {
					header.removeClass("sticky");
					isFixed = false;
				}
				e.preventDefault();
			});
		});
	}

	$('.full-menu').find('li').each(function() {
		var $list_item = $(this);

		if ( $list_item.children('ul').length ) {
			$list_item.children('a').append('<i class="sl-arrow-down hamburger-nav-icon"></i>');
		}

		$list_item.children('a').children('i').toggle(function() {
			$(this).attr('class', 'sl-arrow-up hamburger-nav-icon');
			$list_item.children('ul').slideDown(350);
		}, function() {
			$(this).attr('class', 'sl-arrow-down hamburger-nav-icon');
			$list_item.children('ul').slideUp(350);
		});
	});

// Header11 Search
	(function(){
		var $search_header11 = $('#w-header-type-11-search'),
			$search_icon	 = $search_header11.children('i'),
			$search_input	 = $search_header11.children('input');

		$search_icon.on('click', function() {
			if ( $search_input.hasClass('open-search') === false ) {
				$search_input.animate({width: '180px', padding: '0 10px'}, 230).focus().addClass('open-search');
			} else {
				$search_input.animate({width: 0, padding: 0}, 230).removeClass('open-search');
			}
		});

		jQuery(document).on('click', function(e) {
			if ( e.target.id == 'header11_search_icon' )
				return

			if ( $search_input.attr('class') == 'open-search' )
				$search_input.animate({width: 0, padding: 0}, 230).removeClass('open-search');
		});
	})();

// Header11 phone components
	(function(){
		var phone_components = $('.phones-components');
		phone_components.children('h6').eq(1).addClass('active');
		phone_components.children('h6').on('click', function() {
			phone_components.children('h6').removeClass('active');
			$(this).addClass('active');
		});
	})();


// IconBox 22
	$('.icon-box22').on('mouseenter', function() {
		$('.icon-box22').removeClass('w-featured');
		$(this).addClass('w-featured');
	});

// Lightbox
	jQuery("a.inlinelb").fancybox({
		scrolling:'no',
		fitToView: false,
		maxWidth: "100%",
	});

	jQuery('.fancybox-media')
	.attr('rel', 'media-gallery')
	.fancybox({
		openEffect : 'none',
		closeEffect : 'none',
		prevEffect : 'none',
		nextEffect : 'none',
		arrows : false,
		helpers : {
			media : {},
			buttons : {}
		}
	});

// Magnific Lightbox

// Inline popups
$('.wn-header-toggle').magnificPopup({
  delegate: 'a',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});

$('.cause-meta').magnificPopup({
  delegate: '.donate-button',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});

$('.cause-box').magnificPopup({
  delegate: '.donate-button',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});

$('.wn-content-toggle').magnificPopup({
  delegate: '.topheader-map',
  removalDelay: 500, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});


$('.topheader-map').magnificPopup({
  type: 'iframe',
  iframe: {
     markup: '<div class="mfp-iframe-scaler">'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
              '</div>'
  },
  callbacks: {
    markupParse: function(template, values, item) {
     values.title = item.el.attr('title');
    }
  }
  
  
});

$('.video-popup').magnificPopup({
  type: 'iframe',
  iframe: {
     markup: '<div class="mfp-iframe-scaler">'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
              '</div>'
  },
  callbacks: {
    markupParse: function(template, values, item) {
     values.title = item.el.attr('title');
    },
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  }
});


$('.media-links').magnificPopup({
  delegate: '.audio-popup',
  removalDelay: 100, //delay removal by X to allow out-animation
  callbacks: {
    beforeOpen: function() {
       this.st.mainClass = this.st.el.attr('data-effect');
    }
  },
  midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
});

// Toggle Top Area

	jQuery(".w_toggle").toggle(
		function(){
			jQuery(".w_toparea").show(400);
			jQuery('.w_toggle').addClass('open');
		},
		function(){
			jQuery(".w_toparea").hide(400);
			jQuery('.w_toggle').removeClass('open');
	});


// Navigation Current Menu

	jQuery('#nav li.current-menu-item, #nav li.current_page_item, #side-nav li.current_page_item, #nav li.current-menu-ancestor, #nav li ul li ul li.current-menu-item , #hamburger-nav li.current-menu-item, #hamburger-nav li.current_page_item, #hamburger-nav li.current-menu-ancestor, #hamburger-nav li ul li ul li.current-menu-item, .full-menu li.current-menu-item, .full-menu li.current_page_item, .full-menu li.current-menu-ancestor, .full-menu li ul li ul li.current-menu-item ').addClass('current');
	jQuery( '#nav li ul li:has(ul)' ).addClass('submenux');

// Navigation Active Menu (One-Page)

	// some global caches
	var $window = $(window),
		nav_height = $('#nav-wrap').outerHeight();

	$('#nav').find('a').each(function() {
		// some caches
		var $this	= $(this),	// $(this) = #nav a
			href	= $this.attr('href');
		if( href && href.indexOf('#') !== -1 && href != '#' ) {
			// some caches
			var id 		= href.substring(href.indexOf('#')),
				section = $(id);
			if ( section.length > 0 ) {
				$window.on( 'resize scroll', function() {
					// some caches
					var section_top = section.offset().top - nav_height,
						section_height = section.outerHeight();
					if( $window.scrollTop() >= section_top && $window.scrollTop() < (section_top + section_height) ) {
						$this.parent().siblings().removeClass('active').end().addClass('active');
					}
				});
			}
		} // end if
	});


//	Scroll to top + menu smooth scroll

	jQuery(window).on('scroll', function(){
		if (jQuery(this).scrollTop() > 100) {
			jQuery('.scrollup').fadeIn();
		} else {
			jQuery('.scrollup').fadeOut();
		}
		});
	jQuery('.scrollup').on('click', function(){
		jQuery("html, body").animate({ scrollTop: 0 }, 700);
		return false;
	});
	jQuery(function() {
		jQuery('.max-hero a.button').on('click', function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = jQuery(this.hash);
				target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					jQuery('html,body').animate({
					scrollTop: target.offset().top
					}, 700);
					return false;
				}
			}
		});
		$('#nav').find('a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 700);
					return false;
				}
			}
		});
	});


// Vertical Header - Toggle Menu

	jQuery("#toggle-icon").toggle(
		function(){
			jQuery("#header.vertical-w").fadeIn(350);
			jQuery(".vertical-socials").fadeOut(350);
			jQuery(this).addClass('active');
			jQuery('#vertical-header-wrapper').animate({ 'left': 0 },350);
		},
		function(){
			jQuery("#header.vertical-w").fadeOut(350);
			jQuery(".vertical-socials").fadeIn(350);
			jQuery(this).removeClass('active');
			jQuery('#vertical-header-wrapper').animate({ 'left': -250 },350);
		});


// Menu Responsive Switcher
	(function(){
		/* prepend menu icon */
		$('#nav-wrap').prepend('<div id="menu-icon"><i class="fa-navicon"></i> <span>Menu - </span><span class="mn-clk">Navigation</span><span class="mn-ext1"></span><span class="mn-ext2"></span><span class="mn-ext3"></span></div>');

		if ( ! $('#responavwrap').length ) {
			var $cloned_nav	 = $('#nav-wrap').find('#nav').clone().attr('id', 'responav');
			$('<div></div>', {id:'responavwrap'})
				.prepend('<div id="close-icon"><span class="mn-ext1"></span><span class="mn-ext2"></span><span class="mn-ext3"></span></div>')
				.append($cloned_nav)
				.insertAfter('#header');
		}

		/* toggle nav */
		var $res_nav_wrap	= $('#responavwrap'),
			$menu_icon		= $('#menu-icon');

		$res_nav_wrap.find('li').each(function() {
			var $list_item = $(this);

			if ( $list_item.children('ul').length ) {
				$list_item.children('a').append('<i class="sl-arrow-right respo-nav-icon"></i>');
			}

			$list_item.children('a').children('i').toggle(function() {
				$(this).attr('class', 'sl-arrow-down respo-nav-icon');
				$list_item.children('ul').slideDown(350);
			}, function() {
				$(this).attr('class', 'sl-arrow-right respo-nav-icon');
				$list_item.children('ul').slideUp(350);
			});
		});

		$menu_icon.on('click', function() {
			if ( $res_nav_wrap.hasClass('open') === false ) {
				$res_nav_wrap.animate({'left': 0},350).addClass('open');
			} else {
				$res_nav_wrap.animate({'left': -265},350).removeClass('open');
			}
		});

		$res_nav_wrap.find('#close-icon').on('click', function() {
			if ( $res_nav_wrap.hasClass('open') === true ) {
				$res_nav_wrap.animate({'left': -265},350).removeClass('open');
			}
		});
	})();


	// offers toggle
	(function(){

		$(document).on('click', '.offer-toggle .toogle-plus .ti-plus', function() {
			$(this).parent().parent().find('.toggle-content').show(300);
			$(this).removeClass('ti-plus').addClass('ti-minus');
		});

		$(document).on('click', '.offer-toggle .toogle-plus .ti-minus', function() {
			$(this).parent().parent().find('.toggle-content').hide(300);
			$(this).removeClass('ti-minus').addClass('ti-plus');
		});

	})();

	// Contact form 7
	(function() {
		$('.discover-contact-form').find('.wpcf7-form-control').on('click', function() {
			var $this = $(this);
			$('.discover-contact-form').find('.wn-cnform').removeClass('wn-active');
			$this.closest('.wn-cnform').addClass('wn-active');
		});
	})();


	// commnet form
	(function() {
		$('.comment-form').find('p').not( '.form-submit' ).on('click', function() {
			var $this = $(this);
			$('.comment-form').find('p').removeClass('wn-active');
			$this.closest('p').addClass('wn-active');
		});
	})();



    // Sermon Toggles
    $( '.sermon-wrap-toggle .js-contentToggle' ).contentToggle({
        toggleProperties: [ 'height', 'opacity' ],
    	independent: false,
    	toggleOptions : {
    		duration: 400
    	}
    });

    // Header Toggles
    $( '#header .js-contentToggle' ).contentToggle({
    	defaultState: 'close',
        globalClose: true,
        triggerSelector: "i",
        toggleProperties: [ 'height', 'opacity' ],
        toggleOptions: {
            duration: 300
        }
    });


	(function(){
		$("#nav").superfish({
            delay: 300,
            hoverClass: 'wn-menu-hover',
            animation: {
                opacity: "show",
                height: 'show'
            },
            animationOut: {
                opacity: "hide",
                height: 'hide'
            },
            easing: 'easeOutQuint',
            speed: 280,
            speedOut: 0,
            cssArrows: false,
            pathLevels: 2,
        });
	})();


    // Share Toggles
	(function(){

	    $('#wn-share-modal-icon').click(function() {
	    	if ( $(this).parent().parent().parent().find('.wn-header-share').hasClass('opened') ) {
	    		$(this).parent().parent().parent().find('.main-slide-toggle').slideUp('opened');
	    		$(this).parent().parent().parent().find('.wn-header-share').removeClass('opened');
	    	} else {
	    		$(this).parent().parent().parent().find('.main-slide-toggle').slideDown(240);
	    		$('#header-search-modal').slideUp(240);
				$('#header-share-modal').slideDown(240);
				$(this).closest('.tools-section').addClass('open-toggle-slidedown');
				$(this).parent().parent().parent().find('.wn-header-share').addClass('opened');
				$(this).parent().parent().parent().find('.wn-header-search').removeClass('opened');
	    	}
		});

	    $( document ).on( 'click', function(e) {
			if ( e.target.id == 'wn-share-modal-icon' )
				return;

			var $this = $('#wn-share-modal-icon');
			if ( $this.parent().parent().parent().find('.wn-header-share').hasClass('opened') ) {
				$this.parent().parent().parent().find('.main-slide-toggle').slideUp('opened');
				$this.parent().parent().parent().find('.wn-header-share').removeClass('opened');
			}
		});

	})();


    // Search Toggles
	$('#wn-search-modal-icon').on( 'click', function() {
		if ( $(this).parent().parent().parent().find('.wn-header-search').hasClass('opened') ) {
			$(this).parent().parent().parent().find('.main-slide-toggle').slideUp('opened');
    		$(this).parent().parent().parent().find('.wn-header-search').removeClass('opened');
		} else {
			$(this).parent().parent().parent().find('.main-slide-toggle').slideDown(240);
			$('#header-share-modal').slideUp(240);
			$('#header-search-modal').slideDown(240);
			$(this).closest('.tools-section').addClass('open-toggle-slidedown');
			$(this).parent().parent().parent().find('.wn-header-search').addClass('opened');
			$(this).parent().parent().parent().find('.wn-header-share').removeClass('opened');
    		$(this).parent().parent().parent().find('.header-search-modal-text-box').focus();
		}
	});

	$( document ).on( 'click', function(e) {
		if ( e.target.id == 'wn-search-modal-icon' )
			return;

		var $this = $('#wn-search-modal-icon');
		if ( $this.parent().parent().parent().find('.wn-header-search').hasClass('opened') ) {
			$this.parent().parent().parent().find('.main-slide-toggle').slideUp('opened');
    		$this.parent().parent().parent().find('.wn-header-search').removeClass('opened');
		}
	});


	// Hamburger Menu
	(function(){

		$('.wn-ht').contentToggle({
		  defaultState: 'close',
		  globalClose: true,
		  triggerSelector: ".hamburger-toggle-link",
		  contentSelector: ".hamburger-menu-content",
		  toggleProperties: []
		});

		$('#hamburger-menu').find('li').each(function() {
			var $list_item = $(this);

			if ( $list_item.children('ul').length ) {
				$list_item.children('a').append('<i class="sl-arrow-down hamburger-nav-icon"></i>');
			}

			$list_item.children('a').children('i').toggle(function() {
				$(this).attr('class', 'sl-arrow-up hamburger-nav-icon');
				$list_item.children('ul').slideDown(350);
			}, function() {
				$(this).attr('class', 'sl-arrow-down hamburger-nav-icon');
				$list_item.children('ul').slideUp(350);
			});
		});
	})();


//	Windows Phone 8 and Device-Width + Menu fix

	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {

		var msViewportStyle = document.createElement("style");
		msViewportStyle.appendChild(
			document.createTextNode(
				"@-ms-viewport{width:auto!important}"
			)
		);
		document.getElementsByTagName("head")[0].
		appendChild(msViewportStyle);
		jQuery('ul#nav').addClass('ie10mfx');
	}


// doubleTapToGo

    var deviceAgent = navigator.userAgent.toLowerCase();
    var agentID = deviceAgent.match(/(iphone|ipod|ipad)/);
    if (agentID) {
		var width = jQuery(window).width();
		if (width > 768) {
			if(jQuery( '#nav li:has(ul)' ).length){
				jQuery( '#nav li:has(ul)' ).doubleTapToGo();
			}
		}
    }
	else {
		jQuery( '#nav li:has(ul)' ).doubleTapToGo();
	}


//	Accordion

	(function() {
		var $container = jQuery('.acc-container'),
			$trigger   = jQuery('.acc-trigger');
		$container.hide();
		$trigger.first().addClass('active').next().show();
		var fullWidth = $container.outerWidth(true);
		$trigger.css('width', fullWidth);
		$container.css('width', fullWidth);
		$trigger.on('click', function(e) {
			if( jQuery(this).next().is(':hidden') ) {
				$trigger.removeClass('active').next().slideUp(300);
				jQuery(this).toggleClass('active').next().slideDown(300);
			}
			e.preventDefault();
		});
		// Resize
		jQuery(window).on('resize', function() {
			fullWidth = $container.outerWidth(true)
			$trigger.css('width', $trigger.parent().width() );
			$container.css('width', $container.parent().width() );
		});
	})();


// Contact Form

	jQuery( "#contact-form" ).validate( {
		rules: {
			cName: {
				required: true,
				minlength: 3
			},
			cEmail: {
				required: true,
				email: true
			},
			cMessage: {
				required: true
			}
		},
		messages: {
			cName: {
				required: "Your name is mandatory",
				minlength: jQuery.validator.format( "Your name must have at least {0} characters." )
			},
			cEmail: {
				required: "Need an email address",
				email: "The email address must be valid"
			},
			cMessage: {
				required: "Message is mandatory",
			}
		},
		onsubmit: true,
		errorClass: "bad-field",
		validClass: "good-field",
		errorElement: "span",
		errorPlacement: function(error, element) {
		if(element.parent('.field-group').length) {
				error.insertAfter(element.siblings('h5'));
			} else {
				error.insertBefore(element);
			}
		}
	});



// Topbar search form

	jQuery('.top-search-form-icon').on('click', function(){
			jQuery( '.top-search-form-box' ).addClass('show-sbox');
			jQuery('#top-search-box').focus();
		});
	jQuery(document).on('click', function(ev){
		var myID = ev.target.id;
		if((myID !='top-searchbox-icon' ) && myID !='top-search-box'){
			jQuery( '.top-search-form-box' ).removeClass('show-sbox');
		}
	});


// Carousel Initialize

	jQuery("#our-clients.crsl").owlCarousel({
	   autoPlay : true,
	   pagination : false,
	   navigation : true,
	   navigationText : ["",""],
	});

	(function(){
		 var owl = $("#latest-projects");
		 owl.owlCarousel({
		 	items : 4,
		 	pagination: false
		 });
		// Custom Navigation Events
		$(".latest-projects-navigation .next").click(function(){
			owl.trigger('owl.next');
		});
		$(".latest-projects-navigation .prev").click(function(){
			owl.trigger('owl.prev');
		});
	})();

	(function(){
		var owl   = $('.testimonial-owl-carousel'),
			items = owl.data('testimonial_count');

		owl.owlCarousel({
			items : items,
			itemsDesktop : [1200,2], // 2 items between 1200px and 961px
			itemsDesktopSmall : [960,2], // 2 betweem 960px and 480px
			itemsMobile : [768,1], // 1 items between 768px and 0
			pagination: false,
			navigation: true,
			navigationText : ["",""],
		});
		$(".tc-navigation .next").click(function(){
			owl.trigger('owl.next');
		});
		$(".tc-navigation .prev").click(function(){
			owl.trigger('owl.prev');
		});
	})();

// Pie Initialize

	if(jQuery('.pie').length){
		jQuery('.pie').easyPieChart({
			barColor:'#ff9900',
			trackColor: '#f2f2f2',
			scaleColor: false,
			lineWidth:20,
			animate: 1000,
			onStep: function(value) {
				this.$el.find('span').text(~~value+1);
			}
		});
	}

// room and services toggle
	(function(){
		var $single_room = $('.suite-toggle');

		$single_room.find('.extra-content').hide();

		$(document).on('click', '.suite-toggle .toggle-content .ti-plus', function() {
			$(this).parent().parent().find('.extra-content').show(300);
			$(this).closest('.suite-toggle').addClass('click');
			$(this).removeClass('ti-plus').addClass('ti-minus');
		});

		$(document).on('click', '.suite-toggle .toggle-content .ti-minus', function() {
			$(this).parent().parent().find('.extra-content').hide(300);
			$(this).closest('.suite-toggle').removeClass('click');
			$(this).removeClass('ti-minus').addClass('ti-plus');
		})
	})();

// Our Team Carousel
jQuery(".our-service-carousel-wrap").owlCarousel({
	items : $(this).data('items'),
	itemsDesktop : [1200,3], // 3 items between 1200px and 961px
	itemsDesktopSmall : [960,2], // 2 betweem 960px and 480px
	itemsMobile : [479,1], // 1 items between 479px and 0
  	autoPlay : true,
	pagination : false,
	navigation : true,
	navigationText : ["",""],
});

// Latest From Blog Carousel
jQuery(".latest-b-carousel").owlCarousel({
	items : $(this).data('items'),
	itemsDesktop : [1200,3], // 3 items between 1200px and 961px
	itemsDesktopSmall : [960,2], // 2 betweem 960px and 480px
	itemsMobile : [479,1], // 1 items between 479px and 0
  	autoPlay : true,
	pagination : false,
	navigation : true,
	navigationText : ["",""],
});

$('.latest-b-carousel').find('.col-md-4').removeClass('col-md-4 col-sm-4').end().find('.col-md-3').removeClass('col-md-3 col-sm-3');

$('.social-count-plus ul li').find('.items span').removeAttr('style');

// Webnus Image Carousel
jQuery(".w-image-carousel").owlCarousel({
	items : $(this).data('items'),
  	autoPlay : 2000,
	pagination : false,
	navigation : false,
	navigationText : ["",""],
});


// Webnus Sermons Carousel
jQuery(".sermon-carousel").owlCarousel({
	items : $(this).data('items'),
	pagination : true,
	navigation : false,
	navigationText : ["",""],
});

// Progress Bar

	initProgress('.progress');
	function initProgress(el){
		jQuery(el).each(function(){
			var pData = jQuery(this).data('progress');
			progress(pData,jQuery(this));
		});
	}
	function progress(percent, $element) {
		var progressBarWidth = 0;
		(function myLoop (i,max) {
			progressBarWidth = i * $element.width() / 100;
			setTimeout(function () {
			$element.find('div').find('small').html(i+'%');
			$element.find('div').width(progressBarWidth);
			if (++i<=max) myLoop(i,max);
			}, 10)
		})(0,percent);
	}


	jQuery(window).load(function() {
		
		// FlexSlider
		jQuery('.flexslider').flexslider();
	
		//	Masonry
		if(jQuery('#pin-content').length){
			jQuery('#pin-content').masonry({
				itemSelector: '.pin-box',
			}).imagesLoaded(function() {
				jQuery('#pin-content').data('masonry');
			});
		}
		
	});


//  Super Slides

	jQuery('.max-hero').superslides({
		animation: 'fade'
	});


// fitVids

	jQuery("#wrap").fitVids();

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


// Countdown
	jQuery('.countdown-w').each(function() {
		var days = jQuery('.days-w .count-w', this);
		var hours = jQuery('.hours-w .count-w', this);
		var minutes = jQuery('.minutes-w .count-w', this);
		var seconds = jQuery('.seconds-w .count-w', this);
		var until = parseInt(jQuery(this).data('until'), 10);
		var done = jQuery(this).data('done');
		var self = jQuery(this);
		var updateTime = function() {
			var now = Math.round( (+new Date()) / 1000 );
			if(until <= now) {
				clearInterval(interval);
				self.html(jQuery('<span />').addClass('done-w block-w').html(jQuery('<span />').addClass('count-w').text(done)));
				return;
			}
			var left = until-now;
			seconds.text(left%60);
			left = Math.floor(left/60);
			minutes.text(left%60);
			left = Math.floor(left/60);
			hours.text(left%24);
			left = Math.floor(left/24);
			days.text(left);
		};
		var interval = setInterval(updateTime, 1000);
	});

// Countdown Clock

var doneMessage = jQuery('.countdown-clock').data('done');
var futureDate  = new Date(jQuery('.countdown-clock').data('future'));
var currentDate = new Date();
var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
function dayDiff(first, second) {
	return (second-first)/(1000*60*60*24);
}
if (dayDiff(currentDate, futureDate) < 100) {
	jQuery('.countdown-clock').addClass('twoDayDigits');
} else {
	jQuery('.countdown-clock').addClass('threeDayDigits');
}
if(diff < 0) {
	diff = 0;
	jQuery('.countdown-message').html(doneMessage);
}
var clock = jQuery('.countdown-clock').FlipClock(diff, {
	clockFace: 'DailyCounter',
	countdown: true,
	autoStart: true,
		callbacks: {
		stop: function() {
			jQuery('.countdown-message').html(doneMessage)
		}
	}
});


// Max Counter
	jQuery('.max-counter').each(function(i, el){
		var counter = jQuery(el).data('counter');
		if ( jQuery(el).visible(true) && !jQuery(el).hasClass('counted') ) {
			setTimeout ( function () {
				jQuery(el).addClass('counted');
				jQuery(el).find('.max-count').countTo({
					from: 0,
					to: counter,
					speed: 2000,
					refreshInterval: 100
				});
			}, 1000 );
		}
	});
	var win 	= jQuery(window),
		allMods = jQuery(".max-counter");
	win.on('scroll',  function(event) {
		allMods.each(function(i, el) {
			var el = jQuery(el),
				effecttype = el.data('effecttype');
			if( effecttype === 'counter') {
				var counter = el.data('counter');
				if ( el.visible(true) && !jQuery(el).hasClass('counted') ) {
					el.addClass('counted');
					el.find('.max-count').countTo({
						from: 0,
						to: counter,
						speed: 2000,
						refreshInterval: 100
					});
				}
			}
		});
	});
	jQuery.fn.countTo = function (options) {
		options = options || {};
		return jQuery(this).each(function () {
			// set options for current element
			var settings = jQuery.extend({}, jQuery.fn.countTo.defaults, {
				from:            jQuery(this).data('from'),
				to:              jQuery(this).data('to'),
				speed:           jQuery(this).data('speed'),
				refreshInterval: jQuery(this).data('refresh-interval'),
				decimals:        jQuery(this).data('decimals')
			}, options);
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			// references & variables that will change with each update
			var self = this,
				$self = jQuery(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			$self.data('countTo', data);
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			// initialize the element with the starting value
			render(value);
			function updateTimer() {
				value += increment;
				loopCount++;
				render(value);
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	jQuery.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	};


//  Tabs Widget

	jQuery('.widget-tabs').each(function() {
	jQuery(this).find(".tab_content").hide(); //Hide all content
		if(document.location.hash && jQuery(this).find("ul.tabs li a[href='"+document.location.hash+"']").length >= 1) {
			jQuery(this).find("ul.tabs li a[href='"+document.location.hash+"']").parent().addClass("active").show(); //Activate first tab
			jQuery(this).find(document.location.hash+".tab_content").show(); //Show first tab content
		} else {
			jQuery(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
			jQuery(this).find(".tab_content:first").show(); //Show first tab content
		}
	});
	jQuery("ul.tabs li").on('click', function(e) {
		jQuery(this).parents('.widget-tabs').find("ul.tabs li").removeClass("active"); //Remove any "active" class
		jQuery(this).addClass("active"); //Add "active" class to selected tab
		jQuery(this).parents('.widget-tabs').find(".tab_content").hide(); //Hide all tab content
		var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		jQuery(this).parents('.widget-tabs').find(activeTab).fadeIn(); //Fade in the active ID content
		e.preventDefault();
	});


//  Parallax Sections
	( function() {

		// set background image to '.parllax-bg' div
		$('.wn-parallax').each( function() {
			var $this 		= $(this),
				parallax_bg = $this.css( 'background-image' ).replace( 'url(', '' ).replace( ')', '' ).replace( /\"/gi, "" );
			$this.find( '.wn-parallax-bg' ).css( 'background-image', 'url(' + parallax_bg + ')' );
		});

		function wn_start_parallax() {
			$('.wn-parallax').each( function() {
				var $this 					= $(this),
					window_innerheight		= window.innerHeight,
					section_height			= $this.outerHeight(),
					wn_parallax_el 			= $this[0],
					bounding_client			= wn_parallax_el.getBoundingClientRect(),
					$wn_parallax_bgholder	= $this.find( '.wn-parallax-bg-holder' ),
					wn_parallax_bgholder_el	= $this.find( '.wn-parallax-bg-holder' )[0];

				var vertical_offset = ( bounding_client.top < 0 || bounding_client.height > window_innerheight ) ? ( bounding_client.top / bounding_client.height ) : bounding_client.bottom > window_innerheight ? ( ( bounding_client.bottom - window_innerheight ) / bounding_client.height ) : 0,
					parallax_speed  = $wn_parallax_bgholder.data( 'wnparallax-speed' );

				vertical_offset = -( vertical_offset * parallax_speed );
				TweenMax.set( wn_parallax_bgholder_el, { force3D: 'true', y: vertical_offset } );
			});
		}

		window.addEventListener( 'scroll', function() {
			window.requestAnimationFrame( wn_start_parallax );
		}, false );

		wn_start_parallax();

	})();


// Init update Woo Cart
	function updateShoppingCart(){
		"use strict";
		jQuery('body').bind('added_to_cart', add_to_cart);
		function add_to_cart(event, parts, hash) {
			var miniCart = jQuery('.woo-cart-header');
			if ( parts['div.widget-woo-cart-content'] ) {
				var $cartContent = jQuery(parts['div.widget-woo-cart-content']),
				$itemsList = $cartContent .find('.cart-list'),
				$total = $cartContent.find('.total').contents(':not(strong)').text();
				miniCart.find('.woo-cart-dropdown').html('').append($itemsList);
				miniCart.find('.total span').html('').append($total);
			}
		}
	}

	document.createElement("article");
	document.createElement("section");

	// copy from VC(js_composer_front.min.js)
	function wn_resize_video_background( $element ) {
		var iframeW,
			iframeH,
			marginLeft,
			marginTop,
			containerW = $element.innerWidth(),
			containerH = $element.innerHeight(),
			ratio1 = 16,
			ratio2 = 9;

		if ( ( containerW / containerH ) < ( ratio1 / ratio2 ) ) {
			iframeW = containerH * (ratio1 / ratio2);
			iframeH = containerH;

			marginLeft = - Math.round( ( iframeW - containerW ) / 2 ) + 'px';
			marginTop = - Math.round( ( iframeH - containerH ) / 2 ) + 'px';

			iframeW += 'px';
			iframeH += 'px';
		} else {
			iframeW = containerW;
			iframeH = containerW * (ratio2 / ratio1);

			marginTop = - Math.round( ( iframeH - containerH ) / 2 ) + 'px';
			marginLeft = - Math.round( ( iframeW - containerW ) / 2 ) + 'px';

			iframeW += 'px';
			iframeH += 'px';
		}

		$element.find( '.vc_video-bg video' ).css( {
			maxWidth: '1000%',
			marginLeft: marginLeft,
			marginTop: marginTop,
			width: iframeW,
			height: iframeH
		} );
	}

	(function(){
		$('.wn_video-bg-container').each(function() {
			var $this = $(this);
			wn_resize_video_background( $this );
			jQuery( window ).bind( 'resize', function () {
				wn_resize_video_background( $this );
			});
		});
	})();

}); // end document ready

$(function(){
	$(".wn-social-network .social-main-content a").hover(
		function() {
			$(".wn-social-network").addClass($(this).data("network")).addClass("active");
		},
		function() {
			$(".socialfollow.wn-social-network").removeClass("active dropbox evernote envato feed vine yelp yahoo wordpress soundcloud reddit lastfm spotify tumblr facebook dribbble foursquare flickr github twitter vimeo dribble youtube pinterest google-plus linkedin rss instagram skype other-social");
		}
	);
});


})(jQuery);