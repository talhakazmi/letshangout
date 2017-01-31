<div class="light-container">
    <div class="container">
<!--        <h3>Plan hangout with friends and have fun</h3>-->
        <span>
            <?php
                foreach(Yii::app()->user->getFlashes() as $key => $message) {
                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }
            ?>
        </span>
        <br>
        <input type="submit" onClick="javascript:window.location='<?php echo Yii::app()->request->baseUrl; ?>/plan/create';" class="get-notified-btn btn btn-lg btn-normal" value="Let's Plan Hangout">
    </div>
</div>