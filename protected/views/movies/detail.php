<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        </div>
        <div class="modal-body">
            <div class="poster-area">
                    <img src="<?php echo Yii::app()->params->apiUrl . $this->imagePath . $this->dateToUrl($movie['createdDate']) . $movie['poster']; ?>" class="img-responsive">
            </div>
            <div class="right-area">
                <div class="movie-details">
                        <div class="movie-info">
                                <h3 class="modal-title"><?php echo $movie['title'] ?></h3>
                                <p><?php echo $movie['description'] ?></p>
                        </div>
                        <div class="movie-rating">
                                <div class="rating">
                                        <div class="like-icon-blue"></div>
                                        <div class="values"><?php echo $movie['percent'] ?></div>
                                </div>
                                <div class="rating">
                                        <div class="star-icon-blue"></div>
                                        <div class="values"><?php echo (isset($movie['imdbData']['imdbRating'])?$movie['imdbData']['imdbRating']:'N/A') ?></div>
                                </div>

                        </div>
                </div>
                <div class="available-slots">
                    <div class="movie-list">
                            <ul>
                                    <li class="available-heading">Available At</li>
                                    <?php $count=0;if(isset($movie['venue'][0])):foreach($movie['venue'] as $venue):$count++; ?>
                                        <li><a href="javascript:void(0);" class="<?php echo ($count ==1)?'selected':'' ?> venue" id="<?php echo $venue['id'] ?>"><?php echo $venue['title'] ?></a></li>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <li><a href="javascript:void(0);" class="selected venue" id="<?php echo $movie['venue']['id'] ?>"><?php echo $movie['venue']['title'] ?></a></li>
                                    <?php endif; ?>
                            </ul>
                    </div>
                    <div class="slots-list">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>