$(function(){
    $('#moreEvents').on('click',function(){
        var offset   =   $('#moreEvents').data('index');
        $.ajax({
            url: 'events/more/offset/'+offset,
            type: 'GET',
            success: function (data){               
                $('#moreEvents').data('index', offset+3);
                $('#moreEvents').attr('data-index', offset+3);
                $('#hover-cap-4col').append(data);
            }
        });
    }); 
    
    $('.eventDetail').on('click',function(){
        $('#detailContainer').html('');
        $('.modal-dialog').removeClass('modal-sm').addClass('modal-lg');
        $.ajax({
            url: 'events/detail/itemId/'+$(this).data('id'),
            type: 'GET',
            success: function (data){
                $('#detailContainer').html(data);
            }
        });
    }); 
    
    $('#createEvent').on('click',function(){
        $('#detailContainer').html('');
        $('.modal-dialog').removeClass('modal-sm').addClass('modal-lg');
        $.ajax({
            url: 'events/createeventmodal',
            type: 'GET',
            success: function (data){
                $('#detailContainer').html(data);
            }
        });
    });
    
    $('#triggerSignIn').on('click',function(){
        $('#signIn').click();
    });
});