

// onload responsive footer and menu stuff
jQuery(document).ready(function($){

	// select some things we'll use to make things responsive
	var menu = $( 'header nav' ),
		menu_toggle = menu.find( 'button.menu-toggle' ),
		menu_ul = menu.find( '.nav-menu' ),
		fluid_images = $( '.content-area img, .site-content img, .content-wide img' );


	// remove height and width from images inside
	fluid_images.removeAttr( 'width' ).removeAttr( 'height' );


	// show/hide menus when they click the toggler
	menu_toggle.click(function(){

		if ( menu_ul.is( ':visible' ) ) {
			menu_ul.hide();
		} else {
			menu_ul.show();
		}

		// when user clicks a link, open submenu if it exists.
		menu_ul.find( 'a' ).click(function(){
			var parent_li = $( this ).parent( 'li' );
			var submenu = $( this ).next( 'ul' );
			if ( !submenu.is( ':visible' ) && parent_li.hasClass( 'menu-item-has-children' ) ) {
				event.preventDefault();
				parent_li.addClass( 'open' );
				submenu.show();
			}
		});

	});


	// off-site link handling.
	$( '.content a' ).each(function(){
		if ( typeof( $( this ).attr( 'href' ) ) != 'undefined' ) {
			if ( !$( this ).attr( 'href' ).match( '/nwcuf.org/g' ) && 
				 !$( this ).attr( 'href' ).match( '/nwcuf.test/g' ) && 
				( $( this ).attr( 'href' ).match( 'http://') || $( this ).attr( 'href' ).match( 'https://') ) ) {
				$( this ).attr( 'target', '_blank' );
			}
		}
	});


	// accordion box bindings
	$( '.accordion-box-title' ).click(function(){
		$( this ).parent( '.accordion-box' ).children( '.accordion-box-content' ).slideToggle( 600 );
	});


	// link buttons that have a 'data-url' parameter
	$( 'button[data-url]' ).click(function(){
		window.location.href = $( this ).attr( 'data-url' );
	});


	// let's add a 'scrolled' indicator
	$(window).on('scroll', function() {
	    scrollPosition = $(this).scrollTop();
	    if (scrollPosition >= 250) {
	    	// if scrolled past threshold, add 'scrolled' class
	        $('header').addClass('scrolled');
	    } else {
	    	// otherwise, remove the class
	    	$('header').removeClass('scrolled');
	    }
	});

	// make sure the column contents are the same height so the buttons align with each other on large screens.
	var monolith_sizes = function() {
		// set heights to auto so we can measure them
		$('.our-work .third .col-content').height( 'auto' );

		$('.our-work').each(function(){
			// var to hold the tallest height so we know what to set them as.
			var tallest_height = 0;

			// do this on tablet portait and higher, otherwise keep it auto.
			if ( $(window).width() > 768 ) {

				// find and loop through all the columns in the .our-work section
				$(this).find('.third').each(function(){
					
					// if it's larger than our variable, store the new largest height
					if ( $(this).find('.col-content').height() > tallest_height ) {
						tallest_height = $(this).find('.col-content').height();
					}

				});

				// finally, set heights of all col content divs to the tallest, so the buttons line up.
				$(this).find('.third .col-content').height( tallest_height );

				var num_columns = $(this).find('.third').length;

				// set special margin for if there is only one column
				if ( num_columns === 1 ) {
					$(this).find('.third:nth(0)').css( 'margin-left', '34%' );
				}

				// set special margin if there are only 2 columns
				if ( num_columns === 2 ) {
					$(this).find('.third:nth(0)').css( 'margin-left', '17%' );
				}

				// set special margin if there are only 4 columns
				if ( num_columns === 4 ) {
					$(this).find('.third:nth(3)').css( 'margin-left', '34%' );
				}

				// set special margin if there are only 5 columns
				if ( num_columns === 5 ) {
					$(this).find('.third:nth(3)').css( 'margin-left', '17%' );
				}

			} else {

				// set all heights to auto if they switch to smaller screen orientation
				$('.our-work .third .col-content').height( 'auto' );
				$('.our-work .third').css( 'margin-left', '0' );

			}

		});
	}

	// set column heights on load
	setTimeout( monolith_sizes, 200 );

	// set column heights on resize
	$(window).resize( monolith_sizes );

    $('input[type=submit].gform_button').on('click', function(event){
       
		var submitCopy = $(this).clone();
		submitCopy.prop('id', '').prop('disabled', true).prop('value', 'Submitting...').insertAfter($(this));

		$(this).hide();
       
    });

});


(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-47451257-1', 'auto');
ga('send', 'pageview');

