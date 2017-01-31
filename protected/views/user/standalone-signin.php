<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div style="color:#FF0000;text-align:center;background-color:#FFFF00;" class="flash-' . $key . '">' . $message . "</div>\n";
    }
?> 
<div class="container">
 <div class="signin-box box">
 	<h3>Login to Let's Hangout</h3>
 	<hr />
        <form method="post" action="<?php echo Yii::app()->createUrl('user/login'); ?>" id="signinForm">
            <div class="clearfix">
                <!--    
                    Below we include the Login Button social plugin. This button uses
                    the JavaScript SDK to present a graphical Login button that triggers
                    the FB.login() function when clicked.
                -->
                <div id="fb-root"></div>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">Login with Facebook</fb:login-button>
            </div>
            <div class="text-center or">OR</div>
            <?php if(isset($error)): ?><p><?php echo $error; ?></p><?php endif; ?>
            <div class="form-group">				    
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-validation="email" value="<?php echo (isset($_POST['email'])?$_POST['email']:'') ?>">
            </div>
            <div class="form-group">			   
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-validation="required">
            </div>			 
            <div class="clearfix">			  
                <input type="submit" class="btn btn-green col-xs-12"  id="signinSubmit" name="submit" value="Login" />
            </div>
            <div class="row">
                <div class="col-sm-6 txt-small">				  		
                    <input type="checkbox" name="remember" /> Remember me
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo Yii::app()->createUrl('user/forgotpassword'); ?>" class="txt-small">Forgot password?</a>
                </div> 
            </div>
        </form>
<hr />
 <div class="text-left txt-small">
     No account? <a href="<?php echo Yii::app()->createUrl('user/register'); ?>">Sign up</a>.
 </div>

		</div>

	</div>