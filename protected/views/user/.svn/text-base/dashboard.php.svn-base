<div class="light-container" style="text-align:inherit;">
<div class="container main">    
    <h3 class="dashboard-title"><a href="javascript:window.location=window.location.href;" class="icon-reload" data-toggle="tooltip" title="Reload Plans"></a> Dashboard</h3>
    <div class="clearfix">&nbsp;</div>
    <!-- Plan Icons -->
    <div class="col-md-9 col-md-push-1">
        <div class="col-sm-4 col-md-4">
            <div class="plan-icons liveplan">
                <div class="icon-liveplan centered-icon"></div>
            </div>
            <div class="col-sm-12 text-center status-labels">
                <span class="status-count"><?php echo $liveCount;?></span> Live Plan
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="plan-icons confirmplan">
                <div class="icon-confirmplan centered-icon"></div>
            </div>
            <div class="col-sm-12 text-center status-labels">
                <span class="status-count"><?php echo $confirmedCount;?></span> Confirmed Plan
            </div>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="plan-icons openplan">
                <div class="icon-openplan centered-icon"></div>
            </div>
            <div class="col-sm-12 text-center status-labels">
                <span class="status-count"><?php echo $openCount;?></span> Open Plan
            </div>
        </div>
    </div>
     <!-- end Plan Icons -->
  

</div>
</div>
<!-- MainContainer -->

<div class="container">

     <div class="clearfix">&nbsp;</div>
    
        <div class="row">
        <div class="col-sm-7 col-md-9">
<!--            <b>Plan Activity(s)</b>-->
        </div>
        <div class="col-sm-5 col-md-3">
            <div class="filter btn-group" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input type="radio" name="options" id="plans" autocomplete="off" checked> All
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="options" id="own" autocomplete="off"> Own Plans
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="options" id="invited" autocomplete="off"> I'm Invited
                </label>
            </div>
        </div>
    </div>
</div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<?php if(!isset($planDetails)): ?>
<div class="container text-center">
<!-- Warning -->
    <div class="warning">
        <img src="<?php echo Yii::app()->getBaseUrl(true); ?>/assets/img/warning-sign.png" height="87" width="78" />
        <br />
        <h5 class="col-sm-12">It seems you don't have plan for hangout. <br> Don't worry we have something great to create your hangout plan click 'Create Hangout Plan'</h5>						
        <div class="clearfix">&nbsp;</div>
        <div class="clearfix">&nbsp;</div>
        <a href="<?php echo Yii::app()->createUrl('/plan/create');?>" class="btn-medium btn btn-lg btn-normal">Create Hangout Plan</a>
    </div><!-- end Warning Div -->
</div>
<?php else: ?>
<!-- Plan Lists -->
<div id="planlists" class="container isotope">
<!-- Loop -->
<?php foreach($planDetails['plan'] as $planDetail): ?>
    <div class="element-item plans <?php echo ($planDetail['userId']==Yii::app()->user->getId())?'own':'invited'; ?>">
        <div class="user-avatar"><img src="<?php echo Yii::app()->getBaseUrl(true); ?>/assets/img/default-avatar.png" height="108" width="72" class="avatar-medium" /></div>
        <div class="mini-container">
            <div class="<?php echo (!empty($planDetail['planinvites']))?'leftPan':'fullPan' ?>">
                <h1><a href="<?php echo Yii::app()->createUrl('/plan/detail/', array('id' => $planDetail['id'])); ?>"><?php echo $planDetail['title']; ?></a></h1>
                <div class="plan-status">Status: <span class="<?php echo $planDetail['status']; ?>status-label"><?php echo $planDetail['status']; ?></span></div>
                <hr style="margin-bottom:5px;"/>
                <div class="plan-activity content-50">
                    <?php if(isset($planDetail['adminsuggestion'])): ?> 
                    <strong>Venue and Date</strong>
                     <div class="suggestions-mini-no-bar">
<!--                        <div class="toolbar-suggestion">
                            <span class="vote-count"><?php echo (isset($planDetail['votes'][$planDetail['adminsuggestion']['id']]))?count($planDetail['votes'][$planDetail['adminsuggestion']['id']]):'0'; ?></span>
                            <?php if($planDetail['status'] == 'open' || $planDetail['status'] == 'confirmed' ): ?>
                                <a href="javascript:void(0);" class="vote-up<?php echo (isset($planDetail['votingStatus'][$planDetail['adminsuggestion']['id']]) && $planDetail['votingStatus'][$planDetail['adminsuggestion']['id']] == '1')?' active':'' ?>"><span class="fa fa-thumbs-up cast-vote" data-user="<?php echo Yii::app()->user->getId() ?>" data-suggestion="<?php echo $planDetail['adminsuggestion']['id']; ?>"></span></a>
                            <?php endif; ?>                                
                        </div>-->
                        <span class="plan-venue"><?php echo $planDetail['items'][$planDetail['sessions'][$planDetail['adminsuggestion']['sessionsId']]['itemId']]['title']; ?></span>
                        <?php $venue=$planDetail['venue'][$planDetail['stateroom'][$planDetail['sessions'][$planDetail['adminsuggestion']['sessionsId']]['stateRoomId']]['venueId']]; ?>
                        <span class="plan-venue"><?php echo $venue['title'].', '.$venue['city'].', '.$venue['country']; ?></span>                   
                        <span class="plan-date"><?php echo date('M d, Y \a\t g:m A', strtotime($planDetail['sessions'][$planDetail['adminsuggestion']['sessionsId']]['startTime'])); ?></span>                  
                        <?php if($planDetail['suggestionsCount'] > 3): ?><div class="badge badge-orange"><?php echo $planDetail['suggestionsCount']; ?></div> <a href="#" class="txt-xsmall">view more suggestions</a><?php endif; ?>                               
                    </div>
                    <?php endif; ?>
                    <!-- Overall user status -->
                    <ul class="overall-ustatus">
                        <strong>Users Status</strong>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/plan/detail/', array('id' => $planDetail['id'])); ?>">
                                <span class="icon-in pull-left" data-toggle="tooltip" data-placement="top" title="I'm in"></span>
                            </a>
                            <span class="pull-left"><?php echo $planDetail['initialStatus']['yes']; ?></span>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/plan/detail/', array('id' => $planDetail['id'])); ?>">
                                <span class="icon-maybe pull-left" data-toggle="tooltip" data-placement="top" title="May be"></span>
                            </a>
                            <span class="pull-left"><?php echo $planDetail['initialStatus']['maybe']; ?></span>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('/plan/detail/', array('id' => $planDetail['id'])); ?>">
                                <span class="icon-decline pull-left" data-toggle="tooltip" data-placement="top" title="Quit"></span>
                            </a>    
                            <span class="pull-left"><?php echo $planDetail['initialStatus']['no']; ?></span>
                        </li>
                    </ul>
                </div>
                <div class="plan-activity content-50">
                    <strong>Top Voted suggestion(s)</strong>
                    <div class="dashboard-suggestion">						
