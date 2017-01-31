 <div class="container">

 <div class="signin-box box">
 	<h3>Register</h3>
 	<hr />
        <?php if(isset($error)): ?>
            <?php foreach($error as $errors): ?>
                <p><?php echo $errors[0]; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
                <form method="post" action="<?php echo Yii::app()->createUrl('user/register'); ?>" id="signupForm">
			<div class="form-group">				    
				<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" data-validation="required" value="<?php echo (isset($_POST['name'])?$_POST['name']:'') ?>">
			</div>
			<div class="form-group">				    
				<input type="text" class="form-control" id="email" name="email" placeholder="Email" data-validation="email" value="<?php echo (isset($_POST['email'])?$_POST['email']:'') ?>">
			</div>
			<div class="form-group">			   
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" data-validation="length" data-validation-length="min8">
			</div>
			<div class="form-group">			   
				<input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm password" data-validation="confirmation">
			</div>	
			<div class="clearfix">			  
				<input type="submit" class="btn btn-green col-xs-12" name="submit" id="signupSubmit" value="Sign up" />
			</div>
		</form>

		</div>

	</div>