<div class="span-2">
	<br />
	<br />
	<br />
</div>
<div class="span-22 last"><br />
	<br />
	<?php echo validation_errors(); ?>
	<h3>Login</h3>
	<form action="<?= site_url("auth/verifylogin"); ?>" class="nice" method="post">
		<label for="mediumNiceInput">Email</label>
		<input type="text" class="medium input-text" id="mediumNiceInput" name="email" />
		<label for="standardNiceInput">Password</label>
		<input type="password" class="input-text" id="standardNiceInput" name="password" />
		<input type="submit" class="nice small radius blue button" value="Login &raquo;"   />&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?= site_url("auth/lost_password"); ?>" class="small blue nice button radius">Forgot Password &raquo;</a><br /><br />
	</form>
</div>
<br />
<br />
</div>

  
  
