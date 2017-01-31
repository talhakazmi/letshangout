<div class="container main">
    <h1><a href="javascript:void(0);"><?php echo $plan['title']; ?></a></h1><?php echo ($plan['duration'] == FALSE)?'Plan is Alreday Due':'' ?>
    <div class="plan-status" data-plan="<?php echo $plan['id'] ?>">
        Status: 
        <?php if($plan['duration'] != FALSE): ?>
            <?php if(Yii::app()->user->getId() == $plan['userId'] && ($plan['status'] == 'open' || $plan['status'] == 'confirmed')): ?>
                <a tabindex="0" href="javascript:void(0);" title="" data-trigger="focus" class="planState" data-plan="<?php echo $plan['id'] ?>" >
            <?php endif; ?>
                <span class="<?php echo $plan['status']; ?>status-label">
                    <?php echo ucfirst($plan['status']); ?>
                </span>
            <?php if(Yii::app()->user->getId() == $plan['userId']): ?>
                </a>
            <?php endif;?>
        <?php else:?>
            <?php if($plan['status'] == 'cancelled' || $plan['status'] == 'closed'): ?>
                <span class="<?php echo $plan['status']; ?>status-label">
                    <?php echo ucfirst($plan['status']); ?>
                </span>
            <?php else: ?>
                <span style="cursor:pointer" id="closePlan" class="confirmstatus-label">
                    Close this plan
                </span>
            <?php endif;?>
        <?php endif;?>
    </div>
    <div class="clearfix">&nbsp;</div>
    <hr />
