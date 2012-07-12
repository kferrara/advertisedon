<div class="span-2">
	<br />
	<br />
	<br />
</div>
<div class="span-22 last"><br />
	<br />
	<?php echo validation_errors(); ?>
	<h3>Sign Up Now!</h3>
	<form action="<?= site_url("auth/signup_completion"); ?>" class="nice" method="post">
		<label for="mediumNiceInput">Email Address</label>
		<input type="text" class="medium input-text" id="mediumNiceInput" name="email" />
		<label for="standardNiceInput">Name</label>
		<input type="text" class="input-text" id="standardNiceInput" name="firstName" />
		<label for="standardNiceInput">Choose a Password</label>
		<input type="password" class="input-text" id="standardNiceInput" name="password" />
		<p>By clicking Create Account you agree to the <a href="#">Terms and Conditions</a></p>
		<input type="submit" class="nice small radius blue button" value="Create Account"   />
	</form>
</div>
<br />
<br />
</div>
