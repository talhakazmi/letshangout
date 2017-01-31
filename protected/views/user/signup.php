<!-- Modal Header -->
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="text-center">Sign up for Let's Hangout</h4>
</div>
<!-- end Modal header -->

<!-- Modal Body -->
<div class="modal-body">       
	<div class="col-sm-12">
		<form onSubmit="return false;" id="signupForm">
			<div class="form-group">				    
				<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" data-validation="required">
			</div>
			<div class="form-group">				    
				<input type="text" class="form-control" id="email" name="email" placeholder="Email" data-validation="email">
			</div>
			<div class="form-group">			   
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" data-validation="length" data-validation-length="min8">
			</div>
			<div class="form-group">			   
				<input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm password" data-validation="confirmation">
			</div>	
			<div class="clearfix">			  
				<input type="submit" class="btn btn-green col-xs-12" id="signupSubmit" value="Sign up" />
			</div>
		</form>
	</div>
</div>
<!-- end Modal Body -->
<div class="modal-footer"> 

</div>
