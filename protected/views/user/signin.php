<!-- Modal Header -->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="text-center">Login to Let's Hangout</h4>
</div>
<!-- end Modal header -->

<!-- Modal Body -->
<div class="modal-body">       
    <div class="col-sm-12">
        <form onSubmit="return false;" id="signinForm">
            <div class="clearfix">
                <!--    
                    Below we include the Login Button social plugin. This button uses
                    the JavaScript SDK to present a graphical Login button that triggers
                    the FB.login() function when clicked.
                -->
                <div id="fb-root"></div>
                <fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();">Login with Facebook</fb:login-button>
            </div>
            <div class="text-center or">OR</div>
            <div class="form-group">				    
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-validation="email">
            </div>
            <div class="form-group">			   
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" data-validation="required">
            </div>			 
            <div class="clearfix">			  
                <input type="submit" class="btn btn-green col-xs-12"  id="signinSubmit" value="Login" />
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
    </div>
</div>
<!-- end Modal Body -->
<div class="modal-footer"> 
    <div class="row col-xs-12 text-left txt-small">
        No account? <a href="<?php echo Yii::app()->baseUrl ?>/user/register">Sign up</a>.
    </div>
</div>