/*
	Custom AutoComplete JS Class
	version: 1.0
	by: Waqas Karim
	date: 2/6/2015
 */


var defaults = {
	length : 2,
	element : '',
	source : '',
	requestType : 'POST',
	dataType: 'json',
	height: 'auto',
	data: ''
};

var opt;



var autoComplete = function(options){
	opt = $.extend(defaults, options);	
	//update() method is to create new auto complete div element to the target input
	this.update();
	
};


// Public Methods

autoComplete.prototype.getOptions = function(){
	return opt;
};

autoComplete.prototype.setOptions = function(o){
	$.extend(opt,o);
};

autoComplete.prototype.update = function(param){	

	var that = this;
	

	$(opt.element).on('keyup',function(e){
			
		if(e.which == 40){
			return;
		}


		if($(this).val().length > opt.length){

			//make ajax call to populate date into autocomplete div			

			$.ajax({
				url : opt.source,
				type : opt.requestType,
				data : (opt.data)? opt.data +'&term='+$(opt.element).val() : { 'term' : $(opt.element).val()},
				dataType: opt.dataType,	
				beforeSend:	function(){

					// add loader while ajax call going
					var posTop = Math.round($(opt.element).height() / 2) + 16;
					var posLeft = $(opt.element).val().length * 10;
					var loader = spinner({						
						style: 'position:relative; margin:10px auto;'
					});
					
					//initialize yii-autocomplete for empty data
					that.setContent(' ');
					$('.yii-autocomplete').html(loader);

					if(typeof param === "object" && typeof param.onloading === "function"){					
						param.onloading.call(that);	
					}
					
				},
				success: function(response){					
					$(opt.element).removeProp("disabled");					
					if(typeof param === "object" && typeof param.onsuccess === "function"){
						param.onsuccess(response);	
					}

					removeSpinner();
				},
				error : function(xhr, status){
					//param.onerror(status);
				},
				cache : true
			});

			
		}


		// Remove autoComplete div when input field value is zero
		if($(this).val().length == 0){
			removeSpinner();
			
			setTimeout(function(){ 
				$('.yii-autocomplete').remove(); 				
			}, 500);
		}

		if($(this).val().length == 0 || opt.length < $(this).val().length){			
			$('.selectionDiv').html('').css({height:'0%'});
		}
		
	});

	
};

//set Content into auto complete dropdown

autoComplete.prototype.setContent = function(content, callback){

		var that = this;
		//get parent target element width to set auto complete div with			
		var parentWidth = $(opt.element).width() + 30;
		$('.yii-autocomplete').remove();
		$(document).find('.selectionDiv').html('');	

		var acContnet = (content) ? content : '<li><b>No results found</b></li>';

		createDiv({
			width:parentWidth,
			height: opt.height,
			content:acContnet 
		});							
		$(opt.element).after(_getDiv());
		
		//list view event bind			
		$(opt.element).on('blur',removeAC);

		$('.yii-autocomplete').hover(function(){
			$(opt.element).off('blur');
		},function(){
			$(opt.element).on('blur',removeAC);
		});



		$('.yii-autocomplete ul').find('li').click(function(){		
			$('.yii-autocomplete').remove();
			$(opt.element).val($(this).find('a').data("value"));
			var params = {
				itemid : $(this).find('a').data("itemid"),
				venueid : $(this).find('a').data("venueid"),				
			};		
			callback.call(that,params);
		});

};


//Private Methods

var createDiv = function(params){	
	this.div = document.createElement('div');
	this.div.setAttribute('class', 'yii-autocomplete');
	this.div.style.width = params.width+'px;';
	if(params.height){
		this.div.style.maxHeight = params.height;
		this.div.style.overflow = 'hidden';	

	}
	

	this.content = '<ul>';
	this.content += params.content;
	this.content += '</ul>'
	this.div.innerHTML = this.content;


}

var _getDiv = function(){
	return this.div;
}



function removeAC(){
	$('.yii-autocomplete').remove();
}