</div>
<!-- MainContainer -->
<div class="container">
    <?php if($plan['duration']): ?>
        <?php foreach($plan['planinvites'] as $inviteStatus): ?>
            <?php if(Yii::app()->user->getId() == $plan['invitedFriends'][$inviteStatus['friendsId']]['userId'] && $inviteStatus['initialStatus'] == ''): ?>
                <div class="col-xs-12 text-center planStatusDiv">
                    Would you like to join this ?
                    <!-- Overall user status -->
                    <ul class="overall-ustatus">
                        <li><button class="btn btn-white planStatus" data-type="initialStatus" data-plan="<?php echo $plan['id'] ?>" data-status="yes"><span class="icon-in"></span>I'm in</button></li>
                        <li><button class="btn btn-white planStatus" data-type="initialStatus" data-plan="<?php echo $plan['id'] ?>" data-status="maybe"><span class="icon-maybe" ></span>May be</button></li>
                        <li><button class="btn btn-white planStatus" data-type="initialStatus" data-plan="<?php echo $plan['id'] ?>" data-status="no"><span class="icon-decline"></span>Decline</button></li>
                    </ul>
                </div>
                <div class="clearfix planStatusDiv">&nbsp;</div>
                <div class="clearfix planStatusDiv">&nbsp;</div>
                <hr />
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-left">
                    <b class="dashboard-title"><a href="javascript:window.location=window.location.href;" class="icon-reload" data-toggle="tooltip" title="Reload suggestions"></a> Activity Suggestion(s)</b>
                </div>
                <?php if($plan['status'] == 'open' && $plan['duration'] != false): ?>
                    <?php if($plan['isSuggestion'] == 1): ?>
                        <div class="pull-right">
                             <b><a href="#" class="add-suggestion" data-toggle="modal" data-target="#add-suggestion-modal"> <i class="fa fa-plus-circle"></i> Add Suggestion</a></b>
                        </div>
                    <?php elseif($plan['isSuggestion'] != 1 && Yii::app()->user->getId() == $plan['userId']): ?>
                        <div class="pull-right">
                             <b><a href="#" class="add-suggestion" data-toggle="modal" data-target="#add-suggestion-modal"> <i class="fa fa-plus-circle"></i> Add Suggestion</a></b>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>  
        </div>
    <!-- Plan Lists -->
        <div id="suggestionlists">
            <!-- Loop -->
            <?php foreach($plan['votesCount'] as $votesCount): ?>
            <?php for($count=0;$count<count($plan['suggestions'][$votesCount]);$count++): ?>
            <div class="plans">
                <div class="user-avatar"><div class="cat-icon cat-<?php echo $plan['items'][$plan['sessions'][$plan['suggestions'][$votesCount][$count]['sessionsId']]['itemId']]['catId']; ?>"></div></div>
                <div class="mini-container">
                    <h1><a href="#"><?php echo $plan['items'][$plan['sessions'][$plan['suggestions'][$votesCount][$count]['sessionsId']]['itemId']]['title']; ?></a></h1>
                    <?php if(Yii::app()->user->getId() == $plan['userId'] && ($plan['status'] == 'open' || $plan['status'] == 'confirmed') && $plan['duration'] != false): ?>
                    <div class="customCheckbox">
                        <input type="radio" name="selectSuggestion" id="selectSuggestion" data-suggestion="<?php echo $plan['suggestions'][$votesCount][$count]['id'] ?>" class="selectSuggestion" <?php echo ($plan['suggestions'][$votesCount][$count]['isActive'] == '1'?'checked="checked"':'') ?>>
                        <label for="selectSuggestion">Select this plan</label>
                    </div>
                    <?php endif; ?>
                    <hr />
                    <div class="plan-activity">
                        <strong>Venue and Date</strong>
                        <?php $venue=$plan['venues'][$plan['staterooms'][$plan['sessions'][$plan['suggestions'][$votesCount][$count]['sessionsId']]['stateRoomId']]['venueId']]; ?>
                        <span class="plan-venue"><?php echo $venue['title'].', '.$venue['city'].', '.$venue['country']; ?></span>
                        <span class="plan-date"><?php echo date('M d, Y \a\t g:m A', strtotime($plan['sessions'][$plan['suggestions'][$votesCount][$count]['sessionsId']]['startTime'])); ?></span>	
                        <div class="toolbar-suggestion">
                            <span class="vote-count"><?php echo $votesCount; ?></span>
                            <?php if(($plan['status'] == 'open' || $plan['status'] == 'confirmed') && ($plan['duration'] != false)): ?>
                            <a href="javascript:void(0);" class="vote-up<?php echo (isset($plan['votes'][$plan['suggestions'][$votesCount][$count]['id']][Yii::app()->user->getId()]))?' active':'' ?>"><span class="fa fa-thumbs-up cast-vote" data-user="<?php echo Yii::app()->user->getId() ?>" data-suggestion="<?php echo $plan['suggestions'][$votesCount][$count]['id'] ?>"></span></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                </div>
                <div class="postedby">
                    Suggested by <a href="javascript:void(0);"><?php echo (isset($plan['invitedFriends'][$plan['suggestions'][$votesCount][$count]['userId']])?$plan['invitedFriends'][$plan['suggestions'][$votesCount][$count]['userId']]['name']:$plan['userName']) ?></a> <?php echo $this->humanTiming($plan['suggestions'][$votesCount][$count]['createdDate']); ?> ago			
                </div>	
            </div>
            <?php endfor; ?>
            <?php endforeach; ?>
            <!-- end loop -->
        </div>
    </div>


    <div class="col-sm-3">
        <h3>Participants</h3>
        <div class="">
            <ul class="user-list">
                <?php foreach($plan['planinvites'] as $invite): ?>
                <?php if($invite['initialStatus'] != 'no'): ?>
                <li>
                    <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/>
                        <?php echo $plan['invitedFriends'][$invite['friendsId']]['name'] ?> - <?php echo ((Yii::app()->user->getId() == $plan['invitedFriends'][$invite['friendsId']]['userId'] && $plan['duration'] != false && $plan['status'] == 'live') ? '<a tabindex="0" href="javascript:void(0);" title=""  data-plan="'. $plan['id'] .'" data-toggle="tooltip">':''); ?>
                            <span class="txt-blue">
                                <?php echo (isset($invite['finalStatus']))?Yii::app()->params[$invite['finalStatus']]:(isset($invite['initialStatus'])?ucfirst($invite['initialStatus']):'Pending') ?>
                            </span>
                        <?php echo ((Yii::app()->user->getId() == $plan['invitedFriends'][$invite['friendsId']]['userId']) ? '</a>':'') ?>
                </li>
                <?php endif;?>
                <?php endforeach; ?>
            </ul>
            <?php if(($plan['status'] != 'cancelled' || $plan['status'] != 'closed') && ($plan['duration'] != false)): ?>
                <?php if($plan['isInvite'] == 1): ?>
                    <button class="btn btn-green" data-toggle="modal" data-target="#invite-friends-modal">Invite Friends</button>
                <?php elseif($plan['isInvite'] != 1 && Yii::app()->user->getId() == $plan['userId']): ?>
                    <button class="btn btn-green" data-toggle="modal" data-target="#invite-friends-modal">Invite Friends</button>
                <?php endif; ?>
            <?php endif; ?>
        </div>				
    </div>
