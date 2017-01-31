 <div class="container">
    <div class="signin-box box">
       <h3>Forgot password?</h3>
       <hr />
       <form method="post" action="<?php echo Yii::app()->createUrl('user/forgotpassword'); ?>">
           <?php if(isset($error)): ?><p><?php echo $error; ?></p><?php endif; ?>
           <div class="form-group">				    
               <input type="text" class="form-control" id="email" name="email" placeholder="Email" data-validation="email" value="<?php echo (isset($_POST['email'])?$_POST['email']:'') ?>">
           </div>		 
           <div class="clearfix">			  
               <input type="submit" class="btn btn-green col-xs-12"  id="signinSubmit" name="submit" value="Login" />
           </div>
       </form>
       <hr />
   </div>
</div>