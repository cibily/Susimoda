/**
 * Widget SimpleCalendar
 */
$(document).ready(function(){


	$('.wdg-simple-calendar table').each(function(){
		
		wdgCalendarInit(this);
	
	});
	
	
	function wdgCalendarInit( cal ) {
	
		var wrap 		= $(cal).parent();
		var preview 	= $(wrap).next();
		
		
		$(cal).find('.yearRow a').bind('click',function(){
			
			$(wrap).slideUp();
			
			$(wrap).load( $(this).attr('href'),{},function(){
				$(wrap).slideDown();
				wdgCalendarInit( $(wrap).find('table') );
			});
			
			return false;
			
		});
		
		// Target blank
		$(cal).find('.calendar a, .calendarHeader a, .calendarToday a').attr('target','_blank');
		
	}
	

});