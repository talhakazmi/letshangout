<?php $this->beginContent('//layouts/main'); ?>

<div class="bg-container">
	<div class="container">
		<div class="gray-box">
			<h1 class="large-text">Plan hangout with friends and have fun!</h1>
			<h2 class="medium-text">Simple. Quick. Effective</h2>
			<div class="row hidden-xs">
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/dashboard">
					<div class="col-md-3 col-sm-3">
						<div class="cat-icons planicon"></div>
						<h3>Plans</h3>
					</div>
				</a>
				<a href="<?php echo Yii::app()->request->baseUrl; ?>/events">
					<div class="col-md-3 col-sm-3">
						<div class="cat-icons eventicon"></div>
						<h3>Events</h3>
					</div>
				</a>
				<a <?php echo (Yii::app()->session['city'] != 'karachi')?"This section is not valid in your city":''; ?> href="<?php echo (Yii::app()->session['city'] == 'karachi')?Yii::app()->request->baseUrl."/movies":'javascript:void(0);'; ?>">
					<div class="col-md-3 col-sm-3">
						<div class="cat-icons movieicon"></div>
						<h3>Movies</h3>
					</div>
				</a>
				<a href="#events">
					<div class="col-md-3 col-sm-3">
						<div class="cat-icons dineouticon"></div>
						<h3>Restaurants</h3>
					</div>
				</a>
                              
			</div>

                         <div class="locationDiv">Your current location is <a href="javascript:void(0);" class="changeLocationBtn"><span class="glyphicon glyphicon-map-marker"></span> <span class="txt-location"><?php echo Yii::app()->session['city']; ?></span></a></div>
			
		</div>
	</div>
	
</div>
<div class="container mobile-btns visible-xs">
	<ul>
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/Dashboard"><li><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/plan-icon.png">Plans</li></a>
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/events"><li><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/event-icon.png">Events</li></a>
		<a href="<?php echo Yii::app()->request->baseUrl; ?>/movies"><li><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/movie-icon.png">Movies</li></a>
		<a href="#"><li><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/dineout-icon.png">Restaurants</li></a>
	</ul>
</div>
	<?php echo $content; ?>
<div class="container main">
        <h2>HOW IT WORKS</h2>
        <p class="slogan">Create hangout plans in 5 simple steps.</p>
        <div class="row">
                <div class="col-md-7 how-it-works hidden-xs col-sm-7">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/how-it-works.png">
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="row feature">
                                <div class="col-md-2  col-sm-push-0 col-sm-3 col-xs-2  col-xs-push-3">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/create-event-icon.png">
                                </div>
                                <div class="col-md-10 col-sm-push-0 col-sm-9 col-xs-7 col-xs-push-3">
                                        <p>Create Hangout Plan</p>
                                </div>
                                </div>

                        <div class="row feature">
                                <div class="col-md-2  col-sm-push-0 col-sm-3 col-xs-2  col-xs-push-3">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/invite-friends-icon.png">
                                </div>
                                <div class="col-md-10 col-sm-push-0 col-sm-9 col-xs-7 col-xs-push-3">
                                        <p>Invite Friends</p>
                                </div>

                        </div>

                        <div class="row feature">
                                <div class="col-md-2  col-sm-push-0 col-sm-3 col-xs-2  col-xs-push-3">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/vote-icon.png">
                                </div>
                                <div class="col-md-10 col-sm-push-0 col-sm-9 col-xs-7 col-xs-push-3">
                                        <p class="large-para">Vote on the idea or provide suggestion</p>
                                </div>

                        </div>
                        <div class="row feature">
                                <div class="col-md-2  col-sm-push-0 col-sm-3 col-xs-2  col-xs-push-3">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/confirm-icon.png">
                                </div>
                                <div class="col-md-10 col-sm-push-0 col-sm-9 col-xs-7 col-xs-push-3">
                                        <p>Confirm</p>
                                </div>

                        </div>
                        <div class="row feature">
                                <div class="col-md-2  col-sm-push-0 col-sm-3 col-xs-2  col-xs-push-3">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/landing-img/fun-icon.png">
                                </div>
                                <div class="col-md-10 col-sm-push-0 col-sm-9 col-xs-7 col-xs-push-3">
                                        <p>Have Fun!</p>
                                </div>

                        </div>



                </div>
        </div>

</div>
<?php $this->endContent(); ?>
