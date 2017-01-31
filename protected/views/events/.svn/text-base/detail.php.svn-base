<!-- Modal Header -->
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   <h4 class="modal-title" id="myModalLabel"><?php echo $session['item']['title']; ?></h4>
   <div class="clearfix">&nbsp;</div>
   <div class="event-date"><?php echo date('l, F d, Y \a\t g:i A',strtotime($session['startTime'])) . ' - ' . date('l, F d, Y \a\t g:i A',strtotime($session['expireTime'])); ?></div>
   <div class="event-location"><?php echo $session['venue']['title'].', '.$session['venue']['city'].', '.$session['venue']['country']; ?></div>
   <div class="clearfix">&nbsp;</div>
   <div class="event-organizer">Hosted by: <?php echo $session['user']['email']; ?></div>
</div>
<!-- end Modal header -->

<!-- Modal Body -->
<div class="modal-body modal-inner-body">
   <div class="col-sm-8">
       <strong class="txt-big">Event Details</strong>
       <div class="clearfix">&nbsp;</div>
       <div class="img-placeholder">
              <img src="<?php echo Yii::app()->params->apiUrl . $this->imagePath . $this->dateToUrl($session['item']['createdDate']) . $session['item']['poster']; ?>" />
       </div>
       <div class="event-description">
              <p><?php echo $session['item']['description']; ?></p>
       </div>
   </div>

   <!--<div class="col-sm-4 visible-sm visible-md visible-lg modal-inner-right">
       <button type="button" class="col-sm-12 btn btn-green">Add to plan</button>
       <div class="clearfix">&nbsp;</div>
       <strong class="txt-big">Who's going</strong>
       <div class="clearfix">&nbsp;</div>
       <ul class="user-list">
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Danish
           </li>
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Sarah Siddiqui
           </li>
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Waqas Karim
           </li>
       </ul>
   </div>

   <div class="col-xs-12 visible-xs" style="background:#fff;">
       <div class="clearfix">&nbsp;</div>
       <strong>Who's going</strong>
       <div class="clearfix">&nbsp;</div>
       <ul class="user-list">
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Danish
           </li>
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Sarah Siddiqui
           </li>
           <li>
               <img src="<?php echo Yii::app()->createUrl('assets/img/default-avatar.png'); ?>" class="avatar-small"/> Waqas Karim
           </li>
       </ul>
       <div class="clearfix">&nbsp;</div>
       <button type="button" class="col-xs-12 btn btn-green">Add to plan</button>
   </div>-->
</div>
<!-- end Modal Body -->