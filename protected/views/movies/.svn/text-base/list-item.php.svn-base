<li class=" col-md-4 col-xs-6 span3">
	<div class="thumbnail">
		<div class="caption">
			<h4 class="movie-title"><?php echo $movie['title'] ?></h4>
			<div class="star-icon"></div>
			<h4><?php echo (isset($movie['imdbData']['imdbRating'])?$movie['imdbData']['imdbRating']:'N/A') ?></h4>
                        <div class="like-icon"></div>
			<h4><?php echo $movie['percent'] ?></h4>

                        <a href="javascript:void(0);" id="<?php echo $movie['id'] ?>" class="more-info" data-toggle="modal" data-target=".bs-example-modal-lg">More Information</a>
			<a href="javascript:void(0);" data-video="<?php echo $movie['trailer'] ?>" class="watch-trailer" data-toggle="modal" data-target=".bs-example-modal-lg">Watch Trailer</a>

		</div>
		<img src="<?php echo Yii::app()->params->apiUrl . $this->imagePath . $this->dateToUrl($movie['createdDate']) . $movie['poster']; ?>" alt="<?php echo $movie['title'] ?>">
	</div>

</li>