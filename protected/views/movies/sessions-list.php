
<div class="slot">
		<div class="slot-day"><?php echo (date('d-m-Y') == date('d-m-Y',strtotime($sessionDate))) ? 'Today' : ((date("d-m-Y", strtotime("+1 day")) == date("d-m-Y", strtotime($sessionDate))) ? 'Tommorrow' : date('l',strtotime($sessionDate))); ?></div>
		<div class="slot-time">
			<ul>
                            <?php foreach($sessionTimes as $time): ?>
				<li><a href="#"><?php echo substr($time,0,-3);?></a></li>
                            <?php endforeach; ?>
			</ul>
		</div>
</div>