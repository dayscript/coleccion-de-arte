(function ($, Drupal, window, document, undefined) {
	$(document).ready(function(){


		if( $('body').hasClass('page-inicio') ){
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/fondo.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}else if( $('body').hasClass('page-exposicion') ){
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/kent_soho_03_11_067.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}else if( $('body').hasClass('page-node-6') || $('body').hasClass('page-node-10') || $('body').hasClass('page-node-114') || $('body').hasClass('page-node-116')){
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/fondo_elartista.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}else if( $('body').hasClass('page-programacion') || $('body').hasClass('section-exposicion') ){
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/colonial_landscapes_4_baja.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}else if( $('body').hasClass('page-prensa') || $('body').hasClass('section-kit-de-prensa') ){
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/kent_red_text_prints_norton_07_2012-03.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}else{
			$.backstretch(
				"http://www.banrepcultural.org/william-kentridge/sites/default/files/L'exploration du sahara 5_baja.jpg",
				{centeredX: true},
				{centeredY: true}
			);
		}


		
	});// fin document ready
})(jQuery, Drupal, this, this.document);
