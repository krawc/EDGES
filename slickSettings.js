/**
 * File slickSettings.js.
 *
 * Initializes Slick sliders across the page.
 */
 jQuery(document).ready(function( $ ) {

 	// $ Works! You can test it with next line if you like
 	// console.log($);

	$('.full-post-slider').slick({
		prevArrow: $('.slick-previous'),
		nextArrow: $('.slick-next'),
		autoplay: true,
		arrows: false
	});

 });
