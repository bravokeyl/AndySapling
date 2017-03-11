jQuery( function ( $ ) {

	// FitVids
	$('.site-inner').fitVids();

	// Testimonial Slider
    if( $('.testimonial-slider').length ) {

        $('.testimonial-slider').bxSlider({
            controls: false,
            nextText: '',
            prevText: '',
            auto: true,
            pause: 7000,
            adaptiveHeight: true,
        });

    }

	$('.js-scroll-to-link').click(function() {

		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

			if (target.length) {

				$('html, body').animate({
					scrollTop: target.offset().top
				}, 500);

				return false;
			}

		}

	});


	$( '.one.layer h4' ).hover( function(){
		$( '.text-one' ).toggleClass( 'hovered hide-not-hovered' );
		$( '.context-default' ).toggleClass( 'hide-not-hovered hovered' );
	},function(){
			$( '.text-one' ).toggleClass( 'hide-not-hovered hovered' );
			$( '.context-default' ).toggleClass( 'hovered hide-not-hovered' );
	});

	$( '.two.layer h4' ).hover( function(){
			$( '.text-two' ).toggleClass( 'hovered hide-not-hovered' );
			$( '.context-default' ).toggleClass( 'hide-not-hovered hovered' );
	},function(){
			$( '.text-two' ).toggleClass( 'hide-not-hovered hovered' );
			$( '.context-default' ).toggleClass( 'hovered hide-not-hovered' );
	});

	$( '.three.layer h4' ).hover( function(){
			$( '.text-three' ).toggleClass( 'hovered hide-not-hovered' );
			$( '.context-default' ).toggleClass( 'hide-not-hovered hovered' );
	},function(){
			$( '.text-three' ).toggleClass( 'hide-not-hovered hovered' );
			$( '.context-default' ).toggleClass( 'hovered hide-not-hovered' );
	});
	
});
