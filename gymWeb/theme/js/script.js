/* Main frontend behaviour for theme
	 - Apply background images from `data-background` attributes
	 - Basic helpers for bg-cover and overlay images
	 - Runs after jQuery is loaded (script included after plugins)
*/

;(function($){
	'use strict';

	$(function(){
		// Apply data-background -> background-image
		$('[data-background]').each(function(){
			var $el = $(this);
			var bg = $el.attr('data-background') || $el.data('background');
			if(bg){
				$el.css({
					'background-image': 'url("'+ bg + '")',
					'background-size': 'cover',
					'background-position': 'center center'
				});
			}
		});

		// Images with class overlay-image should be absolute inside container (no-op fallback)
		$('.overlay-image').each(function(){
			var $img = $(this);
			if($img.parent().hasClass('bg-image')){
				$img.css({ 'width':'100%', 'height':'auto' });
			}
		});

	});

})(window.jQuery);
