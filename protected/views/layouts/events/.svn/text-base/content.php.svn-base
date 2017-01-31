<?php $this->beginContent('//layouts/main'); ?>
<div class="bg-container">
    <div class="container">
        <h2>Plan your Event with Friends</h2>
        <h3 class="locationDiv">Discover events in <a href="javascript:void(0);" class="changeLocationBtn"><span class="glyphicon glyphicon-map-marker"></span> <span class="txt-location"><?php echo Yii::app()->session['city']; ?></span></a></h3>    </div>
</div>
<div class="light-container">
    <div class="container">
        <h3>Do you have your own event?</h3>
        <p>Create your own event and invite your friends</p>
        <a href="javascript:void(0);" class="btn-normal" <?php echo (Yii::app()->user->isGuest)?'id="triggerSignIn"':'id="createEvent" data-target="#myModal" data-toggle="modal"' ?>>Create Event</a>
    </div>
</div>
    <?php echo $content; ?>
<?php $this->endContent(); ?>