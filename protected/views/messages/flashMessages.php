<?php
	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<p class="flash-' . $key . '">' . $message . "</p>";
	}
?>