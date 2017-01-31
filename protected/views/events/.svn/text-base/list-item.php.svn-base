<li class=" col-md-4 col-xs-12 col-sm-6">
	<div class="thumbnail">
		<img src="<?php echo (!empty($event['item']['poster']))?Yii::app()->params->apiUrl . 'images/'.$event['itemCat']['title'].'/' . $this->dateToUrl($event['item']['createdDate']) . $event['item']['poster']:Yii::app()->createUrl('assets/events-img/events-default.jpg'); ?>" alt="<?php echo $event['item']['title']?>">
		<div class="caption">
			<a href="javascript:void(0);" data-target="#myModal" data-toggle="modal" data-id="<?php echo $event['id']?>" class="eventDetail"><h3><?php echo $event['item']['title']?></h3></a>
			<p><?php echo $event['venue']['title']?></p>
			<p><?php echo date('Y-m-d h:i:s', strtotime($event['startTime'])).' - '.date('Y-m-d h:i:s', strtotime($event['expireTime']))?></p>
			<!--<div class="who-is-going">
				Who's going: <a href="#">Junaid</a>, <a href="#">Junaid</a> <a href="#">Junaid</a>... <a href="#">others(10+)</a>
			</div>-->
		</div>
	</div>  
</li>