$('.carousel').carousel({
    interval: 5000 //changes the speed
});

$(document).ready(function(){

    var height = $( window ).height() - 200;
    $("#myCarousel").css('height', height + 'px');

    $("[rel='tooltip']").tooltip();	

    /*
     * Javascript for hover on thumbnail
     */
    $('#hover-cap-4col .thumbnail').hover(
        function(){
            $(this).find('.caption').fadeIn(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').fadeOut(250, function(){
                $(this).clearQueue();
            }); //.fadeOut(205)
        }
    );
    
    /*
     * Ajax call for tab to show now showing and up coming movies grid
     */
    $('.tab').on('click', function(){
        var that    =   this;
        $.ajax({
            url: baseUrl+'/movies/updategrid/status/'+this.id,
            type: 'GET',
            success: function (data){
                $('.selected').removeClass();
                $(that).addClass('selected');
                $('#hover-cap-4col').html('');
                $('#hover-cap-4col').html(data);
            }
        });
    });
    
    /*
     * Ajax call for more info over movie thumbnail
     */
    $('.more-info').on('click', function(){
        //var that    =   this;
        $('#detailContainer').html('');
        $('.modal-dialog').removeClass('modal-sm').addClass('modal-lg');
        $.ajax({
            url: baseUrl+'/movies/getdetail/itemId/'+this.id,
            type: 'POST',
            success: function (data){
                $('#MovieDetailContainer').html(data);
            }
        });
    });

    /*
     * Ajax call for movie trailer over movie thumbnail
     */
    $('.watch-trailer').on('click', function(){
        
        $('#detailContainer').html('');
        $('.modal-dialog').removeClass('modal-sm').addClass('modal-lg');
        $.ajax({
            url: baseUrl+'/movies/gettrailer/videoId/'+$(this).data('video'),
            type: 'GET',
            success: function (data){
                $('#MovieDetailContainer').html(data);
            }
        });
        
    });

});	