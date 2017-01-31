<div id="myCarousel" class="carousel slide">
<!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for($count = 0;$count<count($sliderMovies);$count++): ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $count;?>" <?php echo ($count == 0)?'class="active"':'' ?>></li>
        <?php endfor; ?>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <?php for($count = 0;$count<count($sliderMovies);$count++): ?>
        <div class="item <?php echo ($count == 0)?'active':'' ?>">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo Yii::app()->params->apiUrl . $this->imagePath . $this->dateToUrl($sliderMovies[$count]['createdDate']) .  $sliderMovies[$count]['banner'] ?>');"></div>
            <div class="carousel-caption">
                <h2><?php echo $sliderMovies[$count]['title'] ?></h2>
            </div>
        </div>
        <?php endfor; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</div>
<div class="container">
    <div class="row">

    </div>
    <div class="row quick-ticket-title" >
            <div class="col-md-2">
                    <span class="title-text">Quick Ticket</span> <span class="title-arrow"></span>
            </div>
    </div>
    <div class="row quick-ticket-steps">
            <div class="col-md-3 step">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/step1.png"> 
            </div>
            <div class="col-md-3 step">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/step2.png">
                    <span>Where would you like to go?</span>
                    <span class="gray-down-arrow"></span>
            </div>
            <div class="col-md-3 step">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/step3.png">
                    <span>When do you like to see?</span>
                    <span class="gray-down-arrow"></span>
            </div>
            <div class="col-md-3 step">
                    <div class="book-session">
                            <a href="#">Find Session & Book</a>
                    </div>

            </div>
    </div>
    <div class="row movies-container">
        <div class="col-md-9">
            <div class="row movies-categories">
                <div class="col-md-3"><a id="available" href="javascript:void(0);" class="selected tab">NOW SHOWING</a></div>
                <div class="col-md-3"><a id="coming" href="javascript:void(0);" class="tab">COMING SOON</a></div>
                <!--<div class="col-md-3"><a id="ended" href="javascript:void(0);" class="tab">ARCHIVE</a></div>-->
            </div>

            <div class="row">
                <ul class="thumbnails" id="hover-cap-4col">
                <?php 
                    foreach($nowShowing as $movies):

                        $imdb['url']    =   'http://www.omdbapi.com/';
                        $imdb['get']    =   array('i'=>'','t'=> str_replace(' ', '+', $movies['title']));
                        $movies['imdbData']    =   $this->httpRequest($imdb);
                        $this->renderPartial('list-item',array('movie'=>$movies), false, false);

                     endforeach; 
                ?>
                </ul>
            </div>

        </div>

        <div class="col-md-3 ">
            <div class="ad">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/small-banner.png" class="img-responsive">
            </div>
            <div class="ad">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/large-banner.png" class="img-responsive">
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-lg movie-details-overlay" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div id="MovieDetailContainer"></div>
    </div>
    
</div>