</div>

<!-- Add more suggestion Modal -->
<div class="modal fade" id="add-suggestion-modal" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
     <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h3 class="text-center">Add your suggestion to help in planning?</h3>
        

      </div>
<!-- end Modal header -->

      <!-- Modal Body -->
      <div class="modal-body">       
      
       <div class="create-plan-form">
        <div class="col-md-12">

        <div class="row col-sm-12">
            <a href="javascript:void(0);" data-value="movies" class="term"><!-- <span class="icon-movies"></span> --> Movies</a>
            <a href="javascript:void(0);" data-value="event" class="term"><!-- <span class="icon-event"></span>  -->Event</a>
            <a href="javascript:void(0);" data-value="coffee" class="term"><!-- <span class="icon-coffee"></span>  -->Coffee</a>
            <a href="javascript:void(0);" data-value="lunch" class="term"><!-- <span class="icon-food"></span>  -->Lunch</a>
            <a href="javascript:void(0);" data-value="dinner" class="term"><!-- <span class="icon-food"></span>  -->Dinner</a>
            <a href="javascript:void(0);" data-value="other" class="term active"><!-- <span class="icon-other"></span>  -->Other</a>
        </div>

<!--
        <input class="item" type="radio" name="itemCategory" value="movies">Movie  
        <input class="item" type="radio" name="itemCategory" value="events">Event  
        <input class="item" type="radio" name="itemCategory" value="coffee">Coffee  
        <input class="item" type="radio" name="itemCategory" value="lunch">Lunch  
        <input class="item" type="radio" name="itemCategory" value="dinner">Dinner  
        <input class="item" type="radio" name="itemCategory" checked="checked" value="others">Other
-->
    
    <div class="clearfix">&nbsp;</div> 

    <form method="post" action="" id="suggestForm" class="frm-create" autocomplete="off">
    <div class="form-group titleField">
        <label id="lblTitle">What would you like to plan</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Name of your plan" data-validation="required">
        <div class="selectionDiv"></div>
    </div>
    <div class="clearfix">&nbsp;</div>  
     <div class="form-group whereField">   
        <label id="lblWhere">Where would you like to go</label>
        <input type="text" name="venue" id="venue" class="form-control" placeholder="Type address or location name" data-validation="required">
         <div class="selectionDiv"></div>
    </div> 
    <div class="clearfix">&nbsp;</div>  
    <div class="form-group whenField">
        <label id="lblWhen ">When would you like to <span>go</span></label>
        <input type="text" id="startDate" name="startDate" class="form-control" placeholder="Date and time" data-validation="required">
        <div class="selectionDiv"></div>
    </div>

   <div class="clearfix">&nbsp;</div>  

        <input type="hidden" name="planId" id="planId" value="<?php echo $plan['id'];?>" />
        <input type="hidden" name="sessionId" id="session_id" value="0" />
        <input type="hidden" name="itemCategory" id="itemCategory" value="other" />
        <div class="text-center">
            <input type="submit" name="submit" value="Done" id="suggestFormSubmit" class="btn btn-green col-sm-5">
        </div>
    </form>

</div>

</div>


      </div>
      <!-- end Modal Body -->

    
       <div class="modal-footer">        
      </div>
    

    </div>
  </div>
</div><!-- end Invite Friends Modal -->
