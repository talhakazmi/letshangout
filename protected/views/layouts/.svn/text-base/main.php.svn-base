<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
   
<header>
        <nav class="navbar navbar-default custom-navbar" id="navigation">
                <div class="container">
                        <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                    <a  href="<?php echo Yii::app()->getBaseUrl(true) ?>" class="logo">
                        <img alt="Brand" class="pull-left img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/logo.png">
                    </a>
                        <?php if($this->getUniqueId() == 'events' || $this->getUniqueId() == 'movies'): ?>
                        <img class="vr pull-left img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/events-img/vr.png">
                        <h2 class="pull-left"><?php echo (isset($this->category)?ucfirst($this->category):'') ?></h2>
                        <?php endif; ?>
                     </div>

                    <!--<div class="search-input">
                        <form>
                            <input type="text" name="q" id="q" placeholder="Search" />
                        </form>
                    </div>-->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="pull-right hangout-types">
                            <?php
                                $this->widget('zii.widgets.CMenu', array(
                                        'items'=>  (isset($this->PageSpecificMenu['normal']) && !Yii::app()->user->getId())?array_merge($this->PageSpecificMenu['normal'], $this->menu['normal']):$this->menu['normal'],
                                        'htmlOptions'=>array('class'=>'hidden-xs'),
                                ));
                            ?>
                        </div>
                        <?php
                            $this->widget('zii.widgets.CMenu', array(
                                    'items'=>(isset($this->PageSpecificMenu['responsive']) && !Yii::app()->user->getId())?array_merge($this->PageSpecificMenu['responsive'], $this->menu['responsive']):$this->menu['responsive'],
                                    'htmlOptions'=>array('class'=>'nav navbar-nav visible-xs'),
                            ));
                        ?>
                    </div>
                </div>
        </nav>
</header>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
            echo '<p style="background-color:#FFFF00;text-align:center;" class="flash-' . $key . '">' . $message . "</p>";
    }
?>
<?php echo $content; ?>


<footer>
        <div class="container">
            <?php if(!Yii::app()->user->getId()){ ?>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h3> </h3>
                   <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/applestore.png"></a>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/googleplay.png"></a>
                </div>
                <div class="col-md-4 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h3>LetsHangout</h3>
                            <p><a href="<?php echo Yii::app()->request->baseUrl; ?>/terms">Term of use</a></p>
                            <p><a href="<?php echo Yii::app()->request->baseUrl; ?>/policy">Privacy Policy</a></p>
                            <p><a href="#">Contact Us</a></p>
                        </div>                       
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 join-us">
                    <h3>Join Us On</h3>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/social-fb.png"></a>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/social-twitter.png"></a>
                </div>
            </div>
            <p class="copyright">&copy; LetsHangout - 2014</p>
            <?php }else{ ?>
            <div class="row" style="padding-top:5px;">
                
                <div class="col-sm-4">
                    &copy; LetsHangout - 2014 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl; ?>/terms">Terms of use</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl; ?>/policy">Privacy Policy</a>
                </div>
                <div class="col-sm-2 pull-right">
                    <strong>Join Us On</strong>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/social-fb.png" width="24"></a>
                    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/img/social-twitter.png" width="24"></a>
                </div>
                 <div class="clearfix">&nbsp;</div>
            </div>
            <?php } ?>
            
        </div>
    </footer>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="detailContainer"></div>
    </div>
</div>

<!--change Location  modal -->
<div class="modal fade" id="changeLocationModal" tabindex="-1" aria-hidden="true" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Location</h4>
                </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <label for="location-field">Enter your city name. Example (City, Country)</label>
                    <input type="text" class="form-control" id="location-field" name="location-field" placeholder="e.g Karachi, Pakistan" pattern="[a-z]+(,[a-z]+)" required/>
                </div>
            </div>
             <div class="modal-footer" style="text-align:center;">
                <button class="btn btn-green" id="updateLocation">Change Location</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>