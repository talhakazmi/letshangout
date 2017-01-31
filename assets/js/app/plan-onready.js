$(function(){
	$('.planStatus').on('click',function(){
		$.ajax({
			url: baseUrl+'/plan/updateinvitestatus',
			type: 'get',
			data: 'planId='+$(this).data('plan')+'&type='+$(this).data('type')+'&status='+$(this).data('status'),
			success: function(data){
			    if(data)
                            {
                                $('.planStatusDiv').next('hr').remove();
                                $('.planStatusDiv').remove();
                            }
			}
		});
	});
	
        $('.cast-vote').on('click',function(){
		var that = $(this);
		$.ajax({
			url: baseUrl+'/plan/votesuggestion',
			type: 'get',
			data: 'suggestion='+$(this).data('suggestion')+'&user='+$(this).data('user'),
			success: function(data){
                            var votes   =   0;
                            if(data != 'downVote')
                            {
                                var vote = parseInt(that.parent().prev().text())+1;
                                that.parent().prev().text(vote);    
                                that.parent().removeClass('active').addClass('active');
                            }
                            else
                            {
                                var vote = parseInt(that.parent().prev().text())-1;
                                that.parent().prev().text(vote);
                                 that.parent().removeClass('active');
                            }
                            
                            $('.plans').each(function(){
                                if(votes < parseInt($(this).find('.vote-count').text()))
                                {
                                    votes   =   parseInt($(this).find('.vote-count').text());
                                    $('#suggestionlists').prepend($(this));
                                }
                            });
			}
		});
	});



/* Invite Friends Action */

$('.actionInvites button').on('click',function(){
   var type = $(this).data("type");
   switch (type){
        case 0:
            alert('Facebook Friends');
            break;
        case 1: 
            alert('Hangout Friends Circle');
            break;
        case 2:
            alert('Hangout Friends');
            break;
        case 3:            
            $('#invite-friends-modal').modal('hide');
            $('#invite-email-modal').find('.modal-body').find('div').html('');
            $('#invite-email-modal').find('.modal-body').find('div').html('<input type="text" class="form-control lhinput" name="emails" id="emails" placeholder="Enter email address comma separate" />');
            $('#send-invitation').show();
            $('#invite-email-modal').modal('show');

            break;        
   }

});



/******** Send Invitation Button Click Event ***************/

$('#send-invitation').on('click',function(){
    $.ajax({
        url: baseUrl+'/plan/emailinvite',
        type: 'POST',
        data: 'planId='+$('.planState').data('plan')+'&emails='+$('#emails').val(),
        beforeSend: function(){
           removeOverlay();         
           var loader = overlay('',{style:'width:100%; position:absolute; top:0px; left:0px;'});
           console.log(loader);
           $('#invite-email-modal').find('.modal-content').append(loader);
        },
        success: function(data){
            removeOverlay(); 
            if(data)
            {
                $('#invite-email-modal').find('.modal-body').find('div').html('<div class="alert alert-success" role="alert">Invitation has been successfully sent</div>');
                $('#send-invitation').hide();  
                setTimeout(function(){
                    $('#invite-email-modal').modal('hide');
                },1000);
                
            }
        }
    });
    
});

$('.selectSuggestion').on('click',function(){
    
    $.ajax({
        url: baseUrl+'/plan/selectsuggestion',
        type: 'POST',
        data: 'suggestionId='+$(this).data('suggestion')+'&status='+$(this).prop('checked'),
        success: function(data){
            if(data)
            {
                console.log('suggestion status updated');          
            }
        }
    });
});

$('#closePlan').on('click',function(){
    $.ajax({
        url: baseUrl+'/plan/updateplanstatus',
        type: 'get',
        data: 'planId='+$('.plan-status').data('plan')+'&status=closed',
        success: function(data){
            if(data)
            {
                $(this).html('');
                $(this).html('Closed');
            }
        }
    });
    
});

});
