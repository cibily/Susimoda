/**
 * NivoSlider Widget
 */

(function($){

	Array.prototype.shuffle = function() {
	var s = [];
	while (this.length) s.push(this.splice(Math.random() * this.length, 1)[0]);
	while (s.length) this.push(s.pop());
	return this;
	}

	$('.nivoslider-widget').each(function(){
		
		var wdg = $(this);
		
		var cfg = {
			random: false
		};
		
		tmp = $(this).find('.nivoslider-delay');
		if ( tmp.length ) {
			cfg.pauseTime = parseInt( $(tmp).text(), 10 );
		}
		
		tmp = $(this).find('.nivoslider-duration');
		if ( tmp.length ) {
			cfg.animSpeed = parseInt( $(tmp).text(), 10 );
		}
		
		tmp = $(this).find('.nivoslider-effect');
		if ( tmp.length ) {
			cfg.effect = $(tmp).text();
		}
		
		tmp = $(this).find('.nivoslider-directionNav');
		if ( tmp.length ) {
			if ( $(tmp).text() === 'false' ) cfg.directionNav = false;
		}
		
		tmp = $(this).find('.nivoslider-directionNavHide');
		if ( tmp.length ) {
			if ( $(tmp).text() === 'false' ) cfg.directionNavHide = false;
		}
		
		tmp = $(this).find('.nivoslider-controlNav');
		if ( tmp.length ) {
			if ( $(tmp).text() === 'false' ) cfg.controlNav = false;
		}
		
		tmp = $(this).find('.nivoslider-random');
		if ( tmp.length ) {
			if ( $(tmp).text() == '1' ) cfg.random = true;
		}
		
		$(this).find('span').remove();
		
		
		
		// Javascript images randomization
	    if ( cfg.random ) {
	    	
	    	//console.log("random");
	    	
		    var images = Array();
		    
			wdg.find('img').each(function(){ images.push(this); });
			
			images.shuffle();
		    
			wdg.html('');
			
		    $.each(images,function(i,obj){
		    	
		    	wdg.append($(obj));
		    	
		    });
	    
	    }
		
		
		
		
		//console.log(cfg);
		$(this).nivoSlider(cfg);
	
	});


})(jQuery);