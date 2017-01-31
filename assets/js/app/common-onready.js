$(function(){
	
	$(window).scroll(function(){
		var navHeight = ($('#navigation').height());
		if($(this).scrollTop() > navHeight){
			$('#navigation').addClass('fixed').addClass('shrink');
		}else{
			$('#navigation').removeClass('fixed').removeClass('shrink');
		}
	});

  //animate icons
  var delay = 0;
  for(var a = 0; a < $('.cat-icons').length; a++){
    $('.cat-icons').eq(a).animate({'width' : '120px', 'height' : '120px'}, a + delay);
    delay = delay + 260;
  }

	//Location detection bar	
	$('.location-detect .close').click(function(){
		$('.location-detect').remove();
	});
	
        /*
         * Ajax Call for getting sign up form
         */
        $('#signUp').on('click',function(){
            $('#detailContainer').html('');
            $('.modal-dialog').removeClass('modal-lg').addClass('modal-sm');
            $.ajax({
                url: baseUrl+'/user/signup',
                type: 'GET',
                success: function (data){
                    $('#detailContainer').html(data);

                }  // Ajax onsuccess call
            });// Ajax end
        }); 
        


        /*
         * Ajax Call for getting sign in form
         */
        $('#signIn').on('click',function(){

            $('#detailContainer').html('');
            $('.modal-dialog').removeClass('modal-lg').addClass('modal-sm');
            $.ajax({
                url: baseUrl+'/user/signin',
                type: 'GET',
                success: function (data){
                   $('#detailContainer').html(data);
                  
                   
                } // end ajax success 
            }); //and ajax call
        }); 
        

      $('.changeLocationBtn').on('click', function(){
           $('#changeLocationModal').modal('show');
           $('#updateLocation').on('click', function(){
               var str = $('#location-field').val();
               var reg = str.match(/^[aA-zZ]+(,\s[aA-zZ]+){1}$|^[aA-zZ]+(,[aA-zZ]+){1}$/g);
               if(reg){
                    console.log(reg);
                    var location = reg[0].split(",");
                    var city = location[0].trim();
                    var country = location[1].trim();
                    $('#location-field').parent().find('.form-error').remove();

                    $.ajax({
                        url: baseUrl+'/user/setuserlocation',
                        type: 'GET',
                        data : {'city' : city, 'country' : country, 'location_update' : true},
                        dataType: 'json',
                        cache : true,
                        beforeSend : function(){                                                    
                            removeOverlay(); 
                            var loader = overlay('#changeLocationModal .modal-content',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                        },
                        success : function(data){   
                            if(data){
                                removeOverlay();  
                                 $('.changeLocationBtn').find('.txt-location').html(city);
                                 $('#changeLocationModal').modal('hide');
                                 window.location = window.location.href;
                            }
                             

                        }
                    });

               }else{
                 $('#location-field').parent().find('.form-error').remove();
                 $('#location-field').after('<span class="help-block form-error">Please follow the example</span>');
               }
           });
      });
        
      

});


var spinner = function(params){
    var defaults = {
        left : '0px',
        top : '0px',        
        width : '25px',
        height: '25px'
    }

    var options = $.extend(defaults, params);
    var spinner =  '<div class="spinner" style="left:'+options.left+'; top:'+options.top+'; width:'+options.width+'; height:'+options.height+';'+options.style+'">';
        spinner += '<div class="double-bounce1"></div>';
        spinner += '<div class="double-bounce2"></div>';
        spinner += '</div>';
    return spinner;
}

var removeSpinner = function(){
    $('.spinner').remove();
};

var overlay = function(el, param){

    $('.overlay').remove();

    var defaults = {
       style : ''
    }

    var options = $.extend(defaults,param);

    var loader = spinner({
        left: '50%',
        top: '50%',
        width: '50px',
        height: '50px',
        style: 'margin-top: -25px; margin-left:-25px;'
    });

    var outputDiv = '<div class="overlay" style="'+ options.style +'">'+loader+'</div>';
    if(el !== ''){
        $(el).append(outputDiv);        
    }
    
    return outputDiv;
    
}

var removeOverlay = function(){
    $('.overlay').remove();
}


$.fn.submitForm = function(options){

    var that = $(this);

    var defaults = {
        form : 'form',        
        formAction : '',
        isAjax : false
    };

  
    var opt = $.extend(defaults, options);

    
         $(this).click(function(){    

         removeOverlay();
         //var w = $(opt.form).width();
         var loader = overlay(opt.form,{style:'width:100%; position:absolute; top:0px; left:0px;'});

                $.validate({
                    onError: function(){
                            removeOverlay();
                    },
                    onSuccess: function(){                   
                        $(opt.form).attr("action", opt.formAction).submit();
                    },
                    language : {
                        requiredFields : "This field is required"
                    }               
              });// form validation end    

        });
   
};