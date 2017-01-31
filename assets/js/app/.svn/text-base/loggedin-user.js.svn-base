/*
	Landinage Page JavaScript
	Author:Waqas Karim
	Date: 1/28/20145
 */

$(function(){


 	// User Dropdown menu
	var iteration = 1;
	$('.lh-dropdown > a').on('click',function(){
        var that = $(this);
		switch(iteration){
			case 1: 				
				that.next().show();
				break;
			case 2:				
				that.next().hide();
				break;
		}

		iteration++;
		if(iteration > 2)
				iteration = 1

		$(this).data("iteration", iteration);

	});


	/*$('.lh-dropdown > a').on('blur',function(){
		$('.lh-dropdown .lh-dropdown-menu').hide();
		iteration = 1;
	});*/



	$('.lh-dropdown ul a').click(function(){
		$('.lh-dropdown ul').hide();
		iteration = 1;
	});


    $('[data-toggle="tooltip"]').tooltip();  

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('#startDate').datetimepicker({
        keepOpen: false,
        sideBySide: true,
        minDate : today
    }); 

 //Initialize AutoComplete Object
 var ac = new autoComplete({
            length: 2, 
            element : '#venue', 
            source: baseUrl+'/plan/foursquareplaces',
            requestType: 'GET',
            dataType : 'json',
            height:'300px'
        });
  
        //Create Plan category selection
        //By Waqas Karim
        //Date: 2/6/2015
        
         $('.term').on('click',function(){
            //make item active
            $('.term').removeClass('active');
            $(this).addClass('active');

            var items = $(this).data("value");

            var lblTitle = "What would you like to plan";
            var lblWhere = "Where would you like to go";
            var lblWhen = "go";
            
           

            switch (items){

                case 'movies':
                    lblTitle = "What movie would you like to watch"
                    lblWhere = "Where would you like to go";
                    lblWhen = "When would you like to watch";
                    $('#lblTitle').html(lblTitle);
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').html(lblWhen); 

                    $('input[name="itemCategory"]').val('movies');
                    
                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('.selectionDiv').html('').css({height:'0%'}); 
                    $('.updateField').remove();
                    $('#session_id').val(0);   

                    //Load Movies from database
                    $.ajax({
                        url : baseUrl+'/plan/fetchresults?cat=movies&status=available',
                        type : 'GET',
                        dataType : 'json',
                        beforeSend : function(){
                            removeOverlay();         
                            overlay('.create-plan-form',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                        },
                        success : function(response){  
                           removeOverlay();
                           loadAjaxData(response, 'movies');

                        } // end success callback

                            
                    });


                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces',
                            data: 'categoryid=4bf58dd8d48988d17f941735&intent=',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                    ac.update(placesAutoComplete);


                    //input placeholder updates                    
                    $('input[name="title"]').attr("placeholder","Movie name");
                    $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly"); 
                    $('input[name="venue"]').attr("placeholder","Select cinema");
                    $('input[name="dateTime"]').attr("placeholder","Date and time of movie");

                    $('input[name="title"]').val('');                    
                    $('input[name="venue"]').val('');
                    $('input[name="startDate"]').val('');

                    break;

                case 'event':
                    lblTitle = "What event you want to create"
                    lblWhere = "Where the event would be ";
                    lblWhen = "When the event would be";
                    $('#lblTitle').html(lblTitle);
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').html(lblWhen); 


                    $('input[name="itemCategory"]').val('event');
                    
                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('.selectionDiv').html('').css({height:'0%'});
                    $('.updateField').remove();                    
                    $('#title').show();
                    $('.whereField').show();
                    $('.whenField').show();  


                     //Load Events from database
                    $.ajax({
                        url : baseUrl+'/plan/fetchresults?cat=events&status=available',
                        type : 'GET',                       
                        dataType : 'json',
                        beforeSend : function(){
                            removeOverlay();         
                            overlay('.create-plan-form',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                        },
                        success : function(response){
                           removeOverlay();  
                           loadAjaxData(response, 'events');

                        } // end success callback

                            
                    });


                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces', 
                            data : 'categoryid=4d4b7105d754a06373d81259&intent=',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                    ac.update(placesAutoComplete);
                    


                    //input placeholder updates 
                    $('input[name="title"]').attr("placeholder","Event name");
                    $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly");    
                    $('input[name="venue"]').attr("placeholder","Location of event");
                    $('input[name="dateTime"]').attr("placeholder","Date and time of event");

                    $('input[name="title"]').val("");
                    $('input[name="venue"]').val('');                    
                    $('input[name="startDate"]').val('');					
                    $('#session_id').val(0);

                
                    break; 

                case 'coffee':
                    lblTitle = "What coffee you like to have"
                    lblWhere = "Where would you like to have";
                    lblWhen = "When would you like to have";
                    $('#lblTitle').html('');
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').html(lblWhen); 

                    $('input[name="itemCategory"]').val('coffee');
                    
                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('#title').show();
                    $('#venue').show();
                    $('#startDate').show();
                    $('.whereField').show();
                    $('.whenField').show();                       
                   
                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces',
                            data : 'intent=&categoryid=4bf58dd8d48988d1e0931735',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                    ac.update(placesAutoComplete);
                  

                    //input placeholder updates  
                    $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly"); 
                    $('input[name="title"]').attr("placeholder","Coffee name").attr("readonly","readonly");
                    $('input[name="venue"]').attr("placeholder","Restaurant");
                    $('input[name="dateTime"]').attr("placeholder","Date and time");

                    $('input[name="title"]').val("Let's go for Coffee");
                    $('input[name="venue"]').val('');
                    $('input[name="startDate"]').val('');
                    $('.selectionDiv').html('').css({height:'0%'});
                    $('.updateField').remove();
                    $('#session_id').val(0);

                    $('input[type="submit"]').show();
                
                    break;
   
                 case 'lunch':
                    lblTitle = "What would you like to have in lunch"
                    lblWhere = "Where would you like to go for lunch";
                    lblWhen = "When would you like to have";
                    $('#lblTitle').html('');
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').html(lblWhen); 

                    $('input[name="itemCategory"]').val('lunch');
                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('#title').show();
                    $('#venue').show();
                    $('#startDate').show();
                    $('.whereField').show();
                    $('.whenField').show();   


                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces',
                            data : 'intent=food&categoryid=4d4b7105d754a06374d81259',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                    ac.update(placesAutoComplete);
                  
                     
                   
                    //input placeholder updates 
                   $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly"); 
                    $('input[name="title"]').attr("placeholder","Lunch").attr("readonly","readonly");
                    $('input[name="venue"]').attr("placeholder","Restaurant");
                    $('input[name="dateTime"]').attr("placeholder","Date and time");

                    $('input[name="title"]').val("Let's go for Lunch");
                    $('input[name="venue"]').val('');
                    $('input[name="startDate"]').val('');
                    $('.selectionDiv').html('').css({height:'0%'});
                    $('.updateField').remove();
                    $('#session_id').val(0);

                    $('input[type="submit"]').show();
                
                    break;  

                case 'dinner':
                    lblTitle = "What would you like to have in dinner"
                    lblWhere = "Where would you like to go for dinner";
                    lblWhen = "When would you like to have";
                    $('#lblTitle').html('');
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').html(lblWhen); 

                    $('input[name="itemCategory"]').val('dinner');
                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('#title').show();
                    $('#venue').show();
                    $('#startDate').show();
                    $('.whereField').show();
                    $('.whenField').show();                       

                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces',
                            data : 'intent=food&categoryid=4d4b7105d754a06374d81259',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                    ac.update(placesAutoComplete);
                     
                   
                    //input placeholder updates 
                    $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly"); 
                    $('input[name="title"]').attr("placeholder","Dinner").attr("readonly","readonly");
                    $('input[name="venue"]').attr("placeholder","Restaurant");
                    $('input[name="dateTime"]').attr("placeholder","Date and time");

                    $('input[name="title"]').val("Let's go for Dinner");                    
                    $('input[name="venue"]').val('');
                    $('input[name="startDate"]').val('');
                    $('.selectionDiv').html('').css({height:'0%'}); 
                    $('.updateField').remove();
                    $('#session_id').val(0);

                    $('input[type="submit"]').show();
                
                    break; 



                default:
                    $('#lblTitle').html(lblTitle);
                    $('#lblWhere').html(lblWhere);
                    $('#lblWhen').find('span').html(lblWhen);

                    $('input[name="itemCategory"]').val('other');

                    // Reset form to remove errors
                    $('.frm-create').get(0).reset();
                    $('#title').show();
                    $('#venue').show();
                    $('#startDate').show();
                    $('.whereField').show();
                    $('.whenField').show();   

                    ac.setOptions(
                        {
                            element: '#venue',                            
                            source: baseUrl+'/plan/foursquareplaces',
                            requestType: 'GET',
                            dataType : 'json',
                            height:'300px'
                        });
        
                     ac.update(placesAutoComplete);
                  

                    //input placeholder updates   
                    $('input[name="title"]').attr("placeholder","Name of your plan");
                    $('input[name="title"], input[name="venue"], input[name="startDate"]').removeAttr("readonly"); 
                    
                    $('input[name="venue"]').attr("placeholder","Type address or location name");
                    $('input[name="dateTime"]').attr("placeholder","Date and time");

                    $('input[name="title"]').val("");                    
                    $('input[name="venue"]').val('');
                    $('input[name="startDate"]').val('');

                    $('.selectionDiv').html('').css({height:'0%'});
                    $('.updateField').remove(); 
                    $('#session_id').val(0);

                    $('input[type="submit"]').show();

                    break;


            }


         });




// Form Submit

$('#createFormSubmit').submitForm({ form: '#createPlanForm', formAction: baseUrl + '/plan/save'});
$('#suggestFormSubmit').submitForm({ form: '#suggestForm', formAction: baseUrl + '/plan/suggest'});



var placesAutoComplete =  {
        onsuccess : function(response){
                
                var listview = '';

                if(response !== ""){
                    for(var i in response){
                        listview += '<li><a href="javascript:void(0);" data-value="';
                        listview += response[i].value + '">';
                        listview += response[i].label + '<br><span class="subtitle">' + response[i].value+ '</span></a></li>';
                    }

                    ac.setContent(listview, function(){});
                     $('.yii-autocomplete').mCustomScrollbar({
                            scrollInertia : 0,
                            theme: 'dark'
                        });  
                   
                }


            },
            onerror: function(status){
                console.log(status);
            }

};


function loadAjaxData(response,imgDirectory){

    //disable form submit button to prevent unwanted data submit by user
    
    $('input[type="submit"]').hide();

    var movie_list = '<ul class="movie-selection">';
        if(response !== "" && response.length > 0){

                for(var i in response){

                    movie_list += '<li>';
                    //movie thumbnail
                    movie_list += '<a href="javascript:void(0);" class="btn btn-small btn-tag" data-value="';
                    movie_list += response[i].title + '" data-itemid="'+ response[i].id +'">';
                    //movie_list += '<img src="'+ convertImageUrl(response[i].poster, response[i].createdDate, imgDirectory) + '" />';                    
                    movie_list += response[i].title;
                    movie_list += '</a></li>';

                }

            movie_list += '</ul>';

            //Hide all fields
            $('#title').hide();
            $('.whereField').hide();
            $('.whenField').hide();
           
            $('#title').next().html(movie_list);
            $('#title').next().css({height:'100%', position:'relative', display : 'block'});

            // movie selection click event
             
            $('.movie-selection li a').on('click',function(){

                var itemId = $(this).data("itemid");
                var movie_title = $(this).data("value");
                
                //set Movie title
                $('#title').show();    
                $('#title').attr("readonly","readonly");                                                          
                $('#title').val(movie_title);
                $('#title').next().css({display:'none'});

                $('#venue').hide();
                $('#startDate').hide();

                //var posLeft3 = Math.round($('#title').val().length) * 12 + 10;
                $('#title').next().after('<div class="updateField" data-action="label">&times;</div>');                                                                          
               

                 $.ajax({
                        url: baseUrl+'/plan/getsessions',
                        type: 'GET',
                        data : {itemid : itemId},
                        dataType: 'json',
                        cache : true,
                        beforeSend : function(){                                                    
                            removeOverlay();         
                            var loader = overlay('.create-plan-form',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                        },
                        success : function(data){   
                            removeOverlay();         
                            var output = '<ul class="nav nav-tabs">';
                            var tabs = '<div class="tab-content">';
                            var klass;
                            var klass2;
                            var dname = '';                                       
                            for(var i = 0; i < data.length; i++){
                                if(i == 0){                                                
                                    klass = "active";
                                    klass2 = "active in";
                                }else{
                                    klass = "";
                                    klass2 = "";
                                } 

                              output += '<li class="btn btn-small btn-tag" data-title="'+data[i].venue.title+'"><a href="#' + data[i].venue.title.replace(/ /g,'') + '" role="tab" data-toggle="tab" >'+ data[i].venue.title + '</a></li>';                                               
                              tabs += '<div class="tab-pane fade" id="'+ data[i].venue.title.replace(/ /g,'') +'">';
                              tabs += '<table class="table">'
                               $.each(data[i].venue.sessions, function(k,v){ 
                                    var hDate = new Date(k);     
                                    tabs += '<thead>';
                                    tabs += '<th>';
                                    tabs += '<h3 class="dateHeader">' + hDate.getDate() + ' ' + getMonthName(hDate) + ', ' + hDate.getFullYear() + '</h3>';
                                    tabs += '</thead>';
                                    tabs += '</th>';
                                    tabs += '<tbody>';
                                    tabs += '<td>';
                                   for(var j = 0; j < v.length; j++){
                                       var dateFormat = v[j].startTime.replace(/-/g, ' ');                                               
                                       var d = new Date(dateFormat);                                          
                                       tabs += '<a href="javascript:void(0);" class="btn btn-small btn-tag" data-sessionid="' + v[j].id + '" data-starttime="'+v[j].startTime+'">';
                                       tabs +=  timeFormat(d) + '</a>';
                                      
                                    }
                                    tabs += '</td>';
                                    tabs += '</tbody>';                                    

                               });

                                /*output += '<li class="btn btn-small btn-tag '+klass+'" data-title="'+data[i].venue.title+'"><a href="#' + data[i].venue.title + '" role="tab" data-toggle="tab" >'+ data[i].venue.title + '</a></li>';                                               
                                tabs += '<div class="tab-pane fade '+ klass2 +'" id="'+ data[i].venue.title +'">';
                                for(var j = 0; j < data[i].venue.sessions.length; j++){
                                   var dateFormat = data[i].venue.sessions[j].startTime.replace(/-/g, ' ');                                               
                                   var d = new Date(dateFormat);                                               
                                   tabs += '<a href="javascript:void(0);" class="btn btn-small btn-tag" data-sessionid="' + data[i].venue.sessions[j].id + '">';
                                   tabs +=  d.getDate() + ' ' + getMonthName(d) + '&nbsp; at &nbsp;' + timeFormat(d) + '</a>';
                                  
                                }
                                */
                                tabs += '</table>';
                                tabs += '</div>';
                            }

                           
                            output += '</ul>';
                            tabs   += '</div>';
                            
                            $('#title').show();
                            $('.whereField').show();
                            $('.whenField').show();                                                         
                           
                            //$('.updateField').remove();
                            $('#venue').next().html(output).css({height:'100%'});
                            $('#startDate').next().html(tabs).css({height:'100%'});
                            $('#venue').next().show();
                            $('#startDate').next().show();

                            // click event
                            $('#startDate').next().find('a').click(function(){
                                    //set session id                                                
                                    $('#session_id').val($(this).data("sessionid"));

                                    $('#venue').attr("readonly","readonly");                                                            
                                    $('#venue').val($('#venue').next().find('li.active').data("title"));
                                    $('#venue').next().css({display:'none'});                                                

                                    $('#startDate').attr("readonly","readonly");
                                    $('#startDate').val($(this).data("starttime"));
                                    $('#startDate').next().css({display:'none'});

                                    //$('#title').attr("readonly","readonly");                                               

                                    //add remove button
                                    //var posLeft = Math.round($('#venue').val().length) * 15;
                                    $('#venue').next().after('<div class="updateField" data-action="venue">&times;</div>');
                                    //var posLeft2 = Math.round($('#startDate').val().length) * 12;
                                    $('#startDate').next().after('<div class="updateField" data-action="datetime">&times;</div>');

                                    //Enable submit button to submit form 
                                    $('input[type="submit"]').show();

                                    $('#venue').show();
                                    $('#startDate').show();
                                    
                                     /*  $('.updateField').click(function(){
                                        $('.selectionDiv').show();
                                        $('.updateField').remove();
                                        $("#title").removeAttr("readonly");
                                        $("#title").hide();
                                        $('.whereField').hide();
                                        $('.whenField').hide(); 
                                        $('input[type="submit"]').hide();
                                    });
                                    */

                            });

                        }
                }); //inner ajax end
                   
            }); // movie selection on event close


            //Bind delete selection button event
             $(document).on('click','.updateField',function(){
                          
                    var actions = $(this).data("action");
                    switch (actions){
                        case 'label':
                            $(this).prev().show();
                            $('.updateField').remove(); 
                            $('.whereField').hide();
                            $('.whenField').hide();                            
                            $("#title").removeAttr("readonly");
                            $("#title").hide(); 
                            $('input[type="submit"]').hide();
                            break;    
                        case 'venue':
                            $(this).prev().show();
                            $('.whenField').find('.selectionDiv').show();
                            $('.whenField').find('.updateField').remove();
                            $("#venue").hide(); 
                            $("#startDate").hide(); 
                            $(this).remove();  
                            $('input[type="submit"]').hide();
                            break; 
                        case 'datetime':
                            $(this).prev().show();
                            $('.whereField').find('.selectionDiv').show();
                            $('.whereField').find('.updateField').remove();
                            $("#venue").hide(); 
                            $("#startDate").hide(); 
                            $(this).remove();  
                            $('input[type="submit"]').hide();
                            break;
                        default:
                            $(this).prev().show();
                            $(this).remove(); 
                            $('input[type="submit"]').hide();
                            break;
                    }
                                       
                });
            

        }else{
             $('#title').show();
             $('.whereField').show();
             $('.whenField').show(); 
             $('input[type="submit"]').show();
        }
}


/*var moviesAutoComplete =  {
        onsuccess : function(response){

        var listview = '';
        var venues = [];
        if(response !== "" && response.length > 0){
        for(var i in response){


        listview += '<li>';

        //movie thumbnail
        listview += '<img src="'+ convertImageUrl(response[i].poster, response[i].createdDate,'movies') + '" />';
        listview += '<a href="javascript:void(0);" data-value="';
        listview += response[i].title + '" data-itemid="'+ response[i].id +'">';
        listview += response[i].title;
        listview += '</a></li>';


        }



        ac.setContent(listview, function(params){


        $.ajax({
        url: baseUrl+'/plan/getsessions',
        type: 'GET',
        data : {itemid : params.itemid, venueid : params.venueid},
        dataType: 'json',
        cache : true,
        beforeSend : function(){

        },
        success : function(data){	

        var output = '<ul class="nav nav-tabs">';
        var tabs = '<div class="tab-content">';
        var klass;
        var klass2;
        var dname = '';                                       
        for(var i = 0; i < data.length; i++){
        if(i == 0){                                                
        klass = "active";
        klass2 = "active in";
        }else{
        klass = "";
        klass2 = "";
        }   

        output += '<li class="btn btn-small btn-tag '+klass+'" data-title="'+data[i].venue.title+'"><a href="#' + data[i].venue.title + '" role="tab" data-toggle="tab" >'+ data[i].venue.title + '</a></li>';                                               
        tabs += '<div class="tab-pane fade '+ klass2 +'" id="'+ data[i].venue.title +'">';
        for(var j = 0; j < data[i].venue.sessions.length; j++){
        var dateFormat = data[i].venue.sessions[j].startTime.replace(/-/g, ' ');                                               
        var d = new Date(dateFormat);                                               
        tabs += '<a href="javascript:void(0);" class="btn btn-small btn-tag" data-sessionid="' + data[i].venue.sessions[j].id + '">';
        tabs +=  d.getDate() + ' ' + getMonthName(d) + '&nbsp; at &nbsp;' + timeFormat(d) + '</a>';

        }

        tabs += '</div>';
        }


        output += '</ul>';
        tabs   += '</div>';


        $('.selectionDiv').html('');
        $('.updateField').remove();
        $('#venue').next().html(output).css({height:'100%'});
        $('#startDate').next().html(tabs).css({height:'100%'});
        $('.selectionDiv').show();

        // click event
        $('#startDate').next().find('a').click(function(){
        //set session id                                                
        $('#session_id').val($(this).data("sessionid"));

        $('#venue').attr("readonly","readonly");

        $('#venue').val($('#venue').next().find('li.active').data("title"));
        $('#venue').next().css({display:'none'});                                                

        $('#startDate').attr("readonly","readonly");
        $('#startDate').val($(this).text());
        $('#startDate').next().css({display:'none'});

        //$('#title').attr("readonly","readonly");                                               

        //add remove button
        var posLeft = Math.round($('#venue').val().length) * 15;
        $('#venue').next().after('<div class="updateField" style="left:'+posLeft +'px;">x</div>');
        var posLeft2 = Math.round($('#startDate').val().length) * 12;
        $('#startDate').next().after('<div class="updateField" style="left:'+posLeft2 +'px;">x</div>');



        //var posLeft3 = Math.round($('#title').val().length) * 15;
        //$('#title').after('<div class="updateField" style="left:'+ posLeft3 +'px;">x</div>');

        $('.updateField').click(function(){
            $('.selectionDiv').show();
            $('.updateField').remove();
            //$("#title").removeAttr("readonly");
        });



        });

        }
        });




        });

        $('.yii-autocomplete').mCustomScrollbar({
        scrollInertia : 0,
        theme: 'dark'
        });  



        }else{
        ac.setContent('<li><b>No results found</b></li>');
        }


        },
        onerror: function(status){
        console.log(status);
        }

};*/




//update user status method

var popup_html;
$.ajax({
    url: baseUrl+'/plan/getuserupdateview',
    type: 'GET',
    data: 'view=user',
    success: function(data){        
         
         var popover_options = {
             content : data,
             html : true,
             placement : 'left'

        };

     
     $('.user-list a').popover(
            popover_options
     ); 
    } //end Ajax call  
});

//update user status method

var popup_html;
$.ajax({
    url: baseUrl+'/plan/getuserupdateview',
    type: 'GET',
    data: 'view=plan',
    success: function(data){        
         
         var popover_options = {
             content : data,
             html : true,
             placement : 'bottom'

        };

     $('.plan-status a').popover(
            popover_options
     );
    } //end Ajax call  
});




/********** Notification **************/

//add notification badge
notificationBadge();



$('.notificationBtn').on('click',function(){
  
    var that = $(this);
    if($('.notificationDropdown').length == 0) {
           $.ajax({
            url : baseUrl + '/plan/getnotifications',
            beforeSend: function(){            
                var loader = overlay('',{style:'width:100%; position:absolute; top:0px; left:0px;'});
                that.after('<div class="notificationDropdown">' + loader + '</div>');
            },
            success : function(response){
                removeOverlay();

                var output = '<ul class="notifications">';
                var notifications = $.parseJSON(response);

               if(notifications.length > 0){

                for(var i in notifications){
                    var notification = $.parseJSON(notifications[i].code);                
                    output += '<li><img src="'+baseUrl+'/assets/img/default-avatar.png" height="20" width="24" class="default-avatar"><a onClick="updateNotification('+notifications[i].id+',\'' + notification.link + '\')" href="javascript:void(0);">' + notification.label + '</a></li>';
                }
              
               }else{
                    output += "<li>It seems you don't have notifications right now</li>";
               }

                 output += '</ul>';

                $('.notificationDropdown').html(output);

                $('.notificationDropdown').hover(function(){
                    $('.notificationBtn').off('blur',removeNDropdown);
                }, function(){
                    $('.notificationBtn').on('blur',removeNDropdown);
                });

                $('.notificationDropdown').click(function(){
                    removeNDropdown();
                });

                
                
                
            }

        });   
    }
  
  


});//notification btn event close


$('.notificationBtn').on('blur',removeNDropdown);

function removeNDropdown(){
    $('.notificationDropdown').remove();
};



}); // End Jquery onload







function convertImageUrl(src, createdDate, category){
    createdDate = createdDate.replace(/-/g, ' ');
    var date = new Date(createdDate);    
    var parseDateToUrl = apiBaseUrl + '/images/' + category + '/' + date.getFullYear() +'/'+ (date.getMonth() +1) + '/' + date.getDate() + '/' + src;
    return parseDateToUrl;
}


function timeFormat(date) { 
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;
  return strTime;
}

function getMonthName(date, format){
    var month = new Array();
    if(typeof format !== "undefined" && format == 'full'){
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
    }else{
        month[0] = "Jan";
        month[1] = "Feb";
        month[2] = "Mar";
        month[3] = "Apr";
        month[4] = "May";
        month[5] = "Jun";
        month[6] = "Jul";
        month[7] = "Aug";
        month[8] = "Sep";
        month[9] = "Oct";
        month[10] = "Nov";
        month[11] = "Dec";
    }
    
    return month[date.getMonth()];
}



function notificationBadge(){
    $.get(baseUrl + '/plan/getnoticount',function(count){
       var badge = '<div class="badge badge-orange">'+ count +'</div>'
       $('.notificationBtn').find('span').after(badge);

    });
}

function updateNotification(id,url)
{
    $.ajax({
        url: baseUrl+'/plan/updatenotificationstatus',
        type: 'post',
        data: 'id='+id,
        success: function(data){
            if(data)
            {
                window.location =   url;
            }
        }
    });
}