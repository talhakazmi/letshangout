 <div class="container">
    <div class="signin-box box">
       <h3>Reset your Password</h3>
       <hr />
       <form method="post" action="<?php echo Yii::app()->createUrl('user/resetpassword'); ?>">
           <?php if(isset($error)): ?><p><?php echo $error; ?></p><?php endif; ?>
           <div class="form-group">				    
               <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
           </div>		 
           <div class="form-group">				    
               <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="New Password Confirmation">
               <input type="hidden" class="form-control" name="code" value="<?php echo (isset($code))?$code:'';?>">
               <input type="hidden" class="form-control" name="id" value="<?php echo (isset($id))?$id:'';?>">
           </div>		 
           <div class="clearfix">			  
               <input type="submit" class="btn btn-green col-xs-12" name="submit" value="Reset" />
           </div>
       </form>
       <hr />
   </div>
</div>