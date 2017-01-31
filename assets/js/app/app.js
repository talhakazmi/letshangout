$(function(){
	
	$(window).scroll(function(e){
		e.preventDefault();
		var navHeight = ($('#navigation').height() / 2);
		if($(this).scrollTop() > navHeight){
			$('#navigation').addClass('fixed').addClass('shrink');			
		}else{
			$('#navigation').removeClass('fixed').removeClass('shrink');
		}
	});


	//Location detection bar
	
	$('.location-detect .close').click(function(){
		$('.location-detect').remove();
	});
	
});