<?php foreach($planDetail['votesCount'] as $votesCount): ?>
<?php for($count=0;$count<count($planDetail['plansuggestions'][$votesCount]);$count++): ?>
                        <div class="suggestions-mini">
                            <div class="toolbar-suggestion">
                                <span class="vote-count"><?php echo $votesCount ?></span>
                                <?php if($planDetail['status'] == 'open' || $planDetail['status'] == 'confirmed' ): ?>
                                    <a href="javascript:void(0);" class="vote-up<?php echo (isset($planDetail['votingStatus'][$planDetail['plansuggestions'][$votesCount][$count]['id']]) && $planDetail['votingStatus'][$planDetail['plansuggestions'][$votesCount][$count]['id']] == '1')?' active':'' ?>"><span class="fa fa-thumbs-up cast-vote" data-user="<?php echo Yii::app()->user->getId() ?>" data-suggestion="<?php echo $planDetail['plansuggestions'][$votesCount][$count]['id'] ?>"></span></a>
                                <?php endif; ?>
                            </div>
                                <span class="plan-venue"><?php echo $planDetail['items'][$planDetail['sessions'][$planDetail['plansuggestions'][$votesCount][$count]['sessionsId']]['itemId']]['title']; ?></span>
                                <?php $venue=$planDetail['venue'][$planDetail['stateroom'][$planDetail['sessions'][$planDetail['plansuggestions'][$votesCount][$count]['sessionsId']]['stateRoomId']]['venueId']]; ?>
                                <span class="plan-venue"><?php echo $venue['title'].', '.$venue['city'].', '.$venue['country']; ?></span>
                                <span class="plan-date"><?php echo date('M d, Y \a\t g:m A', strtotime($planDetail['sessions'][$planDetail['plansuggestions'][$votesCount][$count]['sessionsId']]['startTime'])); ?></span>
                        </div>
<?php endfor; ?>
<?php endforeach; ?>
                    </div><!-- @dashboard-suggestion -->
                </div>
            </div>
<?php 
    sort($planDetail['duration'],SORT_NATURAL);
    $date   =   $this->findTime(end($planDetail['duration']));
?>
<?php if(!empty($planDetail['planinvites'])): ?>
            <div class="rightPan">
                <h3>Participants</h3>
                <div class="participant-scroll">
                    <ul class="user-list">
                        <?php foreach($planDetail['planinvites'] as $invite): ?>
                        <?php if($invite['initialStatus'] != 'no'): ?>
                        <li>
                            <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/>
                                <?php echo $planDetail['invited'][$invite['friendsId']]['name'] ?> - <?php echo ((Yii::app()->user->getId() == $planDetail['invited'][$invite['friendsId']]['userId'] && $date != false && $planDetail['status'] == 'live') ? '<a tabindex="0" href="javascript:void(0);" title=""  data-plan="'. $planDetail['id'] .'" data-toggle="tooltip">':''); ?>
                                    <span class="txt-blue">
                                        <?php echo (isset($invite['finalStatus']))?Yii::app()->params[$invite['finalStatus']]:(isset($invite['initialStatus'])?ucfirst($invite['initialStatus']):'Pending') ?>
                                    </span>
                                <?php ((Yii::app()->user->getId() == $planDetail['invited'][$invite['friendsId']]['userId']) ? '</a>':'') ?>
                        </li>
                        <?php endif;?>
                        <?php endforeach; ?>
                    </ul>
                </div>				
            </div><!-- end Right Pan -->
<?php endif; ?>
        </div>

        <div class="postedby">
                Organized by <a href="#"><?php echo $planDetail['userName']; ?></a> <?php echo $this->humanTiming($planDetail['adminsuggestion']['createdDate']); ?> ago			
        </div>
        <div class="countdown"><?php echo ($date)?'Time left '.$date:'Already Due'; ?></div>
    </div><!-- end loop -->
<?php endforeach; ?>
</div>
<?php endif; ?>