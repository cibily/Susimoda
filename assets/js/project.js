/**
 * cavamvicenza.it
 * Marco Pegoraro
 * 11/09/2010
 *
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!! jQuery 1.3 required !!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!
 */

/**
 * Basic configuration:
 * 1. Cmf+F Cavam
 * 2. replace with project's name (variable string)
 * 3. fill your rules
 */


/* Start jQuery wrapper */
(function($){
	
	
	/**
	 * Project's Object
	 * Classe che contiene tutte le funzionalitˆ espresse dal progetto.
	 */
	var CavamClass = function( config ) {
		
		// Riferimento globale all'istanza medesima.                                               #
		// Utile all'interno dei metodi di callback utilizzati con jQuery.                         #
		var instance = this;
		
		// Project's Class main configuration rules goes here...
		var config = $.extend({foo:''
			
		},config);	
		
		/**
		 * Inizializzazione del componente.
		 */
		this.init = function() {
			
			instance.IEHacks();
			instance.pseudoClasses();
			instance.mainMenu();
			instance.hslide();
			
			if ( $.prettyPhoto ) {
				
				$('.jqLightbox').prettyPhoto({
					animation_speed:'normal',
					theme:'light_rounded',
					slideshow:3000,
					autoplay_slideshow:false
				});
				
				// Photogallery Slide Show.
				// Se le immagini appartengono ad una gallery in linea viene impostato un
				// relative dedicato alla singola galleria fotografica.
				$('.jqLightboxGallery').each(function(){
					
					var rel = 'prettyPhoto[photogallery';
					
					var gwrap = $(this).parents('.jcms-photogallery-list-item-images');
					if ( gwrap.length > 0 ) rel += '_' + gwrap.attr('id');
					
					rel += ']';
					
					$(this).attr('rel',rel);
					
				});
					
				$("a[rel^='prettyPhoto']").prettyPhoto({
					animation_speed:'normal',
					theme:'light_rounded',
					slideshow:3000,
					autoplay_slideshow:true
				});
				
				// Inizializza la gallery al click su qualunque immpagine della gallery in pagina.
				// Gestisce il tooltip della gallery.
				
				$('.jcms-photogallery-full-page').hover(function(e){
					
					$(this).css('cursor','pointer');
					
					if ( $('#gallery_alert').length == 0 ) $('body').append('<div id="gallery_alert"><div id="gallery_alert_wrap">clicca per vedere la gallery</div></div>');
					
					$('#gallery_alert').fadeIn(200);
					
				},function(){
					
					$('#gallery_alert').hide();
					
				}).click(function(){
					
					$(this).find('.jcms-photogallery-images-item a:first').click();
					
					return false;
				});
				
				/*
				$('.jcms-photogallery-full-page').mousemove(function(e){
					
					posX = e.pageX - 20 - $('#gallery_alert').width();
					if ( posX < 10 ) posX = e.pageX + 20;
					
					$('#gallery_alert').css({
						position:'absolute',
						top: e.pageY - $('#gallery_alert').height() / 2,
						left: posX,
						zIndex: 9999
					});
				
				});
				*/
				
			}
			
		    
					
		} // EndOf: "init()" #######################################################################
		
		
		/**
		 * Workaround di stile da applicare al famoso browser IE!
		 */
		this.IEHacks = function() {
			
			if ( !$.browser.msie ) return;
			
			// Sposta il menu sotto al corpo per compatibilità x-index.
			if ( !$('body').is('.home') ) {
				$('#content-wrapper').after( $('#mm') );
				$('#mm').addClass('ie');
				$('#mm').css('top', $('#header-wrapper').offset().top+10 );
			}
			
			
		} // EndOf: "IEHacks()" ####################################################################
		
		
		/**
		 * Setup hSlide gallery.
		 */
		this.hslide = function() {
			
			// Controllo la presenza di HSlide.
			if ( $('#hslide').length == 0 ) return;
			if ( $('#hslide img').length <= 1 ) return;
			
			
			
			//$('#hslide').html('');
			
			$('body').append('<ul id="hslide-list"></ul>');
			
			$('#hslide img').each(function(){
				$('#hslide-list').append('<li></li>');
				
				// Se l'immagine contiene un link viene mantenuto attivo nello slide.
				if ( $(this).parent().is('a') ) {
					$('#hslide-list li:last').append($(this).parent());
				} else {
					$('#hslide-list li:last').append($(this));
				}
				
				
			});
		    
		    $('#hslide').html('');
		    $('#hslide').append( $('#hslide-list') );
		    
		    $('#hslide-list').carouFredSel({
				visibleItems        : 1,
				direction           : "left",
				auto				: {
					play: true,
					pauseDuration: 5000
				}
		    });
		    
		    wrap = $('#hslide .caroufredsel_wrapper');
		    ul = wrap.find('ul');
		    
		  
			
		} // EndOf: "HSlide()" #####################################################################
		
		
		/**
		 * Applica pseudo classi notevoli al sorgente della pagina.
		 * ul>li.first
		 * ul>li.last
		 */
		this.pseudoClasses = function() {
			
			$('ul').each(function(){
				$('li:first',$(this)).addClass('first');
				$('li:last',$(this)).addClass('last');
			});
			
		} // EndOf: "pseudoClasses()" ##############################################################
		
		
		
		this.mainMenu = function() {
			
			$('#mm>ul>li').hover(function(){
				$(this).find('ul').css('display','block');
			},function(){
				$(this).find('ul').css('display','none');
			});
			
		} // EndOf: "mainMenu()" ###################################################################		
		
	
	} // EndOf: "Project's Class Object" --------------------------------------------------------- #

	
	
	/**
	 * Initialization Block
	 * Don't edit lines below!
	 */
	$(document).ready(function(){
		
		var tmp = new CavamClass({});
		tmp.init();
		
	});
	
	
/* End jQuery wrapper */
})(jQuery);